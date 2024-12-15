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
            font-size: 40px;
            padding-bottom: 40px;
            text-align: center;
        }
        .center{
          margin:auto;
          width: auto;
          text-align: center;
          margin-top: 30px;
          border: 3px solid;
        }
        .content{
            text-align: center;
        }
        .mgi_size{
            width: 100px;
            height: 100px;
        }
        td{
            text-align: center;
            padding-left: 20px;
        }
        .th_color{
            background: skyblue;
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

            <h2 class="h2_font">Add Product</h2>
            <table class="center">
              <tr class="th_color">
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Discount Price</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>

              @foreach ($productData as $productData )
              <tr>
                <td>{{$productData->title}}</td>
                <td>{{$productData->description}}</td>
                <td>{{$productData->category}}</td>
                <td>{{$productData->quantity}}</td>
                <td>{{$productData->price}}</td>
                <td>{{$productData->discount_price}}</td>
                <td>
                    <img class="mgi_size" src="/product/{{$productData->image}}">
                </td>

                <td><a href="{{url('edit_product',$productData->id)}}" class="btn btn-primary" >Edit</td>
                <td><a href="{{url('delete_product',$productData->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure delete that product')" >Delete</td>
              </tr>
              @endforeach

            </table>
        </div>
        </div>
      </div>

          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-center text-muted d-block text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none mt-1 text-center float-sm-right d-block mt-sm-0"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer>
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
