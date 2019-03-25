<?php

function addInv($businessID, $grp_id, $qty){
	global $db;
	
	$sql = "insert into businessInv values('$qty','$businessID', '$grp_id');
	

	/*$t= mysqli_query($db, $s) or die (mysqli_error($db);	

	while($r = mysqli_feth_array ($t. MYSQLI_ASSOC)){
	

	}
	*/
}

function updateInv($businessID, $grp_id, $qty){
	global $db;
	$sql = update businessInv set qty=$qty where businessessID=$businessID and grp_id=$grp_id;
}

function deleteRow($businessID, $grp_id){

	global $db;
	$sql = DELETE FROM inventory WHERE businessID=$businessID and grp_id=$grp_id;

} 

function notification($email $product){
	global $db;
	$pull2 = "SELECT * FROM inventory";
	$pull = "SELECT * FROM json";
	$val = mysqli_query($ishopdb, $pull, $pull2) or die (mysqli_error($ishopdb));
	$num = mysqli_num_row($val);
	while ($r = mysqli_feth_array($val, MYSQLI_ASSOC)){
		$pd	= $r['product_description'];
		$pdn	= $r['product'];
		
		$pc	= $r['postal_code'];
		$zip	= $r['zipcode'];
		
		$rf	= $r['recalling_firm'];
		$br	= $r['brand'];

		if($zip == $pc){
			if($pdn == $pd){
				if($br == $rf){
					return 1;
				}
			}
			
			else{
				return 0;
			}
		}
		else{
			return 0;
		}
	}
}

?>
