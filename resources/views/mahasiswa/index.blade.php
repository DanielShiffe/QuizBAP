<?php
    use App\Models\mahasiswa;
    use App\Models\vjlhmhskrs;
?>
@extends('layouts.app')

@section('content')

        <?php 
        $identitas = \DB::select('SELECT mahasiswa.nama, mahasiswa.StudentID, mahasiswa.jurusan, krs.kode_term 
                FROM krs krs
                LEFT JOIN mahasiswa mahasiswa ON mahasiswa.StudentID = krs.StudentID');
        ?>
        <br>
        <div style="">
        <p> Nama : <?php echo $identitas[0]->nama?></p>
        <p> Student ID : <?php echo $identitas[0]->StudentID?></p>
        <p> Jurusan : <?php echo $identitas[0]->jurusan?></p>
        <p> Term : <?php echo $identitas[0]->kode_term?></p>
        </div>

    <p>Matakuliah yang diambil</p>
    <style>
        table tr{
            padding: 10px;
        }

    </style>
    <table style="background-color: whitesmoke">
        <tr>
            <th>No</th>
            <th>Kode Matakuliah</th>
            <th>Nama Matakuliah</th>
            <th>KRS</th>
        </tr>
        <?php
        // $mahasiswas = mahasiswa::get();
        // foreach ($mahasiswas as $mahasiswa) {
        //     echo "<tr>";
        //     echo "<td>".$mahasiswa->studentId."</td>";
        //     echo "<td>".$mahasiswa->nama."</td>";
        //     echo "<td>".$mahasiswa->jurusan."</td>";
        //     echo "<td>".$mahasiswa->tahunMasuk."</td>";
        //     echo "</tr>";
        // }
        $rows = \DB::select('select no, kode_matakuliah, nama_matakuliah, sks from matakuliah');
 
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>".$row->no."</td>";
            echo "<td>".$row->kode_matakuliah."</td>";
            echo "<td>".$row->nama_matakuliah."</td>";
            echo "<td>".$row->sks."</td>";
            echo "</tr>";
        }
        ?>
    </table>
@endsection