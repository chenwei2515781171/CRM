<?php if (!defined('THINK_PATH')) exit();?><table class="table table-hover table-striped table_thead_fixed">
	<thead>
		<tr>
			<th>产品名称</th>
			<th>规格</th>
			<th>数量</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td id="td_colspan" colspan="7">
				<?php echo ($page); ?>
			</td>
		</tr>
	</tfoot>
	<tbody>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><a target="_blank" href="<?php echo U('product/view','id='); echo ($vo["product_id"]); ?>"><?php echo ($vo["product_name"]); ?></a></td>
				<td><?php echo ($vo["product_standard"]); ?></td>
				<td><?php echo ($vo["amount"]); ?></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</tbody>					
</table>