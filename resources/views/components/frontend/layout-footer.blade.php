<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-info">
                        <h3>NGUYỄN KHOA</h3>
                        <p>
                            5 Tuy Lý Vương <br>
                            Phường Vỹ Dạ, Tp. Huế<br><br>
                            <strong>Phone:</strong> +84 789 45 25 45<br>
                            <strong>Email:</strong> info@nguyenkhoa.info<br>
                        </p>
                    </div>
                </div>
        
                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Liên kết chính</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="/trang/gioi-thieu">{{ trans('common.intro') }}</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/nguoi/1">{{ trans('ngkhoa.giapha')}}</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/nguon-goc">{{ trans('ngkhoa.source')}}</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/danh-nhan">{{ trans('ngkhoa.celeb')}}</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/thong-tin">{{ trans('common.info')}}</a></li>
                    </ul>
                </div>
        
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Liên kết khác</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="/hinh-anh">{{ trans('common.gallery')}}</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/lien-he">{{ trans('common.contact')}}</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/dieu-khoan">Điều khoản dịch vụ</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="/chinh-sach">Chính sách riêng tư</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <h4>Đăng ký nhận thông tin</h4>
                    <p>Hãy đăng ký để có được những thông tin mới nhất về Tộc Nguyễn Khoa</p>
                    <form action="{{ route('subscribers.store') }}" method="post">
                        @csrf
                        <input type="email" name="email" placeholder="Địa chỉ email">
                        <input type="submit" value="Đăng ký">
                    </form>
                    @if (session('subscribed'))
                        <div class="alert alert-success">
                            {{ session('subscribed') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
        
    <div class="container">
        <div class="copyright">
            <i class="fa-regular fa-copyright fa-flip"></i> Copyright <strong><span>Dòng họ Nguyễn Khoa</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Thiết kế bởi <a href="https://bootstrapmade.com/" target="_blank">BootstrapMade</a> | Tài trợ bởi <a href="https://asahi.com.vn" target="_blank">Asahi Invetment & Technology JSC.</a><br />
            Thiết kế hệ thống bởi <a href="https://www.facebook.com/ngthman" target="_blank">Nguyễn Thành Mãn</a> | Lập trình bởi <a href="https://www.facebook.com/nguyenkhoahoangvu/" target="_blank">Nguyễn Khoa Hoàng Vũ</a>
        </div>
    </div>
</footer>
<!-- End Footer -->
    