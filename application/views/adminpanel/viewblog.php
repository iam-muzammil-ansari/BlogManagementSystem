<?php $this->load->view("adminpanel/header") ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <h2>View Blog</h2>
    <div class="table-responsive small">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">S. No.</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 1;
                if ($result) {
                    foreach ($result as $key => $value) {
                        echo "<tr>
                              <td>" . $count . "</td>
                              <td>" . $value['blog_title'] . "</td>
                              <td>" . $value['blog_desc'] . "</td>
                              <td><img src='" . base_url() . $value['blog_img'] . "' class='img-fluid' width='100'></td>
                              <td><a class=\"btn btn-info\" href='" . base_url('admin/blog/editblog/') . $value['blogid'] . "'>Edit</a></td>
                              <td><a class=\"btn delete btn-danger\" href='#.'data-id='".$value['blogid']."'>Delete</a></td>
                            </tr>";
                        $count++;
                    }
                } else {
                    echo "<tr> <td colspan='6'>No Records found</td> </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</main>

<?php $this->load->view("adminpanel/footer") ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<script type="text/javascript">
    $(".delete").click(function() {
    var delete_id = $(this).attr('data-id');
    var bool = confirm('Are you sure you want to delete this blog post?');
    console.log(bool);

    if (bool) {
        $.ajax({
            url: '<?= base_url('admin/blog/deleteblog/') ?>' + delete_id,
            type: 'DELETE',
            success: function(response) {
                console.log(response);
                if(response=="deleted") {
                    location.reload();
                }else {
                    alert("Some thing went wrong")
                }
                // You can handle the response here, e.g., update the UI if the deletion was successful.
            }
        });
    } else {
        alert('Your blog is safe');
    }
});

</script>

