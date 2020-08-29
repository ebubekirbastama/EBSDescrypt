<!DOCTYPE html>

<html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

<?php 

//Coding By&Ebubekir Bastama 
function encrypt($plainText, $secret_key) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', 'my_simple_secret_iv' ), 0, 16 );
    $output = base64_encode( openssl_encrypt( $plainText, $encrypt_method, $key, 0, $iv ) );
    return $output;
}

function decrypt($cipherText, $secret_key) {
    $output = false;
    $encrypt_method = "AES-256-CBC";
    $key = hash( 'sha256', $secret_key );
    $iv = substr( hash( 'sha256', 'my_simple_secret_iv' ), 0, 16 );
    $output = openssl_decrypt( base64_decode( $cipherText ), $encrypt_method, $key, 0, $iv );
    return $output;
}
$ct =  "QXhUQzVLYjJkU2dZOEhkbHQ3dXZ4NndoWlh1Y0hyeUpsVEhVYTFxT3lWbz0=";
for ($x = 0; $x <= 10000; $x++) {

    $pt =  decrypt($ct, $x);
        
    if($pt !="")
    {
     echo "$x  $pt <br>";

    }

}

?>

</body>
</html>
