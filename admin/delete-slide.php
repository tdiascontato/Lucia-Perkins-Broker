<?php
require 'config/database.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $slide_id = $_GET['id'];

    // Verifique se o slide existe no banco de dados
    $query = "SELECT thumbnail_slider FROM slider WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "i", $slide_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $thumbnail_slider);

        if (mysqli_stmt_fetch($stmt)) {
            mysqli_stmt_close($stmt);

            // Exclua o slide do banco de dados
            $delete_query = "DELETE FROM slider WHERE id = ?";
            $delete_stmt = mysqli_prepare($connection, $delete_query);

            if ($delete_stmt) {
                mysqli_stmt_bind_param($delete_stmt, "i", $slide_id);
                $result = mysqli_stmt_execute($delete_stmt);
                mysqli_stmt_close($delete_stmt);

                if ($result) {
                    // Exclua o arquivo de imagem correspondente na pasta 'img_slider'
                    $image_path = '../img_slider/' . $thumbnail_slider;
                    if (file_exists($image_path)) {
                        unlink($image_path);
                    }

                    $_SESSION['delete-slide'] = "Slide deleted successfully";
                    header('location:' . ROOT_URL . 'admin/manage-slide.php');
                    exit();
                } else {
                    $_SESSION['delete-slide'] = "Failed to delete slide from database";
                }
            } else {
                $_SESSION['delete-slide'] = "Database query error";
            }
        } else {
            $_SESSION['delete-slide'] = "Slide not found in database";
        }
    } else {
        $_SESSION['delete-slide'] = "Database query error";
    }
} else {
    $_SESSION['delete-slide'] = "Invalid slide ID";
}

header('location:' . ROOT_URL . 'admin/manage-slide.php');
exit();
?>
