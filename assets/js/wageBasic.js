getDeptList(); // 初始化 部门列表
var DeptList = []; //全局变量 存储所有部门
var empNo; // 全局变量 存储待操作empNo
// 输入框 验证
$('#addForm label').map(function (index, elem) {
  $('#addForm .form-control')[index].onclick = function () {
    $('#addForm label')[index].classList.remove('input-err');
  };
});

// 添加部门
$('.addBtn').click(function () {
  let addForm = $('#addForm').serializeArray();
  // let data = 1;
  let data = isEmpty(addForm);

  console.log(data);
  $('#addModal').modal('hide');
  sendDept(data);
});
//操作 编辑部门
$('.editBtn').click(function () {
  editEmp();
});
//操作 删除部门
$('.delBtn').click(function () {
  delDept();
});
//指令 清空所有input值
function closeAllInput() {
  $('input').map(function (i, elem) {
    elem.value = '';
  });
}
// 验证表单 是否为空
function isEmpty(data) {
  let results = {};
  data.map(function (elem, index) {
    results[elem.name] = elem.value;
    if (elem.value === '') {
      $(`#addForm label`)[index].classList.add('input-err');
    } else {
      $(`#addForm label`)[index].classList.remove('input-err');
    }
  });
  tipMsg = false;
  $(`#addForm label`).map(function (elem, index) {
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
function sendDept(data) {
  $.post('/server/wageBasic.php', { params: 'addWage', data: data }, function (
    res
  ) {
    console.log(res);

    let { state, msg } = JSON.parse(res);
    // if (state === '2000') {
    closeAllInput();
    getDeptList();
    Alert('success', msg);
    // }
    showWageList();
  });
}
// 获取部门列表
function getDeptList() {
  $.get('/server/wageBasic.php', { params: 'getWageList' }, function (res) {
    if (res) {
      let { state, msg } = JSON.parse(res);
      if (state === '2000') {
        // Alert('success','嘤嘤嘤');
        DeptList = msg;
      } else {
        DeptList = [];
      }
      showWageList();
    }
  });
}
// 展示部门信息
function showWageList() {
  let $tr = '',
    trs = '';
  console.log(DeptList);

  if (DeptList.length) {
    DeptList.map((e, i) => {
      $tr = `<tr>
          <td>${i + 1}</td>
          <td>${e.empNo}</td>
          <td>${e.name}</td>
          <td>${e.basicWage}</td>
          <td>${e.jobWage}</td>
          <td class="caozuo">
            <button class="viewEmp btn btn-light" data-toggle="modal" data-target="#viewModal">查看</button>
            <button class="editEmp btn btn-primary" data-toggle="modal" data-target="#editModal">编辑</button>
            <button class="delEmp btn btn-success" data-toggle="modal" data-target="#delModal">删除</button>
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
  // 模态框 查看 某部门

  $('.viewEmp').click(function () {
    empNo = $(this).parents('tr').index();
    viewEmpItem(empNo);
  });
  // 模态框 编辑 某部门
  $('.editEmp').click(function () {
    empNo = $(this).parents('tr').index();
    editEmpItem(empNo);
  });
  // 模态框 删除 某部门
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
        <p class="alert alert-dark text-dark"><stong>员工编号：</stong><span>${even.empNo}</span></p>
        <p class="alert alert-dark text-dark"><stong>姓名：</stong><span>${even.name}</span></p>
        <p class="alert alert-dark text-dark"><stong>基本工资：</stong><span>${even.basicWage}</span></p>
        <p class="alert alert-dark text-dark"><stong>岗位工资：</stong><span>${even.jobWage}</span></p>
      </div>
      `;
  return str;
}
// 模态框内容 编辑
function editEmpInfo(even) {
  empNo = even.empNo;
  let str = '';
  str += `
      <form id="editForm">
        <div class="input-group input-group-sm p-2 shadow-sm text-dark"><stong class="text-muted pt-2">员工编号：</stong><span><input type="text" class="form-control" name="empNo" value="${even.empNo}"></span></div>
        <div class="input-group input-group-sm p-2 shadow-sm text-dark"><stong class="text-muted pt-2">姓名：</stong><span><input type="text" class="form-control" name="name" value="${even.name}"></span></div>
        <div class="input-group input-group-sm p-2 shadow-sm text-dark"><stong class="text-muted pt-2">基本工资：</stong><span><input type="text" class="form-control" name="basicWage" value="${even.basicWage}"></span></div>
        <div class="input-group input-group-sm p-2 shadow-sm text-dark"><stong class="text-muted pt-2">岗位工资：</stong><span><input type="text" class="form-control" name="jobWage" value="${even.jobWage}"></span></div>
      </form>
      `;
  return str;
}
// 模态框内容 删除
function delEmpInfo(id, name) {
  empNo = id;
  let str = '';
  str += `<div class="alert alert-primary text-danger">确认删除部门<strong>：${name}</strong></div>`;
  return str;
}
// 模态框 查看部门
function viewEmpItem(id) {
  $('#viewModal .modal-body').html(showEmpInfo(DeptList[id]));
}
// 模态框 编辑部门
function editEmpItem(id) {
  $('#editModal .modal-body').html(editEmpInfo(DeptList[id]));
}
// 模态框 删除部门
function delEmpItem(id) {
  $('#delModal .modal-body').html(
    delEmpInfo(DeptList[id].empNo, DeptList[id].name)
  );
}
function editEmp() {
  let editForm = $('#editForm').serializeArray();
  let data = getData(editForm);
  $.post(
    '/server/wageBasic.php',
    { params: 'editWageItem', empNo: empNo, data: data },
    function (res) {
      console.log(res);

      // console.log(JSON.parse(res));
      // if (1) {
      // let {state,msg} = JSON.parse(res);
      // if (state === '2000') {
      Alert('success', '成功修改部门信息');
      // DeptList = msg;
      $('#editModal').modal('hide');
      // }
      getDeptList();
      // }
    }
  );
}
function delDept() {
  $.get(
    '/server/wageBasic.php',
    { params: 'delWageItem', data: empNo },
    function (res) {
      console.log(res);
      Alert('success', '成功删除部门信息');
      $('#delModal').modal('hide');
      getDeptList();
    }
  );
}
