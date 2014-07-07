<?
CMSApplication::register_module("notification", array("display_name"=>"Notifications", "link"=>"/admin/notification/"));

AutoLoader::register_view_path("plugin", __DIR__."/view/");
AutoLoader::register_controller_path("plugin", __DIR__."/lib/controller/");
AutoLoader::register_controller_path("plugin", __DIR__."/resources/app/controller/");
AutoLoader::$plugin_array[] = array("name"=>"wildfire.notifications","dir"=>__DIR__);

AdminHomeController::$dashboards[] = "admin/notifications/_dashboard_notifications";

WaxEvent::add("WildfireUser.setup", function(){
  $model = WaxEvent::data();
  $model->define("recieve_notifications", "BooleanField", array("group"=>"User Details", "primary_group"=>1));
});

WaxEvent::add("cms.save.success", function(){
  $controller = WaxEvent::data();
  $m = new WildfireNotification;
  $m->parse_from_controller($controller);
});
WaxEvent::add("cms.save.success.finished", function(){
  $controller = WaxEvent::data();
  $m = new WildfireNotification;
  $m->parse_from_controller($controller);
});

?>