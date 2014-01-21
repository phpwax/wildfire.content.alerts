<?
WaxEvent::add("cms.save.success", function(){
  $controller = WaxEvent::data();
  $m = new WildfireNotification;
  $m->parse_from_controller($controller);
});
WaxEvent::run("cms.save.success.finished", function(){
  $controller = WaxEvent::data();
  $m = new WildfireNotification;
  $m->parse_from_controller($controller);
});

?>