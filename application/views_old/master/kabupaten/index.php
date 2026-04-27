
    <div class="panel panel-info">
        <div class="panel-heading">Nama Kabupaten/Kota</div>
            <div class="panel-body">
                <div class="col-lg-6">
                    <table class="table" style="border:none;">
                        <tbody>
                            <tr>
                                <td>Kode Kabupaten/Kota : </td>
                                <td><?=(empty($kabupaten) ? "-" : $kabupaten->kd_kabupaten  ) ?></td>
                            </tr>
                            <tr>
                                <td>Nama Kabupaten/Kota : </td>
                                <td><?=(empty($kabupaten) ? "-" : $kabupaten->nama_kabupaten  ) ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>