<div class="modal fade" id="reqIjazahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('req_ijazah') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Request Ijazah</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input id="nim" type="hidden" class="form-control @error('nim') is-invalid @enderror" name="nim" required value="{{$detail_user[0]->nim}}">
                    </div>
                    <div class="form-group">
                        <input id="nama_pengambil" type="hidden" class="form-control" name="nama_pengambil" required value="{{Auth()->User()->name}}">
                    </div>
                    <div class="form-group">
                        <input id="upload_skl" type="text" class="form-control @error('upload_skl') is-invalid @enderror" name="upload_skl" value="{{ old('upload_skl') }}" required autocomplete="upload_skl" placeholder="Masukkan Url Skl Anda">
                    </div>
                    <div class="form-group">
                        <input id="upload_pembayaran" type="text" class="form-control @error('upload_pembayaran') is-invalid @enderror" name="upload_pembayaran" required autocomplete="upload_pembayaran" placeholder="Masukkan Url Bukti Pembayaran">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Request') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="reqIjazahWakilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('req_ijazah') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Request Ijazah</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input id="nim" type="hidden" class="form-control @error('nim') is-invalid @enderror" name="nim" required value="{{$detail_user[0]->nim}}">
                    </div>
                    <div class="form-group">
                        <input id="nim_perwakilan" type="text" class="form-control @error('nim_perwakilan') is-invalid @enderror" name="nim_perwakilan" value="{{ old('nim_perwakilan') }}" required autocomplete="nim_perwakilan" placeholder="Masukkan NIM Yang Ingin Anda Wakilkan">
                    </div>
                    <div class="form-group">
                        <input id="upload_surat_kuasa" type="text" class="form-control @error('upload_surat_kuasa') is-invalid @enderror" name="upload_surat_kuasa" value="{{ old('upload_surat_kuasa') }}" required autocomplete="upload_surat_kuasa" placeholder="Masukkan Url Surat Kuasa Anda">
                    </div>
                    <div class="form-group">
                        <input id="upload_ktp" type="text" class="form-control @error('upload_ktp') is-invalid @enderror" name="upload_ktp" value="{{ old('upload_ktp') }}" required autocomplete="upload_ktp" placeholder="Masukkan Url KTP Anda">
                    </div>
                    <div class="form-group">
                        <input id="upload_pembayaran" type="text" class="form-control @error('upload_pembayaran') is-invalid @enderror" name="upload_pembayaran" required autocomplete="upload_pembayaran" placeholder="Masukkan Url Bukti Pembayaran">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Request') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="reqAmbilIjazahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('take_ijazah') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Pengambilan Ijazah</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input id="id_ambil" type="hidden" class="form-control" name="id" required>
                    </div>
                    <div class="form-group">
                        <input id="upload_foto_pengambilan" type="text" class="form-control @error('upload_foto_pengambilan') is-invalid @enderror" name="upload_foto_pengambilan" value="{{ old('upload_foto_pengambilan') }}" required autocomplete="upload_foto_pengambilan" placeholder="Masukkan Url foto pengambilan">
                    </div>
                    <div class="form-group">
                        <input id="alasan" type="hidden" class="form-control @error('alasan') is-invalid @enderror" name="alasan" required autocomplete="alasan" value="Ijazah Sudah Di Cek">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Ambil') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal" id="reqAmbilIjazahWakilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('take_ijazah') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Pengambilan Ijazah Perwakilan</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input id="id_wakil" type="hidden" class="form-control" name="id" required>
                        <input id="nama_pengambil" type="hidden" class="form-control" name="nama_pengambil" required value="{{Auth()->User()->name}}">
                    </div>
                    <div class="form-group">
                        <input id="upload_foto_pengambilan" type="text" class="form-control @error('upload_foto_pengambilan') is-invalid @enderror" name="upload_foto_pengambilan" value="{{ old('upload_foto_pengambilan') }}" required autocomplete="upload_foto_pengambilan" placeholder="Masukkan Url foto pengambilan">
                    </div>
                    <div class="form-group">
                        <input id="surat_kuasa_pengambilan" type="text" class="form-control @error('surat_kuasa_pengambilan') is-invalid @enderror" name="surat_kuasa_pengambilan" value="{{ old('surat_kuasa_pengambilan') }}" required autocomplete="surat_kuasa_pengambilan" placeholder="Masukkan Url surat kuasa pengambilan">
                    </div>
                    <div class="form-group">
                        <input id="alasan" type="hidden" class="form-control @error('alasan') is-invalid @enderror" name="alasan" required autocomplete="alasan" value="Ijazah Sudah Di Cek">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Ambil') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>