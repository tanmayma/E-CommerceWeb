<!-- connect file -->
<?php
  include('includes/connect.php');
  include('functions/common_function.php');
  session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce-Cart details</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS file -->
    <link rel="stylesheet" href="style.css">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-info">
      <div class="container-fluid">
        <img src="./images/logo.png" alt="..." class="logo"> 
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="display_all.php">Products</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./users_area/user_registration.php">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item(); ?></sup></a>
            </li>
            
            
          </ul>
          
        </div>
      </div>
    </nav>

  <!-- second child -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <ul class="navbar-nav me-auto">
    <?php
        if(!isset($_SESSION['username'])){
          echo"
            <li class='nav-item'>
              <a class='nav-link' href='#'>Welcome Guest</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='./users_area/user_login.php'>Login</a>
            </li>
            ";
        }
        else{
          echo"
            <li class='nav-item'>
              <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='./users_area/user_logout.php'>Logout</a>
            </li>
          ";
        }
      ?>
    </ul>
  </nav>

  <!-- Third child -->

  <div class="bg-light">
    <h3 class="text-center">Hidden Store</h3>
    <p class="text-center">Communication is at the heart of e-commerce and community</p>
  </div>

  <!--Fourth child-->
    <div class="container">
        <div class="row">
          <form action="" method="post">
            <table class="table table-bordered text-center">
                
                <tbody>
                  <!-- php code to display dynamic data -->
                   <?php
                      
                      $get_ip_add=getIPAddress();
                      $total_price=0;
                      $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
                      $result=mysqli_query($con,$cart_query);
                      
                      $result_count=mysqli_num_rows($result);
                      if($result_count>0){
                        echo"<thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Total price</th>
                        <th>Remove</th>
                        <th colspan='2'>Operations</th>
                    </tr>
                </thead>";
                      
                      while($row=mysqli_fetch_array($result)){
                          $product_id=$row['product_id'];
                          $product_quantity=$row['quantity'];
                          $select_products="select * from `products` where product_id=$product_id";
                          $result_products=mysqli_query($con,$select_products);
                          while($row_product_price=mysqli_fetch_array($result_products)){
                              $product_price=array($row_product_price['product_price']);
                              $price_table=$row_product_price['product_price'];
                              $product_title=$row_product_price['product_title'];
                              $product_image1=$row_product_price['product_image1'];
                              $product_values=array_sum($product_price);
                              $total_price+=$product_values;
              
                   ?>
                    <tr>
                        <td><?php echo $product_title ?></td>
                        <td><img src="./admin_area/product_images/<?php echo $product_image1 ?>" alt="" class="cart-img"></td>
                        <input type="hidden" value="<?php echo $product_id ?>" name="update_quantity_id">
                        <td><input type="number" min="1" name="qty" id="qty" value=<?php echo $product_quantity ?> class="form-input w-50" disabled></td>
                        <?php
                        echo"
                            <td>$price_table/-</td>
                            <td><input type='checkbox' name='removeitem[]' value='$product_id'></td>
                            <td>
                              <input type='submit' value='Update Cart' class='bg-info px-3 py-2 border-0 mx-3' name='update_cart'>
                              <input type='submit' value='Remove Cart' class='bg-danger px-3 py-2 border-0 mx-3' name='remove_cart'>
                            </td>
                        </tr>
                        ";
                        
                    
                                }
                              }
                              }
                              else{
                                echo"<h2 class='text-center text-danger'>Cart is empty</h2>";
                              }

                              
                    ?>
                </tbody>
            </table>
            <?php
              $get_ip_add=getIPAddress();
              $cart_query="select * from `cart_details` where ip_address='$get_ip_add'";
              $result=mysqli_query($con,$cart_query);
              $result_count=mysqli_num_rows($result);
              if($result_count>0){
                echo"
                  <div class='d-flex mb-5'>
                    <h4 class='px-3'><Source>Subtotal: <strong class='text-info'> $total_price/-</strong></Source></h4>
                    <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3' name='continue_shopping'>
                    <button class='bg-secondary p-3 py-2 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>
                </div>
                ";
              }
              else{
                echo "
                  <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 border-0 mx-3 mb-2' name='continue_shopping'>
                ";
              }
              if(isset($_POST["continue_shopping"])){
                echo"<script>window.open('index.php','_self')</script>";
              }
            ?>
            
        </div>
    </div>
    </form>

    <!-- function to remove item -->
     <?php
        // function remove_cart_item(){
        //   global $con;
        //   if(isset($_POST['remove_cart'])){
        //     foreach(['removeitem'] as $remove_id){
        //       $delete_query="delete from `cart_details` where product_id=$remove_id";
        //       $run_delete=mysqli_query($con,$delete_query);
        //       if($run_delete){
        //         echo"<script>alert('Deleted')</script>";
        //         echo "<script>window.open('cart.php','_self')</script>";
        //       }
        //     }
        //   }
        // }
        // echo $remove_item=remove_cart_item();
     ?>
    <?php
      // update cart query
      // if(isset($_POST['update_cart'])){
      //   $update_value=$_POST['qty'];
      //   $update_id=$_POST['update_quantity_id'];
      //   echo $update_value."<br>";
      //   echo $update_id;
      // }
    ?>

  <!-- last child -->
  <!-- include footer -->
   <?php include("./includes/footer.php")?>
   <!-- <script>
      $(document).ready(function(){
        $("#qty").onchange(function(){

        });
      });
   </script>
    -->

      <?php
        // function hello(){
        //   echo "<script>alert('Hi')</script>";
        // }
      ?>

  <!-- bootstrap js link -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>