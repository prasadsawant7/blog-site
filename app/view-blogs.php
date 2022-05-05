<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
                <a class="nav-link active" aria-current="page" href="#">View blogs</a>
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

    <div class="blog-list mt-5">
      <div class="container">
      <?php
        include '../db/dbconfig.php';

        try {
            $query = "select * from `blogs`;";
            
            $result = $pdo->query($query);
            
            foreach($result as $row) {
                print '
                <div class="blog mb-3 p-3 bg-light text-dark">
                  <div class="blog-title-area h4 d-flex">
                    <div class="blog-id">'. $row['blog_id'] .'.&nbsp;</div>
                    <div class="blog-title">'. $row['blog_title'] .'</div>
                  </div>
                  <div class="blog-author-name fw-lighter">
                    '. $row['blog_author_name'] .'
                  </div>
                  <div class="blog-short-body">
                    '. substr($row['blog_body'], 0, 160) .'
                    <a href="view-blog.php?id='. $row['blog_id'] .'" style="color: #0088ff">read more...</a>
                  </div>
                </div>
                ';
            }
        } catch(PDOException $e) {
            die("Could not connect to the database $db :" . $e->getMessage());
        }
      ?>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="script.js"></script>
  </body>
</html>