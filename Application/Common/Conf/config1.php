<?php
return array(
	//'配置项'=>'配置值'
	/* 数据库配置 */
    'DB_TYPE'   => 'mysql', // 数据库类型
    'DB_HOST'   => 'qdm115817491.my3w.com', // 服务器地址
    'DB_NAME'   => 'qdm115817491_db', // 数据库名
    'DB_USER'   => 'qdm115817491', // 用户名
    'DB_PWD'    => 'asdfg123456789',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => 'ot_', // 数据库表前缀

    /* URL配置 */
    'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'            => 3, //URL模式
    'VAR_URL_PARAMS'       => '', // PATHINFO URL参数变量
    'URL_PATHINFO_DEPR'    => '/', //PATHINFO URL分割符
);