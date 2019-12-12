<div class="row">
	<div class="offset-md-2 col-md-8 grid-margin stretch-card">
	  <div class="card">
	    <div class="card-body">
	      <h4 class="card-title"><?= ucwords($global->headline)?> <small class="float-right"><button  onclick ="loaddata()"  class="btn btn-danger btn-sm"><i class=" mdi mdi-keyboard-backspace "></i>                                                    
	      		Kembali</button></small></h4>
	      <p class="card-description ">
	        
	      </p>
	      <form id="formadd" method="POST" action="javascript:void(0)" url="<?= base_url($global->url)?>"  enctype="multipart/form-data">
	      	<div class="row">
	      		<div class="col-sm-12">
					<div class="form-group">
						<label>Nama</label>
						<input required type="text" name="lapor_nama" class="form-control">
					</div>							
					<div class="form-group">
						<label>Email</label>
						<input required type="email" name="lapor_email" class="form-control">
					</div>
					<div class="form-group">
						<label>Laporan</label>
						<textarea required class="form-control" name="lapor_lapor" rows="5"></textarea>
					</div>													
	      			<div>
	      				<label class="text-primary">Status</label>
	      				<div class="radio">
	      					<label style="padding-right: 20px">
	      						<input required name="lapor_status" value="0" type="radio"  checked="checked">
	      						<span class="badge badge-danger">Open</span>
	      					</label>
	      					<label style="padding-right: 20px">
	      						<input required required name="lapor_status" value="1" type="radio">
	      						<span class="badge btn-success">Close</span>
	      					</label>
	      					<label style="padding-right: 20px">
	      						<input required required name="lapor_status" value="2" type="radio">
	      						<span class="badge badge-warning">Pending</span>
	      					</label>		      									                    
	      				</div>								
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

