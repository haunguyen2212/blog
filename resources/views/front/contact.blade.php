@extends('front.master')

@section('title', 'Liên hệ')

@section('content')
    <section id="contact" class="contact mb-5">
        <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-12 text-center mb-5">
            <h1 class="page-title">Liên hệ</h1>
            </div>
        </div>

        <div class="row gy-4">

            <div class="col-md-4">
            <div class="info-item">
                <i class="bi bi-geo-alt"></i>
                <h3>Địa chỉ</h3>
                <address>Cần Thơ, Việt Nam</address>
            </div>
            </div><!-- End Info Item -->

            <div class="col-md-4">
            <div class="info-item info-item-borders">
                <i class="bi bi-phone"></i>
                <h3>Điện thoại</h3>
                <p><a href="tel:+841214956510">+841214956510</a></p>
            </div>
            </div><!-- End Info Item -->

            <div class="col-md-4">
            <div class="info-item">
                <i class="bi bi-envelope"></i>
                <h3>Email</h3>
                <p><a href="mailto:hautrung2212@gmail.com">hautrung2212@gmail.com</a></p>
            </div>
            </div><!-- End Info Item -->

        </div>

        <div class="form mt-5">
            <form id="frm-inquiry" action="" method="post" role="form" class="php-email-form">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="text" name="name" class="form-control" id="name" placeholder="Tên của bạn">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="email" class="form-control" name="email" id="email" placeholder="Địa chỉ email">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="subject" id="subject" placeholder="Tiêu đề">
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="message" rows="5" placeholder="Nội dung"></textarea>
                </div>
                <div class="my-3">
                    <div class="loading">Đang gửi</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="button" id="submit">Gửi yêu cầu</button></div>
            </form>
        </div><!-- End Contact Form -->

        </div>
    </section>
@endsection

@section('script')
    <script src="{{ asset('front/js/inquiry.js') }}"></script>
@endsection