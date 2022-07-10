var app = angular.module('myapp', ['angularUtils.directives.dirPagination']); //tao 1 module
app.controller('cartcontroller', function($scope, $http) { //tao 1 controller
    // alert(sessionStorage.getItem('cart'));
    $scope.carts = JSON.parse(sessionStorage.getItem('cart'));
    // alert($scope.carts.name);
    console.log($scope.carts);
    $scope.deleteFromCart = function(id) {
        $http({
            method: "Get",
            url: "http://127.0.0.1:8000/delete-from-cart/" + id
        }).then(function(response) {
            alert('Xoá sản phẩm thành công');
            location.reload();
        }, function() {
            alert('error');
        });
    }
    $scope.getTotal = function(){
        var total = 0;
            for(var i = 0; i < $scope.carts.length; i++){
                var products = $scope.carts[i];
                total += (products.price * products.qty);
                alert(products.price);
            }
            
            return total;
        
    }

    $scope.checkOut = function(){
        alert('active');
        $http({
            method: "POST",
            url: "http://localhost:8000/api/orders",
            data: $scope.order,
            "content-Type": "application/json"
        }).then(function(response) {
            $scope.message = response.data;
            console.log(response.data);
            location.reload();

        });
    }
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
        $scope.serial = newPageNumber * 8 - 7;
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
   
});