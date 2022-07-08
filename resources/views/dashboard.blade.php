@extends('layouts.app')

@section('content')
    <div class="content-wrapper" style="min-height: 1604.8px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="info-box">
                            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Invoices</span>
                                <span class="info-box-number">{{ $invoices->count() }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="info-box">
                            <span class="info-box-icon bg-success"><i class="far fa-money-bill-alt"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Total Invoice Amount</span>
                                <span class="info-box-number">{{ $total_invoice_amount[0]->total  }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header ui-sortable-handle" style="cursor: move;">
                                <h3 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Latest Invoices
                                </h3>
                            </div>
                            <div class="card-body">
                                <table class="table">
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
                                            <td colspan="4" class="text-center"> NO INVOICES</td>
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
                                                    <a href="{{ route('invoice.edit', $invoice->id) }}"
                                                       class="btn btn-secondary">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
