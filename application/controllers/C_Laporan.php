<?php
	defined('BASEPATH') OR exit ('No direct script access allowed');

	class C_Laporan extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->library('Pdf');
		}

		function index(){
			error_reporting(0);
			$pdf = new FPDF('L','mm','A4');
			$pdf->AddPage();
			$pdf->SetFont('Arial','B',16);
			$pdf->Cell(0,7,'METAL AND ANDON REPORT',0,1,'C');
			$pdf->Cell(10,7,'',0,1);
			$pdf->SetFont('Arial','B',10);
			$pdf->Cell(10,6,'No',1,0,'C');
			$pdf->Cell(25,6,'Date',1,0,'C');
			$pdf->Cell(17,6,'Location',1,0,'C');
			$pdf->Cell(40,6,'Problem',1,0,'C');
			$pdf->Cell(40,6,'Detail',1,0,'C');
			$pdf->Cell(80,6,'Status',1,0,'C');
			$pdf->Cell(30,6,'Repair Date',1,0,'C');
			$pdf->Cell(30,6,'Remark',1,1,'C');
			$pdf->SetFont('Arial','',10);
			$problem = $this->db->get('tbl_metaldon_problem')->result();

			$no = 0;

			foreach ($problem as $data) {
				$cellWidth = 20;
				$cellHeight = 1;

				
				$no++;
				$pdf->Cell(10,6,$no,1,0,'C');
				$pdf->Cell(25,6,$data->problem_date,1,0);
				$pdf->Cell(17,6,$data->problem_location,1,0);
				$pdf->Cell(40,6,$data->problem_name,1,0);
				$pdf->Cell(40,6,$data->problem_detail,1,0);
				$pdf->Cell(80,6,$data->problem_status,1,0);
				$pdf->Cell(30,6,$data->problem_repair_date,1,0);
				$pdf->Cell(30,6,$data->problem_remark,1,1);
				
			}
			$pdf->Output();
		}
		

	}
?>