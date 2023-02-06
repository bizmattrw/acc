	<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>Editing Users wrong entries</strong></div>

	<form class="form-horizontal" method="post" enctype="multipart/form-data" action="updateusers3.php">
			      <input type="hidden" class="span2" id="inputEmail" name="id" value="<?php echo $row['id']; ?>" required>
		  

			
		
		<div class="control-group">
			<label class="control-label" for="inputEmail">Names:</label>
			
        <div class="controls"> 
          <input type="text"  class="span2" id="fname" name="names"   value="<?php echo $row['names']; ?>">
        </div>
		</div>
				
		<div class="control-group">
			<label class="control-label" for="inputEmail">Username:</label>
			<div class="controls">
	            
          <input type="text"  class="span2" id="inputPassword" name="username"   value="<?php echo $row['username']; ?>">
			</div>
		</div>
		
		<div class="control-group">
			<label class="control-label" for="inputEmail">Password:</label>
			<div class="controls">
	            
          <input type="password"  class="span2" id="inputPassword" name="password"   value="<?php echo $row['password']; ?>">
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
	
