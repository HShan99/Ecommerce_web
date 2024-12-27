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
        /* .center{
          margin:auto;
          width: auto;
          text-align: center;
          margin-top: 30px;
          border: 3px solid;
        } */
        .table{
            width: auto;
            text-align: center;
            margin-top: 30px;

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

            <h2 class="h2_font">Show Products</h2>

            {{-- <table class="center">
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

            </table> --}}
            <div class="center">
                <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount Price</th>
                        <th scope="col">Image</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        @foreach ($productData as $productData )
                    <tr>
                        <td>{{$productData->title}}</td>
                        <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 450px;">
                            {{$productData->description}}
                        </td>
                        <td>{{$productData->category}}</td>
                        <td>{{$productData->quantity}}</td>
                        <td>{{$productData->price}}</td>
                        <td>{{$productData->discount_price}}</td>
                        <td>
                            <img class="mgi_size" src="/product/{{$productData->image}}">
                        </td>

                        <td><a href="{{url('edit_product',$productData->id)}}" class="btn btn-primary" >Edit</td>
                        <td><a href="{{url('delete_product',$productData->id)}}" class="btn btn-danger" onclick="confirmation(event)" >Delete</td>
                    </tr>
                  @endforeach
                      </tr>
                    </tbody>
                  </table>
            </div>




        </div>

        <script>
            function confirmation(event){
                event.preventDefault();
                var urlToRedirect = event.currentTarget.getAttribute('href');
                console.log(urlToRedirect);
                swal({
                    title: "Are you sure to delete this product",
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
