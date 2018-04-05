<?php

require('com_pdf.php');
$pdf=new table('L','mm','A4');
$pdf->AddPage();

//$gambar = base_url()."assets/img/header.png";
//$pdf->Cell(0,12,$pdf->Image($gambar, 100,null, 96),0,0,'C');

$pdf->ln(5);
$pdf->Cell(0,0,'',1,0,'C');
$pdf->ln(5);

$pdf->SetFont('Arial','B',18);
$pdf->Cell(0,12,'DAFTAR BAHAN BAKU',0,0,'C');
$pdf->ln(16);

$pdf->SetFont('Arial','',12);

$pdf->Cell(0,12,'Total Data : '.$jml_data,0,0,'L');
$pdf->ln(10);

$pdf->SetWidths(array(20,55,25,35,25,40,55));
$pdf->Row(array(
	'No.',
	'Nama Bahan',
	'Jumlah',
	'Harga/Satuan',
	'Total Pembelian',
	'Tanggal',
	'Supplier'
));

$i = 1;
if($data){
	foreach($data as $data){
	$pdf->Row(array(
		$data->no_bahan,
		$data->nama,
		$data->stok.' '.$data->satuan,
//		$data->stok,
//                $data->satuan,
		Format($data->harga),
		$data->total_pembelian,
		$data->tanggal,
		$data->supplier
	));
	$i++;
}

}


$pdf->Output();
?>