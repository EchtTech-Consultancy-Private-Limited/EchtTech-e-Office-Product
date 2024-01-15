<x-admin.layout.app-layout>
   <x-slot name="title">Profile Overview</x-slot>
   <div class="card-body">
      <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack ">
         <!--begin::Page title-->
         <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 pb-10 ">
            <!--begin::Title-->
            <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
               Profile Overview
            </h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
               <!--begin::Item-->
               <li class="breadcrumb-item text-muted">
                  <a href="/metronic8/demo1/../demo1/index.html" class="text-muted text-hover-primary">
                  Home                            </a>
               </li>
               <!--end::Item-->
               <!--begin::Item-->
               <li class="breadcrumb-item">
                  <span class="bullet bg-gray-500 w-5px h-2px"></span>
               </li>
               <!--end::Item-->
               <!--begin::Item-->
               <li class="breadcrumb-item text-muted">
                  Profile
               </li>
               <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
         </div>
         <!--end::Page title-->
         <!--begin::Actions-->
         <div class="d-flex align-items-center gap-2 gap-lg-3">
            <!--begin::Filter menu-->
            <div class="m-0">

               <!--begin::Menu 1-->
               <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_659ce70c057e8">
                  <!--begin::Header-->
                  <div class="px-7 py-5">
                     <div class="fs-5 text-gray-900 fw-bold">Filter Options</div>
                  </div>
                  <!--end::Header-->
                  <!--begin::Menu separator-->
                  <div class="separator border-gray-200"></div>
                  <!--end::Menu separator-->
                  <!--begin::Form-->
                  <div class="px-7 py-5">
                     <!--begin::Input group-->
                     <div class="mb-10">
                        <!--begin::Label-->
                        <label class="form-label fw-semibold">Status:</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <div>
                           <select class="form-select form-select-solid select2-hidden-accessible" multiple="" data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_659ce70c057e8" data-allow-clear="true" data-select2-id="select2-data-7-fvzu" tabindex="-1" aria-hidden="true" data-kt-initialized="1">
                              <option></option>
                              <option value="1">Approved</option>
                              <option value="2">Pending</option>
                              <option value="2">In Process</option>
                              <option value="2">Rejected</option>
                           </select>
                           <span class="select2 select2-container select2-container--bootstrap5" dir="ltr" data-select2-id="select2-data-8-dqyh" style="width: 100%;">
                              <span class="selection">
                                 <span class="select2-selection select2-selection--multiple form-select form-select-solid" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false">
                                    <ul class="select2-selection__rendered" id="select2-8jbv-container"></ul>
                                    <span class="select2-search select2-search--inline"><textarea class="select2-search__field" type="search" tabindex="0" autocorrect="off" autocapitalize="none" spellcheck="false" role="searchbox" aria-autocomplete="list" autocomplete="off" aria-label="Search" aria-describedby="select2-8jbv-container" placeholder="Select option" style="width: 100%;"></textarea></span>
                                 </span>
                              </span>
                              <span class="dropdown-wrapper" aria-hidden="true"></span>
                           </span>
                        </div>
                        <!--end::Input-->
                     </div>
                     <!--end::Input group-->
                     <!--begin::Input group-->
                     <div class="mb-10">
                        <!--begin::Label-->
                        <label class="form-label fw-semibold">Member Type:</label>
                        <!--end::Label-->
                        <!--begin::Options-->
                        <div class="d-flex">
                           <!--begin::Options-->
                           <label class="form-check form-check-sm form-check-custom form-check-solid me-5">
                           <input class="form-check-input" type="checkbox" value="1">
                           <span class="form-check-label">
                           Author
                           </span>
                           </label>
                           <!--end::Options-->
                           <!--begin::Options-->
                           <label class="form-check form-check-sm form-check-custom form-check-solid">
                           <input class="form-check-input" type="checkbox" value="2" checked="checked">
                           <span class="form-check-label">
                           Customer
                           </span>
                           </label>
                           <!--end::Options-->
                        </div>
                        <!--end::Options-->
                     </div>
                     <!--end::Input group-->
                     <!--begin::Input group-->
                     <div class="mb-10">
                        <!--begin::Label-->
                        <label class="form-label fw-semibold">Notifications:</label>
                        <!--end::Label-->
                        <!--begin::Switch-->
                        <div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
                           <input class="form-check-input" type="checkbox" value="" name="notifications" checked="">
                           <label class="form-check-label">
                           Enabled
                           </label>
                        </div>
                        <!--end::Switch-->
                     </div>
                     <!--end::Input group-->
                     <!--begin::Actions-->
                     <div class="d-flex justify-content-end">
                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                        <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                     </div>
                     <!--end::Actions-->
                  </div>
                  <!--end::Form-->
               </div>
               <!--end::Menu 1-->
            </div>
            <!--end::Filter menu-->
            <!--begin::Secondary button-->
            <!--end::Secondary button-->
            <!--begin::Primary button-->

            <!--end::Primary button-->
         </div>
         <!--end::Actions-->
      </div>
      <div class="card mb-5 mb-xl-10">
         <div class="card-body pt-9 pb-0">
            <!--begin::Details-->
            <div class="d-flex flex-wrap flex-sm-nowrap">
               <!--begin: Pic-->
               <div class="me-7 mb-4">
                  <div class="symbol border symbol-100px symbol-lg-160px symbol-fixed position-relative">
                     <img src="/metronic8/demo1/assets/media/avatars/300-1.jpg" alt="image">
                     <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
                  </div>
               </div>
               <!--end::Pic-->
               <!--begin::Info-->
               <div class="flex-grow-1">
                  <!--begin::Title-->
                  <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                     <!--begin::User-->
                     <div class="d-flex flex-column">
                        <!--begin::Name-->
                        <div class="d-flex align-items-center mb-2">
                           <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">Max Smith</a>
                           <a href="#"><i class="ki-duotone ki-verify fs-1 text-primary"><span class="path1"></span><span class="path2"></span></i></a>
                        </div>
                        <!--end::Name-->
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                           <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                           <i class="bi bi-person-fill fs-4 me-1"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>                                Developer
                           </a>
                           <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                           <i class="bi bi-geo-alt-fill fs-4 me-1"><span class="path1"></span><span class="path2"></span></i>                                SF, Bay Area
                           </a>
                           <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                           <i class="bi bi-envelope-fill fs-4 me-1"><span class="path1"></span><span class="path2"></span></i>                                max@kt.com
                           </a>
                        </div>
                        <!--end::Info-->
                     </div>
                     <!--end::User-->
                     <!--begin::Actions-->
                     <div class="d-flex my-4">

                        <!--begin::Menu-->
                        <div class="me-0">
                           <button class="btn btn-sm btn-icon btn-bg-light btn-active-color-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                           <i class="bi bi-three-dots fs-2x"></i>                            </button>
                           <!--begin::Menu 3-->
                           <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">

                              <!--begin::Menu item-->
                              <div class="menu-item px-3">
                                 <a href="#" class="menu-link px-3">
                                 Edit
                                 </a>
                              </div>
                              <!--end::Menu item-->
                              <!--end::Menu item-->
                           </div>
                           <!--end::Menu 3-->
                        </div>
                        <!--end::Menu-->
                     </div>
                     <!--end::Actions-->
                  </div>
                  <!--end::Title-->
                  <!--begin::Stats-->
                  <div class="d-flex flex-wrap flex-stack">
                     <!--begin::Wrapper-->
                     <div class="d-flex flex-column flex-grow-1 pe-8">
                        <!--begin::Stats-->
                        <div class="d-flex flex-wrap">
                           <!--begin::Stat-->
                           <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                              <!--begin::Number-->
                              <div class="d-flex align-items-center">
                                 <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"><span class="path1"></span><span class="path2"></span></i>
                                 <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="4500" data-kt-countup-prefix="$" data-kt-initialized="1">$4,500</div>
                              </div>
                              <!--end::Number-->
                              <!--begin::Label-->
                              <div class="fw-semibold fs-6 text-gray-500">Earnings</div>
                              <!--end::Label-->
                           </div>
                           <!--end::Stat-->
                           <!--begin::Stat-->
                           <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                              <!--begin::Number-->
                              <div class="d-flex align-items-center">
                                 <i class="ki-duotone ki-arrow-down fs-3 text-danger me-2"><span class="path1"></span><span class="path2"></span></i>
                                 <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="80" data-kt-initialized="1">80</div>
                              </div>
                              <!--end::Number-->
                              <!--begin::Label-->
                              <div class="fw-semibold fs-6 text-gray-500">Projects</div>
                              <!--end::Label-->
                           </div>
                           <!--end::Stat-->
                           <!--begin::Stat-->
                           <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                              <!--begin::Number-->
                              <div class="d-flex align-items-center">
                                 <i class="ki-duotone ki-arrow-up fs-3 text-success me-2"><span class="path1"></span><span class="path2"></span></i>
                                 <div class="fs-2 fw-bold counted" data-kt-countup="true" data-kt-countup-value="60" data-kt-countup-prefix="%" data-kt-initialized="1">%60</div>
                              </div>
                              <!--end::Number-->
                              <!--begin::Label-->
                              <div class="fw-semibold fs-6 text-gray-500">Success Rate</div>
                              <!--end::Label-->
                           </div>
                           <!--end::Stat-->
                        </div>
                        <!--end::Stats-->
                     </div>
                     <!--end::Wrapper-->
                     <!--begin::Progress-->
                     <div class="d-flex align-items-center w-200px w-sm-300px flex-column mt-3">
                        <div class="d-flex justify-content-between w-100 mt-auto mb-2">
                           <span class="fw-semibold fs-6 text-gray-500">Profile Compleation</span>
                           <span class="fw-bold fs-6">50%</span>
                        </div>
                        <div class="h-5px mx-3 w-100 bg-light mb-3">
                           <div class="bg-success rounded h-5px" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                     </div>
                     <!--end::Progress-->
                  </div>
                  <!--end::Stats-->
               </div>
               <!--end::Info-->
            </div>
            <!--end::Details-->
            <!--begin::Navs-->
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
               <!--begin::Nav item-->
               <li class="nav-item mt-2">
                  <a class="nav-link text-active-primary ms-0 me-10 py-5 " href="/metronic8/demo1/../demo1/account/overview.html">
                  Overview                    </a>
               </li>
               <!--end::Nav item-->
               <!--begin::Nav item-->
               <li class="nav-item mt-2">
                  <a class="nav-link text-active-primary ms-0 me-10 py-5 " href="/metronic8/demo1/../demo1/account/settings.html">
                  Settings                    </a>
               </li>
               <!--end::Nav item-->
               <!--begin::Nav item-->
               <li class="nav-item mt-2">
                  <a class="nav-link text-active-primary ms-0 me-10 py-5 " href="/metronic8/demo1/../demo1/account/security.html">
                  Security                    </a>
               </li>
               <!--end::Nav item-->
               <!--begin::Nav item-->
               <li class="nav-item mt-2">
                  <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="/metronic8/demo1/../demo1/account/activity.html">
                  Activity                    </a>
               </li>
               <!--end::Nav item-->
               <!--begin::Nav item-->
               <li class="nav-item mt-2">
                  <a class="nav-link text-active-primary ms-0 me-10 py-5 " href="/metronic8/demo1/../demo1/account/billing.html">
                  Billing                    </a>
               </li>
               <!--end::Nav item-->
               <!--begin::Nav item-->
               <li class="nav-item mt-2">
                  <a class="nav-link text-active-primary ms-0 me-10 py-5 " href="/metronic8/demo1/../demo1/account/statements.html">
                  Statements                    </a>
               </li>
               <!--end::Nav item-->
               <!--begin::Nav item-->
               <li class="nav-item mt-2">
                  <a class="nav-link text-active-primary ms-0 me-10 py-5 " href="/metronic8/demo1/../demo1/account/referrals.html">
                  Referrals                    </a>
               </li>
               <!--end::Nav item-->
               <!--begin::Nav item-->
               <li class="nav-item mt-2">
                  <a class="nav-link text-active-primary ms-0 me-10 py-5 " href="/metronic8/demo1/../demo1/account/api-keys.html">
                  API Keys                    </a>
               </li>
               <!--end::Nav item-->
               <!--begin::Nav item-->
               <li class="nav-item mt-2">
                  <a class="nav-link text-active-primary ms-0 me-10 py-5 " href="/metronic8/demo1/../demo1/account/logs.html">
                  Logs                    </a>
               </li>
               <!--end::Nav item-->
            </ul>
            <!--begin::Navs-->
         </div>
      </div>
   </div>
</x-admin.layout.app-layout>
