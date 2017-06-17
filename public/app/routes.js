var arsipti =  angular.module('ArsipTI-App',['ngRoute','angularUtils.directives.dirPagination']);
arsipti.config(['$routeProvider',
    function($routeProvider) {
        $routeProvider.
            when('/', {
                templateUrl: 'templates/home.html',
                controller: 'AdminController'
            }).
            when('/taglist', {
                templateUrl: 'templates/tags.html',
                controller: 'TagController'
            });
}]);