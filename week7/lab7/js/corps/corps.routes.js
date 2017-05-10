/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
(function() {
    
    'use strict';
    angular
        .module('app.corps')
        .config(config);
  
    config.$inject = ['$routeProvider'];

    /*
     * We set out custom feature with a starting page and pages
     * that go from there.  then the URL matches the route, we update
     * that view and process the controller
     */
    function config($routeProvider) {
       $routeProvider.
            when('/corps', {
                templateUrl: 'js/corps/corporations.template.html',
                controller: 'CorpsController',
                controllerAs: 'vm'
            }).
            when('/corps/:corpsID', {
                templateUrl: 'js/corps/corps-detail.template.html',
                controller: 'CorpsDetailController',
                controllerAs: 'vm'
            });
    }

})();

