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
                              <h4 class="card-title">Update Author</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                 <label>Author Name:</label>
                                 <input type="text" class="form-control" name="au_name" value="<?php echo $author['name'] ?>">
                              </div>
                              <div class="form-group">
                                 <label>Author Profile:</label>
                                 <div class="custom-file">
                                 <input class="form-control" type="file" id="formFileMultiple" multiple name="au_file">
                                    <!-- <label class="custom-file-label" for="customFile">Choose file</label> -->
                                 </div>
                              </div>
                              <div class="form-group">
                                 <label>Author Email:</label>
                                 <input type="text" class="form-control" name="au_email" value="<?php echo $author['email'] ?>">
                              </div>
                              <div class="form-group">
                                 <label>Author Description:</label>
                                 <input type="text" class="form-control" name="au_description" value="<?php echo $author['description'] ?>">
                              </div>
                              <button type="submit" class="btn btn-primary"  name="update_author">Update</button>
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