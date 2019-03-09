
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script>
        function validate(){

            var a = document.getElementById("pass").value;
            var b = document.getElementById("pass_confirm").value;
            if (a!=b) {
                alert("Passwords do no match");
                return false;
            }
        }
    </script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 ">
            <h1>Register</h1>
            <form onsubmit="return validate();" action="newuser.php" method="post" >
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" class="form-control" placeholder="Your email">
                </div>

                <div class="form-group">
                    <label for="pass">Password</label>
                    <input id="pass" type="password" name="password" class="form-control" placeholder="Your password">
                </div>
                <div class="form-group">
                    <label for="pass_confirm">Password</label>
                    <input id="pass_confirm" type="password" name="password_confirm" class="form-control" placeholder="Confirm your password">
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit" name="sbm_data">Register</button>
                    <a onclick="javascript:history.back(); return false;" class="btn btn-link">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>