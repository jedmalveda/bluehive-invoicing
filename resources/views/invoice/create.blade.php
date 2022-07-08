@extends('layouts.app')

@section('content')
    <div class="content-wrapper" style="min-height: 1604.8px;">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Invoice</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <form action="{{ route('invoice.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group mb-3">
                                        <label for="invoice_number">Invoice #</label>
                                        <input type="text" class="form-control" name="invoice_number" id="invoice_number" required value="{{ old('invoice_number') }}">
                                    </div>
                                </div>
                                <div class="col-4 offset-5">
                                    <div class="form-group mb-3">
                                        <label for="invoice_date">Date</label>
                                        <input type="date" class="form-control" name="invoice_date" id="invoice_date" required value="{{ old('invoice_date') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4 offset-8">
                                    <div class="form-group mb-3">
                                        <label for="customer_name">Customer Name</label>
                                        <input type="text" class="form-control" name="customer_name" id="customer_name" required value="{{ old('customer_name') }}">
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
                                        <tr>
{{--                                            <td>--}}
{{--                                                <input class="form-control" type="text" name="product_name[]" required>--}}
{{--                                            </td>--}}
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1 offset-8">
                                    <p class="text-bold">Total:</p>
                                </div>
                                <div class="col-1">
                                    <p id="total_value">0.00</p>
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
                        <input class="form-control" type="text" name="product_name[]" required>
                    </td>
                    <td>
                        <input class="form-control" type="number" name="product_qty[]" min="1" required value="1">
                    </td>
                    <td>
                        <input class="form-control" type="text" name="product_price[]" required value="0">
                    </td>
                    <td>
                        <input class="form-control" type="text" name="product_subtotal[]" disabled>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" id="remove_item_button">Remove</button>
                    </td>
                </tr>`;
                $("#products_table tr:last").after(row_template);
            });

            $("#products_table").on("click", "#remove_item_button", function(){
                $(this).closest("tr").remove();
            });

            $(document).on("change", 'input[type=text][name="product_price[]"], input[type=number][name="product_qty[]"]', function(){
                console.log('changed price changed');
                var row = $(this).closest("tr");
                var unit_price = row.find('input[type=text][name="product_price[]"]')
                var qty = row.find('input[type=number][name="product_qty[]"]');
                var sub_total = row.find('input[type=text][name="product_subtotal[]"]');

                sub_total.val(unit_price.val() * qty.val());
            });
        });
    </script>
@endsection
