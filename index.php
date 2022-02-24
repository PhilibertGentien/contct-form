<?php
if(isset($_POST['contactform']))
{
    if(!empty($_POST['nom']) AND !empty($_POST['mail']) AND !empty($_POST['age']))
    {
        $header="MIME-Version: 1.0\r\n";
        $header.='From:"Votre nom"<your.email@gmail.com>'."\n";
        $header.='Content-Type:text/html; charset="uft-8"'."\n";
        $header.='Content-Transfer-Encoding: 8bit';

        $message='
        <html>
            <body>
                <div align="center">
                    <u>Nom de l\'expéditeur :</ul>'.$_POST['nom'].'<br/>
                    <u>Mail de l\'expéditeur :</ul>'.$_POST['mail'].'<br/>
                    <u>Age de l\'expéditeur :</ul>'.$_POST['age'].'<br/>
                    <br>
                </div>
            </body>
        </html>        
        ';

        mail("votre-email", "Sujet", $message, $header);
        $msg="Votre message a bien été envoyé !";
    }
    else
    {
        $msg="Tous les champs doivent être complétés !";
    }
}
?>
<html>
    <head>

    </head>
    <body>
        <form action="" method="POST">

            <h1>Contact Us</h1>

            <label for="nom">Votre nom</label>
            <input type="text" name="nom" id="nom" placeholder="Votre nom" value="<?php if(isset($_POST['nom'])) { echo $_POST['nom']; }?>"><br><br><br>

            <label for="mail">Votre mail</label>
            <input	type="email" name="mail" id="mail" placeholder="Votre email" value="<?php if(isset($_POST['mail'])) { echo $_POST['mail']; }?>"><br><br><br>

            <label for="age">Votre age</label>
            <input	type="text" name="age" id="age" placeholder="Votre âge"value="<?php if(isset($_POST['age'])) { echo $_POST['age']; }?>"><br><br><br>

            <input type="submit" value="Send Candidature" name="contactform">
        </form>
        <?php
        if(isset($msg))
        {
            echo $msg;
        }
        ?>
    </body>
</html>
