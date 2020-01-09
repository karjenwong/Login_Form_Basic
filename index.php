<?php
if (isset($_POST["username"]) && isset($_POST["password"])) {
  $user = $_POST["username"];
  $pass = $_POST["password"];
  echo ($user === "hr@auphansoftware.com" && $pass === "hello") ? "Login Successful." : "Incorrect Username/Password";
  exit;
}
?>

<!doctype html>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  $(document).ready(() => {
    $('#submit').click((e) => {
      e.preventDefault();
      const emailValidation = /^([a-z0-9_.+-])+\@(([a-z0-9-])+\.)+([a-z0-9]{2,4})+$/i;
      const ajaxCall = () => $.ajax({
        type: 'post',
        data: $("form").serialize(),
        success: (res) => {
          $('#response').html(res);
          if (res === "Login Successful.") {
            $('#response').css({
              color: "black",
              display: "block",
            });
            $("form").trigger("reset");
          } else {
            $('#response').css({
              color: "red",
              display: "block"
            });
            $('#response').fadeOut(3000);
          }
        }
      });

      if ($("#username").val() && $("#password").val()) {
        emailValidation.test($("#username").val()) ? ajaxCall() : alert("This is an invalid email!");
      } else {
        alert("The username or password is empty. Please try again.");
      }

    });
  });
</script>

<head>
  <style>
    body,
    html {
      height: 100%;
      display: grid;
      background-image: url("https://www.taproot.com/wp-content/uploads/2018/11/481820.jpg");
      background-size: cover;
    }

    .center-me {
      margin: auto;
    }

    .card {
      background-color: white;
      padding: 2.5rem;
      border: 1px solid black;
      border-radius: 25px;
      box-shadow: 10px 10px 10px #aaaaaa;
    }
    .flex {
      display: flex;
      justify-content: space-between;
    }
  </style>

</head>

<body>

  <div class="container center-me">
    <div class="card">
      <h1>Welcome!</h1>

      <form method='post' action>
        <div>
          <label for="username">Username: <input type='username' name='username' id='username'></label>
          <label for="password">Password: <input type='password' autocomplete="login" name='password' id='password'></label>
        </div>
        <div class="flex">
        <input type='submit' value='Login' name='submit' id="submit">
        <div id='response'></div>
        </div>
      </form>
    </div>
  </div>

</body>

</html>