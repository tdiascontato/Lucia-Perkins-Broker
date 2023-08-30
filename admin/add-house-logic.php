<?php
require 'config/database.php';

if(isset($_POST['submit'])){
    $author_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rooms = filter_var($_POST['rooms'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $baths = filter_var($_POST['baths'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $descriptionone = filter_var($_POST['descriptionone'], FILTER_SANITIZE_NUMBER_INT);
    $descriptiontwo = filter_var($_POST['descriptiontwo'], FILTER_SANITIZE_NUMBER_INT);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];
    $thumbnail2 = $_FILES['thumbnail2'];
    //set is_featured to 0 if unchecked
    $is_featured = $is_featured == 1 ?: 0;
    //validate form data
    if(!$title){
        $_SESSION['add-house'] = "Enter house's title";
    }elseif(!$rooms){
        $_SESSION['add-house'] = "Enter number of rooms";
    }elseif(!$baths){
        $_SESSION['add-house'] = "Enter number of baths";
    }elseif(!$descriptionone){
        $_SESSION['add-house'] = "Enter with the first description";
    }elseif(!$descriptiontwo){
        $_SESSION['add-house'] = "Enter with the second description";
    }elseif(!$body){
        $_SESSION['add-house'] = "Enter post body";
    }elseif(!$category_id){
        $_SESSION['add-house'] = "Select post category";
    }elseif(!$thumbnail['name']){
        $_SESSION['add-house'] = "Choose post thumbnail";
    }elseif(!$thumbnail2['name']){
        $_SESSION['add-house'] = "Choose post thumbnail2";
    }else{
        //WORK ON THUMBNAIL
        //rename the image
        $time = time(); // make each image name unique
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = './images/' . $thumbnail_name;
        //make sure file is an Image
        $allowed_files = ['png', 'jpg', 'jpeg'];
        $extension = explode('.', $thumbnail_name);
        $extension = end($extension); 
        if(in_array($extension, $allowed_files)){
            //make sure image is not too big (2mb+)
            if($thumbnail['size'] < 2000000){
                //upload thumbnail
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
            }else{
                $_SESSION['add-post'] = "File size too big. Must be - 2mb";
            }
        }else{
            $_SESSION['add-post'] = "Must be PNG, JPG or JPEG";
        }
        $time = time(); // make each image name unique
        $thumbnail_name2 = $time . $thumbnail2['name'];
        $thumbnail_tmp_name = $thumbnail2['tmp_name'];
        $thumbnail_destination_path = './images/' . $thumbnail_name2;
        //make sure file is an Image
        $allowed_files = ['png', 'jpg', 'jpeg'];
        $extension = explode('.', $thumbnail_name2);
        $extension = end($extension); 
        if(in_array($extension, $allowed_files)){
            //make sure image is not too big (2mb+)
            if($thumbnail2['size'] < 2000000){
                //upload thumbnail
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
            }else{
                $_SESSION['add-house'] = "File size too big. Must be - 2mb";
            }
        }else{
            $_SESSION['add-house'] = "Must be PNG, JPG or JPEG";
        }

    }
    //redirect back (with form data) to add post page if there is any problem
    if(isset($_SESSION['add-house'])){
        $_SESSION['add-house-data'] = $_POST;
        header('location:' . ROOT_URL . 'admin/add-house.php');
        die();
    }else{
        //set is_featured of all posts to 0 if is_featured for this post is 1
        if($is_featured == 1){
            $zero_all_is_featured_query = "UPDATE houses SET is_featured=0";
            $zero_all_is_featured_query = mysqli_query($connection, $zero_all_is_featured_query);
        }
        $query = "INSERT INTO houses (title, rooms, baths, descriptionone, descriptiontwo, body, thumbnail, thumbnail2, category_id, author_id, is_featured) VALUES ('$title', '$rooms', '$baths', '$descriptionone', '$descriptiontwo', '$body', '$thumbnail_name', '$thumbnail_name2', '$category_id', '$author_id', '$is_featured')";
        $result = mysqli_query($connection, $query);

        if(!mysqli_errno($connection)){
            $_SESSION['add-post-success'] = "New post added successfully";
            header('location:' . ROOT_URL . 'admin/');
            die();
        }
    }
}
header('location:' . ROOT_URL . 'admin/add-post.php');
die();