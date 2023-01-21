@extends('layouts.template')
@section('title', 'Laporan Penjualan')

@section('content')
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Laporan Penjualan</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="/" class="text-muted text-hover-primary">Home</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Laporan Penjualan</li>
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
                <div id="kt_app_content_container" class="app-container container-xxl">
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
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                height="2" rx="1" transform="rotate(45 17.0365 15.1223)"
                                                fill="currentColor" />
                                            <path
                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <input type="text" data-kt-subscription-table-filter="search"
                                        class="form-control form-control-solid w-250px ps-14"
                                        placeholder="Cari Laporan Penjualan..." />
                                </div>
                                <!--end::Search-->
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <!--begin::Table-->
                           <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
                                <!--begin::Table head-->
                                <thead>
                                    <!--begin::Table row-->
                                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                        <th class="min-w-125px">No</th>
                                        <th class="min-w-125px">Kode Penjualan</th>
                                        <th class="min-w-125px">Nama Customer</th>
                                        <th class="min-w-125px">Tanggal Kirim</th>
                                        <th class="min-w-125px">Jumlah</th>
                                        <th class="min-w-125px">Keterangan</th>
                                        <th class="min-w-125px">Status</th>
                                        <th class="text-end min-w-70px">Aksi</th>
                                    </tr>
                                    <!--end::Table row-->
                                </thead>
                                <!--end::Table head-->
                                <!--begin::Table body-->
                                <tbody class="text-gray-600 fw-semibold">
                                    @foreach ($penjualan as $item)
                                        <tr>
                                            <td>
                                                <a href="#"
                                                    class="text-gray-800 text-hover-primary mb-1">{{ $loop->iteration }}</a>
                                            </td>
                                            <td>
                                                <div class="badge badge-light-success">{{ $item->kode }}</div>
                                            </td>

                                            <td>
                                                <div class="badge badge-light">{{ $item->customer->nama_customer }}</div>
                                            </td>
                                            < <td>{{ $item->tanggal_kirim }}</td>
                                                <td>Rp {{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                                <td>{{ $item->keterangan }}</td>

                                                @if (DB::table('penjualans')->where('id', $item->id)->where('status', 'Belum Lunas')->exists())
                                                    <td>
                                                        <div class="badge badge-light-danger"><a
                                                                href="status/{{ $item->id }}">{{ $item->status }}</a>
                                                        </div>
                                                    </td>
                                                @else
                                                    <td>
                                                        <div class="badge badge-light-success">{{ $item->status }}</div>
                                                    </td>
                                                @endif

                                                <td class="text-end">
                                                    <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                        data-kt-menu-trigger="click"
                                                        data-kt-menu-placement="bottom-end">Aksi
                                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                        <span class="svg-icon svg-icon-5 m-0">
                                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                    fill="currentColor" />
                                                            </svg>
                                                        </span>
                                                        <!--end::Svg Icon-->
                                                    </a>
                                                    <!--begin::Menu-->
                                                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4"
                                                        data-kt-menu="true">
                                                        <!--begin::Menu item-->
                                                        <div class="menu-item px-3">
                                                            <a href="/penjualan/{{ $item->id }}"
                                                                data-kt-subscriptions-table-filter="delete_row"
                                                                class="menu-link px-3">Hapus</a>
                                                        </div>
                                                        <!--end::Menu item-->
                                                        @if (DB::table('penjualans')->where('id', $item->id)->where('status', 'Lunas')->exists())
                                                            <div class="menu-item px-3">
                                                                @if (Auth::user()->role == 'Owner')
                                                                    <a href="status/{{ $item->id }}"
                                                                        class="menu-link px-3">Ganti Status</a>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <!--end::Menu-->
                                                </td>
                                                <!--end::Action=-->
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr class="text-start text-muted fw-bold fs-7 gs-0">
                                        <th class="min-w-125px"></th>
                                        <th class="min-w-125px"></th>
                                        <th class="min-w-125px">JUMLAH</th>
                                        <th class="min-w-125px"></th>
                                        <th class="min-w-125px"><span class="badge bg-primary">Rp.
                                                {{ number_format($jumlah, 0, ',', '.') }}</span></th>
                                        <th class="min-w-125px"></th>
                                        <th class="min-w-125px"></th>
                                        <th class="text-end min-w-70px"></th>
                                    </tr>
                                </tfoot>
                                <!--end::Table body-->
                            </table>
                            <!--end::Table-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                    <!--begin::Modals-->

                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>

@endsection
