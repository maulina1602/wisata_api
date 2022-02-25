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
                  <h2 class="mb-3 line-head" id="buttons">Edit Destinasi</h2>

                </div>
              </div>
            </div>
            <div class="row">
                <form action="{{ route('destinasi.update', $destinasi->id) }}" method="POST" class="col-12" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Destinasi</label>
                        <input class="form-control" value="{{ $destinasi->nama }}" id="exampleInputEmail1" type="text" placeholder="" name="nama">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Kategori</label>
                        <select name="kategori_id" class="form-control" type="text">
                            <option selected disabled {{ old("kategori_id") == $destinasi->kategori_id ? "selected":" "}} value="{{$destinasi->kategori_id}}">{{$destinasi->kategori->nama}} </option>
                            @foreach ($kategori as $kt)
                                <option value="{{ $kt->id }}">{{$kt->nama}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-sm-9">
                            <div class="form-group">
                            <label for="exampleInputEmail1">Wilayah</label>
                                <select name="wilayah_id" class="form-control" type="text">
                                    <option selected disabled {{ old("wilayah_id") == $destinasi->wilayah_id ? "selected":" "}} value="{{$destinasi->wilayah_id}}">{{$destinasi->wilayah->nama_wilayah}} </option>
                                    @foreach ($wilayah as $wl)
                                        <option value="{{ $wl->id }}">{{$wl->nama_wilayah}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Deskripsi</label>
                                <textarea rows="5" class="form-control" id="exampleInputEmail1" placeholder="" name="konten">{{ $destinasi->konten }}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Upload Foto</label>
                                <input class="form-control" value="{{ $destinasi->photo }}" id="photo" type="file" placeholder="" name="photo">
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <label class="" for="image">Preview</label>
                            <img width="245" height="202" id="image"
                                style="object-fit:cover;border: 1px solid rgb(206, 212, 218);border-radius: 7px;"
                                @if ($destinasi->photo)
                                src="{{$destinasi->getPhoto()}}" @endif alt="">
                        </div>
                    </div>
                    <div class="col-sm-3">

                    </div>
                      <div class="tile-footer text-right">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                        <a href="{{ route('destinasi.index') }}" class="btn btn-danger">Kembali</a>
                      </div>
                </form>
            </div>
          </div>
    </div>
  </main>
@endsection
