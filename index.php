<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Sadous Ga&euml;tan Bts Sio Option Slam</title>

    <link rel="stylesheet" type="text/css" href="https://gaetanse.000webhostapp.com/portfolio/semantic/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="https://gaetanse.000webhostapp.com/portfolio/css/style.css" />
    <link rel="stylesheet" type="text/css" href="https://gaetanse.000webhostapp.com/portfolio/css/css.css" />
    <script
            src="../../jquery-3.3.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous">
    </script>
    <script src="semantic/semantic.min.js"></script>

</head>
<body>
<br>
<?php
function Htmlinphp($string){
    ?>
    <?php echo $string;?>
<?php
}
require "inclusions/personnage.php";
require "inclusions/equipe.php";
require "inclusions/match.php";
?>
<center>
    <form action="#" method="post">
    <div class="inverted form segment">
    <div class="ui input">
        <input placeholder="Nom (équipe 1)" type="text" name="eq1" value="<?php if(!empty($_POST['eq1'])){echo $_POST['eq1'];} ?>">
    </div>
    <div class="ui input">
        <input placeholder="Nom (équipe 2)" type="text" name="eq2" value="<?php if(!empty($_POST['eq2'])){echo $_POST['eq2'];} ?>">
    </div>
    <div class="ui input">
        <input placeholder="Nombre de joueurs" type="text" name="joueurs" value="<?php if(!empty($_POST['joueurs'])){echo $_POST['joueurs'];} ?>">
    </div>
    <div class="ui input">
        <input placeholder="Nombre de frappe" type="text" name="frappes" value="<?php if(!empty($_POST['frappes'])){echo $_POST['frappes'];} ?>">
    </div>
    <input type="submit" value="Créer les équipes et démarrer le Match" class="ui button">
    </form>
    <hr>
<?php
if(!empty($_POST['eq1'])&&!empty($_POST['eq2'])&&!empty($_POST['joueurs'])&&!empty($_POST['frappes'])) {
    if($_POST['joueurs']>=1){
        if($_POST['frappes']>=1) {
            ?>
            <?php
            $_nomequipe1 = $_POST['eq1'];
            $_nomequipe2 = $_POST['eq2'];
            $_joueurs = $_POST['joueurs'];
            $_frappes = $_POST['frappes'];
            $_numeroEquipe=0;
            $slam1 = new Equipe($_nomequipe1, $_joueurs , 1);
            if($slam1->Ini()==1){
                Htmlinphp("<div class='horizontal  ui segments' ><div class='coteacote ui segment'><div class='red inverted ui label'>");
                echo "Equipe créer avec le nom de : ".$slam1->Get_nom()." | Equipe comportant : ".$slam1->Get_nbj()." joueurs. <br>";
                Htmlinphp("</div><br>");
                for($a=0;$a<$slam1->Get_nbj();$a++) {
                    $joueur = new Personnage(chr($a + ord('a')));
                        if ($joueur->Get_ini() == 1) {
                            Htmlinphp("<div class='ui segment black coteacote'>");
                            echo "(Nom : " . $joueur->Get_nom() . " & Force : " . $joueur->Get_force() . ")";
                            Htmlinphp("</div>");
                        }
                        $slam1->AjouterMembre($joueur);
                }
                Htmlinphp("</div></div>");
            }
            $slam2 = new Equipe($_nomequipe2, $_joueurs, 2);
            if($slam2->Ini()==1){
                Htmlinphp("<div class=\"horizontal  ui segments\" ><div class=\"coteacote  ui segment\" ><div class=\"red inverted ui label\" >");
                echo "Equipe créer avec le nom de : ".$slam2->Get_nom()." | Equipe comportant : ".$slam2->Get_nbj()." joueurs. <br>";
                Htmlinphp("</div><br>");
                        for($a=0;$a<$slam2->Get_nbj();$a++) {
                                $joueur = new Personnage(chr(ord('z') - $a));
                                if ($joueur->Get_ini() == 1) {
                                    Htmlinphp("<div class=\"ui segment black coteacote\">");
                                    echo "(Nom : " . $joueur->Get_nom() . " & Force : " . $joueur->Get_force() . ")";
                                    Htmlinphp("</div>");
                                }
                            $slam2->AjouterMembre($joueur);
                        }
                        Htmlinphp("</div></div><hr>");
            }
            $match = new Match($slam1, $slam2, $_joueurs, $_frappes);
            if($match->Ini()==1){
                Htmlinphp("<div class='purple inverted ui label'>");
                echo "Match : ".$match->Get_equipe1()->Get_nom()." contre ".$match->Get_equipe2()->Get_nom()." | Début du Match !! " .$match->Get_frappe()." frapes !!";
                Htmlinphp("</div><hr>");
                for($b=0;$b<$match->Get_frappe();$b++){
                    $un = rand(0, ($match->Get_nbj()-1));
                    $deux = rand(0, ($match->Get_nbj()-1));
                    Htmlinphp("<div class='green inverted ui label'>");
                        if($b%2==0){
                            echo "(éq1) frap:".($b+1)." (Num:".($un+1)." vs Num:".($deux+1).")<br>";
                            $match->Get_equipe2()->Get_membres($deux)->Frapper($match->Get_equipe1()->Get_membres($un)->Get_force());
                        }
                        else{
                            echo "(éq2) frap:".($b+1)." (Num:".($un+1)." vs Num:".($deux+1).")<br>";
                            $match->Get_equipe1()->Get_membres($un)->Frapper($match->Get_equipe2()->Get_membres($deux)->Get_force());
                        }
                        Htmlinphp("</div>");
                }
                Htmlinphp("<hr>");
                for($compteur=0;$compteur<$match->Get_nbj();$compteur++){
                    Htmlinphp("<div class='blue inverted ui label'>");
                    $match->Set_degatsubit1($match->Get_equipe1()->Get_membres($compteur)->Get_degats());
                    echo "(Joueur ".($compteur+1)." = ".$match->Get_equipe1()->Get_membres($compteur)->Get_degats().")";
                    Htmlinphp("</div>");
                }
                Htmlinphp("<hr>");
                for($compteur=0;$compteur<$match->Get_nbj();$compteur++){
                    Htmlinphp("<div class='blue inverted ui label'>");
                    $match->Set_degatsubit2($match->Get_equipe2()->Get_membres($compteur)->Get_degats());
                    echo "(Joueur ".($compteur+1)." = ".$match->Get_equipe2()->Get_membres($compteur)->Get_degats().")";
                    Htmlinphp("</div>");
                }
                Htmlinphp("<hr><div class='pink inverted ui label'>");
                    if($match->Get_degatsubit1()<$match->Get_degatsubit2())
                        echo "L'équipe 1 est gagnante | Equipe 1 : ".$match->Get_degatsubit1()." | Equipe 2 : ".$match->Get_degatsubit2();
                    else
                        echo "l'équipe 2 est gagnante | Equipe 1 : ".$match->Get_degatsubit1()." | Equipe 2 : ".$match->Get_degatsubit2();
                    Htmlinphp("</div><div class='grey inverted ui label'>");
                    $numero=rand(0, ($match->Get_nbj())-1);
                    if($match->Get_equipe1()->SupprimeMembre($numero)==1){
                        echo "Joueur équipe 1 numero ".($numero+1)." supprimé";
                    }
                    Htmlinphp("</div><div class='yellow inverted ui label'>");
                    if($match->Get_equipe1()->TransfereMembre($numero,$match->Get_equipe2()->Get_membres($numero))==1){
                        echo "Joueur équipe 2 numero : ".($numero+1)." transféré dans l'équipe 1 (Nom : ".$match->Get_equipe1()->Get_membres($numero)->get_nom()." & Force : ".$match->Get_equipe1()->Get_membres($numero)->get_force().")";
                    }
                    Htmlinphp("</div>");
            }
        }else{
            echo "Minimun 2 frappes et pairs";
            Htmlinphp("<hr>");
        }
    }
    else{
        echo "Minimun 1 joueurs ou pairs";
        Htmlinphp("<hr></div>");
    }
}
?>

</center>
</body>
</html>
