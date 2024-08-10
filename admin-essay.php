<?php
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
                              <h4 class="card-title">Essay Lists</h4>
                           </div>
                           <div class="iq-card-header-toolbar d-flex align-items-center">
                              <a href="admin-add-essay.php" class="btn btn-primary">Add New Essay Competition</a>
                           </div>
                        </div>
                        <div class="iq-card-body">
                           <div class="table-responsive">
                              <table class="data-tables table table-striped table-bordered" style="width:100%">
                                 <thead>
                                    <tr>
                                       <th style="width: 20%;">Essay Topic</th>
                                       <th style="width: 20%;">Essay Category</th>
                                       <th style="width: 25%;">Essay Description</th>
                                       <th style="width: 25%;">Total Marks</th>
                                       <th style="width: 25%;">Total Time To Submit</th>
                                       <th style="width: 25%;">Competition Start Date</th>
                                       <th style="width: 25%;">Competition Start Time</th>
                                       <th style="width: 10%;">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                 <?php
                               $query = $pdo->query("SELECT * FROM essays");
                               $essays = $query->fetchAll(PDO::FETCH_ASSOC);
                              foreach ($essays as $essay) {
                              ?>
                                    <tr>
                                       <td><?php echo $essay['topic']; ?></td>
                                       <td><?php echo $essay['category']; ?></td>
                                       <td><?php echo $essay['description']; ?></td>
                                       <td><?php echo $essay['marks']; ?></td>
                                       <td><?php echo $essay['totaltime']; ?></td>
                                       <td><?php echo $essay['startdate']; ?></td>
                                       <td><?php echo $essay['starttime']; ?></td>
                                        <td>
                                           <div class="flex align-items-center list-user-action">
                                             <a class="bg-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="admin-essay.php?id=<?php echo $essay['id']?>"><i class="ri-delete-bin-line"></i></a>
                                          </div>
                                        </td>
                                    </tr>
                                    <?php
                                       }
                                        // DELETE THE RECORD OF ESSAYS
                                       if(isset($_GET['id'])){
                                       $id = $_GET['id'];
                                       $query = $pdo->prepare("delete from essays where id = :id");
                                       $query->bindParam('id',$id);
                                       $query->execute();
                                       echo "<script>alert('essay deleted successfully');
                                       location.assign('admin-essay.php');
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