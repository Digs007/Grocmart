<?php
// Include config file
require_once "config.php";

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
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="index.php">GROC-MART</a>
        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-lg-auto justify-content-end">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">My Cart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <?php
                    $query = "SELECT * FROM product ORDER BY ProductId ASC";
		            $result = mysqli_query($link, $query);
		            if(mysqli_num_rows($result) > 0)
		            {
		                while($row = mysqli_fetch_array($result))
		                {
                ?>
                
                <div class="col-md-4 text-center">
                    <form action="cart.php?id=<?php echo $row["ProductId"]; ?>" method="post">
                    <div class="card mb-3 box-shadow">
                        <img class="card-img-top"
                            data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail"
                            alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;"
                            src="images/<?php echo $row["ProductId"]?>.jpg" data-holder-rendered="true">
                        <div class="card-body">
                            <div class="font-weight-bolder"><?php echo $row["Name"]?></div>
                            <input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>" />
                            <input type="hidden" name="quantity" value="1" />
                            <div style="font-size: 1.5rem;" >
                                <span style="text-decoration: line-through;"class="font-weight-light">₹<?php echo $row["Price"]?></span>
                                <span class="font-weight-bolder">₹<?php $per = $row["Price"]-$row["Price"]/10; echo number_format($per,2)?></span>
                                <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />
                            </div>
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                                additional content. This content is a little bit longer.
                            </p>
                            <div class="d-flex justify-content-center">
                                <button type="submit" name="add_to_cart"class="btn btn-md btn-outline-primary btn-block">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
                <?php
		        }
		        }
		        ?>
            </div>
        </div>
    </div>




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