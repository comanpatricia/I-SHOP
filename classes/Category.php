<?php
  $filepath = realpath(dirname(__FILE__));
    
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');
?>
<?php

class Category {

    private $db;
    private $fm;

    public function __construct() {

        $this->db = new Database();     //creare obj
        $this->fm = new Format();       //creare obj
    }

    //inserare categorie
    
    public function catInsert($catName){
        $catName = $this->fm->validation($catName);   

        $catName = mysqli_real_escape_string($this->db->link, $catName);   
        
        if (empty($catName)) {    
            $msg = "<span class = 'error'>Category must not be empty</span>";
            return $msg;
        }else{
           $query = "INSERT INTO tbl_category(catName) VALUES(' $catName')";
           $catinsert = $this->db->insert($query);
           if($catinsert){
              
               $msg = "<span class='success'>Category inserted successfully</span>";
               return $msg;
           }else{
               $msg = "<span class = 'error'>Category insertion is failed</span>";
               return $msg;
           }
        }
    }

    //selectare toate categoriile

    public function getAllCat(){
        
        $query = "SELECT * FROM tbl_category ORDER BY catId DESC";
        $result = $this->db->select($query);
        return $result;
        
    }

    //selectarea categoriilor dupa ID

    public function getCatById($id){
        
        $query = "SELECT * FROM tbl_category WHERE catId = '$id'";
        $result = $this->db->select($query);
        return $result;
         
    }

    //updateul categoriilor in functie de ID
    
    public function catUpdate($catName,$id){
        
        $catName = $this->fm->validation($catName);

        $catName = mysqli_real_escape_string($this->db->link, $catName);
        
        
        if (empty($catName)) {    
            $msg = "<span class = 'error'>Category must not be empty</span>";
            return $msg;
        }else{
           $query = "UPDATE tbl_category SET catName = '$catName' WHERE catId = '$id'";
                   
           $catupdate = $this->db->update($query);
           if($catupdate){
              
               $msg = "<span class='success'>Category updated successfully</span>";
               return $msg;
           }else{
               $msg = "<span class = 'error'>Update failed</span>";
               return $msg;
           }
        }
    }

    //stergere categorie in functie de ID

    public function delCatById($id){
          $query = "DELETE FROM tbl_category WHERE catId = '$id'";
          $deletedata = $this->db->delete($query);
          if($deletedata){
              
               $msg = "<span class='success'>Category deleted successfully</span>";
               return $msg;
           }else{
               $msg = "<span class = 'error'>Category Not Deleted!!</span>";
               return $msg;
           }
    }
    
}
