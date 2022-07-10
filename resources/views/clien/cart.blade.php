@extends('layout_user')
@section('content')
{{-- <section class="ftco-section ftco-cart" ng-init="showshow()">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Tên sản phẩm</th>
                                <th>Size</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center" dir-paginate='sp in sps|itemsPerPage: 5'>
                                <td class="product-remove"><a ng-click="delete(sp)"><span class="ion-ios-close"></span></a></td>

                                <td class="image-prod">
                                    <div class="img" style="background-image:url(/uploads/image/products/@{{sp.sp.image}});"></div>
                                </td>

                                <td class="product-name">
                                    <h3>@{{sp.sp.product_name}}</h3>
                                </td>

                                <td class="product-name">
                                    <h3>@{{sp.size_p.size_product}}</h3>
                                </td>

                                <td class="price" ng-model="gia">@{{sp.sp.price|number}}</td>

                                <td class="quantity">
                                    <div class="input-group mb-3" >
                                        <input type="number" ng-model="sp.amount" ng-change="loai()" name="quantity" class="quantity form-control input-number" ng-value="sp.amount" min="1" max="100">
                                    </div>
                                </td>

                                <td class="total"><label >@{{sp.amount*sp.sp.price|number:0}} <input type="hidden" class="tien" value="@{{sp.amount*sp.sp.price}}"></label></td>
                            </tr><!-- END TR-->
                            <!-- END TR-->
                        </tbody>
                    </table>
                </div>
                <div style="display: flex; justify-content: center;margin:auto;clear: both;width:100%; ">
                    <dir-pagination-controls max-size="10" direction-links="true" boundary-links="true" on-page-change='indexCount(newPageNumber)'>
                    </dir-pagination-controls>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate" style="float: left;">
                <div class="cart-total mb-3">
                    <h3>Mã giảm giá</h3>
                    <p>Nhập mã giảm giá nếu có </p>
                    <form action="#" class="info">
                        <div class="form-group">
                            <label for="">Mã giảm giá</label>
                            <input type="text" class="form-control text-left px-3" placeholder="Mã giảm giá">
                        </div>
                    </form>
                </div>
                <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Sử dụng mã</a></p>
            </div>
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Tổng hóa đơn</h3>
                    <p class="d-flex">
                        <span>Giá sản phẩm</span>
                        <span class="alltien"></span>
                    </p>
                    <p class="d-flex">
                        <span>Vận chuyển</span>
                        <span>00.00</span>
                    </p>
                    <p class="d-flex">
                        <span>Giảm giá</span>
                        <span>00.00</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Tổng</span>
                        <span class="alltien"></span>
                    </p>
                </div>
                <p><a href="/checkout" class="btn btn-primary py-3 px-4">Thanh toán</a></p>
            </div>
        </div>
    </div>
    
</section> --}}

<section class="ftco-section ftco-cart" ng-controller="cartcontroller">
    <div class="container" >
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Tên sản phẩm</th>
                                {{-- <th>Size</th> --}}
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="text-center" ng-repeat='sp in cartsp track by $index'>
                                <td class="product-remove"><a ng-click="deletecart($index)"><span class="ion-ios-close"></span></a></td>

                                <td class="image-prod">
                                    <div class="img" style="background-image:url(/uploads/image/products/@{{sp.image}});"></div>
                                </td>

                                <td class="product-name">
                                    <h3>@{{sp.product_name}}</h3>
                                </td>

                                {{-- <td class="product-name">
                                    <h3>@{{sp.size[0].size_product}}</h3>
                                </td> --}}

                                <td class="price" ng-model="gia">@{{sp.price|number}}</td>

                                <td class="quantity">
                                    <div class="input-group mb-3" >
                                        <input type="number" ng-model="sp.quatity" ng-change="loai(sp)" name="quatity" class="quantity form-control input-number" min="1" max="100">
                                    </div>
                                </td>
                                <td class="price" ng-model="gia">@{{sp.price*sp.quatity|number}}</td>
                            </tr><!-- END TR-->
                            <!-- END TR-->
                        </tbody>
                    </table>
                </div>
                <div style="display: flex; justify-content: center;margin:auto;clear: both;width:100%; ">
                    <dir-pagination-controls max-size="10" direction-links="true" boundary-links="true" on-page-change='indexCount(newPageNumber)'>
                    </dir-pagination-controls>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate" style="float: left;">
                <div class="cart-total mb-3">
                    <h3>Mã giảm giá</h3>
                    <p>Nhập mã giảm giá nếu có </p>
                    <form action="#" class="info">
                        <div class="form-group">
                            <label for="">Mã giảm giá</label>
                            <input type="text" class="form-control text-left px-3" placeholder="Mã giảm giá">
                        </div>
                    </form>
                </div>
                <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Sử dụng mã</a></p>
            </div>
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Tổng hóa đơn</h3>
                    <p class="d-flex">
                        <span>Giá sản phẩm</span>
                        <span class="alltien">@{{tongtien}}</span>
                    </p>
                    <p class="d-flex">
                        <span>Vận chuyển</span>
                        <span>00.00</span>
                    </p>
                    <p class="d-flex">
                        <span>Giảm giá</span>
                        <span>00.00</span>
                    </p>
                    <hr>
                    <p class="d-flex total-price">
                        <span>Tổng</span>
                        <span class="alltien">@{{tongtien|number:0}}</span>
                    </p>
                </div>
                <p><a ng-click="thanhtoantien(tongtien)" class="btn btn-primary py-3 px-4">Thanh toán</a></p>
            </div>
        </div>
    </div>
    
</section>

<script src="/js/angular.min.js"></script>
<script src="/js/sanphamcontroller.js"></script>
<script src="/js/dirPagination.js"></script>
@stop
