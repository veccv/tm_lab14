<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Rejestracja</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/checkout/">


    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <style type="text/css" class="init"></style>
    <link rel="stylesheet" type="text/css" href="twoj_css.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
            crossorigin="anonymous"></script>
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript"
            src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script type="text/javascript" src="twoj_js.js"></script>

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container" style="padding-bottom: 40px;">
    <main>
        <div class="py-5 text-center">
            <h2>Rejestracja</h2>
        </div>
        <div class="d-flex justify-content-center">
            <div class="col-md-7">
                <h4 class="mb-3">Dane konta</h4>
                <form method="POST" class="needs-validation" novalidate action="create_account.php"
                      enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="lastName" class="form-label">Nazwisko</label>
                            <input type="text" class="form-control" name="lastName" id="lastName" placeholder=""
                                   value=""
                                   required>
                        </div>

                        <div class="col-12">
                            <label for="username" class="form-label">Login</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text">@</span>
                                <input type="text" class="form-control" name="login" id="login"
                                       placeholder="login"
                                       required>
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                   placeholder="you@example.com"
                                   required>
                        </div>

                        <div class="col-12">
                            <label for="password" class="form-label">Hasło</label>
                            <input type="password" class="form-control" name="password" id="floatingPassword"
                                   placeholder="Password" required>
                        </div>

                        <div class="col-12">
                            <label for="avatar" class="form-label">Zdjęcie pracownika:</label>
                            <input type="file" name="fileToUpload" id="fileToUpload" required">
                        </div>

                        <hr class="my-4">
                        <button class="w-100 btn btn-primary btn-lg p-12" type="submit">Zarejestruj się</button>
                </form>
            </div>
        </div>
</div>
</main>
</div>


<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="form-validation.js"></script>
</body>
</html>
