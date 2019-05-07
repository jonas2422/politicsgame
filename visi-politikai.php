<?php include 'inc/header.php'; ?>
<?php include 'extrastyle.php'; ?>
      <div class="topheadline">
        <h2 style="text-align: center;">VISŲ POLITIKŲ REITINGAS</h2>
      </div>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <div class="centersearch">
        <div class="cf">


      <input class="searchinline" type="text" id="search-criteria" placeholder="Politiko vardas..."/>
  </div>
      </div>

    </div>
  </div>
</div>

  <div class="visipolitikai">
    <div class="container neranera">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="tekstasnera">
            Politiko nerodo dėl šių galimų priežasčių:<br>
            1. Neteisingai įvestas seimo nario vardas arba pavardė.<br>
            2. Toks seimo narys neegzistuoja arba nedirba šioje kadencijoje.<br>
            3. Už šį politką dar niekas nebalsavo.<br>
            Nutrinkite įvestą tekstą ir mėginkite iš naujo.
          </h3>
        </div>
      </div>

    </div>

    <?php
    $sql = "SELECT * From taskai ORDER BY  taskai /balsvo, balsvo DESC";

    $res = mysqli_query($conn, $sql);
    if (mysqli_num_rows($res) > 0){
      $i=1;
      while ($row = mysqli_fetch_assoc($res)):?>
    <div class="container">
      <div <?php echo 'data-keywords="' . str_replace(array_keys($replace), $replace, $row["vardas"]) .'"'; ?> class="politikojuosta">
      <div class="row">
        <div class="col-lg-6 col-sm-12">
          <div class="politikas">
            <h2><?php echo $row["vardas"]; ?></h2>
          </div>

        </div>
        <div class="col-lg-4 col-sm-12">
          <div class="taskai">
            <h2>TAŠKAI: <?php echo $row["taskai"] . '<br> BALSAVO: ' . $row["balsvo"]; ?></h2>
          </div>

        </div>
        <div class="col-lg-2 col-sm-12">
          <div class="vieta">
            <?php if ($i == 1){
              ?>
              <h2 id="pirmavieta" style="test-align: middle;"><?php echo $i; ?> VIETA</h2>
              <?php
            }elseif($i==2){
              ?>
              <h2 id="antravieta" style="test-align: right;"><?php echo $i; ?> VIETA</h2>
              <?php
            }elseif($i==3){
              ?>
              <h2 id="treciavieta" style="test-align: right;"><?php echo $i; ?> VIETA</h2>
              <?php
            }elseif($i > 3){
              ?>
              <h2 style="test-align: right;"><?php echo $i; ?> VIETA</h2>
              <?php
            }
            $i++?>
          </div>
        </div>
        </div>
      </div>
          </div>

      <?php         endwhile;
            }?>
            <script type="text/javascript">
            $(document).ready(function(){
              $(".neranera").hide();
              $("#search-criteria").keyup(function(){
                var search = $(this).val();
                search = search.replace(/\u0119/g, "e");
                search = search.replace(/\u012F/g, "i");
                search = search.replace(/\u0173/g, "u");
                search = search.replace(/\u016B/g, "u");
                search = search.replace(/\u010D/g, "c");
                search = search.replace(/\u0161/g, "s");
                search = search.replace(/\u017E/g, "z");
                search = search.replace(/\u0117/g, "e");
                search = search.replace(/\u0105/g, "a");
                search = search.toLowerCase().replace(/\b[a-z]/g, function(letter) {
                return letter.toUpperCase();


              });

                if(search !=""){
                  $(".politikojuosta").hide();
                  $(".politikojuosta").each(function(){
                    var current = $(this).attr("data-keywords");
                    var lyguarne = current.indexOf(search);
                    if (lyguarne >= 0){
                        $(this).show();
                    }
                  });
                }
                else{
                  $(".politikojuosta").show();
                  $(".neranera").hide();
                }
                if ($(".politikojuosta:visible").length){
                  $(".neranera").hide();
                }else{
                  $(".neranera").show();
                }


              });

            });

            </script>
  </div>
<?php include 'inc/footer.php'; ?>
