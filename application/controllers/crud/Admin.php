<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('Crud');
		// if(($this->session->userdata('login')!=true) || ($this->session->userdata('level')!=1) ){
		// 	redirect(site_url('login/logout'));
		// }
	}
	//VARIABEL
	private $master_tabel="tb_alumni";
	private $default_url="crud/Admin/";
	private $default_view="crud/Admin/";
	private $view="template/backend";
	private $id="id";

	private function global_set($data){
		$data=array(
			'menu'=>'Crud',
			'submenu'=>$data['submenu'],
			'headline'=>$data['headline'],
			'url'=>$data['url'],
			'ikon'=>"fa fa-tasks",
			'view'=>"views\crud\admin\index.php",
			'detail'=>false,
			'edit'=>false,
			'delete'=>false,
		);
		return (object)$data;
	}	
	private function notifiaksi($param){
		if($param==1){
			$this->session->set_flashdata('success','proses berhasil');
		}else{
			$this->session->set_flashdata('error',$param);
		}		
	}
	public function fileupload($path,$file){
		$config=array(
			'upload_path'=>$path,
			'allowed_types'=>'pdf',
			'max_size'=>5000, //5MN
			'encrypt_name'=>true, //ENCTYPT
		);
		$this->load->library('upload',$config);
		return $this->upload->do_upload($file);
	}
	public function downloadfile($path,$file){
			$link=$path.$file;
			if(file_exists($link)){
				$url=file_get_contents($link);
				force_download($file,$url);
			}else{
				$this->session->set_flashdata('error','File tidak ditemukan');
				//redirect(site_url($this->default_url));	
			}						
	}		
	public function index()
	{
		$global_set=array(
			'submenu'=>false,
			'headline'=>'CRUD',
			'url'=>'crud/admin/',
		);
		$global=$this->global_set($global_set);
		if($this->input->post('submit')){
			//PROSES SIMPAN
			$data=array(
				'nama'=>$this->input->post('nama'),
				'tgllahir'=>date('Y-m-d',strtotime($this->input->post('tgllahir'))),
				'nomerhp'=>$this->input->post('nomerhp'),
				'desa'=>$this->input->post('desa'),
			);
			$file='fileupload';
			if($_FILES[$file]['name']){
				if($this->fileupload($this->path,$file)){
					$file=$this->upload->data('file_name');
					$data['pendaftaran_file']=$file;
					//print_r($data);
				}else{
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect(site_url($this->default_url));
				}
			}
			$query=array(
				'data'=>$data,
				'tabel'=>$this->master_tabel,
				'where'=>array('status'=>'lulus')
			);
			$insert=$this->Crud->insert($query);
			$this->notifiaksi($insert);
			redirect(site_url($this->default_url));
			//print_r($data);
		}else{
			$data=array(
				'global'=>$global,
			);			
			$this->load->view($this->view,$data);
			//print_r($data['data']);
		}
	}
	public function tabel(){
		$global_set=array(
			'submenu'=>false,
			'headline'=>'data',
			'url'=>'crud/admin/',
		);
		$global=$this->global_set($global_set);		
		//PROSES TAMPIL DATA
		$query=array(
			'tabel'=>$this->master_tabel,
			'where'=>array('status'=>'LULUS'),
			'order'=>array('kolom'=>'id','orderby'=>'DESC'),
			'limit'=>100,
			);
		$data=array(
			'global'=>$global,
			'data'=>$this->Crud->read($query)->result(),
		);
		//print_r($data['data']);
		$this->load->view($this->default_view.'tabel',$data);		
	}
	public function add(){
		$global_set=array(
			'submenu'=>false,
			'headline'=>'crud',
			'url'=>'crud/admin/', //AKAN DIREDIRECT KE INDEX
		);
		$user=array(
			'tabel'=>"user",
			'order'=>array('kolom'=>'user_id','orderby'=>'DESC'),
			);		
		$global=$this->global_set($global_set);
		$data=array(
			//'user'=>$this->Crud->read($user)->result(),
			'global'=>$global,
			);

		$this->load->view($this->default_view.'add',$data);		
	}	
	public function edit(){
		$global_set=array(
			'submenu'=>false,
			'headline'=>'edit data',
			'url'=>'crud/admin/edit',
		);
		$global=$this->global_set($global_set);
		$id=$this->input->post('id');
		if($this->input->post('submit')){
			$data=array(
				'nama'=>$this->input->post('nama'),
				'tgllahir'=>date('Y-m-d',strtotime($this->input->post('tgllahir'))),
				'nomerhp'=>$this->input->post('nomerhp'),
				'desa'=>$this->input->post('desa'),
				//'pendaftaran_tersimpan'=>date('Y-m-d')
			);
			// $file='fileupload';
			// if($_FILES[$file]['name']){
			// 	if($this->fileupload($this->path,$file)){
			// 		$file=$this->upload->data('file_name');
			// 		$data['pendaftaran_file']=$file;
			// 		//print_r($data);
			// 	}else{
			// 		$this->session->set_flashdata('error',$this->upload->display_errors());
			// 		redirect(site_url($this->default_url));
			// 	}
			// }			
			$query=array(
				'data'=>$data,
				'where'=>array($this->id=>$id),
				'tabel'=>$this->master_tabel,
				);
			$update=$this->Crud->update($query);
			$this->notifiaksi($update);
			redirect(site_url($this->default_url));
		}else{
			$query=array(
				'tabel'=>$this->master_tabel,
				'where'=>array('id'=>$id),
			);
			$user=array(
				'tabel'=>"user",
				'order'=>array('kolom'=>'user_id','orderby'=>'ASC'),
				);			
			$data=array(
				'data'=>$this->Crud->read($query)->row(),
				'global'=>$global,
			);
			//print_r($data['data']);
			$this->load->view($this->default_view.'edit',$data);
		}
	}	
	public function detail(){
		$global_set=array(
			'submenu'=>false,
			'headline'=>'detail pendaftaran',
			'url'=>'admin/pendaftaran/edit',
		);
		$global=$this->global_set($global_set);		
		$id=$this->input->post('id');
		$query=array(
			'select'=>'a.pendaftaran_id,a.pendaftaran_userid,a.pendaftaran_tgl,a.pendaftaran_judul,a.pendaftaran_keterangan,a.pendaftaran_file,a.pendaftaran_tersimpan,b.user_username,b.user_email',
			'tabel'=>'pendaftaran a',
			'join'=>array(array('tabel'=>'user b','ON'=>'b.user_id=a.pendaftaran_userid','jenis'=>'inner')),
			'order'=>array('kolom'=>'a.pendaftaran_id','orderby'=>'ASC'),
			'where'=>array('a.pendaftaran_id'=>$id),
		);
		$data=array(
			'data'=>$this->Crud->join($query)->row(),
			'global'=>$global,
		);
		$this->load->view($this->default_view.'detail',$data);		
	}
	public function hapus($id){
		$query=array(
			'tabel'=>$this->master_tabel,
			'where'=>array($this->id=>$id),
		);
		$delete=$this->Crud->delete($query);
		$this->notifiaksi($delete);
		redirect(site_url($this->default_url));
	}
	public function downloadberkas($file){
		$path=$this->path;
		$this->downloadfile($path,$file);
	}
}
