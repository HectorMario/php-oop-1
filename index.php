<?php 
 require_once __DIR__ . "/models/movie.php";
 require_once __DIR__ . "/models/generi.php";
 $movies = [
     $scaryMovie = new Movie("Scary Movie", 1.4, new Generi(["terror","comedy","romance"])),
     $esempio = new Movie("Esempio", 1.4, new Generi(["terror","comedy","romance"])),
    ];
    
    if (isset($_GET['title']) && isset($_GET['durata']) && isset($_GET['generi'])) {
        pushFilm();
    }
    
    function pushFilm() {
        global $movies; // Assumendo che $movies sia un array definito altrove nel tuo codice
    
        $newFilm = new Movie($_GET['title'], $_GET['durata'], new Generi($_GET['generi']));
        array_push($movies, $newFilm);
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="container-fluid text-center ms-gray">
      <div class="row row-cols-6">
        <div class="col">
          <?php foreach($movies as $movie) { ?>
          <div class="ms-container">
            <div class="info">
              <h2><?php echo ($movie->title)?></h2>
              <h3><?php echo ($movie->durata)."hours"?></h3>
              <h5>
                <span class="fi" :class="`fi-${film.original_language}`"></span>
              </h5>
              <ul>
                <?php foreach($movie->generi as $genere){?>
                <?php foreach($genere as $generiSingle){?>
                <li><?php echo $generiSingle?></li>
                <?php } ?>
                <?php } ?>
              </ul>
              <p><i class="fa-solid fa-star" style="color: #dfe30d"></i></p>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
    <form action="" method="GET">
      <div class="form-floating mb-3">
        <input
          type="text"
          class="form-control"
          id="floatingInput"
          name="title"
        />
        <label for="floatingInput">Title film</label>
      </div>
      <div class="form-floating">
        <input
          type="text"
          class="form-control"
          id="floatingPassword"
          name="durata"
        />
        <label for="floatingPassword">Quanto dura la film</label>
      </div>
      <div class="form-floating">
        <label for="generi">Géneros:</label>
        <div class="container">
          <input
            type="text"
            class="form-control"
            id="generi"
            placeholder="Generi"
            name="generi[]"
            multiple
          />
          <input
            type="text"
            class="form-control"
            placeholder="Generi"
            name="generi[]"
          />
          <input
            type="text"
            class="form-control"
            placeholder="Generi"
            name="generi[]"
          />
          <input
            type="text"
            class="form-control"
            placeholder="Generi"
            name="generi[]"
          />
        </div>
      </div>
      <div class="col-12">
        <button class="btn btn-primary" type="submit">Caricare la film</button>
      </div>
    </form>
  </body>
</html>