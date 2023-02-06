	<div id="edit<?php echo $id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info"><strong>BUDGET REVISION</strong></div>

	<form class="form-horizontal" method="post" enctype="multipart/form-data" action="updateapprov.php" onsubmit="return checkNumbers(this);">
			      <input type="hidden" class="span2" id="inputEmail" name="id" value="<?php echo $row['id']; ?>" required>
		  

			
		
		<div class="control-group">
			<label class="control-label" for="inputEmail">Budget Line:</label>
			
        <div class="controls"> 
          <input type="text"  class="span3" id="bline1" name="account"   value="<?php echo $row['codename']; ?>" readonly>
        </div>
		</div>
				

					
		<div class="control-group">
			<label class="control-label" for="inputEmail">Current Amount :</label>
			<div class="controls">
	            <input type="text"  class="span2" id="inputBudget1" name="amount" value="<?php echo $row['amount']; ?>" required readonly>
			</div>
		</div>	

		<div class="control-group">
			<label class="control-label" for="inputEmail">Revised to :</label>
			<div class="controls">
	            <select name="newbline" id="bline2" class="span3" required>
					<option></option>
					<?php
					$y=date("Y");
					$account1 = $row['codename'];
					$user_query2=mysqli_query($con,"select * from account where year='$y' and coopid='$_SESSION[coopid]'  and codename!='$account1'")or die(mysqli_error($con));
					while ($row2 = mysqli_fetch_array($user_query2)) {
						$budgetAccount = $row2['codename'];
						echo "<option>$budgetAccount</option>";

					}
					
					?>
				</select>

			</div>
		</div>	
						
		<div class="control-group">
			<label class="control-label" for="inputEmail">Amount Taken :</label>
			<div class="controls">
	            <input type="text"  class="span2" id="inputAmountTaken" name="amounttaken" placeholder="Amount Taken" required>
			</div>
		</div>	
	<input type="hidden"  class="span2" id="inputPassword" name="pamount" value="<?php echo $row['amount']; ?>" required>
	            <input type="hidden"  class="span2" id="inputPassword" name="amountremain" value="<?php echo $row['amountremain']; ?>" required>
			
		<div class="control-group">
			<label class="control-label" for="inputEmail">Year:</label>
			<div class="controls">
	            <input type="text"  class="span2" id="inputPassword" name="year" value="<?php echo $row['year']; ?>" readonly>
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
	
	
