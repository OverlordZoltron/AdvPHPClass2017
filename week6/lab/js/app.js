//App function holding options and configuration for the app
(function () {
    //Use Strict Javascript
    'use strict';
    //Create module and attach options and configuration
    angular
            .module('app', ['ngRoute'])
            .config(config);
    
    //Inject the parameter using config
    config.$inject = ['$routeProvider'];
    
    //Function for this module
    function config($routeProvider) {
        $routeProvider.
                when('/', {
                    templateUrl: 'js/phone-list.template.html',
                    controller: 'PhoneListController',
                    controllerAs: 'vm'
                }).
                when('/phones/:phoneId', {
                    templateUrl: 'js/phone-detail.template.html',
                    controller: 'PhoneDetailController',
                    controllerAs: 'vm'
                })
                otherwise({
                    redirectTo: '/'
                });
    }
})();

