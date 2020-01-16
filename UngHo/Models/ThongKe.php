<?php  
class ThongKe
{
    public $MaHoDan;
    public $HoTenChuHo;
    public $To;
    public $Khoi;
    public $LaHoNgheo;
    public $TongTien;

    public function __construct($MaHoDan, $HoTenChuHo, $To, $Khoi, $LaHoNgheo, $TongTien){
        $this->MaHoDan =$MaHoDan;
        $this->HoTenChuHo =$HoTenChuHo;
        $this->To =$To;
        $this->Khoi =$Khoi;
        $this->LaHoNgheo =$LaHoNgheo;
        $this->TongTien =$TongTien;
    } 

    #Hàm kết nối
    static function connect(){
        $con = new mysqli("localhost","root","","ungho");
        $con->set_charset("utf8");
        if($con->connect_error)
            die("Kết nối thất bại. Chi tiết:".$con->connect_error);
        return $con;
    }

    #Thống kê số tiền mặt mà mỗi hộ dân được nhận
    static function thongKeTienMat(){
        $con = ThongKe::connect();
        $sql = "SELECT h.MaHoDan,h.HoTenChuHo,h.To,h.KhoiHoacThon,h.LaHoNgheo,SUM(ct.SoLuongNhanUngHo) AS TongTien
                FROM chi_tiet_dot_nhan_ung_ho AS ct, dot_nhan_ung_ho AS d, ho_dan AS h
                WHERE h.LaHoNgheo ='Dung'
                    AND ct.HinhThucNhanUngHo='Tien mat' 
                    AND h.MaHoDan=d.MaHoDan 
                    AND ct.MaDotNhanUngHo=d.MaDotNhanUngHo
                GROUP BY ct.HinhThucNhanUngHo,h.MaHoDan";
        $listTK = array();
        $result = $con->query($sql);
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $tk = new ThongKe(
                    $row["MaHoDan"],
                    $row["HoTenChuHo"],
                    $row["To"],
                    $row["KhoiHoacThon"],
                    $row["LaHoNgheo"],
                    $row["TongTien"]
                );
                array_push($listTK,$tk);
            }
        }
        return $listTK;
    }
}