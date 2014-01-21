<?
class WildfireNotification extends WaxModel{

  public function setup(){
    parent::setup();
    $this->define("title", "CharField", array('scaffold'=>true, 'group'=>'content', 'primary_group'=>1, 'disabled'=>'disabled'));

    $this->define("date_created", "DateTimeField", array('group'=>'content', 'primary_group'=>1,'scaffold'=>true, 'disabled'=>'disabled'));
    $this->define("classname", "CharField", array('group'=>'content', 'primary_group'=>1,'disabled'=>'disabled', 'scaffold'=>true));
    $this->define("controller", "CharField", array('group'=>'content', 'primary_group'=>1,'disabled'=>'disabled', 'scaffold'=>true));
    $this->define("exported", "BooleanField", array('group'=>'content', 'primary_group'=>1,'scaffold'=>true, 'disabled'=>'disabled'));
    $this->define("content", "TextField", array('group'=>'content', 'primary_group'=>1,'disabled'=>"disabled"));
  }
  public function before_save(){
    if(!$this->date_created) $this->date_created = date("Y-m-d H:i:s");
  }

  public function parse_from_controller($controller){
    $model = $controller->model;
    $name = $model->humanize();
    $this->classname = get_class($model);
    $this->controller = get_class($controller);
    $this->date_created = $time = date("Y-m-d H:i:s");
    $this->title = (($controller->singular) ? $controller->singular : $controller->module_name) . " (".$name.") has been updated.";
    $this->content = "<p><a href='/admin/users/edit/".$controller->current_user->primval."/'>".$controller->current_user->username."</a> edited <a href='/admin/".$controller->module_name."/edit/".$model->primval."/'>".$name."</a> at ".$time."</p>";
    return $this->save();
  }

  public function recent(){
    return $this->order("date_created DESC")->limit(5)->all();
  }

}
?>