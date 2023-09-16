<?php
// Get the product data
$name_category = filter_input(INPUT_POST, 'categoryName');


// Validate inputs
if (
    
    $name_category == null 
) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database  
    $query = 'INSERT INTO categories
                 ( categoryName)
              VALUES
                 ( :categoryName)';

    $statement = $db->prepare($query);
    $statement->bindValue(':categoryName', $name_category);   
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('category_list.php');
}
