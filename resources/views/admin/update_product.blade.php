<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->
    @include('admin.css')

    <style>
         .div_center
        {
            text-align: center;
            padding-top: 40px;
        }
        .h2font
        {
            font-size: 40px;
            padding-bottom: 40px;
        }
        .input_color
        {
            color: black;
        }
        label 
        {
            display: inline-block;
            width: 200px;
        }
        .div_design
        {
            padding-bottom: 15px;
        }

        </style>

  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
        <div class="content-wrapper">
        <div class="div_center">
                <div class="h2font">Update Product</div>

        
            <div class="content-wrapper">
            
                  @if(session()->has('message'))

                    <div class="alert alert-success">
                       {{session()->get('message')}}
                    </div>
                     @endif

                    <form action="{{url('update_product_confirm',$data->id)}}"method="post" enctype="multipart/form-data">
                        @csrf

                    <div class="div_design">
                    <label>Product Title</label>
                    <input type="text"class="input_color" name="title" placeholder="Write a title"required=""value="{{$data->title}}">
                    </div>

                    <div class="div_design">
                    <label>Product Description</label>
                    <input type="text"class="input_color"name="description"placeholder="Write a description"value="{{$data->description}}">
                    </div>

                    <div class="div_design">
                    <label>Product Price</label>
                    <input type="number"class="input_color"name="price"placeholder="Write a price"required=""value="{{$data->price}}">
                    </div>

                    <div class="div_design">
                    <label>Discount Price</label>
                    <input type="number"class="input_color"name="discount"min="0"placeholder="Write a discount"required=""value="{{$data->discount_price}}">
                    </div>

                    <div class="div_design">
                    <label>Product Quantity</label>
                    <input type="number"class="input_color"name="quantity"min="0"placeholder="Write a quantity"required=""value="{{$data->quantity}}">
                    </div>
                    
                    <div class="div_design">
                    <label>Product Catagory</label>
                    <select class="input_color"name="catagory"required="">
                        <option value="{{$data->catagory}}"selected="">{{$data->catagory}}</option>

                        @foreach($catagory as $catagory)
                        <option value="{{$catagory->catagory_name}}"selected="">{{$catagory->catagory_name}}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="div_design">
                    <label>Crunt Product Image</label>
                    <img src="/product/{{$data->image}}" alt="" style="margin:auto;"height="100" width="100">
                    </div>

                    <div class="div_design">
                    <label>Chenge Product Image</label>
                    <input type="file"name="image"required="">
                    </div>

                    <div class="div_design">
                    <input type="submit"name="submit"value="Update Product"class="btn btn-success">
                    </div>
                    </form>

                    <a class="btn btn-primary" href="{{url('show_product')}}" role="button">View Product</a>

                </div>
      </div>
               
            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
      @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>