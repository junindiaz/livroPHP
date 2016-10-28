<?php 
    error_reporting(0);
    ini_set(“display_errors”, 0 );
    include 'banco.php';
    include 'ajudantes.php';
    $func = $_GET['func'];
    // LAÇO PARA EDITAR A TAREFA---------------------------------------------------------------------
    if($func=='editar'){
        $exibir_tabela = false;
    
        if(isset($_POST['nome'])&& $_POST['nome'] != ''){
            $tarefa = array();
            $tarefa['id'] = $_POST['id'];
            $tarefa['nome'] = $_POST['nome'];
            if(isset($_POST['descricao'])){
                $tarefa['descricao'] = $_POST['descricao'];
            }  else { 
                $tarefa['descricao'] = '';
            }
            if(isset($_POST['prazo'])){
                $tarefa['prazo'] = $_POST['prazo'];

            }else{
                $tarefa['prazo'] = '';
            }
           $tarefa['prioridade']=$_POST['prioridade'];
           if(isset($_POST['concluida'])){
               $tarefa['concluida'] = 1;
           }else{
               $tarefa['concluida'] = 2;
           } 
    //               $_SESSION['lista_tarefas'][] = $tarefa;

           editar_tarefa($conexao,$tarefa);
           header('Location: tarefas.php');
           die();
        }
    //            $lista_tarefas = array();
    //            if (isset($_GET['nome'])) {
    //                $lista_tarefas = $_SESSION['lista_tarefas'];
    //            }

        $tarefa = buscar_tarefa($conexao, $_GET['id']);
        //$lista_tarefas['prazo'] = $_GET['prazo'];
        include "template.php";
//---------------- LAÇO PARA CRIAR NOVA TAREFA-----------------------------------------------------------------------    
    }if($func==''){
        $exibir_tabela = true;    
        $tem_erros = false;
        $erros_validacao = array();        
        if(tem_post()){
            $tarefa = array();
            if(isset($_POST['nome'])&& strlen($_POST['nome'])>0){                
                $tarefa['nome'] = $_POST['nome'];
            }else{
                $tem_erros = true;
                $erros_validacao['nome'] = 'O nome da tarefa é obrigatório!';
            }
            if(isset($_POST['descricao'])){
                $tarefa['descricao'] = $_POST['descricao'];
            }  else { 
                $tarefa['descricao'] = '';
            }
            if(isset($_POST['prazo'])){
                $tarefa['prazo'] = $_POST['prazo'];

            }else{
                $tarefa['prazo'] = '';
            }
           $tarefa['prioridade']=$_POST['prioridade'];
           if(isset($_POST['concluida'])){
               $tarefa['concluida'] = 1;
           }else{
               $tarefa['concluida'] = 2;
           } 
//               $_SESSION['lista_tarefas'][] = $tarefa;
           if($tem_erros==false){
                gravar_tarefa($conexao,$tarefa);
                header('Location: tarefas.php');
                die();
           }
        }
//            $lista_tarefas = array();
//            if (isset($_GET['nome'])) {
//                $lista_tarefas = $_SESSION['lista_tarefas'];
//            }

        $lista_tarefas = busca_tarefas($conexao);
        //$lista_tarefas['prazo'] = $_GET['prazo'];
        $tarefa = array(
            'id' =>0,
            'nome' =>'',
            'descricao' => '',
            'prazo' => '',
            'prioridade' => 1,
            'concluida' => ''
        );

        include "template.php";
    }
       
            
        