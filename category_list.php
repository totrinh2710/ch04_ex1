<?php
require_once('database.php');

// Get all categories
$query = 'SELECT * FROM categories ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();

?>

<!DOCTYPE html>
<html>

<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css" />
</head>

<body>
    <header>
        <h1>Product Manager</h1>
    </header>
    <main>
        <h1>Category List</h1>
        <table>
            <tr>
                <th>Name</th>
               
            </tr>
            <?php foreach ($categories as $category) : ?>
                <tr>
                    <td><?php echo isset($category['categoryName']) ? $category['categoryName'] : 'N/A'; ?></td>
                   
                </tr>
            <?php endforeach; ?>
        </table>

        <h2>Add Category</h2>
        <!-- Add code for the form here -->

                <!-- Example of a form to add a category -->
        <form action="add_category.php" method="post">
            <label for="categoryName">Category Name:</label>
            <input type="text" id="categoryName" name="categoryName">

            <input type="submit" value="Add">
        </form>

        <br>
        <p><a href="index.php">List Products</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>

</html>