/* 
 * Service file that will allow us to make AJAX calls with built in features
 * which will allow us to getPhones based on the URL, and find a Phone based on the id
 */
(function () {
    //Use Strict Javascript
    'use strict';
    
    //Define the factory service for the main module
    angular
        .module('app')
        .factory('PhonesService', PhonesService);
        
    //Inject parameters into PhonesService
    PhonesService.$inject = ['$http', 'REQUEST'];
    
    //Define PhonesService function
    function PhonesService($http, REQUEST) {
        var url = REQUEST.Phones;
        var service = {
            'getPhones': getPhones,
            'findPhone': findPhone
        };
        return service;

        //////
        //Define function that will get phones
        function getPhones() {
            return $http.get(url)
                    .then(getPhonesComplete, getPhonesFailed);

            function getPhonesComplete(response) {
                return response.data;
            }

            function getPhonesFailed(error) {
                return [];
            }
        }

        //Define function that will find an idividual phone by ID
        function findPhone(id) {
            
            return getPhones()
                .then(function(data) {
                    return findPhoneComplete(data);;
                });

            //Function that finds a phones complete information
            function findPhoneComplete(data) {
                var results = {};

                angular.forEach(data, function (value, key) {
                    if (!results.length) {
                        if (value.hasOwnProperty('id') && value.id === id) {
                            results = angular.copy(value);
                        }
                    }
                }, results);

                return results;
            }
        }
    }
})();


