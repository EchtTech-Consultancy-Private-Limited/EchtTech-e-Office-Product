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
                        <h3 class="stepper-title">Basic Details</h3>
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
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="mb-10">
                                    <label for="exampleFormControlInput1" class="required form-label">Company
                                        Name</label>
                                    <input type="text" class="form-control form-control-solid"
                                           placeholder="Enter company name"/>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <x-common.country/>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <x-common.state/>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <x-common.city/>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="fv-row mt-10">
                                    <label for="full_address" class="required fw-semibold fs-6 mb-2">Full
                                        Address</label>
                                    <textarea name="full_address" id="full_address"
                                              class="form-control form-control-solid"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="fv-row mt-10">
                                    <label for="description" class="required fw-semibold fs-6 mb-2">Description</label>
                                    <textarea name="description" id="description"
                                              class="form-control form-control-solid"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Step 2 --}}
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

                    {{-- Step 3 --}}
                    <div data-kt-stepper-element="content">
                        <div>
                            <x-admin.common.module-component/>
                        </div>
                    </div>

                    {{-- Step 4 --}}
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
