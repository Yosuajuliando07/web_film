<div>
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
            <div class="pd-20 card-box mb-30">
                <div class="clearfix mb-20">
                    <div class="pull-left">
                        <h4 class="text-blue h4">Data Film</h4>
                    </div>
                    <div class="pull-right">
                        <a href="{{ route('admin.film.create') }}" class="btn btn-primary btn-sm"><i
                                class="fa fa-plus"></i> Tambah
                            Data</a>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Judul</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Tahun</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataFilm as $data)
                            <tr>
                                <th scope="row">{{ $data['id'] }}</th>
                                <td><img src="{{ 'storage/images/' . $data['image'] }}" alt="" width="50"
                                        height="30"></td>
                                <td>{{ $data['judul'] }}</td>
                                <td>{{ $data['deskripsi'] }}</td>
                                <td>{{ $data['tahun'] }}</td>
                                <td>
                                    <div class="table-actions">
                                        <a href="#" data-color="#265ed7" style="color: rgb(38, 94, 215);"><i
                                                class="icon-copy dw dw-edit2"></i></a>
                                        <a href="#" data-color="#e95959" style="color: rgb(233, 89, 89);"><i
                                                class="icon-copy dw dw-delete-3"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
