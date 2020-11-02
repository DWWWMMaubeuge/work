<?php require_once('pdo-connect.php'); ?>
<?php require_once('verifications.php'); ?>
<?php userIsLogged(); ?>
<?php include('matieres.php'); ?>
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css' integrity='sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2' crossorigin='anonymous'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Formation DWM / Auto-évaluation </title>
</head>
<body class="bg-secondary text-white">
    <?php require_once('navbar.php'); ?>
    <div class="container bg-dark my-5 p-5">
        <h1 class='text-center my-4'>Auto-évaluation</h1>
        <form class="text-center" method="POST" id="evaluation">
            <?php createRange(); ?>
            <input type="hidden" value="<?= $_SESSION['id']; ?>" name="USER" id="USER" readonly>
            <button id="send-data" class="btn btn-primary mt-3 text-center">Confirmer</button>
            <div id="confirmation"></div>
        </form>
        <div class="alert alert-info my-5 d-none text-center" role="alert" id="notification"></div>
    </div>
    <?= checkAdminForComps(); ?>
    <script type="text/javascript">
    
        function showRange(Valueselected) {
            
            let range = document.getElementById(Valueselected);

            if(range.className == "form-control-range d-none") {
                
                range.className = "form-control-range";

                setTimeout(() => {
                    
                    range.className = "form-control-range d-none";
                    document.getElementById('matiere').value = '';

                }, 3500);
            
            } else {

                range.className = "form-control-range d-none"; 

            }  

        }

    </script>
    <script>
        $('#evaluation').submit(function(e) {

            e.preventDefault();

        $.ajax({

            type: 'POST',
            url: 'traitement-evaluation.php',
            data: {
                'HTML': $('#HTML').val(),
                'CSS': $('#CSS').val(),
                'JAVASCRIPT': $('#JAVASCRIPT').val(),
                'PHP': $('#PHP').val(),
                'AJAX': $('#AJAX').val(),
                'JQUERY': $('#JQUERY').val(),
                'RESPONSIVE': $('#RESPONSIVE').val(),
                'SQL': $('#SQL').val(),
                'COMPOSER': $('#COMPOSER').val(),
                'SYMFONY': $('#SYMFONY').val(),
                'DOCTRINE': $('#DOCTRINE').val(),
                'TWIG': $('#TWIG').val(),
                'AGILE': $('#AGILE').val(),
                'GIT': $('#GIT').val(),
                'PYTHON': $('#PYTHON').val(),
                'SEO': $('#SEO').val(),
                'RGPD': $('#RGPD').val(),
                'USER': $('#USER').val()
            },
            dataType: 'html',
            success: function(data) {

                $('#notification').html(data);
                $("#notification").removeClass("alert alert-info my-5 d-none").addClass("alert alert-light my-5");
                setTimeout( function() {
                    window.location.replace("index.php");
                }, 5000)
                
            }

        });

        });

    </script>
    <?php require_once('footer.php'); ?>