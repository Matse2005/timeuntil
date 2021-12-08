<?php
include 'private/config.php';
include 'controller/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Josefin+Sans&display=swap" rel="stylesheet">

  <title><?php print $NAME ?> <?php print $TITLE_SEPARATOR ?> Admin <?php print $TITLE_SEPARATOR ?> Edit password</title>

  <style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    .login-page {
      padding: 8% 0 0;
      margin: auto;
    }

    .form {
      position: relative;
      z-index: 1;
      max-width: 360px;
      margin: 0 auto 100px;
      text-align: center;
    }

    .form input {
      outline: 0;
      background: #f2f2f2;
      transition: all .2s;
      padding: 1.2rem 0 1.2rem 0;
      transform: skew(-20deg);
      animation: slide-in-right .9s ease backwards;
      width: 100%;
      border: 0;
      margin: 0 0 15px;
      padding: 15px;
      box-sizing: border-box;
      font-size: 14px;
      border: .2rem solid #43192d;
      font-family: 'Fredoka one', sans-serif;
    }

    .form button {
      border: .2rem solid #43192d;
      transform: skew(-20deg);
      display: block;
      transition: all .2s;
      text-transform: uppercase;
      outline: 0;
      background: #43192d;
      width: 100%;
      border: 0;
      padding: 15px;
      color: #FFFFFF;
      font-size: 14px;
      -webkit-transition: all 0.3 ease;
      transition: all 0.3 ease;
      cursor: pointer;
      font-family: 'Fredoka one', sans-serif;
    }

    .form button:hover,
    .form button:active,
    .form button:focus {
      background-color: #43192d;
    }

    .form .message {
      margin: 15px 0 0;
      color: #b3b3b3;
      font-size: 12px;
    }

    .form .message a {
      color: #4CAF50;
      text-decoration: none;
    }

    .form .register-form {
      display: none;
    }

    .container {
      position: relative;
      z-index: 1;
      max-width: 300px;
      margin: 0 auto;
    }

    .container:before,
    .container:after {
      content: "";
      display: block;
      clear: both;
    }

    .container .info {
      margin: 50px auto;
      text-align: center;
    }

    .container .info h1 {
      margin: 0 0 15px;
      padding: 0;
      font-size: 36px;
      font-weight: 300;
      color: #1a1a1a;
    }

    .container .info span {
      color: #4d4d4d;
      font-size: 12px;
    }

    .container .info span a {
      color: #000000;
      text-decoration: none;
    }

    .container .info span .fa {
      color: #EF3B3A;
    }

    body {
      box-sizing: border-box;
      background-image: url(https://i.imgur.com/ZROzZcg.png);
      width: 100%;
      height: 100%;
      font-family: 'Fredoka one', sans-serif;
    }

    footer {
      font-family: 'Fredoka one', sans-serif;
      color: #43192d;
      letter-spacing: .1rem;
      position: absolute;
      bottom: 0;
      left: 0;
      margin-bottom: 1%;
      margin-left: 2%;
    }


    h1 {
      font-family: 'Fredoka one', sans-serif;
      color: #43192d;
      letter-spacing: .1rem;
      margin-bottom: 10%;
    }
  </style>
</head>

<body>
  <div class="login-page">
    <div class="form">

      <h1><?php print $NAME ?> <?php print $TITLE_SEPARATOR ?> Edit Password</h1>
      <form method="POST" action="/controller/password.php" class="login-form">
        <input type="password" name="curr_password" placeholder="Current password" />
        <input type="password" name="new_password" placeholder="New password" />
        <input type="password" name="conf_password" placeholder="Confirm password" />
        <button>Edit password</button>
      </form>
    </div>
  </div>

  <footer><?php print $FOOTER ?></footer>
</body>

</html>