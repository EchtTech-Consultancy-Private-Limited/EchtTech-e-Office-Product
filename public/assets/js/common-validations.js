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


function handlePincodeInput(inputId, errorId) {
    return function () {
        const input = $(`#${inputId}`);
        const error = $(`#${errorId}`);

        let pincode = input.val().trim();

        // Remove non-numeric characters
        pincode = pincode.replace(/\D/g, '');

        // Limit to 6 digits
        pincode = pincode.slice(0, 6);

        // Update the input value
        input.val(pincode);

        // Display an error message if the entered value is not exactly 6 digits
        if (pincode.length !== 6) {
            error.text("Please enter a valid 6-digit numeric pincode.");
        } else {
            error.text('');
        }
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
    $('#name').on('keyup', debounce(handleCommonInputs('name', 'name_error'), 300));
    $('#email').on('keyup', debounce(handleEmailInput('email', 'email_error'), 300));
    $('#mobile').on('keyup', debounce(handleMobileNumberInput('mobile', 'mobile_error'), 300));
    $('#pincode').on('keyup', debounce(handlePincodeInput('pincode', 'pincode_error'), 300));

    // country, state and city validations
    const countryErrorMessage = "Please select a country.";
    const stateErrorMessage = "Please select a state.";
    const cityErrorMessage = "Please select a city.";
    $('#country').on('change', debounce(handleLocationSelection('country', 'country_error', countryErrorMessage),300));
    $('#state').on('change', debounce(handleLocationSelection('state', 'state_error', stateErrorMessage),300));
    $('#city').on('change', debounce(handleLocationSelection('city', 'city_error', cityErrorMessage),300));
});