wildfire.content.alerts
=======================

Adds an extra field to wildfire_user (recieve_notifications) to allow only certain users to get the notifications

Need a config setup like:

"wildfire.notifications" => array(
  'from'=>'email@address.com',
  'cron'=>true | false,
  'each_time' => true | false
  )

  from is the email address that is used as the from

  cron is a boolean used in the controller to check if it should run as a cron

  each_time is a boolean checked on each save, if true it sends emails on send

  cron controller url is: /cronnotification?see=spot


