<?php
require('dbcon.php');
$error = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data - new input way for security against XSS Attack.
    $firstName = isset($_POST['firstName']) ? htmlspecialchars($_POST['firstName']) : "";
    $lastName = isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : "";
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : "";
    $password = isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : "";
    $businessTitle = isset($_POST['businessTitle']) ? htmlspecialchars($_POST['businessTitle']) : "";
    $companyName = isset($_POST['companyName']) ? htmlspecialchars($_POST['companyName']) : "";
    $countryCode = isset($_POST['countryCode']) ? htmlspecialchars($_POST['countryCode']) : "";
    $phoneNumber = isset($_POST['phoneNumber']) ? htmlspecialchars($_POST['phoneNumber']) : "";
    $combinedPhoneNumber = $countryCode . $phoneNumber;
    // $country = isset($_POST['country']) ? htmlspecialchars($_POST['country']) : "";

    // Your existing database connection code here...
    if (empty($error)) {
        // Check if the email is from Gmail or Yahoo
        $emailDomain = explode('@', $email)[1]; // Extract domain part of email
        if ($emailDomain == "gmail.com" || $emailDomain == "yahoo.com") {
            $error = "Only work emails can be used for registration.";
        } else {
            // Check if the email is admin email or not
            if ($email !== "admin@thevoltbridge.com") {
                // SQL query to check if email or company name already exists
                $checkEmailQuery = "SELECT * FROM buyer_userdata WHERE buyer_email='$email'";
                $checkCompanyQuery = "SELECT * FROM buyer_userdata WHERE buyer_comp_name='$companyName'";

                $emailResult = $conn->query($checkEmailQuery);
                $companyResult = $conn->query($checkCompanyQuery);

                if ($emailResult->num_rows > 0) {
                    // Email is already registered
                    $error = "Email-address is already registered, please login or try again with a different email-address";
                } elseif ($companyResult->num_rows > 0) {
                    // Company name is already registered
                    $companyRow = $companyResult->fetch_assoc();
                    $error = "Company with this name is already registered by ".$companyRow['buyer_first_name']." ".$companyRow['buyer_last_name'].", please login or contact the respective person";
                }
            }
        }
    }

    // If no errors, proceed with insertion
    if (empty($error)) {
        // SQL query to insert data into User_data table
        $sql = "INSERT INTO buyer_userdata (buyer_first_name, buyer_last_name, buyer_email, buyer_password, buyer_business_title, buyer_comp_name, buyer_phone_number)
        VALUES ('$firstName', '$lastName', '$email', '$password', '$businessTitle', '$companyName', '$combinedPhoneNumber')";

        // Check if the query was successful
        if ($conn->query($sql) === TRUE) {
            echo '<script>';
            echo 'var companyName = "' . $companyName . '";';
            echo 'window.location.href = "buyer_company_registration.php?companyName=" + companyName;';
            echo '</script>';
            exit(); // Ensure that no further code is executed after the redirect
        } else {
            $error = "Error: " . $sql . "<br>" . $conn->error;
            echo $error;
        }
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <link rel="stylesheet" href="register2.css">

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <!-- register2 holds the styling for new designed ui -->

    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    
    <title>User Registration Form</title>
    <style>
            .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }

        .message-block {
            display: <?php echo $error ? 'block' : 'none'; ?>;
            background-color: #f8d7da;
            color: #721c24;
            padding: 12px;
            border: 1px solid #f5c6cb;
            border-radius: 5px;
            text-align: center;
            margin-top: 20px;
            clear: both;
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

<div class="container d-flex justify-content-center align-items-center " style="min-height: 95vh;">

    <!-- -------------------------left right containers----------------------- -->
        
   <div class="row">

    <!-- ------------------------------------------------------------- -->

    <div class="col-lg-4">
        <div class="row border rounded-5 p-3 shadow box bg-white">

            <div class="featured-image">
              <div class="row">
                <img src="3stepimages\user_second_step.png" alt="" class="img-fluid rounded-circle" style="max-width: 100%;">
                    
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

        <div class="col-lg-12 col-sm-10 right-box">
          <div class="row">
                <div class="header-text mb-4">
                     <h3 style="text-align: center;">Welcome to <strong><a class="navbar-brand" href="#">Volt<span style="color: rgb(40, 212, 120); ">Bridge</span></a></strong></h3>
                     <p style="text-align: center;">Elevate your B2B presence and fuel business growth online.</p>
                     <hr class="my-4" style="border-color: #020000;">
                     <h4 style="color: grey;">Step 1: Contact Information</h4>

                </div>
            </div>

            <div id="registration-form">

            <form  action="buyer_registration.php" method="POST">
            <div class="row">
                <div class="col-lg-6">
                    
                            <div class="form-group">
                                <label for="firstName">First Name</label>
                                <input type="text" class="form-control bg-light" id="firstName" name="firstName" placeholder="First Name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control bg-light" id="lastName" name="lastName" placeholder="Last Name" required>
                            </div>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control bg-light" id="email" name="email" placeholder="Email" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <i class="info-icon" data-toggle="tooltip" data-placement="right" title="Must contain at least 1 capital letter, 1 number, 1 special character, and be 8-15 characters long."> ⓘ</i>
                        <input type="password" class="form-control bg-light" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="businessTitle">Business Title</label><i class="info-icon" data-toggle="tooltip" data-placement="right" title="e.g., Sales manager etc."> ⓘ</i>
                        <input type="text" class="form-control bg-light" id="businessTitle" name="businessTitle" placeholder="Business Title" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="companyName">Company Name</label>
                        <input type="text" class="form-control bg-light" id="companyName" name="companyName" placeholder="Company Name" required>
                    </div>
                </div>
            </div>

            <div class="row">
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phoneNumber" >Phone Number</label>
        
                        <div class="input-group">
                            <select class="form-control bg-light" id="countryCode" name="countryCode" style="width: 0.5rem; min-height: 1rem;" required>

<option value="+1">+1</option>
<option value="+7">+7</option>
<option value="+20">+20</option>
<option value="+27">+27</option>
<option value="+30">+30</option>
<option value="+31">+31</option>
<option value="+32">+32</option>
<option value="+33">+33</option>
<option value="+34">+34</option>
<option value="+36">+36</option>
<option value="+39">+39</option>
<option value="+40">+40</option>
<option value="+41">+41</option>
<option value="+43">+43</option>
<option value="+45">+45</option>
<option value="+46">+46</option>
<option value="+47">+47</option>
<option value="+49">+49</option>
<option value="+51">+51</option>
<option value="+52">+52</option>
<option value="+54">+54</option>
<option value="+55">+55</option>
<option value="+56">+56</option>
<option value="+60">+60</option>
<option value="+61">+61</option>
<option value="+62">+62</option>
<option value="+63">+63</option>
<option value="+64">+64</option>
<option value="+65">+65</option>
<option value="+66">+66</option>
<option value="+81">+81</option>
<option value="+82">+82</option>
<option value="+84">+84</option>
<option value="+86">+86</option>
<option value="+90">+90</option>
<option value="+91">+91</option>
<option value="+92">+92</option>
<option value="+94">+94</option>
<option value="+95">+95</option>
<option value="+212">+212</option>
<option value="+213">+213</option>
<option value="+218">+218</option>
<option value="+230">+230</option>
<option value="+299">+299</option>
<option value="+351">+351</option>
<option value="+352">+352</option>
<option value="+353">+353</option>
<option value="+354">+354</option>
<option value="+356">+356</option>
<option value="+358">+358</option>
<option value="+370">+370</option>
<option value="+371">+371</option>
<option value="+377">+377</option>
<option value="+380">+380</option>
<option value="+381">+381</option>
<option value="+382">+382</option>
<option value="+385">+385</option>
<option value="+386">+386</option>
<option value="+420">+420</option>
<option value="+421">+421</option>
<option value="+423">+423</option>
<option value="+852">+852</option>
<option value="+880">+880</option>
<option value="+886">+886</option>
<option value="+964">+964</option>
<option value="+966">+966</option>
<option value="+971">+971</option>
<option value="+972">+972</option>
<option value="+974">+974</option>
<option value="+976">+976</option>
<option value="+977">+977</option>
<option value="+995">+995</option>

                            </select>
                            <input type="text" class="form-control  bg-light" id="phoneNumber" name="phoneNumber" placeholder="Enter phone number" required>
                        </div>
                    </div>
                </div>


                <!-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input class="form-control bg-light" list="datalistOptions" id="country" name="country" placeholder="Type to search..." required>
                        <datalist id="datalistOptions">
                            <option value="Afghanistan">
                                          <option value="Albania">
                                          <option value="Algeria">
                                          <option value="American Samoa">
                                          <option value="Andorra">
                                          <option value="Angola">
                                          <option value="Anguilla">
                                          <option value="Antarctica">
                                          <option value="Antigua and Barbuda">
                                          <option value="Argentina">
                                          <option value="Armenia">
                                          <option value="Aruba">
                                          <option value="Australia">
                                          <option value="Austria">
                                          <option value="Azerbaijan">
                                          <option value="Bahamas (the)">
                                          <option value="Bahrain">
                                          <option value="Bangladesh">
                                          <option value="Barbados">
                                          <option value="Belarus">
                                          <option value="Belgium">
                                          <option value="Belize">
                                          <option value="Benin">
                                          <option value="Bermuda">
                                          <option value="Bhutan">
                                          <option value="Bolivia (Plurinational State of)">
                                          <option value="Bonaire, Sint Eustatius and Saba">
                                          <option value="Bosnia and Herzegovina">
                                          <option value="Botswana">
                                          <option value="Bouvet Island">
                                          <option value="Brazil">
                                          <option value="British Indian Ocean Territory (the)">
                                          <option value="Brunei Darussalam">
                                          <option value="Bulgaria">
                                          <option value="Burkina Faso">
                                          <option value="Burundi">
                                          <option value="Cabo Verde">
                                          <option value="Cambodia">
                                          <option value="Cameroon">
                                          <option value="Canada">
                                          <option value="Cayman Islands (the)">
                                          <option value="Central African Republic (the)">
                                          <option value="Chad">
                                          <option value="Chile">
                                          <option value="China">
                                          <option value="Christmas Island">
                                          <option value="Cocos (Keeling) Islands (the)">
                                          <option value="Colombia">
                                          <option value="Comoros (the)">
                                          <option value="Congo (the Democratic Republic of the)">
                                          <option value="Congo (the)">
                                          <option value="Cook Islands (the)">
                                          <option value="Costa Rica">
                                          <option value="Croatia">
                                          <option value="Cuba">
                                          <option value="Curaçao">
                                          <option value="Cyprus">
                                          <option value="Czechia">
                                          <option value="Côte d'Ivoire">
                                          <option value="Denmark">
                                          <option value="Djibouti">
                                          <option value="Dominica">
                                          <option value="Dominican Republic (the)">
                                          <option value="Ecuador">
                                          <option value="Egypt">
                                          <option value="El Salvador">
                                          <option value="Equatorial Guinea">
                                          <option value="Eritrea">
                                          <option value="Estonia">
                                          <option value="Eswatini">
                                          <option value="Ethiopia">
                                          <option value="Falkland Islands (the) [Malvinas]">
                                          <option value="Faroe Islands (the)">
                                      <option value="Fiji">
                                      <option value="Finland">
                                      <option value="France">
                                      <option value="French Guiana">
                                      <option value="French Polynesia">
                                      <option value="French Southern Territories (the)">
                                      <option value="Gabon">
                                      <option value="Gambia (the)">
                                      <option value="Georgia">
                                      <option value="Germany">
                                      <option value="Ghana">
                                      <option value="Gibraltar">
                                      <option value="Greece">
                                      <option value="Greenland">
                                      <option value="Grenada">
                                      <option value="Guadeloupe">
                                      <option value="Guam">
                                      <option value="Guatemala">
                                      <option value="Guernsey">
                                      <option value="Guinea">
                                      <option value="Guinea-Bissau">
                                      <option value="Guyana">
                                      <option value="Haiti">
                                      <option value="Heard Island and McDonald Islands">
                                      <option value="Holy See (the)">
                                      <option value="Honduras">
                                      <option value="Hong Kong">
                                      <option value="Hungary">
                                      <option value="Iceland">
                                      <option value="India">
                                      <option value="Indonesia">
                                      <option value="Iran (Islamic Republic of)">
                                      <option value="Iraq">
                                      <option value="Ireland">
                                      <option value="Isle of Man">
                                      <option value="Israel">
                                      <option value="Italy">
                                      <option value="Jamaica">
                                      <option value="Japan">
                                      <option value="Jersey">
                                      <option value="Jordan">
                                      <option value="Kazakhstan">
                                      <option value="Kenya">
                                      <option value="Kiribati">
                                      <option value="Korea (the Democratic People's Republic of)">
                                      <option value="Korea (the Republic of)">
                                      <option value="Kuwait">
                                      <option value="Kyrgyzstan">
                                      <option value="Lao People's Democratic Republic (the)">
                                      <option value="Latvia">
                                      <option value="Lebanon">
                                      <option value="Lesotho">
                                      <option value="Liberia">
                                      <option value="Libya">
                                      <option value="Liechtenstein">
                                      <option value="Lithuania">
                                      <option value="Luxembourg">
                                      <option value="Macao">
                                      <option value="Madagascar">
                                      <option value="Malawi">
                                      <option value="Malaysia">
                                      <option value="Maldives">
                                      <option value="Mali">
                                      <option value="Malta">
                                      <option value="Marshall Islands (the)">
                                      <option value="Martinique">
                                      <option value="Mauritania">
                                      <option value="Mauritius">
                                      <option value="Mayotte">
                                      <option value="Mexico">
                                      <option value="Micronesia (Federated States of)">
                                      <option value="Moldova (the Republic of)">
                                      <option value="Monaco">
                                      <option value="Mongolia">
                                      <option value="Montenegro">
                                      <option value="Montserrat">
                                      <option value="Morocco">
                                      <option value="Mozambique">
                                      <option value="Myanmar">
                                      <option value="Namibia">
                                      <option value="Nauru">
                                      <option value="Nepal">
                                      <option value="Netherlands (the)">
                                      <option value="New Caledonia">
                                      <option value="New Zealand">
                                      <option value="Nicaragua">
                                      <option value="Niger (the)">
                                      <option value="Nigeria">
                                      <option value="Niue">
                                      <option value="Norfolk Island">
                                      <option value="Northern Mariana Islands (the)">
                                      <option value="Norway">
                                      <option value="Oman">
                                      <option value="Pakistan">
                                      <option value="Palau">
                                      <option value="Palestine, State of">
                                      <option value="Panama">
                                      <option value="Papua New Guinea">
                                      <option value="Paraguay">
                                      <option value="Peru">
                                      <option value="Philippines (the)">
                                      <option value="Pitcairn">
                                      <option value="Poland">
                                      <option value="Portugal">
                                      <option value="Puerto Rico">
                                      <option value="Qatar">
                                      <option value="Republic of North Macedonia">
                                      <option value="Romania">
                                      <option value="Russian Federation (the)">
                                      <option value="Rwanda">
                                      <option value="Réunion">
                                      <option value="Saint Barthélemy">
                                      <option value="Saint Helena, Ascension and Tristan da Cunha">
                                      <option value="Saint Kitts and Nevis">
                                      <option value="Saint Lucia">
                                      <option value="Saint Martin (French part)">
                                      <option value="Saint Pierre and Miquelon">
                                      <option value="Saint Vincent and the Grenadines">
                                      <option value="Samoa">
                                      <option value="San Marino">
                                      <option value="Sao Tome and Principe">
                                      <option value="Saudi Arabia">
                                      <option value="Senegal">
                                      <option value="Serbia">
                                      <option value="Seychelles">
                                      <option value="Sierra Leone">
                                      <option value="Singapore">
                                      <option value="Sint Maarten (Dutch part)">
                                      <option value="Slovakia">
                                      <option value="Slovenia">
                                      <option value="Solomon Islands">
                                      <option value="Somalia">
                                      <option value="South Africa">
                                      <option value="South Georgia and the South Sandwich Islands">
                                      <option value="South Sudan">
                                      <option value="Spain">
                                      <option value="Sri Lanka">
                                      <option value="Sudan (the)">
                                      <option value="Suriname">
                                      <option value="Svalbard and Jan Mayen">
                                      <option value="Sweden">
                                      <option value="Switzerland">
                                      <option value="Syrian Arab Republic">
                                      <option value="Taiwan (Province of China)">
                                      <option value="Tajikistan">
                                      <option value="Tanzania, United Republic of">
                                      <option value="Thailand">
                                      <option value="Timor-Leste">
                                      <option value="Togo">
                                      <option value="Tokelau">
                                      <option value="Tonga">
                                      <option value="Trinidad and Tobago">
                                      <option value="Tunisia">
                                      <option value="Turkey">
                                      <option value="Turkmenistan">
                                      <option value="Turks and Caicos Islands (the)">
                                      <option value="Tuvalu">
                                      <option value="Uganda">
                                      <option value="Ukraine">
                                      <option value="United Arab Emirates (the)">
                                      <option value="United Kingdom of Great Britain and Northern Ireland (the)">
                                      <option value="United States Minor Outlying Islands (the)">
                                      <option value="United States of America (the)">
                                      <option value="Uruguay">
                                      <option value="Uzbekistan">
                                      <option value="Vanuatu">
                                      <option value="Venezuela (Bolivarian Republic of)">
                                      <option value="Viet Nam">
                                      <option value="Virgin Islands (British)">
                                      <option value="Virgin Islands (U.S.)">
                                      <option value="Wallis and Futuna">
                                      <option value="Western Sahara">
                                      <option value="Yemen">
                                      <option value="Zambia">
                                      <option value="Zimbabwe">
                                      <option value="Åland Islands">


                        </datalist>
                    </div>
                </div>
            </div> -->

            
        <div class="input-group mb-3" style="justify-content:center">
            <button class="btn btn-lg btn-success fs-6" style=" width: 20rem;" type="submit">Next</button>
        </div>

        </form>
    </div>
        
        

        <!-- for message block in original file -->
        <div style="width:100%"  class="message-block" style="display: <?php echo $error ? 'block' : 'none'; ?>;">
            <p class="error-message"><?php echo $error; ?></p>
        </div>

       </div> 

    </div>

    </div>
   </div>
    

</div>


<script>
    // Use noConflict mode to avoid conflicts with other libraries
    $.noConflict();

    jQuery(document).ready(function ($) {
        // Initialize Select2
        $('#countryCode').select2();

        // Handle search functionality
        $('#countryCode').on('select2:open', function (e) {
            $('.select2-search__field').attr('placeholder', 'Search...');
            $('.select2-search__field').attr('aria-controls', 'countryCode');
        });
    });
</script>
   

</body>
</html>


