<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateInvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'invoice_number' => 'required|unique:invoices,invoice_number',
            'customer_name' => 'required',
            'invoice_date' => 'required|date',
            'product_name' => 'required|min:1',
            'product_name.*' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => "At lease one product should be included.",
            'product_name.*.required' => "A product name is required"
        ];
    }
}
