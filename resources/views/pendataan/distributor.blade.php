@extends('layouts.template')
@section('title', 'Data Distributor')
    
@section('content')
<!--begin::Main-->
<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Toolbar-->
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <!--begin::Toolbar container-->
            <div id="kt_app_toolbar_container" class="app-container  d-flex flex-stack">
                <!--begin::Page title-->
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <!--begin::Title-->
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Data Distributor</h1>
                    <!--end::Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">
                            <a href="/" class="text-muted text-hover-primary">Pendataan</a>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>
                        <!--end::Item-->
                        <!--begin::Item-->
                        <li class="breadcrumb-item text-muted">Data Distributor</li>
                        <!--end::Item-->
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page title-->
            </div>
            <!--end::Toolbar container-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container">
                <!--begin::Card-->
                <div class="card">
                    <!--begin::Card header-->
                    <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <!--begin::Search-->
                            <div class="d-flex align-items-center position-relative my-1">
                                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <input type="text" data-kt-subscription-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Cari Data Distributor..." />
                            </div>
                            <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-subscription-table-toolbar="base">
                                <!--begin::Export-->
                                <!--end::Export-->
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">
                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                                        </svg>
                                    </span>
                                <!--end::Svg Icon-->Tambah Data</a>
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none" data-kt-subscription-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                <span class="me-2" data-kt-subscription-table-select="selected_count"></span>Selected</div>
                                <button type="button" class="btn btn-danger" data-kt-subscription-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <!--end::Group actions-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>
                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body pt-0">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-125px">No</th>
                                    <th class="min-w-125px">Kode Distributor</th>
                                    <th class="min-w-125px">Nama Distributor</th>
                                    <th class="min-w-125px">Alamat Distributor</th>
                                    <th class="min-w-125px">Telepon</th>
                                    <th class="text-end min-w-70px">Aksi</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-semibold">
                                @foreach ($dist as $item)
                                <tr>
                                    <!--begin::Checkbox-->
                                    <!--end::Checkbox-->
                                    <!--begin::Customer=-->
                                    <td>{{ $loop->iteration }}</td>
                                    <!--end::Customer=-->
                                    <!--begin::Status=-->
                                    <td>
                                        <div class="badge badge-light-warning">{{ $item->kode_distributor }}</div>
                                    </td>
                                    <!--end::Status=-->
                                    <!--begin::Billing=-->
                                    <td>{{ $item->nama_distributor }}</td>
                                    <!--end::Billing=-->
                                    <!--begin::Product=-->
                                    <td>{{ $item->alamat_distributor }}</td>
                                    <!--end::Product=-->
                                    <!--begin::Date=-->
                                    <td>{{ $item->telepon_distributor }}</td>
                                    <!--end::Date=-->
                                    <!--begin::Action=-->
                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                        <span class="svg-icon svg-icon-5 m-0">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon--></a>
                                        <!--begin::Menu-->
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="#" class="menu-link px-3" data-bs-toggle="modal" data-bs-target="#editdistributor{{ $item->id }}">Edit</a>
                                            </div>
                                            <!--end::Menu item-->
                                            <!--begin::Menu item-->
                                            <div class="menu-item px-3">
                                                <a href="/distributor/{{ $item->id }}" class="menu-link px-3">Hapus</a>
                                            </div>
                                            <!--end::Menu item-->
                                        </div>
                                        <!--end::Menu-->
                                    </td>
                                    <!--end::Action=-->
                                </tr>
                                <!--begin::Modal - New Target-->
                                <div class="modal fade" id="editdistributor{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                    <!--begin::Modal dialog-->
                                    <div class="modal-dialog modal-dialog-centered mw-650px">
                                        <!--begin::Modal content-->
                                        <div class="modal-content rounded">
                                            <!--begin::Modal header-->
                                            <div class="modal-header pb-0 border-0 justify-content-end">
                                                <!--begin::Close-->
                                                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                                                    <span class="svg-icon svg-icon-1">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                </div>
                                                <!--end::Close-->
                                            </div>
                                            <!--begin::Modal header-->
                                            <!--begin::Modal body-->
                                            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                                                <!--begin:Form-->
                                                <form id="kt_modal_new_target_form" class="form" action="{{ route('distributor.update', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <!--begin::Heading-->
                                                    <div class="mb-13 text-center">
                                                        <!--begin::Title-->
                                                        <h1 class="mb-3">Edit Data Distributor</h1>
                                                        <!--end::Title-->
                                                        <!--begin::Description-->
                                                        <div class="text-muted fw-semibold fs-5">Sesuaikan dengan data yang dibutuhkan
                                                        </div>
                                                        <!--end::Description-->
                                                    </div>
                                                    <!--end::Heading-->
                                                    <!--begin::Input group-->
                                                    <div class="d-flex flex-column mb-8 fv-row">
                                                        <!--begin::Label-->
                                                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                                            <span class="required">Nama Distributor</span>
                                                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Sesuaikan Nama Customer"></i>
                                                        </label>
                                                        <!--end::Label-->
                                                        <input type="text" class="form-control form-control-solid" placeholder="Masukkan Nama Distributor..." value="{{ $item->nama_distributor }}" name="nama_distributor" />
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="row g-9 mb-8">
                                                        <!--begin::Col-->
                                                        <div class="col-md-6 fv-row">
                                                            <label class="required fs-6 fw-semibold mb-2">Kode Distributor</label>
                                                            <input type="text" class="form-control form-control-solid" placeholder="Masukkan Kode Distributor" value="{{ $item->kode_distributor }}" name="kode_distributor" />
                                                        </div>
                                                        <!--end::Col-->
                                                        <!--begin::Col-->
                                                        <div class="col-md-6 fv-row">
                                                            <label class="required fs-6 fw-semibold mb-2">No. Telepon</label>
                                                            <!--begin::Input-->
                                                            <div class="position-relative d-flex align-items-center">
                                                                <!--begin::Icon-->
                                                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                                                <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor"/>
                                                                        <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor"/>
                                                                    </svg>
                                                                        
                                                                </span>
                                                                <!--end::Svg Icon-->
                                                                <!--end::Icon-->
                                                                <!--begin::Datepicker-->
                                                                <input type="text" class="form-control form-control-solid ps-12" value="{{ $item->telepon_distributor }}" placeholder="Masukkan No. Telepon..." name="telepon_distributor" />
                                                                <!--end::Datepicker-->
                                                            </div>
                                                            <!--end::Input-->
                                                        </div>
                                                        <!--end::Col-->
                                                    </div>
                                                    <!--end::Input group-->
                                                    <!--begin::Input group-->
                                                    <div class="d-flex flex-column mb-8">
                                                        <label class="fs-6 fw-semibold mb-2">Alamat Distributor</label>
                                                        <textarea class="form-control form-control-solid" rows="3" placeholder="Masukkan Alamat Distributor" name="alamat_distributor">{{ $item->alamat_distributor }}</textarea>
                                                    </div>
                                                    <!--begin::Actions-->
                                                    <div class="text-center">
                                                        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">
                                                            <span class="indicator-label">Submit</span>
                                                            <span class="indicator-progress">Please wait...
                                                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                        </button>
                                                    </div>
                                                    <!--end::Actions-->
                                                </form>
                                                <!--end:Form-->
                                            </div>
                                            <!--end::Modal body-->
                                        </div>
                                        <!--end::Modal content-->
                                    </div>
                                    <!--end::Modal dialog-->
                                </div>
                                @endforeach                                
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
                <!--begin::Modals-->
                <!--begin::Modal - Adjust Balance-->
                
                <!--end::Modal - New Card-->
                <!--end::Modals-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
</div>
<!--end:::Main-->

<!--begin::Modal - New Target-->
<div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="kt_modal_new_target_form" class="form" action="{{ route('distributor.store') }}" method="POST">
                    @csrf
                    <!--begin::Heading-->
                    <div class="mb-13 text-center">
                        <!--begin::Title-->
                        <h1 class="mb-3">Tambah Data Distributor</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-semibold fs-5">Sesuaikan dengan data yang dibutuhkan
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8 fv-row">
                        <!--begin::Label-->
                        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                            <span class="required">Nama Distributor</span>
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="Sesuaikan Nama Customer"></i>
                        </label>
                        <!--end::Label-->
                        <input type="text" class="form-control form-control-solid" placeholder="Masukkan Nama Distributor..." name="nama_distributor" required/>
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Kode Distributor</label>
                            <input type="text" class="form-control form-control-solid" placeholder="Masukkan Kode Distributor" name="kode_distributor" required/>
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-md-6 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">No. Telepon</label>
                            <!--begin::Input-->
                            <div class="position-relative d-flex align-items-center">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor"/>
                                        <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor"/>
                                    </svg>
                                        
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Datepicker-->
                                <input type="text" class="form-control form-control-solid ps-12" placeholder="Masukkan No. Telepon..." name="telepon_distributor" required/>
                                <!--end::Datepicker-->
                            </div>
                            <!--end::Input-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-column mb-8">
                        <label class="fs-6 fw-semibold mb-2">Alamat Distributor</label>
                        <textarea class="form-control form-control-solid" rows="3" placeholder="Masukkan Alamat Distributor" name="alamat_distributor" required></textarea>
                    </div>
                    <!--begin::Actions-->
                    <div class="text-center">
                        <button type="reset" id="kt_modal_new_target_cancel" class="btn btn-light me-3">Cancel</button>
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                            <span class="indicator-progress">Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
@endsection