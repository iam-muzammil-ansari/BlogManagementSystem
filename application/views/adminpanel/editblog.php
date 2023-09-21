<?php
    //echo "<pre>";print_r($result); die();
?>
<?php $this->load->view("adminpanel/header") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>Edit Blog</h2>

    <form enctype="multipart/form-data" action="<?= base_url('admin/blog/editblog_post') ?>" method="post" autocomplete="off">
        <div class="form-group">
            <input type="text" class="form-control" id="blog_title" name="blog_title" value="<?= $result[0]['blog_title'] ?>" placeholder="Title" value="">
        </div>
        <br>
        <div class="form-group">
            <textarea class="form-control" id="blog_desc" name="blog_desc"  placeholder="Blog Description"><?= $result[0]['blog_desc'] ?></textarea>
        </div>
        <br>
        <div class="form-group">
            <img src="<?= base_url().$result[0]['blog_img']?>" width="100">
            <input type="file" class="form-control" id="file" name="file" placeholder="Title">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Edit Blog</button>
    </form>
</main>

<?php $this->load->view("adminpanel/footer") ?>

<script type="text/javascript">
    <?php 
        if(isset($_SESSION['inserted'])) {
            if($_SESSION['inserted']=="yes") {
                echo "alert('Data Inserted Successfully!')";
            }else {
                echo "alert('Not Inserted!')";
            }
        }
    ?>
</script>