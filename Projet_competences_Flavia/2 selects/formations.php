<?php
require_once("database_connect.php");
$db = new DB();
$query ="SELECT * FROM flavia.formations";
$results = $db->runQuery($query);
?>
    <html>
    <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <head>
            <style>
                body {
                    width: 615px;
                    font-family: Georgia, serif;
                    color:rgb(58, 54, 54);
                    background-image: url(fond.jpg);
                }
                
                .form {
                    text-align: center;
                    border: 1px solid grey;
                    background-color: white;
                    color:rgb(58, 54, 54);
                    margin-left: 700px;
                    padding: 40px;
                    border-radius: 6px;
                    width: 400px;
                    height: 200px;
                }
                
                .boxInput {
                    padding: 10px;
                    border: #bdbdbd 1px solid;
                    border-radius: 4px;
                    background-color: #c4c4c4;
                    width: 70%;
                }
                
                .rang {
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

                function selectCountry(val) {
                    $("#search-box").val(val);
                    $("#suggesstion-box").hide();
                }
            </script>
        </head>

        <body>
            <div class="form">
                <div class="rang">
                    <label>Formations</label>
                    <br/>
                    <select name="formations" id="liste-formations" class="boxInput" onChange="getLogiciels(this.value);">
                        <option value="">Sélectionnez une formation</option>
						<?php
						foreach($results as $formations) {
						?>
							<option value="<?php echo $formations["id"]; ?>"><?php echo $formations["nom"]; ?></option>
						<?php
						}
						?>
					</select>
                </div>
                <div class="rang">
                    <label>Logiciels</label>
                    <br/>
                    <select name="logiciel" id="list-logiciel" class="boxInput">
                        <option value="">Sélectionnez un logiciel</option>
                    </select>
                    <br><br>
                    <input type="button" value="Ok">
                </div>
            </div>
        </body>
    </html>