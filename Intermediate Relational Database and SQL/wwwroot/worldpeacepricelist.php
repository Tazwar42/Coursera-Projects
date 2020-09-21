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
<p><code class="copyright-text">Price List</code></p>

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

$sql = "SELECT merchandise_item_id, description, unit_price FROM merchandise_item";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row

  echo "<table><thead><tr><th>Item ID</th><th>Description</th><th>Unit Price</th></tr></thead>";

  echo "<tbody>";

  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row["merchandise_item_id"]."</td><td>".$row["description"]."</td><td>$".number_format((float)$row["unit_price"]/100.0, 2)."</td>";
    echo "</tr>";
  }

  echo "</tbody>";

  echo "</table>";

} else {
  echo "<h2>No Inventory Found</h2>";
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
