<?php
$filename = "scores.json";

if (file_exists($filename)) {
  $scores = json_decode(file_get_contents($filename), true);
} else {
  $scores = [];
}

echo json_encode($scores);
?>
