<table style="width:95%">
    <thead>
        <tr id="judul">
            <th id="judul" width="3%">No.</td>
            <th id="judul" width="30%">Nama Petugas</td>
            <th id="judul" width="3%">Gol</td>
        </tr>
        <tr id="nomor">
            <th id="nomor">(1)</td>
            <th id="nomor">(2)</td>
            <th id="nomor">(3)</td>
            <th id="nomor">(4)</td>
            <th id="nomor">(5)</td>
        </tr>
    </thead>
    <tbody>

        <?php
        $jpetugas = count($upd_ang);
        $i = 0;

        while ($i < $jpetugas) {
            $no = $i + 1;
            $petugas = $upd_ang[$i]['nama'];
            $sebagaisk = $upd_ang[$i]['sebagai'];
            $ketsk = $upd_ang[$i]['ket'];
            $id_petugas = $upd_ang[$i]['id_petugas'];
            $huasilo = mysqli_query($con2, "SELECT * FROM tpetugas WHERE ID = '$id_petugas'");
            $rowo = mysqli_fetch_array($huasilo);
            $gol = $rowo['gol'];

            echo '<tr class="isi">
<td class="isi" align="center">' . $no . '.</td>
<td class="isi">' . $petugas . '</td>
<td class="isi" align="center">';
            if ($gol == '') {
                echo '-';
            }
            if ($gol != '') {
                echo $gol;
            }
            echo '</td>
<td class="isi" align="center">' . $sebagaisk . '</td>
<td class="isi" align="center">' . $ketsk . '</td>
</tr>';
            $i = $i + 1;
        }
        ?>

    </tbody>
</table>
<br>
<br>
<table id="bawah" style="width:95%">
    <tr id="bawah">
        <td id="bawah" width="40%">
        <td style="vertical-align:top">
        <td id="bawah" width="60%">KUASA PENGGUNA ANGGARAN BADAN PUSAT STATISTIK<br>&nbsp; <?php echo 'strtoupper($kab)'; ?>,
            <br><br><br><br><strong><?php echo '$kpa_nama'; ?></strong><br>NIP.&nbsp;<?php echo '$kpa_nip'; ?>
        <td style="vertical-align:top">
    </tr>
</table>