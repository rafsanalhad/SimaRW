<table style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr>
            <th style="border: 1px solid black;">No</th>
            <th style="border: 1px solid black;">Nama Kepala Keluarga</th>
            <th style="border: 1px solid black;">NKK</th>
            <th style="border: 1px solid black;">Total Pendapatan Keluarga</th>
            <th style="border: 1px solid black;">Jumlah Anggota Keluarga</th>
            <th style="border: 1px solid black;">Kondisi Rumah</th>
            <th style="border: 1px solid black;">Jumlah Tanggungan</th>
            <th style="border: 1px solid black;">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($bansosVikor as $bansos)
            <tr>
                <td style="border: 1px solid black;">{{ $noVikor++ }}</td>
                <td style="border: 1px solid black;">{{ $bansos->kartuKeluarga->nama_kepala_keluarga }}</td>
                <td style="border: 1px solid black;">{{ $bansos->kartuKeluarga->no_kartu_keluarga }}</td>
                <td style="border: 1px solid black;">Rp. {{ $bansos->total_gaji }}</td>
                <td style="border: 1px solid black;">{{ $bansos->user_count }} Orang</td>
                <td style="border: 1px solid black;">{{ $bansos->kartuKeluarga->kondisi_rumah }}</td>
                <td style="border: 1px solid black;">{{ $bansos->kartuKeluarga->jumlah_tanggungan }}</td>
                <td style="border: 1px solid black;">
                    @if ($bansos->status == 'Layak')
                        Layak Menerima Bansos
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
