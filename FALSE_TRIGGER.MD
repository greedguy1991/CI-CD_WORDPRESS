# FALSE TRIGGER
# CONTAIN TWO JOBS . SECOND RUN AFTER FIRST. FIRTS RUN EVERY 15 MIN.
# WHEN FIRST JOBS SUCCESS or FAILED , SECOND JOBS START. WHEN SECOND JOBS SUCCESS - STARTING DEPLOY
# EVERY JOBS CHECK VERSION WORDPRESS IN VERSION PHP. IT IS WORK WHEN DEVOPS KNOW NUMBER VERSION LATEST AND PRE-LATEST 
``` bash
# FIRST OUTPUT
Started by user kir
Building remotely on Ubuntu in workspace /tmp/workspace/TRIGGERR_VERSION
[TRIGGERR_VERSION] $ /bin/sh -xe /tmp/jenkins8984462600958312139.sh
+ cd /
+ grep 5.2.1 var/www/wordpress/wp-includes/version.php
$wp_version = '5.2.1';
Triggering a new build of TRIGGERR_VERSION1
Finished: SUCCESS
# SECOND OUTPUT
Started by upstream project "TRIGGERR_VERSION" build number 8
originally caused by:
 Started by user kir
Building remotely on Ubuntu in workspace /tmp/workspace/TRIGGERR_VERSION1
[TRIGGERR_VERSION1] $ /bin/sh -xe /tmp/jenkins4152967334441515257.sh
+ cd /
+ grep 5.1.1 var/www/wordpress/wp-includes/version.php
Build step 'Execute shell' marked build as failure
Finished: FAILURE
