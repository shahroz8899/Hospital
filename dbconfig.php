<?php
class database
{
    public $con;

    public function config()
    {
        // $con = new mysqli("localhost","thefamil_clinic1","clinic_!@#$%^&*(000","thefamil_familyclinic_db");
        $con = new mysqli("localhost","root","","familyclinic");
        if (!$con) {
            return false;
            die("Failed to connect to server: " . mysqli_connect_error());
        }
        return $con;
    }

    public function get_data($query){
        $result = $this->config()->query($query );
        if($result->num_rows >0)
        {
            while($row = $result->fetch_assoc())
            {
                $data[] = $row;
            }
            return $data;
        }
        else
        {
            return "no record found";
        }
    }

    public function get_id_after_insertion($query)
    {
        $query_status = true;
        $con=mysqli_connect("localhost","root","","familyclinic");
        // $con=mysqli_connect("localhost","thefamil_clinic1","clinic_!@#$%^&*(000","thefamil_familyclinic_db");
        
        if (mysqli_connect_errno())
        {
            $query_status = false;
            return $query_status;
            die();
        }

        mysqli_query($con,$query);
        $inserted_id = mysqli_insert_id($con); 
        mysqli_close($con);
        
        return $inserted_id; 
    }
}

?>
