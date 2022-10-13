 
 <x-app-layout>
    <x-slot name="header">Products </x-slot>    
    <div class="card">
        <div class="card-body">
            <div class="container bg-light">
                <div class="row mt-5">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">

                 
            <form action=" {{route('stock.store')}} " method="POST" enctype="multipart/form-data" >           
                @csrf 
                <div class="form-group">
                    <label for="">Barcode Number</label>
                   <input type="text" name="barcodeNumber" class="form-control" value="{{old('barcodeNumber')}}">    
                </div>
                <div class="form-group">
                    <label for="">Product Name</label>
                   <input type="text" name="productName" class="form-control" value="{{old('productName')}}">    
                </div>
             

                <div  class="form-group" >
                    <label for="">Process Date</label>
                    <input  type="datetime-local" name="processDate" class="form-control" value="{{old('processDate')}}">
                </div>
                
                <div class="form-group">
                    <div style="margin-bottom:10px;color:darkred;">Resim ekleyiniz</div>
                    <input type="file" id="image" name="image" class=" form-control " accept=".jpg,.png,.jpeg" style="height:39px;" >
                </div>
                <div class="form-group">
                    <label for="">Product Description</label>
                   <textarea name="description" class="form-control" id="" cols="" rows="4"> {{old('description')}}</textarea>
                </div>
                <div class="form-group">
                    <label for="">Company Name</label>
                   <input type="text" name="companyName" class="form-control" value="{{old('companyName')}}">    
                </div>
                <div class="form-group">
                    <label for="">Company email</label>
                    <input type="email" id="email" name="email" class="form-control"  placeholder="Mail Adresi" value="{{old('email')}}" >    
                </div>
                <div class="form-group">
                    <label for="">Company phone</label>
                    <input type="tel" id="name" name="phone" class="form-control" minlength="11" maxlength="11" placeholder="(05)00-000-00-00" pattern="[0-9]+" oninvalid="" oninput=""  value="{{old('phone')}}" >   
                </div>
                <div class="form-group">
                    <label for="">Critical Amount</label>
                   <input type="text" name="criticalAmount" class="form-control" value="{{old('criticalAmount')}}">    
                </div>
                <div class="form-group">
                    <label for="">Current Stock Amount</label>
                   <input type="text" name="currentStock" class="form-control" value="{{old('currentStock')}}">   
                </div>
                <div   class="form-group">
                           <label for="">Select Unit</label>
                                    <select name="unit" id="" class="form-control">
                                        <option @if(old('unit')==='Select') selected @endif value="">Select Unit</option>
                                        <option @if(old('unit')==='Adet') selected @endif value="Adet">Adet</option>
                                        <option @if(old('unit')==='KG') selected @endif value="KG">KG</option>
                                        <option @if(old('unit')==='Koli') selected @endif value="Koli">Koli</option>
                                    </select>
                                </div>

                     <div class="form-group mt-3 mb-3">
                           <div class="progress">
                           <div class="progressbar"></div>
                           </div>
                           </div>
                    </div>        

                <div class="form-group text-center">
                    <button class="btn btn-success  " type="submit">Create  Product </button>
                </div>

            </form>



            </div>
                    <div class="col-md-3"></div>
                </div>
            </div>

        </div>
    </div>


</x-app-layout>  