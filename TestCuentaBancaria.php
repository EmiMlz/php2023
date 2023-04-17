<?php
    include "cuentaBancaria.php";
    $miCuentaBancaria = new CuentaBancaria(1,44041629,0.0,60.0);
    echo $miCuentaBancaria . "\n";
    echo "Realice un deposito\n";
    $miCuentaBancaria->depositar(trim(fgets(STDIN)));
    echo $miCuentaBancaria . "\n";
    $miCuentaBancaria->actualizarSolo();
    echo $miCuentaBancaria . "\n";
    echo "Realice un retiro\n";
    $miCuentaBancaria->retirar(trim(fgets(STDIN)));
    echo $miCuentaBancaria . "\n";
?>