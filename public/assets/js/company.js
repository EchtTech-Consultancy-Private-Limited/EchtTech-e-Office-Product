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

    const logo = $('#log');
    const logo_error = $('#log_error');

    //Step 1 validation
    if (stepper.currentStepIndex === 1){
        if (app_name === ""){
            app_name_error.text("Please enter app name");
            return;
        }else{
            app_name_error.text('');
        }
        if (db_name === ""){
            db_name_error.text("Please enter database name");
            return;
        }else{
            const db_name_pattern = /^[a-z_][a-z0-9_]*$/; // Allows only lowercase letters, numbers, and underscores, and cannot start with a number
            if (!db_name.match(db_name_pattern)) {
                db_name_error.text("Database name can only contain lowercase letters, numbers, and underscores. It cannot start with a number.");
                return;
            } else {
                db_name_error.text('');
            }
        }
    }

    // Logo validation (Step 1)
    if (stepper.currentStepIndex === 1) {
        const allowedExtensions = ['jpg', 'jpeg', 'png'];
        const maxFileSize = 1 * 1024 * 1024; // 1 MB

        const logo = $('#logo');
        const logo_error = $('#logo_error');

        if (!logo[0].files || logo[0].files.length === 0) {
            logo_error.text("Please select a logo file");
            return;
        }

        const fileName = logo.val();
        const fileExtension = fileName.split('.').pop().toLowerCase();

        if ($.inArray(fileExtension, allowedExtensions) === -1) {
            logo_error.text("Please select a valid logo file (JPEG, PNG, JPG)");
            return;
        }

        if (logo[0].files[0].size > maxFileSize) {
            logo_error.text("Maximum file size is 1 MB");
            return;
        }

        logo_error.text('');
    }

    // Step 2
    if (stepper.currentStepIndex === 2){
        const company_name = $('#company_name').val();
        const company_name_error = $('#company_name_error');

        if (company_name === ""){
            company_name_error.text("Please enter company name");
            return;
        }else{
            company_name_error.text('');
        }

        const govt_tax_ein_number = $('#gov_tax_number_ein').val();
        const govt_tax_ein_number_error = $('#gov_tax_number_ein_error');

        if (govt_tax_ein_number === ""){
            govt_tax_ein_number_error.text("Please enter government tax number/ein number");
            return;
        }else{
            govt_tax_ein_number_error.text('');
        }

        const legal_trading_name = $('#legal_trading_name').val();
        const legal_trading_name_error = $('#legal_trading_name_error');

        if (legal_trading_name === ""){
            legal_trading_name_error.text("Please enter legal/trading name");
            return;
        }else{
            legal_trading_name_error.text('');
        }

        const registration_number = $('#registration_number').val();
        const registration_number_error = $('#registration_number_error');

        if (registration_number === ""){
            registration_number_error.text("Please enter registration number");
            return;
        }else{
            registration_number_error.text('');
        }

        const country = $('#country').val();
        const country_error = $('#country_error');

        if (country === ""){
            country_error.text("Please select country");
            return;
        }else{
            country_error.text('');
        }

        const state = $('#state').val();
        const state_error = $('#state_error');

        if (state === ""){
            state_error.text("Please select state");
            return;
        }else{
            state_error.text('');
        }

        const city = $('#city').val();
        const city_error = $('#city_error');

        if (city === ""){
            city_error.text("Please select city");
            return;
        }else{
            city_error.text('');
        }

        const pin_code = $('#pin_code').val();
        const pin_code_error = $('#pin_code_error');

        if (pin_code === "") {
            pin_code_error.text("Please enter a pin code");
        } else if (!/^\d{6}$/.test(pin_code)) {
            pin_code_error.text("Invalid pin code. Pin code must be a 6-digit number.");
        } else {
            // Proceed with further processing or clear any previous error messages
            pin_code_error.text("");
        }

        const address_line_1 = $('#address_line_1').val();
        const address_line_1_error = $('#address_line_1_error');

        if (address_line_1 === ""){
            address_line_1_error.text("Please enter address");
            return;
        }else{
            address_line_1_error.text('');
        }
    }

    //Step 3
    if (stepper.currentStepIndex === 3){
        const pancard = $('#pancard').val();
        const pancard_error = $('#pancard_error');

        if (pancard === ""){
            pancard_error.text("Please enter pan number");
            return;
        }else{
            pancard_error.text('');
        }

        const gst_number = $('#gst_number').val();
        const gst_number_error = $('#gst_number_error');

        if (gst_number === ""){
            gst_number_error.text("Please enter gst number");
            return;
        }else{
            gst_number_error.text('');
        }

        const tan_number = $('#tan_number').val();
        const tan_number_error = $('#tan_number_error');

        if (tan_number === ""){
            tan_number_error.text("Please enter tan number");
            return;
        }else{
            tan_number_error.text('');
        }

        const ministry_name = $('#ministry_name').val();
        const ministry_name_error = $('#ministry_name_error');

        if (ministry_name === ""){
            ministry_name_error.text("Please enter ministry name");
            return;
        }else{
            ministry_name_error.text('');
        }

        const registered_address = $('#registered_address').val();
        const registered_address_error = $('#registered_address_error');

        if (registered_address === ""){
            registered_address_error.text("Please enter registered address");
            return;
        }else{
            registered_address_error.text('');
        }

        const corporate_office_address = $('#corporate_office_address').val();
        const corporate_office_address_error = $('#corporate_office_address_error');

        if (corporate_office_address === ""){
            corporate_office_address_error.text("Please enter corporate address");
            return;
        }else{
            corporate_office_address_error.text('');
        }

        const billing_address = $('#billing_address').val();
        const billing_address_error = $('#billing_address_error');

        if (billing_address === ""){
            billing_address_error.text("Please enter corporate address");
            return;
        }else{
            billing_address_error.text('');
        }
    }

    if (stepper.currentStepIndex === 4){
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

    if (stepper.currentStepIndex === 6) {
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
                        $("#db_saved_success").html("1. Database <strong>" + response.database.name + "</strong> created successfully").fadeIn(1000).css('color', 'green');
                        saveBasicDetail(response.database.id);
                    } else {
                        console.error('Error saving database details:', response.error);
                        // Handle error, display error message, etc.
                    }
                },
                error: function (xhr, status, error) {
                    console.error('Error saving database details:', error);
                    // Handle error, display error message, etc.
                }
            });
        }
    });

    function saveBasicDetail(databaseId) {
        const app_name = $('#app_name').val();
        const company_name = $('#company_name').val();
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
            .css({ 'color': 'green', 'display': 'block' });

            // .delay(3000)
            // .fadeOut(1000);
        saveBusinessDetails(response.data.id);
    }

    function saveBusinessDetails(companyId){
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
            .css({ 'color': 'green', 'display': 'block' });
            saveContactDetails(response)
            // .delay(3000)
            // .fadeOut(1000);
    }

    function saveContactDetails(companyDetails){
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
            success: function(response) {
                if (response.success === true) {
                    $("#contact_details_saved_success")
                        .html("<strong>4. Contact details saved successfully!</strong>")
                        .fadeIn(3000)
                        .css({ 'color': 'green', 'display': 'block' });

                    assignLicense(response);
                }
            },
            error: function(error) {
                // Handle the error response
                console.error('Error saving data:', error);
            }
        });
    }

    function assignLicense(companyDetail) {
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
            success: function(response) {
                if (response.success === true) {
                    $("#license_assigned_success")
                        .html("<strong>5. License assigned successfully!</strong>")
                        .fadeIn(3000)
                        .css({ 'color': 'green', 'display': 'block' });
                }
            },
            error: function(error) {
                // Handle the error response
                console.error('Error assigning license:', error);
            }
        });
    }
});
