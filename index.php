<?php 
include("includes/config.php"); 
include_once("templates/header.php"); 
require_once 'fbconnect.php';
?>
	 <div class="content-wrapper">
        <div class="container">
            <div class="row">
                
				<?php 
				
				if(!$fbUser){
				?><div class="col-md-8">
                    <h4 class="page-head-line">Login with facebook </h4>

                </div>
				<?php  } ?>


            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success">
						<?php 
						if(!$fbUser){
							echo $output;     
						}
						?>
					   
						<?php 
						if(!$userData){
							echo $output1;     
						}
						?>
						<?php if($userData){ 
							$output = '<strong>Facebook Profile Details </strong>';
							$output .= '<img src="'.$userData['picture'].'">';
							$output .= '<br/><I>Facebook ID </I>: ' . $userData['oauth_uid'];
							$output .= '<br/><I>Name</I> : ' . $userData['first_name'].' '.$userData['last_name'];
							$output .= '<br/><I>Email</I> : ' . $userData['email'];
							$output .= '<br/><I>Gender</I> : ' . $userData['gender'];
							$output .= '<br/><I>Locale</I> : ' . $userData['locale'];
							$output .= '<br/><I>Logged in with </I>: Facebook';
							$output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Facebook Page</a>';
							$output .= '<br/>Logout from <a href="logout.php?mode=fb">Facebook</a>'; 
							echo $output;
							?>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
<?php include_once("templates/footer.php"); ?>