<?php

  
 


notification ();


function notification(){

	$ishop =  mysqli_connect("localhost","user1","user1pass","ishopdb");

        $pull2 = "SELECT businessinv.*, business.businessID FROM businessinv LEFT OUTER JOIN business ON businessinv.businessID = business.businessID";
        $pull = "SELECT * FROM json";
	$recip = "SELECT business.email, business.businessID FROM business LEFT OUTER JOIN businessinv ON business.businessID = businessinv.businessID";
	$rsql = mysqli_query($ishop, $recip) or die (mysqli_error($ishop));
        $val = mysqli_query($ishop, $pull) or die (mysqli_error($ishop));
        $num = mysqli_num_rows($val);
	$val2 = mysqli_query($ishop, $pull2) or die (mysqli_error($ishop));
	$num1 = mysqli_num_rows($rsql);
	$num3 = mysqli_num_rows($val3);
	
	$femail=array();
	$IDs = array();
	$json = array();
	$recL = array();
	$sent2 = array();
	$busInv = array();        
	$matches = array();

	while ($r = mysqli_fetch_array($val, MYSQLI_ASSOC)){
                $pd     = $r['product_description'];
                $res    = $r['reason_for_recall'];
                $class  = $r['classification'];
		$rf     = $r['recalling_firm'];
               // $pc     = $r['postal_code'];
               // $zip    = $r['zipcode'];


                
		$json += [$pd=>$rf];
	}
	
	while ($s = mysqli_fetch_array($rsql, MYSQLI_ASSOC)){
		$businessID	= $s['businessID'];
		$email		= $s['email'];
		$recL += [$businessID=>$email];
	}

	while ($t = mysqli_fetch_array($val2,MYSQLI_ASSOC)){

		$pdn    = $t['product'];
		$br     = $t['brand'];
		$busInv += [$pdn=>$br];

		$id	= $t['businessID'];
		$IDs	+= [$id=>$br];
	}
	
	
	$counter = 0;	
	foreach($busInv as $key=>$value){
		foreach($json as $key2=>$value2){
//			echo "$key and $key2 are the  key pair".PHP_EOL;
			if ($key == $key2){
				//echo "THERES A MATCH".PHP_EOL;
				
				++$counter;
				$matches += [$value2=>$key2];
//				print "$counter: $value2, $key2 \n";

			}
			else{
				continue;
//				echo "No MATCH".PHP_EOL;
		
			}
		}
	}
	
	foreach($recL as $key3=>$value3){
		foreach($IDs as $key4=>$value4){
			foreach($matches as $key5=>$value5){
				if ($key3 == $key4){
					if ($value4==$value5){
						$sent2 += [$key3=>$value3];
						$femail = array_keys($sent2);
					}
					else{
						continue;
					}
                        	}
                        	else{
                                	continue;
				}
			}
                }
        }















//echo "$counter hello thihs is counter".PHP_EOL;
//		echo "HEY".PHP_EOL;
               // if($zip == $pc){
	//		$counter = 0;
			//if($pdn == $rf){
					//echo "$pdn here";
					//if($br == $rf){
					//	$counter++;
//						echo "or here";
                                        $output  = " ";
                                        $subject = "You have new recalls!";
                                        $headers = array('From: shaiddyperez@gmail.com' . "\r\n" );
					$headers = implode("\r\n", $headers);

                                       // $username = $_SESSION['username'];
                                       
                                        $output .= "\n\nGreetings,  Business,\n\n". "We have founds new recalls that need to be brought to your attention!\n\n";
                                        $cnt = 0;
					foreach($matches  as $key=>$value)
					{	
						$cnt++;
						$output .= "$cnt: $key, $value\n";
              				}
                                       // $email = $_SESSION['email'];
					echo "$output\n";
						$sender = implode(',',$femail);
						$email = "
						mail($sender, $subject, $output, $headers);
						echo "\n Mail Sent!".PHP_EOL;
					}
}

?>
