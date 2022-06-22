<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultor de CEP</title>
</head>
<body>
    <header>
        <h1>Consultor de CEP</h1>
    </header>
    
    <?php

        $cep = $_GET['c'];
        // Fazendo a conexão
        $url = "https://viacep.com.br/ws/".$cep."//json/";
        $ch =  curl_init($url);
        
        // Retorna no formato de lista
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        
        // A utilização do CURLOPT_SSL_VERIFYPEER é para tentar desviar de alguns problemas que 
        // que possam ocorrer ao consultar APIs de sites com HTTPS. Para nao fazer verificação.
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = json_decode(curl_exec($ch), true);
        var_dump($result);
        foreach($result as $dados){
            echo "<h3>$dados<h3>";
        }


        

    ?>
</body>
</html>