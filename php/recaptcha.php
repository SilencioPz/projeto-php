<?php
//Chave secreta do Recaptcha
$recaptchaResponse = isset($_POST['g-recaptcha-response']) ? $_POST['g-recaptcha-response'] : '';
$secretKey = "6LdQV8gpAAAAANCrmM3KmbBZR1VSqzMJYrkTITfk";

$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array(
    'secret' => $secretKey,
    'response' => $recaptchaResponse
);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$recaptchaResult = json_decode($result);

if ($recaptchaResult->success) {
    //Se tudo certo, continua o site
} else {
    // Se não foi checkado, há um erro
}
?>

<html>

<head>
    <title>reCAPTCHA demo: Explicit render after an onload callback</title>
    <script type="text/javascript">
        var onloadCallback = function() {
            grecaptcha.render('html_element', {
                'sitekey': '6LdQV8gpAAAAAAnjtO5001rbinAmmk0OV2LF-n6k'
            });
        };
    </script>
</head>

<body>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
    </script>
</body>

</html>