var app = angular.module("demo", ["ngRoute", 'ngResource']);




app.config(function($routeProvider) {
	$routeProvider.when('/students', {
		controller: 'StudentCtrl',
		templateUrl: 'app/templates/students.html'
	}).when('/students/create', {
		controller: 'StudentCtrl',
		templateUrl: 'app/templates/student-create.html'
	}).when('/students/:id', {
		controller: 'StudentCtrl',
		templateUrl: 'app/templates/student-profile.html'
	}).when('/students/:id/edit', {
		controller: 'StudentCtrl',
		templateUrl: 'app/templates/student-create.html'
	});
});




app.factory('Student', ['$resource', function ($resource) {
	return $resource(
			'/api/students/:id',
			{ 
				'save' : { method:'POST'}
			}, 
			{ 
				'update': { method:'PUT' } 
			},
			{
				'remove': { method:'DELETE'}
			});
}]);




app.controller('StudentCtrl', ['$scope', '$location', 'Student', '$routeParams', function ($scope,$location,Student,$routeParams) {


	if (document.URL.split('/')[6] == 'edit') {
		$scope.editing = true;
	} else {
		$scope.editing = false;
	}


	if($routeParams.id != undefined) {
		
		if($routeParams.edit == undefined || $routeParams.edit == 'edit') {
			Student.get({id:$routeParams.id},function(data){
				$scope.student = data;
			});
		}

	} else {


		Student.query(function(data){
			$scope.students = data;
		});

	}



	$scope.create_form = function() {
		$location.path('/students/create');
	}



	$scope.save = function() {
		if($scope.editing == true) {
			Student.update({ id:$routeParams.id }, $scope.student, function(response){
				$scope.handleResponse(response);
			});
			return;
		}

		Student.save($scope.student,function(response){
			$scope.handleResponse(response);
		});
	}


	$scope.delete = function(student) {
		Student.remove({id:student.id},function(response){
			angular.forEach($scope.students, function(s,index){
				if(s.id == student.id) {
					$scope.students.splice(index,1);
				}
			});
		});
	}


	$scope.handleResponse = function(response) {
		console.log(response);
		if(response.status == 0) {
			$scope.errors = response.messages;
		} else {
			$scope.errors = undefined;
			$scope.message = "A new student has been created";
			if($scope.editing == true) {
				$scope.message = "Student has been updated";
			} else {
				$scope.student = undefined;
			}
		}
	}
}]); //end of controller.