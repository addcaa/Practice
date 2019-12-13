<?php
namespace app\text\controller;
use think\Db;
use think\Exception;

use think\Queue;

class Smspush{

    public function textPush(){
        //创建任务： 项目命名空间\模块\文件夹\控制器@方法
        $job = "app\text\job\Datebase";
        $name = "任务名称";
        $last_info =[
            'id'=>mt_rand(1,99),
        ];
        //null 指定任务名称，没有则使用默认
        Queue::push($job,$last_info,$name);
        echo "ok";
    }
}