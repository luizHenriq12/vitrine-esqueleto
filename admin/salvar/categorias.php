<?php

if($_POST){//Esta validando se esta recebendo algum POST;
    $id = $_POST["id"] ?? NULL;//Esta validando os dados que foram enviados no campo id;
    $nome = $_POST["nome"] ?? NULL;//Esta validando os dados que foram enviados no campo nome;

    if (empty($nome)) { //Esta validando se foi digitado algum nome no campo nome;
        mensagemErro("Digite um nome");
    }
    
    $sql = "select id from categoria where nome = :nome and id <> :id"; //Esta fazendo um select para verficar se existe alguma categoria com o nome e id existentes,
    //comparando o nome e se o id que foi digitado ja existe no banco;
    $consulta = $pdo->prepare($sql);//Esta preparando o sql para o banco de dados;
    $consulta->bindParam(":nome", $nome);//Ele paga o parametro :nome e prepara para faze a consulta no banco de dados;
    $consulta->bindParam(":id", $id);//Ele paga o parametro :id e prepara para faze a consulta no banco de dados;
    $consulta->execute();//Esta executando o banco de dados;

    $dados = $consulta->fetch(PDO: :FETCH_OBJ);//Esta sendo convertido o que esta vindo do banco para o php consegui validar;

    if (!empty($dados->$id)) { //Esta validando se existe uma categoria com o nome ja exsitente passando em :nome caso exista ele exibe uma mensagem de erro;
        mensagemErro("Já existe uma categoria com este nome");
    }

    if (empty($id)){ //Esta validando se foi digitado algum id no campo id;
        $sql = "insert into categoria (nome) values (:nome)";//Esta usando um insert para inser um novo nome no banco de dados;
    $consulta = $pdo->prepare($sql);//Esta preparando o sql para o banco de dados;
    $consulta->bindParam(":nome", $nome);//Ele paga o parametro :nome e prepara para faze a consulta no banco de dados;
    }else{
        $sql = "update categoria set nome = :nome where id = :id";//Esta fazendo um update na tabela caso ja exista um nome no banco ele substitui  o nome na tabela;
        $consulta = $pdo->prepare($sql);//Esta preparando o sql para o banco de dados;
        $consulta->bindParam(":nome", $nome);//Ele paga o parametro :nome e prepara para faze a consulta no banco de dados;
        $consulta->bindParam(":id", $id);//Ele paga o parametro :id e prepara para faze a consulta no banco de dados;
    }

    if (!$consulta->execute()){//Esta executando o sql caso nao consiga ele mostra uma mensagem de erro;
        mensagemErro("Não foi possivel salvar os dados");
    }

    echo "<script>lacation.href='Listar/categorias'</script>";//Esta setando o caminho que ele ira fazer ao salvar a categoria;

 

}


//Pegar do POST o valor do campo nome
//fazer a conexao da pdo
//Criar o sql de create para cadastrar na tabela de categoria