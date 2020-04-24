<?php
include("auth.php");//estas logeado?
?>
<html style="margin-top: 30px;">
    <head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
            require('process2.php');//conectar

            $db_con = new MySqlDrive();
            $query = "SELECT * FROM empleados";
            // $result = $db_con->read($query);
            $result = mysqli_query($db_con->db_connect(), $query);
            // var_dump($result);
        ?>

        <?php if(isset($_SESSION['message'])): ?>


        <?php endif ?>
<div class="container">
        <h2 style="text-align:center;margin-bottom: 10px;">Gestionar Personal</h2>

<div class="shadow-none p-3 mb-5 bg-light rounded" style="margin-top: 20px;max-height:45px">
        <ul>
          <a href="menu.php">Menú</a><span> / </span>
          <a href="empleados.php">Gestionar Personal</a><span> / </span>
        </ul>
</div>

        <div class="container" style="margin-left: 3px;">
        <div class="table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Accion 1</th>
                        <th>Accion 2</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $row['nombre']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>           
                    <a class="btn btn-primary" href="empleados.php?edit=<?php echo $row['id']?>" role="button">Editar</a>
                        </td>
                        <td>
                    <a class="btn btn-danger" href="process2.php?delete=<?php echo $row['id']?>" role="button">Eliminar</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
        <br>
        <form action="process2.php" method="POST">
            <label for="">Nombre</label>
            <input type="text" value="<?php echo $nombre;?>" name="nombre">
            <label for="">Email</label>
            <input type="email" value="<?php echo $email;?>" name="email">
            <label for="">Clave</label>
            <input type="password" value="" name="clave">
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <?php if($update == true): ; ?>
                <button type="submit" name="update">Actualizar</button>
            <?php else: ?>
                <button type="submit" name="save">Registrar</button>
            <?php endif ;?>
        </form>
    </div>
</div>
    </body>
</html>