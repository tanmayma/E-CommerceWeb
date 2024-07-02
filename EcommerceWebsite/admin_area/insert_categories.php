<?php
    include('../includes/connect.php');
    if(isset($_POST['insert_cat'])){
        $category_title=$_POST['cat_title'];

        // checking the data is already present or not
        $select_query="select * from `categories` where category_title='$category_title'";
        $result_select=mysqli_query($con,$select_query);
        $number=mysqli_num_rows($result_select);
        if($number>0){
            echo"<script>alert('This category is already present')</script>";
        }
        else{
            $insert_query="insert into `categories` (category_title) values ('$category_title')";
            $result=mysqli_query($con,$insert_query);

            if($result){
                echo"<script>alert('Category inserted successully')</script>";
            }
        }

        
    }
?>
<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" name="cat_title" placeholder="Insert Categories" aria-label="Username" aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-auto">
        <input type="submit" class="bg-info b-0 p-2 my-3" name="insert_cat" value="Insert Categories" >
    </div>
</form>