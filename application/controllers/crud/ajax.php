<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include controller master 
include APPPATH.'controllers/Master.php';

class kegiatan extends Master {
	public function __construct(){
		parent::__construct();
		$this->load->model('Crud');
		// if(($this->session->userdata('login')!=true) || ($this->session->userdata('level')!=1) ){
		// 	redirect(site_url('login/logout'));
		// }
	}
	//VARIABEL
	private $master_tabel="kegiatan"; //Mendefinisikan Nama Tabel
	private $id="kegiatan_id";	//Menedefinisaikan Nama Id Tabel
	private $default_url="frontend/kegiatan/"; //Mendefinisikan url controller
	private $default_view="frontend/kegiatan/"; //Mendefinisiakn defaul view
	private $view="template/webfrontend"; //Mendefinisikan Tamplate Root
	private $path='./upload/';

	private function global_set($data){
		$data=array(
			'menu'=>'kegiatan',//Seting menu yang aktif
			'menu_submenu'=>false,
			'headline'=>$data['headline'], //Deskripsi Menu
			'url'=>$data['url'], //Deskripsi URL yang dilewatkan dari function
			'ikon'=>"fa fa-tasks",
			'view'=>"views/frontend/kegiatan/index.php",
			'detail'=>false,
			'cetak'=>false,
			'edit'=>true,
			'delete'=>true,
		);
		return (object)$data; //MEMBUAT ARRAY DALAM BENTUK OBYEK
		//$data->menu=kegiatan, bentuk obyek
		//$data['menu']=kegiatan, array bentuk biasa
	}
	private function hapus_file($id){
		$query=array(
			'tabel'=>$this->master_tabel,
			'where'=>array(array($this->id=>$id)),
		);
		$file=$this->Crud->read($query)->row();
		unlink($this->path.$file->kegiatan_file);
	}
	public function index()
	{
		$global_set=array(
			'headline'=>'kegiatan',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		//CEK SUBMIT DATA
		if($this->input->post('kegiatan_nama')){
			//PROSES SIMPAN
			$data=array(
				'kegiatan_nama'=>$this->input->post('kegiatan_nama'),
				'kegiatan_date'=>date('Y-m-d',strtotime($this->input->post('kegiatan_date'))),
				'kegiatan_keterangan'=>$this->input->post('kegiatan_keterangan'),
			);
			$file='fileupload';
			if($_FILES[$file]['name']){
				if($this->fileupload($this->path,$file)){
					$file=$this->upload->data('file_name');
					$data['kegiatan_file']=$file;
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
				'menu'=>$this->menu(0),
			);
			//$this->viewdata($data);			
			$this->load->view($this->view,$data);
		}
	}
	public function tabel(){
		$global_set=array(
			'headline'=>'kegiatan',
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
	public function edit(){
		$global_set=array(
			'headline'=>'edit data',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		$id=$this->input->post('id');
		if($this->input->post('kegiatan_nama')){
			//PROSES SIMPAN
			$data=array(
				'kegiatan_nama'=>$this->input->post('kegiatan_nama'),
				'kegiatan_date'=>date('Y-m-d',strtotime($this->input->post('kegiatan_date'))),
				'kegiatan_keterangan'=>$this->input->post('kegiatan_keterangan'),
			);
			$file='fileupload';
			if($_FILES[$file]['name']){
				if($this->fileupload($this->path,$file)){
					$this->hapus_file($id);
					$file=$this->upload->data('file_name');
					$data['kegiatan_file']=$file;
					//print_r($data);
				}else{
					//$this->session->set_flashdata('error',$this->upload->display_errors());
					//redirect(site_url($this->default_url));
					$dt['upload']=$this->upload->display_errors();
					//return $this->output->set_output(json_encode($dt));
					//exit();	
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
			return $this->output->set_content_type('aplication/json')->set_output(json_encode($dt));			
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

}
