<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_product'])){
        $product_title=$_POST['product_title'];
        $description=$_POST['description'];
        $product_keywords=$_POST['product_keywords'];
        $product_categories=$_POST['product_categories'];
        $product_brands=$_POST['product_brands'];
        $product_price=$_POST['product_price'];
        $product_status='true';

        // accessing images
        $product_image1=$_FILES['product_image1']['name'];
        $product_image2=$_FILES['product_image2']['name'];
        $product_image3=$_FILES['product_image3']['name'];

        // accessing image temp name
        $temp_image1=$_FILES['product_image1']['tmp_name'];
        $temp_image2=$_FILES['product_image2']['tmp_name'];
        $temp_image3=$_FILES['product_image3']['tmp_name'];

        // checking empty condition
        if($product_title=='' or $description=='' or $product_keywords=='' or $product_categories=='' or $product_brands=='' or $product_price==''){
            echo"<script>alert('Please fill all the available fields')</script>";
            exit();
        }
        else{
            move_uploaded_file($temp_image1,"./product_images/$product_image1");
            move_uploaded_file($temp_image2,"./product_images/$product_image2");
            move_uploaded_file($temp_image3,"./product_images/$product_image3");

            $insert_products="insert into `products` (product_title,product_description,product_keywords,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) values ('$product_title','$description','$product_keywords','$product_categories','$product_brands','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
            $result_query=mysqli_query($con,$insert_products);
            if($result_query){
                echo"<script>alert('Products Inserted Successfully')</script>";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product- Admin Panel</title>
    <!-- bootstrap css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS file -->
    <link rel="stylesheet" href="style.css">
</head>
<body class="bg-light">
    
    <div class="conainer mt-3">
        <h1 class="text-center">Insert Products</h1>
    </div>
    <!-- form -->
    <form action="" method="post" enctype="multipart/form-data">
        <!-- title -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_title" class="form-label">Product title</label>
            <input type="text" name="product_title" id="product_title" placeholder="Enter product title" autocomplete="off" class="form-control" required="required">
        </div>
        <!-- description -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="description" class="form-label">Product description</label>
            <input type="text" name="description" id="description" placeholder="Enter product description" autocomplete="off" class="form-control" required="required">
        </div>
        <!-- keywords -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_keywords" class="form-label">Product keyword</label>
            <input type="text" name="product_keywords" id="product_keywords" placeholder="Enter product keywords" autocomplete="off" class="form-control" required="required">
        </div>
        <!-- categories -->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_categories" id="" class="form-select">
                <option value="">Select a Category</option>
                <?php
                    $select_query="select * from `categories`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $category_title=$row['category_title'];
                        $category_id=$row['category_id'];
                        echo"
                            <option value='$category_id'>$category_title</option>
                        ";
                    }
                ?>
            </select>
        </div>
        <!-- Brands -->
        <div class="form-outline mb-4 w-50 m-auto">
            <select name="product_brands" id="" class="form-select">
                <option value="">Select a brands</option>
                <?php
                    $select_query="select * from `brand`";
                    $result_query=mysqli_query($con,$select_query);
                    while($row=mysqli_fetch_assoc($result_query)){
                        $brand_title=$row['brand_title'];
                        $brand_id=$row['brand_id'];
                        echo"
                            <option value='$brand_id'>$brand_title</option>
                        ";
                    }
                ?>
            </select>
        </div>
        <!-- image1 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image1" class="form-label">Product Image1</label>
            <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
        </div>
        <!-- image2 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image2" class="form-label">Product Image2</label>
            <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
        </div>
        <!-- image3 -->
        <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_image3" class="form-label">Product Image3</label>
            <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
        </div>
         <!-- price -->
         <div class="form-outline mb-4 w-50 m-auto">
            <label for="product_price" class="form-label">Product price</label>
            <input type="text" name="product_price" id="product_price" placeholder="Enter product price" autocomplete="off" class="form-control" required="required">
        </div>
        <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
        </div>
    </form>


     <!-- bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>