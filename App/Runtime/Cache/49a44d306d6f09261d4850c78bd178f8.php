<?php if (!defined('THINK_PATH')) exit();?><form action="<?php echo U('finance/add','t=receivingorder');?>" id="add_receivingorder_form" method="post">
				<td class="tdleft" valign="middle">收款方式</td>
				<td valign="middle"><li style="list-style-type:none;">
							<select style="width:auto" name="pay_type" id="pay_type" onchange="changeCondition()">
								<option value="现金">现金</option>
								<option value="转账">转账</option>
								<option value="刷卡">刷卡</option>	
							</select>&nbsp;&nbsp;
						</li></td>
			</tr>
			<tr>
				<td class="tdleft" valign="middle">开票金额</td>
				<td valign="middle"><input class="text-input large-input" id="invoice" name="invoice" type="text" /></td>		
				</tr>
			<tr>