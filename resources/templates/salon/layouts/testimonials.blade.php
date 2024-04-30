    <section class="testimonial-section centred" id="testimonies">
        <div class="pattern-layer"></div>
        <div class="auto-container">
            <div class="sec-title light">
                <h2>Testimonies</h2>
            </div>
            <div class="three-item-carousel owl-carousel owl-theme owl-nav-none owl-dots-style-one">
                @foreach ($testimonies as $testimony)
                <div class="testimonies-card p-4 py-5">
                    <div class="details mb-4">
                        <p class="m-0 text-white"><i class="fa fa-quote-left me-2 fs-1" style="font-size: 30px;"></i>{{$testimony->content}}</p>
                    </div>
                    <div class="author-info mt-2">
                        <div class="author-title ms-3">
                            <h4 class="m-0 theme text-white" style="font-weight: 600;">{{$testimony->name}}</h4>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
