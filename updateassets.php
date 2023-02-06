<?php include("session.php");?>

<!DOCTYPE html><html moznomarginboxes mozdisallowselectionprint><head>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" ><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php include('menu.php'); ?>
<td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 30px">


<div class="col-lg-6 col-md-6 col-sm-6">
<div class="panel panel-default">
 
  
<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 18px; font-weight: bold; line-height: 20px; text-shadow: 2px 2px 0 #FFFFFF;">ASSETS
                   <a href="assets.php"> <button type="button" class="btn btn-sm btn-primary btn-create">New Entry</button></a></DIV>
<div class="panel-body">
<?php include('header.php'); ?>

					
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">
                                <thead>
                                    <tr>
                                        <th>ASSET</th>
                                        <th>VALUE</th>                                 
                                        <th>DEPRECIATION</th>                                 
                                          <th>DATE</th>      
                                     
										<th colspan=""></th><th></th>                               
										                                
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 
								include('dbcon.php');
								  
								  $user_query=mysqli_query($con,"select * from assets where coopid='$_SESSION[coopid]'")or die(mysqli_error($con));
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['id']; ?>
									 <tr class="del<?php echo $id ?>">
                                    <td><?php echo $row['asset']; ?></td> 
                                    <td><?php echo $row['value']; ?></td> 
                                    <td><?php echo $row['depreciation']; ?></td> 
                                    <td><?php echo $row['date']; ?></td> 
                                 
                                    <td width="100">
                                       
										<a rel="tooltip"  title="Update" id="e<?php echo $id; ?>" href="#edit<?php echo $id; ?>" data-toggle="modal" class="btn btn-success">
										<i class="icon-pencil icon-large"></i></a>
                                    	<?php include('modal_edit_assets.php'); ?>
									</td>
									 <td><a rel="tooltip"  title="delete" id="<?php echo $id; ?>"  href="#delete_user<?php echo $id; ?>" data-toggle="modal"  class="btn btn-danger">
									 <i class="icon-trash icon-large"></i></a>
                                        <?php include('deleteassets.php'); ?></td>
									
									     <!-- Modal edit user -->
								
                                    </tr>
									<?php } ?>
                           
                                </tbody>
                            </table></table>
							
							
			



<?php include_once "footer.php" ?>
