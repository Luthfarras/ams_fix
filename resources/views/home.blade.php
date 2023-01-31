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
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Dashboard
                    </h1>
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
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z"
                                                    fill="currentColor" />
                                                <rect opacity="0.3" x="8" y="3" width="8"
                                                    height="8" rx="4" fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Section-->
                                    <div class="d-flex flex-column my-7">
                                        <!--begin::Number-->
                                        <span
                                            class="fw-semibold fs-2x text-white lh-1 ls-n2 mb-2">{{ $customer }}</span>
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
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M16.0173 9H15.3945C14.2833 9 13.263 9.61425 12.7431 10.5963L12.154 11.7091C12.0645 11.8781 12.1072 12.0868 12.2559 12.2071L12.6402 12.5183C13.2631 13.0225 13.7556 13.6691 14.0764 14.4035L14.2321 14.7601C14.2957 14.9058 14.4396 15 14.5987 15H18.6747C19.7297 15 20.4057 13.8774 19.912 12.945L18.6686 10.5963C18.1487 9.61425 17.1285 9 16.0173 9Z"
                                                    fill="currentColor" />
                                                <rect opacity="0.3" x="14" y="4" width="4"
                                                    height="4" rx="2" fill="currentColor" />
                                                <path
                                                    d="M4.65486 14.8559C5.40389 13.1224 7.11161 12 9 12C10.8884 12 12.5961 13.1224 13.3451 14.8559L14.793 18.2067C15.3636 19.5271 14.3955 21 12.9571 21H5.04292C3.60453 21 2.63644 19.5271 3.20698 18.2067L4.65486 14.8559Z"
                                                    fill="currentColor" />
                                                <rect opacity="0.3" x="6" y="5" width="6"
                                                    height="6" rx="3" fill="currentColor" />
                                            </svg>

                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Section-->
                                    <div class="d-flex flex-column my-7">
                                        <!--begin::Number-->
                                        <span
                                            class="fw-semibold fs-2x text-white lh-1 ls-n2 mb-2">{{ $distributor }}</span>
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
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3"
                                                    d="M3 13H10C10.6 13 11 13.4 11 14V21C11 21.6 10.6 22 10 22H3C2.4 22 2 21.6 2 21V14C2 13.4 2.4 13 3 13Z"
                                                    fill="currentColor" />
                                                <path d="M7 16H6C5.4 16 5 15.6 5 15V13H8V15C8 15.6 7.6 16 7 16Z"
                                                    fill="currentColor" />
                                                <path opacity="0.3"
                                                    d="M14 13H21C21.6 13 22 13.4 22 14V21C22 21.6 21.6 22 21 22H14C13.4 22 13 21.6 13 21V14C13 13.4 13.4 13 14 13Z"
                                                    fill="currentColor" />
                                                <path d="M18 16H17C16.4 16 16 15.6 16 15V13H19V15C19 15.6 18.6 16 18 16Z"
                                                    fill="currentColor" />
                                                <path opacity="0.3"
                                                    d="M3 2H10C10.6 2 11 2.4 11 3V10C11 10.6 10.6 11 10 11H3C2.4 11 2 10.6 2 10V3C2 2.4 2.4 2 3 2Z"
                                                    fill="currentColor" />
                                                <path d="M7 5H6C5.4 5 5 4.6 5 4V2H8V4C8 4.6 7.6 5 7 5Z"
                                                    fill="currentColor" />
                                                <path opacity="0.3"
                                                    d="M14 2H21C21.6 2 22 2.4 22 3V10C22 10.6 21.6 11 21 11H14C13.4 11 13 10.6 13 10V3C13 2.4 13.4 2 14 2Z"
                                                    fill="currentColor" />
                                                <path d="M18 5H17C16.4 5 16 4.6 16 4V2H19V4C19 4.6 18.6 5 18 5Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Section-->
                                    <div class="d-flex flex-column my-7">
                                        <!--begin::Number-->
                                        <span
                                            class="fw-semibold fs-2x text-white lh-1 ls-n2 mb-2">{{ $barang }}</span>
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
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M21 10H13V11C13 11.6 12.6 12 12 12C11.4 12 11 11.6 11 11V10H3C2.4 10 2 10.4 2 11V13H22V11C22 10.4 21.6 10 21 10Z"
                                                    fill="currentColor" />
                                                <path opacity="0.3"
                                                    d="M12 12C11.4 12 11 11.6 11 11V3C11 2.4 11.4 2 12 2C12.6 2 13 2.4 13 3V11C13 11.6 12.6 12 12 12Z"
                                                    fill="currentColor" />
                                                <path opacity="0.3"
                                                    d="M18.1 21H5.9C5.4 21 4.9 20.6 4.8 20.1L3 13H21L19.2 20.1C19.1 20.6 18.6 21 18.1 21ZM13 18V15C13 14.4 12.6 14 12 14C11.4 14 11 14.4 11 15V18C11 18.6 11.4 19 12 19C12.6 19 13 18.6 13 18ZM17 18V15C17 14.4 16.6 14 16 14C15.4 14 15 14.4 15 15V18C15 18.6 15.4 19 16 19C16.6 19 17 18.6 17 18ZM9 18V15C9 14.4 8.6 14 8 14C7.4 14 7 14.4 7 15V18C7 18.6 7.4 19 8 19C8.6 19 9 18.6 9 18Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Section-->
                                    <div class="d-flex flex-column my-7">
                                        <!--begin::Number-->
                                        <span
                                            class="fw-semibold fs-2x text-white lh-1 ls-n2 mb-2">{{ $stok }}</span>
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
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M20 8H16C15.4 8 15 8.4 15 9V16H10V17C10 17.6 10.4 18 11 18H16C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18H21C21.6 18 22 17.6 22 17V13L20 8Z"
                                                    fill="currentColor" />
                                                <path opacity="0.3"
                                                    d="M20 18C20 19.1 19.1 20 18 20C16.9 20 16 19.1 16 18C16 16.9 16.9 16 18 16C19.1 16 20 16.9 20 18ZM15 4C15 3.4 14.6 3 14 3H3C2.4 3 2 3.4 2 4V13C2 13.6 2.4 14 3 14H15V4ZM6 16C4.9 16 4 16.9 4 18C4 19.1 4.9 20 6 20C7.1 20 8 19.1 8 18C8 16.9 7.1 16 6 16Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Section-->
                                    <div class="d-flex flex-column my-7">
                                        <!--begin::Number-->
                                        <span class="fw-semibold fs-2x text-white lh-1 ls-n2 mb-2">Rp.
                                            {{ number_format($penjualan, 0, ',', '.') }}</span>
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
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.3"
                                                    d="M18 21.6C16.3 21.6 15 20.3 15 18.6V2.50001C15 2.20001 14.6 1.99996 14.3 2.19996L13 3.59999L11.7 2.3C11.3 1.9 10.7 1.9 10.3 2.3L9 3.59999L7.70001 2.3C7.30001 1.9 6.69999 1.9 6.29999 2.3L5 3.59999L3.70001 2.3C3.50001 2.1 3 2.20001 3 3.50001V18.6C3 20.3 4.3 21.6 6 21.6H18Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M12 12.6H11C10.4 12.6 10 12.2 10 11.6C10 11 10.4 10.6 11 10.6H12C12.6 10.6 13 11 13 11.6C13 12.2 12.6 12.6 12 12.6ZM9 11.6C9 11 8.6 10.6 8 10.6H6C5.4 10.6 5 11 5 11.6C5 12.2 5.4 12.6 6 12.6H8C8.6 12.6 9 12.2 9 11.6ZM9 7.59998C9 6.99998 8.6 6.59998 8 6.59998H6C5.4 6.59998 5 6.99998 5 7.59998C5 8.19998 5.4 8.59998 6 8.59998H8C8.6 8.59998 9 8.19998 9 7.59998ZM13 7.59998C13 6.99998 12.6 6.59998 12 6.59998H11C10.4 6.59998 10 6.99998 10 7.59998C10 8.19998 10.4 8.59998 11 8.59998H12C12.6 8.59998 13 8.19998 13 7.59998ZM13 15.6C13 15 12.6 14.6 12 14.6H10C9.4 14.6 9 15 9 15.6C9 16.2 9.4 16.6 10 16.6H12C12.6 16.6 13 16.2 13 15.6Z"
                                                    fill="currentColor" />
                                                <path
                                                    d="M15 18.6C15 20.3 16.3 21.6 18 21.6C19.7 21.6 21 20.3 21 18.6V12.5C21 12.2 20.6 12 20.3 12.2L19 13.6L17.7 12.3C17.3 11.9 16.7 11.9 16.3 12.3L15 13.6V18.6Z"
                                                    fill="currentColor" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <!--end::Icon-->
                                    <!--begin::Section-->
                                    <div class="d-flex flex-column my-7">
                                        <!--begin::Number-->
                                        <span
                                            class="fw-semibold fs-2x text-white lh-1 ls-n2 mb-2">{{ $faktur }}</span>
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
                    <div class="row g-5 g-xl-8">
                        <div class="mt-5 ms-5">
                            <a href="" class="btn btn-primary mb-3" data-bs-toggle="modal"
                                data-bs-target="#catatan">Tambah Catatan</a>
                        </div>
                        @foreach ($notes as $item)
                        <!--begin::Col-->
                        <div class="col-xl-3">
                            <!--begin::Feeds Widget 2-->
                                <div class="card mb-5 mb-xl-8 ms-2">
                                    <!--begin::Body-->
                                    <div class="card-body pb-0">
                                        <!--begin::Header-->
                                        <div class="d-flex align-items-center mb-5">
                                            <!--begin::User-->
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <!--begin::Info-->
                                                <div class="d-flex flex-column">
                                                    <a href="#"
                                                        class="text-gray-900 text-hover-primary fs-6 fw-bold">{{ $item->judul }}</a>
                                                        @php
                                                        setlocale(LC_ALL, 'IND');
                                                        $tanggal = date_create($item->tanggal);
                                                        $data =  \Carbon\Carbon::parse($tanggal)->formatLocalized('%d %B %Y');
                                                        @endphp
                                                    <span class="text-gray-400 fw-bold">{{ $data }}</span>
                                                    @if ($item->status == 'Belum Selesai')
                                                        <span class="badge badge-light-warning">{{ $item->status }}</span>
                                                    @else
                                                        <span class="badge badge-light-success">{{ $item->status }}</span>
                                                    @endif
                                                    @if (Auth::user()->role == 'Owner')
                                                    <span class="text-gray-400 fw-bold">{{ $item->user->username }}</span>
                                                    @endif
                                                </div>
                                                <!--end::Info-->
                                            </div>
                                            <!--end::User-->
                                            <!--begin::Menu-->
                                            <div class="my-0">
                                                <a href="/delnotes/{{ $item->id }}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm"                                                    data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                                    <span class="svg-icon svg-icon-3">
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor" />
                                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor" />
                                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor" />
                                                        </svg>
                                                    </span> 
                                                    <!--end::Svg Icon-->
                                                </a>
                                            </div>
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Post-->
                                        <div class="mb-5">
                                            <!--begin::Text-->
                                            <pre class="text-gray-800 fw-normal mb-5" style="font-family:inherit;">{{ $item->isi }}</pre>
                                            <!--end::Text-->

                                            <!--begin::Toolbar-->
                                            @if ($item->user_id == Auth::user()->id)                                                
                                            <div class="d-flex align-items-center mb-5">
                                                @if ($item->status == 'Belum Selesai')
                                                    <a href="/statnotes/{{ $item->id }}"
                                                        class="btn btn-sm btn-light btn-color-muted btn-active-light-success px-4 py-2 me-4">
                                                        <!--begin::Svg Icon | path: icons/duotune/communication/com012.svg-->
                                                        <span class="svg-icon svg-icon-3">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.3" x="2" y="2"
                                                                    width="20" height="20" rx="10"
                                                                    fill="currentColor" />
                                                                <path
                                                                    d="M10.4343 12.4343L8.75 10.75C8.33579 10.3358 7.66421 10.3358 7.25 10.75C6.83579 11.1642 6.83579 11.8358 7.25 12.25L10.2929 15.2929C10.6834 15.6834 11.3166 15.6834 11.7071 15.2929L17.25 9.75C17.6642 9.33579 17.6642 8.66421 17.25 8.25C16.8358 7.83579 16.1642 7.83579 15.75 8.25L11.5657 12.4343C11.2533 12.7467 10.7467 12.7467 10.4343 12.4343Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->Tandai Selesai
                                                    </a>
                                                @else
                                                    <a href="/statnotes/{{ $item->id }}"
                                                        class="btn btn-sm btn-light btn-color-muted btn-active-light-danger px-4 py-2">
                                                        <!--begin::Svg Icon | path: icons/duotune/general/gen030.svg-->
                                                        <span class="svg-icon svg-icon-2">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect opacity="0.3" x="2" y="2"
                                                                    width="20" height="20" rx="10"
                                                                    fill="currentColor" />
                                                                <rect x="7" y="15.3137" width="12"
                                                                    height="2" rx="1"
                                                                    transform="rotate(-45 7 15.3137)"
                                                                    fill="currentColor" />
                                                                <rect x="8.41422" y="7" width="12"
                                                                    height="2" rx="1"
                                                                    transform="rotate(45 8.41422 7)"
                                                                    fill="currentColor" />
                                                            </svg>

                                                        </span>
                                                        <!--end::Svg Icon-->Tandai Belum Selesai
                                                    </a>
                                                @endif
                                            </div>
                                            @endif
                                            <!--end::Toolbar-->
                                        </div>
                                        <!--end::Post-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <!--end::Feeds Widget 2-->
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
                                <img alt="Logo" src="{{ asset('met/dist/assets/media/svg/avatars/001-boy.svg') }}"
                                    class="h-40px" />
                                <img alt="Logo" src="{{ asset('met/dist/assets/media/svg/avatars/002-girl.svg') }}"
                                    class="h-40px" />
                            </a>
                        </div>
                        <!--end::Logo-->
                        <!--begin::Title-->
                        <h1 class="fw-bolder text-gray-900 mb-7">Isi Data Profil dahulu yang ada di sebelah pojok kanan
                            atas </h1>
                        <!--end::Title-->

                        <!--begin::Text-->
                        <div class="fw-semibold fs-6 text-gray-500 mb-7">Sebelum anda memulai
                            <br />Mohon isikan detail profil terlebih dahulu
                            <br /> Pastikan Data yang dimasukkan sudah benar
                        </div>
                        <!--end::Text-->

                        <!--begin::Illustration-->
                        <div class="mb-n5">
                            <img src="{{ asset('met/dist/assets/media/svg/illustrations/easy/1-dark.svg') }}"
                                class="mw-100 mh-300px theme-light-show" alt="" />
                        </div>
                        <!--end::Illustration-->
                    </div>
                </div>
                <!--end::Wrapper-->
            </div>
        @endif
        <!--end::Content-->
    </div>

    <!--begin::Modal - New Target-->
    <div class="modal fade" id="catatan" tabindex="-1" aria-hidden="true">
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
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2"
                                    rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                    transform="rotate(45 7.41422 6)" fill="currentColor" />
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
                    <form id="kt_modal_new_target_form" class="form" action="{{ route('notes.store') }}"
                        method="POST">
                        @csrf
                        <!--begin::Heading-->
                        <div class="mb-13 text-center">
                            <!--begin::Title-->
                            <h1 class="mb-3">Tambahkan Catatan</h1>
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
                                <span class="required">Judul Catatan</span>
                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip"
                                    title="Sesuaikan Judul catatan"></i>
                            </label>
                            <!--end::Label-->
                            <input type="text" class="form-control form-control-solid"
                                placeholder="Masukkan Judul Catatan..." name="judul" required />
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-8">
                            <label class="required fs-6 fw-semibold mb-2">Tanggal Catatan</label>
                            <div class="position-relative d-flex align-items-center">
                                <!--begin::Icon-->
                                <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <span class="svg-icon svg-icon-2 position-absolute mx-4">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.3"
                                            d="M21 22H3C2.4 22 2 21.6 2 21V5C2 4.4 2.4 4 3 4H21C21.6 4 22 4.4 22 5V21C22 21.6 21.6 22 21 22Z"
                                            fill="currentColor" />
                                        <path
                                            d="M6 6C5.4 6 5 5.6 5 5V3C5 2.4 5.4 2 6 2C6.6 2 7 2.4 7 3V5C7 5.6 6.6 6 6 6ZM11 5V3C11 2.4 10.6 2 10 2C9.4 2 9 2.4 9 3V5C9 5.6 9.4 6 10 6C10.6 6 11 5.6 11 5ZM15 5V3C15 2.4 14.6 2 14 2C13.4 2 13 2.4 13 3V5C13 5.6 13.4 6 14 6C14.6 6 15 5.6 15 5ZM19 5V3C19 2.4 18.6 2 18 2C17.4 2 17 2.4 17 3V5C17 5.6 17.4 6 18 6C18.6 6 19 5.6 19 5Z"
                                            fill="currentColor" />
                                        <path
                                            d="M8.8 13.1C9.2 13.1 9.5 13 9.7 12.8C9.9 12.6 10.1 12.3 10.1 11.9C10.1 11.6 10 11.3 9.8 11.1C9.6 10.9 9.3 10.8 9 10.8C8.8 10.8 8.59999 10.8 8.39999 10.9C8.19999 11 8.1 11.1 8 11.2C7.9 11.3 7.8 11.4 7.7 11.6C7.6 11.8 7.5 11.9 7.5 12.1C7.5 12.2 7.4 12.2 7.3 12.3C7.2 12.4 7.09999 12.4 6.89999 12.4C6.69999 12.4 6.6 12.3 6.5 12.2C6.4 12.1 6.3 11.9 6.3 11.7C6.3 11.5 6.4 11.3 6.5 11.1C6.6 10.9 6.8 10.7 7 10.5C7.2 10.3 7.49999 10.1 7.89999 10C8.29999 9.90003 8.60001 9.80003 9.10001 9.80003C9.50001 9.80003 9.80001 9.90003 10.1 10C10.4 10.1 10.7 10.3 10.9 10.4C11.1 10.5 11.3 10.8 11.4 11.1C11.5 11.4 11.6 11.6 11.6 11.9C11.6 12.3 11.5 12.6 11.3 12.9C11.1 13.2 10.9 13.5 10.6 13.7C10.9 13.9 11.2 14.1 11.4 14.3C11.6 14.5 11.8 14.7 11.9 15C12 15.3 12.1 15.5 12.1 15.8C12.1 16.2 12 16.5 11.9 16.8C11.8 17.1 11.5 17.4 11.3 17.7C11.1 18 10.7 18.2 10.3 18.3C9.9 18.4 9.5 18.5 9 18.5C8.5 18.5 8.1 18.4 7.7 18.2C7.3 18 7 17.8 6.8 17.6C6.6 17.4 6.4 17.1 6.3 16.8C6.2 16.5 6.10001 16.3 6.10001 16.1C6.10001 15.9 6.2 15.7 6.3 15.6C6.4 15.5 6.6 15.4 6.8 15.4C6.9 15.4 7.00001 15.4 7.10001 15.5C7.20001 15.6 7.3 15.6 7.3 15.7C7.5 16.2 7.7 16.6 8 16.9C8.3 17.2 8.6 17.3 9 17.3C9.2 17.3 9.5 17.2 9.7 17.1C9.9 17 10.1 16.8 10.3 16.6C10.5 16.4 10.5 16.1 10.5 15.8C10.5 15.3 10.4 15 10.1 14.7C9.80001 14.4 9.50001 14.3 9.10001 14.3C9.00001 14.3 8.9 14.3 8.7 14.3C8.5 14.3 8.39999 14.3 8.39999 14.3C8.19999 14.3 7.99999 14.2 7.89999 14.1C7.79999 14 7.7 13.8 7.7 13.7C7.7 13.5 7.79999 13.4 7.89999 13.2C7.99999 13 8.2 13 8.5 13H8.8V13.1ZM15.3 17.5V12.2C14.3 13 13.6 13.3 13.3 13.3C13.1 13.3 13 13.2 12.9 13.1C12.8 13 12.7 12.8 12.7 12.6C12.7 12.4 12.8 12.3 12.9 12.2C13 12.1 13.2 12 13.6 11.8C14.1 11.6 14.5 11.3 14.7 11.1C14.9 10.9 15.2 10.6 15.5 10.3C15.8 10 15.9 9.80003 15.9 9.70003C15.9 9.60003 16.1 9.60004 16.3 9.60004C16.5 9.60004 16.7 9.70003 16.8 9.80003C16.9 9.90003 17 10.2 17 10.5V17.2C17 18 16.7 18.4 16.2 18.4C16 18.4 15.8 18.3 15.6 18.2C15.4 18.1 15.3 17.8 15.3 17.5Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                                <!--end::Icon-->
                                <!--begin::Datepicker-->
                                <input type="text" id="tanggalisi2" class="form-control form-control-solid ps-12 mb-2"
                                    placeholder="Pilih Tanggal" name="tanggal" required />
                            </div>
                            <!--begin::Input group-->
                            <div class="d-flex flex-column mb-8">
                                <label class="fs-6 fw-semibold mb-2">Isi Catatan</label>
                                <textarea class="form-control form-control-solid" rows="3" placeholder="Masukkan Isi Catatan" name="isi"
                                    required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="reset" id="kt_modal_new_target_cancel"
                                    class="btn btn-light me-3">Cancel</button>
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
    <!--end::Modal - New Target-->
@endsection
