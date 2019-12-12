<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//include controller master 
include APPPATH.'controllers/Master.php';

class Skm extends Master {
	public function __construct(){
		parent::__construct();
		$this->load->model('Crud');
		// if(($this->session->userdata('login')!=true) || ($this->session->userdata('level')!=1) ){
		// 	redirect(site_url('login/logout'));
		// }
		//$this->cekadmin();
	}
	//VARIABEL
	private $master_tabel="skm"; //Mendefinisikan Nama Tabel
	private $id="id_skm";	//Menedefinisaikan Nama Id Tabel
	private $default_url="skm/admin/"; //Mendefinisikan url controller
	private $default_view="skm/admin/"; //Mendefinisiakn defaul view
	private $view="template/gleam"; //Mendefinisikan Tamplate Root
	private $path='./upload/';

	private function global_set($data){
		$data=array(
			'menu'=>'rekam medis',//Seting menu yang aktif
			'menu_submenu'=>'skm',
			'headline'=>$data['headline'], //Deskripsi Menu
			'url'=>$data['url'], //Deskripsi URL yang dilewatkan dari function
			'ikon'=>"fa fa-tasks",
			'view'=>"views/skm/admin/index.php",
			'detail'=>false,
			'cetak'=>false,
			'edit'=>true,
			'delete'=>true,
			'download'=>false,
		);
		return (object)$data; //MEMBUAT ARRAY DALAM BENTUK OBYEK
		//$data->menu=skm, bentuk obyek
		//$data['menu']=skm, array bentuk biasa
	}
	// private function hapus_file($id){
	// 	$query=array(
	// 		'tabel'=>$this->master_tabel,
	// 		'where'=>array(array($this->id=>$id)),
	// 	);
	// 	$file=$this->Crud->read($query)->row();
	// 	unlink($this->path.$file->user_file);
	// }
	private function get_dokter(){
		$query=array(
			'tabel'=>'dokter',
			'order'=>array('kolom'=>'id','orderby'=>'DESC'),
		);
		$data=$this->Crud->read($query)->result();
		//$this->viewdata($data);			
		return $data;
	}
	private function get_dokterpenganti(){
		$query=array(
			'tabel'=>'dokter',
			'where'=>array(array('penandatanganan'=>1)),
			'order'=>array('kolom'=>'id','orderby'=>'DESC'),
		);
		$data=$this->Crud->read($query)->result();
		//$this->viewdata($data);			
		return $data;
	}				
	public function index()
	{
		$global_set=array(
			'headline'=>'Surat Keterangan Medis(skm)',
			'url'=>$this->default_url,
		);
		$global=$this->global_set($global_set);
		//CEK SUBMIT DATA
		if($this->input->post('submit')){
			//PROSES SIMPAN
			$data=array(
				'no_rm'=>$this->input->post('no_rm'),
				'nama_pasien'=>$this->input->post('nama_pasien'),
				'id_dokter_dpjp'=>$this->input->post('id_dokter_dpjp'),
				'id_dokter_penganti'=>$this->input->post('id_dokter_penganti'),
				'tgl_pengajuan'=>date('Y-m-d',strtotime($this->input->post('tgl_pengajuan'))),
			);
			if($this->input->post('tgl_proses')){
				$data['tgl_proses']=date('Y-m-d',strtotime($this->input->post('tgl_proses')));
			}
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
				// 'menu'=>$this->menu_backend($this->session->userdata('user_level')),
				'menu'=>$this->menu_backend(1),
			);
			//$this->viewdata($data);			
			$this->load->view($this->view,$data);
		}
	}
	public function tabel(){
		$global_set=array(
			'headline'=>'skm',
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
			'select'=>'a.*,b.dokter,c.dokter AS dokterpenganti',
			'tabel'=>'skm a',
			'join'=>array(
				array('tabel'=>'dokter b', 'ON'=>'b.id=a.id_dokter_dpjp','jenis'=>'INNER'),
				array('tabel'=>'dokter c', 'ON'=>'c.id=a.id_dokter_penganti','jenis'=>'INNER'),
			),
		);		
		$data=array(
			'global'=>$global,
			'data'=>$this->Crud->join($query)->result(),
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
		if($this->input->post('no_rm')){
			//PROSES SIMPAN
			$data=array(
				'no_rm'=>$this->input->post('no_rm'),
				'nama_pasien'=>$this->input->post('nama_pasien'),
				'id_dokter_dpjp'=>$this->input->post('id_dokter_dpjp'),
				'id_dokter_penganti'=>$this->input->post('id_dokter_penganti'),
				'tgl_pengajuan'=>date('Y-m-d',strtotime($this->input->post('tgl_pengajuan'))),
			);
			if($this->input->post('tgl_proses')){
				$data['tgl_proses']=date('Y-m-d',strtotime($this->input->post('tgl_proses')));
			}
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
				'dokter'=>$this->get_dokter(),
				'dokterpenganti'=>$this->get_dokterpenganti(),				
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
			'dokter'=>$this->get_dokter(),
			'dokterpenganti'=>$this->get_dokterpenganti(),
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
