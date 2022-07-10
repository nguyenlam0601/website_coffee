

@extends('layout_user')
@section('content')
@include('includes.section1')
@include('includes.section2')

<section class="ftco-section"  ng-controller="sanpham">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Sản phẩm nổi bật</span>
                <h2 class="mb-4">Sản phẩm của chúng tôi</h2>
                <p>Cà phê đã trở thành một món ngon dành cho tâm hồn mỗi người</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-3 " ng-repeat="sp in sanphams" style="height:400px;">
                <div class="product">
                    <a href="#" ng-click="chitiet(sp.id)" class="img-prod" style="height:280px;"><img class="img-fluid"   src="/uploads/image/products/@{{sp.image}}" alt="Colorlib Template">
                        <span class="status">30%</span>
                        <div class="overlay" style="height:400px;"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center" >
                        <h3><a href="ctsps" ng-click="openDetails(sp.id)">@{{sp.product_name}}</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price"><span class="mr-2 price-dc">@{{sp.price|number:0}}</span><span class="price-sale">@{{sp.price|number:0}}</span></p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                <a href="#" ng-click="chitiet(sp.id)" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                    <span><i class="ion-ios-menu"></i></span>
                                </a>
                                <a  ng-click="giohang(sp.id)" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                    <span><i class="ion-ios-cart"></i></span>
                                </a>
                                <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                    <span><i class="ion-ios-heart"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  
</section>
@include('includes.section3')

<script src="/JS/angular.min.js"></script>
<script src="/JS/dirPagination.js"></script>
<script src="/JS/sanphamcontroller.js"> </script> 
@stop
