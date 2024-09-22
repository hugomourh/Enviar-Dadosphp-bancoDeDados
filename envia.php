<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>
<body>
    <?php

$conexao = mysqli_connect("localhost", "root", "", "teste_formulario");

if(!$conexao){
    echo"Não conectado";
}
else{
    echo"Conectado ao banco >>>>>>>";
}

//verica dados

$cpf = $_POST['cpf'];
$cpf = mysqli_real_escape_string($conexao, $cpf); //mais segurança
$sql = "SELECT cpf FROM dados WHERE cpf='$cpf' " ;//verifica se o cpf já não cadastrado
$retorno = mysqli_query($conexao, $sql);

if(mysqli_num_rows($retorno)> 0){
    echo "CPF já cadastrado!";
}

else{

    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];

    $sql = "INSERT INTO teste_formulario.dados (cpf, idade, nome) VALUES ('$cpf', '$idade', '$nome')";

    $resultado = mysqli_query($conexao, $sql);


    if ($resultado) {
        echo ">> Usuário cadastrado!";
    } else {
        echo "Erro ao cadastrar usuário: " . mysqli_error($conexao);
    }
}

    mysqli_close($conexao);

    //lembrar que o teste_formulario e o nome do banco e o dados e a tabela...

?>
 


</body>
</html>