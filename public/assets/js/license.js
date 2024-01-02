$(document).ready(function() {
    // Cache frequently used selectors
    var generateLicenseButton = $('#generateLicense');
    var licenseKeyField = $('#license_key');
    var validFromField = $('#validFrom');
    var expireDateField = $('#expireDate');
    var licenseKeyDurationField = $('#licenseKeyDuration');
    var durationInput = $('#duration');
    var licenseGeneratorSection = $('#licenseGeneratorSection');
    var validFromDateInput = $('#validFromDate');
    var validToDateInput = $('#validToDate');
    var licenseKeyDataSection = $('#licenseKeyData');

    // Click event handler
    generateLicenseButton.click(function(e) {
        e.preventDefault();

        // Activate indicator
        generateLicenseButton.attr("data-kt-indicator", "on");

        // Call the function to perform AJAX request
        generateLicense();
    });

    // Function to generate license through AJAX
    function generateLicense() {
        $.ajax({
            type: 'POST',
            url: '/admin/generate-license',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                // Disable indicator
                generateLicenseButton.removeAttr("data-kt-indicator");

                // Handle the response
                handleSuccess(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);

                // Disable indicator in case of an error
                generateLicenseButton.removeAttr("data-kt-indicator");
            }
        });
    }

    // Function to handle success response
    function handleSuccess(response) {
        var licenseKey = response.license_key;
        var validFrom = response.valid_from;
        var expireDate = response.expire_date;

        licenseKeyField.val(licenseKey);
        validFromField.text(formatDate(validFrom));
        expireDateField.text(formatDate(expireDate));

        // Calculate and display the duration
        var duration = calculateDuration(validFrom, expireDate);
        licenseKeyDurationField.text(duration);

        // Set data in the additional input fields
        durationInput.val(duration);
        validFromDateInput.val(formatDate(validFrom));
        validToDateInput.val(formatDate(expireDate));

        // Show the #licenseKeyData section
        licenseKeyDataSection.show();

        // Hide the #license generation section
        licenseGeneratorSection.hide();

        licenseKeyField.prop('readonly', true);
        generateLicenseButton.prop('disabled', true);
    }

    // Function to format date
    function formatDate(date) {
        var d = new Date(date);
        var day = d.getDate().toString().padStart(2, '0');
        var month = (d.getMonth() + 1).toString().padStart(2, '0');
        var year = d.getFullYear().toString().substring(2);
        return day + '-' + month + '-' + year;
    }

    // Function to calculate duration
    function calculateDuration(start, end) {
        var startDate = new Date(start);
        var endDate = new Date(end);
        var durationInDays = Math.floor((endDate - startDate) / (24 * 60 * 60 * 1000));
        return durationInDays - 1 + ' days';
    }
});
