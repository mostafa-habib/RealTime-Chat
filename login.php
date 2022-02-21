<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location:users.php");
    }
?>
<?php
       include_once "header.php";

?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header>Realtime Chat App</header>
            <form action="#">
                <div class="error-txt"></div>

                    <div class="field input">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="Enter your email">
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input id ="password" type="password" name="password" placeholder="Enter your password">
                        <i id ="eye-icon" class="fas fa-eye"></i>
                    </div>
                    <div class="field btn">
                        <input type="submit" value="Continue to Chat">
                    </div>
    
            </form>
            <div class="link">
                Not yet signed up? <a href="index.php">Signup now</a>
            </div>

        </section>
    </div>
    <script src="./jsFile/pass-show-hide.js"></script>
    <script src="./jsFile/login.js"></script>

</body>
</html>