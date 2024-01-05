// Debounce function to limit the frequency of function calls
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
function handleInput() {
    const db_name_input = $('#db_name');
    const db_name_error = $('#db_name_error');

    let db_name = db_name_input.val();

    // Convert to lowercase, remove spaces, and remove special characters except underscores
    db_name = db_name.toLowerCase().replace(/\s+/g, '').replace(/[^a-z0-9_]/g, '');

    // Remove consecutive underscores
    db_name = db_name.replace(/_+/g, '_');

    // Remove underscore at the beginning
    db_name = db_name.replace(/^_/, '');

    db_name_input.val(db_name); // Update the input value

    const db_name_pattern = /^[a-z_][a-z0-9_]*$/;

    if (db_name.length < 6 || db_name.length > 20) {
        db_name_error.text("Database name must be between 5 and 10 characters.");
        return;
    }

    if (!db_name.match(db_name_pattern)) {
        db_name_error.text("Database name can only contain lowercase letters, numbers, and underscores. It cannot start with a number.");
        return;
    }

    db_name_error.text('');
}

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


function handleLocationSelection(inputId, errorId, errorMessage) {
    return function () {
        const input = $(`#${inputId}`);
        const error = $(`#${errorId}`);

        // Check if a value is selected
        if (input.val() === '') {
            error.text(errorMessage);
            return;
        }

        error.text('');
    };
}


$(document).ready(function () {
    const db_name_input = $('#db_name');

    // Attach the debounced handleInput function to the onkeyup event
    db_name_input.on('keyup', debounce(handleInput, 300));
    $('#app_name').on('keyup', debounce(handleCommonInputs('app_name', 'app_name_error'), 300));
    $('#company_name').on('keyup', debounce(handleCommonInputs('company_name', 'company_name_error'), 300));
    $('#company_email').on('keyup', debounce(handleEmailInput('company_email', 'company_email_error'), 300));
    $('#pin_code').on('keyup', debounce(handlePincodeInput('pin_code', 'pin_code_error'), 300));

    const countryErrorMessage = "Please select a country.";
    const stateErrorMessage = "Please select a state.";
    const cityErrorMessage = "Please select a city.";

    $('#country').on('change', debounce(handleLocationSelection('country', 'country_error', countryErrorMessage),300));
    $('#state').on('change', debounce(handleLocationSelection('state', 'state_error', stateErrorMessage),300));
    $('#city').on('change', debounce(handleLocationSelection('city', 'city_error', cityErrorMessage),300));
    $('#address_line_1').on('keyup', debounce(handleAddressInput('address_line_1', 'address_line_1_error'),300));
    $('#registered_address').on('keyup', debounce(handleAddressInput('registered_address', 'registered_address_error'),300));
    $('#billing_address').on('keyup',debounce( handleAddressInput('billing_address', 'billing_address_error'),300));
    $('#corporate_office_address').on('keyup',debounce( handleAddressInput('corporate_office_address', 'corporate_office_address_error'),300));
});

// Stepper lement
var element = document.querySelector("#kt_create_account_stepper");

// Initialize Stepper
var stepper = new KTStepper(element);

// Handle next step
stepper.on("kt.stepper.next", function (stepper) {

// company setup form validations


    const app_name = $('#app_name').val();
    const app_name_error = $('#app_name_error');

    const db_name = $('#db_name').val();
    const db_name_error = $('#db_name_error');

    const logo = $('#logo');
    const logo_error = $('#logo_error');

    // Step 1 validation
    const validationErrors = {};

    if (stepper.currentStepIndex === 1) {
        if (app_name === "") {
            app_name_error.text("Please enter app name");
            validationErrors.app_name = "Please enter app name";
        } else {
            app_name_error.text('');
        }

        if (db_name === "") {
            db_name_error.text("Please enter database name");
            validationErrors.db_name = "Please enter database name";
        } else {
            const db_name_pattern = /^[a-z_][a-z0-9_]*$/; // Allows only lowercase letters, numbers, and underscores, and cannot start with a number
            if (!db_name.match(db_name_pattern)) {
                db_name_error.text("Database name can only contain lowercase letters, numbers, and underscores. It cannot start with a number.");
                validationErrors.db_name = "Invalid database name";
            } else {
                db_name_error.text('');
            }
        }

        // Logo validation (Step 1)
        const allowedExtensions = ['jpg', 'jpeg', 'png'];
        const maxFileSize = 1 * 1024 * 1024; // 1 MB

        if (!logo[0].files || logo[0].files.length === 0) {
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
        if (Object.keys(validationErrors).length > 0) {
            // You can access specific errors using the keys, e.g., validationErrors.app_name
            // Scroll to the first error field
            $('#' + Object.keys(validationErrors)[0]).focus();
            return;
        }
    }

    // Step 2 validation


    if (stepper.currentStepIndex === 2) {
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

        // Display all errors
        if (Object.keys(validationErrorsStep2).length > 0) {
            // Scroll to the first error field
            $('#' + Object.keys(validationErrorsStep2)[0]).focus();
            return;
        }
    }

    //Step 3
    if (stepper.currentStepIndex === 3) {
        const validationErrorsStep3 = {};

        // Pan Card validation
        const pancard = $('#pancard').val();
        const pancard_error = $('#pancard_error');
        if (pancard === "") {
            pancard_error.text("Please enter pan number");
            validationErrorsStep3.pancard = "Please enter pan number";
        } else {
            pancard_error.text('');
        }

        // GST Number validation
        const gst_number = $('#gst_number').val();
        const gst_number_error = $('#gst_number_error');
        if (gst_number === "") {
            gst_number_error.text("Please enter gst number");
            validationErrorsStep3.gst_number = "Please enter gst number";
        } else {
            gst_number_error.text('');
        }

        // TAN Number validation
        const tan_number = $('#tan_number').val();
        const tan_number_error = $('#tan_number_error');
        if (tan_number === "") {
            tan_number_error.text("Please enter tan number");
            validationErrorsStep3.tan_number = "Please enter tan number";
        } else {
            tan_number_error.text('');
        }

        // Display all errors for Step 3
        if (Object.keys(validationErrorsStep3).length > 0) {
            // Scroll to the first error field
            $('#' + Object.keys(validationErrorsStep3)[0]).focus();
            return;
        }

    }

    if (stepper.currentStepIndex === 4) {
        const phone = $('#phone').val();
        const phone_error = $('#phone_error');

        if (phone === "") {
            phone_error.text("Please enter phone number");
            return;
        } else if (!/^\d{10}$/.test(phone)) {
            phone_error.text("Invalid phone number. Phone number must be a 10-digit number.");
            return;
        } else {
            phone_error.text('');
        }

    }

    if (stepper.currentStepIndex === 5) {
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

    if (stepper.currentStepIndex === 6) {
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
        $("#db_saved_success").html("<svg style='height: 30px;' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='25' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='-.4'></animate></rect><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='85' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='-.2'></animate></rect><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='145' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='0'></animate></rect></svg>");
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

        // Database Details
        const dbName = $("#db_name").val();


        if (dbName) {
            $.ajax({
                type: 'POST',
                url: '/admin/save_db_details',
                data: {
                    "dbName": dbName
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    if (response.success === true) {

                        $('#lastStepContent').slideUp('slow');
                        $("#db_saved_success").html("<strong>1. Database" + "<span class='text-dark'> " + response.database.name + " </span>" + " created successfully</strong>").fadeIn(1000).css('color', 'green');
                        setTimeout(function () {
                            saveBasicDetail(response.database.id);
                        }, 1000);
                    } else {
                        console.error('Error saving database details:', response.error);
                        // Handle error, display error message, etc.
                    }
                },
                error: function (xhr, status, error) {
                    // Hide loading spinner on error
                    $("#loadingSpinner").hide();

                    console.error('Error saving database details:', error);
                    // Handle error, display error message, etc.
                }
            });
        }
    });

    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function saveBasicDetail(databaseId) {
        $("#basic_data_saved_success").html("<svg style='height: 30px;' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='25' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='-.4'></animate></rect><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='85' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='-.2'></animate></rect><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='145' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='0'></animate></rect></svg>");

        const app_name = $('#app_name').val();
        const company_name = $('#company_name').val();
        const company_email = $('#company_email').val();
        const govt_tax_ein_number = $('#gov_tax_number_ein').val();
        const legal_trading_name = $('#legal_trading_name').val();
        const registration_number = $('#registration_number').val();
        const country = $('#country').val();
        const state = $('#state').val();
        const city = $('#city').val();
        const pin_code = $('#pin_code').val();
        const address_line_1 = $('#address_line_1').val();
        const address_line_2 = $('#address_line_2').val();
        const description = $('#description').val();
        const logo = $('#logo')[0].files[0];

        const formData = new FormData();
        formData.append('app_name', app_name);
        formData.append('company_name', company_name);
        formData.append('company_email', company_email);
        formData.append('govt_tax_ein_number', govt_tax_ein_number);
        formData.append('legal_trading_name', legal_trading_name);
        formData.append('registration_number', registration_number);
        formData.append('country', country);
        formData.append('state', state);
        formData.append('city', city);
        formData.append('pin_code', pin_code);
        formData.append('address_line_1', address_line_1);
        formData.append('address_line_2', address_line_2);
        formData.append('description', description);
        formData.append('logo', logo);
        formData.append('database', databaseId);

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
        $("#basic_data_saved_success")
            .html("<strong>2. Basic Data Saved Successfully</strong>")
            .fadeIn(2000)
            .css({'color': 'green', 'display': 'block'});
        setTimeout(() => {
            saveBusinessDetails(response.data.id);
        }, 1000);

    }

    function saveBusinessDetails(companyId) {
        $("#business_details_saved_success").html("<svg style='height: 30px;' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 200 200'><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='25' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='-.4'></animate></rect><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='85' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='-.2'></animate></rect><rect fill='#1646BE' stroke='#1646BE' stroke-width='9' width='30' height='30' x='145' y='85'><animate attributeName='opacity' calcMode='spline' dur='2' values='1;0;1;' keySplines='.5 0 .5 1;.5 0 .5 1' repeatCount='indefinite' begin='0'></animate></rect></svg>");

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
            success: handleSaveBusinessDetailsSuccess,
            error: function (error) {
                console.error('Error saving business details:', error);
                // Handle error, display error message, etc.
            }
        });
    }

    function handleSaveBusinessDetailsSuccess(response) {

        // Display success message with fade animation, strong text, and green color

        $("#business_details_saved_success")
            .html("<strong>3. Business Details Saved Successfully</strong>")
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
                        .html("<strong>4. Contact details saved successfully!</strong>")
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
                        .html("<strong>5. Modules assigned successfully</strong>")
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
                        .html("<strong>6. License assigned successfully!</strong>")
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
                        .html(`<strong>7. User details saved successfully!</strong>`)
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
                '<tr><td><strong>Database:</strong></td><td class="text-success">Created</td></tr>' +
                '<tr><td><strong>Basic Details:</strong></td><td class="text-success">Saved</td></tr>' +
                '<tr><td><strong>Business Details:</strong></td><td class="text-success">Saved</td></tr>' +
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

    function checkEmailAndUserNameDuplicate() {
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
                    // You might want to enable form submission or display a success message
                } else {
                    // Duplicates found, handle accordingly
                    console.log('Duplicates found.');
                    // You might want to disable form submission or display an error message
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
            }
        });
    }

});
