<?php include("session.php"); ?>
<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>

<head>
   <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

   <?php include('menu.php'); ?>
   <td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 14px">


      <div class="col-lg-6 col-md-6 col-sm-6">
         <div class="panel panel-default">


            <div class="panel-body">

               <?php include('header.php'); ?>


               <div class="col-lg-6 col-md-6 col-sm-6">
                  <div class="panel panel-default">


                     <div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 18px; font-weight: bold; line-height: 20px; text-shadow: 1px 1px 0 #FFFFFF;">Bank Accounts
                     </DIV>
                     <div class="panel-body">
                        <?php include('header.php'); ?>


                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="example">


                           <?php
                           include('dbcon.php');

                           $sel = mysqli_query($con, "SELECT level.Level_id, level.Level, combination.Level_id, combination.Combination, level.status AS level_status, combination.status AS combination_status from level,combination where 
level.Level_id=combination.Level_id and level.coopid='$_SESSION[coopid]'");
                           echo "  <thead> <tr>
   <th align=center>Number</td> <th align=center>Bank Name</td><th align=center>Accountno</td><td></td><td></td>
      </TR></thead><tbody>";
                           $x = $amt = 0;
                           while ($med = mysqli_fetch_array($sel)) {
                              $id = $med['Level_id'];
                              $bank = $med['Level'];
                              $accno = $med['Combination'];
                              $levelStatus = $med["level_status"];
                              $combinationStatus = $med["combination_status"];
                              $x++;
                              print("<tr><td align=center>$x</td><td align=center>$bank</td><td align=center>$accno</td>
");

                           ?>

                              <td width="100">

                                 <a rel="tooltip" title="Update" id="e<?php echo $accno; ?>" href="#edit<?php echo $accno; ?>" <?php if ($combinationStatus == "0") { ?> data-toggle="modal" <?php } ?> class="btn btn-success" <?php if ($combinationStatus == "1") echo "disabled"; ?>>
                                    <i class="icon-pencil icon-large"></i></a>
                                 <?php include('modal_edit_bankaccount.php'); ?>
                              </td>
                              <td><a rel="tooltip" title="delete" id="<?php echo $id; ?>" href="#delete_user<?php echo $id; ?>" <?php if ($combinationStatus == "0") { ?> data-toggle="modal" <?php } ?> class="btn btn-danger" <?php if ($combinationStatus == "1") echo "disabled"; ?>>
                                    <i class="icon-trash icon-large"></i></a>
                                 <?php include('deletebankaccount.php'); ?></td>
                           <?php } ?>
                           <!-- Modal edit user -->

                           </tr>


                           </tbody>
                        </table>
                        </table>






                        <?php include_once "footer.php" ?>