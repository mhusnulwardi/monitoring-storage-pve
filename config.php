<?php
// Require the autoloader
require_once 'vendor/autoload.php';

use ProxmoxVE\Proxmox;

function config($hostname, $username, $password){

    $credentials = [
        'hostname'  => $hostname,
        'username'  => $username,
        'password'  => $password,
    ];

    $proxmox = new Proxmox($credentials);

    // Menampilkan isi nodes
    $allNodes = $proxmox->get('/nodes');
    echo "<pre>";
    print_r($allNodes);
    echo "</pre>";
    // die();

    // Menampilkan isi dari Storage PVE
    // $nodestorage = $proxmox->get("/nodes/pve/storage");
    // echo "<pre>";
    // print_r($nodestorage);
    // echo "</pre>";
    // foreach ($nodestorage['data'] as $key => $data) {
    //     $storage[] = array('used_fraction' => $data['used_fraction'], 'name' => $data['storage']);
    // }
    // echo "<pre>";
    // print_r($storage);

    // Menampilkan isi dari Storage Local
    // $nodecontent =  $proxmox->get("/nodes/pve/storage/local");
    // echo "<pre>";
    // foreach ($nodecontent as $key => $data) {
    //     $content[] = array('Total' => $data['total'], 'Used' => $data['used'], 'Avail' => $data['avail']);
    // }
    // echo "<pre>";
    // print_r($content);
    // die();

}
