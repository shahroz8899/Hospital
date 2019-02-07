<?php
class Session
{
    private $logged_in=false;
    public $email_id;

    function __construct()
    {
    }

    public function is_logged_in() {
        return $this->logged_in;
    }

    public function login($email) {
        if($email){
            $this->email_id = $_SESSION['email'] = $email;
            $this->logged_in = true;
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        $_SESSION['admin_clinic']='';
        $this->email_id='';
        $this->logged_in = false;
        header("Location: login.php");
    }

    public function check_login()
    {
        session_start();
        if(isset($_SESSION['admin_clinic']))
        {
            $this->email_id= $_SESSION['email'];
            $this->logged_in = true;
            return true;
        } else {
            unset($this->email_id);
            $this->logged_in = false;
            return false;
        }
    }

}

$session = new Session();
?>