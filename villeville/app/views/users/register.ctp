
<?php 
      
    /*
     * This code asks the user to authenticate our application with facebook,
     * which allows us to get their facebook user id and start our application's
     * set up process.
     */

     App::import('Vendor', 'facebook');

     $app_id = "181767878519813";
     $canvas_page = "http://apps.facebook.com/villeville/users/register";

     $auth_url = "http://www.facebook.com/dialog/oauth?client_id=" 
            . $app_id . "&redirect_uri=" . $canvas_page;

     $signed_request = $_REQUEST["signed_request"];

     list($encoded_sig, $payload) = explode('.', $signed_request, 2); 

     $data = json_decode(base64_decode(strtr($payload, '-_', '+/')), true);

     if (empty($data["user_id"])) {
            echo("<script> top.location.href='" . $auth_url . "'</script>");
	    exit(0);
     }
?>

<form action="http://www.jayantkrish.com/villeville/users/register" method="post">
<input type="hidden" name="facebook_id" value="<? echo $data["user_id"]; ?>" />
<input type="submit" name="submit" value="register" />
</form>
