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
                        <h3 class="h5 mb-0 text-gray-800"> Media </h3>
                    </div>
                    
                    <div id="ckfinder1"></div>
                  
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