<?php
  require_once '../../model/System.php';
  $allSystem = System::getAll();
  foreach ($allSystem as $system) {
    echo "<tr>";
    echo "<td></td>";
    echo "<td>".$system["name"]."</td>";
    echo "<td></td>";
    echo "</tr>";
  }
?>
