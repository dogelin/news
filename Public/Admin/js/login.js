/**登录验证
 * 
 * 
 */
var login={
		check:function(){
			var username = $('#user').val();
			var password = $('#pwd').val();
			
			if(!password){
				dialog.error("密码不能为空");
			}
			if(!username){
				dialog.error('用户名不能为空');
			}
			var url="check";
			data={
				'username':username,
				'password':password,
			};
			$.post(url,data,function(result){
				if(result.status == 0){
					return dialog.error(result.message);
				}
				if(result.status == 1){
					return dialog.success(result.message,'../Index/index');
				}
			},'json');
			
		}
}