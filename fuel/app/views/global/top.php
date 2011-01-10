<div class="grid_3">logo</div>
<div class="grid_9 top_menu">
    <?php
	if(Session::get('username'))
	{
	    if(isset($user))
	    {
		echo 'Ola ';
		if(isset($user['profile']['first_name'])) echo $user['profile']['first_name'].' ';
		if(isset($user['profile']['last_name'])) echo $user['profile']['last_name'].' ';
		if( ! isset($user['profile']['first_name']) AND ! isset($user['profile']['last_name'])) echo $user['profile']['username'].' ';

		echo '<br />';

		echo Html::anchor('owl', 'Home').' | ';

		echo Html::anchor('owl/logout', 'Logout');
	    }
	}
	else
	{
	    echo 'Tem de fazer '.Html::anchor('owl/login', 'Login');
	}
    ?>
</div>