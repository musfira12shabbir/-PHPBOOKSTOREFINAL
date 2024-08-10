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
                              <h4 class="card-title">Author Lists</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="admin-add-author.php" class="btn btn-primary">Add New Author</a>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
                                 <thead>
                                    <tr>
                                       <th style="width: 20%;">Author Name</th>
                                       <th style="width: 20%;">Author Email</th>
                                       <th style="width: 25%;">Author Description</th>
                                       <th style="width: 25%;">Author Profile</th>
                                       <th style="width: 10%;">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                               $query = $pdo->query("SELECT * FROM authors");
                               $authors = $query->fetchAll(PDO::FETCH_ASSOC);
                              foreach ($authors as $author) {
                              ?>
                                    <tr>
                                       <td><?php echo $author['name']; ?></td>
                                       <td><?php echo $author['email']; ?></td>
                                       <td><?php echo $author['description']; ?></td>
                                       <td>
                                        <img src="images/<?php echo $author['image']; ?>" style="max-width: 25%;">
                                        </td>
                                        <td>
                                           <div class="flex align-items-center list-user-action">
                                             <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"  href="aut_update.php?id=<?php echo $author['id']?>"><i class="ri-pencil-line"></i></a>
                                             <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="admin-author.php?id=<?php echo $author['id']?>"><i class="ri-delete-bin-line"></i></a>
                                          </div>
                                        </td>
                                    </tr>
                                    <?php
                                       }
                                        // DELETE THE RECORD OF AUTHORS
                                       if(isset($_GET['id'])){
                                       $id = $_GET['id'];
                                       $query = $pdo->prepare("delete from authors where id = :id");
                                       $query->bindParam('id',$id);
                                       $query->execute();
                                       echo "<script>alert('author deleted successfully');
                                       location.assign('admin-author.php');
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