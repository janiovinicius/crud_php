<?php 
$erros = [];

function processarErros($erros){
        echo('<div class="d-flex flex-column align-items-center gap-2">');
            foreach($erros as $item){

                
                echo('<div class="text-danger p-2"><i class="bi bi-info-circle-fill me-2"></i>'.$item.'</div>');
                
            }
            echo('</div>');
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['btn-cadastrar'])) {
        $email = isset($_POST['email']) ? trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL),''): '';
        $senha = isset($_POST['senha']) ? trim(filter_var($_POST['senha'],FILTER_SANITIZE_STRING),''): '';

        if (empty($email)) {
            $erros[] = "O campo de email é obrigatório.";
        } 
        // 3. Verifica se o formato do email é válido
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erros[] = "O formato do email fornecido é inválido.";
        }

        if (empty($senha)) {
            $erros[] = "O campo de senha é obrigatório.";
        } 
        // 3. Verifica as regras de complexidade da senha
        else {
            if (strlen($senha) < 8) {
                $erros[] = "A senha deve ter no mínimo 8 caracteres.";
            }
            if (!preg_match('/[A-Z]/', $senha)) {
                $erros[] = "A senha deve conter pelo menos uma letra maiúscula.";
            }
            if (!preg_match('/[a-z]/', $senha)) {
                $erros[] = "A senha deve conter pelo menos uma letra minúscula.";
            }
            if (!preg_match('/[0-9]/', $senha)) {
                $erros[] = "A senha deve conter pelo menos um número.";
            }
            // \W corresponde a qualquer caractere que não seja letra, número ou underscore
            if (!preg_match('/[\W]/', $senha)) {
                $erros[] = "A senha deve conter pelo menos um caractere especial (ex: !@#$%).";
            }
        }


        if (empty($erros)){
            include_once 'banco.php';

            $sql="SELECT * FROM usuario WHERE email = ?";
            
            $stmt = $connect->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $resultado = $stmt->get_result();

            if ($resultado && $resultado->num_rows > 0) {
        
                $erros[] = "E-mail já cadastrado.";
                processarErros($erros);
            } else {
                $senha_md5 = md5($senha);
                $sql_insert = "INSERT INTO usuario (email, senha) VALUES (?, ?)";
                $stmt_insert = $connect->prepare($sql_insert);
                $stmt_insert->bind_param("ss",  $email, $senha_md5);
                $stmt_insert->execute();
            }
        }else{
            processarErros($erros);
        }
        
    } else {
           
            $email = isset($_POST['email']) ? trim(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL),''): '';
            $senha = isset($_POST['senha']) ? trim(filter_var($_POST['senha'],FILTER_SANITIZE_STRING),''): '';

            if (empty($email) || empty($senha)) {
                header('Location: login.php?erro=campos_vazios');
                exit();
            }

            try {
                include_once 'banco.php';
                $sql="SELECT * FROM usuario WHERE email = ?";
                $stmt = $connect->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $resultado = $stmt->get_result();

                // 3. Verifica se o usuário foi encontrado
                if ($resultado && $resultado->num_rows > 0) {
                    $usuario = $resultado->fetch_assoc();
                    
                    $senha_md5 = md5($senha);

                    $senha_do_banco_md5 = $usuario['senha'];

                    if ($senha_md5 === $senha_do_banco_md5) {

                        session_start();
                        $_SESSION['logado'] = true;
                        header('Location: adicionarprodutos.php');

                    } else {
                        #header('Location: login.php?erro=3');
                        $erros[] = "Email ou senha incorretos.";
                        processarErros($erros);
                    }


                } else {
                    // Usuário com o email fornecido não foi encontrado
                    header('Location: login.php?erro=2'); // erro=1 para "usuário ou senha inválidos"
                    exit();
                }

                $stmt->close();
                $connect->close();

            } catch (mysqli_sql_exception $e) {
                die("Erro na consulta: " . $e->getMessage());
            }
    }
}
?>


