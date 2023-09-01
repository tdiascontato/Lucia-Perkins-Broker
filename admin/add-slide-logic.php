<<?php
    require 'config/database.php';

    if(isset($_POST['submit'])){ 
        $thumbnail_slider = $_FILES['thumbnail_slider'];
        if(!$thumbnail_slider['name']){
            $_SESSION['add-slide'] = "Enter slide";
        }else{
            $thumbnail_time = time(); 
            $thumbnail_name = $thumbnail_time . $thumbnail_slider['name'];
            $thumbnail_tmp_name = $thumbnail_slider['tmp_name'];
            $thumbnail_destination_path = '../images/' . $thumbnail_name;
            $allowed_files = ['png', 'jpg', 'jpeg'];
            $thumbnail_extension = pathinfo($thumbnail_name, PATHINFO_EXTENSION);
            if (in_array($thumbnail_extension, $allowed_files)) {
                if ($thumbnail['size'] < 2000000) {
                    move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
                } else {
                    $_SESSION['add-slide'] = "Thumbnail file size must be less than 2MB";
                }
            } else {
                $_SESSION['add-slide'] = "Thumbnails must be in PNG, JPG, or JPEG format";
            }
        }
        if(isset($_SESSION['add-slide'])){
            $_SESSION['add-slide-data'] = $_POST;
            header('location:' . ROOT_URL . 'admin/add-slide.php');
            die();
        }else{
            //insert category into db
            $query = "INSERT INTO categories(thumbnail_slider) VALUES ('$thumbnail_slider')";
            $result = mysqli_query($connection, $query);
            if(mysqli_errno($connection)){
                $_SESSION['add-slide'] = "Couldn't add category";
                header('location:' . ROOT_URL . 'admin/add-slide.php');
                die();
            }else{
                $_SESSION['add-slide-success'] = "Category $title added successfully";
                header('location:' . ROOT_URL . 'admin/');
                die();
            }
        }
    }