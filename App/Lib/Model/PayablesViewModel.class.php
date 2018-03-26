<?php
	class PayablesViewModel extends ViewModel{
		public $viewFields = array(
			'payables'=>array('payables_id','name','price','creator_role_id','owner_role_id','delete_role_id','delete_time','is_deleted','pay_time','create_time','update_time','description','type','bill_id','status', '_type'=>'LEFT'),			
			'role'=>array('_on'=>'payables.creator_role_id=role.role_id', '_type'=>'LEFT'),
			'user'=>array('name'=>'creator_name', '_on'=>'role.user_id = user.user_id' ,'_type'=>'LEFT')
		);
	}