<?php if (!defined('THINK_PATH')) exit();?><div class="clearfix">
	<ul class="nav pull-left">
		<li class="pull-left">
			&nbsp;&nbsp;
			<select id="field" style="width:auto" onchange="changeCondition()" name="field">
				<option class="word" value="name"><?php echo L('SUPPLIER');?></option>
			</select>&nbsp;&nbsp;
		</li>
		<li id="conditionContent" class="pull-left">
			<select id="condition" style="width:auto" name="condition" onchange="changeSearch()">
				<option value="contains"><?php echo L('CONTAINS');?></option>
				<option value="not_contain"><?php echo L('NOT_CONTAIN');?></option>
				<option value="is"><?php echo L('IS');?></option>
				<option value="isnot"><?php echo L('ISNOT');?></option>
			</select>&nbsp;&nbsp;
		</li>
		<li id="searchContent" class="pull-left">
			<input id="search" type="text" class="input-medium search-query" name="search"/>&nbsp;&nbsp;
		</li>
		<li class="pull-left">
			<input type="hidden" name="m" value="supplier"/>
			<button type="submit" onclick="d_changeCondition(0)" class="btn">  <?php echo L('SEARCH');?></button>
		</li>
	</ul>
</div>
<?php if(empty($assign["list"])): ?><div class="alert"><?php echo L('TEMPORARILY_NO_DATA');?></div>
<?php else: ?>
<table class="table table-hover">
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th><?php echo L('SUPPLIER');?></th>
			<th><?php echo L('CATEGORY');?></th>
			<th><?php echo L('CONTACTS');?></th>
			<th><?php echo L('TEL');?></th>
		</tr>
	</thead>
	<tfoot id="footers">
		<tr>
			<td colspan="5">
				<div class="row pagination">
					<div class="span2"><span id="counts"><?php echo ($assign["count_num"]); ?></span> <?php echo L('RECORDS');?> <span id="ps">1</span>/<span id="total_pages"><?php echo ($assign["total"]); ?></span> <?php echo L('PAGE');?></div>
					<div class="span4">
						<div>
							<ul id="changepages">
								<li><span class='current'><?php echo L('FIRST_PAGE');?></span></li><li><span>« <?php echo L('THE_PREVIOUS_PAGE');?></span></li>
								<?php if(1 < $assign['total']): ?><li><a class="page" href="javascript:void(0)" rel="2"><?php echo L('THE_NEXT_PAGE');?> »</a></li>
								<?php else: ?>
									<li><span><?php echo L('THE_NEXT_PAGE');?> »</span></li><?php endif; ?>
							</ul>
						</div>
					</div>
				</div>
			</td>
		</tr>
	</tfoot>
	<tbody id="loads" class="hide">
		<tr><td class="tdleft" <?php if(C('ismobile') != 1): ?>colspan="6"<?php else: ?>colspan="4"<?php endif; ?> style=" height:300px;text-align:center"><img src="__PUBLIC__/img/load.gif"></td></tr>
	</tbody>
	<tbody id="datas">
		<?php if(is_array($assign["list"])): $i = 0; $__LIST__ = $assign["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><input type="radio" name="supplier_id" value="<?php echo ($vo["id"]); ?>"/></td>
				<td><?php echo ($vo["name"]); ?></td>
				<td><?php echo ($vo["category"]); ?></td>
				<td><?php echo ($vo["contact"]["name"]); ?></td>
				<td><?php echo ($vo["contact"]["telphone"]); ?></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</tbody>
</table><?php endif; ?>
<script type="text/javascript">
	$('.page').click(function(){
		var a = $(this).attr('rel');
		d_changeCondition(a);
	});
	function d_changeCondition(p){
		$('#datas').addClass('hide');
		$('#loads').removeClass('hide');
		
		var field = $('#field').val();
		var condition = $('#condition').val();
		var search = encodeURI($("#search").val());
		$.ajax({
			type:'get',
			url:'index.php?m=supplier&a=changecontent&field='+field+'&search='+search+'&condition='+condition+'&p='+p,
			async:false,
			success:function(data){
				var temp = '';
				if(data.data.list != null){
					$.each(data.data.list, function(k, v){
						temp += "<tr><td><input type='radio' name='supplier_id' value='"+v.id+"'/></td>";
	                    temp +=  "<td>" + v.name + "</td>";
						temp +=  "<td>" + v.category + "</td>";
						temp +=  "<td>" + v.contact.name + "</td>";
						temp +=  "<td>" + v.contact.telphone + "</td>";
                        temp +=  "</tr>";
					});
					var changepage = "";
					if(data.data.p == 1){
						changepage = "<li><span class='current'><?php echo L('FIRST_PAGE');?></span></li><li><span>« <?php echo L('THE_PREVIOUS_PAGE');?></span></li>";
						if(data.data.p < data.data.total){
							changepage += "<li><a class='page' href='javascript:void(0)' rel='"+(data.data.p+1)+"'><?php echo L('THE_NEXT_PAGE');?> »</a></li>";
						}else{
							changepage += "<li><span><?php echo L('THE_NEXT_PAGE');?> »</span></li>";
						}
					}else if(data.data.p == data.data.total){
						changepage = "<li><a class='page' href='javascript:void(0)' rel='1'><?php echo L('FIRST_PAGE');?></a></li><li><a class='page' href='javascript:void(0)' rel='"+(data.data.p-1)+"'>« <?php echo L('THE_PREVIOUS_PAGE');?></a></li><li><span><?php echo L('THE_NEXT_PAGE');?> »</span></li>";
					}else{
						changepage = "<li><a class='page' href='javascript:void(0)' rel='1'><?php echo L('FIRST_PAGE');?></a></li><li><a class='page' href='javascript:void(0)' rel='"+(data.data.p-1)+"'>« <?php echo L('THE_PREVIOUS_PAGE');?></a></li><li><a class='page' href='javascript:void(0)' rel='"+(data.data.p+1)+"'><?php echo L('THE_NEXT_PAGE');?> »</a></li>";
					}				
					$('#ps').html(data.data.p);
					$('#changepages').html(changepage);
					$('#counts').html(data.data.count);
					$('#total_pages').html(data.data.total);				
					$('#datas').html(temp);
					$('.page').click(function(){
						var a = $(this).attr('rel');
						d_changeCondition(a);
					});
				}else{
					$('#data').html('<tr><td colspan="4"><?php echo L('DO_NOT_FIND_THE_RESULTS_YOU_WANT');?></tr>');
					$('#footers').addClass('hide');
				}
				$('#loads').addClass('hide');
				$('#data').removeClass('hide');
			},
			dataType:'json'
		});		
	}
</script>