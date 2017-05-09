/* 
 * Service file to help us keep track of constant values
 * Such as Phones (which will tell index.html where to read the json file relative to the url reference for 'Phones')
 * in our application
 */
(function() {
    //Use strict Javascript
    'use strict';
    
    //Define constants for main module
    angular
        .module('app')
        .constant('REQUEST', {
            'Phones' : './data/phones.json'
        });
})();

