<?php
class Post
{
    var $id;
    var $title;
    var $content;
    var $image;
    var $tag;
    var $published;
   
    function __construct($_id, $_title, $_content, $_image, $_tag , $_published)
    {
        $this->id = $_id;
        $this->title = $_title;
        $this->content = $_content;
        $this->image = $_image;
        $this->tag = $_tag;
        $this->published = $_published;
    }

    //Hàm kết nối MySQL, đóng kết nối sau mỗi lần sử dụng !
    static function connect()
    {
        $con = new mysqli("localhost", "root", "", "cms");
        $con->set_charset("utf-8");
        if ($con->connect_error) die("Kết nối thất bại --> " . $con->connect_error);
        return $con;
    }

    //Hàm lấy danh sách post
    static function GetListPostFromDB()
    {
        $con = Post::connect();
        $sql = "SELECT * FROM post WHERE published=1";
        $result = $con->query($sql);
        $listp = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($listp, new Post(
                    $row["id"],
                    $row["title"],
                    $row["content"],
                    $row["image"],
                    $row["tag"],
                    $row["published"]
                ));
            }
        
        $con->close();
        return $listp;
    }
    }
    
    //Hàm lấy danh sách post sử dụng cho Admin
    static function GetListPostFromDBByAdmin()
    {
        $con = Post::connect();
        $sql = "SELECT * FROM post ";
        $result = $con->query($sql);
        $listp = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                array_push($listp, new Post(
                    $row["id"],
                    $row["title"],
                    $row["content"],
                    $row["image"],
                    $row["tag"],
                    $row["published"]
                ));
            }
        
        $con->close();
        return $listp;
    }
    }
        
    //Hàm thêm 1 post mới 
    static function AddNewPost( $title, $content, $image, $tag,$published)
    {
        $con = Post::connect();
        $sql = "INSERT INTO post(title,content,`image`,tag,published)  
                VALUES ( '$title', '$content', '$image', '$tag', '$published')";
        $con->query($sql) or die("truy vấn lỗi :(");
        $con->close();
    }

    /**
     * Hàm trả vể 1 đối tượng post
     * @param $id  là mã post
     */
    static function GetPostById($id)
    {
        $con = Post::connect();
        $sql = "SELECT * FROM post WHERE id= '$id'";
        $result = $con->query($sql);
        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $p = new Post(
                $row["id"],
                $row["title"],
                $row["content"],
                $row["image"],
                $row["tag"],
                $row["published"]
            );
            return $p;
        }
        $con->close();
    }

    /**
     * Hàm xóa 1 bài post với quyền của manager
     * 
     */
    static function DeletePost( $id)
    {
        $con = Post::connect();
        $sql = "DELETE FROM post WHERE id='$id'";
        $con->query($sql) or die("truy vấn lỗi :(");
        $con->close();
    }

    /**
     * Hàm cập nhật 1 bài post với quyền của manager
     * 
     */
    static function UpdatePost($id, $title, $content, $image, $tag,$published)
    {
        $con = Post::connect();
        var_dump((string)$published);
        $sql = "UPDATE post SET title='$title', content='$content', image='$image', tag='$tag', published='$published'  WHERE id='$id'";
        var_dump($sql);
        $con->query($sql) or die("truy vấn lỗi :(  ?????".$con->error);
        $con->close();
    }
}
