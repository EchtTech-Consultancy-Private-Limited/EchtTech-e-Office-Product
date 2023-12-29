$(document).ready(function () {

    // Initial fetch
    fetchDepartmentData();

    // Search input keyup event
    $('#searchDepartmentInput').on('keyup', function () {
        fetchDepartmentData(1, $('#displayRange').val(), $(this).val());
    });

    // Display range select change event
    $('#displayRange').on('change', function () {
        fetchDepartmentData(1, $(this).val(), $('#searchDepartmentInput').val());
    });

    function fetchDepartmentData(page = 1, perPage = 10, search = '') {
        $("#departmentTableBody").html(`
    <tr>
        <td colspan="4">
            <div class="w-100 m-top-20 d-flex justify-content-center">
                <div id="spinner"></div>
            </div>
        </td>
    </tr>
`);

        $.ajax({
            url: '/admin/departments-list',
            type: 'GET',
            data: { page: page, perPage: perPage, search: search },
            success: function (response) {
                updateTableBody(response.data, response.current_page, response.per_page);
                updatePagination(response);
            }
        });
    }

    function updateTableBody(data, currentPage, perPage) {
        var tableBody = $('#departmentTableBody');
        tableBody.empty();

        // Ensure that currentPage and perPage are valid numbers
        currentPage = parseInt(currentPage) || 1;
        perPage = parseInt(perPage) || 10;

        var startSerial = (currentPage - 1) * perPage + 1; // Calculate starting serial number

        data.forEach(function (department, index) {
            var statusBadge = department.is_active === 1
                ? '<span class="badge badge-success">Active</span>'
                : '<span class="badge badge-danger">Inactive</span>';

            var row = '<tr>' +
                '<td>' + (startSerial + index) + '</td>' + // Updated serial number calculation
                '<td>' + department.name + '</td>' +
                '<td>' + department.title + '</td>' +
                '<td>' + statusBadge + '</td>' +
                '</tr>';

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
        var page = $(this).data('page');
        fetchDepartmentData(page, $('#displayRange').val(), $('#searchDepartmentInput').val());
    });
});
