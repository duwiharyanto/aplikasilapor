<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include controller master 
include APPPATH.'controllers/Master.php';

class dashboard extends Master {
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
	private $default_url="dashboard/dashboard/"; //Mendefinisikan url controller
	private $default_view="dashboard/admin/"; //Mendefinisiakn defaul view
	private $view="template/_backend"; //Mendefinisikan Tamplate Root
	private $path='./upload/';

	private function global_set($data){
		$data=array(
			'menu'=>'dashboard',//Seting menu yang aktif
			'menu_submenu'=>false,
			'headline'=>$data['headline'], //Deskripsi Menu
			'url'=>$data['url'], //Deskripsi URL yang dilewatkan dari function
			'ikon'=>"fa fa-tasks",
			'view'=>"views/dashboard/admin/index.php",
			'detail'=>false,
			'cetak'=>false,
			'edit'=>true,
			'delete'=>true,
			'download'=>true,
			'aktifasi'=>true,
		);
		return (object)$data; //MEMBUAT ARRAY DALAM BENTUK OBYEK
		//$data->menu=dashboard, bentuk obyek
		//$data['menu']=dashboard, array bentuk biasa
	}
	private function hapus_file($id){
		$query=array(
			'tabel'=>$this->master_tabel,
			'where'=>array(array($this->id=>$id)),
		);
		$file=$this->Crud->read($query)->row();
		if($file->dashboard_file){
			unlink($this->path.$file->dashboard_file);
		}
	}
	public function index()
	{
		$global_set=array(
			'headline'=>'dashboard',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		//CEK SUBMIT DATA
		$data=array(
			'global'=>$global,
			'menu'=>$this->menu_backend($this->session->userdata('user_level')),
		);
		//$this->viewdata($data);			
		$this->load->view($this->view,$data);
	}
	public function tabel(){
		$global_set=array(
			'headline'=>'dashboard',
			'url'=>$this->default_url,
		);
		//LOAD FUNCTION GLOBAL SET
		$global=$this->global_set($global_set);		
		//PROSES TAMPIL DATA
		$query=array(
			'tabel'=>$this->master_tabel,
			'order'=>array('kolom'=>$this->id,'orderby'=>'DESC'),
		);
		$_data=$this->Crud->read($query)->result();
		$_laporharini=array();
		$_laporclose=array();
		$_laporopen=array();
		foreach ($_data as $index => $val) {
			$save_at=date('Y-m-d',strtotime($val->save_at));
			if(date('Y-m-d')==$save_at){
				$_laporharini[$index]=$val;	
			}				
		}
		foreach ($_data as $index => $val) {
			if($val->lapor_status==1){
				$_laporclose[$index]=$val;	
			}				
		}
		foreach ($_data as $index => $val) {
			if($val->lapor_status==0){
				$_laporopen[$index]=$val;	
			}				
		}						
		$data=array(
			'global'=>$global,
			'totallapor'=>count($_data),
			'totalhariini'=>count($_laporharini),
			'laporclose'=>count($_laporclose),
			'laporopen'=>count($_laporopen),
		);
		$this->load->view($this->default_view.'tabel',$data);		
	}
	/*
	public function edit(){
		$global_set=array(
			'headline'=>'edit data',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		$id=$this->input->post('id');
		if($this->input->post('dashboard_nama')){
			//PROSES SIMPAN
			$data=array(
				'dashboard_nama'=>$this->input->post('dashboard_nama'),
				'dashboard_date'=>date('Y-m-d',strtotime($this->input->post('dashboard_date'))),
				'dashboard_keterangan'=>$this->input->post('dashboard_keterangan'),
				//'dashboard_aktif'=>$this->input->post('dashboard_aktif'),
			);
			$file='fileupload';
			if($_FILES[$file]['name']){
				if($this->fileupload($this->path,$file)){
					$this->hapus_file($id);
					$file=$this->upload->data('file_name');
					$data['dashboard_file']=$file;
					//print_r($data);
				}else{
					//$this->session->set_flashdata('error',$this->upload->display_errors());
					//redirect(site_url($this->default_url));
					$dt['error']=$this->upload->display_errors();
					return $this->output->set_output(json_encode($dt));
					exit();	
				}
			}			
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
		$this->hapus_file($id);
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
	public function download($file=null){
		if($file){
			$this->downloadfile($this->path,$file);
		}else{
			$this->session->set_flashdata('error','File tidak ditemukan');
			redirect(site_url($this->default_url));
		}
	}
	public function aktifasi(){
		############### ALL SET 0
		$prepare=array(
			'dashboard_aktif'=>0,
		);
		$qprepare=array(
			'tabel'=>$this->master_tabel,
			'data'=>$prepare,
		);
		$prepare=$this->Crud->update($qprepare);
		############### SET KE AKTIF
		$id=$this->input->post('id');
		$data=array(
			'dashboard_aktif'=>1,
		);
		$query=array(
			'tabel'=>$this->master_tabel,
			'data'=>$data,
			'where'=>array($this->id=>$id),
		);
		$update=$this->Crud->update($query);
		if($update){
			$dt['success']='Aktifasi sukses';
		}else{
			$dt['error']='Aktifasi gagal';
		}
		return $this->output->set_output(json_encode($dt));
	}
	*/

}
