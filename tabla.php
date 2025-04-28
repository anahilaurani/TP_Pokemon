<div class="row">
    <div class="col-sm-12">
         <table class="table table-hover table-condensed table-bordered">
             <tr>
                 <td>id</td>
                 <td>nro_identificador</td>
                 <td>imagen</td>
                 <td>nombre</td>
                 <td>tipo</td>
                 <td>descripcion</td>
             </tr>
             <?php
             $database = mysqli_connect(
                 $hostname = "localhost",
                 $username = "root",
                 $password = "",
                 $database = "pokemon"
             ) or die("ERROR AL CONECTAR");

             $sql = "select * from pokemon";
             $datos = mysqli_query($database, $sql);

             while($ver = mysqli_fetch_array($datos)) {

                 /* abro y cierro el php en dos lugares porque esto dice que mientras
                   halla datos me va lo va a repetir */
                 echo "<tr>";
                 echo "<td>" . $ver[0] . "</td>";
                 echo "<td>" . $ver[1] . "</td>";
                 echo "<td><img src='" . $ver[2] . "' width='50'></td>";
                 echo "<td>" . $ver[3] . "</td>";
                 echo "<td>" . $ver[4] . "</td>";
                 echo "<td>" . $ver[5] . "</td>";
                 echo "</tr>";

             }
             mysqli_close($database);
             ?>

         </table>
    </div>

</div>


