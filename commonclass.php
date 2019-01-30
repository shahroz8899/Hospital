<?php

class commonclass
{
	public function dateTime($old_date)
	{
		date_default_timezone_set("Asia/Karachi");

		$old_datetime = new DateTime($old_date);
	    $current_datetime =   new DateTime();
		$interval = $old_datetime->diff($current_datetime);

		$year = $interval->format("%y");
		$month = $interval->format("%m");
		$days = $interval->format("%d");
		$hour = $interval->format("%h");
		$min = $interval->format("%i");
		$sec = $interval->format("%s");

		
		if($year>0) // year
		{
			if($year<1)
			{
				return "a year ago";
			}
			else
			{
				return $year . " years ago";
			}
		}
		else
		{
			if($month>0) // months
			{
				if($month<1)
				{
					return "a month ago";
				}
				else
				{
					return $month . " months ago";
				}
			}	
			else
			{
				if($days>0) //days
				{
					if($days > 1)
					{
						return $days . " days ago";	
					}
					else
					{
						return "a day ago";
					}
				}
				else
				{
					if($hour > 0) // hour
					{
						if($hour < 1)
						{
							return "an hour ago";
						}
						else
						{
							return $hour . " hours ago";
						}
					}
					else // min
					{
						if($min > 0)
						{
							return $min . " mins ago";
						}
						else
						{
							return "a min ago";
						}
					}
				}
			}
		}
	}

	public function check_data($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	public function sendingmail($email, $sbj, $msg)
	{
		$to = 'info@familyclinic.com';
		$subject = $sbj;
		$message = $msg;

		$headers[] = 'MIME-Version: 1.0';
		$headers[] = 'Content-type: text/html; charset=iso-8859-1';
		$headers[] = 'X-Priority: 3';
		$headers[] = 'X-Mailer: PHP/'. phpversion();
		// Additional headers
		$headers[] = 'Reply-To: '.$to;
		$headers[] = 'From: TheFamilyClinic';
		$headers[] = 'Bcc: ' . $email;

		if(mail($to, $subject, $message, implode("\r\n", $headers)))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function check_subscriber($email)
	{
		include_once 'model/dbconfig.php';
		$db = new database();    

		$sql 	= "SELECT email FROM subscribe WHERE email = '$email'";
		$result = $db->config()->query($sql);
     	
		if($result->num_rows > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function check_admin_byName($admin_name)
	{
		include_once 'model/dbconfig.php';
		$db = new database();    

		$sql 	= "SELECT admin_name FROM admin WHERE admin_name = '$admin_name' ";
		$result = $db->config()->query($sql);
     	
		if($result->num_rows > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function check_admin_byEmail($admin_email)
	{
		include_once 'model/dbconfig.php';
		$db = new database();    

		$sql 	= "SELECT email FROM admin WHERE email = '$admin_email' ";
		$result = $db->config()->query($sql);
     	
		if($result->num_rows > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function check_treatmentTitle($price_title)
	{
		include_once 'model/dbconfig.php';
		$db = new database();    

		$sql 	= "SELECT title FROM treatmentprices WHERE title = '$price_title' ";
		$result = $db->config()->query($sql);
		
     	
		if($result->num_rows > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function check_treatmentTitleexcept($price_title, $price_id)
	{
		include_once 'model/dbconfig.php';
		$db = new database();    

		$sql 	= "SELECT title FROM treatmentprices WHERE title = '$price_title' AND id!='$price_id' ";
		$result = $db->config()->query($sql);
     	
		if($result->num_rows > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function check_productBrand($brand_name)
	{
		include_once 'model/dbconfig.php';
		$db = new database();    

		$sql 	= "SELECT brand_name FROM product_brand WHERE brand_name = '$brand_name' ";
		$result = $db->config()->query($sql);
     	
		if($result->num_rows > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function check_product($product_name)
	{
		include_once 'model/dbconfig.php';
		$db = new database();    

		$sql 	= "SELECT product_name FROM product_products WHERE product_name = '$product_name' ";
		$result = $db->config()->query($sql);
     	
		if($result->num_rows > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function check_productExcept($product_name, $product_id)
	{
		include_once 'model/dbconfig.php';
		$db = new database();    

		$sql 	= "SELECT product_name FROM product_products WHERE product_name = '$product_name' AND id!='$product_id' ";
		$result = $db->config()->query($sql);
     	
		if($result->num_rows > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public function admin_rights($privilege)
	{
	  switch ($privilege) {
	    case '1':
	        return "Admin Previleges";
	      break;      
	    case '2':
	        return "Sale Person";
	      break;   
	    default:
	      # code...
	      break;
	  }
	}
}
?>