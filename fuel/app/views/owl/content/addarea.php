<h1>Adicionar Área</h1>

<?php
    $formaction = 'owl/content/';
    if(isset($action) && $action == 'e') {$formaction .= 'editarea/'.$area['id'];}
    else { $formaction .= 'addarea/'.$area['id']; }
    echo Form::open($formaction);
?>

<table>
    <tr>
	<td>Nome</td>
	<td><?= Form::input('name',  isset ($area['name'])?$area['name']:'') ?></td>
    </tr>
    <tr>
	<td>Descrição</td>
	<td><?= Form::textarea('description',  isset ($area['description'])?$area['description']:'') ?></td>
    </tr>
    <tr>
	<td>&nbsp;</td>
	<td><?= Form::submit('submit', 'gravar') ?></td>
    </tr>
</table>
<?= Form::close() ?>