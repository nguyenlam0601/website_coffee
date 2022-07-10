@extends('layout_user')
@section('content')
<section class="ftco-section" ng-controller="thanhtoancontroller">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-7 ftco-animate">
                      <form action="#" class="billing-form">
                          <h3 class="mb-4 billing-heading">Chi tiết thanh toán</h3>
                <div class="row align-items-end">
                    <div class="col-md-12">
                  <div class="form-group">
                      <label for="firstname">Họ Tên</label>
                    <input type="text" style="color:black;" class="form-control" placeholder="" ng-model="kh.customer_name">
                  </div>
                </div>
                {{-- <div class="col-md-6">
                  <div class="form-group">
                      <label for="lastname">Họ</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
              </div> --}}
              <div class="w-100"></div>
                  {{-- <div class="col-md-12">
                      <div class="form-group">
                          <label for="country">State / Country</label>
                          <div class="select-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="" id="" class="form-control">
                            <option value="">France</option>
                          <option value="">Italy</option>
                          <option value="">Philippines</option>
                          <option value="">South Korea</option>
                          <option value="">Hongkong</option>
                          <option value="">Japan</option>
                        </select>
                      </div>
                      </div>
                  </div> --}}
                  <div class="w-100"></div>
                  <div class="col-md-12">
                      <div class="form-group">
                      <label for="streetaddress">Địa chỉ giao hàng</label>
                    <input type="text" class="form-control" placeholder="Số nhà và tên đường" ng-model="kh.address">
                  </div>
                  </div>
                  {{-- <div class="col-md-6">
                      <div class="form-group">
                    <input type="text" class="form-control" placeholder="Căn hộ, dãy phòng, căn hộ, v.v.:">
                  </div>
                  </div> --}}
                  <div class="w-100"></div>
                  <div class="col-md-6">
                      <div class="form-group">
                      <label for="towncity">Thị trấn/ Thành phố</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="postcodezip">Mã bưu điện</label>
                    <input type="text" class="form-control" placeholder="">
                  </div>
                  </div>
                  <div class="w-100"></div>
                  <div class="col-md-6">
                  <div class="form-group">
                      <label for="phone">Điện thoại</label>
                    <input type="text" class="form-control" placeholder="" ng-model="kh.phone">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                      <label for="emailaddress">Địa chỉ email</label>
                    <input type="text" class="form-control" placeholder=""ng-model="kh.email">
                  </div>
              </div>
              <div class="w-100"></div>
              <div class="col-md-12">
                  <div class="form-group mt-4">
                                      <div class="radio">
                                        <label class="mr-3"><input type="radio" name="optradio"> Tạo tài khoản? </label>
                                        <label><input type="radio" name="optradio"> Chuyển hàng đến địa chỉ khác</label>
                                      </div>
                                  </div>
              </div>
              </div>
            </form><!-- END -->
                  </div>
                  <div class="col-xl-5">
            <div class="row mt-5 pt-3">
                <div class="col-md-12 d-flex mb-5">
                    <div class="cart-detail cart-total p-3 p-md-4">
                        <h3 class="billing-heading mb-4">Tổng giỏ hàng</h3>
                        <p class="d-flex">
                                  <span>Tạm tính</span>
                                  <span>@{{value|number:0}}</span>
                              </p>
                              <hr>
                              <p class="d-flex total-price">
                                  <span>Tổng</span>
                                  <span>@{{value|number:0}}</span>
                              </p>
                              </div>
                </div>
                <div class="col-md-12">
                    <div class="cart-detail p-3 p-md-4">
                        <h3 class="billing-heading mb-4">Phương thức thanh toán</h3>
                                  <div class="form-group">
                                      <div class="col-md-12">
                                          <div class="radio">
                                             <label><input type="radio" name="optradio" class="mr-2">Thẻ ngân hàng</label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-md-12">
                                          <div class="radio">
                                             <label><input type="radio" name="optradio" class="mr-2">MoMo</label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-md-12">
                                          <div class="radio">
                                             <label><input type="radio" name="optradio" class="mr-2">Zalo Pay</label>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="col-md-12">
                                          <div class="checkbox">
                                             <label><input type="checkbox" value="" class="mr-2"> Tôi đã đọc và chấp nhận các điều khoản và điều kiện</label>
                                          </div>
                                      </div>
                                  </div>
                                  <p><a ng-click="buyCart(kh,sp,value)" class="btn btn-primary py-3 px-4">Đặt hàng</a></p>
                              </div>
                </div>
            </div>
        </div> <!-- .col-md-8 -->
      </div>
    </div>
  </section> <!-- .section -->

     

<script src="/js/angular.min.js"></script>
<script src="/js/sanphamcontroller.js"></script>
<script src="/js/dirPagination.js"></script>
@stop
