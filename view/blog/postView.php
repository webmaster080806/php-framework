
        <!-- page content -->
        <div class="col-md-9">
          <div class="pageContent">

              <h3><?php print $blog['title']; ?></h3>
              <p><?php print $blog['post']; ?></p>
              <img src="<?php echo APP_BLOG_IMG . '/' . $blog['id'] . '.jpg'; ?>">
              <br>
              <small>Posted: <?php print $blog['create_date']; ?></small>

          </div>
        </div>
        <!-- end page content -->
