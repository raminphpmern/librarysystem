<?php 
include("includes/config.php");
include_once("templates/header.php"); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script>
                        $(document).ready(function () {
                            $("#demo1 .stars").click(function () {
                           
                                $.post('rating-books.php',{rate:$(this).val()},function(d){
									
									d = $("#exstvote").val();
									
									if(d>0)
                                    {
										alert('You already rated');
                                    }else{
                                        alert('Thanks For Rating');
                                    }
                                });
                                $(this).attr("checked");
                            });
                        });
                    </script>
<?php
$ipaddress = md5($_SERVER['REMOTE_ADDR']); // here I am taking IP as UniqueID but you can have user_id from Database or SESSION
$bookid = $_REQUEST["id"];
if (isset($_POST['rate']) && !empty($_POST['rate'])) {
 
    //$rate = $conn->real_escape_string($_POST['rate']);
    $rate = $_POST['rate'];
	$ratedby = $_SESSION["userData"]["id"];
	// check if user has already rated
    $sql = "SELECT `id` FROM `tbl_rating` WHERE `ip_address`='" . $ipaddress . "' AND user_id=".$ratedby." AND book_id=".$bookid."";
    $result = $db->resourcequery($sql);
    $row = $db->getrec($result);

	//die;
    if ($db->rsCount($result) > 0) {

        echo "1";
		
	} else {
 
        $sql = "INSERT INTO `tbl_rating` ( `rate`, `user_id`,`book_id`, `ip_address`) VALUES ('" . $rate . "',". $ratedby .",".$bookid." '" . $ipaddress . "'); ";
        if ( $db->resourcequery($sql)) {
            echo "0";
        }
    }
}

?>	
	<link href="assets/css/rating.css" rel="stylesheet" />
    <div class="content-wrapper">
        <div class="container">
			  <div class="row">
                    <div class="col-md-12">
                        <h1 class="page-head-line">Rate Books </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
							<div class="panel-body">
								Select your rating below
								<div class="form-group">
								<fieldset id='demo1' class="rating">
									<input class="stars" type="radio" id="star5" name="rating" value="5" />
									<label class = "full" for="star5" title="Awesome - 5 stars"></label>
									<input class="stars" type="radio" id="star4" name="rating" value="4" />
									<label class = "full" for="star4" title="Pretty good - 4 stars"></label>
									<input class="stars" type="radio" id="star3" name="rating" value="3" />
									<label class = "full" for="star3" title="Meh - 3 stars"></label>
									<input class="stars" type="radio" id="star2" name="rating" value="2" />
									<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
									<input class="stars" type="radio" id="star1" name="rating" value="1" />
									<label class = "full" for="star1" title="Sucks big time - 1 star"></label>
								</fieldset>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php include_once("templates/footer.php"); ?>		