 
 <x-app-layout>
    <x-slot name="header">Products Update</x-slot>    
    <div class="card">
        <div class="card-body">
            <div class="container bg-light">
                <div class="row mt-5">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">

                 
            <form action=" {{route('stock.update',$stock->id)}} " method="POST" enctype="multipart/form-data" >           
                @csrf 
                @method('put')
                <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        
                        
                        </div>
                         <div   class="form-group" id="processInput">
                         <label for="">Eklenecek ürün adedi</label>
                         <input  type="text" name="inAmount" class="form-control" value="">
                         </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                        <label for="">Current stock</label>
                        <input type="text" name="currentStock" class="form-control" value="{{$stock->currentStock}}" disabled> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        
                         
                        </div>
                         <div  class="form-group" id="processOutput">
                         <label for="">Çıkacak ürün adedi</label>
                         <input  type="text" name="outAmount" class="form-control" value="">
                         </div>
                    </div>
                    <div class="col-md-6">
                            <div class="form-group text-center">
                               <button class="btn btn-success  mt-4 " type="submit">Update  Product </button>
                           </div>
                    </div>              
                </div>


                <div class="form-group mt-3 mb-5">
                           <div class="progress">
                           <div class="progressbar"></div>
                           </div>
                           </div>
                    </div>  
                   <div class="form-group">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                {!! DNS2D::getBarcodeHtml($stock->barcodeNumber,'QRCODE') !!}  
                                 <h4>&nbsp {{$stock->barcodeNumber}} </h4>
                                </div>
                            </div>
                   </div>

                   
                <div class="form-group">
                    <label for="">Product Name</label>
                   <input type="text" name="productName" class="form-control" value="{{$stock->productName}}">   
                </div>
             

                <div  class="form-group" >
                    <label for="">Process Date</label>
                    <input  type="datetime-local" name="processDate" class="form-control" value="{{$stock->processDate}}">
                </div>
                
                <div class="form-group">
                <img src="{{asset('/uploads/images/'.$stock->image)}}" alt="Resim bulunamadı" class="img-responsive" style="width:200px;">

                    <div style="margin-bottom:10px;color:darkred;">Resim güncelle</div>
                    <input type="file" id="image" name="image" class=" form-control " accept=".jpg,.png,.jpeg" style="height:39px;" >
                </div>
                <div class="form-group">
                    <label for="">Product Description</label>
                   <textarea name="description" class="form-control" id="" cols="" rows="4"> {{$stock->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Company Name</label>
                   <input type="text" name="companyName" class="form-control" value="{{$stock->companyName}}">    
                </div>
                <div class="form-group">
                    <label for="">Company email</label>
                    <input type="email" id="email" name="email" class="form-control"  placeholder="Mail Adresi" value="{{$stock->email}}" >    
                </div>
                <div class="form-group">
                    <label for="">Company phone</label>
                    <input type="tel" id="name" name="phone" class="form-control" minlength="11" maxlength="11" placeholder="(05)00-000-00-00" pattern="[0-9]+" oninvalid="" oninput=""  value="{{$stock->phone}}" >   
                </div>
                <div class="form-group">
                    <label for="">Critical Amount</label>
                   <input type="text" name="criticalAmount" class="form-control" value="{{$stock->criticalAmount}}">    
                </div>
                <div class="form-group">
                    <label for="">Current Stock Amount</label>
                   <input type="text" name="currentStock" class="form-control" value="{{$stock->currentStock}}">   
                </div>
                <div   class="form-group">
                           <label for="">Select Unit</label>
                                    <select name="unit" id="" class="form-control">
                                        <option  value="">Select Unit</option>
                                        <option @if($stock->unit==='Adet') selected @endif value="Adet">Adet</option>
                                        <option @if($stock->unit==='KG') selected @endif value="KG">KG</option>
                                        <option @if($stock->unit==='Koli') selected @endif value="Koli">Koli</option>
                                    </select>
                                </div>

                     <div class="form-group mt-3 mb-3">
                           <div class="progress">
                           <div class="progressbar"></div>
                           </div>
                           </div>
                    </div>        

                <div class="form-group text-center">
                    <button class="btn btn-success  " type="submit">Update  Product </button>
                </div>

            </form>



            </div>
                    <div class="col-md-3"></div>
                </div>
            </div>

        </div>
    </div>

    <x-slot name="js">
            <script>
                    
                    $('#isIN').change(function(){
                        if($('#isIN').is(':checked'))
                        {
                            $('#processInput').show();
                        }
                        else
                        {
                            $('#processInput').hide();
                        }
                    })
                </script>   
               
    </x-slot>
</x-app-layout>  