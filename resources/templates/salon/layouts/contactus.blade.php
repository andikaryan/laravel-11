    <footer class="main-footer" id="contact">
        <div class="footer-top">
            <div class="pattern-layer" style="background-image: url(assets/images/shape/shape-6.png);"></div>
            <div class="auto-container">
                <div class="widget-section">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget contact-widget">
                                <div class="widget-title">
                                    <h5>Contact</h5>
                                </div>
                                <div class="widget-content">
                                    <ul class="info-list clearfix">
                                        <li>
                                            <i class="flaticon-phone-call"></i>
                                            <p><a href="tel:6668880000">{{$contact_us['phone']}}</a></p>
                                        </li>
                                        <li>
                                            <i class="flaticon-email-2"></i>
                                            <p><a href="mailto:needhelp@company.com">{{$contact_us['email']}}</a></p>
                                        </li>
                                        <li>
                                            <i class="flaticon-maps-and-flags"></i>
                                            <p>{{$contact_us['address']}}</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 footer-column">
                            <div class="footer-widget instagram-widget">
                                <div class="widget-title">
                                    <h5>Social Media</h5>
                                </div>
                                <div class="widget-content">
                                    <ul class="footer-social pull-left clearfix">
                                        <li><a href="{{$contact_us['wa_link']}}"><i class="fab fa-whatsapp"></i></a></li>
                                        <li><a href="{{$contact_us['ig_link']}}"><i class="fab fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12 footer-column">
                            <div class="footer-widget contact-widget">
                                <div class="widget-title">
                                    <h5>Maps</h5>
                                </div>
                                <div class="widget-content">
                                    <div class="row">
                                        <iframe class="col-lg-12 col-12 col-sm-12" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.140754227439!2d106.90254227418299!3d-6.245174961149587!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f359e53a3bfd%3A0x707f8bb6eaa90ad3!2sINDI%20Technology!5e0!3m2!1sid!2sid!4v1710821250225!5m2!1sid!2sid" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('salon.components.footer')
    </footer>
