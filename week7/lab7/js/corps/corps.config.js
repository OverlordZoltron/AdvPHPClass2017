(function() {
    'use strict';

    /*
     * This will allow us to have constants that will not change throughout the app.
     * good references for API locations
     */
    angular
        .module('app.corps')
        .constant('REQUEST', {
            'Corporation' : '../../week5/Lab5/api/v1/corps'
        });
        
})();