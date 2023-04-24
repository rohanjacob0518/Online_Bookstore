<?php
include("functions/functions.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>BOOKSTORE</title>
</head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style/styles.css" media="all">
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
<div class="container-fluid">
    <a class="navbar-brand" href="index.php"><h1 class="display-4">BOOKSTORE</h1></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link">All Books</a>
            </li>
            <li class="nav-item">
                <a class="nav-link">
                 <?php
                    if(!isset($_SESSION['customer_email']))
                    {
                         
                        echo "Welcome user";
                    }
                    else   
                    {
                        
                         $f=$_SESSION['customer_email'];
                        echo "Welcome:".$f;
                    }
                    
                    ?>
                </a>
            </li>
                   <li class="nav-item">
               <div class="dropdown">
  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Shopping Cart
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class='dropdown-item' href='cart.php'>Go to Cart</a>
              <?php
    if(!isset($_SESSION['customer_email']))
    {
        echo"<a href='checkout.php' class='dropdown-item'>Login</a>";
    }
      else
      {
          echo"<a href='logout.php' class='dropdown-item'>Logout</a>";
      }
    ?>
      <a class='dropdown-item disabled' href='#'>Total Items: <?php totalItems() ?></a>
      <a class='dropdown-item disabled' href='#'>Total Price:Rs<?php totalPrice() ?></a>
  </div>
    </li>
    
        </ul>
        <div class="dropdown">
  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Categories
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <?php
      get_catg();
      ?>
  </div>
</div>
        <form class="form-inline" method="get" enctype="multipart/form-data" action="result.php">
        <input class="form-control mr-sm-2" type="text" placeholder="search" aria-label="search" name="user_query">
            <input class="btn btn-dark my-sm-0" type="submit" name="Search" value="Search">
        </form>
    </div>
    
</div>
</nav>
   

<!--jumbotron-->

    
<!--product list-->
<div class="container-fluid bg-light">
    <?php
    cart();
    ?>
<?php
  global $conn;
    $get_book="select * from books";
    $run_book=mysqli_query($conn,$get_book);
   echo"<div class='row'>
   ";
    while($row_book=mysqli_fetch_array($run_book))
    {
        $b_id=$row_book['book_id'];
        $b_cat=$row_book['book_category'];
        $b_title=$row_book['book_title'];
        $b_author=$row_book['book_author'];
        $b_image=$row_book['book_image'];
        $b_price=$row_book['book_price'];
        $b_id=$row_book['book_id'];
        echo "
    <div class='card' style='width: 19rem;'>
  <img class='card-img-top' src='admin/product_pics/$b_image' alt='Card image cap' height='300' width='80'>
  <div class='card-body'>
    <h5 class='card-title'>$b_title</h5>
    <p class='card-text'>Author : $b_author <br> Price : Rs.$b_price</p>
    <a href='details.php?book_id=$b_id' class='btn btn-primary'>Details</a>
     <a href='index.php?add_cart=$b_id' class='btn btn-primary'>Add to Cart</a>
  </div>
</div>
 ";
    }
  echo"</div>";
?>
</div>
    <section class="footer bg-dark container-fluid">
    <div class="container-fluid text-center">
        <div class="row">
            
        <div class="col">
            
            <ul class="navbar-nav">
           
            <li class="nav-item">
                <a class="nav-link" href="#">Contact Us</a>
            </li>
        </ul>
            </div>
            
        
        </div>
        
        </div>
    
    
    </section>
</body>
</html>
