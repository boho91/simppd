<?php 
echo CHtml::tag('h3',array(),'RELATIONAL asd DATA EXAMPLE ROW : "'.$id.'"');
$this->widget('booster.widgets.TbExtendedGridView', array(
    'type'=>'striped bordered',
	'id'=>'child-grid',
    'dataProvider' => $gridDataProvider,
    'template' => "{items}",
    'columns' => array_merge(array(
        array(
            'class'=>'booster.widgets.TbRelationalColumn2',
            'name' => 'id',
            'url' => $this->createUrl('rka/relational2'),
            'value'=> '"test-subgrid"',
            'afterAjaxUpdate' => 'js:function(tr,rowid,data){
                
            }'
        )
    ),
	array('skpd','uraian'))
));
?>
<script>
$(document).on('click','#child-grid .tbrelational-column', function(){
	
	var span = 1;
	var that = $(this);
	var status = that.data('status');
	var rowid = that.data('rowid');
	var tr = $('#relatedinfo'+rowid);
	var parent = that.parents('tr').eq(0);
	var afterAjaxUpdate = function(tr,rowid,data){
                
            };

	if (status && status=='on'){return}
	that.data('status','on');

	if (tr.length && !tr.is(':visible') && true)
	{
		tr.slideDown();
		that.data('status','off');
		return;
	}else if (tr.length && tr.is(':visible'))
	{
		tr.slideUp();
		that.data('status','off');
		return;
	}
	if (tr.length)
	{
		tr.find('td').html('<img src="/file_kerja/sippd/assets/f6b12612/img/loading.gif" alt="" />');
		if (!tr.is(':visible')){
			tr.slideDown();
		}
	}
	else
	{
		var td = $('<td/>').html('<img src="/file_kerja/sippd/assets/f6b12612/img/loading.gif" alt="" />').attr({'colspan':1});
		tr = $('<tr/>').prop({'id':'relatedinfo'+rowid}).append(td);
		/* we need to maintain zebra styles :) */
		var fake = $('<tr class="hide"/>').append($('<td/>').attr({'colspan':1}));
		parent.after(tr);
		tr.after(fake);
	}
	var data = $.extend({}, {id:rowid});
	$.ajax({
		url: '/file_kerja/sippd/index.php?r=rka/relational2',
		data: data,
		success: function(data){
			tr.find('td').html(data);
			that.data('status','off');
			if ($.isFunction(afterAjaxUpdate))
			{
				afterAjaxUpdate(tr,rowid,data);
			}
		},
		error: function()
		{
			tr.find('td').html('Error');
			that.data('status','off');
		}
	});
});

</script>