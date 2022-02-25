@extends('layouts.app')

@section('content')
<main class="app-content">
    <div class="app-title">
      <div>
        <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
        <p>A free and open source Bootstrap 4 admin template</p>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
      </ul>
    </div>
    <div class="row">
        <div class="tile col-12 mb-4">
            <div class="page-header">
              <div class="row">
                <div class="col-lg-12">
                  <h2 class="mb-3 line-head" id="buttons">List Kecamatan
                    <a href="{{ route('kecamatan.create') }}" class="btn btn-md btn-success pull-right">Tambah Data</a>
                  </h2>

                </div>
              </div>
            </div>
            <div class="row">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No.</th>
                        <th>Nama kecamatan</th>
                        <th>Aksi</th>
                    </tr>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($kecamatan as $kc)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $kc->nama_wilayah }}</td>
                        <td>
                            <form action="{{ route('kecamatan.destroy', $kc->id) }}" method="POST">
                                <a class="btn btn-md btn-warning" href="{{ route('kecamatan.edit', $kc->id) }}">EDIT</a>
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-md btn-danger">HAPUS</button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center text-danger">Maaf Tidak Ada Data Yang Ditampilkan...</td>
                    </tr>
                    @endforelse
                </table>

            </div>
          </div>
    </div>
  </main>
@endsection
