<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');


$json = file_get_contents("http://data.bter.com/api/1/trade/btc_cny");
$data = json_decode($json,true);
		
function parse($data){
		$ar = array();
	
	foreach ($data["data"] as $item) {
		//echo $item['price'] . "\n";
 		//echo $item['type'] . "\n";
 		$date = $item['date'];
 		//echo date('Y-m-d-h-i-s', $date). "\n";

 		//$ar[] = date('Y-m-d-h-i-s', $date);
 			$ar[] = $item['price'];
		
	}
	
	return $ar;
}


function display($ret){
	print_r($ar);
}

$data['data'] = parse($data);	
//print_r($ret);	   
//display($ar);



function dressTemplate($templateName, array $data = array()){

  // takes first array level of data and generates variables with that key name
  extract($data);

  // capture all templating output using a buffer
  ob_start();
  
  // get the template (which will also apply the data)
  require($templateName);
  
  // end and capture buffer
  $htmlString = ob_get_clean();
  
  // return dressed template
  return $htmlString;
}

$template = dressTemplate('template.php', $data);
echo $template;
