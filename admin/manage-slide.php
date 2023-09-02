<?php 
    include 'partials/header.php'; 
    $current_admin_id = $_SESSION['user-id'];//fetch users from db but not current user
    $query = "SELECT * FROM slider";
    $slider = mysqli_query($connection, $query);
?>


<section class="dashboard">
<?php if(isset($_SESSION['add-slide-success'])):?> <!--Show if add slide was successful-->
    <div class="alert__message success container">
        <p>
        <?= $_SESSION['add-slide-success'];
        unset($_SESSION['add-slide-success']);
        ?>
        </p>
    </div>

<?php elseif(isset($_SESSION['delete-slide'])):?> <!--Show if edit user was NOT successful-->
    <div class="alert__message error container">
        <p>
        <?= $_SESSION['delete-slide'];
        unset($_SESSION['delete-slide']);
        ?>
        </p>
    </div>
<?php endif ?>
    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-left-b"></i></button>
        <aside> 
            <ul>
            <li><a href="manage-slide.php"><i class="uil uil-image-edit"></i><h5>Manage Slide</h5></a></li>
                <li><a href="add-post.php"><i class="uil uil-pen"></i><h5>Add post</h5></a></li>
                <li><a href="index.php"><i class="uil uil-postcard"></i><h5>Manage posts</h5></a></li>
                <?php if(isset($_SESSION['user_is_admin'])): ?>
                <li><a href="add-user.php"><i class="uil uil-user-plus"></i><h5>Add user</h5></a></li>
                <li><a href="manage-users.php"><i class="uil uil-users-alt"></i><h5>Manage user</h5></a></li>
                <li><a href="add-category.php"><i class="uil uil-edit"></i><h5>Add category</h5></a></li>
                <li><a href="manage-categories.php" class="active"><i class="uil uil-list-ul"></i><h5>Manage Categories</h5></a></li>
                <?php endif ?>
            </ul> 
        </aside>
        <main>
            <h2 class="white">Manage Slides</h2>
            <?php if(mysqli_num_rows($slider)>0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Imagem</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($slide = mysqli_fetch_assoc($slider)): ?>
                            <tr>
                                <td><?= $slide['thumbnail_slider'] ?></td>
                                <td><a href="<?=ROOT_URL?>admin/delete-slide.php?id=<?=$slide['id']?>" class="btn sm danger">Delete</a></td>
                            </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
            <?php else: ?>
                <div class="alert__message error"><?="No slides found" ?></div>
            <?php endif ?>
            <!-- + Fotos-->
                <a class="add_slides" href="<?php ROOT_URL ?>add-slide.php">
                    <h3> Adicionar + Fotos!</h3>
                    <i class="uil uil-image-plus white"></i>
                </a>
            
                </main>
            </div>
</section>

<?php include '../partials/footer.php'; ?>