<!-- If we want to check if the user has activated their account, we can add the following code to the pages we want to restrict non-activated users: -->

============================================================================

<!-- if ($account['activation_code'] == 'activated') {
	// account is activated
	// Display home page etc
} else {
	// account is not activated
	// redirect user or display an error
} -->

============================================================================

<!-- For the above code to work, you will need to connect to your MySQL database and select the user's account. -->

============================================================================

<?php session_start(); ?>
<?php include_once('header.php') ?>
<main class="container-fluid">
  <?php 
  $page = isset($_GET['page']) ? $_GET['page'] : "draw";
  include("{$page}.php"); 
  ?>
</main>
<?php include_once('footer.php') ?>




<div class="col">
  <div class="card shadow-sm">
    <img src="https://via.placeholder.com/225" alt="">
    <div class="card-body">
      <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum officiis accusantium maxime reiciendis aspernatur nihil ipsum ipsa.</p>
      <div class="d-flex justify-content-between align-items-center">
        <?php
          $global_tickets = 0;
          if(array_key_exists('inc', $_POST)) {
            inc();
          }
          else if(array_key_exists('dec', $_POST)) {
            dec();
          }
          function inc() {
            echo "Increment is selected";
            global $global_tickets;
            $global_tickets++;
          }
          function dec() {
            echo "Decrement is selected";
            global $global_tickets;
            $global_tickets--;
          }
        ?>
        <form method="post">
          <input type="submit" name="inc" class="button btn btn-sm btn-outline-secondary" value="inc" />
          <input type="submit" name="dec" class="button btn btn-sm btn-outline-secondary" value="dec" />
          <p><?php echo "The count is " . $global_tickets; ?></p>
        </form>
        <form action="insert.php" method="post">
          <p>
            <label for="ticketNum">Ticket Number:</label>
            <input type="number" name="ticket_Num" id="ticketNum" min="1" max="14">
          </p>
          <input type="submit" value="Submit">
        </form>
      </div>
    </div>
  </div>
</div> 







============================================================================================================
Sample Connection
============================================================================================================




$servername = "localhost";
  $username = "username";
  $password = "password";
  $dbname = "database_name";
  
  // Create connection
  $conn = new mysqli($servername,
      $username, $password, $dbname);
  
  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: "
          . $conn->connect_error);
  }
  
  $sqlquery = "INSERT INTO table VALUES
      ('John', 'Doe', 'john@example.com')"
  
  if ($conn->query($sql) === TRUE) {
      echo "record inserted successfully";
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }






  <div class="col">
    <div class="card shadow-sm">
      <img src="https://via.placeholder.com/225" alt="">
      <!-- <img src="./images/sq.jpg" width="225" alt=""> -->
      <div class="card-body">
        <p class="card-text pb-2">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum officiis accusantium maxime reiciendis aspernatur nihil ipsum ipsa.</p>
        <div class="d-flex justify-content-between align-items-center">
          <p>Main: <span id="mainCount">0</span></p>
          <p>Prize 1: <span id="p1local">0</span></p>
          <p>Prize 2: <span id="p2local">0</span></p>

          <p>Prize 3: <span id="p3local">0</span></p>
          <p>Prize 4: <span id="p4local">0</span></p>
          <p>Prize 5: <span id="p5local">0</span></p>
        </div>
      </div>
    </div>
  </div> 