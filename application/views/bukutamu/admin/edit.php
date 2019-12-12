<div class="row">
	<div class="col-sm-12 animated bounceInRight">
		<div class="box box-warning">
			<div class="box-header with-border">
				<h3 class="box-title"><?= ucwords($global->headline)?></h3>
								<button type="button" onclick="loaddata()" class="btn btn-xs pull-right btn-danger btn-flat"><i class="fa fa-arrow-left"></i> Kembali</button>
			</div>
			<div class="box-body">
				<form id="formadd" method="POST" onsubmit="update()" action="javascript:void(0)" url="<?= base_url($global->url.'edit')?>" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Id</label>
								<input required readonly type="text" name="id" class="form-control" value="<?= $data->kegiatan_id?>" title="Harus di isi">
							</div>						
							<div class="form-group">
								<label>Tanggal</label>
								<input type="text" readonly name="kegiatan_date" class="form-control" value="<?= date('d-m-Y',strtotime($data->kegiatan_date))?>">
							</div>							
							<div class="form-group">
								<label>Kegiatan</label>
								<input required type="text" name="kegiatan_nama" class="form-control" title="Harus di isi" value="<?= $data->kegiatan_nama?>">
							</div>
							<div class="form-group">
								<label>Keterangan</label>
								<textarea  title="Harus di isi" required type="text" name="kegiatan_keterangan" class="form-control" rows="5"><?= $data->kegiatan_keterangan?></textarea>
							</div>
							<div class="form-group">
								<label>File</label>
								<input type="file" name="fileupload"></input>
								<p class="biarkan kosong jika tidak diupdate"></p>
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