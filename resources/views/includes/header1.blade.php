<header>
    <div class="header-container">
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <!-- For version 1,2,3 -->
              <div class="dropdown block-language-wrapper">
                <a href="#" class="block-language dropdown-toggle" data-target="#" data-toggle="dropdown"
                  role="button"> <img src="../skin/frontend/rwd/bolt/images/flags/bolt.png" alt="bolt" /> English
                  <span class="caret"></span> </a>
                <ul role="menu" class="dropdown-menu">
                  <li role="presentation"><a href="bolt/indexad03.html?___from_store=bolt" tabindex="-1"
                      role="menuitem">
                      <img src="../skin/frontend/rwd/bolt/images/flags/bolt.png" alt="English" />
                      English </a></li>
                  <li role="presentation"><a href="boltfr/indexad03.html?___from_store=bolt" tabindex="-1"
                      role="menuitem">
                      <img src="../skin/frontend/rwd/bolt/images/flags/boltfr.png" alt="French" />
                      French </a></li>
                </ul>
              </div>
              <!--dropdown block-language-wrapper-->
              <!-- End for version 4 -->
            </div>
            <!--col-xs-12 col-sm-6-->
            <div class="col-xs-6 hidden-xs">
              <div class="toplinks">
                <div class="links">
                  <div class="myaccount"><a href="bolt/customer/account/index.html" title="My Account"><span
                        class="hidden-xs">My Account</span></a></div>
                  <div class="check"><a href="bolt/checkout/onepage/index.html" title="Checkout">
                      <span class="hidden-xs">Checkout</span></a>
                  </div>
                  <div class="demo"><a href="bolt/blog.html" title="Blog"><span class="hidden-xs">Blog</span></a>
                  </div>
                  <!-- Header Company -->
                  <div class="dropdown block-company-wrapper hidden-xs"> <a href="#"
                      class="block-company dropdown-toggle" data-target="#" data-toggle="dropdown" role="button">
                      Company <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li role="presentation"><a title="About Us" href="bolt/about-us/index.html"> About Us </a></li>
                      <li role="presentation"><a title="Customer Service" href="#"> Customer Service </a></li>
                      <li role="presentation"><a title="Privacy Policy" href="#"> Privacy Policy </a></li>
                      <li role="presentation"><a title="Site Map"
                          href="bolt/catalog/seo_sitemap/category/index.html">Site Map </a></li>
                      <li role="presentation"><a title="Search Terms"
                          href="bolt/catalogsearch/term/popular/index.html">Search Terms </a></li>
                      <li role="presentation"><a title="Advanced Search"
                          href="bolt/catalogsearch/advanced/index.html">Advanced Search </a></li>
                    </ul>
                  </div>
                  <!-- End Header Company -->
                  <div class="login"><a href="bolt/customer/account/login/index.html" title="Log In"><span
                        class="hidden-xs">Log In</span></a>
                  </div>
                </div>
                <!--links-->
              </div>
              <!--toplinks-->
            </div>
            <!--col-xs-6 hidden-xs-->
          </div>
          <!--row-->
        </div>
        <!--container-->
      </div>
      <!--header-top-->
      <div class="header-m">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 hidden-xs">
              <!-- For version 1,2 -->
              <div class="search-box">
                <form id="search_mini_form" action="http://mas1.magikthemes.com/index.php/bolt/catalogsearch/result/"
                  method="get">
                  <!-- Autocomplete End code -->
                  <input type="text" name="search" value="" ng-model="timkiem"  placeholder="Search" class="searchbox" id="search" autocomplete="off"/>
                  <button id="submit-button-search-header"  type="button" class="btn btn-default search-btn-bg"><i class="fa fa-search" style="color:#1eaef5" ></i></button>
                  <div class="search-autocomplete" id="search_autocomplete" style="display: none;"></div>   
                  <script type="text/javascript">
                    var searchForm = new Varien.searchForm('search_mini_form', 'search', 'Search entire store here...');
                    $j('html').click(function () {
                      $j('#search_autocomplete').hide();
                    });
                    $j("#search").keyup(function () {
                      var text = $j(this).val();
                      var chars = text.length;
                      if (chars > 2) {
                        $j("#processing-image").show();
                        var postData = $j('#search_mini_form').serializeArray();
                        $j.ajax({
                          url: 'http://mas1.magikthemes.com/index.php/bolt/catalogsearch/ajax/suggest/',
                          type: "POST",
                          data: postData,
                          success: function (data) {
                            $j("#processing-image").hide();
                            $j('#search_autocomplete').html(data).show();
                          }
                        });
                      }
                    });
                  </script>
                </form>
              </div>
              <!--search-box-->
              <!-- End for version 4 -->
            </div>
            <!--col-lg-3 col-md-4 col-sm-4 col-xs-12 hidden-xs-->
            <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12 logo-block">
              <div class="mm-toggle-wrap">
                <div class="mm-toggle"><i class="fa fa-align-justify"></i><span class="mm-label">Menu</span> </div>
              </div>
              <!--mm-toggle-wrap-->
              <div class="logo" >
                <!-- For version 1 -->
                <a href="bolt/index.html" title="Magento Commerce">
                  <div><img src="../image/logo1.png" alt="Laptop Store" style="width:50%; height:50%" /></div>
                </a>
              </div>
              <!--logo-->
            </div>
            <!--col-lg-6 col-md-4 col-sm-4 col-xs-12 logo-block-->
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
              <div class="top-cart-contain pull-right">
                <div class="mini-cart">
                  <!-- For version 1,2 -->
                  <div class="basket">
                    <a href="cart">
                      <span class="cart_count">
                        0 </span>
                      <span class="price">My Cart / <span class="price">$0.00</span></span>
                    </a>
                  </div> <!-- basket -->
                  <!-- End for version 4 -->
                  <div>
                    <div class="top-cart-content">
                      <p class="a-center noitem">You have no items in your shopping cart.</p>
                    </div>
                    <!--top-cart-content-->
                  </div>
                </div>
                <!--mini-cart-->
              </div>
              <!--top-cart-contain pull-right-->
            </div>
            <!--col-lg-3 col-md-4 col-sm-4 col-xs-12-->
          </div>
          <!--row-->
        </div>
        <!--container-->
      </div>
      <!--header-m-->
  </header>