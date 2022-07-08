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
                        <table class="table" id="products_table">
                            <thead>
                            <tr>
                                <th>ID</th>
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
                                        <td>{{ $invoice->customer_name }}</td>
                                        <td>{{ $invoice->total_price }}</td>
                                        <td>{{ $invoice->invoice_date }}</td>
                                        <td><a href="{{ route('invoice.edit', $invoice->id) }}" class="btn btn-secondary">View</a></td>
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
