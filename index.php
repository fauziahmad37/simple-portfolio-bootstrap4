<?php

function get_Curl($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);

    if (curl_errno($curl)) { 
        print curl_error($curl); 
    }

    curl_close($curl);

    return json_decode($result, true);
}

$result = get_Curl('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCWcaLXQA-fmVQay5qd5aqkg&key=AIzaSyDZyMOyEBtEOZ97-73sEzMPd4JTWnhY2zo');

$youtubeProfilePicture = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$channelName = $result['items'][0]['snippet']['title'];
$subsriber = $result['items'][0]['statistics']['subscriberCount'];

// Latest video
$urlLatestVideo = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyDZyMOyEBtEOZ97-73sEzMPd4JTWnhY2zo&channelId=UCWcaLXQA-fmVQay5qd5aqkg&maxResults=1&order=date&part=snippet';
$result = get_Curl($urlLatestVideo);
$urlLatestVideo = $result['items'][0]['id']['videoId'];

// Instagram


// Github
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.github.com/users/fauziahmad37',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_HTTPHEADER => array(
    'Cookie: _octo=GH1.1.1447006910.1654606630; logged_in=no',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/70.0.3538.102 Safari/537.36',
  ),
));

$responseGithub = curl_exec($curl);

curl_close($curl);
$responseGithub = (json_decode($responseGithub, true));


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- My CSS -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        section{
            min-height: 420px;
        }
    </style>

    <title>Portfolio | Ahmad Fauzi</title>
  </head>
  <body class="mt-5">
    
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Ahmad Fauzi</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                <a class="nav-link" href="#about">About <span class="sr-only">(current)</span></a>
                <a class="nav-link" href="#portfolio">Portfolio <span class="sr-only">(current)</span></a>
                <a class="nav-link" href="#contact">Contact <span class="sr-only">(current)</span></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <img src="img/profile1.jpeg" alt="" width="25%" class="mb-2 mt-2 rounded-circle img-thumbnail">
            <h1 class="display-4">Ahmad Fauzi</h1>
            <p class="lead">Selamat Datang di website Portfolio Ahmad Fauzi</p>
        </div>
    </div>

    <section id="about" class="about">
        <div class="container">
            <div class="row mb-4">
                <div class="col text-center">
                    <h2>About</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus autem similique cumque assumenda ipsum, illum quasi, sint nihil odit tempora alias non vero accusamus repellat dolor. Beatae, incidunt ab sed magni fugiat dignissimos similique earum sint vel rem quia ea alias sunt dolorem distinctio debitis hic illum dolorum dolores. Et eveniet explicabo voluptas delectus ipsam nulla possimus aut libero, nam harum ex dignissimos aperiam molestiae ullam quasi vero consequuntur consequatur fugit consectetur veniam nemo totam, provident iusto enim. Fugit facilis officiis consectetur laborum, doloribus non ratione, distinctio asperiores eligendi neque quo rerum omnis explicabo quia fugiat vitae, ipsum deserunt eos.
                    </p>
                </div>
                <div class="col-md-5">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ducimus porro ea ab dolores voluptate architecto atque corrupti? Ducimus veritatis explicabo, nobis adipisci, ratione alias officia et reiciendis eaque totam deserunt?
                </div>
            </div>
        </div>
    </section>

    <!-- Youtube & Instagram -->
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
                        <div class="col-md-4">
                            <img src="<?= $youtubeProfilePicture; ?>" width="200" class="rounded-circle img-thumbnail">
                        </div>
                        <div class="col-md-8">    
                            <h5><?= $channelName; ?></h5>
                            <p><?= number_format($subsriber); ?> Subscribers.</p>
                            <div class="g-ytsubscribe" data-channelid="UCWcaLXQA-fmVQay5qd5aqkg" data-layout="default" data-count="default"></div>
                        </div>
                    </div>
                    <div class="row mt-3 pb-3">
                        <div class="col">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $urlLatestVideo; ?>?rel=0" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= $responseGithub['avatar_url'] ?>" width="200" class="rounded-circle img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <h6>Github</h6>  
                            <h5><a href="<?= $responseGithub['html_url'];?>"><?= $responseGithub['login']; ?></a></h5>
                            <p><?= $responseGithub['public_repos']; ?> Public Repository.</p>
                        </div>
                    </div>
                    <!-- <div class="row mt-3 pb-3">
                        <div class="col">
                            <div class="ig-thumbnail">
                                <img src="img/2.jpg" alt="">
                            </div>
                            <div class="ig-thumbnail">
                                <img src="img/2.jpg" alt="">
                            </div>
                            <div class="ig-thumbnail">
                                <img src="img/2.jpg" alt="">
                            </div>
                        </div>
                    </div> -->
                </div>
                
            </div>
        </div>
    </section>


    <section id="portfolio" class="portfoli pb-4">
        <div class="container">
            <div class="row mb-4 pt-4">
                <div class="col text-center">
                    <h2>Portfolio</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md mb-3">
                    <div class="card">
                        <img src="img/1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md mb-3">
                    <div class="card">
                        <img src="img/2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md mb-3">
                    <div class="card">
                        <img src="img/1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </section>

    <section id="contact" class="contact mb-5 bg-light">
        <div class="container">
            <div class="row pt-4 mb-4">
                <div class="col text-center">
                    <h2>Contact Us</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="card text-white bg-primary mb-3 text-center">
                        <div class="card-body">
                          <h5 class="card-title">Contact Us</h5>
                          <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, animi!</p>
                        </div>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item"><h1>Location</h1></li>
                        <li class="list-group-item">My Office</li>
                        <li class="list-group-item">Jl. Oscar Raya, No 10E, RT001/002 Desa Bambu Apus, Kec. Pamulang</li>
                        <li class="list-group-item">Kota Tangerang Selatan, Banten. 15415</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <form>
                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pesan">Pesan</label>
                            <textarea name="pesan" id="pesan" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" class="btn btn-primary">Kirim Pesan!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-dark text-white">
        <div class="container">
            <div class="row text-center pt-3">
                <div class="col">
                    <p>Copyright 2022.</p>
                </div>
            </div>
        </div>
    </footer>













    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
    
    <!-- Youtube Subscriber -->
    <script src="https://apis.google.com/js/platform.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>