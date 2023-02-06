 <?php 
								  $year=date("Y");
								include('dbcon.php');
								  
								  $user_query=mysqli_query($con,"select * from account where year='$year' ")or die(mysqli_error($con));
									while($row=mysqli_fetch_array($user_query)){
									$account=$row['codename']; 
									echo"<option>$account</option>";
									}
									?>