<?php
if (!isset($_SERVER['HTTP_REFERER'])) {
    header('location: ../home.php');
    exit;
}

include('../db/connection.php');
include("../includes/function.php");

$user_data = check_login($con);
$currentUserID = $user_data['login_id'];

$query = "SELECT * FROM `product`";
$result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Product</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="ajax/ajax.js"></script>
</head>
<body>
<div class="container">
    <p id="success"></p>
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>Product</b></h2>
                    <div>
                        <a href="#addEmployeeModal"  class="btn bg-info align-middle" data-toggle="modal"><i
                                    class="material-icons"></i> <span>Add New Product</span></a>
                    </div>
                </div>

            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>NO</th>
                <th>Title</th>
                <th>Description</th>
                <th>Type</th>
                <th>Category</th>
                <th>Color</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Filename</th>
                <th>ACTION</th>
            </tr>
            </thead>
            <tbody>

            <?php
            $i = 1;
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr id="<?php echo $row["product_id"]; ?>">

                    <td><?php echo $i; ?></td>
                    <td><?php echo $row["title"]; ?></td>
                    <td><?php echo $row["description"]; ?></td>
                    <td><?php echo $row["type"]; ?></td>
                    <td><?php echo $row["category"]; ?></td>
                    <td><?php echo $row["color"]; ?></td>
                    <td><?php echo $row["price"]; ?></td>
                    <td><?php echo $row["stock"]; ?></td>
                    <td class="w-10">
                        <?php
                        echo "<img src=" . '../includes/images/' . $row['image'] . " style='width:30%;' />";
                        ?>
                    </td>
                    <td><?php echo $row["image"]; ?></td>
                    <td>
                        <a href="editProduct.php?GetID=<?php echo $row['product_id']?>" class="edit"><i class="material-icons update" title="Edit"></i></a>
                        <a href="../controller/delete.php?<?php echo $row['product_id']?>" class="delete" data-id="<?php echo $row["product_id"]; ?>"
                           data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                                  title="Delete"></i></a>
                    </td>
                </tr>
                <?php
                $i++;
            }
            ?>
            </tbody>
        </table>

    </div>
</div>
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="../controller/addItems.php" enctype="multipart/form-data" method="post">
                <div class="modal-header">
                    <h4 class="modal-title">Add User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" id="title" name="title" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select type="text" id="type" name="type" class="form-control" required>
                            <option value="">--- Choose a Type ---</option>
                            <option value="Latest">Latest</option>
                            <option value="Featured">Featured</option>
                            <option value="Recommend">Recommend</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" id="description" name="description" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Category</label>
                        <select type="category" id="category" name="category" class="form-control" required>
                            <option value="">--- Choose a Category ---</option>
                            <option value="DYI">DYI</option>
                            <option value="Headset">Headset</option>
                            <option value="Controller">Controller</option>
                            <option value="Accessories">Accessories</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Color</label>
                        <input type="text" id="color" name="color" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="price" id="price" name="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Stock</label>
                        <input type="number" id="stock" name="stock" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Add image</label>
                        <input type="file" name="image" id="image" value="" class="form-control" required/>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" value="1" name="type">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <button type="submit" name="submit" class="btn btn-success" id="btn-add">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>