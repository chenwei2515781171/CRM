<?php if (!defined('THINK_PATH')) exit();?><form action="<?php echo U(customer/excelImport);?>" method="post" enctype="multipart/form-data">
	<table class="table table-hover">
		<tr>
			<td class="tdleft" width="20%"><?php echo L('FILE_SPECIFICATION');?></td> 
			<td><?php echo L('IMPORT_EXCEL_FILE_PAY_ATTENTION_TO_THE_CHOICE_OF_THE_DATA_CONTENT');?>
			<p><?php echo L('Allow_type_XLS_no_more_than_20MB_file_total_size');?></p></td>
		</tr>
		<tr>
			<td class="tdleft" width="20%"><?php echo L('ERROR_HANDLING');?></td> 
			<td>
				<input id="ownership" type="radio" checked="checked" value="0" name="error_handing"><?php echo L('TERMINATION');?>
				<input id="ownership1" type="radio" value="1" name="error_handing"><?php echo L('SKIP');?>
			</td>
		</tr>
		<tr>
			<td class="tdleft"><?php echo L('SELECT_IMPORT_FILE');?></td>
			<td><p id="attachment1"><input type="file" name="excel"/></p><p style="color:red"><?php echo L('IMPORT_FILE_PLEASE_BE_SURE_TO_USE_PROPRIETARY_DATA_WHEN_THE_IMPORT_TEMPLATE');?>&nbsp;<a href="<?php echo U('customer/excelImportDownload');?>"><?php echo L('NOKIA_MONITOR_TEST');?></a></p></td>
		</tr>
		<tr>
			<td class="tdleft"><?php echo L('PRINCIPAL');?></td>
			<td>
				<input type="hidden" id="owner_id" name="owner_role_id" value="<?php echo (session('role_id')); ?>"/><input type="text" id="owner_name" name="owner_name" value="<?php echo (session('name')); ?>"/> &nbsp;&nbsp;<input class="btn btn-mini" id="putremove"  type="button" value="<?php echo L('IN_THE_CUSTOMER_POOL');?>"/>
			</td>
		</tr>
		<tr>
        
			<td>&nbsp;</td>
			<td><input class="btn btn-primary" type="submit" name="submit" value="<?php echo L('TO_LEAD');?>"/> &nbsp; <input class="btn" onclick="javascript:$('#dialog-import').dialog('close');" type="button" value="<?php echo L('CANCEL');?>"/></td>
		</tr>
	</table>
</form>
<div class="hide" id="dialog-role-list" title="<?php echo L('CHOOSE_HEAD_OF_THE_CUSTOMER');?>">loading...</div>
<script type="text/javascript">
$("#dialog-role-list").dialog({
	autoOpen: false,
	modal: true,
	width: 600,
	maxHeight: 400,
	buttons: {
		"Ok": function () {
			var item = $('input:radio[name="owner"]:checked').val();
			var name = $('input:radio[name="owner"]:checked').parent().next().html();
			$('#owner_name').val(name);
			$('#owner_id').val(item);
			$(this).dialog("close"); 
		},
		"Cancel": function () {
			$(this).dialog("close");
		}
	},
	position: ["center", 100]
});
$(function(){
	$('#owner_name').click(
		function(){
			$('#dialog-role-list').dialog('open');
			$('#dialog-role-list').load("<?php echo U('user/listDialog');?>");
		}
	);
	$('#putremove').click(
		function(){
			$('#owner_id').attr('value', '');
			$('#owner_name').attr('value', '');
		}
	);
});
</script>