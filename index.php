<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php 
        $cep = $_POST['cep'];        
        $url = "https://viacep.com.br/ws/".$cep."//json/";
    ?>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultor de CEP</title>
    <link rel="stylesheet" href="./css/style.css" type="text/css">
</head>
<body>
    <header>
        <h1>Dados do CEP: <?php echo $cep; ?></h1>
    </header>
    
    <?php

    function buscarCep($u){
                // Fazendo a conexão - iniciando
                $ch =  curl_init();
        
                // Indicando qual a URL para se conectar
                curl_setopt($ch, CURLOPT_URL, $u);
        
                // Retorna no formato de string-lista
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $dadosRetorno = curl_exec($ch);
                
                // Visualisar dados no formato Json
                //var_dump($dadosR);
        
                // Trabalhando com o retorno dos dados ---- Transformando em uma matriz
                $dados = json_decode($dadosRetorno, true);
        
                echo "<div class=retorno>".
                        "CEP: "         .$dados["cep"].         "<br/>".
                        "LOGRADOURO: "  .$dados["logradouro"].  "<br/>".
                        "COMPLEMENTO: " .$dados["complemento"]. "<br/>".
                        "BAIRRO: "      .$dados["bairro"].      "<br/>".
                        "LOCALIDADE: "  .$dados["localidade"].  "<br/>".
                        "UF: "          .$dados["uf"].          "<br/>".
                        "IBGE: "        .$dados["ibge"].        "<br/>".
                        "GIA: "         .$dados["gia"].         "<br/>".
                        "DDD: "         .$dados["ddd"].         "<br/>".
                        "SIAFI: "       .$dados["siafi"].       "<br/>".
                     "</div>";
        
                // Fechando a conexão para evitar problemas
                curl_close($ch); 
    }

    if(isset($cep) && $cep ==""){
        echo "<div class=retorno> <h3> Nenhum valor foi inserido! </h3> </div>";
    }else{

        buscarCep($url);

    }
       

    ?>
    <a href="index.html">Nova consulta</a>
</body>
</html>