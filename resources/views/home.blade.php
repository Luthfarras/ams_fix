@extends('layouts.template')
@section('title', 'Beranda')
    
@section('content')
<div class="d-flex flex-column flex-column-fluid">
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                <!--begin::Title-->
                <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Dashboard</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">
                        <a href="../../demo1/dist/index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item">
                        <span class="bullet bg-gray-400 w-5px h-2px"></span>
                    </li>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <li class="breadcrumb-item text-muted">Beranda</li>
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
    @if (DB::table('detail_profils')->where('user_id', Auth::user()->id)->exists())
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container">
                <!--begin::Row-->
                <div class="row gy-5 g-xl-10">
                    <!--begin::Col-->
                    <div class="col-sm-6 col-xl-2 mb-xl-10">
                        <!--begin::Card widget 2-->
                        <div class="card bg-danger hoverable h-lg-100">
                            <!--begin::Body-->
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <!--begin::Icon-->
                                <div class="m-0">
                                    <!--begin::Svg Icon | path: icons/duotune/maps/map004.svg-->
                                    <span class="svg-icon svg-icon-2hx svg-icon-white">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor"/>
                                            <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Icon-->
                                <!--begin::Section-->
                                <div class="d-flex flex-column my-7">
                                    <!--begin::Number-->
                                    <span class="fw-semibold fs-2x text-white lh-1 ls-n2 mb-2">{{ $customer }}</span>
                                    <!--end::Number-->
                                    <!--begin::Follower-->
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-white">Data Customer</span>
                                    </div>
                                    <!--end::Follower-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Badge-->
                                <!--end::Badge-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card widget 2-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-sm-6 col-xl-2 mb-xl-10">
                        <!--begin::Card widget 2-->
                        <div class="card bg-primary hoverable h-lg-100">
                            <!--begin::Body-->
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <!--begin::Icon-->
                                <div class="m-0">
                                    <!--begin::Svg Icon | path: icons/duotune/graphs/gra001.svg-->
                                    <span class="svg-icon svg-icon-2hx svg-icon-white">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z" fill="currentColor"/>
                                            <rect opacity="0.3" x="14" y="4" width="4" height="4" rx="2" fill="currentColor"/>
                                            <path d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z" fill="currentColor"/>
                                            <rect opacity="0.3" x="6" y="5" width="6" height="6" rx="3" fill="currentColor"/>
                                        </svg>
                                            
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Icon-->
                                <!--begin::Section-->
                                <div class="d-flex flex-column my-7">
                                    <!--begin::Number-->
                                    <span class="fw-semibold fs-2x text-white lh-1 ls-n2 mb-2">{{ $distributor }}</span>
                                    <!--end::Number-->
                                    <!--begin::Follower-->
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-white">Data Distributor</span>
                                    </div>
                                    <!--end::Follower-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Badge-->
                                <!--end::Badge-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card widget 2-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-sm-6 col-xl-2 mb-xl-10">
                        <!--begin::Card widget 2-->
                        <div class="card bg-warning hoverable h-lg-100">
                            <!--begin::Body-->
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <!--begin::Icon-->
                                <div class="m-0">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs048.svg-->
                                    <span class="svg-icon svg-icon-2hx svg-icon-white">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z" fill="currentColor"/>
                                            <path d="M7 16H6C5.4 16 5 15.6 5 15V13H8V15C8 15.6 7.6 16 7 16Z" fill="currentColor"/>
                                            <path opacity="0.3" d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z" fill="currentColor"/>
                                            <path d="M18 16H17C16.4 16 16 15.6 16 15V13H19V15C19 15.6 18.6 16 18 16Z" fill="currentColor"/>
                                            <path opacity="0.3" d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z" fill="currentColor"/>
                                            <path d="M7 5H6C5.4 5 5 4.6 5 4V2H8V4C8 4.6 7.6 5 7 5Z" fill="currentColor"/>
                                            <path opacity="0.3" d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z" fill="currentColor"/>
                                            <path d="M18 5H17C16.4 5 16 4.6 16 4V2H19V4C19 4.6 18.6 5 18 5Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Icon-->
                                <!--begin::Section-->
                                <div class="d-flex flex-column my-7">
                                    <!--begin::Number-->
                                    <span class="fw-semibold fs-2x text-white lh-1 ls-n2 mb-2">{{ $barang }}</span>
                                    <!--end::Number-->
                                    <!--begin::Follower-->
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-white">Data Barang</span>
                                    </div>
                                    <!--end::Follower-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Badge-->
                                <!--end::Badge-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card widget 2-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-sm-6 col-xl-2 mb-xl-10">
                        <!--begin::Card widget 2-->
                        <div class="card bg-success hoverable h-lg-100">
                            <!--begin::Body-->
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <!--begin::Icon-->
                                <div class="m-0">
                                    <!--begin::Svg Icon | path: icons/duotune/maps/map002.svg-->
                                    <span class="svg-icon svg-icon-2hx svg-icon-white">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z" fill="currentColor"/>
                                            <path opacity="0.3" d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z" fill="currentColor"/>
                                            <path opacity="0.3" d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Icon-->
                                <!--begin::Section-->
                                <div class="d-flex flex-column my-7">
                                    <!--begin::Number-->
                                    <span class="fw-semibold fs-2x text-white lh-1 ls-n2 mb-2">{{ $stok }}</span>
                                    <!--end::Number-->
                                    <!--begin::Follower-->
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-white">Jumlah Stok</span>
                                    </div>
                                    <!--end::Follower-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Badge-->
                                <!--end::Badge-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card widget 2-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-sm-6 col-xl-2 mb-5 mb-xl-10">
                        <!--begin::Card widget 2-->
                        <div class="card bg-info hoverable h-lg-100">
                            <!--begin::Body-->
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <!--begin::Icon-->
                                <div class="m-0">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs037.svg-->
                                    <span class="svg-icon svg-icon-2hx svg-icon-white">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M20 8H16C15.4 8 15 8.4 15 9V16H10V17C10 17.6 10.4 18 11 18H16C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18H21C21.6 18 22 17.6 22 17V13L20 8Z" fill="currentColor"/>
                                            <path opacity="0.3" d="M20 18C20 19.1 19.1 20 18 20C16.9 20 16 19.1 16 18C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18ZM15 4C15 3.4 14.6 3 14 3H3C2.4 3 2 3.4 2 4V13C2 13.6 2.4 14 3 14H15V4ZM6 16C4.9 16 4 16.9 4 18C4 19.1 4.9 20 6 20C7.1 20 8 19.1 8 18C8 16.9 7.1 16 6 16Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Icon-->
                                <!--begin::Section-->
                                <div class="d-flex flex-column my-7">
                                    <!--begin::Number-->
                                    <span class="fw-semibold fs-2x text-white lh-1 ls-n2 mb-2">Rp. {{  number_format($penjualan, 0, ',', '.') }}</span>
                                    <!--end::Number-->
                                    <!--begin::Follower-->
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-white">Penjualan</span>
                                    </div>
                                    <!--end::Follower-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Badge-->
                                
                                <!--end::Badge-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card widget 2-->
                    </div>
                    <!--end::Col-->
                    <!--begin::Col-->
                    <div class="col-sm-6 col-xl-2 mb-5 mb-xl-10">
                        <!--begin::Card widget 2-->
                        <div class="card bg-dark hoverable h-lg-100">
                            <!--begin::Body-->
                            <div class="card-body d-flex justify-content-between align-items-start flex-column">
                                <!--begin::Icon-->
                                <div class="m-0">
                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                    <span class="svg-icon svg-icon-2hx svg-icon-white">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3" d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z" fill="currentColor"/>
                                            <path d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z" fill="currentColor"/>
                                            <path d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z" fill="currentColor"/>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </div>
                                <!--end::Icon-->
                                <!--begin::Section-->
                                <div class="d-flex flex-column my-7">
                                    <!--begin::Number-->
                                    <span class="fw-semibold fs-2x text-white lh-1 ls-n2 mb-2">{{ $faktur }}</span>
                                    <!--end::Number-->
                                    <!--begin::Follower-->
                                    <div class="m-0">
                                        <span class="fw-semibold fs-6 text-white">Faktur</span>
                                    </div>
                                    <!--end::Follower-->
                                </div>
                                <!--end::Section-->
                                <!--begin::Badge-->
                              
                                <!--end::Badge-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Card widget 2-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
                
            
                
            </div>
            <!--end::Content container-->
        </div>
    @else
    <div class="d-flex flex-column flex-center text-center p-10">
        <!--begin::Wrapper-->
        <div class="card card-flush w-lg-650px py-5">
            <div class="card-body py-15 py-lg-20">
                <!--begin::Logo-->
                <div class="mb-13">
                    <a href="#" class="">
                        <img alt="Logo" src="{{ asset('met/dist/assets/media/svg/avatars/001-boy.svg') }}" class="h-40px" />
                        <img alt="Logo" src="{{ asset('met/dist/assets/media/svg/avatars/002-girl.svg') }}" class="h-40px" />
                    </a>
                </div>
                <!--end::Logo-->
                <!--begin::Title-->
                <h1 class="fw-bolder text-gray-900 mb-7">Isi Data Profil dahulu yang ada di sebelah pojok kanan atas </h1>
                <!--end::Title-->
               
                <!--begin::Text-->
                <div class="fw-semibold fs-6 text-gray-500 mb-7">Sebelum anda memulai
                <br />Mohon isikan detail profil terlebih dahulu
                <br /> Pastikan Data yang dimasukkan sudah benar</div>
                <!--end::Text-->
                
                <!--begin::Illustration-->
                <div class="mb-n5">
                    <img src="{{ asset('met/dist/assets/media/svg/illustrations/easy/1-dark.svg') }}" class="mw-100 mh-300px theme-light-show" alt="" />
                </div>
                <!--end::Illustration-->
            </div>
        </div>
        <!--end::Wrapper-->
    </div>
    @endif
    <!--end::Content-->
</div>
@endsection
