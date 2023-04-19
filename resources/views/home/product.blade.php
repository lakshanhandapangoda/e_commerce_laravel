@include('sweetalert::alert')


<section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
               <br>

               
            <div>

              <form action="{{url('product_search')}}"method="get">
                @csrf
                <input type="text"name="search"placeholder="Search" style="width: 500px;">
                <input type="submit"value="Search"class="btn btn-outline-primary">
              </form>

            </div>
            </div>
        
            <div class="row">
               

@foreach($product as $products)
       
               <div class="col-sm-6 col-md-5 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$products->id)}}" class="option1">
                           Product Details
                           </a>

                           <form action="{{url('add_cart',$products->id)}}" method="post">
                              @csrf
                              <div class="row">

                                 <div class="col-md-4">
                                   <input type="number"name="quantity"value="1"min="1"style="width: 100px">
                                 </div>
                                 <div class="col-md-4">
                                 <input type="submit"value="Add To Cart">
                                 </div>
                                 
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{$products->image}}"alt="">
                     <div class="detail-box">
                        <h5>
                     {{$products->title}}
                        </h5>

                        <h6>
                        $.{{$products->price}}
                        </h6>
                     </div>
                     
                  </div>
            </div>

         </div>
         @endforeach

         <span style="padding-top: 20px">
         {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
         </span>
 
      </section>
      