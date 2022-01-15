<?php include 'inc/header.php' ?>

<?php
    if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['register'])){
    $insertCustomer = $cmr->customerInsert($_POST);         //Customer class
    }
?>

<script type="text/javascript">
        
        function getCountry(val) {
                $.ajax({
                    
                type: 'POST',
                 url: 'areas.php',
                data: 'cityId='+val,
                success: function(data){
                        $("#areas").html(data);                 
                    }
                });
        } 
</script>

<html>
<head>
    <title>Register</title>
</head>
<body><center><br><br>
    <div class="container">
        <div class="col-md-8" style="">
            <?php
               if(isset($insertCustomer)){
                   echo $insertCustomer;
               } 
            ?>
            <form action="" method="post">
                <p class="text-center font-weight-bold" style="font-style: italic;font-size:20px; ">Sign Up</p><br>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="c_name" placeholder="Name" minlength="5">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" name="c_address" placeholder="Address">
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <select class="form-control" onChange="getCountry(this.value);" name="c_city">
                            <option>Select City</option>
                            <?php 
                               $getCity = $cmr->getAllCity();
                               if($getCity){
                                   while ($result = $getCity->fetch_assoc()){
                            ?>
                            <option value="<?php echo $result['city_id'] ?>"><?php echo $result['city_name']; ?></option>
                            <?php }}?>
                        </select>
                    </div>
                    <div class="form-group col-md-6 ">                        
                        <select class="form-control" id="areas" name="c_area">
                            <option>Select Area</option>
                        </select>
                    </div>                    
                </div>
                
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control"name="c_zip" placeholder="Zip Code" minlength="6">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="text" class="form-control" minlength="10" name="c_phone" placeholder="Phone">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" name="c_email" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="password" class="form-control" name="c_pass" placeholder="Password" minlength="5">
                    </div>
                </div><br>
                <div> By creating an account I agree with the <a href="terms.php" style="color:orange">terms and conditions.</a></label></div><br>
                <button type="submit" class="button" name="register">Create Account</button>
            </form><br>
        </div>
    </div>   
    <div><br>Already have an account? <a href="login.php" style="color:orange"><b>Click here</b></a></div><br>
</body>

<style>
.button {
  background-color: black;  
  border: none;
  color: white;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
  border-radius: 8px;
}

.button:hover {
  background-color: orange;
  color: black;
  text-decoration: none;
  font-weight:bold;
}
</style>
</html>
<?php include 'inc/footer.php' ?>