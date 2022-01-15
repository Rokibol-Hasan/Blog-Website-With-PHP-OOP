<?php
class userHandler
{
    public $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    //This function will short a long post by 400 word 
    public function textshorten($text, $limit = 400)
    {
        $text = $text . " ";
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' '));
        $text = $text . "....";
        return $text;
    }
    
    //Security Confirmation 
    public function validation($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;

    }
 

    //Get all post
    function selectAllpost()
    {
        $query = "SELECT * FROM tbl_post";
        $getData = $this->db->select($query);
        return $getData;
    }
    //Get all category
    function selectAllcat()
    {
        $query = "SELECT * FROM tbl_cat";
        $getData = $this->db->select($query);
        return $getData;
    }
    //Add New Post
    function insertPost()
    {
        if (isset($_FILES['image'])) {
            $errors = array();
            $fileName = $_FILES['image']['name'];
            $fileSize = $_FILES['image']['size'];
            $fileTmp = $_FILES['image']['tmp_name'];
            $fileType = $_FILES['image']['type'];
            $explode = explode('.', $fileName);
            $fileExt = end($explode);
            $extension = array("jpeg", "jpg", "png");

            if (in_array($fileExt, $extension) === false) {
                $errors[] = "This extension file is not allowed ( only jpeg,jpg or png)";
            }
            if ($fileSize > 2097152) {
                $errors[] = "File size is too high(must be 2mb or lower)";
            }
            if (empty($errors) == true) {
                move_uploaded_file($fileTmp, "upload/" . $fileName);
            } else {
                print_r($errors);
                die();
            }
        }
        if (isset($_POST['submit'])) {
            $title = mysqli_real_escape_string($this->db->link, $_POST['title']);
            $date = mysqli_real_escape_string($this->db->link, $_POST['date']);
            $catName = mysqli_real_escape_string($this->db->link, $_POST['cat_name']);
            $postbody = mysqli_real_escape_string($this->db->link, $_POST['body']);
            if ($title == '' || $date == '' || $fileName == '' || $postbody == '') {
                echo "Field Must Not be empty";
            } else {
                $query = "INSERT INTO tbl_post (title,date,cat_name,image,body) VALUES ('$title','$date','$catName','$fileName','$postbody')";
                $insertPost = $this->db->insert($query);
                if ($insertPost) {
                    header("Location:allpost.php");
                } else {
                    return false;
                }
            }
        }
    }
    //Select Post By Id
    function selectPost($id)
    {
        $query = "SELECT * FROM tbl_post WHERE id = $id";
        $getData = $this->db->select($query);
        if ($getData) {
            $data = mysqli_fetch_assoc($getData);
            return $data;
        } else {
            return false;
        }
    }
    //Update Post 
    function updatePost($id, $title, $date, $catName, $fileName, $body)
    {
        if (isset($_FILES['image'])) {
            $errors = array();
            $fileName = $_FILES['image']['name'];
            $fileSize = $_FILES['image']['size'];
            $fileTmp = $_FILES['image']['tmp_name'];
            $fileType = $_FILES['image']['type'];
            $explode = explode('.', $fileName);
            $fileExt = end($explode);
            $extension = array("jpeg", "jpg", "png");

            if (in_array($fileExt, $extension) === false) {
                $errors[] = "This extension file is not allowed ( only jpeg,jpg or png)";
            }
            if ($fileSize > 2097152) {
                $errors[] = "File size is too high(must be 2mb or lower)";
            }
            if (empty($errors) == true) {
                move_uploaded_file($fileTmp, "upload/" . $fileName);
            } else {
                print_r($errors);
                die();
            }
        }
        $title = mysqli_real_escape_string($this->db->link, $_POST['title']);
        $date = mysqli_real_escape_string($this->db->link, $_POST['date']);
        $catName = mysqli_real_escape_string($this->db->link, $_POST['cat_name']);
        $body = mysqli_real_escape_string($this->db->link, $_POST['body']);

        if ($title == '' || $date == '' || $body == '') {
            echo "Field Must Not be empty";
        } else {
            // var_dump($body);
            $query = "
        UPDATE tbl_post
        SET
        title = '$title',
        date = '$date',
        cat_name = '$catName',
        image = '$fileName',
        body = '$body'
        WHERE id = '$id'";

            $update = $this->db->update($query);
            if ($update) {
                header("Location:allpost.php");
            }

        }
    }
    //Add New Category
    function insertCat()
    {
        if (isset($_POST['submit'])) {
            $catName = mysqli_real_escape_string($this->db->link, $_POST['cat_name']);
            if ($catName == '') {
                echo "Field Must Not be empty";
            } else {
                $query = "INSERT INTO tbl_cat(cat_name) VALUE ('$catName')";
                $insertCat = $this->db->insert($query);
                if ($insertCat) {
                    header("Location:allcat.php");
                } else {
                    return false;
                }
            }
        }
    }
    //Select Category By Id
    function selectCat($id)
    {
        $query = "SELECT * FROM tbl_cat WHERE id = $id";
        $getData = $this->db->select($query)->fetch_assoc();
        return $getData;
    }

    //select post by cat

function selectPostByCat($catName){
        $query = "SELECT * FROM tbl_post WHERE cat_name = '$catName'";
        $getData = $this->db->select($query);
        return $getData;
    }

    //Update A Category with read and right by (selection by id) and Update query
    function updateCat($id, $catName)
    {
        if (isset($_POST['update'])) {
            $catName = mysqli_real_escape_string($this->db->link, $_POST['cat_name']);
            if ($catName == '') {
                echo "Field Must Not be empty";
            } else {
                $query = "
        UPDATE tbl_cat
        SET
        cat_name = '$catName'
        WHERE id = $id
        ";
                $update = $this->db->update($query);
                if ($update) {
                    header("Location: allcat.php?");
                } else {
                    echo "<script> alert('Failed') </script>";
                }
                return $update;
            }
        }
    }
    // Delete A Category
    function deleteCat($getId)
    {
        $query = "DELETE FROM tbl_cat WHERE id = $getId";
        $delete = $this->db->delete($query);
        if ($delete) {
            echo "<script> alert('Success') </script>";
            header("Location: allcat.php ");
        } else {
            echo "<script> alert('Failed') </script>";
        }
    }
    // Delete A Post
    function deletePost($getId)
    {
        $query = "DELETE FROM tbl_post WHERE id = $getId";
        $deletePost = $this->db->delete($query);
        if ($deletePost) {
            header("location:allpost.php");
        } else {
            echo "<script> alert('Failed') </script>";
        }
    }
    // Select All User
    function selectAlluser()
    {
        $query = "SELECT * FROM tbl_user";
        $getData = $this->db->select($query);
        if (!$getData) {
            echo "Query Failed";
        } else {
            return $getData;
        }
    }
    //Add new user
    function addNewUser()
    {
        if (isset($_POST['submit'])) {
            $username = mysqli_real_escape_string($this->db->link, $_POST['username']);
            $email = mysqli_real_escape_string($this->db->link, $_POST['email']);
            $role = mysqli_real_escape_string($this->db->link, $_POST['role']);
            $password = md5($_POST['password']);
            if ($username == '' || $email == '' || $role == '' || $password == '') {
                echo "Field Must Not be empty";
            } else {
                $query = "INSERT INTO tbl_user (username,email,role,password) VALUES ('$username','$email','$role','$password')";
                $addNewUser = $this->db->insert($query);
                if ($addNewUser) {
                    header("Location:allusers.php");
                } else {
                    return false;
                }
            }
        }
    }

    // Login check by pull and match username and password

    public function setSession(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $this->validation($_POST['username']);
            $password = $this->validation(md5($_POST['password']));
            $username = mysqli_real_escape_string($this->db->link, $username);
            $password = mysqli_real_escape_string($this->db->link, $password);

            $query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$password'";
            $result = $this->db->select($query);
            if ($result != false) {
                $value = mysqli_fetch_array($result);
                $row = mysqli_num_rows($result);
                if ($row > 0) {
                    Session::set("login", true);
                    Session::set("username", $value['username']);
                    Session::set("userId", $value['id']);
                    header("Location:index.php");
                } else {
                    echo "No user found";
                }
            } else {
                echo "User Name Or Password Not Matched";
            }
        }
    }
    
}
