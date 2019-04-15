<?php
	notification ();


	function notification()
	{

		$ishop =  mysqli_connect("localhost","user1","user1pass","ishopdb");

		$business      = "SELECT businessinv.*, business.businessID 
				  FROM businessinv 
                                  LEFT OUTER JOIN business 
				  ON businessinv.businessID = business.businessID";
		$json 	       = "SELECT * FROM json";
		$r_json        = mysqli_query($ishop, $json) or die (mysqli_error($ishop));
		$num_rows_json = mysqli_num_rows($r_json);
		$r_business    = mysqli_query($ishop, $business) or die (mysqli_error($ishop));
		$num_rows_bus  = mysqli_num_rows($r_business);
		
		//empty arrays//
		$json 	 = array();
		$busInv  = array();        
		$matches = array();
		
		//getting info from json//
		while ($j = mysqli_fetch_array($r_json, MYSQLI_ASSOC))
		{
		        $pd     = $j['product_description'];
			$rf     = $j['recalling_firm'];
		        $res    = $j['reason_for_recall'];
		        $class  = $j['classification'];

			//storing  data in  json array
			$json += [$pd=>$rf];
		}

		//getting info from business//
		while ($b = mysqli_fetch_array($r_business,MYSQLI_ASSOC))
		{

			$pdn    = $b['product'];
			$br     = $b['brand'];

			//storing in busInv array
			$busInv += [$pdn=>$br];
		}
		
		
		$counter = 0;	
		foreach($busInv as $key=>$value)
		{
			foreach($json as $key2=>$value2)
			{
				//echo "$key and $key2 are the  key pair".PHP_EOL;
				if ($key == $key2)
				{
					//echo "THERES A MATCH".PHP_EOL;
					++$counter;
					$matches += [$value2=>$key2];
					//uncommented print below to see matches in terminal when running file manually
					//print "$counter: $value2, $key2 \n";
				}
				else
				{
					continue;
					//echo "No MATCH".PHP_EOL;
				}
			}
		}

	foreach($matches as $key=>$value)
	{
		//get ID from matches
		$get = "SELECT businessID FROM businessinv WHERE $product = $key"
		$getid = mysqli_query($ishop, $get) or die (mysqli_error($ishop));
		//put id in array
		while ($i = mysqli_fetch_array($getid, MYSQLI_ASSOC))
                {
			$id     = $i['businessID'];
			$IDs	+= [$id=>$key];


		}
		//use id array to get emails
		$gemail = "SELECT email FROM business WHERE $businessID = $id"
		$getemail = mysqli_query($ishop, $gemail) or die (mysqli_error($ishop));
		while ($e = mysqli_fetch_array($getemail, MYSQLI_ASSOC))
		{
			$email	=	$e['email'];
			$emails	+=	$email;
		}
	}
	foreach($email as $emails)
	{

		$output  = " ";
                $subject = "You have new recalls!";
                $headers = array('From: emadtirmizi@gmail.com' . "\r\n" );
                $headers = implode("\r\n", $headers);

                $output .= "\n\nGreetings,\n\n". "We have founds new recalls that need to be brought to your attention!\n\n";

                $cnt = 0;
                foreach($IDs as $id=>$value1)
		{
			foreach($matches as $key=>$value2)
			{
				if($value1==$key)
				{
					
					$cnt++;
					$output .= "$cnt: $key, $value2\n";
				}
				else
				{
                                        continue;
                                        //echo "Nothing to see here".PHP_EOL;
                                }

			}
		}

                echo "$output\n";

                mail($email, $subject, $output, $headers);

                echo "\nMail Sent!".PHP_EOL;
	}
/*
		$output  = " ";
		$subject = "You have new recalls!";
		$headers = array('From: shaiddyperez@gmail.com' . "\r\n" );
		$headers = implode("\r\n", $headers);
	       
		$output .= "\n\nGreetings,\n\n". "We have founds new recalls that need to be brought to your attention!\n\n";
		
		$cnt = 0;
		foreach($matches as $key=>$value)
		{	
			$cnt++;
			$output .= "$cnt: $key, $value\n";
		}

		echo "$output\n";

		mail($email, $subject, $output, $headers);

		echo "\nMail Sent!".PHP_EOL;
 */
	}
?>
