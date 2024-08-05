<?php echo $id ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?php routeTo('user.delete', ['id' => $id]); ?>" method="post">
    <?php method('DELETE'); ?>
    <input type="submit" name="login" value="Sign In" class="btn btn-lg btn-primary btn-block">
</form>
</body>
</html>
