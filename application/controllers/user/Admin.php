<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include controller master 
include APPPATH.'controllers/Master.php';

class admin extends Master {
	public function __construct(){
		parent::__construct();
		$this->load->model('Crud');
		// if(($this->session->userdata('login')!=true) || ($this->session->userdata('level')!=1) ){
		// 	redirect(site_url('login/logout'));
		// }
		$this->cekadmin();
	}
	//VARIABEL
	private $master_tabel="user"; //Mendefinisikan Nama Tabel
	private $id="user_id";	//Menedefinisaikan Nama Id Tabel
	private $default_url="user/admin/"; //Mendefinisikan url controller
	private $default_view="user/admin/"; //Mendefinisiakn defaul view
	private $view="template/_backend"; //Mendefinisikan Tamplate Root
	private $path='./upload/';

	private function global_set($data){
		$data=array(
			'menu'=>'user',//Seting menu yang aktif
			'menu_submenu'=>false,
			'headline'=>$data['headline'], //Deskripsi Menu
			'url'=>$data['url'], //Deskripsi URL yang dilewatkan dari function
			'ikon'=>"fa fa-tasks",
			'view'=>"views/user/admin/index.php",
			'detail'=>false,
			'cetak'=>false,
			'edit'=>true,
			'delete'=>true,
			'download'=>false,
		);
		return (object)$data; //MEMBUAT ARRAY DALAM BENTUK OBYEK
		//$data->menu=user, bentuk obyek
		//$data['menu']=user, array bentuk biasa
	}
	private function hapus_file($id){
		$query=array(
			'tabel'=>$this->master_tabel,
			'where'=>array(array($this->id=>$id)),
		);
		$file=$this->Crud->read($query)->row();
		unlink($this->path.$file->user_file);
	}
	public function index()
	{
		$global_set=array(
			'headline'=>'data user',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		//CEK SUBMIT DATA
		if($this->input->post('user_nama')){
			//PROSES SIMPAN
			$data=array(
				'user_nama'=>$this->input->post('user_nama'),
				'user_terdaftar'=>date('Y-m-d',strtotime($this->input->post('user_terdaftar'))),
				'user_username'=>$this->input->post('user_username'),
				'user_password'=>$this->input->post('user_password'),
				'user_level'=>$this->input->post('user_level'),
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
				'menu'=>$this->menu_backend(1),
				
			);
			//$this->viewdata($data);

			$this->load->view($this->view,$data);
			//print_r($data['menu']);
		}
	}
	public function tabel(){
		$global_set=array(
			'headline'=>'user',
			'url'=>$this->default_url,
		);
		//LOAD FUNCTION GLOBAL SET
		$global=$this->global_set($global_set);		
		//PROSES TAMPIL DATA
		$query=array(
			'tabel'=>$this->master_tabel,
			'order'=>array('kolom'=>$this->id,'orderby'=>'DESC'),
		);
		$data=array(
			'global'=>$global,
			'data'=>$this->Crud->read($query)->result(),
		);
		$this->load->view($this->default_view.'tabel',$data);		
		
	}
	public function getdatasjon(){
		//PROSES TAMPIL DATA
		$query=array(
			'tabel'=>$this->master_tabel,
			'order'=>array('kolom'=>$this->id,'orderby'=>'DESC'),
		);
		$_data=$this->Crud->read($query)->result();
		$data=array();
		//$no = $_POST['start'];
		$no=1;
		foreach ($_data as $val) {
			$row=array();
			$no++;
			$row[]=$no;
			$row[]=date('d-m-Y',strtotime($val->user_terdaftar));
			$row[]='<a href="javascript:void(0)" id="'.$val->user_id.'" url="'.base_url($this->default_url.'edit').'" class="edit text-primary" data-toggle="tooltip" data-placement="right" title="Edit Data">'.$val->user_nama.'</a>';
			$row[]=$val->user_username;
			$row[]=$val->user_password;
			$row[]='
				<a href="javascript:void(0)"   url="'.base_url($this->default_url.'hapus/').'" id="'.$val->user_id.'"class="hapus btn btn-outline-danger"><span class="mdi mdi-delete"></span></a>
			';
			$data[]=$row;
		}
		//$this->load->view($this->default_view.'tabel',$data);	
		$__data=[
			// "draw" => $_POST['draw'],
			// "recordsTotal" => count($_data),
			//"recordsFiltered" => $this->customers->count_filtered(),
			"data" => $data,
		];	
		return $this->output->set_output(json_encode($__data));
		//print_r($__data).'<br>' ;
	}	
	public function edit(){
		$global_set=array(
			'headline'=>'edit data',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		$id=$this->input->post('id');
		if($this->input->post('user_nama')){
			//PROSES SIMPAN
			$data=array(
				'user_nama'=>$this->input->post('user_nama'),
				'user_terdaftar'=>date('Y-m-d',strtotime($this->input->post('user_terdaftar'))),
				'user_username'=>$this->input->post('user_username'),
				'user_password'=>$this->input->post('user_password'),
				'user_level'=>$this->input->post('user_level'),
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
				'menu'=>$this->menu(0),
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
