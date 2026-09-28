<div class="card">
    <div class="card-body">
        <h5 class="card-title">Form Pertanyaan</h5>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="{{ route('question.store') }}" method="POST">
            	@csrf

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label for="pertanyaan" class="form-label">Pertanyaan</label>
                <textarea class="form-control" rows="4" name="pertanyaan"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Pertanyaan</button>
        </form>
    </div>
</div>
