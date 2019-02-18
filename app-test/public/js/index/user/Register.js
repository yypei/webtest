AllPageJsParent.indexUserRegister=function(){

};
AllPageJsParent.indexUserRegister.prototype={
    init:function(){
        this.initEvent();
    },
    initEvent:function(){
        $('.cod-refresh').click(function(){
            $(this).attr('src','/get_img_code?action=get_code&type=register&t='+new Date().getTime());
        });
        /*$('.register-box .btn').click(function(){
            $.getJSON('/register',{'action':'check_img_code','type':'register','img_code':$('#prove_cod').val()},function(data){
                console.log(data);
            })
        });*/
        /*$('.register-box .btn').click(function(){
            $.getJSON('/register',{'action':'check_register','phone':$.trim($('#login_username').val())},function(data){
                console.log(data);
            })
        });*/
        $('.register-box .btn').click(function(){
            $.getJSON('/register',{'action':'check_phone_code','phone_code':$.trim($('#prove_code').val())},function(data){
                if(data.code===0){
                    console.log(1111);
                }else{
                    console.log(2222);
                }
            })
        });
    }
};
var indexUserRegister=new AllPageJsParent.indexUserRegister();
indexUserRegister.init();