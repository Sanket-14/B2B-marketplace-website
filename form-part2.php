<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="add_listing.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
    <!-- above link for business categories -->
    <title>Voltbridge - Add Your Company</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        #locationTags {
            display: flex;
            flex-wrap: wrap;
        }

        .tag {
        background-color: #e0e0e0;
        margin: 5px;
        padding: 5px;
        border-radius: 5px;
        display: flex;
        align-items: center;
    }

    .tag .tag-text {
        margin-right: 5px;
    }

    .tag .tag-remove {
        cursor: pointer;
    }

    </style>

</head>

<body>
    
    
 <div class="add-listing-form">
    <form id="part2Form" action="store_part2_data.php" method="POST" enctype="multipart/form-data">

        <div class="labelprop">
            <div class="form-part-2">

            <div class="row">
                <div class="header-text mb-4">
                     <!-- <h3 style="text-align: center;">Welcome to <strong><a class="navbar-brand" href="#">Volt<span style="color: rgb(40, 212, 120); ">Bridge</span></a></strong></h3>
                     <p style="text-align: center;">Elevate your B2B presence and fuel business growth online.</p>
                     <hr class="my-4" style="border-color: #020000;"> -->
                     <h4 style="color: grey;">Step 2: General Information</h4>

                </div>
            </div>


     <div class="form-group">
      <small><label style="color:black" for="companyOverview">Company Overview*</label></small>
       <textarea class="form-control" id="companyOverview" name="companyOverview" rows="2" required></textarea>
     </div>

<!-- <div class="form-group">
    <small><label style="color:black" for="businessCategories">Business Categories (Select up to 6)*</label></small>
    <input type="text" class="form-control" id="businessCategories" name="businessCategories">
</div> -->

         <div class="form-group">
            <small>
                <label style="color:black" for="businessCategories">
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
            <select name="businessCategories[]" id="businessCategories" multiple>
                    <option value="3D Printing">3D Printing</option>
<option value="3D Printing parts">3D Printing parts</option>
<option value="Alternate Fuel System">Alternate Fuel System</option>
<option value="Aluminium die casting">Aluminium die casting</option>
<option value="Automation services">Automation services</option>
<option value="Bearings">Bearings</option>
<option value="Bevel gears">Bevel gears</option>
<option value="Boxes">Boxes</option>
<option value="Brakes">Brakes</option>
<option value="Bushings">Bushings</option>
<option value="Busbars">Busbars</option>
<option value="Capacitors">Capacitors</option>
<option value="Castings">Castings</option>
<option value="Casting parts">Casting parts</option>
<option value="Charge Air Coolers">Charge Air Coolers</option>
<option value="Charging">Charging</option>
<option value="Charging Infrastructure">Charging Infrastructure</option>
<option value="Charging modules">Charging modules</option>
<option value="Clutch">Clutch</option>
<option value="Coatings">Coatings</option>
<option value="Cold Stamping">Cold Stamping</option>
<option value="Cold plates">Cold plates</option>
<option value="Consulting">Consulting</option>
<option value="Copper parts">Copper parts</option>
<option value="Digital Display">Digital Display</option>
<option value="Drivetrain/ Driveunit">Drivetrain/ Driveunit</option>
<option value="Electric Motors parts">Electric Motors parts</option>
<option value="Electric Vehicle">Electric Vehicle</option>
<option value="Electrical">Electrical</option>
<option value="Electronic Control Unit">Electronic Control Unit</option>
<option value="Electronics">Electronics</option>
<option value="Energy Storage products">Energy Storage products</option>
<option value="EV Battery Management">EV Battery Management</option>
<option value="EV Battery Shipping">EV Battery Shipping</option>
<option value="EV Battery Storage">EV Battery Storage</option>
<option value="EV Battery recycling">EV Battery recycling</option>
<option value="Extrusions">Extrusions</option>
<option value="Fasteners">Fasteners</option>
<option value="Forged parts">Forged parts</option>
<option value="Forging machining">Forging machining</option>
<option value="Freight forwarder services">Freight forwarder services</option>
<option value="Gaskets">Gaskets</option>
<option value="Gauges">Gauges</option>
<option value="Gears">Gears</option>
<option value="Gears & Transmission">Gears & Transmission</option>
<option value="High precision Plastic Components">High precision Plastic Components</option>
<option value="Hot Stamping">Hot Stamping</option>
<option value="Infotainment systems">Infotainment systems</option>
<option value="Injection mould">Injection mould</option>
<option value="Insulation parts">Insulation parts</option>
<option value="Instrument Clusters">Instrument Clusters</option>
<option value="Interior & Exterior">Interior & Exterior</option>
<option value="IT Services">IT Services</option>
<option value="Labels">Labels</option>
<option value="Laser Processing">Laser Processing</option>
<option value="Lubrication parts">Lubrication parts</option>
<option value="Machined parts">Machined parts</option>
<option value="Machining">Machining</option>
<option value="Magnets">Magnets</option>
<option value="Mechatronics">Mechatronics</option>
<option value="Metal parts">Metal parts</option>
<option value="Microcellular polyurethane">Microcellular polyurethane</option>
<option value="Packaging Solutions">Packaging Solutions</option>
<option value="PCBA">PCBA</option>
<option value="Plastic">Plastic</option>
<option value="Plastic Injection Moulding parts">Plastic Injection Moulding parts</option>
<option value="Pumps">Pumps</option>
<option value="Prototype Tooling">Prototype Tooling</option>
<option value="Prototyping">Prototyping</option>
<option value="Punched parts">Punched parts</option>
<option value="Radiators">Radiators</option>
<option value="Raw Materials">Raw Materials</option>
<option value="Rubber">Rubber</option>
<option value="Rubber Injection Moulding parts">Rubber Injection Moulding parts</option>
<option value="Rubber components">Rubber components</option>
<option value="Seats">Seats</option>
<option value="Sensors">Sensors</option>
<option value="Sheet Metal Stamping">Sheet Metal Stamping</option>
<option value="Sheet metal forming">Sheet metal forming</option>
<option value="Simulation Services">Simulation Services</option>
<option value="Software Solution">Software Solution</option>
<option value="Sorting">Sorting</option>
<option value="Spare parts">Spare parts</option>
<option value="Springs">Springs</option>
<option value="Stator parts">Stator parts</option>
<option value="Stamped parts">Stamped parts</option>
<option value="Switches">Switches</option>
<option value="Thermals">Thermals</option>
<option value="Thermoplastic">Thermoplastic</option>
<option value="Tools">Tools</option>
<option value="Tube forming">Tube forming</option>
<option value="Valves and Actuators">Valves and Actuators</option>
<option value="Vehicle glass">Vehicle glass</option>
<option value="Winding">Winding</option>


                </select>

        <div class="small-tabs">

        </div><br>

 <div class="form-row">


<div class="form-group col-md-6">
    <small><label style="color:black" for="supplierType">Supplier Type*</label></small>
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
    <small><label style="color:black" for="productionVolume">Production Volume Capability*</label></small>
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



   <label for="mlocationString">Manufacturing Locations:</label>
    <div>
    <input type="text" id="locationInput" placeholder="Enter Manufacturing Plant Locations" onkeydown="return addMlocation(event)" style="width:350px">
        <button style="background-color:grey" type="button" onclick="addMlocation()">Add Location</button>
    </div>                                     
        <input type="hidden" name="mlocationString" id="locationFeatures">
    </div>
    <div id="locationTags"></div>

<div class="form-row">
    

    <div class="form-group col-md-6">
        <small><label style="color:black" for="companySize">Company Size*</label></small>
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


<!-- 
<div class="form-group">
    <small><label style="color:black" for="companyCertificates">Company Certificates*</label></small>
    <input type="text" class="form-control" id="companyCertificates" name="companyCertificates">
</div> -->

<div class="form-group">
    <small>
    <label style="color:#000000" for="companyCertificates">Company Certificates*&nbsp;
        <!-- <span class="info-icon" aria-label="Categories Information">
        <span class="info-tooltip">
                What products or services do you want to offer?<br>
                Eg. Drivetrain, Copper Castings, Moulding plaster etc
                 </span>
                ⓘ
        </span> -->
    </label>
    </small>

    <!-- below dropdown for certificates -->
    <select name="companyCertificates[]" id="companyCertificates" multiple>
    <option value="BS-OHSAS 18001">BS-OHSAS 18001</option>
<option value="DIN EN ISO 14001">DIN EN ISO 14001</option>
<option value="DIN EN ISO 9001">DIN EN ISO 9001</option>
<option value="DIN ISO 9001:2015">DIN ISO 9001:2015</option>
<option value="EMS 14001:2009">EMS 14001:2009</option>
<option value="EN 9100:2018">EN 9100:2018</option>
<option value="IATF 16949">IATF 16949</option>
<option value="ISO 450001">ISO 450001</option>
<option value="ISO 50001: 2018">ISO 50001: 2018</option>
<option value="ISO/IEC 17025">ISO/IEC 17025</option>
<option value="ISO/TS 16949">ISO/TS 16949</option>
<option value="ISO TS: 16862">ISO TS: 16862</option>
<option value="ISO 9002:1994">ISO 9002:1994</option>
<option value="ISO/TS 16949:2002">ISO/TS 16949:2002</option>
<option value="Not Applicable">Not Applicable</option>
<option value="OHSAS 18001:2007">OHSAS 18001:2007</option>
<option value="QS 9000">QS 9000</option>
<option value="QS 9000:1998">QS 9000:1998</option>
<option value="TS 16949">TS 16949</option>


</select>

<div class="small-tabs">
</div><br>

<!-- 
</div> -->

<div class="form-check">
    <input type="checkbox" class="form-check-input" id="termsConditions" name="termsConditions" required>
    <label class="form-check-label" for="termsConditions">By submitting the form, I accept the Terms of
        Use and the General Terms and Conditions. I have acknowledged the Data Privacy.</label>
</div><br>

<div class="center-btn">
<button type="submit" id="submitPart2" class="btn btn-primary" >Submit</button>
</div>

            </div>
     </div>
    </form>
</div>



    <!-- below for business categories -->
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('businessCategories')  // id
    </script>

    <script>
        new MultiSelectTag('companyCertificates')  // id
    </script>

    <!-- below for business categories validation up to 6 categories not working-->
<!-- <script>
  function validateCategories() {
    var selectElement = document.getElementById('businessCategories');
    var selectedOptions = selectElement.selectedOptions;

    // Function to update the UI based on the number of selected options
    function updateSelectionCount() {
      if (selectedOptions.length > 6) {
        document.getElementById('selectionMessage').innerText = 'Please select only up to 6 categories.';
      } else {
        document.getElementById('selectionMessage').innerText = '';
      }
    }

    // Add event listener to the dropdown to trigger the update on change
    selectElement.addEventListener('change', updateSelectionCount);

    if (selectedOptions.length > 6) {
      alert('Please select only up to 6 categories.');

      // Disable additional selections
      for (var i = 6; i < selectElement.options.length; i++) {
        selectElement.options[i].disabled = true;
      }

      return false;
    }

    // Enable all options in case the user goes back and corrects the selection
    for (var i = 0; i < selectElement.options.length; i++) {
      selectElement.options[i].disabled = false;
    }

    return true;
  }
</script> -->


<!-- for manufacturing locations, tags input -->
<script>
let mlocationArray = [];

function addMlocation(event) {
    const locationTags = document.getElementById("locationTags");
    const locationInput = document.getElementById("locationInput");
    const locationFeatures = document.getElementById("locationFeatures");

    const locationValue = locationInput.value.trim();

    if ((event && event.key === "Enter") || !event) {
        // If Enter key is pressed or the function is called without an event (button click)
        if (locationValue !== "") {
            mlocationArray.push(locationValue);
            
            // Create a tag element
            const tagElement = document.createElement("div");
            tagElement.classList.add("tag");

            // Add text content to the tag
            const tagText = document.createElement("span");
            tagText.textContent = locationValue;

            // Add remove button (x) to the tag
            const removeButton = document.createElement("span");
            removeButton.innerHTML = "&times;";
            removeButton.classList.add("tag-remove");
            removeButton.onclick = function() {
                // Remove the tag from the array
                mlocationArray = mlocationArray.filter(tag => tag !== locationValue);
                
                // Remove the tag from the display
                tagElement.remove();

                // Update hidden input
                updateHiddenFeatures();
            };

            // Append elements to the tag
            tagElement.appendChild(tagText);
            tagElement.appendChild(removeButton);

            // Append tag to the display area
            locationTags.appendChild(tagElement);

            // Update hidden input
            updateHiddenFeatures();

            // Clear the input field
            locationInput.value = "";

            // Prevent form submission on Enter key press
            if (event) {
                event.preventDefault();
            }
        }
    }
}

function updateHiddenFeatures() {
    // Update hidden input with comma-separated features
    document.getElementById("locationFeatures").value = mlocationArray.join(',');
}
</script>


</body>
</html>