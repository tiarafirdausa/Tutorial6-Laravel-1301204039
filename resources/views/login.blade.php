<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    </head>
    <body style="width:95%">
        <div class="row justify-content-center" style="margin-top:13%">
            <div class="col-3 border">
                {{ session('msg') }}
                <form style="margin:20px" method="POST" action="/auth">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="em" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="pwd" class="form-control" />
                    </div>
                    <div style="text-align:center">
                        <button class="btn btn-success">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
