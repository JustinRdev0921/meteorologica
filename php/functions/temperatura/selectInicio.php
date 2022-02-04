<?php
    require 'autoload_class.php';
    
    function getTemperatura()
    {
      $temperatura = new Temperatura(new Conexion);
      $cliente = new Client($temperatura);
      $res = $cliente->operate('select');
      $row = $res->fetch_array(MYSQLI_ASSOC);
      $nombre_dia = get_nombre_dia($row['dat_hour']);
      $temp_res = $cliente->operate('selectPrediccion');
      $temp_row = $temp_res->fetch_array(MYSQLI_ASSOC);

      //Temperatura actual (o al menos la última temperatura que encuentra en la base de datos)
      $temp = round($row['temp'], 2);

      //Temperaturas máximas y mínimas calculadas por python... se recupera de la base de datos
      $temp_max = round($temp_row['temperatura_max'], 2);
      $temp_min = round($temp_row['temperatura_min'], 2);

      $nom_mes = get_nombre_mes($row['dat_hour']);

      $dia = preg_split("/[s -]+/",$row['dat_hour']);
      $dia = $dia[2];

      echo '<div class="cta-inner bg-faded text-center rounded">';
      echo '<h2 class="section-heading mb-4">';
      echo '<span class="section-heading-upper">Pacto</span>';
      echo "<span class='section-heading-lower'>$temp&deg;C</span>";
      echo "<span class='section-heading-upper'>$nombre_dia, $dia $nom_mes</span>";
      echo "<span class='section-heading-upper'>Max: $temp_max&deg;C</span>";
      echo "<span class='section-heading-upper'>Min: $temp_min&deg;C</span>";
      echo '<p></p>';
      echo '<span class="section-heading-upper">Previsión temperatura promedio para los siguientes 6 días</span>';
      echo '</h2>';
     
      
      $res2 = $cliente->operate('selectPrediccion');
      echo '<tr>';
      $count = 0; //contador para la correcta visualización de los días que se están prediciendo
      while($subrow = $res2->fetch_array(MYSQLI_ASSOC)){
        $count++;
        $nom_dia = get_nombre_dia($subrow['fecha']);
        $promedio = ($subrow['temperatura_max'] + $subrow['temperatura_min'])/2;
        if($nom_dia != $nombre_dia){
          if($count <7){
            echo "<td>$nom_dia: $promedio&deg;C</td>
                <td> | </td>";
          }else{
            echo "<td>$nom_dia: $promedio&deg;C</td>";
          }
          
        }
      }
      echo '</tr>';

      echo '</div>';

    }
    
    //función que recibe una fecha y nos devuelve el día de la semana que está asignado a esa fecha...
    function get_nombre_dia($fecha){
      $fechats = strtotime($fecha); //pasamos a timestamp
   
      //el parametro w en la funcion date indica que queremos el dia de la semana
      //lo devuelve en numero 0 domingo, 1 lunes,....
      switch (date('w', $fechats)){
          case 0: return "Domingo"; break;
          case 1: return "Lunes"; break;
          case 2: return "Martes"; break;
          case 3: return "Miercoles"; break;
          case 4: return "Jueves"; break;
          case 5: return "Viernes"; break;
          case 6: return "Sabado"; break;
      }
    }

    //función que recibe una fecha y nos devuelve el mes que está asignado a esa fecha...
    function get_nombre_mes($fecha){
      $fechats = strtotime($fecha); 

      //parametro 'm' indica el mes de la fecha
      switch (date('m', $fechats)){
          case 1: return "Enero"; break;
          case 2: return "Febrero"; break;
          case 3: return "Marzo"; break;
          case 4: return "Abril"; break;
          case 5: return "Mayo"; break;
          case 6: return "Junio"; break;
          case 7: return "Julio"; break;
          case 8: return "Agosto"; break;
          case 9: return "Septiembre"; break;
          case 10: return "Octubre"; break;
          case 11: return "Noviembre"; break;
          case 12: return "Diciembre"; break;
      }
    }

    getTemperatura();
?>
