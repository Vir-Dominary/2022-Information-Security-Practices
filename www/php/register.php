<?php
    include('connect.php'); //连接数据库
    header("Content-type:text/html;charset=utf-8");
    //接收注册界面传来的数据
    $username=$_POST['username'];
    $password=$_POST['password'];
    $cpassword=$_POST['confirmpassword'];
    $check=mysqli_query($con,"SELECT * from user where username='$username'"); 
    if (!$check) {
        printf("数据库连接异常！\n", mysqli_error($con));
        exit();
        }
    //确认密码
    if($username==NULL||$password==NULL||$cpassword==NULL){
        alert('用户名密码不可为空，请重新输入','../register.html');
    }
    else if($password!=$cpassword){
        alert('两次输入密码不一致，请重新输入','../register.html');
    }
    else if(mysqli_num_rows($check)>0){
        alert('用户名已存在，请重新输入','../register.html');
    }
    else{
#        $mx="SELECT MAX(uid) from user;";
#        $result=mysqli_query($con,$mx);
#        echo "$result";
        #$uid=$result+1;
        $sql="INSERT into user(username,password) values('$username','$password')";
        if(mysqli_query($con,$sql)){
            alert('注册成功，请重新登录','../index.html');
        }
    }
?>