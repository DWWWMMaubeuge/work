<?php

function Contact()
{
    echo $str = <<<CON
    
     <!-- ==============================================
		CONTACT
		=============================================== -->
    <section id="contact" class="add-padding">

        <div class="container text-center">

            <div class="row">

                <div class="col-sm-6 col-md-5 text-center scrollimation fade-up d1">

                    <h2 class="big-text">contacts</h2>

                    <p class="lead">
                    <p>Le cabinet de&nbsp;Odile Dessailly-Coste est situé au <br><b>208 Rue de Maubeuge 59131 ROUSIES&nbsp;</b></p>
                    <p>Infos Pratiques : <br>
                    <p>- Bus: Lignes 55 et 64 : Arrêt Rue de Maubeuge<br>- Parking: Le cabinet dispose d'un parking visiteurs<br></p>
                    <p>Email : <br>
                        <br>
                        contact@odc-conseil.fr<br>
                        <br>
                        <br>

                    <p>
                        <center>
                            <div class="btn btn-color3"><a style="text-decoration: none; color: white;" href="tel:06 11 57 62 84"><i class="fa fa-phone"></i> 06 11 57 62 84</a></div>
                        </center>
                    </p>

                    <br>
                    <br>

                    <p>
                    <center>
                    <img src="images/fleche-bas.png" class="fleche" alt="fleche-bas">
                    </center>
                    </p>

                    <p>
                        <!--<center>
                            <div class="btn btn-color3"><a style="text-decoration: none; color: white;" href="https://" target="_blank">RDV en ligne</a></div>
                        </center>-->
                    </p>

                    <p>&nbsp;</p>

                </div>

                <div class="col-sm-6 col-md-offset-1 scrollimation fade-left d3">

                    <img src="images/acces-stylise.png" class="img-responsive polaroid" alt="Accès Stylisé">

                </div>

            </div>

        </div>

    </section>
CON;
}
