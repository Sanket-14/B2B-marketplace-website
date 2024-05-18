
<?php 
require('dbcon.php');
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="add_listing.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
    <!-- above link for business categories -->
    <title>Voltbridge - Add Your Company</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
   
</head>
<body>
    <div class="navbar">
        <a class="navbar-brand" href="#">VoltBridge</a>
        <div class="navbar-links">
            <a href="index.php">Home</a>
        </div>
    </div>

    <!-- FORM -->
    
    <div class="container">
    <div class="add-listing-form">
    <form action="add_listing.php" method="POST" enctype="multipart/form-data">

    <div class="labelprop">
                    
                    <div class="form-group">
                        <small><label style="color:#1853b9" for="companyName">Company Name*</label></small>
                        <input type="text" class="form-control" id="companyName" name="companyName" required>
                    </div>
    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <small><label style="color:#1853b9" for="companyRegion">Company Region*</label></small>
                            <select class="form-control" id="companyRegion" name="companyRegion">
                                <option value="Africa">Africa</option>
                                <option value="Asia">Asia</option>
                                <option value="Europe">Europe</option>
                                <option value="North America">North America</option>
                                <option value="Oceania">Oceania</option>
                                <option value="South America">South America</option>
                            </select>
                        </div>
    
                        <div class="form-group col-md-6">
                            <small><label style="color:#1853b9" for="countryRegistration">Country of Company Registration*</label></small>
                            <input type="text" class="form-control" id="countryRegistration" name="countryRegistration" required>
                        </div>
                    </div>
    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <small><label style="color:#1853b9" for="city">City*</label></small>
                            <input type="text" class="form-control" id="city" name="city">
                        </div>
    
                        <div class="form-group col-md-6">
                            <small><label style="color:#1853b9" for="contactno">Contact Number*</label></small>
                            <input type="text" class="form-control" id="contactno" name="contactno" placeholder="eg. +91-9022545260">
                        </div>
    
    
                    </div>
    
                    <div class="form-group">


<small><label style="color:#1853b9" for="companyOverview">Company Overview*</label></small>
                        <textarea class="form-control" id="companyOverview" name="companyOverview" rows="2"
                            required></textarea>
                    </div>
    
                    <!-- <div class="form-group">
                        <small><label style="color:#1853b9" for="businessCategories">Business Categories (Select up to 6)*</label></small>
                        <input type="text" class="form-control" id="businessCategories" name="businessCategories">
                    </div> -->

                    <div class="form-group">
                                <small>
                                    <label style="color:#1853b9" for="businessCategories">
                                        Business Categories (Add up to 6 categories to describe your business)&nbsp;
                                        <span class="info-icon" aria-label="Categories Information">
                                            <span class="info-tooltip">
                                                What products or services do you want to offer?<br>
                                                  Eg. Drivetrain, Copper Castings, Moulding plaster etc
                                            </span>
                                            ⓘ
                                        </span>
                                    </label>
                                </small>
                                <!-- <input type="text" class="form-control" id="businessCategories" name="businessCategories"> -->

                                <!-- below dropdown for business categories -->
                                <select name="businessCategories" id="businessCategories" multiple>
    <option value="Casting parts">Casting parts</option>
    <option value="Fasteners">Fasteners</option>
    <option value="Forged parts">Forged parts</option>
    <option value="Machined parts">Machined parts</option>
    <option value="Magnets">Magnets</option>
    <option value="Gears">Gears</option>
    <option value="Shafts">Shafts</option>
    <option value="Metal parts">Metal parts</option>
    <option value="Plastic Injection Moulding parts">Plastic Injection Moulding parts</option>
    <option value="Thermals">Thermals</option>
    <option value="Heat exchangers">Heat exchangers</option>
    <option value="Lubrication parts">Lubrication parts</option>
    <option value="Stamped parts">Stamped parts</option>
    <option value="Precision Stamping">Precision Stamping</option>
    <option value="Cold Stamping">Cold Stamping</option>
    <option value="Hot Stamping">Hot Stamping</option>
    <option value="Bearings">Bearings</option>
    <option value="Electronics">Electronics</option>
    <option value="Sensors">Sensors</option>
    <option value="Labels">Labels</option>
    <option value="Coatings">Coatings</option>
    <option value="Insulation parts">Insulation parts</option>
    <option value="Bushings">Bushings</option>
    <option value="Aluminium die casting">Aluminium die casting</option>
    <option value="Electric Motors parts">Electric Motors parts</option>
    <option value="3D Printing parts">3D Printing parts</option>
    <option value="Packaging Solution">Packaging Solution</option>
    <option value="Tools">Tools</option>
    <option value="Stator parts">Stator parts</option>
    <option value="Tube forming">Tube forming</option>
    <option value="Iron casting">Iron casting</option>
    <option value="Forging machining">Forging machining</option>
    <option value="PCBA">PCBA</option>
    <option value="Vehicle glass">Vehicle glass</option>
    <option value="Seats">Seats</option>
    <option value="Charging">Charging</option>
    <option value="Energy Storage products">Energy Storage products</option>
    <option value="Extrusions">Extrusions</option>
    <option value="Spare parts">Spare parts</option>
    <option value="Thermal Management">Thermal Management</option>
    <option value="Raw Materials">Raw Materials</option>
    <option value="Battery Components">Battery Components</option>
    <option value="Electronic Control Unit">Electronic Control Unit</option>
    <option value="Consulting">Consulting</option>
    <option value="Engineering Services">Engineering Services</option>
    <option value="3D Printing">3D Printing</option>
    <option value="Prototyping">Prototyping</option>
    <option value="Software Solution">Software Solution</option>
    <option value="IT Services">IT Services</option>
    <option value="Charging Infrastructure">Charging Infrastructure</option>
    <option value="Packaging Solutions">Packaging Solutions</option>
    <option value="Sorting">Sorting</option>
    <option value="EV Battery recycling">EV Battery recycling</option>
    <option value="EV Battery Management">EV Battery Management</option>
    <option value="EV Battery Storage">EV Battery Storage</option>
    <option value="EV Battery Shipping">EV Battery Shipping</option>
    <option value="EV Battery end of life management">EV Battery end of life management</option>
    <option value="Freight forwarder services">Freight forwarder services</option>
    <option value="Automation services">Automation services</option>
    <option value="Simulation Services">Simulation Services</option>
    <option value="Punched parts">Punched parts</option>
    <option value="Gaskets">Gaskets</option>
    <option value="Springs">Springs</option>
    <option value="Winding Wire">Winding Wire</option>
    <option value="Copper parts">Copper parts</option>
    <option value="CNC Machining">CNC Machining</option>
    <option value="Prototype Tooling">Prototype Tooling</option>
    <option value="Laser Processing">Laser Processing</option>
    <option value="Precision Machining">Precision Machining</option>
    <option value="Rubber Injection Moulding parts">Rubber Injection Moulding parts</option>
    <option value="Capacitors">Capacitors</option>
    <option value="Charging modules">Charging modules</option>
    <option value="Sheet metal forming">Sheet metal forming</option>
    <option value="Infotainment systems">Infotainment systems</option>
    <option value="Switches">Switches</option>
    <option value="Plastic">Plastic</option>
    <option value="Drivetrain/ Driveunit">Drivetrain/ Driveunit</option>
    <option value="Castings">Castings</option>
    <option value="Interior & Exterior">Interior & Exterior</option>
    <option value="Thermal">Thermal</option>
    <option value="Machining">Machining</option>
    <option value="Busbars">Busbars</option>
    <option value="Bevel gears">Bevel gears</option>
</select>

                            <div class="small-tabs">

                            </div>
    
                    <div class="form-row">


                    <div class="form-group col-md-6">
                        <small><label style="color:#1853b9" for="supplierType">Supplier Type*</label></small>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="distributor" name="supplierType[]"
                                value="Distributor">
                            <label class="form-check-label" for="distributor">Distributor</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="manufacturer" name="supplierType[]"
                                value="Manufacturer">
                            <label class="form-check-label" for="manufacturer">Manufacturer</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="wholesaler" name="supplierType[]"
                                value="Wholesaler">
                            <label class="form-check-label" for="wholesaler">Wholesaler</label>
                        </div>
                    </div>
    
                    <div class="form-group col-md-6">
                        <small><label style="color:#1853b9" for="productionVolume">Production Volume Capability*</label></small>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="prototype" name="productionVolume[]"
                                value="Prototype">
                            <label class="form-check-label" for="prototype">Prototype</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="lowVolume" name="productionVolume[]"
                                value="Low Volume Serial Production">
                            <label class="form-check-label" for="lowVolume">Low Volume Serial Production</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="highVolume" name="productionVolume[]"


                            value="High Volume Serial Production">
                            <label class="form-check-label" for="highVolume">High Volume Serial Production</label>
                        </div>
                    </div>
                </div>
    
    
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <small><label style="color:#1853b9" for="yearFounded">Year Founded*</label></small>
                            <input type="text" class="form-control" id="yearFounded" name="yearFounded" required>
                        </div>
    
                        <div class="form-group col-md-6">
                            <small><label style="color:#1853b9" for="companySize">Company Size*</label></small>
                            <select class="form-control" id="companySize" name="companySize">
                                <option value="1-50 employees">1-50 employees</option>
                                <option value="51-200 employees">51-200 employees</option>
                                <option value="201-500 employees">201-500 employees</option>
                                <option value="501-1000 employees">501-1000 employees</option>
                                <option value="1001-5000 employees">1001-5000 employees</option>
                                <option value="5000+ employees">5000+ employees</option>
                            </select>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <small><label style="color:#1853b9" for="companyCertificates">Company Certificates*</label></small>
                        <input type="text" class="form-control" id="companyCertificates" name="companyCertificates">
                    </div>
    
                    <div class="form-group">
                        <small><label style="color:#1853b9" for="companyWebsite">Company Website URL*</label></small>
                        <input type="text" class="form-control" id="companyWebsite" name="companyWebsite">
                    </div>
    
                    <div class="form-group row">
                        <label style="color:#1853b9" for="logo" class="col-sm-2 col-form-label col-form-label-sm mt-1">Company Logo*</label>
                        <div class="col-sm-6">
                            <input type="file" class="form-control-file mt-1" id="logo" name="logo" accept="image/*">
                        </div>
                    </div>
                </div>
    
                 
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="termsConditions" name="termsConditions" required>
                        <label class="form-check-label" for="termsConditions">By submitting the form, I accept the Terms of
                            Use and the General Terms and Conditions. I have acknowledged the Data Privacy.</label>
                    </div><br>

                <div class="center-btn">
                    <button type="submit" class="btn btn-primary" >Submit</button>
                </div>
                

    </div>
    </form>
    </div>
    
</div>
    

    <!-- PHP AND SQL -->
    
<?php


// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $comp_name = $_POST['companyName'];
    $Region = $_POST['companyRegion'];
    $Country = $_POST['countryRegistration'];
    $city = $_POST['city'];
    $contactno = $_POST['contactno'];
    $Company_Overview = $_POST['companyOverview'];

    $Categories = $_POST['businessCategories']; // Assuming an array is submitted -- to be done


    // $Supplier_type = $_POST['supplierType']; // Assuming an array is submitted (old)
    $Supplier_type = isset($_POST['supplierType']) ? $_POST['supplierType'] : array(); // (new works properly)Assuming an array is submitted
    // Implode the array of selected values into a comma-separated string
    $Supplier_type_str = implode(', ', $Supplier_type);

    // $PV_capacity = $_POST['productionVolume']; // Assuming an array is submitted (old stores array directly)
    $PV_capacity = isset($_POST['productionVolume']) ? $_POST['productionVolume'] : array(); // Assuming an array is submitted
    // Implode the array of selected production volumes into a comma-separated string       
    $PV_capacity_str = implode(', ', $PV_capacity);


    // $Categories = implode(", ", $_POST['businessCategories']); // Convert array to string
    // $Supplier_type = implode(", ", $_POST['supplierType']); // Convert array to string
    // $PV_capacity = implode(", ", $_POST['productionVolume']); // Convert array to string

    $Year_Founded = $_POST['yearFounded'];
    $Company_Size = $_POST['companySize'];
    $Company_Certificates = $_POST['companyCertificates'];
    $Website = $_POST['companyWebsite'];

    // Handling the image upload (if file exists)
    if (isset($_FILES['logo'])) {
        $img_name = $_FILES['logo']['name'];
      $img_size = $_FILES['logo']['size'];
      $tmp_name = $_FILES['logo']['tmp_name'];
      $error = $_FILES['logo']['error'];

        if ($error === 0) {
            if ($img_size > 125000) {
                $em = "Sorry, your file is too large.";
                header("Location: add_listing.php?error=$em");
            }else {
                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_lc = strtolower($img_ex);
    
                $allowed_exs = array("jpg", "jpeg", "png"); 
    
                if (in_array($img_ex_lc, $allowed_exs)) {
                    $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                    $img_upload_path = 'uploads/'.$new_img_name;
                    move_uploaded_file($tmp_name, $img_upload_path);
    
                    // Insert into Database
                    // $sql = "INSERT INTO images(image_url) 
                    //         VALUES('$new_img_name')";
                    // mysqli_query($conn, $sql);
                    // header("Location: view.php");
                    $logo=$new_img_name;
                }else {
                    $em = "You can't upload files of this type";
                    header("Location: add_listing.php?error=$em");
                }
            }
        }else {
            $em = "unknown error occurred!";
            header("Location: add_listing.php?error=$em");
        }


    } else {
        $logo = NULL;
    }

    // SQL query to insert into the Add_listing table
    $sql = "INSERT INTO voltbridge.Add_listing (comp_name, Region, Country, city, Contact_Number, Company_Overview, Categories, Supplier_type, PV_capacity, Year_Founded, Company_Size, Company_Certificates, Website, image_url)
    VALUES ('$comp_name', '$Region', '$Country', '$city','$contactno', '$Company_Overview', '$Categories','$Supplier_type_str', '$PV_capacity_str', '$Year_Founded', '$Company_Size', '$Company_Certificates', '$Website', '$logo')";

    // Executing the query
    if ($conn->query($sql) === TRUE) {
        // echo "New record inserted successfully;"
        // Redirect to thankyou.php
        echo '<script type="text/javascript">window.location.href = "thankyou.php";</script>';
        exit(); // Ensure that no further code is executed after the redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Closing the connection
?>

   <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- below for business categories -->
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('businessCategories')  // id
    </script>


</body>

</html>