<x-admin.layout.app-layout>
    <x-slot name="title">
        Manage Roles
    </x-slot>
    <x-common.card>
        <x-slot name="title">
            Roles
        </x-slot>
        <x-slot name="button">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_client">Add New</button>
        </x-slot>
        <x-slot name="body">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
                <!--begin::Table head-->
                <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">

                    <th class="min-w-125px">Role</th>
                    <th class="min-w-125px">Title</th>
                    <th class="min-w-125px">Status</th>
                    <th class="text-end min-w-70px">Actions</th>
                </tr>
                <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-bold text-gray-600" id="rolesData">

                </tbody>
                <!--end::Table body-->
            </table>
            <div class="w-100 d-flex justify-content-center">
                <div id="loader" class="spinner-border text-primary" role="status" style="display: none;">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <!--end::Table-->
        </x-slot>
    </x-common.card>
    <div class="modal fade" id="kt_modal_new_client" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Create New Role</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                    </div>
                </div>
                <div class="modal-body">
                    <form id="kt_modal_new_card_form" class="form" action="#">
                        <div>
                            <x-common.text-input name="name" label="Name" id="name" />
                            <span class="text-danger" id="nameError"></span>
                        </div>
                        <div class="mt-5">
                            <x-common.text-input name="title" label="Title" id="title"/>
                            <span class="text-danger" id="titleError"></span>
                        </div>
                        <div class="form-check form-switch form-check-custom form-check-solid mt-5">
                            <input class="form-check-input" type="checkbox" value="" id="flexSwitchDefault"/>
                            <label class="form-check-label" for="flexSwitchDefault">
                                Status
                            </label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="d-flex w-100 justify-content-end">
                        <button type="button" id="submitBtn" class="btn btn-primary" onclick="submitForm()">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script src="{{ asset('assets/js/apis/roles.js') }}"></script>
    </x-slot>
</x-admin.layout.app-layout>
