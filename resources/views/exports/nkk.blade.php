<table style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr>
            <th style="border: 1px solid black;">No</th>
            <th style="border: 1px solid black;">NKK</th>
            <th style="border: 1px solid black;">Nama Kepala Keluarga</th>
            <th style="border: 1px solid black;">Alamat KK</th>
            <th style="border: 1px solid black;">Jumlah Tanggungan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataKK as $kk)
            <tr>
                <td style="border: 1px solid black;">{{ $no++ }}</td>
                <td style="border: 1px solid black;">{{ $kk->no_kartu_keluarga }}</td>
                <td style="border: 1px solid black;">{{ $kk->nama_kepala_keluarga }}</td>
                <td style="border: 1px solid black;">{{ $kk->alamat_kk }}</td>
                <td style="border: 1px solid black;">{{ $kk->jumlah_tanggungan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
