<!DOCTYPE html>
<html lang="" ng-app="demo">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<style type="text/css">

			.error {
				color : red;
			}
			.green {
				color: green;
			}
			.student-profile {
				text-align: center;
			}

			.panel-default {
				padding:0;
			}
			.panel-body {
				padding:30;
			}
			li {
				border-bottom: 1px solid #F5F5F5;
				list-style-type: none;
				text-align: center;
				padding-top:10px;
				padding-bottom:10px;
				margin:0;
			}
			ul {
				margin : 0;
				padding:0;
			}

			.btn {
				width: 100%;
				border-radius: 0px 0px 0px 0px;
				height: 60px;
			}
		</style>
	</head>
	<body>
		<h1 class="text-center">Demo REST app</h1>

		<div class="row" ng-controller="StudentCtrl">
			<div  style="margin : 0 auto; width : 500px">
				<div class="panel panel-default">
					<div ng-view></div>
				</div>
			</div>
		</div>
		<!--angular libs-->
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
		<script type="text/javascript" src="https://code.angularjs.org/1.2.26/angular-resource.min.js"></script>
		<script type="text/javascript" src="https://code.angularjs.org/1.2.26/angular-route.min.js"></script>
		<!--angular libs-->

		<!-- app libraries -->
		<script type="text/javascript" src="app/app.js"></script>
		<!-- app libraries -->
	</body>
</html>