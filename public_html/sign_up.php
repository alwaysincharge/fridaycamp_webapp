

<?php  include_once('../includes/all_classes_and_functions.php');  ?>

<?php


require 'phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->ClearAddresses();

$mail->addAddress('junenewjoint@gmail.com', 'Atsu Davoh'); 


$mail->setFrom('atsunewjoint@tsutsus.com', 'Diamond App');

$foo = 'http://www.tsutsus.com/forum.php';
$mail->Subject = 'Boys know how.';
$mail->AddEmbeddedImage('male.png', 'Kartka');
$mail->Body    = '<p>allen <img src="cid:Kartka"/></p>';

$mail->addAttachment('male.png'); 

$mail->isHTML(true);   








 $user_input = '';

 $password_input = '';

 $email_input = '';



if(request_is_post()) {
if(csrf_token_is_valid()) {  
if(request_is_same_domain()) {
if(is_session_valid())    {
    
    
if (isset($_POST['submit']))  {
    
    

 $user_input = $_POST['username'];
    
 $password_input = password_hash(test_input($_POST['password']), PASSWORD_DEFAULT);
    
 $email_input = $_POST['email']; 
    
    
    
    
    
 $space = ' ';
    
 $equal_sign = '=';
    
 $single_quote = "'";  
    
    

    
 does_it_contain($user_input, $space, $equal_sign, $single_quote);
    
 does_it_contain($_POST['password'], $space, $equal_sign, $single_quote);
    
 does_it_contain($_POST['passwordagain'], $space, $equal_sign, $single_quote);
    
    
    
    
  
 check_emptiness($user_input, 'home');
    
 check_emptiness($_POST['password'], 'home');
    
 check_emptiness($_POST['passwordagain'], 'home');
    
    
    
    
 check_lenght($user_input, 7, 30);
    
 check_lenght($_POST['password'], 7, 30);    
    
 check_lenght($email_input, 5, 30); 
    
    
    
    
 if (!filter_var($email_input, FILTER_VALIDATE_EMAIL) === false) {
 } else {
       alert_note('The email you entered is invalid. Please try again.');
     redirect_to('index.php');
 }
    
    
    
    
 are_both_passwords_equal('home');
     
 $founduser = $user->does_user_exist($user_input);
    
    
 while ($founduser->fetch()) {
     $user->username;
 }
    
    
 $founduser->num_rows;  
    
    
    
echo "Session ID: " . session_id() . "<br />";    
    
    
    
 if($founduser->num_rows == 0) {
    
       $user->create_user($user_input, $password_input, $email_input);
       $last_id = $database->connection->insert_id;
       after_successful_login();
       $_SESSION['admin_id'] = $last_id;
       $mail->send();
       $mail->ClearAddresses();
       echo $_SESSION['admin_id'];
     
  
 } else {
    
     alert_note('The username you entered already exists. Please try again.');
     redirect_to('home');
 }
    

}
    
} else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot.');
     redirect_to('home'); 
}    

}
    else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot.');
     redirect_to('home'); 
}
    
}

 else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot.');
     redirect_to('home'); 
}
    }

 else  {
    
    alert_note('Please stop trying to hack the site. Thanks a lot.');
     redirect_to('home'); 
}

?>