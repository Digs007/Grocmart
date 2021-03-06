<?php 
// Include config file
require_once "config.php";
session_start();
$hidden_name = $hidden_price = $quantity = "";
if(!isset($_SESSION["Username"])){
  echo '<script>alert("Log in first")</script>';
  echo '<script>window.location = "login.php"</script>';
}
    
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
		$count = count($_SESSION["shopping_cart"]);
		$item_array = array(
		'item_id'		=>	$_GET["id"],
		'item_name'		=>	$_POST["hidden_name"],
		'item_price'		=>	$_POST["hidden_price"],
		'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
      $count = count($_SESSION["shopping_cart"]);
      for($i = 0; $i < $count; $i++)
        if($_SESSION["shopping_cart"][$i]['item_id'] == $_GET["id"]){
          $_SESSION["shopping_cart"][$i]['item_quantity'] = $_POST["quantity"];
        }
		}
	}
	else
	{
		$item_array = array(
		'item_id'		=>	$_GET["id"],
		'item_name'		=>	$_POST["hidden_name"],
		'item_price'		=>	$_POST["hidden_price"],
		'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}
 
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
		if($values["item_id"] == $_GET["id"])
		{
    unset($_SESSION["shopping_cart"][$keys]);
		echo '<script>alert("Item Removed")</script>';
		echo '<script>window.location = "cart.php"</script>';
		}
		}
  }
  if($_GET["action"] == "clear"){
    unset($_SESSION["shopping_cart"]);
    unset($_SESSION["total"]);
    echo '<script>alert("cart all items Removed")</script>';
		echo '<script>window.location = "cart.php"</script>';
  }
}

?>
<!doctype html>
<html lang="en">

<head>
  <title>GROC-MART</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="style.css" type="text/css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
    integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>

  <!-- Header -->
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <a class="navbar-brand" href="welcome.php">GROC-MART</a>
    <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-lg-auto justify-content-end">
        <li class="nav-item active">
          <a class="nav-link" href="order.php">Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cart.php">My Cart</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">
            <h6>Hi, <br><?php echo htmlspecialchars($_SESSION["FirstName"]); ?></h6>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- Header End -->

  <div class="d-flex justify-content-between">
    <h3>Order Details</h3>
    <a href="cart.php?action=clear">
      <button type="button" class="btn btn-danger">Clear all cart</button>
    </a>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered">
      <tr>
        <th width="40%">Item Name</th>
        <th width="10%">Quantity</th>
        <th width="20%">Price</th>
        <th width="15%">Total</th>
        <th width="5%">Action</th>
      </tr>
      <?php
		if(!empty($_SESSION["shopping_cart"]))
		{
		$sum = 0;
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
		?>
      <tr>
        <td><?php echo $values["item_name"]; ?></td>
        <td><?php echo $values["item_quantity"]; ?></td>
        <td>$ <?php echo $values["item_price"]; ?></td>
        <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
        <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span
              class="text-danger">Remove</span></a></td>
      </tr>
      <?php
		$sum = $sum + ($values["item_quantity"] * $values["item_price"]);
		}
		?>
      <tr>
        <td colspan="3" align="right">Total</td>
        <td align="right">$ <?php (float) $_SESSION["total"] = number_format($sum, 2);echo $_SESSION["total"]; ?></td>
        <td></td>
      </tr>
      <?php
    }
		?>

    </table>
  </div>
  <div class="d-flex justify-content-center">
    <a href="checkout.php">
      <span>
        <button class="btn btn-success btn-lg " type="submit">Continue to checkout</button>
      </span>
    </a>
  </div>
  


  <!-- Footer -->
  <footer class="bg-white">
    <div class="container py-5">
      <div class="row py-4">
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0"><img src="images/logo.png" alt="" width="180" class="mb-3">
          <p class="font-italic text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt.</p>
          <ul class="list-inline mt-4">
            <li class="list-inline-item"><a href="#" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a>
            </li>
            <li class="list-inline-item"><a href="#" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a>
            </li>
            <li class="list-inline-item"><a href="#" target="_blank" title="instagram"><i
                  class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="pinterest"><i
                  class="fa fa-pinterest"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="vimeo"><i class="fa fa-vimeo"></i></a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">Shop</h6>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="#" class="text-muted">For Vegetables</a></li>
            <li class="mb-2"><a href="#" class="text-muted">For Fruits</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Stores</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Our Blog</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">Company</h6>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="login.php" class="text-muted">Login</a></li>
            <li class="mb-2"><a href="register.php" class="text-muted">Register</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Wishlist</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Our Products</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">Newsletter</h6>
          <p class="text-muted mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. At itaque temporibus.</p>
          <div class="p-1 rounded border">
            <div class="input-group">
              <input type="email" placeholder="Enter your email address" aria-describedby="button-addon1"
                class="form-control border-0 shadow-0">
              <div class="input-group-append">
                <button id="button-addon1" type="submit" class="btn btn-link"><i class="fa fa-paper-plane"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Footer End-->

    <!-- Copyrights -->
    <div class="bg-light py-1">
      <div class="container text-center">
        <p class="text-muted mb-0 py-2">© 2020 Digvijay All rights reserved.</p>
      </div>
    </div>
  </footer>




  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>