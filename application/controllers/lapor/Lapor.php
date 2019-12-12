<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include controller master 
include APPPATH.'controllers/Master.php';

class Lapor extends Master {
	public function __construct(){
		parent::__construct();
		$this->load->model('Crud');
		// if(($this->session->userdata('login')!=true) || ($this->session->userdata('level')!=1) ){
		// 	redirect(site_url('login/logout'));
		// }
		$this->cekadmin();
	}
	//VARIABEL
	private $master_tabel="lapor"; //Mendefinisikan Nama Tabel
	private $id="lapor_id";	//Menedefinisaikan Nama Id Tabel
	private $default_url="lapor/lapor/"; //Mendefinisikan url controller
	private $default_view="lapor/admin/"; //Mendefinisiakn defaul view
	private $breadcrumb="lapor/lapor";
	private $view="template/_backend"; //Mendefinisikan Tamplate Root
	private $path='./upload/';

	private function global_set($data){
		$data=array(
			'menu'=>'lapor',//Seting menu yang aktif
			'menu_submenu'=>false,
			'headline'=>$data['headline'], //Deskripsi Menu
			'url'=>$data['url'], //Deskripsi URL yang dilewatkan dari function
			'ikon'=>"fa fa-tasks",
			'view'=>"views/lapor/admin/index.php",
			'detail'=>false,
			'cetak'=>false,
			'edit'=>true,
			'delete'=>true,
			'download'=>false,
		);
		return (object)$data; //MEMBUAT ARRAY DALAM BENTUK OBYEK
		//$data->menu=lapor, bentuk obyek
		//$data['menu']=lapor, array bentuk biasa
	}
	// private function hapus_file($id){
	// 	$query=array(
	// 		'tabel'=>$this->master_tabel,
	// 		'where'=>array(array($this->id=>$id)),
	// 	);
	// 	$file=$this->Crud->read($query)->row();
	// 	unlink($this->path.$file->user_file);
	// }
			
	public function index()
	{
		$global_set=array(
			'headline'=>'lapor',
			'url'=>$this->breadcrumb,
		);
		$global=$this->global_set($global_set);
		//CEK SUBMIT DATA
		if($this->input->post('submit')){
			//PROSES SIMPAN
			$data=array(
				'lapor_lapor'=>$this->input->post('lapor_lapor'),
				'lapor_status'=>$this->input->post('lapor_status'),
				'lapor_email'=>$this->input->post('lapor_email'),
				'lapor_nama'=>$this->input->post('lapor_nama'),
				//'tglselesaiproses'=>date('Y-m-d',strtotime($this->input->post('tglselesaiproses'))),
			);
		
			########################################################
			// $file='fileupload';
			// if($_FILES[$file]['name']){
			// 	if($this->fileupload($this->path,$file)){
			// 		$file=$this->upload->data('file_name');
			// 		$data['user_file']=$file;
			// 	}else{
			// 		$dt['error']=$this->upload->display_errors();
			// 		return $this->output->set_output(json_encode($dt));
			// 		exit();
			// 	}
			// }			
			$query=array(
				'data'=>$data,
				'tabel'=>$this->master_tabel,
			);
			$insert=$this->Crud->insert($query);
			if($insert){
				$dt['success']='input data berhasil';
			}else{
				$dt['error']='input data error';
			}
			return $this->output->set_output(json_encode($dt));
		}else{
			$data=array(
				'global'=>$global,
				'menu'=>$this->menu_backend($this->session->userdata('user_level')),
			);
			//$this->viewdata($data);			
			$this->load->view($this->view,$data);
		}
	}
	public function tabel(){
		$global_set=array(
			'headline'=>'lapor',
			'url'=>$this->default_url,
		);
		//LOAD FUNCTION GLOBAL SET
		$global=$this->global_set($global_set);		
		//PROSES TAMPIL DATA
		// $query=array(
		// 	'tabel'=>$this->master_tabel,
		// 	'order'=>array('kolom'=>$this->id,'orderby'=>'DESC'),
		// );
		$query=array(
			// 'select'=>'a.*,b.dokter,d.formulir,c.penunjang,e.bangsal',
			'tabel'=>'lapor a',
			// 'join'=>array(
			// 	array('tabel'=>'dokter b', 'ON'=>'b.id=a.id_dokter','jenis'=>'LEFT'),
			// 	array('tabel'=>'penunjang c', 'ON'=>'c.id=a.id_penunjang','jenis'=>'LEFT'),
			// 	array('tabel'=>'formulir d', 'ON'=>'d.id=a.id_formulir','jenis'=>'LEFT'),
			// 	array('tabel'=>'bangsal e', 'ON'=>'e.id=a.id_bangsal','jenis'=>'LEFT')
			// ),
		);		
		$data=array(
			'global'=>$global,
			'data'=>$this->Crud->read($query)->result(),
		);
		$this->load->view($this->default_view.'tabel',$data);		
	}
	public function edit(){
		$global_set=array(
			'headline'=>'edit data',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		$id=$this->input->post('id');
		if($this->input->post('lapor_lapor')){
			//PROSES SIMPAN
			$data=array(
				'lapor_lapor'=>$this->input->post('lapor_lapor'),
				'lapor_status'=>$this->input->post('lapor_status'),
				'lapor_email'=>$this->input->post('lapor_email'),
				'lapor_nama'=>$this->input->post('lapor_nama'),
			);
			####################################################
			// $file='fileupload';
			// if($_FILES[$file]['name']){
			// 	if($this->fileupload($this->path,$file)){
			// 		$this->hapus_file($id);
			// 		$file=$this->upload->data('file_name');
			// 		$data['user_file']=$file;
			// 	}else{
			// 		$dt['error']=$this->upload->display_errors();
			// 		return $this->output->set_output(json_encode($dt));
			// 		exit();	
			// 	}
			// }			
			$query=array(
				'data'=>$data,
				'tabel'=>$this->master_tabel,
				'where'=>array($this->id=>$id),
			);
			$update=$this->Crud->update($query);
			if($update){
				$dt['success']='update data berhasil';
			}else{
				$dt['error']='input data error';
			}
			return $this->output->set_output(json_encode($dt));			
		}else{
			$query=array(
				'tabel'=>$this->master_tabel,
				'where'=>array(array($this->id=>$id))
			);
			$data=array(
				'data'=>$this->Crud->read($query)->row(),
				'global'=>$global,				
			);
			//$this->viewdata($data);			
			$this->load->view($this->default_view.'edit',$data);
		}			
	}	
	public function add(){
		$global_set=array(
			'submenu'=>false,
			'headline'=>'add data',
			'url'=>$this->default_url, //AKAN DIREDIRECT KE INDEX
		);	
		$global=$this->global_set($global_set);
		$data=array(
			'global'=>$global,
			);
		$this->load->view($this->default_view.'add',$data);		
	}	
	public function hapus(){
		$id=$this->input->post('id');
		#############################
		//$this->hapus_file($id);
		$query=array(
			'tabel'=>$this->master_tabel,
			'where'=>array($this->id=>$id),
		);
		$delete=$this->Crud->delete($query);
		if($delete){
			$dt['success']='hapus data berhasil';
		}else{
			$dt['error']='input data error';
			$dt['msg']=$delete;
		}
		return $this->output->set_output(json_encode($dt));	
	}
	public function download($file){
		$this->downloadfile($this->path,$file);
	}

}
