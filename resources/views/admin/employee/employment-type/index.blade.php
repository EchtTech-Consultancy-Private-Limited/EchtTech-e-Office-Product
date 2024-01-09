<x-admin.layout.app-layout>
    <x-slot name="title">
        Employment Type Master
    </x-slot>
    <x-common.card>
<x-slot name="title">
    Employment Types
</x-slot>
<x-slot name="headerButton">
    <button class="btn btn-light-primary" data-bs-toggle="modal" id="modalopen" data-bs-target="#kt_modal_1">Add New</button>
</x-slot>
    </x-common.card>

    <div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h3 class="modal-title">Employment Type</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                <i class="bi bi-x fs-2x"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body pb-0 pt-4">
            <div class="mb-5">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control form-control-solid" id="employementtype" name="input3" placeholder="" value=""/>
                <span class="text-danger" id="employementtype_error"></span>

            </div>
            <div class="mb-5">
                <label for="" class="form-label">Description(Optional)</label>
                <textarea class="form-control form-control form-control-solid" data-kt-autosize="true"></textarea>
            </div>
            <div>
                <x-active-in-active-toggle/>
            </div>
            </div>

            <div class="modal-footer p-4">
                <!-- <button type="button" class="btn btn-light" >Close</button> -->
                <button onclick="emp_type_save()" type="button" class="btn btn-primary btn-sm" >Save changes</button>
            </div>
        </div>


    </div>
</div>
<x-slot name="script">
      <script src="{{ asset('/assets/js/employmenttype.js') }}" ></script>
</x-slot>
</x-admin.layout.app-layout>
