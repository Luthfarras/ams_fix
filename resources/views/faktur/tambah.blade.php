@extends('layouts.template')
@section('title', 'Tambah Data Faktur')

@section('content')
    <!--begin::Main-->
    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
        <!--begin::Content wrapper-->
        <div class="d-flex flex-column flex-column-fluid">
            <!--begin::Toolbar-->
            <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
                <!--begin::Toolbar container-->
                <div id="kt_app_toolbar_container" class="app-container d-flex flex-stack">
                    <!--begin::Page title-->
                    <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                        <!--begin::Title-->
                        <a href="{{ url()->previous() }}" class="btn btn-primary mb-5">
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr063.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="6" y="11" width="13" height="2"
                                        rx="1" fill="currentColor" />
                                    <path
                                        d="M8.56569 11.4343L12.75 7.25C13.1642 6.83579 13.1642 6.16421 12.75 5.75C12.3358 5.33579 11.6642 5.33579 11.25 5.75L5.70711 11.2929C5.31658 11.6834 5.31658 12.3166 5.70711 12.7071L11.25 18.25C11.6642 18.6642 12.3358 18.6642 12.75 18.25C13.1642 17.8358 13.1642 17.1642 12.75 16.75L8.56569 12.5657C8.25327 12.2533 8.25327 11.7467 8.56569 11.4343Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->Kembali
                        </a>
                        <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                            Tambah Faktur</h1>
                        <!--end::Title-->
                        <!--begin::Breadcrumb-->
                        <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">
                                <a href="#" class="text-muted text-hover-primary">Faktur</a>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-400 w-5px h-2px"></span>
                            </li>
                            <!--end::Item-->
                            <!--begin::Item-->
                            <li class="breadcrumb-item text-muted">Tambah Faktur</li>
                            <!--end::Item-->
                        </ul>
                        <!--end::Breadcrumb-->
                    </div>
                    <!--end::Page title-->
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                        <!--begin::Secondary button-->
                        <!--end::Secondary button-->
                        <!--begin::Primary button-->
                        <!--end::Primary button-->
                    </div>
                    <!--end::Actions-->
                </div>
                <!--end::Toolbar container-->
            </div>
            <!--end::Toolbar-->
            <!--begin::Content-->
            <div id="kt_app_content" class="app-content ">
                <!--begin::Content container-->
                <div id="kt_app_content_container" class="app-container">
                    <!--begin::Layout-->
                    <div class="d-flex flex-column ">
                        <!--begin::Content-->
                        <div class=" mb-10 mb-lg-0">
                            <!--begin::Card-->
                            <div class="card">
                                <!--begin::Card body-->
                                <div class="card-body p-12">
                                    <!--begin::Form-->
                                    <form action="{{ route('faktur.store') }}" method="POST">
                                        @csrf
                                        <!--begin::Wrapper-->
                                        <div class="d-flex flex-column align-items-start flex-xxl-row">
                                            <!--begin::Input group-->
                                            <div class="d-flex align-items-center flex-equal fw-row me-4 order-2"
                                                data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                title="Specify invoice date">
                                                <!--begin::Date-->
                                                <div class="fs-6 fw-bold text-gray-700 text-nowrap">Date:</div>
                                                <!--end::Date-->
                                                <!--begin::Input-->
                                                <div class="position-relative d-flex align-items-center w-150px">
                                                    <!--begin::Datepicker-->
                                                    <input type="date" id="invoice_date"
                                                        class="form-control form-control-transparent fw-bold pe-5"
                                                        placeholder="Select date" name="tanggal_faktur" required/>
                                                    <!--end::Datepicker-->
                                                    <!--begin::Icon-->
                                                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                    <span class="svg-icon svg-icon-2 position-absolute ms-4 end-0">
                                                        <svg width="24" height="24" viewBox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                                fill="currentColor" />
                                                        </svg>
                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <!--end::Icon-->
                                                </div>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Input group-->

                                            <!--begin::Input group-->
                                            <div class="d-flex flex-center flex-equal fw-row text-nowrap order-1 order-xxl-2 me-4"
                                                data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                title="Enter invoice number">
                                                <span class="fs-2x fw-bold text-gray-800">Invoice #</span>
                                                <select class="form-select form-select-solid" data-control="select2"
                                                    data-hide-search="true" data-placeholder="Pilih Kode Faktur..."
                                                    name="kode_faktur" onchange="nama(value)" required>
                                                    <option selected disabled>Pilih Kode Faktur...</option>
                                                    @foreach ($dfaktur as $item)
                                                        <option value="{{ $item->kode_faktur }}">{{ $item->kode_faktur }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!--end::Input group-->
                                        </div>
                                        <!--end::Top-->
                                        <!--begin::Separator-->
                                        <div class="separator separator-dashed my-10"></div>
                                        <!--end::Separator-->
                                        <!--begin::Wrapper-->
                                        <div class="mb-0">
                                            <!--begin::Row-->

                                            <!--begin::Col-->
                                            <div class="flex-wrap">
                                                <label class="form-label fs-6 fw-bold text-gray-700 mb-3">Ditujukan Kepada</label>
                                                <!--begin::Input group-->
                                                <input type="text" id="nama_cust" class="form-control form-control-solid"
                                                    placeholder="Nama Customer..." onkeyup="nama(value)" disabled>
                                                <input type="hidden" name="customer_id" id="cust_id">
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Col-->
                                            <!--end::Row-->
                                            <!--begin::Table wrapper-->
                                            <div class="table-responsive mb-10">
                                                <!--begin::Table-->
                                                <table class="table g-5 gs-0 mb-0 fw-bold text-gray-700"
                                                    data-kt-element="items">
                                                    <!--begin::Table head-->
                                                    <thead>
                                                        <tr class="border-bottom fs-7 fw-bold text-gray-700 text-uppercase">
                                                            <th class="min-w-300px w-475px">Nama Barang</th>
                                                            <th class="min-w-300px w-475px">Total Harga</th>
                                                            <th class="min-w-100px w-100px">PPN</th>
                                                            <th class="min-w-100px w-100px">PPH</th>
                                                        </tr>
                                                    </thead>
                                                    <!--end::Table head-->
                                                    <!--begin::Table body-->
                                                    <tbody>
                                                        <tr class="border-bottom border-bottom-dashed"
                                                            data-kt-element="item" id="barang_barang">
                                                            <td class="pe-7" id="barang_faktur">
                                                            </td>
                                                            <td class="pe-7">
                                                                <input type="text"
                                                                    class="form-control form-control-solid"
                                                                    name="total_harga" id="total_harga"
                                                                    onkeyup="nama(value)">
                                                            </td>
                                                            <td class="ps-0">
                                                                <input class="form-control form-control-solid"
                                                                    type="text" name="ppn" id="ppn"
                                                                    onkeyup="total()" required/>
                                                            </td>
                                                            <td class="ps-0">
                                                                <input class="form-control form-control-solid"
                                                                    type="text" name="pph" id="pph"
                                                                    onkeyup="total()" required/>
                                                            </td>
                                                           
                                                        </tr>
                                                    </tbody>
                                                    <!--end::Table body-->
                                                    <!--begin::Table foot-->
                                                    <tfoot>
                                                        
                                                        <tr class="align-top fw-bold text-gray-700">
                                                            <th></th>
                                                            <th colspan="2" class="fs-4 ps-0">Total</th>
                                                            <th colspan="2" class="text-end fs-4 text-nowrap">Rp.
                                                                <span data-kt-element="grand-total"
                                                                    id="total_pp">0.00</span>
                                                            </th>
                                                            <input type="hidden" name="total_pp" id="total_fix">
                                                        </tr>
                                                    </tfoot>
                                                    <!--end::Table foot-->
                                                </table>
                                            </div>
                                            <!--end::Table-->
                                            <!--begin::Notes-->
                                            <div class="mb-5">
                                                <label class="form-label fs-6 fw-bold text-gray-700">Catatan</label>
                                                <textarea name="ket_faktur" class="form-control form-control-solid" rows="3"
                                                    placeholder="Keterangan..." required></textarea>
                                            </div>
                                            <!--end::Notes-->
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen016.svg-->
                                            <span class="svg-icon svg-icon-3">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M15.43 8.56949L10.744 15.1395C10.6422 15.282 10.5804 15.4492 10.5651 15.6236C10.5498 15.7981 10.5815 15.9734 10.657 16.1315L13.194 21.4425C13.2737 21.6097 13.3991 21.751 13.5557 21.8499C13.7123 21.9488 13.8938 22.0014 14.079 22.0015H14.117C14.3087 21.9941 14.4941 21.9307 14.6502 21.8191C14.8062 21.7075 14.9261 21.5526 14.995 21.3735L21.933 3.33649C22.0011 3.15918 22.0164 2.96594 21.977 2.78013C21.9376 2.59432 21.8452 2.4239 21.711 2.28949L15.43 8.56949Z"
                                                        fill="currentColor" />
                                                    <path opacity="0.3"
                                                        d="M20.664 2.06648L2.62602 9.00148C2.44768 9.07085 2.29348 9.19082 2.1824 9.34663C2.07131 9.50244 2.00818 9.68731 2.00074 9.87853C1.99331 10.0697 2.04189 10.259 2.14054 10.4229C2.23919 10.5869 2.38359 10.7185 2.55601 10.8015L7.86601 13.3365C8.02383 13.4126 8.19925 13.4448 8.37382 13.4297C8.54839 13.4145 8.71565 13.3526 8.85801 13.2505L15.43 8.56548L21.711 2.28448C21.5762 2.15096 21.4055 2.05932 21.2198 2.02064C21.034 1.98196 20.8409 1.99788 20.664 2.06648Z"
                                                        fill="currentColor" />
                                                </svg>
                                            </span>
                                            <!--end::Svg Icon-->Submit
                                        </button>
                                        <!--end::Wrapper-->
                                    </form>
                                    <!--end::Form-->
                                </div>
                                <!--end::Card body-->
                            </div>
                            <!--end::Card-->
                        </div>
                        <!--end::Content-->
                        <!--begin::Sidebar-->
                        <div class="flex-lg-auto min-w-lg-300px">
                        </div>
                        <!--end::Sidebar-->
                    </div>
                    <!--end::Layout-->
                </div>
                <!--end::Content container-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Content wrapper-->
    </div>
    <!--end:::Main-->
    <script>
        function nama(id) {
            $.ajax({
                type: "get",
                url: `/getname/${id}`,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    $(`#nama_cust`).children().remove()
                    response.map((value) => {
                        $(`#cust_id`).val(value.customer_id)
                        $(`#nama_cust`).val(value.nama_customer)
                    });
                }
            });

            $.ajax({
                type: "get",
                url: `/gettotal/${id}`,
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    let hasil = 0;
                    response.map((value) => {
                        let total = value.subtotal
                        if (total != null && total != "") {
                            hasil += parseInt(total);
                        }
                        $(`#total_harga`).val(hasil)
                    });
                }
            });

            $.ajax({
                type: "get",
                url: `/getbfaktur/${id}`,
                dataType: "json",
                success: function (response) {
                    response.map((value) => {
                        $('#barang_faktur').text(value)
                    })
                }
            });
        }
    </script>
    <script>
        function total() {
            let ppn = $('#ppn').val()
            let pph = $('#pph').val()
            let total_harga = $('#total_harga').val()
            // let total_pp = $('#total_pp').val()

            let hitungPPN = parseFloat(total_harga * (parseInt(ppn) / 100))
            // let hasilPPN = total_harga - hitungPPN

            let hitungPPH = parseFloat(total_harga * (pph / 100))
            // let hasilPPH = 

            let total_final = parseInt(parseInt(total_harga) + hitungPPN + hitungPPH)
            $('#total_pp').text(total_final)
            $('#total_fix').val(total_final)

        }
    </script>

@endsection
