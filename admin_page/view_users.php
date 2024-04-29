<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row"><!-- row 1 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                
                <i class="fa fa-dashboard"></i> Portal / View Admin
                
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
               <h3 class="panel-title"><!-- panel-title begin -->
               
                   <i class="fa fa-tags"></i>  View Admin
                
               </h3><!-- panel-title finish --> 
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <div class="table-responsive"><!-- table-responsive begin -->
                    <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                        
                        <thead><!-- thead begin -->
                            <tr><!-- tr begin -->
                                <th>Admin ID:</th>
								<th>Admin Name:</th>
								<th>Admin Image:</th>
								<th>Admin E-mail:</th>
								<th>Admin Country:</th>
								<th>Admin about:</th>
								<th>Admin job:</th>
								<th>Admin Contact:</th>
								<th>Edit:</th>
								<th>Delete:</th>
                            </tr><!-- tr finish -->
                        </thead><!-- thead finish -->
                        
                        <tbody><!-- tbody begin -->
                            
                        <?php 
							
							$i=0;
							
							$get_admin= "select * from admins";
							
							$run_admin = mysqli_query($conn,$get_admin);
							
							while($row_admin=mysqli_fetch_array($run_admin)){
								
								$admin_id = $row_admin['admin_id'];
								
								$admin_name = $row_admin['admin_name'];
								
								$admin_img = $row_admin['admin_image'];
								
								$admin_email = $row_admin['admin_email'];
								
								$admin_country = $row_admin['admin_country'];
								
								$admin_about = $row_admin['admin_about'];
								
								$admin_job = $row_admin['admin_job'];		
								
								$admin_contact = $row_admin['admin_contact'];
								
								$i++;
								
							?>
                            
                            <tr><!--tr start -->
								<td><?php echo $i; ?></td>
								<td><?php echo $admin_name; ?></td>
								<td><img src="../admin_page/admin_images/<?php echo $admin_img; ?>" width="60" height="60"></td>
								<td> <?php echo $admin_email; ?></td>
								<td> <?php echo $admin_country; ?></td>
								<td> <?php echo $admin_about; ?></td>
								<td> <?php echo $admin_job; ?></td>
								<td> <?php echo $admin_contact; ?></td>
								<td> 
									
									<a href="index.php?user_profile=<?php echo $admin_id; ?>">
									
										<i class="fa fa-pencil"></i> Edit
									
									</a>
									
								</td>
								<td> 
									
									<a href="index.php?delete_admin=<?php echo $admin_id; ?>">
									
										<i class="fa fa-trash-o"></i> Delete
									
									</a>
									
								</td>
							</tr><!--tr end -->
							
							<?php } ?>
							
						</tbody><!--tbody end -->
						
					</table><!--table table-striped table-bordered table-hover end -->
				</div><!--table-responsive end -->
			</div><!--panel-body end -->
			
			
		</div><!--panel panel-default end -->
	</div><!--col-lg-12  end -->
</div><!--row 2 end -->

<?php } ?>