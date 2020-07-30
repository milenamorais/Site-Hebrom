
<?php
/*

// Verifique se há campos vazios

    if(empty($_POST['nome'])      ||
       empty($_POST['email'])     ||
       empty($_POST['subject'])     ||
       empty($_POST['message'])   ||
       !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
       {
       echo "Nenhum argumento fornecido!";
       header('Location: teste.php?erro=true');
       }


        $nome = strip_tags(htmlspecialchars($_POST['nome']));
        $email = strip_tags(htmlspecialchars($_POST['email']));
        $subject = strip_tags(htmlspecialchars($_POST['subject']));
        $message = strip_tags(htmlspecialchars($_POST['message']));


        // Crie o email e envie a mensagem
        $para = 'contato@ministeriohebrommaranguape.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a messagepor
        $email_subject = "Pedido de contato por ministeriohebrommaranguape.com:  $nome";

        $email_body = "\n\nOlá Pr. Paulo Sérgio, acaba de chegar um novo pedido de contato vindo de seu site. Visualize abaixo. \n\n"."Informações:\n\nNome: $nome\n\nEmail: $email\n\nSubject: $subject\n\nMensagem:\n$message";

        $headers = "From: contato@ministeriohebrommaranguape.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
        //$headers .= "Entre em contato com o cliente através do email: $email";
        mail($para,$email_subject,$email_body,$headers);
    
        header('Location: teste.php?enviado=true'); 




*/
?>




<?php
// Recebendo dados do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['mensagem'];
//$subject = "Mensagem do Site";

$headers = "Content-Type: text/html; charset=utf-8\r\n";
$headers .= "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";

// Dados que serão enviados
$corpo = "Formulário da página de contato <br>";
$corpo .= "Nome: " . $nome . " <br>";
$corpo .= "Email: " . $email . " <br>";
$corpo .= "Assunto: " . $assunto . " <br>";
$corpo .= "Mensagem: " . $mensagem . " <br>";

// Email que receberá a mensagem 
$email_to = 'contato@ministeriohebrommaranguape.com';

// Enviando email
$status = mail($email_to, mb_encode_mimeheader($assunto, "utf-8"), $corpo, $headers);

if ($status):
  // Enviada com sucesso
  header('location:contato.php?status=sucesso');
else:
  // Se der erro
  header('location:contato.php?status=erro');
endif;
?>




