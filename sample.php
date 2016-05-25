<?php 

require_once('managed_router_api.php');

/*
Initialize object with parameters 'URL', 'Username', 'Password'.
*/
$obj_route = new ManagedRouterAPI("http://192.168.0.7:3000","bevin","getmein");



//$routers = $obj_route->search('RNV5002');
//$routers = $obj_route->search();
//$routers = $obj_route->search('TEST',1);
//$routers = $obj_route->add('RNV5019289','00019F3536F5','Test with return value');
$routers_delete = $obj_route->delete(1267820,'RNV5019289');
$routers_undelete = $obj_route->undelete(1267820,'RNV5019289');

echo "<pre>";
var_dump($routers_delete);
echo "</pre>";

echo "<pre>";
var_dump($routers_undelete);
echo "</pre>";

//return search.call(this, router.serial, 1);


?>