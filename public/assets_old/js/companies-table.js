$(document).ready(function () {

    var currentPage = 1;
    var perPage = 10;
    var searchQuery = '';
    var isLoading = false;

    // Initial fetch
    fetchDepartmentData();

    // Search input keyup event with debounce
    var debounceTimeout;
    $('#searchCompanyInput').on('keyup', function () {
        clearTimeout(debounceTimeout);
        debounceTimeout = setTimeout(function () {
            searchQuery = $(this).val();
            currentPage = 1; // Reset to the first page when searching
            fetchDepartmentData();
        }.bind(this), 300);
    });

    // Display range select change event
    $('#displayRange').on('change', function () {
        perPage = $(this).val();
        currentPage = 1; // Reset to the first page when changing the display range
        fetchDepartmentData();
    });

    function fetchDepartmentData() {
        if (isLoading) {
            return;
        }

        isLoading = true;

        $("#companyTableData").html(`
            <tr>
                <td colspan="4">
                    <div class="w-100 m-top-20 d-flex justify-content-center">
                        <div id="spinner"></div>
                    </div>
                </td>
            </tr>
        `);

        // Use a closure to capture the current value of searchQuery
        var currentSearchQuery = searchQuery;

        $.ajax({
            url: '/admin/companies-list',
            type: 'GET',
            data: {page: currentPage, perPage: perPage, search: currentSearchQuery},
            success: function (response) {
                // Check if the search query has changed before processing the response
                if (currentSearchQuery === searchQuery) {
                    updateTableBody(response.data, response.current_page, response.per_page);
                    updatePagination(response);
                }
                isLoading = false;
            },
            error: function () {
                isLoading = false;
            }
        });
    }

    function updateTableBody(data, currentPage, perPage) {
        var tableBody = $('#companyTableData');
        tableBody.empty();

        // Ensure that currentPage and perPage are valid numbers
        currentPage = parseInt(currentPage) || 1;
        perPage = parseInt(perPage) || 10;

        var startSerial = (currentPage - 1) * perPage + 1; // Calculate starting serial number

        data.forEach(function (company, index) {
            var createdAt = new Date(company.created_at);
            var formattedDate = createdAt.toLocaleDateString('en-GB');

            var row = `<tr>
    <td>${startSerial + index}</td>
    <td><img src="${company.logo_path}" class="lozad rounded w-40px h-40px" alt="Company Logo"></td>
    <td>${company.company_name}</td>
    <td>${company.company_email}</td>
    <td>${company.phone}</td>
    <td>${company.pincode}</td>
    <td>${formattedDate}</td>
    <td class="dropdown">
        <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="actionDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Action
        </button>
        <div class="dropdown-menu" aria-labelledby="actionDropdown">
            <a class="dropdown-item" href="#">Edit</a>
            <a class="dropdown-item" href="#">Delete</a>
        </div>
    </td>
</tr>`;


            tableBody.append(row);
        });
    }

    function updatePagination(response) {
        var paginationContainer = $('#paginationContainer');
        paginationContainer.empty();

        if (response.total > 0) {
            var totalPages = Math.ceil(response.total / response.per_page);

            var startRecord = (response.current_page - 1) * response.per_page + 1;
            var endRecord = Math.min(startRecord + response.per_page - 1, response.total);

            var paginationLinks = '<div id="showingRecordAndTotalRecord">Showing ' + startRecord + ' to ' + endRecord + ' of ' + response.total + ' records</div><ul class="pagination">';
            // Previous
            paginationLinks += '<li class="page-item ' + (response.current_page == 1 ? 'disabled' : '') + '"><a href="#" class="page-link" data-page="' + (response.current_page - 1) + '"><i class="fas fa-chevron-left"></i></a></li>';

            // Page numbers
            for (var i = 1; i <= totalPages; i++) {
                paginationLinks += '<li class="page-item ' + (response.current_page == i ? 'active' : '') + '"><a href="#" class="page-link" data-page="' + i + '">' + i + '</a></li>';
            }

            // Next
            paginationLinks += '<li class="page-item ' + (response.current_page == totalPages ? 'disabled' : '') + '"><a href="#" class="page-link" data-page="' + (response.current_page + 1) + '"><i class="fas fa-chevron-right"></i></a></li>';

            paginationLinks += '</ul>';

            paginationContainer.html(paginationLinks);
        }
    }

    // Event delegation for dynamically added pagination links
    $('#paginationContainer').on('click', '.page-link', function (e) {
        e.preventDefault();
        currentPage = $(this).data('page');
        fetchDepartmentData();
    });
});
