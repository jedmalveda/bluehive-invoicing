<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InvoiceProduct extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function getSubTotalAttribute()
    {
        return $this->qty * $this->unit_price;
    }

    public function getTotalInvoiceAmountAttribute()
    {
        dd(DB::select(DB::raw("SELECT SUM(unit_price * qty) as 'total_invoice_amount' FROM invoice_products")));
    }
}
