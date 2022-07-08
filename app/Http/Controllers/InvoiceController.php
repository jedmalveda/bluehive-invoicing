<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\InvoiceProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoice.index', compact('invoices'));
    }

    public function create()
    {
        return view('invoice.create');
    }

    public function store(Request $request)
    {

        // Create invoice.
        $invoice = Invoice::create(
            [
                'invoice_number' => $request->invoice_number,
                'customer_name' => $request->customer_name,
                'invoice_date' => Carbon::parse($request->invoice_date)
            ]
        );

        // Save items of invoice
        $product_array = [];
        foreach ($request->product_name as $key => $product)
        {
            $product_array[] = [
                'invoice_id' => $invoice->id,
                'product_name' => $product,
                'qty' => $request->product_qty[$key],
                'unit_price' => $request->product_price[$key]
            ];
        }

        InvoiceProduct::insert($product_array);
    }

    public function edit($id)
    {
        $invoice = Invoice::find($id);
        dd($invoice);
        return view('invoice.edit');
    }
}
