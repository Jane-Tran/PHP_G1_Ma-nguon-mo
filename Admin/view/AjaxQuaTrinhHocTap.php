<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("location:Login.php");
}
include_once("../model/entity/user.php");
include_once("header.php");
include_once("nav.php");

?>

<?php
include_once("../model/entity/learningHistory.php");
$lines = LearningHistory::getListFromFile('101');

//Giá trị id hiện hành
$idCurrent = 0;
if (isset($_GET["idedit"])) $idCurrent = $_GET["idedit"];
?>
<button onclick="load()">Load</button>
<div class="container-fluid">
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <div class="btn-add d-flex justify-content-end align-items-center pb-3">
                <button id="add" class="btn btn-outline-primary" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus-circle"></i> Thêm</button>
            </div>
            <thead class="thead-dark">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Từ năm</th>
                    <th scope="col">Đến năm</th>
                    <th scope="col">Trường</th>
                    <th scope="col">Nơi học</th>
                    <th scope="col">Thao tác</th>
                </tr>
            </thead>
            <tbody id="contentAjax">
            </tbody>
        </table>
    </div>
</div>

<!--Modal Create Learning History-->
<div class="modal fade" id="addModal" role="dialog">
    <div class="modal-dialog">

        <!--Content-->
        <div class="modal-content">

            <!--Header-->
            <div class="modal-header">
                <h3 class="modal-title">Thêm lịch sử quá trình học</h3>
                <button type="button" data-dismiss="modal" class="close">&times;</button>
            </div>

            <!--Body-->
            <div class="modal-body">
                <form method="post" id="insert_form" action="../controllers/insert_Mysql.php" enctype="multipart/form-data">
                    <div class="formEnterData">
                        <div class="form-group">
                            <label for="">Theo học trường ?</label>
                            <input class="form-control" required type="text" name="schoolName" id="schoolName" value="" />
                        </div>

                        <div class="  form-group  ">
                            <label>Từ năm</label>
                            <input class="form-control" required type="number" min="1998" name="yearFrom" id="yearFrom" value="" />
                        </div>

                        <div class="form-group ">
                            <label>Đến năm</label>
                            <input class="form-control" required type="number" min="1998" name="yearTo" id="yearTo" value="" />
                        </div>


                        <div class="form-group">
                            <label>Nơi học ?</label>
                            <input class="form-control" required type="text" name="schoolAddress" id="schoolAddress" value="" />
                        </div>

                        <div>
                            <input type="submit" name="insert" id="insert" value="Thêm" class="btn btn-success" />
                        </div>
                    </div>
                </form>
            </div>

            <!--Footer-->
            <div class="modal-footer">
                <button type="button " class="btn btn-default" data-dismiss="modal">Thoát</button>
            </div>

        </div>

    </div>
</div>
<!-- End Modal Create-->


</div>

<?php
include_once("footer.php");
?>
<script>
    //Hàm gọi Ajax
    function load() {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                console.log("huhu");
                document.getElementById('contentAjax').innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "runAjaxQuaTrinhHocTap.php", true);
        xmlhttp.send();
    }

    //Reset lại Modal khi onclick 
    $(document).ready(function() {
        $("#add").click(function() {
            $("#insert_form")[0].reset();
        });
    });
</script>