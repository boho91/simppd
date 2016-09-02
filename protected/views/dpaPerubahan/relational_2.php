<?php 
$this->widget('booster.widgets.TbGridView', array(
   // 'filter'=>$model,
	'enableSorting' => false,
    'type'=>'striped bordered',
	 'summaryText' => '',
	'ajaxUpdate' => false,
    'dataProvider'=>$gridDataProvider,
   // 'template' => "{items}",
    'columns' => 
	array(
		array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		'item',
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'volume',
			'htmlOptions'=>array('width'=>'100%'),
			//'value' => 'CHtml::encode(number_format($data->pagu_tahun_n_min_1))',
			'editable' => array(
			'url' => $this->createUrl('kua/gridUpdate'),
				'placement' => 'bottom',
				'name'=>"volume",
				'options' => array(
				 
				'success' => 'js: function(data) {
					
				}',
				),
				'inputclass' => 'col-md-3'
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'satuan',
			//'value' => 'CHtml::encode(number_format($data->pagu_tahun_n_min_1))',
			'editable' => array(
			'url' => $this->createUrl('kua/gridUpdate'),
				'placement' => 'bottom',
				'name'=>"satuan",
				'options' => array(
				 
				'success' => 'js: function(data) {
					
				}',
				),
				'inputclass' => 'col-md-3'
			)
		),
		array(
			'class' => 'booster.widgets.TbEditableColumn',
			'name' => 'harga_satuan',
			//'value' => 'CHtml::encode(number_format($data->pagu_tahun_n_min_1))',
			'editable' => array(
			'url' => $this->createUrl('kua/gridUpdate'),
				'placement' => 'bottom',
				'name'=>"harga_satuan",
				'options' => array(
				 
				'success' => 'js: function(data) {
					
				}',
				),
				'inputclass' => 'col-md-3'
			)
		),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>250),
			'type'=>'raw',
			'filter'=> '',
			'header'=>'Jumlah',
			'name'=>'totalPerItem',
			'value'=>'$data->totalPerItem',
			'filter'=> '',
		),
		array(
                'htmlOptions' => array('nowrap'=>'nowrap'),
                'class'=>'booster.widgets.TbButtonColumn',
                'template'=>"{add}",
                'updateButtonUrl'=>'Yii::app()->createUrl("", array("id"=>$data["id"]))',
                'buttons'=>array
                (   
                    'add' => array
                    (
                      //  'icon'=>' glyphicon glyphicon-plus',
						'label'=>'',
						'imageUrl'=>false, 
						'options'=>array('class'=>'glyphicon glyphicon-plus','title'=>'Tambah Item'),
                        'url'=>'Yii::app()->createUrl("", array("id"=>$data["id"]))',
                        /*'options'=>array(
                            'id'=>'{$data["id"]}',
                        ),*/
                    ),

                ),
			),
		)
	)
);
?>
