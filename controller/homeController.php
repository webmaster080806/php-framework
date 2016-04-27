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

    case 'home':
        include( APP_VIEW .'/home/homeSubNav.php' );
        include( APP_VIEW .'/home/homeView.php' );
        break;

    default:
        include( APP_VIEW .'/home/homeSubNav.php' );
        include( APP_VIEW .'/home/homeView.php' );
        break;
}


# Include html footer
include( APP_VIEW . '/footer.php' );
