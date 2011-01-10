<?php

class Worker
{

    protected static $jsfiles = array(
	'jquery.js',
	'jqueryui.js'
    );

    protected static $cssfiles = null;

    private function  __construct() {  }

    public function is_logged()
    {
	$logged = Session::get('username');
	if($logged) return true;
	Output::redirect('owl/login','refresh');
    }

    public function get_my_profile()
    {
	$user = DB::select()->from('simpleusers')
		->where('username','=',Session::get('username'))
		->limit(1)
		->execute();
	$user = $user->as_array();
	$user = $user[0];

	if(! $user) return FALSE;

	$profile = unserialize($user['profile_fields']);
	$user['profile'] = $profile;

	return $user;
    }

    // ---- Javascript handling -------------------------------------------------------------------------

    /**
     * Function: add_js()
     *
     * This function add a file to the include stack. it verifies first if the file's already there. don't want to add the same file
     * more then once.
     *
     * @param string $file - the name of the file in public/assets/js to add to the stack
     * @return bool
     */
    public function add_js($file)
    {
	if(! $file) return false;
	if( ! array_search($file, Worker::$jsfiles)) Worker::$jsfiles[] = $file;
	return true;
    }

    public function plot_js()
    {
	echo '<script type="text/javascript" >var url="'.Uri::create('/').'";</script>'."\n";
	foreach(Worker::$jsfiles as $file) echo Asset::js($file);
    }

    // ---- Extra CSS handling --------------------------------------------------------------------------

    public function add_css($file)
    {
	if ( ! $file ) return false;
	if( ! is_array(Worker::$cssfiles)) Worker::$cssfiles = array();
	if( !array_search($file, Worker::$cssfiles ) ) Worker::$cssfiles[] = $file;
	return true;
    }

    public function plot_css()
    {
	if(is_array(Worker::$cssfiles))
	{
	    foreach( Worker::$cssfiles as $file) echo Asset::css ($file);
	}
    }

    // ---- Other Function --------------------------------------------------------------------------------

    public function add_rte_textarea()
    {
	Worker::add_css('../js/markitup/skins/simple/style.css');
	Worker::add_css('../js/markitup/sets/default/style.css');

	Worker::add_js('markitup/jquery.markitup.js');
	Worker::add_js('markitup/sets/default/set.js');

	Worker::add_js('textarea.js');
    }

    public function dump($var)
    {
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
    }
}