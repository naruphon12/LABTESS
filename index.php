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
    POST :"http://localhost:52108/WebService.asmx"
Host: localhost
Content-Type: text/xml; charset=utf-8
Content-Length: length
SOAPAction: "http://tempuri.org/pdftojpg"

<?xml version="1.0" encoding="utf-8"?>
<soap:Envelope xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
  <soap:Body>
    <pdftojpg xmlns="http://tempuri.org/">
      <JsonStr>{"Data": [{"parth": "Vm-feeduatvb_net_project$E-Document","name": "Vm-feeduatvb_net_project$E-Document"}]}</JsonStr>
    </pdftojpg>
  </soap:Body>
</soap:Envelope>
	  function submit_soap(){
		var key1=$("#key1").val();
		var key2=$("#key2").val();
		$.post("form_post.php",{key1:key1,key2:key2},
		function(data){
		  $("#json_response").html(data);
		});
	}

	</script>
   <center>
    <h3>Send HTTP POST Request using PHP</h3>
     <form>
     Name1 : <input name="key1" id="key1" type="text" /><br />
     Name2  : <input name="key2" id="key2" type="text" /><br />
      <input type="button" value="Submit" onclick="submit_soap()"/>
    </form>
       <br>-----------
	  <div id="json_response"></div>
   </center>
</body>
</html>
