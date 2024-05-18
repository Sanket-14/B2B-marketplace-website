// Add this JavaScript code in your HTML file or include it in a separate .js file

document.querySelector('.panel__footer').addEventListener('click', function () {
    // Get comp_name from the hidden input field
    var comp_name = document.getElementById('compNameInput').value;

    // Replace the content with the edit form
    var panelContent = document.querySelector('.panel__content');
    panelContent.innerHTML = document.getElementById('editLogoForm').outerHTML;

    // Show the form
    document.getElementById('editLogoForm').removeAttribute('hidden');

    // Handle form submission
    document.getElementById('logoForm').addEventListener('submit', function (e) {
        e.preventDefault();

        // Get logo file from the file input
        var logoFile = document.getElementById('logo').files[0];

        // Use FormData to send the file and comp_name to the server
        var formData = new FormData();
        formData.append('comp_name', comp_name);
        formData.append('logo', logoFile);

        // Use AJAX to send the data to the server
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_logo.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the server's response if needed
                console.log(xhr.responseText);

                // Assuming the server responds with JSON
                var response = JSON.parse(xhr.responseText);

                // Check if the update was successful
                if (response.success) {
                    // Display a success message (you can replace this with your preferred method)
                    alert('Logo updated successfully');

                    // Reload the page after a short delay (e.g., 2 seconds)
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                } else {
                    // Handle errors or display error messages as needed
                    console.error('Error updating logo: ' + response.message);
                }
            }
        };
        xhr.send(formData);
    });
});


// ADDRESS

// Add this JavaScript code in your HTML file or include it in a separate .js file

document.querySelector('.panel__footer.address').addEventListener('click', function () {
    // Get comp_name from the hidden input field
    var comp_name = document.getElementById('compNameInput').value;

    // Replace the content with the edit form
    var panelContent = document.querySelector('.panel__content.address');
    panelContent.innerHTML = document.getElementById('editAddressForm').outerHTML;

    // Show the form
    document.getElementById('editAddressForm').removeAttribute('hidden');

    // Handle form submission
    document.getElementById('addressForm').addEventListener('submit', function (e) {
        e.preventDefault();

        // Get logo file from the file input
        var region = document.getElementById('region').value;
        var country = document.getElementById('country').value;
        var city = document.getElementById('city').value;

        // Use FormData to send the file and comp_name to the server
        var formData = new FormData();
        formData.append('comp_name', comp_name);
        formData.append('region', region );
        formData.append('country', country);
        formData.append('city', city);
        

        // Use AJAX to send the data to the server
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_address.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the server's response if needed
                console.log(xhr.responseText);

                // Assuming the server responds with JSON
                var response = JSON.parse(xhr.responseText);

                // Check if the update was successful
                if (response.success) {
                    // Display a success message (you can replace this with your preferred method)
                    alert('address updated successfully');

                    // Reload the page after a short delay (e.g., 2 seconds)
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                } else {
                    // Handle errors or display error messages as needed
                    console.error('Error updating logo: ' + response.message);
                }
            }
        };
        xhr.send(formData);
    });
});





// CONTACT

// Add this JavaScript code in your HTML file or include it in a separate .js file

document.querySelector('.panel__footer.contact').addEventListener('click', function () {
    // Get comp_name from the hidden input field
    var comp_name = document.getElementById('compNameInput').value;

    // Replace the content with the edit form
    var panelContent = document.querySelector('.panel__content.contact');
    panelContent.innerHTML = document.getElementById('editContactForm').outerHTML;

    // Show the form
    document.getElementById('editContactForm').removeAttribute('hidden');

    // Handle form submission
    document.getElementById('contactForm').addEventListener('submit', function (e) {
        e.preventDefault();

        // Get logo file from the file input
        
        var email = document.getElementById('email').value;
        var phonenumber = document.getElementById('phonenumber').value;

        // Use FormData to send the file and comp_name to the server
        var formData = new FormData();
        formData.append('comp_name', comp_name);
        formData.append('email', email );
        formData.append('phonenumber', phonenumber);
        
        

        // Use AJAX to send the data to the server
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_contact.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the server's response if needed
                console.log(xhr.responseText);

                // Assuming the server responds with JSON
                var response = JSON.parse(xhr.responseText);

                // Check if the update was successful
                if (response.success) {
                    // Display a success message (you can replace this with your preferred method)
                    alert('contact updated successfully');

                    // Reload the page after a short delay (e.g., 2 seconds)
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                } else {
                    // Handle errors or display error messages as needed
                    console.error('Error updating logo: ' + response.message);
                }
            }
        };
        xhr.send(formData);
    });
});

// keydata

// Add this JavaScript code in your HTML file or include it in a separate .js file

document.querySelector('.panel__footer.keydata').addEventListener('click', function () {
    // Get comp_name from the hidden input field
    var comp_name = document.getElementById('compNameInput').value;

    // Replace the content with the edit form
    var panelContent = document.querySelector('.panel__content.keydata');
    panelContent.innerHTML = document.getElementById('editKeydataForm').outerHTML;

    // Show the form
    document.getElementById('editKeydataForm').removeAttribute('hidden');

    // Handle form submission
    document.getElementById('keydataForm').addEventListener('submit', function (e) {
        e.preventDefault();

        var processingMessage = document.getElementById('processingMessage');
    processingMessage.style.display = 'block';

        // Get logo file from the file input
        
        var Employees = document.getElementById('Employees').value;
        var website = document.getElementById('website').value;
        var yearfounded = document.getElementById('yearfounded').value;

        // Use FormData to send the file and comp_name to the server
        var formData = new FormData();
        formData.append('comp_name', comp_name);
        formData.append('Employees', Employees );
        formData.append('yearfounded', yearfounded);
        formData.append('website', website);

        
        

        // Use AJAX to send the data to the server
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_keydata.php', true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Handle the server's response if needed
                processingMessage.style.display = 'none';
                console.log(xhr.responseText);

                // Assuming the server responds with JSON
                var response = JSON.parse(xhr.responseText);

                // Check if the update was successful
                if (response.success) {
                    // Display a success message (you can replace this with your preferred method)
                    alert('keydata updated successfully');

                    // Reload the page after a short delay (e.g., 2 seconds)
                    setTimeout(function () {
                        location.reload();
                    }, 2000);
                } else {
                    // Handle errors or display error messages as needed
                    console.error('Error updating logo: ' + response.message);
                }
            }
        };
        xhr.send(formData);
    });
});



// document.addEventListener('DOMContentLoaded', function () {
//     document.querySelector('.panel__action.description').addEventListener('click', function () {
//         alert("Edit button clicked");
//     });
// });
// description
document.querySelector('.panel__footer.description').addEventListener('click', function () {
    console.log("button clicked")
    // Get comp_name from the hidden input field
    var comp_name = document.getElementById('compNameInput').value;

    // Replace the content with the edit form
    var panelContent = document.querySelector('.panel__content.description');

    if (panelContent) {
        panelContent.innerHTML = document.getElementById('editDescriptionForm').outerHTML;

        // Show the form
        document.getElementById('editDescriptionForm').removeAttribute('hidden');

        // Handle form submission
        document.getElementById('descriptionForm').addEventListener('submit', function (e) {
            e.preventDefault();

            var processingMessage = document.getElementById('processingMessage');
            processingMessage.style.display = 'block';

            // Get description from the textarea
            var description = document.getElementById('description').value;

            // Use FormData to send the data to the server
            var formData = new FormData();
            formData.append('comp_name', comp_name);
            formData.append('description', description);

            // Use AJAX to send the data to the server
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_description.php', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle the server's response if needed
                    processingMessage.style.display = 'none';
                    console.log(xhr.responseText);

                    // Assuming the server responds with JSON
                    var response = JSON.parse(xhr.responseText);

                    // Check if the update was successful
                    if (response.success) {
                        // Display a success message
                        alert('Description updated successfully');

                        // Reload the page after a short delay
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    } else {
                        // Handle errors or display error messages as needed
                        console.error('Error updating description: ' + response.message);
                    }
                }
            };
            xhr.send(formData);
        });
    }
});

// youtube video
document.querySelector('.panel__footer.video').addEventListener('click', function () {
    
    // Get comp_name from the hidden input field
    var comp_name = document.getElementById('compNameInput').value;

    // Replace the content with the edit form
    var panelContent = document.querySelector('.panel__content.video');

    if (panelContent) {
        panelContent.innerHTML = document.getElementById('editVideoForm').outerHTML;

        // Show the form
        document.getElementById('editVideoForm').removeAttribute('hidden');

        // Handle form submission
        document.getElementById('videoForm').addEventListener('submit', function (e) {
            e.preventDefault();

            var processingMessage = document.getElementById('processingMessage');
            processingMessage.style.display = 'block';

            // Get video from the textarea
            var video = document.getElementById('video').value;

            // Use FormData to send the data to the server
            var formData = new FormData();
            formData.append('comp_name', comp_name);
            formData.append('video', video);

            // Use AJAX to send the data to the server
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_video.php', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Handle the server's response if needed
                    processingMessage.style.display = 'none';
                    console.log(xhr.responseText);

                    // Assuming the server responds with JSON
                    var response = JSON.parse(xhr.responseText);

                    // Check if the update was successful
                    if (response.success) {
                        // Display a success message
                        alert('youtube video updated successfully');

                        // Reload the page after a short delay
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    } else {
                        // Handle errors or display error messages as needed
                        console.error('Error updating video: ' + response.message);
                    }
                }
            };
            xhr.send(formData);
        });
    }
});

// file
document.querySelector('.panel__footer.file').addEventListener('click', function () {
    var comp_name = document.getElementById('compNameInput').value;
    var panelContent = document.querySelector('.panel__content.file');

    if (panelContent) {
        panelContent.innerHTML = document.getElementById('editFileForm').outerHTML;
        document.getElementById('editFileForm').removeAttribute('hidden');

        document.getElementById('fileForm').addEventListener('submit', function (e) {
            e.preventDefault();
            var processingMessage = document.getElementById('processingMessage');
            processingMessage.style.display = 'block';

            // Get the selected file
            var fileInput = document.getElementById('file');
            var file = fileInput.files[0];

            // Check if a file is selected
            if (!file) {
                console.error('No file selected');
                return;
            }

            var formData = new FormData();
            formData.append('comp_name', comp_name);
            formData.append('file', file);

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'update_file.php', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    processingMessage.style.display = 'none';
                    console.log(xhr.responseText);
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert('File updated successfully');
                        setTimeout(function () {
                            location.reload();
                        }, 2000);
                    } else {
                        console.error('Error updating file: ' + response.message);
                    }
                }
            };
            xhr.send(formData);
        });
    }
});
