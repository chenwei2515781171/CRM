<?php if (!defined('THINK_PATH')) exit(); if(!C('ismobile')): ?><div class="span6">
    <img src="__PUBLIC__/img/leads.png" class="pull-left">
    <div class="span4">
        <p class="wel_title"><?php echo L('LEADS');?></p>
        <p><?php echo L('LEADS_DESCRIBE');?></p>
        <p><a href="<?php echo U('leads/add');?>"><?php echo L('CREATE_CLUE');?></a> <?php echo L('OR');?> <a href="<?php echo U('leads/index');?>"><?php echo L('SEE_CLUE');?></a></p>
    </div>
    <div class="span"><img src="__PUBLIC__/img/l_l.jpg"></div>
</div>
<div class="span6">
    <img src="__PUBLIC__/img/business.png" class="pull-left" >
    <div class="span4">
        <p class="wel_title"><?php echo L('BUSINESS');?></p>
        <p><?php echo L('BUSINESS_DESCRIBE');?></p>
        <p><a href="<?php echo U('business/add');?>"><?php echo L('CREATE_BUSINESS');?></a> <?php echo L('OR');?> <a href="<?php echo U('business/index');?>"><?php echo L('SEE_BUSINESS');?></a></p>
    </div>
</div>
<div class="span12" style="height:20px;"></div>
<div class="span6">
    <img src="__PUBLIC__/img/customer.png" class="pull-left">
    <div class="span4">
        <p class="wel_title"><?php echo L('CUSTOMER');?></p>
        <p><?php echo L('CUSTOMER_DESCRIBE');?></p>
        <p><a href="<?php echo U('customer/add');?>"><?php echo L('CREATE_CUSTOMER');?></a> <?php echo L('OR');?> <a href="<?php echo U('customer/index');?>"><?php echo L('SEE_CUSTOMER');?></a></p>
    </div>
    <div class="span"><img src="__PUBLIC__/img/l_l.jpg"></div>
</div>
<div class="span6">
    <img src="__PUBLIC__/img/event.png" class="pull-left" >
    <div class="span4">
        <p class="wel_title"><?php echo L('EVENT');?></p>
        <p><?php echo L('EVENT_DESCRIBE');?></p>
        <p><a href="<?php echo U('event/add');?>"><?php echo L('CREATE_SCHEDULE');?></a> <?php echo L('OR');?> <a href="<?php echo U('event/index');?>"><?php echo L('SEE_SCHEDULE');?></a></p>
    </div>
</div>
<div class="span12" style="height:20px;"></div>
<div class="span6">
    <img src="__PUBLIC__/img/finance.png" class="pull-left">
    <div class="span4">
        <p class="wel_title"><?php echo L('FINANCE');?></p>
        <p><?php echo L('FINANCE_DESCRIBE');?></p>
    </div>
    <div class="span"><img src="__PUBLIC__/img/l_l.jpg"></div>
</div>
<div class="span6">
    <img src="__PUBLIC__/img/task.png" class="pull-left" >
    <div class="span4">
        <p class="wel_title"><?php echo L('TASK');?></p>
        <p><?php echo L('TASK_DESCRIBE');?></p>
        <p><a href="<?php echo U('task/add');?>"><?php echo L('CREATE_TASK');?></a> <?php echo L('OR');?> <a href="<?php echo U('task/index');?>"><?php echo L('SEE_TASK');?></a></p>
    </div>
</div>
<div class="span12" style="height:20px;"></div>
<div class="span6">
    <img src="__PUBLIC__/img/knowledge.png" class="pull-left">
    <div class="span4">
        <p class="wel_title"><?php echo L('KNOWLEDGE');?></p>
        <p><?php echo L('KNOWLEDGE_DESCRIBE');?></p>
        <p><a href="<?php echo U('knowledge/add');?>"><?php echo L('CREATE_KNOWLEDGE');?></a> <?php echo L('OR');?> <a href="<?php echo U('knowledge/index');?>"><?php echo L('SEE_KNOWLEDGE');?></a></p>
    </div>
    <div class="span"><img src="__PUBLIC__/img/l_l.jpg"></div>
</div>
<div class="span6">
    <img src="__PUBLIC__/img/announcement.png" class="pull-left" >
    <div class="span4">
        <p class="wel_title"><?php echo L('ANNOUNCEMENT_MANAGEMENT');?></p>
        <p><?php echo L('ANNOUNCEMENT_MANAGEMENT_DESCRIBE');?></p>
    </div>
</div>
<?php else: ?>
	<div class="span6">
		<img src="__PUBLIC__/img/event.png" class="pull-left" >
		<div class="span4">
			<p class="wel_title"><?php echo L('WORK_LOG');?></p>
			<p><?php echo L('LOG_DESCRIBE');?></p>
			<p><a href="<?php echo U('log/mylog_add');?>"><?php echo L('CREATE_SCHEDULE');?></a> <?php echo L('OR');?> <a href="<?php echo U('log/index');?>"><?php echo L('SEE_SCHEDULE');?></a></p>
		</div>
	</div>
	<div class="span6">
		<img src="__PUBLIC__/img/leads.png" class="pull-left">
		<div class="span4">
			<p class="wel_title"><?php echo L('LEADS');?></p>
			<p><?php echo L('LEADS_DESCRIBE');?></p>
			<p><a href="<?php echo U('leads/add');?>"><?php echo L('CREATE_CLUE');?></a> <?php echo L('OR');?> <a href="<?php echo U('leads/index');?>"><?php echo L('SEE_CLUE');?></a></p>
		</div>
	</div>
	<div class="span6">
		<img src="__PUBLIC__/img/business.png" class="pull-left" >
		<div class="span4">
			<p class="wel_title"><?php echo L('BUSINESS');?></p>
			<p><?php echo L('BUSINESS_DESCRIBE');?></p>
			<p><a href="<?php echo U('business/add');?>"><?php echo L('CREATE_BUSINESS');?></a> <?php echo L('OR');?> <a href="<?php echo U('business/index');?>"><?php echo L('SEE_BUSINESS');?></a></p>
		</div>
	</div>
	<div class="span12" style="height:20px;"></div>
	<div class="span6">
		<img src="__PUBLIC__/img/customer.png" class="pull-left">
		<div class="span4">
			<p class="wel_title"><?php echo L('CUSTOMER');?></p>
			<p><?php echo L('CUSTOMER_DESCRIBE');?></p>
			<p><a href="<?php echo U('customer/add');?>"><?php echo L('CREATE_CUSTOMER');?></a> <?php echo L('OR');?> <a href="<?php echo U('customer/index');?>"><?php echo L('SEE_CUSTOMER');?></a></p>
		</div>
	</div><?php endif; ?>
<div class="span12" style="height:40px;"></div>