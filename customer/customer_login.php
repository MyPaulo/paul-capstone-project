<div class="box"><!-- box Begin -->
    
  <div class="box-header"><!-- box-header Begin -->
      
      <center><!-- center Begin -->
          
          <h1> Login </h1>
          
          <p class="lead"> Already have our account..? </p>
          
          <p class="text-muted"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint, maxime. Laudantium omnis, ullam, fuga officia provident error corporis consectetur aliquid corrupti recusandae minus ipsam quasi. Perspiciatis nemo, nostrum magni odit! </p>
          
      </center><!-- center Finish -->
      
  </div><!-- box-header Finish -->
   
  <form method="post" action="checkout.php"><!-- form Begin -->
      
      <div class="form-group"><!-- form-group Begin -->
          
          <label> Email </label>
          
          <input name="c_email" type="email" class="form-control" required>
          
      </div><!-- form-group Finish -->
      
       <div class="form-group"><!-- form-group Begin -->
          
          <label> Password </label>
          
          <input name="c_pass" type="password" class="form-control" required>
          
      </div><!-- form-group Finish -->
      
      <div class="text-center"><!-- text-center Begin -->
          
          <button name="login" value="Login" class="btn btn-primary">
              
              <i class="fa fa-sign-in"></i> Login
              
          </button>
          
      </div><!-- text-center Finish -->     
      
  </form><!-- form Finish -->
   
  <center><!-- center Begin -->
      
     <a href="customer_register.php">
         
        <h3> No account yet..? Register here </h3>
         
     </a> 
      
  </center><!-- center Finish -->
    
</div><!-- box Finish -->


<?php 

if(isset($_POST['login'])){
    
    $customer_email = $_POST['c_email'];
    $customer_pass = $_POST['c_pass'];
    
    // Select the customer based on the email
    $select_customer = "select * from customers where customer_email='$customer_email'";
    $run_customer = mysqli_query($conn,$select_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    
    // Get the hashed password from the database
    $hashed_pass = $row_customer['customer_pass'];
    
    // Verify the password
    if (password_verify($customer_pass, $hashed_pass)) {
        // Password is correct
        $get_ip = getRealIpUser();
        $select_cart = "select * from cart where ip_add='$get_ip'";
        $run_cart = mysqli_query($conn,$select_cart);
        $check_cart = mysqli_num_rows($run_cart);
        
        if($check_cart>0){
            /// If register have items in cart ///
            $_SESSION['customer_email']=$customer_email;
            echo "<script>alert('You are Logged in, welcome $customer_email')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        }else{
            /// If register without items in cart ///
            $_SESSION['customer_email']=$customer_email;
            echo "<script>alert('Account Registered Sucessfully, Welcome $customer_email')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    } else {
        // Invalid password
        echo "<script>alert('Your email or password is wrong')</script>";
        exit();
    }
    
}

?>
