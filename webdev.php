<?php require 'header.php' ?>

<?php


  $sql = 'SELECT * FROM `webProjects`';
  $result = mysqli_query($dbc, $sql);


  if($result){

    $allWebProjects = mysqli_fetch_all($result, MYSQLI_ASSOC);

  } else{
    die('Error, no results.');
  }

  $table = $_GET['table'];

?>

  <body>

    <div class="background-colour">

      <div class="link-home">
        <a href="index.php">izsi<span class="hidden"> salmon</span></a>
      </div>

      <div class="nav caps">
        <a href="projects.php">projects</a>
        <a href="contact.php">contact</a>
      </div>

      <div class="metier-header">

        <div class="metier-title">
          Web Developement
        </div>

        <div class="metier-blurb">
          <p class="medium-p">Nulla ac est nec nisi bibendum vehicula. Etiam luctus euismod pretium. Maecenas convallis turpis vehicula justo blandit varius.</p>
        </div>

      </div>

    </div>

    <?php if($allWebProjects): ?>
      <div class="gallery-container">
            <?php foreach ($allWebProjects as $project): ?>
                <img src="images/<?= $project['image0'] ?>.jpg" class="gallery-img" id="<?= $project['id'] ?>">
            <?php endforeach; ?>
      </div>
          <?php else: ?>
            <div class="error-message">
              <p>Sorry, no web projects could be found.</p>
            </div>
   <?php endif; ?>

   <!-- MODAL! -->
   <div class="drop-shadow" id="modalDisplay">

     <div class="close-icon" id="closeTrigger"><i class="fas fa-times"></i></div>

      <div class="aligner-top"></div>
        <div class="modal-container-flex">

            <div class="modal" id="modalContent">
              <div class="modal-inner-content">
                <div class="modal-image-container">
                  <img id="projectImg">
                </div>
                <div class="modal-content-container">
                  <h3 id="projectTitle"></h3>
                  <div id="projectContext" class="caps text-secondary"></div>
                  <div id="projectDescription"></div>
                  <a id="projectLink" target="_blank">Check out the site</a>
                </div>
              </div>
            </div>

        </div>
      <div class="aligner-bottom"></div>

   </div>

<script>
 var table = '<?= $table ?>';
</script>
<?php require 'footer.php'; ?>
