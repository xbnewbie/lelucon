<html>
<head>
    <script src="<?php echo base_url();?>assets/jquery"></script>
    <!--<script src="<?php /*echo base_url();*/?>assets/pace.js"></script>-->
    <script src="<?php echo base_url();?>assets/app.js"></script>
    <link href="<?php echo base_url();?>assets/style.css" rel="stylesheet">
    <style type="text/css">

        .header-cont {

            width:100%;
            position:fixed;
            top:0px;
        }
        .header {
            text-align: center;
            font-size: large;

            height:100px;

            background:#F0F0F0;
            border:1px solid #CCC;
            width:960px;
            margin:0px auto;
        }
        .content {
            width:960px;
            background: #F0F0F0;
            border: 1px solid #CCC;
            height: 2000px;
            margin: 70px auto;
        }
        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: rgba(36, 27, 255, 0.87);
            color: white;
            text-align: center;
        }
        .tanya{
            font-size: 22px;
            width: -webkit-calc(100% - 170px - 70px);
            width: -moz-calc(100% - 170px - 70px);
            width: calc(100% - 170px - 70px);
            height: 34px;
        }
        .lbl {
            font-size: 34px;
            width: 170px;
            height: 36px;
        }
        .jawaban {
            font-size: 15px;
            width: 270px;
            height: 36px;
        }
    </style>
</head>
<body>
<div class="header">
    <h3>Jawab Parjo <?php


        ?> <br>

        <h3>
</div>
<div id="content">
    <b>Tanya Parjo</b> :
<input id="unik_id" class="unik_id" type="text" name="unik_id" autocomplete="true">
<button id="btn_unik_id" class="btn_unik_id">set dan tunggu jawaban</button>

    <div id="spinner" class="spinner">
        <img src="assets/spinner.gif">
    </div>
<div id="soal" class="soal">

</div>
    <pre></pre>
    Isi Jawaban
<input id="jawaban" class="jawaban" type="text" name="jawaban">
<button id="btn_parjo" class="btn_parjo">jawab</button>
</div>
</body>
</html>
