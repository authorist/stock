<x-app-layout>
    <x-slot name="header">Anasayfa </x-slot>
    <div class="container-fluid">
      <div class="alert bg-light"> 
        <h2 class="text-center">
            PRODUCTS
        </h2>
      </div>

 
        <div class="row">
           
           <div class="col-md-1">
                
           </div>
          
   
          <div class="col-md-10">

          <form action="" method="GET">
                 <div class="row mb-5">
                    <div class="col-md-2"></div>
				 <div class="col-md-8">
				<div class="form-group input-group" style="border:1px #888; box-shadow: 0px 2px 5px #ccc;">
					<input type="text" name="titlee" value="{{request()->get('titlee')}}" onchange="this.form.submit()" class="form-control" placeholder="Aranacak ürün adını giriniz." />
					<span class="input-group-btn">
						<a class="btn btn-success" href="#"  >Search</a>
					</span>
				</div>
			</div>
				@if(request()->get('titlee'))
                <div class="col-md-2">
                    <a href="{{ route('dashboard') }} " class="btn btn-secondary ">sıfırla</a>
                </div>
              @endif
			  </div>
         </form>


                <div class="list-group">
                 
              @foreach($stocks as $stock)
              
                    <a href="{{route('stock.detail',$stock->id)}}" class="list-group-item list-group-item-action " aria-current="true">
                        
                      <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><span class="badge bg-light text-black">{{$stock->productName}}</span></h5>
                        <span class="badge bg-light text-black">    <small>{{$stock->processDate ? $stock->processDate->diffForHumans().'den beri bitiyor...' : null }}</small></span>
                      </div>
                      <p class="mb-1">{{Str::limit($stock->description,100)}}</p>
                      <div class="d-flex w-100 justify-content-between">
                      <span class="badge bg-light text-black">        <small>{{$stock->currentStock}} - {{$stock->unit}} kaldı</small>   </span> 
                          <small>
                          @if($stock->currentStock > $stock->criticalAmount)
                                 <span class="badge bg-warning rounded-pill">Ürün stocklarda mevcut</span>
                                  @elseif($quiz->finished_at>now())
                                  <span class="badge bg-primary rounded-pill">Ürün kritik miktardadır</span>
                            @endif
                            </small> 
                      </div>               
                    </a>
                    @endforeach
                    <div class="mt-2">
                    {{$stocks->links()}}
                    </div>
                  </div>

          </div><!--  end of col-md-8 -->

         

        </div> <!--  end of Row -->
     </div> <!--  end of container -->


 

  
</x-app-layout>
