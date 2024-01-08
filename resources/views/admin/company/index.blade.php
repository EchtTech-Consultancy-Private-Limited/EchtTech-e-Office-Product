<x-admin.layout.app-layout>
    <x-slot name="title">
        Company Listing
    </x-slot>
    <x-slot name="breadcrumb">
        Company Listing
    </x-slot>
    <x-common.card>
        <x-slot name="title">
            List
        </x-slot>
        <x-slot name="headerButton">
            <a href="{{ route('admin.companies.create') }}" class="btn btn-light-primary">Add New</a>
        </x-slot>
        <x-slot name="body">
            <div class="d-flex">
                <div class="m-2">
                    <input class="form-control form-control-solid" id="searchCompanyInput" placeholder="Search designation...">
                </div>
                <div class="m-2">
                    <div class="dataTables_length" id="displayRangeContainer">
                        <label>
                            <select name="kt_datatable_zero_configuration_length" id="displayRange" aria-controls="kt_datatable_zero_configuration" class="form-select form-select-solid">
                                <option value="10">10</option><option value="25">25</option><option value="50">50</option>
                                <option value="100">100</option></select></label>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table id="kt_datatable_zero_configuration" class="table table-row-bordered gy-5">
                <thead>
                <tr class="fw-semibold fs-6 text-gray-800">
                    <th>Sr.No.</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="companyTableData">
                </tbody>
            </table>
            </div>
        </x-slot>
    </x-common.card>
    <x-slot name="script">
        <script src="{{ asset('assets/js/companies-table.js') }}"></script>
    </x-slot>
</x-admin.layout.app-layout>
