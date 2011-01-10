<?php
    echo Html::h('Menú',3);
    echo Html::ul(array(
	Html::anchor('owl', 'Home'),
	Html::anchor('owl/myprofile', 'My Profile'),
	Html::anchor('admin/content', 'Conteúdos'),
	Html::anchor('owl/users', 'Users'),
	Html::anchor('owl/logout', 'Logout')
    ));

?>
