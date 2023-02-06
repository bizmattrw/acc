<?php include("session.php");?>
<!DOCTYPE html><html moznomarginboxes mozdisallowselectionprint><head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>


<?php include('menu.php'); ?>

<td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 14px">


<div class="col-lg-6 col-md-6 col-sm-6">
<div class="panel panel-default">
 
  
<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 18px; font-weight: bold; line-height: 20px; text-shadow: 2px 2px 0 #FFFFFF;">BUDGET LINES
                   <a href="usersform.php"> <button type="button" class="btn btn-sm btn-primary btn-create">New Entry</button></a>
				   </DIV>
<div class="panel-body">
<?php include('header.php'); ?>

					
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Names</th>
										<th>Username</th>                                 
										<th colspan=""></th><th></th>                               
										                                
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 
								include('dbcon.php');
								  $year=date("Y");
								  $user_query=mysqli_query($con,"select * from login")or die(mysqli_error());
								  $i=0;
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['id']; ?>
									 <tr class="del<?php echo $id ?>">
                                    <td align="center"><?php $i++; echo $i; ?></td> 
                                    <td align="center"><?php echo $row['names']; ?></td>
									<td align="center"><?php echo $row['username']; ?></td> 

                                 
                                    <td width="100">
                                       
										<a rel="tooltip"  title="Update" id="<?php echo $id; ?>" href="#edit<?php echo $id; ?>" data-toggle="modal" class="btn btn-success">
										<i class="icon-pencil icon-large"></i></a>
                                    	<?php include('modal_edit_users.php'); ?>
									</td>
									 <td><a rel="tooltip"  title="delete" id="<?php echo $id; ?>"  href="#delete_user<?php echo $id; ?>" data-toggle="modal"  class="btn btn-danger">
									 <i class="icon-trash icon-large"></i></a>
                                        <?php include('deleteusers1.php'); ?></td>
									
									     <!-- Modal edit user -->
								
                                    </tr>
									<?php } ?>
                           
                                </tbody>
                            </table></table>
							
							
			



<?php include_once "footer.php" ?>
