
<?php


$request = new HttpRequest();
$request->setUrl('http://vm-feeduat/FeedLineBot/WebService.asmx');
$request->setMethod(HTTP_METH_POST);
echo $_POST[name];
echo $_POST[surname];
echo $_POST[surname];
echo $_POST[surname];
$request->setHeaders(array(
  'postman-token' => 'ebfde170-7ac1-e13c-4c7b-9454c724ac3f',
  'cache-control' => 'no-cache',
  'soapaction' => 'http://tempuri.org/registerline',
  'content-length' => 'length',
  'content-type' => 'text/xml; charset=utf-8',
  'host' => 'vm-feeduat'
));

$request->setBody('<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <registerline xmlns="http://tempuri.org/">
      <JsonStr>{"Data":[{"User_ID":"1111111111","Phone_No":"0882219724","Email":"naruphon.boo","Nameline":"ball"}]}</JsonStr>
    </registerline>
  </soap:Body>
</soap:Envelope>');

try {
  $response = $request->send();

  echo $response->getBody();
} catch (HttpException $ex) {
  echo $ex;
}
?>
