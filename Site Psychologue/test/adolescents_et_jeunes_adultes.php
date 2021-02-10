<?php
include "Entete.php";
include "navbar.php";
include "Footer.php";
include "Contact.php";
Entete("Psychologue Maubeuge – Cabinet de psychologie ODC Conseil Hautmont");
?>


<body data-spy="scroll" data-target="#main-nav" data-offset="200">

    <!--=== PAGE PRELOADER ===-->
    <div id="page-loader"><span class="page-loader-gif"></span></div>

<?php
NavBar2();
?>
    

<!-- ==============================================
		BLOG POST
		=============================================== -->
        <section id="article" class="add-padding" style="padding-bottom:0;">
        	<div class="container">
                <ul class="links-breadcrumb">
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="blog.php">Publications</a></li>
                </ul>
				<h1>Psychologue pour adolescents</h1>
                				<img src="http://www.psychologue-paris16.com/uploads/psychologue-paris-ado.jpg" class="img-responsive featured-image" alt="psy adolescent" title="psy adolescent">
                                <div>
                	<p>Troubles de l’alimentation, consommations de produits toxiques, fréquentations douteuses, fugues du domicile ou de l’école, repli sur soi, fléchissement scolaire... Ce sont tous des signes à prendre en considération parce qu’ils expriment la souffrance de l’adolescent.&nbsp;</p><p><b>Pour les adolescents, des consultations en face à face permettent de proposer un espace où le jeune peut exprimer de ce qu'il ressent, chercher à comprendre ce qui lui arrive pour ainsi interrompre un processus pathologique. </b><br><br>Devenir adulte c’est faire des choix. Après la fin de l’école, les jeunes se trouvent à devoir réaliser les grands choix de la vie : professionnels et amoureux, affectifs. Le passage vers le devenir adulte comporte des enjeux fondamentaux.&nbsp;</p><p>Parfois les choix effectués n’ont pas été maturés et ils s’avèrent inadaptés. Ou encore, les jeunes peuvent rencontrer des échecs douloureux face aux difficultés et à la compétitivité nouvelle, que ce soit au cours des études supérieures ou dans les premières expériences professionnelles.&nbsp;</p><p><b>Un travail psychothérapeutique peut aider à surmonter ces temps de crise nouvelle, souvent temporaire.&nbsp;</b><br></p>                </div>
                <div class="share">
                	<ul>
                    	<li><a target="_blank" href="https://www.facebook.com/psychologuemaubeuge/"><i class="fa fa-fw fa-facebook"></i></a></li>
                    </ul>
                </div>
                <div class="author">
                	<hr>
                                        <div class="avatar-area">
                    	<img src="images/odile dessailly-coste z.png" class="img-responsive img-circle">
                    </div>
                    <div class="author-area">
                      	<b>Odile Dessailly-Coste</b>
                        <p>Odile Dessailly-Coste, Psychologue et Consultante en organisation sur Maubeuge et en Région Hauts de France</p>
                    </div>
                                    </div>
        	</div>
        </section>
		

    <?php
    Contact();
    Footer();
    ?>