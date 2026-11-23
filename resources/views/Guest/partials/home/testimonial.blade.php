<!-- Testimonial Start -->
    <div id="testimonial" class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Testimonial</h5>
                <h1 class="display-4">Patients Say About Our Services</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    @if ($dataTestimoni->isEmpty())
                        <p class="text-center text-muted">Belum ada testimoni.</p>
                    @else
                    <div class="owl-carousel testimonial-carousel">
                        {{-- Data dari Eloquent: Testimoni::with('layanan') --}}
                        @foreach ($dataTestimoni as $testimoni)
                        <div class="testimonial-item text-center">
                            <div class="position-relative mb-5">
                                <img class="img-fluid rounded-circle mx-auto" src="{{ asset('GuestAssets/img/testimonial-'
                                . (($loop->index % 3) + 1) . '.jpg') }}" alt="{{ $testimoni->nama_pengirim }}">
                                <div class="position-absolute top-100 start-50 translate-middle d-flex
                                align-items-center justify-content-center bg-white rounded-circle"
                                    style="width: 60px; height: 60px;">
                                    <i class="fa fa-quote-left fa-2x text-primary"></i>
                                </div>
                            </div>
                            <p class="fs-4 fw-normal">{{ $testimoni->isi }}</p>
                            <div class="mb-2 text-warning">
                                @for ($i = 1; $i <= 5; $i++)
                                    <i class="{{ $i <= $testimoni->rating ? 'fa' : 'far' }} fa-star"></i>
                                @endfor
                            </div>
                            <hr class="w-25 mx-auto">
                            <h3>{{ $testimoni->nama_pengirim }}</h3>
                        <h6 class="fw-normal text-primary mb-3">{{ $testimoni->layanan->nama_layanan ?? 'Layanan Klinik' }}</h6>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
