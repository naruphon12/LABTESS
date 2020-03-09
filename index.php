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
        $.ajax({
    type: "POST",
    url: "WebService.asmx/WebService.asmx",
    data: "{ a: '1', b: '6' }",
    contentType: "application/json; charset=utf-8",
    dataType: "json",
    success: function (data) {
        var myData = data.d;
        alert(myData.length + " hellos");
        for (var i = 0; i < myData.length; i++) {
            alert(myData[i].Greeting + " " + myData[i].Name);
        }
    }
        runApp()
      } else {
        liff.login();
      }
    }, err => console.error(err.code, error.message));
 </script>
</body>
</html>

