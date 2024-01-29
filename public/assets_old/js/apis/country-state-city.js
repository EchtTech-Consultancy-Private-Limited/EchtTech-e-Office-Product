$(document).ready(function () {
    // Triggered when the country select changes
    $('#country').on('change', function () {
        var countryId = $(this).val();

        // Make an AJAX request to get states based on the selected country
        $.ajax({
            url: '/api/get-states',
            type: 'GET',
            data: { country: countryId },
            success: function (data) {
                if (data.success) {
                    // Clear existing options
                    $('#state').empty();

                    // Populate states dropdown with retrieved data
                    $('#state').append('<option value="">Select State</option>');

                    $.each(data.data, function (key, value) {
                        $('#state').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                } else {
                    // Handle no states found for the selected country
                    console.error(data.message);
                }
            },
            error: function (xhr, status, error) {
                // Handle AJAX error
                console.error(xhr.responseText);
            }
        });
    });

    // Triggered when the country select changes
    $('#state').on('change', function () {
        var stateId = $(this).val();

        // Make an AJAX request to get states based on the selected country
        $.ajax({
            url: '/api/get-cities',
            type: 'GET',
            data: { state: stateId },
            success: function (data) {
                if (data.success) {
                    // Clear existing options
                    $('#city').empty();

                    // Populate states dropdown with retrieved data
                    $('#city').append('<option value="">Select City</option>');

                    $.each(data.data, function (key, value) {
                        $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                } else {
                    // Handle no states found for the selected country
                    $('#city').empty();
                    console.error(data.message);
                }
            },
            error: function (xhr, status, error) {
                // Handle AJAX error
                $('#city').empty();
                console.error(xhr.responseText);
            }
        });
    });
});
