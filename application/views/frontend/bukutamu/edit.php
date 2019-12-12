<div class="row">
	<div class="col-sm-12 animated bounceInRight">
		<div class="box box-warning">
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
								<input readonly name="bukutamu_idkegiatan" value="<?= $data->bukutamu_idkegiatan?>" class="form-control"></input>
							</div>
							<div class="form-group">
								<label>Tanggal</label>
								<input type="text" readonly name="bukutamu_date" class="form-control" value="<?= date('d-m-Y',strtotime($data->bukutamu_date))?>">
							</div>							
							<div class="form-group">
								<label>Nama</label>
								<input required type="text" name="bukutamu_nama" class="form-control" title="Harus di isi" value="<?=$data->bukutamu_nama?>">
							</div>
							<div class="form-group">
								<label>No Telephone</label>
								<input required type="text" name="bukutamu_notlp" class="form-control" title="Harus di isi" value="<?=$data->bukutamu_notlp?>">
							</div>							
							<div class="form-group">
								<label>Email</label>
								<input required type="email" name="bukutamu_email" class="form-control" value="<?=$data->bukutamu_email?>">
							</div>							
							<div class="form-group">
								<label>Alamat</label>
								<textarea  required type="text" name="bukutamu_alamat" class="form-control" rows="5"><?=$data->bukutamu_alamat?></textarea>
							</div>
							<div class="form-group">
								<label>Instansi</label>
								<textarea  required type="text" name="bukutamu_instansi" class="form-control" rows="5"><?=$data->bukutamu_instansi?></textarea>
								<p class="help-block">Dapat di isi asal sekolah/instansi/perwakilan dari..</p>
							</div>																									 
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">						
							<div class="form-group">
								<button type="submit" value="submit" name="submit" class="btn btn-warning btn-block btn-flat">Update</button>
							</div>														
						</div>
					</div>
				</form>		
			</div>
		</div>		
	</div>	
</div>
<script type="text/javascript">
	//CKEDITOR.replace('editor1');	
</script>
<?php include 'action.php'?>