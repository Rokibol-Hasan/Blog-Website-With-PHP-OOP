<?php include "config.php"; ?>
<?php
//Mother Class Declaration
class Database
{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;
    public $link;

    public function __construct()
    {
        $this->connectDb();
    }
    //Database Connection 
    public function connectDb()
    {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if ($this->link->connect_error) {
            echo "Something Wrong" . $this->link->connect_errno;
        } else {
            return true;
        }
    }
    //Select Query Will Pass Here
    public function select($query)
    {
        $result = $this->link->query($query);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }
    //Insert Query Will Pass Here
    public function insert($query)
    {
        $insert_row = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($insert_row) {
            return $insert_row;
        } else {
            die("Error: (" . $this->link->errno . ")" . $this->link->error);
        }
    }
    //Update query will pass here
    public function update($query)
    {
        $updateRow = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($updateRow) {
            return $updateRow;
        } else {
            die("Error: (" . $this->link->errno . ")" . $this->link->error);
        }
    }
    //Delete query will pass here
    public function delete($query)
    {
        $delete = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($delete) {
           return $delete;
            exit();
        } else {
           return false;
        }
    }
}



?>