<?php if (!defined('THINK_PATH')) exit();?><div class="nav-collapse collapse">
	<ul class="nav"> 
		<?php if(is_array($top)): $i = 0; $__LIST__ = $top;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["title"] != ''): ?><li <?php if(strtolower(MODULE_NAME) == strtolower($vo['module'])): ?>class="active"<?php endif; ?>><a  href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>				
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo L('MORE');?> <b class="caret"></b></a>
			<ul class="dropdown-menu">							
				<?php if(is_array($more)): $i = 0; $__LIST__ = $more;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["title"] != ''): ?><li><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				<li class="divider"></li>
				<li><a href="<?php echo U('navigation/index');?>"><?php echo L('MENU_SETTINGS');?></a></li>
			</ul>
		</li>	
	</ul>
	<ul class="nav pull-right">
		<li style=" width: auto;margin-right: 5px;"><a  style="padding: 10px 0px;width: auto;color:#fff"><i class="icon-user"></i><?php echo (session('name')); ?></a></li>
		<li style=" width: 30px; "><a  style="padding: 10px 0px; width: 70px; " href="<?php echo U('message/index');?>" title="<?php echo L('NEW_MESSAGE');?>"><span id="message_tips" style="color:#fff;"><i class="icon-envelope"></i> <span id="message_num">0</span> </span></a></li>
		<li style=" width: 30px; "><a  style="padding: 10px 0px; width: 70px; " href="<?php echo U('task/index', 'by=me');?>" title="<?php echo L('MY_TASK');?>"><span id="task_tips" style="color:#fff;"><i class="icon-tasks"></i> <span id="task_num">0</span> </span></a></li>
		<li style=" width: 30px; "><a  style="padding: 10px 0px; width: 70px; " href="<?php echo U('event/index','by=me');?>" title="<?php echo L('TODAY_SCHEDULE');?>"><span id="event_tips" style="color:#fff;"><i class="icon-screenshot"></i> <span id="event_num">0</span> </span></a></li>
		<li style=" width: 30px; "><a  style="padding: 10px 0px; width: 70px; " href="<?php echo U('contract/index','by=me');?>" title="<?php echo L('CONTRACT_EXPIRES_REMIND');?>"><span id="contract_tips" style="color:#fff;"><i class="icon-star-empty"></i> <span id="contract_num">0</span> </span></a></li>
		<li class="dropdown" >
			<a href="#" title="<?php echo L('QUICK_ADD');?>" class="dropdown-toggle" data-toggle="dropdown" style="padding: 10px;"><i class="icon-plus"  style="padding: 2px 0px;"></i>  <b class="caret"></b></a>
			<ul class="dropdown-menu">
				<li><a id="header_send_message"><?php echo L('MESSAGE');?></a></li>
				<?php if(is_array($simple)): $i = 0; $__LIST__ = $simple;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["module_name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				<li class="divider"></li>
				<li><a href="<?php echo U('navigation/index','type=simple');?>"><?php echo L('OPTION_SET');?></a></li>
			</ul>
		</li>
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding: 10px;"><?php echo L('SYSTEM');?><b class="caret"></b></a>
			<ul class="dropdown-menu">							
				<?php if(is_array($user)): $i = 0; $__LIST__ = $user;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["title"] != ''): ?><li><a href="<?php echo ($vo["url"]); ?>"><?php echo ($vo["title"]); ?></a></li><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				<!--li class="divider"></li>
				<if condition="session('admin')">
				<li> <a href="javascript:check_version();">&nbsp;<?php echo L('CHECK_THE_NEW_VERSION');?></a></li>
				<li><a href="javascript:check_authorize();" style="background-color: #FAE7C6;"><i class="icon-star-empty"> </i> <?php echo L('AUTHORIZED CERTIFICATION');?> <i class="icon-star-empty"> </i> </a></li></if-->
				<li><a href="<?php echo U('user/logout');?>"><?php echo L('EXIT');?></a></li>
			</ul>
		</li>
	</ul>
</div>
<div id="dialog-upgrade" class="hide" title="<?php echo L('VERSION_UPDATE');?>">
	<p><?php echo L('CURRENT_VERSION'); echo C("VERSION");?> &nbsp; <?php echo L('DELIVERY_TIME'); echo C("RELEASE");?></p>
	<p id="process"><?php echo L('CONNECT_REMOTE_SERVER');?></p>
	<p id="info"></p>
</div>
<div id="dialog-authorize" class="hide" title="<?php echo L('AUTHORIZED CERTIFICATION');?>">
	<p id="info"></p>
</div>
<div id="message" class="hide"><p id="tips"></p></div>
<div class="hide" id="dialog-message-send" title="<?php echo L('WRITE_LETTER');?>">loading...</div>
<script type="text/javascript">
$('#dialog-upgrade').dialog({
	autoOpen: false,
	modal: true,
	width: 600,
	maxHeight: 400,
	position :["center",100],
	buttons: { 
		"OK": function () {
			$(this).dialog("close");
		}
	}
});

$('#dialog-authorize').dialog({
	autoOpen: false,
	modal: true,
	width: 600,
	maxHeight: 400,
	position :["center",100],
	buttons: { 
		"OK": function () {
			$(this).dialog("close");
		}
	}
});
$("#dialog-message-send").dialog({
    autoOpen: false,
    modal: true,
	width: 800,
	maxHeight: 600,
	position: ["center",100]
});
function check_version() {
	$('#dialog-upgrade').dialog('open');
	$.get("<?php echo U('upgrade/index');?>", function(data){
		if (data.status) {
			info = "<span style='color:green;'>" + data.info + "</span>";
		} else {
			info = "<span style='color:red;'>" + data.info + "</span>";
		}
		$("#dialog-upgrade #info").html(info);
	});
}

function check_authorize() {
	$('#dialog-authorize').dialog('open');
	$.get("<?php echo U('upgrade/authorize');?>", function(data){
		var info = '';
		if (data.status == 1) {
			info += "<?php echo L('AUTHORIZED WEBSITE');?>：<span style='color:green;'>" + data.data.server + "</span><br/>";
			info += "<?php echo L('COMPANY NAME');?>：<span style='color:green;'>" + data.data.company + "</span><br/>";
			info += "<?php echo L('COMPANY ADDRESS');?>：<span style='color:green;'>" + data.data.address + "</span><br/>";
			info += "<?php echo L('AUTHORIZED TYPE');?>：<span style='color:green;'>" + data.data.type + "</span><br/>";
			info += "<?php echo L('AUTHORIZED NUMBER');?>：<span style='color:green;'>" + data.data.number + "</span><br/>";
			info += "<?php echo L('AUTHORIZED DATE');?>：<span style='color:green;'>" + data.data.time + "</span><br/>";
		} else {
			info = '<?php echo L('YOUR CURRENT SYSTEM AUTHORIZATION INFORMATION:COMMUNITY FREE VERSION');?>';
		}
		
		$("#dialog-authorize #info").html(info);
	});
}
a = 1;
function fn(){
	if(a == 1){
		$('#message_tips').css({color:'white'});
		a = 0;
	}else{
		$('#message_tips').css({color:'#D2D2D2'});
		a = 1;
	}
}
var myInterval;

function message_tips(){
	$.get("<?php echo U('message/tips');?>", function(data){
		if(data.data['message'] != $('#message_tips #message_num').html()){
			$('#message_tips').css({color:'#D2D2D2'});
			myInterval = setInterval(fn,1000);
			$("#message #tips").html("<audio id='ttsoundplayer'  autoplay='autoplay'><source src='Public/sound/Global.wav' type='audio/wav'></audio>");
		} else {
			$("#message #tips").html('');
			if(data.data['message'] == 0){
				$('#message_tips').css({color:'#fff'});
				clearInterval(myInterval);
			}
		}
	
		if(data.data['task'] != '0'){
			$('#task_tips').css({color:'#D2D2D2'});
		}else{
			$('#task_tips').css({color:'#fff'});
		}
		if(data.data['event'] != '0'){
			$('#event_tips').css({color:'#D2D2D2'});
		}else{
			$('#event_tips').css({color:'#fff'});
		}
		if(data.data['contract'] != '0'){
			$('#contract_tips').css({color:'#D2D2D2'});
		}else{
			$('#contract_tips').css({color:'#fff'});
		}
		
		$('#message_tips #message_num').html(data.data['message']);
		$('#task_tips #task_num').html(data.data['task']);
		$('#event_tips #event_num').html(data.data['event'] );
		$('#contract_tips #contract_num').html(data.data['contract'] );
	},'json');
	setTimeout('message_tips()',5000);
}


$(function(){
	message_tips();
	
	$("#header_send_message").click(function(){
		$('#dialog-message-send').dialog('open');
		$('#dialog-message-send').load('<?php echo U("message/send");?>');
	});
});
</script>