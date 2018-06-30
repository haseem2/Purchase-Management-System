<?php
session_start();
// it will never let you open home page if session is set
if (!isset($_SESSION['uid'])){
	header("location:index.php");
	exit;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <!--meta http-equiv="refresh" content="30" /-->
        <title>Purchase</title>
        <link rel="stylesheet" href="../assets/css/screen.css" type="text/css" media="screen" title="default" />
        <link rel="stylesheet" href="../assets/css/jquery.dataTables.css" type="text/css" media="screen" title="default" />
		<link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css"  />
		<link rel="stylesheet" href="../assets/css/homestyle.css" type="text/css"  />
        <script src="../assets/js/admin/jquery-1.4.1.min.js" type="text/javascript"></script>

        <!--  checkbox styling script -->
        <script src="../assets/js/admin/ui.core.js" type="text/javascript"></script>
        <script src="../assets/js/admin/ui.checkbox.js" type="text/javascript"></script>
        <script src="../assets/js/admin/jquery.bind.js" type="text/javascript"></script> 

        <!-- Custom jquery scripts -->
        <script src="../assets/js/admin/custom_jquery.js" type="text/javascript"></script>

        <!-- Tooltips -->
        <script src="../assets/js/admin/jquery.tooltip.js" type="text/javascript"></script>
        <script src="../assets/js/admin/jquery.dimensions.js" type="text/javascript"></script>
        <script type="text/javascript">
		
		
		

            var NoOfRow = 1;
            var table;
            var price, qty, total, ItemCode, ItemCodeId;;

			event.preventDefault(); // did this line to disable submittion when enter is pressed
            function additems(event) {
			
			
			
			
                table = document.getElementById("ItemTable");
                var key = event.which || event.keyCode;
                if (key == 13) {
					event.preventDefault(); // did this line to disable submittion when enter is pressed
					ItemCodeId = "item" + NoOfRow;
                    price = "price" + NoOfRow;
                    qty = "qty" + NoOfRow;
                    total = "total" + NoOfRow;

                    ItemCode = document.getElementById("Item-code").value;


                    var row = document.createElement('tr');




                    var col1 = document.createElement('td');
                    var x = document.createElement("INPUT");
					x.setAttribute("onkeypress", "ItemCodeInput()");
                    x.setAttribute("type", "text");
                    x.setAttribute("name", ItemCodeId);
                    x.setAttribute("value", ItemCode);
                    col1.appendChild(x);
                    row.appendChild(col1);

                    var col2 = document.createElement('td');
                    var x = document.createElement("INPUT");
                    x.setAttribute("type", "number");
                    x.setAttribute("name", price);
                    x.setAttribute("id", price);
                    x.setAttribute("placeholder", "Enter the price");
                    x.setAttribute("value", "");
                    x.setAttribute("onkeypress", "PriceFocus(event)");
                    col2.appendChild(x);
                    row.appendChild(col2);

                    var col3 = document.createElement('td');
                    var x = document.createElement("INPUT");
                    x.setAttribute("type", "number");
                    x.setAttribute("name", qty);
                    x.setAttribute("id", qty);
                    x.setAttribute("placeholder", "Enter the Qty.");
                    x.setAttribute("value", "");
                    x.setAttribute("onkeypress", "CalcTotal(event)");
                    col3.appendChild(x);
                    row.appendChild(col3);

                    var col4 = document.createElement('td');
                    var x = document.createElement("INPUT");
                    x.setAttribute("type", "number");
                    x.setAttribute("name", total);
                    x.setAttribute("id", total);
                    x.setAttribute("placeholder", "");
                    col4.appendChild(x);
                    row.appendChild(col4);
                    table.appendChild(row);

                    document.getElementById(price).focus();
                }
            }
			function ItemCodeInput() {
                var key = event.which || event.keyCode;
                if (key == 13) {
					event.preventDefault(); // did this line to disable submittion when enter is pressed on intem code cell
                }
            }
            function PriceFocus(event) {
                var key = event.which || event.keyCode;
                if (key == 13) {
					event.preventDefault(); // did this line to disable submittion when enter is pressed
                    document.getElementById(price).blur();
                    document.getElementById(qty).focus();
                }
            }
            function CalcTotal(event) {
                var key = event.which || event.keyCode;
                if (key == 13) {
					event.preventDefault(); // did this line to disable submittion when enter is pressed
                    var Price = document.getElementById(price).value;
                    var Qty = document.getElementById(qty).value;
                    var Total = Price * Qty;
                    document.getElementById(total).value = Total;
					NoOfRow++;
					
                    grandTotal();
                }
            }
            function grandTotal() {
				document.getElementById(qty).blur();
					document.getElementById("Item-code").focus();


                var oTable = document.getElementById('ItemTable');

//gets rows of table
                var rowLength = oTable.rows.length;
                var GTotal = 0;
//loops through rows    
                for (i = 0; i < rowLength; i++) {
                    var rownum = i + 1;
                    GTotal += parseFloat(document.getElementById("total" + rownum).value);

                }
                document.getElementById("grandTotal").innerHTML = GTotal;

				
            }




            function readEntireTable() {
                //gets table
                var oTable = document.getElementById('ItemTable');

//gets rows of table
                var rowLength = oTable.rows.length;

//loops through rows    
                for (i = 0; i < rowLength; i++) {

                    //gets cells of current row
                    var oCells = oTable.rows.item(i).cells;

                    //gets amount of cells of current row
                    var cellLength = oCells.length;

                    //loops through each cell in current row
                    for (var j = 0; j < cellLength; j++) {
                        /* get your cell info here */
                        /* var cellVal = oCells.item(j).innerHTML; */
                    }
                }
            }
        </script>
		

    </head>

       








<body class="simplexml preload locale-en">

 <!-- Start: page-top-outer -->
        
		<!--div id="page-top-outer"-->    
		<div id="">    

            <!-- Start: page-top -->
            <div id="page-top">

                <!-- start logo -->
               
                <!-- end logo -->

            </div>
            <!-- End: page-top -->

        </div>
        <!-- End: page-top-outer -->

        <div class="clear">&nbsp;</div>

        <!--  start nav-outer-repeat................................ START -->
        <div class="nav-outer-repeat"> 
		
            <!--  start nav-outer -->
            <div class="nav-outer"> 
				<!-- start nav-right -->
		<div id="nav-right">

			<div class="nav-divider">&nbsp;</div>
			<a href="../config/logout.php" id="logout"><img src="images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a> 
			<div class="clear">&nbsp;</div>

		</div>
		<!-- end nav-right -->

              <!--  start nav -->
				<div class="nav">
                    <div class="table">

                        <div class="nav-divider">&nbsp;</div>

						<ul class="current">
                            <li>
                                <a href="purchase.php"><b>Purchase</b></a>
                            </li>
                        </ul>
						<ul class="select">
							<li>
								<a href="report.php"><b>Report</b></a>
							</li>
                        </ul>
                        
						<!--ul class="select">
							<li><a href="../views/home.php" target="_blank"><b>NeuronHost</b></a></li>
                        </ul>
						 <ul class="select">
							<li><a href="phpinfo().php"><b>phpinfo()</b></a></li>
                        </ul>
						<ul  class="select">
							<li><a href="upload.php"><b>Upload ZIP File</b></a></li>
                        </ul-->
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!--  end nav -->
        <div class="clear"></div>
<br><br>

<!--form action="../model/VoucherModel.php" method="post"-->
		<form>
        <input type="text" id="Item-code" onfocus="this.value = ''" onkeypress="additems(event)" placeholder="Enter Item Code">
        <table id="ItemTable" border="1">
			
        </table>
        <table>
            <tr>
                <td>GRAND TOTAL</td>
                <td>:</td>
                <td><div id="grandTotal">0.00</div></td>
            </tr>
			<tr>
			<td><input type="submit" name="Submit"></input></td>
			<td><input type="reset" name="Reset"></input></td>
			</tr>
        </table>

		</form>
    </body>




            <!--  end content -->
            <div class="clear">&nbsp;</div>
        </div>
        <!--  end content-outer........................................................END -->

        <div class="clear">&nbsp;</div>

        <!-- start footer -->         
        <div id="footer">
            <!--  start footer-left -->
            <div id="footer-left">

                Admin Panel &copy; Altec IT Solutions <span id="spanYear"></span> <a href=""></a>. All rights reserved.</div>
            <!--  end footer-left -->
            <div class="clear">&nbsp;</div>
        </div>
        <!-- end footer -->

    </body>
</html>