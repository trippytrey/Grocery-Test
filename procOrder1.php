<html>
<head>
    <title>Al's Grocery - Order Results</title>
</head>
<body>
<h1>Al's Grocery</h1>
<h2>Order Results</h2>
<?php
$milkqty = $_POST['milkqty'];
$beerqty = $_POST['beerqty'];
echo "  <p>Order processed at "; // Start printing order
echo date("H:i, jS F");
echo "  </p>\n";
echo "  <p>Your order is as follows:";
echo "  <br>\n";
echo "    $milkqty quarts of milk<br>\n";
echo "    $beerqty bottles of beer<br>\n";
define("MILKPRICE", 3.25);
define("BEERPRICE", 2.50);
define("TAXRATE",   0.10);
$totalqty = $milkqty + $beerqty;
$totalamount =  $milkqty * MILKPRICE
    + $beerqty * BEERPRICE;
echo "  </p>\n";
echo "  <pre>\n";
echo "Items ordered:\t$totalqty\n";
echo "Subtotal:\t\$";
echo number_format($totalamount, 2);
echo "\n";
$totalamount = $totalamount * (1 + TAXRATE);
$totalamount = number_format($totalamount, 2);
echo "Total with tax:\t\$$totalamount\n";
echo "  </pre>\n";

echo "  <form action='procOrderFollow.php' method='post'>\n";
echo "    <p>Deliver to your home? 
    <input type='checkbox' name='deliver' 
        value='Yes' /></p>\n";
echo "    <input type='hidden' name='milkqty' value=$milkqty' />\n";
echo "    <input type='hidden' name='beerqty' value=$beerqty' />\n";
if ( $beerqty > 0 )  {
    echo "    <p>Are you 21 or older?<br>\n";
    echo "      &nbsp;&nbsp;Yes<input type='radio' name='ofAge' 
                   value='Yes' /><br>\n";
    echo "      &nbsp;&nbsp;No<input type='radio' name='ofAge' 
                   value='No' /><br>\n";
    echo "    </p>\n";
}
echo "    <p><input type='submit' value='Submit' /></p>\n";
echo "  </form>\n";

?>
</body>
</html>