<?php


# Include html header
include( APP_VIEW . '/header.php' );

# Include main navigation
include( APP_VIEW . '/nav.php' );

switch ( $route->getAction() ) {

    case 'contact':
        if (isset($_POST['submit'])) {
          print '<pre>';
          print_r($_POST);
          print '</pre>';
        } else {
          include( APP_VIEW .'/home/homeSubNav.php' );
          include( APP_VIEW .'/home/contactView.php' );
        }
        break;

    case 'table':
        $dbObj = new db();

        $sql = "SELECT
                 p.name as product_name,
                 p.description as product_description,
                 p.qty_on_hand,
                 p.retail,
                 c.name as category_name
                FROM
                  product p
                INNER JOIN
                  product_categories pc ON pc.product_id = p.id
                INNER JOIN
                  categories c ON c.id = pc.category_id";
        $dbObj->dbPrepare($sql);
        $dbObj->dbExecute([]);

        // $row = $dbObj->dbFetch("assoc");
        // print_r($row);
        // exit;

        include( APP_VIEW .'/home/homeSubNav.php' );
        include( APP_VIEW .'/home/tableView.php' );
        break;

    default:
        $dbObj = new db();

        $sql = "SELECT * FROM app_user";
        $dbObj->dbPrepare($sql);
        $dbObj->dbExecute(['bob']);
        $row = $dbObj->dbFetch("assoc");

        print '<pre>';
        print_r($row);
        print '</pre>';

        include( APP_VIEW .'/home/homeSubNav.php' );
        include( APP_VIEW .'/home/homeView.php' );
        break;
}


# Include html footer
include( APP_VIEW . '/footer.php' );
