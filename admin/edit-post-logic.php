<?php
require 'config/database.php';

if(isset($_POST['submit'])){
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $previous_thumbnail_name = filter_var($_POST['previous_thumbnail_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $descriptionone = filter_var($_POST['descriptionone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $descriptiontwo = filter_var($_POST['descriptiontwo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rooms = filter_var($_POST['rooms'], FILTER_SANITIZE_NUMBER_INT);
    $baths = filter_var($_POST['baths'], FILTER_SANITIZE_NUMBER_INT);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];
    $thumbnail_second = $_FILES['thumbnail_second'];
    //set is_featured to 0 if unchecked
    $is_featured = $is_featured == 1 ? 1 : 0;
    //validate form data
    if(!$title || !$category_id || !$body || !$descriptionone || !$descriptiontwo || !$rooms || !$baths || !$price){
        $_SESSION['edit-post'] = "Please fill in all the required fields";
    }else{ 
        //delete existing thumbnail if new thumbnail is available
        if($thumbnail['name'] || $thumbnail_second['name']){
            $previous_thumbnail_path = '../images/' . $previous_thumbnail_name;
            if(file_exists($previous_thumbnail_path)){
                unlink($previous_thumbnail_path);
            }
            //WORK ON THUMBNAIL
            //rename the image
            $time = time(); // make each image name unique
            $thumbnail_name = $time . $thumbnail['name'];
            $thumbnail_tmp_name = $thumbnail['tmp_name'];
            $thumbnail_destination_path = '../images/' . $thumbnail_name; 

            $thumbnail_second_name = $time . $thumbnail_second['name'];
            $thumbnail_second_tmp_name = $thumbnail_second['tmp_name'];
            $thumbnail_second_destination_path = '../images/' . $thumbnail_second_name;
            
            //make sure file is an Image
            $allowed_files = ['png', 'jpg', 'jpeg'];
            $thumbnail_extension = pathinfo($thumbnail_name, PATHINFO_EXTENSION);
            $thumbnail_second_extension = pathinfo($thumbnail_second_name, PATHINFO_EXTENSION);

            if(in_array($thumbnail_extension, $allowed_files) && in_array($thumbnail_second_extension, $allowed_files)){
            //make sure image is not too big (2mb+)
            if($thumbnail['size'] < 2000000 && $thumbnail_second['size'] < 2000000){
                    //upload avatar
                    move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
                    move_uploaded_file($thumbnail_second_tmp_name, $thumbnail_second_destination_path);
                }else{
                    $_SESSION['edit-post'] = "File size too big. Must be - 2mb";
                }
            }else{
                $_SESSION['edit-post'] = "Must be PNG, JPG or JPEG";
            }
        }
    }
    //redirect back (with form data) to edit post page if there is any problem
    if($_SESSION['edit-post']){
        //redirect to manage form page if form was invalid
        header('location:' . ROOT_URL . 'admin/edit-post.php?id=' . $id);//Está caindo aqui
        die();
    }else{
        //set is_featured of all posts to 0 if is_featured for this post is 1
        if($is_featured == 1){
            $zero_all_is_featured_query = "UPDATE posts SET is_featured=0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
        }
        //set thumbnail name if a new one was uploaded, else keep old thumbnail
        $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name;
        $thumbnail_second_to_insert = $thumbnail_second_name ?? $previous_thumbnail_name;
        
        $query = "UPDATE posts SET title='$title', body='$body',  descriptionone='$descriptionone', descriptiontwo='$descriptiontwo', rooms=$rooms, baths=$baths, price=$price , thumbnail='$thumbnail_to_insert', thumbnail_second='$thumbnail_second_to_insert', category_id=$category_id, is_featured=$is_featured WHERE id=$id /*LIMIT 1*/";
        $result = mysqli_query($connection, $query);
        
        if($result){
            $_SESSION['edit-post-success'] = "Post updated successfully";
        } else { 
            $_SESSION['edit-post'] = "An error occurred while updating the post";
        }
    }
}
    
header('location:' . ROOT_URL . 'admin/');
die();
