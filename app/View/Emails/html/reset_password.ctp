
<html>
    <body>
        <table><tr><td>Hi <?php echo $firstname ?></td></tr></table>
        <table><tr><td>Forgot your password?</td></tr></table>
        <table><tr><td><div>
                        <span><a href="http://<?php echo $_SERVER['HTTP_HOST']."/"."users/update/password/$token"; ?>">Reset Password</a></span>
                    </div></td></tr></table>
    </body>
</html>