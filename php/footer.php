<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-muted">&copy;<span id="output0"></span> Company, Inc</p>
    <a href="./home.php" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <!-- <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg> -->
      <img src="../images/MMIT-4c-logo-watermark.png" width="80" alt="">
    </a>
    <ul class="nav col-md-4 justify-content-end">
      <li class="nav-item"><a href="home.php" class="nav-link px-2 text-muted">Home</a></li>
      <li class="nav-item"><a href="raffle.php" class="nav-link px-2 text-muted">Raffle</a></li>
      <li class="nav-item"><a href="profile.php" class="nav-link px-2 text-muted">Profile</a></li>
      <li class="nav-item"><a href="logout.php" class="nav-link px-2 text-muted">Logout</a></li>
    </ul>
    <script>
      let newdate = new Date().getFullYear();
      document.getElementById('output0').innerHTML = newdate;
    </script>
  </footer>
</div>