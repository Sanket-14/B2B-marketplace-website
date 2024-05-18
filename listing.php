<?php 
require('dbcon.php');
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<?php
session_start(); // Start the session

// Check if the search term is set in the URL
if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Set the search term in the session variable
    $_SESSION['searchTerm'] = $searchTerm;
}

$locations = array();

// SQL query to select distinct locations from the Country column
$sql = "SELECT DISTINCT Country FROM add_listing where v_status=1";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if the query was successful
if ($result) {
    // Fetch each row from the result set
    while ($row = mysqli_fetch_assoc($result)) {
        // Add the location to the array
        $locations[] = $row['Country'];
    }

    // Free the result set
    // mysqli_free_result($result);
} else {
    // Handle the error if the query fails
    echo "Error: " . mysqli_error($conn);
}

// Close the database connection



?>
<?php 
if (isset($_COOKIE["remember_token"])){
    $remember_me=1;
}
else{
    $remember_me=0;
}
?>
<?php
 if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    // Use $searchTerm in your database query
    // Example:
    $perPage = 10; // Number of results per page

    // Calculate current page
    $currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
    $offset = ($currentPage - 1) * $perPage;
    
    // Your SQL query with pagination logic
    $query = "SELECT * FROM add_listing WHERE Categories LIKE '%$searchTerm%' AND v_status=1 LIMIT $perPage OFFSET $offset";

    $result = mysqli_query($conn, $query);

    $totalCountQuery = "SELECT COUNT(*) AS total FROM add_listing WHERE Categories LIKE '%$searchTerm%' AND v_status=1";
    $totalCountResult = mysqli_query($conn, $totalCountQuery);
    $totalCountRow = mysqli_fetch_assoc($totalCountResult);
    $totalCount = $totalCountRow['total'];

    // Calculate total number of pages
    $totalPages = ceil($totalCount / $perPage);

    
    
 }
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
   

    <script defer src="app.js"></script>
    <!--Link to jQuery CDN (this runs the entire function)-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!--Bootstrap 4.1 CDN for button and container-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="listing.css">
    <link rel="stylesheet" href="assets/php/loginnav_bs.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.2.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/final footer/index_footer.css">



    <title style="color: black;">VoltBridge</title>
</head>








<style>
    .pagination-container {
    display: flex;
    justify-content: center;
}
    .pagination ul {
        list-style: none;
        padding: 0;
        display: flex;
        justify-content: center;
    }
    .pagination ul li {
        margin: 0 5px;
    }
    .pagination ul li a {
        display: block;
        padding: 5px 10px;
        text-decoration: none;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #fff;
    }
    .pagination ul li a:hover {
        background-color: #f0f0f0;
    }
    .pagination ul li.active a {
        background-color: #006400;
        color: white;
    }
</style>
<style>
      button {
            padding: 5px 15px;
            font-size: 16px;
            font-weight: bold;
            background-color: #23D375FF; 
            border-color: #23D375FF; 
            border-radius: 5px;
            cursor: pointer;
            /* transition: box-shadow 0.3s; */
            color: black;
        }

        /* Add hover effect */
    button:hover {
            /* box-shadow: 0 4px 8px rgba(0, 128, 0, 0.6); */
            background-color: #114d1e;
            border-color: #218838;
            color:white;
        }

    .link-buttons{
            display:flex;
        }
        @media (max-width: 768px){
            button {
    padding: 5px 15px; 
         font-size: 10px;
        font-weight: bold;
        background-color: #23D375FF; 
        border-color: #23D375FF; 
        border-radius: 5px;
        cursor: pointer;
        transition: box-shadow 0.3s;
        color: black;
    }
    button:hover {
        /* box-shadow: 0 4px 8px rgba(0, 128, 0, 0.6); */
        background-color: #114d1e;
        border-color: #218838;
        color:white;
    }

    .link-buttons{
        display:flex;
    }
        }
     @media (max-width: 768px)  {
    .description {
        font-size: 0.8rem;  
    }
    
    .categories-class{
        font-size:0.7rem;
    }
}
   
   

</style>

<body style="display:flex;flex-direction:column;background-color:whitesmoke; justify-content: start;">


<div>
        <!-- navbar styling code in navbar_resp.css and script in navbar_resp.js - these files linked in index.php, 
       navbar_resp.php contains whole html code for navbar, saved as backup. -->

        <!-- navbar header is being called from headernav.php in assets folder. -->
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/assets/php/";
        include($IPATH . "loginnav_bs.php"); ?>
    </div>
    


<main style="margin-top:6.5rem">

    <!-- Left Div -->
    <div class="left-div">
        
        <div class="white-bg">
            <!-- Nested Div with whitesmoke background and padding -->
            <div class="whitesmoke-bg">
              <div class="two-sections">
                <!-- Content here -->
                <div class="filter-checkbox">
                    <label class="s-label"  style="font-weight: bold;" for="supplier-type">Supplier Type:</label> <br>
                    
                    <div class="checkbox-container">

                   
                    <input class="checkbox-input" style="font-family:monaco, monospace; font-style: bold;" type="checkbox" id="type1" name="supplier-type[]" value="Distributor"><label class="input-label" for="type1">&nbsp;Distributor</label>
                    <br>
                    </div>
                    <div class="checkbox-container">
                    <input class="checkbox-input" type="checkbox" id="type2" name="supplier-type[]" value="Manufacturer"><label class="input-label" for="type2">&nbsp;Manufacturer</label>
                    <br>
                    </div>
                    <div class="checkbox-container">
                    <input class="checkbox-input" type="checkbox" id="type3" name="supplier-type[]" value="Service Provider"><label class="input-label" for="type3">&nbsp;Service Provider</label>
                    <br>
                    </div>
                    <!-- Add more checkboxes as needed -->
                </div>
                <div class="filter-checkbox">
                 <label class="v-label" style= " font-weight: bold;" for="volume">Production Volume Capability:</label> <br>
                    <div class="checkbox-container">
                     <input class="checkbox-input"  type="checkbox" id="volume1" name="volume[]" value="Prototype">
                     <label class="input-label" for="volume1">Prototype</label> <br> 
                    </div>
                     <div class="checkbox-container">
                     <input class="checkbox-input" type="checkbox" id="volume2" name="volume[]" value="Low volume serial production">
                     <label class="input-label" for="volume2">Low volume serial Production</label> <br> 
                     </div>
                     <div class="checkbox-container">
                     <input class="checkbox-input" type="checkbox" id="volume3" name="volume[]" value="High volume serial production">
                     <label class="input-label" for="volume3" style="">High volume serial Production</label> <br>
                     </div>
                     <!-- Add more checkboxes as needed -->
                </div>
              </div>
                
                <div  class="filter-section" margin>
                 <label style= " font-weight: bold;"  class="filter-header" onclick="toggleLocationFilters()">Location
                 <svg class="arrow-icon"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                         <path d="M0 0h24v24H0z" fill="none"/>
                         <path d="M7 10l5 5 5-5z"/>
                     </svg>
                 </label>
    
                    <div  class="filter-checkboxes">
                            <?php 
                            $count = 0;
                            foreach($locations as $loc) {
                                $count++;
                            ?>
                            <div class="checkbox-container">
                            <input class="checkbox-input" type="checkbox" id="location<?php echo $count ?>" name="location[]" value="<?php echo $loc ?>">
                            <label class="input-label" for="location<?php echo $count ?>"><?php echo $loc ?></label><br>
                            </div>
                            <?php 
                            }
                            ?>
                    </div>
                </div>

                <div  style="margin-top:25px">
      
                 <button class="filter-buttons"  onclick="updateResults()">Apply</button>
                 <button class="filter-buttons" onclick="resetResults()">Reset</button>
                
                </div>

            </div>
        </div>
        
    </div>
    <!-- Right Div -->
    <div class="right-div" style="">
        <div style="flex-grow:1">
   
 <?php
 if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $counter = 1; // Initialize a counter

        while ($row = mysqli_fetch_assoc($result)) {
            
            // Check if v_status is 1
            if ($row['v_status'] == 1) {
                include 'card.php';

                echo '<script>';
                echo 'var cards = document.getElementsByClassName("product-card-' . $counter . '");'; // Use a unique class for each card
                echo 'for (var i = 0; i < cards.length; i++) {';
                echo '    cards[i].getElementsByClassName("heading")[0].innerText = "' . $row['comp_name'] . '";';

                // Description
                $companyOverview = $row['Company_Overview']; // Assuming $row['Company_Overview'] contains the description
                $trimmedDescription = substr($companyOverview, 0, 155);
                $finalDescription = $trimmedDescription . '....';
                echo '    cards[i].getElementsByClassName("description")[0].innerText = ' . json_encode($finalDescription) . ';';

                // Location
                echo '    cards[i].getElementsByClassName("p-location")[0].innerText = "' . $row['Country'] . '";';
                
                // Business Categories
                $businessCategoriesString = $row['Categories'];
                $businessCategoriesArray = explode(',', $businessCategoriesString);
                echo 'var businessCategoriesContainer = cards[i].getElementsByClassName("business-categories")[0];';

                for ($j = 0; $j < min(4, count($businessCategoriesArray)); $j++) {
                    $businessCategory = trim($businessCategoriesArray[$j]);
                    $color = '#006400'; // Green color for business categories
                    echo 'var categorySpan = document.createElement("span");';
                    echo 'categorySpan.style.display = "inline-block";';
                    echo 'categorySpan.style.borderRadius = "50px";';
                    echo 'categorySpan.style.marginRight = "7px";';
                    echo 'categorySpan.style.marginBottom = "5px";';
                    echo 'categorySpan.style.padding = "5px 15px";';
                    echo 'categorySpan.style.color = "' . $color . '";';
                    echo 'categorySpan.style.backgroundColor = "white";';
                    echo 'categorySpan.style.border = "1px solid ' . $color . '";';
                    echo 'categorySpan.innerText = "' . $businessCategory . '";';
                    echo 'categorySpan.classList.add("categories-class");';
                    echo 'businessCategoriesContainer.appendChild(categorySpan);';
                }

                // Image
                echo '    cards[i].getElementsByClassName("comp_image")[0].src = "uploads/' . $row['image_url'] . '";';
                // Default logo
                echo 'cards[i].getElementsByClassName("comp_image")[0].onerror = function() {';
                echo '    this.src = "./images/default_company_logo.png";'; // Set default image source
                echo '};';

                echo '}';
                echo '</script>';

                $counter++; // Increment counter only when card is displayed
            }
        }
    } else {
        echo "<p>No results found for '$searchTerm'</p>";
    }
} else {
    // Handle the SQL query error
    echo "Error: " . mysqli_error($conn);
}
    ?>
        </div>
        <div class="pagination-container" >
    <div class="pagination">
        <ul>
            <?php
            // Assuming $currentPage and $totalPages are defined
            // Previous button
            if ($currentPage > 1) {
                echo '<li><a href="?search=' . urlencode($searchTerm) . '&page=' . ($currentPage - 1) . '">&lt;</a></li>';
            }

            // Page numbers
            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<li' . ($i == $currentPage ? ' class="active"' : '') . '><a href="?search=' . urlencode($searchTerm) . '&page=' . $i . '">' . $i . '</a></li>';
            }

            // Next button
            if ($currentPage < $totalPages) {
                echo '<li><a href="?search=' . urlencode($searchTerm) . '&page=' . ($currentPage + 1) . '">&gt;</a></li>';
            }
            ?>
        </ul>
    </div>
</div>
    </div>

</main>

</body>

<div style="width:-webkit-fill-available;">
        <!-- footer styling code in index_footer.css . -->
        <!-- footer is being called from index_footer.php in assets folder. -->
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/assets/final footer/";
        include($IPATH . "index_footer.php"); ?>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



<script>
    document.addEventListener("DOMContentLoaded", function () {
    // Get the navbar element
    var navbar = document.querySelector('.navbar');

    // Get the offset position of the navbar
    var sticky = navbar.offsetTop;

    // Add the 'fixed-navbar' class when scrolling past the navbar
    window.onscroll = function () {
        if (window.pageYOffset > sticky) {
            navbar.classList.add("fixed-navbar");
        } else {
            navbar.classList.remove("fixed-navbar");
        }
    };
});

function updateResults() {
    // Get selected checkboxes
    var volume = $('input[name="volume[]"]:checked').map(function(){
        return this.value;
    }).get();

    var supplierTypes = $('input[name="supplier-type[]"]:checked').map(function(){
        return this.value;
    }).get();

    var location = $('input[name="location[]"]:checked').map(function(){
        return this.value;
    }).get();
    

    var searchTerm = '<?php echo $_GET['search']; ?>';
    


    // AJAX request to update results
    $.ajax({
        url: 'filter.php',
        type: 'GET',
        data: {volume:volume ,supplierTypes: supplierTypes , location:location ,searchTerm: searchTerm},
        success: function(data) {
            $('.right-div').html(data);
        },
        error: function(error) {
            console.log(error);
        }
    });
}


function resetResults() {
    // Clear all checked checkboxes
    $('input[type="checkbox"]').prop('checked', false);

    // Get the original search term if it's set
    var searchTerm = '<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>';

    // AJAX request to update results with the original search term
    $.ajax({
        url: 'filter.php',
        type: 'GET',
        data: { searchTerm: searchTerm },
        success: function(data) {
            // Update the right-div with the retrieved data
            $('.right-div').html(data);
        },
        error: function(xhr, status, error) {
            // Log the error
            console.error('Error resetting results:', error);
            // Display an error message to the user
            $('.right-div').html('<p>Error resetting results. Please try again later.</p>');
        }
    });
}




function toggleLocationFilters() {
    var locationCheckboxes = document.querySelector('.filter-checkboxes');
    var arrowIcon = document.querySelector('.arrow-icon');

    if (locationCheckboxes.style.display === 'none' || locationCheckboxes.style.display === '') {
        locationCheckboxes.style.display = 'block';
        arrowIcon.classList.remove('collapsed');
    } else {
        locationCheckboxes.style.display = 'none';
        arrowIcon.classList.add('collapsed');
    }
}

</script>

    <script>

document.addEventListener('DOMContentLoaded', function() {
    const navbarToggle = document.getElementById('navbarToggle');
    const navbarButtons = document.getElementById('navbarButtons');

    navbarToggle.addEventListener('click', function() {
        navbarButtons.classList.toggle('show');
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const addCompanyBtn = document.getElementById('addCompanyBtn');
    const companyOptionsDropdown = document.getElementById('companyOptionsDropdown');

    addCompanyBtn.addEventListener('click', function() {
        companyOptionsDropdown.classList.toggle('show');
    });
    addCompanyBtn.addEventListener('hover', function() {
        companyOptionsDropdown.classList.toggle('show');
    });

    // Close the dropdown when clicking outside of it
    window.addEventListener('click', function(event) {
        if (!event.target.matches('#addCompanyBtn')) {
            const dropdowns = document.getElementsByClassName('dropdown-menu');
            for (let dropdown of dropdowns) {
                if (dropdown.classList.contains('show')) {
                    dropdown.classList.remove('show');
                }
            }
        }
    });
});



</script>





</html>