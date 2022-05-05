<?php
require '../db/dbconfig.php';

$blog_title = "";
$blog_body = "";
$blog_author_name = "";

switch($_SERVER['REQUEST_METHOD']) {
    case 'GET': $req = $_GET; break;
    case 'POST': $req = $_POST; break;
    default: echo 'Wrong Method';
}

if($req == $_POST) {
    $blog_title = $_POST['title'];
    $blog_body = $_POST['body'];
    $blog_author_name = $_POST['author'];
}else {
    sendToView("Method is not POST");
}

$query = $pdo->prepare("insert into `blogs` (`blog_id`, `blog_title`, `blog_body`, `blog_author_name`, `blog_last_modified`) values (NULL, :t, :b, :a, current_timestamp())");

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
