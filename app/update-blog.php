<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/50a7ba6f7f.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>The Blog Site</title>
  </head>
  <a>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <span class="navbar-brand mb-0 h1">The Blog Site</span>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="view-blogs.html">View blogs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="create-new-blog.html">Create new blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="update-blogs.php">Update blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="delete-blog.php">Delete blog</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <a href="update-blogs.php"><i class="fa-solid fa-arrow-left-long text-dark" style="
      font-size: 30px;
      margin: 30px 0px 0px 30px;
    "></i></a>
    <?php
        include '../db/dbconfig.php';
        $blog_id = $_GET['id'];
        try {
            $query = "select * from `blogs` where `blog_id`=$blog_id;";
            
            $result = $pdo->query($query);
            
            foreach($result as $row) {
                $blog_title = $row['blog_title'];
                $blog_body = $row['blog_body'];
                $blog_author_name = $row['blog_author_name'];
            }
        } catch(PDOException $e) {
            die("Could not connect to the database $db :" . $e->getMessage());
        }
    ?>
    <div class="update-blog container d-flex align-items-center justify-content-center" style="margin-top: 30px;">
        <div class="card p-5 w-50">
            <form action="update.php" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label h5">Author Name</label>
                    <input type="text" class="form-control" name="author" value="<?php echo $blog_author_name ?>" id="exampleFormControlInput1">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label h5">Blog Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo $blog_title ?>" id="exampleFormControlInput2">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label h5">Blog Body</label>
                    <textarea class="form-control" name="body" id="exampleFormControlTextarea1" rows="10" cols="20"><?php echo $blog_body ?></textarea>
                </div>
                <input type="text" name="id" value="<?php echo $blog_id ?>" hidden>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>