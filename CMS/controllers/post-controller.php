<?php
include("../models/post.php");
if (isset($_POST)) {
    if (isset($_POST["submit"])) {
        $title = $_POST["ftitle"];
        $content = $_POST["editor1"];

        //Xu ly media
        if (isset($_FILES['fimage'])) {
            $image = $_FILES['fimage']['name'];
            $tmp_name = $_FILES['fimage']['tmp_name'];
            $fsize = $_FILES["fimage"]["size"];
            $ftype = $_FILES['image']['type'];
            $fext = strtolower(end(explode('.', $_FILES['fimage']['name'])));
            $path = "../upload/images/";
            $expensions = array("jpeg", "jpg", "png");

            if (in_array($fext, $expensions) === false) {
                $errors[] = "Chỉ hỗ trợ upload file JPEG hoặc PNG.";
            }

            if ($file_size > 2097152) {
                $errors[] = 'Kích thước file không được lớn hơn 2MB';
            }

            if (empty($errors) == true) {
                move_uploaded_file($tmp_name, $path . $image);
                echo "Success";
            } else {
                print_r($errors);
            }
        }
        die();
    }

    $tag = $_POST["ftag"];
    $published = isset($_POST["fpublished"]) ? 1 : 0;
    if ($title != null && $content != null) {
        Post::AddNewPost($title, $content, $image, $tag, $published);
    }
    header("location:../add-post.php");
}

if (isset($_GET)) {
    if (isset($_GET["deletePost"])) {
        $id = $_GET["deletePost"];
        Post::DeletePost($id);
        header("location:../table-post.php");
    } else if (isset($_GET["editPost"])) {
        header("location:../add-post.php?editPost=" . $_GET["editPost"]);
    }
}
