<?php


notification ($email, $username);


function notification($email, $username){

 $ishop =  mysqli_connect("localhost","root","","ishopdb");
   
  

        $pull2 = "SELECT businessinv.*, business.businessID FROM businessinv LEFT OUTER JOIN business ON businessinv.businessID = business.businessID";
        $pull = "SELECT * FROM json";
        $pull3 = "SELECT business.* FROM business LEFT OUTER JOIN businessinv ON business.businessID = businessinv.businessID";
        $val = mysqli_query($ishop, $pull) or die (mysqli_error($ishop));
        $num = mysqli_num_rows($val);
	$val2 = mysqli_query($ishop, $pull2) or die (mysqli_error($ishop));
	$num1 = mysqli_num_rows($val2);
	
	
	$busInv = array();
	$bus = array();
	
	$counter = 0;
	while ($r = mysqli_fetch_array($val, MYSQLI_ASSOC)){
                $pd     = $r['product_description'];
               // $pc     = $r['postal_code'];
               // $zip    = $r['zipcode'];
                $rf     = $r['recalling_firm'];
		$busInv += [$pd=>$rf];
                $res    = $r['reason_for_recall'];
                $class  = $r['classification'];
	}
	while ($t = mysqli_fetch_array($val2,MYSQLI_ASSOC)){
		$pdn    = $t['product'];
		$br     = $t['brand'];
		$bus += [$pdn => $br];
	}
	foreach($bus as $key=>$value){
		foreach($busInv as $key2=>$value2){
			echo "$key and $key2 are the  key pair".PHP_EOL;
			if ($key == $key2){
				$counter++;
				echo "THERES A MATCH".PHP_EOL;
			}
			else{
				echo "No MATCH".PHP_EOL;
		
			}
		}
	}
		echo "$counter".PHP_EOL;
		echo "HEY".PHP_EOL;
               // if($zip == $pc){
                        if($pdn == $pd){
					echo "$pdn here";
                                if($br == $rf){
						echo "or here";
                                        $output  = " ";
                                        $subject = 'You have new recalls!';
                                        $headers = 'From: emadtirmizi@gmail.com' . "\r\n" .
                                                'Reply-To: ishopforbusiness@gmail.com' . "\r\n" .
                                                'X-Mailer: PHP/' . phpversion();               
                                        $output .= "Greetings, ". $username. ". We have founds new recalls that need to be brought to your attention!";
                                        mail($email, $subject, $output, $headers);
					echo " $email and $output".PHP_EOL;
                                        return 1;
                                }
                                else{
                                        return 0;
                                }
                        }
                        else{
                                return 0;
                        }
               // }
               // else{
                  //      return 0;
                //}
}

?>
