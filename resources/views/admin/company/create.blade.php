<x-admin.layout.app-layout>
    <x-slot name="title">
        Add New Company
    </x-slot>
    <x-common.card>
        <x-slot name="title">
            Add New Company
        </x-slot>
        <x-slot name="body">
            <div class="stepper stepper-links d-flex flex-column" id="kt_create_account_stepper">
                <div class="stepper-nav">
                    <div class="stepper-item current" data-kt-stepper-element="nav">
                        <h3 class="stepper-title">Basic Configuration</h3>
                    </div>
                    <div class="stepper-item" data-kt-stepper-element="nav">
                        <h3 class="stepper-title">Basic Details</h3>
                    </div>
                    <div class="stepper-item" data-kt-stepper-element="nav">
                        <h3 class="stepper-title">Business Details</h3>
                    </div>
                    <div class="stepper-item" data-kt-stepper-element="nav">
                        <h3 class="stepper-title">Contact Details</h3>
                    </div>

                    <div class="stepper-item" data-kt-stepper-element="nav">
                        <h3 class="stepper-title">Modules</h3>
                    </div>

                    <div class="stepper-item" data-kt-stepper-element="nav">
                        <h3 class="stepper-title">License</h3>
                    </div>

                    <div class="stepper-item" data-kt-stepper-element="nav">
                        <h3 class="stepper-title">Finalize</h3>
                    </div>
                </div>
                <hr/>
                <form class="mt-7" novalidate="novalidate" id="kt_create_account_form">
                    {{-- Step 1 --}}
                    <div class="current" data-kt-stepper-element="content">
                        <div class="row w-100">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="app_name" class="required form-label">App Name</label>
                                    <input type="text" name="app_name" id="app_name" class="form-control form-control-solid"
                                           placeholder=""/>
                                    <span id="app_name_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="db_name" class="required form-label">Database Name</label>
                                    <input type="text" name="db_name" id="db_name" class="form-control form-control-solid"
                                           placeholder=""/>
                                    <span id="db_name_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="logo" class="required form-label">Logo</label>
                                    <input type="file" name="logo" id="logo" class="form-control form-control-solid"/>
                                    <span class="text-danger" id="logo_error"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Step 2 --}}
                    <div data-kt-stepper-element="content">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="company_name" class="required form-label">Company
                                        Name</label>
                                    <input type="text" name="company_name" id="company_name" class="form-control form-control-solid"
                                           placeholder="Enter company name"/>
                                    <span id="company_name_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="gov_tax_number_ein" class="required form-label">Government Tax Number/EIN</label>
                                    <input type="text" name="gov_tax_number_ein" id="gov_tax_number_ein" class="form-control form-control-solid"
                                           placeholder="Enter Government Tax Number/EIN"/>
                                    <span id="gov_tax_number_ein_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="legal_trading_name" class="required form-label">Legal/Trading Name</label>
                                    <input type="text" name="legal_trading_name" id="legal_trading_name" class="form-control form-control-solid"
                                           placeholder="Enter Legal/Trading Name"/>
                                    <span id="legal_trading_name_error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="registration_number" class="required form-label">Registration Number</label>
                                    <input type="text" name="registration_number" id="registration_number" class="form-control form-control-solid"
                                           placeholder="Enter Registration Number"/>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <x-common.country/>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <x-common.state/>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <x-common.city/>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3">
                                <label for="pin_code" class="required form-label">Zip Code/Postal Code</label>
                                <input type="text" name="pin_code" id="pin_code" class="form-control form-control-solid">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="fv-row mt-10">
                                    <label for="address_line_1" class="required form-label">Address Line 1</label>
                                    <textarea name="address_line_1" id="address_line_1"
                                              class="form-control form-control-solid" placeholder="Enter address line 1"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="fv-row mt-10">
                                    <label for="address_line_2" class="required form-label">Address Line 2</label>
                                    <textarea name="address_line_2" id="address_line_2"
                                              class="form-control form-control-solid" placeholder="Enter address line 2"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="fv-row mt-10">
                                    <label for="description" class="required form-label">Description</label>
                                    <textarea name="description" id="description"
                                              class="form-control form-control-solid" placeholder="Enter company description..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Step 3 --}}
                    <div data-kt-stepper-element="content">
                        <div class="row w-100">
                            <!-- PANCARD -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="pancard" class="required form-label">PANCARD</label>
                                    <input type="text" name="pancard" id="pancard" class="form-control form-control-solid" placeholder="Enter PANCARD"/>
                                </div>
                            </div>

                            <!-- GST Number -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="gst_number" class="required form-label">GST Number</label>
                                    <input type="text" name="gst_number" id="gst_number" class="form-control form-control-solid" placeholder="Enter GST Number"/>
                                </div>
                            </div>

                            <!-- LIN Number -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="lin_number" class="required form-label">LIN Number</label>
                                    <input type="text" name="lin_number" id="lin_number" class="form-control form-control-solid" placeholder="Enter LIN Number"/>
                                </div>
                            </div>

                            <!-- CIN Number -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="cin_number" class="required form-label">CIN Number</label>
                                    <input type="text" name="cin_number" id="cin_number" class="form-control form-control-solid" placeholder="Enter CIN Number"/>
                                </div>
                            </div>

                            <!-- TAN Number -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="tan_number" class="required form-label">TAN Number</label>
                                    <input type="text" name="tan_number" id="tan_number" class="form-control form-control-solid" placeholder="Enter TAN Number"/>
                                </div>
                            </div>

                            <!-- ESIC Number -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="esic_number" class="required form-label">ESIC Number</label>
                                    <input type="text" name="esic_number" id="esic_number" class="form-control form-control-solid" placeholder="Enter ESIC Number"/>
                                </div>
                            </div>

                            <!-- EPF Number -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="epf_number" class="required form-label">EPF Number</label>
                                    <input type="text" name="epf_number" id="epf_number" class="form-control form-control-solid" placeholder="Enter EPF Number"/>
                                </div>
                            </div>

                            <!-- MSE/AADHAR UDHYAM -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="aadhar_udhyam" class="required form-label">MSE/AADHAR UDHYAM</label>
                                    <input type="text" name="aadhar_udhyam" id="aadhar_udhyam" class="form-control form-control-solid" placeholder="Enter MSE/AADHAR UDHYAM"/>
                                </div>
                            </div>

                            <!-- DIPT Certificate Number -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="dipt_certificate_number" class="required form-label">DIPT Certificate Number</label>
                                    <input type="text" name="dipt_certificate_number" id="dipt_certificate_number" class="form-control form-control-solid" placeholder="Enter DIPT Certificate Number"/>
                                </div>
                            </div>

                            <!-- CMMI Level -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="cmmi_level" class="required form-label">CMMI Level</label>
                                    <input type="text" name="cmmi_level" id="cmmi_level" class="form-control form-control-solid" placeholder="Enter CMMI Level"/>
                                </div>
                            </div>

                            <!-- ISO Certification (Yes/No) -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="iso_certification" class="form-label">ISO Certification</label>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="iso_certification" id="iso_yes" class="form-check-input" value="yes" onchange="toggleFileInput()"/>
                                        <label for="iso_yes" class="form-check-label">Yes</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="iso_certification" id="iso_no" class="form-check-input" value="no" onchange="toggleFileInput()"/>
                                        <label for="iso_no" class="form-check-label">No</label>
                                    </div>
                                    <!-- File Upload Input for ISO Certification -->
                                    <input type="file" name="iso_certification_file" id="iso_certification_file" class="form-control form-control-solid" style="display: none;"/>
                                </div>
                            </div>

                            <!-- Ministry Name -->
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="ministry_name" class="required form-label">Ministry Name</label>
                                    <input type="text" name="ministry_name" id="ministry_name" class="form-control form-control-solid" placeholder="Enter Ministry Name"/>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row w-100">
                                    <!-- Registered Address -->
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="mb-10">
                                            <label for="registered_address" class="required form-label">Registered Address</label>
                                            <textarea name="registered_address" id="registered_address" class="form-control form-control-solid" placeholder="Enter Registered Address"></textarea>
                                        </div>
                                    </div>

                                    <!-- Correspondence/Corporate Office Address -->
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="mb-10">
                                            <label for="corporate_office_address" class="required form-label">Correspondence/Corporate Office Address</label>
                                            <textarea name="corporate_office_address" id="corporate_office_address" class="form-control form-control-solid" placeholder="Enter Correspondence/Corporate Office Address"></textarea>
                                        </div>
                                    </div>

                                    <!-- Billing Address -->
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="mb-10">
                                            <label for="billing_address" class="required form-label">Billing Address</label>
                                            <textarea name="billing_address" id="billing_address" class="form-control form-control-solid" placeholder="Enter Billing Address"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Step 4 --}}
                    <div data-kt-stepper-element="content">
                        <div class="row w-100">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="phone" class="required form-label">Phone</label>
                                    <input type="text" name="phone" id="phone" class="form-control form-control-solid"
                                           placeholder="Enter phone number"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="fax" class="form-label">Fax</label>
                                    <input type="text" name="fax" id="fax" class="form-control form-control-solid"
                                           placeholder="Enter fax number"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="website" class="form-label">Website</label>
                                    <input type="url" name="website" id="website"
                                           class="form-control form-control-solid"
                                           placeholder="Enter website URL"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="linkedin" class="form-label">LinkedIn</label>
                                    <input type="url" name="linkedin" id="linkedin"
                                           class="form-control form-control-solid"
                                           placeholder="Enter LinkedIn profile URL"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="facebook" class="form-label">Facebook</label>
                                    <input type="text" name="facebook" id="facebook"
                                           class="form-control form-control-solid"
                                           placeholder="Enter Facebook URL"/>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="mb-10">
                                    <label for="twitter" class="form-label">Twitter</label>
                                    <input type="text" name="twitter" id="twitter"
                                           class="form-control form-control-solid"
                                           placeholder="Enter Twitter handle URL"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Step 5 --}}
                    <div data-kt-stepper-element="content">
                        <div>
                            <x-admin.common.module-component/>
                        </div>
                    </div>

                    {{-- Step 6 --}}
                    <div data-kt-stepper-element="content">
                        <div class="d-flex w-100 justify-content-center">
                            <x-admin.license.generate-licence/>
                        </div>
                    </div>
                </form>

                <div class="d-flex flex-stack pt-15">
                    <!--begin::Wrapper-->
                    <div class="mr-2">
                        <button type="button" class="btn btn-lg btn-light-primary me-3"
                                data-kt-stepper-action="previous">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                            <span class="svg-icon svg-icon-4 me-1">
															<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="6" y="11" width="13" height="2"
                                                                      rx="1" fill="currentColor"/>
																<path
                                                                    d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
                                                                    fill="currentColor"/>
															</svg>
														</span>
                            <!--end::Svg Icon-->Back
                        </button>
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Wrapper-->
                    <div>
                        <button type="button" class="btn btn-lg btn-primary me-3" data-kt-stepper-action="submit">
															<span class="indicator-label">Submit
                                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
															<span class="svg-icon svg-icon-3 ms-2 me-0">
																<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                     height="24" viewBox="0 0 24 24" fill="none">
																	<rect opacity="0.5" x="18" y="13" width="13"
                                                                          height="2" rx="1"
                                                                          transform="rotate(-180 18 13)"
                                                                          fill="currentColor"/>
																	<path
                                                                        d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                                        fill="currentColor"/>
																</svg>
															</span>
                                                                <!--end::Svg Icon--></span>
                            <span class="indicator-progress">Please wait...
															<span
                                                                class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                        <button type="button" class="btn btn-lg btn-primary" data-kt-stepper-action="next">Continue
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr064.svg-->
                            <span class="svg-icon svg-icon-4 ms-1 me-0">
															<svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24" viewBox="0 0 24 24" fill="none">
																<rect opacity="0.5" x="18" y="13" width="13" height="2"
                                                                      rx="1" transform="rotate(-180 18 13)"
                                                                      fill="currentColor"/>
																<path
                                                                    d="M15.4343 12.5657L11.25 16.75C10.8358 17.1642 10.8358 17.8358 11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25L18.2929 12.7071C18.6834 12.3166 18.6834 11.6834 18.2929 11.2929L12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75C10.8358 6.16421 10.8358 6.83579 11.25 7.25L15.4343 11.4343C15.7467 11.7467 15.7467 12.2533 15.4343 12.5657Z"
                                                                    fill="currentColor"/>
															</svg>
														</span>
                            <!--end::Svg Icon-->
                        </button>
                    </div>
                    <!--end::Wrapper-->
                </div>
            </div>
        </x-slot>
    </x-common.card>
    <x-slot name="script">
        <script src="{{ asset('assets/js/company.js') }}"></script>
        <script src="{{ asset('assets/js/license.js') }}"></script>
    </x-slot>
</x-admin.layout.app-layout>
