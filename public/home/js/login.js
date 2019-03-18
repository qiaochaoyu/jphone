$(function () {
    //点击账号登录
    $('#account').click(function () {
        $('#sms').removeClass('active');
        $('#smsMain').addClass('none');
        $(this).addClass('active');
        $('#accountMain').removeClass('none');
    });

    //点击短信登陆
    $('#sms').click(function () {
        $('#account').removeClass('active');
        $("#accountMain").addClass('none');
        $(this).addClass('active');
        $('#smsMain').removeClass('none');
    });

    //点击转换成二维码页面
    $('#qrCode').click(function () {
        $('#writeLogin').addClass('none');
        $('#qrLogin').removeClass('none');
    });

    //点击转换成文字登陆页面
    $('#computer').click(function () {
        $('#qrLogin').addClass('none');
        $('#writeLogin').removeClass('none');
    });
    var countdown=60;

    //点击获取验证码
    function dd(then){
        console.log('点击了');
        settime(then);
    }
    function settime(obj) { //发送验证码倒计时
        if (countdown == 0) {
            obj.removeClass('dynamicPassword-disabled');
            obj.attr('disabled',false);
            //obj.removeattr("disabled");
            obj.text("免费获取验证码");
            countdown = 60;
            return;
        } else {
            obj.attr('disabled',true);
            obj.addClass('dynamicPassword-disabled');
            obj.text("已发送(" + countdown + ")");
            countdown--;
        }
        setTimeout(function() {
                settime(obj) }
            ,1000)
    }


    $('#dynamicPassword').click(function () {
        var then=$(this);
        dd(then);

    })



});