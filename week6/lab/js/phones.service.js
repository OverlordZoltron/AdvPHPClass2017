/* 
 * Service file that will allow us to make AJAX calls with built in features
 * which will allow us to getPhones based on the URL, and find a Phone based on the id
 */
(function () {
    'use strict';

    angular
        .module('app')
        .factory('PhonesService', PhonesService);

    PhonesService.$inject = ['$http', 'REQUEST'];

    function PhonesService($http, REQUEST) {
        var url = REQUEST.Phones;
        var service = {
            'getPhones': getPhones,
            'findPhone': findPhone
        };
        return service;

        //////

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

        function findPhone(id) {
            
            return getPhones()
                .then(function(data) {
                    return findPhoneComplete(data);;
                });

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


