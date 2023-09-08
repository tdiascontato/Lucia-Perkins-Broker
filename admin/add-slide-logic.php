<?php
session_start();
require 'config/database.php';

if (isset($_POST['submit'])) {
    $thumbnail_slider = $_FILES['thumbnail_slider'];

    if ($thumbnail_slider['error'] === UPLOAD_ERR_OK) {
        $thumbnail_time = time();
        $thumbnail_name = $thumbnail_time . '_' . $thumbnail_slider['name'];
        $thumbnail_tmp_name = $thumbnail_slider['tmp_name'];
        $thumbnail_destination_path = '../img_slider/' . $thumbnail_name;
        $allowed_extensions = ['png', 'jpg', 'jpeg'];
        $thumbnail_extension = pathinfo($thumbnail_name, PATHINFO_EXTENSION);

        if (in_array($thumbnail_extension, $allowed_extensions)) {
            if ($thumbnail_slider['size'] < 2000000) { // 2MB
                if (move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path)) {
                    // Inserindo a imagem na tabela "slider"
                    $query = "INSERT INTO slider (thumbnail_slider) VALUES (?)";
                    $stmt = mysqli_prepare($connection, $query);

                    if ($stmt) {
                        mysqli_stmt_bind_param($stmt, "s", $thumbnail_name);
                        $result = mysqli_stmt_execute($stmt);
                        mysqli_stmt_close($stmt);

                        if ($result) {
                            $_SESSION['add-slide-success'] = "Slide added successfully";
                            header('location:' . ROOT_URL . 'admin/manage-slide.php');
                            exit();
                        } else {
                            $_SESSION['add-slide'] = "Failed to insert slide into database";
                        }
                    } else {
                        $_SESSION['add-slide'] = "Database query error";
                    }
                } else {
                    $_SESSION['add-slide'] = "Failed to move uploaded file";
                }
            } else {
                $_SESSION['add-slide'] = "Thumbnail file size must be less than 2MB";
            }
        } else {
            $_SESSION['add-slide'] = "Thumbnails must be in PNG, JPG, or JPEG format";
        }
    } else {
        $_SESSION['add-slide'] = "Error uploading file";
    }

    // Se houver um erro, redirecione de volta para a página de envio
    $_SESSION['add-slide-data'] = $_POST;
    header('location:' . ROOT_URL . 'admin/add-slide.php');
    exit();
}

// Se alguém tentar acessar este arquivo diretamente sem enviar o formulário
header('location:' . ROOT_URL . 'admin/add-slide.php');
exit();
?>
