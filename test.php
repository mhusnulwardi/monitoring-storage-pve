<?php 
	require_once 'config.php';
	
	function ContentStorage($total='total', $used='used', $avail='avail')
	{
		$nodecontent =  $proxmox->get("/nodes/pve/storage/local");
	    echo "<pre>";
	    foreach ($nodecontent as $key => $data) {
	        $content[] = array('Total' => $data['total'], 'Used' => $data['used'], 'Avail' => $data['avail']);
	    }
	    echo "<pre>";
	    print_r($content);
	}

 ?>