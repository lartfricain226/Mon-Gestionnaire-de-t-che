<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Gestionnaire des tâches</title>
</head>
<body>
    <div class="d-flex align-items-center justify-content-center vh-100 w-100">
        <div class="w-50">
            <h4 class="text-center">Connexion</h4>
            @session('error')
                <div class="alert alert-danger mt-2">{{ session('error') }}</div>
            @endsession
            <form action="{{ route('store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                    @error('email')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password">
                    @error('password')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>    
                    @enderror
                </div>
                <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Se connecter</button>
                <div class="d-flex">
                <p>Vous n'avez pas de compte ?</p>
                <a href="{{ route('register') }}" class="ms-2 btn btn-primary">Ouvrir un compte</a>
                </div>
                </div>
            </form>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
</script>
</html>
