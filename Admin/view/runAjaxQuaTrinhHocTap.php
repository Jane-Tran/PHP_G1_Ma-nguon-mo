<?php
include_once("../model/entity/learningHistory.php");

$rsFromDB = LearningHistory::GetListFromDB("101");

foreach ($rsFromDB as $key => $value) {
	?>
	<tr>
		<th scope='row' ><?php echo $value->id; ?></th>
		<td><?php echo  $value->yearFrom;  ?></td>
		<td><?php echo  $value->yearTo;  ?></td>
		<td><?php echo  $value->schoolName;  ?></td>
		<td><?php echo  $value->schoolAddress;  ?></td>
		<td class='d-flex'>
			<a href="QuaTrinhHocTap.php?idedit=<?php echo $value->id; ?>" id="edit" class='btn btn-outline-success mr-3'><i class='far fa-edit'></i> Sửa</a>
			<a href="../controllers/delete_learninghistory.php?iddelete=<?php echo $value->id; ?>" onclick="return confirm('Bạn có thực sự muốn xóa ko ?');" id="delete" class='btn btn-outline-danger'><i class='fas fa-trash-alt'></i> Xóa</a>
		</td>
	</tr>
<?php
}
