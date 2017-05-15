(function () {
    
    'use strict';
    angular
        .module('app.corps')
        .controller('CorpsDetailController', CorpsDetailController);

    CorpsDetailController.$inject = ['$routeParams','CorpsService'];

    /*
     * This controller will find the details of an address from the address service.
     */
    function CorpsDetailController($routeParams, CorpsService) {
        var vm = this;

        vm.corps = {};
        var corpsID = $routeParams.corpsID;
        

        activate();

        ////////////

        function activate() {
            CorpsService.getCorps(corpsID).then(function (response) {
                vm.corps = response;
                if (vm.corps.hasOwnProperty('incorp_dt')) {
                    vm.corps.incorp_dt = new Date(vm.corps.incorp_dt);
                }
                console.log(vm.corps);   
                
                if(vm.corps.hasOwnProperty('location')){
                    aLocation = vm.corps.location;
                }
                loadMap(aLocation);
                //loadMap('41.8239890,-71.4128340');
            });
        }
               
        function loadMap(location) {

            var lat = location.split(',')[0];
            var long = location.split(',')[1];

            var myCenter = new google.maps.LatLng(lat, long);

            var mapProp = {
                center: myCenter,
                zoom: 10,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.querySelector('.googleMap'), mapProp);
            var marker = new google.maps.Marker({
                position: myCenter
            });
            marker.setMap(map);
        }
        
    }
    
})();