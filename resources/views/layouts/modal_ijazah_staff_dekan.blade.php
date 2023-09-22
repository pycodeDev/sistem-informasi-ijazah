<div class="modal " id="accIjazahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('update_ijazah') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Acc Ijazah</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input id="id" type="hidden" class="form-control " name="id" required>
                        <input id="status" type="hidden" class="form-control " name="status" required>
                        <input id="name_approve" type="hidden" class="form-control " name="name_approve" value="{{Auth()->User()->name}}" required>
                    </div>
                    <div class="form-group">
                        <input id="alasan" type="text" class="form-control @error('alasan') is-invalid @enderror" name="alasan" required autocomplete="alasan" placeholder="Masukkan Alasan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" onclick="hideModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Approve') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal " id="rejIjazahModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('update_ijazah') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Acc Ijazah</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input id="id_rej" type="hidden" class="form-control " name="id"  required>
                        <input id="status_rej" type="hidden" class="form-control " name="status" required>
                        <input id="name_approve" type="hidden" class="form-control " name="name_approve" value="{{Auth()->User()->name}}" required>
                    </div>
                    <div class="form-group">
                        <input id="alasan" type="text" class="form-control @error('alasan') is-invalid @enderror" name="alasan" required autocomplete="alasan" placeholder="Masukkan Alasan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" onclick="hideModalRej()">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        {{ __('Reject') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>