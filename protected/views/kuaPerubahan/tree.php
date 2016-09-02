<?php 
//instead of zii.widgets.grid.CGridView a new extension CQTreeGridView is used here
$this->widget('ext.QTreeGridView.CQTreeGridView', array(
    'id'=>'category-grid',
    // 'cssFile'=>false,
    'ajaxUpdate' => false,
    'dataProvider'=>$dataProvider,
    'filter'=>$model,
    'columns'=>array(
        array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>150),
			'type'=>'raw',
			'name'=>'skpd',
			'value'=>'$data->skpd_->nama_skpd',
			'filter'=> CHtml::listData(Skpd::model()->findAll(array('order'=>'nama_skpd')), 'id', 'nama_skpd'),
			'visible'=>Yii::app()->user->isAdminBappeda()
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>200),
			'type'=>'raw',
			'name'=>'skpd',
			'value'=>'$data->skpd_->nama_skpd',
			'filter'=> '',
			'visible'=>!Yii::app()->user->isAdminBappeda()
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>250),
			'type'=>'raw',
			'name'=>'kegiatan',
			'value'=>'$data->kegiatan_->kegiatan',
			'filter'=> '',
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'pagu_tahun_n_min_1',
			'sortable' => true,
			'value' => 'CHtml::encode(number_format($data->pagu_tahun_n_min_1))',
			'editable' => array(
			'url' => $this->createUrl('kua/gridUpdate'),
				'placement' => 'right',
				'name'=>"pagu_tahun_n_min_1",
				'options' => array(
				 
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("ppas-grid");
				}',
				),
				'inputclass' => 'col-md-3'
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'pagu_tahun_n',
			'sortable' => true,
			'value' => 'CHtml::encode(number_format($data->pagu_tahun_n))',
			'editable' => array(
			'url' => $this->createUrl('kua/gridUpdate'),
				'placement' => 'right',
				//'htmlOptions'=>array('title'=>'Contoh 10,000,000'),
				'name'=>"pagu_tahun_n",
				'inputclass' => 'col-md-3',
				'options' => array(
				 
				'success' => 'js: function(data) {
					$.fn.yiiGridView.update("ppas-grid");
				}',
				),
			)
		),
        array(
            'name' => 'skpd',
            'value'=>'(($data->skpd==0)?"No Parent" :$data->parentCategory->name)',
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{view}{update}{delete}',
            'buttons'=>array
            (
 
 
        ),
    ),
    ),
));
?>