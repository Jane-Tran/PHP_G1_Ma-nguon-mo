<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:login-admin.php");
}
include("admin-top.php");
include("models/post.php");
$listp = Post::GetListPostFromDBByAdmin();
?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php
        include("admin-sidebar.php");
        ?>
        <!--End Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php
                include("admin-topbar.php");
                ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-left justify-content-left mb-4">
                        <h1 class="h5 mb-0 text-gray-900">Dashboard <i class="fas fa-chevron-right"></i> </h1>
                        <h3 class="h5 mb-0 text-gray-800"> Add Post </h3>
                    </div>
                    <div class="container ">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title main-color-bg">
                                    <h3 >Posts</h3>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="Filter Posts...">
                                    </div>
                                </div>
                                <br>
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>Title</th>
                                        <th>Image</th>
                                        <th>Published</th>
                                        <th>Created</th>
                                        <th></th>
                                    </tr>
                                    <?php
                                        foreach($listp as $value){
                                    ?>
                                        <tr>
                                            <td><?php echo $value->title ?></td>
                                            <td>
                                                <img src="upload/<?php echo $value->image?>" alt="image_post" width="80px" height="50px">
                                            </td>
                                            <?php if($value->published ) {?>
                                                <td><i class="fas fa-check"></i></td>
                                            <?php }else{ ?>
                                                <td><i class="far fa-eye-slash"></i></td>
                                            <?php }?>
                                            <td>Dec 12, 2016</td>
                                            <td>
                                                <a class="btn btn-warning" href="controllers/post-controller.php?editPost=<?php echo $value->id ?>">Edit</a> 
                                                <a class="btn btn-danger" href="controllers/post-controller.php?deletePost=<?php echo $value->id ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php }?>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- End of Main Content -->

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <!-- End of Page Wrapper -->
            <?php
            include("admin-footer.php");
            ?>

</body>

</html>