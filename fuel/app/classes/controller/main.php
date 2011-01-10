<?php
class Controller_Main extends Controller
{
    public function action_index()
    {
	echo 'nothing to see here yet. Move along';
    }


    // ---- ajax function ---------------------------------------------------------------------------------------------

    public function action_mainjs()
    {
	   $data['uri'] = Uri::create('/');
	   echo json_encode($data);
    }

    public function action_teste()
    {
	$area = Model_Area::find(2);

    }

}