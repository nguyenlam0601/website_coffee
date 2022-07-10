var app = angular.module('myapp', []); //tao 1 module
app.controller('loaispcontroller', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/lsps"
    }).then(function(response) {
        console.log(response.data);
        $scope.lsps = response.data;
    });
    $scope.serial = 1;
    $scope.showmodal = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Add new product";
           if($scope.lsp) {
            $scope.lsp=null;
           }
          
        } else {
            $scope.modalTitle = "Edit product";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/lsps/" + id
            }).then(function(response) {
                $scope.lsp = response.data;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/lsps/" + id
            }).then(function(response) {
                $scope.message = response.data;
                location.reload();
                
            });
        }
    }
    $scope.saveData = function() {
        if ($scope.id == 0) { //dang them moi sp
            $http({
                method: "POST",
                url: "http://localhost:8000/api/lsps",
                data: $scope.lsp,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();
                //$scope.lsps.push(response.data);

            });
        } else { //sua san pham
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/lsps/" + $scope.id,
                data: $scope.lsp,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                  location.reload();
                
            });
        }
    }
});