<?php



include("View/header.php");
include_once("Models/LoaiChungChi.php");
$listCC = LoaiChungChi::getListCC();
?>
<div class="container-fluid ">
	<a href="index.php" style="text-decoration:none;">
		<h1 class=" pt-4 pb-2 "><img src="https://gudlogo.com/wp-content/uploads/2019/06/gulogo-6.jpg" width="80px" height="80px" alt=""> Home</h1>
	</a>
</div>
<hr>
<div class="container">
		<div class="table-wrapper ">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Thông tin <b> Các đợt nhận ủng hộ</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm  chứng chỉ</span></a>
					</div>
				</div>
			</div>
			<table id="DUHTable" class="table table-striped table-hover">
				<thead>
					<tr>
						<th></th>
						<th>Mã chứng chỉ </th>
						<th>Tên chứng chỉ</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listCC as $key => $value) { ?>
						<tr>
							<td></td>
							<td> <?php echo $value->MaChungChi ?> </td>
							<td><?php echo $value->TenChungChi ?> </td>
							<td>
								<a href="#editEmployeeModal" class="edit"
									onclick="edCC('<?php echo  $value->MaChungChi  ?>','<?php echo  $value->TenChungChi  ?>')"
									data-toggle="modal">
									<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
								</a>
                                <a href="#deleteEmployeeModal" class="delete" 
                                    onclick="delCC('<?php echo  $value->MaChungChi  ?>')"
                                    data-toggle="modal">
                                    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                </a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
	</div>
</div>
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="Controllers/ccController.php" method="POST">
				<div class="modal-header">
					<h4 class="modal-title text-success">Chung chi moi</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

					<div class="form-group row">
						<label for="HoTenNDD-text-input" class="col-4 col-form-label">Tên chứng chỉ</label>
						<div class="col-8">
							<input class="form-control" type="text" name="TenCC" id="HoTenNDD-text-input">
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name="addCC" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="Controllers/ccController.php" method="POST">
				<div class="modal-header">
					<h4 class="modal-title">Chỉnh sửa chung chi</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="eMaDotUngHo">Ten chung chi</label>
						<input type="text" id="eTenCC" name="eTenCC" class="form-control" required>
					</div>
					<div class="form-group">
						<input type="hidden" id="eMaCC" name="eMaCC"  class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name="suaCC" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="Controllers/ccController.php" method="POST">
				<div class="modal-header">
					<h4 class="modal-title">Xóa chung chi</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Bạn chắc chắn muốn xóa dữ liệu này?</p>
					<p class="text-warning"><small>Việc này sẽ không hoàn tác được !</small></p>
				</div>
				<div class="modal-footer">
                    <input type="hidden" id="delMaDotNhanUngHo" name="delMaDotNhanUngHo">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
					<input type="submit" name="xoaCC" class="btn btn-danger" value="Xóa">
				</div>
			</form>
		</div>
	</div>
</div>
<?php
include("View/scripts.php");
include("View/footer.php"); ?>