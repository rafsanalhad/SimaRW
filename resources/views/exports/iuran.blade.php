<table style="border-collapse: collapse; width: 100%;">
    <thead>
        <tr>
            <th style="border: 1px solid black;">Nama</th>
            <th style="border: 1px solid black;">Tanggal Bayar</th>
            <th style="border: 1px solid black;">Nominal</th>
            <th style="border: 1px solid black;">Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataIuran as $i)
            <tr>
                <td style="border: 1px solid black;">{{ $i->kartuKeluarga->nama_kepala_keluarga }}</td>
                <td style="border: 1px solid black;">12-05-2024 14:31</td>
                <td style="border: 1px solid black;">Rp. 30.000</td>
                <td style="border: 1px solid black;">
                    @if ($i->status == 'Lunas')
                        <span class="badge bg-success">Lunas</span>
                    @else
                        <span class="badge bg-warning">Belum Lunas</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
