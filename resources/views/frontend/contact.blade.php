@extends('layouts.frontend.default')

@section('pageTitle', trans('common.contact'))
@section($current, 'active')

@section('content')

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container-fluid">

            <div class="d-flex justify-content-between align-items-center">
                <h2 class="text-stroke all-cap">@yield('pageTitle')</h2>
                <ol>
                <li><a href="/">{{ trans('common.home') }}</a></li>
                <li>@yield('pageTitle')</li>
                </ol>
            </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

            <div class="row mt-5">

                <div class="col-lg-4">
                <div class="info">
                    <div class="address">
                    <i class="bi bi-geo-alt"></i>
                    <h4>Địa chỉ:</h4>
                    <p>5 Tuy Lý Vương, Phường Vỹ Dạ, Tp. Huế</p>
                    </div>

                    <div class="email">
                    <i class="bi bi-envelope"></i>
                    <h4>Email:</h4>
                    <p>info@nguyenkhoa.info</p>
                    </div>

                    <div class="phone">
                    <i class="bi bi-phone"></i>
                    <h4>Điện thoại:</h4>
                    <p>+84 789 45 25 45</p>
                    </div>

                </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0">
                <x-message />
                <form action="{{ route('lien-he.gui') }}" method="post" role="form" class="php-email-form">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="Họ và tên" required>
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Địa chỉ email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="Chủ đề" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="content" rows="5" placeholder="Nội dung tin nhắn" required></textarea>
                    </div>
            <script src="https://www.google.com/recaptcha/api.js" async defer></script>
                    <div class="g-recaptcha" id="feedback-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
            <br />
                    <div class="text-center">
                        <button type="submit">Gửi tin nhắn</button>
                    </div>
                </form>

                </div>
            </div>

            </div>
        </section>
        <!-- End Contact Section -->
@endsection

@section('script')

    

@endsection