(function () {
    
    'use strict';
    angular
        .module('app.address')
        .controller('AddressController', AddressController);

    AddressController.$inject = ['AddressService'];
    /*
     * Simple controller to get information for the view.
     */
    function AddressController(AddressService) {
        var vm = this;

        vm.addresses = [];
        //setTimeout(activate, 1000);
        
        activate();

        ////////////

        function activate() {
            AddressService.getAllAddresses().then(function (response) {
                vm.addresses = response;
            });
        }

    }
    
})();