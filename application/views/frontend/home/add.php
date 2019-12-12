<div class="row">
	<div class="col-sm-12 animated bounceInRight">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title"><?= ucwords($global->headline)?></h3>
			</div>
			<div class="box-body">
				<form id="formadd" method="POST" action="<?= base_url($global->url)?>" enctype="multipart/form-data">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label>Tanggal</label>
								<input type="text" readonly name="user_terdaftar" class="form-control" value="<?= date('d-m-Y')?>">
							</div>
							<div class="form-group">
								<label>Level</label>
								<select class="selectdata form-control" name="user_level" style="width:100%">
									<option value="1">Admin</option>
									<option value="2">User</option>
								</select>
							</div>								
							<div class="form-group">
								<label>Nama</label>
								<input required type="text" name="user_nama" class="form-control" title="Harus di isi">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input required type="text" name="user_username" class="form-control">
							</div>	
							<div class="form-group">
								<label>Password</label>
								<input required type="password" name="user_password" class="form-control">
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
<script type="text/javascript">
	//CKEDITOR.replace('editor1');
</script>
<?php include 'action.php';?>