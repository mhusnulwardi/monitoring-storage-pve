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
    // $nodestorage = $proxmox->get("/nodes/pve/storage");
    // echo "<pre>";
    // print_r($nodestorage);
    // echo "</pre>";
    // foreach ($nodestorage['data'] as $key => $data) {
    //     $storage[] = array('used_fraction' => $data['used_fraction'], 'name' => $data['storage']);
    // }
    // echo "<pre>";
    // print_r($storage);
    // echo "</pre>";

    // storage($proxmox);
    // die();

}

function ContentStorage($data)
    {
        $nodecontent =  $proxmox->get("/nodes/pve/storage/local");
        echo "<pre>";
        foreach ($nodecontent as $key => $data) {
            $content[] = array('Total' => $data['total'], 'Used' => $data['used'], 'Avail' => $data['avail']);
        }
        echo "<pre>";
        print_r($content);
        die();
    }

