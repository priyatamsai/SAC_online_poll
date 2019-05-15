<?php
require 'includes/common.php';
?>
<?php
if(!isset($_SESSION['username'])||($_SESSION['status']!=1)){
header('location:index.php');
}
?>
<?php

$sql = "SELECT * FROM sac.post";
$resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
require ('fpdf/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
while ($field_info = mysqli_fetch_field($resultset)) {
    $pdf->Cell(25, 12, $field_info->name, 1);
}
while ($rows = mysqli_fetch_assoc($resultset)) {
    $pdf->SetFont('Arial', '', 12);
    $pdf->Ln();
    foreach ($rows as $column) {
        $pdf->Cell(25, 12, $column, 1);
    }
}

$sql = "SELECT * FROM sac.contestant";
$resultset = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
while ($field_info = mysqli_fetch_field($resultset)) {
    $pdf->Cell(23, 12, $field_info->name, 1);
}
while ($rows = mysqli_fetch_assoc($resultset)) {
    $pdf->SetFont('Arial', '', 12);
    $pdf->Ln();
    foreach ($rows as $column) {
        $pdf->Cell(23, 12, $column, 1);
    }
}

$pdf->Output();
?>