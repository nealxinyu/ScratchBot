<?php include 'header.php';?>

<div class="container">
    <div class="row">
        <div style="width: 30%; margin: 25px auto;">
            <h1>Sign up</h1>
            <form action="/register" method="POST">
                <div class="form-group">
                    <input class="form-control" type="text" name="username" placeholder="username">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="password">
                </div>
                <div class="form-group">
                    <button class="btn btn-lg btn-primary btn-block">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php';?>
