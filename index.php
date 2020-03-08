<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My LIFF v2</title>
  <style>
    #pictureUrl { display: block; margin: 0 auto }
  </style>
</head>
<body>
  <img id="pictureUrl" width="25%">
  <p id="userId"></p>
  <p id="displayName"></p>
  <p id="statusMessage"></p>
  <p id="getDecodedIDToken"></p>
  <script src="https://static.line-scdn.net/liff/edge/2.1/sdk.js"></script>
  <script>
    function runApp() {
      liff.getProfile().then(profile => {
        document.getElementById("pictureUrl").src = profile.pictureUrl;
        document.getElementById("userId").innerHTML = '<b>UserId:</b> ' + profile.userId;
        document.getElementById("displayName").innerHTML = '<b>DisplayName:</b> ' + profile.displayName;
        document.getElementById("statusMessage").innerHTML = '<b>StatusMessage:</b> ' + profile.statusMessage;
        document.getElementById("getDecodedIDToken").innerHTML = '<b>Email:</b> ' + liff.getDecodedIDToken().email;
      }).catch(err => console.error(err));
    }
    liff.init({ liffId: "1653805513-OWPbPoe0" }, () => {
      if (liff.isLoggedIn()) {
        runApp()
      } else {
        liff.login();
      }
    }, err => console.error(err.code, error.message));
  </script>
  	<script>
                function submit_soap(){
		var key1=$("#key1").val();
		var key2=$("#key2").val();
		$.post("form_post.php",{key1:key1,key2:key2},
		function(data){
		  $("#json_response").html(data);
		});
	}

	</script>
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

    print_r( $result);
?>
</body>
</html>
