<?php include 'session.php';
ob_start(); ?>
<!DOCTYPE html>
<html moznomarginboxes mozdisallowselectionprint>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

    <link rel="stylesheet" href="css/style.css">

    <td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 30px">
        <style>
            div.panel {
                min-width: 0px;
                margin-bottom: 10px
            }

            div.panel div.header {
                background-color: ivory;
                border-bottom: 1px solid #EEEEEE;
                border-top-left-radius: 4px;
                border-top-right-radius: 4px;
                text-shadow: 1px 1px 0 #FFFFFF;
                padding: 20px;
                box-shadow: inset 0px 1px 0px #fff;
            }

            div.panel div.title {
                font-weight: bold;
                font-size: 18px
            }

            div.panel div.title span.emphasis {
                border-bottom: 2px solid #333
            }

            div.panel div.description {
                color: #333;
                font-size: 12px;
                padding-top: 10px
            }

            div.panel div.balance {
                float: right;
                font-size: 18px;
                font-weight: bold
            }

            div.panel div.body {
                padding: 20px
            }

            div.panel div.footer {
                background-color: #f6f6f6;
                border-top: 1px solid #EEEEEE;
                border-bottom-left-radius: 4px;
                border-bottom-right-radius: 4px;
                text-shadow: 1px 1px 0 #FFFFFF;
                padding: 10px 20px;
                text-align: center
            }

            div.panel div.placeholder {
                padding: 20px;
                color: #999;
                text-align: center;
                font-size: 14px;
                line-height: 28px
            }

            div.panel table {
                width: 100%;
                font-size: 12px
            }

            div.panel table td {
                padding: 5px 0px
            }
        </style>
        <div class="panel panel-default">
            <div class="panel-body well">
                <div id="printable-content" class="panel" style="font-size: 12px; float: center; min-width: 100px">
                    <p>
                    <p>
                    <p>
                    <p>
                    <p>
                    <p>
                    <p>
                    <p>
                    <p>
                    <p>
                    <p>
                    <p>
                    <div>
                        <div>
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 50%; padding-right: 10px; vertical-align: top" colspan="2">
                                        <?php $date1 = $_GET['date1'];
                                        $date2 = $_GET['date2'];
                                        ?>
                                        <div style="padding-bottom: 10px">
                                            <div style="text-align: center; color: #ccc; font-size: 14px; font-weight: bold; text-shadow: 1px 1px 0px #fff">
                                                BUDGET REVISION REPORT
                                                <?php
                                                echo " From $date1 UNTIL $date2"; ?></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 50%; padding-right: 10px; vertical-align: top">
                                        <div class="panel">
                                            <div class="header">
                                                <div class="balance">

                                                </div>
                                                <div class="title">REVISIONS</div>
                                            </div>
                                            <div class="body">

                                                <table border="1">
                                                    <tr>
                                                        <td style="text-align: right; font-weight: bold; width: 1px; white-space: nowrap">


                                                            <table cellpadding="0" cellspacing="0" border="1" class="table table-striped table-bordered table-list" id="example">
                                                                <thead>
                                                                    <tr>
                                                                        <th>DATE</th>
                                                                        <th>REVISED BUDGET LINE</th>
                                                                        <th>AMOUNT BEFORE REVISIONS</th>
                                                                        <th>AMOUNT TAKEN</th>
                                                                        <th>BUDGET ACCREDITED</th>
                                                                        <th>AMOUNT BEFORE ACCREDITATION</th>
                                                                        <th>AMOUNT AFTER ACCREDITION
                                                                        </th>


                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    <?php
                                                                    include('dbcon.php');
                                                                    header("Content-type: application/vnd-ms-excel");
                                                                    header("Content-Disposition: attachment; filename=BUDGETREVISIONREPORT.xls");
                                                                    $totbline1 = $totbline2 = $totrevised = $totaccredited = 0;
                                                                    $user_query = mysqli_query($con, "select * from revisedbudget where operationdate between '$date1' and '$date2' and coopid='$_SESSION[coopid]'") or die(mysqli_error($con));
                                                                    while ($row = mysqli_fetch_array($user_query)) {
                                                                        $id = $row['id']; ?>
                                                                        <tr class="del<?php echo $id ?>">
                                                                            <td align="center"><?php echo $row['operationdate']; ?></td>
                                                                            <td align="center"><?php echo $row['bline1']; ?></td>

                                                                            <td align="center"><?php $valuef = number_format($row['bline1amount']);
                                                                            $totbline1 += $row['bline1amount'];     echo $valuef; ?></td>
                                                                            <td align="center"><?php echo $row['revisedamount'];
                                                                            $totrevised+=$row['revisedamount'] ?></td>

                                                                            <td align="center"><?php echo $row['bline2']; ?></td>
                                                                            <td align="center"><?php echo number_format($row['bline2amount']);
                                                                            $totbline2 += $row['bline2amount'];
                                                                            $amount2 = $row['bline2amount'] + $row['revisedamount'];
                                                                            $totaccredited += $amount2;?></td>
                                                                            <td align="center"><?php $amount2f = number_format($amount2);
                                                                                                echo $amount2f; ?></td>



                                                                            <!-- Modal edit user -->

                                                                        </tr>
                                                                    <?php } ?>

                                                                </tbody>
                                                                <?php
                                                                $totbline1f = number_format($totbline1);
                                                                $totbline2f = number_format($totbline2);
                                                                $totrevisedf = number_format($totrevised);
                                                                $totaccreditedf = number_format($totaccredited);

                                                                echo "<tr><th colspan='2'>TOTAL</TH><th>$totbline1f</th><th>$totrevisedf</th><th></th><th>$totbline2f</th><th>$totaccreditedf</th></tr>";
                                                                ?>
                                                                
                                                            </table>
                                                        </td>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    </table>
                    </table>