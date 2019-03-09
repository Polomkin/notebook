<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div _ngcontent-c1="" class="container-fluid">
<a _ngcontent-c1="" class="navbar-brand" href="/test">Back</a>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-6 ">
            <h1>Login</h1>
            <form action="loginuser.php" method="post" >
                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" class="form-control" placeholder="Your email">
                </div>

                <div class="form-group">
                    <label for="pass">Password</label>
                    <input id="pass" type="password" name="password" class="form-control" placeholder="Your password">
                </div>

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Login</button>
                    <a href="register.php" class="btn btn-link">Register</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>