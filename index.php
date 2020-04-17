<!DOCTYPE html>
<html>
  <head>
    <title>....</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </head>
  <body>
    
    <div class="container">
        <img id="pictureUrl" width="25%">
      <br>
      <h2 style="color:#ff6a00; text-align:center; ">ลงทะเบียน</h2>

  <hr>
    <form action="Registerline.php" method="post">
      <div class="col-sm-12">
        <div class="row">
          <div class="col-sm-6 form-group">
            <label>ชื่อ</label>
            <input name="name" type="text" placeholder="" class="form-control">
          </div>
          <div class="col-sm-6 form-group">
            <label>นามสกุล</label>
            <input name="surname" type="text" placeholder="" class="form-control">
          </div>
        </div>					
        <div class="form-group">
          <label>ที่อยู่</label>
          <textarea name="address" placeholder="" rows="3" class="form-control"></textarea>
        </div>	
       
       					
      <div class="form-group">
        <label>เบอร์โทร</label>
        <input name="tel" type="text" placeholder="" class="form-control">
      </div>		

      <input id="lineuserid" name="lineuserid" type="hidden" class="form-control">
      <input type="submit" class="btn btn-lg btn-info" value="ยืนยันลงทะเบียน">					
      </div>
    </form> 

 
  <br>
  <br>
  </div>

 <script src="https://static.line-scdn.net/liff/edge/2.1/sdk.js"></script>


  <script>
    
    function runApp() {
      liff.getProfile().then(profile => {
        var inputLineuserid = document.getElementById("lineuserid"); 

        document.getElementById("pictureUrl").src = profile.pictureUrl;
        //document.getElementById("lineuserid").innerHTML =  profile.userId;
        document.getElementById("displayName").innerHTML = '<b>DisplayName:</b> ' + profile.displayName;
        document.getElementById("statusMessage").innerHTML = '<b>StatusMessage:</b> ' + profile.statusMessage;
        document.getElementById("getDecodedIDToken").innerHTML = '<b>Email:</b> ' + liff.getDecodedIDToken().email;

        inputLineuserid.value = profile.userId;
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

  </body>
</html>
