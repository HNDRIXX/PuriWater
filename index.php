<?php 
    require_once 'login.php';
    require 'connection.php';
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='icon' href='image/water1.png'>
    <title>LOGIN</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap');

    * {
        margin: 0 auto;
        padding: 0 auto;
    }

	body{
	    /*background: #007bff;*/
        font-family: 'Montserrat', sans-serif;
	}

    .background-image{
        background: url(image/bg.jpg);
        background-position: center center;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        overflow-x: hidden;

        overflow-x: hidden;
        -webkit-filter: blur(5px);
        -moz-filter: blur(5px);
        -o-filter: blur(5px);
        -ms-filter: blur(5px);
        filter: blur(5px);
        
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: -1;
    }
    
    .logo img{
        width: 350px;
        height: auto;
        transform: translateX(-20%);
    }

    .panel{
        border-radius: 20px;
        background-color: #5896f33d;
        width:220px;
        position:absolute;
        left:0;
        right: 0;
        margin-left: auto;
        margin-right: auto;
        top: 50%;
        transform: translateY(-50%);
        padding: 30px;
        line-height: 20px;
        color: #fff;
        
        text-align: center;
        vertical-align: middle;
    }

    .panel p{
        font-weight: 100;
        font-size: 16px;
    }

    input{
        outline: none;
        border: none;
        padding: 7px;
        width: 70%;
        border-radius: 5px;
        margin-bottom: 7px;
    }

    .login-button{
        border-radius: 20px;
        padding: 15px;
        margin: 10px;
        width: 175px;
        font-family: 'Montserrat';
        background-color: #2541c0;
        color: #fff;
        border: none;
        outline: none;
    }

    .login-button:hover{
        background-color: #2037a0;
        transition: ease all .3s;
        cursor: pointer;
    }
</style>
<body>

    <div class='background-image'></div>
    
    <div class='panel'>
        <div class='logo'>
            <img src='image/water1.png' alt='' draggable='false'>
        </div>
        
        <div class='login'>
            <form action='index.php' method='post'>

                <?php if(count($errors) > 0): ?>
                    <?php foreach ($errors as $error): ?>
                        <?php echo $error;?>	
                    <?php endforeach ?>
                <?php endif ?>

                <input type='text' placeholder='Username' class='text' name='username' value='<?php echo $username; ?>'>
                <input type='password' placeholder='Password' class='text' name='password'>
                <input type='submit' name='btn-login' value='LOGIN' class='login-button'>
            </form>
        </div>
    </div>

</body>
</html>

