$(document).ready(function(){
    
    $(document).on('click', 'table a.trash', function(e){
        e.preventDefault();
        var linha = $(this).parents('tr');
        var url   = $(this).attr('href');
        
        $.ajax({
            method: 'GET',
            url: url,
            dataType: 'json',
            success: function(data) {
                alert('Paciente removido com sucesso');
                linha.remove();
                
            },
            error: function(data){
                alert(data.responseText);
            }
        });
    });
   
    $('form').submit(function(){
        
        var form  = $(this);
        var url   = form.attr('action');
        var dados = form.serialize();
        
        $.ajax({
            method: 'POST',
            url: url,
            data: dados,
            dataType: 'json',
            success: function(data) {
                var html = '<tr>';
                html    += '<td>' + data.paciente.id + '</td>';
                html    += '<td>' + data.paciente.nome + '</td>';
                html    += '<td>' + data.paciente.mae + '</td>';
                html    += '<td>' + data.paciente.pai + '</td>';
                html    += '<td>' + data.paciente.email + '</td>';
                html    += '<td>' + data.paciente.status + '</td>';
                html    += '<td>' + data.paciente.data + '</td>';
                html    += '<td>';
                for (var i=0; i<data.paciente.actions.length; i++) {
                    html += '<a href="' + data.paciente.actions[i].url + '" class="' + data.paciente.actions[i].classe + '"><i class="fa fa-' + data.paciente.actions[i].classe + '"></i> ' + data.paciente.actions[i].label + '</a>';
                }
                html    += '</td>';
                html    += '</tr>';
                $('table tbody').append(html);
                alert('Paciente Cadastrado com sucesso');
                form.find('input').val('');
                
            },
            error: function(data){
                alert(data.responseText);
            }
        });
        
        
        return false;
    });
    
});