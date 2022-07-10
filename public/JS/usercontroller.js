var app = angular.module('myapp', []); //tao 1 module
app.controller("kh",function($scope,$http){
    $scope.sai="";
    $scope.kh={};
    $scope.dangnhap=function(tk,mk){
        $scope.tk=tk;
        $scope.mk=mk;
        $http({
            method: "GET",
            url: "http://localhost:8000/api/kh1/get/" + $scope.tk+"&"+$scope.mk
        }).then(function(response) {
            sessionStorage.setItem("kh",response.data.id);
            window.location.assign("http://127.0.0.1:8000/clien/trangchus")
        },function(){
            $scope.sai="Sai tài khoản hoặc mật khẩu ?";
            $scope.tk="";
            $scope.mk="";
        });
    }
    $scope.mk1=function(mk,mk2){
        if(mk==mk2){
            $scope.kh.mk=mk;
        }
        else{
            $scope.sai="Nhập lại mật khẩu?";
        }
    }
    $scope.luu=function(kh){
        $http({
            method: "POST",
            url: "http://localhost:8000/api/kh",
            data: kh,
            "content-Type": "application/json"
        }).then(function(response) {
            $scope.message = response.data;
            alert("Đăng ký thành công");
            window.location.assign("http://127.0.0.1:8000/login")
        });
    }
    $scope.dangky=function(tk){
        $scope.tk=tk;
        if($scope.tk!=null){
        $http({
            method: "GET",
            url: "http://localhost:8000/api/kh1/get/" + $scope.tk
        }).then(function(response) {
            $scope.sai="Tài khoản đã tồn tại?";
            $scope.tk="";
            $scope.mk="";
        },function(){
            $scope.mk1($scope.mk,$scope.mk2);
            $scope.kh.tk=$scope.tk;
            $scope.kh.customer_name=$scope.ho+" "+$scope.ten;
            console.log($scope.kh);
            $scope.luu($scope.kh);
        });}
        else{
            $scope.sai="Nhập tài khoản?";
        }
    }
    $scope.sua=function(){
        $scope.sai="";
    }
});
