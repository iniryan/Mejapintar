
<html><head>
    <title>Mejapintar</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/') ?>bootstrap/css/bootstrap.min.css">
</head><body style="background-image: url('<?= base_url('assets/img/Untitled-1.jpg') ?>'); background-size: auto ; background-repeat: no-repeat;">

<div class="text-uppercase">
    <h3 class="p-3"><b>mejapintar</b></h3>
</div>
<div class="text-center mt-5">
    <h1 class="text-uppercase"><b>sertifikat</b></h1>
    <h4 class="text-capitalize mt-3">diberikan kepada : </h4>
    <h3 class="mt-4 p-2 text-uppercase" style="border-bottom: 2px solid black; margin-right: 200px; margin-left: 200px;"><?= $user['username'] ?></h3>
    
    <h4 class="text-capitalize mt-3">Atas peran sertanya sebagai</h4>
    <h3 class="text-uppercase mt-3" style="color: red;">pengguna mejapintar</h3>
    <h5 class="text-capitalize mt-3 p-2" style="color: black;">Dalam Rangka telah Menyelesaikan Quiz pada Website Mejapintar dan telah mencapai Exp dengan jumlah <u><?= $profil['exp'] ?></u> 
        <br>Dan telah berpartisipasi dalam menggunakan Website Mejapintar dengan sebaik-baiknya.
    </h5>
</div>
<div class="mt-3 text-right">
    <h5>Malang, <?= date('d F Y', time()) ?></h5>

    <h5 class="mt-5 mr-4">Admin Mejapintar</h5>

</div>

</body></html>
