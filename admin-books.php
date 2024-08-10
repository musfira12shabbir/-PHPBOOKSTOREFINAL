<?php
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
                              <h4 class="card-title">book Lists</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="admin-add-book.php" class="btn btn-primary">Add New book</a>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                       <th style="width: 15%;">Book Name</th>
                                       <th style="width: 7%;">Price</th>
                                        <th style="width: 13%;">Book Image</th>
                                        <th style="width: 14%;">Book Category</th>
                                        <th style="width: 13%;">Book Author</th>
                                        <th style="width: 23%;">Book Description</th>
                                        <th style="width: 5%;">pdf</th>
                                        <th style="width: 10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                               $query = $pdo->query("SELECT * FROM books");
                               $books = $query->fetchAll(PDO::FETCH_ASSOC);
                              foreach ($books as $book) {
                              ?>
                                    <tr> 
                                       <td><?php echo $book['b_name']; ?></td>
                                       <td><?php echo $book['b_price']; ?></td>
                                       <td>
                                        <img src="images/<?php echo $book['b_image']; ?>" style="max-width: 100px;">
                                        </td>
                                        <td><?php echo $book['a_id']; ?></td>
                                        <td><?php echo $book['c_id']; ?></td>
                                        <td><?php echo $book['b_description']; ?></td>
                                        <td>
                                          <iframe src="pdfs/<?php echo $book['b_pdf']; ?>" width="100px" height="100"></iframe>
                                          <br>
                                          <a href="pdfs/<?php echo $book['b_pdf']; ?>" target="_blank">Open PDF</a>
                                       </td>
                                       <td>

                                           <div class="flex align-items-center list-user-action">
                                             <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="book_update.php?b_id=<?php echo $book['b_id']?>"><i class="ri-pencil-line"></i></a>
                                             <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="admin-books.php?b_id=<?php echo $book['b_id']?>"><i class="ri-delete-bin-line"></i></a>
                                          </div>
                                        </td>
                                    </tr>  
                                    <?php
                                       }
                                        // DELETE THE RECORD OF BOOKS
                                       if(isset($_GET['b_id'])){
                                       $id = $_GET['b_id'];
                                       $query = $pdo->prepare("delete from books where b_id = :b_id");
                                       $query->bindParam('b_id',$id);
                                       $query->execute();
                                       echo "<script>alert('book deleted successfully');
                                       location.assign('admin-books.php');
                                       </script>";
                                       }
                                    ?>
                                </tbody>
                            </table>
                           </div>
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