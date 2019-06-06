# OUTPUT CLEAN INSTALL WORDPRESS
# FIRST STEP
``` bash
Started by user kir
Building on master in workspace /var/lib/jenkins/workspace/10_INSTALL_APP
[10_INSTALL_APP] $ ansible-playbook /home/project2/pro1.yml -i /home/project2/inventory.yml -f 5

PLAY [all] *********************************************************************

TASK [install python 2] ********************************************************
changed: [wordpress2]
changed: [wordpress1]

PLAY [all] *********************************************************************

TASK [Gathering Facts] *********************************************************
ok: [wordpress2]
ok: [wordpress1]

TASK [server : Update apt cache] ***********************************************
ok: [wordpress2]
ok: [wordpress1]

TASK [server : Install required software] **************************************
changed: [wordpress1] => (item=[u'apache2', u'mysql-server', u'php7.2-mysql', u'php7.2', u'libapache2-mod-php7.2', u'python-mysqldb'])
changed: [wordpress2] => (item=[u'apache2', u'mysql-server', u'php7.2-mysql', u'php7.2', u'libapache2-mod-php7.2', u'python-mysqldb'])

PLAY RECAP *********************************************************************
wordpress1                 : ok=4    changed=2    unreachable=0    failed=0   
wordpress2                 : ok=4    changed=2    unreachable=0    failed=0   

[Slack Notifications] found #65 as previous completed, non-aborted build
Triggering a new build of 20_INSTALL_PHP
Finished: SUCCESS

# SECOND STEP
Started by upstream project "10_INSTALL_APP" build number 66
originally caused by:
 Started by user kir
Building on master in workspace /var/lib/jenkins/workspace/20_INSTALL_PHP
[20_INSTALL_PHP] $ ansible-playbook /home/project2/pro2.yml -i /home/project2/inventory.yml -f 5

PLAY [all] *********************************************************************

TASK [Gathering Facts] *********************************************************
ok: [wordpress2]
ok: [wordpress1]

TASK [php : Install php extensions] ********************************************
changed: [wordpress2] => (item=[u'php7.2-gd', u'php7.2-ssh2'])
changed: [wordpress1] => (item=[u'php7.2-gd', u'php7.2-ssh2'])

PLAY RECAP *********************************************************************
wordpress1                 : ok=2    changed=1    unreachable=0    failed=0   
wordpress2                 : ok=2    changed=1    unreachable=0    failed=0   

[Slack Notifications] found #28 as previous completed, non-aborted build
Triggering a new build of 30_CREATE_BD
Finished: SUCCESS

# THIRD STEP
Started by upstream project "20_INSTALL_PHP" build number 29
originally caused by:
 Started by upstream project "10_INSTALL_APP" build number 66
 originally caused by:
  Started by user kir
Building on master in workspace /var/lib/jenkins/workspace/30_CREATE_BD
[30_CREATE_BD] $ ansible-playbook /home/project2/pro3.yml -i /home/project2/inventory.yml -f 5

PLAY [all] *********************************************************************

TASK [Gathering Facts] *********************************************************
ok: [wordpress1]
ok: [wordpress2]

TASK [mysql : Create mysql database] *******************************************
changed: [wordpress1]
changed: [wordpress2]

TASK [mysql : Create mysql user] ***********************************************
changed: [wordpress1]
changed: [wordpress2]

PLAY RECAP *********************************************************************
wordpress1                 : ok=3    changed=2    unreachable=0    failed=0   
wordpress2                 : ok=3    changed=2    unreachable=0    failed=0   

[Slack Notifications] found #21 as previous completed, non-aborted build
Triggering a new build of 40_INSTALL_WORDPRESS
Finished: SUCCESS

# FOURTH STEP
Started by upstream project "30_CREATE_BD" build number 22
originally caused by:
 Started by upstream project "20_INSTALL_PHP" build number 29
 originally caused by:
  Started by upstream project "10_INSTALL_APP" build number 66
  originally caused by:
   Started by user kir
Building on master in workspace /var/lib/jenkins/workspace/40_INSTALL_WORDPRESS
[40_INSTALL_WORDPRESS] $ ansible-playbook /home/project2/pro4.yml -i /home/project2/inventory.yml -f 5

PLAY [all] *********************************************************************

TASK [Gathering Facts] *********************************************************
ok: [wordpress1]
ok: [wordpress2]

TASK [wordpress : Download WordPress] ******************************************
changed: [wordpress2]
changed: [wordpress1]

TASK [wordpress : Extract WordPress] *******************************************
changed: [wordpress1]
changed: [wordpress2]

TASK [wordpress : Update default Apache site] **********************************
changed: [wordpress1]
changed: [wordpress2]

TASK [wordpress : Copy sample config file] *************************************
changed: [wordpress1]
changed: [wordpress2]

TASK [wordpress : COPY WP-CONFIG] **********************************************
changed: [wordpress1]
changed: [wordpress2]

TASK [wordpress : restart apache] **********************************************
changed: [wordpress1]
changed: [wordpress2]

RUNNING HANDLER [wordpress : restart apache] ***********************************
changed: [wordpress2]
changed: [wordpress1]

PLAY RECAP *********************************************************************
wordpress1                 : ok=8    changed=7    unreachable=0    failed=0   
wordpress2                 : ok=8    changed=7    unreachable=0    failed=0   

[Slack Notifications] found #22 as previous completed, non-aborted build
Triggering a new build of 50_TEST_WORDPRESS
Finished: SUCCESS


# FIFTH STEP
Started by upstream project "40_INSTALL_WORDPRESS" build number 23
originally caused by:
 Started by upstream project "30_CREATE_BD" build number 22
 originally caused by:
  Started by upstream project "20_INSTALL_PHP" build number 29
  originally caused by:
   Started by upstream project "10_INSTALL_APP" build number 66
   originally caused by:
    Started by user kir
Building on master in workspace /var/lib/jenkins/workspace/50_TEST_WORDPRESS
[50_TEST_WORDPRESS] $ ansible-playbook /home/project2/pro5.yml -i /home/project2/inventory.yml -f 5

PLAY [all] *********************************************************************

TASK [Gathering Facts] *********************************************************
ok: [wordpress1]
ok: [wordpress2]

TASK [test : Check that a page returns a status 200 and fail if the word AWESOME is not in the page contents] ***
ok: [wordpress1]
ok: [wordpress2]

TASK [test : debug] ************************************************************
ok: [wordpress1] => {
    "msg": {
        "cache_control": "no-cache, must-revalidate, max-age=0", 
        "changed": false, 
        "connection": "close", 
        "content": "<!DOCTYPE html>\n<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"ru-RU\" xml:lang=\"ru-RU\">\n<head>\n\t<meta name=\"viewport\" content=\"width=device-width\" />\n\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n\t<meta name=\"robots\" content=\"noindex,nofollow\" />\n\t<title>WordPress &rsaquo; Установка</title>\n\t<link rel='stylesheet' id='buttons-css'  href='http://localhost/wp-includes/css/buttons.min.css?ver=5.1.1' type='text/css' media='all' />\n<link rel='stylesheet' id='install-css'  href='http://localhost/wp-admin/css/install.min.css?ver=5.1.1' type='text/css' media='all' />\n<link rel='stylesheet' id='dashicons-css'  href='http://localhost/wp-includes/css/dashicons.min.css?ver=5.1.1' type='text/css' media='all' />\n</head>\n<body class=\"wp-core-ui\">\n<p id=\"logo\"><a href=\"https://ru.wordpress.org/\">WordPress</a></p>\n\n\t<h1>Добро пожаловать</h1>\n<p>Добро пожаловать в знаменитую пятиминутную установку WordPress! Просто заполните поля &#8212; и вперёд, к использованию самой мощной и гибкой персональной платформы для публикаций в мире!</p>\n\n<h2>Требуется информация</h2>\n<p>Пожалуйста, укажите следующую информацию. Не переживайте, потом вы всегда сможете изменить эти настройки.</p>\n\n\t\t<form id=\"setup\" method=\"post\" action=\"install.php?step=2\" novalidate=\"novalidate\">\n\t<table class=\"form-table\">\n\t\t<tr>\n\t\t\t<th scope=\"row\"><label for=\"weblog_title\">Название сайта</label></th>\n\t\t\t<td><input name=\"weblog_title\" type=\"text\" id=\"weblog_title\" size=\"25\" value=\"\" /></td>\n\t\t</tr>\n\t\t<tr>\n\t\t\t<th scope=\"row\"><label for=\"user_login\">Имя пользователя</label></th>\n\t\t\t<td>\n\t\t\t\t\t\t\t<input name=\"user_name\" type=\"text\" id=\"user_login\" size=\"25\" value=\"\" />\n\t\t\t\t<p>Имя пользователя может содержать только латинские буквы, пробелы, подчёркивания, дефисы, точки и символ @.</p>\n\t\t\t\t\t\t\t</td>\n\t\t</tr>\n\t\t\t\t<tr class=\"form-field form-required user-pass1-wrap\">\n\t\t\t<th scope=\"row\">\n\t\t\t\t<label for=\"pass1\">\n\t\t\t\t\tПароль\t\t\t\t</label>\n\t\t\t</th>\n\t\t\t<td>\n\t\t\t\t<div class=\"\">\n\t\t\t\t\t\t\t\t\t\t<input type=\"password\" name=\"admin_password\" id=\"pass1\" class=\"regular-text\" autocomplete=\"off\" data-reveal=\"1\" data-pw=\"pzzxed^2dEmlBE5pX)\" aria-describedby=\"pass-strength-result\" />\n\t\t\t\t\t<button type=\"button\" class=\"button wp-hide-pw hide-if-no-js\" data-start-masked=\"0\" data-toggle=\"0\" aria-label=\"Скрыть пароль\">\n\t\t\t\t\t\t<span class=\"dashicons dashicons-hidden\"></span>\n\t\t\t\t\t\t<span class=\"text\">Скрыть</span>\n\t\t\t\t\t</button>\n\t\t\t\t\t<div id=\"pass-strength-result\" aria-live=\"polite\"></div>\n\t\t\t\t</div>\n\t\t\t\t<p><span class=\"description important hide-if-no-js\">\n\t\t\t\t<strong>Важно:</strong>\n\t\t\t\t\t\t\t\tЭтот пароль понадобится вам для входа. Сохраните его в надёжном месте.</span></p>\n\t\t\t</td>\n\t\t</tr>\n\t\t<tr class=\"form-field form-required user-pass2-wrap hide-if-js\">\n\t\t\t<th scope=\"row\">\n\t\t\t\t<label for=\"pass2\">Повторите пароль\t\t\t\t\t<span class=\"description\">(обязательно)</span>\n\t\t\t\t</label>\n\t\t\t</th>\n\t\t\t<td>\n\t\t\t\t<input name=\"admin_password2\" type=\"password\" id=\"pass2\" autocomplete=\"off\" />\n\t\t\t</td>\n\t\t</tr>\n\t\t<tr class=\"pw-weak\">\n\t\t\t<th scope=\"row\">Подтвердите пароль</th>\n\t\t\t<td>\n\t\t\t\t<label>\n\t\t\t\t\t<input type=\"checkbox\" name=\"pw_weak\" class=\"pw-checkbox\" />\n\t\t\t\t\tРазрешить использование слабого пароля.\t\t\t\t</label>\n\t\t\t</td>\n\t\t</tr>\n\t\t\t\t<tr>\n\t\t\t<th scope=\"row\"><label for=\"admin_email\">Ваш e-mail</label></th>\n\t\t\t<td><input name=\"admin_email\" type=\"email\" id=\"admin_email\" size=\"25\" value=\"\" />\n\t\t\t<p>Внимательно проверьте адрес электронной почты, перед тем как продолжить.</p></td>\n\t\t</tr>\n\t\t<tr>\n\t\t\t<th scope=\"row\">Видимость для поисковых систем</th>\n\t\t\t<td>\n\t\t\t\t<fieldset>\n\t\t\t\t\t<legend class=\"screen-reader-text\"><span>Видимость для поисковых систем </span></legend>\n\t\t\t\t\t\t\t\t\t\t\t<label for=\"blog_public\"><input name=\"blog_public\" type=\"checkbox\" id=\"blog_public\" value=\"0\"  />\n\t\t\t\t\t\tПопросить поисковые системы не индексировать сайт</label>\n\t\t\t\t\t\t<p class=\"description\">Будет ли учитываться этот запрос &mdash; зависит от поисковых систем.</p>\n\t\t\t\t\t\t\t\t\t</fieldset>\n\t\t\t</td>\n\t\t</tr>\n\t</table>\n\t<p class=\"step\"><input type=\"submit\" name=\"Submit\" id=\"submit\" class=\"button button-large\" value=\"Установить WordPress\"  /></p>\n\t<input type=\"hidden\" name=\"language\" value=\"\" />\n</form>\n\t<script type=\"text/javascript\">var t = document.getElementById('weblog_title'); if (t){ t.focus(); }</script>\n\t<script type='text/javascript' src='http://localhost/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>\n<script type='text/javascript' src='http://localhost/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>\n<script type='text/javascript'>\n/* <![CDATA[ */\nvar _zxcvbnSettings = {\"src\":\"http:\\/\\/localhost\\/wp-includes\\/js\\/zxcvbn.min.js\"};\n/* ]]> */\n</script>\n<script type='text/javascript' src='http://localhost/wp-includes/js/zxcvbn-async.min.js?ver=1.0'></script>\n<script type='text/javascript'>\n/* <![CDATA[ */\nvar pwsL10n = {\"unknown\":\"\\u041d\\u0430\\u0434\\u0451\\u0436\\u043d\\u043e\\u0441\\u0442\\u044c \\u043f\\u0430\\u0440\\u043e\\u043b\\u044f \\u043d\\u0435\\u0438\\u0437\\u0432\\u0435\\u0441\\u0442\\u043d\\u0430\",\"short\":\"\\u041e\\u0447\\u0435\\u043d\\u044c \\u0441\\u043b\\u0430\\u0431\\u044b\\u0439\",\"bad\":\"\\u0421\\u043b\\u0430\\u0431\\u044b\\u0439\",\"good\":\"\\u0421\\u0440\\u0435\\u0434\\u043d\\u0438\\u0439\",\"strong\":\"\\u041d\\u0430\\u0434\\u0451\\u0436\\u043d\\u044b\\u0439\",\"mismatch\":\"\\u041d\\u0435\\u0441\\u043e\\u0432\\u043f\\u0430\\u0434\\u0435\\u043d\\u0438\\u0435\"};\n/* ]]> */\n</script>\n<script type='text/javascript' src='http://localhost/wp-admin/js/password-strength-meter.min.js?ver=5.1.1'></script>\n<script type='text/javascript' src='http://localhost/wp-includes/js/underscore.min.js?ver=1.8.3'></script>\n<script type='text/javascript'>\n/* <![CDATA[ */\nvar _wpUtilSettings = {\"ajax\":{\"url\":\"\\/wp-admin\\/admin-ajax.php\"}};\n/* ]]> */\n</script>\n<script type='text/javascript' src='http://localhost/wp-includes/js/wp-util.min.js?ver=5.1.1'></script>\n<script type='text/javascript'>\n/* <![CDATA[ */\nvar userProfileL10n = {\"warn\":\"\\u0412\\u0430\\u0448 \\u043d\\u043e\\u0432\\u044b\\u0439 \\u043f\\u0430\\u0440\\u043e\\u043b\\u044c \\u043d\\u0435 \\u0431\\u044b\\u043b \\u0441\\u043e\\u0445\\u0440\\u0430\\u043d\\u0451\\u043d.\",\"warnWeak\":\"\\u0420\\u0430\\u0437\\u0440\\u0435\\u0448\\u0438\\u0442\\u044c \\u0438\\u0441\\u043f\\u043e\\u043b\\u044c\\u0437\\u043e\\u0432\\u0430\\u043d\\u0438\\u0435 \\u0441\\u043b\\u0430\\u0431\\u043e\\u0433\\u043e \\u043f\\u0430\\u0440\\u043e\\u043b\\u044f.\",\"show\":\"\\u041f\\u043e\\u043a\\u0430\\u0437\\u0430\\u0442\\u044c\",\"hide\":\"\\u0421\\u043a\\u0440\\u044b\\u0442\\u044c\",\"cancel\":\"\\u041e\\u0442\\u043c\\u0435\\u043d\\u0430\",\"ariaShow\":\"\\u041f\\u043e\\u043a\\u0430\\u0437\\u0430\\u0442\\u044c \\u043f\\u0430\\u0440\\u043e\\u043b\\u044c\",\"ariaHide\":\"\\u0421\\u043a\\u0440\\u044b\\u0442\\u044c \\u043f\\u0430\\u0440\\u043e\\u043b\\u044c\"};\n/* ]]> */\n</script>\n<script type='text/javascript' src='http://localhost/wp-admin/js/user-profile.min.js?ver=5.1.1'></script>\n<script type=\"text/javascript\">\njQuery( function( $ ) {\n\t$( '.hide-if-no-js' ).removeClass( 'hide-if-no-js' );\n} );\n</script>\n</body>\n</html>\n", 
        "content_length": "7655", 
        "content_type": "text/html; charset=utf-8", 
        "cookies": {}, 
        "date": "Wed, 05 Jun 2019 17:18:28 GMT", 
        "expires": "Wed, 11 Jan 1984 05:00:00 GMT", 
        "failed": false, 
        "failed_when_result": false, 
        "msg": "OK (7655 bytes)", 
        "redirected": true, 
        "server": "Apache/2.4.29 (Ubuntu)", 
        "status": 200, 
        "url": "http://localhost/wp-admin/install.php", 
        "vary": "Accept-Encoding"
    }
}
ok: [wordpress2] => {
    "msg": {
        "cache_control": "no-cache, must-revalidate, max-age=0", 
        "changed": false, 
        "connection": "close", 
        "content": "<!DOCTYPE html>\n<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"ru-RU\" xml:lang=\"ru-RU\">\n<head>\n\t<meta name=\"viewport\" content=\"width=device-width\" />\n\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n\t<meta name=\"robots\" content=\"noindex,nofollow\" />\n\t<title>WordPress &rsaquo; Установка</title>\n\t<link rel='stylesheet' id='buttons-css'  href='http://localhost/wp-includes/css/buttons.min.css?ver=5.1.1' type='text/css' media='all' />\n<link rel='stylesheet' id='install-css'  href='http://localhost/wp-admin/css/install.min.css?ver=5.1.1' type='text/css' media='all' />\n<link rel='stylesheet' id='dashicons-css'  href='http://localhost/wp-includes/css/dashicons.min.css?ver=5.1.1' type='text/css' media='all' />\n</head>\n<body class=\"wp-core-ui\">\n<p id=\"logo\"><a href=\"https://ru.wordpress.org/\">WordPress</a></p>\n\n\t<h1>Добро пожаловать</h1>\n<p>Добро пожаловать в знаменитую пятиминутную установку WordPress! Просто заполните поля &#8212; и вперёд, к использованию самой мощной и гибкой персональной платформы для публикаций в мире!</p>\n\n<h2>Требуется информация</h2>\n<p>Пожалуйста, укажите следующую информацию. Не переживайте, потом вы всегда сможете изменить эти настройки.</p>\n\n\t\t<form id=\"setup\" method=\"post\" action=\"install.php?step=2\" novalidate=\"novalidate\">\n\t<table class=\"form-table\">\n\t\t<tr>\n\t\t\t<th scope=\"row\"><label for=\"weblog_title\">Название сайта</label></th>\n\t\t\t<td><input name=\"weblog_title\" type=\"text\" id=\"weblog_title\" size=\"25\" value=\"\" /></td>\n\t\t</tr>\n\t\t<tr>\n\t\t\t<th scope=\"row\"><label for=\"user_login\">Имя пользователя</label></th>\n\t\t\t<td>\n\t\t\t\t\t\t\t<input name=\"user_name\" type=\"text\" id=\"user_login\" size=\"25\" value=\"\" />\n\t\t\t\t<p>Имя пользователя может содержать только латинские буквы, пробелы, подчёркивания, дефисы, точки и символ @.</p>\n\t\t\t\t\t\t\t</td>\n\t\t</tr>\n\t\t\t\t<tr class=\"form-field form-required user-pass1-wrap\">\n\t\t\t<th scope=\"row\">\n\t\t\t\t<label for=\"pass1\">\n\t\t\t\t\tПароль\t\t\t\t</label>\n\t\t\t</th>\n\t\t\t<td>\n\t\t\t\t<div class=\"\">\n\t\t\t\t\t\t\t\t\t\t<input type=\"password\" name=\"admin_password\" id=\"pass1\" class=\"regular-text\" autocomplete=\"off\" data-reveal=\"1\" data-pw=\"(7NO8bAAEvMXbbPth1\" aria-describedby=\"pass-strength-result\" />\n\t\t\t\t\t<button type=\"button\" class=\"button wp-hide-pw hide-if-no-js\" data-start-masked=\"0\" data-toggle=\"0\" aria-label=\"Скрыть пароль\">\n\t\t\t\t\t\t<span class=\"dashicons dashicons-hidden\"></span>\n\t\t\t\t\t\t<span class=\"text\">Скрыть</span>\n\t\t\t\t\t</button>\n\t\t\t\t\t<div id=\"pass-strength-result\" aria-live=\"polite\"></div>\n\t\t\t\t</div>\n\t\t\t\t<p><span class=\"description important hide-if-no-js\">\n\t\t\t\t<strong>Важно:</strong>\n\t\t\t\t\t\t\t\tЭтот пароль понадобится вам для входа. Сохраните его в надёжном месте.</span></p>\n\t\t\t</td>\n\t\t</tr>\n\t\t<tr class=\"form-field form-required user-pass2-wrap hide-if-js\">\n\t\t\t<th scope=\"row\">\n\t\t\t\t<label for=\"pass2\">Повторите пароль\t\t\t\t\t<span class=\"description\">(обязательно)</span>\n\t\t\t\t</label>\n\t\t\t</th>\n\t\t\t<td>\n\t\t\t\t<input name=\"admin_password2\" type=\"password\" id=\"pass2\" autocomplete=\"off\" />\n\t\t\t</td>\n\t\t</tr>\n\t\t<tr class=\"pw-weak\">\n\t\t\t<th scope=\"row\">Подтвердите пароль</th>\n\t\t\t<td>\n\t\t\t\t<label>\n\t\t\t\t\t<input type=\"checkbox\" name=\"pw_weak\" class=\"pw-checkbox\" />\n\t\t\t\t\tРазрешить использование слабого пароля.\t\t\t\t</label>\n\t\t\t</td>\n\t\t</tr>\n\t\t\t\t<tr>\n\t\t\t<th scope=\"row\"><label for=\"admin_email\">Ваш e-mail</label></th>\n\t\t\t<td><input name=\"admin_email\" type=\"email\" id=\"admin_email\" size=\"25\" value=\"\" />\n\t\t\t<p>Внимательно проверьте адрес электронной почты, перед тем как продолжить.</p></td>\n\t\t</tr>\n\t\t<tr>\n\t\t\t<th scope=\"row\">Видимость для поисковых систем</th>\n\t\t\t<td>\n\t\t\t\t<fieldset>\n\t\t\t\t\t<legend class=\"screen-reader-text\"><span>Видимость для поисковых систем </span></legend>\n\t\t\t\t\t\t\t\t\t\t\t<label for=\"blog_public\"><input name=\"blog_public\" type=\"checkbox\" id=\"blog_public\" value=\"0\"  />\n\t\t\t\t\t\tПопросить поисковые системы не индексировать сайт</label>\n\t\t\t\t\t\t<p class=\"description\">Будет ли учитываться этот запрос &mdash; зависит от поисковых систем.</p>\n\t\t\t\t\t\t\t\t\t</fieldset>\n\t\t\t</td>\n\t\t</tr>\n\t</table>\n\t<p class=\"step\"><input type=\"submit\" name=\"Submit\" id=\"submit\" class=\"button button-large\" value=\"Установить WordPress\"  /></p>\n\t<input type=\"hidden\" name=\"language\" value=\"\" />\n</form>\n\t<script type=\"text/javascript\">var t = document.getElementById('weblog_title'); if (t){ t.focus(); }</script>\n\t<script type='text/javascript' src='http://localhost/wp-includes/js/jquery/jquery.js?ver=1.12.4'></script>\n<script type='text/javascript' src='http://localhost/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>\n<script type='text/javascript'>\n/* <![CDATA[ */\nvar _zxcvbnSettings = {\"src\":\"http:\\/\\/localhost\\/wp-includes\\/js\\/zxcvbn.min.js\"};\n/* ]]> */\n</script>\n<script type='text/javascript' src='http://localhost/wp-includes/js/zxcvbn-async.min.js?ver=1.0'></script>\n<script type='text/javascript'>\n/* <![CDATA[ */\nvar pwsL10n = {\"unknown\":\"\\u041d\\u0430\\u0434\\u0451\\u0436\\u043d\\u043e\\u0441\\u0442\\u044c \\u043f\\u0430\\u0440\\u043e\\u043b\\u044f \\u043d\\u0435\\u0438\\u0437\\u0432\\u0435\\u0441\\u0442\\u043d\\u0430\",\"short\":\"\\u041e\\u0447\\u0435\\u043d\\u044c \\u0441\\u043b\\u0430\\u0431\\u044b\\u0439\",\"bad\":\"\\u0421\\u043b\\u0430\\u0431\\u044b\\u0439\",\"good\":\"\\u0421\\u0440\\u0435\\u0434\\u043d\\u0438\\u0439\",\"strong\":\"\\u041d\\u0430\\u0434\\u0451\\u0436\\u043d\\u044b\\u0439\",\"mismatch\":\"\\u041d\\u0435\\u0441\\u043e\\u0432\\u043f\\u0430\\u0434\\u0435\\u043d\\u0438\\u0435\"};\n/* ]]> */\n</script>\n<script type='text/javascript' src='http://localhost/wp-admin/js/password-strength-meter.min.js?ver=5.1.1'></script>\n<script type='text/javascript' src='http://localhost/wp-includes/js/underscore.min.js?ver=1.8.3'></script>\n<script type='text/javascript'>\n/* <![CDATA[ */\nvar _wpUtilSettings = {\"ajax\":{\"url\":\"\\/wp-admin\\/admin-ajax.php\"}};\n/* ]]> */\n</script>\n<script type='text/javascript' src='http://localhost/wp-includes/js/wp-util.min.js?ver=5.1.1'></script>\n<script type='text/javascript'>\n/* <![CDATA[ */\nvar userProfileL10n = {\"warn\":\"\\u0412\\u0430\\u0448 \\u043d\\u043e\\u0432\\u044b\\u0439 \\u043f\\u0430\\u0440\\u043e\\u043b\\u044c \\u043d\\u0435 \\u0431\\u044b\\u043b \\u0441\\u043e\\u0445\\u0440\\u0430\\u043d\\u0451\\u043d.\",\"warnWeak\":\"\\u0420\\u0430\\u0437\\u0440\\u0435\\u0448\\u0438\\u0442\\u044c \\u0438\\u0441\\u043f\\u043e\\u043b\\u044c\\u0437\\u043e\\u0432\\u0430\\u043d\\u0438\\u0435 \\u0441\\u043b\\u0430\\u0431\\u043e\\u0433\\u043e \\u043f\\u0430\\u0440\\u043e\\u043b\\u044f.\",\"show\":\"\\u041f\\u043e\\u043a\\u0430\\u0437\\u0430\\u0442\\u044c\",\"hide\":\"\\u0421\\u043a\\u0440\\u044b\\u0442\\u044c\",\"cancel\":\"\\u041e\\u0442\\u043c\\u0435\\u043d\\u0430\",\"ariaShow\":\"\\u041f\\u043e\\u043a\\u0430\\u0437\\u0430\\u0442\\u044c \\u043f\\u0430\\u0440\\u043e\\u043b\\u044c\",\"ariaHide\":\"\\u0421\\u043a\\u0440\\u044b\\u0442\\u044c \\u043f\\u0430\\u0440\\u043e\\u043b\\u044c\"};\n/* ]]> */\n</script>\n<script type='text/javascript' src='http://localhost/wp-admin/js/user-profile.min.js?ver=5.1.1'></script>\n<script type=\"text/javascript\">\njQuery( function( $ ) {\n\t$( '.hide-if-no-js' ).removeClass( 'hide-if-no-js' );\n} );\n</script>\n</body>\n</html>\n", 
        "content_length": "7655", 
        "content_type": "text/html; charset=utf-8", 
        "cookies": {}, 
        "date": "Wed, 05 Jun 2019 17:18:27 GMT", 
        "expires": "Wed, 11 Jan 1984 05:00:00 GMT", 
        "failed": false, 
        "failed_when_result": false, 
        "msg": "OK (7655 bytes)", 
        "redirected": true, 
        "server": "Apache/2.4.29 (Ubuntu)", 
        "status": 200, 
        "url": "http://localhost/wp-admin/install.php", 
        "vary": "Accept-Encoding"
    }
}

PLAY RECAP *********************************************************************
wordpress1                 : ok=3    changed=0    unreachable=0    failed=0   
wordpress2                 : ok=3    changed=0    unreachable=0    failed=0   

[Slack Notifications] found #22 as previous completed, non-aborted build
[Slack Notifications] will send OnSuccessNotification because build matches and user preferences allow it
Finished: SUCCESS
```