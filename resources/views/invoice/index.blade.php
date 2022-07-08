@extends('layouts.app')

@section('content')
    <div class="content-wrapper" style="min-height: 1604.8px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Invoice List</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @if(Session::has('message'))
                            <p class="alert alert-success">{{ Session::get('message') }}</p>
                        @endif
                        <table class="table" id="products_table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Invoice #</th>
                                <th>Customer</th>
                                <th>Total Price</th>
                                <th>Invoice Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($invoices->count() == 0)
                                <tr>
                                    <td colspan="4" class="text-center"> NO INVOICES </td>
                                </tr>
                            @else
                                @foreach($invoices as $invoice)
                                    <tr>
                                        <td>{{ $invoice->id }}</td>
                                        <td>{{ $invoice->invoice_number }}</td>
                                        <td>{{ $invoice->customer_name }}</td>
                                        <td>{{ $invoice->total_price }}</td>
                                        <td>{{ $invoice->invoice_date }}</td>
                                        <td>
                                            <a href="{{ route('invoice.edit', $invoice->id) }}" class="btn btn-secondary">View</a>
                                            <form action="{{ route('invoice.delete') }}" method="post" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <input type="hidden" value="{{ $invoice->id }}" name="invoice_id">
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('page_scripts')

@endsection
