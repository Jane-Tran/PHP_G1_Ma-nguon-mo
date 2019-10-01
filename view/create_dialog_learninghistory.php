<?php
    include_once("../model/entity/learningHistory.php");
    $id = LearningHistory::getLastId();
    $schoolName = $yearFrom = $yearTo = $schoolAddress = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $schoolName = $_POST["schoolName"];
        $yearFrom = $_POST["yearFrom"];
        $yearTo = $_POST["yearTo"];
        $schoolAddress = $_POST["schoolAddress"];
        

        if (!empty($schoolName) && !empty($yearFrom) && !empty($yearTo) && !empty($schoolAddress)) {
            $fp = fopen("../resource/learninghistory.txt","a+") ;
            
            fwrite($fp,"\n".implode("#",array($id,$yearFrom,$yearTo,$schoolName,$schoolAddress,"101")));
            $schoolName = $yearFrom = $yearTo = $schoolAddress = "";
            fclose($fp);
        }
        $schoolName = $yearFrom = $yearTo = $schoolAddress = "";
    }   
        
?>
<!--Modal-->
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
                <form method="post" id="insert_form" enctype="multipart/form-data">
                    <div >
                        <label>Theo học trường ?</label>
                        <input type="text" name="schoolName"  id="schoolName"  class="form-control" />
                        <br />
                        
                        <label>Từ năm</label>
                        <input type="text" name="yearFrom"  id="yearFrom" class="form-control" />
                        <label>Đến năm</label>
                        <input type="text" name="yearTo"  id="yearTo" class="form-control" />
                        <br/>
                        
                        <label>Nơi học ?</label>
                        <input type="text" name="schoolAddress"  id="schoolAddress" class="form-control" />
                        <br />
                                                                                
                        <input type="hidden" name="employee_id" id="employee_id" />
                        <input type="submit" name="insert" id="insert" value="Thêm" class="btn btn-success" />
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
    