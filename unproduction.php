<!DOCTYPE html>
<?php 
	include 'dbcon.php';
	include("header.php");

?><title>SMAGRIS</title>	

	<div id="wrap">
	<div class="container">
		<div class="row">
			<div class="span3 hidden-phone"></div>
			<div class="span6" id="form-login">
				<form class="form-horizontal well" action="" method="post" name="upload_excel" enctype="multipart/form-data">
					<fieldset>
						<legend>Abashoye</legend>
							<div class="control-group">
			<label class="control-label" for="inputEmail">Select cooperative:</label>
			<div class="controls">
 <select name="coop" required>
<option></option>
 <?php

include("dbcon.php");
$adam=mysql_query("select * from membersv group by cooperative order by cooperative asc");
while($khan=mysql_fetch_array($adam))
{
$ideni=$khan['cooperative'];
echo"<option>$ideni</option>";

}

?>
</select>
			</div>
		</div>
							<div class="control-group">
			<label class="control-label" for="inputEmail">Select cooperative:</label>
			<div class="controls">
 <select name="season" required>
<option></option>
 <?php

include("dbcon.php");
$adam=mysql_query("select * from production group by season");
while($khan=mysql_fetch_array($adam))
{
$ideni=$khan['season'];
echo"<option>$ideni</option>";

}

?>
</select>
			</div>
		</div>

						
						<div class="control-group">
							<div class="controls">
							<button type="submit" id="submit" name="Import" 
							class="btn btn-warning button-loading" data-loading-text="Loading...">View</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			<div class="span3 hidden-phone"></div>
		</div>
		


	</div>

	</div>

	</body>
</html>
<script>  
 $(document).ready(function(){  
      $('#example').DataTable();  
 });  
 </script>  