<?php
  session_start();
  // Send to login unless users is admin
  if($_SESSION['name'] != 'admin') {
    header('Location: ../index.html');
  }
  $DATABASE_HOST = 'localhost';
  $DATABASE_USER = 'root';
  $DATABASE_PASS = '';
  $DATABASE_NAME = 'logindb';
  // Try and connect using the info above.
  $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
  if (mysqli_connect_errno()) {
    // If there is an error with the connection, stop the script and display the error.
    exit('Failed to connect to MySQL: ' . mysqli_connect_error());
  }
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

		<title>Home Page</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet" type="text/css">
	</head>
  
	<body class="loggedin">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="bootstrap" viewbox="0 0 118 94">
        <title>Bootstrap</title>
        <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
      </symbol>
    </svg>
    <nav class="navtop">
      <div>
        <h1><a href="home.php">Company Raffle</a></h1>
        <a href="winnerSelect.php"><i class="fa-solid fa-ticket"></i>Winner Selection Page</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
      </div>
    </nav>
		<div class="content">
      <div class="homeDash pt-5 pb-5">
        <p>Press Each Button Below to Select Winners.</p>
        <div class="selectWinnerBtns d-flex justify-content-between">
          <!-- Prize One -->
          <div>
            <a href='winnerSelect.php?prizeOne=true' class="button">Prize One Winner</a>
            <?php
              //get results from database
              $result = mysqli_query($con, "SELECT * FROM prizeone");
              $all_property = array();  //declare an array for saving property

              //showing property
              echo '<ul style="text-align:center;">';  //initialize table tag
              while ($ticket = mysqli_fetch_field($result)) {
                $all_property[] = $ticket->name;  //save those to array
              }
              echo '</ul>'; //end tr tag
              //showing all data
              while ($row = mysqli_fetch_array($result)) {
                echo "<ul style='text-align:center;'>";
                foreach ($all_property as $item) {
                  echo '<li style="margin-left: -30px;">' . $row[$item] . '</li>'; //get items using property value
                }
                echo '</ul>';
              }
              function runPrizeOne() {
                // Select array
                $DATABASE_HOST = 'localhost';
                $DATABASE_USER = 'root';
                $DATABASE_PASS = '';
                $DATABASE_NAME = 'logindb';
                // Try and connect using the info above.
                $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
                if (mysqli_connect_errno()) {
                  // If there is an error with the connection, stop the script and display the error.
                  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
                }
                $p1 = mysqli_query($con,"SELECT * FROM prizeone;");
                $rows = mysqli_fetch_all($p1, MYSQLI_ASSOC);
                foreach ($rows as $row) {
                  $ticketArr[] = $row["ticket"];
                }
                // number array
                $arrayMax = count($ticketArr);
                echo $arrayMax;
                echo '<br>';
                // select random number between 1 and length of array
                $winnerNum = rand(1, $arrayMax);
                echo $winnerNum;
                // return ticket of selection

                // only select once
              }
              if (isset($_GET['prizeOne'])) {
                runPrizeOne();
              }
            ?>
          </div>
          <!-- Prize Two -->
          <div>
            <a href='winnerSelect.php?prizeTwo=true' class="button">Prize Two Winner</a>
            <?php
              //get results from database
              $result = mysqli_query($con, "SELECT * FROM prizetwo");
              $all_property = array();  //declare an array for saving property

              //showing property
              echo '<ul style="text-align:center;">';  //initialize table tag
              while ($ticket = mysqli_fetch_field($result)) {
                $all_property[] = $ticket->name;  //save those to array
              }
              echo '</ul>'; //end tr tag
              //showing all data
              while ($row = mysqli_fetch_array($result)) {
                echo "<ul style='text-align:center;'>";
                foreach ($all_property as $item) {
                  echo '<li style="margin-left: -30px;">' . $row[$item] . '</li>'; //get items using property value
                }
                echo '</ul>';
              }
              function runPrizeTwo() {
                // Select array
                $DATABASE_HOST = 'localhost';
                $DATABASE_USER = 'root';
                $DATABASE_PASS = '';
                $DATABASE_NAME = 'logindb';
                // Try and connect using the info above.
                $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
                if (mysqli_connect_errno()) {
                  // If there is an error with the connection, stop the script and display the error.
                  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
                }
                $p1 = mysqli_query($con,"SELECT * FROM prizetwo;");
                $rows = mysqli_fetch_all($p1, MYSQLI_ASSOC);
                foreach ($rows as $row) {
                  $ticketArr[] = $row["ticket"];
                }
                // number array
                $arrayMax = count($ticketArr);
                echo $arrayMax;
                echo '<br>';
                // select random number between 1 and length of array
                $winnerNum = rand(1, $arrayMax);
                echo $winnerNum;
                // return ticket of selection

                // only select once
              }
              if (isset($_GET['prizeTwo'])) {
                runPrizeTwo();
              }
            ?>
          </div>
          <!-- Prize Three -->
          <div>
            <a href='winnerSelect.php?prizeThree=true' class="button">Prize Three Winner</a>
            <?php
              //get results from database
              $result = mysqli_query($con, "SELECT * FROM prizethree");
              $all_property = array();  //declare an array for saving property

              //showing property
              echo '<ul style="text-align:center;">';  //initialize table tag
              while ($ticket = mysqli_fetch_field($result)) {
                $all_property[] = $ticket->name;  //save those to array
              }
              echo '</ul>'; //end tr tag
              //showing all data
              while ($row = mysqli_fetch_array($result)) {
                echo "<ul style='text-align:center;'>";
                foreach ($all_property as $item) {
                  echo '<li style="margin-left: -30px;">' . $row[$item] . '</li>'; //get items using property value
                }
                echo '</ul>';
              }
              function runPrizeThree() {
                // Select array
                $DATABASE_HOST = 'localhost';
                $DATABASE_USER = 'root';
                $DATABASE_PASS = '';
                $DATABASE_NAME = 'logindb';
                // Try and connect using the info above.
                $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
                if (mysqli_connect_errno()) {
                  // If there is an error with the connection, stop the script and display the error.
                  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
                }
                $p1 = mysqli_query($con,"SELECT * FROM prizethree;");
                $rows = mysqli_fetch_all($p1, MYSQLI_ASSOC);
                foreach ($rows as $row) {
                  $ticketArr[] = $row["ticket"];
                }
                // number array
                $arrayMax = count($ticketArr);
                echo $arrayMax;
                echo '<br>';
                // select random number between 1 and length of array
                $winnerNum = rand(1, $arrayMax);
                echo $winnerNum;
                // return ticket of selection

                // only select once
              }
              if (isset($_GET['prizeThree'])) {
                runPrizeThree();
              }
            ?>
          </div>
          <!-- Prize Four -->
          <div>
            <a href='winnerSelect.php?prizeFour=true' class="button">Prize Four Winner</a>
            <?php
              //get results from database
              $result = mysqli_query($con, "SELECT * FROM prizefour");
              $all_property = array();  //declare an array for saving property

              //showing property
              echo '<ul style="text-align:center;">';  //initialize table tag
              while ($ticket = mysqli_fetch_field($result)) {
                $all_property[] = $ticket->name;  //save those to array
              }
              echo '</ul>'; //end tr tag
              //showing all data
              while ($row = mysqli_fetch_array($result)) {
                echo "<ul style='text-align:center;'>";
                foreach ($all_property as $item) {
                  echo '<li style="margin-left: -30px;">' . $row[$item] . '</li>'; //get items using property value
                }
                echo '</ul>';
              }
              function runPrizeFour() {
                // Select array
                $DATABASE_HOST = 'localhost';
                $DATABASE_USER = 'root';
                $DATABASE_PASS = '';
                $DATABASE_NAME = 'logindb';
                // Try and connect using the info above.
                $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
                if (mysqli_connect_errno()) {
                  // If there is an error with the connection, stop the script and display the error.
                  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
                }
                $p1 = mysqli_query($con,"SELECT * FROM prizefour;");
                $rows = mysqli_fetch_all($p1, MYSQLI_ASSOC);
                foreach ($rows as $row) {
                  $ticketArr[] = $row["ticket"];
                }
                // number array
                $arrayMax = count($ticketArr);
                echo $arrayMax;
                echo '<br>';
                // select random number between 1 and length of array
                $winnerNum = rand(1, $arrayMax);
                echo $winnerNum;
                // return ticket of selection

                // only select once
              }
              if (isset($_GET['prizeFour'])) {
                runPrizeFour();
              }
            ?>
          </div>
          <!-- Prize Five -->
          <div>
            <a href='winnerSelect.php?prizeFive=true' class="button">Prize Five Winner</a>
            <?php
              //get results from database
              $result = mysqli_query($con, "SELECT * FROM prizefive");
              $all_property = array();  //declare an array for saving property

              //showing property
              echo '<ul style="text-align:center;">';  //initialize table tag
              while ($ticket = mysqli_fetch_field($result)) {
                $all_property[] = $ticket->name;  //save those to array
              }
              echo '</ul>'; //end tr tag
              //showing all data
              while ($row = mysqli_fetch_array($result)) {
                echo "<ul style='text-align:center;'>";
                foreach ($all_property as $item) {
                  echo '<li style="margin-left: -30px;">' . $row[$item] . '</li>'; //get items using property value
                }
                echo '</ul>';
              }
              function runPrizeFive() {
                // Select array
                $DATABASE_HOST = 'localhost';
                $DATABASE_USER = 'root';
                $DATABASE_PASS = '';
                $DATABASE_NAME = 'logindb';
                // Try and connect using the info above.
                $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
                if (mysqli_connect_errno()) {
                  // If there is an error with the connection, stop the script and display the error.
                  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
                }
                $p1 = mysqli_query($con,"SELECT * FROM prizefive;");
                $rows = mysqli_fetch_all($p1, MYSQLI_ASSOC);
                foreach ($rows as $row) {
                  $ticketArr[] = $row["ticket"];
                }
                // number array
                $arrayMax = count($ticketArr);
                echo $arrayMax;
                echo '<br>';
                // select random number between 1 and length of array
                $winnerNum = rand(1, $arrayMax);
                echo $winnerNum;
                // return ticket of selection

                // only select once
              }
              if (isset($_GET['prizeFive'])) {
                runPrizeFive();
              }
            ?>
          </div>
          <!-- Prize Six -->
          <div>
            <a href='winnerSelect.php?prizeSix=true' class="button">Prize Six Winner</a>
            <?php
              //get results from database
              $result = mysqli_query($con, "SELECT * FROM prizesix");
              $all_property = array();  //declare an array for saving property

              //showing property
              echo '<ul style="text-align:center;">';  //initialize table tag
              while ($ticket = mysqli_fetch_field($result)) {
                $all_property[] = $ticket->name;  //save those to array
              }
              echo '</ul>'; //end tr tag
              //showing all data
              while ($row = mysqli_fetch_array($result)) {
                echo "<ul style='text-align:center;'>";
                foreach ($all_property as $item) {
                  echo '<li style="margin-left: -30px;">' . $row[$item] . '</li>'; //get items using property value
                }
                echo '</ul>';
              }
              function runPrizeSix() {
                // Select array
                $DATABASE_HOST = 'localhost';
                $DATABASE_USER = 'root';
                $DATABASE_PASS = '';
                $DATABASE_NAME = 'logindb';
                // Try and connect using the info above.
                $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
                if (mysqli_connect_errno()) {
                  // If there is an error with the connection, stop the script and display the error.
                  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
                }
                $p1 = mysqli_query($con,"SELECT * FROM prizesix;");
                $rows = mysqli_fetch_all($p1, MYSQLI_ASSOC);
                foreach ($rows as $row) {
                  $ticketArr[] = $row["ticket"];
                }
                // number array
                $arrayMax = count($ticketArr);
                echo $arrayMax;
                echo '<br>';
                // select random number between 1 and length of array
                $winnerNum = rand(1, $arrayMax);
                echo $winnerNum;
                // return ticket of selection

                // only select once
              }
              if (isset($_GET['prizeSix'])) {
                runPrizeSix();
              }
            ?>
          </div>
          <!-- Prize Seven -->
          <div>
            <a href='winnerSelect.php?prizeSeven=true' class="button">Prize Seven Winner</a>
            <?php
              //get results from database
              $result = mysqli_query($con, "SELECT * FROM prizeseven");
              $all_property = array();  //declare an array for saving property

              //showing property
              echo '<ul style="text-align:center;">';  //initialize table tag
              while ($ticket = mysqli_fetch_field($result)) {
                $all_property[] = $ticket->name;  //save those to array
              }
              echo '</ul>'; //end tr tag
              //showing all data
              while ($row = mysqli_fetch_array($result)) {
                echo "<ul style='text-align:center;'>";
                foreach ($all_property as $item) {
                  echo '<li style="margin-left: -30px;">' . $row[$item] . '</li>'; //get items using property value
                }
                echo '</ul>';
              }
              function runPrizeSeven() {
                // Select array
                $DATABASE_HOST = 'localhost';
                $DATABASE_USER = 'root';
                $DATABASE_PASS = '';
                $DATABASE_NAME = 'logindb';
                // Try and connect using the info above.
                $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
                if (mysqli_connect_errno()) {
                  // If there is an error with the connection, stop the script and display the error.
                  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
                }
                $p1 = mysqli_query($con,"SELECT * FROM prizeseven;");
                $rows = mysqli_fetch_all($p1, MYSQLI_ASSOC);
                foreach ($rows as $row) {
                  $ticketArr[] = $row["ticket"];
                }
                // number array
                $arrayMax = count($ticketArr);
                echo $arrayMax;
                echo '<br>';
                // select random number between 1 and length of array
                $winnerNum = rand(1, $arrayMax);
                echo $winnerNum;
                // return ticket of selection

                // only select once
              }
              if (isset($_GET['prizeSeven'])) {
                runPrizeSeven();
              }
            ?>
          </div>
          <!-- Prize Eight -->
          <div>
            <a href='winnerSelect.php?prizeEight=true' class="button">Prize Eight Winner</a>
            <?php
              //get results from database
              $result = mysqli_query($con, "SELECT * FROM prizeeight");
              $all_property = array();  //declare an array for saving property

              //showing property
              echo '<ul style="text-align:center;">';  //initialize table tag
              while ($ticket = mysqli_fetch_field($result)) {
                $all_property[] = $ticket->name;  //save those to array
              }
              echo '</ul>'; //end tr tag
              //showing all data
              while ($row = mysqli_fetch_array($result)) {
                echo "<ul style='text-align:center;'>";
                foreach ($all_property as $item) {
                  echo '<li style="margin-left: -30px;">' . $row[$item] . '</li>'; //get items using property value
                }
                echo '</ul>';
              }
              function runPrizeEight() {
                // Select array
                $DATABASE_HOST = 'localhost';
                $DATABASE_USER = 'root';
                $DATABASE_PASS = '';
                $DATABASE_NAME = 'logindb';
                // Try and connect using the info above.
                $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
                if (mysqli_connect_errno()) {
                  // If there is an error with the connection, stop the script and display the error.
                  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
                }
                $p1 = mysqli_query($con,"SELECT * FROM prizeeight;");
                $rows = mysqli_fetch_all($p1, MYSQLI_ASSOC);
                foreach ($rows as $row) {
                  $ticketArr[] = $row["ticket"];
                }
                // number array
                $arrayMax = count($ticketArr);
                echo $arrayMax;
                echo '<br>';
                // select random number between 1 and length of array
                $winnerNum = rand(1, $arrayMax);
                echo $winnerNum;
                // return ticket of selection

                // only select once
              }
              if (isset($_GET['prizeEight'])) {
                runPrizeEight();
              }
            ?>
          </div>
          <!-- Prize Nine -->
          <div>
            <a href='winnerSelect.php?prizeNine=true' class="button">Prize Nine Winner</a>
            <?php
              //get results from database
              $result = mysqli_query($con, "SELECT * FROM prizenine");
              $all_property = array();  //declare an array for saving property

              //showing property
              echo '<ul style="text-align:center;">';  //initialize table tag
              while ($ticket = mysqli_fetch_field($result)) {
                $all_property[] = $ticket->name;  //save those to array
              }
              echo '</ul>'; //end tr tag
              //showing all data
              while ($row = mysqli_fetch_array($result)) {
                echo "<ul style='text-align:center;'>";
                foreach ($all_property as $item) {
                  echo '<li style="margin-left: -30px;">' . $row[$item] . '</li>'; //get items using property value
                }
                echo '</ul>';
              }
              function runPrizeNine() {
                // Select array
                $DATABASE_HOST = 'localhost';
                $DATABASE_USER = 'root';
                $DATABASE_PASS = '';
                $DATABASE_NAME = 'logindb';
                // Try and connect using the info above.
                $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
                if (mysqli_connect_errno()) {
                  // If there is an error with the connection, stop the script and display the error.
                  exit('Failed to connect to MySQL: ' . mysqli_connect_error());
                }
                $p1 = mysqli_query($con,"SELECT * FROM prizenine;");
                $rows = mysqli_fetch_all($p1, MYSQLI_ASSOC);
                foreach ($rows as $row) {
                  $ticketArr[] = $row["ticket"];
                }
                // number array
                $arrayMax = count($ticketArr);
                echo $arrayMax;
                echo '<br>';
                // select random number between 1 and length of array
                $winnerNum = rand(1, $arrayMax);
                echo $winnerNum;
                // return ticket of selection

                // only select once
              }
              if (isset($_GET['prizeNine'])) {
                runPrizeNine();
              }
            ?>
          </div>
        </div>
      </div>
		</div>
    <div class="container">
      <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">&copy;<span id="output0"></span> Company, Inc</p>
        <a href="./admin.php" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
          <img src="../images/MMIT-4c-logo-watermark.png" width="80" alt="">
        </a>
        <ul class="nav col-md-4 justify-content-end">
          <li class="nav-item"><a href="admin.php" class="nav-link px-2 text-muted">Home</a></li>
          <li class="nav-item"><a href="winnerSelect.php" class="nav-link px-2 text-muted">Winner Selectin Page</a></li>
          <li class="nav-item"><a href="logout.php" class="nav-link px-2 text-muted">Logout</a></li>
        </ul>
        <script>
          let newdate = new Date().getFullYear();
          document.getElementById('output0').innerHTML = newdate;
        </script>
      </footer>
    </div>
	</body>
</html>