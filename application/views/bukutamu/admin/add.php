<div class="row">
	<div class="col-sm-12 animated bounceInRight">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?= ucwords($global->headline)?></h3>
				<button type="button" onclick="loaddata()" class="btn btn-xs pull-right btn-danger btn-flat"><i class="fa fa-arrow-left"></i> Kembali</button>
			</div>
			<div class="box-body">
				<form id="formadd" method="POST" action="javascript:void(0)" url="<?= base_url($global->url)?>"  enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Id Kegiatan</label>
								<input readonly name="bukutamu_idkegiatan" value="<?= $idkegiatan?>" class="form-control"></input>
							</div>
							<div class="form-group">
								<label>Tanggal</label>
								<input type="text" readonly name="bukutamu_date" class="form-control" value="<?= date('d-m-Y')?>">
							</div>							
							<div class="form-group">
								<label>Nama</label>
								<input required type="text" name="bukutamu_nama" class="form-control" title="Harus di isi">
							</div>
							<div class="form-group">
								<label>No Telephone</label>
								<input required type="text" name="bukutamu_notlp" class="form-control" title="Harus di isi">
							</div>							
							<div class="form-group">
								<label>Email</label>
								<input required type="email" name="bukutamu_email" class="form-control">
							</div>							
							<div class="form-group">
								<label>Alamat</label>
								<textarea  required type="text" name="bukutamu_alamat" class="form-control" rows="5"></textarea>
							</div>
							<div class="form-group">
								<label>Instansi</label>
								<textarea  required type="text" name="bukutamu_instansi" class="form-control" rows="5"></textarea>
								<p class="help-block">Dapat di isi asal sekolah/instansi/perwakilan dari..</p>
							</div>																									 
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">						
							<div class="form-group">
								<button type="submit" value="submit" name="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
							</div>														
						</div>
					</div>
				</form>		
			</div>
		</div>		
	</div>	
</div>
<?php include 'action.php';?>
<script type="text/javascript">
	//CKEDITOR.replace('editor1');
</script>
