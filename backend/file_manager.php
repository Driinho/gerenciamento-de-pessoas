<?php

    function create() {

        $pessoas = read();

        $cpf = $_POST['cpf'];
        $nome = $_POST['nome'];
        $ender = $_POST['ender'];
        $tel = $_POST['tel'];

        $arr = array($nome, $ender, $tel);

        $pessoas[$cpf] = $arr;

        $fp = fopen('../bd/pessoas.txt', "w");

        if ($fp) {

            foreach($pessoas as $cpf_p => $dados) {

                fputs($fp, verifyEnter($cpf_p));
                
                $linha = $dados[0]."#".$dados[1]."#".$dados[2];
                
                fputs($fp, verifyEnter($linha));
            }

            echo "<script>alert('Cadastro efetuado com sucesso!!')</script>";

        } else {
            echo "<script>alert('SUBMIT - ERROR')</script>";
        }
        
        fclose($fp);
    }

    function read() {

        $pessoas = array();
        $fp = fopen('../bd/pessoas.txt', 'r');

        if ($fp) {

            while(!feof($fp)) {
                $arr = array();
                $cpf = fgets($fp);
                $dados = fgets($fp);
                if(!empty($dados)) {
                    $arr = explode("#", $dados);
                    $pessoas[$cpf] = $arr;
                }
            }

            fclose($fp);
            return $pessoas;
        }
    }

    function delete($chave) {

        // $pessoas = read();
        
        echo $chave;
        // if(array_search($pessoas))
    }


    function verifyEnter($var) {
        if(str_contains($var, "\n")) {
            return $var;
        } else {
            return $var .= "\n";
        }
    }

?>