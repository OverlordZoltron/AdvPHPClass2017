/*
 * Function for the phone-detail controller
 */
(function() {
    //Use strict Javascript
    'use strict';
    
    //Add controller to main module
    angular
        .module('app')
        .controller('PhoneDetailController', PhoneDetailController);
    
    //Injet parameters to be used in the controller
    PhoneDetailController.$inject = ['$routeParams', 'PhonesService'];
    
    //Define controller fuction with parameters
    function PhoneDetailController($routeParams, PhonesService) {
        var vm = this;
        
        vm.phone = {};
        var id = $routeParams.phoneId;
        
        activate();
        
        ////////
        function activate() {
            PhonesService.findPhone(id).then(function(response) {
                vm.phone = response;
            });
        }
    }
    
})();

