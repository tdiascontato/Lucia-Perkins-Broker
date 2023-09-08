<?php 
    require 'config/database.php';
    //fetch current use from database
    if(isset($_SESSION['user-id'])) {
        $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
        $query = "SELECT avatar FROM users WHERE id=$id";
        $result = mysqli_query($connection, $query);
        $avatar = mysqli_fetch_assoc($result);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TriunfoImóvieis</title> 
<link rel="stylesheet" href="<?=ROOT_URL?>css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
    <body>

    <!--NAvBAr-->
    <nav>
        <div class="container nav__container">
            <a href="<?=ROOT_URL?>" class="nav__logo">Corretor Name</a> 
            <ul class="nav__items">
                <li><a href="<?=ROOT_URL?>blog.php">Imóveis</a></li>
                <li><a href="<?=ROOT_URL?>contact.php">Contatos</a></li>
                <?php if(isset($_SESSION['user-id'])): ?>
                    <li class="nav__profile">
                        <div class="avatar">
                            <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>" alt="User" />
                        </div>
                         <ul>
                            <li><a href="<?= ROOT_URL ?>admin/">Dashboard</a></li>
                            <li><a href="<?= ROOT_URL ?>logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php else: ?>
                <li><a href="<?=ROOT_URL?>signin.php">Signin</a></li>
                <?php endif ?>
            </ul>
            <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
            </div>
    </nav>
    <!--NAvBar-->
