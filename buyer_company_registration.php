
<?php
session_start();

require('dbcon.php');

// Check if companyName is provided in the GET method, otherwise use the session comp_name
$readonlyCompany = isset($_GET['companyName']) ? $_GET['companyName'] : (isset($_SESSION['comp_name']) ? $_SESSION['comp_name'] : '');

// Rest of your code...
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
<!-- integration perfomed -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>


    <link rel="stylesheet" href="./add_listing2.css">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css"> -->
    <!-- above link for business categories -->
    <title>Voltbridge - Add Your Company</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> -->

   
</head>

<style>
  
.arrow {
    position: absolute;
    top: 50%;
    right: 10px;
    transform: translateY(-50%);
    pointer-events: none; /* Ensure the arrow doesn't interfere with clicking the select */
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 5px solid #555; /* Color of the arrow */
}

</style>


<body id="listingbody">



<nav class="navbar navbar-default navbar-expand-lg shadow navbar-light" style="height: 3.5rem;">
        <div class="container-fluid">
          <div class="navbar-header">
            <img src="./images/vblogo.jpg" style="width: 17px; height: auto; margin-left: 15px; margin-bottom: 10px;">
            <strong><a class="navbar-brand" href="./index.php">Volt<span style="color: rgb(40, 212, 120); ">Bridge</span></a></strong>
          </div>
        </div>
    </nav>

   

    <!----------------------- Main Container -------------------------->

<div class="container container1 d-flex justify-content-center align-items-center " style="min-height: 95vh;">

    <!-- -------------------------left right containers----------------------- -->
        
   <div class="row">

    <!-- ------------------------------------------------------------- -->

    <div class="col-lg-4">
        <div class="row border rounded-5 p-3 shadow box bg-white">

            <div class="featured-image">
              <div class="row">
                <img id="3stepimages\user_first_step1.png" src="3stepimages\user_first_step1.png" alt="" class="img-fluid rounded-circle" style="max-width: 100%;">
                    
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
          

            <div class="container">
            <div class="row">
                <div class="header-text mb-4">
                     <!-- <h3 style="text-align: center;">Welcome to <strong><a class="navbar-brand" href="#">Volt<span style="color: rgb(40, 212, 120); ">Bridge</span></a></strong></h3>
                     <p style="text-align: center;">Elevate your B2B presence and fuel business growth online.</p>
                     <hr class="my-4" style="border-color: #020000;"> -->
                     <h4 style="color: grey;">Step 2: Company Key data</h4>
                     <hr class="my-4" style="border-color: #020000;">

                </div>
            </div>
  
             <div class="add-listing-form" >

            <form action="store_buyer_companydata.php" method="POST" enctype="multipart/form-data">
                <div class="labelprop">

                <div class="form-part-1">


                <div class="row">
                    <div class="col-lg-12">

                        <div class="form-group">
                            <label for="companyName">Company Name</label>
                        <input type="text" class="form-control bg-light compname" id="companyName" name="companyName" value="<?php echo htmlspecialchars($readonlyCompany); ?>" readonly>
                        </div>
                    </div>
                </div>



            <div class="row">
                

                <div class="form-group col-lg-12">
                <label for="buyer_address">Address</label>
                <textarea class="form-control bg-light" id="buyer_address" name="buyer_address" rows="2" placeholder="detail adrress"></textarea>
                </div>
            </div>


            <div class="row">
            <div class="form-group col-lg-4">
                            <label for="city">City<span style="color: red;">*</span></label>
                            <input type="text" class="form-control bg-light" id="city" name="city" placeholder="City" required>
                        </div>
                <div class="form-group col-lg-4">
                            <label for="city">State<span style="color: red;">*</span></label>
                            <input type="text" class="form-control bg-light" id="state" name="state" placeholder="State" required>
                        </div>
    
                        <div class="form-group col-lg-4">
                            <label for="contactno">Pincode<span style="color: red;">*</span></label>
                            <input type="text" class="form-control bg-light" id="contactno" name="contactno" placeholder="Pincode" required>
                        </div>
            </div>

            <div class="row">
                

                <div class="form-group col-lg-6">
                    <label for="countryRegistration">Country of Company Registration<span style="color: red;">*</span></label>
                    <input type="text" class="form-control bg-light" id="countryRegistration" name="countryRegistration" placeholder="Country" required>
                </div>
                <div class="form-group col-lg-6">
                <label for="companyWebsite">Company Website URL</label>
                <input type="text" class="form-control bg-light" id="companyWebsite" placeholder="Website URL" name="companyWebsite">
                </div>
            </div>

            

            <div class="row">
                <div class="form-group col-lg-6">
                    <label style="margin-bottom:10px;" for="company_type">Company type<span style="color: red; ">*</span></label>
                    <div class="dropdown">
                        <select class="form-control" id="company_type" name="company_type">
                            <option value="OMR">OMR</option>
                            <option value="tier 1">tier 1</option>
                            <option value="tier 2">tier 2</option>
                        </select>
                        <div class="arrow"></div> <!-- Arrow will be added here -->
                    </div>
                </div>
                <div class="form-group col-lg-6">
                    <label for="logo">Company Logo</label>
                        <input type="file" class="form-control-file mt-1" id="logo" name="logo" accept="image/*">
                 </div>
            </div>
                

            <div class="input-group mb-3" style="justify-content:center">
    <button class="btn btn-lg btn-success fs-6" style="width: 20rem;" type="submit">Submit</button>
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
    


</div>


 
</body>

</html>