<?php 
class DotUngHo
{
    #variable
    public $MaDotUngHo;
    public $MaDVUH;
    public $HoTenNDD;
    public $NgayUngHo;
    public $HinhThuc;
    public $SoLuong;
    public $DonViTinh;

    public function __construct($MaDotUngHo, $MaDVUH, $HoTenNDD,$NgayUngHo,$HinhThuc,$SoLuong,$DonViTinh){
        $this->MaDotUngHo = $MaDotUngHo;
        $this->MaDVUH = $MaDVUH;
        $this->HoTenNDD = $HoTenNDD;
        $this->NgayUngHo = $NgayUngHo;
        $this->HinhThuc = $HinhThuc;
        $this->SoLuong = $SoLuong;
        $this->DonViTinh = $DonViTinh;
    }

    #Hàm kết nối
    static function connect(){
        $con = new mysqli("localhost","root","","ungho");
        $con->set_charset("utf8");
        if($con->connect_error)
            die("Kết nối thất bại. Chi tiết:".$con->connect_error);
        return $con;
    }

    #Tạo một đơt ủng hộ
    static function createUngHo($MaDVUH, $NgayUngHo, $HinhThuc, $SoLuong, $DonViTinh ){
        $MaDotUngHo = DotUngHo::creatrMaDotUngHo();
        $con = DotUngHo::connect();
        $sql1="INSERT INTO dot_ung_ho(MaDotUngHo, MaDVUH, NgayUngHo ) VALUES ('$MaDotUngHo','$MaDVUH','$NgayUngHo')";
        $sql2="INSERT INTO chi_tiet_dot_ung_ho(MaDotUngHo, HinhThucUngHo, SoLuongUngHo, DonViTinh ) 
                VALUES ('$MaDotUngHo','$HinhThuc','$SoLuong', '$DonViTinh')";
       // $result =  $con->query($sql);
        if (mysqli_query($con, $sql1) && mysqli_query($con, $sql2) ) {
            echo "Thanh Cong";
        } else {
            echo "Error: " . $sql1 . "<br>" . mysqli_error($con);
            echo "Error: " . $sql2 . "<br>" . mysqli_error($con);
        }
    }

    #lấy danh sách các đợt Ủng hộ
    static function getAllDUH(){
        $con = DotUngHo::connect();
        $sql = "SELECT uh.MaDotUngHo,dv.MaDVUH,dv.HoTenNguoiDaiDien,uh.NgayUngHo,ct.HinhThucUngHo,ct.SoLuongUngHo,ct.DonViTinh 
                FROM don_vi_ung_ho AS dv,dot_ung_ho AS uh,chi_tiet_dot_ung_ho AS ct 
                WHERE dv.MaDVUH=uh.MaDVUH AND uh.MaDotUngHo=ct.MaDotUngHo";
        $result = $con->query($sql);
        $listDUH = array();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $DVUH = new DotUngHo(
                    $row["MaDotUngHo"],
                    $row["MaDVUH"],
                    $row["HoTenNguoiDaiDien"],
                    $row["NgayUngHo"],
                    $row["HinhThucUngHo"],
                    $row["SoLuongUngHo"],
                    $row["DonViTinh"]
                );
                array_push($listDUH,$DVUH);
            }
        }
        return $listDUH;
    }

    #Tao MaDotUngHo
    static function creatrMaDotUngHo(){
        $con = DotUngHo::connect();
        $sql = "SELECT  MAX(MaDotUngHo) FROM dot_ung_ho";
        $result = $con->query($sql);
        $tr = implode("",$result->fetch_assoc());
        $s = (int)substr($tr,3,strlen($tr)) +1;
        return "DUH".(string)$s;
    }
    
    # Sua mot Dot ung ho
    static function editUngHo($MaDotUngHo, $MaDVUH, $NgayUngHo, $HinhThuc, $SoLuong, $DonViTinh ){
        $con = DotUngHo::connect();
        $sql1="UPDATE dot_ung_ho SET MaDVUH='$MaDVUH', NgayUngHo = '$NgayUngHo' WHERE  MaDotUngHo='$MaDotUngHo'";
        $sql2="UPDATE chi_tiet_dot_ung_ho SET  HinhThucUngHo ='$HinhThuc', SoLuongUngHo = '$SoLuong', DonViTinh='$DonViTinh'  
                WHERE MaDotUngHo='$MaDotUngHo'";
       // $result =  $con->query($sql);
        if (mysqli_query($con, $sql1) && mysqli_query($con, $sql2) ) {
            echo "Thanh Cong";
        } else {
            echo "Error: " . $sql1 . "<br>" . mysqli_error($con);
            echo "Error: " . $sql2 . "<br>" . mysqli_error($con);
        }
    }
}