<?php include("session.php");?>

<!DOCTYPE html><html moznomarginboxes mozdisallowselectionprint><head><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >

	     <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
<?php include('menu.php'); ?>
<td class="print-reset" style="vertical-align: top; background-color: #fff; border-bottom: 1px solid #ccc; border-right: 1px solid #ccc; padding: 14px">


<div class="col-lg-6 col-md-6 col-sm-6">
<div class="panel panel-default">
 
  
<div style="padding: 10px 15px; border-radius: 3px; border: 1px solid #ddd; background-color: #F5F5F5; box-shadow: 1px 1px 0 #FFFFFF inset; color: #CCCCCC; 
font-size: 18px; font-weight: bold; line-height: 20px; text-shadow: 2px 2px 0 #FFFFFF;">Recording Credits
                   <a href="amadeni.php"> <button type="button" class="btn btn-sm btn-primary btn-create">New Transaction</button></a></DIV>
<div class="panel-body">
<FORM action="savebudget.php" method="post">
<?php include('header.php'); ?>

					
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered table-list" id="customersTable">
 
                             
          <thead> <tr>  <td align=center><em class='fa fa-cog'>Edit</em></td><td align=center><em class='fa fa-cog'>Delete</em></td><td align=center><em class='fa fa-cog'>Payment</em></td> <th align=center>Date</th><th align=center>Reason</th> <th align=center>Piece No</th><th align=center>Amount</th><th align=center>Paid</th><th align=center>Remaining</th>
   <th align=center>Type</th><th align=center>Owner</th><th align=center>Date to pay</th>
   </TR></thead>

								
                                    </tr>
									
                           
                               
                            </table></table>
							
							
			
			  <script type="text/javascript">
        $(document).ready(function(){
            $('#customersTable').DataTable({
            "processing": true,
			'serverMethod': 'post',
          'ajax': {
                    'url':'amadeniajax.php'
                },
			        dom: 'l<".margin" B>frtip',
		lengthMenu: [[4,10, 25, 50,100, -1], [4,10, 25, 50,100, "All"]],
        buttons: [
		
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                },
				  title : 'Clients list',
               
                text : '<i class="fa fa-file-excel-o"> Excel</i>',
                titleAttr : 'EXCEL'
            },
			
			
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                },
				  title : 'Clients list',
                orientation : 'landscape',
                pageSize : 'LEGAL',
                text : '<i class="fa fa-file-pdf-o"> PDF</i>',
                titleAttr : 'PDF'
            },
            'colvis'
        ]

    
	

   });
});
</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.colVis.min.js"></script>


<?php include_once "footer.php" ?>
