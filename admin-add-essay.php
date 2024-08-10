<?php 
   include("query.php");
   include("header.php");
?>
<!-- Work By Karar -->
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Add Essay Competition</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                        <form method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                 <label>Essay Topic:</label>
                                 <input type="text" class="form-control" name="es_topic">
                              </div>
                              <div class="form-group">
                                 <label>Essay Category</label>
                                 <input type="text" class="form-control" name="es_categ">
                              </div>
                              <div class="form-group">
                                 <label>Essay Description:</label>
                                 <input type="text" class="form-control" name="es_description">
                              </div>
                              <div class="form-group">
                                 <label>Total Marks</label>
                                 <input type="number" class="form-control" name="es_marks">
                              </div>
                              <div class="form-group">
                                 <label>Total Time To Submit</label>
                                 <input type="number" class="form-control" name="es_ttime">
                              </div>
                              <div class="form-group">
                                 <label>Competition Start Date</label>
                                 <input type="date" class="form-control" name="es_stdate">
                              </div>
                              <div class="form-group">
                                 <label>Competition Start Time</label>
                                 <input type="time" class="form-control" name="es_sttime">
                              </div>
                              <button type="submit" class="btn btn-primary"  name="add_essay">Add</button>
                              <button type="submit" class="btn btn-primary"><a href="admin-essay.php" class="text-light">View</a></button>
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