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
font-size: 18px; font-weight: bold; line-height: 20px; text-shadow: 2px 2px 0 #FFFFFF;">STOCK ITEMS PRICES
				   </a></DIV>
<div class="panel-body">
<?php include('header.php'); ?>

					
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Purchase Price</th>
										<th>Selling Price</th>                                 
                                       <!-- <th>YEAR</th>  
										<th>Season</th>                                
                                               -->
                                     
										<th colspan=""></th>                              
										                                
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php 
								include('dbcon.php');
								  
								  $user_query=mysqli_query($con,"select * from levels where coopid='$_SESSION[coopid]'")or die(mysqli_error($con));
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['id']; ?>
									 <tr class="del<?php echo $id ?>">
                                    <td align="center"><?php echo $row['item']; ?></td> 
                                    <td align="center"><?php echo $row['pprice']; ?></td>
									<td align="center"><?php echo $row['sprice']; ?></td> 
                                   <!-- <td align="center"><?php echo $row['year']; ?></td> 
									<td align="center"><?php echo $row['term']; ?></td> 
									-->
									 <td><a rel="tooltip"  title="delete" id="<?php echo $id; ?>"  href="#delete_user<?php echo $id; ?>" data-toggle="modal"  class="btn btn-danger"><i class="icon-trash icon-large"></i></a>
                                        <?php include('deleteprice.php'); ?></td>
									
									     <!-- Modal edit user -->
								
                                    </tr>
									<?php } ?>
                           
                                </tbody>
                            </table></table>
							
							
			



<?php include_once "footer.php" ?>
