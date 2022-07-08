<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $total_invoice_amount = DB::select("SELECT SUM(unit_price * qty) as 'total' FROM invoice_products");
        $invoices = Invoice::all();
        $latest_invoices = Invoice::latest()->take(10)->get();

        return view('dashboard', compact('invoices', 'total_invoice_amount', 'latest_invoices'));
    }
}
