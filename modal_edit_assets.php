	<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>Editing Assets wrong entries</strong></div>

	<form class="form-horizontal" method="post" enctype="multipart/form-data" action="updateassets3.php">
			      <input type="hidden" class="span2" id="inputEmail" name="id" value="<?php echo $row['id']; ?>" required>
		  

			
		
		<div class="control-group">
			<label class="control-label" for="inputEmail">Asset:</label>
			
        <div class="controls"> 
          <input type="text"  class="span2" id="fname" name="asset"   value="<?php echo $row['asset']; ?>">
        </div>
		</div>
				
		<div class="control-group">
			<label class="control-label" for="inputEmail">Value:</label>
			<div class="controls">
	            
          <input type="text"  class="span2" id="inputPassword" name="value"   value="<?php echo $row['value']; ?>">
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="inputEmail">Depreciation:</label>
			<div class="controls">
	            
          <input type="text"  class="span2" id="inputPassword" name="depreciation"   value="<?php echo $row['depreciation']; ?>">
			</div>
		</div>
		
			
		<div class="control-group">
			<label class="control-label" for="inputEmail">date:</label>
			<div class="controls">
	            <input type="text"  class="span2" id="inputPassword" name="date" value="<?php echo $row['date']; ?>" required>
			</div>
		</div>	
				

			<div class="control-group">
				<div class="controls">
				<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
				</div>
			</div>			
			
			
    </form>
		</div>
		
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Cancel</button>
		</div>
    </div>
	
