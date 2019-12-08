<?php 
include("../models/post.php");
if (isset($_POST)) {
    if (isset($_POST["submit"]) && isset($_GET)) {
        $id = $_GET["id"];
        $title = $_POST["ftitle"];
        $content = $_POST["editor1"];
        if (isset($_FILES['fimage'])) {
            $image = $_FILES['fimage']['name'];
            $tmp_name = $_FILES['fimage']['tmp_name'];
            $path = "../upload/";
            move_uploaded_file($tmp_name, $path . $image);
        }
        $tag = $_POST["ftag"];
        $published = isset($_POST["fpublished"]) ? 1 : 0;
        if ($title != null && $content != null) {
            Post::UpdatePost($id,$title, $content, $image, $tag, $published);
        }
        header("location:../add-post.php");
    }
}
?>