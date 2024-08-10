<?php
   include("header.php");
   include("connection.php");
?>
         <!-- Page Content  -->
         <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Category Lists</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="admin-add-category.php" class="btn btn-primary">Add New Category</a>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="20%">Category Name</th>
                                        <th width="40%">Category Description</th>
                                        <th width="30%">Category Image</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                               $query = $pdo->query("SELECT * FROM category");
                               $categories = $query->fetchAll(PDO::FETCH_ASSOC);
                              foreach ($categories as $category) {
                              ?>
                                    <tr>
                                        <td><?php echo $category['name']; ?></td>
                                        <td><?php echo $category['description']; ?></td>
                                        <td>
                                        <img src="images/<?php echo $category['image']; ?>" style="max-width: 30%;">
                                        </td>
                                        <td>
                                           <div class="flex align-items-center list-user-action">
                                             <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="cat_update.php?id=<?php echo $category['id']?>"><i class="ri-pencil-line"></i></a>
                                             <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="admin-category.php?id=<?php echo $category['id']?>"><i class="ri-delete-bin-line"></i></a>
                                          </div>
                                        </td>
                                    </tr>
                                    <?php
                                       }
                                        // DELETE THE RECORD OF CATEGORY
                                       if(isset($_GET['id'])){
                                       $id = $_GET['id'];
                                       $query = $pdo->prepare("delete from category where id = :id");
                                       $query->bindParam('id',$id);
                                       $query->execute();
                                       echo "<script>alert('category deleted successfully');
                                       location.assign('admin-category.php');
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