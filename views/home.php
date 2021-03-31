<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- My Styles -->
    <link rel="stylesheet" href="style.css">
    <title>Jobs.at challenge</title>
</head>

<body>
<div class="container-xl bg-light px-4 py-2">

    <nav class="navbar sticky-top navbar-light bg-light mb-2">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fa fa-suitcase" aria-hidden="true"></i>
                Job Portal
            </a>
            <div class="spinner-grow spinner-grow-sm" role="status" id="spinner">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </nav>



    <!-- <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
    </div> -->



    <div class="input-group mb-4">
        <input type="text" id="search_text" class="form-control"
               placeholder="Search for job name, description or company">
        <div class="input-group-append">
            <button class="btn btn-secondary" type="button" id="search">
                <i class="fa fa-search"></i>
            </button>
        </div>
    </div>



    <div>
        <div class="card my-2 shadow p-0 mb-5 bg-white rounded" style="width: 100%;">
            <div class="card-header d-flex align-items-center">
                <h6 class="my-0">PHP Developer</h6>
                <p class="my-0">Linz</p>
            </div>
            <div class="card card-body">
                <h5 class="card-title">Hazzard GmbH</h5>
                <h6 class="card-subtitle mb-2 text-muted">18.03.2021</h6>
                <p class="card-text">
                    Unsere 200 MitarbeiterInnen in Wien, Graz und Linz führen Kunden unterschiedlichster Branchen mit Know-How und einer gesunden Portion Verständnis für das Menschliche in ihre sinnvolle, digitale Welt. Leidenschaft für Digitalisierung, florierende Expertise und autonomes, sinnstiftendes Handeln sind in unserer DNA – denn wir haben Digital im Blut!
                </p>
                <a href="#" class="card-link align-self-end mx-4">Zur job...</a>
            </div>
        </div>
    </div>

    <div id="output">

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>
<script src="script.js"></script>
</body>

</html>