<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "news");
    echo $_SESSION['u']='admin';
    
   
    if(isset($_POST['login'])){
        $taikhoan=$_POST['username-login'];
        $matkhau=$_POST['password-login'];
        $sql= "SELECT * FROM users WHERE userName = '$taikhoan' AND password = '$matkhau' ";
        $row = mysqli_query($conn,$sql);
        $rows = mysqli_fetch_array($row);
        echo $rows['userName'];
        $count = mysqli_num_rows($row);
        if($count==1){
            if ($taikhoan=="DUY")
				{
                    $_SESSION['userID'] = $count['userID'];
                    echo  $_SESSION['userID'];
				    header('location:admin.php');
				}
				else{
					{$_SESSION['login']=$taikhoan;
				    header('location:index.php');
					}
                }
	}	
        else{
            echo 'password or username is wrong';
        }
    }
    if(isset($_POST['signup'])){
        $taikhoan_dky = $_POST['username-signup'];
        $matkhau_dky=$_POST['password-signup'];
        $email_dky = $_POST['email-signup'];
        $sql_signup = mysqli_query($conn,"INSERT INTO users(userName,password,email) 
        VALUES('$taikhoan_dky','$matkhau_dky','$email_dky')");
        if($sql_signup){
            echo "<p>Đăng ký thành công</p>";
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css.css" type="text/css">
    <link rel=stylesheet type=text/css href=https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css>
</head>

<body>
    <h2>Đăng nhập/Đăng ký</h2>
    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="login.php" method="POST" enctype="multipart/form-data">
                <h1>Tạo tài khoản</h1>
                <input type="text" placeholder="Tên của bạn" name="username-signup"/>
                <input type="text" placeholder="Email" name="email-signup">
                <input type="password" placeholder="Mật khẩu" name="password-signup" />
               <input type="submit" name="signup" value='Đăng ký'>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form  action="login.php" method="POST" enctype="multipart/form-data">
                <h1>Đăng nhập</h1>
                <input type="text" placeholder="Email" name="username-login" />
                <input type="password" placeholder="Mật khẩu" name="password-login" />
                <a href="#">Quên mật khẩu?</a>
                <input type="submit" name="login" value='Đăng nhập'>
                
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Chào bạn!</h1>
                    <p>Hãy nhấn vào đây để đăng nhập</p>
                    <button class="ghost" id="signIn">Đăng nhập</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Chào bạn!</h1>
                    <p>Hãy nhấn vào đây để đăng ký</p>
                    <button class="ghost" id="signUp">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add('right-panel-active');
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove('right-panel-active');
        });
    </script>
</body>

</html>