AllPageJsParent.adminUserLogin=function(){

};
AllPageJsParent.adminUserLogin.prototype={
    init:function(){
        this.initEvent();
        var options={
            rule:{
                user_name:'required',
                psd:'required'
            },
            messages:{
                user_name:'请输入用户名',
                psd:'请输入密码'
            },
            submitHandler:function(form){
                $.getJSON('/admin/login/check_login',$(form).serialize(),function(data){
                    console.log(data);
                    if(data.code!==0){
                        $('.msg-tip').html(data.msg);
                    }
                })
            }
        };
        $('#loginForm').validate(options);
    },
    initEvent:function(){
        $('.img-code-btn').click(function(){
            $(this).attr('src','/get_img_code?type=admin_login&t='+new Date().getTime())
        });
    }
};
var adminUserLogin=new AllPageJsParent.adminUserLogin();
adminUserLogin.init();