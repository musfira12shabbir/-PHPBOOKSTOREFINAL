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
                              <h4 style="color:#0dd6b8" class="card-title">Membership Lists</h4>
                           </div>
                           <!-- <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="admin-add-category.php" class="btn btn-primary">Add New Category</a>
                           </div> -->
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                    <th>Id</th>
                                        <th> Name</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Phone Number</th>
                                        <th>Zip Code</th>
                                        <th>Membership Level</th>
                                        <th>City</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                               $query = $pdo->query("SELECT * FROM memberships");
                               $membership = $query->fetchAll(PDO::FETCH_ASSOC);
                              foreach ($membership as $member) {
                              ?>
                                    <tr>
                                    <td><?php echo $member['id']?></td>
                                        <td><?php echo $member['name']?></td>
                                        <td><?php echo $member['email']?></td>
                                        <td><?php echo $member['address']?></td>
                                        <td><?php echo $member['phone']?></td>
                                        <td><?php echo $member['zip_code']?></td>
                                        <td><?php echo $member['membership_level']?></td>
                                        <td><?php echo $member['city']?></td>
                                        
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