<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selects Dependentes</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form>
        <div>
            <label for="estado">Estado (UF):</label>
            <select id="estado" name="estado">
                <option value="">Selecione um estado</option>
                <!-- As opções serão carregadas via AJAX -->
            </select>
        </div>
        
        <div>
            <label for="cidade">Cidade:</label>
            <select id="cidade" name="cidade" disabled>
                <option value="">Selecione primeiro um estado</option>
            </select>
        </div>
    </form>

    <script src="script.js"></script>
</body>
</html>