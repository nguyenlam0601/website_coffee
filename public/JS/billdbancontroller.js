var app = angular.module('myapp', ['angularUtils.directives.dirPagination']); //tao 1 module
app.config(function(paginationTemplateProvider) {
    paginationTemplateProvider.setPath('../pagination/customTemplate.html');
});
app.controller('billdbancontroller', function($scope, $http) { //tao 1 controller
    $http({
        method: "GET",
        url: "http://localhost:8000/api/billdbs"
    }).then(function(response) {
        console.log(response.data);
        $scope.billdbs = response.data;
    });
    $scope.showmodal = function(id) {
        $scope.id = id;
        if (id == 0) {
            $scope.modalTitle = "Add new product";
           if($scope.billdb) {
            $scope.billdb.id_bill_ban="";
            $scope.billdb.id_sp="";
            $scope.billdb.sl="";
           }
          
        } else {
            $scope.modalTitle = "Edit product";
            $http({
                method: "GET",
                url: "http://localhost:8000/api/billdbs/" + id
            }).then(function(response) {
                $scope.billdb = response.data;
            });
        }
        $('#modelId').modal('show');
    }
    $scope.deleteClick = function(id) {
        var hoi = confirm("Ban co muon xoa that khong");
        if (hoi) {
            $http({
                method: "DELETE",
                url: "http://localhost:8000/api/billdbs/" + id
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
                url: "http://localhost:8000/api/billdbs",
                data: $scope.billdb,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        } else { //sua san pham
            $http({
                method: "PUT",
                url: "http://localhost:8000/api/billdbs/" + $scope.id,
                data: $scope.billdb,
                "content-Type": "application/json"
            }).then(function(response) {
                $scope.message = response.data;
                console.log(response.data);
                location.reload();

            });
        }
    }
});