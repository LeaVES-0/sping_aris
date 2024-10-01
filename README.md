Aris Bangkakabang | 爱丽丝摇啊摇 | 计数优化版

aris太可爱啦(

此版本在项目Sping_Aris(https://github.com/Alan-ShangMike/Sping_Aris_github.io)的基础上更改而来，
在原来的基础上添加了一个简易的php后端，使其支持记录所有访客的点击次数和每个ip的点击次数，并将其保存在mysql数据库中。

ps. 是矢山，拿来练习js和php的（

演示地址
https://www.kei.ink/phi-project-demo/sping_aris/

食用方法
使用 git clone https://github.com/LeaVES-0/sping_aris.git 获取此项目

clone后，项目根目录应当看起来是这样:

sping_aris
│  index.html
│
├─app
│      config.php
│      get_count.php
│      init_db.php
│      update_count.php
└─static
其中app目录是php后端文件。

首先打开app/config.php

<?php
$host = 'mysql_db_host';
$db = 'database';
$user = 'user';
$pass = 'password';
$charset = 'utf8mb4';
...
?>
将其中的host,db,user,pass字段分别改为你的mysql数据库地址，数据库名称，用户名和密码，保存。

将所有项目文件复制到任意一个支持php的网站服务器下运行。

打开浏览器，访问 host/app/init_db.php ,来初始化数据表。不出意外的话，将显示Database initialized successfully.这表明数据库初始化成功。最后删除app/init_db.php文件。

完成部署。

Code Editor: Leaphy

Artist:Sechi

Aris GIF is from| 爱丽丝 GIF 来源 : @video

Contact | 作者联系方式 : @Sechi

The art the relevant copyright of BlueArchive belongs to Nexon/Yostar.

角色版权归Nexon与Yostar所有。
