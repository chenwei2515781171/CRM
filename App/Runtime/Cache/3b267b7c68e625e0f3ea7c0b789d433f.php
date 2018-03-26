<?php if (!defined('THINK_PATH')) exit();?><div class="clearfix">
	<ul class="nav pull-left">
		<li class="pull-left">
			<?php echo L('SELECT_DEPARTMENT');?>&nbsp; <select style="width:auto" name="d_department" id="d_department" onchange="changedepartment()">
				<option class="all" value="all"><?php echo L('ALL');?></option>
				<?php if(is_array($departmentList)): $i = 0; $__LIST__ = $departmentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["department_id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>&nbsp;&nbsp;
		</li>
		<li class="pull-left">
			&nbsp; <?php echo L('USER_NAME');?>：<input class="span2" id="d_name" type="text" name="d_name"/>
		</li>
		&nbsp; <button class="btn" onclick="d_changeContent()"><?php echo L('SEARCH');?></button>
	</ul>
</div>
<?php if($role_list): ?><table class="table table-hover">
	<thead>
		<tr>
		   <th>&nbsp;</th>
		   <th><?php echo L('STAFF');?></th>
		   <th><?php echo L('DEPARTMENT');?></th>
		   <th><?php echo L('POSITION');?></th>
<?php if(C('ismobile') != 1): ?><!--th><?php echo L('SEX');?></th>
		   <th>Email</th-->
		   <th><?php echo L('TELPHONE');?></th><?php endif; ?>		   
		</tr>
	</thead>	
	<tbody id="d_content">
		<?php if(role_list != null): if(is_array($role_list)): $i = 0; $__LIST__ = $role_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td><input name="owner" type="radio" value="<?php echo ($vo["role_id"]); ?>" /></td>
			<td><?php echo ($vo["user_name"]); ?></td>
			<td><?php echo ($vo["department_name"]); ?></td>
			<td><?php echo ($vo["role_name"]); ?></td>
<?php if(C('ismobile') != 1): ?><!--td><?php if($vo['sex'] == 1): echo L('MALE'); elseif($vo['sex'] == 2): echo L('FEMALE'); endif; ?></td>
			<td><?php echo ($vo["email"]); ?></td-->
			<td><?php echo ($vo["telephone"]); ?></td><?php endif; ?>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		<?php else: ?>
			<tr>
				<td><?php echo L('EMPTY_DATA');?></td>
			</tr><?php endif; ?>
	</tbody>
</table>
<?php else: ?>
<div class="alert">
	<?php echo L('EMPTY_DATA');?>
</div><?php endif; ?>
<script type="text/javascript">
	function changedepartment(){
		$('#d_name').val();
	}
	function d_changeContent(){
		department = $('#d_department').val();
		name = $('#d_name').val();
		$.ajax({
			type:'get',
			url:'index.php?m=user&a=changecontent&department='+department+'&name='+name,
			async:false,
			success:function(data){
				temp = '';
				if(data.data != null){
					$.each(data.data, function(k, v){
						temp += "<tr><td><input name='owner' type='radio' value='"+v.role_id+"' /></td><td>"+v.user_name+"</td><td>"+v.department_name+"</td><td>"+v.role_name+"</td>";
						<?php if(C('ismobile') != 1): ?>if(v.sex == 1){
								temp += "<td><?php echo L('MALE');?></td>";
							}else{
								temp += "<td><?php echo L('FEMALE');?></td>";
							}
							temp += "<td>"+v.email+"</td>";
							temp += "<td>"+v.telephone+"</td>";<?php endif; ?>;
						temp += "</tr>";
					});
					$('#d_content').html(temp);
				}else{
					$('#d_content').html('<tr><td colspan="4"><?php echo L("NOT_FIND_THE_RESULTS_YOU_WANT");?></tr>');
				}
			},
			dataType:'json'
		});		
	}

</script>