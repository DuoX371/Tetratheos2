<!DOCTYPE HTML>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tetratheos</title>
	<link rel="icon" type="image/ico" href="tIcon.png" />
  <link rel="stylesheet" href="Mlogincss.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style>
body {background-image:url(loginbackground1.png);
        background-repeat:no-repeat;
        background-size: cover;
        margin: 0;
        padding: 0;
        }
</style>
<body>
  <img src="tIcon.png" style="width:70px;margin-left:46%;margin-top:200px;border-radius:45%;">
  <p style="margin-left:45%;font-family:impact;font-size:20px;">Tetratheos</p>
  <form method="post" action="process.php">
  <div class="LoginMenu">

    <div>
      <span class="symbol-input100">
              <i class="fa fa-user icon"></i>
      </span>
      <input class="input100" type="text"  placeholder="Username" name="username" >
    </div>

    <div>
      <span class="symbol-input100">
              <i class="fa fa-key icon"></i>
      </span>
      <input class="input100" type="password"  placeholder="Password" name="password">
    </div><br>
    <button type="submit" class="submit100" name="login">Login</button>

  </div>
  <p style="margin-left:42%;position:absolute;">
    <a onclick="document.getElementById('id02').style.display='block'" class="hover" style="text-decoration:none;" style="text-decoration:none;">Forgot password?</a>
    <a>|</a>
    <a onclick="document.getElementById('id01').style.display='block'" class="hover" style="text-decoration:none;">Sign Up!</a>
  </p>
  </form>

  <!--- The Modal --->
  <div id="id01" class="modal">
    <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

    <!-- Modal Content -->
    <form class="modal-content animate">
      <div class="imgcontainer">
        <br><br><img src="tIcon.png" alt="Icon" class="avatar" style="margin-left:47%;width:50px;border-radius:25px;"><br><br>
      </div>

      <div class="container">
        <p>
          <a>
            <label>Username:</label><br>
            <input type="text" placeholder="Username" >
          </a>
        </p>

        <p>
          <a>
            <label>Email:</label><br>
            <input type="text" placeholder="Email">
          </a>
        </p>

        <p>
          <a>
            <label>Password:</label><br>
            <input type="password" placeholder="Password">
          </a>
        </p>

        <p>
          <a>
            <label>Confirm Password:</label><br>
            <input type="password" placeholder="Confirm password">
          </a>
        </p>

        <p>
          <a>
            <button type="submit" class="submit101">Register</button>
            <button type="submit" class="submit101" onclick="document.getElementById('id01').style.display='block'">Cancel</button>
          </a>
        </p>

    </div>
      </form>
    </div>

    <!--- The modal 2 -->
    <div id="id02" class="modal">
      <span onclick="document.getElementById('id02').style.display='none'" class="close2" title="Close Modal">&times;</span>
      <!-- Modal Content -->
      <form class="modal-content2 animate">
        <div class="imgcontainer">
          <br><br><img src="tIcon.png" alt="Icon" class="avatar" style="margin-left:47%;width:50px;border-radius:25px;"><br><br>
        </div>

        <div class="container">
          <p>
            <h1 style="margin-left:30%;">Forgot Password?</h1>
          </p>
          <a style="margin-left:16%;">
          No worries! Just enter your email and we'll send you a rest password link.
          </a>
          <p>
          </p>
          <p>
              <br><br><input type="text" placeholder="Email" >
          </p>

          <p>
            <a>
              <button type="submit" class="submit101" style="margin-left:29%;width:30%;height:40%;">Send Email</button>
            </a>
          </p>

      </div>
        </form>
</body>

<script>
// Get the modal
var signUp = document.getElementById('id01');
var forgotPass = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == signUp) {
    signUp.style.display = "none";
  }
  if (event.target == forgotPass) {
    forgotPass.style.display = "none";
  }
}
</script>
</html>
