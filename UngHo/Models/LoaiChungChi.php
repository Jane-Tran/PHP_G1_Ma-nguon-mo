<?php
class LoaiChungChi
{
    #Variable
    public $MaChungChi;
    public $TenChungChi;

    #hàm tạo 
    public function __construct($MaChungChi,$TenChungChi)
    {
        $this->MaChungChi = $MaChungChi;
        $this->TenChungChi = $TenChungChi;
    }

    #Hàm kết nối
    static function connect(){
        $con = new mysqli("localhost","root","","ungho");
        $con->set_charset("utf8");
        if($con->connect_error)
            die("Kết nối thất bại. Chi tiết:".$con->connect_error);
        return $con;
    }


    #Lấy tên tất cả các Ma loai chứng chỉ
    static function getAllMa(){
        $con = LoaiChungChi::connect();
        $sql ="SELECT MaChungChi FROM loaichungchi";
        $result = $con->query($sql);
        $listDVUH = array();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                array_push($listDVUH, $row["MaChungChi"]);
            }
        }
        return $listDVUH;
    }
     
    #Hàm chuyển mã  thành tên 
    static  function getNameByMa($Ma){
        $con = LoaiChungChi::connect();
        $sql ="SELECT TenChungChi FROM loaichungchi WHERE MaChungChi='$Ma'";
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
    #hàm lấy danh sách đơn vị ủng hộ
    static function getListCC(){
        $con = LoaiChungChi::connect();
        $sql = "SELECT * FROM loaichungchi ";
        $result = $con->query($sql);
        $listDVUH = array();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $DVUH = new LoaiChungChi(
                    $row["MaChungChi"],
                    $row["TenChungChi"]
                );
                array_push($listDVUH,$DVUH);
            }
        }
        return $listDVUH;
    }
    static function deleteCC($MaCC){
        $con = LoaiChungChi::connect();
        $sql1="DELETE FROM loaichungchi WHERE MaChungChi = '$MaCC'";
        //$sql2="DELETE FROM  chi_tiet_dot_nhan_ung_ho WHERE MaDotNhanUngHo='$MaDotNhanUngHo'";
       // $result =  $con->query($sql);
        if ( mysqli_query($con, $sql1) ) {
            echo "Thanh Cong";
        } else {
            echo "Error: " . $sql1 . "<br>" . mysqli_error($con);
        }
    }
     #Tạo một đơt ủng hộ
     static function createCC($TenCC ){
        $con = LoaiChungChi::connect();
        $sql1="INSERT INTO loaichungchi(TenChungChi ) VALUES ('$TenCC')";
        
       // $result =  $con->query($sql);
        if (mysqli_query($con, $sql1)  ) {
            echo "Thanh Cong";
        } else {
            echo "Error: " . $sql1 . "<br>" . mysqli_error($con);
        }
    }
    static function editCC($MaDotUngHo, $MaDVUH ){
        $con = LoaiChungChi::connect();
        $sql1="UPDATE loaichungchi SET TenChungChi='$MaDVUH' WHERE  MaChungChi='$MaDotUngHo'";
       // $result =  $con->query($sql);
        if (mysqli_query($con, $sql1)  ) {
            echo "Thanh Cong";
        } else {
            echo "Error: " . $sql1 . "<br>" . mysqli_error($con);
        }
    }
}