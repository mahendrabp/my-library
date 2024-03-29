@section('js')
<script type="text/javascript">
    $(document).on('click', '.pilih', function () {
        document.getElementById("buku_judul").value = $(this).attr('data-buku_judul');
        document.getElementById("buku_id").value = $(this).attr('data-buku_id');
        $('#myModal').modal('hide');
    });

    $(document).on('click', '.pilih_anggota', function (e) {
        document.getElementById("anggota_id").value = $(this).attr('data-anggota_id');
        document.getElementById("anggota_nama").value = $(this).attr('data-anggota_nama');
        $('#myModal2').modal('hide');
    });
    
        
</script>

@stop

@extends('layouts.global')
@section('title')

@endsection
@section('content')

@if(session('status'))
<div class="alert alert-success">
    {{session('status')}}
</div>
@endif

<form action="{{route('transactions.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title"> Tambah Transaksi</h4>
                            <div class="form-group{{ $errors->has('kode_transaksi') ? ' has-error' : '' }}">
                                <label for="kode_transaksi" class="col-md-4 control-label">Kode Transaksi</label>
                                <div class="col-md-6">
                                    <input id="kode_transaksi" type="text" class="form-control" name="kode_transaksi"
                                        value="{{$kode}}" required readonly="">
                                    @if ($errors->has('kode_transaksi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_transaksi') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group{{ $errors->has('tgl_pinjam') ? ' has-error' : '' }}">
                                <label for="tgl_pinjam" class="col-md-4 control-label">Tanggal Pinjam</label>
                                <div class="col-md-3">
                                    <input id="tgl_pinjam" type="date" class="form-control" name="tgl_pinjam"
                                        value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}"
                                        required @if(Auth::user()->level == 'user') readonly @endif>
                                    @if ($errors->has('tgl_pinjam'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_pinjam') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('tgl_kembali') ? ' has-error' : '' }}">
                                <label for="tgl_kembali" class="col-md-4 control-label">Tanggal Kembali</label>
                                <div class="col-md-3">
                                    <input id="tgl_kembali" type="date" class="form-control" name="tgl_kembali"
                                        value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->addDays(7)->toDateString())) }}"
                                        required="" @if(Auth::user()->level == 'user') readonly @endif>
                                    @if ($errors->has('tgl_kembali'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_kembali') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('buku_id') ? ' has-error' : '' }}">
                                <label for="buku_id" class="col-md-4 control-label">Buku</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="buku_judul" type="text" class="form-control" readonly="" required>
                                        <input id="buku_id" type="hidden" name="buku_id" value="{{ old('buku_id') }}"
                                            required readonly="">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-secondary" data-toggle="modal"
                                                data-target="#myModal"><b>Cari Buku</b> <span
                                                    class="fa fa-search"></span></button>
                                        </span>
                                    </div>
                                    @if ($errors->has('buku_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('buku_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            @if(Auth::user()->level == 'admin')
                            <div class="form-group{{ $errors->has('anggota_id') ? ' has-error' : '' }}">
                                <label for="buku_id" class="col-md-4 control-label">Anggota</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="anggota_nama" type="text" class="form-control" readonly="" required>
                                        <input id="anggota_id" type="hidden" name="anggota_id"
                                            value="{{ old('anggota_id') }}" required readonly="">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-warning" data-toggle="modal"
                                                data-target="#myModal2"><b>Cari Anggota</b> <span
                                                    class="fa fa-search"></span></button>
                                        </span>
                                    </div>
                                    @if ($errors->has('anggota_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('annggota_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @else
                            <div class="form-group{{ $errors->has('anggota_id') ? ' has-error' : '' }}">
                                <label for="buku_id" class="col-md-4 control-label">Anggota</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input value="{{Auth::user()->member->nama}}" id="anggota_nama" type="text"
                                            class="form-control" readonly="" required>
                                        <input value="{{Auth::user()->member->id}}" id="anggota_id" type="hidden"
                                            name="anggota_id" value="{{ old('anggota_id') }}" required readonly="">

                                    </div>
                                    @if ($errors->has('anggota_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('annggota_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @endif

                            <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                                <label for="ket" class="col-md-4 control-label">Keterangan</label>
                                <div class="col-md-6">
                                    <input id="ket" type="text" class="form-control" name="ket"
                                        value="{{ old('ket') }}">
                                    @if ($errors->has('ket'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ket') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" id="submit">
                                Submit
                            </button>
                            <button type="reset" class="btn btn-danger">
                                Reset
                            </button>

                            <a href="{{route('transactions.index')}}" class="btn btn-light pull-right">Back</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>ISBN</th>
                            <th>Pengarang</th>
                            <th>Tahun</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($books as $book)
                        <tr class="pilih" data-buku_id="<?php echo $book->id; ?>"
                            data-buku_judul="<?php echo $book->judul; ?>">

                            <td>@if($book->cover)
                                <img src="{{url('storage/'. $book->cover)}}" alt="image" style="margin-right: 10px;" />
                                @else
                                <img src="{{url('images/buku/default.png')}}" alt="image" style="margin-right: 10px;" />
                                @endif
                                {{$book->judul}}</td>
                            <td>{{$book->isbn}}</td>
                            <td>{{$book->pengarang}}</td>
                            <td>{{$book->tahun_terbit}}</td>
                            <td>{{$book->jumlah_buku}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="myModal2" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Anggota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>
                                Nama
                            </th>
                            <th>
                                NPM
                            </th>
                            <th>
                                Prodi
                            </th>
                            <th>
                                Jenis Kelamin
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $member)
                        <tr class="pilih_anggota" data-anggota_id="<?php echo $member->id; ?>"
                            data-anggota_nama="<?php echo $member->nama; ?>">
                            <td class="py-1">
                                @if($member->user->gambar)
                                <img src="{{url('storage/', $member->user->gambar)}}" alt="image"
                                    style="margin-right: 10px;" />
                                @else
                                <img src="{{url('images/user/default.png')}}" alt="image" style="margin-right: 10px;" />
                                @endif

                                {{$member->nama}}
                            </td>
                            <td>
                                {{$member->npm}}
                            </td>

                            <td>
                                @if($member->prodi == 'TI')
                                Teknik Informatika
                                @elseif($member->prodi == 'SI')
                                Sistem Informasi
                                @else
                                Kesehatan Masyarakat
                                @endif
                            </td>
                            <td>
                                {{$member->jk === "L" ? "Laki - Laki" : "Perempuan"}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection