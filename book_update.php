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
                              <h4 class="card-title">Update Books</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                        <form method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                 <label>Book Name:</label>
                                 <input type="text" class="form-control" value="<?php echo $book['b_name']?>" name="up_b_name">
                              </div>
                              <div class="form-group">
                                 <label>Book Price:</label>
                                 <input type="text" class="form-control"  value="<?php echo $book['b_price']?>" name="up_b_price">
                              </div>
                              <div class="form-group">
                                 <label>Book Image:</label>
                                 <div class="custom-file">
                                 <input class="form-control" type="file" id="formFileMultiple"  multiple name="up_up_image">
                                 <input type="hidden" name="up_up_image"  value="<?php echo $book['b_image']?>">
                                 </div>
                              </div>
                              <div class="form-group">
                             <label>Book Author:</label>
                             <select name="a_id"  value="<?php echo $book['a_id']?>" class="form-select form-control" id="floatingSelect"
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
                             <select name="c_id"  value="<?php echo $book['c_id']?>" class="form-select form-control" id="floatingSelect"
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
                                 <input type="text" class="form-control"  value="<?php echo $book['b_description']?>" name="up_b_description">
                              </div>
                              <div class="form-group">
                                 <label>Book pdf:</label>
                                 <div class="custom-file">
                                 <input class="form-control" type="file" id="formFileMultiple" multiple
                                name="up_up_pdf"  value="<?php echo $book['b_pdf']?>">
                                    
                                 </div>
                              </div>
                              <button type="submit" class="btn btn-primary" name="up_add_book">UPDATE</button>
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