<?php
require("../conexion/conexion.php");
if ($_GET['export'] == "csv") {
     $fields = array('producto_id', 'producto_nombre', 'producto_cantidad', 'producto_fvencimiento', 'producto_precio', 'producto_estado');
     $separator = ";";
     $enclosure = " ";
     $abrearchivo = fopen("contenido.csv", "w");
     fputcsv($abrearchivo, $fields, $separator, $enclosure);
     $query = "SELECT * from pessio_producto";
     $result = mysqli_query($conexion, $query);
     while ($row = mysqli_fetch_assoc($result)) {
          fputcsv($abrearchivo, $row, $separator, $enclosure);
     }

     fclose($abrearchivo);
     header("Location: vertabla.php");
     header("Location: contenido.csv");
}
?>
<?php
if ($_GET['export'] == "xls") {
     header("Content-Type:application/xls");
     header("Content-Disposition: attachment; filename=Contenido.xls");
?>
     <table border='1'>
          <tr>
               <th>ID</th>
               <th>Nombre</th>
               <th>Cantidad</th>
               <th>Fecha Vencimiento</th>
               <th>Precio</th>
               <th>Estado</th>
          </tr>
          <?php
          require("../conexion/conexion.php");
          $query = 'SELECT * FROM pessio_producto';
          $result = mysqli_query($conexion, $query);


          while ($row = mysqli_fetch_array($result)) {
          ?>
               <tr>
                    <td><?php echo $row['producto_id'] ?></td>
                    <td><?php echo $row['producto_nombre'] ?></td>
                    <td><?php echo $row['producto_cantidad'] ?></td>
                    <td><?php echo date("d-m-Y", strtotime($row['producto_fvencimiento'])) ?></td>
                    <td><?php echo "$" . $row['producto_precio'] ?></td>
                    <td><?php echo $row['producto_estado'] ?></td>
               </tr>
          <?php
          }
          ?>
     </table>
<?php
}
?>
<?php
if ($_GET['export'] == "original") {
     header("Location: vertabla.php");
     header("Location: datos.csv");
}
