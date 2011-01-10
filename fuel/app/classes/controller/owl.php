<?php
/**
 * An example Controller.  This shows the most basic usage of a Controller.
 */
class Controller_Owl extends Controller_Template {

    public $template = 'owl/template';

    public function action_index()
    {
	Worker::is_logged();

	Output::redirect('owl/dashboard');
    }
    public function action_login()
    {
	$data = array();
	if($_POST)
	{
	    $login = Validation::factory('login_form');
	    $login->add('username','Username')->add_rule('required');
	    $login->add('password','Password')->add_rule('required');
	    $login->run();

	    $errors = $login->errors();
	    if($errors) {echo $login->show_errors();}
	    else
	    {
		$auth = Auth::instance();
		
		if($auth->login($_POST['username'],$_POST['password']))
		{
		    Output::redirect('owl');
		}
		else
		{
		    $data['username'] = $_POST['username'];
		    echo 'Falhou a autenticação';
		}
	    }
	}
	
	$this->template->title = 'OWL - Login';
	$this->template->nav = '';
	$this->template->content = View::factory('owl/login',$data);
    }
    public function action_logout()
    {
	Auth::instance()->logout();
	Output::redirect('owl');
    }
    public function action_myprofile()
    {
	$this->_is_logged();
	$this->template->user = Worker::get_my_profile();

	$data['user'] = $this->template->user;
	$data['profile'] = $this->template->user['profile'];
	
	if($_POST)
	{
	    
	    $profile = array();
	    $profile['first_name'] = Input::post('first_name');
	    $profile['last_name'] = Input::post('last_name');
	    $profile['bio'] = Input::post('bio');

	    DB::update('simpleusers')
		->set(array('profile_fields' => serialize($profile)))
		->where('id','=',$this->template->user['id'])
			->execute();
		
		$this->template->user = Worker::get_my_profile();
	}

	$this->template->content = View::factory('owl/myprofile',$data);
    }
    public function action_dashboard()
    {

	Worker::is_logged();

	$this->template->title = 'Dashboard - OWL';
	$username = Session::get('username');

	$this->template->user =Worker::get_my_profile();

	$this->template->content = View::factory('owl/dashboard');
    }
    

    // ----------------------------------------------------------------------------------------------------------
    //  Other Functions
    // ----------------------------------------------------------------------------------------------------------

     private function _is_logged()
    {
	$worker = new Worker();
	if( ! $worker->is_logged() ) Output::redirect('owl/login');
    }
}


