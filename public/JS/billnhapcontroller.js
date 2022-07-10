var app = angular.module('myapp', []); //tao 1 module
app.controller('billnhapcontroller', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/billnhaps"
    }).then(function(response) {
        console.log(response.data);
        $scope.billnhaps = response.data;
    });
    $scope.showmodal = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Add new product";
           if($scope.billn) {
            $scope.billn.id_bill_nhap= null;
           
           }
          
        } else {
            $scope.modalTitle = "Edit product";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/billnhaps/" + id
            }).then(function(response) {
                $scope.billn = response.data;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/billnhaps/" + id
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
                url: "http://localhost:8000/api/billnhaps",
                data: $scope.billn,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        } else { //sua san pham
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/billnhaps/" + $scope.id,
                data: $scope.billn,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }
});