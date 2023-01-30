<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic | Bootstrap HTML, VueJS, React, Angular, Asp.Net Core, Blazor, Django, Flask & Laravel Admin Dashboard Theme
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
	<!--begin::Head-->
	<head>
		<title>Login AMS</title>
		<meta charset="utf-8" />
		<link rel="shortcut icon" href="{{ asset('met/dist/assets/media/logos/favicon.ico') }}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{ asset('met/dist/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
		<link href="{{ asset('met/dist/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
		<!--begin::Theme mode setup on page load-->
		<script>var defaultThemeMode = "light"; var themeMode; if ( document.documentElement ) { if ( document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if ( localStorage.getItem("data-theme") !== null ) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); }</script>
		<!--end::Theme mode setup on page load-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root" id="kt_app_root">
			<!--begin::Page bg image-->
			<style>body { background-image: url('{{ asset('met/dist/assets/media/auth/bg10.jpeg') }}'); } [data-theme="dark"] body { background-image: url('{{ asset('met/dist/assets/media/auth/bg10-dark.jpeg') }}'); }</style>
			<!--end::Page bg image-->
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				<div class="d-flex flex-lg-row-fluid">
					<!--begin::Content-->
					<div class="d-flex flex-column flex-center pb-0 pb-lg-10 p-10 w-100">
						<!--begin::Image-->
						<img class="theme-light-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{ asset('met/dist/assets/media/auth/agency.png') }}" alt="" />
						<img class="theme-dark-show mx-auto mw-100 w-150px w-lg-300px mb-10 mb-lg-20" src="{{ asset('met/dist/assets/media/auth/agency-dark.png') }}" alt="" />
						<!--end::Image-->
						<!--begin::Title-->
						<h1 class="text-gray-800 fs-2qx fw-bold text-center mb-7">Cepat, Efisien dan Produktif</h1>
						<!--end::Title-->
						<!--begin::Text-->
						<div class="text-gray-600 fs-base text-center fw-semibold">Sistem Pencatatan Modern yang membantu 
							perusahaan dan mampu meminimalisir banyaknya data yang digunakan sehari-hari
						</div>
						<!--end::Text-->
					</div>
					<!--end::Content-->
				</div>
				<!--begin::Aside-->
				<!--begin::Body-->
				<div class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12">
					<!--begin::Wrapper-->
					<div class="bg-body d-flex flex-center rounded-4 w-md-600px p-10">
						<!--begin::Content-->
						<div class="w-md-400px">
							<!--begin::Form-->
							<form class="form w-100" novalidate="novalidate" id="kt_sign_in_form" action="{{ route('login') }}" method="POST">
                                @csrf
								<!--begin::Heading-->
								<div class="text-center mb-11">
									<!--begin::Title-->
									<h1 class="text-dark fw-bolder mb-3">Login ke AMS</h1>
									<!--end::Title-->
									<!--begin::Subtitle-->
									<div class="text-gray-500 fw-semibold fs-6">Administrasi AMS</div>
									<!--end::Subtitle=-->
								</div>
								<!--begin::Heading-->
								<!--begin::Input group=-->
								<div class="fv-row mb-8">
									<!--begin::username-->
									<input type="text" placeholder="Masukkan Username..." name="username" value="{{ old('email') }}" class="form-control bg-transparent @error('username') is-invalid @enderror" required autocomplete="username" autofocus />
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
									<!--end::username-->
								</div>
								<!--end::Input group=-->
								<div class="fv-row mb-3">
									<!--begin::Password-->
									<input type="password" placeholder="Masukkan Password...." name="password" required autocomplete="current-password" class="form-control bg-transparent @error('password') is-invalid @enderror" />
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                               		@enderror
									<!--end::Password-->
								</div>
								<!--end::Input group=-->
								<!--begin::Wrapper-->
								
								<!--end::Wrapper-->
								<!--begin::Submit button-->
								<div class="d-grid mb-10">
									<button type="submit" class="btn btn-primary">
										<!--begin::Indicator label-->
										<span class="indicator-label">Login</span>
										<!--end::Indicator label-->
										<!--begin::Indicator progress-->
										<span class="indicator-progress">Tunggu sebentar
										<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
										<!--end::Indicator progress-->
									</button>
								</div>
								<!--end::Submit button-->
								<!--begin::Sign up-->
								<!--end::Sign up-->
                            </form>
                            <!--end::Form-->
						</div>
						<!--end::Content-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--begin::Javascript-->
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{ asset('met/dist/assets/plugins/global/plugins.bundle.js') }}"></script>
		<script src="{{ asset('met/dist/assets/js/scripts.bundle.js') }}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Custom Javascript(used by this page)-->
		<script src="{{ asset('met/src/js/custom/authentication/sign-in/general.js') }}"></script>
		<!--end::Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>