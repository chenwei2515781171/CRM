<?php if (!defined('THINK_PATH')) exit();?><form action="<?php echo U('finance/add','t=paymentorder');?>" id="add_payablesorder_form" method="post">
	<input name="payables_id" id="payables_id" type="hidden" value="<?php echo ($id); ?>" />
	<table class="table table-hover">
		<tbody>
			<tr>
				<th colspan="2"><?php echo L('ADD PAYMENTORDER');?></th>
			</tr>
			<tr>
				<td class="tdleft" width="20%" valign="middle"><?php echo L('PAYMENTS SINGLE NUMBER');?></td>
				<td valign="middle"><input name="name" id="name" class="text-input large-input" type="text" value="<?php echo L('AUTOMATIC_GENERATION');?>"/></td>
			</tr>
			<tr>
				<td class="tdleft" width="20%" valign="middle"><?php echo L('OWNER_ROLE');?></td>
				<td valign="middle"><input name="owner_role_id" id="owner_role_id" type="hidden" value="<?php echo (session('role_id')); ?>"/><input name="owner_name" id="owner_name" class="text-input large-input" type="text" value="<?php echo (session('name')); ?>"/></td>
			</tr>
			<tr>
				<td class="tdleft" valign="middle">付款方式</td>
				<td valign="middle"><input class="text-input large-input" id="pay_type" name="pay_type" type="text" /></td>
			</tr>
			<tr>
				<td class="tdleft" valign="middle"><?php echo L('PAYMENTS');?></td>
				<td valign="middle"><input class="text-input large-input" id="money" name="money" type="text" /></td>
			</tr>
			<tr>
				<td class="tdleft" valign="middle"><?php echo L('PAYMENT TIME');?></td>
				<td valign="middle"><input onclick="WdatePicker()"  type="text" id="pay_time" name="pay_time"/></td>
			</tr>
			<tr>
				<td class="tdleft" valign="middle"><?php echo L('STATUS');?></td>
				<td valign="middle"><input  type="radio" checked="checked" name="status" value="0"/> <?php echo L('NOT CLOSING');?> <input type="radio" name="status" value="1"/> <?php echo L('HAS CLOSING');?> </td>
			</tr>
			<tr>
				<td class="tdleft" valign="middle"><?php echo L('DESCRIPTION');?></td>
				<td valign="middle"><textarea class="span6" rows="6" name="description"></textarea></td>
			</tr>
		</tbody>
	</table>
</form>
<div id="dialog-message2" title="<?php echo L('SELECT THE LEADER');?>">loading...</div>
<script type="text/javascript">
$("#dialog-message2").dialog({
	autoOpen: false,
	modal: true,
	width: 800,
	maxHeight: 400,
	buttons: {
		"Ok": function () {
			var item = $('input:radio[name="owner"]:checked').val();
			var name = $('input:radio[name="owner"]:checked').parent().next().html();
			if(item){
				$('#owner_name').val(name);
				$('#owner_role_id').val(item);
			}
			$(this).dialog("close");
		},
		"Cancel": function () {
			$(this).dialog("close");
		}
	},
	position: ["center", 100]
});
$(function(){
	$("#owner_name").click(
		function(){
			$('#dialog-message2').dialog('open');
			$('#dialog-message2').load('<?php echo U("user/listDialog","by=all");?>');
		}
	);
});

$(document).ready(function(){
	$("#money").blur(function(){
		var total = parseInt(<?php echo ($payables['price']); ?>);
		var payables_money = parseInt(<?php echo ($payables_money); ?>);
		var money = parseInt($('#money').val());
		if( (money + payables_money) > total){
			alert('<?php echo L('EXCEED THE AMOUNT');?>');
		}
	});
});
</script>