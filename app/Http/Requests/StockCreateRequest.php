<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'barcodeNumber' => 'required|numeric|digits:13|unique:stocks,barcodeNumber',
            'processDate' => 'nullable|after:'.now(), 
            'productName' => 'required|min:3|alpha',
           //in out defaultin
            'quantity' =>  'nullable',
            'image'  => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'description' => 'required|min:3|max:1000',
             'inAmount'  => 'nullable',
             'outAmount' => 'nullable',
            'criticalAmount' => 'required',
            'currentStock' =>'required',
            'companyName' => 'required|min:3',
            'phone' =>'required|numeric|regex:/[0-9]{11}/|digits:11',
            'email' => 'required|email|unique:stocks,email'
         
        ];
    }


    public function attributes()
    {
            return 
            [
                 'barcodeNumber' => 'Barkod numarası',
                'processDate' => 'İşlem Tarihi', 
                'productName' => 'Ürün Adı',
            
                'quantity' => 'Ürün Miktarı',
                'image'  => 'Ürün resmi',
                'description' => 'Açıklama',
                'inAmount'  => 'Giriş Miktarı',
                'outAmount' => 'Çıkan Miktar',
                'criticalAmount' => 'Kritik miktar',
                'currentStock' =>'Güncel Stok Miktarı',
                'companyName' => 'Firma adı',
                'phone' =>'Telefon numarası',
                 'email' => 'Email Adresi'
         
            ]; 
    }
}
