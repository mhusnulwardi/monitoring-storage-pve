<?php 
require_once 'vendor/autoload.php';

use ProxmoxVE\Proxmox;

$credentials = [
	'hostname'  => '192.168.169.1',
    'username'  => 'root',
    'password'  => '12345678',
];

$proxmox = new Proxmox($credentials);

$allNodes = $proxmox->get('/nodes');
echo "<pre>";
print_r($allNodes);
echo "</pre>";
// foreach ($allNodes['data'] as $key => $data) {
// 	$nodesname[] = array('cpu' => $data['name']);
// }
?>