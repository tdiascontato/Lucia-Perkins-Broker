<?php 
include 'partials/header.php'; 
//fetch categories from db
$category_query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $category_query);
//fetch post data from db if id  is set
if(isset($_GET['id'])){
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
}else{
    header('location:' . ROOT_URL . 'admin/');
    die();
}
?>
<!--previous_thumbnail_name is used to delete thumbnail from the images folder-->
<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit post</h2>
        <?php if(isset($_SESSION['edit-post'])): ?>
        <div class="alert__message error">
            <p>
                <?= $_SESSION['edit-post'];
                unset($_SESSION['edit-post']); ?>
            </p>
        </div>
        <?php endif ?> 
        <form action="<?=ROOT_URL?>admin/edit-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <input type="hidden" name="previous_thumbnail_name" value="<?= $post['thumbnail'] ?>">
            
            <input type="text" name="title" value="<?=$post['title']?>" placeholder="Title">
            
            <select name="category">
                <?php while($category = mysqli_fetch_assoc($categories)):?>
                    <option value="<?=$category['id']?>" <?= ($category['id'] == $post['category_id']) ? 'selected' : '' ?>><?=$category['title']?></option> 
                <?php endwhile ?>
            </select> 
            
            <textarea rows="4" name="descriptionone" placeholder="Description One"><?=$post['descriptionone']?></textarea>
            
            <textarea rows="4" name="descriptiontwo" placeholder="Description Two"><?=$post['descriptiontwo']?></textarea>
            
            <input type="number" name="rooms" value="<?=$post['rooms']?>" placeholder="Enter how many rooms">
            
            <input type="number" name="baths" value="<?=$post['baths']?>" placeholder="Enter how many baths">

            <textarea rows="10" name="body" placeholder="Body"><?=$post['body']?></textarea>

            <input type="number" name="price" value="<?=$post['price']?>" placeholder="Enter with the new price:">
            
            <div class="form__control inline">
                <input type="checkbox" name="is_featured" id="is_featured" value="1" <?= ($post['is_featured'] == 1) ? 'checked' : '' ?>>
                <label for="is_featured">Featured</label>
            </div>
            
            <div class="form__control">
                <label for="thumbnail">Change thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            
            <div class="form__control">
                <label for="thumbnail_second">Change second thumbnail</label>
                <input type="file" name="thumbnail_second" id="thumbnail_second">
            </div>
            
            <button type="submit" name="submit" class="btn">Update Post!</button>
        </form>
    </div>
</section>

<?php include '../partials/footer.php'; ?>