<!DOCTYPE html>
<html lang="zh">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/assets/images/favicon.ico" />
  <title>员工管理</title>
  <link rel="stylesheet" href="/assets/css/public/bootstrap.min.css">
  <link rel="stylesheet" href="/assets/icon/sider/iconfont.css">
  <link rel="stylesheet" href="/assets/css/index.css">
  <style>
  
  </style>
</head>

<body>
  <!-- 添加员工 -->
  <div class="tipbox">
  </div>
  <div class="modal mt-5 fade "  id="addEmpModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">添加员工</h5>
          <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addEmpForm">
            <div class="form-group row">
              <div class="col-12">
                <label for="#empName">
                  姓名：
                </label>
                <input type="text" name="empName" class="form-control" id="empName">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="#sex">
                  性别：
                </label>
                <select class="form-control" name="sex" id="sex">
                  <option value="男">男</option>
                  <option value="女">女</option>
                </select>
              </div>
              <div class="col-6">
                <label for="#age">
                  年龄：
                </label>
                <input type="text" name="age" class="form-control" id="age">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="#dept">
                  部门：
                </label>
                <select class="form-control" name="dept" id="dept">
                  <option value="技术部">技术部</option>
                  <option value="事业部">事业部</option>
                  <option value="服务部">服务部</option>
                  <option value="管理部">管理部</option>
                </select>
              </div>
              <div class="col-6">
                <label for="#jobTitle">
                  职称：
                </label>
                <select class="form-control" name="jobTitle" id="jobTitle">
                  <option value="前端">前端</option>
                  <option value="后端">后端</option>
                  <option value="数据库">数据库</option>
                  <option value="美化">美化</option>
                  <option value="宣传">宣传</option>
                  <option value="宣传">宣传</option>
                </select>
              </div>
            </div>
            <div class="form-group row">
              <div class="col-12">
                <label for="#native">
                  籍贯：
                </label>
                <input type="text" name="native" class="form-control" id="native">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="#state">
                  状态：
                </label>
                <select class="form-control" name="state" id="state">
                  <option>在职</option>
                  <option>离职</option>
                </select>
              </div>
              <div class="col-6">
                <label for="#likes" >
                  爱好：
                </label>
                <input type="text" name="likes" class="form-control" id="likes">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-12">
                <label for="#remark" >
                  备注：
                </label>
                  <textarea class="form-control" name="remark" id="remark" aria-label="With textarea"></textarea>
              </div>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-lg btn-secondary close-btn" data-dismiss="modal">
            取消
          </button>
          <button type="button" class="btn btn-lg btn-primary addEmpBtn">添加</button>
        </div>
      </div>
    </div>
  </div>
  <div id="root">
    <?php
    include_once '../components/navSider.php';
    ?>
    <section>
    <?php
    include_once '../components/header.php';
    ?>
      <div class="content">
        <div>
          <h2 class="p-3 pl-4 content-title">员工管理</h2>
          <nav class="container-fluid float-right" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/">后台管理</a></li>
              <li class="breadcrumb-item active" aria-current="page">员工管理</li>
            </ol>
          </nav>
        </div>
        <div class="container-fluid " id="index-total">
          <div class="bg-white p-4">
            <button type="button" class="add add-emp btn btn-primary" data-toggle="modal" data-target="#addEmpModal">
              <i class="iconfont icon-tianjia"></i>
              <b> 添加员工</b>
            </button>
          </div>
        </div>
          <?php
          include_once '../components/footer.php';
          ?>
      </div>
    </section>
  </div>
</body>
<?php
include_once '../components/publicFooter.php';
?>
<script>
// 输入框 验证
$(`#addEmpForm label`).map(function(index,elem) {
  $('#addEmpForm .form-control')[index].onclick = function () {
    $(`#addEmpForm label`)[index].classList.remove('input-err')
  }
})
// 关闭模态框 清空所有input的值
$('.close-btn').click(function() {
  // console.log(this)
  closeAllInput()
});
// 添加员工 
$('.addEmpBtn').click(function(event) {
  let addEmpForm = $('#addEmpForm').serializeArray();
  // let data = 1;
  let data = isEmpty(addEmpForm);
  if (data) {
    sedEmp(data);
  }
});
function Alert(alertType,msg) { // 警告框
   $('.tipbox').append(
    `<div class="alert alert-${alertType}">
      <strong>${msg}</strong>
    </div>`
  );
  for (let index = 0; index < $('.alert').length; index++) {
    setTimeout(() => { // 定时删除 警告框 点击后2秒
      if ($('.alert')[index]) {
        $('.alert')[index].remove()
      }else{
        return ;
      }
    }, 2000);
  }
}
function cleanTimer() {
  for (let index = 0; index < $('.alert').length; index++) {
    clearTimeout(_alert[index]);
  }
}
function closeAllInput() { //清空 所有input的值
  $('input').map(function(i,elem) {
    elem.value = '' 
  })
}
function isEmpty(data){
  let results = {};
  data.map(function(elem, index) {
    results[elem.name] = elem.value;
    if(elem.value === ''){
      $(`#addEmpForm label`)[index].classList.add('input-err')
    }else{
      $(`#addEmpForm label`)[index].classList.remove('input-err')
    }
  });
  tipMsg = false;
  $(`#addEmpForm label`).map(function(elem,index) {
    if ($(this).attr('class') === 'input-err') {
      tipMsg = '表单数据有误，请根据红色警告重新填写';
    }
  })
  if (tipMsg) {
    alert(tipMsg);
    return false;
  }else{
    return results;
  }
}
function sedEmp(data) {
  $.ajax({
    url: "/server/emp.php",
    async: true,
    type: 'post', //请求的方式
    data: data,
    beforeSend: function() {
    // 禁用按钮防止重复提交
        $("#submit").attr({
            disabled: "disabled"
        });
    },
    success: function(res) {
      console.log(res);
    },
    catch: function(err) {
        console.log(err);
    }
  });
}
getEmpList();
function getEmpList() {
  $.get("/server/emp.php", { name: "John", time: "2pm" },function(res){
    console.log(res);
  });
}
</script>
</html>