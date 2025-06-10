$(document).ready(function() {
    // Carrega os estados quando a página é carregada
    $.ajax({
        url: 'get_estados.php',
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            var options = '<option value="">Selecione um estado</option>';
            $.each(data, function(index, estado) {
                options += '<option value="' + estado.id + '">' + estado.uf + ' - ' + estado.nome + '</option>';
            });
            $('#estado').html(options);
        }
    });

    // Quando um estado é selecionado
    $('#estado').change(function() {
        var estadoId = $(this).val();
        
        if (estadoId) {
            $.ajax({
                url: 'get_cidades.php',
                type: 'GET',
                data: { estado_id: estadoId },
                dataType: 'json',
                success: function(data) {
                    var options = '<option value="">Selecione uma cidade</option>';
                    $.each(data, function(index, cidade) {
                        options += '<option value="' + cidade.id + '">' + cidade.nome + '</option>';
                    });
                    $('#cidade').html(options).prop('disabled', false);
                }
            });
        } else {
            $('#cidade').html('<option value="">Selecione primeiro um estado</option>').prop('disabled', true);
        }
    });
});