<?php
session_start();
require 'config/database.php';

if (isset($_POST['submit'])) {
    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_input(INPUT_POST, 'body', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $descriptionone = filter_input(INPUT_POST, 'descriptionone', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $descriptiontwo = filter_input(INPUT_POST, 'descriptiontwo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $rooms = filter_input(INPUT_POST, 'rooms', FILTER_SANITIZE_NUMBER_INT);
    $baths = filter_input(INPUT_POST, 'baths', FILTER_SANITIZE_NUMBER_INT);
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_NUMBER_INT);
    $category_id = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_NUMBER_INT);
    $is_featured = isset($_POST['is_featured']) ? filter_input(INPUT_POST, 'is_featured', FILTER_SANITIZE_NUMBER_INT) : 0;
    $thumbnail = $_FILES['thumbnail'];
    $thumbnail_second = $_FILES['thumbnail_second'];

    // Validação de campos obrigatórios
    $required_fields = [$title, $category_id, $body, $descriptionone, $descriptiontwo, $rooms, $baths, $price];

    // Atualiza o post
    $query = "UPDATE posts SET title='$title', body='$body', descriptionone='$descriptionone', descriptiontwo='$descriptiontwo', rooms=$rooms, baths=$baths, price=$price, category_id=$category_id, is_featured=$is_featured WHERE id=$id";

    $result = mysqli_query($connection, $query);

    if (isset($result)) {
        $_SESSION['edit-post-success'] = "Post updated successfully";
    } else {
        $_SESSION['edit-post'] = "An error occurred while updating the post";
    }

    // Verifique se foram enviados novos thumbnails
    if ($_FILES['thumbnail']['name']) {
        $thumbnail = $_FILES['thumbnail'];
        $allowed_extensions = ['png', 'jpg', 'jpeg'];
        $thumbnail_extension = strtolower(pathinfo($thumbnail['name'], PATHINFO_EXTENSION));

        if (in_array($thumbnail_extension, $allowed_extensions) && $thumbnail['size'] < 2000000) {
            // Se a imagem for válida, mova-a para a pasta de uploads
            move_uploaded_file($thumbnail['tmp_name'], '../images/' . $thumbnail['name']);
            $query = "UPDATE posts SET thumbnail='" . $_FILES['thumbnail']['name'] . "' WHERE id=$id";
            mysqli_query($connection, $query);
        }
    }

    if ($_FILES['thumbnail_second']['name']) {
        $thumbnail_second = $_FILES['thumbnail_second'];
        $allowed_extensions = ['png', 'jpg', 'jpeg'];
        $thumbnail_second_extension = strtolower(pathinfo($thumbnail_second['name'], PATHINFO_EXTENSION));

        if (in_array($thumbnail_second_extension, $allowed_extensions) && $thumbnail_second['size'] < 2000000) {
            // Se a imagem for válida, mova-a para a pasta de uploads
            move_uploaded_file($thumbnail_second['tmp_name'], '../images/' . $thumbnail_second['name']);
            $query = "UPDATE posts SET thumbnail_second='" . $_FILES['thumbnail_second']['name'] . "' WHERE id=$id";
            mysqli_query($connection, $query);
        }
    }

    // Redireciona de volta para a página de administração após a conclusão
    header('location:' . ROOT_URL . 'admin/');
    die();
}
?>
