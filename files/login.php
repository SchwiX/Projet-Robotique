<?php
session_start();
require("./config/config.inc.php");
require_once(WAY . "/includes/autoload.inc.php");
require_once(WAY . "/includes/head.inc.php");

print_r($_SESSION);
?>


   <div class="row">
      <div class="header">
         <h3>Connexion</h3>
      </div>
   </div>
   
   <div class="panel panel-primary">
      <div class="panel-heading">
         Connexion
      </div>
      <div class="panel-body">
         <form id="connexion_form">
            <div class="form-group row">
               <label for="email_per" class="col-sm-2 col-form-label">E-mail</label>
               <div class="col-sm-10">
                  <input type="email" class="form-control" id="mail_per"  name="mail_per" placeholder="Adresse mail">
               </div>
            </div>
            <div class="form-group row">
               <label for="password_per" class="col-sm-2 col-form-label">Mot de passe</label>
               <div class="col-sm-10">
                  <input type="password" class="form-control" id="password_per"  name="password_per" placeholder="Mot de passe">
               </div>
            </div>
            <div class="form-group row">
               <div class="col-sm-offset-4 col-sm-2">
                  <input type="submit" class="form-control btn btn-primary submit" id="submit_conf" value="Se connecter">
               </div>
               <div class="col-sm-2">
                  <input type="reset" class="form-control btn btn-warning" id="reset_conf" value="Annuler">
               </div> 
            </div>
         </form>            
      </div>
     
      <div class="panel-footer">
         
      </div>
   </div>
</div>
<script src="./js/functions.js"></script>
<script src="./js/login.js"></script>
</body>
</html>