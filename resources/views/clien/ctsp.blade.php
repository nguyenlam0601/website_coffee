@extends('layout_user')
@section('content')
<section class="ftco-section"  ng-controller="sanpham">
    	<div class="container">
    		<div class="row">
                <script type="text/javascript">
                    // var optionsPrice = new Product.OptionsPrice([]);
                  </script>
    			<div class="col-lg-6 mb-5 ftco-animate">
    				<a href="images/product-1.jpg" class="image-popup"><img src="/uploads/image/products/@{{sp1.image}}" style="width: 540px;height:450px;" class="img-fluid" alt="Colorlib Template"></a>
    			</div>
    			<div class="col-lg-6 product-details pl-md-5 ftco-animate">
    				<h3 >@{{sp1.product_name}}</h3>
    				<div class="rating d-flex">
							<p class="text-left mr-4">
								<a href="#" class="mr-2">5.0</a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
								<a href="#"><span class="ion-ios-star-outline"></span></a>
							</p>
							<p class="text-left mr-4">
								<a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Lượt bình chọn</span></a>
							</p>
							<p class="text-left">
								<a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Đã bán</span></a>
							</p>
						</div>
    				<p class="price"><span>@{{sp1.price|number:0}}đ</span></p>
    				<p>@{{sp1.description}}
						</p>
						<div class="row mt-4">
							<div class="col-md-6">
								<div class="form-group d-flex">
		              <div class="select-wrap">
	                  <div class="icon"><span class="ion-ios-arrow-down"></span></div>
	                  <select ng-model="sizes" name="" id="" class="form-control">
	                  	<option ng-repeat="sp in sp1.size" value="@{{sp.id}}">@{{sp.size_product}}</option>
	                  </select>
	                </div>
		            </div>
							</div>
							<div class="w-100"></div>
							<div class="input-group col-md-6 d-flex mb-3">
								<span class="input-group-btn mr-2">
									<button type="button" class="quantity-left-minus btn" ng-click="giam()">
										<i class="ion-ios-remove"></i>
									</button>
								</span>
								<label style="width:100px;text-align: center;margin-top:5px;" ng-model="soluong">1</label>
								<span class="input-group-btn ml-2">
									<button type="button" class="quantity-right-plus btn" ng-click="tang()">
										<i class="ion-ios-add"></i>
									</button>
								</span>
							</div>
	          	<div class="w-100"></div>
          	</div>
          	<p><a ng-click="giohang(sp1.id)" class="btn btn-black py-3 px-5">Thêm vào giỏ hàng</a></p>
    			</div>
    		</div>
    	</div>
    </section>

    <section class="ftco-section" ng-controller="sanpham">
    	<div class="container">
				<div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
          	<span class="subheading">Các sản phẩm khác</span>
            <h2 class="mb-4">Những sản phẩm liên quan</h2>
        </div>
    	</div>
    	<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-3 ftco-animate" ng-repeat="sp in sp3" style="height:400px;">
					<div class="product">
						<a href="ctsps" class="img-prod" style="height:280px;"><img class="img-fluid"  ng-click="openDetails(sp.id)" src="/uploads/image/products/@{{sp.image}}" alt="Colorlib Template">
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
									<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
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
<script src="/JS/angular.min.js"></script>
<script src="/JS/sanphamcontroller.js"></script>
<script src="/JS/dirPagination.js"></script>
@stop