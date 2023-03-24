<?php

    include_once '../backend/html_build.php';
    include_once '../backend/file_manager.php';

    if( !empty($_POST['form_submit']) ) {
        create(read());
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Sistema de Gerenciamento de Pessoas</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-md navbar-dark bg-secondary">
        <div class="container-fluid">
            <a href="read.php" class="navbar-brand">
                <span class="ms-3 fs-5">Sistema de Gerenciamento de Pessoas</span>
            </a>
        </div>
    </nav>
    <form class="form" method="post" action="create.php">
        <input TYPE="hidden" NAME="form_submit" VALUE="OK">
        <div class="container my-4">
            <h2>CREATE</h2>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input 
                            type="text"
                            class="form-control cpf-mask"
                            name="cpf"
                            <?php 
                                if(isset($_GET['action'])) {
                                    echo 'disabled="true"';
                                    echo 'value="'.$_GET['chave'].'"';
                                }
                            ?>
                        />
                        <input TYPE="hidden" NAME="cpf-edit" VALUE="<?php echo $_GET['chave']?>">
                        <label for="cpf">Cpf</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="nome"
                            <?php 
                                if(isset($_GET['action'])) {
                                    $pessoa = findyPessoa($_GET['chave']);
                                    
                                    echo 'value="'.$pessoa[0].'"';
                                }
                            ?>
                        />
                        <label for="nome">Nome</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="ender"
                            <?php 
                                if(isset($_GET['action'])) {
                                    $pessoa = findyPessoa($_GET['chave']);
                                    
                                    echo 'value="'.$pessoa[1].'"';
                                }
                            ?>
                        />
                        <label for="nome">Endereço</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input
                            type="text"
                            class="form-control"
                            name="tel"
                            <?php 
                                if(isset($_GET['action'])) {
                                    $pessoa = findyPessoa($_GET['chave']);
                                    
                                    echo 'value="'.$pessoa[2].'"';
                                }
                            ?>
                        />
                        <label for="nome">Telefone</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-success">Salvar</button>
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".cpf-mask").mask("000.000.000-00", {reverse:true})
        })
    </script>
</body>
</html>
