
        <!-- page content -->
        <div class="col-md-9">
          <div class="pageContent">
            <table class="table table-striped table-condensed table-hover">
              <thead>
                <tr>
                  <th>Category</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Qty</th>
                  <th>Price</th>
                </tr>
              </thead>
              <tbody>

<?php while($product = $dbObj->dbFetch("assoc")) { ?>
                <tr>
                  <td><?php print $product['category_name']; ?></td>
                  <td><?php print $product['product_name']; ?></td>
                  <td><?php print $product['product_description']; ?></td>
                  <td><?php print $product['qty_on_hand']; ?></td>
                  <td><?php print $product['retail']; ?></td>
                </tr>
<?php } ?>
              </tbody>
            </table>
          </div>
        </div>
        <!-- end page content -->
