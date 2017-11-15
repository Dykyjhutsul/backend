<?php

Config::set('site_name', 'Text To Image - Преобразование текста в изображение');

Config::set('languages', array('en', 'fr'));

// Routes. Route name => method prefix
Config::set('routes', array(
    'default' => '',
    'admin'   => 'admin_',
));

//GRANT ALL ON devc TO devc2@'128.199.42.69' IDENTIFIED BY 'ZEd938BT9jnuXuQf';

Config::set('default_route', 'default');
Config::set('default_language', 'en');
Config::set('default_controller', 'pages');
Config::set('default_action', 'index');
Config::set('db.host', 'hosting-panel.php-academy.kiev.ua');
Config::set('db.user', 'sitemap');
Config::set('db.password', 'T2m7B8v0');
Config::set('db.db_name', 'sitemap');
Config::set('salt', 'jd7sj3sdkd964he7e');
