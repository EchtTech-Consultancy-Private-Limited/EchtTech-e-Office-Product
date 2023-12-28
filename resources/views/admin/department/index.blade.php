<x-admin.layout.app-layout>
    <x-slot name="title">
        Departments
    </x-slot>
    <x-common.card>
        <x-slot name="title">
            Departments Listing
        </x-slot>
        <x-slot name="body">
            <div class="d-flex">
                <div class="m-2">
                    <input class="form-control form-control-solid" id="searchDepartmentInput" placeholder="Search department...">
                </div>
                <div class="m-2">
                    <select class="form-control form-control-solid" id="displayRange">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                        <option value="100">100</option>
                    </select>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800">
                        <th>Sr.No.</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody id="departmentTableBody">
                    </tbody>
                </table>

            </div>

            <div id="pagination" class="mt-3 w-100 d-flex justify-content-end">
                <!-- Pagination links will be added here -->
            </div>
        </x-slot>
    </x-common.card>
    <x-slot name="script">
        <script>
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
                    $.ajax({
                        url: '/admin/departments-list',
                        type: 'GET',
                        data: { page: page, perPage: perPage, search: search },
                        success: function (response) {
                            updateTableBody(response.data);
                            updatePagination(response);
                        }
                    });
                }

                function updateTableBody(data) {
                    var tableBody = $('#departmentTableBody');
                    tableBody.empty();

                    data.forEach(function (department, index) {
                        var statusBadge = department.is_active === 1
                            ? '<span class="badge badge-success">Active</span>'
                            : '<span class="badge badge-danger">Inactive</span>';

                        var row = '<tr>' +
                            '<td>' + (index + 1) + '</td>' + // Serial number
                            '<td>' + department.name + '</td>' +
                            '<td>' + department.title + '</td>' +
                            '<td>' + statusBadge + '</td>' +
                            '</tr>';

                        tableBody.append(row);
                    });
                }


                function updatePagination(response) {
                    var paginationDiv = $('#pagination');
                    paginationDiv.empty();

                    if (response.total > 0) {
                        var totalPages = Math.ceil(response.total / response.per_page);

                        var paginationLinks = '<ul class="pagination">';
                        // Previous
                        paginationLinks += '<li class="page-item previous ' + (response.current_page == 1 ? 'disabled' : '') + '"><a href="#" class="page-link" data-page="' + (response.current_page - 1) + '"><i class="previous"></i></a></li>';

                        // Page numbers
                        for (var i = 1; i <= totalPages; i++) {
                            paginationLinks += '<li class="page-item ' + (response.current_page == i ? 'active' : '') + '"><a href="#" class="page-link" data-page="' + i + '">' + i + '</a></li>';
                        }

                        // Next
                        paginationLinks += '<li class="page-item next ' + (response.current_page == totalPages ? 'disabled' : '') + '"><a href="#" class="page-link" data-page="' + (response.current_page + 1) + '"><i class="next"></i></a></li>';

                        paginationLinks += '</ul>';

                        paginationDiv.html(paginationLinks);
                    }
                }

                // Event delegation for dynamically added pagination links
                $('#pagination').on('click', '.page-link', function (e) {
                    e.preventDefault();
                    var page = $(this).data('page');
                    fetchDepartmentData(page, $('#displayRange').val(), $('#searchDepartmentInput').val());
                });
            });
        </script>
    </x-slot>
</x-admin.layout.app-layout>
