getDeptList(); // 初始化 部门列表
var DeptList = []; //全局变量 存储所有部门
var deptNo; // 全局变量 存储待操作deptNo
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
  if (data) {
    // console.log(data);
    $('#addModal').modal('hide');
    sendDept(data);
  }
});
//操作 编辑部门
$('.editBtn').click(function () {
  editEmp();
});
//操作 删除部门
$('.delBtn').click(function () {
  // console.log(111111);
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
    deptNo: deptNo,
  };
  even.map((elem, i) => {
    results[elem.name] = elem.value;
  });
  return results;
}
// ajax 提交表单
function sendDept(data) {
  $.post('/server/dept.php', { params: 'addDept', data: data }, function (res) {
    if (res) {
      console.log(res);

      let { state, msg } = JSON.parse(res);
      // if (state === '2000') {
      closeAllInput();
      getDeptList();
      Alert('success', msg);
      // }
      showDeptList();
    }
  });
}
// 获取部门列表
function getDeptList() {
  $.get('/server/dept.php', { params: 'getDeptList' }, function (res) {
    if (res) {
      let { state, msg } = JSON.parse(res);
      if (state === '2000') {
        // Alert('success','嘤嘤嘤');
        DeptList = msg;
      } else {
        DeptList = [];
      }
      showDeptList();
    }
  });
}
// 展示部门信息
function showDeptList() {
  let $tr = '',
    trs = '';
  // console.log(DeptList.length);
  if (DeptList.length) {
    DeptList.map((e, i) => {
      $tr = `<tr>
          <td>${i + 1}</td>
          <td>${e.deptNo}</td>
          <td>${e.deptName}</td>
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
    deptNo = $(this).parents('tr').index();
    viewEmpItem(deptNo);
  });
  // 模态框 编辑 某部门
  $('.editEmp').click(function () {
    deptNo = $(this).parents('tr').index();
    editEmpItem(deptNo);
  });
  // 模态框 删除 某部门
  $('.delEmp').click(function () {
    deptNo = $(this).parents('tr').index();
    delEmpItem(deptNo);
  });
}
// 模态框内容 显示
function showEmpInfo(even) {
  let str = '';
  str += `
      <div>
        <p class="alert alert-dark text-dark"><stong>部门编号：</stong><span>${even.deptNo}</span></p>
        <p class="alert alert-dark text-dark"><stong>部门名称：</stong><span>${even.deptName}</span></p>
      </div>
      `;
  return str;
}
// 模态框内容 编辑
function editEmpInfo(even) {
  deptNo = even.deptNo;
  let str = '';
  str += `
      <form id="editForm">
        <div class="input-group input-group-sm p-2 shadow-sm text-dark"><stong class="text-muted pt-2">部门编号：</stong><span><input type="text" class="form-control" name="deptNo" value="${even.deptNo}"></span></div>
        <div class="input-group input-group-sm p-2 shadow-sm text-dark"><stong class="text-muted pt-2">部门名称：</stong><span><input type="text" class="form-control" name="deptName" value="${even.deptName}"></span></div>
      </form>
      `;
  return str;
}
// 模态框内容 删除
function delEmpInfo(id, name) {
  deptNo = id;
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
    delEmpInfo(DeptList[id].deptNo, DeptList[id].deptName)
  );
}
function editEmp() {
  let editForm = $('#editForm').serializeArray();
  let data = getData(editForm);
  $.post('/server/dept.php', { params: 'editDeptItem', data: data }, function (
    res
  ) {
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
  });
}
function delDept() {
  $.get('/server/dept.php', { params: 'delDeptItem', data: deptNo }, function (
    res
  ) {
    console.log(res);
    Alert('success', '成功删除部门信息');
    $('#delModal').modal('hide');
    getDeptList();
  });
}
