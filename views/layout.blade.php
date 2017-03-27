<!DOCTYPE html>
<html lang="en" ng-app="wtmApp">
<head>

<!-- IMPORT THE ANGULAR JS LIBRARY -->
<script src="https://code.angularjs.org/latest/angular.js"></script>

<!-- IMPORT THE ANGULAR JS ROUTING LIBRARY -->
<script src="https://code.angularjs.org/latest/angular-route.js"></script>

<!-- IMPORT THE MODULES -->
<script src="{{asset('js/wtmApp.module.js')}}"></script>

<!-- IMPORT THE CONTROLLERS -->
<script src="{{asset('js/riderList.controller.js')}}"></script>

<!-- IMPORT THE CONTROLLERS -->
<script src="{{asset('js/userteamList.controller.js')}}"></script>

<!-- IMPORT THE CONTROLLERS -->
<script src="{{asset('js/rideruserteamList.controller.js')}}"></script>

	<!-- Latest compiled and minified JQuery -->
<script src="https://code.jquery.com/jquery-3.1.1.min.js"  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="  crossorigin="anonymous"></script>

	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- font aweseom -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


	<title>World Tour Manager | <?php echo 'Pagename function' ?></title>
</head>
<body>

@include('topnavigation') 
 
<div class="container-fluid">
	@yield('main-content')
</div>

@include('footer')

</body>
</html>





 