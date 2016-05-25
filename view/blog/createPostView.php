
        <!-- page content -->
        <div class="col-md-9">
          <div class="pageContent">

            <h3>Create Blog Post</h3>

            <hr>

            <form method="post" action="<?php print APP_DOC_ROOT . '/blog/create'; ?>">
              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Post Title">
              </div>
              <div class="form-group">
                <label for="post">Post</label>
                <textarea class="form-control" id="post" name="post"></textarea>
              </div>

              <button type="submit" name="submit" class="btn btn-primary">Create</button>
            </form>

          </div>
        </div>
        <!-- end page content -->
