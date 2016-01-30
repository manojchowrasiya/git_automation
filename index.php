<?php 

try{ 
	error_reporting(E_ALL | E_STRICT); 
	ini_set('display_errors',1); 
	$proxy =new SoapClient('http://xyz.com/index.php/api/v2_soap?wsdl', array('trace'=>1,'connection_timeout'=>120)); 
	$session = $proxy->login(array('username'=>$username,'apiKey'=>$password)); 
	$sessionId = $session->result; 
	$filters = array(); 
	$filters = array(
    'created_at' => array(
        'from' => '2015-04-21 02:13:00',
        'to' => '2016-04-21 02:22:00'
    )
);
	$products = $proxy->salesOrderList(array("sessionId"=> $sessionId,"filters"=> $filters));
	// $products = $proxy->customerCustomerList(array("sessionId"=> $sessionId,"filters"=> $filters)); 
	// echo '<h1>Result</h1>'; 
	echo '<pre>'; 
	print_r($products); 
	// echo '</pre>';
}catch(Exception $e){ 
	// echo '<h1>Error</h1>'; echo '<p>'. $e->getMessage().'</p>';
}

?>