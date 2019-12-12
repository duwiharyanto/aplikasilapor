<div class="row">
	<div class="col-sm-2">
		<div class="form-group">
			<button onclick="add();" id="add" url="<?= base_url($global->url.'add.html')?>" class="btn btn-flat btn-block btn-primary"><span class="fa fa-plus"></span> Tambah</button>
		</div>			
	</div>	
</div>
<div class="row animated bounceInDown">
	<div class="col-sm-12">
		<div class="box box-primary">
		        <div class="box-header">
		          <h3 class="box-title">Tabel <?php echo ucwords($global->headline)?></h3>
		        </div>
		        <div class="box-body table-responsive">
		        	<table style="width:100%" id="datatabel2" class="table table-bordered table-striped">
		                <thead>
			                <tr>
			                  <th width="5%">No</th>
			                  <th width="15%">RM</th>
			                  <th width="15%">Nama</th>
			                  <th width="15%">Dokter</th>
			                  <th width="20%">Bangsal</th>
			                  <th width="20%">Penunjang</th>
			                  <th width="20%">Tgl.Analisis</th>
			                  <th width="20%">Tgl.Selesai Proses</th>
			                  <th width="20%">Lama Proses</th>
			                  <th width="10%" class="text-center">Aksi</th>
			                </tr>
		                </thead>
		                <tbody>
		                	<?php $i=1;foreach ($data as $row):?>
		                		<?php
		                		$analisis=date_create($row->tglanalisis);
		                		$selesaiproses=date_create($row->tglselesaiproses);
		                		$selisih  = date_diff($analisis,$selesaiproses);
		                		?>
			                	<tr>
			                		<td><?=$i?></td>
			                		<td><?=ucwords($row->norm)?></td>
			                		<td><?=ucwords($row->nama)?></td>
			                		<td><?=$row->dokter ? $row->dokter :'-'?><br>
			                		 <?=$row->id_formulir!= 0 ? '<span class="label label-primary">'.$row->formulir.'</span>':'-'?>
			                		</td>
			                		<td><?=$row->bangsal ? $row->bangsal:'-'?><br>
			                			<?=$row->id_formulirbangsal!= 0 ? '<span class="label label-primary">'.$row->id_formulirbangsal.'</span>':'-' ?> 
			                		</td>
			                		<td><?=$row->penunjang? $row->penunjang:'-'?><br>
										<?=$row->id_formulirbangsal!= 0 ? '<span class="label label-primary">'.$row->id_formulirpenunjang.'</span>':'-' ?> 			                			
			                		</td>
			                		<td><?=date('d-m-Y',strtotime($row->tglanalisis))?></td>
			                		<td><?=$row->tglselesaiproses ? date('d-m-Y',strtotime($row->tglselesaiproses)):'-'?></td>		                          
			                		<td><?=$selisih->d .' Hari'?></td>			
			                		<td class="text-center">
			                			<?php include 'button.php';?>
			                		</td>
			                	</tr>	                	
		                	<?php $i++;endforeach;?>
		                </tbody>            		
		        	</table>
		        	<p>Keterengan : <br>
		        		<a href="#" class="btn btn-flat btn-xs btn-info" style="width:25px"><span class="fa fa-pencil"></span></a> : Edit<br>
		        		<a href="#" class="btn btn-flat btn-xs btn-danger" style="width:25px"><span class="fa fa-trash"></span></a> : Hapus	
		        	</p>
		        </div>
		</div>		
	</div>
</div>
<?php include 'action.php'; ?>
<script type="text/javascript">
$('#datatabel2').DataTable( {
	dom: 'Bfrtip',
	pageLength:100,
    buttons: [
        {
            extend: 'excel',
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'pdf',
            exportOptions: {
                columns: ':visible'
            }
        }, 
        {
            extend: 'print',
            exportOptions: {
                columns: ':visible'
            }
        },                      
		'colvis'
    ],
	order: [[ 7, "desc" ]]    

} );	
</script>