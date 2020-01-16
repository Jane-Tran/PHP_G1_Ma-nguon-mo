<?php
include("View/header.php");
include_once("Models/DonViUngHo.php");
include_once("Models/LoaiChungChi.php");
$listMaCC = LoaiChungChi::getAllMa();
?>
<div class="container-fluid " style="display:flex; justify-content: space-between">
	<a href="#" style="text-decoration:none;">
		<h1 class=" pt-4 pb-2 "><img src="https://gudlogo.com/wp-content/uploads/2019/06/gulogo-6.jpg" width="80px" height="80px" alt=""> HE THONG QUAN LY CHUNG CHI TIN HOC</h1>
	</a>
	<div>
		<span style="line-height:100px;font-size:20px;">Welcome</span>
		<a href="logout.php" style="text-decoration:none; padding-left:20px;padding-right:20px;font-size:20px"><i class="fas fa-sign-out-alt"></i>Logout</a>
	</div>
</div>
<hr>
<div class="container">
	<div class="table-wrapper ">
		<div class="table-title">
			<div class="row">
				<div class="col-sm-6">
					<h2>Danh sách <b> Học  viên được cấp chứng chỉ</b></h2>
				</div>
				<div class="col-sm-6">
				</div>
			</div>
		</div>
		<div class="row" style="display: flex ;justify-content: center; ">
			<div class="form-group row">
				<label class="col-5 col-form-label" for="inputState">Loại chứng chỉ :</label>
				<select id="inputState" name="nguoiungho" class="form-control col-7 " required>
					<?php foreach($listMaCC as $key => $value){ ?>
					<option value="<?php echo $value ?>"> <?php echo implode("",LoaiChungChi::getNameByMa($value)); ?></option>
					<?php } ?>
				</select>
			</div>
			<button class="ml-5" style="height: 40px">Lọc</button>
			<div class="list-group ml-5" id="list-tab" role="tablist">
				<a href="quanly.php" class="list-group-item list-group-item-action active" role="tab"><b>Quản lý chứng chỉ</b></a>
			</div>
		</div>
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>STT</th>
					<th>Họ và tên</th>
					<th>Ngày sinh</th>
					<th>Nơi sinh</th>
					<th>Quê quán</th>
					<th>Ngày cấp</th>
					<th>Số cấp</th>
				</tr>
			</thead>
			<tbody>
				
					<tr>
						
					</tr>
				
			</tbody>
		</table>
		<div class="row">
			<div class="col-sm-8"></div>
			<div class="col-sm-4">
				<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm học viên được cấp chứng chỉ</span></a>
			</div>
		</div>
	</div>
</div>
</div>
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<h4 class="modal-title text-success">Đơn vị ủng hộ mới</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">

					<div class="form-group row">
						<label for="HoTenNDD-text-input" class="col-4 col-form-label">Họ tên người đại diện :</label>
						<div class="col-8">
							<input class="form-control" type="text" id="HoTenNDD-text-input">
						</div>
					</div>

					<div class="form-group row">
						<label for="DiaChiNDD-text-input" class="col-4 col-form-label">Địa chỉ người đại diện :</label>
						<div class="col-8">
							<input class="form-control" type="text" id="DiaChiNDD-text-input">
						</div>
					</div>

					<div class="form-group row">
						<label for="sdt-text-input" class="col-4 col-form-label">Số điện thoại liên lạc :</label>
						<div class="col-8">
							<input class="form-control" type="tel" id="sdt-text-input">
						</div>
					</div>

					<div class="form-group row">
						<label for="CMND-text-input" class="col-4 col-form-label">Số CMND : </label>
						<div class="col-8">
							<input class="form-control" type="text" id="CMND-text-input">
						</div>
					</div>

					<div class="form-group row">
						<label for="TK-text-input" class="col-4 col-form-label">Số tài khoản ngân hàng :</label>
						<div class="col-8">
							<input class="form-control" type="text" id="TK-text-input">
						</div>
					</div>

					<div class="form-group row">
						<label for="TenNganHang-text-input" class="col-4 col-form-label">Tên ngân hàng :</label>
						<div class="col-8">
							<input class="form-control" type="text" id="TenNganHang-text-input">
						</div>
					</div>

					<div class="form-group row">
						<label for="ChiNhanh-text-input" class="col-4 col-form-label">Chi nhánh ngân hàng :</label>
						<div class="col-8">
							<input class="form-control" type="text" id="ChiNhanh-text-input">
						</div>
					</div>

					<div class="form-group row">
						<label for="TenTK-text-input" class="col-4 col-form-label">Tên chủ tài khoản ngân hàng :</label>
						<div class="col-8">
							<input class="form-control" type="text" id="TenTK-text-input">
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<h4 class="modal-title">Edit Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<textarea class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="text" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>
<?php
include("View/scripts.php");
include("View/footer.php"); ?>