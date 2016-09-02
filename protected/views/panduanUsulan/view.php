<?php
$this->widget(
    'booster.widgets.TbBreadcrumbs',
    array(
        'links' => array('Panduan Usulan'=> array('admin'),
        'Lihat Data',),		
    )
);

$this->menu=array(
//array('label'=>'List Desa','url'=>array('index')),
array('label'=>'Tambah Panduan Usulan','url'=>array('create'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Edit Panduan Usulan','url'=>array('update','id'=>$model->id),'buttonType'=> 'link','context' => 'warning',),
//array('label'=>'Hapus Desa','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?'),'context' => 'danger',),
array('label'=>'Data Panduan Usulan','url'=>array('admin'),'buttonType'=> 'link','context' => 'info',),
array('label'=>'Cetak Panduan Usulan','url'=>array('cetakpdf'),'buttonType'=> 'link','context' => 'success',),
array('label'=>'Export Panduan Usulan','url'=>array('exportexcel'),'buttonType'=> 'link','context' => 'warning',),
);
?>

<section class="content-header">
<h1>View Panduan Usulan</h1>
</section>

<section class="content">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		
		'usulan_.jenis_usulan',
		'nama_usulan',
		'harga',
		'satuan',
		
),
)); ?>
</section>
