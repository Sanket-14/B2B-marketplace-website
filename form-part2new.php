<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css"> -->
    <link rel="stylesheet" href="multi_select_tag.css">
    <script src="multi_select_tag.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="./form-part2new.css">
    <title>Voltbridge - Add Your Company-3</title>
    
    <style>
    #locationTags {
    display: flex;
    flex-wrap: wrap;
   }

.tag {
    background-color: transparent;
    margin: 5px;
    padding: 5px;
    border-radius: 5px;
    border: 2px solid darkgreen; /* Set dark green border */
    display: flex;
    align-items: center;
}

.tag .tag-text {
    margin-right: 5px;
    color: darkgreen; /* Set dark green text color */
}

.tag .tag-remove {
    padding-left: 5px;
    cursor: pointer;
}


    </style>
</head>
<body>



    <nav class="navbar navbar-default navbar-expand-lg shadow navbar-light" style="height: 3.5rem;">
        <div class="container-fluid">
          <div class="navbar-header">
            <img src="./images/vblogo.jpg" style="width: 17px; height: auto; margin-left: 15px; margin-bottom: 10px;">
            <strong><a class="navbar-brand" href="./index.php">Volt<span style="color: rgb(40, 212, 120); ">Bridge</span></a></strong>
          </div>
        </div>
    </nav>
    <!-- <div class="row">
        <div class="col-lg-12 fs-6 m-3">
            <h2>Welcome to Voltbridge!</h2><br>
            <h4>Elevate your B2B presence and fuel business growth online.<h4>
        </div>

    </div> -->
   

    <!----------------------- Main Container -------------------------->

<div class="container d-flex justify-content-center align-items-center " style="min-height: 130vh;">

    <!-- -------------------------left right containers----------------------- -->
        
   <div class="row">

    <!-- ------------------------------------------------------------- -->

    <div class="col-lg-4">
        <div class="row border rounded-5 p-3 shadow box bg-white">

            <div class="featured-image">
              <div class="row">
                <img src="./images/vbsteph3w.png" alt="" class="img-fluid rounded-circle" style="max-width: 100%;">
                    
              </div>
           </div> 
    
        </div>
    </div>
    
    
    

    <!-- ---------------------spacing betn to cards--------------------------- -->

    <div class="col-lg-1">
    </div>

    <!-- -----------------------right card------------------------- -->

    <div class="col-lg-7">
        
    <!----------------------- content-------------------------->
    <div class="row border rounded-5 p-1 bg-light shadow box-area" >

        <div class="col-lg-12 col-sm-12 right-box">
          <div class="row">
                <div class="header-text mb-4">
                     <!-- <h3 style="text-align: center;">Welcome to <strong><a class="navbar-brand" href="#">Volt<span style="color: rgb(40, 212, 120); ">Bridge</span></a></strong></h3>
                     <p style="text-align: center;">Elevate your B2B presence and fuel business growth online.</p>
                     <hr class="my-4" style="border-color: #020000;"> -->
                     <h4 style="color: grey;">Step 3: Capabilities Information</h4>
                     <hr class="my-4" style="border-color: #020000;"> 

                </div>
            </div>

            <div class="add-listing-form">
            <form id="part2Form" action="store_part2_data.php" method="POST" enctype="multipart/form-data">
                <div class="labelprop">
                    <div class="form-part-2">


                        
                            
                
                            <div class="row">
                                <div class="col-lg-11">
                                    <div class="form-group">
                                        
                                            <label style="margin-bottom:10px;" for="businessCategories">
                                                Business Categories<span style="color: red;">*</span><small style="color: rgb(35, 162, 35);">&nbsp;&nbsp;(Add up to 6 categories to describe your business)</small>
                                            </label>
                                            <i class="info-icon" data-toggle="tooltip" data-placement="right" 
                                            title="What products or services do you want to offer? Eg. Drivetrain, Copper Castings, Moulding plaster etc"> ⓘ</i>


                                            <select name="businessCategories[]" id="businessCategories" multiple>
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
                                    </div>
                                </div>

                                <!-- -------------------------------------------------------------------- -->

                                <!-- <div class="row">
                                    <div class="col-lg-11">
                                        <div class="form-group">
                                        <p id="warning-message" style="color: red; display: none;"></p>

                                </div>
                            </div> -->



                            


                            
                            <div class="row"></div>

                            <!-- -------------------------------------------------------------------- -->

                            <div class="row" style="margin:0; padding:0;">
                                <div class="form-group col-lg-11">
                                    <label  style="margin-bottom:10px;" for="companySize">Company Size<span style="color: red; ">*</span></label>
                                    
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

                            <div class="row"></div>

                            <div class="row" style="margin:0; padding:0;">
                                <div class="form-group col-lg-11">
                                    <label style="margin-bottom:10px;" for="companyCertificates">Company Certificates</label>
                                    
                                        <select name="companyCertificates[]" id="companyCertificates" multiple>
                                            <option value="Not Applicable">Not Applicable</option>
                                            <option value="IATF 16949:2016">IATF 16949:2016</option>
                                            <option value="IATF 16949">IATF 16949</option>
                                            <option value="ISO 14001:2015">ISO 14001:2015</option>
                                            <option value="ISO 50001: 2018">ISO 50001: 2018</option>
                                            <option value="ISO 450001">ISO 450001</option>
                                            <option value="ISO/IEC 17025">ISO/IEC 17025</option>
                                            <option value="DIN ISO 9001:2015">DIN ISO 9001:2015</option>
                                            <option value="DIN EN ISO 14001">DIN EN ISO 14001</option>
                                            <option value="DIN EN ISO 9001">DIN EN ISO 9001</option>
                                            <option value="DIN EN ISO 14001:1996">DIN EN ISO 14001:1996</option>
                                            <option value="DIN EN ISO 9001:2000">DIN EN ISO 9001:2000</option>
                                            <option value="EN 9100:2018">EN 9100:2018</option>
                                        </select>
                                </div>
                            </div>

                            <div class="row"><br></div>


                           


                            <!-- --------------------------------updated below for conditional display of manufacturing locations------------------------------------ -->
                            <div class="row">
                              <div class="col-md-12">
                             <div class="form-group">
                            <label for="supplierType">Supplier Type<span style="color: red;">*</span><span>&nbsp;&nbsp;:</span></label>&nbsp;

                              <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="distributor" name="supplierType[]" value="Distributor">
                           <small><label class="form-check-label" for="distributor">Distributor</label></small>
                            </div>
            <div class="form-check form-check-inline">
                <input type="checkbox" class="form-check-input" id="manufacturer" name="supplierType[]"
                    value="Manufacturer" onchange="toggleManufacturingLocationsInput()">
                <small><label class="form-check-label" for="manufacturer">Manufacturer</label></small>
            </div>
            <div class="form-check  form-check-inline">
                <input type="checkbox" class="form-check-input" id="wholesaler" name="supplierType[]"
                    value="Wholesaler">
                <small><label class="form-check-label" for="wholesaler">Service Provider</label></small>
            </div>
        </div>
    </div>
</div>
<div class="row"><br></div>

<!-- -------------------------------------------------------------------- -->


<div class="row" id="manufacturingLocationsRow" style="display: none;">
<div class="row">
    <div class="col-lg-12">
        <div class="form-group">
            <label for="locationInput">Manufacturing Locations<small><span
                        style="color: rgb(35, 162, 35);">&nbsp;&nbsp;(For Supplier Type - Manufacturer only)</span></small></label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="form-group">
            <div>
                <input class="text form-control" id="locationInput"
                    placeholder="Enter Manufacturing Plant Locations" onkeydown="return addMlocation(event)"
                    style="border-radius: 4; margin-bottom: 5px; border-color: grey;">
            </div>
            <div>
                <input type="hidden" name="mlocationString" id="locationFeatures">
            </div>
            <div id="locationTags"></div>
            <!-- this is the working code for location tags -->
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group ">
            <button class="btn btn-default"
                style="background-color: rgb(25,135,84); color:white; border-radius: 4; height: 2.2rem;" type="button"
                onclick="addMlocation()">Add Location</button>
        </div>
    </div>
</div>
</div>

<div class="row"><br></div>

<script>
    function toggleManufacturingLocationsInput() {
        const manufacturingLocationsRow = document.getElementById('manufacturingLocationsRow');
        const manufacturerCheckbox = document.getElementById('manufacturer');

        if (manufacturerCheckbox.checked) {
            manufacturingLocationsRow.style.display = 'block';
        } else {
            manufacturingLocationsRow.style.display = 'none';
        }
    }
</script>

                
                           

                             <!-- -------------------------------------------------------------------- -->
                            

                            <!-- -------------------------------------------------------------------- -->



                            <label style="color:black; margin-bottom:10px;" for="productionVolume">Production Volume Capability<span style="color: red;">*</span><span>&nbsp;&nbsp;:</span></label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                             <!-- <label style="color:black" for="productionVolume">Production Volume Capability<span style="color: red;">*</span></label> -->
                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" id="prototype" name="productionVolume[]"
                                                  value="Prototype">
                                                  <small><label class="form-check-label" for="prototype">Prototype</label></small>
                                                 </div>

                                                <div class="form-check-inline">
                                                 <input type="checkbox" class="form-check-input" id="lowVolume" name="productionVolume[]"
                                                   value="Low Volume Serial Production">
                                                  <small><label class="form-check-label" for="lowVolume">Low Volume Serial Production</label></small>
                                                </div>

                                                <div class="form-check-inline">
                                                    <input type="checkbox" class="form-check-input" id="highVolume" name="productionVolume[]"
                                                      value="High Volume Serial Production">
                                                    <small><label class="form-check-label" for="highVolume">High Volume Serial Production</label></small>
                                                </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row"><br></div>

                           <!-- ------------------------------------------------------------------------- -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="companyOverview">Company Overview</label>
                                         <textarea class="form-control bg-light" id="companyOverview" name="companyOverview" rows="1" placeholder="25-50 Words"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div><br></div>

                                    

                <div class="input-group mb-3" style="justify-content:center">
                   <button id="submitPart2" class="btn btn-lg btn-success fs-6" style=" width: 20rem;">Submit</button>
               </div>

              </div>
            </div>

        </form>
    </div>


        

       </div> 

    </div>

    </div>
   </div>
    


</div>

<!-- below for business categories -->
<script>
    // new MultiSelectTag('businessCategories')  // for selection of upto 6 values
    new MultiSelectTag('businessCategories', { selectionLimit: 5, 
        rounded: true,    // default true
        shadow: false,      // default false
        // placeholder: 'Search',  // default Search...
        tagColor: {
        textColor: '#327b2c',
        borderColor: '#92e681',
        bgColor: '#eaffe6',
    }
    }); 
</script>

<script>
    // new MultiSelectTag('companyCertificates')   //for selection limit
    new MultiSelectTag('companyCertificates', { selectionLimit: Infinity,
        rounded: true,    // default true
        shadow: false,      // default false
        // placeholder: 'Search',  // default Search...
        tagColor: {
        // textColor: '#327b2c',
        // borderColor: '#92e681',
        // bgColor: '#eaffe6',
    }
    
    });
</script>




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











