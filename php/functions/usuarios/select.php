<?php
    require 'autoload_class.php';
    require '../validate_session.php';
    
    function getUsuarios()
    {
      $usuarios = new Usuarios(new Conexion);
      $cliente = new Client($usuarios);
      $res = $cliente->operate('select');
      $i = 0;
      while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
        if ($row['estado_admin'] == 1 && $row['rol_admin']!='super_administrador') {
          $i++;
          echo '<tr>';
          echo "<td>$i</td>";
          echo "<td class='text-center'>$row[nombre_admin]</td>";
          echo "<td class='text-center'>$row[email_admin]</td>";
          echo "<td class='text-center'>$row[estado_admin]</td>";
          echo "<td class='text-center'><a href='editAdmin.php?id=$row[id_admin]'>Editar</a></td>";
          echo "<td class='text-center'><a class='delete' href='../functions/admin/delete.php?id=$row[id_admin]'>Eliminar</a></td>";
          echo  '</tr>';
        }
      }
    }
    
    getUsuarios();
?>
