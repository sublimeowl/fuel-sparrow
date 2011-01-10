<h1>My Profile</h1>

<?= Form::open(array('action'=>'owl/myprofile')) ?>
<table>
    <tr>
	<td><b>First Name</b></td><td><?= Form::input('first_name',isset($profile['first_name'])?$profile['first_name']:'') ?></td>
	<td><b>Last Name</b></td><td><?= Form::input('last_name',isset($profile['last_name'])?$profile['last_name']:'') ?></td>
    </tr>
    <tr>
	<td><b>Bio</b></td>
	<td colspan="3"><?= Form::textarea('bio',isset($profile['bio'])?$profile['bio']:'') ?></td>
    </tr>
    <tr><td colspan="4"><?= Form::submit('submit', 'Gravar') ?></td></tr>
</table>
<?= Form::close() ?>