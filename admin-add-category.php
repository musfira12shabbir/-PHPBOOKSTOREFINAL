<?php
   include("query.php");
   include("header.php");
?>
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Add Categories</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <form method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                 <label>Category Name:</label>
                                 <input type="text" class="form-control" name="up_name">
                              </div>
                              <div class="form-group">
                                <label>Category Image:</label>
                                <input class="form-control" type="file" id="formFileMultiple" multiple name="up_file">
                            </div>
                              <div class="form-group">
                                 <label>Category Description:</label>
                                 <!-- <textarea class="form-control" rows="4"></textarea> -->
                                 <input type="text" class="form-control" name="up_description">
                              </div>
                              <button type="submit" class="btn btn-primary"  name="add_cat">Add</button>
                              <button type="submit" class="btn btn-primary"><a href="admin-category.php" class="text-light">View</a></button>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- Wrapper END -->
      <?php
         include("footer.php");
      ?>