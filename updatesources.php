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
font-size: 18px; font-weight: bold; line-height: 20px; text-shadow: 2px 2px 0 #FFFFFF;">SOURCE OF INCOMES
                   <a href="sources.php"> <button type="button" class="btn btn-sm btn-primary btn-create">New Entry</button></a></DIV>
<div class="panel-body">
<FORM action="savesources.php" method="post">
<?php include('header.php'); ?>

					
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">
                                <thead>
                                    <tr>
                                        <th>ACCOUNT</th>
                                        <th>AMOUNT EXPECTED</th>
										<th>AMOUNT REMAINING</th>                                 
                                        <th>YEAR</th>                                 
                                               
                                     
										<th colspan=""></th><th></th>                               
										                                
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 
								include('dbcon.php');
								  
								  $user_query=mysqli_query($con,"select * from sources  where coopid='$_SESSION[coopid]'")or die(mysqli_error($con));
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['id']; ?>
									 <tr class="del<?php echo $id ?>">
                                    <td align="center"><?php echo $row['codename']; ?></td> 
                                    <td align="center"><?php echo number_format($row['amount']); ?></td>
									<td align="center"><?php echo number_format($row['amountremain']); ?></td> 
                                    <td align="center"><?php echo $row['year']; ?></td> 

                                 
                                    <td width="100">
                                       
										<a rel="tooltip"  title="Update" id="e<?php echo $id; ?>" href="#edit<?php echo $id; ?>" data-toggle="modal" class="btn btn-success">
										<i class="icon-pencil icon-large"></i></a>
                                    	<?php include('modal_edit_sources.php'); ?>
									</td>
									 <td><a rel="tooltip"  title="delete" id="<?php echo $id; ?>"  href="#delete_user<?php echo $id; ?>" data-toggle="modal"  class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                        <?php include('deletesources.php'); ?></td>
									
									     <!-- Modal edit user -->
								
                                    </tr>
									<?php } ?>
                           
                                </tbody>
                            </table></table>
							
							
			



<?php include_once "footer.php" ?>
