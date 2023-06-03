<?php
require_once (" ../../bd.php ");
si ( $ _POST ) {
    /* echo "<pre>";
        imprimir_r($_POST);
        imprimir_r($_ARCHIVOS);
        eco "</pre>"; */
    // Recolectar los datos del metodo POST
    $ primernombre = (isset( $ _POST [" primernombre "]) ? $ _POST [" primernombre "] : "");
    $ segundonombre = (isset( $ _POST [" segundonombre "]) ? $ _POST [" segundonombre "] : "");
    $ primerapellido = (isset( $ _POST [" primerapellido "]) ? $ _POST [" primerapellido "] : "");
    $ segundoapellido = (isset( $ _POST [" segundoapellido "]) ? $ _POST [" segundoapellido "] : "");

    $ foto = (isset( $ _FILES [" foto "][ 'nombre' ]) ? $ _FILES [" foto "][ 'nombre' ] : "");
    $ cv = (isset( $ _FILES [" cv "][ 'nombre' ]) ? $ _FILES [" cv "][ 'nombre' ] : "");

    $ idpuesto = (isset( $ _POST [" idpuesto "]) ? $ _POST [" idpuesto "] : "");
    $ fechadeingreso = (isset( $ _POST [" fechadeingreso "]) ? $ _POST [" fechadeingreso "] : "");
    // Preparar la inserción de los datos
    $ sentencia = $ conexión -> preparar (" INSERTAR EN `tbl_empleados` (`id`, `primernombre`, `segundonombre`, `primerapellido`, `segundoapellido`, `foto`, `cv`, `idpuesto`, `fechadeingreso `)
    VALORES (NULL, :primernombre, :segundonombre, :primerapellido, :segundoapellido, :foto, :cv, :idpuesto, :fechadeingreso)" );
    // Asignamos los valores que vienen del metodo POST a la consulta
    $ sentencia -> bindValue (" :primernombre ", $ primernombre );
    $ sentencia -> bindValue (" :segundonombre ", $ segundonombre );
    $ sentencia -> bindValue (" :primerapellido ", $ primerapellido );
    $ sentencia -> bindValue (" :segundoapellido ", $ segundoapellido );

    $ fecha_ = nueva  fecha y hora ();
    $ nombreArchivo_foto =( $ foto != '' )? $ fecha_ -> getTimestamp (). " _ ". $ _ARCHIVOS [" foto "][ 'nombre' ] : "";
    $ tmp_foto = $ _FILES [" foto "][ 'tmp_name' ];
    si ( $ tmp_foto != '' ) {
        move_uploaded_file( $ tmp_foto , " ./img/ " . $ nombreArchivo_foto );
    }
    $ sentencia -> bindValue (" :foto ", $ nombreArchivo_foto );

    $ nombreArchivo_cv =( $ cv != '' )? $ fecha_ -> getTimestamp (). " _ ". $ _ARCHIVOS [" cv "][ 'nombre' ] : "";
    $ tmp_cv = $ _ARCHIVOS [" cv "][ 'tmp_name' ];
    si ( $ tmp_cv != '' ) {
        mover_archivo_subido( $ tmp_cv , " ./cv/ " . $ nombreArchivo_cv );
    }
    $ sentencia -> bindValue (" :cv ", $ nombreArchivo_cv );

    $ sentencia -> bindValue (" :idpuesto ", $ idpuesto );
    $ sentencia -> bindValue (" :fechadeingreso ", $ fechadeingreso );

    $ sentencia -> ejecutar ();
    encabezado (" Ubicación: index.php ");
}
$ sentencia = $ conexion -> preparar (" SELECT * FROM `tbl_puestos` ");
$ sentencia -> ejecutar ();
$ lista_tbl_puestos = $ sentencia -> fetchAll ( PDO :: FETCH_ASSOC );
require_once (" ../../templates/header.php ") ?>

< div  clase =" tarjeta " >
    < div  clase =" encabezado de tarjeta " >
        datos del empleado
    </div> _ _
    < div  class =" cuerpo de la tarjeta " >
        < acción de formulario  ="" método =" publicar " enctype =" multipart/form-data " >
            < clase div  =" mb-3 " >
                < etiqueta  para =" primernombre " class =" formulario-etiqueta " > Primer Nombre </ etiqueta >
                < tipo de entrada  =" texto " clase =" formulario-control " nombre =" primernombre " id =" primernombre " aria-descrita por =" helpId "
                    marcador de posición ="" >

                < etiqueta  para =" segundonombre " class =" formulario-etiqueta " > Segundo Nombre </ etiqueta >
                < tipo de entrada  =" texto " clase =" formulario-control " nombre =" segundonombre " id =" segundonombre "
                    aria-descrito por =" ID de ayuda " marcador de posición ="" >

                < label  for =" primerapellido " class =" form-label " > Primer Apellido </ label >
                < tipo de entrada  =" texto " clase =" form-control " nombre =" primerapellido " id =" primerapellido "
                    aria-descrito por =" ID de ayuda " marcador de posición ="" >

                < label  for =" segundoapellido " class =" form-label " > Segundo Apellido </ label >
                < tipo de entrada  =" texto " clase =" formulario-control " nombre =" segundoapellido " id =" segundoapellido "
                    aria-descrito por =" ID de ayuda " marcador de posición ="" >

                < etiqueta  para =" foto " clase =" formulario-etiqueta " > Foto </ etiqueta >
                < tipo de entrada  =" archivo " clase =" formulario-control " nombre =" foto " id = " foto " aria-describedby =" helpId " placeholder ="" >

                < etiqueta  para =" cv " clase =" formulario-etiqueta " > CV </ etiqueta >
                < tipo de entrada  =" archivo " clase =" formulario-control " nombre = " cv " id =" cv " aria-describedby =" helpId " placeholder ="" >

                < clase div  =" mb-3 " >
                    < etiqueta  para =" idpuesto " class =" formulario-etiqueta " > Puesto </ etiqueta >
                    < seleccionar  clase =" formulario-seleccionar formulario-seleccionar-lg " nombre =" idpuesto " id =" idpuesto " >
                        < opción  seleccionada > Seleccione uno </ opción >
                        <?php  foreach ( $ lista_tbl_puestos  as  $ registro ) { ?>
                            < option  value =" <?php  echo  $ registro [ 'id' ] ?> " > <?php  echo  $ registro [ 'nombredelpuesto' ] ?>
                            </ opción >
                        <?php } ?>
                    </ seleccionar >
                </div> _ _

                < label  for =" fechadeingreso " class =" form-label " > Fecha de ingreso </ label >
                < tipo de entrada  =" fecha " clase =" formulario-control " nombre =" fechadeingreso " id =" fechadeingreso "
                    aria-descrito por =" ID de ayuda " marcador de posición ="" >
            </div> _ _

            < button  type =" enviar " name ="" id ="" class =" btn btn-primary " role =" button " > Agregar registro </ button >
            < a  name ="" id ="" class =" btn btn-danger " href =" ./index.php " role =" button " > Cancelar </ a >
        </ formulario >
    </div> _ _
</div> _ _

<?php  require_once (" ../../templates/footer.php ") ?>