<?php
    
  $username = $_SESSION['Username'];
  $q2=$con->prepare("SELECT FullName from users where UserName='$username'");
  $q2->execute();
  
  $row = $q2->fetch();
  $name = $row['FullName'];
?>

<!-- Start Header -->
<div class="header main-back">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="logo">
        <h2 class="h1 logo"><a href="home.php">YR</a><i class="fas fa-seedling"></i></h2>
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
        <div class="links">
          <ul class="navbar-nav">
            
          </ul>
        </div>
        <div class="profile">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <h6 class="name"><?php echo $name; ?><i class="fas fa-chevron-down second-color"></i></h6>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item main-color" href="logout.php"><i></i> Log out</a>
              </div>
        </div>
      </div>
    </nav>
</div>
<!-- End Header -->
