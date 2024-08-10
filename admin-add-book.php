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
                              <h4 class="card-title">Add Books</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                        <form method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                 <label>Book Name:</label>
                                 <input type="text" class="form-control" name="b_name">
                              </div>
                              <div class="form-group">
                                 <label>Book Price:</label>
                                 <input type="text" class="form-control" name="b_price">
                              </div>
                              <div class="form-group">
                                 <label>Book Image:</label>
                                 <div class="custom-file">
                                 <input class="form-control" type="file" id="formFileMultiple" multiple name="up_image">
                                 </div>
                              </div>
                              <div class="form-group">
                             <label>Book Author:</label>
                             <select name="a_id" class="form-select form-control" id="floatingSelect"
                            aria-label="Floating label select example">
                             <option selected>SELECT AUTHOR</option>
                              <?php
                              $query = $pdo->query("select * from authors");
                              $authors = $query->fetchAll(PDO::FETCH_ASSOC);
                              foreach ($authors as $author) {
        
                            ?>
                            <option value="<?php echo $author['id']?>"><?php echo $author['name']?></option>
                            <?php
                            }
                        ?>
                         <label for="floatingSelect">SELECT CATEGORY</label>
                    </select>
                             </div>
                             <div class="form-group">
                             <label>Book Category:</label>
                             <select name="c_id" class="form-select form-control" id="floatingSelect"
                            aria-label="Floating label select example">
                             <option selected>SELECT CATEGORY</option>
                              <?php
                              $query = $pdo->query("select * from category");
                              $categories = $query->fetchAll(PDO::FETCH_ASSOC);
                              foreach ($categories as $category) {
        
                            ?>
                            <option value="<?php echo $category['id']?>"><?php echo $category['name']?></option>
                            <?php
                            }
                        ?>
                         <label for="floatingSelect">SELECT CATEGORY</label>
                    </select>
                             </div>
                              <div class="form-group">
                                 <label>Book Description:</label>
                                 <input type="text" class="form-control" name="b_description">
                              </div>
                              <div class="form-group">
                                 <label>Book pdf:</label>
                                 <div class="custom-file">
                                 <input class="form-control" type="file" id="formFileMultiple" multiple
                                name="up_pdf">
                                    
                                 </div>
                              </div>
                              <button type="submit" class="btn btn-primary" name="add_book">Add</button>
                              <a href="admin-books.php"  class="btn btn-primary">View</a>
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