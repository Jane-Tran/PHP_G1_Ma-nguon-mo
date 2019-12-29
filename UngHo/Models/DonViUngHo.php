<?php
class DonViUngHo
{
    #Variable
    public $MaDVUH;
    public $HoTenNDD;
    public $DiaChiNDD;
    public $SDTLL;
    public $SCMND;
    public $STK;
    public $TenNganHang;
    public $ChiNhanh;
    public $TenChuTK;

    #hàm tạo 
    public function __construct($MaDVUH,$HoTenNDD,$DiaChiNDD,$SDTLL,$SCMND,$STK,$TenNganHang,$ChiNhanh,$TenChuTK)
    {
        $this->MaDVUH = $MaDVUH;
        $this->HoTenNDD = $HoTenNDD;
        $this->DiaChiNDD = $DiaChiNDD;
        $this->SDTLL = $SDTLL;
        $this->SCMND = $SCMND;
        $this->STK= $STK;
        $this->TenNganHang = $TenNganHang;
        $this->ChiNhanh= $ChiNhanh;
        $this->TenChuTK = $TenChuTK;
    }

    #Hàm kết nối
    static function connect(){
        $con = new mysqli("localhost","root","","ungho");
        $con->set_charset("utf8");
        if($con->connect_error)
            die("Kết nối thất bại. Chi tiết:".$con->connect_error);
        return $con;
    }

    #hàm lấy danh sách đơn vị ủng hộ
    static function getListDVUH(){
        $con = DonViUngHo::connect();
        $sql = "SELECT * FROM don_vi_ung_ho ";
        $result = $con->query($sql);
        $listDVUH = array();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $DVUH = new DonViUngHo(
                    $row["MaDVUH"],
                    $row["HoTenNguoiDaiDien"],
                    $row["DiaChiNguoiDaiDien"],
                    $row["SoDienThoaiLienLac"],
                    $row["SoCMNDNguoiDaiDien"],
                    $row["SoTaiKhoanNganHang"],
                    $row["TenNganHang"],
                    $row["ChiNhanhNganHang"],
                    $row["TenChuTKNganHang"]
                );
                array_push($listDVUH,$DVUH);
            }
        }
        return $listDVUH;
    }

    #Lấy tên tất cả các mã nhà Ủng hộ
    static function getAllMaDVUH(){
        $con = DonViUngHo::connect();
        $sql ="SELECT MaDVUH FROM don_vi_ung_ho";
        $result = $con->query($sql);
        $listDVUH = array();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                array_push($listDVUH, $row["MaDVUH"]);
            }
        }
        return $listDVUH;
    }
     
    #Hàm chuyển mã DVUH thành tên 
    static  function getNameByMa($Ma){
        $con = DonViUngHo::connect();
        $sql ="SELECT HoTenNguoiDaiDien FROM don_vi_ung_ho WHERE MaDVUH='$Ma'";
        $result = $con->query($sql);
        try {
            //code...
            if($result->num_rows>0){
                return $result->fetch_assoc();
            }
            return null;
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}