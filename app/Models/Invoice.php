<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function invoiceProducts()
    {
        return $this->hasMany(InvoiceProduct::class);
    }

    public function getTotalPriceAttribute()
    {
        $total_price = 0;
        foreach ($this->invoiceProducts as $invoice_product)
        {
            $total_price += $invoice_product->qty * $invoice_product->unit_price;
        }

        return number_format($total_price,2);
    }
}
