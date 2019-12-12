<div class="row">
	<div class="col-sm-12 animated bounceInRight">
		<div class="box box-warning">
			<div class="box-header with-border">
				<h3 class="box-title"><?= ucwords($global->headline)?></h3>
			</div>
			<div class="box-body">
				<form id="formadd" method="POST" action="<?= base_url($global->url)?>" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Id</label>
								<input readonly type="text" name="id" value="<?= $data->id?>" class="form-control">
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" name="nama" class="form-control text-capitalize" value="<?= $data->nama?>">
							</div>
							<div class="form-group">
								<label>Tanggal Lahir</label>
								<input type="text" name="tgllahir" class="datepicker form-control" value="<?= date('d-m-Y',strtotime($data->tgllahir))?>">
							</div>
							<div class="form-group">
								<label>Nomor Telp.</label>
								<input type="text" name="nomerhp" class="form-control" value="<?= $data->nomerhp?>">
							</div>	
							<div class="form-group">
								<label>Alamat</label>
								<textarea class="form-control text-capitalize" rows="3" name="desa"><?= $data->desa?></textarea>
							</div>																																											 
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group hide">
								<label>Foto</label>
								<input type="file" name="fileupload">
								<p class="help-block">Ukuran maksimal 5mb, jpg atau png</p>
							</div>							
							<div class="form-group">
								<button type="submit" value="submit" name="submit" class="btn btn-warning btn-block btn-flat">Simpan</button>
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
<?php include 'action.js'?>