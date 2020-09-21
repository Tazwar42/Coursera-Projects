<!DOCTYPE html>

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
<link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css" />
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="css/worldpeace.css?v=6">

<title>World Peace Gifts Shipping Department</title>

</header>

<body>

<img class="hero" src="images/banner.jpg" alt="banner">

<h1 class='section-heading'><img class="logo" src="images/logo.png" alt="logo" />&nbsp;World Peace Gifts</h1>
<h2 class='section-subheading'>Shipping Department</h2>
<p><code class="copyright-text">Offerings</code></p>

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
  WITH RECURSIVE merchandise_cte (merchandise_item_id, depth, description, unit_price_decimal, alpha_sort, bundle_id)

  -- defining the common table expression

  AS (

  	-- top level items

  	SELECT
  		merchandise_item_id,						-- merchandise_item_id
  		1,											-- depth
  		CAST(description AS CHAR(500)),				-- description
  		CAST(unit_price / 100 AS DECIMAL(8, 2)),	-- unit_price_decimal
  		CAST(description AS CHAR(700)), 			-- alpha_sort
  		bundle_id									-- bundle_id
  	FROM merchandise_item

  	UNION ALL

  	-- these are the contents of the bundles

  	SELECT
  		D.merchandise_item_id,												-- merchandise_item_id
  		depth + 1,															-- depth
  		CAST(D.description AS CHAR(500)),	-- description
  		CAST(NULL AS DECIMAL(8, 2)),										-- unit_price_decimal
  		CAST(CONCAT(C.alpha_sort, " ", D.description) AS CHAR(700)),    	-- alpha_sort
  		D.bundle_id															-- bundle_id
  	FROM merchandise_cte AS C, merchandise_item AS D
  	WHERE C.merchandise_item_id = D.bundle_id
  )

  -- using the common table expression

  SELECT * FROM merchandise_cte
  ORDER BY alpha_sort
  SQL;

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    $collapsible_div = "<div data-role='collapsible' data-collapsed-icon='carat-r' data-expanded-icon='carat-d' data-theme='x' data-content-theme='x'>";
    $noncollapsible_div = "<div data-role='collapsible' data-disabled='true' data-collapsed-icon='' data-expanded-icon='' data-theme='x' data-content-theme='x'>";

    // output data of each row

    echo "<table><thead><tr><th width='25%'>Item ID</th><th width='50%'>Description</th><th width='25%'>Unit Price</th></tr></thead>";

    echo "<tbody>";

    $row = $result->fetch_all(MYSQLI_ASSOC);

    for($i = 0; $i < $result->num_rows; $i++) {

      // this row is a level 1
      //   start a new table row and print the item id
      //   also, remember the price to print when we close the table row
      if ($row[$i]["depth"] == 1) {
        echo "<tr>";
        echo "<td class='top-align'>".$row[$i]["merchandise_item_id"]."</td>";
        echo "<td>";
        $level_1_price = "$".$row[$i]["unit_price_decimal"];
      }

      // if it is the last row or the next row is not a sublevel of this row
      //   disable the collapse action, print the description
      //   close the division
      if ($i == ($result->num_rows - 1) || $row[$i+1]["depth"] <= $row[$i]["depth"] ) {

        echo $noncollapsible_div;
        echo "<h1>".$row[$i]["description"]."</h1>";
        echo "</div>";

        // end of sublevel or is last row
        //   close the division by how many levels we are backing out
        if ($i == ($result->num_rows - 1) || $row[$i+1]["depth"] < $row[$i]["depth"]) {

          if ($i == ($result->num_rows - 1)) {
            $back_to_level = 1;
          } else {
            $back_to_level = $row[$i]["depth"] - $row[$i+1]["depth"];
          }

          for ($r = 1; $r <= $back_to_level; $r++) {
            echo "</div>";
          }
        }

        // next row is last row or is level 1,
        //   close the table cell, print the price and end the row
        if ($i == ($result->num_rows - 1) || $row[$i+1]["depth"] == 1) {
          echo "</td>";
          echo "<td class='top-align'>".$level_1_price."</td>";
          echo "</tr>";
        }

      } else {

        // the next row is a sublevel
        //   make the division collapsible
        echo $collapsible_div;
        echo "<h1>".$row[$i]["description"]."</h1>";
      }

    }

    echo "</tbody>";

    echo "</table>";

  } else {
    echo "<h2>No Merchandise Found</h2>";
  }

  $result->free_result();

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
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
<!-- Our codes -->
<script src="js/worldpeace.js?v=1"></script>

</html>
