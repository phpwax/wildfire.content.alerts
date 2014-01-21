<?
class CronnotificationController extends WaxController{

  public function controller_global(){
    parent::controller_global();
    $this->use_view = $this->use_layout = false;
    if(Request::param("see") != "spot") throw new WXRoutingException('The page you are looking for is not available', "Page not found", '404');
  }

  public function index(){
    if(Config::get("wildfire.notifications/cron")){
      $notify = new WildfireNotification;
      $data= $notify->filter("exported", 0)->all();
      $user = new WildfireUser;
      $users =$user->filter("recieve_notifications", 1)->all();
      $email = new WildfireNotificationEmail;
      $to = "";
      foreach($users as $u) $to .= $u->email.",";
      $to = trim($to, ",");
      if(strlen($to)) $email->send_notification_alert($data, Config::get("wildfire.notifications/from"), $to);
    }
    exit;
  }

}
?>