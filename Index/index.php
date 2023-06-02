<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aldy'z Cell</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
  
  <!-- kodingan css -->
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    .main_box {
     
    }

    .main_box .sidebar_menu {
      position: fixed;
      height: 100vh;
      width: 280px;
      left: 0px;
      background: #1e1e1e;
      box-shadow: 0px 0px 6px rgba(255, 255, 255, 0.5);
      overflow: hidden;
      transition: all 0.3s linear;
    }

    .sidebar_menu .logo {
      position: absolute;
      width: 100%;
      height: 60px;
      box-shadow: 0px 2px 4px rgba(255, 255, 255, 0.5);
    }

    .sidebar_menu .logo a {
      color: #fff;
      font-size: 25px;
      font-weight: 500;
      position: absolute;
      left: 50px;
      line-height: 60px;
      text-decoration: none;
    }

    .sidebar_menu .menu {
      position: absolute;
      top: 80px;
      width: 100%;
    }

    .sidebar_menu .menu li {
      margin-top: 6px;
      padding: 14px 20px;
    }

    .sidebar_menu .menu i {
      color: #fff;
      font-size: 20px;
      padding-right: 8px;
    }

    .sidebar_menu .menu a {
      color: #fff;
      font-size: 20px;
      text-decoration: none;
    }

    .sidebar_menu .menu li:hover {
      border-left: 1px solid #fff;
      box-shadow: 0 0 4px rgba(255, 255, 255, 0.5);
    }

    .sidebar_menu .social_media {
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
      bottom: 20px;
      list-style: none;
      cursor: pointer;
    }

    .sidebar_menu .social_media i {
      text-decoration: none;
      padding: 0 5px;
      color: #fff;
      opacity: 0.6;
      font-size: 20px;
    }

    .sidebar_menu .social_media i:hover {
      opacity: 1;
      transition: all 0.2s linear;
      transform: scale(1.01);
    }

    #check {
      display: none;
    }

    .main_box .btn_one i {
      color: #fff;
      font-size: 30px;
      font-weight: 700;
      position: absolute;
      left: 16px;
      line-height: 60px;
      cursor: pointer;
      opacity: 1;
      transition: all 0.3s linear;
    }

    .sidebar_menu .btn_two i {
      font-size: 25px;
      line-height: 60px;
      position: absolute;
      left: 240px;
      cursor: pointer;
      opacity: 0;
      transition: all 0.3s linear;
    }

    .btn_one i:hover {
      font-size: 29px;
    }

    .btn_two i:hover {
      font-size: 24px;
    }

    #check:checked~.sidebar_menu {
      left: 0;
    }

    #check:checked~.btn_one i {
      opacity: 0;
    }

    #check:checked~.sidebar_menu .btn_two i {
      opacity: 1;
    }

    /* css table */
    .container {
  text-align: center;
  max-width: 600px;
  margin: 0 auto;
  padding: 20px;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

th {
  background-color: #f2f2f2;
  font-weight: bold;
}

tr:nth-child(even) {
  background-color: #f9f9f9;
}

tr:hover {
  background-color: #f5f5f5;
}
  </style>

</head>

<body>
  <div class="main_box">
    <input type="checkbox" id="check">
    <div class="btn_one">
      <label for="check">
        <i class="fas fa-bars"></i>
      </label>
    </div>
    <div class="sidebar_menu">
      <div class="logo">
        <a href="#">Aldy'z Cell</a>
      </div>
      <div class="btn_two">
        <label for="check">
          <i class="fas fa-times"></i>
        </label>
      </div>
      <div class="menu">
        <!-- icon -->
        <ul>
          <li><i class="fas fa-qrcode"></i><a href="#">Admin</a></li>
          <li><i class="fas fa-link"></i><a href="#">Index Utama</a></li>
          <li><i class="fas fa-stream"></i><a href="#">Kelola Pegawai</a></li>
          <li><i class="fas fa-calendar-week"></i><a href="#">Kelola Transaksi</a></li>
          <li><i class="fas fa-question-circle"></i><a href="#">Kelola Produk</a></li>
        </ul>
      </div>
      
      <!-- social media -->
      <div class="social_media">
        <ul>
          <a href="#"><i class="fab fa-facebook-f"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-youtube"></i></a>
        </ul>
      </div>
    </div>
  </div>

  <!-- Landing page  dan tabel -->
  <div class="container">
  <h1>Hasil Daftar Pegawai</h1> <br>

  <!-- tabel -->
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>City</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John Doe</td>
        <td>25</td>
        <td>New York</td>
      </tr>
      <tr>
        <td>Jane Smith</td>
        <td>30</td>
        <td>London</td>
      </tr>
      <tr>
        <td>Mark Johnson</td>
        <td>35</td>
        <td>Tokyo</td>
      </tr>
    </tbody>
  </table>
</div>

<!-- Landing page  dan tabel -->
<div class="container">
  <h1>Hasil Daftar Transaksi</h1> <br>

  <!-- tabel -->
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>City</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John Doe</td>
        <td>25</td>
        <td>New York</td>
      </tr>
      <tr>
        <td>Jane Smith</td>
        <td>30</td>
        <td>London</td>
      </tr>
      <tr>
        <td>Mark Johnson</td>
        <td>35</td>
        <td>Tokyo</td>
      </tr>
    </tbody>
  </table>
</div>

<!-- Landing page  dan tabel -->
<div class="container">
  <h1>Hasil Daftar Produk</h1> <br>

  <!-- tabel -->
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>City</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>John Doe</td>
        <td>25</td>
        <td>New York</td>
      </tr>
      <tr>
        <td>Jane Smith</td>
        <td>30</td>
        <td>London</td>
      </tr>
      <tr>
        <td>Mark Johnson</td>
        <td>35</td>
        <td>Tokyo</td>
      </tr>
    </tbody>
  </table>
</div>

</body>

</html>
