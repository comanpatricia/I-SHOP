<?php include 'inc/header.php' ;?>
<?php
    $login = Session::get("customerlogin");
    if($login==FALSE){
        header("Location:login.php");
    }
?>
<html>
<head>
    <title>Your profile</title>
</head>
<body>
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <?php
                        $id = Session::get("customerId");
                        $getCustomerData = $cmr->customerData($id);
                        if($getCustomerData){
                            while ($result = $getCustomerData->fetch_assoc()){
                    ?>
                    <br>
                        <table class="table">
                            <thead>
                                <tr class="text-center" style="background-color:black; color: white">
                                    <td colspan="2"><span style="font-weight: bold; font-size: 19px;">Your personal information</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-right"><b>Name :</b></td>
                                    <td><b><?php echo $result['c_name'];?></b></td>         
                                </tr>
                                <tr>
                                    <td class="text-right"><b>Address :</b></td>
                                    <td><b><?php echo $result['c_address'];?></b></td>
                                </tr>
                                <tr>
                                    <td class="text-right"><b>City :</b></td>
                                    <td><b><?php echo $result['city_name'];?></b></td>
                                </tr> 
                                <tr>
                                    <td class="text-right"><b>Area :</b></td>
                                    <td><b><?php echo $result['area_name'];?></b></td>           
                                </tr>
                                <tr>
                                    <td class="text-right"><b>Zip :</b></td>
                                    <td><b><?php echo $result['c_zip'];?></b></td>           
                                </tr>
                                <tr>
                                    <td class="text-right"><b>Phone :</b></td>
                                    <td><b><?php echo $result['c_phone'];?></b></td>           
                                </tr>
                                <tr>
                                    <td class="text-right"><b>Email :</b></td>
                                    <td><b><?php echo $result['c_email'];?></b></td>           
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-right"><a class="button1" href="profile_edit.php">Update Details</a></td>
                                </tr>
                            </tbody>
                        </table>
                    <?php } } ?>
                </div>
            </div>
        </div>
    </div>
</body>

<style>
    .button1 {
  background-color: orange;  
  border: none;
  color: black;
  padding: 10px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.8s;
  cursor: pointer;
  border-radius: 8px;
  font-weight: bold;
}

.button1:hover {
  background-color: black;
  color: white;
  text-decoration: none;
}
</style>
</html>
<?php include 'inc/footer.php' ;
?>


