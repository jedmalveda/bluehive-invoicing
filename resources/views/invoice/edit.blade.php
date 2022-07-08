@extends('layouts.app')

@section('content')
    <div class="content-wrapper" style="min-height: 1604.8px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Modify Invoice</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('invoice.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="invoice_number">Invoice #</label>
                                        <input type="text" class="form-control" name="invoice_number" id="invoice_number" value="{{ $invoice->invoice_number }}">
                                    </div>
                                </div>
                                <div class="col-4 offset-5">
                                    <div class="form-group mb-3">
                                        <label for="invoice_date">Date</label>
                                        <input type="date" class="form-control" name="invoice_date" id="invoice_date" value="{{ $invoice->invoice_date }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 offset-8">
                                    <div class="form-group mb-3">
                                        <label for="customer_name">Customer Name</label>
                                        <input type="text" class="form-control" name="customer_name" id="customer_name" value="{{ $invoice->customer_name }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    <div class="form-group mb-3">
                                        <button class="btn btn-secondary" type="button" id="add_item_button">
                                            Add Item
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table" id="products_table">
                                        <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Sub Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($invoice->invoiceProducts as $product)
                                        <tr>
                                            <td>
                                                <input class="form-control" type="text" name="product_name[]" value="{{ $product->product_name }}">
                                            </td>
                                            <td>
                                                <input class="form-control" type="number" name="product_qty[]" min="1" value="{{ $product->qty }}">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="product_price[]" value="{{ $product->unit_price }}">
                                            </td>
                                            <td>
                                                <input class="form-control" type="text" name="product_subtotal[]" disabled value="{{ $product->sub_total }}">
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1 offset-8">
                                    <p class="text-bold">Total:</p>
                                </div>
                                <div class="col-1">
                                    <p>{{ $invoice->total_price }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary btn-block">Save Invoice</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('page_scripts')
    <script>
        $(document).ready(function(){
            $("#add_item_button").on('click', function (){
                var row_template = `<tr>
                    <td>
                        <input class="form-control" type="text" name="product_name[]">
                    </td>
                    <td>
                        <input class="form-control" type="number" name="product_qty[]" min="1">
                    </td>
                    <td>
                        <input class="form-control" type="text" name="product_price[]">
                    </td>
                    <td>
                        <input class="form-control" type="text" name="product_subtotal[]" disabled>
                    </td>
                </tr>`;
                $("#products_table tr:last").after(row_template);
            });
        });
    </script>
@endsection
