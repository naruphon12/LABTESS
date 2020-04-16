<?php

$request = new HttpRequest();
$request->setUrl('http://localhost:52108/WebService.asmx');
$request->setMethod(HTTP_METH_POST);

$request->setHeaders(array(
  'postman-token' => 'e124098c-fc39-271e-5e2d-db7a3287def3',
  'cache-control' => 'no-cache',
  'soapaction' => 'http://tempuri.org/convertPdfToPicture',
  'content-length' => 'length',
  'content-type' => 'text/xml',
  'host' => 'localhost'
));

$request->setBody('<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <convertPdfToPicture xmlns="http://tempuri.org/">
      <JsonStr>{"Data":[{"Plant_code":"301610","FileName":"12345_12345_12345.pdf","Customer_Code":"2019-01-31","Doc_No":"1","Date_Parm":"2019-09-07 18:02:08","Type_Parm":"1"}]}</JsonStr>
    </convertPdfToPicture>
  </soap:Body>
</soap:Envelope>');

try {
  $response = $request->send();

  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}
?>
