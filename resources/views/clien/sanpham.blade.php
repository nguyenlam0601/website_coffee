@extends('layout_user')
@section('content')
<section class="ftco-section" ng-controller="sanpham" ng-init="show1()">
    <div style="margin-left:80px;height:80px;">
        <label style="float:left;"><b>Loại sản phẩm:</b></label>
        <select  ng-model="lsp" style="float:left;height:28px !important;;margin-left: 6px;width:300px;padding:0px;" class="form-control form-control-lg">
            <option ng-repeat="lsp in lsps" value="@{{lsp.id}}">@{{lsp.category_name}}</option>
            <option value="0">-----------------</option>
        </select>
        {{-- <label style="float:left;margin-left: 6px"><b>Nhà cung cấp:</b></label>
        <select ng-model="ncc" style="float:left;margin-left: 10px;width:300px;padding:0px; height:28px !important;" class="form-control form-control-lg">
            <option ng-repeat="ncc in nccs" value="@{{ncc.id}}">@{{ncc.tenncc}}</option>
            <option value="0">-----------------</option>
        </select> --}}
        <button class="btn btn-primary" style="float:left;margin-left: 10px;width:100px;padding:0px; height:28px !important;" ng-click="show2()">Lọc</button>
    </div>
    <div id="sp" class="container" style="clear: both;;">
        <div class="row">
            <div class="col-md-6 col-lg-3" dir-paginate="sp in sanpham|itemsPerPage: 8" style="height:400px;">
                <div class="product">
                    <a href="#"ng-click="chitiet(sp.id)" class="img-prod" style="height:280px;"><img class="img-fluid" src="/uploads/image/products/@{{sp.image}}" alt="Colorlib Template">
                        <span class="status">30%</span>
                        <div class="overlay" style="height:400px;"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="#">@{{sp.product_name}}</a></h3>
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
                                <a ng-click="giohang(sp.id,null)" class="buy-now d-flex justify-content-center align-items-center mx-1">
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

    <div style="display: flex; justify-content: center;margin:auto;clear: both;width:100%; ">
        <dir-pagination-controls max-size="10" direction-links="true" boundary-links="true" on-page-change='indexCount(newPageNumber)'>
        </dir-pagination-controls>
    </div>

</section>

<script src="/js/angular.min.js"></script>
<script src="/js/sanphamcontroller.js"></script>
<script src="/js/dirPagination.js"></script>

@stop
