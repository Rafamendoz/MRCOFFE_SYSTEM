<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require("vendor/autoload.php");

function emailExiste($email){
    global $mysqli;

    $stmt = $mysqli->prepare("select correo from usuarios Where correo =? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;
    $stmt->close();

    if($num >0){
        return true;
    }else{
        return false;
    }



}

function isEmail($email){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }else{
        return false;
    }
}

function enviarEmail($email,$nombre, $asunto, $cuerpo){
    $mail = new PHPMailer(true);

    try {
      
        #$mail->SMTPDebug=SMTP::DEBUG_SERVER;#
        $mail->isSMTP();
        $mail->Host = 'smtp.titan.email';
        $mail->SMTPAuth = true;
        $mail->Username = 'TI@fhope.net';
        $mail->Password = 'Tifhope2022$$';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; 


        $mail->setFrom('TI@fhope.net', 'Recuperar');
        $mail->addAddress($email, 'Usuario');
        $mail->isHTML(true);
        $mail->Subject= $asunto;
        $mail->Body=$cuerpo;
        $mail->send();
        
        return true;

    } catch (Exception $th) {
        echo 'Mensaje'.$mail->ErrorInfo;
        return false;
        
    }

   
}


function getValor($campo, $campoWhere, $valor){
    global $mysqli;
    $stmt = $mysqli->prepare("Select $campo From usuarios where $campoWhere = ? Limit 1");
    $stmt->bind_param("s", $valor);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;

    if($num > 0 ){
        $stmt->bind_result($_campo);
        $stmt->fetch();
        return $_campo;
    }



}


function generaTokenPass($user_id){
    global $mysqli;
    $token = generateToken();
    $stmt =$mysqli->prepare("Update usuarios SET token_password=?, password_request=1 where correo=?");
    $stmt->bind_param("ss", $token, $user_id);
    $stmt->execute();
    $stmt->close();


    return $token;

}


function generateToken(){

  return $tokenG = uniqid();

}


function verificaTokenPass($user_id, $token){
    global $mysqli;
    $stmt = $mysqli->prepare("Select activacion From usuarios Where correo = ? AND token_password = ? AND password_request = 1 LIMIT 1");
    $stmt->bind_param("is", $user_id, $token);
    $stmt->execute();
    $stmt->store_result();
    $num = $stmt->num_rows;
    if($num > 0){
        $stmt ->bind_result($activacion);
        $stmt ->fetch();

        if($activacion == 1){
            return true;
        }else{
            return false;
        }

    }

}


function cambiaPassword($password, $user_id, $token){
    global $mysqli;
    $stmt = $mysqli -> prepare("UPDATE usuarios set password = ?, token_password ='', password_request=0 where correo = ?  and token_password = ?  " );
    $stmt->bind_param('sis', $password, $user_id, $token);
    if($stmt->execute()){
        return true;

    }else{
        return false;
    }

}







?>