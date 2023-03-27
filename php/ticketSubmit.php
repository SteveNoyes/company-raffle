<?php
  // We need to use sessions, so you should always start sessions using the below code.
  session_start();
  // If the user is not logged in redirect to the login page...
  if (!isset($_SESSION['loggedin'])) {
    header('Location: ../index.html');
    exit;
  }
  // log into one server
  // use different table for each prize 
  // on submit take number and generate ticket id(s)

  // For choosing winner 
  // Create admin account
  // Admin can select a prize table and randomly select a winnder from it

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
  // Taking value from the form data input
  $prize_one = $_REQUEST['prizeOne'];
  $prize_two = $_REQUEST['prizeTwo'];
  $prize_three = $_REQUEST['prizeThree'];
  $prize_four = $_REQUEST['prizeFour'];
  $prize_five = $_REQUEST['prizeFive'];
  $prize_six = $_REQUEST['prizeSix'];
  $prize_seven = $_REQUEST['prizeSeven'];
  $prize_eight = $_REQUEST['prizeEight'];
  $prize_nine = $_REQUEST['prizeNine'];

  // select SESSION information
  $selectID = $_SESSION['id'];
  $selectNAME = $_SESSION['name'];
  $ticketID = $selectID . "-" . $selectNAME; 

  // if prize == 0 do nothing
  // if prize > 0 generate tickets in a loop until 0

  // Prize One
  if ($prize_one > "0") {
    for ($x = 1; $x <= $prize_one; $x++)  {
      // generate random number 
      $randNum = rand(1000000000000000000, 9000000000000000000);
      // concatenate to make ticket
      $ticket = $ticketID . "-" . $randNum;
      // Performing insert query execution
      $sql = "INSERT INTO prizeone VALUES ('$ticket')";
      if(mysqli_query($con, $sql)){
        // echo "<h3>data stored in a database successfully."
        //   . " Please browse your localhost php my admin"
        //   . " to view the updated data</h3>";

        // echo nl2br("\n$ticket");
      } else{
        echo "ERROR: Hush! Sorry $sql. "
          . mysqli_error($con);
      }
    }
  }
  // Prize Two
  if ($prize_two > "0") {
    for ($x = 1; $x <= $prize_two; $x++)  {
      // generate random number 
      $randNum = rand(1000000000000000000, 9000000000000000000);
      // concatenate to make ticket
      $ticket = $ticketID . "-" . $randNum;
      // Performing insert query execution
      $sql = "INSERT INTO prizetwo VALUES ('$ticket')";
      if(mysqli_query($con, $sql)){
      } else{
        echo "ERROR: Hush! Sorry $sql. "
          . mysqli_error($con);
      }
    }
  }
  // Prize Three
  if ($prize_three > "0") {
    for ($x = 1; $x <= $prize_three; $x++)  {
      // generate random number 
      $randNum = rand(1000000000000000000, 9000000000000000000);
      // concatenate to make ticket
      $ticket = $ticketID . "-" . $randNum;
      // Performing insert query execution
      $sql = "INSERT INTO prizethree VALUES ('$ticket')";
      if(mysqli_query($con, $sql)){
      } else{
        echo "ERROR: Hush! Sorry $sql. "
          . mysqli_error($con);
      }
    }
  }
  // Prize Four
  if ($prize_four > "0") {
    for ($x = 1; $x <= $prize_four; $x++)  {
      // generate random number 
      $randNum = rand(1000000000000000000, 9000000000000000000);
      // concatenate to make ticket
      $ticket = $ticketID . "-" . $randNum;
      // Performing insert query execution
      $sql = "INSERT INTO prizefour VALUES ('$ticket')";
      if(mysqli_query($con, $sql)){
      } else{
        echo "ERROR: Hush! Sorry $sql. "
          . mysqli_error($con);
      }
    }
  }
  // Prize Five
  if ($prize_five > "0") {
    for ($x = 1; $x <= $prize_five; $x++)  {
      // generate random number 
      $randNum = rand(1000000000000000000, 9000000000000000000);
      // concatenate to make ticket
      $ticket = $ticketID . "-" . $randNum;
      // Performing insert query execution
      $sql = "INSERT INTO prizefive VALUES ('$ticket')";
      if(mysqli_query($con, $sql)){
      } else{
        echo "ERROR: Hush! Sorry $sql. "
          . mysqli_error($con);
      }
    }
  }
  // Prize Six
  if ($prize_six > "0") {
    for ($x = 1; $x <= $prize_six; $x++)  {
      // generate random number 
      $randNum = rand(1000000000000000000, 9000000000000000000);
      // concatenate to make ticket
      $ticket = $ticketID . "-" . $randNum;
      // Performing insert query execution
      $sql = "INSERT INTO prizesix VALUES ('$ticket')";
      if(mysqli_query($con, $sql)){
      } else{
        echo "ERROR: Hush! Sorry $sql. "
          . mysqli_error($con);
      }
    }
  }
  // Prize Seven
  if ($prize_seven > "0") {
    for ($x = 1; $x <= $prize_seven; $x++)  {
      // generate random number 
      $randNum = rand(1000000000000000000, 9000000000000000000);
      // concatenate to make ticket
      $ticket = $ticketID . "-" . $randNum;
      // Performing insert query execution
      $sql = "INSERT INTO prizeseven VALUES ('$ticket')";
      if(mysqli_query($con, $sql)){
      } else{
        echo "ERROR: Hush! Sorry $sql. "
          . mysqli_error($con);
      }
    }
  }
  // Prize Eight
  if ($prize_eight > "0") {
    for ($x = 1; $x <= $prize_eight; $x++)  {
      // generate random number 
      $randNum = rand(1000000000000000000, 9000000000000000000);
      // concatenate to make ticket
      $ticket = $ticketID . "-" . $randNum;
      // Performing insert query execution
      $sql = "INSERT INTO prizeeight VALUES ('$ticket')";
      if(mysqli_query($con, $sql)){
      } else{
        echo "ERROR: Hush! Sorry $sql. "
          . mysqli_error($con);
      }
    }
  }
  // Prize Nine
  if ($prize_nine > "0") {
    for ($x = 1; $x <= $prize_nine; $x++)  {
      // generate random number 
      $randNum = rand(1000000000000000000, 9000000000000000000);
      // concatenate to make ticket
      $ticket = $ticketID . "-" . $randNum;
      // Performing insert query execution
      $sql = "INSERT INTO prizenine VALUES ('$ticket')";
      if(mysqli_query($con, $sql)){
      } else{
        echo "ERROR: Hush! Sorry $sql. "
          . mysqli_error($con);
      }
    }
  }
  // On Submit check submitCheck to = 1, this will block login
  $sql = "UPDATE accounts SET submitCheck=1 WHERE id =$selectID";
  if(mysqli_query($con, $sql)){
  } else{
    echo "ERROR: Hush! Sorry $sql. "
      . mysqli_error($con);
  }
  // Close connection
  mysqli_close($con);
  // Go to
  $_SESSION['submit'] = FALSE;
  header('Location: ./results.php');
?>