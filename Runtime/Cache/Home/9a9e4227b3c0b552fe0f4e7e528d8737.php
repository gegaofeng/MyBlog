<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<head>
        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <link rel="stylesheet" href="/Public/static/pintu/css/pintuer.css">
    <link rel="stylesheet" href="/Public/Home/css/my.css">
    <script type="text/javascript" src="/Public/static/jquery-2.0.0.min.js"></script>
    <script src="/Public/static/pintu/js/pintuer.js"></script>
    <script src="/Public/static/pintu/js/respond.js"></script>
    <script src="/Public/Home/js/search.js"></script>

    <link type="image/x-icon" href="http://www.pintuer.com/favicon.ico" rel="shortcut icon" />
    <style>
        .demo-nav.fixed.fixed-top {
            z-index: 8;
            background: #fff;
            width: 100%;
            padding: 0;
            border-bottom: solid 3px #0a8;
            -webkit-box-shadow: 0 3px 6px rgba(0, 0, 0, .175);
            box-shadow: 0 3px 6px rgba(0, 0, 0, .175);
        }
    </style>
    <!--<script type="text/javascript" src="/Public/static/jquery-ui.js"></script>
    <link href="/Public/static/bootstrap/css/bootstrap-combined.min.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="/Public/static/bootstrap/js/bootstrapd.min.js"></script>
    <script type="text/javascript" src="/Public/static/location.js"></script>
    <link rel="stylesheet" href="/Public/Home/css/bst.css"/>-->

    <title><?php echo ($meta_title); ?></title>
    <meta name="Keywords" content="<?php echo ($keywords); ?>"/>
    <meta name="description" content="<?php echo ($description); ?>"/>
</head>
<body>
<div class="container-fluid" id="LG">
    <!--顶部-->
<div class="layout bg-black bg-inverse">
    <div class="container height-large">
				<span class="float-right text-small text-gray hidden-l">
                <a class="text-main" href="#">注册</a><span> | </span><a class="text-main" href="#">登录</a><span> | </span><a class="text-main" href="#">积分兑换</a><span> | </span><a class="text-main"
                                                                                                                                                                                                                                                href="#">帮助中心</a>
				</span>
        欢迎访问<a href="#">本站！</a>
    </div>
</div>
    <div class="demo-nav padding-big-top padding-big-bottom fixed">
    <div class="container padding-top padding-bottom">

        <div class="line">
            <div class="xl12 xs3 xm3 xb2">
                <button class="button icon-navicon float-right" data-target="#header-demo"></button>
                <a href="#"><img src="/Public/static/bootstrap/img/logo.png" class="ring-hover" alt="前端CCS框架" /></a>
            </div>
            <div class=" xl12 xs9 xm9 xb10 nav-navicon" id="header-demo">

                <div class="xs8 xm6 xb7 padding-small">
                    <ul class="nav nav-menu nav-inline nav-big">
                        <li><a href="#">首页</a></li>
                        <li><a href="/index.php?s=/home/article/lists/category/php.html">php</a></li>
                        <!--<li class="active">-->
                        <li>
                            <a href="/index.php?s=/home/article/lists/category/storage.html">存储<span class="arrow"></span></a>
                            <ul class="drop-menu">
                                <li><a href="/index.php?s=/home/article/lists/category/redis.html">Redis</a></li>
                                <li>
                                    <a href="/index.php?s=/home/article/lists/category/memcached.html">Memcached<!--<span class="arrow"></span>--></a>
                                    <!--<ul>
                                        <li><a href="#">响应式布局</a></li>
                                        <li><a href="#">非响应式布局</a></li>
                                    </ul>-->
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/index.php?s=/home/article/lists/category/db.html">数据库<span class="arrow"></span></a>
                            <ul class="drop-menu">
                                <li><a href="/index.php?s=/home/article/lists/category/mongodb.html">Mongodb</a></li>
                                <li>
                                    <a href="/index.php?s=/home/article/lists/category/mysql.html">Mysql</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/index.php?s=/home/article/lists/category/cooperate.html">运维<span class="arrow"></span></a>
                            <ul class="drop-menu">
                                <li><a href="/index.php?s=/home/article/lists/category/linux.html">Linux</a></li>
                                <li>
                                    <a href="/index.php?s=/home/article/lists/category/apache.html">Apache</a>
                                </li>
                                <li>
                                    <a href="/index.php?s=/home/article/lists/category/nginx.html">Nginx</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="/index.php?s=/home/article/lists/category/front.html">前端<span class="arrow"></span></a>
                            <ul class="drop-menu">
                                <li><a href="/index.php?s=/home/article/lists/category/nodejs.html">Nodejs</a></li>
                                <li>
                                    <a href="/index.php?s=/home/article/lists/category/ionic.html">Ionic</a>
                                </li>
                                <li>
                                    <a href="/index.php?s=/home/article/lists/category/argularjs.html">Argularjs</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <div class="xs4 xm3 xb4">
                    <form class="search">
                        <div class="input-group padding-little-top">
                            <input id="word" type="text" class="input border-main" name="keywords" size="30" placeholder="关键词" />
                            <span id="do" class="addbtn"><button type="button" class="button bg-main icon-search"></button></span>
                        </div>
                    </form>
                </div>
                <!--<div class="hidden-l hidden-s xm3 xb3">
                    <div class="text-red text-big icon-phone height-large text-right"> 热线 400 1234567</div>
                </div>-->

            </div>

        </div>

    </div>

</div>
    <div class="container">
        <!--div class="line-small">
            <div class="xl12 xm6 margin-small-bottom">
                <a href="#"><img src="/Public/static/bootstrap/img/product1.jpg" width="100%" /></a>
            </div>
            <div class="xl6 xm3">
                <a href="#"><img src="/Public/static/bootstrap/img/product2.jpg" width="100%" /></a>
            </div>
            <div class="xl6 xm3">
                <a href="#"><img src="/Public/static/bootstrap/img/product3.jpg" width="100%" /></a>
            </div>
        </div>-->
        <br />
        <div class="line-big">
            <div class="xl12 xm8">
    <div class="row-fluid">
        <div class="span7" style="margin-left: 50px;">
            <?php if(is_array($lists)): $i = 0; $__LIST__ = $lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><div style="margin-bottom:40px;background-color: #ffffff;box-shadow: 0 0 10px 7px rgba(218, 218, 218, 0.5);">
                    <p style="margin-bottom: -3px;">
                        <a href="/index.php?s=/home/article/detail/id/<?php echo ($data["id"]); ?>.html"><span class="badge bg-main"><?php echo ($data["title"]); ?></span></a>

                    <div class="title_r hidden-xs"><img src="/Public/Home/images/tuijian.gif" style="width:70px"></div>
                    </p>
                    <p>
                        <?php echo ($data["description"]); ?>
                    </p>
                    <p class="write hidden-sm">
                        <a><span class="glyphicon glyphicon-time"></span></a> &nbsp;<?php echo ($data["create_time"]); ?>&nbsp;&nbsp;作者：Mr Gao&nbsp;&nbsp;分类：[&nbsp;<a href="<?php echo ($data["icon_url"]); ?>"><?php echo ($data["icon_alt"]); ?></a>&nbsp;]<span class="hidden-xs">&nbsp;&nbsp;点击：[&nbsp;<?php echo ($data["view"]); ?>&nbsp;]</span>
                    </p>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>

            <div class="pagination">
                <ul>
                    <?php echo ($page); ?>
                </ul>
            </div>
        </div>
    </div>
    <!--<div class="line-small">
        <div class="xs6">
            <img src="/Public/static/bootstrap/img/1.jpg" width="100%" />
            <ul class="list-unstyle height-big padding-top">
                <li><span class="badge bg-red">新闻</span> <a href="#">特大喜讯，我们发布正式版了。</a></li>
                <li><span class="badge bg-main">新闻</span> <a href="#">是一款专业网页前端UI解决方案</a></li>
                <li><span class="badge bg-main">新闻</span> <a href="#">方便个性化、人性化的前端设计方法</a></li>
                <li><span class="badge bg-main">新闻</span> <a href="#">任何初学者都可快速建立美观的页面</a></li>
                <li><span class="badge bg-main">新闻</span> <a href="#">是一款专业网页前端UI解决方案</a></li>
            </ul>
        </div>
        <div class="xs6">
            <img src="/Public/static/bootstrap/img/2.jpg" width="100%" />
            <ul class="list-unstyle height-big padding-top">
                <li><span class="badge bg-yellow">新闻</span> <a href="#">特大喜讯，我们发布正式版了。</a></li>
                <li><span class="badge bg-sub">新闻</span> <a href="#">是一款专业网页前端UI解决方案</a></li>
                <li><span class="badge bg-sub">新闻</span> <a href="#">方便个性化、人性化的前端设计方法</a></li>
                <li><span class="badge bg-main">新闻</span> <a href="#">是一款专业网页前端UI解决方案</a></li>
                <li><span class="badge bg-sub">新闻</span> <a href="#">任何初学者都可快速建立美观的页面</a></li>
            </ul>
        </div>
    </div>-->
    <br />
    <!--<img src="/Public/static/bootstrap/img/x.jpg" width="100%" />-->

    <br />
    <br />
</div>
            <div class="xl12 xm4">
    <h4>
        <span>
            博客源码更新说明：<br/>
            1.前台用的拼图前端框架,后台基于onethink<br/>
            2.实现首页、列表页分页，页面布局组件化<br>
            3.新增文章按标题搜索功能<br>
        </span>
    </h4>
    <hr>
    <div>
        <h3><span class="icon-wrench"></span> 我的标签</h3>
        <h4>
            <div class="tag-ul">
                <a class="button button-little bg-blue shake-hover" href="/Article/index/a_id/59.html">程序员</a> <a
                    class="button button-little bg-yellow shake-hover" href="/Article/index/a_id/58.html">Apache</a> <a
                    class="button button-little bg-red shake-hover" href="/Article/index/a_id/57.html">代码高亮</a> <a
                    class="button button-little bg-sub shake-hover" href="/Article/index/a_id/56.html">Sublime text</a>
                <a class="button button-little bg-main shake-hover" href="/Article/index/a_id/55.html">JDK安装</a> <a
                    class="button button-little bg-green shake-hover" href="/Article/index/a_id/54.html">oracle</a> <a
                    class="button button-little bg-yellow shake-hover" href="/Article/index/a_id/52.html">时间轴</a> <a
                    class="button button-little bg-sub shake-hover" href="/Article/index/a_id/50.html">winForm</a> <a
                    class="button button-little bg-main shake-hover" href="/Article/index/a_id/49.html">谷歌字体</a> <a
                    class="button button-little bg-green shake-hover" href="/Article/index/a_id/48.html">网页复制</a> <a
                    class="button button-little bg-blue shake-hover" href="/Article/index/a_id/47.html">mysql</a> <a
                    class="button button-little bg-yellow shake-hover" href="/Article/index/a_id/46.html">人民币转大写</a> <a
                    class="button button-little bg-sub shake-hover" href="/Article/index/a_id/44.html">按钮美化</a> <a
                    class="button button-little bg-main shake-hover" href="/Article/index/a_id/43.html">position</a> <a
                    class="button button-little bg-green shake-hover" href="/Article/index/a_id/42.html">session</a> <a
                    class="button button-little bg-yellow shake-hover" href="/Article/index/a_id/40.html">缓存</a> <a
                    class="button button-little bg-red shake-hover" href="/Article/index/a_id/39.html">微信</a> <a
                    class="button button-little bg-sub shake-hover" href="/Article/index/a_id/38.html">layer插件</a> <a
                    class="button button-little bg-main shake-hover" href="/Article/index/a_id/37.html">天气预报</a> <a
                    class="button button-little bg-green shake-hover" href="/Article/index/a_id/36.html">Chrome</a> <a
                    class="button button-little bg-yellow shake-hover" href="/Article/index/a_id/34.html">where方法</a> <a
                    class="button button-little bg-sub shake-hover" href="/Article/index/a_id/32.html">Win10</a> <a
                    class="button button-little bg-main shake-hover" href="/Article/index/a_id/31.html">php.ini</a> <a
                    class="button button-little bg-green shake-hover" href="/Article/index/a_id/30.html">important</a>
                <a class="button button-little bg-blue shake-hover" href="/Article/index/a_id/29.html">CSS</a> <a
                    class="button button-little bg-yellow shake-hover" href="/Article/index/a_id/28.html">Thinkphp</a>
                <a class="button button-little bg-red shake-hover" href="/Article/index/a_id/27.html">正则表达式</a> <a
                    class="button button-little bg-sub shake-hover" href="/Article/index/a_id/26.html">Frozen UI</a> <a
                    class="button button-little bg-main shake-hover" href="/Article/index/a_id/25.html">CSS3</a> <a
                    class="button button-little bg-yellow shake-hover" href="/Article/index/a_id/22.html">移动端</a> <a
                    class="button button-little bg-red shake-hover" href="/Article/index/a_id/21.html">MySql</a> <a
                    class="button button-little bg-sub shake-hover" href="/Article/index/a_id/20.html">C#</a> <a
                    class="button button-little bg-main shake-hover" href="/Article/index/a_id/19.html">C#</a> <a
                    class="button button-little bg-blue shake-hover" href="/Article/index/a_id/17.html">GPS</a> <a
                    class="button button-little bg-main shake-hover" href="/Article/index/a_id/13.html">字号与像素的转换</a> <a
                    class="button button-little bg-blue shake-hover" href="/Article/index/a_id/11.html">代码</a> <a
                    class="button button-little bg-blue shake-hover" href="/Article/index/a_id/5.html">PHP</a> <a
                    class="button button-little bg-yellow shake-hover" href="/Article/index/a_id/4.html">Thinkphp</a>
            </div>
        </h4>
    </div>
    <hr>
    <div>
        <h2 class="bg-main text-white padding">热点文章</h2>
        <div class="padding-big bg">
            <ul class="list-media list-underline">
                <li>
                    <div class="media media-x">
                        <a class="float-left" href="#"><img src="/Public/static/bootstrap/img/e1.jpg" class="radius" alt="..."></a>
                        <div class="media-body"><strong>网格系统</strong>拼图网络系统采用12列显示，可配置间隔的大小，灵活方便。 <a class="button button-little border-red swing-hover" href="#">查看详情</a></div>
                    </div>
                </li>
                <li>
                    <div class="media media-x">
                        <a class="float-left" href="#"><img src="/Public/static/bootstrap/img/e2.jpg" class="radius" alt="..."></a>
                        <div class="media-body"><strong>自由灵活</strong>拼图由多年前端经验的设计编程人员开发，在保持代码精简的同时，也让框架更灵活、自由。 <a class="button button-little border-yellow swing-hover" href="#">查看详情</a></div>
                    </div>
                </li>
                <li>
                    <div class="media media-x">
                        <a class="float-left" href="#"><img src="/Public/static/bootstrap/img/e3.jpg" class="radius" alt="..."></a>
                        <div class="media-body"><strong>方便的自定义配色</strong>拼图可根据项目需要，根据项目自由配色，可使界面丰富多彩。 <a class="button button-little border-red swing-hover" href="#">查看详情</a></div>
                    </div>
                </li>
                <li>
                    <div class="media media-x">
                        <a class="float-left" href="#"><img src="/Public/static/bootstrap/img/e4.jpg" class="radius" alt="..."></a>
                        <div class="media-body"><strong>自动适配设备</strong>拼图响应式设计，可自动适应手机、平板、电脑等设备，一站解决所有屏幕需求。 <a class="button button-little border-black swing-hover" href="#">查看详情</a></div>
                    </div>
                </li>
                <li>
                    <div class="media media-x">
                        <a class="float-left" href="#"><img src="/Public/static/bootstrap/img/e5.jpg" class="radius" alt="..."></a>
                        <div class="media-body"><strong>网格系统</strong>拼图网络系统采用12列显示，可配置间隔的大小，灵活方便。 <a class="button button-little border-blue swing-hover" href="#">查看详情</a></div>
                    </div>
                </li>
                <li>
                    <div class="media media-x">
                        <a class="float-left" href="#"><img src="/Public/static/bootstrap/img/e6.jpg" class="radius" alt="..."></a>
                        <div class="media-body"><strong>方便的自定义配色</strong>拼图可根据项目需要，根据项目自由配色，可使界面丰富多彩。 <a class="button button-little border-green swing-hover" href="#">查看详情</a></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <hr>
    <div class="tab border-main" data-toggle="hover" style="height: 470px;">
        <div class="tab-head">

            <ul class="tab-nav">
                <li class="active"><a href="#tab-start2">最新留言</a> </li>
                <li class=""><a href="#tab-css2">最多点击</a> </li>
                <li class=""><a href="#tab-units2">申请友链</a> </li>
            </ul>
        </div>
        <div class="tab-body ">
            <div class="tab-panel active" id="tab-start2">
                <div class="panel-group" style="border-top: solid 0px #ddd;">
                    <div class="media media-x">
                        <a class="float-left" href="/Liuyan/index.html">
                            <img src="http://q.qlogo.cn/qqapp/101250624/1E55E62F32F7DC8A42527E8F296B6A91/100" class="radius-circle" width="60px" height="60px">
                        </a>
                        <div class="media-body">
                            <strong><span class="icon-paper-plane"></span>  兴国兴家</strong>
                            <span class="tag bg-dot">Win 7</span> 非常好用,很是值得学习和借鉴,非常感谢.
                            文章管理中,不能上传图像,是bug,还是楼主将功能屏蔽掉,还是我自己的设置问题.
                            还发现,编辑器,有时不随着走,不是每次都会有.
                            再次感谢楼主提供的源码,受益匪浅.							</div>
                    </div>
                </div><div class="panel-group" style="border-top: solid 0px #ddd;">
                <div class="media media-x">
                    <a class="float-left" href="/Liuyan/index.html">
                        <img src="http://q.qlogo.cn/qqapp/101250624/9491E2D161E61ED506003B33E9AC7787/100" class="radius-circle" width="60px" height="60px">
                    </a>
                    <div class="media-body">
                        <strong><span class="icon-paper-plane"></span>  爱网络 爱生活</strong>
                        <span class="tag bg-dot">Win 10</span> 您好 使用您的程序提示无法连接数据库是什么意思啊  tp配好了							</div>
                </div>
            </div><div class="panel-group" style="border-top: solid 0px #ddd;">
                <div class="media media-x">
                    <a class="float-left" href="/Liuyan/index.html">
                        <img src="http://q.qlogo.cn/qqapp/101250624/5DAA65A4456E8F5C484825DF33DAE34A/100" class="radius-circle" width="60px" height="60px">
                    </a>
                    <div class="media-body">
                        <strong><span class="icon-paper-plane"></span>  百合</strong>
                        <span class="tag bg-dot">Win 10</span> 我来看看，好好不好用							</div>
                </div>
            </div><div class="panel-group" style="border-top: solid 0px #ddd;">
                <div class="media media-x">
                    <a class="float-left" href="/Liuyan/index.html">
                        <img src="http://q.qlogo.cn/qqapp/101250624/504F522DEF5A18A9C7294B619333007B/100" class="radius-circle" width="60px" height="60px">
                    </a>
                    <div class="media-body">
                        <strong><span class="icon-paper-plane"></span>  我来测测看</strong>
                        <span class="tag bg-dot">Win 8.1</span> 我来测测看							</div>
                </div>
            </div>
            </div>
            <div class="tab-panel" id="tab-css2">
                <?php if(is_array($click_lists)): $i = 0; $__LIST__ = $click_lists;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li style="margin-bottom:8px">
                        <h4>
                            <a href="/index.php?s=/home/article/detail/id/<?php echo ($data["id"]); ?>.html"><span class="icon-leaf"></span><?php echo ($data["title"]); ?></a>
                        </h4>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="tab-panel" id="tab-units2">
                <div class="panel-body">
                    正在开发中，敬请期待。。。。
                </div>
            </div>
        </div>
    </div>


</div>
        </div>
    </div>

    <div class="layout bg-black bg-inverse">
    <div class="container">
        <div class="navbar">
            <!--<div class="navbar-head">
                <button class="button bg-gray icon-navicon" data-target="#navbar-footer"></button>
                <a href="http://www.pintuer.com" target="_blank"><img class="logo" src="/Public/static/bootstrap/img/24-white.png" alt="拼图前端CSS框架" /></a>
            </div>-->
            <div class="navbar-body nav-navicon" id="navbar-footer">
                <div class="navbar-text navbar-left hidden-s hidden-l">版权所有 &copy; <a href="#" target="_blank">phpbst.com</a> All Rights Reserved，仅供学习
             <!--       <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1256689355'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s4.cnzz.com/z_stat.php%3Fid%3D1256689355%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>	    -->
                </div>
                <ul class="nav nav-inline navbar-right">
                    <li><a href="#">一块儿编程，一块儿嗨！</a></li>
                    <!--<li><a href="http://www.pintuer.com">CSS</a></li>
                    <li><a href="http://www.pintuer.com">元件</a></li>
                    <li><a href="http://www.pintuer.com">更多</a></li>-->
                </ul>
            </div>
        </div>
    </div>
</div>

</div>
</body>
</html>