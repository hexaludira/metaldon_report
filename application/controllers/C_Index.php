	<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//include library phpoffice
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_Index extends CI_Controller {

	function __construct(){
		parent::__construct();
		Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
		$this->load->model('M_Metal_Problem');
		// $this->load->model('M_Kategori');
		$this->load->model('M_Datatable');
	}

	public function index()
	{
		$this->load->view('V_Metal_Problem');
	}

	public function incident()
	{
		$data['page'] = 'incident';

		$this->load->view('layout',$data);
	}

	function ambilData()
	{
		$data = $this->M_Metal_Problem->getData();
		echo json_encode($data);
	}

	function ambilDataAjax()
	{
		header('Content-Type: application/json');
		$list = $this->M_Datatable->get_datatables();
		$data = array();
		$no = $this->input->post('start');
		//looping data incident
		foreach($list as $data_problem)
		{
			$no++;
			$row = array();
			$row[] = $no;
			$row[] = $data_problem->problem_date;
			$row[] = $data_problem->problem_location;
			$row[] = $data_problem->problem_name;
			$row[] = $data_problem->problem_detail;
			$row[] = $data_problem->problem_status;
			$row[] = $data_problem->problem_repair_date;
			$row[] = $data_problem->problem_remark;
			
			//$row[] = '<a class="btn btn-success btn-sm"><i class="fa fa-edit"></i> </a><a class="btn btn-danger btn-sm "><i class="fa fa-trash"></i> </a>';
			$row[] = '<span><a href="#" class="btn btn-primary btn_edit" data-id="'.$data_problem->problem_id.'">Edit</a> <button data-id="'.$data_problem->problem_id .'" class="btn btn-danger btn_hapus">Hapus</button> <button data-id="'.$data_problem->problem_id .'" class="btn btn-warning btn_tampil_foto">Lihat Foto</button></span>';
			$data[] = $row;
		}
		$output = array(
				"draw" => $this->input->post('draw'),
            "recordsTotal" => $this->M_Datatable->count_all(),
            "recordsFiltered" => $this->M_Datatable->count_filtered(),
            "data" => $data,
		);
		//output to json format
			echo json_encode($output);
        //$this->output->set_output(json_encode($output));
	}

	function hapusData()
	{
		$problem_id = $this->input->post('problem_id');
		$img_name = $this->M_Metal_Problem->getImageNameByID($problem_id)->problem_image_name;
		$data = $this->M_Metal_Problem->deleteData($problem_id);
		$glob_find = glob("uploads/".$img_name."*");
		unlink($glob_find[0]);
		// $img_hapus = unlink("uploads/".$img_name.".jpg");
		// if($img_hapus == false){
		// 	unlink("uploads/".$img_name.".png");
		// }
		//$img_hapus = glob('"'.$img_name.'.*'.'"');
		//array_map("unlink", glob('"'.$img_name.'.*'.'"'));
		//unlink("uploads/".glob($img_name.'*'));
		echo json_encode($data);
	}

	function tambahData()
	{
		//$img_name = "";
		$data = $this->input->post();
		// $config['upload_path'] = "./uploads";
		// $config['allowed_types'] = 'gif|jpg|png';
		// $config['encrypt_name'] = TRUE;

			// $this->load->library('upload',$config);

			// if($this->upload->do_upload("incident_picture")){
			// 	$data_image = array('upload_data' => $this->upload->data());

			// // 	//$judul = $this->input->post('judul');
			// 	$img_name = $data_image['upload_data']['file_name'];
			// 	//$result = $this->M_Incident->simpanUpload($img_name);
			// 	//echo json_decode($result);

			// }

		$dataSave = $this->M_Metal_Problem->insertData([
				'problem_date' => $data['problem_date'],
				'problem_location' => $data['problem_location'],
				'problem_name' => $data['problem_name'],
				'problem_detail' => $data['problem_detail'],
				'problem_status' => $data['problem_status'],
				'problem_repair_date' => $data['problem_repair_date'],
				'problem_remark' => $data['problem_remark'],
				'problem_image_name' => $data['problem_location'].'_'.$data['problem_date']
				
			]);

		echo json_encode($dataSave);
		
	}

	/*========================== Fungsi Tambah Data + Gambar =============================*/
	function tambahDataGambar(){
		$data = $this->input->post();
		$config['upload_path'] = "./uploads";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $data['problem_location'].'_'.$data['problem_date'];
		$this->load->library('upload',$config);

		if($this->upload->do_upload("problem_image")){
			$data = array('upload_data' => $this->upload->data());
			//resize image
			$config['image_library'] = 'gd2';
			$config['source_image'] = './uploads/'.$data['upload_data']['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['quality'] = '60%';
			$config['width'] = 1280;
			$config['height'] = 720;
			$config['new_image'] = './uploads/'.$data['upload_data']['file_name'];
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();

			
			$img_name = $data['upload_data']['file_name'];
			$fileExt = pathinfo($img_name, PATHINFO_EXTENSION);

			
			echo $img_name;

		}

		$problem_date = $this->input->post('problem_date');
		$problem_location = $this->input->post('problem_location') ;
		$problem_name = $this->input->post('problem_name');
		$problem_detail = $this->input->post('problem_detail');
		$problem_status = $this->input->post('problem_status');
		$problem_repair_date = $this->input->post('problem_repair_date');
		$problem_remark = $this->input->post('problem_remark');
		$problem_image_name = $this->input->post('problem_location').'_'.$this->input->post('problem_date');

		$dataSave = $this->M_Metal_Problem->insertData([
				'problem_date' => $problem_date,
				'problem_location' => $problem_location,
				'problem_name' => $problem_name,
				'problem_detail' => $problem_detail,
				'problem_status' => $problem_status,
				'problem_repair_date' => $problem_repair_date,
				'problem_remark' => $problem_remark,
				'problem_image_name' => $problem_image_name
				
			]);

		echo json_encode($dataSave);
	}
	/*=====================================================================================*/


	/*========================== Fungsi Update Data + Gambar =============================*/
	function updateDataGambar(){
		$data = $this->input->post();
		$config['upload_path'] = "./uploads";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $data['problem_location_edit'].'_'.$data['problem_date_edit'];
		$this->load->library('upload',$config);

		if($this->upload->do_upload("problem_image_edit")){
			$data = array('upload_data' => $this->upload->data());
			//resize image
			$config['image_library'] = 'gd2';
			$config['source_image'] = './uploads/'.$data['upload_data']['file_name'];
			$config['create_thumb'] = FALSE;
			$config['maintain_ratio'] = TRUE;
			$config['quality'] = '60%';
			$config['width'] = 1280;
			$config['height'] = 720;
			$config['new_image'] = './uploads/'.$data['upload_data']['file_name'];
			$this->load->library('image_lib',$config);
			$this->image_lib->resize();

			
			$img_name = $data['upload_data']['file_name'];
			$fileExt = pathinfo($img_name, PATHINFO_EXTENSION);

			
			echo $img_name;

		}

		$problem_id = $this->input->post('problem_id_edit');
		$problem_date = $this->input->post('problem_date_edit');
		$problem_location = $this->input->post('problem_location_edit') ;
		$problem_name = $this->input->post('problem_name_edit');
		$problem_detail = $this->input->post('problem_detail_edit');
		$problem_status = $this->input->post('problem_status_edit');
		$problem_repair_date = $this->input->post('problem_repair_date_edit');
		$problem_remark = $this->input->post('problem_remark_edit');
		$problem_image_name = $this->input->post('problem_location_edit').'_'.$this->input->post('problem_date_edit');

		$dataSave = $this->M_Metal_Problem->updateData($problem_id,[
				'problem_date' => $problem_date,
				'problem_location' => $problem_location,
				'problem_name' => $problem_name,
				'problem_detail' => $problem_detail,
				'problem_status' => $problem_status,
				'problem_repair_date' => $problem_repair_date,
				'problem_remark' => $problem_remark,
				'problem_image_name' => $problem_image_name
				
			]);

		echo json_encode($dataSave);
	}
	/*=====================================================================================*/

	function cekData(){
		//$list = $this->M_Datatable->get_datatables();
		$data = $this->M_Incident->getDataLast();
		echo $data->incident_name;
		// foreach($data as $data_incident){
		// 	echo $data_incident->incident_name;
		// }
		
	}


	function doUpload(){
		$data = $this->M_Metal_Problem->getDataLast();
		//echo $data->incident_name;
		$config['upload_path'] = "./uploads";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $data->problem_image_name;
		//$config['overwrite'] = TRUE;
		//$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);
		if($this->upload->do_upload("problem_image")){
			$data = array('upload_data' => $this->upload->data());

			
			$img_name = $data['upload_data']['file_name'];
			$fileExt = pathinfo($img_name, PATHINFO_EXTENSION);
			echo $img_name;
			//$image = $data['upload_data']['file_name'];

			//$result = $this->M_Incident->simpanUpload($img_name);
			//echo json_encode($result);

		}
	}

	function doUploadEdit(){
		//$haha = $this->input->post('jdskjfhksj');
		$data = $this->input->post();
		$config['upload_path'] = "./uploads";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['file_name'] = $data['incident_picture_name'];
		$config['overwrite'] = TRUE;

		$this->load->library('upload',$config);
		if($this->upload->do_upload("incident_picture_edit")){
			$data = array('upload_data' => $this->upload->data());

			
			$img_name = $data['upload_data']['file_name'];
			$fileExt = pathinfo($img_name, PATHINFO_EXTENSION);
			echo $img_name;
			//$image = $data['upload_data']['file_name'];

			//$result = $this->M_Incident->simpanUpload($img_name);
			//echo json_encode($result);

		}
	}

	function editData(){
		//$row = array();
		$problem_id = $this->input->post('problem_id');
		$data = $this->M_Metal_Problem->getDataByID($problem_id);
		$img_name = $data[0]->problem_image_name;
		$glob_find = glob("uploads/".$img_name."*");


		if (($img_name != null) && ($glob_find)){
			// $img_name = $glob_find[0];
			$data[0]->problem_image_preview = $glob_find[0];
			//$data[0]->incident_picture_name = $glob_find[0];

		} else if (($img_name != null) && ($glob_find == null)){
			$data[0]->problem_image_preview = null;
		} else {
			$data[0]->problem_image_preview = null;
		}

		//echo $img_name;
		//$data[] = $row;
		echo json_encode($data);
	}

	

	function updateData(){
		//$incident_id = $this->input->post('incident_id');
		$img_name_update;
		$data = $this->input->post();

		// $img_name_old = $data['incident_picture_name'];

		// $img_name_new = $data['incident_name'].'_'.$data['incident_date'];

		// if ($img_name_old == $img_name_new) {
		// 	$img_name_update = $img_name_old;
		// } else {
		// 	// $glob_find = glob("uploads/".$img_name_old."*");

		// 	// rename(, $img_name_new);
		// 	$img_name_update = $img_name_new;
		// }

		//echo $img_name_old;

		$dataAll = [
				'incident_name' => $data['incident_name'],
				'incident_date' => $data['incident_date'],
				'incident_time_begin' => $data['incident_time_begin'],
				'incident_time_end' => $data['incident_time_end'],
				'incident_location' => $data['incident_location'],
				'incident_detail' => $data['incident_detail'],
				'incident_affected' => $data['incident_affected'],
				'incident_picture_name' => $data['incident_picture_name'],
				'incident_remark' => $data['incident_remark'],
				'incident_status' => $data['incident_status'],
		];

		$dataSave = $this->M_Incident->updateData($data['incident_id'],$dataAll);
		echo $data['incident_id'];
		//echo $img_name_update;

		echo json_encode($dataSave);
	}

	//Ambil nama gambar dari DB
	function ambilDataGambar(){
		$problem_id = $this->input->post('problem_id');
		$img_name = $this->M_Metal_Problem->getImageNameByID($problem_id)->problem_image_name;
		$glob_find = glob("uploads/".$img_name."*");
		// if ($img_name != null){
		// 	$glob_find = glob("uploads/".$img_name."*");
		// 	$data = $glob_find[0];
		// 	//echo $data;
		// } else {
		// 	$data = null;
		// 	echo $data;
		// }
		
		if (($img_name != null) && ($glob_find)){
			$data = $glob_find[0];

		} else if (($img_name != null) && ($glob_find == null)){
			$data = null;
		} else {
			$data = null;
		}

		/* Untuk cek ekstensi */
		// if (isset($IMG) && !empty($IMG)) {
		//     $imageType = "png";

		//     if (strpos($IMG, ".png") === false) {
		//         $imageType = "jpg";
		//     }
		// }

		echo json_encode($data);
	}

	function cekEkstensi(){
		$incident_id = "108";
		$data = $this->M_Incident->getImageNameByID($incident_id)->incident_picture_name;

		// $this->load->library('image_lib');
		// $img = "uploads/".$data;
		// $img_ext = $this->image_lib->explode_name($img);

		// echo $img;
		// echo $img_ext['ext'];

		// $path = "uploads/";
		// echo $path . $data .'*';
		$glob_find = glob("uploads/".$data."*");
		echo $glob_find[0];
		// if(unlink($glob_find[0])){
		// 	echo "Berhasil";
		// }
		//print_r(glob("uploads/Kejadian OOO_2022-11-04*"));
		//echo glob($path . $data .'*');

		// if(unlink(realpath(glob($path . $data .'*')))){
		// 	echo "berhasil";
		// }else {
		// 	echo "error";
		// }

		// $incident_id = $this->input->post('incident_id');
		// $data = $this->M_Incident->getImageNameByID($incident_id);

		//echo json_encode($data);
	}

	// function get_kategori(){
	// 	$x['data'] = $this->M_Kategori->get_kategori();
	// 	$this->load->view('V_Kategori',$x);
	// }

	// function get_subkategori(){
	// 	$id = $this->input->post('id');
	// 	$data = $this->M_Kategori->get_subkategori($id);
	// 	echo json_encode($data);
	// }

}