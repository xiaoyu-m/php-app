<title>
登录
</title>
<link rel="icon" href="/assets/images/favicon.ico" />
<link rel="stylesheet" href="/assets/css/public/bootstrap.min.css">
<style>
body {
height: 100%;
padding-top: 26vh;
}
</style>
<div id="login-total" class="container align-middle">
<div class="row">
    <div class="col-6 offset-3">
        <form class="shadow-lg p-5">
            <div class="form-group row pt-2 pb-2">
                <label for="account" class="col-3">账号：</label>
                <div class="col-9">
                  <input type="text" class="form-control" id="account">
                </div>
            </div>
            <div class="form-group row pt-2 pb-2">
                <label for="password" class="col-3">密码：</label>
                <div class="col-9">
                  <input type="password" class="form-control" id="password">
                </div>
            </div>`
            <div class="form-group row pt-2 pb-2">
                <div class="col-3"></div>
                <div class="col-9 ">
                  <b class="btn btn-danger form-control" id="submit">登录</b>
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
            
            let {state,msg} = JSON.parse(res)[0];
            if (state === '2000') {
                sessionStorage.setItem("user", msg);
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
