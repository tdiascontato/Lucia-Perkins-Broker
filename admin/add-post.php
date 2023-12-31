<?php 
include 'partials/header.php'; 
//fetch categories from database
$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);
//Get back form data if form was invalid
$title = $_SESSION['add-post-data']['title'] ?? null;
$rooms = $_SESSION['add-post-data']['rooms'] ?? null;
$baths = $_SESSION['add-post-data']['baths'] ?? null;
$descriptionone = $_SESSION['add-post-data']['descriptionone'] ?? null;
$descriptiontwo = $_SESSION['add-post-data']['descriptiontwo'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;
$price = $_SESSION['add-post-data']['price'] ?? null;

//Delete form data session
unset($_SESSION['add-post-add']);
?> 

<section class="form__section">
    <div class="container form__section-container">
        <h2>Add post</h2>
        <?php if(isset($_SESSION['add-post'])): ?>
        <div class="alert__message error">
            <p>
                <?=  $_SESSION['add-post']; 
                unset($_SESSION['add-post'])?>
            </p>
        </div> 
        <?php endif ?> 
        <form action="<?=ROOT_URL?>admin/add-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="title" value="<?=$title?>" placeholder="Title">
            
            <select name="category">
            <?php while($category = mysqli_fetch_assoc($categories)): ?>
                <option value="<?=$category['id']?>"><?=$category['title']?></option>
            <?php endwhile ?>
            </select>
            
            <input type="number" name="rooms" value="<?=$rooms?>" placeholder="Enter how many rooms:">
            <input type="number" name="baths" value="<?=$baths?>" placeholder="Enter how many baths:">

            <textarea rows="4" name="descriptionone" value="<?=$descriptionone?>" placeholder="Description One:"></textarea>
            
            
            <?php if(isset($_SESSION['user_is_admin'])):  ?>
            <div class="form__control inline">
                <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
                <label for="is_featured">Featured</label>
            </div>
            <?php endif ?>
                        
            <div class="form__control">
                <label for="thumbnail">Add thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <textarea rows="4" name="descriptiontwo" value="<?=$descriptiontwo?>" placeholder="Description Two:"></textarea>
        
            <div class="form__control">
                <label for="thumbnail_second">Add second thumbnail</label>
                <input type="file" name="thumbnail_second" id="thumbnail_second">
            </div>
            
            <textarea rows="10" name="body" placeholder="Body"><?=$body?></textarea>

            <input type="number" name="price" value="<?=$price?>" placeholder="Enter with price:">

            <button type="submit" name="submit" class="btn">Add Post!</button>
            
        </form>
    </div>
</section>

<?php include '../partials/footer.php'; ?>
