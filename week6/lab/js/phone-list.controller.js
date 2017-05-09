/*
 * Function file for the controller for phone-list
 */
(function () {
    //Use Strict Javascript
    'use strict';
    
    //Add phonelist controller to main module
    angular
            .module('app')
            .controller('PhoneListController', PhoneListController);
    
    //Inject the parameters into PhoneListController
    PhoneListController.$inject = ['PhonesService'];
    
    //Define function for PhoneListController with paramters
    function PhoneListController(PhonesService) {
        var vm = this;
        
        vm.phones = [];
        
        activate();
        
        ////////////
        
        function activate() {
            PhonesService.getPhones().then(function(response){
                vm.phones = response;
            });
        }
        
    }
})();
