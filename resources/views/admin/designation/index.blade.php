<x-admin.layout.app-layout>
    <x-slot name="title">Designations Listing</x-slot>
    <x-common.card>
        <x-slot name="title">
            Designations Listing
        </x-slot>
        <x-slot name="headerButton">
            <a href="{{ route('admin.designations.create') }}" class="btn btn-light-primary">Add New</a>
        </x-slot>
        <x-slot name="body">
            <div class="d-flex">
                <div class="m-2">
                    <input class="form-control form-control-solid" id="searchDesignationInput" placeholder="Search designation...">
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
            <div class="table-responsive pl-10">
                <table class="table table-bordered table-row-bordered gy-5">
                    <thead>
                    <tr class="fw-bold fs-6 text-gray-800">
                        <th>Sr.No.</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody id="designationsTableBody">

                    </tbody>
                </table>
            </div>
            <div id="paginationContainer" class="mt-3 w-100 d-flex justify-content-between">
                <!-- Pagination links will be added here -->
            </div>
        </x-slot>
    </x-common.card>
    <x-slot name="script">
        <script src="{{ asset('assets/js/designations-table.js') }}"></script>
    </x-slot>
</x-admin.layout.app-layout>
