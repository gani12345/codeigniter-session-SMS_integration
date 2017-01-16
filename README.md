# codeigniter-session-SMS_integration
login page with session and sms_integration in user page

#refer the below link to update code on github
https://help.github.com/articles/adding-a-file-to-a-repository-using-the-command-line/

1.DJ Jobs run for single time
php index.php backgroundrunner execute_delayed_job


2.How to run DJ jobs continuous??

nohup php index.php backgroundrunner execute_delayed_job &!


3.How to run cron job in application?

before CLI through [crontab -e]
*/1 * * * * curl http://localhost/application/modules/sms_email_reminder/cron_sms_notification.php


