<div class="py-1 bg-primary"  >
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+035 876 3400</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">MyEmail@email.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
						    <span class="text">Hưng Yên &amp; Việt Nan</span>
					    </div>
				    </div>
			    </div>
		    </div>
		  </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar" ng-controller="sanphamcontroller">
	    <div class="container">
	      <a class="navbar-brand" href="/clien/trangchus">COFFEE HOUSE</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="/clien/trangchus" class="nav-link">Trang chủ</a></li>
	          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="/loaisanpham" id="dropdown04" aria-haspopup="true" aria-expanded="false">Loại sản phẩm</a>
              <div class="dropdown-menu" aria-labelledby="dropdown04" >
              	<a class="dropdown-item" href="#" ng-repeat="sp in lsps" ng-click="all(sp.id)">@{{sp.category_name}}</a>
              	{{-- <a class="dropdown-item" href="wishlist.html">Wishlist</a>
                <a class="dropdown-item" href="product-single.html">Single Product</a>
                <a class="dropdown-item" href="cart.html">Cart</a>
                <a class="dropdown-item" href="checkout.html">Checkout</a> --}}
              </div>
            </li>
	          <li class="nav-item"><a href="/about" class="nav-link">Về chúng tôi</a></li>
	          <li class="nav-item"><a href="/blog" class="nav-link">Blog</a></li>
	          {{-- <li class="nav-item"><a href="contact.html" class="nav-link">Liên hệ</a></li> --}}
			  <li class="nav-item dropdown" >
				  <a class="nav-link dropdown-toggle" href="/login" ng-model="dangnhap">@{{dangnhap}}</a>
				<div class="dropdown-menu" aria-labelledby="dropdown04" ng-show="test">
			
				  <a class="dropdown-item" href="#" ng-click="dangxuat()" >Đăng xuất</a>
			  </div>
			</li>
	          <li class="nav-item cta cta-colored"><a ng-click="giohangvao()" class="nav-link"><span class="icon-shopping_cart"></span></a></li>

	        </ul>
	      </div>
	    </div>
		
	  </nav>
