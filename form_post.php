<?php
$client = new SoapClient("http://testurl/Test.asmx?WSDL");
$params->Param1 = 'Hello';
$params->Param2 = 'World!';    
$result = $client->TestMethod($params)->TestMethodResult;
?>
