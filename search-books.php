<?php 
include_once("includes/config.php");
include_once("templates/header.php"); 
?>
   <div class="content-wrapper">
	<div class="container">
		  <div class="row">
			<?php if(isset($_REQUEST["mode"])=="success") { ?>
			<div class="col-md-12">
				<h4>Record Added Successfully</h4>
			</div>
			<?php } ?>
		 </div>	
		  <div class="row">
				<div class="col-md-12">
					<h1 class="page-head-line">Search Books </h1>
				</div>
				
			</div>
			<div class="row">
					<div class="col-md-8">
						<div class="panel panel-default">
							<div class="panel-body">
							<form method="post" name="frmsrchbooks" id="frmsrchbooks">
							  <div class="form-group">
								<label for="inputtitle">Search Title</label>
								<input type="text" name="txtsrchtitle" class="form-control" id="inputsrchtitle" value="<?php echo $_REQUEST["txtsrchtitle"]; ?>" placeholder="Search Book Title" />
							  </div>
							  <div class="form-group">
								<label for="exampleInputEmail1">Search ISBN No</label>
								<input type="text" name="txtsrchisbn" class="form-control" id="inputsrchisbn"  value="<?php echo $_REQUEST["txtsrchisbn"]; ?>" placeholder="Search ISBN No" />
							  </div>
							  <button type="submit" name="btn-srchbooks" class="btn btn-default">Submit</button>
							</form>
							</div>
						</div>
					</div>
					<div class="col-md-4">
						<div id="show" align="right" style="float:right;padding:0px 10px 0px 0px;"><a href="search-books.php"><span class="iconshow"></span>Show All</a></div>
					</div>
			</div>
			<div class="row">
				<div class="col-md-8">
				<table>
				<tr>
					<td align="center">
						<table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" class="cust_viewtable">
						<tr bgcolor="#999999" height="25" >
						  <th width="10%" height="25" align="left" valign="middle">S.I No</th>
						  <th width="20%" height="25" align="left" valign="middle"><strong>Book Title</strong></th>
						  <th width="20%" height="25" align="left" valign="middle"><strong>Book ISBN No</strong></th>
						  <th width="20%" height="25" align="left" valign="middle"><strong>Author Name</strong></th>
						  <th width="20%" height="25" align="left" valign="middle"><strong>Descritpion</strong></th>
						  <th width="10%" height="25" align="center" valign="middle"><strong>Action</strong></th>
		                </tr>
						 <?php
						$where = " 1=1 ";
						if(isset($_REQUEST["btn-srchbooks"])!="") {
							if($_REQUEST["txtsrchtitle"]!="") {
								$where .= "and title like '%".$_REQUEST["txtsrchtitle"]."%'";
								//$where .=" and ";
								$querystring="&title".$_REQUEST["txtsrchtitle"];
							}
							
							if($_REQUEST["txtsrchisbn"]!="") {
								$where .= " and isbn_no=".$_REQUEST["txtsrchisbn"]."";
								$querystring.="&sel_status=".$_REQUEST["txtsrchisbn"];
							}
						} else {
							$where ="1=1";
							$querystring="";
						}
						$querystring.="&btn-srchbooks=".$_REQUEST['btn-srchbooks'];
						$query="select * from tbl_books where ".$where." order by book_id desc";
						$result=$db->resourcequery($query);
						$total_pages = $db->rsCount($result);
						//$targetpage = "creditpoint_subcr.php?".$querystring."&menu_id=".$_REQUEST["menu_id"]."&submenu_id=".$_REQUEST["submenu_id"]."";
						$targetpage = "search-books.php?".$querystring;
						$limit = 3;
						$adjacents = 3;
						
						if($_GET['page'] != "")
						{
						$page = $_GET['page'];
						$start = ($_GET['page'] - 1) * $limit; 
						$page_li=$page*$limit;
						}
						else
						{
						$start = 0;
						$page = 0;
						$page_li=1*$limit;
						}
						$k=$limit;
						
						if($_GET['page'] == "")
						$_GET['page'] = 1;
						
						$max = trim($_GET['page']) > 0 ? trim($_GET['page']) * $limit : 1;
						if($max > $total_pages)
						$max = $total_pages;
						$query="select * from tbl_books where ".$where." order by book_id desc LIMIT $start, $limit";
						 $result=$db->query($query);
						 require_once("includes/pagenation.php");
						 $i=1;
						if($result!='0') {
							while($row=$db->getrec('array'))
							{	
						  $bgcolorclass =($i % 2 == 0)? "listingscolor":"listingsaltercolor";
						  //$bgcolor=($row['package_id']==$plan_id)?' bgcolor="#E8E3D2"':' bgcolor="#FFFFFF"';
						 ?>
						<tr class="<?php echo $bgcolorclass;?>">

						  <td height="25" align="left" valign="middle"><?php echo $page_li-$k+1;?></td>
						  <td height="25" align="left" valign="middle"><?php echo $row['title'];?></td>
						  <td height="25" align="left" valign="middle"><?php echo $row['isbn_number'];?></td>
						  <td height="25" align="left" valign="middle"><?php echo $row['author'];?></td>
						  <td height="25" align="left" valign="middle"><?php echo $row['description'];?></td>
						  <td height="25" align="center">
							<a href="rating-books.php?id=<?php echo $row["book_id"];?>"><span class="iconrate"></span></a>&nbsp; 
							</td>
						</tr>
						<?php 
						$k--;
						$i++;
						} 
						?>
						<tr bgcolor="#ffffff">
						<td colspan="6" height="30" align="center"><?php    
						echo $pagination; ?></td>
						</tr>
						<?php } else { ?>
						<tr class="listingscolor">
						<td colspan="6"  height="30" align="center" class="errorrecords"><strong><?php echo "No Record(s) Found"; ?></strong></td>
						</tr>
						<?php } ?>
						</table>
				</div>
			</div>
		</div>
	</div>
    <!-- CONTENT-WRAPPER SECTION END-->
<?php include_once("templates/footer.php"); ?>	
