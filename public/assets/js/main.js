function showclient(id)
    {$('#ficha').load(url+'clientes/ficha/'+id);}
function editclient(id)
    {$('#ficha').load(url+'clientes/editar/'+id);}
function new_client(id)
    {$('#ficha').load(url+'clientes/novo/');}
function new_reading(id)
    {$('#ficha').load(url+'leituras/nova/'+id);}
function leiturapasso2()
{
    var perguntas = $('#num_perguntas').val();
    $.post(url+'leituras/perguntas',{'perguntas':perguntas},function(data){
        $('#perguntas').html(data);
    });
}
function terminarleitura()
{
     var output = '{';
     var i = 0;
     $.each($('.ponte'),function(data,field){
        if ( field.value.length > 5 )
            {
                output += '"'+field.name+'":"'+field.value+'",'
                i++;
            }
     });
     output = output.replace(new RegExp("[\,]+$", "g"), "");
     output += '}';
     if(i > 0)
     {
        alert(output);
     }
     else
     {
         alert('Não foram colocadas perguntas');
     }

}