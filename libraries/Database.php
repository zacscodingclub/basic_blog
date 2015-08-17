<?php
  class Database {
    public $host = DB_HOST;
    public $username = DB_USER;
    public $password = DB_PASS;
    public $db_name = DB_NAME;
  
    public $link;
    public $error;

    // Class constructor   
    public function __construct() {
      $this->connect();
    }

    // connect to DB
    private function connect(){
      $this->link = new mysqli($this->host, $this->username, $this->password, $this->db_name);

      if(!$this->link) {
        $this->error = "Connection Failed: ".$this->link->connect_error;
        return false;
      }
    }

    // Select 
    public function select($query){
      $result = $this->link->query($query) or die($this->link->error.__LINE__);

      if($result->num_rows > 0){
        return $result;
      } else {
        return false;
      }
    }

    // Insert 
    public function insert($query){
      $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);

      // Validate Insert
      if($insert_row) {
        die('<script type="text/javascript">window.location.href="index.php?msg='.urlencode("Record Added").'";</script>');
      } else {
        die('Error: ('.$this->link->errno.') '.$this->link->error);
      }

 
    }

    // Update 
    public function update($query){
      $update_row = $this->link->query($query) or die($this->link->error.__LINE__);

      // Validate Update
      if($update_row) {
        die('<script type="text/javascript">window.location.href="index.php?msg='.urlencode("Record Updated").'";</script>');
      } else {
        die('Error: ('.$this->link->errno .') '. $this->link->error);
      }
    }

    // Delete 
    public function delete($query){
      $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);

      // Validate Update
      if($delete_row) {
        die('<script type="text/javascript">window.location.href="index.php?msg='.urlencode("Record Deleted").'";</script>');
      } else {
        die('Error: ('.$this->link->errno .') '. $this->link->error);
      }
    }
  }
?>