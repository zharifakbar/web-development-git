@extends('layout.app')
@section('content')
    

<div>
    <a
        href="{{route('product.create')}}"
        class= "btn btn-success">
        Tambah Produk
    </a>
    
</div>

<br></br>
<table class="table" border="1">
    <thead>
        <tr>
            <th>Id</th>
            <th>JUdul</th>
            <th>Deskripsi</th>
            <th>Harga</th>
            <th>action</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $row)
        <tr>
            <td>{{$row->id}}</td>
            <td>{{$row->judul}}</td>
            <td>{{$row->deskripsi}}</td>
            <td>{{$row->harga}}</td>
        </tr>

        <td>
            <a class="btn btn-info"
            href="{{route('product.show',$row->id)}}">
            detail
            </a>
            <a class="btn btn-info"
            href="{{route('product.edit',$row->id)}}">
            edit
            </a>
            <form action="{{route('product.destroy', $row->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Hapus</button>
            </form>
        </td>

            
        @endforeach
@endsection