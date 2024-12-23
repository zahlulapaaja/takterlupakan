<x-default-layout>

    <!--begin::Row-->
    <div class="row gy-5 g-xl-10">
        <!--begin::Col-->
        <div class="col-xl-12 col-xxl-8 mb-5 mb-xl-10">
            <!--begin::Table Widget 3-->
            <div class="card card-flush h-xl-100">
                <!--begin::Card header-->
                <div class="card-header py-7">
                    <!--begin::Tabs-->
                    <div class="card-title pt-3 mb-0 gap-4 gap-lg-10 gap-xl-15 nav nav-tabs border-bottom-0" data-kt-table-widget-3="tabs_nav">
                        <!--begin::Tab item-->
                        <div class="fs-4 fw-bold pb-3 border-bottom border-3 border-primary cursor-pointer" data-kt-table-widget-3="tab" data-kt-table-widget-3-value="Show All">All Campaigns (47)</div>
                        <!--end::Tab item-->
                        <!--begin::Tab item-->
                        <div class="fs-4 fw-bold text-muted pb-3 cursor-pointer" data-kt-table-widget-3="tab" data-kt-table-widget-3-value="Pending">Pending (8)</div>
                        <!--end::Tab item-->
                        <!--begin::Tab item-->
                        <div class="fs-4 fw-bold text-muted pb-3 cursor-pointer" data-kt-table-widget-3="tab" data-kt-table-widget-3-value="Completed">Completed (39)</div>
                        <!--end::Tab item-->
                    </div>
                    <!--end::Tabs-->
                    <!--begin::Create campaign button-->
                    <div class="card-toolbar">
                        <a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Create Campaign</a>
                    </div>
                    <!--end::Create campaign button-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-1">
                    <!--begin::Sort & Filter-->
                    <div class="d-flex flex-stack flex-wrap gap-4">
                        <!--begin::Sort-->
                        <div class="d-flex align-items-center flex-wrap gap-3 gap-xl-9">
                            <!--begin::Type-->
                            <div class="d-flex align-items-center fw-bold">
                                <!--begin::Label-->
                                <div class="text-muted fs-7">Type</div>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <select class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto" data-hide-search="true" data-control="select2" data-dropdown-css-class="w-150px" data-placeholder="Select an option">
                                    <option></option>
                                    <option value="Show All" selected="selected">Show All</option>
                                    <option value="Newest">Newest</option>
                                    <option value="oldest">Oldest</option>
                                </select>
                                <!--end::Select-->
                            </div>
                            <!--end::Type-->
                            <!--begin::Status-->
                            <div class="d-flex align-items-center fw-bold">
                                <!--begin::Label-->
                                <div class="text-muted fs-7 me-2">Status</div>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <select class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto" data-hide-search="true" data-control="select2" data-dropdown-css-class="w-150px" data-placeholder="Select an option" data-kt-table-widget-3="filter_status">
                                    <option></option>
                                    <option value="Show All" selected="selected">Show All</option>
                                    <option value="Live Now">Live Now</option>
                                    <option value="Reviewing">Reviewing</option>
                                    <option value="Paused">Paused</option>
                                </select>
                                <!--end::Select-->
                            </div>
                            <!--begin::Status-->
                            <!--begin::Budget-->
                            <div class="d-flex align-items-center fw-bold">
                                <!--begin::Label-->
                                <div class="text-muted me-2">Budget</div>
                                <!--end::Label-->
                                <!--begin::Select-->
                                <select class="form-select form-select-transparent text-gray-900 fs-7 lh-1 fw-bold py-0 ps-3 w-auto" data-hide-search="true" data-dropdown-css-class="w-150px" data-control="select2" data-placeholder="Select an option" data-kt-table-widget-3="filter_status">
                                    <option></option>
                                    <option value="Show All" selected="selected">Show All</option>
                                    <option value="&lt;5000">Less than $5,000</option>
                                    <option value="5000-10000">$5,001 - $10,000</option>
                                    <option value="&gt;10000">More than $10,001</option>
                                </select>
                                <!--end::Select-->
                            </div>
                            <!--begin::Budget-->
                        </div>
                        <!--end::Sort-->
                        <!--begin::Filter-->
                        <div class="d-flex align-items-center gap-4">
                            <!--begin::Filter button-->
                            <a href="#" class="text-hover-primary ps-4" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                <i class="ki-duotone ki-filter fs-2 text-gray-500">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </a>
                            <!--begin::Menu 1-->
                            <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_654c7438c1e95">
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
                                            <select class="form-select form-select-solid" multiple="multiple" data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_654c7438c1e95" data-allow-clear="true">
                                                <option></option>
                                                <option value="1">Approved</option>
                                                <option value="2">Pending</option>
                                                <option value="2">In Process</option>
                                                <option value="2">Rejected</option>
                                            </select>
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
                                                <input class="form-check-input" type="checkbox" value="1" />
                                                <span class="form-check-label">Author</span>
                                            </label>
                                            <!--end::Options-->
                                            <!--begin::Options-->
                                            <label class="form-check form-check-sm form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="2" checked="checked" />
                                                <span class="form-check-label">Customer</span>
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
                                            <input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
                                            <label class="form-check-label">Enabled</label>
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
                            <!--end::Filter button-->
                        </div>
                        <!--end::Filter-->
                    </div>
                    <!--end::Sort & Filter-->
                    <!--begin::Seprator-->
                    <div class="separator separator-dashed my-5"></div>
                    <!--end::Seprator-->
                    <!--begin::Table-->
                    <table id="kt_widget_table_3" class="table table-row-dashed align-middle fs-6 gy-4 my-0 pb-3" data-kt-table-widget-3="all">
                        <thead class="d-none">
                            <tr>
                                <th>Campaign</th>
                                <th>Platforms</th>
                                <th>Status</th>
                                <th>Team</th>
                                <th>Date</th>
                                <th>Progress</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="min-w-175px">
                                    <div class="position-relative ps-6 pe-3 py-2">
                                        <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-info"></div>
                                        <a href="#" class="mb-1 text-gray-900 text-hover-primary fw-bold">Happy Christmas</a>
                                        <div class="fs-7 text-muted fw-bold">Created on 24 Dec 21</div>
                                    </div>
                                </td>
                                <td>
                                    <!--begin::Icons-->
                                    <div class="d-flex gap-2 mb-2">
                                        <a href="#">
                                            <img src="assets/media/svg/brand-logos/facebook-4.svg" class="w-20px" alt="" />
                                        </a>
                                        <a href="#">
                                            <img src="assets/media/svg/brand-logos/twitter-2.svg" class="w-20px" alt="" />
                                        </a>
                                        <a href="#">
                                            <img src="assets/media/svg/brand-logos/linkedin-2.svg" class="w-20px" alt="" />
                                        </a>
                                        <a href="#">
                                            <img src="assets/media/svg/brand-logos/youtube-3.svg" class="w-20px" alt="" />
                                        </a>
                                    </div>
                                    <!--end::Icons-->
                                    <div class="fs-7 text-muted fw-bold">Labor 24 - 35 years</div>
                                </td>
                                <td>
                                    <span class="badge badge-light-success">Live Now</span>
                                </td>
                                <td class="min-w-125px">
                                    <!--begin::Team members-->
                                    <div class="symbol-group symbol-hover mb-1">
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-6.jpg" alt="" />
                                        </div>
                                        <!--end::Member-->
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-5.jpg" alt="" />
                                        </div>
                                        <!--end::Member-->
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-25.jpg" alt="" />
                                        </div>
                                        <!--end::Member-->
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-9.jpg" alt="" />
                                        </div>
                                        <!--end::Member-->
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <div class="symbol-label bg-danger">
                                                <span class="fs-7 text-inverse-danger">E</span>
                                            </div>
                                        </div>
                                        <!--end::Member-->
                                        <!--begin::More members-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <div class="symbol-label bg-dark">
                                                <span class="fs-8 text-inverse-dark">+0</span>
                                            </div>
                                        </div>
                                        <!--end::More members-->
                                    </div>
                                    <!--end::Team members-->
                                    <div class="fs-7 fw-bold text-muted">Team Members</div>
                                </td>
                                <td class="min-w-150px">
                                    <div class="mb-2 fw-bold">24 Dec 21 - 06 Jan 22</div>
                                    <div class="fs-7 fw-bold text-muted">Date range</div>
                                </td>
                                <td class="d-none">Pending</td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-icon btn-sm btn-light btn-active-primary w-25px h-25px">
                                        <i class="ki-duotone ki-black-right fs-2 text-muted"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="min-w-175px">
                                    <div class="position-relative ps-6 pe-3 py-2">
                                        <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-warning"></div>
                                        <a href="#" class="mb-1 text-gray-900 text-hover-primary fw-bold">Halloween</a>
                                        <div class="fs-7 text-muted fw-bold">Created on 24 Dec 21</div>
                                    </div>
                                </td>
                                <td>
                                    <!--begin::Icons-->
                                    <div class="d-flex gap-2 mb-2">
                                        <a href="#">
                                            <img src="assets/media/svg/brand-logos/twitter-2.svg" class="w-20px" alt="" />
                                        </a>
                                        <a href="#">
                                            <img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="w-20px" alt="" />
                                        </a>
                                        <a href="#">
                                            <img src="assets/media/svg/brand-logos/youtube-3.svg" class="w-20px" alt="" />
                                        </a>
                                    </div>
                                    <!--end::Icons-->
                                    <div class="fs-7 text-muted fw-bold">Labor 37 - 52 years</div>
                                </td>
                                <td>
                                    <span class="badge badge-light-primary">Reviewing</span>
                                </td>
                                <td class="min-w-125px">
                                    <!--begin::Team members-->
                                    <div class="symbol-group symbol-hover mb-1">
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-1.jpg" alt="" />
                                        </div>
                                        <!--end::Member-->
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-25.jpg" alt="" />
                                        </div>
                                        <!--end::Member-->
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-6.jpg" alt="" />
                                        </div>
                                        <!--end::Member-->
                                    </div>
                                    <!--end::Team members-->
                                    <div class="fs-7 fw-bold text-muted">Team Members</div>
                                </td>
                                <td class="min-w-150px">
                                    <div class="mb-2 fw-bold">03 Feb 22 - 14 Feb 22</div>
                                    <div class="fs-7 fw-bold text-muted">Date range</div>
                                </td>
                                <td class="d-none">Completed</td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-icon btn-sm btn-light btn-active-primary w-25px h-25px">
                                        <i class="ki-duotone ki-black-right fs-2 text-muted"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="min-w-175px">
                                    <div class="position-relative ps-6 pe-3 py-2">
                                        <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-success"></div>
                                        <a href="#" class="mb-1 text-gray-900 text-hover-primary fw-bold">Cyber Monday</a>
                                        <div class="fs-7 text-muted fw-bold">Created on 24 Dec 21</div>
                                    </div>
                                </td>
                                <td>
                                    <!--begin::Icons-->
                                    <div class="d-flex gap-2 mb-2">
                                        <a href="#">
                                            <img src="assets/media/svg/brand-logos/facebook-4.svg" class="w-20px" alt="" />
                                        </a>
                                        <a href="#">
                                            <img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="w-20px" alt="" />
                                        </a>
                                    </div>
                                    <!--end::Icons-->
                                    <div class="fs-7 text-muted fw-bold">Labor 24 - 38 years</div>
                                </td>
                                <td>
                                    <span class="badge badge-light-success">Live Now</span>
                                </td>
                                <td class="min-w-125px">
                                    <!--begin::Team members-->
                                    <div class="symbol-group symbol-hover mb-1">
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <div class="symbol-label bg-danger">
                                                <span class="fs-7 text-inverse-danger">M</span>
                                            </div>
                                        </div>
                                        <!--end::Member-->
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-6.jpg" alt="" />
                                        </div>
                                        <!--end::Member-->
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <div class="symbol-label bg-primary">
                                                <span class="fs-7 text-inverse-primary">N</span>
                                            </div>
                                        </div>
                                        <!--end::Member-->
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-13.jpg" alt="" />
                                        </div>
                                        <!--end::Member-->
                                    </div>
                                    <!--end::Team members-->
                                    <div class="fs-7 fw-bold text-muted">Team Members</div>
                                </td>
                                <td class="min-w-150px">
                                    <div class="mb-2 fw-bold">19 Mar 22 - 04 Apr 22</div>
                                    <div class="fs-7 fw-bold text-muted">Date range</div>
                                </td>
                                <td class="d-none">Pending</td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-icon btn-sm btn-light btn-active-primary w-25px h-25px">
                                        <i class="ki-duotone ki-black-right fs-2 text-muted"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="min-w-175px">
                                    <div class="position-relative ps-6 pe-3 py-2">
                                        <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-danger"></div>
                                        <a href="#" class="mb-1 text-gray-900 text-hover-primary fw-bold">Thanksgiving</a>
                                        <div class="fs-7 text-muted fw-bold">Created on 24 Dec 21</div>
                                    </div>
                                </td>
                                <td>
                                    <!--begin::Icons-->
                                    <div class="d-flex gap-2 mb-2">
                                        <a href="#">
                                            <img src="assets/media/svg/brand-logos/twitter-2.svg" class="w-20px" alt="" />
                                        </a>
                                        <a href="#">
                                            <img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="w-20px" alt="" />
                                        </a>
                                        <a href="#">
                                            <img src="assets/media/svg/brand-logos/linkedin-2.svg" class="w-20px" alt="" />
                                        </a>
                                    </div>
                                    <!--end::Icons-->
                                    <div class="fs-7 text-muted fw-bold">Labor 24 - 38 years</div>
                                </td>
                                <td>
                                    <span class="badge badge-light-warning">Paused</span>
                                </td>
                                <td class="min-w-125px">
                                    <!--begin::Team members-->
                                    <div class="symbol-group symbol-hover mb-1">
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-6.jpg" alt="" />
                                        </div>
                                        <!--end::Member-->
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-25.jpg" alt="" />
                                        </div>
                                        <!--end::Member-->
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-1.jpg" alt="" />
                                        </div>
                                        <!--end::Member-->
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <div class="symbol-label bg-primary">
                                                <span class="fs-7 text-inverse-primary">N</span>
                                            </div>
                                        </div>
                                        <!--end::Member-->
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-5.jpg" alt="" />
                                        </div>
                                        <!--end::Member-->
                                        <!--begin::More members-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <div class="symbol-label bg-dark">
                                                <span class="fs-8 text-inverse-dark">+0</span>
                                            </div>
                                        </div>
                                        <!--end::More members-->
                                    </div>
                                    <!--end::Team members-->
                                    <div class="fs-7 fw-bold text-muted">Team Members</div>
                                </td>
                                <td class="min-w-150px">
                                    <div class="mb-2 fw-bold">20 Jun 22 - 30 Jun 22</div>
                                    <div class="fs-7 fw-bold text-muted">Date range</div>
                                </td>
                                <td class="d-none">Pending</td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-icon btn-sm btn-light btn-active-primary w-25px h-25px">
                                        <i class="ki-duotone ki-black-right fs-2 text-muted"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="min-w-175px">
                                    <div class="position-relative ps-6 pe-3 py-2">
                                        <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-primary"></div>
                                        <a href="#" class="mb-1 text-gray-900 text-hover-primary fw-bold">Happy Mother's Day</a>
                                        <div class="fs-7 text-muted fw-bold">Created on 24 Dec 21</div>
                                    </div>
                                </td>
                                <td>
                                    <!--begin::Icons-->
                                    <div class="d-flex gap-2 mb-2">
                                        <a href="#">
                                            <img src="assets/media/svg/brand-logos/youtube-3.svg" class="w-20px" alt="" />
                                        </a>
                                    </div>
                                    <!--end::Icons-->
                                    <div class="fs-7 text-muted fw-bold">Labor 30 - 40 years</div>
                                </td>
                                <td>
                                    <span class="badge badge-light-warning">Paused</span>
                                </td>
                                <td class="min-w-125px">
                                    <!--begin::Team members-->
                                    <div class="symbol-group symbol-hover mb-1">
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-23.jpg" alt="" />
                                        </div>
                                        <!--end::Member-->
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-13.jpg" alt="" />
                                        </div>
                                        <!--end::Member-->
                                    </div>
                                    <!--end::Team members-->
                                    <div class="fs-7 fw-bold text-muted">Team Members</div>
                                </td>
                                <td class="min-w-150px">
                                    <div class="mb-2 fw-bold">01 Aug 22 - 01 Sep 22</div>
                                    <div class="fs-7 fw-bold text-muted">Date range</div>
                                </td>
                                <td class="d-none">Completed</td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-icon btn-sm btn-light btn-active-primary w-25px h-25px">
                                        <i class="ki-duotone ki-black-right fs-2 text-muted"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="min-w-175px">
                                    <div class="position-relative ps-6 pe-3 py-2">
                                        <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-success"></div>
                                        <a href="#" class="mb-1 text-gray-900 text-hover-primary fw-bold">Team Getaway</a>
                                        <div class="fs-7 text-muted fw-bold">Created on 24 Dec 21</div>
                                    </div>
                                </td>
                                <td>
                                    <!--begin::Icons-->
                                    <div class="d-flex gap-2 mb-2">
                                        <a href="#">
                                            <img src="assets/media/svg/brand-logos/twitter-2.svg" class="w-20px" alt="" />
                                        </a>
                                        <a href="#">
                                            <img src="assets/media/svg/brand-logos/instagram-2-1.svg" class="w-20px" alt="" />
                                        </a>
                                        <a href="#">
                                            <img src="assets/media/svg/brand-logos/youtube-3.svg" class="w-20px" alt="" />
                                        </a>
                                    </div>
                                    <!--end::Icons-->
                                    <div class="fs-7 text-muted fw-bold">Labor 24 - 38 years</div>
                                </td>
                                <td>
                                    <span class="badge badge-light-success">Live Now</span>
                                </td>
                                <td class="min-w-125px">
                                    <!--begin::Team members-->
                                    <div class="symbol-group symbol-hover mb-1">
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-6.jpg" alt="" />
                                        </div>
                                        <!--end::Member-->
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <img src="assets/media/avatars/300-13.jpg" alt="" />
                                        </div>
                                        <!--end::Member-->
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <div class="symbol-label bg-primary">
                                                <span class="fs-7 text-inverse-primary">N</span>
                                            </div>
                                        </div>
                                        <!--end::Member-->
                                        <!--begin::Member-->
                                        <div class="symbol symbol-circle symbol-25px">
                                            <div class="symbol-label bg-info">
                                                <span class="fs-7 text-inverse-info">A</span>
                                            </div>
                                        </div>
                                        <!--end::Member-->
                                    </div>
                                    <!--end::Team members-->
                                    <div class="fs-7 fw-bold text-muted">Team Members</div>
                                </td>
                                <td class="min-w-150px">
                                    <div class="mb-2 fw-bold">24 Jul 22 - 26 Jul 22</div>
                                    <div class="fs-7 fw-bold text-muted">Date range</div>
                                </td>
                                <td class="d-none">Completed</td>
                                <td class="text-end">
                                    <button type="button" class="btn btn-icon btn-sm btn-light btn-active-primary w-25px h-25px">
                                        <i class="ki-duotone ki-black-right fs-2 text-muted"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <!--end::Table-->
                    </table>
                    <!--end::Table-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Table Widget 3-->
        </div>
        <!--end::Col-->
    </div>
    <!--end::Row-->

</x-default-layout>