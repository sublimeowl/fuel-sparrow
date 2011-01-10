<h1>Áreas</h1>

<h3>
<?= Html::anchor('owl/content/add','Adicionar artigo') ?> | <?= Html::anchor('owl/content/areas', 'Gerir Áreas') ?> | <?= Html::anchor('owl/content/categories', 'Gerir Categorias') ?>
</h3>

:: <?= Html::anchor('owl/content/addarea', 'Adicionar área') ?>
<br /><br />
<?php
    if(isset($areas) && count($areas) > 0)
    {
?>

<table>
    <tr>
	<th>Id</th><th>Nome</th><th>Descrição</th><th>Artigos</th><th>Acções</th>
   </tr>
	<?php
	foreach($areas as $area)
	{
	    ?>
    <tr>
	<td><?= $area['id'] ?></td>
	<td><?= $area['name'] ?></td>
	<td><?= $area['description'] ?></td>
	<td>0</td>
	<td>
	    <?= Html::anchor('owl/content/editarea/'.$area['id'], 'Editar') ?>
	    &nbsp;|&nbsp;
	    <a href="javascript:void(0);" onclick="javascript:confirm_area_delete(<?= $area['id'] ?>);" />

	</td>
    </tr>
	    <?php
	}
	?>
    
</table>

<?php
    }
    else
    {
	echo '<i>Não existem ainda áreas registadas</i>';
    }