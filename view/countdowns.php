<?php
include 'private/config.php';
include 'controller/database.php';
?>

<!DOCTYPE html>
<html lang='en'>

<head>
  <meta charset='UTF-8'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Josefin+Sans&display=swap" rel="stylesheet">

  <title><?php print $NAME ?> <?php print $TITLE_SEPARATOR ?> Countdown List</title>

  <style>
    *,
    *::after,
    *::before {
      margin: 0;
      padding: 0;
      box-sizing: inherit;
    }

    html {
      font-size: 62.5%;
      /* 10px font size */
    }

    body {
      box-sizing: border-box;
      background-image: url(https://i.imgur.com/ZROzZcg.png);
      width: 100%;
      height: 100%;
      font-family: 'Josefin sans', sans-serif;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      height: 100vh;
      width: 100%;
    }

    .links-container {
      display: flex;
      flex: 1;
      flex-direction: column;
      align-items: center;
      margin-top: 2rem;
      width: 70%;
      max-width: 20.5rem;
    }

    .links-container li {
      display: inline-block;
      margin-bottom: 1.5rem;
      border: .2rem solid #43192d;
      width: 100%;
      padding: 1.2rem 0 1.2rem 0;
      background-color: #fff;
      position: relative;
      transition: all .2s;
      color: #fff;
    }

    .links-container li::after {
      content: '';
      border: .1rem solid #43192d;
      width: 100%;
      height: 100%;
      display: inline-block;
      position: absolute;
      top: 0;
      left: 0;
      z-index: -1;
      opacity: 0;
      transition: all .4s;
    }

    .links-container li:hover::after {
      transform: scaleX(1.1) scaleY(1.35);
      opacity: 1;
    }

    .links-container li:active::after {
      transform: scaleX(1.07) scaleY(1.25);
    }

    .links-container li:active {
      /* box-shadow: inset -.2rem .2rem 0 rgba(233, 72, 138, 1); */
      background-color: #e9488a;
    }


    @keyframes slide-in-left {
      0% {
        opacity: 0;
        margin-left: -20rem;
      }

      75% {
        margin-left: 1.5rem;
      }

      100% {
        opacity: 1;
        margin-left: 0;
      }
    }

    @keyframes slide-in-right {
      0% {
        opacity: 0;
        margin-right: -20rem;
      }

      75% {
        margin-right: 5rem;
      }

      100% {
        opacity: 1;
        margin-right: 0;
      }
    }

    .links-container li:last-of-type {
      margin-bottom: 0;
    }

    .links-container li.right a {
      transform: skew(20deg);
      display: block;
    }

    .links-container li.right {
      transform: skew(-20deg);
      animation: slide-in-right .9s ease backwards;
    }

    .links-container li.left a {
      transform: skew(-20deg);
      display: block;
    }

    .links-container li.left {
      transform: skew(20deg);
      animation: slide-in-left .9s ease backwards;
    }

    .links-container a:link,
    .links-container a:visited {
      text-decoration: none;
      font-size: 2.2rem;
      text-align: center;
      color: #684d46;
      transition: all .2s;
    }

    .links-container a:active {
      color: #fff;
    }

    h1 {
      font-family: 'Fredoka one', sans-serif;
      color: #43192d;
      letter-spacing: .1rem;
      margin-bottom: 10%;
    }

    /* Desktop Styles */
    @media only screen and (min-width: 961px) {
      html {
        font-size: 78%;
      }

      body {
        width: 100%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        /* border: 1px solid pink; */
      }


      .container {
        flex-direction: column;
        justify-content: center;
        align-content: space-around;
        flex-wrap: wrap;
        /* border: 1px solid green; */
        width: 50%;
        max-width: 55rem;
        height: 400px;
      }

      .links-container {
        order: 3;
        flex: 0;
        min-width: 40rem;
        max-width: 30.5rem;
        min-height: 400px;
        /* border: 1px solid blue; */
        margin-top: 0;
      }

      .links-container li {
        max-width: 20.5rem;
      }
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
  </style>
</head>

<body>
  <div class='container'>
    <div class='links-container'>
      <h1><?php print $NAME ?></h1>
      <?php
      $sql = "SELECT * FROM tu_countdowns";
      $results = $pdo->query($sql);

      $align = 'right';
      foreach ($results as $row) {
        print "<li class='" . $align . "'><a class='link' href='/" . $row['slug'] . "'>" . $row['name'] . "</a></li>";
        $align = $align == "left" ? "right" : "left";
      }
      ?>
    </div>
  </div>
  <footer><?php print $FOOTER ?></footer>
</body>

</html>