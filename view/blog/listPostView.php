
        <!-- page content -->
        <div class="col-md-9">
          <div class="pageContent">

<?php while($blog = $dbObj->dbFetch("assoc")) { ?>
              <h3>
                <a href="<?php echo APP_DOC_ROOT . '/blog/viewPost/' . $blog['id']; ?>">
                  <?php print $blog['title']; ?>
                </a>
              </h3>
              <p><?php print substr($blog['post'],0,100) . '...'; ?></p>
              <img src="<?php echo APP_BLOG_IMG . '/' . $blog['id'] . '.jpg'; ?>">
              <br>
              <small>Posted: <?php print $blog['create_date']; ?></small>
<?php } ?>

          </div>
        </div>
        <!-- end page content -->
