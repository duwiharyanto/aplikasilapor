<div class="row">
	<div class="col-sm-12 animated bounceInDown">
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
								<label>No RM</label>
								<input type="text" required name="norm" class="form-control">
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" required name="nama" class="form-control">
							</div>							
							<div class="form-group bg-red">
								<label>Dokter</label>
								<select type="text" name="dokter" class="form-control select2" style="width: 100%">
									<option value="">Pilih Salah Satu</option>
									<?php foreach ($dokter as $row):?>
										<option value="<?= $row->id?>"><?= $row->dokter?></option>
									<?php endforeach;?>
								</select>
							</div>								
							<div class="form-group bg-orange">
								<label>Bangsal</label>
								<select type="text" name="bangsal" class="form-control select2" style="width: 100%">
									<option value="">Pilih Salah Satu</option>
									<?php foreach ($bangsal as $row):?>
										<option value="<?= $row->id?>"><?= $row->bangsal?></option>
									<?php endforeach;?>
								</select>								
							</div>
							<div class="form-group bg-primary">
								<label>Lain-lain</label>
								<select type="text" name="penunjang" class="form-control select2" style="width: 100%">
									<option value="">Pilih Salah Satu</option>
									<?php foreach ($penunjang as $row):?>
										<option value="<?= $row->id?>"><?= $row->penunjang?></option>
									<?php endforeach;?>
								</select>									
							</div>				
																							
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Tanggal Pengajuan</label>
								<input type="text"  required name="tglpengajuan" class="form-control datetime">
							</div>	
							<div class="form-group">
								<label>Selesai Proses</label>
								<input type="text"  name="tglselesaiproses" class="form-control datetime">
							</div>	
							<div class="form-group bg-red">
								<label>Formulir Dokter</label>
								<select type="text" name="formulir" class="form-control select2" style="width: 100%">
									<option value="">Pilih Salah Satu</option>
									<?php foreach ($formulir as $row):?>
										<option value="<?= $row->id?>"><?= $row->formulir?></option>
									<?php endforeach;?>
								</select>								
							</div>
							<div class="form-group bg-orange">
								<label>Formulir Bangsal</label>
								<select type="text" name="formulirbangsal" class="form-control select2" style="width: 100%">
									<option value="">Pilih Salah Satu</option>
									<?php foreach ($formulir as $row):?>
										<option value="<?= $row->id?>"><?= $row->formulir?></option>
									<?php endforeach;?>
								</select>								
							</div>
							<div class="form-group bg-primary">
								<label>Formulir Lain-lain</label>
								<select type="text" name="formulirpenunjang" class="form-control select2" style="width: 100%">
									<option value="">Pilih Salah Satu</option>
									<?php foreach ($formulir as $row):?>
										<option value="<?= $row->id?>"><?= $row->formulir?></option>
									<?php endforeach;?>
								</select>								
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
	$(".datetime").datepicker({
		format: "dd-mm-yyyy",
	    autoclose: true,
	    todayHighlight: true,
	    todayBtn: true,					
	});
	$(".select2").select2();
</script>
