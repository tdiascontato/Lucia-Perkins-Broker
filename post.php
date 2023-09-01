<?php 
include 'partials/header.php'; 
//fetch post from db if id is set
if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
}else{
    header('location:' . ROOT_URL . 'blog.php');
    die();
}
?>

<!--Post-->
    <section class="singlepost">
        <div class="container singlepost__container">
            <!--*******Título********-->
            <h2 class="title"><?=$post['title']?></h2>
            
            <div class="post__author">
                <?php
                    $author_id = $post['author_id'];
                    $author_query = "SELECT * FROM users WHERE id=$author_id";
                    $author_result = mysqli_query($connection, $author_query);
                    $author = mysqli_fetch_assoc($author_result);
                ?>
                <div class="post__author-avatar">
                    <img src= "./images/<?=$author['avatar']?>" alt="Image">
                </div>
                <div class="post__author-info">
                    <h4 class="white">By: <?= "{$author['firstname']} {$author['lastname']}" ?></h4>
                        <h4 class="black">
                            <?=date("d M, Y", strtotime($post['date_time']))?>
                        </h4>
                </div>
            </div>
            <div class="singlepost__thumbnail">
                <img src="./images/<?=$post['thumbnail']?>" alt="Image">
            </div>
            <!--*******Description One********-->
            <div class="description_post">
                <?=$post['descriptionone']?>
            </div>
            <!--*******Description One********-->
            <div class="description_post">
                <?=$post['descriptiontwo']?>
            </div>
            <!--*******Description One********-->
            <div class="obs">
                <h3>Rooms:</h3><h4 class="black"><?=$post['rooms']?></h4>
            </div>
            <div class="obs">
                <h3>Baths:</h3><h4 class="black"><?=$post['baths']?></h4>
            </div>
            <!--*******Image Two********-->
            <div class="singlepost__thumbnail">
                <img src="./images/<?=$post['thumbnail_second']?>" alt="Image">
            </div>
            <!--********* Price  ***************-->
            <div class="obs">
                <h3>Price:</h3><h4 class="black"><?=$post['price']?></h4>
            </div>
            <!--*******Description One********-->
            <div class="description_post">
                <?=$post['body']?>
            </div>
        </div>
    </section>
<!--Post-->

<!--Contact_section-->
<div class="contact_section">
    <label for="email_send">Digite abaixo seu email ou telefone que eu te retorno!</label>
    <form action="<?=ROOT_URL?>send_email.php" method="POST">
        <div class="contact_contacts">
            <input type="text" name="email_send" id="email_send">
            <button type="submit" name="submit" class="btn_send">SEND!</button>
        </div>
        <a href="https://wa.me/5521990032507?text=Gostaria+de+informa%C3%A7%C3%B5es+de+um+im%C3%B3vel%21" class="message_whatsapp" target="_blank">
        Clique e me chame no whatsapp!
        </a>
    </form>
</div>
<!--Contact_Section-->

<!--Categories-->
<section class="category__buttons">
    <div class="container category__buttons-container">
        <?php
            $all_categories_query = "SELECT * FROM categories";
            $all_categories = mysqli_query($connection, $all_categories_query);
        ?>
        <?php while($category = mysqli_fetch_assoc($all_categories)): ?>
        <a href="<?=ROOT_URL?>category-posts.php?id=<?=$category['id']?>" class="category__button"><?=$category['title']?></a>
        <?php endwhile ?>
    </div>
</section>
<!--Categories-->

<?php include 'partials/footer.php'; ?>