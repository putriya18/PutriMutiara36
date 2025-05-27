<?php
function get_Curl($url)

{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);
  $result = curl_exec($curl);
  curl_close($curl);

  return json_decode($result, true);
}

$result = get_Curl("https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCRNCehbhHu5_z2KgVZQgVmg&key=AIzaSyDoP_bSxEOmS5425b7ck9KqngsXlr_SZKw");

$youtubeProfilePic = $result['items'][0]['snippet'] ['thumbnails']['default']['url'];
$channelName = $result['items'][0]['snippet']['title'];
$subscriber = $result['items'][0]['statistics']['subscriberCount'];

//latest video
$urlLatestVideo = "https://www.googleapis.com/youtube/v3/search?key=AIzaSyDoP_bSxEOmS5425b7ck9KqngsXlr_SZKw&channelId=UCRNCehbhHu5_z2KgVZQgVmg&maxResult=1&order=date&part=snippet";
$result = get_Curl($urlLatestVideo);
$latestVideoId = $result['items'][0]['id']['videoId'];

//instagram API
$clientID = "674344825574786";
$accessToken = "IGAAZAg2aneYEFBZAE11dkI0MFFtZAUFiMDhFQ3ZATZAVFib3JlR0VtUW9aVE5XQmtoVENZAZAkhwc2xkNVhNcC14WEFLYkRUc1ktVkkxazFZAYlAyOTF5bl9ibzFzUnVyeXpZAaFM1Q3hqQVhMYTRnb3c0Qi1fTGdqaU5XZAFVUbTFZARXh0VQZDZD";

$result2 = get_Curl("https://graph.instagram.com/v22.0/me?fields=username,profile_picture_url,followers_count&access_token=IGAAZAg2aneYEFBZAE11dkI0MFFtZAUFiMDhFQ3ZATZAVFib3JlR0VtUW9aVE5XQmtoVENZAZAkhwc2xkNVhNcC14WEFLYkRUc1ktVkkxazFZAYlAyOTF5bl9ibzFzUnVyeXpZAaFM1Q3hqQVhMYTRnb3c0Qi1fTGdqaU5XZAFVUbTFZARXh0VQZDZD");

$usernameIG = $result2['username'];
$profilePictureIG = $result2['profile_picture_url'];
$followersIG = $result2['followers_count'];

//media IG
$resultGambar1 = get_Curl("https://graph.instagram.com/v22.0/18444385726046325?fields=media_url&access_token=IGAAZAg2aneYEFBZAE11dkI0MFFtZAUFiMDhFQ3ZATZAVFib3JlR0VtUW9aVE5XQmtoVENZAZAkhwc2xkNVhNcC14WEFLYkRUc1ktVkkxazFZAYlAyOTF5bl9ibzFzUnVyeXpZAaFM1Q3hqQVhMYTRnb3c0Qi1fTGdqaU5XZAFVUbTFZARXh0VQZDZD");
$resultGambar2 = get_Curl("https://graph.instagram.com/v22.0/18260194252169658?fields=media_url&access_token=IGAAZAg2aneYEFBZAE11dkI0MFFtZAUFiMDhFQ3ZATZAVFib3JlR0VtUW9aVE5XQmtoVENZAZAkhwc2xkNVhNcC14WEFLYkRUc1ktVkkxazFZAYlAyOTF5bl9ibzFzUnVyeXpZAaFM1Q3hqQVhMYTRnb3c0Qi1fTGdqaU5XZAFVUbTFZARXh0VQZDZD");
$resultGambar3 = get_Curl("https://graph.instagram.com/v22.0/17942657678689009?fields=media_url&access_token=IGAAZAg2aneYEFBZAE11dkI0MFFtZAUFiMDhFQ3ZATZAVFib3JlR0VtUW9aVE5XQmtoVENZAZAkhwc2xkNVhNcC14WEFLYkRUc1ktVkkxazFZAYlAyOTF5bl9ibzFzUnVyeXpZAaFM1Q3hqQVhMYTRnb3c0Qi1fTGdqaU5XZAFVUbTFZARXh0VQZDZD");

$gambar1 = $resultGambar1['media_url'];
$gambar2 = $resultGambar2['media_url'];
$gambar3 = $resultGambar3['media_url'];


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>My Portfolio</title>
  </head>
  <body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#home">Putri Mutiara</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#portfolio">Portfolio</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="jumbotron" id="home">
      <div class="container">
        <div class="text-center">
          <img src="img/putri.jpeg" class="rounded-circle img-thumbnail">
          <h1 class="display-4">Putri Mutiara</h1>
          <h3 class="lead">Student | UI/UX Designer | Video Editor</h3>
        </div>
      </div>
    </div>

    <!-- About -->
    <section class="about" id="about">
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>About</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5">
            <p style="text-align: justify;">Proyek-proyek ini saya kerjakan sebagai bagian dari tugas kuliah untuk mengembangkan kemampuan dalam desain grafis, editing video, serta membangun narasi digital yang menarik dan komunikatif.</p>
          </div>
          <div class="col-md-5">
            <p style="text-align: justify;">Project ini saya kerjakan sebagai media belajar sekaligus eksperimen kreatif, di mana saya menggabungkan data dari YouTube dan Instagram API untuk ditampilkan secara dinamis dalam satu halaman web.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Youtube & IG -->
     <section class="social bg-light" id="social">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Social Media</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-5">
            <div class="row">
              <div class="col md-4">
                <img src="<?= $youtubeProfilePic; ?>" width="200" class="rounded-circle img-thumbnail">
              </div>
              <div class="col-md-8">
                <h5><?= $channelName; ?></h5>
                <p><?= $subscriber; ?> Subscriber.</p>
               <div class="g-ytsubscribe" data-channelid="UCRNCehbhHu5_z2KgVZQgVmg" data-layout="default" data-count="default"></div>
              </div>
            </div>
            <div class="row mt-3 pb-3">
              <div class="col">
                <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $latestVideoId; ?>" allowfullscreen></iframe>
              </div>
              </div>
            </div>
          </div>
          <div class="col-md-5">
            <div class="row">
              <div class="col md-4">
                <img src="<?= $profilePictureIG; ?>" width="200" class="rounded-circle img-thumbnail">
              </div>
              <div class="col-md-8">
                <h5><?= $usernameIG ?></h5>
                <p><?= $followersIG ?> Followers.</p>
              </div>
            </div>

      <div class="row mt-3 pb-3 justify-content-center">
        <div class="col-auto">
          <img src="<?= $gambar1; ?>" class="img-fluid" style="max-width: 100px; margin-right: 10px;">
        </div>
        <div class="col-auto">
          <img src="<?= $gambar2; ?>" class="img-fluid" style="max-width: 100px; margin-right: 10px;">
        </div>
        <div class="col-auto">
          <img src="<?= $gambar3; ?>" class="img-fluid" style="max-width: 100px;">
        </div>
      </div>

          </div>
        </div>
      </div>
     </section>

    <!-- Portfolio -->
    <section class="portfolio" id="portfolio">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Portfolio</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/1.jpeg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Website Pengarsipan Dokumen
                  Proyek ini saya buat sebagai solusi untuk mengelola dan mengarsipkan dokumen secara digital. Fitur utamanya mencakup unggah dokumen, pencarian berdasarkan kategori, serta pengunduhan arsip.</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/2.jpeg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Website Layanan Doorsmeer
                  Dibuat saat semester 4 sebagai tugas kuliah. Website ini menampilkan layanan cuci kendaraan dan menyediakan fitur booking online sederhana.</p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/3.jpeg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Login Page
                Halaman autentikasi pengguna yang aman dan mudah digunakan, dilengkapi validasi form untuk memastikan input yang benar..</p>
              </div>
            </div>
          </div>   
        </div>

        <div class="row">
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/4.jpeg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Aplikasi Kalkulator Sederhana
                   Aplikasi ini saya buat sebagai latihan dasar pemrograman pada semester 3. Fungsinya untuk melakukan operasi matematika dasar seperti penjumlahan, pengurangan, perkalian, dan pembagian.</p>
              </div>
            </div>
          </div> 
          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/5.jpeg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Juz Amma App (Flutter)
                  Aplikasi mobile berisi surat-surat pendek Juz Amma, lengkap dengan teks Arab, terjemahan, dan audio. Dibuat menggunakan Flutter sebagai latihan pengembangan aplikasi mobile.
                </p>
              </div>
            </div>
          </div>

          <div class="col-md mb-4">
            <div class="card">
              <img class="card-img-top" src="img/thumbs/6.jpeg" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">Prototype Arsip Digital
                  Desain awal website pengarsipan dokumen dengan fitur unggah, pencarian, dan manajemen file untuk efisiensi kerja administrasi.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Contact -->
    <section class="contact bg-light" id="contact">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Contact</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card bg-primary text-white mb-4 text-center">
              <div class="card-body">
                <h5 class="card-title">Contact Me</h5>
                <p class="card-text">Ada ide, pertanyaan, atau kerja sama yang ingin didiskusikan? Mari terhubung dan ngobrol lebih lanjut!.</p>
              </div>
            </div>
            
            <ul class="list-group mb-4">
              <li class="list-group-item"><h3>Location</h3></li>
              <li class="list-group-item">My Office</li>
              <li class="list-group-item">Kutacane, Aceh Tenggara</li>
              <li class="list-group-item">Indonesia</li>
            </ul>
          </div>

          <div class="col-lg-6">
            
            <form>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email">
              </div>
              <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="text" class="form-control" id="phone">
              </div>
              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" id="message" rows="3"></textarea>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-primary">Send Message</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </section>


    <!-- footer -->
    <footer class="bg-dark text-white mt-5">
      <div class="container">
        <div class="row">
          <div class="col text-center">
            <p>Copyright &copy; 2018.</p>
          </div>
        </div>
      </div>
    </footer>







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <script src="https://apis.google.com/js/platform.js"></script>
  </body>
</html>