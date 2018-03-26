<?php if (!defined('THINK_PATH')) exit();?><div class="clearfix">
	<ul class="nav pull-left">			
		<li class="pull-left" >
			<select style="width:auto" id="fieldss" onchange="changeCondition()" name="field">
				<option class="word" value="name">产品名</option>
			</select>&nbsp;&nbsp;
		</li>
		<li id="conditionContent" class="pull-left">
			<select id="conditionss" style="width:auto" name="condition" onchange="changeSearch()">
				<option value="contains"><?php echo L('INCLUDE');?></option>
			</select>&nbsp;&nbsp;
		</li>
		<li id="searchContent" class="pull-left">
			<input id="searchss" type="text" class="input-medium search-query" name="search"/>&nbsp;&nbsp;
		</li>
		<li class="pull-left">
			<button class="btn" onclick="dd_changeCondition(0)"><?php echo L('SEARCH');?></button>
		</li>
	</ul>
</div>
<?php if(empty($product_list)): ?><div class="alert"><?php echo L('TEMPORARILY_NO_DATA');?></div>
<?php else: ?>
<table class="table table-hover">
	<thead id="header">
		<tr>
			<th>&nbsp;</th>
			<th>产品名</th>
			<th>产品规格</th>
			<th>产品类别</th>
		</tr>
	</thead>
	<tfoot id="footerss">
		<tr>
			<td colspan="3">
				<div class="row pagination">
					<div class="span2"><span id="countss"><?php echo ($count_num); ?></span> <?php echo L('RECORDS');?> <span id="pss">1</span>/<span id="total_pagess"><?php echo ($total); ?></span> <?php echo L('PAGE');?></div>
					<div class="span4">
						<div>
							<ul id="changepagess">
								<li><span class='current'><?php echo L('FIRST_PAGE');?></span></li><li><span>« <?php echo L('THE_PREVIOUS_PAGE');?></span></li>
								<?php if(1 < $total): ?><li><a class="pages" href="javascript:void(0)" rel="2"><?php echo L('THE_NEXT_PAGE');?> »</a></li>
								<?php else: ?>
									<li><span><?php echo L('THE_NEXT_PAGE');?> »</span></li><?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</td>
		</tr>
	</tfoot>
	<tbody id="loadss" class="hide">
		<tr><td class="tdleft" <?php if(C('ismobile') != 1): ?>colspan="6"<?php else: ?>colspan="4"<?php endif; ?> style=" height:300px;text-align:center"><img src="./Public/img/load.gif"></td></tr>
	</tbody>
	<tbody id="datass">
		<?php if(is_array($product_list)): $i = 0; $__LIST__ = $product_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td>
					<input type="radio" name="product_id" class="product_id" value="<?php echo ($vo["product_id"]); ?>" />
					<input type="hidden" value="<?php echo ($vo["suggested_price"]); ?>"/>
					<input type="hidden" value="<?php echo ($vo["standard"]); ?>"/>
				</td>
				<td><?php echo ($vo["name"]); ?></td>
				<td><?php echo ($vo["standard"]); ?></td>
				<td><?php echo ($vo["category_name"]); ?></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</tbody>
</table><?php endif; ?>
<script type="text/javascript">
	$('.pages').click(function(){
		var a = $(this).attr('rel');
		dd_changeCondition(a);
	});
	function dd_changeCondition(p){
		$('#datass').addClass('hide');
		$('#loadss').removeClass('hide');
		
		var field = $('#fieldss').val();
		var condition = $('#conditionss').val();
		var asearch = encodeURI($("#searchss").val());
		$.ajax({
			type:'get',
			url:'index.php?m=product&a=d_changecontent&field='+field+'&search='+asearch+'&condition='+condition+'&p='+p,
			async:false,
			success:function(data){			
				var temp = '';
				if(data.data.list != null){
					$.each(data.data.list, function(k, v){
						temp += '<tr><td><input type="radio" class="product_id" name="product_id" value="'+v.product_id+'"/><input type="hidden" value="'+v.suggested_price+'"/><input type="hidden" value="'+v.standard+'"/></td><td>'+v.name+'</td><td>'+v.standard+'</td><td>'+v.category_name+'</td></tr>';
					});
					var changepage = "";
					if(data.data.p == 1){
						changepage = "<li><span class='current'><?php echo L('FIRST_PAGE');?></span></li><li><span>« <?php echo L('THE_PREVIOUS_PAGE');?></span></li>";
						if(data.data.p < data.data.total){
							changepage += "<li><a class='pages' href='javascript:void(0)' rel='"+(data.data.p+1)+"'><?php echo L('THE_NEXT_PAGE');?> »</a></li>";
						}else{
							changepage += "<li><span><?php echo L('THE_NEXT_PAGE');?> »</span></li>";
						}
					}else if(data.data.p == data.data.total){
						changepage = "<li><a class='pages' href='javascript:void(0)' rel='1'><?php echo L('FIRST_PAGE');?></a></li><li><a class='pages' href='javascript:void(0)' rel='"+(data.data.p-1)+"'>« <?php echo L('THE_PREVIOUS_PAGE');?></a></li><li><span><?php echo L('THE_NEXT_PAGE');?> »</span></li>";
					}else{
						changepage = "<li><a class='pages' href='javascript:void(0)' rel='1'><?php echo L('FIRST_PAGE');?></a></li><li><a class='pages' href='javascript:void(0)' rel='"+(data.data.p-1)+"'>« <?php echo L('THE_PREVIOUS_PAGE');?></a></li><li><a class='pages' href='javascript:void(0)' rel='"+(data.data.p+1)+"'><?php echo L('THE_NEXT_PAGE');?> »</a></li>";
					}				
					$('#pss').html(data.data.p);
					$('#changepagess').html(changepage);
					$('#countss').html(data.data.count);
					$('#total_pagess').html(data.data.total);
					$('#datass').html(temp);
					$('.pages').click(function(){
						var a = $(this).attr('rel');
						dd_changeCondition(a);
					});
				}else{
					$('#datass').html('<tr><td colspan="4"><?php echo L('DO_NOT_FIND_THE_RESULTS_YOU_WANT');?></tr>');
					$('#footerss').addClass('hide');
				}
				$('#loadss').addClass('hide');
				$('#datass').removeClass('hide');
			},
			dataType:'json'
		});		
	}
</script>