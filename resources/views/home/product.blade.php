<!-- product section -->
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>

       <div class="search form-inline" style="margin-left: 300px">
        <form action="{{url('product_search')}}" method="GET">
            @csrf
            <input style="margin-right: 10px; width: 500px; border-radius:10px"" type="text" class="form-control " name="search" placeholder="Search Product Here">
            <button class="btn btn-danger" style="margin-bottom:20px">Search</button>
        </form>
      </div>

       <div class="row">
        @foreach ($product as $products)
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <h5 style="text-align: center; font-size:20px">
                    {{$products->title}}
                 </h5>
                <div class="option_container">


                   <div class="options">
                      <a href="{{url('product_details',$products->id)}}" class="option1">
                        Product Details
                      </a>
                      {{-- <a href="" class="option2">
                      Buy Now
                      </a> --}}

                      <form action="{{url('add_to_cart',$products->id)}}" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input type="number" min="1" name="quantity" value="1" width="100px">
                            </div>
                            <div class="col">
                                <input type="submit" class="option2" value="Add to Cart">
                            </div>
                        </div>

                      </form>

                   </div>
                </div>
                <div class="img-box">
                   <img src="/product/{{$products->image}}" alt="">
                </div>
                <div class="detail-box">

                   @if ($products->discount_price!=null)
                        <h6 style="color: red">
                            Discount Price<br>
                            ${{$products->discount_price}}
                        </h6>

                        <h6 style="color: gray; text-decoration:line-through" >
                            Price <br>
                            ${{$products->price}}
                        </h6>
                    @else
                        <h6 style="color: gray">
                            Price <br>
                            ${{$products->price}}
                        </h6>

                   @endif

                </div>
             </div>
          </div>
          @endforeach
          <span style="padding-top: 15px">
            {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
          </span>


          </div>
       </div>
    </div>
 </section>
 <!-- end product section -->
