<?php
require('dbcon.php');
session_start();

if (isset($_GET['company']) && isset($_GET['product'])) {
    // Retrieve the values of 'company' and 'product' parameters from the URL
    $company = $_GET['company'];
    $product = $_GET['product'];

    // URL decode the values to remove any URL encoding
    $company = urldecode($company);
    $product = urldecode($product);

} else {
    // Handle case when 'company' or 'product' parameters are not set
    echo "<script>alert('invalid request');</script>";
}

$sql = "SELECT * FROM products WHERE product_name = ? AND comp_name = ?";

// Prepare the SQL statement
$stmt = $conn->prepare($sql);

// Bind the parameters to the prepared statement as strings
$stmt->bind_param("ss", $product, $company);

// Execute the prepared statement
$stmt->execute();

// Get the result set
$result = $stmt->get_result();

// Check if there are any rows returned
if ($result->num_rows > 0) {
    // Fetch and output each row of data
     $row = $result->fetch_assoc();
        // Output data as needed
        // Output other columns as needed
    
} else {
    // No matching rows found
    echo "No matching products found.";
}

// Close the prepared statement
$stmt->close();

// Close the database connection
$conn->close();



?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script defer src="app.js"></script>
    <!--Link to jQuery CDN (this runs the entire function)-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <!--Bootstrap 4.1 CDN for button and container-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title style="color: black;">VoltBridge</title>
</head>


<style>
    body{
        background-image: url("images/background2.png");
    }
      nav {
    /* Navbar styles */
    background-color: whitesmoke;
    height: 10%;
}

/* Logo styles */
.nav__logo {
    /* Logo styles */
    color: var(--dark-blue);
}

/* Tab styles */
.nav__links li a {
    /* Tab styles */
    
    color: black;
    border-radius: 5px;
    padding: 10px 20px;
    font-weight:bold;
}
/* Tab styles */
.nav__links li a:hover {
    /* Tab styles */
    background-color:white;
    border-color: #23D375FF;
    color: #23D375FF;

    border-radius: 5px;
    padding: 10px 20px;
    /*background-color: #228B22;*/
}

/* Active tab styles */
.nav__links li a.active {
    /* Active tab styles */
    color: var(--cta) !important;
}
            .navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: whitesmoke; /* Updated background color for the navbar */
    color: rgb(17, 16, 16); /* Updated text color for the navbar */
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.navbar-links a {
    color: orange;
    background-color: #fff;
    /* other styles */
}
.features-link_rounded-box{
    background-color: #23D375FF; 
    color: white;
    border-radius: 5px;
    padding: 10px 20px;
}
.overview-link_rounded-box  {
    background-color: transparent;
    color: #fff;
    border-radius: 5px;
    padding: 10px 20px;
    font-size:18px;
}
.white-text {
    color: black;
}

.green-text {
    color:#23D375FF;
}

.rounded-box {
    border-radius: 40px;
    padding: 40px 40px;
    background-color: orange;
    color: black;
    text-decoration: none;
    display: inline-block;
}
</style>

<!-- form styles -->
<style>
  /* Center the main content */
  main {
    display: flex;
    justify-content: center;
    align-items: center;
    height: auto; /* Adjust the height as needed */
    padding: 20px;
    background-image: url("images/background2.png"); /* Background image URL */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;

  }

  /* Style the form container */
  .form-container {
    background-color: whitesmoke;

    border: 1px solid #ccc; /* Grey border */
    border-radius: 10px; /* Border radius */
    padding: 20px;
    width: 80%; /* Adjust the width as needed */
    max-width: 800px;
  }

  /* Style form elements */
  form {
    width: 100%;
    background-color:whitesmoke;
  }

  /* Style form inputs */
  input[type="text"],
  textarea,
  input[type="file"] {
    width: 600px;
    margin-bottom: 15px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
  }

  /* Style buttons */
  .btn {
    background-color: #23D375FF;
    color: black;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .btn:hover {
    background-color: #1aae63; /* Darker shade of green on hover */
    color:black;
  }

  /* Style the "Dashboard" button */
  .btn-default {
    background-color: transparent;
    color: #228b22;
    border: 1px solid #228b22;
    margin-right: 10px;
    transition: background-color 0.3s, color 0.3s;
  }

  .btn-default:hover {
    background-color: mediumseagreen;
    text-color: black;
  }
</style>

<style>
  /*  #featureTags {
            display: flex;
            flex-wrap: wrap;
        }
        .tag {
    background-color:#1F83D02f;
    margin: 5px;
    padding: 5px;
    border-color: #8ee9dd;
    border-style: solid; /* Specify the border style 
    border-radius: 50px;  Adjust border-radius to your preference 
    display: flex;
    align-items: center;
    position: relative;
}


    .tag .tag-text {
        color:#358081;
        margin-right: 5px;
    } */
</style>


<style>
      /*  #locationTags {
            display: flex;
            flex-wrap: wrap;
        }

        .tag {
            background-color: #e0e0e0;
    margin: 5px;
    padding: 5px;
    border-color: #8ee9dd;
    border-style: solid; /* Specify the border style
    border-radius: 50px; /* Adjust border-radius to your preference 
    display: flex;
    align-items: center;
    position: relative;
    }

    .tag .tag-text {
        margin-right: 5px;
    }

    .tag .tag-remove {
        cursor: pointer;
    }
*/
    </style>

<style>
    .remove-tag {
         /* Adjust the font size to make the button smaller */
        
        font-size:5px;
      
    }
    .remove-text{
        color:#a32b37;
        font-size: 15px;
        margin-top: -15px;
    }
    button:hover {
    background-color: #1DAF66FF; /* Darker green on hover */
    color:black;
  }
  
  .font-medium {
    font-weight: 500;
}
.py-2 {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
}
.px-4 {
    padding-left: 1rem;
    padding-right: 1rem;
}
.rounded-xl {
    border-radius: 0.75rem;
}
.items-center {
    align-items: center;
}
.flex {
    display: flex;
}
.mr-2 {
    margin-right: 0.5rem;
}
.mb-2 {
    margin-bottom: 0.5rem;
}

style attribute {
    /* background-color: #1F83D0; */
    height: 10px;
    width: 5px;
    margin-top: -12px;
    display: inline-block;
    cursor: pointer;
    margin-left: 10px;
}
</style>

<body>


<nav>
    <a style="text-decoration:none;" href="index.php" class="nav__logo">
        <img style="margin-top: -15px; margin-left:-65px" src="./images/logo4.png" alt="Logo | VoltBridge" class="nav__logo-white" height="40" width="30">
        <span class="white-text";color="black";>Volt</span><span class="green-text"; color="green";>Bridge</span>
    </a>
    <ul class="nav__links">
     
        <li><a style ="text-decoration:none;" href="register.php" class="features-link_rounded-box" style="background-color:#23B375B5;">Add your Company</a></li>
        <li><a style ="text-decoration:none;" href="login.php" class="overview-link_rounded-box" style="font-size: 17px; color:black;">Login</a></li>

    </ul>
    <div class="nav__menu">
        <div class="hamburger"></div>
    </div>
</nav>

<main>
    <div class="form-container">
        <form class="simple_form fn-unsaved-warning" id="product_form" data-warning="Do you really want to cancel the editing of the product?" novalidate="novalidate" enctype="multipart/form-data" action="store_updated_data.php?company=<?php echo $company ?>&product=<?php echo $product ?>" accept-charset="UTF-8" method="POST" onsubmit="updatefinalfeatures()">
            <input type="hidden" name="authenticity_token" value="Ccb2PSAImyMyajiC2aO67QAV46DhBMwdRtYD4I9sO_xnvPk7g-e1a6qLVCbE7IXhPGD8TTI1o9LHjjmSLewZHQ" autocomplete="off">
            <div class="panel">
                <div class="panel-body">
                    <h3>Basic information</h3>
                    <div class="col-md-8" style="width: 100%;">
                        <!-- Input for Product Name -->
                        <div class="form-group string required product_name">
                            <label class="control-label string required" for="product_name">Product name *</label>
                            <small class="control-hint">Min. of 5 and max. of 120 characters</small>
                            <input value="<?php echo $row['product_name'] ?>" class="form-control string required" required="required" aria-required="true" maxlength="120" size="120" type="text" name="product[name]" id="product_name" required>
                            <input type="text" name="oldproduct_name" value="<?php echo $row['product_name'] ?>" hidden>
                        </div>
                        <!-- Textarea for Product Description -->
                        <div class="form-group text required product_description">
                            <label class="control-label text required" for="product_description">Product description *</label>
                            <small class="control-hint">Min. of 100 and max. of 5000 characters</small>
                            <textarea  class="form-control text required" rows="4" required="required" aria-required="true" maxlength="7000" name="product[description]" id="product_description"><?php echo $row['product_description'] ?></textarea>
                        </div>
                        <div class="form-group">
                            <h4 class="control-label file optional" for="product_images">Product Image</h4>
                            <img height="100" width="100" src="products/<?php echo $row['product_image'] ?>" alt="">
                            <input class="form-control file optional" type="file" name="product[images][]" id="product_images" multiple="" required>
                            <small class="control-hint">Formats: JPG, PNG. Max size: 5MB per image.</small>
                        </div>
                        <input name="hidden_images" value="<?php echo $row['product_image'] ?>"  hidden/>
                        <div class="form-group">
                            <label for="features">Salient Features:</label>
                            <div style="display:flex;flex-direction:row">
    <?php
    $features = explode(',', $row['features']);

    foreach ($features as $index => $category) {
        echo '<div id="featureTags" class="flex items-center px-4 mr-2 font-medium rounded-xl py-2" style="background:#1F83D02f">';
        echo '<div class="mr-2"><svg width="18" height="12" viewBox="0 0 18 12" fill="none" xmlns="http://www.w3.org/2000/svg">';
        echo '<path fill-rule="evenodd" clip-rule="evenodd" d="M17.0481 0.351472C17.5168 0.820101 17.5168 1.5799 17.0481 2.04853L7.44814 11.6485C6.97951 12.1172 6.21971 12.1172 5.75108 11.6485L0.951081 6.84853C0.482452 6.3799 0.482452 5.6201 0.951081 5.15147C1.41971 4.68284 2.17951 4.68284 2.64814 5.15147L6.59961 9.10294L15.3511 0.351472C15.8197 -0.117157 16.5795 -0.117157 17.0481 0.351472Z" fill="#1F83D0"></path>';
        echo '</svg></div><span class="tag-text">' . trim($category) . '</span><span style="background-color:#1F83D0;height: 10px;width:10px; margin-top: -12px; display: inline-block; cursor: pointer;" class="remove-tag"><span class="remove-text">X</span></span></div>';
    }
    ?>
</div>

                            <input type="hidden" value="<?php echo $row['features'] ?>" name="modifiedfeatures" id="modifiedfeaturesInput">
                            <div id="featureTags"></div>
                            <div>
                                <input type="text" id="featureInput" placeholder="Enter feature" onkeydown="return addFeature(event)" required>
                                <button style=" background-color: #23D375FF; 
    color: black;
    padding: 10px 20px; 
    border: none;
    border-radius: 5px;
    cursor: pointer; 
    font-size: 16px; " type="button" onclick="addFeature()">Add Feature</button>
                            </div>
                            <input type="hidden" name="features" id="hiddenFeatures">
                        </div>
                        <br>
                    </div>
                </div>
                <!-- Save and Cancel Buttons -->
                <div class="panel-body" style="display: flex; justify-content: center;">
                    <div class="form-actions">
                        <input style="background-color:#23D375FF;color:black;" type="submit" name="commit" value="Save product" class="btn">
                        <a style="color:#228b22;" class="btn btn-default" href="suppliardashboard.php">Dashboard</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

    
</body>


<script>
$(document).ready(function(){
    $('.remove-tag').click(function(){
        var certificate = $(this).parent().find('.tag-text').text().trim();
        $(this).parent().remove(); // Remove the parent div containing the tag and button
        
        // Get the current value of the hidden input
        var currentValue = $('#modifiedfeaturesInput').val();
        
        // Remove the certificate from the value
        var updatedValue = currentValue.split(',').filter(function(cert) {
            return cert.trim() !== certificate;
        }).join(',');
        
        // If all certificates are removed, set the updated value to null
        if (updatedValue === '') {
            updatedValue = null;
        }
        
        // Update the hidden input field with the modified string
        $('#modifiedfeaturesInput').val(updatedValue);
        
    });
});
</script>


<script>
            let featuresArray = [];

function addFeature(event) {
    const featureTags = document.getElementById("featureTags");
    const featureInput = document.getElementById("featureInput");
    const hiddenFeatures = document.getElementById("hiddenFeatures");

    const featureValue = featureInput.value.trim();

    if ((event && event.key === "Enter") || !event) {
        // If Enter key is pressed or the function is called without an event (button click)
        if (featureValue !== "") {
            featuresArray.push(featureValue);
            
            // Create a tag element
            const tagElement = document.createElement("div");
            tagElement.classList.add("tag");

            // Add text content to the tag
            const tagText = document.createElement("span");
            tagText.classList.add("tag-text");
            tagText.textContent = featureValue;

            // Add remove button (x) to the tag
            const removeButton = document.createElement("span");
            removeButton.innerHTML = "&times;";
            removeButton.classList.add("tag-remove");
            removeButton.onclick = function() {
                // Remove the tag from the array
                featuresArray = featuresArray.filter(tag => tag !== featureValue);

                
                
                // Remove the tag from the display
                tagElement.remove();

                // Update hidden input
                updateHiddenFeatures();
            };

            // Append elements to the tag
            tagElement.appendChild(tagText);
            tagElement.appendChild(removeButton);

            // Append tag to the display area
            featureTags.appendChild(tagElement);

            // Update hidden input
            updateHiddenFeatures();

            // Clear the input field
            featureInput.value = "";

            // Prevent form submission on Enter key press
            if (event) {
                event.preventDefault();
            }
        }
    }
}

function updateHiddenFeatures() {
    // Update hidden input with comma-separated features
    document.getElementById("hiddenFeatures").value = featuresArray.join(',');

    
}

function updatefinalfeatures(){
    var modifiedFeaturesInput = document.getElementById("modifiedfeaturesInput");
    var currentFeatures = modifiedFeaturesInput.value.trim(); // Get current value and remove leading/trailing whitespace
    if (currentFeatures !== '') {
        // If current value is not empty, append comma before adding new features
        currentFeatures += ',';
    }
    currentFeatures += featuresArray.join(',');
    modifiedFeaturesInput.value = currentFeatures;
    document.getElementById("hiddenFeatures").value = currentFeatures;
}
</script>

</html>