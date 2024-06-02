<table style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr>
            <th style="border: 1px solid black;">No</th>
            <th style="border: 1px solid black;">NIK</th>
            <th style="border: 1px solid black;">Nama Warga</th>
            <th style="border: 1px solid black;">TTL</th>
            <th style="border: 1px solid black;">Jen. Kelamin</th>
            <th style="border: 1px solid black;">Agama</th>
            <th style="border: 1px solid black;">Alamat</th>
            <th style="border: 1px solid black;">Status Kawin</th>
            <th style="border: 1px solid black;">Pekerjaan</th>
            <th style="border: 1px solid black;">Pendapatan Warga</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataWarga as $warga)
            <tr>
                <td style="border: 1px solid black;">{{ $no++ }}</td>
                <td style="border: 1px solid black;">{{ $warga->nik_user }}</td>
                <td style="border: 1px solid black;">{{ $warga->nama_user }}</td>
                <td style="border: 1px solid black;">{{ $warga->tempat }} - {{ $warga->tanggal_lahir }}</td>
                <td style="border: 1px solid black;">{{ $warga->gender }}</td>
                <td style="border: 1px solid black;">{{ $warga->agama }}</td>
                <td style="border: 1px solid black;">{{ $warga->alamat_user }}</td>
                <td style="border: 1px solid black;">{{ $warga->status_kawin }}</td>
                <td style="border: 1px solid black;">{{ $warga->pekerjaan_user }}</td>
                <td style="border: 1px solid black;">{{ $warga->gaji_user }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
