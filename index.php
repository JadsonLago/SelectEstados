<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Selects Dependentes - Versão Corrigida</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        select { width: 300px; padding: 8px; margin: 10px 0; }
        label { display: block; margin-top: 20px; }
    </style>
</head>
<body>
    <h2>Selecione seu estado e cidade</h2>
    
    <div>
        <label for="estado">Estado (UF):</label>
        <select id="estado" name="estado">
            <option value="">Carregando estados...</option>
        </select>
    </div>
    
    <div>
        <label for="cidade">Cidade:</label>
        <select id="cidade" name="cidade" disabled>
            <option value="">Selecione um estado primeiro</option>
        </select>
    </div>

    <script>
    $(document).ready(function() {
        // Carrega os estados ao iniciar
        $.ajax({
            url: 'get_estados.php',
            type: 'GET',
            dataType: 'json',
            success: function(estados) {
                let options = '<option value="">Selecione um estado</option>';
                estados.forEach(estado => {
                    options += `<option value="${estado.id}">${estado.uf} - ${estado.nome}</option>`;
                });
                $('#estado').html(options);
            },
            error: function() {
                $('#estado').html('<option value="">Erro ao carregar estados</option>');
            }
        });

        // Quando muda o estado
        $('#estado').change(function() {
            const estadoId = $(this).val();
            const cidadeSelect = $('#cidade');
            
            cidadeSelect.prop('disabled', true).html('<option value="">Carregando cidades...</option>');
            
            if (estadoId) {
                $.ajax({
                    url: 'get_cidades.php',
                    type: 'GET',
                    data: { estado_id: estadoId },
                    dataType: 'json',
                    success: function(cidades) {
                        let options = '<option value="">Selecione uma cidade</option>';
                        cidades.forEach(cidade => {
                            options += `<option value="${cidade.id}">${cidade.nome}</option>`;
                        });
                        cidadeSelect.html(options).prop('disabled', false);
                    },
                    error: function() {
                        cidadeSelect.html('<option value="">Erro ao carregar cidades</option>');
                    }
                });
            } else {
                cidadeSelect.html('<option value="">Selecione um estado primeiro</option>');
            }
        });
    });
    </script>
</body>
</html>