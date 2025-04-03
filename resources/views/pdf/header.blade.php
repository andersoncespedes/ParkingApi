<?php
use \Carbon\Carbon;
?>
<header>

    <div style="width: 100%; text-align:center;  text-decoration:none; font-size: 14px; ">
        <b>
            REPUBLICA BOLIVARIANA DE VENEZUELA<br>
            ALCALDIA DEL MUNICIPIO ANGOSTURA DEL ORINOCO<br>
            DIRECCION DE ATENCION CIUDADANA<br>
        </b>
    </div>
    <br>
    <br>
    <strong style="float: right; font-size:14px">Ciudad Bolivar, {{ Carbon::parse(date('d-M-Y'))->locale('es')->format('d \d\e F \d\e  Y')  }}</strong>
</header>
