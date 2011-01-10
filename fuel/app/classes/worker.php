<?php

class Worker
{
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

    public function dump($var)
    {
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
    }
}