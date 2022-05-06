<?php
require_once('init.php');
require_once('process.php');
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta http-equiv="content-type" content="text/html"; charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Sainte Match</title>
    </head>
    <!--Crush Sainte va frapper fort, êtes-vous prêt ?-->
    <body>
        <center>
            <header>
                <h1>Sainte Match</h1>
            </header>
            <p id="first">On reprend un concept très chaud. 
            <p id="second">Votez pour la personne que vous préférez.</p>
            
            <div class="duel">
               <?php require_once('ajax/ajax.dual.php'); ?>
            </div>
            <!--Allez checker-->
            <footer>Créé par Crush Sainte <a href="https://www.instagram.com/crushsainte_2.0"><button>Insta</button></a></footer>
        </center>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $(".photos").click(function() {
                    $("#loader").fadeIn("fast");
                    var tokenFirst  = $(".faces:first-child .assets").attr("data-token"),
                        tokenSecond = $(".faces:last-child .assets").attr("data-token"),
                        scoreFirst  = $(".faces:first-child .assets").attr("data-token"),
                        scoreSecond = $(".faces:first-child .assets").attr("data-token"),
                        winner,
                        looser,
                        wScore,
                        lScore;

                        if(tokenFirst == $(this).attr("data-token")) {
                            winner = tokenSecond;
                            looser = tokenFirst;
                            wScore = scoreSecond;
                            lScore = scoreFirst;
                        }

                        else {
                            winner = tokenSecond;
                            looser = tokenFirst;
                            wScore = scoreSecond;
                            lScore = scoreFirst;
                        }

                        $.ajax({
                            type: "post",
                            url: "index.php",
                            data: "winner" + winner + "&looser=" + looser + "&wScore=" + wScore + "&lScore=" + lScore,
                            cache: false,
                            success: function(data) {
                                $("body").html(data);
                            }
                        });
                });
            });
        </script>
    </body>
</html>