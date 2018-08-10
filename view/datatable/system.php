<?php
  require_once '../../model/System.php';
  $allSystem = System::getAll();
  foreach ($allSystem as $system) {
    echo "<tr>";
    echo "<td></td>";
    echo "<td>".$system["name"]."</td>";
    echo "<td>";
    ?>
    <button type="button" onclick="editSystem(this);" class="btn btn-warning" data-id="<?=$system["id_system"]?>" data-name="<?=$system["name"]?>">
      Edit
    </button>
    <button type="button" onclick="deleteSystem(this);" class="btn btn-danger" data-id="<?=$system["id_system"]?>">
      Delete
    </button>
    <?php
    echo "</td>";
    echo "</tr>";
  }
?>
