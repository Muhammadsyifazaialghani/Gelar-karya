_<?php
// Path ke file skor
$filename = "scores.json";

// Ambil data dari request
$data = json_decode(file_get_contents("php://input"), true);
$name = $data["name"];
$score = $data["score"];

// Baca file lama
$scores = file_exists($filename) ? json_decode(file_get_contents($filename), true) : [];

// Tambahkan skor baru
$scores[] = ["name" => $name, "score" => $score];

// Urutkan skor dari yang tertinggi
usort($scores, function($a, $b) {
  return $b["score"] - $a["score"];
});

// Ambil 5 skor tertinggi
$scores = array_slice($scores, 0, 5);

// Simpan kembali
file_put_contents($filename, json_encode($scores));

echo json_encode(["success" => true, "topScores" => $scores]);
?>
