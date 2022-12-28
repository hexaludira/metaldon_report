<?php
	defined('BASEPATH') OR exit ('No direct script access allowed');

	//include library phpoffice
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	class C_Export_Excel extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->model('M_Metal_Problem');
			
		}

		function index(){
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();

			//variabel untuk menampung pengaturan style dari header tabel
			$style_col = [
				'font' => ['bold' => true],
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // set text di tengah horizontal (center)
					'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // set text di tengah secara vertical (middle)
				],
				'borders' => [
					'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // set border top dengan garis tipis
					'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // set border right dengan garis tipis
					'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // set border bottom dengan garis tipis
					'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // set border kiri dengan garis tipis
				]
			];

			//variabel untuk menampung pengaturan style dari isi tabel
			$style_row = [
				'alignment' => [
					'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER
				],
				'borders' => [
					'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
					'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
					'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
					'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN]
				]
			];

			$sheet->setCellValue('A1', "Metal Andon Report");
			$sheet->mergeCells('A1:H1');
			$sheet->getStyle('A1')->getAlignment()->applyFromArray(array('horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER));
			$sheet->getStyle('A1')->getFont()->setBold(true);
			$sheet->getStyle('A1')->getFont()->setSize(16);

			//Header Table
			$sheet->setCellValue('A3',"No");
			$sheet->setCellValue('B3',"Date");
			$sheet->setCellValue('C3',"Location");
			$sheet->setCellValue('D3',"Problem");
			$sheet->setCellValue('E3',"Detail");
			$sheet->setCellValue('F3',"Status");
			$sheet->setCellValue('G3',"Repair Date");
			$sheet->setCellValue('H3',"Remark");
			//$sheet->setCellValue('I3',"Remark");
			// $sheet->setCellValue('J3',"Incident Status");

			//Apply style Header
			$sheet->getStyle('A3')->applyFromArray($style_col);
			$sheet->getStyle('B3')->applyFromArray($style_col);
			$sheet->getStyle('C3')->applyFromArray($style_col);
			$sheet->getStyle('D3')->applyFromArray($style_col);
			$sheet->getStyle('E3')->applyFromArray($style_col);
			$sheet->getStyle('F3')->applyFromArray($style_col);
			$sheet->getStyle('G3')->applyFromArray($style_col);
			$sheet->getStyle('H3')->applyFromArray($style_col);
			//$sheet->getStyle('I3')->applyFromArray($style_col);
			//$sheet->getStyle('J3')->applyFromArray($style_col);

			//Fungsi get_data dari M_Incident
			$problem = $this->M_Metal_Problem->getData();

			$no = 1; //untuk penomoran tabel
			$numrow = 4; //set baris pertama untuk isi tabel adalah baris ke-4
			foreach ($problem as $data) { //looping variabel $incident
				$sheet->setCellValue('A'.$numrow, $no);
				$sheet->setCellValue('B'.$numrow, $data->problem_date);
				$sheet->setCellValue('C'.$numrow, $data->problem_location);
				$sheet->setCellValue('D'.$numrow, $data->problem_name);
				$sheet->setCellValue('E'.$numrow, $data->problem_detail);
				$sheet->setCellValue('F'.$numrow, $data->problem_status);
				$sheet->setCellValue('G'.$numrow, $data->problem_repair_date);
				$sheet->setCellValue('H'.$numrow, $data->problem_remark);
				// $sheet->setCellValue('I'.$numrow, $data->incident_remark);
				// $sheet->setCellValue('J'.$numrow, $data->incident_status);

				//apply style ke baris data
				$sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
				$sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
				$sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
				$sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
				$sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
				$sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
				$sheet->getStyle('G'.$numrow)->applyFromArray($style_row);
				$sheet->getStyle('H'.$numrow)->applyFromArray($style_row);
				// $sheet->getStyle('I'.$numrow)->applyFromArray($style_row);
				// $sheet->getStyle('J'.$numrow)->applyFromArray($style_row);

				$no++;
				$numrow++;
			}

			//set width kolom
			// $sheet->getColumnDimension('A')->setWidth(5);
			// $sheet->getColumnDimension('B')->setWidth(15);
			// $sheet->getColumnDimension('C')->setWidth(10);
			// $sheet->getColumnDimension('D')->setWidth(10);
			// $sheet->getColumnDimension('E')->setWidth(10); 	
			// $sheet->getColumnDimension('F')->setWidth(15);
			// $sheet->getColumnDimension('G')->setWidth(30);
			// $sheet->getColumnDimension('H')->setWidth(10);
			// $sheet->getColumnDimension('I')->setWidth(10);
			// $sheet->getColumnDimension('J')->setWidth(10);

			//$sheet->getDefaultColumnDimension()->setWidth(-1);

			for($i = 'A'; $i<=$sheet->getHighestColumn(); $i++){
				$sheet->getColumnDimension($i)->setAutoSize(true);
			}

			//set height semua kolom
			$sheet->getDefaultRowDimension()->setRowHeight(-1);

			//set orientasi kertas
			$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

			//set judul file excel
			$sheet->setTitle("Metal Andon Report");

			//Proses file excel
			ob_end_clean();
			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment; filename="Metal Andon Report.xlsx"'); //set nama excelnya
			header('Cache-Control: max-age=0');
			

			$writer = new Xlsx($spreadsheet);
			$writer->save('php://output');
			}

		}
?>