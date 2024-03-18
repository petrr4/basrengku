<?php

include('../koneksi.php');

$stmt = $koneksi->prepare("SELECT * FROM review LIMIT 4");

$stmt->execute();

$featured_review = $stmt->get_result();