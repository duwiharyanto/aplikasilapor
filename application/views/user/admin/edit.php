
<div class="row">
	<div class="offset-md-3 col-md-6 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title"><?= ucwords($global->headline)?><small class="float-right"><button  onclick ="loaddata()"  class="btn btn-danger btn-sm"><i class=" mdi mdi-keyboard-backspace "></i>                                                    
	      		Kembali</button></small></h4>
	      <p class="card-description">

	      </p>  
	      <form id="formadd" method="POST" onsubmit="update()" action="javascript:void(0)" url="<?= base_url($global->url.'edit')?>" enctype="multipart/form-data">
	      	<div class="row">
	      		<div class="col-sm-12">
	      			<div class="form-group">
	      				<label>Tanggal Terdaftar</label>
	      				<input type="text" readonly name="user_terdaftar" class="form-control" value="<?= date('d-m-Y',strtotime($data->user_terdaftar))?>">
	      			</div>	
	      			<div class="form-group">
	      				<label>id</label>
	      				<input required type="text" name="id" class="hide form-control" title="Harus di isi" value="<?=$data->user_id?>">
	      			</div>													
	      			<div class="form-group">
	      				<label>Nama</label>
	      				<input required type="text" name="user_nama" class="form-control" title="Harus di isi" value="<?=$data->user_nama?>">
	      			</div>
	      			<div class="form-group">
	      				<label>Username</label>
	      				<input required name="user_username" class="form-control" type="text" value="<?=$data->user_username?>"></input>
	      			</div>
	      			<div class="form-group">
	      				<label>Password</label>
	      				<input required id="password" name="user_password" class="form-control" type="password" value="<?= $data->user_password?>"></input>
	      			</div>
	      			<div class="form-group">
	      				<label>Confirm Password</label>
	      				<input required class="form-control" type="password" equalto="#password" value="<?= $data->user_password?>"></input>
	      			</div>														
	      			<div>
	      				<label>Level </label>
	      				<div class="radio">
	      					<label style="padding-right: 20px">
	      						<input required name="user_level" value="1" type="radio" <?= $data->user_level==1? 'checked':''?>>
	      						Admin
	      					</label>
	      					<label>
	      						<input <?= $data->user_level==0 ? 'checked':''?> required name="user_level" value="0" type="radio">
	      						User
	      					</label>				                    
	      				</div>								
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
<?php include 'action.php'?>