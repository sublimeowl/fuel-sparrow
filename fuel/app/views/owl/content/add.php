<h1>Adicionar Conteúdo</h1>

<?= Form::open(array('owl/content/add')) ?>

<table>
    <tr>
	<td><b>Título</b></td>
	<td><?= Form::input('subject',isset($artigo['subject'])?$artigo['subject']:'') ?></td>
    </tr>
</table>

<?= Form::close() ?>