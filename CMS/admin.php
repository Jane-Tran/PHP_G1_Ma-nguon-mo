<?php
  session_start();
  if(!isset($_SESSION["login"])){
      header("location:login-admin.php");
  }
include("admin-top.php");
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
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

          </div>

          <!-- Content Row -->
          <?php 
              include("admin-content-row.php");
          ?>
          <!-- /.container-fluid -->

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