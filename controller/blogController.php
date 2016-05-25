<?php


# Include html header
include( APP_VIEW . '/header.php' );

# Include main navigation
include( APP_VIEW . '/nav.php' );

switch ( $route->getAction() ) {

    case 'create':
      if (isset($_POST['submit']))
      {
        // Create database connection
        $dbObj = new db();

        // Insert Post into DB
        $sql = "INSERT INTO blog
                (title, post, create_user, create_date)
                VALUES
                (?, ?, ?, ?)";
        $dbObj->dbPrepare($sql);
        $dbObj->dbExecute([
          $_POST['title'],
          $_POST['post'],
          $_SESSION['username'],
          date('Y-m-d')
        ]);

        // Load all posts
        $sql = "SELECT * FROM blog ORDER BY create_date desc";
        $dbObj->dbPrepare($sql);
        $dbObj->dbExecute([]);

        include( APP_VIEW .'/blog/blogSubNav.php' );
        include( APP_VIEW .'/blog/listPostView.php' );
      }
      else {
        include( APP_VIEW .'/blog/blogSubNav.php' );
        include( APP_VIEW .'/blog/createPostView.php' );
      }
      break;

    case 'view':
      $dbObj = new db();

      $sql = "SELECT * FROM blog ORDER BY create_date desc";
      $dbObj->dbPrepare($sql);
      $dbObj->dbExecute([]);

      include( APP_VIEW .'/blog/blogSubNav.php' );
      include( APP_VIEW .'/blog/listPostView.php' );
      break;

    case 'viewPost':
        $postId = $route->getParams()[2];

        $dbObj = new db();

        $sql = "SELECT * FROM blog WHERE id = ?";
        $dbObj->dbPrepare($sql);
        $dbObj->dbExecute([$postId]);

        $blog = $dbObj->dbFetch("assoc");

        include( APP_VIEW .'/blog/blogSubNav.php' );
        include( APP_VIEW .'/blog/postView.php' );
        break;

    default:
        $dbObj = new db();

        $sql = "SELECT * FROM blog ORDER BY create_date";
        $dbObj->dbPrepare($sql);
        $dbObj->dbExecute([]);

        include( APP_VIEW .'/blog/blogSubNav.php' );
        include( APP_VIEW .'/blog/listPostView.php' );
        break;
}


# Include html footer
include( APP_VIEW . '/footer.php' );



// Blog Functions

function displayTitle($blogTitle)
{
  if (50 < strlen($blogTitle))
  {
      return substr($blogTitle,0,50) . '...';
  }
  else
  {
    return $blogTitle;
  }
}
