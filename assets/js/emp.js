getEmpList(); // 初始化 员工列表
var empList = []; //全局变量 存储所有员工
var empNo; // 全局变量 存储待操作empNo
// 输入框 验证
$('#addEmpForm label').map(function (index, elem) {
  $('#addEmpForm .form-control')[index].onclick = function () {
    $('#addEmpForm label')[index].classList.remove('input-err');
  };
});
// 关闭模态框 清空所有input的值
$('.close-btn').click(function () {
  // console.log(this)
  closeAllInput();
});
// 添加员工
$('.addEmpBtn').click(function (event) {
  let addEmpForm = $('#addEmpForm').serializeArray();
  // let data = 1;
  let data = isEmpty(addEmpForm);
  if (data) {
    // console.log(data);
    sendEmp(data);
  }
});
//操作 编辑员工
$('.editEmpBtn').click(function (event) {
  editEmp();
});
//操作 删除员工
$('.delEmpBtn').click(function (event) {
  // console.log(11111111);

  delEmp();
});
// 验证表单 是否为空
function isEmpty(data) {
  let results = {};
  data.map(function (elem, index) {
    results[elem.name] = elem.value;
    if (elem.value === '') {
      $(`#addEmpForm label`)[index].classList.add('input-err');
    } else {
      $(`#addEmpForm label`)[index].classList.remove('input-err');
    }
  });
  tipMsg = false;
  $(`#addEmpForm label`).map(function (elem, index) {
    if ($(this).attr('class') === 'input-err') {
      tipMsg = '表单数据有误，请根据红色警告重新填写';
    }
  });
  if (tipMsg) {
    alert(tipMsg);
    return false;
  } else {
    return results;
  }
}
// 获取表单数据
function getData(even) {
  let results = {
    empNo: empNo,
  };
  even.map((elem, i) => {
    results[elem.name] = elem.value;
  });
  return results;
}
// ajax 提交表单
function sendEmp(data) {
  $.ajax({
    url: '/server/emp.php',
    async: true,
    type: 'post', //请求的方式
    data: { params: 'addEmp', data: data },
    beforeSend: function () {
      // 禁用按钮防止重复提交
      $('#submit').attr({
        disabled: 'disabled',
      });
    },
    success: function (res) {
      console.log(res);
      let { state, msg } = JSON.parse(res);
      if (state === '2000') {
        $('#addEmpModal').modal('hide');
        closeAllInput();
        getEmpList();
        Alert('success', msg);
      }
    },
    catch: function (err) {
      console.log(err);
    },
  });
}
// 获取员工列表
function getEmpList() {
  $.get('/server/emp.php', { params: 'getEmpList' }, function (res) {
    // console.log(111111, res);
    if (res) {
      let { state, msg } = JSON.parse(res);
      console.log(msg);
      if (state === '2000') {
        // Alert('success','嘤嘤嘤');
        empList = msg;
      } else {
        empList = [];
      }
      showEmpList();
    }
  });
}
// 展示员工信息
function showEmpList() {
  let $tr = '',
    trs = '';
  console.log(empList.length);
  if (empList.length) {
    empList.map((e, i) => {
      $tr = `<tr>
          <td>${i + 1}</td>
          <td>${e.empName}</td>
          <td>${e.sex}</td>
          <td>${e.age}</td>
          <td>${e.dept}</td>
          <td>${e.jobTitle}</td>
          <td>${e.native}</td>
          <td>${e.state}</td>
          <td>${e.likes}</td>
          <td>${e.remark}</td>
          <td class="caozuo">
            <button class="viewEmp btn btn-light" data-toggle="modal" data-target="#viewEmpModal">查看</button>
            <button class="editEmp btn btn-primary" data-toggle="modal" data-target="#editEmpModal">编辑</button>
            <button class="delEmp btn btn-success" data-toggle="modal" data-target="#delEmpModal">删除</button>
          </td>
        </tr>`;
      trs += $tr;
    });
  } else {
    Alert('danger', '哈哈，没得数据');
    trs +=
      '<tr><td class="text-center p-4 bg-light" colspan="11">无数据</td></tr>';
  }
  $('tbody').html(trs);
  // 模态框 查看 某员工

  $('.viewEmp').click(function () {
    empNo = $(this).parents('tr').index();
    viewEmpItem(empNo);
  });
  // 模态框 编辑 某员工
  $('.editEmp').click(function () {
    empNo = $(this).parents('tr').index();
    editEmpItem(empNo);
  });
  // 模态框 删除 某员工
  $('.delEmp').click(function () {
    empNo = $(this).parents('tr').index();
    delEmpItem(empNo);
  });
}
// 模态框内容 显示
function showEmpInfo(even) {
  let str = '';
  str += `
      <div>
        <p class="alert alert-dark text-dark"><stong>姓名：</stong><span>${even.empName}</span></p>
        <p class="alert alert-dark text-dark"><stong>性别：</stong><span>${even.sex}</span></p>
        <p class="alert alert-dark text-dark"><stong>年龄：</stong><span>${even.age}</span></p>
        <p class="alert alert-dark text-dark"><stong>部门：</stong><span>${even.dept}</span></p>
        <p class="alert alert-dark text-dark"><stong>职称：</stong><span>${even.jobTitle}</span></p>
        <p class="alert alert-dark text-dark"><stong>籍贯：</stong><span>${even.native}</span></p>
        <p class="alert alert-dark text-dark"><stong>状态：</stong><span>${even.state}</span></p>
        <p class="alert alert-dark text-dark"><stong>爱好：</stong><span>${even.likes}</span></p>
        <p class="alert alert-dark text-dark"><stong>备注：</stong><span>${even.remark}</span></p>
      </div>
      `;
  return str;
}
// 模态框内容 编辑
function editEmpInfo(even) {
  empNo = even.empNo;
  let str = '';
  str += `
      <form id="editEmpForm">
        <div class="input-group input-group-sm p-2 shadow-sm text-dark"><stong class="text-muted pt-2">姓名：</stong><span><input type="text" class="form-control" name="empName" value="${even.empName}"></span></div>
        <div class="input-group input-group-sm p-2 shadow-sm text-dark"><stong class="text-muted pt-2">性别：</stong><span><input type="text" class="form-control" name="sex" value="${even.sex}"></span></div>
        <div class="input-group input-group-sm p-2 shadow-sm text-dark"><stong class="text-muted pt-2">年龄：</stong><span><input type="text" class="form-control" name="age" value="${even.age}"></span></div>
        <div class="input-group input-group-sm p-2 shadow-sm text-dark"><stong class="text-muted pt-2">部门：</stong><span><input type="text" class="form-control" name="dept" value="${even.dept}"></span></div>
        <div class="input-group input-group-sm p-2 shadow-sm text-dark"><stong class="text-muted pt-2">职称：</stong><span><input type="text" class="form-control" name="jobTitle" value="${even.jobTitle}"></span></div>
        <div class="input-group input-group-sm p-2 shadow-sm text-dark"><stong class="text-muted pt-2">籍贯：</stong><span><input type="text" class="form-control" name="native" value="${even.native}"></span></div>
        <div class="input-group input-group-sm p-2 shadow-sm text-dark"><stong class="text-muted pt-2">状态：</stong><span><input type="text" class="form-control" name="state" value="${even.state}"></span></div>
        <div class="input-group input-group-sm p-2 shadow-sm text-dark"><stong class="text-muted pt-2">爱好：</stong><span><input type="text" class="form-control" name="likes" value="${even.likes}"></span></div>
        <div class="input-group input-group-sm p-2 shadow-sm text-dark"><stong class="text-muted pt-2">备注：</stong><span><input type="text" class="form-control" name="remark" value="${even.remark}"></span></div>
      </form>
      `;
  return str;
}
// 模态框内容 删除
function delEmpInfo(id, name) {
  empNo = id;
  let str = '';
  str += `<div class="alert alert-primary text-danger">确认删除员工<strong>：${name}</strong></div>`;
  return str;
}
// 模态框 查看员工
function viewEmpItem(id) {
  $('#viewEmpModal .modal-body').html(showEmpInfo(empList[id]));
}
// 模态框 编辑员工
function editEmpItem(id) {
  $('#editEmpModal .modal-body').html(editEmpInfo(empList[id]));
}
// 模态框 删除员工
function delEmpItem(id) {
  $('#delEmpModal .modal-body').html(
    delEmpInfo(empList[id].empNo, empList[id].empName)
  );
}
function editEmp() {
  let editEmpForm = $('#editEmpForm').serializeArray();
  let data = getData(editEmpForm);
  $.post('/server/emp.php', { params: 'editEmpItem', data: data }, function (
    res
  ) {
    Alert('success', '成功修改员工信息');
    $('#editEmpModal').modal('hide');
    getEmpList();
  });
}
function delEmp() {
  $.get('/server/emp.php', { params: 'delEmpItem', data: empNo }, function (
    res
  ) {
    if (1) {
      getEmpList();
      Alert('success', '成功删除员工信息');
      $('#delEmpModal').modal('hide');
    }
  });
}
