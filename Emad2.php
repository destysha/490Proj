<?php

// $email =  "emadtirmizi@gmail.com";
//$username  = "Emad";


notification ();


function notification(){

 $ishop =  mysqli_connect("localhost","root","","ishopdb");
        $pull2 = "SELECT businessinv.*, business.businessID FROM businessinv LEFT OUTER JOIN business ON businessinv.businessID = business.businessID";
        $pull = "SELECT * FROM json";
       //$pull3 = "SELECT business.* FROM business LEFT OUTER JOIN businessinv ON business.businessID = businessinv.businessID";
        $val = mysqli_query($ishop, $pull) or die (mysqli_error($ishop));
       //$num = mysqli_num_rows($val);
	$val2 = mysqli_query($ishop, $pull2) or die (mysqli_error($ishop));
       //$num1 = mysqli_num_rows($val2);

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
		$temppass = "";
		$output = " ";
		foreach($busInv as $key2=>$value2){
			echo "$key and $key2 are the  key pair".PHP_EOL;
			if ($key == $key2){
				echo "check1".PHP_EOL;
				$counter++;
				
				//$temppass .= "Product: ".$key;
				//$temppass .= "Of Brand: ".$value;
				//$passthrough = $temppass;

				//GET THE BUSINESS ID WHERE THE PRODUCTS MATCH WITH JSON
				echo "check2".PHP_EOL;

				//$ret = 'SELECT businessID FROM businessinv WHERE product = "$key" and brand = "$value"';
				echo "check3".PHP_EOL;

				 $ret='SELECT business.*, businessinv.businessID FROM business LEFT OUTER JOIN businessinv ON business.businessID = businessinv.businessID WHERE businessinv.product ="$key" and businessinv.brand = "$value"';

				$rey = mysqli_query($ishop, $ret) or die (mysqli_error($ishop));
				echo "check4".PHP_EOL;
	
				while($y = mysqli_fetch_array($rey,MYSQLI_NUM)){
				
                                        $businessID	= $y['businessID'];
				
				


				//GET THE EMAIL AND USERNAME OF THE BUSINESSES WHERE THE PRODUCTS MATCHED FROM BUSINESSID
					$rex = "SELECT bzname, email FROM business WHERE businessID = $businessID";
					echo "check check check".PHP_EOL;
					$rez = mysqli_query($ishop, $rex) or die (mysqli_error($ishop));
					echo "checking".PHP_EOL;	
					while($z = mysqli_fetch_array($rez,MYSQLI_ASSOC)){

						$bzname		= $z['bzname'];
						$email		= $z['email'];
					
                                        	$subject = 'You have new recalls!';
                                        	$headers = 'From: emadtirmizi@gmail.com' . "\r\n" .
                                                'Reply-To: ishopforbusiness@gmail.com' . "\r\n" .
                                                'X-Mailer: PHP/' . phpversion();

                                       // $username = $_SESSION['username'];

                                        	$output .= "Greetings, ".$bzname. ". We have founds new recalls that need to be brought to your attention!";
				                echo " $email and $output: ".PHP_EOL;
						if( mail($email, $subject, $output, $headers)){
							echo "message accepted".PHP_EOL;
							return $email; $output;

                                        	}
                                        	else{
                                                	echo "error: Message Not Accepted Emad".PHP_EOL;
				
						}
					}
				}
					
				echo "THERES A MATCH".PHP_EOL;
				}
			
			else{
				echo "No MATCH".PHP_EOL;
			}
		}
	}


		echo "There were: $counter matches".PHP_EOL;
		echo "HEY".PHP_EOL;
              /* // if($zip == $pc){
                        if($pdn == $pd){
					echo "$pdn here";
                                if($br == $rf){
						echo "or here";
                                        $output  = " ";
                                        $subject = 'You have new recalls!';
                                        $headers = 'From: emadtirmizi@gmail.com' . "\r\n" .
                                                'Reply-To: ishopforbusiness@gmail.com' . "\r\n" .
                                                'X-Mailer: PHP/' . phpversion();

                                       // $username = $_SESSION['username'];
                                       
					$output .= "Greetings, ". $username. ". We have founds new recalls that need to be brought to your attention!";
                                        //$output .= '$class';
                                        //$output .= '$pd';
                                        //$output .= '$rf';
                                        //$output .= '$pc';
                                        //$output .= '$res';
              
                                       // $email = $_SESSION['email'];
					if( mail($email, $subject, $output, $headers)){
						echo "message accepted".PHP_EOL;	
					}
					else{
						echo "error: Message Not Accepted Emad".PHP_EOL;
					}

					echo " $email and $output: ".PHP_EOL;
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
	 */
}
?>
