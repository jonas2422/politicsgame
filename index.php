<?php include 'inc/header.php'; ?>
    <div class="centertext">
  <h2 class="zaidimastext">Žaidimas</h2>
    </div>

<section>


  <div class="container neraneranera">
    <div class="row">
      <div class="col-lg-12">
        <h3 class="tekstasnera">
          Politiko nerodo dėl šių galimų priežasčių:<br>
          1. Neteisingai įvestas seimo nario vardas arba pavardė.<br>
          2. Toks seimo narys neegzistuoja arba nedirba šioje kadencijoje.<br>
          3. Jūs jau balsavote už šį politiką.<br>
          Nutrinkite įvestą tekstą ir mėginkite iš naujo.
        </h3>
      </div>
    </div>

  </div>
  <div id="izaidima">
  </div>
            <?php
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                        $ip = $_SERVER['HTTP_CLIENT_IP'];
                        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                        } else {
                            $ip = $_SERVER['REMOTE_ADDR'];
                          }
            foreach ($politics as $key):?>

            <?php
            $Veryga= $key['vardas'];
            $Veryga2 = str_replace(' ', '', $Veryga);

            $vienodas = "SELECT * FROM pol WHERE (politikas = '$Veryga' AND ip = '$ip')";
            $vienodasres = mysqli_query($conn, $vienodas);
           if ( mysqli_num_rows($vienodasres) > 0){
             ?>
             <script type="text/javascript">
             $(document).ready(function(){
               $("#<?php echo $Veryga2.'slide'; ?>").removeClass("mySlides");
               $("#<?php echo $Veryga2.'slide'; ?>").hide();
               $("#<?php echo $Veryga2.'slide'; ?>").remove();
               $("#kitaskairdre").click();
             });
             </script>
             <?php
           }

            ?>
      <div <?php echo 'data-keywordspol="' . str_replace(array_keys($replace), $replace, $Veryga) .'"'; ?> <?php  echo 'id="'.$Veryga2.'slide"'; ?> class="mySlides">








      <div <?php echo 'id="'.$Veryga2.'"'; ?> class="politikai">
        <?php $name = $Veryga2.'name'; ?>
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div class="centergame">

                <div class="foto">
                  <div class="paspaustabalsuoja">

                  </div>
                  <div class="kaibalsuojacenter">
                    <div class="kaibalsuoja">

                    </div>

                  </div>

                  <style media="screen">
                    <?php echo '#'.$Veryga2; ?> .foto{
                      background-image: url("<?php echo 'galerija/'.$Veryga2.'.jpg'; ?>");
                      background-position: center;
                      background-repeat: no-repeat;
                      background-size: cover;
                      height: 450px;
                      width: 100%;
                      border-radius: 25px;
                    }
                    @media only screen and (max-width: 991px) {
                      <?php echo '#'.$Veryga2; ?> .foto{
                        height: 200px;
                      }
                    }
                  </style>

                </div>
              </div>

            </div>
          </div>
          <div class="row">
            <div class="col-lg-5">
                  <div class="Politikas">
                  <p><span class="spalvint">POLITIKAS:</span> <?php echo $Veryga; ?></p>

                  </div>
                </div>
            <div class="col-lg-7">


              <div class="Balsuoti">
                <div class="centergamegame">


                <div class="sutrauktigame ">
                  <p>BALSUOTI 5 TAŠKŲ SISTEMA:</p>
                </div>

                <div class="sutrauktigame scores">

                  <form class="" action="" method="POST" target="votar">

                    <input <?php echo 'id="'.$Veryga2.'1" name="'.$name.'"'?> type="radio" value="1" required>
                    <label id="v1" <?php echo 'for="'.$Veryga2.'1"' ?>>1</label>

                    <input type="radio" <?php echo 'id="'.$Veryga2.'2" name="'.$name.'"'?> value="2" required>
                    <label id="v2" <?php echo 'for="'.$Veryga2.'2"' ?>>2</label>

                    <input type="radio" <?php echo 'id="'.$Veryga2.'3" name="'.$name.'"'?> value="3" required>
                    <label id="v3" <?php echo 'for="'.$Veryga2.'3"' ?>>3</label>

                    <input type="radio" <?php echo 'id="'.$Veryga2.'4" name="'.$name.'"'?> value="4" required>
                    <label id="v4" <?php echo 'for="'.$Veryga2.'4"' ?>>4</label>

                    <input type="radio" <?php echo 'id="'.$Veryga2.'5" name="'.$name.'"'?> value="5" required>
                    <label id="v5" <?php echo 'for="'.$Veryga2.'5"' ?>>5</label>

                </div>



              </div>
              </div>

            </div>

            </div>

          <div class="row removeonphone">
            <div class="col-lg-4 col-sm-12">
              <div class="centergame">
                <div class="reitingas">
                  <div class="alignitems">
                    <div class="displayinline">
                      <p>REITINGAS:</p>
                    </div>
                      <div class="displayinline">
                        <?php $sr = "SELECT * FROM taskai WHERE vardas = '$Veryga'";
                              $srrez = mysqli_query($conn, $sr);
                              if (mysqli_num_rows($srrez) > 0){
                                while($rezsr = mysqli_fetch_assoc($srrez)){
                                  $ats = $rezsr["taskai"] / $rezsr["balsvo"];
                                  $ats = round($ats, 2, PHP_ROUND_HALF_UP);
                                  $taskaiats = '<p><span class="pilkas">'.$ats.'</span></p>';
                                  $balsavoats = '<p><span class="pilkas">'.$rezsr["balsvo"].'</span></p>';
                                  $surinktatsk = '<p><span class="pilkas">'.$rezsr["taskai"].'</span></p>';
                                }
                              }else{
                                $taskaiats = '<p><span class="pilkas">0</span></p>';
                                $balsavoats = '<p><span class="pilkas">0</span></p>';
                                $surinktatsk = '<p><span class="pilkas">0</span></p>';
                              }
                              echo $taskaiats;
                        ?>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-sm-12">
              <div class="centergame">
                <div class="reitingas">
                  <div class="alignitems">
                    <div class="displayinline">
                      <p>BALSAVUSIŲ ŽMONIŲ:</p>
                    </div>
                      <div class="displayinline">
                        <?php echo $balsavoats; ?>
                      </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4 col-sm-12">
              <div class="centergame">
                <div class="reitingas">
                  <div class="alignitems">
                    <div class="displayinline">
                      <p>SURINKTA TAŠKŲ:</p>
                    </div>
                      <div class="displayinline">
                        <?php echo $surinktatsk; ?>
                      </div>
                  </div>
                </div>
              </div>
            </div>


          </div>

            <div class="row">

              <div class="col-lg-6">

                <button <?php echo 'id='.$Veryga2.'uzbalsuota'; ?> class="balsavimomygtukai" type="submit" <?php echo 'name="'.$Veryga2.'"'; ?>>Balsuoti</button>
              </div>
              <?php include 'ajax.php'; ?>

            </form>

            <script type="text/javascript">

            $(document).ready(function(){
              $(".paspaustabalsuoja").hide();
              $("#<?php echo $Veryga2.'uzbalsuota'; ?>").click(function(){
                if($("input[name='<?php echo $name ?>']").is(':checked')){
                  var tekstas = "<h2>Dėkojame už jūsų balsą!</h2>"
                  $.ajax({
                    url:"ajax.php", //the page containing php script
                    type: "POST", //request type
                    success:function(){
                      $("#<?php echo $Veryga2.'uzbalsuota'; ?>").prop('disabled', true);
                      $(".paspaustabalsuoja").html(tekstas);
                      $(".paspaustabalsuoja").fadeIn(300);
                      setTimeout(function() {   //calls click event after a certain time
                        $("#<?php echo $Veryga2.'slide'; ?>").removeClass("mySlides");
                        $(".paspaustabalsuoja").fadeOut();
                        $("#<?php echo $Veryga2.'slide'; ?>").hide();
                        $("#<?php echo $Veryga2.'slide'; ?>").remove();
                        $("#kitaskairdre").click();
                        $("#<?php echo $Veryga2.'uzbalsuota'; ?>").prop('disabled', false);
                      }, 1500);

                   }
                 });
               }else{
                 var tekstas = "<h2>Nepasirinkote taškų kiekio</h2>"
                 $(".paspaustabalsuoja").html(tekstas);
                 $(".paspaustabalsuoja").fadeIn(300);
                 setTimeout(function(){
                     $(".paspaustabalsuoja").fadeOut();
                 }, 1500);
               }

              });
            });
              </script>


            <div class="col-lg-6">
              <button id="kitaskairdre" class="balsavimomygtukai" onclick="plusDivs(+1)">Neturiu nuomonės</button>
            </div>
            </div>
          </div>
        </div>



      </div>

            </div>

             <?php

           endforeach;
               mysqli_close($conn);
               ?>
               <div class="container sveikinam">
                 <div class="row">
                   <div class="col-lg-12">
                     <h2 style="text-align: center; color: black;">Sveikiname tu užbalsavai už visus politikus!</h2>
                   </div>

                 </div>

               </div>
               <div class="container">
                 <div class="row">
                   <div class="col-lg-12">
                     <h2 class="arbaieskoti">ieškok politiko</h2>
                     <div class="centersearch">
                       <div class="cf">
                     <input class="searchinline" type="text" id="search-criteriapol" placeholder="Politiko vardas..." required>
                   </div>
                     <script type="text/javascript">

                     </script>




                     </div>
                   </div>

                 </div>

               </div>


    </section>
<?php include 'inc/footer.php'; ?>
