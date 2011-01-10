function area_delete(id)
{
	if(confirm('Tem a certeza que deseja de apagar a área com o id '+id))
	{
		$.post(url+'admin/content/deletearea/'+id,function(){
			window.location = url + 'owl/content/areas';
		});
	}
}
