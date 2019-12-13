<?php
/**
 * 消息队列配置
 * 内置驱动：redis、database、topthink、sync
 */
use think\Env;


return [
    //sync驱动表示取消消息队列还原为同步执行
    //'connector' => 'Sync',

    //Redis驱动
    'connector' => 'redis',
    "expire"=>60,//任务过期时间默认为秒，禁用为null
    "default"=>"default",//默认队列名称
    "host"=>Env::get("redis.host", "127.0.0.1"),//Redis主机IP地址
    "port"=>Env::get("redis.port", 6379),//Redis端口
    "password"=>Env::get("redis.password", "123456"),//Redis密码
    "select"=>5,//Redis数据库索引
    "timeout"=>0,//Redis连接超时时间
    "persistent"=>false,//是否长连接

    //Database驱动
    //"connector"=>"Database",//数据库驱动
    //"expire"=>60,//任务过期时间，单位为秒，禁用为null
    //"default"=>"default",//默认队列名称
    //"table"=>"jobs",//存储消息的表明，不带前缀
    //"dsn"=>[],

    //Topthink驱动 ThinkPHP内部的队列通知服务平台
    //"connector"=>"Topthink",
    //"token"=>"",
    //"project_id"=>"",
    //"protocol"=>"https",
    //"host"=>"qns.topthink.com",
    //"port"=>443,
    //"api_version"=>1,
    //"max_retries"=>3,
    //"default"=>"default"
];