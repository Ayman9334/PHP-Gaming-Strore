<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css">
    <style>
        .images {
            width: 70px;
            height: 70px;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    
    <H1 class="text-center">Admin Page</H1>
    <?php
    require_once("../connexion/dbconfig.php");

    $product = $db->query("SELECT * FROM product")
    ?>
    <div class="container" style="margin-bottom: 10px; width: 100%; height: 50px;">
        <a class="btn btn-primary" href="addproduct.php">Add product</a>
    </div>
    <div class="container">
        <table class="table table-bordered " id="myTable">
            <thead>
                <tr class="text-center">

                    <th>Title</th>
                    <th td colspan="3">Image</th>
                    <th>Delete/Modify</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($product->num_rows > 0) { ?>

                    <?php while ($row = $product->fetch_assoc()) { ?>
                        <?php
                        $title = $row['Title'];
                        $result = $db->query("SELECT image FROM images WHERE Title='" . $row['Title'] . "'"); ?>
                        <tr class="text-center">
                            <td><?php echo $row['Title'] ?></td>

                            <?php if ($result->num_rows > 0) { ?>
                                <td colspan="3">
                                    <?php while ($row = $result->fetch_assoc()) { ?>



                                        <img class="images" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" />


                                    <?php } ?>
                                </td>
                                <td><a href="edit.php?id=<?php echo $title ?>" class="btn btn-primary">Modify</a>
                                    <a onclick="return confirm('Are you sure you want to delete this item?') " href="../templates/delete.php?id=<?php echo $title ?>" class="btn btn-danger">Delete</a>
                                </td> <?php
                                    }
                                }
                            }   ?>
                        </tr>
            </tbody>
        </table>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="../js/Table.js"></script>
</body>

</html>