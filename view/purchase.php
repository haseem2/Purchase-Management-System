<?php
session_start();
// it will never let you open home page if session is set
if (!isset($_SESSION['uid'])){
	header("location:index.php");
	exit;
}
require_once '../config/dbconn.php';
/* This php code is for pass the item id to $item_id_array. */

/* $result=mysqli_query($conn, "SELECT DISTINCT item_id from item ORDER BY item_id");
while ($row = mysqli_fetch_assoc($result)) {
	$item_id_array[]=  $row['item_id'];  */
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
        <link rel="stylesheet" href="../assets/css/PurchaseStyle.css" type="text/css"  />
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
                    x.setAttribute("class", "form-control");
                    x.setAttribute("name", ItemCodeId);
                    x.setAttribute("value", ItemCode);
                    col1.appendChild(x);
                    row.appendChild(col1);

                    var col2 = document.createElement('td');
                    var x = document.createElement("INPUT");
                    x.setAttribute("type", "number");
					x.setAttribute("class", "form-control");
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
					x.setAttribute("class", "form-control");
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
					x.setAttribute("class", "form-control");
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
					document.getElementById("NoOfItems").innerHTML = NoOfRow;
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
                document.getElementById("grandTotal").innerHTML = "Rs. " + GTotal;

				
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
			<a href="../config/logout.php" id="logout"><img src="../assets/images/shared/nav/nav_logout.gif" width="64" height="14" alt="" /></a> 
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
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!--  end nav -->
        <div class="clear"></div>
<br><br>

<!--form action="../model/VoucherModel.php" method="post"-->
		<form id="">
		<div id="ItemTableForm">
		<input type="text" id="Item-code"  class="form-control" onfocus="this.value = ''"  placeholder="Enter Item Code" onkeypress="additems(event)" autocomplete="on" />
		<input type="text" id="Suplier-name"  class="form-control" placeholder="Enter Suplier Name" required />
		</div>

		<table id="ItemTable" border="1">
		<!-- Rohan grand total not working if I put the heading so I cometed the line please correct this error -->
		
			<!--tr><th width="25%">Item Code</th><th width="25%">Price</th><th width="25%">Quantity</th><th width="25%">Total</th></tr-->
			
        </table>
		<div id="GrandTotalTable">
        <table id="TableBody">
		
		
            <tr>
                <td>GRAND TOTAL</td>
                <td>:</td>
                <td><div id="grandTotal">Rs. 0.00</div></td>
            </tr>
			<tr>
                <td>TOTAL NO OF ITEMS</td>
                <td>:</td>
                <td><div id="NoOfItems">00</div></td>
            </tr>
			<tr>
			<td>&nbsp;&nbsp;&nbsp;</td>
			 <td>&nbsp;&nbsp;&nbsp;</td>
			<td>&nbsp;&nbsp;&nbsp;</td>
			</tr>
			<tr>
			<td><button class="btn btn-block btn-success" type="submit" name="Submit">Save</button></td>
			 <td>&nbsp;&nbsp;&nbsp;</td>
			<td><button class="btn btn-block btn-danger" type="reset" name="Reset">Cancel</button></td>
			</tr>
		
        </table>
		</div>	
		</form>
		
		
	<!--script> Rohan this Javascript code for auto compleate list, this list is feeded by $item_id_array created by php you can find the php code for this in line no 9 this code is working my another project but not working here!! I don't know the reson. Its better if you fix this also, Now I have enabled autocomplete="on" attribute for get the item code from browser cache. but the item code should come from database rather than browser cache. --->
		
	<!--script> 
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
      });
}
var countries = <?php echo json_encode($item_id_array); ?>;

autocomplete(document.getElementById("Item-code"), countries);
</script-->		
		
		
		
		
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

            Copy Right &copy; Altec IT Solutions <span id="spanYear"></span> <a href=""></a> All rights reserved.</div>
            <!--  end footer-left -->
            <div class="clear">&nbsp;</div>
        </div>
        <!-- end footer -->

    </body>
</html>