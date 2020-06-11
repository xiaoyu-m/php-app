<head>
    <title>
    登录
    </title>
    <link rel="icon" href="/assets/images/favicon.ico" />
    <link rel="stylesheet" href="/assets/css/public/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/login.css">
  <link rel="stylesheet" href="/assets/css/public/public.css">
</head>
<div id="login-total" class="container align-middle">
<div class="row">
    <div class="col-lg-6 col-md-8 col-10 offset-lg-3 offset-md-2 offset-1">
        <form class="shadow-lg bg-white p-5">
            <div class="text-center text-monospace">
                <h1 class="p-3">小于</h1>
                <h3 class="text-muted font-18 m-b-5">欢迎使用</h3>
                <p class="text-muted">
                    登录以使用后台管理
                </p>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <label for="account"  class="text-muted">账号：</label>
                    <input type="text" class="form-control" id="account">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <label for="password"  class="text-muted">密码：</label>
                    <input type="password" class="form-control" id="password">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-6 col-md-9">
                    <strong>
                        <a href="#" class="text-muted">注册账号</a>
                    </strong>
                </div>
                <div class="col-6 col-md-3">
                  <b class="btn btn-danger form-control" id="submit">登录</b>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-12">
                    <strong>
                        <a href="#" class="text-muted">忘记密码</a>
                    </strong>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
<script src="/assets/js/public/jquery-3.4.1.min.js"></script>
<script>
let user = {}, resdata = {};
$('#submit').on('click', () => {
    user = {
        account: $('#account').val(),
        password: $('#password').val()
    }
    $.ajax({
        url: "/server/login.php",
        async: true,
        type: 'post', //请求的方式
        data: user,
        beforeSend: function() {
        // 禁用按钮防止重复提交
            $("#submit").attr({
                disabled: "disabled"
            });
        },
        success: function(res) {
            console.log(res);
            let {state,msg} = JSON.parse(res);
            if (state === '2000') {
                sessionStorage.setItem("token", 200);
                location.href = "/admin/index.php";
                 alert('登录成功');
            }else{
                 alert(msg);
            }
        },
        catch: function(err) {
            console.log(err);
        }
    });
})
</script>
</div>
