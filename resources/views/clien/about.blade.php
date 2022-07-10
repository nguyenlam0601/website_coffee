@extends('layout_user')
@section('content')
<div>
    <div class="hero-wrap hero-bread"  style="background-image: url('/uploads/image/banners/banner-3.jpg');height:550px">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center" style="margin-top: 200px;">
            <p class="breadcrumbs"><span class="mr-2"><a href="/clien/trangchus">Trang chủ</a></span> <span></span></p>
          <h1 class="mb-0 bread">Về chúng tôi</h1>
        </div>
      </div>
    </div>
    </div>

  <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
          <div class="container">
              <div class="row">
                  <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(/uploads/image/banners/cafe-latte.jpg);margin-top:100px">
                      <a href="https://vimeo.com/95273884" class="icon popup-vimeo d-flex justify-content-center align-items-center">
                          <span class="icon-play"></span>
                      </a>
                  </div>
                  <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
            <div class="heading-section-bold mb-4 mt-md-5">
                <div class="ml-md-0">
                  <h2 class="mb-4">Chào mừng bạn đến với CoffeeHouse</h2>
              </div>
            </div>
            <div class="pb-md-5">
                <p>CoffeeHouse được sinh ra từ niềm đam mê bất tận với hạt cà phê Việt Nam. Qua một chặng đường dài, chúng tôi đã không ngừng mang đến những sản phẩm cà phê thơm ngon, sánh đượm trong không gian thoải mái và lịch sự với mức giá hợp lý.</p>
                          <p> Những ly cà phê của chúng tôi không chỉ đơn thuần là thức uống quen thuộc mà còn mang trên mình một sứ mệnh văn hóa phản ánh một phần nếp sống hiện đại của người Việt Nam.</p>
                          <p><a href="#" class="btn btn-primary">Mua ngay</a></p>
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
      <div class="row d-flex justify-content-center py-5">
        <div class="col-md-6">
            <h2 style="font-size: 22px;" class="mb-0">Theo dõi bản tin của chúng tôi</h2>
            <span>Nhận thông tin cập nhật qua email về các cửa hàng mới nhất của chúng tôi và các ưu đãi đặc biệt</span>
        </div>
        <div class="col-md-6 d-flex align-items-center">
          <form action="#" class="subscribe-form">
            <div class="form-group d-flex">
              <input type="text" class="form-control" placeholder="Nhập địa chỉ email">
              <input type="submit" value="Subscribe" class="submit px-3">
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
      
      <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(/uploads/image/banners/banner-1.jpg);">
      <div class="container">
          <div class="row justify-content-center py-5">
              <div class="col-md-10">
                  <div class="row">
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                      <strong class="number" data-number="10000">0</strong>
                      <span>Khách hàng hạnh phúc</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                      <strong class="number" data-number="100">0</strong>
                      <span>Chi nhánh</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                      <strong class="number" data-number="1000">0</strong>
                      <span>Bạn đồng hành</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                  <div class="block-18 text-center">
                    <div class="text">
                      <strong class="number" data-number="100">0</strong>
                      <span>Giải thưởng</span>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
      </div>
  </section>
</div>
  @include('includes.section3')
<script src="/js/angular.min.js"></script>
<script src="/js/sanphamcontroller.js"></script>
<script src="/js/dirPagination.js"></script>
@stop
