<?php

class Content
{
    var $user;

    function  __construct() {
	$this->user = Worker::get_my_profile();
	$this->data['user'] = $this->user;
    }
    public function areas()
    {
	Worker::is_logged();

	$data = array();
	$this->template->title = 'OWL - Gerir áreas';

	$this->template->user = Worker::get_my_profile();
	$data['user'] = $this->template->user;

	$data['areas'] = DB::select()->from('areas')
		->execute();
	$this->template->content = View::factory('owl/content/areas',$data);
    }

    public function editarea()
    {
	$id = Uri::segment(4);
	if(!$id) Output::redirect('owl/areas','refresh');

	if($_POST)
	{
	    DB::update('areas')->where('id','=',$id)
		    ->set(array('name'=>Input::post('name'),'description'=>Input::post('description')))
		    ->execute();

	    Output::redirect('owl/content/areas','refresh');
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

    public function deletearea()
    {
	
    }

    public function categories()
    {
	Worker::is_logged();

	$data = array();
	$this->template->title = 'OWL - Adicionar Conteúdo';

	$this->template->user = Worker::get_my_profile();
	$data['user'] = $this->template->user;
	$this->template->content = View::factory('owl/content/categories',$data);
    }

    public function add()
    {
	Worker::is_logged();
	
	$data = array();
	$this->template->title = 'OWL - Adicionar Conteúdo';

	$this->template->user = Worker::get_my_profile();
	$data['user'] = $this->template->user;
	$this->template->content = View::factory('owl/content/add',$data);

    }

    public function addarea()
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

	    Output::redirect('owl/content/areas','refresh');
	}
	
	$this->template->title = 'OWL - Adicionar Área';

	$this->template->user = Worker::get_my_profile();
	$data['user'] = $this->template->user;
	$this->template->content = View::factory('owl/content/addarea',$data);
    }

}