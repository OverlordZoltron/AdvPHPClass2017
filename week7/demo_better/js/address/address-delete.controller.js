(function () {
    
    'use strict';
    angular
        .module('app.address')
        .controller('AddressDeleteController', AddressDeleteController);

    AddressDeleteController.$inject = ['$routeParams','AddressService'];

    /*
     * This controller will find the details of an address that you want to delete from the address service.
     */
    function AddressDeleteController($routeParams, AddressService) {
        var vm = this;

        vm.addressId = $routeParams.addressId;
        vm.message = '';

        activate();

        ////////////

        function activate() {
            AddressService.deleteAddress(vm.addressId).then(function(){
                vm.message = 'Address Deleted';
                activate();
            },
            function(){
                vm.message = 'Address Not Deleted';
            });

        }
              

    }
    
})();