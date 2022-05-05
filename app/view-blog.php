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
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <span class="navbar-brand mb-0 h1">The Blog Site</span>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="view-blogs.php">View blogs</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="create-new-blog.html">Create new blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="update-blogs.php">Update blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="delete-blog.php">Delete blog</a>
              </li>
            </ul>
            <form class="d-flex">
              <input class="form-control me-2" id="searchInput" type="search" placeholder="Search blog..." aria-label="Search">
            </form>
          </div>
        </div>
    </nav>
    <a href="view-blogs.php"><i class="fa-solid fa-arrow-left-long text-dark" style="
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
    <div class="view-blog container d-flex align-items-center justify-content-center" style="margin-top: 90px; margin-bottom: 90px;">
        <div class="card border-light mb-3" style="max-width: 50rem;">
            <div class="card-body bg-light p-4">
              <h3 class="card-title"><?php echo $blog_title ?></h3>
              <p class="card-text" style="
                text-align: justify;
              ">
                <?php echo $blog_body ?>
              </p>
              <blockquote class="blockquote mt-5 mb-1">
                <footer class="blockquote-footer"><?php echo $blog_author_name ?></footer>
              </blockquote>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>