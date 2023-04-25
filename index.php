<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.min.css">
    <title>Hello, world!</title>
</head>

<body>
    <br />

    <?php
    $mysqli = new mysqli("db", "user", "test", "kingaziz_budget");

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }
    ?>

    <?php
    /*
    $sql = 'SELECT * FROM cashflow';

    $result = $mysqli->query("SELECT * FROM cashflow");
    if ($result) {
        echo "Returned rows are: " . $result->num_rows;
        // Free result set
    }


    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        foreach ($row as $key => $value) {
            echo $value;
        }
    }

    $result->free_result();
    */
    ?>

    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#home" role="tab" data-toggle="tab">home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#projects" role="tab" data-toggle="tab">Projects</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#perintah-kerja" role="tab" data-toggle="tab">Perintah Kerja</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#references" role="tab" data-toggle="tab">Pekerjaan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#item-pekerjaan" role="tab" data-toggle="tab">Item Pekerjaan</a>
        </li>
        <!-- 
        <li class="nav-item">
            <a class="nav-link" href="#budgeting-pemasukkan" role="tab" data-toggle="tab">RAB</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#budgeting-expense" role="tab" data-toggle="tab">RAP</a>
        </li>
    -->
        <li class="nav-item">
            <a class="nav-link" href="#cashflow" role="tab" data-toggle="tab">Cashflow</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade show active" id="home">
            <img src="dashboard.png" width="95%" />
        </div>
        <div role="tabpanel" class="tab-pane fade" id="projects">
            <h2>Projects</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Project</th>
                        <th scope="col">Waktu Mulai</th>
                        <th scope="col">Perkiraan Waktu Selesai</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mxall Ciputra</td>
                        <td>2023-10-10</td>
                        <td>2024-02-02</td>
                        <td>edit | delete</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Biz Park</td>
                        <td>2023-09-09</td>
                        <td>2023-10-10</td>
                        <td>edit | delete</td>
                    </tr>
                    <tr>
                        <td colspan="4" align="right"></td>
                        <td><a href="#"><b>+tambah</b></a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="perintah-kerja">
            <h2>Perintah Kerja</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nomor SPK</th>
                        <!-- <th scope="col">Nomor RAB</th> -->
                        <!-- <th scope="col">Kontraktor</th> -->
                        <th scope="col">Jenis Pekerjaan</th>
                        <th scope="col">Nilai Kontrak</th>
                        <th scope="col">Realisasi RAB</th>
                        <th scope="col"></th>
                        <th scope="col">RAP</th>
                        <th scope="col">Realisasi RAP</th>
                        <th scope="col"></th>
                        <!-- <th scope="col">Jenis Kontrak</th> -->
                        <!-- <th scope="col">Lokasi Pekerjaan</th> -->
                        <!-- <th scope="col">Waktu Mulai</th> -->
                        <!-- <th scope="col">Perkiraan Waktu Selesai</th> -->
                        <th scope="col">Project</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>0020/SPK-TL/CD/X/2021/CIC/MKES</td>
                        <!-- <td>0020/RAB-TL/CD/X/2021/CIC/MKES</td> -->
                        <!-- <td>PT. Sinar Bahana Mulya</td> -->
                        <td>Perbaikan Asphalt Area Mal Ciputra</td>
                        <td><a href="#" data-toggle="modal" data-target="#ModalSlide-NilaiKontrak">Rp780,000,000 </a>
                        </td>
                        <td><a href="#" data-toggle="modal" data-target="#ModalSlide-RealisasiRAB">Rp600,000,000 </a>
                        </td>
                        <!--<td>Fixed Or Lumpsum</td>
                        <td>Tangerang</td>
                        <td>2023-10-10</td>
                        <td>2024-02-02</td> -->
                        <td><b style="color:orange">60%</b></td>
                        <td><a href="#" data-toggle="modal" data-target="#ModalSlide-RAP">Rp600,000,000</a></td>
                        <td><a href="#" data-toggle="modal" data-target="#ModalSlide-RealisasiRAP">Rp500,000,000</a>
                        </td>
                        <td>45%</td>
                        <td>Mall Ciputra</td>

                        <td>edit | delete</td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>0020/SPK-TL/CD/X/2021/CIC/MKES</td>
                        <!-- <td>0020/RAB-TL/CD/X/2021/CIC/MKES</td>
                        <td>PT. Sinar Bahana Mulya</td> -->
                        <td>Perbaikan Asphalt Area Mal Ciputra</td>
                        <td>Rp780,000,000</td>
                        <td>Rp600,000,000</td>
                        <!-- <td>Fixed Or Lumpsum</td>
                        <td>Tangerang</td>
                        <td>2023-10-10</td>
                        <td>2024-02-02</td> -->
                        <td>77%</td>
                        <td>Rp620,000,000</td>
                        <td>Rp500,000,000</td>
                        <td><b style="color: red">39%</b></td>
                        <td>Biz Park</td>

                        <td>edit | delete</td>
                    </tr>
                    <tr>
                        <td colspan="10" align="right"></td>
                        <td><a href="#"><b>+tambah</b></a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="budgeting-expense">
            <h2>Analisa Pekerjaan</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nomor SPK</th>
                        <th scope="col">Jenis Pekerjaan</th>
                        <th scope="col">Nilai Analisa</th>
                        <th scope="col">Project</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>0020/SPK-TL/CD/X/2021/CIC/MKES</td>
                        <td>Perbaikan Asphalt Area Mal Ciputra</td>
                        <td><a href="#" data-toggle="modal" data-target="#ModalSlide-NilaiKontrak">Rp780,000,000 </a>
                        </td>
                        <td>Mall Ciputra</td>

                        <td>edit | delete</td>
                    </tr>
                    <tr>
                        <td colspan="5" align="right"></td>
                        <td><a href="#"><b>+tambah</b></a></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="cashflow">
            <h2 style="float: left">Cashflow</h2>
            <button type="button" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#ModalSlide-FormCashFlow">tambah cashflow</button>

            <table class="table table-fixed">
                <thead>
                    <tr>
                        <th class="headcol" scope="col">Uraian</th>

                        <?php
                    
                        $sql = "select * from week_2023 order by week_code asc LIMIT 1";
                        $result = $mysqli->query($sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $countweekFrom = $row["week_code"];

                        $sql = "select * from week_2023 order by week_code desc LIMIT 1";
                        $result = $mysqli->query($sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $countweekTo = $row["week_code"];

                        $sumGroup = "";

                        for ($i = $countweekFrom; $i <= $countweekTo; $i++) {
                            $sumGroup .= "SUM(IF(week_code = '" . $i . "',planned_amount,0)) AS '" . $i . "',";
                        }

                        $sql0 = "
                                SELECT * FROM week_2023
                            ";

                        $sql1 = "
                            (
                                SELECT 'TOTAL' as `desc`,
                                " . $sumGroup . "
                                SUM(planned_amount) AS 'TOTAL' 
                                FROM cashflow
                                WHERE cashflow_type = 'C'
                            )
                            UNION
                            (
                                SELECT `spk_code`, 
                                 " . $sumGroup . "
                                SUM(planned_amount) AS 'TOTAL'
                                FROM cashflow 
                                WHERE cashflow_type = 'C'
                                group by spk_code 
                            )";

                        $sql2 = "
                            (
                                SELECT 'TOTAL' as `desc`,
                                " . $sumGroup . "
                                SUM(planned_amount) AS 'TOTAL' 
                                FROM cashflow
                                WHERE cashflow_type = 'D'
                            )
                            UNION
                            (
                                SELECT `desc`, 
                                " . $sumGroup . "
                                SUM(planned_amount) AS 'TOTAL'
                                FROM cashflow 
                                WHERE cashflow_type = 'D'
                                group by cash_code 
                            )";

                        $result = $mysqli->query($sql0);
                        ?>
                        <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
                            <?php
                            $start_date = date_create($row["start_date"]);
                            $end_date = date_create($row["end_date"]);
                            ?>
                            <th scope="col">
                                <?php echo number_format($row['planned_balance_end'] - $row['actual_balance']) ?> <br />
                                <?php echo date_format($start_date, "Y"); ?> <br />
                                <?php echo date_format($start_date, "d-M"); ?> <br />
                                <?php echo date_format($end_date, "d-M"); ?> <br />
                                <?php echo $row["week_code"]; ?> <br />
                            </th>
                        <?php endwhile; ?>

                        <th class="tailcol" scope="col">
                            Total
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="headcol">
                            <b>SALDO AWAL</b>
                        </td>
                        <?php
                        $result = $mysqli->query($sql0);
                        ?>

                        <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
                            <td><b><?php echo number_format($row["planned_balance_start"]); ?></b></td>
                        <?php endwhile; ?>

                        <td class="tailcol"></td>
                    </tr>

                    <?php
                    $result1 = $mysqli->query($sql1);
                    $rowcount = 0;
                    ?>
                    <?php while ($row = mysqli_fetch_array($result1, MYSQLI_ASSOC)) : ?>
                        <?php if ($rowcount == 0) : ?>
                            <tr id="cashin">
                            <?php else : ?>
                            <tr class="item-cashin">
                            <?php endif ?>
                            <td class="headcol">
                                <?php if ($rowcount == 0) : ?>
                                    <b>CASHIN</b>
                                <?php else : ?>
                                    <?php echo $row["desc"] ?>
                                <?php endif ?>

                            </td>
                            <?php for ($i = $countweekFrom; $i < ($countweekTo + 1); $i++) : ?>
                                <td><?php echo number_format($row[$i]) ?></td>
                            <?php endfor ?>


                            <td class="tailcol"><?php if ($rowcount != 0) echo number_format($row["TOTAL"]) ?></td>
                            </tr>

                            <?php $rowcount++ ?>
                        <?php endwhile; ?>


                        <?php
                        $result2 = $mysqli->query($sql2);
                        $rowcount = 0;
                        ?>

                        <?php while ($row = mysqli_fetch_array($result2, MYSQLI_ASSOC)) : ?>
                            <?php if ($rowcount == 0) : ?>
                                <tr id="cashout">
                                <?php else : ?>
                                <tr class="item-cashout">
                                <?php endif ?>
                                <td class="headcol">
                                    <?php if ($rowcount == 0) : ?>
                                        <b>CASHOUT</b>
                                    <?php else : ?>
                                        <?php echo $row["desc"] ?>
                                    <?php endif ?>

                                </td>
                                <?php for ($i = $countweekFrom; $i < ($countweekTo + 1); $i++) : ?>
                                    <td><?php echo number_format($row[$i]) ?></td>
                                <?php endfor ?>


                                <td class="tailcol"><?php if ($rowcount != 0) echo number_format($row["TOTAL"]) ?></td>
                                </tr>

                                <?php $rowcount++ ?>
                            <?php endwhile; ?>
                            <tr>
                                <td class="headcol">
                                    <b>SALDO AKHIR</b>
                                </td>
                                <?php
                                $result = $mysqli->query($sql0);
                                ?>

                                <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
                                    <td><b><?php echo number_format($row["planned_balance_end"]); ?></b></td>
                                <?php endwhile; ?>

                                <td class="tailcol"></td>
                            </tr>

                            <tr>
                                <td colspan="22"></td>
                            </tr>

                            <tr>
                                <td colspan="22">
                                    <h5>Actual Balance</h5>
                                </td>
                            </tr>
                            <tr>
                                <td class="headcol"><b>BSI Bisnis</b></td>
                                <?php
                                $result = $mysqli->query($sql0);
                                ?>

                                <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
                                    <td><?php echo number_format($row["bsi_bisnis_balance"]); ?></td>
                                <?php endwhile; ?>

                                <td class="tailcol"></td>
                            </tr>
                            <tr>
                                <td class="headcol"><b>BSI Giro</b></td>

                                <?php
                                $result = $mysqli->query($sql0);
                                ?>

                                <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
                                    <td><?php echo number_format($row["bsi_giro_balance"]); ?></td>
                                <?php endwhile; ?>

                                <td class="tailcol"></td>
                            </tr>
                            <tr>
                                <td class="headcol"><b>BNI Bisnis</b></td>

                                <?php
                                $result = $mysqli->query($sql0);
                                ?>
                                <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
                                    <td><?php echo number_format($row["bni_balance"]); ?></td>
                                <?php endwhile; ?>

                                <td class="tailcol"></td>
                            </tr>
                            <tr>
                                <td class="headcol"><b>BTN</b></td>

                                <?php
                                $result = $mysqli->query($sql0);
                                ?>
                                <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
                                    <td><?php echo number_format($row["btn_balance"]); ?></td>
                                <?php endwhile; ?>

                                <td class="tailcol"></td>
                            </tr>
                            <tr>
                                <td class="headcol"><b>Mandiri</b></td>

                                <?php
                                $result = $mysqli->query($sql0);
                                ?>
                                <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
                                    <td><?php echo number_format($row["mandiri_balance"]); ?></td>
                                <?php endwhile; ?>

                                <td class="tailcol"></td>
                            </tr>
                            <tr>
                                <td class="headcol"><b>BRI</b></td>

                                <?php
                                $result = $mysqli->query($sql0);
                                ?>
                                <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
                                    <td><?php echo number_format($row["bri_balance"]); ?></td>
                                <?php endwhile; ?>

                                <td class="tailcol"></td>
                            </tr>

                            <tr>
                                <td class="headcol"><b>SALDO ACTUAL</b></td>

                                <?php
                                $result = $mysqli->query($sql0);
                                ?>
                                <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
                                    <td><b><?php echo number_format($row["actual_balance"]); ?></b></td>
                                <?php endwhile; ?>

                                <td class="tailcol"></td>
                            </tr>

                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="ModalSlide-NilaiKontrak" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideout" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-right" id="exampleModalLabel">Rincian SPK / RAB</h5>

                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">COA Pekerjaan</th>
                                <th scope="col">Item Pekerjaan</th>
                                <th scope="col">Sat</th>
                                <th scope="col">Vol</th>
                                <th scope="col">Harga Satuan</th>
                                <th scope="col">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="pekerjaan-1">
                                <td>100.01.05</td>
                                <td>Pekj +/- item lain-lain - Persiapan</td>
                                <td></td>
                                <td>Ls</td>
                                <td></td>
                                <td>Rp5,919,160</td>
                            </tr>
                            <tr class="item-pekerjaan-1">
                                <td></td>
                                <td>1. Kebersihan dan Keamanan Lokasi Proyek</td>
                                <td>1.00</td>
                                <td>Ls</td>
                                <td>Rp1,211,710</td>
                                <td>Rp1,211,710</td>
                            </tr>
                            <tr class="item-pekerjaan-1">
                                <td></td>
                                <td>2. Badeng / Direksi Keet / Gudang </td>
                                <td>1.00</td>
                                <td>Ls</td>
                                <td>Rp850,000</td>
                                <td>Rp850,000</td>
                            </tr>

                            <tr id="pekerjaan-2">
                                <td>100.02.07</td>
                                <td>Pekj +/- item lain-lain - Pekerjaan Galian</td>
                                <td></td>
                                <td>Ls</td>
                                <td></td>
                                <td>Rp5,919,160</td>
                            </tr>
                            <tr class="item-pekerjaan-2">
                                <td></td>
                                <td>1. Galian Pondasi</td>
                                <td>42.18</td>
                                <td>m3</td>
                                <td>Rp65,000 </td>
                                <td>Rp1,211,710</td>
                            </tr>
                            <tr class="item-pekerjaan-2">
                                <td></td>
                                <td>2. Urugan Pasir dibawah Pondasi Batu Kali (tb = 5 cm)</td>
                                <td>2.76</td>
                                <td>m3</td>
                                <td>Rp310,000</td>
                                <td>Rp855,600</td>
                            </tr>
                            <tr id="pekerjaan-3">
                                <td>100.15.02</td>
                                <td>Pekj +/- item lain-lain - Pekj Tampak Samping</td>
                                <td></td>
                                <td>Ls</td>
                                <td></td>
                                <td>Rp6,055,200</td>
                            </tr>
                            <tr id="pekerjaan-4">
                                <td>100.14.02</td>
                                <td>Railling tangga</td>
                                <td></td>
                                <td>Ls</td>
                                <td></td>
                                <td>Rp2,600,000</td>
                            </tr>
                            <tr id="pekerjaan-5">
                                <td>100.13.01.01</td>
                                <td>Pekj titik lampu beserta tarikan kabel</td>
                                <td></td>
                                <td>Ls</td>
                                <td></td>
                                <td>Rp22,261,000</td>
                            </tr>
                            <tr>
                                <td colspan="6"><br /></td>
                            </tr>
                            <!-- TOTAL AREA -->
                            <tr>
                                <!-- <td rowspan="7"colspan="4"></td> -->
                                <td colspan="4"></td>
                                <td class="yellow-highlight" align="right">TOTAL</td>
                                <td class="yellow-highlight">Rp780,000,000</td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td align="right">PPN 11%</td>
                                <td>Rp36,300,000</td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td align="right">GRAND TOTAL</td>
                                <td>Rp366,300,000</td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td align="right"><br /></td>
                                <td><br /></td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td align="right">LB(m2)</td>
                                <td>64</td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td align="right" class="yellow-highlight">HPP(EXCL PPN)</td>
                                <td class="yellow-highlight">Rp5,156,250</td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalSlide-RealisasiRAB" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideout" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-right" id="exampleModalLabel">Realisasi RAB</h5>

                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nomor Kwitansi</th>
                                <th scope="col">Nomor SPK</th>
                                <th scope="col">Tipe Pembayaran</th>
                                <th scope="col">Nominal Kwitansi</th>
                                <th scope="col">Developer</th>
                                <th scope="col">Proyek</th>
                                <th scope="col">Jatuh Tempo</th>
                                <th scope="col">Cash In</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01/CIC/KKI/IX/2021</td>
                                <td>0020/SPK-TL/CD/X/2021/CIC/MKES</td>
                                <td>Tagihan Uang Muka</td>
                                <td>Rp15,942,981</td>
                                <td>PT. Mitrakusuma Erasemesta</td>
                                <td>Pekerjaan Pembangunan 1 Unit Rumah Tipe Sakura 1 Hoek</td>
                                <td>17 November 2021</td>
                                <td>Rp15,640,208</td>
                            </tr>
                            <tr>
                                <td>43/CIC/KKI/II/2022</td>
                                <td>0033/SPK-TL/CD/X/2021/CIC/CI</td>
                                <td>Percepatan 2%</td>
                                <td>Rp15,942,981</td>
                                <td>PT. Mitrakusuma Erasemesta</td>
                                <td>Pekerjaan Pembangunan 1 Unit Rumah Tipe Sakura 1 Hoek</td>
                                <td>17 November 2021</td>
                                <td>Rp15,640,208</td>
                            </tr>
                            <tr>
                                <td>64/CGC/KKI/III/2022</td>
                                <td>Nomor 0014/SPK-TDR/CD/I/2022/CGC/SBM</td>
                                <td>Tagihan 2 (25%)</td>
                                <td>Rp46,721,134</td>
                                <td>PT Sinar Bahana Mulya</td>
                                <td>Pembangunan 1 Unit Rumah Tipe Vellozia-C (102/136) di Blok BB03 No. 15</td>
                                <td>19 April 2022</td>
                                <td>Rp45,977,844</td>
                            </tr>
                            <tr>
                                <td colspan="8"><br /></td>
                            </tr>
                            <tr>
                                <td colspan="6"></td>
                                <td class="conclude-cell">Current Realisasi</td>
                                <td class="conclude-cell">Rp75,817,200</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalSlide-RAP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideout" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-right" id="exampleModalLabel">Rincian RAP</h5>

                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">COA Pekerjaan</th>
                                <th scope="col">Item Pekerjaan</th>
                                <th scope="col">Sat</th>
                                <th scope="col">Koef</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah Harga</th>
                                <th scope="col"></th>
                                <th scope="col">Vol. BQ</th>
                                <th scope="col">Vol. per Pekerjaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="analisa-1">
                                <td>100.01.05</td>
                                <td>Pekj +/- item lain-lain - Persiapan</td>
                                <td>Ls</td>
                                <td></td>
                                <td></td>
                                <td>Rp5,919,160</td>
                                <td></td>
                                <td>34.00</td>
                                <td></td>
                            </tr>
                            <tr class="analisa-pekerjaan-1" id="analisa-pekerjaan-1-a">
                                <td></td>
                                <td>1. Kebersihan dan Keamanan Lokasi Proyek</td>
                                <td>Ls</td>
                                <td>1.00</td>
                                <td>Rp1,211,710</td>
                                <td>Rp1,211,710</td>
                                <td></td>
                                <td>1.00</td>
                                <td>1.00</td>
                            </tr>
                            <tr class="child-analisa-pekerjaan-1-a">
                                <td></td>
                                <td>&nbsp; &nbsp;&nbsp;Jasa Keamanan dan Kebersihan</td>
                                <td>m</td>
                                <td>8,000</td>
                                <td>Rp600,000</td>
                                <td>Rp4,800,000</td>
                                <td></td>
                                <td>1</td>
                                <td>8,000</td>
                            </tr>
                            <tr class="analisa-pekerjaan-1" id="analisa-pekerjaan-1-b">
                                <td></td>
                                <td>2. Badeng / Direksi Keet / Gudang </td>
                                <td>Ls</td>
                                <td>1.00</td>
                                <td>Rp510,000</td>
                                <td>Rp510,000</td>
                                <td></td>
                                <td>1.00</td>
                                <td>1.00</td>
                            </tr>
                            <tr class="child-analisa-pekerjaan-1-b">
                                <td></td>
                                <td>&nbsp; &nbsp; &nbsp;paku 5 cm </td>
                                <td>kg</td>
                                <td>0.300 </td>
                                <td>Rp20,000</td>
                                <td>Rp6,000 </td>
                                <td></td>
                                <td>1.00</td>
                                <td>0.30</td>
                            </tr>
                            <tr class="child-analisa-pekerjaan-1-b">
                                <td></td>
                                <td>&nbsp; &nbsp; &nbsp;semen + angkut </td>
                                <td>zk</td>
                                <td>0.450 </td>
                                <td>Rp41,818.18</td>
                                <td>Rp18,818.18 </td>
                                <td></td>
                                <td>1.00</td>
                                <td>0.45</td>
                            </tr>
                            <tr class="child-analisa-pekerjaan-1-b">
                                <td></td>
                                <td>&nbsp; &nbsp; &nbsp;pasir pasang </td>
                                <td>m3</td>
                                <td>0.030 </td>
                                <td>Rp215,000</td>
                                <td>Rp6,450</td>
                                <td></td>
                                <td>1.00</td>
                                <td>0.03</td>
                            </tr>
                            <tr class="child-analisa-pekerjaan-1-b">
                                <td></td>
                                <td>&nbsp; &nbsp; &nbsp;split 1x2, 2x3</td>
                                <td>m3</td>
                                <td>0.050 </td>
                                <td>Rp260,000</td>
                                <td>Rp13,000 </td>
                                <td></td>
                                <td>1.00</td>
                                <td>0.05</td>
                            </tr>

                            <tr id="analisa-2">
                                <td>100.02.07</td>
                                <td>Pekj +/- item lain-lain - Pekerjaan Galian</td>
                                <td>Ls</td>
                                <td></td>
                                <td></td>
                                <td>Rp5,919,160</td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                            </tr>
                            <tr class="analisa-pekerjaan-2">
                                <td></td>
                                <td>1. Galian Pondasi</td>
                                <td>m3</td>
                                <td>42.18</td>
                                <td>Rp65,000 </td>
                                <td>Rp1,211,710</td>
                                <td></td>
                                <td>9.59</td>
                                <td>9.59</td>
                            </tr>
                            <tr class="analisa-pekerjaan-2">
                                <td></td>
                                <td>2. Urugan Pasir dibawah Pondasi Batu Kali (tb = 5 cm)</td>
                                <td>m3</td>
                                <td>2.76</td>
                                <td>Rp310,000</td>
                                <td>Rp855,600</td>
                                <td></td>
                                <td>3.48</td>
                                <td>3.48</td>
                            </tr>
                            <tr id="analisa-3">
                                <td>100.15.02</td>
                                <td>Pekj +/- item lain-lain - Pekj Tampak Samping</td>
                                <td>Ls</td>
                                <td></td>
                                <td></td>
                                <td>Rp6,055,200</td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                            </tr>
                            <tr id="analisa-4">
                                <td>100.14.02</td>
                                <td>Railling tangga</td>
                                <td>Ls</td>
                                <td></td>
                                <td></td>
                                <td>Rp2,600,000</td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                            </tr>
                            <tr id="analisa-5">
                                <td>100.13.01.01</td>
                                <td>Pekj titik lampu beserta tarikan kabel</td>
                                <td>Ls</td>
                                <td></td>
                                <td></td>
                                <td>Rp22,261,000</td>
                                <td></td>
                                <td>1</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="9"><br /></td>
                            </tr>
                            <!-- TOTAL AREA -->
                            <tr>
                                <!-- <td rowspan="7"colspan="4"></td> -->
                                <td colspan="7"></td>
                                <td class="yellow-highlight" align="right">TOTAL</td>
                                <td class="yellow-highlight">Rp600,000,000</td>
                            </tr>
                            <!-- <tr>
                                <td colspan="7"></td>
                                <td align="right">PPN 11%</td>
                                <td>Rp36,300,000</td>
                            </tr>
                            <tr>
                                <td colspan="7"></td>
                                <td align="right">GRAND TOTAL</td>
                                <td>Rp366,300,000</td>
                            </tr>
                            <tr>
                                <td colspan="7"></td>
                                <td align="right"><br /></td>
                                <td><br /></td>
                            </tr>
                            <tr>
                                <td colspan="7"></td>
                                <td align="right">LB(m2)</td>
                                <td>64</td>
                            </tr>
                            <tr>
                                <td colspan="7"></td>
                                <td align="right" class="yellow-highlight">HPP(EXCL PPN)</td>
                                <td class="yellow-highlight">Rp5,156,250</td>
                            </tr>
                            <tr>
                                <td colspan="7"></td>
                                <td></td>
                                <td></td>
                            </tr>
                        -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalSlide-RealisasiRAP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideout" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-right" id="exampleModalLabel">Realisasi RAP</h5>

                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nomor SPK</th>
                                <th scope="col">Tipe Cashout</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Bank</th>
                                <th scope="col">No.ref Transaksi</th>
                                <th scope="col">Proyek</th>
                                <th scope="col">Waktu Cashout</th>
                                <th scope="col">Nominal Cashout</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>01/CIC/KKI/IX/2021</td>
                                <td>Cashout Investor</td>
                                <td>Pembagian dividen investor</td>
                                <td>BRI</td>
                                <td>123456789012</td>
                                <td>Pekerjaan Pembangunan 1 Unit Rumah Tipe Sakura 1 Hoek</td>
                                <td>17 November 2021</td>
                                <td>Rp15,640,208</td>
                            </tr>
                            <tr>
                                <td>43/CIC/KKI/II/2022</td>
                                <td>Pajak</td>
                                <td>Bayar Pajak Lain lain</td>
                                <td>BCA</td>
                                <td>373456789012</td>
                                <td>Pekerjaan Pembangunan 1 Unit Rumah Tipe Sakura 1 Hoek</td>
                                <td>17 November 2021</td>
                                <td>Rp15,640,208</td>
                            </tr>
                            <tr>
                                <td>64/CGC/KKI/III/2022</td>
                                <td>Overhead</td>
                                <td>Gaji All n Kasbon</td>
                                <td>Mandiri</td>
                                <td>423456789087</td>
                                <td>Pembangunan 1 Unit Rumah Tipe Vellozia-C (102/136) di Blok BB03 No. 15</td>
                                <td>19 April 2022</td>
                                <td>Rp45,977,844</td>
                            </tr>
                            <tr>
                                <td colspan="8"><br /></td>
                            </tr>
                            <tr>
                                <td colspan="6"></td>
                                <td class="conclude-cell">Current Realisasi</td>
                                <td class="conclude-cell">Rp75,817,200</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalSlide-DetailCashIn" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideout" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-right" id="exampleModalLabel">Cash In CI-000001</h5>

                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td style="background-color: #efefef;">Nomor Kwitansi</td>
                                <td>01/CIC/KKI/IX/2021</td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">Nomor SPK</td>
                                <td>0020/SPK-TL/CD/X/2021/CIC/MKES</td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">Deskripsi</td>
                                <td>Pemasukkan Pembayaran Tagihan Uang Muka</td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">Tipe Pembayaran</td>
                                <td>Tagihan Uang Muka</td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">Nominal Kwitansi</td>
                                <td style="font-size: 1.1em"><b>Rp1,142,981</b></td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">Developer</td>
                                <td>PT. Mitrakusuma Erasemesta</td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">Proyek</td>
                                <td>Mall Ciputra</td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">Jatuh Tempo</td>
                                <td>20 Maret 2023</td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">Waktu Penerimaan</td>
                                <td>20 Maret 2023 10:10:12</td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">Bank Penerima</td>
                                <td>BRI</td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">No.Ref Transaksi</td>
                                <td>543456789012</td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">Capture No.Kwitansi</td>
                                <td><img src="kwitansi.png" height="180px" /></td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">Actual Cash In</td>
                                <td style="font-size: 1.1em"><b>Rp1,000,000</b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalSlide-DetailCashOut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideout" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-right" id="exampleModalLabel">Cash Out CO-000001</h5>

                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td style="background-color: #efefef;">Nomor SPK</td>
                                <td>0020/SPK-TL/CD/X/2021/CIC/MKES</td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">Deskripsi</td>
                                <td>Pembayaran Bagi Hasil Investor</td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">Tipe Cashout</td>
                                <td>Bagi Hasil Investor</td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">Proyek</td>
                                <td>Mall Ciputra</td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">Waktu Transaksi</td>
                                <td>20 Maret 2023 10:10:12</td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">Bank Pengirim</td>
                                <td>BRI</td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">No.Ref Transaksi</td>
                                <td>543456789012</td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">Bukti Transaksi</td>
                                <td><img src="receipttrx.png" height="180px" /></td>
                            </tr>
                            <tr>
                                <td style="background-color: #efefef;">Actual Cash Out</td>
                                <td style="font-size: 1.1em"><b>Rp1,000,000</b></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalSlide-FormCashFlow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideout" role="document">
            <div class="modal-content">
                <form method="post" id="addcashflow-form">
                    <div class="modal-header">
                        <input style="font-size: 1.5em" type="text" class="form-control" name="cash_code" id="code-input" placeholder="Kode Cashflow">
                    </div>
                    <div class="modal-body">
                        <table class="table form-group">
                            <tbody>
                                <tr>
                                    <td style="background-color: #efefef;">Tipe Aliran</td>
                                    <td>
                                        <select class="form-control form-control-sm" name="cashflow_type" id="cashflowtype-input">
                                            <option value="">-- Pilih Tipe Aliran --</option>
                                            <option value="C">Masuk</option>
                                            <option value="D">Keluar</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">Nomor SPK</td>
                                    <td>
                                        <select class="form-control form-control-sm" name="spk_code" id="nomorspk-input">
                                            <option value="">-- Pilih SPK --</option>
                                            <option value="0020/SPK-TL/CD/X/2021/CIC/MKES">Nomor 0020/SPK-TL/CD/X/2021/CIC/MKES</option>
                                            <option value="0033/SPK-TL/CD/X/2021/CIC/CI">Nomor 0020/SPK-TL/CD/X/2021/CIC/MKES</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">Deskripsi</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" name="desc" id="desc-input" placeholder="Deskripsi">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">Jenis Transaksi</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">Nominal Direncanakan</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" name="planned_amount" id="plannedbudget-input" placeholder="Nominal">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">Developer</td>
                                    <td>PT. Mitrakusuma Erasemesta</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">Proyek</td>
                                    <td>Mall Ciputra</td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">Jatuh Tempo</td>
                                    <td>
                                        <!-- Date Picker -->
                                        <div class="form-group mb-4">
                                            <div class="datepicker date input-group">
                                                <input type="text" placeholder="Choose Date" name="due_date" class="form-control" id="fecha1">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- // Date Picker -->
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">Bank Transaksi</td>
                                    <td>
                                        <select class="form-control form-control-sm" name="bank_code" id="bank-input">
                                            <option value="">-- Pilih Bank --</option>
                                            <option value="020601087063504">BSI Giro</option>
                                            <option value="020601087063505">BSI Bisnis</option>
                                            <option value="020601087063506">BNI Bisnis</option>
                                            <option value="020601087063507">BTN</option>
                                            <option value="020601087063508">Mandiri</option>
                                            <option value="020601087063509">BRI</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">No.Ref Transaksi</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" name="transaction_refnum" id="noref-input" placeholder="Nomor Referensi Transaksi">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="float: right; margin-left : 1em">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="float: right">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(function() {
            $('.item-pekerjaan-1').toggle()
            $('.item-pekerjaan-2').toggle()

            $('.analisa-pekerjaan-1').toggle()
            $('.child-analisa-pekerjaan-1-a').toggle()
            $('.child-analisa-pekerjaan-1-b').toggle()

            $('.analisa-pekerjaan-2').toggle()

            $('.item-cashin').toggle()
            $('.item-cashout').toggle()

            $('.datepicker').datepicker({
                language: "es",
                autoclose: true,
                format: "yyyy-mm-dd"
            });
        })

        $('#pekerjaan-1').bind("click", function() {
            $('.item-pekerjaan-1').toggle()
        })

        $('#pekerjaan-2').bind("click", function() {
            $('.item-pekerjaan-2').toggle()
        })

        $('#analisa-1').bind("click", function() {
            $('.analisa-pekerjaan-1').toggle()
        })

        $('#analisa-2').bind("click", function() {
            $('.analisa-pekerjaan-2').toggle()
        })


        $('#analisa-pekerjaan-1-a').bind("click", function() {
            $('.child-analisa-pekerjaan-1-a').toggle()
        })

        $('#analisa-pekerjaan-1-b').bind("click", function() {
            $('.child-analisa-pekerjaan-1-b').toggle()
        })

        $('#cashin').bind("click", function() {
            $('.item-cashin').toggle("slow")
        })

        $('#cashout').bind("click", function() {
            $('.item-cashout').toggle("slow")
        })

        function addCashflow() {
            alert("haha");
        }

        $("#addcashflow-form").submit(function(e) {
            e.preventDefault()
            var data = $(this).serialize();
            alert(data)

            $.ajax({
                type: "POST",
                url: "process_cashflow.php",
                data: data,
                success: function(response) {
                    console.log(response);
                    location.reload();

                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });

            return false;
        });
    </script>
</body>

<style>
    .conclude-cell {
        font-weight: bold;
    }

    .yellow-highlight {
        background-color: yellow;
        font-weight: bold;
    }

    .tab-pane {
        padding: 1em
    }

    table {
        font-size: 0.8em
    }

    .modal-dialog {
        max-width: 90%;
    }

    .modal-dialog-slideout {
        min-height: 100%;
        margin: 0 0 0 auto;
        background: #fff;
    }

    .modal.fade .modal-dialog.modal-dialog-slideout {
        -webkit-transform: translate(100%, 0)scale(1);
        transform: translate(100%, 0)scale(1);
    }

    .modal.fade.show .modal-dialog.modal-dialog-slideout {
        -webkit-transform: translate(0, 0);
        transform: translate(0, 0);
        display: flex;
        align-items: stretch;
        -webkit-box-align: stretch;
        height: 100%;
    }

    .modal.fade.show .modal-dialog.modal-dialog-slideout .modal-body {
        overflow-y: auto;
        overflow-x: hidden;
    }

    .modal-dialog-slideout .modal-content {
        border: 0;
    }

    .modal-dialog-slideout .modal-header,
    .modal-dialog-slideout .modal-footer {
        height: 4rem;
        display: block;
    }

    .table-fixed {
        text-align: left;
        position: relative;
    }

    .table-fixed th {
        position: sticky;
        top: 0;
        background-color: #efefef;
    }

    .table-fixed {
        height: 300px;
        overflow-y: scroll;
    }

    .headcol {
        position: sticky;
        left: 0;
        background-color: #efefef;
    }

    .tailcol {
        position: sticky;
        right: 0;
        background-color: #efefef;
    }
</style>

</html>