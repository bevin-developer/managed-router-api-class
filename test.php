<?php 

if (!ini_get('display_errors')) {
    ini_set('display_errors', '1');
}

require_once('managed_router_api.php');

$obj_route = new ManagedRouterAPI("http://192.168.0.7:3000","bevin","saki322");
$routers = $obj_route->search('RNV5002');
$routers = $obj_route->search();
echo "<pre>";
var_dump($routers);
echo "</pre>"


?>