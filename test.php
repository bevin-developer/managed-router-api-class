<?php 

if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}

require_once('managed_router_api.php');

$obj_route = new ManagedRouterAPI("http://192.168.0.7:3000","bevin","saki322");
$routers = $obj_route->search('RNV5002');
$routers = $obj_route->search();
$routers = $obj_route->search('TEST',3);
$routers = $obj_route->add('RNV5019234','00019F3536E5','Test through API Class');
echo "<pre>";
var_dump($routers);
echo "</pre>"


?>