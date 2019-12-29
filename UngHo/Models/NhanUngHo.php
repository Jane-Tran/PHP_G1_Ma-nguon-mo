<?php 
class NhanUnngHo
{
    public $MaDotNhanUngHo;
    public $MaHoDan;
    public $NgayNhanUngHo;
    public $HinhThucNhanUngHo;
    public $SoLuongNhanUngHo;
    
    public function __construct( $MaDotNhanUngHo, $MaHoDan, $NgayNhanUngHo, $HinhThucNhanUngHo, $SoLuongNhanUngHo){
        $this->MaDotNhanUngHo = $MaDotNhanUngHo;
        $this->MaHoDan = $MaHoDan;
        $this->NgayNhanUngHo = $NgayNhanUngHo;
        $this->HinhThucNhanUngHo = $HinhThucNhanUngHo;
        $this->SoLuongNhanUngHo = $SoLuongNhanUngHo;
    }

    static function connect(){
        $con = new mysqli("localhost","root","","ungho");
        $con->set_charset("utf8");
        if($con->connect_error)
            die("Kết nối thất bại. Chi tiết:".$con->connect_error);
        return $con;
    }

    #Lấy thông tin các đợt nhận ủng hô theo đề bài 
    static function getAllNhanUngHo(){
        $con = NhanUnngHo::connect();
        $sql =" SELECT n.MaDotNhanUngHo, n.MaHoDan, n.NgayNhanUngHo, ct.HinhThucNhanUngHo, ct.SoLuongNhanUngHo
                FROM dot_nhan_ung_ho AS n, chi_tiet_dot_nhan_ung_ho AS ct
                WHERE n.MaDotNhanUngHo = ct.MaDotNhanUngHo";
        $result = $con->query($sql);
        $listDNUH = array();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $DNUH = new NhanUnngHo(
                     $row["MaDotNhanUngHo"],
                     $row["MaHoDan"],
                     $row["NgayNhanUngHo"],
                     $row["HinhThucNhanUngHo"],
                     $row["SoLuongNhanUngHo"]
                );
                array_push($listDNUH, $DNUH);
            }
        }
        return $listDNUH;
    }

    #xóa đợt nhận ủng hộ 
    static function deleteNhanUngHo($MaDotNhanUngHo){
        $con = NhanUnngHo::connect();
        $sql1="DELETE FROM dot_nhan_ung_ho WHERE MaDotNhanUngHo = '$MaDotNhanUngHo'";
        $sql2="DELETE FROM  chi_tiet_dot_nhan_ung_ho WHERE MaDotNhanUngHo='$MaDotNhanUngHo'";
       // $result =  $con->query($sql);
        if (mysqli_query($con, $sql2) && mysqli_query($con, $sql1) ) {
            echo "Thanh Cong";
        } else {
            echo "Error: " . $sql1 . "<br>" . mysqli_error($con);
            echo "Error: " . $sql2 . "<br>" . mysqli_error($con);
        }
    }
}
