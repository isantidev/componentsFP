<head>
    <link rel="stylesheet" href="../styles/inicio_sesion.css">
</head>
<div class="ingreso-wrapper">
    <img id="logo" src="/images/logo-stocksoft.png" alt="" />
    <form
        action="../php/inicio_sesion.php"
        class="ingreso-form"
        method="POST">
        <div class="ingreso-error">
            <p>Correo del usuario o Contraseña incorrectos.</p>
        </div>

        <div class="ingreso-input">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="currentColor">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                    d="M12 2a5 5 0 1 1 -5 5l.005 -.217a5 5 0 0 1 4.995 -4.783z" />
                <path
                    d="M14 14a5 5 0 0 1 5 5v1a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-1a5 5 0 0 1 5 -5h4z" />
            </svg>
            <input
                name="correo-usuario"
                type="email"
                placeholder="Correo del usuario"
                required />
        </div>
        <div class="ingreso-input">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="currentColor"
                class="icon icon-tabler icons-tabler-filled icon-tabler-lock">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path
                    d="M12 2a5 5 0 0 1 5 5v3a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-10a3 3 0 0 1 -3 -3v-6a3 3 0 0 1 3 -3v-3a5 5 0 0 1 5 -5m0 12a2 2 0 0 0 -1.995 1.85l-.005 .15a2 2 0 1 0 2 -2m0 -10a3 3 0 0 0 -3 3v3h6v-3a3 3 0 0 0 -3 -3" />
            </svg>
            <input
                name="clave-usuario"
                type="password"
                placeholder="Contraseña"
                required />
        </div>

        <div class="btn-envio">
            <button name="btnIngresar" type="submit" value="Inicio Sesion">
                Iniciar Sesión
            </button>
        </div>
    </form>
</div>