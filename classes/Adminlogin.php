<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath. '/../lib/Session.php');
    Session::checkLogin();
    include_once ($filepath. '/../lib/Database.php');
    include_once ($filepath. '/../helpers/Format.php');
?>
<?php

class Adminlogin {

    private $db;
    private $fm;

    public function __construct() {
        $this->db = new Database();     ///creare obj
        $this->fm = new Format();       //creare obj
    }

    public function adminlogin($adminUser, $adminPass) {

        $adminUser = $this->fm->validation($adminUser);
        $adminPass = $this->fm->validation($adminPass);

        $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);            //spch
        $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

        if (empty($adminUser) || empty($adminPass)) {                             
            $loginmsg = "User Or Password must not be empty";
            return $loginmsg;
        } else {
            $query = "SELECT * FROM tbl_admin WHERE adminUser = '$adminUser' AND adminPass = '$adminPass'";

            $result = $this->db->select($query);

            if ($result) {
                $value = $result->fetch_assoc();

                Session::set(adminlogin, true);
                Session::set(adminId,   $value['adminId']);
                Session::set(adminUser, $value['adminUser']);
                Session::set(adminName, $value['adminName']);
                Session::set(adminPass, $value['adminPass']);

            } else {

                $loginmsg = "User Or Password not match";
                return $loginmsg;
            }
        }
    }
 

}
