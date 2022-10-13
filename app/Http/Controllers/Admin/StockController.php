<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use Carbon\Carbon; 
use App\Http\Requests\StockCreateRequest;
use App\Http\Requests\StockUpdateRequest;
use Illuminate\Support\Facades\File;



class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks=Stock::select();

        if(request()->get('title'))
        {
           $stocks=$stocks->where('productName','LIKE',"%".request()->get('title')."%");
        }
        if(request()->get('code'))
        {
           $stocks=$stocks->where('barcodeNumber','LIKE',"%".request()->get('code')."%");
        }
                                                        
            $stocks=$stocks->paginate(5);                                              
        return view('admin.stock.list',compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.stock.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StockCreateRequest $request)
    {
        $params = $request->all();

        if($request->hasFile('image'))
        {               
            $destinationPath = 'uploads/images';
            $img = $request->file('image');
            $img_name = Carbon::now()->format('ymdhsi'). '.'. $img->getClientOriginalExtension();
            $img->move($destinationPath, $img_name);
  
            $params["image"] = $img_name;
        }
        Stock::create($params);
        return redirect()->route('stock.index')->withSuccess("Stock Basarıyla Kaydedildi.!!! ");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::find($id) ?? abort(404,'Stock Bulunamadı'); 
        return view('admin.stock.edit',compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StockUpdateRequest $request, $id)
    {
        $stock = Stock::find($id);    
       
              if($request->hasFile('image'))
              {               
                   $destinationPath = 'uploads/images/'.$stock->image;
                  if(File::exists($destinationPath))
                  {
                      File::delete($destinationPath);
                  }

                  $destination = 'uploads/images';
                  $img = $request->file('image');
                  $img_name = Carbon::now()->format('ymdhsi'). '.'. $img->getClientOriginalExtension();
                  $img->move($destination, $img_name);
                   $request->merge([
                       'image'=> $img_name
                   ]);
              }
              
             if($request->inAmount)
             {
               $request->currentStock=$request->currentStock+$request->inAmount;
              
                $request['currentStock']=$request->currentStock;
             }
             if($request->outAmount)
             {
               if($request->currentStock > $request->outAmount)
               {
                $request->currentStock=$request->currentStock-$request->outAmount;
              
                $request['currentStock']=$request->currentStock;
               }
              else
              {
                 return redirect()->back()->withErrors('Yeterli miktarda product bulunmamaktadır');
              }
         }

              Stock::find($id)->update($request->post());
      //  dd($member);
      return redirect()->route('stock.index')->withSuccess('Product guncelleme islemi basarıyla gerceklesti');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::find($id) ?? abort (404,'Quiz Bulunamadı');
        $stock->delete();
        return redirect()->route('stock.index')->withSuccess('Product silme islemi basarıyla gerceklesti');
    }
}
