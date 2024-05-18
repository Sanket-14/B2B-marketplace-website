<?php
    

    if (isset($_GET['search'])) {
        $searchTerm = $_GET['search'];

        // Use $searchTerm in your database query
        // Example:
        $query = "SELECT * FROM voltbridge.Add_listing WHERE categories LIKE '%$searchTerm%'";
        $result = mysqli_query($conn, $query);

        // Check if there are any results
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                

                while ($row = mysqli_fetch_assoc($result)) {
                    
                    include 'card.html';
                    
                    echo '<script>';
                    echo 'var card = document.querySelector(".product-card:last-child");'; // Get the last card, assuming it's the one you included
                    echo 'document.querySelector(".heading", card).innerText = "' . $row['comp_name'] . '";';
                    echo 'document.querySelector(".link", card).innerText = "' . $row['Website'] . '";';
                    echo 'document.querySelector(".link", card).href = "' . $row['Website'] . '";';
                    echo 'document.querySelector(".p-location", card).innerText = "' . $row['Country'] . '";';
                    echo 'document.querySelector(".supplier_type", card).innerText = "Supplier type: ' . $row['Supplier_type'] . '";';
                    echo 'document.querySelector(".comp_image", card).src = "uploads/' . $row['image_url'] . '";';
                    echo '</script>';
                   
                }
                
            } else {
                echo "<p>No results found for '$searchTerm'</p>";
            }
        } else {
            // Handle the SQL query error
            echo "Error: " . mysqli_error($connection);
        }
    }
    ?>


style="width: 900px; height: 195px; background-color: #fff; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 1); padding: 16px; box-sizing: border-box; position: relative; display: block; margin-bottom: 20px; transition: background-color 0.3s ease;"