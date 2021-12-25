@extends('template.master')
@section('title', 'Add book')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Book</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ url('/book') }}">Buku</a></li>
                            <li class="breadcrumb-item active">Tambah Buku</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Tambah <strong>Buku</strong></h3>
                            </div>

                            <form action="{{ url('book') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="photo">Photo</label>
                                        <input type="file" class="form-control-file" name="photo" id="photo">
                                    </div>
                                    <div class="form-group">
                                        <label for="kategori">Kategori Buku</label>
                                        <select name="kategori" class="form-control" @error('kategori') is-invalid
                                            @enderror id="kategori">
                                            @foreach ($category as $item)
                                                <option value="{{ $item->id }}"> {{ $item->nama }} </option>
                                            @endforeach
                                        </select>
                                        @error('kategori')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="judul">Judul Buku</label>
                                        <input type="text" name="judul"
                                            class="form-control @error('judul') is-invalid @enderror" id="judul"
                                            placeholder="Masukkan Buku Baru" value="{{ old('judul') }}">
                                        @error('judul')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="nomor">Nomor</label>
                                        <input type="number" name="nomor"
                                            class="form-control @error('nomor') is-invalid @enderror" id="nomor"
                                            placeholder="Masukkan Jumlah nomor" value="{{ old('nomor') }}">
                                        @error('nomor')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="stok">Stok Buku</label>
                                        <input type="number" name="stok"
                                            class="form-control @error('stok') is-invalid @enderror" id="stok"
                                            placeholder="Masukkan stok" value="{{ old('stok') }}">
                                        @error('stok')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="sinopsis">Sinopsis</label>
                                        <textarea type="text" name="sinopsis"
                                            class="form-control @error('sinopsis') is-invalid @enderror" id="sinopsis"
                                            placeholder="Masukkan Sinopsis Buku" value="">{{ old('sinopsis') }}</textarea>
                                        @error('sinopsis')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="pengarang">Pengarang</label>
                                        <input type="text" name="pengarang"
                                            class="form-control @error('pengarang') is-invalid @enderror" id="pengarang"
                                            placeholder="Masukkan Nama Pengarang" value="{{ old('pengarang') }}">
                                        @error('pengarang')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="penerbit">Penerbit</label>
                                        <input type="text" name="penerbit"
                                            class="form-control @error('penerbit') is-invalid @enderror" id="penerbit"
                                            placeholder="Masukkan Penerbit" value="{{ old('penerbit') }}">
                                        @error('penerbit')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
