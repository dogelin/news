/**
 * 公共函数 */
//添加页面弹窗跳转

	$("#submit_add").click(function(){
		//console.log(file);
	    var data = $("#addForm").serializeArray();
	    postData = {};
	    $(data).each(function(i){
	       postData[this.name] = this.value;
	    });
	   // console.log(postData);
	    // 将获取到的数据post给服务器
	    var posturl = SCOPE.save_url;
	    var jump_url = SCOPE.jump_url;
	    $.post(posturl,postData,function(result){
	        if(result.status == 1) {
	            //成功
	            return dialog.success(result.message,jump_url);
	        }else if(result.status == 0) {
	            // 失败
	            return dialog.error(result.message);
	        }
	    },"JSON");
	});
	//编辑页面跳转弹窗
	$("#submit_edit").click(function(){
	    var data = $("#editForm").serializeArray();
	    postData = {};
	    $(data).each(function(i){
	       postData[this.name] = this.value;
	    });
	    console.log(postData);
	    var posturl = SCOPE.save_url;
	    var jump_url = SCOPE.jump_url;
	    $.post(posturl,postData,function(result){
	        if(result.status == 1) {
	            //成功
	            return dialog.success(result.message,jump_url);
	        }else if(result.status == 0) {
	            // 失败
	            return dialog.error(result.message);
	        }
	    },"JSON");
	});
	//删除页面弹窗
	function del(id){
		if(id === -1){
			return dialog.error("超级管理员不能删除");
		}
			var url=SCOPE.post_url;
			var jump_url=SCOPE.jump_url;
			data={
				'id':id,
			};
			layer.open({
	            content : "你确认删除 ？",
	            icon:3,
	            btn : ['是','否'],
	            yes : function(){
	            	$.post(url,data,function(result){
	    				if(result.status == 1) {
	    		            //成功
	    		            return dialog.success(result.message,jump_url);
	    		        }else if(result.status == 0) {
	    		            // 失败
	    		            return dialog.error(result.message);
	    		        }
	    			},'json');	
	            },
	        });
				
	};
	
	//批量删除
	function dels(){
		var url=SCOPE.post_dels;
		var jump_url=SCOPE.jump_url;
		var data = $("#formlist .dels").serializeArray();
		postData = {};
	    $(data).each(function(i){
	       postData[this.name] = parseInt(this.value);
	    });
	    console.log(postData);
		layer.open({
            content : "你确认删除 ？",
            icon:3,
            btn : ['是','否'],
            yes : function(){
            	$.post(url,postData,function(result){
    				if(result.status == 1) {
    		            //成功
    		            return dialog.success(result.message,jump_url);
    		        }else if(result.status == 0) {
    		            // 失败
    		            return dialog.error(result.message);
    		        }
    			},'json');	
            },
        });
	}
	
	//排序
	function listorder(){
		var url=SCOPE.post_order;
		var jump_url=SCOPE.jump_url;
		var data = $("#formlist").serializeArray();
		postData = {};
	    $(data).each(function(i){
	       postData[this.name] = parseInt(this.value);
	    });
	    console.log(postData);
	    $.post(url,postData,function(result){
	        if(result.status == 1) {
	            //成功
	            return dialog.success(result.message,jump_url);
	        }else if(result.status == 0) {
	            // 失败
	            return dialog.error(result.message);
	        }
	    },"JSON");
	}
	//状态转换
	function editstatus(status,id){
		var url=SCOPE.status_url;
		var jump_url=SCOPE.jump_url;
		data={
			'id':id,
			'status':status,
		};
		console.log(data);
		$.post(url,data,function(result){
			if(result.status == 1) {
	            //成功
	            return dialog.success(result.message,jump_url);
	        }else if(result.status == 0) {
	            // 失败
	            return dialog.error(result.message);
	        }
		},'json');
	};
	//推荐位
	$('#submit_loca').click(function(){
		var locaId = $('#located').val();
		var data = $("#formlist .dels").serializeArray();
		postData = {};
	    $(data).each(function(i){
	       postData[i] = parseInt(this.value);
	    });
	    var jump_url=SCOPE.jump_url;
	    var url=SCOPE.loca_url;
	    var data1={};
	    data1['con_id'] =postData;
	    data1['loca_id'] =locaId;
	    console.log(data1);
	    $.post(url,data1,function(result){
	        if(result.status == 1) {
	            //成功
	            return dialog.success(result.message,jump_url);
	        }else if(result.status == 0) {
	            // 失败
	            return dialog.error(result.message);
	        }
	    },"JSON");
	});
	
	//设置全选
	$("#checkall").click(function(){
		if($(this).prop('checked')){
			 $(".dels").prop('checked', true);
		}else{			
			 $(".dels").prop('checked', false);
		}
	});
	

	
	
			