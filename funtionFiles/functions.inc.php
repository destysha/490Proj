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


?>
