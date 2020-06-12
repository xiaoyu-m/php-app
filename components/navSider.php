<?php
  include_once '../store/index.php';
?>
<nav class="left-side-menu">
  <div class="list-group" id="myList" role="tablist">
    <div class="list-group-item nav-caption">
      <a href="/admin/index.php">
        <i><img src="/assets/images/favicon.ico"></i>
        <span>
        <?php
            echo $username;
            ?>
        </span>
      </a> href="/admin/index.php" 首页
    </div>
    <a class="list-group-item list-group-item-action" href="/admin/index.php" role="tab" data-toggle="tooltip"
      data-placement="right" title="首页">
      <i class="iconfont icon-shouye"></i>
      <span>首页</span>
    </a>
    <a class="list-group-item list-group-item-action" href="/admin/emp.php" role="tab" data-toggle="tooltip"
      data-placement="right" title="员工管理">
      <i class="iconfont icon-yuangong"></i>
      <span>员工管理</span>
    </a>
    <a class="list-group-item list-group-item-action" href="/admin/dept.php" role="tab" data-toggle="tooltip"
      data-placement="right" title="部门管理">
      <i class="iconfont icon-bumen"></i>
      <span>部门管理</span>
    </a>
    <a class="list-group-item list-group-item-action" href="/admin/wageBasic.php" role="tab" data-toggle="tooltip" data-placement="right"
      title="基本工资">
      <i class="iconfont icon-gongzi"></i>
      <span>基本工资</span>
    </a>
    <a class="list-group-item list-group-item-action" href="/admin/task.php" role="tab" data-toggle="tooltip" data-placement="right"
      title="任务/兼职">
      <i class="iconfont icon-jianzhi"></i>
      <span>任务管理</span>
    </a>
    <a class="list-group-item list-group-item-action" href="/admin/raq.php" role="tab" data-toggle="tooltip" data-placement="right"
      title="奖惩管理">
      <i class="iconfont icon-jiangcheng"></i>
      <span>奖惩管理</span>
    </a>
    <a class="list-group-item list-group-item-action" href="/admin/wage.php" role="tab" data-toggle="tooltip" data-placement="right"
      title="工资管理">
      <i class="iconfont icon-gongziguanli"></i>
      <span>工资管理</span>
    </a>
    <a class="list-group-item list-group-item-action" href="/admin/count.php" role="tab" data-toggle="tooltip" data-placement="right"
      title="统计">
      <i class="iconfont icon-tongji"></i>
      <span>统计</span>
    </a>
    <a class="list-group-item list-group-item-action zoom-nav navbar-fixed-bottom">
      <i class="iconfont icon-zuo"></i>
    </a>
  </div>
</nav>