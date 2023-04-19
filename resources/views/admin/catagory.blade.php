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
              @if(session()->has('message'))

              <div class="alert alert-success">
                {{session()->get('message')}}
              </div>
              @endif
                <div class="div_center">
                <div class="h2font">Add Catagory</div>
                <form action="{{url('/add_catagory')}}" method="post">
                    @csrf
                    <input type="text" class="input_color"name="catagory_name"placeholder="write catagory name">
                    <input type="submit"name="submit"value="Add Catagory"class="btn btn-success">
                </form>
            </div>
            <table class="table table-bordered text-center">
              <tr>
                <td>Ctatagory Name</td>
                <td>Action</td>
              </tr>
              @foreach($data as $data)
              <tr>
                <td>{{$data->catagory_name}}</td>
                <td><a onclick="return confirm('Are You Sure To Delete')"href="{{url('delete_catagory',$data->id)}}"class="btn btn-danger">Delete</a>
              </td>
              </tr>
              @endforeach
            </table>
          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.js')
    <!-- End custom js for this page -->
  </body>
</html>
