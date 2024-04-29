<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php 

    if(isset($_GET['delete_user'])){
        
        $delete_admin_id = $_GET['delete_user'];
        
        $delete_user = "delete from admins where admin_id='$delete_admin_id'";
        
        $run_delete = mysqli_query($conn,$delete_user);
        
        if($run_delete){
            
            echo "<script>alert('Admin successfully deleted')</script>";
		
		    echo "<script>window.open('index.php?view_users','_self')</script>";
            
        }
        
    }

?>

<?php } ?>