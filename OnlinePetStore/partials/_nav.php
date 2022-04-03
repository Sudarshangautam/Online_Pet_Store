
<?php 
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
  $loggedin= true;
  $userId = $_SESSION['userId'];
  $username = $_SESSION['username'];
}
else{
  $loggedin = false;
  $userId = 0;
}

// $sql = "SELECT * FROM `sitedetail`";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);

// $systemName = $row['systemName'];

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php"><img alt="" src="Images/logo.png"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             Categories
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" >';
            $sql = "SELECT categorieName, categorieId FROM `categories`"; 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_assoc($result)){
              echo '<a class="dropdown-item"  href="viewProductList.php?catid=' .$row['categorieId']. '">' .$row['categorieName']. '</a>';
            }
            echo '</div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="viewOrder.php">Orders</a>
          </li>
       
        </ul>
        <form method="get" action="/OnlinePetStore/search.php" class="form-inline my-2 my-lg-0 mx-3">
          <input class="form-control mr-sm-2" type="search" name="search" id="search" placeholder="Search here..." aria-label="Search"  style="width:79%;" required>
          <button type="submit" class="btn btn-secondary mx-2" title="Search">
          <svg xmlns="img/search.svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
          <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
        <i class="bi bi-search"></i>
        </button>
        </form>';

        $countsql = "SELECT SUM(`itemQuantity`) FROM `viewcart` WHERE `userId`=$userId"; 
        $countresult = mysqli_query($conn, $countsql);
        $countrow = mysqli_fetch_assoc($countresult);      
        $count = $countrow['SUM(`itemQuantity`)'];
        if(!$count) {
          $count = 0;
        }
        echo '<a href="viewCart.php"><button type="button" class="btn btn-secondary mx-2" title="MyCart">
          <svg xmlns="img/cart.svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg>  
          <i class="bi bi-cart">' .$count. '</i>
        </button></a>';

        if($loggedin){
          echo '<ul class="navbar-nav mr-2" >
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">' .$username. '</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="  min-width: 3rem; color:#ffffff;border-color:#ffffff;background-color:#000000;margin-left:20px;">
                <a class="dropdown-item" href="partials/_logout.php" style="width:100%; color:#ffffff;background-color:#000000;padding:5px;">Logout</a>
              </div>
            </li>
          </ul>
          <div class="text-center image-size-small position-relative">
            <a href="viewProfile.php"><img src="img/person-' .$userId. '.jpg" class="rounded-circle" onError="this.src = \'img/profilePic.jpg\'" style="width:40px; height:40px"></a>
          </div>';
        }
        else {
          echo '
          <button type="button" class="btn btn-success mx-2"  data-toggle="modal" data-target="#loginModal">Login</button>';
          
        }
            
  echo '</div>
    </nav>';

    include 'partials/_loginModal.php';
    include 'partials/_signupModal.php';

    if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true") {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style=" color: #000000;
      background-color: green;
      border-color: #f9f1f1;">
              
              <strong>Successfully Registered!</strong> Now, you can now login but before check your email for the verification.
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['error']) && $_GET['signupsuccess']=="false") {
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
              <strong>Warning!</strong> ' .$_GET['error']. '
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert" style=" color: #000000;
      background-color: green;
      border-color: #f9f1f1;">
              <strong>Success!</strong> Login Successfully!
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
    if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
      echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" style=" color: #000000;
      background-color: #f60b3b;
      border-color: #f9f1f1;">
              <strong>Warning!</strong> Invalid username or password
              <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span></button>
            </div>';
    }
?>

