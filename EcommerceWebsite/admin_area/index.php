<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- CSS file -->
    <link rel="stylesheet" href="../style.css">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!-- navbar -->
     <div class="container-fluid p-0">
        <!-- first child -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
            <img src="../images/logo.png" alt="..." class="logo">
            <nav class="navbar-expand-lg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="" class="nav-link">Welcome guest</a>
                    </li>
                </ul>
            </nav>
            </div>
        </nav>

        <!-- second child -->
         <div class="bg-light">
            <h3 class="text-center p-2">Manage Details</h3>
         </div>

         <!-- third child -->
        <div class="row">
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/apple1.png" alt="dp" class="admin_image"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button><a href="insert_product.php" class="nav-link text-light bg-info my-1 px-2">Insert Products</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 px-2">View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1 px-2">Insert Categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 px-2">View Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1 px-2">Insert Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 px-2">View Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 px-2">All Orders</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 px-2">All Payments</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 px-2">List Users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1 px-2">Logout</a></button>
                </div>
            </div>
        </div>
     </div>

     <!-- fourth child -->
    <div class="container m-3">
        <?php
            if(isset($_GET['insert_category'])){
                include('insert_categories.php');
            }
            if(isset($_GET['insert_brand'])){
                include('insert_brands.php');
            }
        ?>
    </div>

     <!-- last child -->
  <div class="bg-info p-3 text-center footer">
    <p>All rights reserved @- Designed by Tanmay</p>
  </div>


    <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>