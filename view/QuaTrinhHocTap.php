<?php
include_once("header.php");
include_once("nav.php");
include_once("../model/entity/learningHistory.php");
//$rs = LearningHistory::getList('1');
$lines = LearningHistory::getListFromFile('101');
//Giá trị id hiện hành
$idCurrent = 0;
if(isset($_GET["idedit"])) $idCurrent = $_GET["idedit"];
?>
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
			<tbody id="tbstudent">
				<?php
				$stt= 0;
				foreach ($lines as $key => $value) {
					$stt++;
					if($idCurrent==$value->id){?>					 
					<tr>	
					<form method="post" id="update_form" action="../controllers/update_learninghistory.php" enctype="multipart/form-data">				
					<input type="hidden" name="idForUpdate" value="<?php echo $idCurrent;?>">
					<th  scope='row'h><?php echo$stt; ?></th>
					<td><input class="form-control" required type="number" min="1998" name="yearFromUpdate" id="yearFromUpdate"  value="<?php echo $value->yearFrom;?>" style="width:150px"/></td>
					<td><input class="form-control" required type="number" min="1998" name="yearToUpdate" id="yearToUpdate"  value="<?php echo $value->yearTo;?>" style="width:150px"/></td>
					<td><input class="form-control" required type="text" name="schoolNameUpdate" id="schoolNameUpdate"  value="<?php echo $value->schoolName;?>" style="width:250px"/></td>
					<td><input class="form-control" required type="text" name="schoolAddressUpdate" id="schoolAddressUpdate"  value="<?php echo $value->schoolAddress;?>" style="width:250px"/></td>
					<td class='d-flex'>
					<button type="submit"  id="update" class='btn btn-outline-primary mr-3' ><i class='fa fa-spinner fa-spin'></i> Cập nhật</button>
					<a href="QuaTrinhHocTap.php"
						class='btn btn-outline-warning'>
						<span aria-hidden="true">X</span> Hủy
					</a>
					</td>
					</form>
					</tr>
				<?php }else{?>
					
					<tr>
					<th  scope='row'h><?php echo$stt; ?></th>
					<td><?php echo  $value->yearFrom;  ?></td>
					<td><?php echo  $value->yearTo;  ?></td>
					<td><?php echo  $value->schoolName;  ?></td>
					<td><?php echo  $value->schoolAddress;  ?></td>
					<td class='d-flex'>
					<a href="QuaTrinhHocTap.php?idedit=<?php echo $value->id;?>" id="edit" class='btn btn-outline-success mr-3' ><i class='far fa-edit'></i> Sửa</a>
					<a href="../controllers/delete_learninghistory.php?iddelete=<?php echo $value->id;?>"  onclick="return confirm('Bạn có thực sự muốn xóa ko ?');" 
						id="delete" class='btn btn-outline-danger'><i class='fas fa-trash-alt'></i> Xóa</a>
					</td>
					</tr>
				<?php } }?>


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
				<form method="post" id="insert_form" action="../controllers/create_learninghistory.php" enctype="multipart/form-data">
					<div class="formEnterData">
						<div class="form-group">
							<label for="">Theo học trường ?</label>
							<input class="form-control" required type="text" name="schoolName" id="schoolName"  value="" />
						</div>

						<div class="  form-group  ">
							<label>Từ năm</label>
							<input class="form-control" required type="number" min="1998" name="yearFrom" id="yearFrom"  value="" />
						</div>

						<div class="form-group ">
							<label>Đến năm</label>
							<input class="form-control" required type="number" min="1998" name="yearTo" id="yearTo"  value="" />
						</div>


						<div class="form-group">
							<label>Nơi học ?</label>
							<input class="form-control" required type="text" name="schoolAddress" id="schoolAddress"  value="" />
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
<script>
	//Reset lại Modal khi onclick 
	$(document).ready(function(){
		$("#add").click(function(){
			$("#insert_form")[0].reset();
		});	
	});	
</script>
<?php
include_once("footer.php");
?>