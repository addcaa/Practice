<?php
namespace app\text\job;
use think\Db;
use think\Exception;

use think\Queue;

class Datebase{

    public function smspush(Job $job,$msm_info)
    {
        //数据格式不符合则删除任务
        if(empty($msm_info) || !is_array($msm_info)){
            echo "待处理数据格式错误，删除\n";
            $job->delete();
        }

        //任务执行超过1次，则删除任务
        if ($job->attempts() > 0) {
            $job->delete();
        }

        //获取用户列表
        $user_list =Db::name('user')->select();


        //没有用户列表，删除任务
        if(empty($user_list)){
            echo "没有用户列表\n";
            $job->delete();

            return false;
        }

//        $user_msm_model = new UserssMsm();
//        $user_rec_msm_model = new UserRecipiMsm();
//
//        //修改msm数据后，发短信并写入数据表记录
//        if(!empty($res)){
//            foreach($user_list as $k=>$v){
//                //发送短信
//                sends_msgs($v['mobile'],$msm_info['content']);
//
//            }
//
//        }
        //执行完任务后必须删除任务
        $job->delete();
    }

    //$job->delete();   删除任务
    //$job->attempts();  查看任务执行次数
    // 注意：执行完任务后必须删除任务
}