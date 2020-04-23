<html>
    <head>

    </head>
    <body>
        <?php
            require('process.php');

            $db_con = new MySqlDrive();
            $query = "SELECT * FROM student";
            // $result = $db_con->read($query);
            $result = mysqli_query($db_con->db_connect(), $query);
            // var_dump($result);
        ?>

        <?php if(isset($_SESSION['message'])): ?>

        <div>
            <h3>
                <?php echo $_SESSION['message']; ?>
            </h3>
        </div>

        <?php endif ?>

        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Roll</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['roll']; ?></td>
                        <td>
                            <a href="index.php?edit=<?php echo $row['id']?>">Edit</a>
                            <a href="process.php?delete=<?php echo $row['id']?>">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
        <br>
        <form action="process.php" method="POST">
            <label for="">Name</label>
            <input type="text" value="<?php echo $name;?>" name="name">
            <label for="">Phone</label>
            <input type="text" value="<?php echo $phone;?>" name="phone">
            <label for="">Roll</label>
            <input type="number" value="<?php echo $roll;?>" name="roll">
            <input type="hidden" value="<?php echo $id;?>" name="id">
            <?php if($update == true): ; ?>
                <button type="submit" name="update">Update</button>
            <?php else: ?>
                <button type="submit" name="save">Submit</button>
            <?php endif ;?>
        </form>
    </body>
</html>