<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="./images/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <!--Bootstrap 4.1 CDN for button and container-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/final footer/index_footer.css">
    <link rel="stylesheet" href="./assets/php/loginnav_bs.css">
    <title>VoltBridge</title>
    <style>
    .profile-circle {
  display: flex;
  align-items: center;
  /* width: auto; */
}

.profile-image {
    width: 50px;
    height: 50px;
    background-color: #23d375;
    color: #fff;
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-left: 20px; 
    border: 2px solid green;

}
        /* Your CSS styles go here */
        @media screen and (max-width: 640px) {
            .container {
                display: grid;
                /* flex-direction: column; */
                justify-content: center;
                align-items: center;
                margin: 20px auto;
                position: relative;
                z-index: 2;
                width: 70%;
                top: 1.5rem;
                min-height: calc(100vh - 3.5rem);
            }

            .hero {
                background-image: url('background_image.jpg');
                background-size: cover;
                padding: 20px 0;
                color: #fff;
                width: 100%;
                min-height: calc(100vh - 3.5rem);
                position: relative;
                top: 3.5em;
                left: 0;
            }

            .hero::after {
                content: '';
                position: absolute;
                top: .65rem;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.7);
                z-index: 1;
            }

            .contact-info {
                width: 70%;
                padding: 5px;
            }

            .section.contact-form {
                width: 100%;
            }

            .contact-details {
                margin-top: 20px;
            }

            .contact-item {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
            }

            .contact-item img {
                margin-right: 10px;
                width: 20px;
                height: 20px;
            }

            .contact-form h2 {
                margin-bottom: 20px;
            }

            .contact-form label {
                display: block;
                margin-bottom: 5px;
            }

            .contact-form input,
            .contact-form textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .contact-form textarea {
                resize: vertical;
            }

            .contact-form button {
                background-color: #42D787;
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
            }

            .contact-form button:hover {
                background-color: darkgreen;
            }

            body {
                background-image: url('images/home1.png');
                background-attachment: fixed;
                background-position: center; /* Center the image */
                background-size: cover; /* Cover the entire body */
                background-repeat: no-repeat; /* Don't repeat the image */
            }

            footer {
                position: relative;
            }


            .accordion .accordion-item {
                border-bottom: 1px solid #e5e5e5;
            }

            .accordion .accordion-item button[aria-expanded='true'] {
                border-bottom: 1px solid #23D375FF;
            }

            .accordion button {
                position: relative;
                display: block;
                text-align: left;
                width: 100%;
                padding: 1em 0;
                color: #7288a2;
                font-size: 1.15rem;
                font-weight: 400;
                border: none;
                background: none;
                outline: none;
            }

            .accordion button:hover,
            .accordion button:focus {
                cursor: pointer;
                color: #23D375FF;
            }

            .accordion button:hover::after,
            .accordion button:focus::after {
                cursor: pointer;
                color: #23D375FF;
                border: 1px solid #23D375FF;
            }

            .accordion button .accordion-title {
                padding: 1em 1.5em 1em 0;
            }

            .accordion button .icon {
                display: inline-block;
                position: absolute;
                top: 18px;
                right: 0;
                width: 22px;
                height: 22px;
                border: 1px solid;
                border-radius: 22px;
            }

            .accordion button .icon::before {
                display: block;
                position: absolute;
                content: '';
                top: 9px;
                left: 5px;
                width: 10px;
                height: 2px;
                background: currentColor;
            }

            .accordion button .icon::after {
                display: block;
                position: absolute;
                content: '';
                top: 5px;
                left: 9px;
                width: 2px;
                height: 10px;
                background: currentColor;
            }

            .accordion button[aria-expanded='true'] {
                color: #23D375FF;
            }

            .accordion button[aria-expanded='true'] .icon::after {
                width: 0;
            }

            .accordion button[aria-expanded='true']+.accordion-content {
                opacity: 1;
                max-height: 15rem;
                /* to increase the height of the content on expand */
                transition: opacity 200ms linear, max-height 0s;
                /* Set transition duration for max-height to 0s */
                /* will-change: opacity, max-height; */
            }

            .accordion .accordion-content {
                opacity: 0;
                max-height: 0;
                overflow: hidden;
                /* transition: opacity 200ms linear, max-height 200ms linear; /* Keep the transition duration for opacity and max-height */
                /* will-change: opacity, max-height; */
            }

            .accordion .accordion-content p {
                font-size: 1rem;
                font-weight: 300;
                margin: 2em 0;
                text-align: left;

            }

            /* above css copied from FAQ to preserve accordian styles for suture reference or updates */
            /* CSS for privacy policy headings */

            .section-heading {
                color: #23D375FF;
                font-size: 36px;
                font-weight: bold;
                margin-bottom: 20px;
                margin-top: 0vw;
            }

            .sub-heading {
                color: #23D375FF;
                text-align: left;
                font-size: 28px;
                margin-bottom: 20px;
                margin-top: 2vw;
                /* margin-left: 20px; */
            }

            /* CSS for content text */
            .content-text {
                color: white;
                text-align: left;
                font-size: 18px;
                /* margin-left: 20px; */
                margin-right: 20px;
            }




        }







        @media screen and (min-width: 640px) {
            .hero {
                background-image: url('background_image.jpg');
                background-size: cover;
                padding: 20px 0;
                color: #fff;
                width: 100%;
                min-height: calc(100vh - 3.5rem);
                position: relative;
                top: 3.5em;
                left: 0;
            }

            .hero::after {
                content: '';
                position: absolute;
                top: 0.7rem;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.7);
                z-index: 1;
            }

            .container {
                display: grid;
                justify-content: center;
                align-items: center;
                margin: 20px auto;
                position: relative;
                z-index: 2;
                width: 100%;
                top: 1.5rem;
                min-height: calc(100vh - 10rem);
            }

            .contact-info {
                width: 35%;
                padding: 5px;
                box-sizing: border-box;
            }

            .section.contact-form {
                width: 75rem;
            }

            .contact-details {
                margin-top: 20px;
            }

            .contact-item {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
            }

            .contact-item img {
                margin-right: 10px;
                width: 20px;
                height: 20px;
            }

            .contact-form h2 {
                margin-bottom: 20px;
            }

            .contact-form label {
                display: block;
                margin-bottom: 5px;
            }

            .contact-form input,
            .contact-form textarea {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .contact-form textarea {
                resize: vertical;
            }

            .contact-form button {
                background-color: #42D787;
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
            }

            .contact-form button:hover {
                background-color: darkgreen;
            }


            body {
                background-image: url('images/home1.png');
                background-attachment: fixed;
                background-position: center; /* Center the image */
                background-size: cover; /* Cover the entire body */
                background-repeat: no-repeat; /* Don't repeat the image */

            }

            .accordion .accordion-item {
                border-bottom: 1px solid #e5e5e5;
            }

            .accordion .accordion-item button[aria-expanded='true'] {
                border-bottom: 1px solid #23D375FF;
            }

            .accordion button {
                position: relative;
                display: block;
                text-align: left;
                width: 100%;
                padding: 1em 0;
                color: #7288a2;
                font-size: 1.15rem;
                font-weight: 400;
                border: none;
                background: none;
                outline: none;
            }

            .accordion button:hover,
            .accordion button:focus {
                cursor: pointer;
                color: #23D375FF;
            }

            .accordion button:hover::after,
            .accordion button:focus::after {
                cursor: pointer;
                color: #23D375FF;
                border: 1px solid #23D375FF;
            }

            .accordion button .accordion-title {
                padding: 1em 1.5em 1em 0;
            }

            .accordion button .icon {
                display: inline-block;
                position: absolute;
                top: 18px;
                right: 0;
                width: 22px;
                height: 22px;
                border: 1px solid;
                border-radius: 22px;
            }

            .accordion button .icon::before {
                display: block;
                position: absolute;
                content: '';
                top: 9px;
                left: 5px;
                width: 10px;
                height: 2px;
                background: currentColor;
            }

            .accordion button .icon::after {
                display: block;
                position: absolute;
                content: '';
                top: 5px;
                left: 9px;
                width: 2px;
                height: 10px;
                background: currentColor;
            }


            .accordion button[aria-expanded='true'] {
                color: #23D375FF;
            }

            .accordion button[aria-expanded='true'] .icon::after {
                width: 0;
            }

            .accordion button[aria-expanded='true']+.accordion-content {
                opacity: 1;
                max-height: 9em;
                transition: opacity 200ms linear, max-height 0s;
                /* Set transition duration for max-height to 0s */
                /* will-change: opacity, max-height; */
            }

            .accordion .accordion-content {
                opacity: 0;
                max-height: 0;
                overflow: hidden;
                /* transition: opacity 200ms linear, max-height 200ms linear; /* Keep the transition duration for opacity and max-height */
                /* will-change: opacity, max-height; */
            }

            .accordion .accordion-content p {
                font-size: 1rem;
                font-weight: 300;
                margin: 2em 0;
                text-align: left;
            }

            /* above css copied from FAQ to preserve accordian styles for suture reference or updates */
            /* CSS for privacy policy headings */
            .section-heading {
                color: #23D375FF;
                font-size: 36px;
                font-weight: bold;
                margin-bottom: 20px;
                margin-top: 0vw;
            }

            .sub-heading {
                color: #23D375FF;
                text-align: left;
                font-size: 28px;
                margin-bottom: 20px;
                margin-top: 2vw;
                /* margin-left: 20px; */
            }

            /* CSS for content text */
            .content-text {
                color: white;
                text-align: left;
                font-size: 18px;
                /* margin-left: 20px; */
                margin-right: 20px;
            }

        }
    </style>
</head>

<body>
    <div>
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/assets/php/";
        include($IPATH . "loginnav_bs.php"); ?>
    </div>
    <div class="hero fadeFromTop">
        <div class="container">

            <!-- Heading -->
            <h1 class="section-heading">Privacy policy</h1>
            <!-- Content Text -->
            <p class="content-text">
                VoltBridge respects the privacy of its website visitors. This Privacy Policy informs you of our practices with regard to the collection, use, and disclosure of personal data you may provide through this website. Please carefully read this policy before using the site or submitting any personal data. By using or accessing our Services in any manner, you acknowledge that you accept the practices and policies outlined below, and you hereby consent that we will collect, use and share your information as described in this Privacy Policy
            </p>
            <!-- Mission Header -->
            <h2 class="sub-heading" style="color: #23D375FF; text-align: left!important;">COLLECTION OF INFORMATION:</h2>
            <!-- Mission Content -->
            <p class="content-text">
                We confirm that we collect those information from you which is required to extend the services available on the site.
                <li>At the time of signing up and registration with the site, we collect user information including name, company name, email address, phone/mobile number, postal address and other business information which may include financial information, products images and details, company history, company images, customer information, logo, quality certificates information etc.</li>
                <li>In this regard, we may also record conversations and archive correspondence between users and the representatives of the site (including the additional information, if any) in relation to the services for quality control or training purposes</li>
                <li>We also gathers and stores the user’s usage statistics such as IP addresses, pages viewed, user behaviour pattern, number of sessions and unique visitors, browsing activities, browser software operating system Visitors Tab, Accessed URL, Time of Visit, Transferred Data Size, Referring URL, User Agent (Browser/Operating System information), Errors Tab, Error messages and associated details (time, affected file), Raw Access Logs, IP Address, Timestamp of Request, Request Type (GET, POST, etc.), URL Accessed, Response Code (200, 404, etc.), Browser Information, Bandwidth Tab, Amount of data transferred (for HTTP, FTP, SMTP, IMAP, POP3 requests) over the last 30 days, Load Average Tab, System load average (over specified timeframes), AWStats Tab (See the full listing in your original question under the 'AWStats' section) etc. for analysis, which helps us to provide improved experience and value added services to you.</li>
                <li>Once a user registers, the user is no longer anonymous to us and thus all the information provided by you shall be stored, possessed in order to provide you with the requested services and as may be required for compliance with statutory requirements.</li>
                <li>User’s registration with us and providing information is intended for facilitating the users in its business.</li>
                <li>We retains user provided Information for as long as the Information is required for the purpose of providing services to you or where the same is required for any purpose for which the Information can be lawfully processed or retained as required under any statutory enactments or applicable laws.</li>
                <li>We may also avail of the class called AccountManager from the Google SDK which in turn fetches Your e-mail IDs that You may be logged into from the device that you are accessing our platform from. This allows us to pre-fill Your verified e-mail ID details so that we can offer You a seamless and convenient user experience. You can always edit such pre-filled e-mail ID from your user profile. </li>
            </p>

            <!-- Vision Header -->
            <h2 class="sub-heading" style="color: #23D375FF; text-align: left;">Purpose of Data Collection</h2>
            <!-- Vision Content -->
            <p class="content-text" style=" text-align: left; ">
                We collect this data for the following purposes:
                <li> Website Analytics and Improvement: To understand traffic patterns, enhance website usability, and identify potential areas for optimization.</li>
                <li>Troubleshooting: To diagnose and fix technical errors impacting the user experience.
                    Security and Monitoring: To monitor traffic for potential security threats and ensure the continued functionality of the website.</li>
                <li>Resource Allocation: To track bandwidth usage and ensure resources are aligned with website traffic needs.</li>
                <li>System Performance Optimization: Load average data assists in monitoring server health and taking proactive measures if needed.</li>
                <li>For the verification of your identity, eligibility, registration, e-mail IDs, and to provide customized services.</li>
                <li>For facilitating the services offered/available on the site.</li>
                <li>For advertising, marketing, displaying & publication</li>
                <li>For enabling communication with the users of the site, so that the users may fetch maximum business opportunities.</li>
                <li>For providing You with a convenient and seamless user experience with minimal points of friction.</li>
            </p>

            <h2 class="sub-heading" style="color: #23D375FF; text-align: left;">Processing and Sharing of Data</h2>
            <!-- Vision Content -->
            <p class="content-text" style=" text-align: left; ">

                <li>Processing: Data is primarily processed within our systems, with potential use of third-party analytics tools specifically for website improvement purposes.</li>
                <li>Sharing: We may share anonymized or aggregated data with trusted third-party service providers for the purposes outlined above. We will not sell or rent your personal data.</li>
                <li>Legal Compliance: We may disclose personal data if required by law, court order, or to protect our rights or the rights of others.</li>
            </p>

            <h2 class="sub-heading" style="color: #23D375FF; text-align: left;">DISCLOSURE OF INFORMATION</h2>
            <!-- Vision Content -->
            <p class="content-text" style=" text-align: left; ">
                Information we may collect from you may be disclosed and transferred to external service providers who we rely on to provide services to us or to you directly. For instance, information may be shared with
                <li> Affiliated companies for better efficiency, more relevancy, innovative business matchmaking and better personalised services.</li>
                <li>Government or regulatory or law enforcement agencies, as mandated under statutory enactment, for verification of identity or for prevention, detection, investigation including cyber incidents, prosecution and punishment of offences.</li>
                <li>Service provider including but not limited to payment, customer and cloud computing service provider (“Third Party”) engaged for facilitating service requirements of user.</li>
                <li>Business partners for sending their business offers to the users, which are owned and offered by them solely without involvement of the site.
                    Links to the websites of any of the above may be available on the site as a convenience to user(s) and the site does not have any control over such websites. The usage of such websites by the user will be governed by their respective Privacy Policies and the present Privacy Policy will not apply to usage of such websites. The users of such websites are cautioned to read the privacy policies of such websites.</li>
                Please get in touch with us at the email address (privacy@thevoltbridge.com) in case you would like to object to any purpose of data processing. However, please note that if you object or withdraw consent to process data as above, we may discontinue providing you with services through our site.

                In relation to such disclosures, receiving parties have consented and confirmed that:
                <li>There shall be limited disclosure of any Information to its Directors, officers, employees, agents or representatives who have a need to know such Information in connection with the business transaction and are only permitted to use your Information in connection with the said purpose,</li>
                <li>They shall keep the Information confidential and secure by using a reasonable degree of care, and</li>
                <li>They shall not disclose any Information received by them further and must abide by the Privacy Policy of the site.</li>
                Please keep in mind that whenever a user post personal & business information online, the same becomes accessible to the public and the users may receive messages/emails from visitors of the site.
            </p>

            <h2 class="sub-heading" style="color: #23D375FF; text-align: left;">Your Rights under GDPR</h2>
            <!-- Vision Content -->
            <p class="content-text" style=" text-align: left; ">
                The GDPR grants you the following rights:
                <li> Right to be Informed: Understanding how your data is collected and used (as outlined in this policy)</li>
                <li>Right to Access: Requesting a copy of the personal data we hold about you.</li>
                <li>Right to Rectification: Correcting inaccurate or incomplete data we hold about you.</li>
                <li>Right to Erasure (Right to be Forgotten): Requesting deletion of your personal data (under certain conditions).</li>
                <li>Right to Restrict Processing: Requesting limitation on how your data is processed.</li>
                <li>Right to Data Portability: Receiving a copy of your personal data in a structured, machine-readable format.</li>
                <li>Right to Object: Objecting to the processing of your data for specific purposes, including direct marketing</li>
                <li>Rights related to automated decision-making and profiling: If applicable under our processing activities</li>
            </p>

            <h2 class="sub-heading" style="color: #23D375FF; text-align: left;">Storage duration</h2>
            <!-- Vision Content -->
            <p class="content-text" style=" text-align: left; ">
                Unless a more specific storage period has been specified in this privacy policy, your personal data will remain with us until the purpose for which it was collected no longer applies. If you assert a justified request for deletion or revoke your consent to data processing, your data will be deleted, unless we have other legally permissible reasons for storing your personal data (e.g., tax or commercial law retention periods); in the latter case, the deletion will take place after these reasons cease to apply.
            </p>

            <h2 class="sub-heading" style="color: #23D375FF; text-align: left;">Cookies</h2>
            <!-- Vision Content -->
            <p class="content-text" style=" text-align: left; ">
                a. Session cookies
                <li> We use cookies on our website. Cookies are small text files or other storage technologies stored on your computer by your browser. These cookies process certain specific information about you, such as your browser, location data, or IP address.</li>
                <li>This processing makes our website more user-friendly, efficient, and secure, allowing us, for example, to display our website in different languages or to offer a shopping cart function.</li>
                <li>The legal basis for such processing is Art. 6 Para. 1 lit. b) GDPR, insofar as these cookies are used to collect data to initiate or process contractual relationships.</li>
                <li>The legal basis for such processing is Art. 6 Para. 1 lit. b) GDPR, insofar as these cookies are used to collect data to initiate or process contractual relationships.</li>
                b.Third-party cookies
                <li>If necessary, our website may also use cookies from companies with whom we cooperate for the purpose of advertising, analysing, or improving the features of our website.</li>
                <li>Please refer to the following information for details, in particular for the legal basis and purpose of such third-party collection and processing of data collected through cookies.</li>
                c. Disabling cookies
                <li>You can refuse the use of cookies by changing the settings on your browser. Likewise, you can use the browser to delete cookies that have already been stored. However, the steps and measures required vary, depending on the browser you use. If you have any questions, please use the help function or consult the documentation for your browser or contact its maker for support. Browser settings cannot prevent so-called flash cookies from being set. Instead, you will need to change the setting of your Flash player. The steps and measures required for this also depend on the Flash player you are using. If you have any questions, please use the help function or consult the documentation for your Flash player or contact its maker for support.</li>
                If you prevent or restrict the installation of cookies, not all of the functions on our site may be fully usable.
            </p>

            <h2 class="sub-heading" style="color: #23D375FF; text-align: left;">General information on the legal basis for the data processing on this website</h2>
            <!-- Vision Content -->
            <p class="content-text" style=" text-align: left; ">
                If you have consented to data processing, we process your personal data on the basis of Art. 6(1)(a) GDPR or Art. 9 (2)(a) GDPR, if special categories of data are processed according to Art. 9 (1) DSGVO. In the case of explicit consent to the transfer of personal data to third countries, the data processing is also based on Art. 49 (1)(a) GDPR. If you have consented to the storage of cookies or to the access to information in your end device (e.g., via device fingerprinting), the data processing is additionally based on § 25 (1) TTDSG. The consent can be revoked at any time. If your data is required for the fulfillment of a contract or for the implementation of pre-contractual measures, we process your data on the basis of Art. 6(1)(b) GDPR. Furthermore, if your data is required for the fulfillment of a legal obligation, we process it on the basis of Art. 6(1)(c) GDPR. Furthermore, the data processing may be carried out on the basis of our legitimate interest according to Art. 6(1)(f) GDPR. Information on the relevant legal basis in each individual case is provided in the following paragraphs of this privacy policy.
            </p>
            <h2 class="sub-heading" style="color: #23D375FF; text-align: left;">Right to object to the collection of data in special cases; right to object to direct advertising (Art. 21 GDPR)</h2>
            <!-- Vision Content -->
            <p class="content-text" style=" text-align: left; ">
                In the event that data are processed on the basis of art. 6(1)(e) or (f) gdpr, you have the right to at any time object to the processing of your personal data based on grounds arising from your unique situation. This also applies to any profiling based on these provisions. To determine the legal basis, on which any processing of data is based, please consult this data protection declaration. If you log an objection, we will no longer process your affected personal data, unless we are in a position to present compelling protection worthy grounds for the processing of your data, that outweigh your interests, rights and freedoms or if the purpose of the processing is the claiming, exercising or defence of legal entitlements (objection pursuant to art. 21(1) gdpr).
                If your personal data is being processed in order to engage in direct advertising, you have the right to object to the processing of your affected personal data for the purposes of such advertising at any time. This also applies to profiling to the extent that it is affiliated with such direct advertising. If you object, your personal data will subsequently no longer be used for direct advertising purposes (objection pursuant to art. 21(2) gdpr)
            </p>

            <h2 class="sub-heading" style="color: #23D375FF; text-align: left;">Data transfers</h2>
            <!-- Vision Content -->
            <p class="content-text" style=" text-align: left; ">
                User Information that we collect may be transferred to, and stored at, any of our affiliates, partners or service providers which may be inside or outside the country you reside in. By submitting your personal data, you agree to such transfers.
                Your Personal Information may be transferred to countries that do not have the same data protection laws as the country in which you initially provided the information. When we transfer or disclose your Personal Information to other countries, we will protect that information as described in this Privacy Policy. relevant, we will ensure appropriate contractual safeguards to ensure that your information is processed with the highest standards of transparency and fairness.
            </p>

            <h2 class="sub-heading" style="color: #23D375FF; text-align: left;">Data collection relating to children</h2>
            <!-- Vision Content -->
            <p class="content-text" style=" text-align: left; ">
                We strongly believe in protecting the privacy of children. In line with this belief, we do not knowingly collect or maintain Personally Identifiable Information on our Site from persons under 18 years of age, and no part of our Site is directed to persons under 18 years of age. If you are under 18 years of age, then please do not use or access our services at any time or in any manner. We will take appropriate steps to delete any Personally Identifiable Information of persons less than 18 years of age that has been collected on our Site without verified parental consent upon learning of the existence of such Personally Identifiable Information.
                If we become aware that a person submitting personal information is under 18, we will delete the account and all related information as soon as possible. If you believe we might have any information from or about a child under 18 please contact us at privacy@thevoltbridge.com
            </p>

            <h2 class="sub-heading" style="color: #23D375FF; text-align: left;">Changes to Privacy Policy</h2>
            <!-- Vision Content -->
            <p class="content-text" style=" text-align: left; ">
                We reserve the right to modify this Privacy Policy. Updates will be posted on our website with the effective date indicated.
            </p>

            <h2 class="sub-heading" style="color: #23D375FF; text-align: left;">Contact Us:</h2>
            <p class="context-text" style="text-align: left; ">
                If you have questions or wish to exercise your rights, please contact us at: privacy@thevoltbridge.com

            </p>


        </div>


    </div>
    </div>



    <script src="script.js"></script>
    <footer>
        <?php $IPATH = $_SERVER["DOCUMENT_ROOT"] . "/assets/final footer/";
        include($IPATH . "index_footer.php"); ?>
    </footer>
</body>

</html>