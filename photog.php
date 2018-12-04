<?php require 'header.php' ?>

<?php


  $sql = 'SELECT * FROM `photoProjects`';
  $result = mysqli_query($dbc, $sql);


  if($result){

    $allGraphicProjects = mysqli_fetch_all($result, MYSQLI_ASSOC);

  } else{
    die('Error, no results.');
  }

  $table = $_GET['table'];

?>

  <body>

    <div class="background-colour">

      <div class="link-home">
        <a href="index.php">izsi</a>
      </div>

      <div class="nav caps">
        <a href="projects.php">projects</a>
        <a href="contact.php">contact</a>
      </div>

      <div class="metier-header">

        <div class="project-title">
          Photography
        </div>

        <div class="project-blurb">
          <p class="medium-p">Nulla ac est nec nisi bibendum vehicula. Etiam luctus euismod pretium. Maecenas convallis turpis vehicula justo blandit varius.</p>
        </div>

      </div>

    </div>

      <div class="gallery-container">
        <div class="gallery-container">
          <?php if($allPhotoProjects): ?>
            <div class="gallery-container">
                  <?php foreach ($allPhotoProjects as $project): ?>
                      <img src="images/<?= $project['image0'] ?>.jpg" class="gallery-img" id="<?= $project['id'] ?>">
                  <?php endforeach; ?>
            </div>
                <?php else: ?>
                  <div class="error-message">
                    <p>No projects could be found. :c Try checking your connection! Or be patient until I have uploaded some projects to this page...</p>
                  </div>
         <?php endif; ?>
        </div>
      </div>



<script>
  var table = '<?= $table ?>';
</script>
<?php require 'footer.php'; ?>
