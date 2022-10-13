<x-app-layout>

    <x-slot name="header">
        Products
    </x-slot>

  
  
  <div class="card">

  

    <div class="card-body">
                <!-- float-right kabul etmiyor onun için text-right yaptım oldu -->
         <h5 class="card-title text-right">
            <a href="{{route('stock.create')}}" class="btn btn-primary btn-sm" ><i class="fa fa-plus"></i>  Product create</a>
        </h5>
        
        <form action="" method="GET">
            <div class="container-fluid">
            <div class="row mb-3">
                <div class="form-group col-md-2">                     
                    <input class="form-control" type="text" name="title" value="{{request()->get('title')}}" onchange="this.form.submit()" class="form-control"  placeholder="Product name" >
                </div>

                <div class="form-group col-md-2">                     
                    <input class="form-control" type="text" name="code" value="{{request()->get('code')}}" onchange="this.form.submit()" class="form-control"  placeholder="Barcode Number" >
                   
                </div>
                
                @if(request()->get('title') || request()->get('code'))
                <div class="col-md-2">
                    <a href="{{route('stock.index')}}" class="btn btn-secondary">Sıfırla</a>
                </div>
                @endif
            </div>
            </div>
        </form>
        
                   <table class="table table-bordered">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Barcode No</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Unit</th>
                        <th scope="col">Process Date</th>
                        <th scope="col">Product İmage</th>
                       
                        <th scope="col">Company</th>
                        <th scope="col">Phone</th>
                      
                        <th scope="col">Critical Amount</th>
                        <th scope="col">Current Stock</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($stocks as $key => $stock)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{$stock->barcodeNumber}}</td>
                             <td>{{$stock->productName}}</td>
                             <td>{{$stock->unit}}</td>           
                            <td> 
                                <span title="{{$stock->processDate}}">
                                    {{$stock->processDate ? $stock->processDate->diffforHumans() : '-' }}
                                </span>
                            </td> 

                            <td>
                               <img src="{{asset('/uploads/images/'.$stock->image)}}" alt="Resim bulunamadı" class="img-responsive" style="width:49px;">
                           </td> 
                           <td>{{$stock->companyName}}</td>           
                           <td>{{$stock->phone}}</td>           
                                   
                           <td>{{$stock->criticalAmount}}</td>           
                            <td>{{$stock->currentStock}}</td>           



                        <td style="width:80px;">                       
                            <a href="{{route('stock.edit',$stock->id)}}" class="btn btn-primary btn-sm" ><i class="fa fa-pen"></i></a>
                            <a href="{{route('stock.destroy',$stock->id)}} " class="btn btn-danger btn-sm" ><i class="fa fa-times"></i></a>
                        </td>
                        </tr>
                        @endforeach  
                    </tbody>                    
                    </table>
                    {{$stocks->links()}} 
    
    
    
      </div><!-- card-body-div-END -->

       

  </div> <!-- card-div-END -->

  
  
</x-app-layout>
