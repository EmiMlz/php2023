<?php
    include "Libro.php";
    $miLibro = new Libro(1,"El camino de los reyes",2010,"Nova","Brandom","Sanderson");
    /*$perteneceMiLibro = $miLibro->perteneceEditorial("Nova");
    if ($perteneceMiLibro){
        echo "Es la misma editorial\n";
    }
    else {
        echo "No pertenece a la misma editorial\n";
    }
    $aniosDesdeEdicionMiLibro = $miLibro->aniosDesdeEdicion();
    echo $aniosDesdeEdicionMiLibro."\n";
    $pArreglo = array ("El Camino de los reyes", "Palabras radiantes","Juramentada","Ritmos de guerra");
    print_r($pArreglo);
    echo "Ingrese un libro a buscar dentro de la coleccion de libros\n";
    $libroABuscar = trim(fgets(STDIN));
    $estaDentro = $miLibro->iguales($libroABuscar,$pArreglo);
    if ($estaDentro){
        echo "Esta dentro de la coleccion\n";
    }
    else {
        echo "No esta dentro de la coleccion\n";
    }*/
    $arregloConLibros = array(
        array ('ISBN' =>"101",'titulo'=>"El nombre del viento",'anio de edicion'=>"2007",'editorial'=>"Penguin Random House",'nombre'=>"Patrick",'apellido'=>"Rothfuss"),
        array ('ISBN' =>"102",'titulo'=>"La espada de Shannara",'anio de edicion'=>"1977",'editorial'=>"Penguin Random House",'nombre'=>"Terry",'apellido'=>"Brooks"),
        array ('ISBN' =>"103",'titulo'=>"El leon, la bruja y el ropero",'anio de edicion'=>"1950",'editorial'=>"Penguin Random House",'nombre'=>"Lewis",'apellido'=>"C.S."),
        array ('ISBN' =>"104",'titulo'=>"La torre oscura I: El pistolero",'anio de edicion'=>"1982",'editorial'=>"Penguin Random House",'nombre'=>"Stephen",'apellido'=>"King"),
        array ('ISBN' =>"105",'titulo'=>"El libro del cementerio",'anio de edicion'=>"2008",'editorial'=>"Penguin Random House",'nombre'=>"Neil",'apellido'=>"Gaiman"),
        array ('ISBN' =>"106",'titulo'=>"Juego de Tronos",'anio de edicion'=>"1996",'editorial'=>"Planeta",'nombre'=>"George",'apellido'=>"Martin"),
        array ('ISBN' =>"107",'titulo'=>"Elantris",'anio de edicion'=>"2005",'editorial'=>"Planeta",'nombre'=>"Brandom",'apellido'=>"Sanderson")
    );
    echo "Ingrese la editorial a buscar ";
    $pedidoEditorial = trim(fgets(STDIN));
    $librosPorMismaEditorial = $miLibro->libroDeEditoriales($arregloConLibros,$pedidoEditorial);
    print_r($librosPorMismaEditorial);
?>