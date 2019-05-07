<?php include 'inc/header.php'; ?>
<?php include 'extrastyle.php'; ?>
        <div class="topheadline">
          <h2 style="text-align: center;">TOP 10 GERIAUSIŲ POLITIKŲ</h2>
        </div>

      <?php
      $sql = "SELECT * From taskai ORDER BY taskai /balsvo, balsvo DESC limit 10";
      $res = mysqli_query($conn, $sql);
      if (mysqli_num_rows($res) > 0){
        $i=1;
        while ($row = mysqli_fetch_assoc($res)):
          ?>
          <?php
          $kubilius= $row['vardas'];
          $kubilius2 = str_replace(' ', '', $kubilius);
           ?>
          <div class="container">
            <div class="top3">
            <div class="row">

              <div class="col-lg-3">
                <div class="<?php echo $kubilius2 ?>">


                  </div>
                  <style media="screen">
                  <?php echo '.'.$kubilius2; ?>{
                    background-image: url("<?php echo 'galerija/'.$kubilius2.'.jpg'; ?>");
                    background-size: cover;
                    background-position: center;
                    background-repeat: no-repeat;
                    display: block;
                    border-radius: 12px;
                    height: 100%;
                    width: 100%;
                    margin-left: 8.5%;
                  }
                  @media only screen and (max-width: 991px) {
                    <?php echo '.'.$kubilius2; ?>{
                      height: 200px;
                      width: 300px;

                      margin-left: 0;
                      margin: 0 auto;

                    }
                  }
                  </style>



              </div>
              <div class="col-lg-6">
                <div class="taskaitop">
                  <h2><?php echo $row["vardas"] ?></h2>

                  <?php
                  $reitings = $row["taskai"]/$row["balsvo"];
                  ?>
                  <p>Reitingas: <span class="podvitaskio"><?php echo  $reitings = round($reitings, 2, PHP_ROUND_HALF_UP).' / 5' ?></span> <br>
                    Balsavusių žmonių: <span class="podvitaskio"><?php echo $row["balsvo"]; ?></span><br>
                    Bendri taškai: <span class="podvitaskio"><?php echo $row["taskai"] . ' iš ' .$row["balsvo"] .' balsavusių'; ?></span></p>
                </div>
              </div>
              <div class="col-lg-3">
                <div class="vieta">
                  <?php if ($i == 1){
                    ?>
                    <h2 id="pirmavieta" style="test-align: right;"><?php echo $i.' vieta'; ?></h2>
                    <?php
                  }elseif($i==2){
                    ?>
                    <h2 id="antravieta" style="test-align: right;"><?php echo $i.' vieta'; ?></h2>
                    <?php
                  }elseif($i==3){
                    ?>
                    <h2 id="treciavieta" style="test-align: right;"><?php echo $i.' vieta'; ?></h2>
                    <?php
                  }elseif($i > 3){
                    ?>
                    <h2 style="test-align: right;"><?php echo $i.' vieta'; ?></h2>
                    <?php
                  }
                  $i++?>
                </div>
              </div>
            </div>


          </div>

        </div>
          <?php
        endwhile;
          echo $row["vardas"];

      }
      mysqli_close($conn);
       ?>

<?php include 'inc/footer.php'; ?>
