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
            <a class="nav-link" href="#rap" role="tab" data-toggle="tab" id="rap-list-link">RAP</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#rab" role="tab" data-toggle="tab" id="rab-list-link">RAB</a>
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
    <!-- <a href="#" id="teswkwk" onclick="$('#rab-list-link').trigger('click')">teswkwk</a> -->

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade show active" id="home">
            <div id="chartContainer" style="height: 300px; width: 100%;"></div>
        </div>

        <div role="tabpanel" class="tab-pane fade" id="rap">
            <h2 style="float: left">Rencana Anggaran Pelaksanaan</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Project</th>
                        <th scope="col">Bouwheer</th>
                        <th scope="col">Tanggal Dibuat</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan="5" align="right"></td>
                        <td><a href="#" data-toggle="modal" data-target="#ModalSlide-FormRAPParent" id="addformrap-button"><b>+tambah</b></a></td>
                    </tr>
                </tbody>
            </table>
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

        <div role="tabpanel" class="tab-pane fade" id="rab">
            <h2>Rencana Anggaran Biaya</h2>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Project</th>
                        <th scope="col">Bouwheer</th>
                        <th scope="col">Tanggal Dibuat</th>
                        <th scope="col">Total Biaya</th>
                        <th scope="col">Margin</th>
                        <th scope="col">Total Penawaran</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
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
                    <h5 class="modal-title align-right" id="title-detail-rap">Rincian RAP</h5>
                    <input type="hidden" value="" id="rapcode-paket" />
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
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="9"></td>
                                <td><a href="#" data-toggle="modal" data-target="#ModalSlide-FormPaketPekerjaan" id="new-paket-form"><b>+tambah</b></a></td>
                            </tr>
                            <tr>
                                <td colspan="8"></td>
                                <td>
                                    <h5>total</h5>
                                </td>
                                <td id="rap-total-value">
                                    <h5></h5>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="agree-rap-button">Setujui RAP</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalSlide-RAB" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideout" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title align-right" id="title-detail-rab">Rincian RAB</h5>
                    <input type="hidden" value="" id="rabcode-paket" />
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
                                <th scope="col">Total Biaya</th>
                                <th scope="col">Margin</th>
                                <th scope="col">Total Penawaran</th>
                                <th scope="col">Profit</th>
                                <th scope="col"></th>
                                <th scope="col">Vol. BQ</th>
                                <th scope="col">Vol. per Pekerjaan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="13"></td>
                            </tr>
                            <tr>
                                <td colspan="11"></td>
                                <td>
                                    <p><b>Total Modal</b></p>
                                </td>
                                <td id="rab-oritotal-value">
                                    <p style="font-weight: bold"></p>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="11"></td>
                                <td>
                                    <h5 style="color: green">Total Penawaran (excl. tax)</h5>
                                </td>
                                <td id="rab-total-value">
                                    <h5 style="color: green"></h5>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="11"></td>
                                <td>
                                    <h5 style="color: green">Proyeksi Profit</h5>
                                </td>
                                <td id="rab-profit-value">
                                    <h5 style="color: green"></h5>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal" id="agree-rab-button">Lanjut SPK</button>
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

    <div class="modal fade" id="ModalSlide-FormRAPParent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog modal-dialog-slideout" role="document">
            <div class="modal-content">
                <form method="post" id="addrap-form">
                    <div class="modal-header">
                        <input style="font-size: 1.5em" type="text" class="form-control" name="rap_code" id="code-rap-input" placeholder="Kode RAP">
                    </div>
                    <div class="modal-body">
                        <table class="table form-group">
                            <tbody>
                                <tr>
                                    <td style="background-color: #efefef;">project</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" name="description" id="desc-input" placeholder="Deskripsi">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">bouwheer</td>
                                    <td>
                                        <select class="form-control form-control-sm" name="developer_code" id="developer-input">
                                        </select>
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

    <div class="modal" id="ModalSlide-FormPaketPekerjaan" tabindex="-1" role="dialog" aria-hidden="true" style="width:50%; margin: 0 auto;">
        <div class="modal-lg modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" id="addpaket-form">
                    <div class="modal-header">
                        <h5>tambah paket pekerjaan</h5>
                    </div>
                    <div class="modal-body">
                        <table class="table form-group">
                            <tbody>
                                <tr>
                                    <td style="background-color: #efefef;">kode paket pekerjaan</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="kode-paket-pekerjaan-text" name="kode_paket_pekerjaan_rap" placeholder="kode paket">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">paket pekerjaan</td>
                                    <td>
                                        <select class="form-control form-control-sm" name="coa" id="coa-input">
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table form-group" style="display:none" id="form-new-master-paket">
                            <tbody>
                                <tr>
                                    <td style="background-color: #efefef;">coa</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="coa-text" placeholder="coa">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">nama paket</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="paket-pekerjaan-text" placeholder="nama paket">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">satuan</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="satuan-text" placeholder="satuan">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">alias</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="alias-text" placeholder="nama lain paket">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td align="right">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16" id="ok-master-paket-svg" style="cursor: pointer">
                                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                                        </svg>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="float: right; margin-left : 1em" id="submit-paket-btn">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="float: right">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="ModalSlide-FormPekerjaan" tabindex="-1" role="dialog" aria-hidden="true" style="width:50%; margin: 0 auto;">
        <div class="modal-lg modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" id="addpekerjaan-form">
                    <div class="modal-header">
                        <h5>tambah item pekerjaan</h5>
                    </div>
                    <div class="modal-body">
                        <table class="table form-group">
                            <tbody>
                                <tr>
                                    <td style="background-color: #efefef;">kode item pekerjaan</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="kode-item-pekerjaan-text" name="kode_item_pekerjaan" placeholder="kode item">
                                        <input type="hidden" name="kode_paket_pekerjaan_rap" id="kode-paket-pekerjaan-hidden" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">pekerjaan</td>
                                    <td>
                                        <select class="form-control form-control-sm" name="kode_pekerjaan" id="kode-pekerjaan-input">
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">volume BoQ</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="volume-item-text" name="volume_bq" placeholder="volume">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table form-group" style="display:none" id="form-new-master-pekerjaan">
                            <tbody>
                                <tr>
                                    <td style="background-color: #efefef;">kode pekerjaan</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="kode-pekerjaan-text" placeholder="kode pekerjaan">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">pekerjaan</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="pekerjaan-text" placeholder="pekerjaan">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">satuan</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="satuan-pekerjaan-text" placeholder="satuan">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">volume</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="volume-pekerjaan-text" placeholder="volume pekerjaan">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td align="right">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16" id="ok-master-pekerjaan-svg" style="cursor: pointer">
                                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                                        </svg>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="float: right; margin-left : 1em" id="submit-pekerjaan-btn">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="float: right">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal" id="ModalSlide-FormSumberdaya" tabindex="-1" role="dialog" aria-hidden="true" style="width:50%; margin: 0 auto;">
        <div class="modal-lg modal-dialog" role="document">
            <div class="modal-content">
                <form method="post" id="addsumberdaya-form">
                    <div class="modal-header">
                        <h5>tambah sumber daya - item pekerjaan</h5>
                    </div>
                    <div class="modal-body">
                        <table class="table form-group">
                            <tbody>
                                <tr>
                                    <td style="background-color: #efefef;">kode sumber daya - item pekerjaan</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="kode-item-pekerjaan-sumberdaya-text" name="kode_item_pekerjaan_sumberdaya" placeholder="kode sumberdaya - item">
                                        <input type="hidden" name="kode_item_pekerjaan" id="kode-item-pekerjaan-hidden" />
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">sumber daya</td>
                                    <td>
                                        <select class="form-control form-control-sm" name="kode_sumberdaya" id="kode-sumberdaya-input">

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">supplier</td>
                                    <td>
                                        <select class="form-control form-control-sm" name="kode_supplier" id="kode-supplier-input">

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">koefisien</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="koefisien-text" value="1" name="koefisien" placeholder="koefisien">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">satuan</td>
                                    <td>
                                        <span id="satuan-text"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">harga supplier</td>
                                    <td>
                                        <input type="text" readonly="true" class="form-control form-control-sm" id="harga-satuan-text" name="harga_supplier" placeholder="harga satuan">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">harga kumulatif</td>
                                    <td>
                                        <input type="text" readonly="true" class="form-control form-control-sm" id="harga-text" name="subtotal" placeholder="harga">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table form-group" style="display:none" id="form-new-sumberdaya-supplier">
                            <tbody>
                                <tr>
                                    <td style="background-color: #efefef;">kode sumberdaya</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="kode-sumberdaya-text" placeholder="kode sumberdaya">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">sumberdaya</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="sumberdaya-text" placeholder="sumberdaya">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">satuan</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="new-satuan-pekerjaan-text" placeholder="satuan">
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: #efefef;">harga</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="harga-sumberdaya-text" placeholder="harga satuan">
                                    </td>
                                </tr>
                                <tr class="hidden-add-supplier-form" style="display: none">
                                    <td style="background-color: #efefef;">kode supplier</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="kode-supplier-text" placeholder="kode supplier">
                                    </td>
                                </tr>
                                <tr class="hidden-add-supplier-form" style="display: none">
                                    <td style="background-color: #efefef;">supplier</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm" id="supplier-text" placeholder="supplier">
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td align="right">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16" id="ok-sumberdaya-supplier-svg" style="cursor: pointer">
                                            <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z" />
                                            <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z" />
                                        </svg>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" style="float: right; margin-left : 1em" id="submit-sumberdaya-supplier-btn">Submit</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" style="float: right">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <form method="post" id="del-form">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmationModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <input type="hidden" id="delete-code" name="delete_code" />
                        <input type="hidden" id="delete-category" name="delete_category" />
                    </div>
                    <div class="modal-body">
                        Anda yakin menghapus data ini ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="loading" style="display: none">Loading</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    <script>
        window.onload = function() {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,
                title: {
                    text: "CashIn vs CashOut"
                },
                axisX: {
                    valueFormatString: "DD MMM,YY"
                },
                axisY: {
                    title: "Nominal (dalam juta)",
                    suffix: ""
                },
                legend: {
                    cursor: "pointer",
                    fontSize: 16,
                    itemclick: toggleDataSeries
                },
                toolTip: {
                    shared: true
                },
                data: [{
                        name: "Cash In",
                        type: "spline",
                        yValueFormatString: "",
                        showInLegend: true,
                        dataPoints: [{
                                x: new Date(2023, 4, 16),
                                y: 31
                            },
                            {
                                x: new Date(2023, 4, 23),
                                y: 31
                            },
                            {
                                x: new Date(2023, 4, 30),
                                y: 29
                            },
                            {
                                x: new Date(2023, 5, 7),
                                y: 29
                            },
                            {
                                x: new Date(2023, 5, 14),
                                y: 29
                            },
                            {
                                x: new Date(2023, 5, 21),
                                y: 29
                            },
                            {
                                x: new Date(2023, 5, 28),
                                y: 29
                            },
                            {
                                x: new Date(2023, 6, 4),
                                y: 29
                            },
                            {
                                x: new Date(2023, 6, 11),
                                y: 29
                            }
                        ]
                    },
                    {
                        name: "Cash Out",
                        type: "spline",
                        yValueFormatString: "",
                        showInLegend: true,
                        dataPoints: [{
                                x: new Date(2023, 4, 16),
                                y: 22
                            },
                            {
                                x: new Date(2023, 4, 23),
                                y: 19
                            },
                            {
                                x: new Date(2023, 4, 30),
                                y: 23
                            },
                            {
                                x: new Date(2023, 5, 7),
                                y: 29
                            },
                            {
                                x: new Date(2023, 5, 14),
                                y: 29
                            },
                            {
                                x: new Date(2023, 5, 21),
                                y: 29
                            },
                            {
                                x: new Date(2023, 5, 28),
                                y: 30
                            },
                            {
                                x: new Date(2023, 6, 4),
                                y: 42
                            },
                            {
                                x: new Date(2023, 6, 11),
                                y: 22
                            }
                        ]
                    }
                ]
            });
            chart.render();

            function toggleDataSeries(e) {
                if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }

        }
    </script>

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

        $('#rap').on('click', '.list-analisa', function() {
            // Do something on an existent or future .dynamicElement
            let rapcode = $(this).attr("id")
            let repdesc = $(this).text()

            let data = {
                rap_code: rapcode
            }

            $(".loading").show()
            $.ajax({
                type: "POST",
                url: "load_detail_rap.php",
                data: data,
                success: function(response) {
                    $("#rapcode-paket").val(rapcode)
                    $("#ModalSlide-RAP table tbody").text("")
                    $("#title-detail-rap").text("Rincian RAP " + repdesc)
                    $("#ModalSlide-RAP table tbody").append(response)
                    $(".loading").hide()
                },
                error: function(request, status, error) {
                    console.log(error)
                    alert(request.responseText);
                }
            });

            calculateTotalRAP(rapcode)

        });

        $("#ModalSlide-RAP").on('click', '.analisa-svg', function() {
            let kode_paket_pekerjaan_rap = $(this).parent().parent().attr('parent-kode-paket-pekerjaan-rap')

            let svg_plus = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">' +
                '<path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"/>' +
                '<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>' +
                '</svg>'
            let svg_minus = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-minus" viewBox="0 0 16 16">' +
                '<path d="M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>' +
                '<path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>' +
                '</svg>'

            $('[class="icon-item-pekerjaan-' + kode_paket_pekerjaan_rap + '"]').html(svg_minus)

            let analisa_paket_pekerjaan = $('[class="analisa-paket-pekerjaan-' + kode_paket_pekerjaan_rap + '"]')
            if (analisa_paket_pekerjaan.length > 0) {
                analisa_paket_pekerjaan.remove()
                $('[class="analisa-paket-pekerjaan-add-' + kode_paket_pekerjaan_rap + '"]').remove()
                $('[kode-paket-pekerjaan-rap="' + kode_paket_pekerjaan_rap + '"]').remove()
                $('[class="icon-item-pekerjaan-' + kode_paket_pekerjaan_rap + '"]').html(svg_plus)
                return
            }

            if ($('[class="analisa-paket-pekerjaan-add-' + kode_paket_pekerjaan_rap + '"]').length > 0) {
                $('[class="analisa-paket-pekerjaan-add-' + kode_paket_pekerjaan_rap + '"]').remove()
                $('[kode-paket-pekerjaan-rap="' + kode_paket_pekerjaan_rap + '"]').remove()
                return
            }

            let data = "kode_paket_pekerjaan_rap=" + kode_paket_pekerjaan_rap
            let e = $(this).parent().parent()

            $(".loading").show()
            $.ajax({
                type: "POST",
                url: "load_detail_paketpekerjaan.php",
                data: data,
                success: function(response) {
                    e.after(response)
                    $(".loading").hide()
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
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

            // validate code cashflow
            let code_input = $("#code-input").val();
            if (code_input == "") {
                alert("dont forget to fill kode cashflow")
                $("#code-input").trigger("focus");
                return false;
            }

            let data = $(this).serialize();

            $(".loading").show()
            $.ajax({
                type: "POST",
                url: "process_cashflow.php",
                data: data,
                success: function(response) {
                    console.log(response);
                    location.reload();
                    $(".loading").hide()
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });

            return true;
        });

        $("#addformrap-button").click(function(e) {
            e.preventDefault()

            if ($(".dev-opt").length == 0) {
                $(".loading").show()
                $.ajax({
                    type: "POST",
                    url: "get_developer.php",
                    success: function(response) {
                        console.log(response);
                        $("#developer-input").append(response)
                        $(".loading").hide()
                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            }

            return true;
        })

        $("#addrap-form").submit(function(e) {
            e.preventDefault()

            // validate code cashflow
            code_input = $("#code-rap-input").val();
            if (code_input == "") {
                alert("dont forget to fill kode rap")
                $("#code-rap-input").trigger("focus");
                return false;
            }

            // get last-1 tr info
            let lasttr = $('#rap table.table tr').eq(-2)
            let lasttrFirstTd = lasttr.find("th:first")
            let lastNum = lasttrFirstTd.text()

            let data = $(this).serialize();
            data = data + "&lastnum=" + lastNum
            console.log(data)

            $(".loading").show()
            $.ajax({
                type: "POST",
                url: "process_rap.php",
                data: data,
                success: function(response) {
                    $("#ModalSlide-FormRAPParent").modal('toggle')
                    lasttr.after(response)
                    $("input[type=text]").val("");
                    //location.reload();
                    $(".loading").hide()
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });

            return true;
        });

        $("#rap-list-link").click(function(e) {
            e.preventDefault()
            if ($(".rap-object").length == 0) {
                $(".loading").show()
                $.ajax({
                    type: "POST",
                    url: "load_list_rap.php",
                    success: function(response) {
                        $("#rap table tbody").prepend(response)
                        $(".loading").hide()
                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            }
        })

        $("#new-paket-form").click(function(e) {
            e.preventDefault()
            clearFormTambahPaket()
            $("#addpaket-form").show()

            if ($(".paket-opt").length == 0) {
                $.ajax({
                    type: "POST",
                    url: "get_paket_pekerjaan.php",
                    success: function(response) {
                        console.log(response);
                        $("#coa-input").append(response)
                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            }

            return true;
        })

        $('#coa-input').change(function() {
            let value = $(this).val();

            if (value == "add-master-paket") {
                $("#form-new-master-paket").show()
                $('#submit-paket-btn').hide()
            } else {
                $("#form-new-master-paket").hide()
                $('#submit-paket-btn').show()
            }
        });

        $("#ok-master-paket-svg").click(function(e) {
            //$("#ModalSlide-FormPaketPekerjaan ")

            let coa = $("#coa-text").val()
            let paket_pekerjaan = $("#paket-pekerjaan-text").val()
            let satuan = $("#satuan-text").val()
            let alias = $("#alias-text").val()

            let data = {
                coa: coa,
                paket_pekerjaan: paket_pekerjaan,
                satuan: satuan,
                alias: alias
            }

            if (coa == "" || paket_pekerjaan == "" || satuan == "" || alias == "") {
                alert("semua inputan master paket data harus diisi")
                return
            }

            // get last-1 tr info
            let last_mpaket = $('#coa-input option').eq(-2)

            $(".loading").show()
            $.ajax({
                type: "POST",
                url: "add_m_paket_pekerjaan.php",
                data: data,
                success: function(response) {
                    console.log(response)
                    last_mpaket.after(response)
                    $("#coa-input").val(coa)
                    $("#form-new-master-paket").hide()
                    $('#submit-paket-btn').show()
                    $(".loading").hide()
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        })

        $("#ok-master-pekerjaan-svg").click(function(e) {
            let kode_pekerjaan = $("#kode-pekerjaan-text").val()
            let pekerjaan = $("#pekerjaan-text").val()
            let satuan = $("#satuan-pekerjaan-text").val()
            let volume = $("#volume-pekerjaan-text").val()

            let data = {
                kode_pekerjaan: kode_pekerjaan,
                pekerjaan: pekerjaan,
                satuan: satuan,
                volume: volume
            }

            if (kode_pekerjaan == "" || pekerjaan == "" || satuan == "" || satuan == "" || volume == "") {
                alert("semua inputan master pekerjaan harus diisi")
                return
            }

            // get last-1 tr info
            let last_pekerjaan = $('#kode-pekerjaan-input option').eq(-2)

            $(".loading").show()
            $.ajax({
                type: "POST",
                url: "add_m_pekerjaan.php",
                data: data,
                success: function(response) {
                    //console.log(response)
                    last_pekerjaan.after(response)
                    $("#kode-pekerjaan-input").val(kode_pekerjaan)
                    $("#form-new-master-pekerjaan").hide()
                    $('#submit-pekerjaan-btn').show()
                    $(".loading").hide()
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        })

        $("#addpaket-form").submit(function(e) {
            e.preventDefault()
            let rapcode = $("#rapcode-paket").val()

            let data = $(this).serialize()
            data = data + '&rap_code=' + rapcode

            $.ajax({
                type: "POST",
                url: "process_paket_pekerjaan.php",
                data: data,
                dataType: "html",
                success: function(response) {
                    //console.log(response);
                    $("#ModalSlide-RAP table tbody").append(response)
                    alert("penambahan paket pekerjaan berhasil")
                    $("#ModalSlide-FormPaketPekerjaan").modal('toggle')
                    //location.reload();
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        })

        $("#addpekerjaan-form").submit(function(e) {
            e.preventDefault()
            //let rapcode = $("#rapcode-paket").val()

            let kode_item_pekerjaan = $("#kode-item-pekerjaan-text").val()
            let volume = $("#volume-item-text").val()
            let pekerjaan = $("#kode-pekerjaan-input").val()

            if (kode_item_pekerjaan == "" || volume == "" || pekerjaan == "") {
                alert("semua inputan master pekerjaan harus diisi")
                return
            }

            let data = $(this).serialize()

            let kode_paket_pekerjaan_rap = $("#addpekerjaan-form #kode-paket-pekerjaan-hidden").val()
            let last_item_pekerjaan = $('[class="analisa-paket-pekerjaan-' + kode_paket_pekerjaan_rap + '"]:last')
            let list_item_pekerjaan = $('[class="analisa-paket-pekerjaan-' + kode_paket_pekerjaan_rap + '"]')

            if (list_item_pekerjaan.length == 0) {
                last_item_pekerjaan = $('.analisa[id="paket-' + kode_paket_pekerjaan_rap + '"]');
            }


            data = data + "&last_item=" + list_item_pekerjaan.length

            $(".loading").show()
            $.ajax({
                type: "POST",
                url: "process_item_pekerjaan.php",
                data: data,
                dataType: "html",
                success: function(response) {
                    console.log(response);
                    last_item_pekerjaan.after(response)
                    //list_item_pekerjaan[list_item_pekerjaan.length-1].after('<div id="space"></div>')
                    alert("penambahan item pekerjaan berhasil")
                    $('[class^="analisa-item-pekerjaan-"]').remove()
                    $("#ModalSlide-FormPekerjaan").modal('toggle')
                    $(".loading").hide()
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        })

        $("#ModalSlide-RAP").on('click', '.new-pekerjaan-form', function() {
            clearFormTambahItemPekerjaan()
            $("#addpekerjaan-form").show()
            let kode_pekerjaan_paket_rap = $(this).attr("id")
            $("#kode-paket-pekerjaan-hidden").val(kode_pekerjaan_paket_rap)

            if ($(".pekerjaan-opt").length == 0) {
                $(".loading").show()
                $.ajax({
                    type: "POST",
                    url: "load_list_m_pekerjaan.php",
                    success: function(response) {
                        console.log(response);
                        $("#kode-pekerjaan-input").append(response)
                        $(".loading").hide()
                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            }

            return true;
        })

        $('#kode-pekerjaan-input').change(function() {
            let value = $(this).val();

            if (value == "add-master-pekerjaan") {
                $("#form-new-master-pekerjaan").show()
                $('#submit-pekerjaan-btn').hide()
            } else {
                $("#form-new-master-pekerjaan").hide()
                $('#submit-pekerjaan-btn').show()
            }
        });

        $("#ModalSlide-RAP").on('click', '[class^="icon-item-pekerjaan-"]', function() {
            let kode_item_pekerjaan = $(this).attr('id')
            let kode_paket_pekerjaan_rap = $(this).attr("kode-paket-pekerjaan-rap")

            let svg_plus = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">' +
                '<path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"/>' +
                '<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>' +
                '</svg>'
            let svg_minus = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-minus" viewBox="0 0 16 16">' +
                '<path d="M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>' +
                '<path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>' +
                '</svg>'

            $('[class="icon-sumberdaya-' + kode_item_pekerjaan + '"]').html(svg_minus)

            let analisa_item_pekerjaan = $('[class="analisa-item-pekerjaan-' + kode_item_pekerjaan + '"]')


            if (analisa_item_pekerjaan.length > 0) {
                $('[class="analisa-item-pekerjaan-' + kode_item_pekerjaan + '"]').remove()
                $('[class="analisa-item-pekerjaan-add-' + kode_item_pekerjaan + '"]').remove()
                $('[class="icon-item-pekerjaan-' + kode_item_pekerjaan + '"]').html(svg_plus)
                return
            }

            if ($('[class="analisa-item-pekerjaan-add-' + kode_item_pekerjaan + '"]').length > 0) {
                $('[class="analisa-item-pekerjaan-add-' + kode_item_pekerjaan + '"]').remove()
                return
            }

            let data = "kode_item_pekerjaan=" + kode_item_pekerjaan + "&kode_paket_pekerjaan_rap=" + kode_paket_pekerjaan_rap
            let e = $(this).parent().parent()

            console.log(e)

            $(".loading").show()
            $.ajax({
                type: "POST",
                url: "load_detail_itempekerjaan.php",
                data: data,
                success: function(response) {
                    console.log(response)
                    e.after(response)
                    $(".loading").hide()
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        })

        $("#ModalSlide-RAP").on('click', '.new-sumberdaya-form', function() {
            $("#addsumberdaya-form").show()
            let kode_item_pekerjaan = $(this).attr("id")
            $("#kode-item-pekerjaan-hidden").val(kode_item_pekerjaan)
            //
            if ($(".sumberdaya-opt").length == 0) {
                $(".loading").show()
                $.ajax({
                    type: "POST",
                    url: "load_list_m_sumberdaya.php",
                    success: function(response) {
                        console.log(response);
                        $("#kode-sumberdaya-input").append(response)
                        $(".loading").hide()
                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            }

            if ($(".supplier-opt").length == 0) {
                $(".loading").show()
                $.ajax({
                    type: "POST",
                    url: "load_list_m_supplier.php",
                    success: function(response) {
                        console.log(response);
                        $("#kode-supplier-input").append(response)
                        $(".loading").hide()
                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            }
            //
            return true;
        })

        $("#kode-sumberdaya-input").change(function() {
            let kode_sumberdaya = $(this).val()
            let kode_supplier = $("#kode-supplier-input").val()
            let data = "kode_sumberdaya=" + kode_sumberdaya

            if (kode_sumberdaya == "add-master-sumberdaya") {
                $("#form-new-sumberdaya-supplier").show()
                $('#submit-sumberdaya-supplier-btn').hide()

                $(".loading").show()
                $.ajax({
                    type: "POST",
                    url: "load_list_m_supplier.php",
                    data: data,
                    success: function(response) {
                        $("#kode-supplier-input").html(response)
                        $(".loading").hide()
                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            } else {
                $("#form-new-sumberdaya-supplier").hide()
                $('#submit-sumberdaya-supplier-btn').show()
                $(".loading").show()
                $.ajax({
                    type: "POST",
                    url: "load_list_supplier_by_sumberdaya.php",
                    data: data,
                    success: function(response) {
                        $("#kode-supplier-input").html(response)
                        $("#kode-supplier-input").val(kode_supplier)
                        $(".loading").hide()
                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            }

            kode_supplier = $("#kode-supplier-input").val()
            if (kode_supplier != "") {
                data += "&kode_supplier=" + kode_supplier
                $(".loading").show()
                $.ajax({
                    type: "POST",
                    url: "get_harga_by_sumberdaya_supplier.php",
                    data: data,
                    success: function(response) {
                        let resp = JSON.parse(response)
                        $("#harga-satuan-text").val(resp.harga_supplier)
                        $("span#satuan-text").text(resp.satuan)
                        $(".loading").hide()
                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            }
        })

        $("#kode-supplier-input").change(function() {
            let kode_supplier = $(this).val()
            let kode_sumberdaya = $("#kode-sumberdaya-input").val()
            let data = "kode_supplier=" + kode_supplier


            if (kode_supplier == "add-master-supplier") {
                $(".hidden-add-supplier-form").show()
                $('#submit-sumberdaya-supplier-btn').hide()
            } else {
                //$("#form-new-sumberdaya-supplier").hide()
                $(".hidden-add-supplier-form").hide()
            }

            $(".loading").show()
            $.ajax({
                type: "POST",
                url: "load_list_sumberdaya_by_supplier.php",
                data: data,
                success: function(response) {
                    $("#kode-sumberdaya-input").html(response)
                    $("#kode-sumberdaya-input").val(kode_sumberdaya)
                    $(".loading").hide()
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });

            kode_sumberdaya = $("#kode-sumberdaya-input").val()
            if (kode_sumberdaya != "") {
                data += "&kode_sumberdaya=" + kode_sumberdaya
                $(".loading").show()
                $.ajax({
                    type: "POST",
                    url: "get_harga_by_sumberdaya_supplier.php",
                    data: data,
                    success: function(response) {
                        console.log(response)
                        let resp = JSON.parse(response)
                        $("#harga-satuan-text").val(resp.harga_supplier)
                        $("span#satuan-text").text(resp.satuan)
                        $(".loading").hide()
                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                });
            }
        })

        $("#koefisien-text").on("mouseout", function() {
            let harga_satuan = $("#harga-satuan-text").val()
            let koefisien = $(this).val()

            let harga_kumulatif = harga_satuan * koefisien
            $("#harga-text").val(harga_kumulatif)
        });

        $("#addsumberdaya-form").submit(function(e) {
            e.preventDefault()

            let kode_item_pekerjaan_sumberdaya = $("#kode-item-pekerjaan-sumberdaya-text").val()
            let kode_sumberdaya = $("#kode-sumberdaya-input").val()
            let kode_supplier = $("#kode-supplier-input").val()
            let koefisien = $("#koefisien-text").val()

            if (kode_item_pekerjaan_sumberdaya == "" || kode_sumberdaya == "" || kode_supplier == "" || koefisien == "") {
                alert("semua inputan master pekerjaan harus diisi")
                return
            }

            let data = $(this).serialize()

            let kode_item_pekerjaan = $("#addsumberdaya-form #kode-item-pekerjaan-hidden").val()
            let last_sumberdaya = $('[class="analisa-item-pekerjaan-' + kode_item_pekerjaan + '"]:last')
            let list_sumberdaya = $('[class="analisa-item-pekerjaan-' + kode_item_pekerjaan + '"]')

            if (list_sumberdaya.length == 0) {
                last_sumberdaya = $('[id="item-' + kode_item_pekerjaan + '"]')
                console.log(last_sumberdaya)
            }

            data = data + "&last_item=" + list_sumberdaya.length
            var rap_code = ""

            $(".loading").show()
            $.ajax({
                type: "POST",
                url: "process_item_pekerjaan_sumberdaya.php",
                data: data,
                dataType: "json",
                success: function(response) {
                    let sumberdaya = response.sumberdaya
                    last_sumberdaya.after(sumberdaya)

                    $('[id="subtotal-item-' + kode_item_pekerjaan + '"').text(response.item_subtotal)
                    $('[id="subtotal-paket-' + response.kode_paket_pekerjaan_rap + '"').text(response.paket_subtotal)

                    alert("penambahan sumberdaya berhasil")
                    $("#ModalSlide-FormSumberdaya").modal('toggle')
                    $(".loading").hide()
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            }).then(function(auah) {
                console.log(auah)
                calculateTotalRAP(auah.rap_code, auah.subtotal)
                clearFormSumberdaya()
            });

        })

        $("#ok-sumberdaya-supplier-svg").click(function(e) {
            let kode_sumberdaya = $("#kode-sumberdaya-text").val()
            let sumberdaya = $("#sumberdaya-text").val()
            let satuan = $("#new-satuan-pekerjaan-text").val()
            let harga = $("#harga-sumberdaya-text").val()
            let kode_supplier_input = $("#kode-supplier-input").val()
            let kode_supplier_text = $("#kode-supplier-text").val()
            let supplier = $("#supplier-text").val()

            let kode_supplier = ""
            if (kode_supplier_input != "") {
                kode_supplier = kode_supplier_input
            }

            if (kode_supplier_text != "") {
                kode_supplier = kode_supplier_text
            }

            let data = {
                kode_sumberdaya: kode_sumberdaya,
                sumberdaya: sumberdaya,
                satuan: satuan,
                harga: harga,
                kode_supplier: kode_supplier,
                supplier: supplier
            }

            console.log(data)

            if (kode_sumberdaya == "" || sumberdaya == "" || satuan == "" || harga == "" || kode_supplier_input == "") {
                alert("semua inputan sumberdaya-supplier #1 harus diisi")
                return
            }

            if (kode_supplier_input == "add-master-supplier" && supplier == "" && kode_supplier_text == "") {
                alert("semua inputan sumberdaya-supplier #2 harus diisi")
                return
            }

            $(".loading").show()
            $.ajax({
                type: "POST",
                url: "process_sumberdaya_supplier.php",
                data: data,
                datatype: "html",
                success: function(response_raw) {
                    let response = JSON.parse(response_raw)


                    let koefisien = $("#koefisien-text").val()
                    let harga_kumulatif = koefisien * response.harga_supplier
                    $("#kode-sumberdaya-input").html(response.sumberdaya_list)
                    $("#kode-sumberdaya-input").val(kode_sumberdaya)

                    $("#kode-supplier-input").html(response.supplier_list)
                    $("#kode-supplier-input").val(kode_supplier)

                    $("#harga-satuan-text").val(response.harga_supplier)
                    $("#harga-text").val(harga_kumulatif)
                    $("span#satuan-text").text(response.satuan)

                    $("#form-new-sumberdaya-supplier").hide()
                    $('#submit-sumberdaya-supplier-btn').show()
                    $(".loading").hide()
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            }).then(function(res) {
                console.log(res)
            });
        })

        $("#ModalSlide-RAP").on('click', '.svg-hapus-pekerjaan-sumberdaya', function() {
            let kode_item_pekerjaan = $(this).attr("kode_item_pekerjaan")
            let sumberdaya = $(this).attr("sumberdaya")
            let kode_item_pekerjaan_sumberdaya = $(this).attr("kode_item_pekerjaan_sumberdaya")

            $("#confirmationModalLabel").text("Hapus " + sumberdaya + " pada item pekerjaan " + kode_item_pekerjaan)

            $("#delete-code").val(kode_item_pekerjaan_sumberdaya)
            $("#delete-category").val("sumberdaya")
        })

        $("form#del-form").submit(function(e) {
            e.preventDefault()
            let modaldelform = $(this).parent().parent().parent()
            let delete_code = $("#delete-code").val()
            let delete_category = $("#delete-category").val()

            let data = $(this).serialize();

            let rapcode = ""

            switch (delete_category) {
                case "sumberdaya":
                    $(".loading").show()
                    $.ajax({
                        type: "POST",
                        url: "delete_item_pekerjaan_sumberdaya.php",
                        data: data,
                        success: function(response_raw) {
                            //alert(response_raw)
                            let response = JSON.parse(response_raw)
                            let deduct_amount = response.deduct_amount

                            let kode_item_pekerjaan = response.kode_item_pekerjaan
                            let kode_paket_pekerjaan_rap = response.kode_paket_pekerjaan_rap

                            let oldamount_item_pekerjaan = $('[id="subtotal-item-' + kode_item_pekerjaan + '"]').text()
                            let oldamount_paket_pekerjaan_rap = $('[id="subtotal-paket-' + kode_paket_pekerjaan_rap + '"]').text()

                            let newamount_item_pekerjaan = oldamount_item_pekerjaan - deduct_amount
                            let newamount_paket_pekerjaan_rap = oldamount_paket_pekerjaan_rap - deduct_amount

                            $('[id="sumberdaya-' + delete_code + '"]').remove()
                            $('[id="subtotal-item-' + kode_item_pekerjaan + '"]').text(newamount_item_pekerjaan)
                            $('[id="subtotal-paket-' + kode_paket_pekerjaan_rap + '"]').text(newamount_paket_pekerjaan_rap)

                            rapcode = response.rap_code
                            $(".loading").hide()
                        },
                        error: function(request, status, error) {
                            alert(request.responseText);
                        }
                    }).then(function(res) {
                        console.log(res)
                        let response = JSON.parse(res)
                        calculateTotalRAP(response.rap_code)
                    })
                    break
                case "item_pekerjaan":
                    $(".loading").show()
                    $.ajax({
                        type: "POST",
                        url: "delete_item_pekerjaan.php",
                        data: data,
                        success: function(response_raw) {
                            //alert(response_raw)
                            let response = JSON.parse(response_raw)
                            let deduct_amount = response.deduct_amount

                            let kode_paket_pekerjaan_rap = response.kode_paket_pekerjaan_rap

                            let oldamount_paket_pekerjaan_rap = $('[id="subtotal-paket-' + kode_paket_pekerjaan_rap + '"]').text()
                            let newamount_paket_pekerjaan_rap = oldamount_paket_pekerjaan_rap - deduct_amount

                            $('[id="item-' + delete_code + '"]').remove()
                            $('[class="analisa-item-pekerjaan-' + delete_code + '"]').remove()
                            $('[kode_item_pekerjaan="' + delete_code + '"]').remove()
                            $('[id="subtotal-paket-' + kode_paket_pekerjaan_rap + '"]').text(newamount_paket_pekerjaan_rap)

                            rapcode = response.rap_code
                            $(".loading").hide()
                        },
                        error: function(request, status, error) {
                            alert(request.responseText);
                        }
                    }).then(function(res) {
                        console.log(res)
                        let response = JSON.parse(res)
                        calculateTotalRAP(response.rap_code)
                    })
                    break
                case "paket_pekerjaan":
                    $(".loading").show()
                    $.ajax({
                        type: "POST",
                        url: "delete_paket_pekerjaan.php",
                        data: data,
                        success: function(response_raw) {
                            console.log(response_raw)
                            let response = JSON.parse(response_raw)
                            let deduct_amount = response.deduct_amount
                            $('[id="paket-' + delete_code + '"]').remove()
                            $('[kode-paket-pekerjaan-rap="' + delete_code + '"]').remove()
                            $('[parent-kode-paket-pekerjaan-rap="' + delete_code + '"]').remove()

                            rapcode = response.rap_code
                            $(".loading").hide()
                        },
                        error: function(request, status, error) {
                            alert(request.responseText);
                        }
                    }).then(function(res) {
                        console.log(res)
                        let response = JSON.parse(res)
                        calculateTotalRAP(response.rap_code)
                    })
                    break
                default:
                    break
            }

            modaldelform.modal('toggle')
        })

        $("#ModalSlide-RAP").on('click', '.svg-hapus-item-pekerjaan', function() {
            let kode_paket_pekerjaan_rap = $(this).attr("kode_paket_pekerjaan_rap")
            let pekerjaan = $(this).attr("pekerjaan")
            let kode_item_pekerjaan = $(this).attr("kode_item_pekerjaan")
            //
            $("#confirmationModalLabel").text("Hapus " + pekerjaan + " pada paket " + kode_paket_pekerjaan_rap)
            //
            $("#delete-code").val(kode_item_pekerjaan)
            $("#delete-category").val("item_pekerjaan")
        })

        $("#ModalSlide-RAP").on('click', '.svg-hapus-paket-pekerjaan', function() {
            let rap_code = $(this).attr("rap_code")
            let paket_pekerjaan = $(this).attr("paket_pekerjaan")
            let kode_paket_pekerjaan_rap = $(this).attr("kode_paket_pekerjaan_rap")

            $("#confirmationModalLabel").text("Hapus " + paket_pekerjaan + " pada RAP " + rap_code)

            $("#delete-code").val(kode_paket_pekerjaan_rap)
            $("#delete-category").val("paket_pekerjaan")
        })

        function clearFormSumberdaya() {
            $("#kode-item-pekerjaan-sumberdaya-text").val("")
            $("#kode-sumberdaya-input").val("")
            $("#kode-supplier-input").val("")
            $("#koefisien-text").val("")
            $("#harga-satuan-text").val("")
            $("#harga-text").val("")

            $(".sumberdaya-opt").remove()
            $(".supplier-opt").remove()
        }

        function calculateTotalRAP(rap_code, additional_subtotal = 0) {
            let data = "rap_code=" + rap_code

            $(".loading").show()
            $.ajax({
                type: "POST",
                url: "count_total_amount_rap.php",
                data: data,
                success: function(response) {
                    let total_value = (parseInt(response) + parseInt(additional_subtotal))
                    console.log("total value " + total_value)
                    $("#rap-total-value h5").text("Rp" + new Intl.NumberFormat().format(total_value))
                    $(".loading").hide()
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }

        $("#agree-rap-button").click(function() {
            let rap_code = $("#rapcode-paket").val()
            let data = "rap_code=" + rap_code

            $(".loading").show()
            $.ajax({
                type: "POST",
                url: "init_rab.php",
                data: data,
                success: function(response) {
                    alert(response)
                    $(".loading").hide()
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            }).then(function() {
                $('#rab-list-link').trigger('click')
            })
        })

        $('#rab-list-link').click(function() {
            if ($(".rab-object").length == 0) {
                $(".loading").show()
                $.ajax({
                    type: "POST",
                    url: "load_list_rab.php",
                    success: function(response) {
                        console.log(response)
                        $("#rab table tbody").prepend(response)
                        $(".loading").hide()
                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                })
            }
        })


        $('#rab').on('click', '.list-analisa', function() {
            // Do something on an existent or future .dynamicElement
            let rabcode = $(this).attr("id")
            let repdesc = $(this).text()

            let data = {
                rab_code: rabcode
            }

            $(".loading").show()
            $.ajax({
                type: "POST",
                url: "load_detail_rab.php",
                data: data,
                success: function(response) {
                    $("#rabcode-paket").val(rabcode)
                    $("#ModalSlide-RAB table tbody").text("")
                    $("#title-detail-RAB").text("Rincian RAB " + repdesc)
                    $("#ModalSlide-RAB table tbody").append(response)
                    $(".loading").hide()
                },
                error: function(request, status, error) {
                    console.log(error)
                    alert(request.responseText);
                }
            });

            calculateTotalRAB(rabcode)

        });

        $("#ModalSlide-RAB").on('click', '.analisa-svg', function() {
            let kode_paket_pekerjaan_rab = $(this).parent().parent().attr('parent-kode-paket-pekerjaan-rab')

            let svg_plus = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">' +
                '<path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"/>' +
                '<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>' +
                '</svg>'
            let svg_minus = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-minus" viewBox="0 0 16 16">' +
                '<path d="M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>' +
                '<path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>' +
                '</svg>'

            $('[class="icon-item-pekerjaan-' + kode_paket_pekerjaan_rab + '"]').html(svg_minus)

            let analisa_paket_pekerjaan = $('[class="analisa-paket-pekerjaan-' + kode_paket_pekerjaan_rab + '"]')
            if (analisa_paket_pekerjaan.length > 0) {
                analisa_paket_pekerjaan.remove()
                $('[class="analisa-paket-pekerjaan-add-' + kode_paket_pekerjaan_rab + '"]').remove()
                $('[kode-paket-pekerjaan-rab="' + kode_paket_pekerjaan_rab + '"]').remove()
                $('[class="icon-item-pekerjaan-' + kode_paket_pekerjaan_rab + '"]').html(svg_plus)
                return
            }

            if ($('[class="analisa-paket-pekerjaan-add-' + kode_paket_pekerjaan_rab + '"]').length > 0) {
                $('[class="analisa-paket-pekerjaan-add-' + kode_paket_pekerjaan_rab + '"]').remove()
                $('[kode-paket-pekerjaan-rab="' + kode_paket_pekerjaan_rab + '"]').remove()
                return
            }

            let data = "kode_paket_pekerjaan_rab=" + kode_paket_pekerjaan_rab
            let e = $(this).parent().parent()

            $(".loading").show()
            $.ajax({
                type: "POST",
                url: "load_detail_paketpekerjaan_rab.php",
                data: data,
                success: function(response) {
                    e.after(response)
                    $(".loading").hide()
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        })

        $("#ModalSlide-RAB").on('click', '[class^="icon-item-pekerjaan-"]', function() {
            let kode_item_pekerjaan_rab = $(this).attr('id')
            let kode_paket_pekerjaan_rab = $(this).attr("kode-paket-pekerjaan-rab")

            let svg_plus = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">' +
                '<path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z"/>' +
                '<path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1z"/>' +
                '</svg>'
            let svg_minus = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-minus" viewBox="0 0 16 16">' +
                '<path d="M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/>' +
                '<path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>' +
                '</svg>'

            $('[class="icon-sumberdaya-' + kode_item_pekerjaan_rab + '"]').html(svg_minus)

            let analisa_item_pekerjaan = $('[class="analisa-item-pekerjaan-' + kode_item_pekerjaan_rab + '"]')


            if (analisa_item_pekerjaan.length > 0) {
                $('[class="analisa-item-pekerjaan-' + kode_item_pekerjaan_rab + '"]').remove()
                $('[class="analisa-item-pekerjaan-add-' + kode_item_pekerjaan_rab + '"]').remove()
                $('[class="icon-item-pekerjaan-' + kode_item_pekerjaan_rab + '"]').html(svg_plus)
                return
            }

            if ($('[class="analisa-item-pekerjaan-add-' + kode_item_pekerjaan_rab + '"]').length > 0) {
                $('[class="analisa-item-pekerjaan-add-' + kode_item_pekerjaan_rab + '"]').remove()
                return
            }

            let data = "kode_item_pekerjaan_rab=" + kode_item_pekerjaan_rab + "&kode_paket_pekerjaan_rab=" + kode_paket_pekerjaan_rab
            let e = $(this).parent().parent()

            $(".loading").show()
            $.ajax({
                type: "POST",
                url: "load_detail_itempekerjaan_rab.php",
                data: data,
                success: function(response) {
                    console.log(response)
                    e.after(response)
                    $(".loading").hide()
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        })

        $("#ModalSlide-RAB").on('click', '.margin-group-item span.margin-edit-btn', function() {
            let input = ""
            let button = ""
            let mode = ""
            let margin = ""

            mode = $(this).attr("mode")

            let subtotal_item_sumberdaya_elem = $(this).parent().siblings('.hargapenawaran-group-item')
            let profit_item_sumberdaya_elem = $(this).parent().siblings('.profit-group-item')
            let subtotal_ori_item_sumberdaya = $(this).parent().siblings('.harga-group-item').text()
            let subtotal_item_sumberdaya = subtotal_item_sumberdaya_elem.text()

            let kode_item_pekerjaan_sumberdaya_rab = $(this).parent().parent().attr("kode-item-pekerjaan-sumberdaya-rab")
            let kode_item_pekerjaan_rab = $(this).parent().parent().attr("kode-item-pekerjaan-rab")
            let kode_paket_pekerjaan_rab = $(this).parent().parent().attr("kode-paket-pekerjaan-rab")

            console.log('item-' + kode_item_pekerjaan_rab)

            let subtotal_item_pekerjaan_elem = $('[id="item-' + kode_item_pekerjaan_rab + '"]')
            let subtotal_paket_pekerjaan_elem = $('[id="paket-' + kode_paket_pekerjaan_rab + '"]')

            if (mode == "modify") {
                $(this).attr("mode", "save")
                margin = $(this).siblings('.margin-val').text()
                input = '<input size="5" type="number" min="0" max="100" value="' + margin + '" step="0.01" placeholder="0.00" class="margininput-group-item" kode-item-pekerjaan-sumberdaya-rab="' + kode_item_pekerjaan_sumberdaya_rab + '" subtotal-ori="' + subtotal_ori_item_sumberdaya + '" subtotal="' + subtotal_item_sumberdaya + '"/>'
                button = '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-check" viewBox="0 0 16 16"><path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/><path d="M15.854 10.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.707 0l-1.5-1.5a.5.5 0 0 1 .707-.708l1.146 1.147 2.646-2.647a.5.5 0 0 1 .708 0z"/></svg>'
            } else {
                $(this).attr("mode", "modify")
                margin = $(this).siblings('.margin-val').children(".margininput-group-item").val()
                input = margin
                button = '<svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16"><path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/></svg>'

                data = {
                    kode_item_pekerjaan_sumberdaya_rab: kode_item_pekerjaan_sumberdaya_rab,
                    kode_item_pekerjaan_rab: kode_item_pekerjaan_rab,
                    margin: margin,
                    subtotal_ori: subtotal_ori_item_sumberdaya
                }

                console.log(data)

                $(".loading").show()
                $.ajax({
                    type: "POST",
                    url: "update_margin_item_pekerjaan_sumberdaya_rab.php",
                    data: data,
                    success: function(response) {
                        let resp = JSON.parse(response)

                        subtotal_item_sumberdaya_elem.html(resp.subtotal_item_pekerjaan_sumberdaya_rab)
                        profit_item_sumberdaya_elem.html(resp.profit)

                        console.log(subtotal_paket_pekerjaan_elem)

                        subtotal_item_pekerjaan_elem.children(".subtotal-item-pekerjaan").html(resp.subtotal_item_pekerjaan_rab)
                        subtotal_item_pekerjaan_elem.children(".margin-item-pekerjaan").html(resp.margin_item_pekerjaan_rab)
                        subtotal_item_pekerjaan_elem.children(".profit-item-pekerjaan").html(resp.profit_item_pekerjaan_rab)

                        subtotal_paket_pekerjaan_elem.children(".subtotal-paket-pekerjaan").html(resp.subtotal_paket_pekerjaan_rab)
                        subtotal_paket_pekerjaan_elem.children(".margin-paket-pekerjaan").html(resp.margin_paket_pekerjaan_rab)
                        subtotal_paket_pekerjaan_elem.children(".profit-paket-pekerjaan").html(resp.profit_paket_pekerjaan_rab)
                        $(".loading").hide()
                    },
                    error: function(request, status, error) {
                        alert(request.responseText);
                    }
                }).then(function() {
                    let rab_code = $("#rabcode-paket").val()
                    calculateTotalRAB(rab_code)
                })
            }

            $(this).siblings('.margin-val').html(input)
            $(this).html(button)

            //let profit = parseInt(subtotal_ori) * parseInt(margin) / 100
            //let new_subtotal = subtotal_ori + profit
            //
            //subtotal.text(new_subtotal)
        })

        function calculateTotalRAB(rab_code) {
            let data = "rab_code=" + rab_code

            $(".loading").show()
            $.ajax({
                type: "POST",
                url: "count_total_amount_rab.php",
                data: data,
                success: function(response) {
                    let resp = JSON.parse(response)
                    
                    $("#rab-total-value h5").text("Rp" + resp.total_biaya)
                    $("#rab-profit-value h5").text("Rp" + resp.profit + " ("+resp.margin+"%)")
                    $("#rab-oritotal-value p").text("Rp" + resp.total_biaya_ori)
                    $(".loading").hide()
                },
                error: function(request, status, error) {
                    alert(request.responseText);
                }
            });
        }

        function clearFormTambahPaket(){
            $("#kode-paket-pekerjaan-text").val("")
            $("#coa-input").val("")
            $("#coa-text").val("")
            $("#paket-pekerjaan-text").val("")
            $("#satuan-text").val("")
            $("#alias-text").val("")
        }

        function clearFormTambahItemPekerjaan(){
            $("#kode-item-pekerjaan-text").val("")
            $("#kode-pekerjaan-input").val("")
            $("#volume-item-text").val("")
            $("#kode-pekerjaan-text").val("")
            $("#pekerjaan-text").val("")
            $("#satuan-pekerjaan-text").val("")
            $("#volume-pekerjaan-text").val("")
        }
    </script>
</body>

<style>

    .analisa {
        background-color: #efefef;
        font-weight: bold;
    }

    [class^="analisa-paket-"] {
        background-color: #fafafa;
    }
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

    .modal-dialog.modal-dialog-slideout {
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


    /* Absolute Center Spinner */
    .loading {
        position: fixed;
        z-index: 999;
        height: 2em;
        width: 2em;
        overflow: show;
        margin: auto;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
    }

    /* Transparent Overlay */
    .loading:before {
        content: '';
        display: block;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));

        background: -webkit-radial-gradient(rgba(20, 20, 20, .8), rgba(0, 0, 0, .8));
    }

    /* :not(:required) hides these rules from IE9 and below */
    .loading:not(:required) {
        /* hide "loading..." text */
        font: 0/0 a;
        color: transparent;
        text-shadow: none;
        background-color: transparent;
        border: 0;
    }

    .loading:not(:required):after {
        content: '';
        display: block;
        font-size: 10px;
        width: 1em;
        height: 1em;
        margin-top: -0.5em;
        -webkit-animation: spinner 150ms infinite linear;
        -moz-animation: spinner 150ms infinite linear;
        -ms-animation: spinner 150ms infinite linear;
        -o-animation: spinner 150ms infinite linear;
        animation: spinner 150ms infinite linear;
        border-radius: 0.5em;
        -webkit-box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
        box-shadow: rgba(255, 255, 255, 0.75) 1.5em 0 0 0, rgba(255, 255, 255, 0.75) 1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) 0 1.5em 0 0, rgba(255, 255, 255, 0.75) -1.1em 1.1em 0 0, rgba(255, 255, 255, 0.75) -1.5em 0 0 0, rgba(255, 255, 255, 0.75) -1.1em -1.1em 0 0, rgba(255, 255, 255, 0.75) 0 -1.5em 0 0, rgba(255, 255, 255, 0.75) 1.1em -1.1em 0 0;
    }

    /* Animation */

    @-webkit-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @-moz-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @-o-keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes spinner {
        0% {
            -webkit-transform: rotate(0deg);
            -moz-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            -o-transform: rotate(0deg);
            transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
            -moz-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            -o-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }
</style>

</html>