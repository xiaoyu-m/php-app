getlist('getTaskList');
var list = {
  task: {
    taskNo: 0,
    list: [],
    public: `<div class="col-6 col-lg-3 col-md-4">
      <div  class="card">
        <div class="card-body" >
          <form id="addtaskForm">
            <div class="form-group">
              <label for="taskType">
                任务类别：
              </label>
              <input type="text" class="form-control" name="taskType" id="taskType">
            </div>
            <div class="form-group">
              <label for="taskName">
                任务名称：
              </label>
              <input type="text" class="form-control" name="taskName" id="taskName">
            </div>
            <div class="form-group">
              <label for="taskInfo">
              任务详情：
              </label>
              <textarea class="form-control" name="taskInfo" aria-label="With textarea"></textarea>
            </div>
            <div class="form-group">
              <label for="taskNum">
              绩效分：
              </label>
              <input type="text" class="form-control" name="taskNum" id="taskNum">
            </div>
            <div class="form-group">
              <label for="taskSum">
              绩效分/元：
              </label>
              <input type="text" class="form-control" name="taskSum" id="taskSum">
            </div>
          </form>
          <button type="button" class="float-right btn btn-primary addTaskBtn">
            <i class="iconfont icon-tianjia"></i>
            <b>派发任务</b>
          </button>
        </div>
      </div>
    </div>`,
    template(index, { taskType, taskName, taskInfo, taskNum, taskSum }) {
      return ` <div class="col-6 col-lg-3 col-md-4">
      <div class="card TaskItem">
        <div class="card-body">
          <form>
            <div class="form-group text-right">
              <i class="iconfont icon-guanbi delItemBtn" data-toggle="popover" tabindex="${index}" data-trigger="focus" data-content="如需删除请再次点击"></i>
            </div>
            <div class="form-group">
              <label for="taskType">
                任务类别：
              </label>
              <input type="text" class="form-control" name="taskType" value="${taskType}">
            </div>
            <div class="form-group">
              <label>
                任务名称：
              </label>
              <input type="text" class="form-control" name="taskName" value="${taskName}">
            </div>
            <div class="form-group">
              <label>
                任务详情：
              </label>
              <textarea class="form-control" name="taskInfo" aria-label="With textarea">${taskInfo}</textarea>
            </div>
            <div class="form-group">
              <label>
              绩效分：
              </label>
              <input type="text" class="form-control" name="taskNum" value="${taskNum}">
            </div>
            <div class="form-group">
              <label>
                绩效分/元：
              </label>
              <input type="text" class="form-control" name="taskSum" value="${taskSum}">
            </div>
          </form>
        </div>
      </div>
    </div>
    `;
    },
  },
  partjob: {
    partjobNo: 0,
    list: [],
    template: ``,
  },
};
function $get(params) {
  $.get('/server/task.php', params, function (res) {
    if (res) {
      let { state, msg } = JSON.parse(res);
      console.log(msg);
      if (state === '2000') {
        list.task.list = msg;
      } else {
        list.task.list = [];
      }
      bindChangeValues('#task .row', list.task);
    }
  });
}
function $post(params) {
  $.post('/server/task.php', params, function (res) {});
}

function isEmpty(label, data) {
  let results = {};
  data.map(function (elem, index) {
    results[elem.name] = elem.value;
    if (elem.value === '') {
      $(label)[index].classList.add('input-err');
    } else {
      $(label)[index].classList.remove('input-err');
    }
  });
  tipMsg = false;
  $(label).map(function (elem, index) {
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
function getlist(params) {
  $get({ params });
}
function bindChangeValues(id, obj) {
  let { template, public, list } = obj,
    str = public;

  if (list) {
    list.map((e, i) => {
      str += template(i, { ...e });
    });
  }
  showlist(id, str);
}
// 在content 展示内容
function showlist(id, values) {
  let i = 0;
  $(id).html(values);
  $('.delItemBtn').popover();
  $('.delItemBtn').click(function () {
    if (i) {
      let taskNo = $(this).parents('.col-6').index();
      taskNo = list.task.list[taskNo - 1].taskNo;
      $get({ params: 'delTaskItem', data: taskNo });
      Alert('success', '删除任务成功');
      $('.delItemBtn').popover('hide');
      getlist('getTaskList');
    }
    // console.log(list.task.list);
    ++i;
  });
  $('.addTaskBtn').click(function () {
    let data = isEmpty(
      '#addtaskForm label',
      $('#addtaskForm').serializeArray()
    );
    if (data) {
      $post({ params: 'addTask', data: data });
      getlist('getTaskList');
      data = [];
    }
  });
  $('#addtaskForm label').map(function (index, elem) {
    $('#addtaskForm .form-control')[index].onclick = function () {
      $('#addtaskForm label')[index].classList.remove('input-err');
    };
  });
}
