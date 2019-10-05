@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Daftar Artikel</div>

                <div class="card-body">
                <a href="{!! route('artikel.create') !!}" class="btn btn-primary">TAMBAHKAN DATA</a>
                <table border="1">
            <tr>
                <td>ID</td>
                <td>Judul</td>
                <td>Isi</td>
                <td>Kategori Id</td>
                <td>User</td>
                <td>Create</td>
                <td>Aksi</td>
            </tr>

        @foreach($listArtikel as $item)
            
            <tr>
                <td>{!! $item->id !!}</td>
                <td>{!! $item->judul !!}</td>
                <td>{!! $item->isi !!}</td>
                <td>{!! $item->kategori_artikel_id !!},</td>
                <td>{!! $item->users_id !!}</td>
                <td>{!! $item->created_at->format('d/m/Y H:i:s') !!}</td>
                <td>
                    <a href="{!! route('artikel.show',[$item->id]) !!}" class="btn btn-primary">Lihat BREE</a>
                </td>
            </tr>

        @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection