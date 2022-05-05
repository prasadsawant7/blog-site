<?php
require '../db/dbconfig.php';

$blog_id = "";
$blog_title = "";
$blog_body = "";
$blog_author_name = "";

switch($_SERVER['REQUEST_METHOD']) {
    case 'GET': $req = $_GET; break;
    case 'POST': $req = $_POST; break;
    default: echo 'Wrong Method';
}

if($req == $_POST) {
    $blog_id = $_POST['id'];
    $blog_title = $_POST['title'];
    $blog_body = $_POST['body'];
    $blog_author_name = $_POST['author'];
}else {
    sendToView("Method is not POST");
}

$query = $pdo->prepare("update `blogs` set `blog_title` = :t, `blog_body` = :b, `blog_author_name` = :a, `blog_last_modified` = current_timestamp() where `blog_id` = :i");

$query->bindValue('i', $blog_id);
$query->bindValue('t', $blog_title);
$query->bindValue('b', $blog_body);
$query->bindValue('a', $blog_author_name);

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
