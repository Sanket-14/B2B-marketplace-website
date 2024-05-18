jQuery(document).ready(function () {
            // Event handler for moving to part 2
            jQuery("#next-to-part-2").click(function () {
                // Collect data from part 1
                var formDataPart1 = new FormData();
                formDataPart1.append("companyName", jQuery("#companyName").val());
                formDataPart1.append("companyRegion", jQuery("#companyRegion").val());
                formDataPart1.append("countryRegistration", jQuery("#countryRegistration").val());
                formDataPart1.append("state", jQuery("#state").val());
                formDataPart1.append("city", jQuery("#city").val());
                formDataPart1.append("contactno", jQuery("#contactno").val());
                formDataPart1.append("yearFounded", jQuery("#yearFounded").val());
                formDataPart1.append("companyWebsite", jQuery("#companyWebsite").val());
                formDataPart1.append("logo", jQuery("#logo")[0].files[0]);
        
                // AJAX request to submit part 1 data
                jQuery.ajax({
                    type: "POST",
                    url: "store_part1_data.php",
                    data: formDataPart1,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        console.log("response: ", response);
        
                        // AJAX request to load part 2 of the form
                        jQuery.ajax({
                            url: 'form-part2new.php',
                            type: 'GET',
                            success: function (response) {
                                // Set the content of #container with the response
                                console.log("response2  :", response);
                                jQuery(".container1").empty().append(response);
                                // jQuery("#second_step_img").attr("src", "./images/vbsteph3w.png");
                                // jQuery("html").replaceWith(response)
                                // jQuery(".container").html(response);
                                
                            },
                            error: function (xhr, status, error) {
                                console.error("Error loading form-part2.php: " + xhr.status + " " + xhr.statusText);
                            }
                        });
                    },
                    error: function (xhr, status, error) {
                        console.error("Error storing part 1 data:", status, error);
                    }
                });
            });
        });
        