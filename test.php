 <?php 
 ob_start();
 ini_set('memory_limit', ' 9989999M');
 ini_set('max_execution_time', 9999900);
								
								include'model/connectDB/dbConnect.php';
								  
								  $user_query=mysqli_query($db,"select * from marks where acadyear='2022' group by regno,coursename")or die(mysqli_error($db));
								  $counter=0;
									while($row=mysqli_fetch_array($user_query)){
								$formattive=(int)$row['formative'];
								$complehensive=(int)$row['complehensive'];
								$integrated=(int)$row['integrated'];
								$regno=$row['regno'];
								$course=$row['coursename'];
								if($integrated>0)
								{
									$counter=3;
								}
								else{$counter=2;}
								$regex=($formattive+$complehensive+$integrated)/$counter;
								mysqli_query($db,"update marks set reason_ex='$regex' where regno='$regno' and acadyear='2022' and coursename='$course'")or die(mysqli_error($db));
								echo "$regno  $course";
									}
									?>