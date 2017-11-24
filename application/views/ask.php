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
            font-size: 34px;
            width: 170px;
            height: 36px;
        }
</style>
</head>
<body>
  <div class="header">
      <h3>Tanya Parjo <?php
          echo "$unik_id";

          ?> <br>

          <h3>
        </div>
  <div id="content">


  </div>
<p></p>

<div class="lbl"> Tanya</div> <input id="tanya" class="tanya" type="text" name="tanya">
<p>
  <center>
      <div id="sherlock">
          <img src="https://media.giphy.com/media/L70PmhHE2h5kY/giphy.gif">
          Well, tunggu sebentar, buka mata mu agar bisa ku tatap jauh ke dalam hati mu.
      </div>
      <button id="btn" class="btn">tanya parjo</button>
  </center><p>

  </p>

  <div id="jawaban" class="jawaban">

  </div>
<div class="footer">
    Anjas Newbie
</div>

</body>
</html>
