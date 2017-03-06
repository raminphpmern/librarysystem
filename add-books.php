<?php 
include("includes/config.php");
include_once("templates/header.php"); ?>

	<script src="js/jquery-1.3.2.js"></script>
	<script src="js/jquery.validate.js"></script>
	<script src="js/addbooks.js"></script>
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
                        <h1 class="page-head-line">Add Books </h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                        <div class="panel-body">
						<form method="post" action="action-add-books.php" name="frmbooks" id="frmbooks">
						  <div class="form-group">
							<label for="inputtitle">Book Title</label>
							<input type="text" name="txttitle" class="form-control" id="inputtitle" placeholder="Enter Book Title" />
						  </div>
						  <div class="form-group">
							<label for="exampleInputEmail1">ISBN No</label>
							<input type="text" name="txtisbn" class="form-control" id="exampleInputEmail1" placeholder="Enter ISBN No" />
						  </div>
						  <div class="form-group">
							<label for="inputauthor">Author Name</label>
							<input type="text" name="txtauthor" class="form-control" id="inputauthor" placeholder="Enter Author Name" />
						  </div>
						  <div class="form-group">
							<label for="inputauthor">Description</label>
							<textarea class="form-control" name="txtdesc" rows="3" placeholder="Text Area"></textarea>
						  </div>
						  <button type="submit" name="btn-books" class="btn btn-default">Submit</button>
                        </form>
                        </div>
					</div>
				</div>
			</div>
		</div>
<?php include_once("templates/footer.php"); ?>		