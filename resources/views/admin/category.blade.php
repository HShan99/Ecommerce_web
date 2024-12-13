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
        .input_color{
            color: black;
        }
        .center{
          margin:auto;
          width: 70%;
          text-align: center;
          margin-top: 30px;
          border: 3px solid;

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
                <h2 class="h2_font">Add Category</h2>

                <form action="{{url('/add_category')}}" method="POST">
                    @csrf

                    <input type="text" class="input_color" name="category" placeholder="Write Category Name">

                    <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                </form>
            </div>

            <table class="center">
              <tr>
                <td>Category Name</td>
                <td>Action</td>
              </tr>

              @foreach ($data as $data )
              <tr>
                <td>{{$data->category_name}}</td>
                <td><a href="{{url('delete_category',$data->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure Delete That??')">Delete</td>
              </tr>
              @endforeach

            </table>

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
