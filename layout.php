<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aldy'z Cell</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- icon ico -->
  <?php
  require "session.php";
  $iconPath = 'book2.ico';
  echo '<link rel="icon" type="image/x-icon" href="' . $iconPath . '">';
  ?>

  <!-- kodingan css  dasboard -->
 <style> 
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

/* Desktop */
@media screen and (min-width: 992px) {
  .main_box .sidebar_menu {
    width: 280px;
  }

  .sidebar_menu .menu li {
    margin-top: 6px;
    padding: 14px 20px;
  }

  .sidebar_menu .btn_two i {
    left: 240px;
  }
}

/* Tablet */
@media screen and (max-width: 991px) and (min-width: 768px) {
  .main_box .sidebar_menu {
    width: 220px;
  }

  .sidebar_menu .menu li {
    margin-top: 6px;
    padding: 10px 16px;
  }

  .sidebar_menu .btn_two i {
    left: 200px;
  }
}

/* Mobile */
@media screen and (max-width: 767px) {
  .main_box .sidebar_menu {
    width: 100%;
    position: static;
    box-shadow: none;
  }

  .sidebar_menu .logo a {
    font-size: 20px;
    line-height: 40px;
  }

  .sidebar_menu .menu {
    top: 60px;
  }

  .sidebar_menu .menu li {
    padding: 10px 12px;
  }

  .sidebar_menu .btn_two i {
    left: 16px;
  }
}

/* Common Styles for all devices */
.main_box .sidebar_menu {
  position: fixed;
  height: 100vh;
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

/* CSS for Table */
.container {
  text-align: center;
  max-width: 650px;
  margin: 0 auto;
  padding: 20px;
}

table {
  border-collapse: collapse;
  width: 100%;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

th,
td {
  padding: 12px;
  text-align: left;
  border-bottom: 1px solid #f2f2f2;
}

th {
  background-color: #f7f7f7;
  font-weight: bold;
  color: #555;
}

tr:nth-child(even) {
  background-color: #fafafa;
}

tr:hover {
  background-color: #f5f5f5;
}

/* Styling Heading */
h1 {
  font-size: 24px;
  margin-bottom: 20px;
}
    /* batas css dashboard css */


    /* styling .logout-icon */
    #logout-btn {
      border: none;
      background-color: red;
      color: #fff;
      font-size: 18px;
      display: flex;
      align-items: center;
      padding: 10px;
      cursor: pointer;
      transition: color 0.3s;
    }

    .logout-icon {
      margin-right: none;
    }

    #logout-btn:hover {
      color: #ff0000;
    }

    /* batas styling logout */

    /* styling footer copyright */
    .copyright {
      text-align: center;
      font-size: 14px;
      color: #555;
      margin-top: 20px;
      padding: 10px;
      background-color: #f7f7f7;
      border-top: 1px solid #ddd;
    }

    .copyright a {
      color: #555;
      text-decoration: none;
    }

    .copyright a:hover {
      text-decoration: underline;
    }
    /* batas footer */
 </style>

</head>

<body>
  <!-- Navbar side bar -->
  <div class="main_box">
    <input type="checkbox" id="check">
    <div class="btn_one">
      <label for="check">
        <i class="fas fa-bars"></i>
      </label>
    </div>

    <!-- side bar nama dikiri -->
    <div class="sidebar_menu">
      <div class="logo">
        <a href="#">Aldy'z Cell</a>
      </div>

      <div class="menu">
        <!-- icon side bar kiri -->
        <ul>
          <li><i class="fa-regular fa-user"></i><a href="#"><?php echo $_SESSION["userdata"]["nama"]?></a></li>
          <li><i class="fa-solid fa-house"></i><a href="index.php">Home</a></li>
          <li><i class="fa-solid fa-book"></i><a href="pegawai.php">Kelola Pegawai</a></li>
          <li><i class="fa-solid fa-book"></i><a href="#">Kelola Transaksi</a></li>
          <li><i class="fa-solid fa-book"></i><a href="produk.php">Kelola Produk</a></li>
        </ul>
      </div>

      <!-- Logout -->
      <div class="social_media">
        <ul>
          <button id="logout-btn" onclick="location.href = 'logout.php';">
            <span class="logout-icon"></span>
            <i class="fa-solid fa-right-from-bracket"></i>
            Logout
          </button>
        </ul>
      </div>
    </div>
  </div>

    <div class="container">
    <?php include $contentFile; ?>
    </div>
    <!-- footer -->
    <footer>
      <div class="copyright">
        &copy; 2023 My Website. All rights reserved. | Created by <a href="#">Kelompok 1 <i class="fa-solid fa-heart"></i></a>
      </div>
    </footer>
    <!-- batas footer -->

    <!-- javascript -->
    <script>
      // JavaScript untuk memperindah tampilan elemen pembantu
      const heartIcon = document.querySelector('.fa-heart');

      // Menambahkan efek animasi ketika kursor diarahkan ke ikon hati
      heartIcon.addEventListener('mouseover', function() {
        this.style.color = 'red';
      });
      heartIcon.addEventListener('mouseout', function() {
        this.style.color = '';
      });
    </script>
</body>

</html>