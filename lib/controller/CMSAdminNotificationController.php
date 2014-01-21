<?php

class CMSAdminNotificationController extends AdminComponent {

  public $module_name = "notification";
  public $model_class = 'WildfireNotification';
  public $display_name = "Notifications";
  public $dashboard = true;
  public $exportable = true;
  public $singular = "Notification";
  public $filter_fields=array(
                          'text' => array('columns'=>array('title'), 'partial'=>'_filters_text', 'fuzzy'=>true)
                        );


}
?>