<?php require './geogram.php';?>

<?php if(isset($_SESSION['access_token'])): ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Facebook Login</title>
</head>
<body>
    you can logout from this link -> 
    <a href="logout.php">Logout</a>
<?php else: ?>
    <a href="<?php echo $login_url; ?>">Facebook login</a>
</body>
</html>

<?php endif; ?>