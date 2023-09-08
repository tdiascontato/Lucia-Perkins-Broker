<?php
session_start();
require 'config/database.php';

if (isset($_POST['submit'])) {
    $author_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rooms = filter_var($_POST['rooms'], FILTER_SANITIZE_NUMBER_INT);
    $baths = filter_var($_POST['baths'], FILTER_SANITIZE_NUMBER_INT);
    $descriptionone = filter_var($_POST['descriptionone'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $descriptiontwo = filter_var($_POST['descriptiontwo'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_INT);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = isset($_POST['is_featured']) ? filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT) : 0;
    $thumbnail = $_FILES['thumbnail'];
    $thumbnail_second = $_FILES['thumbnail_second'];

    // Set is_featured to 0 if unchecked
    $is_featured = $is_featured == 1 ? 0 : 1;

    // Validate form data
    if (
        !$title || !$rooms || !$baths || !$descriptionone || !$descriptiontwo ||
        !$body || !$price || !$category_id || !$thumbnail['name'] || !$thumbnail_second['name']
    ) {
        $_SESSION['add-post'] = "Please fill in all the required fields";
    } else {
        // Thumbnail processing
        $thumbnail_time = time();
        $thumbnail_name = $thumbnail_time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destination_path = '../images/' . $thumbnail_name;

        $thumbnail_second_name = $thumbnail_time . $thumbnail_second['name'];
        $thumbnail_second_tmp_name = $thumbnail_second['tmp_name'];
        $thumbnail_second_destination_path = '../images/' . $thumbnail_second_name;

        $allowed_files = ['png', 'jpg', 'jpeg'];

        $thumbnail_extension = pathinfo($thumbnail_name, PATHINFO_EXTENSION);
        $thumbnail_second_extension = pathinfo($thumbnail_second_name, PATHINFO_EXTENSION);

        if (in_array($thumbnail_extension, $allowed_files) && in_array($thumbnail_second_extension, $allowed_files)) {
            if ($thumbnail['size'] < 2000000 && $thumbnail_second['size'] < 2000000) {
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
                move_uploaded_file($thumbnail_second_tmp_name, $thumbnail_second_destination_path);
            } else {
                $_SESSION['add-post'] = "Thumbnail file size must be less than 2MB";
            }
        } else {
            $_SESSION['add-post'] = "Thumbnails must be in PNG, JPG, or JPEG format";
        }
    }

    // Redirect back (with form data) to add post page if there is any problem
    if (isset($_SESSION['add-post'])) {
        $_SESSION['add-post-data'] = $_POST;
        header('location:' . ROOT_URL . 'admin/add-post.php');
        die();
    } else {
        // Set is_featured of all posts to 0 if is_featured for this post is 1
        if ($is_featured == 1) {
            $zero_all_is_featured_query = "UPDATE posts SET is_featured=0";
            $zero_all_is_featured_query = mysqli_query($connection, $zero_all_is_featured_query);
        }
        $query =  "INSERT INTO posts (title, rooms, baths, descriptionone, descriptiontwo, body, price, thumbnail, thumbnail_second, category_id, author_id, is_featured) VALUES ('$title', '$rooms', '$baths', '$descriptionone', '$descriptiontwo', '$body', '$price', '$thumbnail_name', '$thumbnail_second_name', '$category_id', '$author_id', '$is_featured')";
        $result = mysqli_query($connection, $query);

        if (!mysqli_errno($connection)) {
            $_SESSION['add-post-success'] = "New post added successfully";
            header('location:' . ROOT_URL . 'admin/');
            die();
        }
    }
}
header('location:' . ROOT_URL . 'admin/add-post.php');
die();
