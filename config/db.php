<?php
$db_tables = new StdClass;

//管理员表
$db_tables -> admin = "
create table admin(
  id int primary key,
  account varchar(20),
  password varchar(16)
);";
//员工表
$db_tables -> emp = "
create table emp(
  empNo int(20) primary key,
  empName varchar(20),
  sex varchar(2),
  age int(3),
  native varchar(12),
  dept varchar(20),
  jobTitle varchar(20),
  likes varchar(50),
  state varchar(10),
  remark varchar(50)
);";
// 基本工资表
$db_tables -> wage = "
create table wage(
  empNo int(20) primary key,
  name varchar(20),
  basicWage int(10),
  jobWage int(10)
);";
// 兼职表
$db_tables -> partjob = "
create table partjob(
  empNo int(20) primary key,
  jobInfo varchar(50),
  allowance int(10)
);";
// 任务表
$db_tables -> task = "
create table task(
  taskNo int(20) primary key,
  taskType varchar(20),
  taskName varchar(20)
);";
// 奖惩表
$db_tables -> req = "
create table req(
  empNo int(20) primary key,
  date datetime,
  reqInfo varchar(20),
  reqAmount varchar(20),
  reqState varchar(20)
);";
// 工资管理表
$db_tables -> wagetotal = "
create table wagetotal(
  empNo int(20) primary key,
  subTotal int(20),
  after  int(10),
  afterInfo varchar(30),
  taskName varchar(20),
  wage int(20)
);";
?>