<?php

class Controller_Admin_Content extends Controller_Template
{
    var $user;

    public $template='owl/template';


    function  __construct() {
	$this->user = Worker::get_my_profile();
	$this->data['user'] = $this->user;
    }

    public function action_index()
    {
	Worker::is_logged();

	$data = array();
	$this->template->title = 'OWL - Gestão de conteúdo';
	$data['user'] = Worker::get_my_profile();
	$this->template->user = $data['user'];
	$this->template->content = View::factory('owl/content',$data);
    }
    
    public function action_areas()
    {
	Worker::is_logged();

	$data = array();
	$this->template->title = 'OWL - Gerir áreas';

	$this->template->user = Worker::get_my_profile();
	$data['user'] = $this->template->user;

	Worker::add_js('areas.js');

	$data['areas'] = Model_Area::find('all');
	$this->template->content = View::factory('owl/content/areas',$data);
    }

    public function action_editarea()
    {
	$id = Uri::segment(4);
	if(!$id) Output::redirect('admin/content/areas','refresh');

	if($_POST)
	{
	    DB::update('areas')->where('id','=',$id)
		    ->set(array('name'=>Input::post('name'),'description'=>Input::post('description')))
		    ->execute();

	    Output::redirect('admin/content/areas','refresh');
	}

	$r = DB::select()->from('areas')->where('id','=',$id)->execute();
	$data['area'] = $r[0];

	$data['action'] = 'e';
	
	$this->template->title = 'OWL - Esitar área "'.$data['area']['name'].'"';

	$this->template->user = Worker::get_my_profile();
	$data['user'] = $this->template->user;

	Worker::add_rte_textarea();
	
	$this->template->content = View::factory('owl/content/addarea',$data);
    }

    public function action_addarea()
    {
	Worker::is_logged();

	$data = array();

	if($_POST)
	{
	    $data['name'] = Input::post('name');
	    $data['description'] = Input::post('description');

	    DB::insert('areas',array('name','description'))
		    ->values(array($data['name'],$data['description']))
		    ->execute();

	    Output::redirect('admin/content/areas','refresh');
	}

	$this->template->title = 'OWL - Adicionar Área';

	$this->template->user = Worker::get_my_profile();
	$data['user'] = $this->template->user;
	$this->template->content = View::factory('owl/content/addarea',$data);
    }

    public function action_deletearea($id = null)
    {
	if( ! $id )
	{
	    echo 0;
	    return;
	}

	DB::delete('areas')->where('id','=',$id);

	return 1;

    }

    public function action_categories()
    {
	Worker::is_logged();

	$data = array();
	$this->template->title = 'OWL - Adicionar Conteúdo';

	$this->template->user = Worker::get_my_profile();
	$data['user'] = $this->template->user;
	$this->template->content = View::factory('admin/content/categories',$data);
    }

    public function action_add()
    {
	Worker::is_logged();
	
	$data = array();
	$this->template->title = 'OWL - Adicionar Conteúdo';

	$this->template->user = Worker::get_my_profile();
	$data['user'] = $this->template->user;
	$this->template->content = View::factory('owl/content/add',$data);

    }

    

}