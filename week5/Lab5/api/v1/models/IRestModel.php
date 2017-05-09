<?php

/**
 * IRestModel is used as an interface for the REST services
 */
interface IRestModel {
    //put your code here
    function getAll();
    function get($id); 
    function post($serverData);
    function put($id, $serverData);
    function delete($id);
}
