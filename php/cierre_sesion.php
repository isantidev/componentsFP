<?php
session_start();
session_unset();
session_destroy();
header("Location: ../frontend/iniciar_sesion_form.php");
exit();
