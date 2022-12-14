<div>
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Tambah Data</h4>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.film.index') }}" class="btn btn-primary btn-sm">Kembali</a>
                    </div>
                </div>

                <form wire:submit.prevent="store">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>image <div wire:loading wire:target="image" wire:key="image"><i
                                            class="fa fa-spinner fa-spin mt-2 ml-2"></i> Uploading</div></label>
                                <input wire:model="image" type="file" class="form-control">
                            </div>
                            @if ($image)
                                <div class="form-group">
                                    <img src="{{ $image->temporaryUrl() }}" alt="" width="50"
                                        height="30">
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>URL Trailer</label>
                                <input wire:model="trailer" type="text" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Judul</label>
                                <input wire:model="judul" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="form-group">
                                <label>Tahun</label>
                                <input wire:model="tahun" type="number" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Description</label>
                                <input wire:model="description" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>
