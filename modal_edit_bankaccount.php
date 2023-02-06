	<div id="edit<?php echo $accno; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>Editing Banks wrong entries</strong></div>

	<form class="form-horizontal" method="post" action="updatebankaccount1.php" enctype="multipart/form-data">
			      <input type="hidden" class="span2" id="inputEmail" name="id" value="<?php echo $med['Combination']; ?>" required>
		  

			
		
		<div class="control-group">
			<label class="control-label" for="inputEmail">Bank Name:</label>
			
        <div class="controls"> 
          <input type="text"  class="span2" id="fname" name="bank"   value="<?php echo $med['Level']; ?>">
        </div>
		</div>
				
		<div class="control-group">
			<label class="control-label" for="inputEmail">Account:</label>
			<div class="controls">
	            
          <input type="text"  class="span2" id="inputPassword" name="account"   value="<?php echo $med['Combination']; ?>">
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
	
