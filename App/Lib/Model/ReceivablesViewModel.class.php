<?php 
	class ReceivablesViewModel extends ViewModel{
		public $viewFields = array(
			'receivables'=>array('receivables_id','name','price','creator_role_id','owner_role_id','delete_role_id','is_deleted','delete_time','pay_time','create_time','description','create_time','status','type','bill_id', '_type'=>'LEFT'),
			'role'=>array('_on'=>'receivables.creator_role_id=role.role_id', '_type'=>'LEFT'),
			'user'=>array('name'=>'creator_name', '_on'=>'role.user_id = user.user_id')
		);
	}