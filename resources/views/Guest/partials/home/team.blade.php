<!-- Team Start -->
    <div id="team" class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Our Doctors</h5>
                <h1 class="display-4">Qualified Healthcare Professionals</h1>
            </div>
            @if ($dataDokter->isEmpty())
                <p class="text-center text-muted">Data dokter belum tersedia.</p>
            @else
            <div class="owl-carousel team-carousel position-relative">
                {{-- Data dari Query Builder: dokter + jadwal praktik (join) --}}
                @foreach ($dataDokter as $dokter)
                <div class="team-item">
                    <div class="row g-0 bg-light rounded overflow-hidden">
                        <div class="col-12 col-sm-5 h-100">
                            <img class="img-fluid h-100" src="{{ asset('GuestAssets/img/team-' . (($loop->index % 3) + 1) . '.jpg') }}" alt="{{ $dokter->nama_dokter }}" style="object-fit: cover;">
                        </div>
                        <div class="col-12 col-sm-7 h-100 d-flex flex-column">
                            <div class="mt-auto p-4">
                                <h3>{{ $dokter->nama_dokter }}</h3>
                                <h6 class="fw-normal fst-italic text-primary mb-3">{{ $dokter->spesialisasi }}</h6>
                                <h6 class="mb-2"><i class="far fa-clock text-primary me-1"></i> Jadwal Praktik</h6>
                                @forelse ($jadwalDokter->get($dokter->dokter_id, collect()) as $jadwal)
                                    <p class="m-0">{{ $jadwal->hari }}: {{ substr($jadwal->jam_mulai, 0, 5) }} - {{ substr($jadwal->jam_selesai, 0, 5) }}</p>
                                @empty
                                    <p class="m-0 text-muted">Jadwal belum tersedia</p>
                                @endforelse
                            </div>
                            <div class="d-flex mt-auto border-top p-4">
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#!"><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle me-3" href="#!"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-lg btn-primary btn-lg-square rounded-circle" href="#!"><i
                                        class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
    <!-- Team End -->
