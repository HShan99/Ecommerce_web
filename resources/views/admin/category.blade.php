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
        .form-group.form-inline{
            padding-left: 370px;
            display: flex;
            align-items: center;
        }
        .input_color{
            color: black;
        }
        .table{
          margin:auto;
          width: 80%;
          text-align: center;
          margin-top: 30px;

        }
        .form-inline input[type="text"] {
        margin-right: 10px;
        width: 400px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>
  <body>
    @include('sweetalert::alert')
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
                    <div class="form-group form-inline">

                      <input type="text" class="form-control" name="category" placeholder="Write Category Name">
                      <input type="submit" class="btn btn-primary" name="submit" value="Add Category">

                    </div>
                    <div class="form-group"></div>
                </form>

            </div>

            <table class="table">
                <thead>
                  <tr>
                    <th scope="col" style="color: white">Category Name</th>
                    <th scope="col" style="color: white">Action</th>
                  </tr>
                </thead>
                <tbody>

                @foreach ($data as $data )
                  <tr>
                    <td scope="row">{{$data->category_name}}</td>
                    <td><a href="{{url('delete_category',$data->id)}}" class="btn btn-danger" onclick="confirmation(event)">Delete</td>
                  </tr>
                @endforeach

                </tbody>
              </table>


      </div>

      <script>
        function confirmation(event){
            event.preventDefault();
            var urlToRedirect = event.currentTarget.getAttribute('href');
            console.log(urlToRedirect);
            swal({
                title: "Are you sure to remove this category",
                text: "You will not be able to revers this!",
                icon: "warning",
                button: true,
                dangerModel: true,
            })
            .then((willCancel)=>{
                if(willCancel){
                    window.location.href = urlToRedirect;
                }
            });

        }
     </script>


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
