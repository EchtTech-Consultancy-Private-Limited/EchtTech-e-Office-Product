<x-admin.layout.app-layout>
    <div class="w-100 card p-4">
        <x-slot name="title">
            Employee Registration
        </x-slot>
        <x-slot name="breadcrumb">
            Employee <span class="h-20px border-1 border-gray-200 border-start ms-3 mx-2 me-1"></span> Registration
        </x-slot>
        <div class="w-100">
            <!--begin::Stepper-->
            <div class="stepper stepper-pills" id="kt_stepper_example_basic">
                <!--begin::Nav-->
                <div class="stepper-nav flex-center mb-10">
                    <!--begin::Step 1-->
                    <div class="stepper-item mx-4 my-2 current" data-kt-stepper-element="nav">
                        <!--begin::Wrapper-->
                        <div class="stepper-wrapper d-flex align-items-center">
                            <!--begin::Icon-->
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">1</span>
                            </div>
                            <!--end::Icon-->
                            <!--begin::Label-->
                            <div class="stepper-label">
                                <h4 class="stepper-title">
                                    Employee Details
                                </h4>
                                <!-- <div class="stepper-desc">
                           Description
                           </div> -->
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Line-->
                        <div class="stepper-line h-40px"></div>
                        <!--end::Line-->
                    </div>
                    <!--end::Step 1-->
                    <!--begin::Step 2-->
                    <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav">
                        <!--begin::Wrapper-->
                        <div class="stepper-wrapper d-flex align-items-center">
                            <!--begin::Icon-->
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">2</span>
                            </div>
                            <!--begin::Icon-->
                            <!--begin::Label-->
                            <div class="stepper-label">
                                <h4 class="stepper-title">
                                    Employee Education Detail
                                </h4>
                                <!-- <div class="stepper-desc">
                           Description
                           </div> -->
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Line-->
                        <div class="stepper-line h-40px"></div>
                        <!--end::Line-->
                    </div>
                    <!--end::Step 2-->
                    <!--begin::Step 3-->
                    <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav">
                        <!--begin::Wrapper-->
                        <div class="stepper-wrapper d-flex align-items-center">
                            <!--begin::Icon-->
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">3</span>
                            </div>
                            <!--begin::Icon-->
                            <!--begin::Label-->
                            <div class="stepper-label">
                                <h4 class="stepper-title">
                                    Work History
                                </h4>
                                <!-- <div class="stepper-desc">
                           Description
                           </div> -->
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Line-->
                        <div class="stepper-line h-40px"></div>
                        <!--end::Line-->
                    </div>
                    <!--end::Step 3-->
                    <!--begin::Step 4-->
                    <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav">
                        <!--begin::Wrapper-->
                        <div class="stepper-wrapper d-flex align-items-center">
                            <!--begin::Icon-->
                            <div class="stepper-icon w-40px h-40px">
                                <i class="stepper-check fas fa-check"></i>
                                <span class="stepper-number">4</span>
                            </div>
                            <!--begin::Icon-->
                            <!--begin::Label-->
                            <div class="stepper-label">
                                <h4 class="stepper-title">
                                    Bank Details
                                </h4>
                                <!-- <div class="stepper-desc">
                           Description
                           </div> -->
                            </div>
                            <!--end::Label-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Line-->
                        <div class="stepper-line h-40px"></div>
                        <!--end::Line-->
                    </div>
                    <!--end::Step 4-->
                </div>
                <!--end::Nav-->
                <!--begin::Form-->
                <form class="form w-100 mx-auto" novalidate="novalidate" id="kt_stepper_example_basic_form">
                    <!--begin::Group-->
                    <div class="mb-5">
                        <!--begin::Step 1-->
                        <div class="flex-column current" data-kt-stepper-element="content">
                            <div class="row">
                                <div class="col-md-4">

                                    <div class="mb-6">
                                        <label class="form-label">Employee ID</label>
                                        <input type="text" id="employee_id" class="form-control form-control-solid"
                                            name="input1" placeholder="" value="" />
                                        <span class="text-danger" id="employee_id_error"></span>
                                    </div>


                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">Name</label>
                                        <input type="text" id="name" class="form-control form-control-solid"
                                            name="input1" placeholder="" value="" />
                                        <span class="text-danger" id="name_error"></span>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">Email</label>
                                        <input type="email" id="email" class="form-control form-control-solid"
                                            name="input1" placeholder="" value="" />
                                        <span class="text-danger" id="email_error"></span>

                                    </div>


                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">Mobile</label>
                                        <input type="number" id="mobile" class="form-control form-control-solid"
                                            name="input1" placeholder="" value="" />
                                        <span class="text-danger" id="mobile_error"></span>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">
                                        <label class="form-label">Gender</label>
                                        <select class="form-select form-select-solid" id="emp_gender_req"
                                            data-control="select2" data-placeholder="Select an option"
                                            data-allow-clear="true">
                                            <option></option>
                                            <option value="1">Female</option>
                                            <option value="2">Male</option>
                                        </select>
                                        <span class="text-danger" id="emp_gender_error"></span>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-6">

                                        <div class="mb-0">
                                            <label for="" class="form-label">Date of birth</label>
                                            <input class="form-control form-control-solid" placeholder="Pick a date"
                                                id="dob" />
                                            <span class="text-danger" id="dob_error"></span>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-6">
                                        <x-common.country />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-6">
                                        <x-common.state />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-6">
                                        <x-common.city />
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="mb-6">
                                        <label for="" class="form-label">Pin Code</label>
                                        <input type="number" class="form-control form-control-solid" name="pincode"
                                            id="pincode" placeholder="" value="" />
                                        <span id="pincode_error" class="text-danger"></span>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-6">
                                        <label for="" class="form-label">Current Address</label>
                                        <textarea class="form-control form-control-solid" id="current_address" data-kt-autosize="true"></textarea>
                                        <span id="current_address_error" class="text-danger"></span>


                                    </div>




                                </div>

                                <div class="col-md-6">
                                    <div class="mb-6">
                                        <label for="" class="form-label">Permanent Address</label>
                                        <textarea class="form-control form-control-solid" id="permanent_address" data-kt-autosize="true"></textarea>
                                        <span id="permanent_address_error" class="text-danger"></span>

                                    </div>

                                </div>


                                <div class="col-md-12">

                                    <div class="mb-6 mt-6 w-125px  d-flex flex-column ">
                                        <label class="form-label ">Upload Image</label>

                                        <div class="image-input image-input-empty" data-kt-image-input="true">
                                            <div class="image-input-wrapper w-125px h-125px border"></div>

                                            <label
                                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                data-bs-dismiss="click" title="Change avatar">
                                                <i class="bi bi-pencil-fill"></i>

                                                <input id ="image" type="file" name="avatar"
                                                    accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="avatar_remove" />
                                            </label>

                                            <span
                                                class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                data-bs-dismiss="click" title="Cancel avatar">
                                                <i class="bi bi-x"></i>
                                            </span>


                                        </div>
                                        <span id="image_error" class="text-danger"></span>

                                    </div>



                                </div>

                            </div>
                        </div>
                        <!--begin::Step 1-->
                        <!--begin::Step 1-->
                        <div class="flex-column" data-kt-stepper-element="content">
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <div class="row">
                                    <div class="col-md-6">


                                        <div class="mb-6">
                                            <label class="form-label">Employee ID</label>
                                            <input type="text" class="form-control form-control-solid"
                                                name="input1" placeholder="" value="" />


                                        </div>


                                    </div>
                                    <div class="col-md-6">


                                        <div class="mb-6">
                                            <label class="form-label">Degree Name</label>
                                            <input type="text" id="employee_degree"
                                                class="form-control form-control-solid" name="input1" placeholder=""
                                                value="" />
                                            <span class="text-danger" id="employee_degree_error"></span>

                                        </div>


                                    </div>
                                    <div class="col-md-6">

                                        <div class="mb-6">
                                            <label class="form-label">Course Title</label>
                                            <input type="text" id="employee_course"
                                                class="form-control form-control-solid" name="input1" placeholder=""
                                                value="" />
                                            <span class="text-danger" id="employee_course_error"></span>

                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-6">

                                            <label class="form-label">Start Date(date format)</label>
                                            <!-- <input class="form-control form-control-solid" placeholder="Pick date & time" id="kt_datepicker_1"/> -->
                                            <input class="form-control form-control-solid" placeholder="Pick a date"
                                                id="kt_datepicker_12" />

                                            <span class="text-danger" id="employee_edu_strtdate_error"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-6">

                                            <label class="form-label">End Date(date format)</label>
                                            <input class="form-control form-control-solid" placeholder="Pick a date"
                                                id="kt_datepicker_21" />
                                            <span class="text-danger" id="employee_edu_enddate_error"></span>

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class=" mb-6 mt-6">
                                            <label class="form-label">Certificate File</label>
                                            <input type="file" id="emp_certificate_file"
                                                class="form-control form-control-solid" name="input1" placeholder=""
                                                value="" />
                                            <span class="text-danger" id="emp_certificate_file_error"></span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--begin::Step 1-->
                        <!--begin::Step 1-->
                        <div class="flex-column" data-kt-stepper-element="content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-6">
                                        <label class="form-label d-flex align-items-center">
                                            <span class="required">Employee ID</span>
                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                                title="Example tooltip"></i>
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="input1"
                                            placeholder="" value="" />
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-6">
                                        <label class="form-label d-flex align-items-center">
                                            <span class="required">Company Name</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid"
                                            id="wh_companyname" name="input1" placeholder="" value="" />
                                        <span class="text-danger" id="wh_companyname_error"></span>

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-6">
                                        <label class="form-label d-flex align-items-center">
                                            <span class="required">Department</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid"
                                            id="wh_department" name="input1" placeholder="" value="" />
                                        <span class="text-danger" id="wh_department_error"></span>

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-6">
                                        <label class="form-label d-flex align-items-center">
                                            <span class="required">Designation</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid"
                                            id="wh_designation" name="input1" placeholder="" value="" />
                                        <span class="text-danger" id="wh_designation_error"></span>

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-6">
                                        <label class="form-label d-flex align-items-center">
                                            <span class="required">Joining Date</span>
                                        </label>
                                        <input class="form-control form-control-solid" placeholder="Pick a date"
                                            id="kt_datepicker_jd" />
                                        <span class="text-danger" id="wh_join_date_error"></span>

                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-6">
                                        <label class="form-label d-flex align-items-center">
                                            <span class="required">Leaving Date</span>
                                        </label>
                                        <input class="form-control form-control-solid" placeholder="Pick a date"
                                            id="kt_datepicker_ld" />
                                        <span class="text-danger" id="wh_end_date_error"></span>

                                    </div>

                                </div>
                            </div>
                            <!--begin::Input group-->
                        </div>
                        <!--begin::Step 1-->
                        <!--begin::Step 1-->
                        <div class="flex-column" data-kt-stepper-element="content">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-6">
                                        <label class="form-label d-flex align-items-center">
                                            <span class="required">Account Type(PF/Bank)</span>
                                        </label>
                                        <input type="text" class="form-control form-control-solid"
                                            id="bnk_acctype" name="input1" placeholder="" value="" />
                                        <span class="text-danger" id="bnk_acctype_error"></span>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-6">
                                        <label class="form-label">
                                            Account Number
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="input2"
                                            placeholder="" value="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-6">
                                        <label class="form-label">
                                            Bank Name
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="input3"
                                            placeholder="" value="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-6">
                                        <label class="form-label">
                                            IFSC Code
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="input3"
                                            placeholder="" value="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-6">
                                        <label class="form-label">
                                            Branch Address
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="input3"
                                            placeholder="" value="" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-6">
                                        <label class="form-label">
                                            Passbook
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="input3"
                                            placeholder="" value="" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-6">
                                        <label class="form-label">
                                            Document File
                                        </label>
                                        <input type="text" class="form-control form-control-solid" name="input3"
                                            placeholder="" value="" />
                                    </div>
                                </div>
                            </div>
                            <!--end::Input group-->
                        </div>
                        <!--begin::Step 1-->
                    </div>
                    <!--end::Group-->
                    <!--begin::Actions-->
                    <div class="d-flex flex-stack">
                        <!--begin::Wrapper-->
                        <div class="me-2">
                            <button type="button" class="btn btn-light btn-active-light-primary"
                                data-kt-stepper-action="previous">
                                Back
                            </button>
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Wrapper-->
                        <div>
                            <button type="button" class="btn btn-primary" data-kt-stepper-action="submit">
                                <span class="indicator-label">
                                    Submit
                                </span>
                                <span class="indicator-progress">
                                    Please wait... <span
                                        class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                </span>
                            </button>
                            <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                                Continue
                            </button>
                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Stepper-->
        </div>
    </div>
    <x-slot name="script">
        <script src="{{ asset('/assets/js/employee-registration.js') }}"></script>

    </x-slot>
</x-admin.layout.app-layout>
