# OUTPUT DOWNGRADE TO 5.1.1
# FIRST STEP 
``` bash
Started by user kir
Building on master in workspace /var/lib/jenkins/workspace/10_INSTALL_APP
[10_INSTALL_APP] $ ansible-playbook /home/project2/pro1.yml -i /home/project2/inventory.yml -f 5

PLAY [all] *********************************************************************

TASK [install python 2] ********************************************************
changed: [wordpress1]
changed: [wordpress2]

PLAY [all] *********************************************************************

TASK [Gathering Facts] *********************************************************
ok: [wordpress2]
ok: [wordpress1]

TASK [server : Update apt cache] ***********************************************
changed: [wordpress2]
changed: [wordpress1]

TASK [server : Install required software] **************************************
ok: [wordpress2] => (item=[u'apache2', u'mysql-server', u'php7.2-mysql', u'php7.2', u'libapache2-mod-php7.2', u'python-mysqldb'])
ok: [wordpress1] => (item=[u'apache2', u'mysql-server', u'php7.2-mysql', u'php7.2', u'libapache2-mod-php7.2', u'python-mysqldb'])

PLAY RECAP *********************************************************************
wordpress1                 : ok=4    changed=2    unreachable=0    failed=0   
wordpress2                 : ok=4    changed=2    unreachable=0    failed=0   

[Slack Notifications] found #78 as previous completed, non-aborted build
Triggering a new build of 20_INSTALL_PHP
Finished: SUCCESS

# SECOND STEP
Started by upstream project "10_INSTALL_APP" build number 79
originally caused by:
 Started by user kir
Building on master in workspace /var/lib/jenkins/workspace/20_INSTALL_PHP
[20_INSTALL_PHP] $ ansible-playbook /home/project2/pro2.yml -i /home/project2/inventory.yml -f 5

PLAY [all] *********************************************************************

TASK [Gathering Facts] *********************************************************
ok: [wordpress1]
ok: [wordpress2]

TASK [php : Install php extensions] ********************************************
ok: [wordpress1] => (item=[u'php7.2-gd', u'php7.2-ssh2'])
ok: [wordpress2] => (item=[u'php7.2-gd', u'php7.2-ssh2'])

PLAY RECAP *********************************************************************
wordpress1                 : ok=2    changed=0    unreachable=0    failed=0   
wordpress2                 : ok=2    changed=0    unreachable=0    failed=0   

[Slack Notifications] found #40 as previous completed, non-aborted build
Triggering a new build of 30_CREATE_BD
Finished: SUCCESS

# THIRD STEP
Started by upstream project "20_INSTALL_PHP" build number 41
originally caused by:
 Started by upstream project "10_INSTALL_APP" build number 79
 originally caused by:
  Started by user kir
Building on master in workspace /var/lib/jenkins/workspace/30_CREATE_BD
[30_CREATE_BD] $ ansible-playbook /home/project2/pro3.yml -i /home/project2/inventory.yml -f 5

PLAY [all] *********************************************************************

TASK [Gathering Facts] *********************************************************
ok: [wordpress1]
ok: [wordpress2]

TASK [mysql : Create mysql database] *******************************************
ok: [wordpress1]
ok: [wordpress2]

TASK [mysql : Create mysql user] ***********************************************
ok: [wordpress2]
ok: [wordpress1]

PLAY RECAP *********************************************************************
wordpress1                 : ok=3    changed=0    unreachable=0    failed=0   
wordpress2                 : ok=3    changed=0    unreachable=0    failed=0   

[Slack Notifications] found #33 as previous completed, non-aborted build
Triggering a new build of 40_INSTALL_WORDPRESS
Finished: SUCCESS

# FORTH STEP
Started by upstream project "30_CREATE_BD" build number 34
originally caused by:
 Started by upstream project "20_INSTALL_PHP" build number 41
 originally caused by:
  Started by upstream project "10_INSTALL_APP" build number 79
  originally caused by:
   Started by user kir
Building on master in workspace /var/lib/jenkins/workspace/40_INSTALL_WORDPRESS
[40_INSTALL_WORDPRESS] $ ansible-playbook /home/project2/pro4.yml -i /home/project2/inventory.yml -f 5

PLAY [all] *********************************************************************

TASK [Gathering Facts] *********************************************************
ok: [wordpress1]
ok: [wordpress2]

TASK [wordpress : Download WordPress] ******************************************
ok: [wordpress1]
ok: [wordpress2]

TASK [wordpress : Extract WordPress] *******************************************
changed: [wordpress2]
changed: [wordpress1]

TASK [wordpress : Update default Apache site] **********************************
changed: [wordpress2]
changed: [wordpress1]

TASK [wordpress : Copy sample config file] *************************************
ok: [wordpress1]
ok: [wordpress2]

TASK [wordpress : COPY WP-CONFIG] **********************************************
ok: [wordpress1]
ok: [wordpress2]

TASK [wordpress : restart apache] **********************************************
changed: [wordpress2]
changed: [wordpress1]

RUNNING HANDLER [wordpress : restart apache] ***********************************
changed: [wordpress2]
changed: [wordpress1]

PLAY RECAP *********************************************************************
wordpress1                 : ok=8    changed=4    unreachable=0    failed=0   
wordpress2                 : ok=8    changed=4    unreachable=0    failed=0   

[Slack Notifications] found #34 as previous completed, non-aborted build
Triggering a new build of 50_TEST_WORDPRESS
Finished: SUCCESS

# FIFTH STEP
Started by upstream project "40_INSTALL_WORDPRESS" build number 35
originally caused by:
 Started by upstream project "30_CREATE_BD" build number 34
 originally caused by:
  Started by upstream project "20_INSTALL_PHP" build number 41
  originally caused by:
   Started by upstream project "10_INSTALL_APP" build number 79
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
        "changed": false, 
        "connection": "close", 
        "content": "<!doctype html>\n<html lang=\"en-US\">\n<head>\n\t<meta charset=\"UTF-8\" />\n\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />\n\t<link rel=\"profile\" href=\"https://gmpg.org/xfn/11\" />\n\t<title>project.by &#8211; Ещё один сайт на WordPress</title>\n<link rel='dns-prefetch' href='//192.168.100.9' />\n<link rel='dns-prefetch' href='//s.w.org' />\n<link rel=\"alternate\" type=\"application/rss+xml\" title=\"project.by &raquo; Feed\" href=\"http://192.168.100.9/?feed=rss2\" />\n<link rel=\"alternate\" type=\"application/rss+xml\" title=\"project.by &raquo; Comments Feed\" href=\"http://192.168.100.9/?feed=comments-rss2\" />\n\t\t<script type=\"text/javascript\">\n\t\t\twindow._wpemojiSettings = {\"baseUrl\":\"https:\\/\\/s.w.org\\/images\\/core\\/emoji\\/11.2.0\\/72x72\\/\",\"ext\":\".png\",\"svgUrl\":\"https:\\/\\/s.w.org\\/images\\/core\\/emoji\\/11.2.0\\/svg\\/\",\"svgExt\":\".svg\",\"source\":{\"concatemoji\":\"http:\\/\\/192.168.100.9\\/wp-includes\\/js\\/wp-emoji-release.min.js?ver=5.1.1\"}};\n\t\t\t!function(a,b,c){function d(a,b){var c=String.fromCharCode;l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,a),0,0);var d=k.toDataURL();l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,b),0,0);var e=k.toDataURL();return d===e}function e(a){var b;if(!l||!l.fillText)return!1;switch(l.textBaseline=\"top\",l.font=\"600 32px Arial\",a){case\"flag\":return!(b=d([55356,56826,55356,56819],[55356,56826,8203,55356,56819]))&&(b=d([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]),!b);case\"emoji\":return b=d([55358,56760,9792,65039],[55358,56760,8203,9792,65039]),!b}return!1}function f(a){var c=b.createElement(\"script\");c.src=a,c.defer=c.type=\"text/javascript\",b.getElementsByTagName(\"head\")[0].appendChild(c)}var g,h,i,j,k=b.createElement(\"canvas\"),l=k.getContext&&k.getContext(\"2d\");for(j=Array(\"flag\",\"emoji\"),c.supports={everything:!0,everythingExceptFlag:!0},i=0;i<j.length;i++)c.supports[j[i]]=e(j[i]),c.supports.everything=c.supports.everything&&c.supports[j[i]],\"flag\"!==j[i]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[j[i]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(h=function(){c.readyCallback()},b.addEventListener?(b.addEventListener(\"DOMContentLoaded\",h,!1),a.addEventListener(\"load\",h,!1)):(a.attachEvent(\"onload\",h),b.attachEvent(\"onreadystatechange\",function(){\"complete\"===b.readyState&&c.readyCallback()})),g=c.source||{},g.concatemoji?f(g.concatemoji):g.wpemoji&&g.twemoji&&(f(g.twemoji),f(g.wpemoji)))}(window,document,window._wpemojiSettings);\n\t\t</script>\n\t\t<style type=\"text/css\">\nimg.wp-smiley,\nimg.emoji {\n\tdisplay: inline !important;\n\tborder: none !important;\n\tbox-shadow: none !important;\n\theight: 1em !important;\n\twidth: 1em !important;\n\tmargin: 0 .07em !important;\n\tvertical-align: -0.1em !important;\n\tbackground: none !important;\n\tpadding: 0 !important;\n}\n</style>\n\t<link rel='stylesheet' id='wp-block-library-css'  href='http://192.168.100.9/wp-includes/css/dist/block-library/style.min.css?ver=5.1.1' type='text/css' media='all' />\n<link rel='stylesheet' id='wp-block-library-theme-css'  href='http://192.168.100.9/wp-includes/css/dist/block-library/theme.min.css?ver=5.1.1' type='text/css' media='all' />\n<link rel='stylesheet' id='twentynineteen-style-css'  href='http://192.168.100.9/wp-content/themes/twentynineteen/style.css?ver=1.3' type='text/css' media='all' />\n<link rel='stylesheet' id='twentynineteen-print-style-css'  href='http://192.168.100.9/wp-content/themes/twentynineteen/print.css?ver=1.3' type='text/css' media='print' />\n<link rel='https://api.w.org/' href='http://192.168.100.9/index.php?rest_route=/' />\n<link rel=\"EditURI\" type=\"application/rsd+xml\" title=\"RSD\" href=\"http://192.168.100.9/xmlrpc.php?rsd\" />\n<link rel=\"wlwmanifest\" type=\"application/wlwmanifest+xml\" href=\"http://192.168.100.9/wp-includes/wlwmanifest.xml\" /> \n<meta name=\"generator\" content=\"WordPress 5.1.1\" />\n\t\t<style type=\"text/css\">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>\n\t\t</head>\n\n<body class=\"home blog wp-embed-responsive hfeed image-filters-enabled\">\n<div id=\"page\" class=\"site\">\n\t<a class=\"skip-link screen-reader-text\" href=\"#content\">Skip to content</a>\n\n\t\t<header id=\"masthead\" class=\"site-header\">\n\n\t\t\t<div class=\"site-branding-container\">\n\t\t\t\t<div class=\"site-branding\">\n\n\t\t\t\t\t\t\t\t<h1 class=\"site-title\"><a href=\"http://192.168.100.9/\" rel=\"home\">project.by</a></h1>\n\t\t\t\n\t\t\t\t<p class=\"site-description\">\n\t\t\t\tЕщё один сайт на WordPress\t\t\t</p>\n\t\t\t</div><!-- .site-branding -->\n\t\t\t</div><!-- .layout-wrap -->\n\n\t\t\t\t\t</header><!-- #masthead -->\n\n\t<div id=\"content\" class=\"site-content\">\n\n\t<section id=\"primary\" class=\"content-area\">\n\t\t<main id=\"main\" class=\"site-main\">\n\n\t\t\n<article id=\"post-1\" class=\"post-1 post type-post status-publish format-standard hentry category-1 entry\">\n\t<header class=\"entry-header\">\n\t\t<h2 class=\"entry-title\"><a href=\"http://192.168.100.9/?p=1\" rel=\"bookmark\">Привет, мир!</a></h2>\t</header><!-- .entry-header -->\n\n\t\n\t<div class=\"entry-content\">\n\t\t\n<p>Добро пожаловать в WordPress. Это ваша первая запись. Отредактируйте или удалите ее, затем начинайте создавать!</p>\n\t</div><!-- .entry-content -->\n\n\t<footer class=\"entry-footer\">\n\t\t<span class=\"byline\"><svg class=\"svg-icon\" width=\"16\" height=\"16\" aria-hidden=\"true\" role=\"img\" focusable=\"false\" viewBox=\"0 0 24 24\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"><path d=\"M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z\"></path><path d=\"M0 0h24v24H0z\" fill=\"none\"></path></svg><span class=\"screen-reader-text\">Posted by</span><span class=\"author vcard\"><a class=\"url fn n\" href=\"http://192.168.100.9/?author=1\">kir</a></span></span><span class=\"posted-on\"><svg class=\"svg-icon\" width=\"16\" height=\"16\" aria-hidden=\"true\" role=\"img\" focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><defs><path id=\"a\" d=\"M0 0h24v24H0V0z\"></path></defs><clipPath id=\"b\"><use xlink:href=\"#a\" overflow=\"visible\"></use></clipPath><path clip-path=\"url(#b)\" d=\"M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm4.2 14.2L11 13V7h1.5v5.2l4.5 2.7-.8 1.3z\"></path></svg><a href=\"http://192.168.100.9/?p=1\" rel=\"bookmark\"><time class=\"entry-date published updated\" datetime=\"2019-06-05T22:26:43+03:00\">05.06.2019</time></a></span><span class=\"cat-links\"><svg class=\"svg-icon\" width=\"16\" height=\"16\" aria-hidden=\"true\" role=\"img\" focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M10 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2h-8l-2-2z\"></path><path d=\"M0 0h24v24H0z\" fill=\"none\"></path></svg><span class=\"screen-reader-text\">Posted in</span><a href=\"http://192.168.100.9/?cat=1\" rel=\"category\">Без рубрики</a></span><span class=\"comments-link\"><svg class=\"svg-icon\" width=\"16\" height=\"16\" aria-hidden=\"true\" role=\"img\" focusable=\"false\" viewBox=\"0 0 24 24\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"><path d=\"M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18z\"></path><path d=\"M0 0h24v24H0z\" fill=\"none\"></path></svg><a href=\"http://192.168.100.9/?p=1#comments\">1 Comment<span class=\"screen-reader-text\"> on Привет, мир!</span></a></span>\t</footer><!-- .entry-footer -->\n</article><!-- #post-${ID} -->\n\n\t\t</main><!-- .site-main -->\n\t</section><!-- .content-area -->\n\n\n\t</div><!-- #content -->\n\n\t<footer id=\"colophon\" class=\"site-footer\">\n\t\t\n\t<aside class=\"widget-area\" role=\"complementary\" aria-label=\"Footer\">\n\t\t\t\t\t\t\t<div class=\"widget-column footer-widget-1\">\n\t\t\t\t\t<section id=\"search-2\" class=\"widget widget_search\"><form role=\"search\" method=\"get\" class=\"search-form\" action=\"http://192.168.100.9/\">\n\t\t\t\t<label>\n\t\t\t\t\t<span class=\"screen-reader-text\">Search for:</span>\n\t\t\t\t\t<input type=\"search\" class=\"search-field\" placeholder=\"Search &hellip;\" value=\"\" name=\"s\" />\n\t\t\t\t</label>\n\t\t\t\t<input type=\"submit\" class=\"search-submit\" value=\"Search\" />\n\t\t\t</form></section>\t\t<section id=\"recent-posts-2\" class=\"widget widget_recent_entries\">\t\t<h2 class=\"widget-title\">Recent Posts</h2>\t\t<ul>\n\t\t\t\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t<a href=\"http://192.168.100.9/?p=1\">Привет, мир!</a>\n\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t</ul>\n\t\t</section><section id=\"recent-comments-2\" class=\"widget widget_recent_comments\"><h2 class=\"widget-title\">Recent Comments</h2><ul id=\"recentcomments\"><li class=\"recentcomments\"><span class=\"comment-author-link\"><a href='https://wordpress.org/' rel='external nofollow' class='url'>Автор комментария</a></span> on <a href=\"http://192.168.100.9/?p=1#comment-1\">Привет, мир!</a></li></ul></section><section id=\"archives-2\" class=\"widget widget_archive\"><h2 class=\"widget-title\">Archives</h2>\t\t<ul>\n\t\t\t\t<li><a href='http://192.168.100.9/?m=201906'>June 2019</a></li>\n\t\t</ul>\n\t\t\t</section><section id=\"categories-2\" class=\"widget widget_categories\"><h2 class=\"widget-title\">Categories</h2>\t\t<ul>\n\t\t\t\t<li class=\"cat-item cat-item-1\"><a href=\"http://192.168.100.9/?cat=1\" >Без рубрики</a>\n</li>\n\t\t</ul>\n\t\t\t</section><section id=\"meta-2\" class=\"widget widget_meta\"><h2 class=\"widget-title\">Meta</h2>\t\t\t<ul>\n\t\t\t\t\t\t<li><a href=\"http://192.168.100.9/wp-login.php\">Log in</a></li>\n\t\t\t<li><a href=\"http://192.168.100.9/?feed=rss2\">Entries <abbr title=\"Really Simple Syndication\">RSS</abbr></a></li>\n\t\t\t<li><a href=\"http://192.168.100.9/?feed=comments-rss2\">Comments <abbr title=\"Really Simple Syndication\">RSS</abbr></a></li>\n\t\t\t<li><a href=\"https://wordpress.org/\" title=\"Powered by WordPress, state-of-the-art semantic personal publishing platform.\">WordPress.org</a></li>\t\t\t</ul>\n\t\t\t</section>\t\t\t\t\t</div>\n\t\t\t\t\t</aside><!-- .widget-area -->\n\n\t\t<div class=\"site-info\">\n\t\t\t\t\t\t\t\t\t\t<a class=\"site-name\" href=\"http://192.168.100.9/\" rel=\"home\">project.by</a>,\n\t\t\t\t\t\t<a href=\"https://wordpress.org/\" class=\"imprint\">\n\t\t\t\tProudly powered by WordPress.\t\t\t</a>\n\t\t\t\t\t\t\t\t</div><!-- .site-info -->\n\t</footer><!-- #colophon -->\n\n</div><!-- #page -->\n\n<script type='text/javascript' src='http://192.168.100.9/wp-includes/js/wp-embed.min.js?ver=5.1.1'></script>\n\t<script>\n\t/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener(\"hashchange\",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);\n\t</script>\n\t\n</body>\n</html>\n", 
        "content_type": "text/html; charset=UTF-8", 
        "cookies": {}, 
        "date": "Thu, 06 Jun 2019 14:02:56 GMT", 
        "failed": false, 
        "failed_when_result": false, 
        "link": "<http://192.168.100.9/index.php?rest_route=/>; rel=\"https://api.w.org/\"", 
        "msg": "OK (unknown bytes)", 
        "redirected": false, 
        "server": "Apache/2.4.29 (Ubuntu)", 
        "status": 200, 
        "transfer_encoding": "chunked", 
        "url": "http://localhost", 
        "vary": "Accept-Encoding"
    }
}
ok: [wordpress2] => {
    "msg": {
        "changed": false, 
        "connection": "close", 
        "content": "<!doctype html>\n<html lang=\"en-US\">\n<head>\n\t<meta charset=\"UTF-8\" />\n\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />\n\t<link rel=\"profile\" href=\"https://gmpg.org/xfn/11\" />\n\t<title>project.by &#8211; Just another WordPress site</title>\n<link rel='dns-prefetch' href='//192.168.100.4' />\n<link rel='dns-prefetch' href='//s.w.org' />\n<link rel=\"alternate\" type=\"application/rss+xml\" title=\"project.by &raquo; Feed\" href=\"http://192.168.100.4/index.php/feed/\" />\n<link rel=\"alternate\" type=\"application/rss+xml\" title=\"project.by &raquo; Comments Feed\" href=\"http://192.168.100.4/index.php/comments/feed/\" />\n\t\t<script type=\"text/javascript\">\n\t\t\twindow._wpemojiSettings = {\"baseUrl\":\"https:\\/\\/s.w.org\\/images\\/core\\/emoji\\/11.2.0\\/72x72\\/\",\"ext\":\".png\",\"svgUrl\":\"https:\\/\\/s.w.org\\/images\\/core\\/emoji\\/11.2.0\\/svg\\/\",\"svgExt\":\".svg\",\"source\":{\"concatemoji\":\"http:\\/\\/192.168.100.4\\/wp-includes\\/js\\/wp-emoji-release.min.js?ver=5.1.1\"}};\n\t\t\t!function(a,b,c){function d(a,b){var c=String.fromCharCode;l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,a),0,0);var d=k.toDataURL();l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,b),0,0);var e=k.toDataURL();return d===e}function e(a){var b;if(!l||!l.fillText)return!1;switch(l.textBaseline=\"top\",l.font=\"600 32px Arial\",a){case\"flag\":return!(b=d([55356,56826,55356,56819],[55356,56826,8203,55356,56819]))&&(b=d([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]),!b);case\"emoji\":return b=d([55358,56760,9792,65039],[55358,56760,8203,9792,65039]),!b}return!1}function f(a){var c=b.createElement(\"script\");c.src=a,c.defer=c.type=\"text/javascript\",b.getElementsByTagName(\"head\")[0].appendChild(c)}var g,h,i,j,k=b.createElement(\"canvas\"),l=k.getContext&&k.getContext(\"2d\");for(j=Array(\"flag\",\"emoji\"),c.supports={everything:!0,everythingExceptFlag:!0},i=0;i<j.length;i++)c.supports[j[i]]=e(j[i]),c.supports.everything=c.supports.everything&&c.supports[j[i]],\"flag\"!==j[i]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[j[i]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(h=function(){c.readyCallback()},b.addEventListener?(b.addEventListener(\"DOMContentLoaded\",h,!1),a.addEventListener(\"load\",h,!1)):(a.attachEvent(\"onload\",h),b.attachEvent(\"onreadystatechange\",function(){\"complete\"===b.readyState&&c.readyCallback()})),g=c.source||{},g.concatemoji?f(g.concatemoji):g.wpemoji&&g.twemoji&&(f(g.twemoji),f(g.wpemoji)))}(window,document,window._wpemojiSettings);\n\t\t</script>\n\t\t<style type=\"text/css\">\nimg.wp-smiley,\nimg.emoji {\n\tdisplay: inline !important;\n\tborder: none !important;\n\tbox-shadow: none !important;\n\theight: 1em !important;\n\twidth: 1em !important;\n\tmargin: 0 .07em !important;\n\tvertical-align: -0.1em !important;\n\tbackground: none !important;\n\tpadding: 0 !important;\n}\n</style>\n\t<link rel='stylesheet' id='wp-block-library-css'  href='http://192.168.100.4/wp-includes/css/dist/block-library/style.min.css?ver=5.1.1' type='text/css' media='all' />\n<link rel='stylesheet' id='wp-block-library-theme-css'  href='http://192.168.100.4/wp-includes/css/dist/block-library/theme.min.css?ver=5.1.1' type='text/css' media='all' />\n<link rel='stylesheet' id='twentynineteen-style-css'  href='http://192.168.100.4/wp-content/themes/twentynineteen/style.css?ver=1.3' type='text/css' media='all' />\n<link rel='stylesheet' id='twentynineteen-print-style-css'  href='http://192.168.100.4/wp-content/themes/twentynineteen/print.css?ver=1.3' type='text/css' media='print' />\n<link rel='https://api.w.org/' href='http://192.168.100.4/index.php/wp-json/' />\n<link rel=\"EditURI\" type=\"application/rsd+xml\" title=\"RSD\" href=\"http://192.168.100.4/xmlrpc.php?rsd\" />\n<link rel=\"wlwmanifest\" type=\"application/wlwmanifest+xml\" href=\"http://192.168.100.4/wp-includes/wlwmanifest.xml\" /> \n<meta name=\"generator\" content=\"WordPress 5.1.1\" />\n\t\t<style type=\"text/css\">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>\n\t\t</head>\n\n<body class=\"home blog wp-embed-responsive hfeed image-filters-enabled\">\n<div id=\"page\" class=\"site\">\n\t<a class=\"skip-link screen-reader-text\" href=\"#content\">Skip to content</a>\n\n\t\t<header id=\"masthead\" class=\"site-header\">\n\n\t\t\t<div class=\"site-branding-container\">\n\t\t\t\t<div class=\"site-branding\">\n\n\t\t\t\t\t\t\t\t<h1 class=\"site-title\"><a href=\"http://192.168.100.4/\" rel=\"home\">project.by</a></h1>\n\t\t\t\n\t\t\t\t<p class=\"site-description\">\n\t\t\t\tJust another WordPress site\t\t\t</p>\n\t\t\t</div><!-- .site-branding -->\n\t\t\t</div><!-- .layout-wrap -->\n\n\t\t\t\t\t</header><!-- #masthead -->\n\n\t<div id=\"content\" class=\"site-content\">\n\n\t<section id=\"primary\" class=\"content-area\">\n\t\t<main id=\"main\" class=\"site-main\">\n\n\t\t\n<article id=\"post-1\" class=\"post-1 post type-post status-publish format-standard hentry category-uncategorized entry\">\n\t<header class=\"entry-header\">\n\t\t<h2 class=\"entry-title\"><a href=\"http://192.168.100.4/index.php/2019/06/06/hello-world/\" rel=\"bookmark\">Hello world!</a></h2>\t</header><!-- .entry-header -->\n\n\t\n\t<div class=\"entry-content\">\n\t\t\n<p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>\n\t</div><!-- .entry-content -->\n\n\t<footer class=\"entry-footer\">\n\t\t<span class=\"byline\"><svg class=\"svg-icon\" width=\"16\" height=\"16\" aria-hidden=\"true\" role=\"img\" focusable=\"false\" viewBox=\"0 0 24 24\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"><path d=\"M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z\"></path><path d=\"M0 0h24v24H0z\" fill=\"none\"></path></svg><span class=\"screen-reader-text\">Posted by</span><span class=\"author vcard\"><a class=\"url fn n\" href=\"http://192.168.100.4/index.php/author/kir/\">kir</a></span></span><span class=\"posted-on\"><svg class=\"svg-icon\" width=\"16\" height=\"16\" aria-hidden=\"true\" role=\"img\" focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><defs><path id=\"a\" d=\"M0 0h24v24H0V0z\"></path></defs><clipPath id=\"b\"><use xlink:href=\"#a\" overflow=\"visible\"></use></clipPath><path clip-path=\"url(#b)\" d=\"M12 2C6.5 2 2 6.5 2 12s4.5 10 10 10 10-4.5 10-10S17.5 2 12 2zm4.2 14.2L11 13V7h1.5v5.2l4.5 2.7-.8 1.3z\"></path></svg><a href=\"http://192.168.100.4/index.php/2019/06/06/hello-world/\" rel=\"bookmark\"><time class=\"entry-date published updated\" datetime=\"2019-06-06T09:09:22+00:00\">June 6, 2019</time></a></span><span class=\"cat-links\"><svg class=\"svg-icon\" width=\"16\" height=\"16\" aria-hidden=\"true\" role=\"img\" focusable=\"false\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M10 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2h-8l-2-2z\"></path><path d=\"M0 0h24v24H0z\" fill=\"none\"></path></svg><span class=\"screen-reader-text\">Posted in</span><a href=\"http://192.168.100.4/index.php/category/uncategorized/\" rel=\"category tag\">Uncategorized</a></span><span class=\"comments-link\"><svg class=\"svg-icon\" width=\"16\" height=\"16\" aria-hidden=\"true\" role=\"img\" focusable=\"false\" viewBox=\"0 0 24 24\" version=\"1.1\" xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\"><path d=\"M21.99 4c0-1.1-.89-2-1.99-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h14l4 4-.01-18z\"></path><path d=\"M0 0h24v24H0z\" fill=\"none\"></path></svg><a href=\"http://192.168.100.4/index.php/2019/06/06/hello-world/#comments\">1 Comment<span class=\"screen-reader-text\"> on Hello world!</span></a></span>\t</footer><!-- .entry-footer -->\n</article><!-- #post-${ID} -->\n\n\t\t</main><!-- .site-main -->\n\t</section><!-- .content-area -->\n\n\n\t</div><!-- #content -->\n\n\t<footer id=\"colophon\" class=\"site-footer\">\n\t\t\n\t<aside class=\"widget-area\" role=\"complementary\" aria-label=\"Footer\">\n\t\t\t\t\t\t\t<div class=\"widget-column footer-widget-1\">\n\t\t\t\t\t<section id=\"search-2\" class=\"widget widget_search\"><form role=\"search\" method=\"get\" class=\"search-form\" action=\"http://192.168.100.4/\">\n\t\t\t\t<label>\n\t\t\t\t\t<span class=\"screen-reader-text\">Search for:</span>\n\t\t\t\t\t<input type=\"search\" class=\"search-field\" placeholder=\"Search &hellip;\" value=\"\" name=\"s\" />\n\t\t\t\t</label>\n\t\t\t\t<input type=\"submit\" class=\"search-submit\" value=\"Search\" />\n\t\t\t</form></section>\t\t<section id=\"recent-posts-2\" class=\"widget widget_recent_entries\">\t\t<h2 class=\"widget-title\">Recent Posts</h2>\t\t<ul>\n\t\t\t\t\t\t\t\t\t\t\t<li>\n\t\t\t\t\t<a href=\"http://192.168.100.4/index.php/2019/06/06/hello-world/\">Hello world!</a>\n\t\t\t\t\t\t\t\t\t</li>\n\t\t\t\t\t</ul>\n\t\t</section><section id=\"recent-comments-2\" class=\"widget widget_recent_comments\"><h2 class=\"widget-title\">Recent Comments</h2><ul id=\"recentcomments\"><li class=\"recentcomments\"><span class=\"comment-author-link\"><a href='https://wordpress.org/' rel='external nofollow' class='url'>A WordPress Commenter</a></span> on <a href=\"http://192.168.100.4/index.php/2019/06/06/hello-world/#comment-1\">Hello world!</a></li></ul></section><section id=\"archives-2\" class=\"widget widget_archive\"><h2 class=\"widget-title\">Archives</h2>\t\t<ul>\n\t\t\t\t<li><a href='http://192.168.100.4/index.php/2019/06/'>June 2019</a></li>\n\t\t</ul>\n\t\t\t</section><section id=\"categories-2\" class=\"widget widget_categories\"><h2 class=\"widget-title\">Categories</h2>\t\t<ul>\n\t\t\t\t<li class=\"cat-item cat-item-1\"><a href=\"http://192.168.100.4/index.php/category/uncategorized/\" >Uncategorized</a>\n</li>\n\t\t</ul>\n\t\t\t</section><section id=\"meta-2\" class=\"widget widget_meta\"><h2 class=\"widget-title\">Meta</h2>\t\t\t<ul>\n\t\t\t\t\t\t<li><a href=\"http://192.168.100.4/wp-login.php\">Log in</a></li>\n\t\t\t<li><a href=\"http://192.168.100.4/index.php/feed/\">Entries <abbr title=\"Really Simple Syndication\">RSS</abbr></a></li>\n\t\t\t<li><a href=\"http://192.168.100.4/index.php/comments/feed/\">Comments <abbr title=\"Really Simple Syndication\">RSS</abbr></a></li>\n\t\t\t<li><a href=\"https://wordpress.org/\" title=\"Powered by WordPress, state-of-the-art semantic personal publishing platform.\">WordPress.org</a></li>\t\t\t</ul>\n\t\t\t</section>\t\t\t\t\t</div>\n\t\t\t\t\t</aside><!-- .widget-area -->\n\n\t\t<div class=\"site-info\">\n\t\t\t\t\t\t\t\t\t\t<a class=\"site-name\" href=\"http://192.168.100.4/\" rel=\"home\">project.by</a>,\n\t\t\t\t\t\t<a href=\"https://wordpress.org/\" class=\"imprint\">\n\t\t\t\tProudly powered by WordPress.\t\t\t</a>\n\t\t\t\t\t\t\t\t</div><!-- .site-info -->\n\t</footer><!-- #colophon -->\n\n</div><!-- #page -->\n\n<script type='text/javascript' src='http://192.168.100.4/wp-includes/js/wp-embed.min.js?ver=5.1.1'></script>\n\t<script>\n\t/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener(\"hashchange\",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);\n\t</script>\n\t\n</body>\n</html>\n", 
        "content_type": "text/html; charset=UTF-8", 
        "cookies": {}, 
        "date": "Thu, 06 Jun 2019 14:02:56 GMT", 
        "failed": false, 
        "failed_when_result": false, 
        "link": "<http://192.168.100.4/index.php/wp-json/>; rel=\"https://api.w.org/\"", 
        "msg": "OK (unknown bytes)", 
        "redirected": false, 
        "server": "Apache/2.4.29 (Ubuntu)", 
        "status": 200, 
        "transfer_encoding": "chunked", 
        "url": "http://localhost", 
        "vary": "Accept-Encoding"
    }
}

PLAY RECAP *********************************************************************
wordpress1                 : ok=3    changed=0    unreachable=0    failed=0   
wordpress2                 : ok=3    changed=0    unreachable=0    failed=0   

[Slack Notifications] found #33 as previous completed, non-aborted build
[Slack Notifications] will send OnSuccessNotification because build matches and user preferences allow it
Finished: SUCCESS
