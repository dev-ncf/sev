<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Universidade Rovuma</title>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap'>
    <link rel="stylesheet" href="{{ asset('css/login/style.css') }}">

</head>

<body>
    <!-- partial:index.partial.html -->
    <form class="screen-1" action="{{ route('log.in') }}" method="POST">
        @csrf

        <img class="logo" src="{{ asset('images/logo/logour.png') }}" width="100" height="100"
            style="margin-top:50px;align-self: center">
        <div style="display: flex; flex-direction: column; align-items: center">
            <h3 style="align-self: center">Seja bem vindo a Secretaria Virtual!</h3>

            @if ($errors->all())
                @foreach ($errors->all() as $error)
                    <p
                        style="color:red; background-color: rgba(255, 0, 0, 0.172); border-radius: 10px;margin: 0 !important; padding:0 10px; {{ $error ? 'display:flex;' : 'display:none' }}">
                        {{ $error }}</p>
                @endforeach

            @endif
        </div>
        <div class="email">
            <label for="email">Email </label>
            <div class="sec-2">
                <ion-icon name="mail-outline"></ion-icon>
                <input type="email" name="email" placeholder="Username@gmail.com" required autofocus />
            </div>
        </div>
        <div class="password">
            <label for="password">Senha</label>
            <div class="sec-2">
                <ion-icon name="lock-closed-outline"></ion-icon>
                <input class="pas" type="password" name="password" id="pas" placeholder="********" required />
                <ion-icon class="show-hide" name="eye-outline" onclick="show('pas')"></ion-icon>
            </div>
        </div>
        <button class="login" type="submit">Login </button>

        <div class="footer">
            <div>
                Não tens conta?<a href="{{ route('registrar-se') }}" style="text-decoration: none;font-weight: bolder">
                    Criar conta</a>
            </div>
            <a href="{{ route('recuperar-senha') }}" style="text-decoration: none;font-weight: bolder">
                    Esqueceu Senha? </a>
        </div>
    </form>
    <!-- partial -->

</body>

<script>
    const show = (id) => {
        let doc = document.getElementById(id);
        if (doc.type === 'password') {
            doc.type = 'text';
        } else {
            doc.type = 'password';
        }
    }
</script>

</html>
