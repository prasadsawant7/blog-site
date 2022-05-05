<?php
require '../db/dbconfig.php';

$blog_id = $_GET['id'];

$query = $pdo->prepare("delete from `blogs` where `blog_id` = :i");

$query->bindValue('i', $blog_id);

if($query->execute()) {
    $msg = "success";
    header("Location: http://localhost/blog-site/app/view-blogs.php?msg=$msg", TRUE, 301);
    exit();
} else {
    $msg = "error";
    header("Location: http://localhost/blog-site/app/view-blogs.php?msg=$msg", TRUE, 301);
    exit();
}
?>