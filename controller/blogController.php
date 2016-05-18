<?php


# Include html header
include( APP_VIEW . '/header.php' );

# Include main navigation
include( APP_VIEW . '/nav.php' );

switch ( $route->getAction() ) {

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
