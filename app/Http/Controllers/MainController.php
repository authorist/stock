<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;

class MainController extends Controller
{
    public function dashboard()
    {
        $stocks = Stock::select();

        if(request()->get('titlee'))
         {
            $stocks=$stocks->where('productName','LIKE',"%".request()->get('titlee')."%");
         }
        $stocks  = $stocks->paginate(6);
      
        return view('dashboard',compact('stocks'));
    }


    public function stock_detail($id)
    {
         $stock = Stock::whereId($id)->first() ?? abort(404,'Stock bulunamadı');
 //   dd($stock);
 //  return $stock;
     return view('stock_detail',compact('stock'));
     
    }





}
