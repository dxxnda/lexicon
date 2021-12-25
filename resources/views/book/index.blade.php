{{-- @dd($buku) --}}
@extends('template.master')
@section('title', 'Book')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Book</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Book</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col md-auto">
                    <a href="{{ url('/book/create') }}" class="btn btn-info btn-sm" role="button">Tambah Buku</a>
                </div>

            </div>
            <div class="row mt-2">
                <div class="col">
                    @if (session('status'))
                        <div class="alert alert-primary">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Buku</h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Photo </th>
                                        <th>Kategori </th>
                                        <th>Judul</th>
                                        <th>Nomor</th>
                                        <th>Stok</th>
                                        <th>Sinopsis</th>
                                        <th>Pengarang</th>
                                        <th>Penerbit</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($buku as $item)
                                        <tr>            
                                            <td>{{ $loop->iteration }} </td>
                                            <td> <img src="{{asset('dist/img/'.$item->photo)}}" width="40" height="auto" alt=""> </td>
                                            <td>{{ $item->category->nama }} </td>
                                            <td>{{ $item->judul_buku }} </td>
                                            <td>{{ $item->nomor_buku }} </td>
                                            <td>{{ $item->stok_buku }} </td>
                                            <td>{{ $item->sinopsis }} </td>
                                            <td>{{ $item->pengarang }} </td>
                                            <td>{{ $item->penerbit }} </td>
                                            <td>
                                                <a href="{{ url('/book/' . $item->id . '/edit') }}"><i
                                                        class="far fa-edit" role="button"></i></a>
                                                <form action=" {{ url('/book/'.$item->id) }}" method='POST'
                                                    class='d-inline'>
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit">
                                                        <i class="far fa-trash-alt"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>


@endsection
