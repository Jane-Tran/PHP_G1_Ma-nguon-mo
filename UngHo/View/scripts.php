<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="./assets/js/main.js" ></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
<script src="assets/datatables/jquery.dataTables.js"></script>
<script src="assets/datatables/dataTables.bootstrap4.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->

<script>
    // Hàm sửa đợt ủng hộ
    function EditDUH(ma,madv, ngay, hinhthuc, sl, dv) {
        document.getElementById("eMaDotUngHo").value = ma;
        document.getElementById("eMaDotUngHoHidden").value = ma;
        document.getElementById("eHoTenNDD").value = madv;
        document.getElementById("eNgayUngHo").value = ngay;
        document.getElementById("eHinhThuc").value = hinhthuc;
        document.getElementById("eSoLuong").value = sl;
        document.getElementById("eDonVi").value = dv;
    }

    function DeleteDNUH(manhan){
        document.getElementById("delMaDotNhanUngHo").value = manhan;
    }
    function delCC(manhan){
        document.getElementById("delMaDotNhanUngHo").value = manhan;
    }
    function edCC(manhan, Tencc){
        document.getElementById("eTenCC").value = Tencc;
        document.getElementById("eMaCC").value = manhan;
    }
    
</script>