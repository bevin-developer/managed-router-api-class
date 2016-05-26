<?php 

require_once('managed_router_api.php');

/*
*Initialize object with parameters 'URL', 'Username', 'Password'.
*/
$obj_route = new ManagedRouterAPI("http://192.168.0.7","username","password");


/**
	*Perform search by different methods
**/

/**
	*Method 1 : It will return the most recent 20 devices.. 
	*Each router will be stored as an objects.
	* @return array 
**/
$routers = $obj_route->search();

/**
	*Method 2 : It will return routers matching the given string. 	
	* @param string $params
	* @return array 
**/
$routers = $obj_route->search('RNV5002');


/**
	*Method 3 : It will return the routers matching the given string. 
	*Second argument will limit the number of routers retrieved
	*Each matching router will be stored as an objects. 
	* @param string $params 
	* @param integer $limit  
	* @return array
**/

$routers = $obj_route->search('TEST',1);

/**
	*Adding a router to the server. Return object of the newly added router
	*
	* @param string $serial  
	* @param string $mac
	* @param string $name
	* @return object
**/

$routers = $obj_route->add('RNV5019289','00019F3536F5','Managed Router');

/**
	*Updating a router to the server. Return object of the updated router
	*
	* @param integer $routerId
	* @param string $serial
	* @param string $feild - 'name' or 'mac'
	* @param string $name
	* @return array|boolean $router 
	*
**/

/**
* Updating Name of a Router
**/

$routers = $obj_route->update(1267820, 'RNV5019289', 'name', 'Main Office Router');

/**
* Updating Name of a Router
**/

$routers = $obj_route->update(1267820, 'RNV5019289', 'mac', '00019F3536F6');

/**
	*Delete a router from the server. 
	*
	* @param integer $routerId
	* @param string $serial
	* @return array 
	*
**/

$routers = $obj_route->delete(1267820,'RNV5019289');

/**
	*Restore a deleted router from the server. 
	*
	* @param integer $routerId
	* @param string $serial
	* @return array 
	*
**/

$routers = $obj_route->undelete(1267820,'RNV5019289');

/**
	*Access RAW response from API. Would return the JSON string response provide by the API.
	*
	* @return String 
**/

$rawResponse = $obj_route->response();
?>