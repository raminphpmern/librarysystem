<?php
include("includes/config.php");

if (isset($_REQUEST['btn-books']) !="")
{
	$desc = addslashes($_POST['desc']);

	$pagedesc = htmlspecialchars($desc);
	$txttitle = $_REQUEST["txttitle"];
	$txtisbn = $_REQUEST["txtisbn"];
	$txtauthor = $_REQUEST["txtauthor"];
	$txtdesc = $_REQUEST["txtdesc"];
	if($_SESSION["userData"]["id"]!="") {
		$addedby = $_SESSION["userData"]["id"];
	} else {
		$addedby = 1;
	}
	$arr=array('added_by'=>$addedby,'isbn_number'=>$txtisbn,'title'=>$txttitle,'author'=>$txtauthor,'description'=>$txtdesc);
	$table='tbl_books';
	
	$insquery = "insert into tbl_books(added_by,isbn_number,title,author,description) values(".trim($addedby).",".trim($txtisbn).",'".$txttitle."','".$txtauthor."','".$txtdesc."')";
	
	$result = $db->resourcequery($insquery);

	if(isset($result)) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	header("Location: add-books.php?mode=success");
}
?>