var app = angular.module('myapp', ['angularUtils.directives.dirPagination']); //tao 1 module
app.config(function(paginationTemplateProvider) {
    paginationTemplateProvider.setPath('../pagination/customTemplate.html');
});
app.controller('sanphamcontroller', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/lsps"
    }).then(function(response) {
        console.log(response.data);
        $scope.lsps = response.data;
    });
    $scope.timkiem="";
    $scope.indexCount = function(newPageNumber){
        $scope.serial = newPageNumber * 5 - 4;
    }
    $scope.serial = 1;
    $http({
        method: "GET",
        url: "http://localhost:8000/api/products"
    }).then(function(response) {
        console.log(response.data);
        $scope.products = response.data;
    });
    $scope.showmodal = function(id, index) {
        $scope.id = id;
       
        if (id == 0) {
            $scope.modalTitle = "Add new product";
           if($scope.product) {
            $scope.product=null;
           }
          
        } else {
            $scope.modalTitle = "Edit product";
            $scope.selected_index=index;
            $http({
                method: "GET",
                url: "http://localhost:8000/api/products/" + id
            }).then(function(response) {
                $scope.product = response.data;
                $scope.product.id_category=$scope.product.id_category + '';

            });
        }
        $('#modelId').modal('show');
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/products/" + id
            }).then(function(response) {
                $scope.message = response.data;
                location.reload();
            });
        }
    }
    $scope.saveData = function() {
        if ($scope.id == 0) { //dang them moi sp
            $scope.product.image=document.getElementById("img").innerHTML;
            $scope.product.id_category=$scope.id_category;
            $http({
                method: "POST",
                url: "http://localhost:8000/api/products",
                data: $scope.product,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                // console.log(response.data);
                location.reload();

            });
        } else { //sua san pham
            $scope.product.image=document.getElementById("img").innerHTML;
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/products/" + $scope.id,
                data: $scope.product,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                // console.log(response.data);
                location.reload();
                //console.log($scope.selected_index);
                //$scope.products[$scope.selected_index].product_name=response.data[0].product_name;
                // console.log($scope.products[$scope.selected_index]);
                // $('#modelId').modal('hide');
            });
        }
    }
    //Đăng nhập
    $scope.test=false;
    $scope.kh="";
    if(sessionStorage.getItem("kh")==null){
        $scope.dangnhap="Đăng nhập";
    }
    else{
        $http({
            method: "GET",
            url: "http://localhost:8000/api/kh/"+ sessionStorage.getItem("kh")
        }).then(function(response) {
            $scope.kh = response.data.customer_name;
            console.log($scope.kh);
           $scope.dangnhap=$scope.kh;
           $scope.test=true;
        });
    }
    //Kiểm tra trước khi vào giỏ hàng
    $scope.giohangvao=function(){
        if(sessionStorage.getItem("kh")==null){
            alert("Cần đăng nhập");
        }else{
            window.location.assign("http://127.0.0.1:8000/giohang");
        }
    }
    //Đăng xuất
    $scope.dangxuat=function(){
        sessionStorage.removeItem("kh");
        location.reload();
    }
    //Lấy loại sản phẩm theo id
    $scope.all=function(id){
        sessionStorage.setItem('lsp',id);
        window.location.assign("http://127.0.0.1:8000/loaisanpham")
    }
   
});


app.controller('sanpham', function($scope, $http) { //tao 1 controller
   
    
//Lấy 8 sản phẩm trang chủ
    $http({
        method: "GET",
        url: "http://localhost:8000/api/sanpham3/get"
    }).then(function(response) {


        $scope.sanphams = response.data;
    });
    //Hiện trang chi tiết sản phẩm
    $scope.chitiet = function(id) {
        $scope.id = id;
        sessionStorage.setItem("id",$scope.id);
        // alert(sessionStorage.getItem("id"));
        window.location.assign("http://127.0.0.1:8000/chitiet")
    }
    //Lấy sản phẩm chi tiết
    $http({
        method: "GET",
        url: "http://localhost:8000/api/sanpham1/get/"+sessionStorage.getItem("id")
    }).then(function(response) {
        // console.log(response.data);
        $scope.sp1 = response.data;
    });
    //Lấy sản phẩm liên quan 
    $http({
        method: "GET",
        url: "http://localhost:8000/api/sanpham2/get/"+sessionStorage.getItem("id")
    }).then(function(response) {
        // console.log(response.data);
        $scope.sp3 = response.data;
    });
    //Tìm theo loại sản phẩm
    $scope.lsp=0;
    $scope.show2=function(){
        if( $scope.lsp=="0"){

            alert($scope.lsp);
        }
        else{
            $http({
                method: "GET",
                url: "http://localhost:8000/api/sanpham4/get/" + $scope.lsp
            }).then(function(response) {
                $scope.sanpham = response.data;
            });
            document.getElementById("sp").reload;
        }
        
    }
    //Lấy sản phẩm theo loại
    $scope.show1=function(){
        $http({
            method: "GET",
            url: "http://localhost:8000/api/lsps"
        }).then(function(response) {
            $scope.lsps = response.data;
        });
        if(sessionStorage.getItem('lsp')!=null){

            $http({
                method: "GET",
                url: "http://localhost:8000/api/sanpham4/get/" + sessionStorage.getItem('lsp')
            }).then(function(response) {
                $scope.sanpham = response.data;
                $scope.lsp=sessionStorage.getItem('lsp');
                sessionStorage.removeItem('lsp');
                // alert($scope.lsp);
            });
        }
        else{
            $http({
                method: "GET",
                url: "http://localhost:8000/api/products"
            }).then(function(response) {
                $scope.sanpham = response.data;
            });
        }
    }
    //Tăng giảm số lượng
    $scope.amount=1;
    $scope.tang=function(){       
            $scope.soluong=$scope.soluong+1;        
    }
    $scope.giam=function(){
        if($scope.soluong>1){
            $scope.soluong=$scope.soluong-1;
        }
    }
    //Thêm giỏ hàng
    // $scope.addToCart = function(id) {
    //     // alert("alo");
    //     $http({
    //         method: "Get",
    //         url: "http://127.0.0.1:8000/api/add-to-cart/" + id
    //     }).then(function(response) {
    //         alert('Thêm sản phẩm vào giỏ hàng');
    //         sessionStorage.setItem('cart' , JSON.stringify (response.data));
    //     }, function() {
    //         alert('error');
    //     });
    // }
});

app.controller('giohangcontroller', function($scope, $http) {
    $scope.showtt=function(){
        if(sessionStorage.getItem("kh")==null){
            $scope.dangnhap="Đăng nhập";
        }
        else{
            $http({
                method: "GET",
                url: "http://localhost:8000/api/kh/"+ sessionStorage.getItem("kh")
            }).then(function(response) {
                $scope.kh = response.data;
                $scope.dangnhap=$scope.kh.customer_name;
                $scope.tien=sessionStorage.getItem('gia');
                sessionStorage.setItem('kh',response.data.giohang.id);
            });
        }
    }

    // $scope.giohang=function(b1,b2,b3){
    //     $scope.hanghoa={};
    //     $scope.id=b1;
    //     $scope.id2=b2;
    //     $scope.id3=b3;
    //     if(sessionStorage.getItem("kh")==null){
    //         alert("Cần đăng nhập!");
    //     }else{
    //         $http({
    //             method: "GET",
    //             url: "http://localhost:8000/api/sanpham1/get/"+$scope.id
    //         }).then(function(response) {
    //             $scope.sp = response.data;
    //             $scope.hanghoa.id=sessionStorage.getItem("kh");
    //             $scope.hanghoa.id_product=$scope.sp.id;
    //             if (b2==null){
    //                 $scope.hanghoa.sl=1;
    //                 $scope.hanghoa.id_size=$scope.sp.size[0].id;
    //              }else{
    //                 $scope.hanghoa.sl=$scope.id2;
    //                 $scope.hanghoa.id_size=$scope.id3;
    //             }
    //             $scope.add($scope.hanghoa);
                
    //         });
    //     }
    // }

    
    $scope.giohang=function(b1){
        if(JSON.parse(localStorage.getItem('cart'))){
            $scope.cart=JSON.parse(localStorage.getItem('cart'));
        }
        else{
            $scope.cart=[];
        }
        console.log($scope.cart);
            $http({
                method: "GET",
                url: "http://localhost:8000/api/getsp/"+b1
            }).then(function(response) {
                $scope.sp=response.data;
                console.log($scope.sp);
                if(JSON.parse(localStorage.getItem('cart'))){
                    $scope.sanpham=JSON.parse(localStorage.getItem('cart'));
                    console.log($scope.sanpham);
                    var check=true;
                    $scope.sanpham.forEach(item=>{
                        if(item.id==$scope.sp.id){
                            item.quatity=item.quatity+1;

                            check=false;
                        }
                    })
                    if(check){
                        $scope.sp['quatity']=1;
                        $scope.cart.push($scope.sp);
                        alert("Thêm thành công");
                        localStorage.setItem("cart",JSON.stringify($scope.cart));
                       
                    }

                }
                else{
                    $scope.sp['quatity']=1;
                    $scope.cart.push($scope.sp);
                    alert("Thêm thành công");
                    localStorage.setItem("cart",JSON.stringify($scope.cart));
                   
                }
            });

           // document.location.href='/giohangs';
    }

    

    
});

app.controller('cartcontroller', function($scope, $http) {
    $scope.cartsp=JSON.parse(localStorage.getItem('cart'));
    $scope.tongtien=0;
    $scope.cartsp.forEach(item=>{
        $scope.tongtien =$scope.tongtien + (item.quatity*item.price)
    })

    $scope.sum = function(q,p)
    {
        return q*p;
    }
    $scope.loai = function(sp)
    {
        var sum =0;
        $scope.cartsp.forEach(item=>{
            // if(item.id == sp.id){

            // }
            sum =sum + (item.quatity*item.price)
        })
        $scope.tongtien=sum;
        localStorage.setItem("cart",JSON.stringify($scope.cartsp));
    }

    $scope.deletecart=function(index){
        var sp1=JSON.parse(localStorage.getItem('cart'));
        console.log($scope.sp1);
        sp1.splice(index,1);
        localStorage.setItem('cart',JSON.stringify(sp1));
        document.location.reload();
    }

    $scope.thanhtoantien=function(tien){
        localStorage.setItem('tongtien',JSON.stringify(tien));
        document.location.href='/thanhtoans'
    }
})

app.controller('thanhtoancontroller', function($scope, $http) {
    $scope.value=JSON.parse(localStorage.getItem('tongtien'));
    $scope.sp=JSON.parse(localStorage.getItem('cart'));
    $http({
        method: "GET",
        url: "http://localhost:8000/api/kh/"+ sessionStorage.getItem("kh")
    }).then(function(response) {
        $scope.kh = response.data;
    });

    $scope.addhang={
        //"id": 1,
        "date_order": "",
        "total": "",
        "delivery_address":"",
        "id_customer":"",
        "bill_detail":[ ]
    }
    
    $scope.buyCart=function(kh,sanphams,total){
        console.log(kh);
        console.log(sanphams);
        // $scope.addhang.MaDH=Math.floor(Date.now() * Math.random());
        $scope.addhang.date_order=new Date();
        $scope.addhang.delivery_address=kh.address;
        $scope.addhang.total=total;
        $scope.addhang.id_customer=kh.id;
        sanphams.forEach(item=>{
            let CTDH={
                // "id":"",
                "id_product":"",
                "amount":"",
                "image":"",
                "price":"",
            }
            // $scope.CTDH.MaCTDH=Math.floor(Date.now() * Math.random());
            CTDH.id_product=item.id;
            CTDH.amount=item.quatity;
            CTDH.image=item.image;
            CTDH.price=item.price;
            $scope.addhang.bill_detail.push(CTDH);
        })
        console.log($scope.addhang);


        $http({
            method: "POST",
            url: "http://localhost:8000/api/themdonhang",
            data: $scope.addhang
        }).then(function (response) {
            console.log(response.data);
            localStorage.removeItem("cart");
            alert("Đơn hàng của bạn đã được đặt thành công!");
            document.location.href="/clien/trangchus";
        });
    }

})
