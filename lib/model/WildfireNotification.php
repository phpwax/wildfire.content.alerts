<?
class WildfireNotification extends WaxModel{

  public function setup(){
    parent::setup();
    $this->define("title", "CharField", array('scaffold'=>true, 'group'=>'content', 'primary_group'=>1));
    $this->define("content", "TextField", array('group'=>'content', 'primary_group'=>1,'widget'=>"TinymceTextareaInput"));
    $this->define("date_created", "DateTimeField");
  }
  public function before_save(){
    if(!$this->date_created) $this->date_created = date("Y-m-d H:i:s");
  }

  public function parse_from_controller($controller){
    $model = $controller->model;
    $class = get_class($model);
  }

}
?>