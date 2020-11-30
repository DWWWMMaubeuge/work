<?php
require_once("database_connect.php");
$db = new DB();
$query ="SELECT * FROM flavia.formations";
$results = $db->runQuery($query);
?>
    <html>
    <head>
    <meta charset="UTF-8">
        <head>
            <style>
                body {
                    width: 615px;
                    font-family: Georgia, serif;
                    background-image: url(fond.jpg);
                }
                
                .form {
                    border: px solid rgb(94, 86, 86);;
                    color:rgb(94, 86, 86);
                    background-color: white;
                    margin: 50px 0px;
                    padding: 40px;
                    border-radius: 4px;
                    
                }
                
                .boxInput {
                    padding: 10px;
                    border:rgb(94, 86, 86); 1px solid;
                    border-radius: 4px;
                    background-color: #FFF;
                    width: 50%;
                    
                }
                
                .row {
                    padding-bottom: 15px;
                }
            </style>
            <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
            <script>
				function getLogiciels(val) {
					$.ajax({
					type: "POST",
					url: "logiciel.php",
					data:'idformations='+val,
					success: function(data){
						$("#list-logiciel").html(data);
					}
					});
				}

                function selectformations(val) {
                    $("#search-box").val(val);
                    $("#suggesstion-box").hide();
                }
            </script>
        </head>

        <body>
            <div class="form">
                <div class="row">
                    <label>Formations:</label>
                    <br/>
                    <select name="formations" id="liste-formations" class="boxInput" onChange="getLogiciels(this.value);">
                        <option value="">Sélectionnez la formation</option>
						<?php
						foreach($results as $formations) {
						?>
							<option value="<?php echo $formations["id"]; ?>"><?php echo $formations["nom"]; ?></option>
						<?php
						}
						?>
					</select>
                </div>
                <div class="row">
                    <label>Logiciels:</label>
                    <br/>
                    <select name="logiciel" id="list-logiciel" class="boxInput">
                        <option value="">Sélectionnez un logiciel</option>
                    </select>
                </div>
            </div>
        </body>
    </html>