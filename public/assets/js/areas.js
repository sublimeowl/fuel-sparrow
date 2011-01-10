function confirm_area_delete(id)
{
	if(confirm('Tem a certeza que deseja de apagar a área com o id '+id))
	{
		$.post(url+'owl/deletearea/'+id,function(){
			window.location = url + 'owl/content/areas';
		});
	}
}
