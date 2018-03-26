<?php if (!defined('THINK_PATH')) exit();?><form action="<?php echo U('Permission/user_authorize');?>" method="post">
<table class="table">
	<thead>
		<tr>
			<th>&nbsp;</th>
			<th><?php echo L('MODULE');?></th>
			<th><?php echo L('VISIBLE');?></th>
			<th><?php echo L('BROWSE');?></th>
			<th><?php echo L('CREATE');?></th>
			<th><?php echo L('EDIT');?></th>
			<th><?php echo L('DELETE');?></th>
			<th><?php echo L('EXPORT');?></th>
		</tr>
	</thead> 
	<input type="hidden" name="position_id" value="<?php echo ($position_id); ?>"/>
	<tbody>
		<tr>
			<td><input type="checkbox" rel="12" class="check_all" name="check_leads"/></td>
			<td><?php echo L('USER');?></td>
			<td><input <?php if(in_array('user/index', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list12" type="checkbox" name="per[]" value="user/index"></td>
			<td><input <?php if(in_array('user/view', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list12" type="checkbox" name="per[]" value="user/view"></td>
			<td><input <?php if(in_array('user/add', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list12" type="checkbox" name="per[]" value="user/add"></td>
			<td><input <?php if(in_array('user/edit', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list12" type="checkbox" name="per[]" value="user/edit"></td>
			<td><input <?php if(in_array('user/delete', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list12" type="checkbox" name="per[]" value="user/delete"></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="4" class="check_all" name="check_leads"/></td>
			<td><?php echo L('LEADS');?></td>
			<td><input <?php if(in_array('leads/index', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list4" type="checkbox" name="per[]" value="leads/index"></td>
			<td><input <?php if(in_array('leads/view', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list4" type="checkbox" name="per[]" value="leads/view"></td>
			<td><input <?php if(in_array('leads/add', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list4" type="checkbox" name="per[]" value="leads/add"></td>
			<td><input <?php if(in_array('leads/edit', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list4" type="checkbox" name="per[]" value="leads/edit"></td>
			<td><input <?php if(in_array('leads/delete', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list4" type="checkbox" name="per[]" value="leads/delete"></td>
			<td><input <?php if(in_array('leads/export', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list4" type="checkbox" name="per[]" value="leads/export"></td>
		</tr>
		<tr>
			<td width="3%"><input type="checkbox" rel="1" class="check_all" name="check_business"/></td>
			<td><?php echo L('BUSINESS');?></td>
			<td><input <?php if(in_array('business/index', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list1" type="checkbox" name="per[]" value="business/index"></td>
			<td><input <?php if(in_array('business/view', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list1" type="checkbox" name="per[]" value="business/view"></td>
			<td><input <?php if(in_array('business/add', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list1" type="checkbox" name="per[]" value="business/add"></td>
			<td><input <?php if(in_array('business/edit', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list1" type="checkbox" name="per[]" value="business/edit"></td>
			<td><input <?php if(in_array('business/delete', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list1" type="checkbox" name="per[]" value="business/delete"></td>
			<td><input <?php if(in_array('business/export', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list1" type="checkbox" name="per[]" value="business/export"></td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="3" class="check_all" name="check_customer"/></td>
			<td><?php echo L('CUSTOMER');?></td>
			<td><input <?php if(in_array('customer/index', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list3" type="checkbox" name="per[]" value="customer/index"></td>
			<td><input <?php if(in_array('customer/view', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list3" type="checkbox" name="per[]" value="customer/view"></td>
			<td><input <?php if(in_array('customer/add', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list3" type="checkbox" name="per[]" value="customer/add"></td>
			<td><input <?php if(in_array('customer/edit', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list3" type="checkbox" name="per[]" value="customer/edit"></td>
			<td><input <?php if(in_array('customer/delete', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list3" type="checkbox" name="per[]" value="customer/delete"></td>
			<td><input <?php if(in_array('customer/export', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list3" type="checkbox" name="per[]" value="customer/export"></td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="9" class="check_all" name="check_contract"/></td>
			<td><?php echo L('CONTRACT');?></td>
			<td><input <?php if(in_array('contract/index', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list9" type="checkbox" name="per[]" value="contract/index"></td>
			<td><input <?php if(in_array('contract/view', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list9" type="checkbox" name="per[]" value="contract/view"></td>
			<td><input <?php if(in_array('contract/add', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list9" type="checkbox" name="per[]" value="contract/add"></td>
			<td><input <?php if(in_array('contract/edit', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list9" type="checkbox" name="per[]" value="contract/edit"></td>
			<td><input <?php if(in_array('contract/delete', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list9" type="checkbox" name="per[]" value="contract/delete"/></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="10" class="check_all" name="check_finance"/></td>
			<td><?php echo L('FINANCE');?></td>
			<td><input <?php if(in_array('finance/index', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list10" type="checkbox" name="per[]" value="finance/index"></td>
			<td><input <?php if(in_array('finance/view', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list10" type="checkbox" name="per[]" value="finance/view"></td>
			<td><input <?php if(in_array('finance/add', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list10" type="checkbox" name="per[]" value="finance/add"></td>
			<td><input <?php if(in_array('finance/edit', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list10" type="checkbox" name="per[]" value="finance/edit"></td>
			<td><input <?php if(in_array('finance/delete', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list10" type="checkbox" name="per[]" value="finance/delete"></td>
			<td><input <?php if(in_array('finance/analytics', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list10" type="checkbox" name="per[]" value="finance/analytics"><br/>统计</td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="2" class="check_all" name="check_product"/></td>
			<td><?php echo L('PRODUCT');?></td>
			<td><input  <?php if(in_array('product/index', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list2" type="checkbox" name="per[]" value="product/index"></td>
			<td><input <?php if(in_array('product/view', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list2" type="checkbox" name="per[]" value="product/view"></td>
			<td><input <?php if(in_array('product/add', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list2" type="checkbox" name="per[]" value="product/add"></td>
			<td><input <?php if(in_array('product/edit', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list2" type="checkbox" name="per[]" value="product/edit"></td>
			<td><input <?php if(in_array('product/delete', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list2" type="checkbox" name="per[]" value="product/delete"></td>
			<td><input <?php if(in_array('product/export', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list2" type="checkbox" name="per[]" value="product/export"></td>
		</tr>
		<tr>
			<td><input  type="checkbox" rel="5" class="check_all" name="check_contacts"/></td>
			<td><?php echo L('CONTACTS');?></td>
			<td><input <?php if(in_array('contacts/index', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list5" type="checkbox" name="per[]" value="contacts/index"></td>
			<td><input <?php if(in_array('contacts/view', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list5" type="checkbox" name="per[]" value="contacts/view"></td>
			<td><input <?php if(in_array('contacts/add', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list5" type="checkbox" name="per[]" value="contacts/add"></td>
			<td><input <?php if(in_array('contacts/edit', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list5" type="checkbox" name="per[]" value="contacts/edit"></td>
			<td><input <?php if(in_array('contacts/delete', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list5" type="checkbox" name="per[]" value="contacts/delete"></td>
			<td><input <?php if(in_array('contacts/export', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list5" type="checkbox" name="per[]" value="contacts/export"></td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="6" class="check_all" name="check_task"/></td>
			<td><?php echo L('TASK');?></td>
			<td><input <?php if(in_array('task/index', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list6" type="checkbox" name="per[]" value="task/index"></td>
			<td><input <?php if(in_array('task/view', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list6" type="checkbox" name="per[]" value="task/view"></td>
			<td><input <?php if(in_array('task/add', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list6" type="checkbox" name="per[]" value="task/add"></td>
			<td><input <?php if(in_array('task/edit', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list6" type="checkbox" name="per[]" value="task/edit"></td>
			<td><input  <?php if(in_array('task/delete', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list6" type="checkbox" name="per[]" value="task/delete"></td>
			<td><input <?php if(in_array('task/export', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list6" type="checkbox" name="per[]" value="task/export"></td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="7" class="check_all" name="check_event"/></td>
			<td><?php echo L('EVENT');?></td>
			<td><input <?php if(in_array('event/index', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list7" type="checkbox" name="per[]" value="event/index"></td>
			<td><input <?php if(in_array('event/view', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list7" type="checkbox" name="per[]" value="event/view"></td>
			<td><input <?php if(in_array('event/add', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list7" type="checkbox" name="per[]" value="event/add"></td>
			<td><input <?php if(in_array('event/edit', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list7" type="checkbox" name="per[]" value="event/edit"></td>
			<td><input <?php if(in_array('event/delete', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list7" type="checkbox" name="per[]" value="event/delete"></td>
			<td><input <?php if(in_array('event/export', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list7" type="checkbox" name="per[]" value="event/export"></td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="8" class="check_all" name="check_knowledge"/></td>
			<td><?php echo L('KNOWLEDGE');?></td>
			<td><input <?php if(in_array('knowledge/index', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list8" type="checkbox" name="per[]" value="knowledge/index"></td>
			<td><input <?php if(in_array('knowledge/view', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list8" type="checkbox" name="per[]" value="knowledge/view"></td>
			<td><input <?php if(in_array('knowledge/add', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list8" type="checkbox" name="per[]" value="knowledge/add"></td>
			<td><input <?php if(in_array('knowledge/edit', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list8" type="checkbox" name="per[]" value="knowledge/edit"></td>
			<td><input <?php if(in_array('knowledge/delete', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list8" type="checkbox" name="per[]" value="knowledge/delete"></td>
			<td><input <?php if(in_array('knowledge/export', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list8" type="checkbox" name="per[]" value="knowledge/export"></td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="11" class="check_all" name="check_announce"/></td>
			<td><?php echo L('announcement manager');?></td>
			<td><input <?php if(in_array('announcement/index', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list11" type="checkbox" name="per[]" value="announcement/index"></td>
			<td><input <?php if(in_array('announcement/view', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list11" type="checkbox" name="per[]" value="announcement/view"></td>
			<td><input <?php if(in_array('announcement/add', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list11" type="checkbox" name="per[]" value="announcement/add"></td>
			<td><input <?php if(in_array('announcement/edit', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list11" type="checkbox" name="per[]" value="announcement/edit"></td>
			<td><input <?php if(in_array('announcement/delete', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list11" type="checkbox" name="per[]" value="announcement/delete"></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="14" class="check_all" name="check_stock"/></td>
			<td><?php echo L('WAREHOUSE');?></td>
			<td><input <?php if(in_array('stock/warehouse', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list14" type="checkbox" name="per[]" value="stock/warehouse"></td>
			<td><input <?php if(in_array('stock/view', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list14" type="checkbox" name="per[]" value="stock/view"></td>
			<td><input <?php if(in_array('stock/addwarehouse', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list14" type="checkbox" name="per[]" value="stock/addwarehouse"></td>
			<td><input <?php if(in_array('stock/editwarehouse', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list14" type="checkbox" name="per[]" value="stock/editwarehouse"></td>
			<td><input <?php if(in_array('stock/deletewarehouse', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list14" type="checkbox" name="per[]" value="stock/deletewarehouse"></td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="15" class="check_all" name="check_supplier"/></td>
			<td><?php echo L('SUPPLIER');?></td>
			<td><input <?php if(in_array('supplier/index', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list15" type="checkbox" name="per[]" value="supplier/index"></td>
			<td><input <?php if(in_array('supplier/view', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list15" type="checkbox" name="per[]" value="supplier/view"></td>
			<td><input <?php if(in_array('supplier/add', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list15" type="checkbox" name="per[]" value="supplier/add"></td>
			<td><input <?php if(in_array('supplier/edit', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list15" type="checkbox" name="per[]" value="supplier/edit"></td>
			<td><input <?php if(in_array('supplier/delete', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list15" type="checkbox" name="per[]" value="supplier/delete"></td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="16" class="check_all" name="check_category"/></td>
			<td><?php echo L('SUPPLIER_CATEGORY');?></td>
			<td><input <?php if(in_array('supplier/category', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list16" type="checkbox" name="per[]" value="supplier/category"></td>
			<td><input <?php if(in_array('supplier/view', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list16" type="checkbox" name="per[]" value="supplier/view"></td>
			<td><input <?php if(in_array('supplier/addcategory', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list16" type="checkbox" name="per[]" value="supplier/addcategory"></td>
			<td><input <?php if(in_array('supplier/editcategory', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list16" type="checkbox" name="per[]" value="supplier/editcategory"></td>
			<td><input <?php if(in_array('supplier/deletecategory', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list16" type="checkbox" name="per[]" value="supplier/deletecategory"></td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="22" class="check_all" name="check_analytics"/></td>
			<td><?php echo L('PRESTORE');?></td>
			<td><input <?php if(in_array('prestore/index', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list22" type="checkbox" name="per[]" value="prestore/index"> <br/></td>
			<td><input <?php if(in_array('prestore/view', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list22" type="checkbox" name="per[]" value="prestore/view"> <br/></td>
			<td><input <?php if(in_array('prestore/add', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list22" type="checkbox" name="per[]" value="prestore/add"> <br/></td>
			<td><input <?php if(in_array('prestore/edit', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list22" type="checkbox" name="per[]" value="prestore/edit"> <br/></td>
			<td><input <?php if(in_array('prestore/delete', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list22" type="checkbox" name="per[]" value="prestore/delete"> <br/></td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="17" class="check_all" name="check_sales"/></td>
			<td><?php echo L('SALES');?></td>
			<td><input <?php if(in_array('sales/index', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list17" type="checkbox" name="per[]" value="sales/index"></td>
			<td><input <?php if(in_array('sales/view', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list17" type="checkbox" name="per[]" value="sales/view"></td>
			<td><input <?php if(in_array('sales/add', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list17" type="checkbox" name="per[]" value="sales/add"></td>
			<td><input <?php if(in_array('sales/edit', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list17" type="checkbox" name="per[]" value="sales/edit"></td>
			<td><input <?php if(in_array('sales/delete', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list17" type="checkbox" name="per[]" value="sales/delete"></td>
			<td><input <?php if(in_array('sales/addsalesreturn', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list17" type="checkbox" name="per[]" value="sales/addsalesreturn"><br/>退货</td>
			<td><input <?php if(in_array('sales/check', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list17" type="checkbox" name="per[]" value="sales/check"> <br/><?php echo L('CHECK');?></td>
			<td><input <?php if(in_array('sales/removecheck', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list17" type="checkbox" name="per[]" value="sales/removecheck"> <br/><?php echo L('REMOVECHECK');?></td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="18" class="check_all" name="check_purchase"/></td>
			<td><?php echo L('PURCHASE');?></td>
			<td><input <?php if(in_array('purchase/index', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list18" type="checkbox" name="per[]" value="purchase/index"></td>
			<td><input <?php if(in_array('purchase/view', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list18" type="checkbox" name="per[]" value="purchase/view"></td>
			<td><input <?php if(in_array('purchase/add', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list18" type="checkbox" name="per[]" value="purchase/add"></td>
			<td><input <?php if(in_array('purchase/edit', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list18" type="checkbox" name="per[]" value="purchase/edit"></td>
			<td><input <?php if(in_array('purchase/delete', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list18" type="checkbox" name="per[]" value="purchase/delete"></td>
			<td><input <?php if(in_array('purchase/check', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list18" type="checkbox" name="per[]" value="purchase/check"> <br/><?php echo L('CHECK');?></td>
			<td><input <?php if(in_array('purchase/removecheck', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list18" type="checkbox" name="per[]" value="purchase/removecheck"> <br/><?php echo L('REMOVECHECK');?></td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="19" class="check_all" name="check_stock"/></td>
			<td><?php echo L('STOCK');?></td>
			<td><input <?php if(in_array('stock/index', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list19" type="checkbox" name="per[]" value="stock/index"></td>
			<td><input <?php if(in_array('stock/view', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list19" type="checkbox" name="per[]" value="stock/view"></td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="20" class="check_all" name="check_inoutorder"/></td>
			<td><?php echo L('INOUTORDER');?></td>
			<td><input <?php if(in_array('stock/inoutorder', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list20" type="checkbox" name="per[]" value="stock/inoutorder"></td>
			<td><input <?php if(in_array('sales/inorder', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list20" type="checkbox" name="per[]" value="sales/inorder"><br/><?php echo L('S_INORDER');?></td>
			<td><input <?php if(in_array('sales/outorder', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list20" type="checkbox" name="per[]" value="sales/outorder"><br/><?php echo L('S_OUTORDER');?></td>
			<td><input <?php if(in_array('Purchase/inorder', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list20" type="checkbox" name="per[]" value="Purchase/inorder"><br/><?php echo L('C_INORDER');?></td>
			<td><input <?php if(in_array('Purchase/outorder', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list20" type="checkbox" name="per[]" value="Purchase/outorder"><br/><?php echo L('C_OUTORDER');?></td>
			<td><input <?php if(in_array('stock/printHtml', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list20" type="checkbox" name="per[]" value="stock/printHtml"><br/><?php echo L('PRINTHTML');?></td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="21" class="check_all" name="check_analytics"/></td>
			<td><?php echo L('ANALYTICS');?></td>
			<td><input <?php if(in_array('sales/analyticssales', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list21" type="checkbox" name="per[]" value="sales/analyticssales"> <br/><?php echo L('ANALYTICSORDER');?></td>
			<td><input <?php if(in_array('sales/analyticsprice', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list21" type="checkbox" name="per[]" value="sales/analyticsprice"> <br/><?php echo L('ANALYTICS_SALES');?>1</td>
			<td><input <?php if(in_array('sales/analyticstable', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list21" type="checkbox" name="per[]" value="sales/analyticstable"> <br/><?php echo L('ANALYTICSPRICE');?>2</td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="22" class="check_all" name="check_analytics"/></td>
			<td><?php echo L('DELIVERY');?></td>
			<td><input <?php if(in_array('sales/delivery', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list23" type="checkbox" name="per[]" value="sales/delivery"> <br/><?php echo L('VISIBLE');?></td>
			<td><input <?php if(in_array('sales/product_list', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list23" type="checkbox" name="per[]" value="sales/product_list"> <br/><?php echo L('PRODUCT_LIST');?></td>
			<td><input <?php if(in_array('sales/delivery_status', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list23" type="checkbox" name="per[]" value="sales/delivery_status"> <br/><?php echo L('DELIVERY_STATUS');?></td>
			<td><input <?php if(in_array('sales/delivery_contact', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list23" type="checkbox" name="per[]" value="sales/delivery_contact"> <br/><?php echo L('DELIVERY_CONTACT');?></td>
		</tr>
		<tr>
			<td><input type="checkbox" rel="13" class="check_all" name="check_marketing"/></td>
			<td><?php echo L('MARKETING');?></td>
			<td colspan="5"><input <?php if(in_array('setting/marketing', $owned_permission)){ echo 'checked="checked"';} ?> class="check_list13" type="checkbox" name="per[]" value="setting/marketing"> <?php echo L('ALL SEND EMAIL AND SMS');?></td>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td colspan="3">&nbsp;</td>
			<td colspan="5">
				<input class="btn btn-primary" id="sub_btn" name="submit" type="button" value="<?php echo L(SAVE);?>"> &nbsp; <input class="btn" type="button" onclick="$('#dialog-authorize').dialog('close');" value="<?php echo L('CANCEL');?>"/>
			</td>
		</tr>
	</tbody>
</table>
</form>
<script type="text/javascript">
	$(function(){
		$(".check_all").click(function(){
			var rel = $(this).attr('rel');
			$("input[class='check_list"+rel+"']").prop('checked', $(this).prop("checked"));
		});
	});
	$("#sub_btn").click(
		function() {
			var perlist = [];
			$('input:checkbox:checked').each(function(key,val){
				perlist.push($(val).val()) 
			});
			if(perlist && perlist.length > 0){
				var perlist_str = perlist.join(',') ;
			}else{
				var perlist_str = '' ;
			}
			var position_id = <?php echo ($position_id); ?>;
			$.get('<?php echo U("permission/user_authorize");?>',{perlist:perlist_str, auth:1,position_id:position_id}, function(data){
				alert(data.data);
				$('#dialog-authorize').dialog('close');
			}, 'json');
		}	
	);
</script>