<?php
    require 'autoload_class.php';
    require '../validate_session.php';
    
    function getRadiacion()
    {
      $radiacion = new Radiacion(new Conexion);
      $cliente = new Client($radiacion);
      $res = $cliente->operate('select');
      while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        /* $i++;
        echo '<tr>';
        echo "<td>$i</td>";
        echo "<td class='text-center'>$row[nombre_categoria]</td>";
        echo "<td class='text-center'><a href='editCategoria.php?id=$row[id_categoria]'>Editar</a></td>";
        echo "<td class='text-center'><a class='delete' href='../functions/categoria/delete.php?id=$row[id_categoria]'>Eliminar</a></td>";
        echo  '</tr>'; */
      }
    }

    getRadiacion();
?>
