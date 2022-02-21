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
        <section class="form signUp">
            <header>Realtime Chat App</header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt"></div>
                <div class="name-details">
                    <div class="field input">
                        <label>Frist Name</label>
                        <input type="text" name="fristName" placeholder="Frist name" required>
                    </div>
                    <div class="field input">
                        <label>Last Name</label>
                        <input type="text" name="lastName" placeholder="Last name" required>
                    </div>
                </div>
                    <div class="field input">
                        <label>Email Address</label>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="field input">
                        <label>Password</label>
                        <input id="password" type="password" name="password" placeholder="Enter new password" required>
                        <i id ="eye-icon" class="fas fa-eye"></i>
                    </div>
                    <div class="field image">
                        <label>Select image</label>
                        <input type="file" name="image" placeholder="Choice File" required>
                    </div>
                    <div class="field btn">
                        <input type="submit" value="Continue to Chat">
                    </div>
            </form>
            <div class="link">
                Already singned up? <a href="login.php">Login now</a>
            </div>

        </section>
    </div>
    
    <script src="./jsFile/pass-show-hide.js"></script>
    <script src="./jsFile/signUp.js"></script>

    
</body>
</html>