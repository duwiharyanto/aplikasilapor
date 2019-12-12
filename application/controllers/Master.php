<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Master extends CI_Controller {
	public function __construct(){
		//$this->load->model('Crud');
		parent::__construct();
	}
	protected function notifiaksi($param){
		if($param==1){
			$this->session->set_flashdata('success','proses berhasil');
		}else{
			$this->session->set_flashdata('error',$param);
		}		
	}
	protected function cekadmin(){
		if($this->session->userdata('user_level')!=1 && $this->session->userdata('user_login')!=true){
			redirect(site_url());
		}
	}
	protected function ceklogin(){
		if($this->session->userdata('user_level')==1 && $this->session->userdata('user_login')==true){
			redirect(site_url('dashboard/dashboard'));
		}
	}	
	protected function fileupload($path,$file){
		$config=array(
			'upload_path'=>$path,
			'allowed_types'=>'pdf',
			'max_size'=>5000, //5MN
			'encrypt_name'=>true, //ENCTYPT
		);
		$this->load->library('upload',$config);
		return $this->upload->do_upload($file);
	}
	protected function downloadfile($path,$file){
		$link=$path.$file;
		if(file_exists($link)){
			$url=file_get_contents($link);
			force_download($file,$url);
		}else{
			$this->session->set_flashdata('error','File tidak ditemukan');
		}						
	}
	protected function matauang($param){
		$level1=str_replace('Rp ', '', $param);
		$level2=str_replace('.', '', $level1);
		return $level2;
	}
	protected function dumpdata($data){
		echo "<pre>";
		print_r($data);
	}
	protected function menu($levelakses){		
		$main_menu=array(
			'tabel'=>'menu',
			'where'=>array(array('menu_is_mainmenu'=>'0'),array('menu_status'=>'1'),array('menu_akses_level'=>$levelakses)),
			'order'=>array('kolom'=>'menu_urutan','orderby'=>'ASC'),
		);
		$menu_akhir=array();
		$menu=$this->Crud->read($main_menu)->result();
		if(count($menu)>0){
			foreach ($menu as $index => $row) {
				$menu_akhir[$index]=$row;
				$sub_menu=array(
					'tabel'=>'menu',
					'where'=>array('menu_is_mainmenu '=>$row->menu_id),
				);
				$submenu=$this->Crud->read($sub_menu)->result();
				if(count($submenu)>0){
					$menu_akhir[$index]->status=1;
					//$submenu=array();
					$menu_akhir[$index]->submenu=$submenu;
				}else{
					$menu_akhir[$index]->status=0;
					$menu_akhir[$index]->submenu=0;
				}				
			}
		}
		return $menu_akhir;		
	}
	/**/
	protected function menu_backendold($levelakses){
		$main_menu=array(
			'tabel'=>'menu',
			'where'=>array(array('menu_is_mainmenu'=>'0'),array('menu_status'=>'1'),array('menu_akses_level'=>$levelakses),array('menu_akses'=>1)),
			'order'=>array('kolom'=>'menu_urutan','orderby'=>'ASC'),
		);
		$menu_akhir=array();
		$menu=$this->Crud->read($main_menu)->result();
		if(count($menu)>0){
			foreach ($menu as $index => $row) {
				$menu_akhir[$index]=$row;
				$sub_menu=array(
					'tabel'=>'menu',
					'where'=>array(array('menu_is_mainmenu'=>$row->menu_id)),
				);
				$submenu=$this->Crud->read($sub_menu)->result();
				if(count($submenu)>0){
					$menu_akhir[$index]->status=1;
					//$submenu=array();
					$menu_akhir[$index]->submenu=$submenu;
				}else{
					$menu_akhir[$index]->status=0;
					$menu_akhir[$index]->submenu=0;
				}				
			}
		}
		return $menu_akhir;		
	}
		
	protected function prosescetak($data){
		$nama_dokumen=$data['judul']; //Beri nama file PDF hasil.
		require_once('./asset/mPDF/mpdf.php');
		$mpdf= new mPDF('c','A4-Pa','',0,20,20,20,20);	
		// $mpdf->SetHTMLHeader('
		// <div style="text-align: left; font-weight: bold;">
		//     <img src="./asset/dist/img/avatar6.png" width="60px" height="60px">'.$nama_dokumen.'
		// </div>');
		$mpdf->SetHTMLFooter('
		<table width="100%">
		    <tr>
		        <td width="33%">{DATE j-m-Y}</td>
		        <td width="33%" align="center">{PAGENO}/{nbpg}</td>
		        <td width="33%" style="text-align: right;">'.$nama_dokumen.'</td>
		    </tr>
		</table>');		
		$mpdf->WriteHTML($data['view']);
		$mpdf->Output($nama_dokumen.".pdf",'I');		
	}
	protected function barcode($param){
		include "./asset/phpqrcode/qrlib.php"; 
		$tempdir = "./barcode/";
		#parameter inputan
		$isi_teks = $param;
		$namafile = $param.'.png';
		$quality = 'H'; //ada 4 pilihan, L (Low), M(Medium), Q(Good), H(High)
		$ukuran = 5; //batasan 1 paling kecil, 10 paling besar
		$padding = 0;
		QRCode::png($isi_teks,$tempdir.$namafile,$quality,$ukuran,$padding);
		$path="barcode/".$namafile;
		return base_url($path);		
	}
	protected function menu_backend($levelakses){
		$akses_menu=array(
			'tabel'=>'menu',
			'where'=>array(array('menu_is_mainmenu'=>'0'),array('menu_status'=>'1'),array('menu_akses'=>1)),
			'order'=>array('kolom'=>'menu_urutan','orderby'=>'ASC'),
		);
		$_aksesmenu=$this->Crud->read($akses_menu)->result();	
		$menu_akhir=array();
		foreach ($_aksesmenu as $index => $var) {			
			$_akseslevel=explode(',', $var->menu_akses_level);
			foreach ($_akseslevel as $_userakses) {			
				if($levelakses==$_userakses){
					if($_aksesmenu){
						$menu_akhir[$index]=$var;
						$sub_menu=array(
							'tabel'=>'menu',
							'where'=>array(array('menu_is_mainmenu'=>$var->menu_id)),
						);
						$submenu=$this->Crud->read($sub_menu)->result();
						if(count($submenu)>0){
							$menu_akhirsubmenu=array();
							foreach ($submenu as $indexsubmenu => $varsubmenu) {
								$_aksessubmenulevel=explode(',', $varsubmenu->menu_akses_level);
								foreach ($_aksessubmenulevel as $_useraksessubmenu) {
									//echo $_useraksessubmenu.' = '.$levelakses.'<br>';	
									if($_useraksessubmenu==$levelakses){
										$menu_akhirsubmenu[$indexsubmenu]=$varsubmenu;									
									}
								}
																
							}
							$menu_akhir[$index]->status=1;
							$menu_akhir[$index]->submenu=$menu_akhirsubmenu;
							
						}else{
							$menu_akhir[$index]->status=0;
							$menu_akhir[$index]->submenu=0;											
						}						

					}
					//return 
					
				}
			}
		}
		return $menu_akhir;	
		// print_r($menu_akhir) ;	
		// exit();	
	}				
}
