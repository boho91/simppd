<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('DPA'),
		
    )
);
$this->menu=array(
//array('label'=>'List Rka','url'=>array('index')),
array('label'=>'Tambah DPA','url'=>array('create'),'buttonType'=> 'link','context' => 'info','htmlOptions'=>array('id'=>'btn_tambah')),
);

Yii::app()->clientScript->registerScript('search', "
$('#btn_tambah').click(function(){
		waitingDialog.show();
		$.post('index.php?r=dpa/modalForm&skpd=".$model->skpd."',function(evt){
			$('#dialog2 #modal_content').html(evt);
			$('#dialog2 #tombolaksi').html('Tambah');
			waitingDialog.hide();
			$('#dialog2').modal('show'); 
			
		});
		
		return false;
});
jQuery(document).on('click','#rka-id a#tambah_sub_uraian',function() {
	waitingDialog.show();
		url = $(this).attr('href');
		$.post(url,function(evt){
			$('#dialog2 #modal_content').html(evt);
			$('#dialog2 #tombolaksi').html('Tambah');
			waitingDialog.hide();
			$('#dialog2').modal('show'); 
			
		});
		
		return false;
});
jQuery(document).on('click','#rka-id a#tambah_item',function() {
	waitingDialog.show();
		url = $(this).attr('href');
		$.post(url,function(evt){
			$('#dialog2 #modal_content').html(evt);
			$('#dialog2 #tombolaksi').html('Tambah');
			waitingDialog.hide();
			$('#dialog2').modal('show'); 
			
		});
		
		return false;
});


$('#dialog2 #tombolaksi').click(function(){
		$(this).parent().parent().find('form').submit();
		return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('rka-grid', {
data: $(this).serialize()
});
return false;
});
$('#program').change(function(){
	program = $(this).val();
	skpd = $('#skpd').val();
	$.post('index.php?r=kegiatanSkpd/drowdown_kegiatan',{program:program,skpd:skpd},function(evt){
		$('#kegiatan').html(evt);
	});
});
$('#skpd').change(function(){
	skpd = $('#skpd').val();
	$.post('index.php?r=kegiatanSkpd/drowdown_program',{skpd:skpd},function(evt){
		$('#program').html(evt);
	});
});
");
?>
<?php 
echo "<script>

</script>
";?>
<section class="content-header">

<h1>Data DPA</h1>

<p>
	<small>
	</small>
</p>
<?php //echo $this->renderPartial('form_awal', array('model'=>$model)); ?>

<div class="search-forms">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
</section>
<?php 
if(isset($search))
{?>
<section class="content">

<?php 
$alokasiPagu = $alokasiPagu*1;
if($alokasiPagu>=0 && $data->kegiatan!="")
{
	?>
	
	
<?php
}
	$dataProvider = $model->search();
	if($dataProvider->itemCount>0)
	{
		?>
		<div class="box box-info">
		<div class="box-header">
			<h3 class="box-title">Alokasi Anggaran pada DPA SKPD </h3>
			<div class="box-tools pull-right">
				<div class="label bg-aqua">Info</div>
			</div>
		</div>
		<div class="box-body">
		<div class='col-md-12'>
				<p>
					Program : <code><?php echo $data->kegiatan_->program_->program?></code>
					Kegiatan : <code><?php echo $data->kegiatan_->kegiatan?></code>
					Tahun Anggaran : <code><?php echo $data->tahun?></code>
				</p>
				<p>
					Alokasi Anggaran : <strong><?php echo AplikasiKomponen::uang($alokasiPagu)?></strong>
				</p>
				<p>
					Dianggarkan : <strong><?php echo AplikasiKomponen::uang($jumlahPagu)?></strong>
				</p>
				<p>
					Sisa Anggaran : <strong><?php echo AplikasiKomponen::uang($alokasiPagu-$jumlahPagu)?></strong>
				</p><hr>
		</div>
		
		<table class='col-md-9'>
			<h3 class="box-title">Indikator dan Tolok Ukur Kinerja </h3>
			<tr>
				<td>Indikator</td><td>Tolok Ukur Kinerja</td><td>Target Kinerja</td>
			</tr>
			<tr>
				<td>Capaian Program</td>
				<td>
					<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
						array(
							'type' => 'text',
							'model' => $data,
							'attribute' => 'capaian_program', // $model->name will be editable
							'url' => $this->createUrl('dpa/gridUpdate'),
								//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
							'name'=>"capaian_program",
							'inputclass' => 'col-md-3 ',
							'options' => array(
							'placement' => 'top',
							'success' => 'js: function(data) {
								//location.reload(); 
							}',
							),
						)
					);
					?>	
				</td>
				<td>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $data,
						'attribute' => 'target_capaian_program', // $model->name will be editable
						'url' => $this->createUrl('dpa/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"target_capaian_program",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>	
				</td>
			</tr>
			<tr>
				<td>Masukan</td>
				<td>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $data,
						'attribute' => 'masukan', // $model->name will be editable
						'url' => $this->createUrl('dpa/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"masukan",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>	
				</td>
				<td>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $data,
						'attribute' => 'target_masukan', // $model->name will be editable
						'url' => $this->createUrl('dpa/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"target_masukan",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>	
				</td>
			</tr>
			<tr>
				<td>Keluaran</td>
				<td>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $data,
						'attribute' => 'keluaran', // $model->name will be editable
						'url' => $this->createUrl('dpa/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"keluaran",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>	
				</td>
				<td>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $data,
						'attribute' => 'target_keluaran', // $model->name will be editable
						'url' => $this->createUrl('dpa/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"target_keluaran",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>	
				</td>
			</tr>
			<tr>
				<td>Hasil</td>
				<td>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $data,
						'attribute' => 'hasil', // $model->name will be editable
						'url' => $this->createUrl('dpa/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"hasil",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>	
				</td>
				<td>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $data,
						'attribute' => 'target_hasil', // $model->name will be editable
						'url' => $this->createUrl('dpa/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"target_hasil",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							//location.reload(); 
						}',
						),
					)
				);
				?>	
				</td>
			</tr>
			<tr>
				<td>Sumber Dana</td>
				<td colspan=2>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'select',
						'model' => $data,
						'source'=>$this->createUrl('sumberDana/getvalues'),
						'attribute' => 'sumber_dana', // $model->name will be editable
						'url' => $this->createUrl('dpa/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"sumber_dana",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							location.reload(); 
						}',
						),
						
					)
				);
				?>	
				</td>
			</tr>
			<tr>
				<td>Sasaran Kegiatan</td>
				<td colspan=2>
				<?php 
				    $this->widget(
					'booster.widgets.TbEditableField',
					array(
						'type' => 'text',
						'model' => $data,
						'attribute' => 'sasaran_kegiatan', // $model->name will be editable
						'url' => $this->createUrl('dpa/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
						'name'=>"sasaran_kegiatan",
						'inputclass' => 'col-md-3 ',
						'options' => array(
						'placement' => 'top',
						'success' => 'js: function(data) {
							location.reload(); 
						}',
						),
					)
				);
				?>	
				</td>
			</tr>
		</table>
		<div class='clear'></div>
		</div>
		</div>
		<?php 
	}
	//echo CHtml::tag('h3',array(),'Kegiatan : "'.$model->search()->getData()->kegiatan_->kegiatan.'"');
		$this->widget('ext.SilcomTreeGridView.SilcomTreeGridView', array(
                'id'=>'rka-id',
				'enableSorting' => false,
                'treeViewOptions'=>array(
                    'initialState'=>'expanded',
                    'expandable'=>true,
                ),
				'ajaxUpdate' => false,
                'parentColumn'=>'parent_id',
                'dataProvider'=>$dataProvider,
                'columns'=>
						array(
						array(
						'class'=>'CDataColumn',
						'htmlOptions'=>array('width'=>350),
						'type'=>'raw',
						'filter'=> '',
						'name'=>'uraianKegiatan',
						'value'=>'$data->uraianKegiatan',
						'filter'=> '',
					),
					
						array(
						'class'=>'CDataColumn',
						'htmlOptions'=>array('width'=>100),
						'type'=>'raw',
						'filter'=> '',
						'name'=>'nama_program',
						'value'=>'$data->nama_program',
						'filter'=> '',
					),
			
						array(
						'class'=>'CDataColumn',
						'htmlOptions'=>array('width'=>100),
						'type'=>'raw',
						'filter'=> '',
						'name'=>'nama_kegiatan',
						'value'=>'$data->nama_kegiatan',
						'filter'=> '',
					),
					/*array(
						'class'=>'CDataColumn',
						'htmlOptions'=>array('width'=>250),
						'type'=>'raw',
						'filter'=> '',
						'name'=>'sub_uraian',
						'value'=>'$data->sub_uraian',
						'filter'=> '',
					),
					array(
						'class'=>'CDataColumn',
						'htmlOptions'=>array('width'=>250),
						'type'=>'raw',
						'filter'=> '',
						'name'=>'item',
						'value'=>'$data->item',
						'filter'=> '',
					),*/
					array(
						'class' => 'booster.widgets.TbEditableColumn',
						'name' => 'volume',
						'sortable' => true,
						'filter'=> '',
						'htmlOptions'=>array('width'=>10),
						//'htmlOptions'=>array('id' => ($data->harga_satuan==0) ? "parent_" : "child_"),
						'cssClassExpression' => '$data->harga_satuan==0 ? \'parent_\' : \'\';', 
						'editable' => array(
							'url' => $this->createUrl('dpa/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
							'name'=>"volume",
							'inputclass' => 'col-md-3 ',
							'options' => array(
							 'placement' => 'left',
							'success' => 'js: function(data) {
								location.reload(); 
							}',
							),
						)
					),
					
					array(
						'class' => 'booster.widgets.TbEditableColumn',
						'name' => 'satuan',
						'sortable' => true,
						'filter'=> '',
						'htmlOptions'=>array('width'=>10),
						//'htmlOptions'=>array('id' => ($data->harga_satuan==0) ? "parent_" : "child_"),
						'cssClassExpression' => '$data->harga_satuan==0 ? \'parent_\' : \'\';', 
						'editable' => array(
							'url' => $this->createUrl('dpa/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
							'name'=>"satuan",
							'inputclass' => 'col-md-3 ',
							'options' => array(
							 'placement' => 'left',
							'success' => 'js: function(data) {
								location.reload(); 
							}',
							),
						)
					),
					
					array(
						'class' => 'booster.widgets.TbEditableColumn',
						'name' => 'harga_satuan',
						'htmlOptions'=>array('width'=>100),
						'sortable' => true,
						'filter'=> '',
						//'htmlOptions'=>array('id' => ($data->harga_satuan==0) ? "parent_" : "child_"),
						'cssClassExpression' => '$data->harga_satuan==0 ? \'parent_\' : \'\';', 
						'value' => 'CHtml::encode(number_format($data->harga_satuan))',
						'editable' => array(
							'url' => $this->createUrl('dpa/gridUpdate'),
							//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
							'name'=>"harga_satuan",
							'inputclass' => 'col-md-3 ',
							'options' => array(
							 'placement' => 'left',
							'success' => 'js: function(data) {
								location.reload(); 
								//$.fn.yiiGridView.update("rka-grid");
								
							}',
							),
						)
					),
					 array(
						'name' => 'harga_satuan_kegiatan',
						'filter'=>'',
						'htmlOptions'=>array('width'=>'120'),
						'value'=>'AplikasiKomponen::uang($data->harga_satuan_kegiatan)',
					),
					//'level',
					array(
					   // 'name' => 'parent_id',
						'type'=>'raw',
						'filter'=>'',
						'htmlOptions'=>array('width'=>'10'),
						'value'=>function($data){
							if($data->level == "uraian")
							{
								echo '<a id="tambah_sub_uraian" data-original-title="Tambah Sub Uraian" class="view" title="" data-toggle="tooltip" href="index.php?r=dpa/tambahSubUraian&parent_id='.$data->id.'"><i class="glyphicon glyphicon-plus"></i></a>';
							}else if($data->level=="sub uraian")
							{
								echo '<a id="tambah_item" data-original-title="Tambah Item" class="view" title="" data-toggle="tooltip" href="index.php?r=dpa/tambahItem&parent_id='.$data->id.'"><i class="glyphicon glyphicon-plus"></i></a>';
							}
						},
					),
					array(
						'class'=>'booster.widgets.TbButtonColumn',
						'htmlOptions'=>array('width'=>'4'),
						//'cssClassExpression' => '$data->harga_satuan==0 ? \'parent_\' : \'\';', 
						'template'=>'{delete}',
						'buttons'=>array
						(
					
						),
					)
        )));

?>
</section>
<?php }?>