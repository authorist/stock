<x-app-layout>
    <x-slot name="header">Detail </x-slot>

    <div class="container-fluid">
      <div class="alert bg-light"> 
        <h3 class="text-center">
            PRODUCT DETAİLS
        </h3>
      </div>

      <div class="container-fluid mt-2">
		<div class="row">
            <div class="col-md-9 text-center">
                       <div >
							<h5 class="card-title mt-3">Stock Detail</h3>
							<hr class="border border-white">							
						</div>
           </div>           
            <div class="col-md-3 text-center">
                       <div >
							<h5 class="card-title mt-3">Company</h3>
							<hr class="border border-white">							
						</div>
            </div>
        </div>
		</div>
		
		
		<div class="row">
			

<div class="col-md-1"></div>
	<div class="col-md-7">
                <div class="card">
                  <div class="card-body">
            
              <form action="" class="" method="" enctype="">

               
                <div class="form-group">
                    <label for="">Barcode Number</label>
                    <div class="list-group" style="border:1px #888; box-shadow: 0px 2px 5px #aaa;">
						<a href="" class="list-group-item list-group-item-action">{{$stock->barcodeNumber}}</a>
                    </div>
                </div><br>
                <div class="form-group">
                    <label for="">Process Date</label>
                    <div class="list-group" style="border:1px #888; box-shadow: 0px 2px 5px #aaa;">
						<a href="" class="list-group-item list-group-item-action">{{$stock->processDate}}</a>
						<a href="" class="list-group-item list-group-item-action">{{$stock->processDate->diffForHumans()}}</a>
                    </div>
                </div><br>
              
                <div class="form-group">
                    <label for="">Product Name</label>
                    <div class="list-group" style="border:1px #888; box-shadow: 0px 2px 5px #aaa;">
						<a href="" class="list-group-item list-group-item-action">{{$stock->productName}}</a>
                    </div>
                </div><br>
                <div class="form-group">
                    <label for="">Unit</label>
                    <div class="list-group" style="border:1px #888; box-shadow: 0px 2px 5px #aaa;">
						<a href="" class="list-group-item list-group-item-action">{{$stock->unit}}</a>
                    </div>
                </div><br>
                <div class="form-group">
                    <label for="">Quantity</label>
                    <div class="list-group" style="border:1px #888; box-shadow: 0px 2px 5px #aaa;">
						<a href="" class="list-group-item list-group-item-action">{{$stock->quantity}}</a>
                    </div>
                </div>
<br>
                <!-- <div class="form-group">    
                    <label for="">Fotoğraf</label>
                    @if($stock->image)
                    <a href="{{asset($stock->image)}}" target="_blank">
                    <img src="{{asset($stock->image)}}" alt="" class="img-responsive" style="width:200px;">
                    </a>
                    @endif
                    <input type="file" name="image" class="form-control">
                </div> --><br>
                <div class="form-group">    
                    
                    @if($stock->image)
                    <label for="">Product İmage</label>
                    <a href="{{asset($stock->image)}}" target="_blank">
                    <img src="{{asset($stock->image)}}" alt="" class="img-responsive" style="width:200px;">
                    </a>
                    @endif
                    
                </div><br>
                <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="stock" class="form-control" id="" cols="" rows="4"> {{$stock->description}}</textarea>
                </div><br>
               
                <div class="form-group">
                    <label for="">Critical Amount</label>
                    <div class="list-group" style="border:1px #888; box-shadow: 0px 2px 5px #aaa;">
						<a href="" class="list-group-item list-group-item-action">{{$stock->criticalAmount}}</a>
                    </div>
                </div><br>
                <div class="form-group">
                    <label for="">Current Stock</label>
                    <div class="list-group" style="border:1px #888; box-shadow: 0px 2px 5px #aaa;">
						<a href="" class="list-group-item list-group-item-action">{{$stock->currentStock}}</a>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <br><br>
               
                    {!! DNS2D::getBarcodeHtml($stock->barcodeNumber,'QRCODE') !!}  
                    <h4>&nbsp {{$stock->barcodeNumber}} </h4>
                  
                </div> -->
               
                <!-- <div   class="form-group">
                    <label for="">Doğru Cevap</label>
                    <select name="correct_answer" id="" class="form-control">
                        <option @if($stock->correct_answer==='answer1') selected @endif value="answer1">1. Cevap</option>
                        <option @if($stock->correct_answer==='answer2') selected @endif value="answer2">2. Cevap</option>
                        <option @if($stock->correct_answer==='answer3') selected @endif value="answer3">3. Cevap</option>
                        <option @if($stock->correct_answer==='answer4') selected @endif value="answer4">4. Cevap</option>
                    </select>
                    
                </div>
               
                <div class="form-group mt-2">
                    <button class="btn btn-success btn-sm btn-block form-control" type="submit">Soru Güncelle </button>
                </div> -->

          </form> 

        </div>
    </div>

</div>
<div class="col-md-1"></div>                



                <div class="col-md-3 mb-3">
					@foreach($stock as $company)
                    <div class="list-group" style="border:1px #888; box-shadow: 0px 2px 5px #aaa;">
                    <a href="" class="list-group-item list-group-item-action active">Company İnformation</a>
						<a href="" class="list-group-item list-group-item-action">{{$company->companyName}}</a>
						<a href="" class="list-group-item list-group-item-action">{{$company->phone}}</a>
						<a href="" class="list-group-item list-group-item-action ">{{$company->email}}</a>
						
						
						<a href="" class="list-group-item list-group-item-action ">&nbsp&nbsp&nbsp{!! DNS2D::getBarcodeHtml($stock->barcodeNumber,'QRCODE') !!} </a>
						<h4><a href="" class="list-group-item list-group-item-action">&nbsp{{$stock->barcodeNumber}}</a>
                        </h4>
						
					</div>
                    @endforeach
				</div>

		</div>
        <!-- end of row  -->
	</div>
<!-- end of container -->
    </x-app-layout>