<?php
ob_start();
session_start();
include("models/post.php");
if (!isset($_SESSION["login"])) {
    header("location:login-admin.php");
}
include("admin-top.php");
if(isset($_GET["editPost"] )){
   $epost =  Post::GetPostById($_GET["editPost"]);
   var_dump($epost->published);
}

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
                    <div class="container">
                        <div class="card ">
                            <div class="card-body">
                                <div class="card-title main-color-bg">
                                    <h3>Add Post</h3>
                                    <hr>
                                </div>
                                <form action="controllers/<?php echo isset($epost)?"update-post.php?id=".$epost->id:"post-controller.php" ?>"method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Post Title</label>
                                        <input type="text" class="form-control" 
                                        placeholder="Page Title" name="ftitle" 
                                        required 
                                        value="<?php echo isset($epost)? $epost->title :"" ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Image :</label>
                                        <input type="file" class="btn btn-warning" name="fimage" required value="<?php echo isset($epost)? $epost->image :"" ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Post Content</label>
                                        <textarea name="editor1" class="form-control" placeholder="Enter the content here !!!!!!! " required
                                        ><?php echo isset($epost)? $epost->content :"" ?>
                                    </textarea>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"  name="fpublished" value="<?php echo isset($epost)? (int)$epost->published :0 ?>"> Published
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label>Meta Tags</label>
                                        <input type="text" class="form-control" placeholder="Add Some Tags..." name="ftag" required value="<?php echo isset($epost)? $epost->tag :"" ?>">
                                    </div>
                                    <input type="submit" class="btn btn-primary" value="Submit" name="submit">
                                </form>
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