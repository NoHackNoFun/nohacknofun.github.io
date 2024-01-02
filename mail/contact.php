<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "Carlos.Moreno27@alu.uclm.es"; // eMail donde se enviará el mensaje //
$subject = "$m_subject:  $name";
$body = "Has recibido un nuevo mensaje desde el formulario de contacto de tu sitio web.\n\n"."Aquí están los detalles:\n\nNombre: $name\n\n\nEmail: $email\n\nAsunto: $m_subject\n\nMensaje: $message";
$header = "De: $email";
$header .= "Responder a: $email";	

if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
