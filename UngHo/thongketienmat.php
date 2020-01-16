<?php



include("View/header.php");
include_once("Models/DonViUngHo.php");
include_once("Models/ThongKe.php");
$listMaDVUH = DonViUngHo::getAllMaDVUH();
$listTK = ThongKe::thongKeTienMat();
?>
<div class="container-fluid ">
	<a href="#" style="text-decoration:none;">
		<h1 class=" pt-4 pb-2 "><img src="https://gudlogo.com/wp-content/uploads/2019/06/gulogo-6.jpg" width="80px" height="80px" alt=""> Ủng hộ lũ lụt</h1>
	</a>
</div>
<hr>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-2">
			<div class="list-group" id="list-tab" role="tablist">
				<a href="index.php" class="list-group-item list-group-item-action " role="tab"><b>Danh sách đơn vị Ủng hộ</b></a>
				<a href="dotungho.php" class="list-group-item list-group-item-action " role="tab"><b>Đợt ủng hộ</b></a>
				<a href="thongketienmat.php" class="list-group-item list-group-item-action active" role="tab"><b>Thống kê tiền mặt của mỗi hộ dân</b></a>
				<a href="nhanungho.php" class="list-group-item list-group-item-action " role="tab"><b>Đợt nhận ủng hộ</b></a>
			</div>
		</div>
		<div class="table-wrapper col-lg-9">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Thông kê <b> tiền mặt của mỗi hộ dân</b></h2>
					</div>

				</div>
			</div>
			<table id="DUHTable" class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>Mã hộ dân</th>
						<th>Họ tên chủ hộ </th>
						<th>Tổ hoặc thôn</th>
						<th>Khối hoặc đội</th>
						<th>Là hộ nghèo</th>
						<th>Tổng số tiền mặt</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($listTK as $key => $value) { ?>
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
							<td> <?php echo $value->MaHoDan ?> </td>
							<td><?php echo $value->HoTenChuHo ?> </td>
							<td><?php echo $value->To ?> </td>
							<td><?php echo $value->Khoi ?> </td>
							<td><?php echo $value->LaHoNgheo ?> </td>
							<td><?php echo $value->TongTien ?> </td>

							<td>
								<a href="#editEmployeeModal" class="edit"
									data-toggle="modal">
									<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
								</a>
                                <a href="#deleteEmployeeModal" class="delete" 
                                    
                                    data-toggle="modal">
                                    <i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
                                </a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<div class="col-sm-6">
				<a href="#deleteEmployeeModal" class="btn btn-danger btn-sm" data-toggle="modal"><i class="material-icons">&#xE15C;</i> </a>
			</div>
		</div>
	</div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="Controllers/UngHoControllers.php" method="POST">
				<div class="modal-header">
					<h4 class="modal-title">Chỉnh sửa đợt Ủng hộ</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="eMaDotUngHo">Mã đợt ủng hộ</label>
						<input type="text" id="eMaDotUngHo" disabled class="form-control" required>
					</div>
					<div class="form-group">
						<input type="hidden" id="eMaDotUngHoHidden" name="madotungho"  class="form-control" required>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="eHoTenNDD">Người đại diện Ủng hộ</label>
								<select id="eHoTenNDD"  name ="nguoiungho"class="form-control " required>
									<!-- <option selected>Chọn người ủng hộ ...</option> -->
									<?php foreach($listMaDVUH as $key => $value){ ?>
									<option value="<?php echo $value ?>"> <?php echo implode("",DonViUngHo::getNameByMa($value)); ?></option>
									<?php } ?>
								</select>
						</div>
						<div class="form-group col-md-6">
							<label for="eNgayUngHo">Ngày ủng hộ</label>
							<input type="date" class="form-control" name="ngayungho" id="eNgayUngHo" required>
						</div>
					</div>
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="eHinhThuc">Hình thức Ủng hộ</label>
							<input type="text" class="form-control" name="hinhthuc" id="eHinhThuc" required>
						</div>
						<div class="form-group col-md-4">
							<label for="eSoLuong">Số lượng</label>
							<input type="number" class="form-control" name="soluong" id="eSoLuong" min="1" required>
						</div>
						<div class="form-group col-md-2">
							<label for="eDonVi">Đơn vị tính</label>
							<input type="text" class="form-control" name="donvi" id="eDonVi" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" name="suaDotUngHo" class="btn btn-info" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="Controllers/NhanUngHoController.php" method="POST">
				<div class="modal-header">
					<h4 class="modal-title">Xóa đợt nhận ủng hộ</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Bạn chắc chắn muốn xóa dữ liệu này?</p>
					<p class="text-warning"><small>Việc này sẽ không hoàn tác được !</small></p>
				</div>
				<div class="modal-footer">
                    <input type="hidden" id="delMaDotNhanUngHo" name="delMaDotNhanUngHo">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
					<input type="submit" name="xoaNhanUngHo" class="btn btn-danger" value="Xóa">
				</div>
			</form>
		</div>
	</div>
</div>
<?php
include("View/scripts.php");
include("View/footer.php"); ?>