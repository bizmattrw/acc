	<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>Editing Budget wrong entries</strong></div>

			<form class="form-horizontal" method="post" enctype="multipart/form-data" action="updatebudget3.php">
				<input type="hidden" class="span2" id="inputEmail" name="id" value="<?php echo $row['id']; ?>" required>

				<div class="control-group">
					<label class="control-label" for="inputEmail">Account:</label>

					<div class="controls">
						<input type="text" class="span3" id="fname" name="account" value="<?php echo $row['codename']; ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputEmail">Code:</label>

					<div class="controls">
						<input type="text" class="span3" id="fname" name="code" value="<?php echo $row['budgetcode']; ?>">
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="inputEmail">Amount:</label>
					<div class="controls">

						<input type="text" class="span2" id="inputPassword" name="amount" value="<?php echo $row['amount']; ?>">
					</div>
				</div>




				<div class="control-group">
					<label class="control-label" for="inputEmail">Year:</label>
					<div class="controls">
						<input type="text" class="span2" id="inputPassword" name="year" value="<?php echo $row['year']; ?>" required>
					</div>
				</div>


				<div class="control-group">
					<div class="controls">
						<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Save</button>
					</div>
				</div>


			</form>
		</div>

		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Cancel</button>
		</div>
	</div>