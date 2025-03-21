<?php

// Inisialisasi variabel input & error
$nama = $email = $nomor = $alamat = $tipeKamar = "";
$checkin = $checkout = $jumlahOrang = "";
$namaErr = $emailErr = $nomorErr = $alamatErr = "";


// Daftar harga kamar
$hargaKamar = [
    "Deluxe Cabin" => "Rp. 300.000",
    "Executive Cabin" => "Rp. 450.000",
    "Executive Cabin with Jacuzzi" => "Rp. 600.000",
    "Family Cabin" => "Rp. 900.000",
    "Family Cabin with Jacuzzi" => "Rp. 1.000.000",
    "Romantic Cabin" => "Rp. 900.000",
    "Romantic Cabin with Jacuzzi" => "Rp. 1.500.000",
    "2 Paws Cabin" => "Rp. 800.000",
    "4 Paws Cabin" => "Rp. 900.000"
];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validasi Nama
        $nama = $_POST["nama"];
        if (empty($nama)) {
            $namaErr = "Nama wajib diisi";
        }
    
        // Validasi Email
        $email = $_POST["email"];
        if (empty($email)) {
            $emailErr = "Email wajib diisi";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Format email tidak valid (harus mengandung '@')";
        }
    
        // Validasi Nomor Telepon
        $nomor = $_POST["nomor"];
        if (empty($nomor)) {
            $nomorErr = "Nomor Telepon wajib diisi";
        } elseif (!ctype_digit($nomor)) {
            $nomorErr = "Nomor Telepon harus berupa angka";
        } elseif (strlen($nomor) < 11 || strlen($nomor) > 13) {
            $nomorErr = "Nomor Telepon harus memiliki panjang 11 hingga 13 angka";
        }
    
        // Validasi Alamat
        $alamat = $_POST["alamat"];
        if (empty($alamat)) {
            $alamatErr = "Alamat wajib diisi";
        }
    
        // Ambil data booking
        $checkin = $_POST["checkin"];
        $checkout = $_POST["checkout"];
        $jumlahOrang = $_POST["jumlahOrang"];
        $tipeKamar = $_POST["tipeKamar"];
    }
    

    // Validasi Alamat
    $alamat = $_POST["alamat"];
    if (empty($alamat)) {
        $alamatErr = "Alamat wajib diisi";
    }

    // Ambil data booking
    $checkin = $_POST["checkin"];
    $checkout = $_POST["checkout"];
    $jumlahOrang = $_POST["jumlahOrang"];
    $tipeKamar = $_POST["tipeKamar"];
}

// Variabel untuk menyimpan harga yang dipilih
$hargaTerpilih = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validasi tipe kamar dan ambil harga
    $tipeKamar = $_POST["tipeKamar"];
    if (array_key_exists($tipeKamar, $hargaKamar)) {
        $hargaTerpilih = $hargaKamar[$tipeKamar];
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Booking</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header class="header-top">
    <div class="logo">
        <img src="Logo.png" alt="boboin.aja">
    </div>
    <h3>Review Booking</h3>
</header>

<section class="rooms-section">
    <h2>Explore Amazing Rooms</h2>
    <div class="rooms-container">
        <!-- Room 1 -->
        <div class="room-card">
            <img src="Deluxe Cabin.jpeg" alt="Deluxe Cabin">
            <h3>Deluxe Cabin</h3>
            <p>Rp. 300.000.00</p>
        </div>
        <!-- Room 2 -->
        <div class="room-card">
            <img src="Executive Cabin.png" alt="Executive Cabin">
            <h3>Executive Cabin</h3>
            <p>Rp. 450.000.00</p>
        </div>
        <!-- Room 3 -->
        <div class="room-card">
            <img src="Executive Cabin with Jacuzzi.png" alt="Executive Cabin with Jacuzzi">
            <h3>Executive Cabin with Jacuzzi</h3>
            <p>Rp. 600.000.00</p>
        </div>
         <!-- Room 4 -->
         <div class="room-card">
            <img src="Family Cabin.png" alt="Family Cabin">
            <h3>Family Cabin</h3>
            <p>Rp. 900.000.00</p>
        </div>
         <!-- Room 5 -->
         <div class="room-card">
            <img src="Family Cabin with Jacuzzi.png" alt="Family Cabin with Jacuzzi">
            <h3>Family Cabin with Jacuzzi</h3>
            <p>Rp. 1.000.000.00</p>
        </div>
         <!-- Room 6 -->
         <div class="room-card">
            <img src="Romantic Cabin.png" alt="Romantic Cabin">
            <h3>Romantic Cabin</h3>
            <p>Rp. 900.000.00</p>
        </div>
        <!-- Room 7 -->
        <div class="room-card">
            <img src="Romantic Cabin with Jacuzzi.png" alt="Romantic Cabin with Jacuzzi">
            <h3>Romantic Cabin with Jacuzzi</h3>
            <p>Rp. 1.500.000.00</p>
        </div>
        <!-- Room 8 -->
        <div class="room-card">
            <img src="2 Paws Cabin.png" alt="2 Paws Cabin">
            <h3>2 Paws Cabin</h3>
            <p>Rp. 800.000.00</p>
        </div>
        <!-- Room 9 -->
        <div class="room-card">
            <img src="4 Paws Cabin.png" alt="4 Paws Cabin">
            <h3>4 Paws Cabin</h3>
            <p>Rp. 900.000.00</p>
        </div>
    </div>
</section>


    <div class="container">
        <h2>Form Pemesanan Hotel</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>">
                <span class="error"><?php echo $namaErr ? "* $namaErr" : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" value="<?php echo $email; ?>">
                <span class="error"><?php echo $emailErr ? "* $emailErr" : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="nomor">Nomor Telepon:</label>
                <input type="text" id="nomor" name="nomor" value="<?php echo $nomor; ?>">
                <span class="error"><?php echo $nomorErr ? "* $nomorErr" : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat"><?php echo $alamat; ?></textarea>
                <span class="error"><?php echo $alamatErr ? "* $alamatErr" : ""; ?></span>
            </div>

            <div class="form-group">
                <label for="checkin">Check-in:</label>
                <input type="date" id="checkin" name="checkin" value="<?php echo $checkin; ?>">
            </div>

            <div class="form-group">
                <label for="checkout">Check-out:</label>
                <input type="date" id="checkout" name="checkout" value="<?php echo $checkout; ?>">
            </div>

            <div class="form-group">
                <label for="jumlahOrang">Jumlah Orang:</label>
                <input type="number" id="jumlahOrang" name="jumlahOrang" value="<?php echo $jumlahOrang; ?>">
            </div>

            <div class="form-group">
                <label for="tipeKamar">Tipe Kamar:</label>
                <select id="tipeKamar" name="tipeKamar">
                    <option value="Deluxe Cabin" <?php if($tipeKamar == "Deluxe Cabin") echo "selected"; ?>>Deluxe Cabin</option>
                    <option value="Executive Cabin" <?php if($tipeKamar == "Executive Cabin") echo "selected"; ?>>Executive Cabin</option>
                    <option value="Executive Cabin with Jacuzzi" <?php if($tipeKamar == "Executive Cabin with Jacuzzi") echo "selected"; ?>>Executive Cabin with Jacuzzi</option>
                    <option value="Family Cabin" <?php if($tipeKamar == "Family Cabin") echo "selected"; ?>>Family Cabin</option>
                    <option value="Family Cabin with Jacuzzi" <?php if($tipeKamar == "Family Cabin with Jacuzzi") echo "selected"; ?>>Family Cabin with Jacuzzi</option>
                    <option value="Romantic Cabin" <?php if($tipeKamar == "Romantic Cabin") echo "selected"; ?>>Romantic Cabin</option>
                    <option value="Romantic Cabin with Jacuzzi" <?php if($tipeKamar == "Romantic Cabin with Jacuzzi") echo "selected"; ?>>Romantic Cabin with Jacuzzi</option>
                    <option value="2 Paws Cabin" <?php if($tipeKamar == "2 Paws Cabin") echo "selected"; ?>>2 Paws Cabin</option>
                    <option value="4 Paws Cabin" <?php if($tipeKamar == "4 Paws Cabin") echo "selected"; ?>>4 Paws Cabin</option>
                </select>
            </div>

            <div class="button-container">
                <button type="submit">Pesan Kamar</button>
            </div>
        </form>
    </div>


    <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && !$namaErr && !$emailErr && !$nomorErr && !$alamatErr) { ?>
<div class="container">
    <h3>Review Booking</h3>
    <table border="1">
        <tr>
            <th>Check-in</th>
            <td><?php echo $checkin; ?> (14.00 WIB)</td>
        </tr>
        <tr>
            <th>Check-out</th>
            <td><?php echo $checkout; ?> (12.00 WIB)</td>
        </tr>
        <tr>
            <th>Jumlah Orang</th>
            <td><?php echo $jumlahOrang; ?> orang</td>
        </tr>
        <tr>
            <th>Tipe Kamar</th>
            <td><?php echo $tipeKamar; ?></td>
        </tr>
        
    </table>

    <h3>Data Pemesan:</h3>
    <table border="1">
        <tr>
            <th>Nama</th>
            <td><?php echo $nama; ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?php echo $email; ?></td>
        </tr>
        <tr>
            <th>Nomor Telepon</th>
            <td><?php echo $nomor; ?></td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td><?php echo $alamat; ?></td>
        </tr>
    </table>
</div>

<?php } ?>

<footer class="footer">
    <div class="container">
        <div class="logo">
            <img src="Logo.png" alt="Boboin.Aja logo">
        </div>
        <div class="footer-content">
            <p>Our hotel is designed for comfort and relaxation, connecting guests with nature.</p>
        </div>
        <div class="copyright">
            <p>© Copyright Boboin.Aja, All rights reserved.</p>
        </div>
    </div>
</footer>

</body>
</html>
