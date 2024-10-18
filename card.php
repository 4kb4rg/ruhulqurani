<?php
require_once('fpdf17/fpdf.php');

// Header agar browser memahami file sebagai PDF dan mendownloadnya secara otomatis
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="kartu_ujian.pdf"');
header('Pragma: no-cache');
header('Expires: 0');

// Inisialisasi objek FPDF dengan orientasi landscape
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

// Menambahkan background image (tidak mendukung transparansi langsung, perlu edit manual)
$pdf->Image('https://ruhulqurani.sch.id/assets/img/backgroud.jpg', 0, 0, 297, 210); // Landscape: Width=297, Height=210

// Menambahkan border (frame) di sekeliling halaman
$pdf->SetLineWidth(1);
$pdf->Rect(5, 5, 287, 200); // Border dengan posisi (X=5, Y=5), ukuran Width=287, Height=200 untuk landscape

// Menambahkan logo Ruhul Qur'ani
$pdf->Image('https://ruhulqurani.sch.id/assets/img/logo_2.jpg', 10, 10, 40); // X=10, Y=10, Width=40mm (Lebih besar dari sebelumnya)

// Menentukan font dan ukuran (ukuran font lebih besar)
$pdf->SetFont('Arial', 'B', 24); // Ukuran font lebih besar

// Judul Kartu di tengah
$pdf->Cell(0, 20, 'KARTU PESERTA UJIAN', 0, 1, 'C'); // Membesarkan ukuran cell untuk judul
$pdf->Ln(10);
$pdf->SetFont('Arial', 'B', 22);
$pdf->Cell(0, 20, 'PL/PSB/DRQ/MTs/24/0001', 0, 1, 'C');
$pdf->Ln(15);

// Font normal untuk detail peserta (lebih besar dari sebelumnya)
$pdf->SetFont('Arial', '', 18);

// Tabel informasi peserta (kiri)
$pdf->Cell(60, 15, 'NAMA', 0, 0); // Cell lebih besar
$pdf->Cell(120, 15, ': MUHAMMAD FATIH ALFATH', 0, 0);

// Gambar (foto peserta lebih besar)
$pdf->Image('https://ruhulqurani.sch.id/images/15102024110428212277.jpg', 220, 55, 50, 0); // Ukuran foto lebih besar (Width=50mm, Height=auto)

$pdf->Ln(15);
$pdf->Cell(60, 15, 'JENJANG', 0, 0);
$pdf->Cell(120, 15, ': MTs RQ', 0, 1);

$pdf->Cell(60, 15, 'JALUR', 0, 0);
$pdf->Cell(120, 15, ': PRESTASI', 0, 1);

$pdf->Cell(60, 15, 'NO HP', 0, 0);
$pdf->Cell(120, 15, ': 085319027867', 0, 1);

$pdf->Cell(60, 15, 'NIK', 0, 0);
$pdf->Cell(120, 15, ': 456', 0, 1);

$pdf->Cell(60, 15, 'SESI UJIAN', 0, 0);
$pdf->Cell(120, 15, ': 21 Nov 2024 (JAM 08:00 - 10:25 WIB)', 0, 1);

$pdf->Cell(60, 15, 'GRUP', 0, 0);
$pdf->Cell(120, 15, ': GROUP A', 0, 1);

$pdf->Ln(10);

// Output file PDF
$pdf->Output("Kartu Ujian Calon Santri","I");
?>
