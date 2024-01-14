<div class="row mb-3">
    <label for="nama" class="col-md-4 col-form-label text-md-end">{{ __('Nama Produk') }}</label>

    <div class="col-md-6">
        <input id="nama" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="nama" autofocus>

        @error('nama')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="deskripsi" class="col-md-4 col-form-label text-md-end">{{ __('Deskripsi') }}</label>

    <div class="col-md-6">
        <textarea id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="3" name="deskripsi" required>{{ old('deskripsi') }}</textarea>

        @error('deskripsi')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="harga" class="col-md-4 col-form-label text-md-end">{{ __('Harga') }}</label>

    <div class="col-md-6">
        <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" required autocomplete="harga" min="0" step=".01">

        @error('harga')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <label for="stok" class="col-md-4 col-form-label text-md-end">{{ __('Stok') }}</label>

    <div class="col-md-6">
        <input id="stok" type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" required autocomplete="stok" min="0">

        @error('stok')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
