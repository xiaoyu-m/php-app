<script src="/assets/js/public/jquery-3.4.1.min.js"></script>
<script src="/assets/js/public/popper.min.js"></script>
<script src="/assets/js/public/bootstrap.min.js"></script>
<script src="/assets/js/public/public.js"></script>
<script>

isSignIn() //判断是否登录
let siderState = false;

//指令 清空所有input值
function closeAllInput() {
  $('input').map(function (i, elem) {
    elem.value = '';
  });
  $('textarea').map(function (i, elem) {
    elem.value = '';
  });
}
// 关闭模态框 清空所有input的值
$('.close-btn').click(function () {
  // console.log(this)
  closeAllInput();
});
// 警告框
function Alert(alertType, msg) {
  $('.tipbox').append(
    `<div class="alert alert-${alertType}">
        <strong>${msg}</strong>
      </div>`
  );
  for (let index = 0; index < $('.alert').length; index++) {
    setTimeout(() => {
      // 定时删除 警告框 点击后2秒
      if ($('.alert')[index]) {
        $('.alert')[index].remove();
      } else {
        return;
      }
    }, 2000);
  }
}
function isSignIn() {
  if (!sessionStorage.getItem("token")) {
  location.href = "/login.php";
}
}
$('.zoom-nav').click(function(e) { // 左侧侧边点击 缩放
  siderState = !siderState
  if (siderState) {
    $('.left-side-menu').addClass('left-side-menu-active')
    $('section').addClass('section-active')
  } else {
    $('.left-side-menu').removeClass('left-side-menu-active')
    $('section').removeClass('section-active')
  }
})
$(".list-group-item").tooltip(); //top hover提示效果初始化
$('a.list-group-item').click(function() {//导航状态切换 .active
  <?php
    $linkState = "$(this).index()";
  ?>
})
$('.icon-sign-out').click(function () {
  sessionStorage.removeItem("token");
  isSignIn()
})
<?php
  $linkState = $_SERVER["REQUEST_URI"];
  echo "const linkState ='$linkState';";
  ?>
  $('a.list-group-item').map((i,event)=>{
    if(event.getAttribute('href') === ''+linkState)
    $(event).addClass('active')
  })
</script>