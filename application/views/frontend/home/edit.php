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
								<input required readonly type="text" name="id" class="form-control" value="<?= $data->user_id?>" title="Harus di isi">
							</div>						
							<div class="form-group">
								<label>Tanggal</label>
								<input type="text" readonly name="user_terdaftar" class="form-control" value="<?= date('d-m-Y',strtotime($data->user_terdaftar))?>">
							</div>
							<div class="form-group">
								<label>Level</label>
								<select class="selectdata form-control" name="user_level" style="width:100%">
									<option value="1" <?= $data->user_level==1 ? 'selected':''?>>Admin</option>
									<option value="2" <?= $data->user_level==2 ? 'selected':''?>>User</option>
								</select>
							</div>								
							<div class="form-group">
								<label>Nama</label>
								<input required type="text" name="user_nama" class="form-control" value="<?= $data->user_nama?>" title="Harus di isi">
							</div>
							<div class="form-group">
								<label>Username</label>
								<input required type="text" name="user_username" value="<?= $data->user_username?>" class="form-control">
							</div>	
							<div class="form-group">
								<label>Password</label>
								<input required type="password" id="password" name="user_password" value="<?= $data->user_password?>" class="form-control">
							</div>	
							<div class="form-group">
								<label>Tulis Ulang Password</label>
								<input required type="password" name="user_tulisulangpassword" value="<?= $data->user_password?>" class="form-control" equalTo="#password" title="Tulis ulang password">
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