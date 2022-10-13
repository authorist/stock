<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;  

class Stock extends Model
{
    use HasFactory;

    protected $fillable=[
                'barcodeNumber',
                'processDate', 
                'process',
                'productName',
                'unit',
                'quantity',
                'image',
                'description' ,
                'inAmount',
                'outAmount',
                'criticalAmount',
                'currentStock',
    ];

    protected $dates=['processDate'];

 
    
  

   




}
