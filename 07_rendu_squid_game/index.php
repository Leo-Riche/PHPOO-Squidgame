<?php
class Personnage {  // Classe Personnage
    private $nom;    // Nom du personnage
    private $billes;    // Nombre de billes du personnage
    public function __construct($nom, $billes){     // Constructeur de la classe Personnage
        $this->nom = $nom;
        $this->billes = $billes;
    }
    public function getNom() {  // Getter du nom
        return $this->nom;
    }
    
    public function getBilles() {   // Getter des billes
        return $this->billes;
    }
    public function setBilles($billes) {    // Setter des billes
        $this->billes = $billes;
    }
}
class Heros extends Personnage{ // Classe Heros qui hérite de la classe Personnage
    private $bonus; // Bonus du héros
    private $malus; // Malus du héros
    private $criDeGuerre;   // Cri de guerre du héros
    public function __construct($nom, $billes, $bonus, $malus, $criDeGuerre){   // Constructeur de la classe Heros
        parent::__construct($nom, $billes);
        $this->bonus = $bonus;
        $this->malus = $malus;
        $this->criDeGuerre = $criDeGuerre;
    }
    public function getBonus() {    // Getter du bonus
        return $this->bonus;
    }
    public function getMalus() {    // Getter du malus
        return $this->malus;
    }
    public function getCriDeGuerre() {  // Getter du cri de guerre
        return $this->criDeGuerre;
    }
    public function pairOuImpair() {    // Fonction aléatoire qui détermine si le héros a fait pair ou impair
        $resultat = rand(1, 2);     // Résultat aléatoire (soit 1 soit 2)
        if ($resultat == 1) {   // Condition vérifiant si le résultat est égal à 1
            echo "Vous avez fait pair ! <br>";  // Affiche que le héros a fait pair
            return true;    // Retourne vrai
        } else {    // Condition vérifiant si le résultat est égal à 2
            echo "Vous avez fait impair ! <br>";    // Affiche que le héros a fait impair
            return false;   // Retourne faux
        }
    }
    public function triche() {  // Fonction aléatoire qui détermine si le héros a triché ou non
        $resultat = rand(1, 2); // Résultat aléatoire (soit 1 soit 2)
        if ($resultat == 1) {   // Condition vérifiant si le résultat est égal à 1
            echo "Vous avez triché ! <br>"; // Affiche que le héros a triché
            return true;    // Retourne vrai
        } else {    // Condition vérifiant si le résultat est égal à 2
            echo "Vous n'avez pas triché ! <br>";   // Affiche que le héros n'a pas triché
            return false;   // Retourne faux
        }
    }
}
class Ennemi extends Personnage{    // Classe Ennemi qui hérite de la classe Personnage
    public $age;    // Age de l'ennemi
    public function __construct($nom, $billes, $age){   // Constructeur de la classe Ennemmi
        parent::__construct($nom, $billes);
        $this->age = $age;
    }
    public function getAge() {  // Getter de l'âge
        return $this->age;
    }
}
class Jeu { // Classe Jeu
    private $heros; // Héros du jeu
    private $ennemis;   // Ennemis du jeu
    private $difficultes = ["Facile" => 5, "Difficile" => 10, "Impossible" => 20];  // Difficultés du jeu
    public function creerHeros() {  // Fonction qui crée les héros
        $SeongGiHun = new Heros("Seong Gi-Hun", 15, 1, 2, "BOOOOYAH");  // Héros
        $KangSaeByeok = new Heros("Kang Sae-Byeok", 25, 2, 1, "WAAAAAAHHHHH");  // Héros
        $ChoSangWoo = new Heros("Cho Sang-Woo", 20, 3, 0, "BOOOOOOOOHHHHH");    // Héros
        $this->heros = [$SeongGiHun, $KangSaeByeok, $ChoSangWoo];   // Tableau des héros
    }
    public function creerEnnemis($nombreEnnemis) {  // Fonction qui crée les ennemis
        for ($i = 0; $i < $nombreEnnemis; $i++) {   // Boucle qui crée les ennemis
            $ennemi = new Ennemi("Ennemi ".$i+1, rand(1, 20), rand(18, 100)); // Ennemi
            $this->ennemis[] = $ennemi; // Tableau des ennemis
        }
        return $this->ennemis;  // Retourne le tableau des ennemis
    }
    public function choixHero() {   // Fonction qui choisit un héros aléatoirement
        $this->creerHeros();    // Crée les héros
        $herosChoisi = $this->heros[array_rand($this->heros)];  // Choisi un héros aléatoirement
        return $herosChoisi;    // Retourne le héros choisi
    }
    public function choixDifficulte() { // Fonction qui choisit une difficulté aléatoirement
        $difficulteChoisie = array_rand($this->difficultes);    // Choisi une difficulté aléatoirement
        return $difficulteChoisie;  // Retourne la difficulté choisie
    }
    public function debutDuJeu() {  // Fonction qui lance le jeu
        $herosChoisi = $this->choixHero();  // Choisi un héros
        $difficulteChoisie = $this->choixDifficulte();  // Choisi une difficulté
        $this->creerEnnemis($this->difficultes[$difficulteChoisie]);    // Crée les ennemis
        echo "Bienvenue dans le jeu du Squid jeu ! <br>";   // Affiche le début du jeu
        echo "Le héros sélectionné est " . $herosChoisi->getNom() . " et possède " . $herosChoisi->getBilles() . "  billes.<br>";   // Affiche le héros choisi ainsi que ses billes
        echo "Son bonus est de gagner " . $herosChoisi->getBonus() . " billes supplémentaires et son malus est de perdre " . $herosChoisi->getMalus() . " billes supplémentaires.<br>";  // Affiche le bonus et le malus du héros
        echo "Son cri de guerre est " . $herosChoisi->getCriDeGuerre() . ".<br><br>";  // Affiche le cri de guerre du héros
        echo "La difficulté sélectionnée est " . $difficulteChoisie . ".<br>";  // Affiche la difficulté choisie
        echo "Il y a " . count($this->ennemis) . " ennemis.<br><br><br>";   // Affiche le nombre d'ennemis
        echo $this->difficultes[$difficulteChoisie] . " manches vont être jouées.<br><br><br>"; // Affiche le nombre de manches
        
        for ($i = 0; $i < $this->difficultes[$difficulteChoisie]; $i++) {   // Boucle qui lance les manches en fonction de la difficulté choisie
            $placeEnnemiActuel = array_rand($this->ennemis);    // Choisi un ennemi aléatoirement
            $ennemiActuel = $this->ennemis[$placeEnnemiActuel]; // Ennemi actuel choisit aléatoirement
            echo "L'ennemi actuel est " . $ennemiActuel->getNom() . " possède " . $ennemiActuel->getBilles() . " billes.<br>";  // Affiche l'ennemi actuel ainsi que ses billes
            if ($ennemiActuel->getAge() > 70) { // Condition vérifiant si l'ennemi actuel a plus de 70 ans
                echo $ennemiActuel->getNom() . " a " . $ennemiActuel->getAge() . " ans, vous avez la possibilité de tricher. <br>"; // Affiche le nom et l'âge de l'ennemi actuel
                if ($herosChoisi->triche() == true) {   // Condition vérifiant si le héros a triché
                    echo $herosChoisi->getNom() . " triche et gagne les billes de " . $ennemiActuel->getNom() . " ! <br>";  // Affiche le nom du héros qui a triché ainsi que le nom de l'ennemi actuel
                    $herosChoisi->setBilles($herosChoisi->getBilles() + $ennemiActuel->getBilles());    // Ajoute les billes de l'ennemi actuel au héros
                    echo "Vous avez maintenant " . $herosChoisi->getBilles() . " billes ! <br><br>";    // Affiche le nombre de billes du héros
                } else {    // Condition vérifiant si le héros n'a pas triché
                    echo $herosChoisi->getNom() . " n'a pas triché et perd ses billes ! <br><br>";  // Affiche le nom du héros qui n'a pas triché
                    continue;   // Passe à l'ennemi suivant
                }
            } else {    // Condition vérifiant si l'ennemi actuel a moins de 70 ans
                if ($herosChoisi->pairOuImpair() == true) {     // Condition vérifiant si le héros a fait pair
                    echo "Vous avez gagné " . ( $herosChoisi->getBonus() + $ennemiActuel->getBilles() ) . " billes ! <br>"; // Affiche le nombre de billes gagnées
                    $herosChoisi->setBilles($herosChoisi->getBilles() + $herosChoisi->getBonus() + $ennemiActuel->getBilles());   // Ajoute les billes gagnées au héros en prenant compte de son bonus
                    echo "Vous avez maintenant " . $herosChoisi->getBilles() . " billes ! <br><br>";    // Affiche le nombre de billes du héros
                } else {    // Condition vérifiant si le héros a fait impair
                    echo "Vous avez perdu " . ( $herosChoisi->getMalus() + $ennemiActuel->getBilles() ) . " billes ! <br>"; // Affiche le nombre de billes perdues
                    $herosChoisi->setBilles($herosChoisi->getBilles() - ( $herosChoisi->getMalus() + $ennemiActuel->getBilles() ) );    // Retire les billes perdues au héros en prenant compte de son malus
                    echo "Vous avez maintenant " . $herosChoisi->getBilles() . " billes ! <br><br>";    // Affiche le nombre de billes du héros
                }
                unset($this->ennemis[$placeEnnemiActuel]);  // Supprime l'ennemi actuel de la liste d'ennemis
            }
            if ($herosChoisi->getBilles() <= 0) {   // Condition vérifiant si le héros n'a plus de billes
                echo "Vous avez perdu ! <br><br>";  // Affiche que le héros a perdu
                break;  // Arrête la boucle
            }
        }
        if ($herosChoisi->getBilles() > 0) {    // Condition vérifiant s'il reste des billes au héros
            echo "Vous avez gagné 45,6 milliards de won sud-coréen ! <br>";  // Affiche que le héros a gagné
        } 
    }
}

$jeu = new Jeu();   // Jeu
$jeu->debutDuJeu(); // Début du jeu
?>