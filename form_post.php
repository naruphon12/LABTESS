<?php
require_once("lib/nusoap.php"); 
 $client = new SoapClient("http://localhost:52108/WebService.asmx?WSDL");

    $params = array( 'Param1'  => 'Moslem', 
                    'Param2' => 'Ganji!');

    $result = $client->TestMethod($params)->TestMethodResult;

    print_r( $result);
    $params = array( 'Param1'  => 'Moslem', 
                    'Param2' => 'Ganji!');
echo "\n \r";
    $result2 = $client->ShowNameFamely($params)->ShowNameFamelyResult;

    print_r( $result2);
?>
