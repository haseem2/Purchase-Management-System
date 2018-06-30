<?php

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		
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
    <body>
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
</html>
