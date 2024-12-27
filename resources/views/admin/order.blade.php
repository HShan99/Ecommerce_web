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
        .form-inline input[type="text"] {
          margin-right: 10px;
          width: 400px;

        }
        #table{
            padding-top: 20px;
        }
        .search{
            padding-left: 150px;
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
                <h2 class="h2_font">All Order</h2>
            </div>

            <div class="row height d-flex justify-content-center align-items-center">

                <div class="col-md-8 form-inline">

                  <div class="search">
                    <form action="{{url('search')}}" method="GET">
                        @csrf
                        <i class="fa fa-search"></i>
                        <input type="text" class="form-control" name="search" placeholder="Search Here">
                        <button class="btn btn-primary">Search</button>
                    </form>

                  </div>

                </div>

              </div>

              <div id="table">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col" style="color: white">Name</th>
                    <th scope="col" style="color: white">Email</th>
                    <th scope="col" style="color: white">Address</th>
                    <th scope="col" style="color: white">Phone</th>
                    <th scope="col" style="color: white">Product Title</th>
                    <th scope="col" style="color: white">Quantity</th>
                    <th scope="col" style="color: white">Price</th>
                    <th scope="col" style="color: white">Payment Status</th>
                    <th scope="col" style="color: white">Delivery Status</th>
                    <th scope="col" style="color: white">Image</th>
                    <th scope="col" style="color: white">Deliver</th>
                    <th scope="col" style="color: white">Print PDF</th>
                  </tr>
                </thead>
                <tbody>

                @forelse ($data as $data )
                <tr>
                    <th scope="row">{{$data->name}}</th>
                    <td>{{$data->email}}</td>
                    <td>{{$data->address}}</td>
                    <td>{{$data->phone}}</td>
                    <td>{{$data->product_title}}</td>
                    <td>{{$data->quality}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->payment_status}}</td>
                    <td>{{$data->delivery_status}}</td>
                    <td>
                      <img class="mgi_size" src="/product/{{$data->image}}">
                    </td>
                    <td>
                        @if($data->delivery_status == 'processing' )
                            <a href="{{url('status_change',$data->id)}}" class="btn-success" style="padding:4px; border-radius:5px" onclick="confirmation(event)">To Deliver

                        @else
                            <a href="" class="btn btn-danger" style="padding:4px; border-radius:5px" >Delivered
                        @endif
                    </td>

                    <td><a href="{{url('print_pdf',$data->id)}}" class="btn btn-secondary" style="padding:4px; border-radius:5px" >Print PDF</td>

                </tr>
                @empty
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="font-size: 30px">Data Not Found</td>
                    </tr>

                @endforelse

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
                title: "Are you sure change that status?",
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
          {{-- <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-center text-muted d-block text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none mt-1 text-center float-sm-right d-block mt-sm-0"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates</a> from Bootstrapdash.com</span>
            </div>
          </footer> --}}
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
