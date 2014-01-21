<?
class WildfireNotificationEmail extends WaxEmail{


  public function notification_alert($data, $from, $to, $subject="Wildfire CMS Notifications"){
    $this->from = $from;
    $all = explode(",", str_replace(";", ",", $to));
    $this->add_to_address(array_shift($all));
    foreach($all as $em) $this->add_cc_address($em);
    $this->data = $data;
    $this->subject = $subject;
  }

}
?>