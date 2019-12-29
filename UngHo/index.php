<?php 
include("View/header.php");
include_once("Models/DonViUngHo.php");
$listDVUH = DonViUngHo::getListDVUH();
?>
    <div class="container-fluid " >
        <a href="#" style="text-decoration:none;">
            <h1 class=" pt-4 pb-2 "><img src="https://gudlogo.com/wp-content/uploads/2019/06/gulogo-6.jpg" width="80px" height="80px" alt=""> Ủng hộ lũ lụt</h1>
        </a>
	</div>
	<hr>
    <div class="container-fluid">
	<div class="row">
		<div class="col-lg-2">
			<div class="list-group" id="list-tab" role="tablist">
			<a  href="index.php" class="list-group-item list-group-item-action active"   role="tab" ><b>Danh sách đơn vị Ủng hộ</b></a>
			<a href="dotungho.php" class="list-group-item list-group-item-action"   role="tab" ><b>Đợt Ủng hộ</b></a>
			<a href="thongketienmat.php" class="list-group-item list-group-item-action"   role="tab" ><b>Thống kê tiền mặt của mỗi hộ dân</b></a>
			<a href="nhanungho.php" class="list-group-item list-group-item-action"    role="tab" ><b>Đợt nhận Ủng hộ</b></a>
			</div>
		</div>
        <div class="table-wrapper col-lg-9">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Danh sách <b> Đơn vị ủng hộ</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm đơn vị Ủng hộ</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Xóa</span></a>						
					</div>
                </div>
            </div>
            <table id="DVUHTable" class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>Họ tên người đại diện</th>
                        <th>Địa chỉ người đại điện</th>
						<th>Số điện thoại liên lạc</th>
                        <th>Số CMND</th>
						<th>Số tài khoản ngân hàng</th>
						<th>Tên ngân hàng</th>
						<th>Chi nhánh ngân hàng</th>
						<th>Tên chủ TK ngân hàng</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
					<?php foreach($listDVUH as $key => $value){ ?>
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox1" name="options[]" value="1">
									<label for="checkbox1"></label>
								</span>
							</td>
							<td> <?php echo $value->HoTenNDD ?> </td>
							<td><?php echo $value->DiaChiNDD ?> </td>
							<td><?php echo $value->SDTLL ?> </td>
							<td><?php echo $value->SCMND ?> </td>
							<td><?php echo $value->STK ?> </td>
							<td><?php echo $value->TenNganHang ?> </td>
							<td><?php echo $value->ChiNhanh ?> </td>
							<td><?php echo $value->TenChuTK ?> </td>
							<td>
								<a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
								<a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
							</td>
						</tr>
					<?php } ?>				
                </tbody>
            </table>
        </div>
	</div>
    </div>
	<!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content" >
				<form>
					<div class="modal-header">						
						<h4 class="modal-title text-success">Đơn vị ủng hộ mới</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">

						<div class="form-group row">
							<label for="HoTenNDD-text-input" class="col-4 col-form-label">Họ tên người đại diện :</label>
							<div class="col-8">
								<input class="form-control" type="text"  id="HoTenNDD-text-input">
							</div>
						</div>	

						<div class="form-group row">
							<label for="DiaChiNDD-text-input" class="col-4 col-form-label">Địa chỉ người đại diện :</label>
							<div class="col-8">
								<input class="form-control" type="text"  id="DiaChiNDD-text-input">
							</div>
						</div>

						<div class="form-group row">
							<label for="sdt-text-input" class="col-4 col-form-label">Số điện thoại liên lạc :</label>
							<div class="col-8">
								<input class="form-control" type="tel"  id="sdt-text-input">
							</div>
						</div>

						<div class="form-group row">
							<label for="CMND-text-input" class="col-4 col-form-label">Số CMND : </label>
							<div class="col-8">
								<input class="form-control" type="text"  id="CMND-text-input">
							</div>
						</div>	

						<div class="form-group row">
							<label for="TK-text-input" class="col-4 col-form-label">Số tài khoản ngân hàng :</label>
							<div class="col-8">
								<input class="form-control" type="text"  id="TK-text-input">
							</div>
						</div>

						<div class="form-group row">
							<label for="TenNganHang-text-input" class="col-4 col-form-label">Tên ngân hàng :</label>
							<div class="col-8">
								<input class="form-control" type="text"  id="TenNganHang-text-input">
							</div>
						</div>

						<div class="form-group row">
							<label for="ChiNhanh-text-input" class="col-4 col-form-label">Chi nhánh ngân hàng :</label>
							<div class="col-8">
								<input class="form-control" type="text"  id="ChiNhanh-text-input">
							</div>
						</div>

						<div class="form-group row">
							<label for="TenTK-text-input" class="col-4 col-form-label">Tên chủ tài khoản ngân hàng :</label>
							<div class="col-8">
								<input class="form-control" type="text"  id="TenTK-text-input">
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
include("View/footer.php");?>                        		                            