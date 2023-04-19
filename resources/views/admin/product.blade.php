<!DOCTYPE html>
<html lang="en">
  <head>
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
                <div class="h2font">Add Product</div>

        
            <div class="content-wrapper">
            
                  @if(session()->has('message'))

                    <div class="alert alert-success">
                       {{session()->get('message')}}
                    </div>
                     @endif

                    <form action="{{url('add_product')}}"method="post" enctype="multipart/form-data">
                        @csrf

                    <div class="div_design">
                    <label>Product Title</label>
                    <input type="text"class="input_color" name="title" placeholder="Write a title"required="">
                    </div>

                    <div class="div_design">
                    <label>Product Description</label>
                    <input type="text"class="input_color"name="description"placeholder="Write a description">
                    </div>

                    <div class="div_design">
                    <label>Product Price</label>
                    <input type="number"class="input_color"name="price"placeholder="Write a price"required="">
                    </div>

                    <div class="div_design">
                    <label>Discount Price</label>
                    <input type="number"class="input_color"name="discount"min="0"placeholder="Write a discount"required="">
                    </div>

                    <div class="div_design">
                    <label>Product Quantity</label>
                    <input type="number"class="input_color"name="quantity"min="0"placeholder="Write a quantity"required="">
                    </div>

                    <div class="div_design">
                    <label>Product Catagory</label>
                    <select class="input_color"name="catagory"required="">
                        <option value=""select="">Add a catagory here</option>
                        @foreach($catagory as $catagory)
                        <option>{{$catagory->catagory_name}}</option>
                        @endforeach
                    </select>
                    </div>

                    <div class="div_design">
                    <label>Product Image</label>
                    <input type="file"name="image"required="">
                    </div>

                    <div class="div_design">
                    <input type="submit"name="submit"value="Add Product"class="btn btn-success">
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
