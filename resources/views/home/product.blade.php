<!-- product section -->
<section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
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
                      <a href="" class="option2">
                      Buy Now
                      </a>
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
       <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div>
    </div>
 </section>
 <!-- end product section -->
