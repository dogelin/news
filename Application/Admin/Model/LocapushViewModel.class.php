<?php
	namespace Admin\Model;
	use Think\Model\ViewModel;
	class LocapushViewModel extends ViewModel {
	   public $viewFields = array(
	     'Locapush'=>array('id','_type'=>'LEFT'),
	     'Content'=>array('artname', '_on'=>'Locapush.con_id=Content.id','_type'=>'RIGHT'),
	     'Located'=>array('name'=>'pushname', '_on'=>'Locapush.loca_id=Located.id'),   
	     ); 
	}
?>
