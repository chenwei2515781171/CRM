<?php if (!defined('THINK_PATH')) exit();?><link rel="stylesheet" href="/Public/css/treeview/jquery.treeview.css" type="text/css">
<script type="text/javascript" src="/Public/js/treeview/jquery.treeview.js"></script>
<script type="text/javascript" src="/Public/js/treeview/jquery.treeview.edit.js"></script>

<style type="text/css">
.ztree li span.button.add{margin-left:2px;margin-right:-1px;background-position:-144px 0;vertical-align:top; *vertical-align:middle}
.filetree span.file{background:url(/Public/css/treeview/images/folder.gif) 0 0 no-repeat;}
.se_product{background:#E0E0E0;width:auto;margin-left:10px;float:left;font-size:12px;padding:2px;border:1px #C0C0C0 solid;border-radius:4px;}
</style>

<div class="clearfix">
	<input name="dialog_add_product" id="dialog_add_product" type="hidden"/>
	<ul class="nav pull-left">
		<li class="pull-left">
			&nbsp;&nbsp;
			<select id="fields" style="width:auto" onchange="changeCondition()" name="field">
				<option class="word" value="name">产品名</option>
			</select>&nbsp;&nbsp;
		</li>
		<li id="conditionContent" class="pull-left">
			<select id="conditions" style="width:auto" name="condition" onchange="changeSearch()">	
				<option value="contains">包含</option>
				<option value="is">是</option>
				<option value="start_with">开始字符</option>
				<option value="end_with">结束字符</option>
				<option value="is_empty">为空</option>
			</select>&nbsp;&nbsp;
		</li>
		<li id="searchContent" class="pull-left">
			<input id="searchs" type="text" class="input-medium search-query" name="search"/>&nbsp;&nbsp;
		</li>
		<li class="pull-left">
			<input type="hidden" name="m" value="product"/>
			<input type="hidden" id="cid" value="0"/>
						<button class="btn" onclick="d_changeCondition(0,1)">搜索</button>
		</li>
	</ul>
</div>
<div class="result clearfix" id="res">
	<div style="float:left;" rel="1">已选择产品 :</div>
</div>
<div class="row" style="border-top: 1px solid #A0A0A0;margin-top: 5px;">
	<div class="span2 pull-left">
		<ul id="browser" class="filetree">
			<li id="0"><span class="folder ta" rel="0">全部</span></li>
			<?php echo ($tree); ?>
		</ul>	
	</div>
	<div class="span6 pull-right" style="margin: 0px;">
		<table class="table table-hover">
			<thead id="header">
				<tr>
					<th>&nbsp;</th>
					<th>产品名</th>
					<th>产品规格</th>
					<th>产品类别</th>
				</tr>
			</thead>
			<tfoot id="footer">
				<tr>
					<td colspan="6">						
						<div class="row pagination">
							<div class="span2"><span id="count"><?php echo ($data["data"]["count"]); ?></span> 条记录 <span id="p"><?php echo ($data["data"]["p"]); ?></span>/<span id="total_page"><?php echo ($data["data"]["total"]); ?></span> 页</div>
							<div class="span3">
								<div><ul id="changepage"></ul></div>
							</div>
						</div>
					</td>
				</tr>
			</tfoot>
			<tbody id="loads" class="hide">
				<tr><td class="tdleft" colspan="6" style=" height:300px;text-align:center"><img src="/Public/img/load.gif"></td></tr>
			</tbody>
			<tbody id="data">
				<?php if(is_array($product_list)): $i = 0; $__LIST__ = $product_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td>
							<input type="checkbox" name="product_id" class="product_id" value="<?php echo ($vo["product_id"]); ?>" />
							<input type="hidden" value="<?php echo ($vo["suggested_price"]); ?>"/>
							<input type="hidden" value="<?php echo ($vo["standard"]); ?>"/>
						</td>
						<td><?php echo ($vo["name"]); ?></td>
						<td><?php echo ($vo["standard"]); ?></td>
						<td><?php echo ($vo["category_name"]); ?></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>	
		</table>
	</div>	
</div>
<script type="text/javascript">
	$(document).ready(function(){ 
		changepage = "";
		if(<?php echo ($data["data"]["p"]); ?> == 1){
			changepage = "<li><span class='current'>首页</span></li><li><span>« 上一页</span></li>";
			if(<?php echo ($data["data"]["p"]); ?> < <?php echo ($data["data"]["total"]); ?>){
				changepage += "<li><a class='page' href='javascript:void(0)' rel='"+(<?php echo ($data["data"]["p"]); ?>+1)+"'>下一页 »</a></li>";
			}else{
				changepage += "<li><span>下一页 »</span></li>";
			}
		}else if(<?php echo ($data["data"]["p"]); ?> == <?php echo ($data["data"]["total"]); ?>){
			changepage = "<li><a class='page' href='javascript:void(0)' rel='1'>首页</a></li><li><a class='page' href='javascript:void(0)' rel='"+(<?php echo ($data["data"]["p"]); ?>-1)+"'>« 上一页</a></li><li><span>下一页 »</span></li>";
		}else{
			changepage = "<li><a class='page' href='javascript:void(0)' rel='1'>首页</a></li><li><a class='page' href='javascript:void(0)' rel='"+(<?php echo ($data["data"]["p"]); ?>-1)+"'>« 上一页</a></li><li><a class='page' href='javascript:void(0)' rel='"+(<?php echo ($data["data"]["p"]); ?>+1)+"'>下一页 »</a></li>";

		}
		$('#changepage').html(changepage);
	}) 
	$("#browser").treeview();
	
	$(".file").hover(
		function(){
			$(this).css('color','rgb(255, 0, 0);');
		},
		function(){
			$(this).css('color','');
		}
	);
	
	$(".ta").click(
		function(){
			var cid = $(this).attr('rel');
			$('#cid').val(cid);
			$(".ta").each(function(){$(this).css('background','');$(this).css('font-weight','500');});
			$(this).css('background','#ADADAD');
			$(this).css('font-weight','700');
			d_changeCondition(0,0);
		}
	);
	
	$("#check_all").click(function(){
		$("input[class='check_list']").prop('checked', $(this).prop("checked"));
	});
	$('.page').click(function(){
		var a = $(this).attr('rel');
		d_changeCondition(a,0);
	});
	function d_changeCondition(p, a){
		$('#data').addClass('hide');
		$('#load').removeClass('hide');
		if(a){
			var c = 0;
			$(".ta").each(function(){$(this).css('background','');$(this).css('font-weight','500');});
		}else{
			var c = $('#cid').val();
		}
		var field = $('#fields').val();
		var condition = $('#conditions').val();
		var search = encodeURI($("#searchs").val());
		$.ajax({
			type:'get',
			url:'index.php?m=product&a=changecontent&field='+field+'&search='+search+'&condition='+condition+'&p='+p+'&cid='+c,
			async:false,

			success:function(data){
				var temp = '';
				if(data.data.list != null){
					$.each(data.data.list, function(k, v){
						var checked = checkRes(v.product_id) ? 'checked=checked' : '';
						temp += '<tr><td><input type="checkbox" class="product_id" name="product_id" '+checked+' class="check_list" value="'+v.product_id+'"/><input type="hidden" value="'+v.suggested_price+'"/><input type="hidden" value="'+v.standard+'"/></td><td>'+v.name+'</td><td>'+v.standard+'</td><td>'+v.category_name+'</td></tr>';
					});
					var changepage = "";
					if(data.data.p == 1){
						changepage = "<li><span class='current'>首页</span></li><li><span>« 上一页 </span></li>";
						if(data.data.p < data.data.total){
							changepage += "<li><a class='page' href='javascript:void(0)' rel='"+(data.data.p+1)+"'>下一页 »</a></li>";
						}else{
							changepage += "<li><span>下一页 »</span></li>";
						}
					}else if(data.data.p == data.data.total){
						changepage = "<li><a class='page' href='javascript:void(0)' rel='1'>首页</a></li><li><a class='page' href='javascript:void(0)' rel='"+(data.data.p-1)+"'>« 上一页</a></li><li><span>下一页 »</span></li>";
					}else{
						changepage = "<li><a class='page' href='javascript:void(0)' rel='1'>首页</a></li><li><a class='page' href='javascript:void(0)' rel='"+(data.data.p-1)+"'>« 上一页</a></li><li><a class='page' href='javascript:void(0)' rel='"+(data.data.p+1)+"'>下一页 »</a></li>";
					}
					$('#footer').removeClass('hide');
					$('#p').html(data.data.p);
					$('#changepage').html(changepage);
					$('#count').html(data.data.count);
					$('#total_page').html(data.data.total);
					$('#data').html(temp);
					$('.page').click(function(){
						var a = $(this).attr('rel');
						d_changeCondition(a,0);
					});
				}else{
					$('#data').html('<tr><td colspan="4">没有找到您要的结果！</tr>');
					$('#footer').addClass('hide');
				}
				$('#loads').addClass('hide');
				$('#data').removeClass('hide');
				selaction();
			},
			dataType:'json'
		});		
	}
	
	//检查已选择产品 如果存在则删除
	function checkDelRes(pid){
		var res_id =  new Array();
		$(".se_product").each(function(){
			//res_id.push($(this).attr('rel'));
			if(pid == $(this).attr('rel')) $(this).remove();
		});
	}
	//检查产品是否存在 返回false or true；
	function checkRes(pid){
		var res = false;
		$(".se_product").each(function(){
			if(pid == $(this).attr('rel')) res = true;
		});
		return res;
		
	}
	
	selaction();
	bindaction();
	
	
	function selaction(){
		//选择产品时 如果勾选则添加 否则删除
		$('.product_id').click(function(){
			var checked = $(this).prop('checked');
			var pid = $(this).val();
			if(checked){
				var pname = $(this).parent().next().text();
				var price = $(this).next().val();
				var standard = $(this).next().next().val();

				$('#res').append('<div class="se_product" rel="'+$(this).val()+'">'+pname+'<input type="hidden" name="suggested_price" value="'+price+'"/><input type="hidden" name="standard" value="'+standard+'"/><i class="icon-remove remove"></i></div>');
				bindaction();
			}else{
				checkDelRes(pid);
			}
			
		});
	}
	
	function bindaction(){
		//删除按钮
		$('.remove').click(function(){
			$(this).parent().remove();
		});
		
		//删除按钮颜色变化
		$('.remove').hover(
			function(){
				$(this).css('color','red');
			},
			function(){
				$(this).css('color','');
			}
		);
	}
</script>