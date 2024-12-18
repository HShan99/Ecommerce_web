<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type="text/css">
         .div_center{
            text-align: center;
            padding-top: 40px;
        }
        .h2_font{
            font-size: 30px;
            padding-bottom: 40px;
        }
        .text_color{
            color: black;
            padding-bottom: 20px;
            width: 700px;

        }
        label{
            display: inline-block;
            width: 200px;
        }
        .div_design{
            padding-bottom: 15px;
        }

        input[type="text"]{
            width: 700px;
        }
        input[type="number"]{
            width: 700px;
        }
        input[type="submit"]{
            width: 200px;
            height: 50px;
            font-size: 20px;
        }



    </style>
  </head>
  <body>
    <div class="container-scroller">

      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->

      <!-- partial:partials/_navbar.html -->
      @include('admin.header')
      <!-- partial -->

      <div class="main-panel">
        <div class="content-wrapper">

            @if (@session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{@session()->get('message')}}
            </div>
            @endif

            <div class="div_center">
                <h2 class="h2_font">Add Product</h2>

            <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="div_design">
                <label>Product Title</label>
                <input type="text" name="title" class="text_color" placeholder="Write Title" required>
            </div>



            <div class="div_design">
                <label>Product Description</label>
                <input type="text" name="description" class="text_color" placeholder="Write Description" required>

            </div>

            <div class="div_design">
                <label>Product Quantity</label>
                <input type="number" min="0" name="quantity" class="text_color" placeholder="Write Quantity" required>

            </div>

            <div class="div_design">
                <label>Product Price</label>
                <input type="number" name="price" class="text_color" placeholder="Write Price" required>
            </div>

            <div class="div_design">
                <label>Discount Price</label>
                <input type="number" name="discount_price" class="text_color" placeholder="Write Discount Price" required>
            </div>

            <div class="div_design">
                <label>Product Category</label>
                <select class="text_color" name="category" required>

                    <option value="selected">Add a Category Here</option>
                @foreach ($category as $category)
                    <option>{{$category->category_name}}</option>
                @endforeach
                </select>


            </div>

            <div class="div_design">
                <label>Product Image</label>
                <input type="file" name="image" class="text_color" required>
            </div>

            <div class="div_design">
                <input class="btn btn-primary" type="submit" value="Add Product">
            </div>
        </form>
        </div>



    </div>

      <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
