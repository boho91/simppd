<?php 
//echo CHtml::tag('h3',array(),'RELATIONAL asd DATA EXAMPLE ROW : "'.$id.'"');
$this->widget('booster.widgets.TbExtendedGridView', array(
    'type'=>'striped bordered',
	'id'=>'child-grid',
	'enableSorting' => false,
	 'summaryText' => '',
    'dataProvider' => $gridDataProvider,
    //'template' => "{items}",
    'columns' => array(
		array(
        'header'=>'No.',
		'htmlOptions'=>array('width'=>'50'),
        'value'=>'$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		//'id',
		
		/*array(
        'header'=>'Sub Uraian',
		'name'=>'sub_uraian',
		'htmlOptions'=>array('width'=>'150'),
        //'value'=>'$data->sub_uraian',
		),*/
        array(
            'class'=>'booster.widgets.TbRelationalColumn2',
            'name' => 'sub_uraian',
			'header'=>'Sub Uraian',
            'url' => $this->createUrl('rka/relational2'),
            'value'=> '$data["sub_uraian"]',
            'afterAjaxUpdate' => 'js:function(tr,rowid,data){
                
            }'
        ),
		array(
			'class'=>'CDataColumn',
			'htmlOptions'=>array('width'=>250),
			'type'=>'raw',
			'filter'=> '',
			'header'=>'Jumlah',
			'name'=>'totalPerSubUraian',
			'value'=>'$data->totalPerSubUraian',
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
						'options'=>array('class'=>'glyphicon glyphicon-plus','title'=>'Tambah Sub Uraian'),
                        'url'=>'Yii::app()->createUrl("", array("id"=>$data["id"]))',
                        /*'options'=>array(
                            'id'=>'{$data["id"]}',
                        ),*/
                    ),

                ),
			),
		
    )
));
?>