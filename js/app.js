var myApp = angular.module("crud", ["ngRoute"]); 
myApp.config(function($routeProvider){
   $routeProvider
   .when('/', {
       templateUrl: 'Template/post.html',
       controller: 'postCtrl'
   })
   .when('/post/:id', {
       templateUrl: 'Template/view.html',
       controller: 'viewCtrl'
   })
   .when('/createPost', {
    templateUrl: 'Template/create.html',
    controller: 'createCtrl'
   })
   .when('/delete/:id', {
    templateUrl: 'Template/delete.html',
    controller: 'deleteCtrl'
    })
});
myApp.controller("postCtrl", function($scope, $http){
   $http.get("http://127.0.0.1:1234/AngularCRUD/webservices/allposts.php")
   .then(function(response){
      $scope.posts = response.data;
    //   console.log($scope.posts);
   });
});
myApp.controller("viewCtrl", function($scope, $http, $routeParams){
    $http({
         url: "http://127.0.0.1:1234/AngularCRUD/webservices/getPost.php",
         params:{id:$routeParams.id},
         method: "get"
    })
    .then(function(response){
       $scope.posts= response.data;
    });
 });
 myApp.controller("deleteCtrl", function($scope, $http, $routeParams){
    $http({
         url: "http://127.0.0.1:1234/AngularCRUD/webservices/delete.php",
         params:{id:$routeParams.id},
         method: "get"
    })
    .then(function(response){
       $scope.posts= response.data;
       
    });
 });
myApp.controller("createCtrl" , function($scope){
   $("#submit").click(function(){
       console.log("Start submit");
       var title = $("#title").val();
       var description = $("#description").val();
       var dataString = $("#addpostform").serialize();
       if (title == "" || description == "" ){
            console.log("Start error");
           $("#msg").html("Please fill all details!");
       }
       else
       {
           console.log("Start submit 2",dataString);
           $.ajax({
              type: 'POST',
              url: 'http://127.0.0.1:1234/AngularCRUD/webservices/Addpost.php',
              data : dataString,
              cashe: false,
              success: function(result){
                 $("#msg").html(result);
                 var title = $("#title").val("");
                 var description = $("#description").val("");
              }
           });
       }
       return false;
   });
});