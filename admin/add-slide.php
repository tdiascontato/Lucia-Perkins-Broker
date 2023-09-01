<?php
 include 'partials/header.php'; 
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Add Slide</h2>
        <?php if(isset($_SESSION['add-slide'])):?>
        <div class="alert__message error">
            <p>
                <?=$_SESSION['add-slide'];
                unset($_SESSION['add-slide'])?>
            </p>
        </div>
        <?php endif ?>
        <form action="<?=ROOT_URL?>admin/add-slide-logic.php" method="POST">
            <input type="file"  name="slide" id="slide">
            <button type="submit" name="submit" class="btn">Add slide</button>
            
        </form>
    </div>
</section>

<?php include '../partials/footer.php'; ?>