<?php
require_once (" ../../bd.php ");
$ sentencia = $ conexion -> preparar (" SELECT *,
    (SELECCIONA nombredelpuesto
    DESDE `tbl_puestos`
    DONDE tbl_puestos.id=tbl_empleados.idpuesto
    LÍMITE 1) COMO puesto
DESDE `tbl_empleados` ");
$ sentencia -> ejecutar ();
$ lista_tbl_empleados = $ sentencia -> fetchAll ( PDO :: FETCH_ASSOC );

<?php require_once (" ../../templates/header.php ") ?>

< h1 > Empleados </ h1 >
< div  clase =" tarjeta " >
    < div  clase =" encabezado de tarjeta " >
        < a  name ="" id ="" class =" btn btn-primary " href =" ./crear.php " role =" button " > Agregar registro </ a >
    </div> _ _
    < div  class =" cuerpo de la tarjeta " >
        < div  class =" table-responsive " >
            < clase de tabla  =" tabla " >
                < cabeza >
                    <tr> _ _
                        < th  alcance =" col " > ID </ th >
                        < th  scope =" col " > Nombre </ th > <!-- 1er y 2do nombre y 1er y 2do apellido -->
                        < th  scope =" col " > Foto </ th >
                        < th  scope =" col " > CV </ th >
                        < th  scope =" col " > Puesto </ th >
                        < th  scope =" col " > Fecha de Ingreso </ th >
                        < th  scope =" col " > Acciones </ th >
                    </tr> _ _
                </ cabeza >
                < cuerpo >
                    <?php  foreach ( $ lista_tbl_empleados  as  $ registro ) { ?>
                        < tr  clase ="" >
                            < td  ámbito =" fila " >
                                <?php  echo  $ registro [ 'id' ]; ?>
                            </td> _ _
                            <td> _ _
                                <?php  echo  $ registro [ 'primernombre' ]; ?>
                                <?php  echo  $ registro [ 'segundonombre' ]; ?>
                                <?php  echo  $ registro [ 'primerapellido' ]; ?>
                                <?php  echo  $ registro [ 'segundoapellido' ]; ?>
                            </td> _ _
                            <td> _ _
                                < img  width =" 50 " class =" img-fluid rounded " src =" ./img/ <?php  echo  $ registro [ 'foto' ]; ?> " />
                            </td> _ _
                            <td> _ _
                                < a  href =" ./cv/ <?php  echo  $ registro [ 'cv' ]; ?> " > CV </ a >

                            </td> _ _
                            <td> _ _
                                <?php  echo  $ registro [ 'puesto' ]; ?>
                            </td> _ _
                            <td> _ _
                                <?php  echo  $ registro [ 'fechadeingreso' ]; ?>
                            </td> _ _
                            <td> _ _
                                < a  name ="" id ="" class =" btn btn-primary " href =" # " role =" button " > Carta </ ​​a >
                                < a  name ="" id ="" class =" btn btn-info " href =" # " role =" button " > Editar </ a >
                                < a  name ="" id ="" class =" btn btn-danger " href =" # " role =" button " > Eliminar </ a >
                            </td> _ _
                        </tr> _ _
                    <?php } ?>
                </ tcuerpo >
            </ mesa >
        </div> _ _

    </div> _ _

</div> _ _
<?php  require_once (" ../../templates/footer.php ") ?>