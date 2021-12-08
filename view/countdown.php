<?php

include 'private/config.php';
include 'controller/database.php';

// Append the requested resource location to the URL   
$url = $_SERVER['REQUEST_URI'];
$curPageName = explode('/', $url);

$sql = "SELECT * FROM tu_countdowns WHERE slug = '$curPageName[1]' LIMIT 1";
$result = $pdo->query($sql);
if ($result->rowCount() < 0) {
  header('Location: /');
  exit;
}
$row = $result->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php print $NAME ?> <?php print $TITLE_SEPARATOR ?> Countdown <?php print $TITLE_SEPARATOR ?> <?php print $row['name'] ?></title>

  <script>
    (function() {
      const second = 1000,
        minute = second * 60,
        hour = minute * 60,
        day = hour * 24;

      //I'm adding this section so I don't have to keep updating this pen every year :-)
      //remove this if you don't need it
      var month = <?php print $row['month'] ?>;
      // if (month.lenght < 2) {
      //   month = "0" + month
      // }

      minTwoDigits(month);

      console.log(month)

      let today = new Date(),
        dd = String(today.getDate()).padStart(2, "0"),
        mm = String(today.getMonth() + 1).padStart(2, "0"),
        yyyy = today.getFullYear(),
        nextYear = yyyy + 1,
        dayMonth = (month < 10 ? '0' : '') + month + "/<?php print $row['day'] ?>/",
        endDate = dayMonth + yyyy;

      today = mm + "/" + dd + "/" + yyyy;
      if (today > endDate) {
        endDate = dayMonth + nextYear;
      }
      //end

      const countDown = new Date(endDate).getTime(),
        x = setInterval(function() {

          const now = new Date().getTime(),
            distance = countDown - now;

          document.getElementById("days").innerText = Math.floor(distance / (day)),
            document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
            document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
            document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

          //do something later when date is reached
          if (distance < 0) {
            document.getElementById("headline").innerText = "It's <?php print $row['name'] ?>!";
            document.getElementById("countdown").style.display = "none";
            document.getElementById("content").style.display = "block";
            clearInterval(x);
          }
          //seconds
        }, 0)
    }());

    function minTwoDigits(n) {
      return (n < 10 ? '0' : '') + n;
    }
  </script>


  <link href="https://fonts.googleapis.com/css?family=Fredoka+One|Josefin+Sans&display=swap" rel="stylesheet">

  <style>
    /* general styling */
    :root {
      --smaller: .75;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    html,
    body {
      height: 100%;
      margin: 0;
    }

    body {
      align-items: center;
      display: flex;
      font-family: 'Fredoka one', sans-serif;
      color: #43192d;
      letter-spacing: .1rem;
      box-sizing: border-box;
      background-image: url(https://i.imgur.com/ZROzZcg.png);
      width: 100%;
      height: 100%;
    }

    .container {
      margin: 0 auto;
      text-align: center;
    }

    h1 {
      font-weight: normal;
      letter-spacing: .125rem;
      text-transform: uppercase;
    }

    li {
      display: inline-block;
      font-size: 1.5em;
      list-style-type: none;
      padding: 1em;
      text-transform: uppercase;
    }

    li span {
      display: block;
      font-size: 4.5rem;
    }

    .emoji {
      display: none;
      padding: 1rem;
    }

    .emoji span {
      font-size: 4rem;
      padding: 0 .5rem;
    }

    @media all and (max-width: 768px) {
      h1 {
        font-size: calc(1.5rem * var(--smaller));
      }

      li {
        font-size: calc(1.125rem * var(--smaller));
      }

      li span {
        font-size: calc(3.375rem * var(--smaller));
      }
    }

    footer {
      position: absolute;
      bottom: 0;
      left: 0;
      margin-bottom: 1%;
      margin-left: 2%;
      font-size: 15px;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1 id="headline">Time until <?php print $row['name'] ?></h1>
    <div id="countdown">
      <ul>
        <li><span id="days"></span>days</li>
        <li><span id="hours"></span>Hours</li>
        <li><span id="minutes"></span>Minutes</li>
        <li><span id="seconds"></span>Seconds</li>
      </ul>
    </div>
    <div id="content" class="emoji">
      <!-- <span>🥳</span>
      <span>🎉</span>
      <span>🎂</span> -->
    </div>
  </div>

  <footer><?php print $FOOTER ?></footer>
</body>

</html>