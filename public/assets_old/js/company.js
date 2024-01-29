// Debounce function to limit the frequency of function calls
const text_info = $('#text_info');

function debounce(func, delay) {
    let timer;
    return function () {
        const context = this;
        const args = arguments;
        clearTimeout(timer);
        timer = setTimeout(() => {
            func.apply(context, args);
        }, delay);
    };
}

// Function to handle the input and apply transformations and validations
function handleCommonInputs(inputId, errorId) {
    return function () {
        const input = $(`#${inputId}`);
        const error = $(`#${errorId}`);

        let value = input.val();

        // Capitalize the input and ensure only alpha characters are accepted
        value = value.replace(/[^a-zA-Z ]/g, '').toLowerCase().split(' ').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');

        input.val(value); // Update the input value

        if (value.length < 4) {
            error.text("Minimum length is 4 characters.");
            return;
        }

        error.text('');
    };
}

function handleEmailInput(inputId, errorId) {
    return function () {
        const input = $(`#${inputId}`);
        const error = $(`#${errorId}`);

        let email = input.val().trim();

        // Basic email format validation using a regular expression
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (!emailPattern.test(email)) {
            error.text("Please enter a valid email address.");
            return;
        }

        input.val(email); // Update the input value

        error.text('');
    };
}

function companyEmailDuplicate(inputId, errorId) {
    // Get the email value from the input field
    var email = $('#' + inputId).val();

    // Make an Ajax request to check for duplicacy
    $.ajax({
        url: '/admin/check_company_phone_email',
        type: 'POST', // Assuming you need to send a POST request
        data: { email: email },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            // Check the response from the server
            if (response.duplicate) {
                // Email is a duplicate, show error message
                $('#' + errorId).text('Email already exists');
            } else {
                // Email is not a duplicate, clear error message
                $('#' + errorId).text('');
                $('#nextBtn').prop('disabled', false);
            }
        },
        error: function(error) {
            // Handle any errors that occurred during the Ajax request
            console.error('Error checking email duplicate');
            console.log(error);

            const errorData = error.responseJSON.errors;
            let emailError = false;

            for (const key in errorData) {
                if (key === 'email') {
                    $('#' + errorId).text(errorData[key][0]);
                    emailError = true;
                }
            }

            // Disable the button if there is an email error
            if (emailError) {
                $('#nextBtn').prop('disabled', true);
            } else {
                // Clear error message and enable the button
                $('#' + errorId).text('');
                $('#nextBtn').prop('disabled', false);
            }
        }
    });
}

function handlePincodeInput(inputId, errorId) {
    return function () {
        const input = $(`#${inputId}`);
        const error = $(`#${errorId}`);

        let pincode = input.val().trim();

        // Remove non-numeric characters
        pincode = pincode.replace(/\D/g, '');

        // Limit to 6 digits
        pincode = pincode.slice(0, 6);

        // Basic pincode validation for 6-digit numeric values
        const pincodePattern = /^\d{6}$/;

        if (!pincodePattern.test(pincode)) {
            error.text("Please enter a valid 6-digit numeric pincode.");
            return;
        }

        input.val(pincode); // Update the input value

        error.text('');
    };
}

function handleAddressInput(inputId, errorId) {
    return function () {
        const input = $(`#${inputId}`);
        const error = $(`#${errorId}`);

        let address = input.val().trim();

        // Basic validation for address length
        if (address.length < 5) {
            error.text("Address must be at least 5 characters long.");
            return;
        }

        // You can add additional address validation rules here based on your requirements.

        input.val(address); // Update the input value

        error.text('');
    };
}


function handleFileInput(fileInputId, errorId) {
    return function () {
        $('#logo_info').hide();
        const fileInput = $(`#${fileInputId}`);
        const error = $(`#${errorId}`);

        const allowedExtensions = ['png', 'jpg', 'jpeg', 'gif'];
        const maxFileSize = 500 * 1024; // 500 KB in bytes

        const fileName = fileInput.val();
        if (!fileName) {
            error.text('Please choose a file.');
            return;
        }

        const fileExtension = fileName.split('.').pop().toLowerCase();
        if (!allowedExtensions.includes(fileExtension)) {
            error.text('Only PNG, JPG, JPEG, and GIF files are allowed.');
            return;
        }

        const fileSize = fileInput[0].files[0].size;
        if (fileSize > maxFileSize) {
            error.text('File size exceeds the maximum limit of 500 KB.');
            return;
        }

        error.text('');
    };
}

function handlePanCardInput(inputId, errorId) {
    return function () {
        const input = $(`#${inputId}`);
        const error = $(`#${errorId}`);

        let panCard = input.val().trim().toUpperCase();

        // Basic PAN card format validation using a regular expression
        const panCardPattern = /^[A-Z]{5}[0-9]{4}[A-Z]$/;

        if (panCard.length !== 10 || !panCardPattern.test(panCard)) {
            $("#pancard_text_info").hide();
            error.text("Please enter a valid 10-character PAN card number.");
            return;
        }

        input.val(panCard); // Update the input value

        error.text('');
    };
}

function handleGSTNumberInput(inputId, errorId) {
    return function () {
        const input = $(`#${inputId}`);
        const info = $(`#${inputId}_info`);
        const error = $(`#${errorId}`);

        let gstNumber = input.val().trim().toUpperCase();

        // Basic GST number format validation using a regular expression
        const gstNumberPattern = /^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[0-9A-Z]{1}[Z]{1}[0-9A-Z]{1}$/;

        if (gstNumber.length !== 15 || !gstNumberPattern.test(gstNumber)) {
            $("#gst_text_info").hide();
            info.hide(); // Hide info text
            error.text("Please enter a valid 15-character GST number.");
            return;
        }

        info.show(); // Show info text
        input.val(gstNumber); // Update the input value

        error.text('');
    };
}

function handleMobileNumberInput(inputId, errorId) {
    return function () {
        const input = $(`#${inputId}`);
        const error = $(`#${errorId}`);

        let mobileNumber = input.val().trim();

        // Remove non-numeric characters
        mobileNumber = mobileNumber.replace(/\D/g, '');

        // Extract the first 10 digits
        mobileNumber = mobileNumber.slice(0, 10);

        // Basic mobile number format validation using a regular expression
        const mobileNumberPattern = /^\d{10}$/;

        if (mobileNumber === "") {
            error.text("Please enter mobile number");
            return;
        }

        if (!mobileNumberPattern.test(mobileNumber)) {
            error.text("Invalid mobile number. It must be a 10-digit number.");
            return;
        }

        input.val(mobileNumber); // Update the input value

        error.text('');
    };
}

$(document).ready(function () {
    $('#contact_person_name').on('keyup', debounce(handleCommonInputs('contact_person_name', 'contact_person_name_error'), 300));
    $('#company_name').on('keyup', debounce(handleCommonInputs('company_name', 'company_name_error'), 300));
    $('#company_email').on('keyup', debounce(function() {
        handleEmailInput('company_email', 'company_email_error');
        companyEmailDuplicate('company_email', 'company_email_error');
    }, 300));

    $('#pin_code').on('keyup', debounce(handlePincodeInput('pin_code', 'pin_code_error'), 300));

    $('#address_line_1').on('keyup', debounce(handleAddressInput('address_line_1', 'address_line_1_error'), 300));
    $('#registered_address').on('keyup', debounce(handleAddressInput('registered_address', 'registered_address_error'), 300));
    $('#billing_address').on('keyup', debounce(handleAddressInput('billing_address', 'billing_address_error'), 300));
    $('#corporate_office_address').on('keyup', debounce(handleAddressInput('corporate_office_address', 'corporate_office_address_error'), 300));
    $('#logo').on('change', debounce(handleFileInput('logo', 'logo_error'), 300));

    // pancard
    $('#pancard').on('keyup', debounce(handlePanCardInput('pancard', 'pancard_error'), 300));
    //GST
    $('#gst_number').on('keyup', debounce(handleGSTNumberInput('gst_number', 'gst_number_error'), 300));
    $('#primary_mobile').on('keyup', debounce(handleMobileNumberInput('primary_mobile', 'primary_mobile_error'), 300));
    $('#primary_email').on('keyup', debounce(handleEmailInput('primary_email', 'primary_email_error'), 300));

});

// Stepper lement
var element = document.querySelector("#kt_create_account_stepper");

// Initialize Stepper
var stepper = new KTStepper(element);

// Handle next step
stepper.on("kt.stepper.next", function (stepper) {

// company setup form validations


    const logo = $('#logo');
    const logo_error = $('#logo_error');

    // Step 1 validation


    if (stepper.currentStepIndex === 1) {
        const validationErrorsStep2 = {};

        const company_name = $('#company_name').val();
        const company_name_error = $('#company_name_error');
        if (company_name === "") {
            company_name_error.text("Please enter company name");
            validationErrorsStep2.company_name = "Please enter company name";
        } else {
            company_name_error.text('');
        }

        const company_email = $("#company_email").val();
        const company_email_error = $("#company_email_error");
        if (company_email === "") {
            company_email_error.text("Please enter company email");
            validationErrorsStep2.company_email = "Please enter company email";
        } else {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(company_email)) {
                company_email_error.text("Please enter a valid email address.");
                validationErrorsStep2.company_email = "Invalid email address";
            } else {
                companyEmailDuplicate('company_email','company_email_error');
                company_email_error.text('');
            }
        }

        // Country validation
        const country = $('#country').val();
        const country_error = $('#country_error');
        if (country === "") {
            country_error.text("Please select country");
            validationErrorsStep2.country = "Please Select Country";

        } else {
            country_error.text('');
        }

        console.log(validationErrorsStep2);

// State validation
        const state = $('#state').val();
        const state_error = $('#state_error');
        if (state === "") {
            state_error.text("Please select state");
            validationErrorsStep2.state = "Please Select state";

        } else {
            state_error.text('');
        }

// City validation
        const city = $('#city').val();
        const city_error = $('#city_error');
        if (city === "") {
            city_error.text("Please select city");
            validationErrorsStep2.city = "Please Select city";

        } else {
            city_error.text('');
        }

// Pin code validation
        const pin_code = $('#pin_code').val();
        const pin_code_error = $('#pin_code_error');
        if (pin_code === "") {
            pin_code_error.text("Please enter a pin code");
            validationErrorsStep2.pin_code = "Please enter a pin code";

        } else if (!/^\d{6}$/.test(pin_code)) {
            pin_code_error.text("Please enter a valid 6-digit numeric pin code.");
            validationErrorsStep2.pin_code = "Please enter a valid 6-digit numeric pin code.";

        } else {
            // Proceed with further processing or clear any previous error messages
            pin_code_error.text("");
        }


        const address_line_1 = $('#address_line_1').val();
        const address_line_1_error = $('#address_line_1_error');

        if (address_line_1 === "") {
            address_line_1_error.text("Please enter address");
            validationErrorsStep2.address_line_1 = "Please enter address";

        } else {
            address_line_1_error.text('');
        }

        const registered_address = $('#registered_address').val();
        const registered_address_error = $('#registered_address_error');

        if (registered_address === "") {
            registered_address_error.text("Please enter registered address");
            validationErrorsStep2.registered_address = "Please enter registered address";

        } else {
            registered_address_error.text('');
        }

        const corporate_office_address = $('#corporate_office_address').val();
        const corporate_office_address_error = $('#corporate_office_address_error');

        if (corporate_office_address === "") {
            corporate_office_address_error.text("Please enter corporate address");
            validationErrorsStep2.corporate_office_address = "Please enter corporate address";

        } else {
            corporate_office_address_error.text('');
        }

        const billing_address = $('#billing_address').val();
        const billing_address_error = $('#billing_address_error');

        if (billing_address === "") {
            billing_address_error.text("Please enter billing address");
            validationErrorsStep2.billing_address = "Please enter billing address";

        } else {
            billing_address_error.text('');
        }

        // Logo validation (Step 1)
        const allowedExtensions = ['jpg', 'jpeg', 'png'];
        const maxFileSize = 1 * 1024 * 1024; // 1 MB

        if (!logo[0].files || logo[0].files.length === 0) {
            $('#logo_info').hide();
            logo_error.text("Please select a logo file");
            validationErrors.logo = "Please select a logo file";
        } else {
            const fileName = logo.val();
            const fileExtension = fileName.split('.').pop().toLowerCase();

            if ($.inArray(fileExtension, allowedExtensions) === -1) {
                logo_error.text("Please select a valid logo file (JPEG, PNG, JPG)");
                validationErrors.logo = "Invalid logo file format";
            }

            if (logo[0].files[0].size > maxFileSize) {
                logo_error.text("Maximum file size is 1 MB");
                validationErrors.logo = "Maximum file size is 1 MB";
            } else {
                logo_error.text('');
            }
        }

        // Display all errors
        if (Object.keys(validationErrorsStep2).length > 0) {
            // Scroll to the first error field
            $('#' + Object.keys(validationErrorsStep2)[0]).focus();
            return;
        }
    }

    //Step 3
    if (stepper.currentStepIndex === 2) {
        const validationErrorsStep3 = {};

        // Pan Card validation
        const pancard = $('#pancard').val();
        const pancard_error = $('#pancard_error');
        if (pancard === "") {
            $("#pancard_text_info").hide();
            pancard_error.text("Please enter pan number");
            validationErrorsStep3.pancard = "Please enter pan number";
        } else {
            pancard_error.text('');
        }

        // GST Number validation
        const gst_number = $('#gst_number').val();
        const gst_number_error = $('#gst_number_error');
        if (gst_number === "") {
            $("#gst_text_info").hide();
            gst_number_error.text("Please enter gst number");
            validationErrorsStep3.gst_number = "Please enter gst number";
        } else {
            gst_number_error.text('');
        }

        // TAN Number validation
        // const tan_number = $('#tan_number').val();
        // const tan_number_error = $('#tan_number_error');
        // if (tan_number === "") {
        //     tan_number_error.text("Please enter tan number");
        //     validationErrorsStep3.tan_number = "Please enter tan number";
        // } else {
        //     tan_number_error.text('');
        // }

        // Display all errors for Step 3
        if (Object.keys(validationErrorsStep3).length > 0) {
            // Scroll to the first error field
            $('#' + Object.keys(validationErrorsStep3)[0]).focus();
            return;
        }

    }

    if (stepper.currentStepIndex === 3) {
        const validationErrorsStep4 = {};

        // Contact Person Name validation
        const contactPersonName = $('#contact_person_name').val();
        const contactPersonNameError = $('#contact_person_name_error');
        if (contactPersonName === "") {
            contactPersonNameError.text("Please enter contact person name");
            validationErrorsStep4.contactPersonName = "Please enter contact person name";
        } else if (!/^[A-Za-z\s]+$/.test(contactPersonName)) {
            contactPersonNameError.text("Invalid contact person name. It should only contain letters and spaces.");
            validationErrorsStep4.contactPersonName = "Invalid contact person name";
        } else {
            contactPersonNameError.text('');
        }

        // Primary Mobile Number validation
        const primaryMobile = $('#primary_mobile').val();
        const primaryMobileError = $('#primary_mobile_error');
        if (primaryMobile === "") {
            primaryMobileError.text("Please enter primary mobile number");
            validationErrorsStep4.primaryMobile = "Please enter primary mobile number";
        } else if (!/^\d{10}$/.test(primaryMobile)) {
            primaryMobileError.text("Invalid primary mobile number. It must be a 10-digit number.");
            validationErrorsStep4.primaryMobile = "Invalid primary mobile number";
        } else {
            primaryMobileError.text('');
        }

        // Primary Email validation
        const primaryEmail = $('#primary_email').val();
        const primaryEmailError = $('#primary_email_error');
        if (primaryEmail === "") {
            primaryEmailError.text("Please enter primary email");
            validationErrorsStep4.primaryEmail = "Please enter primary email";
        } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(primaryEmail)) {
            primaryEmailError.text("Invalid primary email. Please enter a valid email address.");
            validationErrorsStep4.primaryEmail = "Invalid primary email";
        } else {
            primaryEmailError.text('');
        }


        if (Object.keys(validationErrorsStep4).length > 0) {
            // Scroll to the first error field
            $('#' + Object.keys(validationErrorsStep4)[0]).focus();
            return;
        }

    }

    if (stepper.currentStepIndex === 4) {
        var checkboxes = document.querySelectorAll('input[name="module[]"]:checked');
        if (checkboxes.length === 0) {
            Swal.fire({
                position: "middle",
                icon: "warning",
                title: "Please select at least one module.",
                showConfirmButton: false,
                timer: 3000
            });
            $("#module_error").text("Please select at least one module.");
            return;
        }
    }

    if (stepper.currentStepIndex === 5) {
        const license_key = $("#license_key").val();
        const license_key_error = $("#license_key_error");
        if (license_key === "") {
            Swal.fire({
                position: "middle",
                icon: "warning",
                title: "Please generate a license key before proceeding.",
                showConfirmButton: false,
                timer: 3000
            });
            license_key_error.text("Please generate a license key before proceeding.");
            return;
        }

        // generate username
        const companyName = $("#company_name").val();
        if (companyName) {
            $.ajax({
                type: 'POST',
                url: '/admin/generate-username',
                data: {
                    "companyName": companyName
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success === true) {
                        $('#username').val(response.username);
                    }
                },
                error: function (xhr, status, error) {

                }
            });
        }
    }
    stepper.goNext(); // go next step

});

// Handle previous step
stepper.on("kt.stepper.previous", function (stepper) {
    stepper.goPrevious(); // go previous step
});


//ISO certification
function toggleFileInput() {
    var fileInput = document.getElementsByName("iso_certification_file[]")[0];
    var addMoreBtn = document.getElementById("add_more_iso_certificate_btn");
    var yesRadio = document.getElementById("iso_yes");
    var duplicateFieldsSection = document.getElementById("duplicateFieldsSection");

    // Show the file input and add more button if "Yes" is selected, hide them otherwise
    fileInput.style.display = yesRadio.checked ? "block" : "none";
    addMoreBtn.style.display = yesRadio.checked ? "block" : "none";
    duplicateFieldsSection.style.display = yesRadio.checked ? "block" : "none";
}

function addFileInput() {
    var fileSection = document.getElementById("iso_certification_file_section");
    var duplicateFieldsSection = document.getElementById("duplicateFieldsSection");
    // Create a new container div for the file input and buttons
    var newContainer = document.createElement("div");
    newContainer.className = "d-flex flex-stack w-100 mt-4";


    // Create a new file input element
    var newFileInputDiv = document.createElement("div");
    var newFileInput = document.createElement("input");
    newFileInput.type = "file";
    newFileInput.name = "iso_certification_file[]";
    newFileInput.className = "form-control form-control-solid";
    newFileInput.style.display = "block";

    newFileInputDiv.appendChild(newFileInput);

    // Create a new remove button
    var removeButtonDiv = document.createElement("div");
    var removeButton = document.createElement("button");
    removeButton.innerHTML = "Remove";
    removeButton.className = "btn btn-danger";
    removeButton.onclick = function () {
        duplicateFieldsSection.removeChild(newContainer);
    };

    removeButtonDiv.appendChild(removeButton);

    // Append the new file input and remove button to the new container
    newContainer.appendChild(newFileInputDiv);
    newContainer.appendChild(removeButtonDiv);

    // Append the new container to the file section
    duplicateFieldsSection.appendChild(newContainer);
}


$(document).ready(function () {
    $("#createAccountSaveAllDataBtn").click(function (e) {
        e.preventDefault();
        const email = $("#email").val();
        const emailError = $("#email_error");

        if (email === "") {
            emailError.text("Please enter your email address.");
            return;
        } else if (!isValidEmail(email)) {
            emailError.text("Please enter a valid email address.");
            return;
        }
        checkEmailAndUserNameDuplicate();
    });

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function checkEmailAndUserNameDuplicate() {
        try {
            const email = $("#email").val();
            const username = $("#username").val();

            const formData = new FormData();
            formData.append('email', email);
            formData.append('username', username);

            $.ajax({
                url: '/admin/check_email_and_user_name',
                type: 'POST',
                data: formData,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.success === true) {
                        // No duplicates found, continue with your logic or form submission
                        console.log('No duplicates found.');
                        $('#lastStepContent').hide();
                        saveBasicDetail();
                        // You might want to enable form submission or display a success message
                    } else {
                        // Duplicates found, handle accordingly
                        console.log('Duplicates found.');
                        // You might want to disable form submission or display an error message
                        throw new Error('Duplicates found.');
                    }
                },
                error: function (error) {
                    console.error('Error checking duplicates:', error.responseJSON.errors);
                    // Handle the error, display an error message, etc.
                    const errorData = error.responseJSON.errors;
                    for (const key in errorData) {
                        if (key === 'email') {
                            $("#email_error").text(errorData[key][0]);
                        } else if (key === 'username') {
                            $("#username_error").text(errorData[key][0]);
                        }
                    }

                    // Throw an exception to stop further execution
                    throw new Error('Error checking duplicates.');
                }
            });
        } catch (error) {
            // Handle synchronous errors (unlikely in this case)
            console.error('Synchronous error:', error.message);
        }
    }


    function saveBasicDetail(databaseId = null) {
        $("#company_data_saved_success").html("<svg style='height: 30px;' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='25' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='-.4'></animate></rect><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='85' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='-.2'></animate></rect><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='145' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='0'></animate></rect></svg>");

        // const app_name = $('#app_name').val();
        const company_name = $('#company_name').val();
        const company_email = $('#company_email').val();
        const govt_tax_ein_number = $('#gov_tax_number_ein').val();
        const legal_trading_name = $('#legal_trading_name').val();
        const registration_number = $('#registration_number').val();
        const country = $('#country').val();
        const state = $('#state').val();
        const city = $('#city').val();
        const pin_code = $('#pin_code').val();
        const primary_mobile = $('#primary_mobile').val();
        const address_line_1 = $('#address_line_1').val();
        const address_line_2 = $('#address_line_2').val();
        const description = $('#description').val();
        const logo = $('#logo')[0].files[0];

        const formData = new FormData();
        // formData.append('app_name', app_name);
        formData.append('company_name', company_name);
        formData.append('company_email', company_email);
        formData.append('govt_tax_ein_number', govt_tax_ein_number);
        formData.append('legal_trading_name', legal_trading_name);
        formData.append('registration_number', registration_number);
        formData.append('country', country);
        formData.append('state', state);
        formData.append('city', city);
        formData.append('pin_code', pin_code);
        formData.append('phone', primary_mobile);
        formData.append('address_line_1', address_line_1);
        formData.append('address_line_2', address_line_2);
        formData.append('description', description);
        formData.append('logo', logo);
        // formData.append('database', databaseId);

        $.ajax({
            url: '/admin/save_companies_basic_details',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
            success: handleSaveBasicDetailSuccess,
            error: function (error) {
                console.error('Error saving basic details:', error);
                // Handle error, display error message, etc.
            }
        });
    }

    function handleSaveBasicDetailSuccess(response) {
        console.log(response);
        $("#company_data_saved_success")
            .html("<strong>1. Company Detail Saved Successfully</strong>")
            .fadeIn(2000)
            .css({'color': 'green', 'display': 'block'});
        setTimeout(() => {
            saveCertificationDetails(response.data.id);
        }, 1000);

    }

    function saveCertificationDetails(companyId) {
        $("#certification_details_saved_success").html("<svg style='height: 30px;' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='25' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='-.4'></animate></rect><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='85' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='-.2'></animate></rect><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='145' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='0'></animate></rect></svg>");

        const pancard = $('#pancard').val();
        const gst_number = $('#gst_number').val();
        const tan_number = $('#tan_number').val();
        const cin_number = $('#cin_number').val();
        const esic_number = $('#esic_number').val();
        const epf_number = $('#epf_number').val();
        const lin_number = $('#lin_number').val();
        const aadhar_udhyam = $('#aadhar_udhyam').val();
        const aadhar_udhyam_type = $('#aadhar_udhyam_type').val();
        const dpiit_certificate_number = $('#dpiit_certificate_number').val();
        const cmmi_level = $('#cmmi_level').val();
        const ministry_name = $('#ministry_name').val();
        const registered_address = $('#registered_address').val();
        const corporate_office_address = $('#corporate_office_address').val();
        const billing_address = $('#billing_address').val();

        const formData = new FormData();
        formData.append('company', companyId);
        formData.append('pancard', pancard);
        formData.append('gst_number', gst_number);
        formData.append('tan_number', tan_number);
        formData.append('cin_number', cin_number);
        formData.append('esic_number', esic_number);
        formData.append('epf_number', epf_number);
        formData.append('lin_number', lin_number);
        formData.append('aadhar_udhyam', aadhar_udhyam);
        formData.append('aadhar_udhyam_type', aadhar_udhyam_type);
        formData.append('dpiit_certificate_number', dpiit_certificate_number);
        formData.append('cmmi_level', cmmi_level);
        formData.append('ministry_name', ministry_name);
        formData.append('registered_address', registered_address);
        formData.append('corporate_office_address', corporate_office_address);
        formData.append('billing_address', billing_address);

        $.ajax({
            url: '/admin/save-business-details',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
            success: handleSaveCertificationDetailsSuccess,
            error: function (error) {
                console.error('Error saving Certifications Detail:', error);
                // Handle error, display error message, etc.
            }
        });
    }

    function handleSaveCertificationDetailsSuccess(response) {

        // Display success message with fade animation, strong text, and green color

        $("#certification_details_saved_success")
            .html("<strong>2. Certifications Detail Saved Successfully</strong>")
            .fadeIn(3000)
            .css({'color': 'green', 'display': 'block'});
        setTimeout(() => {
            saveContactDetails(response)
        }, 1000)

    }

    function saveContactDetails(companyDetails) {
        $("#contact_details_saved_success").html("<svg style='height: 30px;' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='25' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='-.4'></animate></rect><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='85' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='-.2'></animate></rect><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='145' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='0'></animate></rect></svg>");

        const company_id = companyDetails.businessDetail.company_id;
        const phone = $("#phone").val();
        const fax = $("#fax").val();
        const website = $("#website").val();
        const facebook = $("#facebook").val();
        const twitter = $("#twitter").val();
        const linkedin = $("#linkedin").val();

        const formData = new FormData();
        formData.append('company_id', company_id);
        formData.append('phone', phone);
        formData.append('fax', fax);
        formData.append('website', website);
        formData.append('facebook', facebook);
        formData.append('twitter', twitter);
        formData.append('linkedin', linkedin);

        $.ajax({
            url: '/admin/save-company-contact-details',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success === true) {
                    $("#contact_details_saved_success")
                        .html("<strong>3. Contact details saved successfully!</strong>")
                        .fadeIn(3000)
                        .css({'color': 'green', 'display': 'block'});

                    setTimeout(() => {
                        assignModules(response);
                    }, 1000)
                    setTimeout(() => {
                        assignLicense(response);
                    }, 1000)
                }
            },
            error: function (error) {
                // Handle the error response
                console.error('Error saving data:', error);
            }
        });
    }

    function assignModules(companyDetail) {
        $("#modules_assigned_success").html("<svg style='height: 30px;' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='25' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='-.4'></animate></rect><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='85' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='-.2'></animate></rect><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='145' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='0'></animate></rect></svg>");

        const company_id = companyDetail.data.company_id;
        var selectedModules = $("input[name='module[]']:checked").map(function () {
            return $(this).val();
        }).get();

        if (selectedModules.length === 0) {
            $("#module_error").text("Please select at least one module.");
            return;
        }

        // Ajax request to save selected modules
        $.ajax({
            type: 'POST',
            url: '/admin/save_selected_modules',
            data: {
                modules: selectedModules,
                company_id: company_id
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                if (response.success === true) {
                    $("#modules_assigned_success")
                        .html("<strong>4. Modules assigned successfully</strong>")
                        .fadeIn(3000)
                        .css({'color': 'green', 'display': 'block'});
                } else {
                    // Handle error, display error message, etc.
                    console.error('Error saving modules:', response.error);
                }
            },
            error: function (xhr, status, error) {
                // Handle error, display error message, etc.
                console.error('Error saving modules:', error);
            }
        });
    }

    function assignLicense(companyDetail) {
        $("#license_assigned_success").html("<svg style='height: 30px;' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='25' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='-.4'></animate></rect><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='85' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='-.2'></animate></rect><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='145' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='0'></animate></rect></svg>");
        const company_id = companyDetail.data.company_id;
        const license_key = $("#license_key").val();
        const duration = $("#duration").val();
        const started_at = $("#validFromDate").val();
        const expired_at = $("#validToDate").val();

        const formData = new FormData();
        formData.append('company_id', company_id);
        formData.append('license_key', license_key);
        formData.append('duration', duration);
        formData.append('started_at', started_at);
        formData.append('expired_at', expired_at);

        $.ajax({
            url: '/admin/license-assign',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success === true) {
                    $("#license_assigned_success")
                        .html("<strong>5. License assigned successfully!</strong>")
                        .fadeIn(3000)
                        .css({'color': 'green', 'display': 'block'});

                    setTimeout(() => {
                        saveUserDetails(companyDetail);
                    }, 1000)
                }
            },
            error: function (error) {
                // Handle the error response
                console.error('Error assigning license:', error);
            }
        });
    }

    function saveUserDetails(companyDetail) {
        $("#user_details_saved_success").html("<svg style='height: 30px;' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='25' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='-.4'></animate></rect><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='85' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='-.2'></animate></rect><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='145' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='0'></animate></rect></svg>");
        const company_id = companyDetail.data.company_id;
        const name = $("#name").val();
        const email = $("#email").val();
        const username = $("#username").val();
        const mobile = $("#mobile").val();

        const formData = new FormData();
        formData.append('company_id', company_id);
        formData.append('name', name);
        formData.append('email', email);
        formData.append('username', username);
        formData.append('mobile', mobile);

        $.ajax({
            url: '/admin/bind_user_with_company',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            contentType: false,
            processData: false,
            success: function (response) {
                if (response.success === true) {
                    $("#user_details_saved_success")
                        .empty()
                        .html(`<strong>6. User details saved successfully!</strong>`)
                        .fadeIn(3000)
                        .css({'color': 'green', 'display': 'block'});

                    setTimeout(showConfirmationPopup, 2000);
                }
            },
            error: function (error) {
                console.error('Error saving user details:', error);
                // Handle the error response, display error message, etc.
                const errors = error.responseJSON.errors;
                for (const key in errors) {
                    if (key === 'email') {
                        $("#email_error").text(errors[key][0]);
                    }
                    if (key === 'username') {
                        $("#username_error").text(errors[key][0]);
                    }
                }
            }
        });
    }

    function showConfirmationPopup() {
        Swal.fire({
            icon: 'success',
            title: 'Operations Completed',
            html: '<table style="text-align: left; width: 100%;">' +
                '<tr><td><strong>Company Details:</strong></td><td class="text-success">Saved</td></tr>' +
                '<tr><td><strong>Certification Details:</strong></td><td class="text-success">Saved</td></tr>' +
                '<tr><td><strong>Contact Details:</strong></td><td class="text-success">Saved</td></tr>' +
                '<tr><td><strong>Modules:</strong></td><td class="text-success">Assigned</td></tr>' +
                '<tr><td><strong>License:</strong></td><td class="text-success">Assigned</td></tr>' +
                '<tr><td><strong>User Details:</strong></td><td class="text-success">Saved</td></tr>' +
                '<tr><td><strong>Welcome mail:</strong></td><td class="text-success">Sent</td></tr>' +
                '</table>',
            confirmButtonColor: '#28a745', // Green color
            confirmButtonText: 'Confirm',
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to admin/dashboard
                window.location.href = '/admin/companies';
            }
        });
    }



});
