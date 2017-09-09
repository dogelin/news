<?php
	namespace Home\Model;
	use Think\Model\ViewModel;
	class ContentViewModel extends ViewModel {
	   public $viewFields = array(
	     'Locapush'=>array('_type'=>'LEFT'),
	     'Content'=>array('id','artname','pic','status','count','_on'=>'Locapush.con_id=Content.id','_type'=>'RIGHT'),
	     'Located'=>array('name'=>'pushname', '_on'=>'Locapush.loca_id=Located.id'), 
	     ); 
	}
?>
