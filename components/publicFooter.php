<script src="/assets/js/public/jquery-3.4.1.min.js"></script>
<script src="/assets/js/public/popper.min.js"></script>
<script src="/assets/js/public/bootstrap.min.js"></script>
<script src="/assets/js/public/public.js"></script>
<script>

isSignIn() //判断是否登录
let siderState = false;

function isSignIn() {
  if (!sessionStorage.getItem("user")) {
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
  sessionStorage.removeItem("user");
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