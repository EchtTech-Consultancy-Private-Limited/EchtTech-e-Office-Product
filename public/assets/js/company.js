
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
    }

    stepper.goNext(); // go next step
});

// Handle previous step
stepper.on("kt.stepper.previous", function (stepper) {
    stepper.goPrevious(); // go previous step
});


//ISO certification
function toggleFileInput() {
    var fileInput = document.getElementById("iso_certification_file");
    var yesRadio = document.getElementById("iso_yes");

    // Show the file input if "Yes" is selected, hide it otherwise
    fileInput.style.display = yesRadio.checked ? "block" : "none";
}
