<!doctype html>

<!-- Web page "World Peace Gifts"     -->
<!-- Created by Harrison Kong         -->
<!-- Copyright (C) Coursera 2020      -->

<html lang="en">

<header>

<meta charset="UTF-8">
<link rel="FaviconIcon" href="worldpeace1.ico?v=1" type="image/x-icon">
<link rel="shortcut icon" href="worldpeace1.ico?v=1" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv=“Pragma” content=”no-cache”>
<meta http-equiv=“Expires” content=”-1″>
<meta http-equiv=“CACHE-CONTROL” content=”NO-CACHE”>
<!-- CSS Stylesheets -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="css/worldpeace.css?v=4">

<title>World Peace Gifts Shipping Department</title>

</header>

<body>

<img class="hero" src="images/banner.jpg" alt="banner">

<h1 class='section-heading'><img class="logo" src="images/logo.png" alt="logo" />&nbsp;World Peace Gifts</h1>
<h2 class='section-subheading'>Shipping Department</h2>
<p><code class="copyright-text">Orders</code></p>

<div class="results-div">

<!--- PHP code starts here -->

<?php

$servername = "127.0.0.1";
$username = "root";
$password = "coursera";
$dbname = "world_peace";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Database Connection Failed: " . $conn->connect_error);
}

$sql = <<< SQL
SELECT
customer.customer_name,
customer_order_line_item.customer_order_id,
merchandise_item.description,
customer_order_line_item.quantity,
merchandise_item.unit_price / 100 AS "unit_price_decimal",
customer_order_line_item.quantity * merchandise_item.unit_price / 100 AS "line_total"
FROM customer_order_line_item, customer_order, customer, merchandise_item
WHERE
customer_order_line_item.merchandise_item_id = merchandise_item.merchandise_item_id AND
customer_order.customer_id = customer.customer_id AND
customer_order_line_item.customer_order_id = customer_order.customer_order_id
ORDER BY
customer_name,
customer_order_line_item.customer_order_id,
merchandise_item.description
SQL;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row

  $orderTotal = 0;
  $currentOrder= "";

  while($row = $result->fetch_assoc()) {

    if ($currentOrder!= $row["customer_order_id"]) {
      // starting a new customer

      if ($currentOrder != "") {
        // there was a customer before this one
        echo "</tbody>";
        echo "<tfoot><tr><td class='empty-cell' colspan='2'></td><td class='highlight-cell'>Order Total</td><td class='highlight-cell'>$".number_format($orderTotal, 2)."</td></tr></tfoot>";
        echo "</table>";
        $orderTotal = 0;
      }

      // show customer name here
      echo "<table><thead>";
      echo "<tr><th class='highlight-cell' colspan='2'>Customer: ".$row["customer_name"]."</th>";
      echo "<th class='highlight-cell' colspan='2'>Order Number: ".$row["customer_order_id"]."</th></tr>";
      echo "<tr><th>Item Description</th><th>Quantity</th><th>Unit Price</th><th>Line Total</th></tr></thead>";

      $currentOrder = $row["customer_order_id"];

    }

    echo "<tr>";
    echo "<td>".$row["description"]."</td><td>".$row["quantity"]."</td><td>".number_format($row["unit_price_decimal"], 2)."</td><td>$".number_format($row["line_total"], 2)."</td>";
    echo "</tr>";

    $orderTotal += $row["line_total"];

  }

  echo "</tbody>";
  echo "<tfoot><tr><td class='empty-cell' colspan='2'></td><td class='highlight-cell'>Order Total</td><td class='highlight-cell'>$".number_format($orderTotal, 2)."</td></tr></tfoot>";
  echo "</table>";

} else {
  echo "<h2>No Orders Found</h2>";
}
$conn->close();

?>

<!--- PHP code ends here -->

</div>

<div>
  <p class="option-centered"><a href="worldpeaceshipping.html">&lt;&lt;&lt;&nbsp;Back to Main Menu</a></p>
</div>

</body>

<footer>
  <div class="section-divider"><img src="images/infinity-line.png"></div>

  <br />
  <p><code class="copyright-text">Powered by <a href="https://www.mysql.com/" target= "_blank">🐬 MySQL</a></code></p>

  <code class="copyright-text">Crafted with ❤️ at <a href="https://coursera.org/" target= "_blank">Coursera</a></code>

</footer>

<!-- JQuery Scripts -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<!-- Our codes -->
<script src="js/worldpeace.js?v=1"></script>

</html>
