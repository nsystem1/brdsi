<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<!--(C) Bri Gainley, Alan Estrada, Nick St. Pierre, 2014 -->
<!-- With code from http://www.alessioatzeni.com/blog/signin-dropdown-box-like-twitter-with-jquery/ -->
<!-- for dropdown login menu -->

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>brdsi - A Twitter Newsfeed</title>
        <meta name="description" content="A newsfeed aggregating Twitter's trends, made just for you">
        <meta name="viewport" content="width=device-width">
        <!-- build:css styles/vendor.css -->
        <!-- bower:css -->

        <!-- endbower -->
        <!-- endbuild -->
        <!-- build:css(.tmp) styles/main.css -->
        <link rel="stylesheet" href="styles/reset.css">
        <link rel="stylesheet" href="styles/main.css">
        <link rel="stylesheet" href="styles/homeycombs.css">
        <link rel="icon" type="image/png" href="images/favicon.ico">
        
        <!-- Google Fonts -->
		<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700' rel='stylesheet' type='text/css'>        
        <!-- endbuild -->
        <!--script src="bower_components/modernizr/modernizr.js"></script-->
        
        <!-- angular -->
        <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.2.9/angular.min.js"></script>
        <script src="scripts/angular-route.js"></script>
        
        <!-- jQuery -->
           <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script--> 
        <script src="scripts/honey.js"></script>
        <!--script src="scripts/jquery.homeycombs.js"></script-->

        <!-- For hexagon script -->
        <script type="text/javascript">
            //$(document).ready(
             function homeyComb() {
                console.log("Running homeyComb!!!!!");
                $('.honeycombs').honeycombs({
                combWidth: 200,
                margin: 10
                });
             }//);
        </script>

        <!-- For dropdown login script -->
        <script type="text/javascript">
          $(document).ready(function () {
            $('#login').click(function () {
                $('#loginDropdown').toggle();
                $('#login').addClass('yousuck');
                return false;
            });
            $('#login').click(function(e) {
                e.stopPropagation();
            });
            $(document).click(function() {
                $('#loginDropdown').hide();
                $('#login').removeClass('yousuck');
            });
          });  
        </script>
        
    </head>
    <body ng-app='brdApp'>
	        <div id="top-navbar">
		          <a href="index.html"><img src="images/brdsiLogo.png"></a>
		          <ul>
		            <li><a href="#">Friend Trends</a></li>
		            <li><a href="#">Mood Graph</a></li>
		            <li id="login"><a href="#">Login</a></li>
		          </ul>
		          <div id="loginDropdown">
		          <form method="post" class="signin" action="#">
		                  <fieldset class="textbox">
		                  <label class="username">
		                  <span>Username or email</span>
		                  <input id="username" name="username" value="" type="text" autocomplete="on">
		                  </label>
		                  
		                  <label class="password">
		                  <span>Password</span>
		                  <input id="password" name="password" value="" type="password">
		                  </label>
		                  </fieldset>
		                  
		                  <fieldset class="remb">
		                  <label class="remember">
		                  <input type="checkbox" value="1" name="remember_me" />
		                  <span>Remember me</span>
		                  </label>
		                  <button class="submit button" type="button">Sign in</button>
		                  </fieldset>
		                  <p>
		                  <a class="forgot" href="#">Forgot your password</a>
		                  <br>
		                  </p>
		                  </form>
		          </div>
	          </div>
	        
	        <div ng-view class="content">
	        <script>
          // angular magick thanks to https://www.youtube.com/watch?v=tnXO-i7944M
        
          var app= angular.module('brdApp', ['ngRoute']);

          app.config(function($routeProvider){
            $routeProvider.when('/',
            {
              controller:  'hexagonsController',
              templateUrl: 'pages/hexaSample.html'
              //templateUrl: 'pages/hexaTrend.php',
            
            })
            .when('/about',
            {
              //controller: ''
              templateUrl: 'about.html'
            })
            .when('/trend/:trend',
            {
              //controller: ''
              // the :trends is a unique thing: it takes whatever string follows /trend/ in the url and saves it in a variable for us
              templateUrl: function(routeparams){

                console.log(routeparams);
                console.log("trend is "+routeparams.trend);

                return 'trendLook.php?q='+ encodeURI( routeparams.trend );

              }
            })
            .when('/contact',
            {
              //controller: ''
              templateUrl: 'contact.html'
            })
            .when('/help',
            {
              //controller: ''
              templateUrl: 'help.html'
            })
            .otherwise('/');

          });

          // this controller waits for success, and then runs a setup function
          // for the homeycombs
          app.controller('hexagonsController', [ '$scope', 
                  function($scope){
                    console.log("running hexagonsController");

                    $scope.$on('$viewContentLoaded', function() {
                         console.log("viewcontentLoaded done!!!");
                         homeyComb();
                    });
                  }]);
        
      </script>
	        </div>
	        
	        <div id="footer">
	        	<ul>
					<li><a href="about.html">About</a></li>
					<li><a href="contact.html">Contact</a></li>
					<li><a href="help.html">Help</a></li>        	
            </ul></div>
</body>
</html>