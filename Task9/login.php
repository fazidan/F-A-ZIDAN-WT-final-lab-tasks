<?php include 'Controller/loginC1.php'; ?>

<html>

<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="login.css">

</head>

<body>
    <div>
        <div class="container">
            <div class="header">
                <h3><b>Login</b></h3>
            </div>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="form" id="form" onsubmit="return validate()">
                <div class="form-control" id="form-control">
                    <label>Username:</label>
                    <input type="text" id="name" name="name" placeholder="Enter your username" value="<?php if (isset($_COOKIE["name"])) {
                                                                                                            echo $_COOKIE["name"];
                                                                                                        } ?>">
                    <small></small>
                </div>
                <div class="form-control2" id="form-control2">
                    <label>Password:</label>
                    <input type="password" id="pass" name="pass" placeholder="Enter your password" value="<?php if (isset($_COOKIE["name"])) {
                                                                                                                echo $_COOKIE["pass"];
                                                                                                            } ?>">
                    <small></small>
                </div>
                <div class="form-control3" id="form-control3">
                    <input type="checkbox" id="remember" name="remember" value="remember">Remember me
                    <small></small>
                </div>
                <br>
                <input class="buttonMain" style="display:block; margin: 0 auto;" type="submit" name="logClick" value="Login">
            </form>
        </div>

        <div>
            <br>
            <form class="form2" id="form2" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <input class="buttonMain" style="display:block; margin: 0 auto;" type="submit" name="regClick" value="Click for registration">
            </form>
        </div>

    </div>
    <script>
        const form = document.getElementById('form');
        const username = document.getElementById('name');
        const password = document.getElementById('pass');

        function validate() {
            if (username.value == "" && password.value == "") {
                setError(username, 'Username is empty');
                setError2(password, 'Password is empty');
                return false;
            } else if (username.value == "") {
                setError(username, 'Username is empty');
                return false;
            } else if (password.value == "") {
                setError2(password, 'Password is empty');
                return false;
            } else {
                return true;
            }
        }

        function setError(input, msg) {
            const x = document.getElementById('form-control');
            const smalltag = x.querySelector('small');
            smalltag.innerHTML = msg;
            smalltag.style.visibility = "visible";
            smalltag.style.color = "red";
            input.style.borderColor = "red";
        }

        function setError2(input, msg) {
            const x = document.getElementById('form-control2');
            const smalltag = x.querySelector('small');
            smalltag.innerHTML = msg;
            smalltag.style.visibility = "visible";
            smalltag.style.color = "red";
            input.style.borderColor = "red";
        }
    </script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</body>

</html>




<?php include 'Controller/loginC2.php'; ?>