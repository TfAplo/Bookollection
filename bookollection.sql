-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 25 avr. 2023 à 00:01
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bookollection`
--

-- --------------------------------------------------------

--
-- Structure de la table `ajoutcollection`
--

CREATE TABLE `ajoutcollection` (
  `idUtilisateur` int(11) NOT NULL,
  `idLivre` int(11) NOT NULL,
  `note` int(11) DEFAULT NULL,
  `avis` varchar(200) DEFAULT NULL,
  `lu` tinyint(1) NOT NULL,
  `possede` tinyint(1) NOT NULL,
  `dateCommentaire` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ajoutcollection`
--

INSERT INTO `ajoutcollection` (`idUtilisateur`, `idLivre`, `note`, `avis`, `lu`, `possede`) VALUES
(1, 1, 4, 'Super j\'ai adoré', 0x01, 0x01),
(1, 30, 2, 'Pas trop aimé, la fin \'est pas celle que le lecteur aurait aimé', 0x01, 0x01),
(1, 57, 3, 'C\'est pas mal, quelques moments décevant tout de même', 0x01, 0x01),
(2, 1, 5, 'Meilleur livre que j\'ai lu cette année !', 0x01, 0x01),
(2, 53, 1, 'Je pense qu\'on ne peut pas faire pire honnêtement', 0x01, 0x01),
(2, 54, 5, 'Incroyable franchement !', 0x01, 0x01),
(3, 1, 4, 'Attratif tout le long, j\'ai adoré les personnages', 0x01, 0x01),
(3, 25, 4, 'Très joli livre', 0x01, 0x01),
(3, 38, NULL, NULL, 0x00, 0x00),
(3, 45, NULL, NULL, 0x00, 0x01),
(3, 46, 1, 'Nul nul et nul ! Une perte de temps', 0x01, 0x00),
(3, 47, 2, 'Je ne conseille pas', 0x01, 0x00),
(3, 16, 5, 'Encore une très belle découverte !', 0x01, 0x01);

-- --------------------------------------------------------

--
-- Structure de la table `ajoutevennement`
--

CREATE TABLE `ajoutevenement` (
  `idUtilisateur` int(11) NOT NULL,
  `idEvenement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE `auteur` (
  `idAuteur` int(11) NOT NULL,
  `nomAuteur` varchar(20) NOT NULL,
  `prenomAuteur` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`idAuteur`, `nomAuteur`, `prenomAuteur`) VALUES
(1, 'Powys Mathers', 'Edward'),
(2, 'Indridason', 'Arnaldur'),
(3, 'Tackian', 'Niko'),
(4, 'Simenon', 'Georges'),
(5, 'Doyle Conan', 'Arthur'),
(6, 'Green', 'Emma'),
(7, 'Mccullough', 'Colleen'),
(8, 'Schwab', 'Victoria'),
(9, 'Hobb', 'Robin'),
(10, 'Howard', 'Robert Ervin'),
(11, 'Huxley', 'Aldous'),
(12, 'Bradbury', 'Ray'),
(13, 'Barjavel', 'René'),
(14, 'Keyes', 'Daniel'),
(15, 'Asimov', 'Isaac'),
(16, 'Tesson', 'Sylvain'),
(17, 'Pourxet', 'Philippe'),
(18, 'Raydon', 'Coline'),
(19, 'Zykë', 'Cizia'),
(20, 'Nygardshaug', 'Gert'),
(21, 'Baudelaire', 'Charles'),
(22, 'Bouquet', 'Stéphane'),
(23, 'Sautou', 'Eric'),
(24, 'de la Fontaine', 'Jean'),
(25, 'Saez', 'Jérôme'),
(26, 'Hugo', 'Victor'),
(27, 'Devi', 'Ananda'),
(28, 'Molière', ''),
(29, 'Rodolphe', ''),
(30, 'Léo', ''),
(31, 'Janjetov', 'Zoran'),
(32, 'Martin', 'Oscar'),
(33, 'Iglesias', 'Alvaro'),
(34, 'Bourgne', 'Marc'),
(35, 'Stassi', 'Claudio'),
(36, 'Van Hamme', 'Jean'),
(37, 'Francq', 'Philippe'),
(38, 'Istin', 'Jean-Luc'),
(39, 'Saïto', 'Diogo'),
(40, 'Recht', 'Robin'),
(41, 'Eiichiro', 'Oda'),
(42, 'Kishimoto', 'Masashi'),
(43, 'Tatsuki', 'Fujimoto'),
(44, 'Wada', 'Hiroto'),
(45, 'Miyazaki', 'Hayao'),
(46, 'Takaya', 'Natsuki'),
(47, 'Sakisaka', 'Io'),
(48, 'Yoshida', 'Akimi'),
(49, 'Díaz Canales', 'Juan'),
(50, 'Racine', 'Jean'),
(51, 'Corneille', 'Pierre'),
(52, 'Bordage', 'Pierre'),
(53, 'Verne', 'Jules');

-- --------------------------------------------------------

--
-- Structure de la table `ecritpar`
--

CREATE TABLE `ecritpar` (
  `idLivre` int(11) NOT NULL,
  `idAuteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ecritpar`
--

INSERT INTO `ecritpar` (`idLivre`, `idAuteur`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 6),
(9, 8),
(10, 9),
(11, 9),
(12, 9),
(13, 10),
(14, 11),
(15, 12),
(16, 13),
(17, 14),
(18, 15),
(19, 15),
(20, 15),
(21, 16),
(22, 17),
(23, 18),
(24, 19),
(25, 20),
(26, 21),
(27, 22),
(28, 23),
(29, 24),
(30, 25),
(31, 26),
(32, 27),
(33, 28),
(34, 28),
(35, 28),
(36, 29),
(36, 30),
(36, 31),
(37, 29),
(37, 30),
(37, 31),
(38, 32),
(38, 33),
(39, 34),
(39, 35),
(40, 36),
(40, 37),
(41, 38),
(41, 39),
(42, 38),
(42, 39),
(43, 38),
(43, 39),
(44, 40),
(45, 41),
(46, 41),
(47, 41),
(48, 42),
(49, 42),
(50, 43),
(51, 44),
(52, 45),
(53, 45),
(54, 46),
(55, 47),
(56, 48),
(57, 49),
(58, 50),
(59, 51),
(60, 26),
(61, 52),
(62, 53),
(63, 53),
(64, 53);

-- --------------------------------------------------------

--
-- Structure de la table `enventesur`
--

CREATE TABLE `enventesur` (
  `idLivre` int(11) NOT NULL,
  `idSite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `enventesur`
--

INSERT INTO `enventesur` (`idLivre`, `idSite`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(3, 1),
(3, 3),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 3),
(14, 2),
(15, 2),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(29, 3),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 3),
(47, 3),
(48, 1),
(49, 1),
(50, 3),
(51, 3),
(52, 3),
(53, 3),
(54, 1),
(55, 3),
(56, 1),
(57, 3),
(58, 3),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(62, 2),
(63, 1),
(63, 2),
(63, 3);

-- --------------------------------------------------------

--
-- Structure de la table `evenement`
--

CREATE TABLE `evenement` (
  `idEvenement` int(11) NOT NULL,
  `nomEvenement` varchar(100) NOT NULL,
  `dateDebut` date DEFAULT NULL,
  `dateFin` date DEFAULT NULL,
  `description` text NOT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `evenement`
--

INSERT INTO `evenement` (`idEvenement`, `nomEvenement`, `dateDebut`, `dateFin`, `description`, `lien`, `photo`) VALUES
(1, 'BD Boom', '2022-11-18', '2022-11-20', 'Premier festival gratuit de bande dessinée en France, il est l\'un des plus importants sur le plan de la fréquention avec près de 23000 visiteurs.\r\nIl se déroule chaque année fin novembre pendant trois jours à Blois (41000).', 'https://www.blois.fr/attractive/festive/bd-boum', 'images/evenement/blois_bdboum_2022.jpg'),
(2, 'Festival d\'Angouleme', '2023-01-26', '2023-01-29', 'Principal festival de bande dessinée francophone et le plus réputé et fréquenté dans le monde. Il se déroule chaque année en janvier à Angoulême (16000).', 'https://www.bdangouleme.com/', 'images/evenement/festival_angouleme_2023.jpg'),
(3, 'Les nuits de la lecture', '2023-01-19', '2023-01-22', 'Créées en 2017 par le ministère de la Culture, \"La nuit de la lecture\" est un évènement culturel qui met en lumière la lecture sous toutes ses formes.\r\nLes bibliothèques, médiathèques et librairies ouvrent leurs portes sur des horaires étendus en proposant des animations attractives autour de la lecture.', 'https://www.nuitsdelalecture.fr/', 'images/evenement/nuits_de_la_lecture.jpg'),
(4, 'Festival du livre de Paris', '2023-04-21', '2023-04-23', 'Principal festival de bande dessinée francophone et le plus réputé et fréquenté dans le monde. Il se déroule chaque année en janvier à Angoulême (16000).', 'https://www.festivaldulivredeparis.fr/', 'images/evenement/festival_livre_paris.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `idGenre` int(11) NOT NULL,
  `nomGenre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`idGenre`, `nomGenre`) VALUES
(2, 'BD'),
(3, 'Manga'),
(5, 'Poésie'),
(1, 'Roman'),
(4, 'Théâtre');

-- --------------------------------------------------------

--
-- Structure de la table `genreestregistre`
--

CREATE TABLE `genreestregistre` (
  `idgenre` int(11) NOT NULL,
  `idregistre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genreestregistre`
--

INSERT INTO `genreestregistre` (`idgenre`, `idregistre`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 13),
(2, 1),
(2, 2),
(2, 4),
(2, 5),
(3, 10),
(3, 11),
(3, 12),
(4, 8),
(4, 9),
(5, 6),
(5, 7),
(5, 8);

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE `livre` (
  `idLivre` int(11) NOT NULL,
  `titre` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `couverture` varchar(100) NOT NULL,
  `dateParution` date DEFAULT NULL,
  `idGenre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livre`
--

INSERT INTO `livre` (`idLivre`, `titre`, `description`, `couverture`, `dateParution`, `idGenre`) VALUES
(1, 'La mâchoire de Caïn', 'Six meurtres.<br/>Cent pages.<br/>Des millions de possibilités…<br/>Une seule est la bonne.<br/>Les pages de ce livre ont été accidentellement imprimées dans le désordre, mais il est possible - avec un peu d\'intelligence et de logique - de les remettre dans l\'ordre, et de découvrir ainsi qui sont les six victimes et leurs meurtriers.<br/><br/>Depuis 1934, seulement trois personnes ont réussi à résoudre l\'énigme de La Mâchoire de Caïn : êtes-vous suffisamment fort pour rejoindre leur rang ?<br/><br/>Avertissement : cette énigme diabolique est déconseillée aux âmes sensibles.', 'laMachoireDeCain.jpeg', '1934-01-01', 1),
(2, 'Le mur des silences', 'Dans une vieille maison, une paroi de la cave s\'effondre et révèle un corps emmuré. Cette découverte macabre se mêle aux recherches inlassables de Konrad pour faire la lumière sur l\'assassinat de son père. Pressant la police d\'enquêter, ce dernier oublie ses mensonges de l\'époque et se retrouve inculpé. Faut-il croire les fantômes du passé ? La vérité est-elle seulement souhaitable ? Entre violence familiale, sacrifices et impunité, les cold cases ressurgissent toujours…', 'leMurDesSilences.jpeg', '2022-02-04', 1),
(3, 'Respire', 'Le sable très blanc, l\'océan turquoise. Voici ce que découvre Yohan à son réveil. Un endroit paradisiaque où il va entamer une nouvelle vie. Avoir une deuxième chance d\'être heureux. Pour arriver sur cette île inconnue, il a signé un contrat avec une mystérieuse société qui promettait de le faire disparaître et d\'effacer toute trace de son passé.<br/>Les premiers jours, Yohan savoure son insouciance retrouvée. Mais peu à peu, un sentiment d\'étrangeté le gagne. L\'île héberge une dizaine d\'habitants plus énigmatiques les uns que les autres. Pourtant les maisons abandonnées, les échoppes désertes dans les rues balayées par le vent laissent penser qu\'un jour ils ont été bien plus nombreux. Où sont passés les autres ?<br/>Yohan veut comprendre. Mais jamais il n\'aurait dû chercher à voir l\'envers du décor. Car c\'est bien connu, la connaissance fait voler en éclats le paradis...Un brillant exercice de style sur la mémoire, la faute et l\'expiation. ', 'respire.jpeg', '2022-01-05', 1),
(4, 'Le chien jaune', 'Vendredi 7 novembre. Concarneau est désert. L\'horloge lumineuse de la vieille ville, qu\'on aperçoit au-dessus des remparts, marque onze heures moins cinq.<br/>C\'est le plein de la marée et une tempête du sud-ouest fait s\'entrechoquer les barques dans le port. Le vent s\'engouffre dans les rues, où l\'on voit parfois des bouts de papier filer à toute allure au ras du sol.<br/>Quai de l\'Aiguillon, il n\'y a pas une lumière. Tout est fermé. Tout le monde dort. Seules les trois fenêtres de l\'hôtel de l\'Amiral, à l\'angle de la place et du quai, sont encore éclairées…', 'leChienJaune.jpeg', '1931-04-01', 1),
(5, 'Sherlock Holmes : Le chien des baskervil', 'Une malédiction pèse sur les Baskerville qui habitent le vieux manoir de leurs ancêtres, perdu au milieu d\'une lande sauvage : quand un chien-démon, une bête immonde, gigantesque, surgit, c\'est la mort.<br/>Le décès subit et tragique de Sir Charles Baskerville et les hurlements lugubres que l\'on entend parfois venant du marais, le grand bourbier de Grimpen, accréditent la sinistre légende.<br/>Dès son arrivée à Londres, venant du Canada, Sir Henry Baskerville, seul héritier de Sir Charles, reçoit une lettre anonyme : « Si vous tenez à votre vie et à votre raison, éloignez-vous de la lande. » Malgré ces menaces, Sir Henry décide de se rendre à Baskerville Hall, accompagné de Sherlock Holmes et de son fidèle Watson.<br/>Roman captivant, angoissant, Le Chien des Baskerville est l\'une des plus célèbres aventures de Sherlock Holmes.', 'leChienDeBaskerville.jpeg', '1905-01-01', 1),
(6, 'Fallait pas me chercher', 'Un roman à deux voix... explosif !<br/>Valentine Cox est fière, indépendante et volontaire. Seul problème ? Elle a une fâcheuse tendance à se mettre en danger.<br/>Son père lui impose alors Nils Eriksen, garde du corps aussi insupportable que sexy. La cohabitation est chaotique, Valentine refuse de se soumettre aux règles de sécurité et défie constamment Nils.<br/>Lui a beau être patient, la princesse au caractère de feu l\'agace prodigieusement… Deux options : se sauter à la gorge ou se sauter dessus !', 'fallaitPasMeChercher.jpeg', '2016-06-23', 1),
(7, 'Les oiseaux se cachent pour mourir', 'Sur ces terres brûlantes d\'Australie, les Cleary vont entamer une nouvelle vie, loin de la misère qu\'ils ont connue dans leur Nouvelle-Zélande natale. Pour Meggie, neuf ans, seule fille de cette famille de huit enfants, ce nouveau départ se présente sous les traits du père Ralph. Séduisant, doux, généreux, le jeune homme la marque à jamais, lui inspirant des sentiments qui ne cessent de grandir au fil des ans…<br/>Pour se délivrer de cette attirance réciproque, Meggie n\'a plus le choix à présent : elle se résout à accepter les avances d\'un saisonnier. Quant à Ralph, fidèle à sa vocation, il décide de poursuivre sa carrière ecclésiastique loin de cet amour qu\'il croit impossible…', 'lesOiseauxSeCachentPourMourir.jpeg', '1977-01-01', 1),
(8, 'Recherche coloc : emmerdeurs, raleurs, l', 'Il y a Brody, l\'architecte sexy ; Dermott, le prof de philo en slip ; Charlotte, l\'amie des bêtes mais pas des gens ; Callum, le rugbyman malentendant ; Elif, la boulimique de romances ; et Maeve, qui préfère collectionner les mecs plutôt que les livres. Au milieu de ces colocataires fantasques et parfois invivables, Ada la solitaire va devoir répondre à trois questions existentielles et plutôt urgentes : comment survivre dans cette maison de fous ? Comment reconstruire sa vie à Dublin, quinze ans après son départ forcé ? Et comment ne pas tomber amoureuse de Brody Gallagher, le bel Irlandais qu\'elle a embauché pour rénover l\'appartement de son enfance ? Mais à part ça, tout va bien.', 'rechercheColoc.jpeg', '2020-02-13', 1),
(9, 'La vie invisible d\'Addie Larue', 'Une nuit de 1714, dans un moment de désespoir, une jeune femme avide de liberté scelle un pacte avec le diable. Mais si elle obtient le droit de vivre éternellement, en échange, personne ne pourra jamais plus se rappeler ni son nom ni son visage. La voilà condamnée à traverser les âges comme un fantôme, incapable de raconter son histoire, aussitôt effacée de la mémoire de tous ceux qui croisent sa route.<br/>Ainsi commence une vie extraordinaire, faite de découvertes et d\'aventures stupéfiantes, qui la mènent pendant plusieurs siècles de rencontres en rencontres, toujours éphémères, dans plusieurs pays d\'Europe d\'abord, puis dans le monde entier. Jusqu\'au jour où elle pénètre dans une petite librairie à New York : et là, pour la première fois en trois cents ans, l\'homme derrière le comptoir la reconnaît. Quelle peut donc bien être la raison de ce miracle ? Est-ce un piège ou un incroyable coup de chance ? <br/>Embarquée dans un voyage à travers les époques et les continents, poursuivie par un démon lui-même fasciné par sa proie... jusqu\'où Addie ira-t-elle pour laisser sa marque, enfin, sur le monde ?<br/><br/>V. E. Schwab, qui portait ce récit en elle depuis ses débuts, vient enfin de coucher sur le papier son roman le plus personnel. Découvrez l\'histoire, sur plus de trois siècles, d\'une femme dos au mur mais pourtant indomptable, et de son affrontement avec les forces obscures qui cherchent à la réduire au silence.', 'laVieInvisibleDAddieLarue.jpeg', '2021-06-03', 1),
(10, 'L’assassin royal t.1 : l\'apprenti assass', 'Au royaume des Six-Duchés, le prince Chevalerie, de la famille régnante des Loinvoyant, renonce à devenir roi-servant le jour où il apprend l\'existence de Fitz, son fils illégitime. Le bâtard grandit à Castelcerf, sous l\'autorité de Burrich, le maître d\'écurie. Mais le roi Subtil exige que Fitz reçoive une éducation princière. L\'enfant découvre bientôt que le dessein du monarque est tout autre : faire de lui un assassin au service du pouvoir. Et tandis que les attaques des Pirates rouges mettent la contrée en péril, Fitz va constater à chaque instant que sa vie ne tient qu\'à un fil : celui de sa lame.', 'lAssassinRoyalT1.jpeg', '1998-12-17', 1),
(11, 'L\'assassin royal t.2 : l\'assassin du roi', 'Les Pirates rouges sèment la désolation dans les Six-Duchés. Le royaume ne dispose que de ressources limitées pour les combattre. Le roi est seul, entouré d\'une cour qui intrigue, d\'une armée qui doute et... d\'un assassin royal. Fitz est à présent devenu une arme redoutable. Il maîtrise le Vif - la faculté de communiquer avec les animaux - et l\'Art. Guerrier accompli, rompu à tuer, il incarne la justice du roi. Une charge d\'autant plus lourde qu\'il lui faut faire obstacle aux ambitions du prince Royal, un usurpateur en puissance...', 'lAssassinRoyalT2.jpeg', '1999-02-05', 1),
(12, 'L\'assassin royal t.3 : la nef du crépusc', 'Le royaume des Six-Duchés ploie sous le joug de l\'envahisseur. Les navires de guerre ne parviennent plus à tenir les pirates en respect. Des dissensions éclatent entre les duchés côtiers, pilonnés par les attaques de l\'ennemi, et ceux de l\'intérieur qui se désintéressent de leur sort. La cour elle-même n\'est plus qu\'un théâtre de marionnettes où règnent le soupçon et la traîtrise. Le prince Vérité décide d\'entreprendre une quête insensée : aller trouver les Anciens pour leur rappeler qu\'ils ont juré de venir en aide au royaume à ses heures les plus sombres.', 'lAssassinRoyalT3.jpeg', '1999-09-16', 1),
(13, 'Conan le cimmérien', '« Sache, ô Prince, qu\'entre l\'époque qui vit l\'engloutissement de l\'Atlantide et des villes étincelantes... il y eut un Âge insoupçonné, au cours duquel des royaumes resplendissants s\'étalaient à la surface du globe... Mais le plus illustre des royaumes de ce monde était l\'Aquilonie, dont la suprématie était incontestée dans l\'Occident rêveur. C\'est en cette contrée que vint Conan, le Cimmérien - cheveux noirs, regard sombre, épée au poing, un voleur, un pillard, un tueur, aux accès de mélancolie tout aussi démesurés que ses joies - pour fouler de ses sandales les trônes constellés de joyaux de la Terre. »<br/><br/>Conan est l\'un des personnages de fiction les plus connus au monde. Robert E. Howard l\'a créé en 1932 et avec lui, l\'Heroïc Fantasy. Ce héros, ainsi que la puissance évocatrice de l\'écriture de son auteur, a eu et a toujours une influence majeure, au moins égale à celle de Tolkien, sur tout l\'imaginaire occidental. Pourtant, les nouvelles du Cimmérien n\'ont jamais été publiées telles que son auteur les avait conçues. Elles ont été réarrangées, réécrites, modifiées, artificiellement complétées après sa mort. C\'est pourquoi le livre que vous tenez dans vos mains est un événement. C\'est le premier de trois volumes qui rassemblent l\'intégralité des aventures de Conan, présentées dans l\'ordre de leur rédaction, restituées dans leur version authentique à partir des manuscrits originaux, avec des traductions nouvelles ou entièrement révisées. Elles s\'accompagnent de nombreux inédits, ainsi que d\'articles et de notes sur l\'oeuvre de Robert E. Howard et l\'univers de Conan par Patrice Louinet, qui en est l\'un des plus éminents spécialistes internationaux.', 'conanLeCimmerien.jpeg', '1982-03-01', 1),
(14, 'Le meilleur des mondes', 'Voici près d\'un siècle, dans d\'étourdissantes visions, Aldous Huxley imagine une civilisation future jusque dans ses rouages les plus surprenants : un État Mondial, parfaitement hiérarchisé, a cantonné les derniers humains « sauvages » dans des réserves. La culture in vitro des foetus a engendré le règne des « Alphas », génétiquement déterminés à être l\'élite dirigeante. Les castes inférieures, elles, sont conditionnées pour se satisfaire pleinement de leur sort. Dans cette société où le bonheur est loi, famille, monogamie, sentiments sont bannis. Le meilleur des mondes est possible. Aujourd\'hui, il nous paraît même familier...', 'leMeilleurDesMondes.jpeg', '1932-01-01', 1),
(15, 'Fahrenheit 451', '451 degrés Fahrenheit représentent la température à laquelle un livre s\'enflamme et se consume. Dans cette société future où la lecture, source de questionnement et de réflexion, est considérée comme un acte antisocial, un corps spécial de pompiers est chargé de brûler tous les livres, dont la détention est interdite pour le bien collectif. Montag, le pompier pyromane, se met pourtant à rêver d\'un monde différent, qui ne bannirait pas la littérature et l\'imaginaire au profit d\'un bonheur immédiatement consommable. Il devient dès lors un dangereux criminel, impitoyablement poursuivi par une société qui désavoue son passé.', 'fahrenheit451.jpeg', '1955-03-01', 1),
(16, 'La nuit des temps', 'L\'Antarctique. À la tête d\'une mission scientifique française, le professeur Simon fore la glace depuis ce qui semble une éternité. Dans le grand désert blanc, il n\'y a rien, juste le froid, le vent, le silence.<br/>Jusqu\'à ce son, très faible. À plus de 900 mètres sous la glace, quelque chose appelle. Dans l\'euphorie générale, une expédition vers le centre de la Terre se met en place.<br/><br/>Un roman universel devenu un classique de la littérature mêlant aventure, histoire d\'amour et chronique scientifique.', 'laNuitDesTemps.jpeg', '1968-01-01', 1),
(17, 'Des fleurs pour Algernon', 'Algernon est une souris dont le traitement du Pr Nemur et du Dr Strauss vient de décupler l\'intelligence. Enhardis par cette réussite, les savants tentent, avec l\'assistance de la psychologue Alice Kinnian, d\'appliquer leur découverte à Charlie Gordon, un simple d\'esprit. C\'est bientôt l\'extraordinaire éveil de l\'intelligence pour le jeune homme. Il découvre un monde dont il avait toujours été exclu, et l\'amour qui naît entre Alice et lui achève de le métamorphoser.<br/>Mais un jour, les facultés supérieures d\'Algernon commencent à décliner…', 'desFleursPourAlgernon.jpeg', '1972-01-01', 1),
(18, 'Le cycle des robots t.1 - Les Robots', 'Première Loi : Un robot ne peut porter atteinte à un être humain ni, restant passif, laisser cet être humain exposé au danger.<br/>Deuxième Loi : Un robot doit obéir aux ordres donnés par les êtres humains, sauf si de tels ordres entrent en contradiction avec la Première Loi.<br/>Troisième Loi : Un robot doit protéger son existence dans la mesure où cette protection n\'entre pas en contradiction avec la Première ou la Deuxième Loi.', 'leCycleDesRobots1.jpeg', '1967-01-01', 1),
(19, 'Le cycle des robots t.2 - Un défilé de r', 'Après«Les robots», Isaac Asimov appronfondit les implications de ces célèbres lois de la robotique qui régissent le comportement des robots, censés obéir à leurs concepteurs sans jamais pouvoir leur nuire.', 'leCycleDesRobots2.jpeg', '1967-01-01', 1),
(20, 'Le cycle des robots t.3 - Les cavernes d', 'L\'assassinat du docteur Sarton à Spacetown jette le trouble dans la communauté. Qui aurait intérêt à faire disparaître celui-là même qui milite pour le rapprochement entre Terriens et Spaciens ? Les Médiévalistes, qui ne voient pas d\'un très bon oeil la prolifération des robots ? Les Spaciens eux-mêmes, prêts à tout pour conserver leurs privilèges ? Le problème du détective Baley, toutefois, n\'est pas seulement de retrouver un meurtrier, mais aussi et surtout d\'y parvenir avant son collègue robot R. Daneel. Car celui-ci est l\'un de ces androïdes au cerveau électronique ultra-perfectionné, créés certes par l\'homme, mais qui n\'attendent peut-être que l\'occasion de prendre sa place…', 'leCycleDesRobots3.jpeg', '1967-01-01', 1),
(21, 'La panthère des neiges', '«Il y a une bête au Tibet que je poursuis depuis six ans, dit Munier. Elle vit sur les plateaux. Il faut de longues approches pour l\'apercevoir. J\'y retourne cet hiver, viens avec moi.<br/>- Qui est-ce ?<br/>- La panthère des neiges, dit-il.<br/>- Je pensais qu\'elle avait disparu, dis-je.<br/>- C\'est ce qu\'elle fait croire.»', 'laPanthereDesNeiges.jpeg', '2019-10-10', 1),
(22, 'Les pirates et le code aztèque', '1525 : Cuauhtémoc, le dernier empereur aztèque, meurt assassiné par Herman Cortéz en ayant pris soin de lui dissimuler l\'endroit où il a amassé l\'essentiel des richesses de son peuple.<br/>1672 : Sur la route des Amériques, le navire du pirate Le Floc\'h s\'empare de la cargaison d\'un galion espagnol. Ses cales contiennent une partie des joyaux aztèques confisqués par les conquistadors, mais surtout une clef cryptée permettant de situer l\'emplacement du trésor de Cuauhtémoc.<br/>De nos jours : Membre de l\'Ordre d\'Amus, le français Prat, assisté des professeurs Toussaint et Garnier, s\'engage sur la piste de l\'île au trésor de Le Floc\'h. Une course effrénée débute pour percer les indices laissés derrière lui par le pirate. La situation se complique dès lors qu\'ils apprennent que sur leur chemin se dressent un dangereux armateur américain, ainsi que le chef du plus important cartel mexicain : le terrifiant Alfonso Mendoza... Tous deux désirent s\'emparer du trésor... à n\'importe quel prix...Un thriller palpitant qui vous mènera de la Normandie au Sud-ouest américain, en passant par le Pacifique, Panama, l\'Italie et le Mexique...', 'lesPiratesEtLeCodeAzteques.jpeg', '2022-08-18', 1),
(23, 'Les Vertigineuses : Rencontre avec l\'Ama', 'L\'aventure commence... Le sac sur le dos, l\'équipe scoute prend la direction de l\'Amazonie, prête à pénétrer au coeur de ce territoire sauvage pour s\'immerger dans la nature, bien décidée à bousculer ses habitudes et à faire preuve d\'adaptation. Son objectif : apporter son aide à un centre de secours pour animaux victimes du braconnage avant de sillonner l\'Équateur. Les Vertigineuses se rendent utiles !', 'lesVertigineusesRencontresAvecLAmazonie.jpeg', '2022-08-10', 1),
(24, 'Oro', 'Dans les années 1980, pour oublier la mort de son fils, Cizia Zykë se lance dans l\'aventure de l\'or au Costa Rica parmi les policiers corrompus, les prostituées, les trafiquants en tous genres.<br/><br/>Excellent manipulateur, intuitif et bouffeur de têtes, 357 Magnum bien en vue, il nous attire dans son univers ahurissant ou nous n\'oserions pas aller. Plus qu\'un récit, c\'est une véritable leçon de vie. Le sexe, la drogue, les dollars, la folie, l\'humour, la violence, les maladies, tout dans cette aventure vécue est bien réel.<br/><br/>Dans cette jungle hostile, truffée de serpents et de moustiques agressifs, en dictateur, il mène son équipe de psychopathes alcooliques jusqu\'à leurs extrêmes limites. Sa soif de liberté et son audace l\'obligent à traversée toutes ces embrouilles à un rythme de folie incroyable ou rien ne le fera fléchir pour atteindre son but : l\'OR.', 'oro.jpeg', '1985-01-01', 1),
(25, 'Chimera', 'Forêt tropicale du Congo, 2030. Une équipe de scientifiques de différentes nationalités étudient les effets du changement climatique sur les espèces animales et végétales. Lorsque Nelson - le mâle alpha, au tempérament docile, d\'un groupe de gorilles - commence à attaquer sans raison ses semblables, en dévorant même plusieurs d\'entre eux, l\'équipe décide de le neutraliser. Ils découvrent alors la présence d\'un virus inconnu redoutable, susceptible d\'effacer une grande majorité de la population mondiale, qu\'ils surnomment Chimera. Mais là où certains y voient une menace sans précédent, d\'autres entrevoient une lueur d\'espoir pour la planète...', 'chimera.jpeg', '2023-03-01', 1),
(26, 'Les fleurs du mal', 'Dans ce chef-d\'oeuvre de la poésie moderne écrit entre 1840 et 1857, Baudelaire s\'éloigne du style convenu et des codes stricts de la poésie classique.<br/>Sa poésie exprime le spleen, un mal de vivre formé d\'un mélange d\'ennui et d\'angoisse existentielle. Il rompt aussi avec un romantisme qui loue la Nature pour célébrer la ville et Paris, métamorphosée par Haussmann. Cette anthologie se présente comme une chaîne de poèmes qui s\'entremêlent et se relient les uns aux autres, une histoire dans laquelle le poète s\'éloigne progressivement d\'une misérable réalité et s\'immerge dans les excès de la vie. Baudelaire capte, à l\'aide d\'images, les symboles dont nous sommes entourés et que nous ne percevons pas. Les Fleurs du mal lui vaudront une condamnation pour outrage à la morale publique.', 'lesFleursDuMal.jpeg', '1857-06-21', 5),
(27, 'Le fait de vivre', 'Dans son dernier recueil, le poète Stéphane Bouquet sonde, non pas la vie, mais « le fait de vivre ». Entre les mots, dans une langue poétique constituée d’annotations orales et d’élans plus lyriques, empreints d’énergie et de vivacité, il part en quête d’un lieu où la vie comme « seul refuge » serait plus vivable, et où les corps et les paysages, dans leur lumière, reflètent le temps présent et à venir.', 'leFaitDeVivre.jpeg', '2021-04-08', 5),
(28, 'Beaupré', '« vois comme le jardin<br/>la maison désormais<br/>et comme ici nous sommes<br/>seule à seul désormais ça n’a plus d’importance »<br/><br/>Il  faut peu de temps pour être convaincu que Beaupré, d’Éric Sautou, est un livre d’une qualité rare, dont toutes les formulations, déroutantes au départ, sont justifiées. Leur cohérence et la temporalité particulière qu’elles créent font vite naître la certitude qu’elles ne sont pas les conséquences d’un parti pris formel mais qu’elles permettent de rendre présent ce qui survit à la mort.', 'beaupre.jpeg', '2021-02-10', 5),
(29, 'Les Fables de la Fontaine', 'Les Fables de La Fontaine sont trois recueils regroupant deux cent quarante trois fables allégoriques publiés par Jean de La Fontaine entre 1668 et 1694. La plupart, inspirées des fables d\'Ésope, Babrius et Phèdre, mettent en scène des animaux anthropomorphes et contiennent une morale explicite (présentée au début ou à la fin du poème) ou implicite.', 'lesFablesdeLaFontaine.jpeg', '1668-01-01', 5),
(30, 'Dans les yeux de mes points verts', '« 2015 a éclaboussé d\'un sang innocent les sentiers de notre dignité. Les enfants brûlés, noyés, torturés ne dorent aucun blason. Tant de larmes ont aigri le miroir de nos rêves. Protéger les juke-box, offrir aux gamins la musique jour et nuit en écartant celui qui menace la dernière danse. Si un dieu peut cela, qu\'il se mette au travail en stoppant les faux ambassadeurs ceinturés de bombes mortifères. Quidams sans aucun pouvoir, il nous appartient de retenir l\'huile vénéneuse de toutes les haines, sur plus faible que soi. »<br/><br/>Jérôme Saez se frotte ici à son homographe Damien Saez et exprime, dans un style dénonciateur, le fond de sa pensée sur notre société actuelle et son évolution. Ainsi, l\'auteur nous offre un regard critique sur l\'actualité politique et sociale de la France, contrasté par la terreur des attentats, l\'amour virtuel via les réseaux sociaux et la mixité sociale de l\'État français. Entre poèmes et écrits satiriques qui appellent à la tolérance, Dans les yeux de mes points verts a tout d\'un recueil de pensées coup de poing.', 'dansLesYeuxDeMesPointsVerts.jpeg', '2016-07-13', 5),
(31, 'Les Contemplations', '« Ma vie est la vôtre, votre vie est la mienne, vous vivez ce que je vis. » En 1856, le public fait un triomphe à ce monument de 11 000 vers que Hugo présente comme les « mémoires de son âme » et « la grande Pyramide » de son oeuvre.<br/>Dans les six livres de cette autobiographie sublimée, il célèbre la grâce enfantine et les jeunes années, le temps des amours et des extases, il médite sur les luttes, les épreuves et les douleurs de l\'âge adulte, il plaint la misère des sociétés modernes. C\'est ensuite le chant de l\'énergie retrouvée, et le dialogue avec la « Bouche d\'Ombre » ouverte sur l\'infini qui annonce enfin l\'avènement d\'un pardon universel.<br/>Mage, prophète, voyant, « rêveur sacré », Hugo déchiffre l\'énigme du monde et de la destinée humaine.', 'lesContemplations.jpeg', '1856-01-01', 5),
(32, 'Ceux du Large', 'Ceux du large... Qui Ananda Devi désigne-telle par ce titre ? La réponse nous est suggérée dès les premiers vers du recueil :<br/>« Dans des barques de feuilles mortes<br/>Ils portent à bout de fatigue<br/>Les enfants de leur faim », <br/>Avant d\'être assénée comme une gifle dans le dernier poème :<br/>« Ceux que la vie éventre<br/>De son coutelas ». <br/><br/>Entre ces deux poèmes, elle suit l\'errance des réfugiés, de tous ces êtres qui ont fui la terre où ils vivaient pour tenter d\'atteindre une autre rive. Malgré la « terreur de l\'eau », malgré la mort en embuscade. Et si l\'auteure s\'est donnée la peine d\'écrire ce texte en trois langues - français, anglais, créole - c\'est pour se prouver à elle-même qu\'elle n\'est pas restée « Tête baissée bras ballants » devant « Le film catastrophe » qui se déroule sous nos yeux.', 'ceuxDuLarge.jpeg', '2017-03-02', 5),
(33, 'Le médecin malgré lui', 'Sganarelle, ivrogne notoire et mari violent, mérite sans doute une bonne punition... Sa femme Martine se venge et voilà le bûcheron contraint de se dire médecin, puis de guérir Lucinde qui a subitement perdu la parole.<br/>Mais les coups de bâton pire, la potence ! le guettent, et pour y échapper, il lui faut ruser. Et Sganarelle de feindre l’assurance, les gestes et le langage des médecins du XVIIe siècle... sans jamais lever le masque !', 'leMedecinMalgreLui.jpeg', '1966-08-06', 4),
(34, 'L’Avare', 'Harpagon n\'a qu\'une obsession : posséder de l\'argent et n\'en pas dépenser. Il n\'a de cesse de soupçonner son entourage ; il impose à ses enfants des mariages avec des individus qui ont pour qualité d\'être fortunés. Mais un jour sa cassette, son magot, son trésor disparaît. Il remuera ciel et terre pour le retrouver.<br/>Dans L\'Avare, l\'argent est le nerf de la guerre. Il détermine les êtres, qu\'ils soient vieux ou jeunes, riches ou sans le sou, avares ou prodigues, et s\'insinue au coeur des rapports humains. Cette grande comédie créée en 1668 met en scène un univers où tout n\'est que contrats et où tout a un prix : manger, boire, se vêtir, aimer, ne pas mourir ; un monde où les sentiments filiaux sont sapés par le vice pathologique d\'un homme qui n\'est pas seulement avare, mais aussi convoiteux et paranoïaque. Et le vice a peut-être le dernier mot.', 'lAvare.jpeg', '1968-09-09', 4),
(35, 'L’École des femmes', 'Arnolphe s\'est modelé une femme à sa convenance : il a élevé Agnès, une jeune orpheline, loin du monde et l\'a écartée de tout savoir. La sachant gardée par deux domestiques aussi naïfs qu\'elle, il espère bien l\'épouser à son retour. Bref, il a tout prévu. Tout ? ... Sauf l\'arrivée du jeune Horace, dont Agnès s\'est éprise en son absence. La jeune fille parviendra-t-elle à s\'affranchir de l\'autorité de son tuteur ?', 'lEcoleDesFemmes.jpeg', '1962-12-26', 4),
(36, 'Europa t1: La Lune de glace', 'Europa, la quatrième lune de Jupiter, un astre étrange, entièrement recouvert d\'une croûte de glace sous laquelle se trouve un océan liquide. Il s\'y trouve une petite station scientifique dédiée à l\'étude de cette surprenante mer intérieure susceptible d\'abriter la vie. Mais des événements insolites se déroulent dans la station et une équipe est envoyée depuis la Terre pour voir ce qui s\'y passe.', 'europaT1.jpeg', '2021-02-24', 2),
(37, 'Europa t2 : Vertiges', 'Personne ne sait ce qu\'il est advenu des équipes envoyées successivement sur Europa. La possibilité d\'un sabotage devient de plus en plus probable. Pendant ce temps sur Terre une foule de dévots créationnistes crient au complot et croient dénoncer la mascarade qui prétend que l\'on peut envoyer un homme dans l\'espace. Pourtant il y a bien des hommes sur Europa et ils ont besoin d\'aide.', 'europaT2.jpeg', '2023-02-15', 2),
(38, 'Solo - chemins tracés t.2 : Siro', 'Fortuna connaît désormais la quête qui lui incombe. Repartie à la découverte du monde avec sa fille, elle continue à consigner ses aventures dans le livre des chemins. Alors que de grands dangers la menacent, le mystérieux Siro fait son apparition. L\'héroïne doit-elle faire confiance à ce combattant qui semble la connaître et la suivre depuis longtemps ?', 'soloCheminsTraces.jpeg', '2023-04-12', 2),
(39, 'Henri Vaillant, fan box t.1 : passion', 'Le jeune Henri Vaillant est Breton. Et donc têtu ! Ce qui le pousse à aller en Alsace afin de se faire embaucher par la célèbre firme Bugatti ! Il s\'y fera une jolie place, même si son rêve ultime est de devenir pilote de course... De quoi lui donner envie de fonder sa propre firme ?', 'henriVaillantT1.jpeg', '2023-04-14', 2),
(40, 'Largo winch t.1 : l\'héritier', 'Injustement arrêté à Istanbul, Largo est expédié dans la pire prison de Turquie. Au milieu de brutes qui, prisonniers comme gardiens, ne connaissent que le langage de la violence.<br/>Largo parvient à s\'évader, en compagnie de Simon Ovronnaz, un sympathique voleur suisse piégé, comme lui, dans cet enfer. Ils trouvent refuge chez le consul de Grande-Bretagne, dont la ravissante fille, Charity, et une tout aussi jolie copine vont s\'occuper, à leur manière, de leur faire oublier leurs malheurs.<br/>Mais entre-temps, des politiciens turcs ont compris l\'erreur qu\'ils avaient commise en enfermant l\'héritier du Groupe W. Ils décident d\'effacer toute trace grâce à la redoutable \"Section K\". Le massacre va commencer…', 'largoWinchT1.jpeg', '2013-08-29', 2),
(41, 'Orcs et gobelins t.1 : Turuk', 'Arran accueille une nouvelle saga Fantasy après Elfes et Nains.Découvrez Orcs et Gobelins !L\'orc Turuk se réveille, sonné, blessé et amnésique. Il arpente les rues d\'une cité abandonnée. A l\'exception d\'un mystérieux archer cherchant à l\'épingler et de créatures craignant la lumière qui veulent le dévorer. Qui sont-elles ? Pourquoi cherche-t-on à le tuer ? Qu\'est-il arrivé dans cette ville ? Et que fait-il ici ? Pourtant, Il ne faudrait pas s\'éterniser, la nuit arrive et la mort avec…', 'orcsEtGobelinsT1.jpeg', '2017-10-25', 2),
(42, 'Orcs et gobelins t.2 : Myth', 'Un Gobelin, Myth, et une mission presque impossible : voler le joyau d\'un elfe noir dans leur citadelle. Un véritable crossover dans l\'univers des terres d\'Arran ! Myth est un voleur gobelin très doué. C\'est aussi un incurable vantard partageant son temps entre la cambriole et la fuite incessante. Quand il fait escale à Scarande, des mercenaires le mettent à l\'épreuve pour tester ses compétences. Un mystérieux assassin veut lui confier une mission suicide : voler le joyau de Raal\'yn, un vieil elfe noir qui réside dans la citadelle de Slurce. Une réponse négative s\'impose mais ce client, diablement efficace pour massacrer son prochain, menace sa vie, difficile de dire non...', 'orcsEtGobelinsT2.jpeg', '2018-01-24', 2),
(43, 'Orcs et gobelins t.3 : Gri\'im', 'Il n\'y a pas pire ennemi qu\'un vieil orc qui a tout perdu.Après trente années d\'emprisonnement et de tortures, Gri\'im est enfin libre. Autrefois, seigneur de guerre, il n\'est plus qu\'un vieil Orc brisé, brûlant de se venger. Mais, traqué comme une bête, blessé, il cherche refuge auprès d\'une caravane d\'humains qui se rend à Aspen. Depuis la guerre des Goules, la cité est censée être déserte, mais un prédateur aussi ancien que redouté, éveillé par la magie de l\'elfe bleue Lanawyn, rôde...', 'orcsEtGobelinsT3.jpeg', '2018-04-11', 2),
(44, 'Thorgal Saga : adieu Aaricia', 'Le temps est le plus cruel des dieux... Couronnée de cheveux blancs, Aaricia a rendu son dernier souffle. Au crépuscule de sa vie, écrasé par la douleur, Thorgal se voit proposer l\'anneau d\'Ouroboros par le perfide Nidhogg. Qu\'il le mette à son doigt, et il pourra retourner dans son propre passé, et revoir sa bien-aimée. Qu\'importe le prix à payer, il est des tentations auxquelles même le héros le plus pur ne peut résister...', 'thorgalAdieuAaricia.jpeg', '2023-02-03', 2),
(45, 'One Piece - t.1 : Romance Dawn, à l\'aube', 'Le roi des pirates, ce sera lui !Nous sommes à l\'ère des pirates. Luffy, un garçon espiègle, rêve de devenir le roi des pirates en trouvant le One Piece, un fabuleux trésor. Seulement, Luffy a avalé un fruit du démon qui l\'a transformé en homme élastique. Depuis, il est capable de contorsionner son corps dans tous les sens, mais il a perdu la faculté de nager.Avec l\'aide de ses précieux amis, il va devoir affronter de redoutables pirates dans des aventures toujours plus rocambolesques.', 'onePieceT1.jpeg', '2013-07-03', 3),
(46, 'One Piece – t.2 : Luffy versus la bande ', 'Luffy fait la connaissance de Nami, une ravissante jeune fille maîtrisant la navigation. Seulement, Nami déteste les pirates et refuse d\'entrer dans son équipage. Pire, elle fait prisonnier Luffy, pour le livrer au terrible... Baggy le clown !', 'onePieceT2.jpeg', '2013-07-03', 3),
(47, 'One piece t.104', 'Luffy va-t-il réussir à redonner le sourire aux habitants du pays des Wa et à libérer cette île qui a traversé de rudes épreuves au cours des vingt années de domination de Kaido et Orochi ?! Tout repose désormais sur la puissance de ses poings ! L\'arc du pays des Wa est à son apogée ! Les aventures de Luffy à la poursuite du One Piece continuent !', 'onePieceT104.jpeg', '2023-04-19', 3),
(48, 'Naruto t.1', 'Naruto est un garçon un peu spécial. Il est toujours tout seul et son caractère fougueux ne l\'aide pas vraiment à se faire apprécier dans son village. Malgré cela, il garde au fond de lui une ambition : celle de devenir un maître Hokage, la plus haute distinction dans l\'ordre des ninjas, et ainsi obtenir la reconnaissance de ses pairs.', 'narutoT1.jpeg', '2002-03-09', 3),
(49, 'Naruto t.71', 'Naruto et Sasuke se retrouvent dotés d\'un nouveau pouvoir que l\'ermite Rikudo leur a transmis.<br/>Ils sont maintenant capable de sceller Kaguya ! Il leur reste tout de même à trouver un stratagème pour l\'approcher ! De plus ils sont de nouveau séparés…<br/>Nos 2 héros réussiront ils à se retrouver et à mettre un terme au plan démoniaque de Kaguya ?', 'narutoT71.jpeg', '2016-07-08', 3),
(50, 'Chainsaw man t.12', 'Asa Mitaka, élève studieuse et solitaire, peine à s\'intégrer. Pire, un accident sanglant en plein lycée la plonge brutalement dans la tourmente. Au terme d\'une effroyable descente aux enfers, elle survit grâce à l\'intervention du démon-guerre, qui s\'approprie son corps. Asa doit désormais cohabiter avec cette entité qui n\'a qu\'une idée en tête : trouver et éradiquer l\'insaisissable Chainsaw Man !', 'chainsawManT12.jpeg', '2023-04-05', 3),
(51, 'Stitch et le samourai t.1', 'Et si Stitch avait débarqué dans le Japon féodal ? Alerte rouge ! La monstrueuse expérience 626 s\'est échappée à travers une brèche temporelle !! Si tout l\'espace est en danger, c\'est surtout le Japon qui devrait d\'abord s\'en inquiéter : écrasée au beau milieu de l\'archipel nippone à l\'époque féodale, Stitch, la créature bleue, tombe sur la route d\'un puissant seigneur de guerre prêt à tout (ou presque) pour conquérir le pays. Cette rencontre inédite entre génies destructeurs mènera-t-elle alors le monde à sa fin, ou bien... Préfèreront-ils aux conflits sanguinaires la danse, les histoires drôles de samouraïs et les chevauchées à cheval de bois ?! Hmm... Rien n\'est moins sûr...', 'stitchEtLeSamouraiT1.jpeg', '2022-07-06', 3),
(52, 'Le voyage de chihiro', 'Alors que la petite Chihiro déménage à contrecoeur à la campagne, la voiture familiale s\'arrête près d\'un étrange tunnel. Dans la ville déserte qui se trouve derrière, Chihiro découvre horrifiée que ses parents ont été transformés... en cochons ! Pire, le monde dans lequel elle s\'est égarée est peuplé de spectres et d\'esprits ! Pour sauver ses parents et rester en vie, Chihiro va devoir travailler dans d\'étranges thermes réservés aux fantômes...', 'leVoyageDeChihiro.jpeg', '2018-12-12', 3),
(53, 'Le château dans le ciel', 'Travailleur à la mine, le jeune Pazu rêve de découvrir Laputa, le château volant que son défunt père avait aperçu dans le ciel avant de mourir. Or, Pazu secourt un jour Sheeta, une jeune fille tombée... du ciel ! Poursuivie tant par les pirates que par les militaires, Sheeta aura besoin de toute l\'aide de Pazu pour espérer leur échapper. Car s\'il y a bien une chose qui ne doit pas tomber entre leurs mains, c\'est la pierre volante qu\'elle porte autour du cou...', 'leChateauDansLeCiel.jpeg', '2021-05-05', 3),
(54, 'Fruits basket - t.1', 'Tohru, orpheline de seize ans, a décidé d\'être totalement indépendante. Elle installe une grande tente au milieu d\'un terrain en friche. Malheureusement, le terrain appartient aux Sôma, une famille maudite, dont les membres se transforment en l\'un des douze animaux du zodiaque chinois à chaque fois qu\'ils sont trop fatigués ou approchés de près par une personne du sexe opposé ! Tohru est la première à percer leur secret...', 'fruitsBasketT1.jpeg', '2018-02-14', 3),
(55, 'Blue spring ride t.1', 'À son entrée au lycée, Futaba s\'est transformée.<br/>Douce et féminine au collège, elle devient plus énergique et garçon manqué. La jeune fille veut changer pour ne plus être mise à l\'écart par ses camarades. Mais ses nouvelles amitiés sont artificielles et Futaba va bientôt remarquer les limites de son changement de personnalité.<br/>Un jeune homme va l\'aider à prendre un nouveau départ. Ce garçon ressemble étrangement à son premier amour, serait-ce lui ?', 'blueSpringRideT1.jpeg', '2013-07-05', 3),
(56, 'Yasha - t.4', 'Moichi a été infecté par le virus mortel CKV ! L\'attaque bioterroriste n\'était qu\'un piège orchestré par Rin pour provoquer la fermeture du laboratoire de l\'université Rakuhoku (au courant de l\'existence du virus) et pour faire souffrir Sei. Ce dernier, démuni face à cette maladie sans remède, prend alors une décision lourde de conséquences…<br/><br/>Récompensée d\'un Shogakukan Manga Awards en 2002 pour ce récit, la célèbre Akimi Yoshida revisite le mythe du Yasha et du Bodhisattva sur fond de réflexion sur la génétique. On retrouve dans ce titre de nombreux thèmes chers à l\'autrice, comme la parentalité et le passage de l\'adolescence à l\'âge adulte. Une grande oeuvre à découvrir pour tous les fans de Banana Fish ou de science-fiction... ou les deux !', 'yashaT4.jpeg', '2023-03-08', 3),
(57, 'Blacksad t.1 : quelquepart entre les omb', 'Attention chef-d\'oeuvre ! L\'histoire d\'un privé qui veut venger son ex-fiancée assassinée, rappelle celle des grands maîtres du polar le plus noir. Cette tragédie classique est transfigurée par un dessin sublime, d\'une maestria époustouflante !', 'blackSadT1.jpeg', '2000-07-25', 2),
(58, 'Phèdre', 'Au tragique psychologique - celui de l\'amour - vient se superposer un tragique en quelque sorte moral - celui de la dignité perdue - qui n\'apparaît que dans Phèdre. Ici seulement, le personnage se livre à sa passion en la haïssant, continue à combattre contre soi, tout en s\'abandonnant à lui-même, pour être vaincu enfin sur les deux plans où se développe cette tragédie singulière : le plan moral et le plan psychologique. Phèdre est un témoin de la liberté. Racine remplit ici la vocation éternelle de la tragédie, qui est d\'orchestrer une méditation sur la situation de l\'homme.', 'phedre.jpeg', '1677-01-01', 4),
(59, 'Le cid', 'Rodrigue et Chimène s\'aiment et s\'apprêtent à se marier. Mais lorsque le comte de Gomès, le père de Chimène, donne un soufflet à don Diègue, celui de Rodrigue, c\'est au jeune homme que revient le devoir de laver, dans le sang, l\'outrage fait à son vieux père. Rodrigue a « du coeur », mais il ne sait que faire : mourir sans offenser Chimène ? Se venger et la perdre ? Cruel dilemme.<br/>Le Cid est un poème amoureux. Corneille raconte l\'histoire d\'une jeunesse que ses aînés condamnent au renoncement et que les sentiments poussent à la révolte.', 'leCid.jpeg', '1637-01-05', 4),
(60, 'Lucrèce Borgia', 'Indifférente à la haine de l\'Italie entière, Lucrèce Borgia parade au carnaval de Venise. Qui pourrait inquiéter cette femme de pouvoir qui baigne dans l\'adultère, l\'inceste et le crime ? Elle a peur cependant, et tremble pour un simple capitaine qu\'elle cherche parmi la foule. Il se nomme Gennaro. Il est amoureux d\'elle, lui qui tient les Borgia en aversion et insulte leur blason. Or Gennaro n\'est autre que son fils, né de ses amours incestueuses avec son propre frère, et le jeune homme ignore tout de son passé et de ses origines. Lucrèce est un monstre, mais aussi une femme et une mère. Comment protéger son enfant, comment le soustraire à la fureur d\'un mari qui le croit son amant ?<br/>En 1833, ce mélodrame tragique surpasse tous les triomphes de Victor Hugo.', 'lucreceBorgia.jpeg', '1833-02-02', 4),
(61, 'Métro Paris 2033 t.2 : rive droite', 'En 2033, les humains ont été chassés de la surface de la planète, désormais inhabitable. À Paris, les survivants se sont réfugiés dans les profondeurs du métropolitain. Des communautés sont installées au niveau de certaines stations de Rive Gauche, plus ou moins en contact, souvent en conflit ; la surface est crainte parce qu\'irradiée ; Rive Droite est un lieu maudit, laissé à la merci d\'une faune sauvage monstrueuse.<br/>Dans les méandres des boyaux de Paris, à défaut de lumière, les émotions sont plus vives, les rancoeurs plus tenaces, les haines plus exacerbées<br/><br/>Rive Droite est le deuxième volet de la trilogie sombre et baroque Métro Paris 2033.Une épopée tourbillonnante. ', 'metroParis2033T2.jpeg', '2023-03-22', 1),
(62, 'De la Terre à la Lune', 'Ala fin de la guerre fédérale des états-Unis, les fanatiques artilleurs du Gun-Club (Club-Canon) de Baltimore sont bien désoeuvrés. Un beau jour, le président, Impey Barbicane, leur fait une proposition qui, le premier moment de stupeur passé, est accueillie avec un enthousiasme délirant. Il s\'agit de se mettre en communication avec la Lune en lui envoyant un boulet, un énorme projectile qui serait lancé par un gigantesque canon !<br/>Tandis que ce projet inouï est en voie d\'exécution, un Parisien, Michel Ardan, un de ces originaux que le Créateur invente dans un moment de fantaisie, et dont il brise aussitôt le moule, télégraphie à Barbicane : « Remplacez obus sphérique par projectile cylindroconique. Partirai dedans »…<br/><br/>Avec ses personnages parfaitement campés, son humour toujours présent, De la Terre à la Lune est une des grandes oeuvres de Jules Verne, une de ses plus audacieuses anticipations.', 'deLaTerreALaLune.jpeg', '1865-01-01', 1),
(63, 'Cinq semaines en ballon', 'Tenter de traverser l\'Afrique d\'est en ouest par la voie des airs, prétendre survoler dans sa plus grande largeur le dangereux continent noir à bord d\'une fragile nacelle livrée à tous les caprices des vents, c\'était, au temps de Jules Verne, une entreprise d\'une audace incroyable. Comme on peut s\'y attendre, les cinq semaines qu\'il faudra au docteur Fergusson et à ses deux compagnons pour y parvenir seront pleines d\'imprévu et de péripéties.', 'cinqSemainesEnBallon.jpeg', '1863-01-01', 1),
(64, 'Le tour du monde en 80 jours', 'Phileas Fogg, gentleman anglais, parie avec les membres de son club qu\'il fera le tour de la terre en 80 jours. Et, aussitôt, le voilà parti, accompagné de son domestique Jean, un Parisien, dit Passepartout. Il devra être revenu à Londres, pour gagner, le samedi 21 décembre 1872 à 20 heures 45 minutes !<br/>Soupçonné d\'être l\'audacieux voleur de la Banque d\'Angleterre, Phileas Fogg va être filé tout au long de ses pérégrinations par le détective Fix qui ne peut cependant pas l\'arrêter, le mandat d\'amener arrivant toujours trop tard…<br/>Les pays traversés, les multiples aventures, les stratagèmes employés pour contourner les nombreux obstacles, l\'activité débordante de Phileas Fogg pour lutter contre le temps en ne se départant jamais de son flegme tout britannique, les personnalités de Passepartout et de l\'obstiné Fix, font du Tour du monde en 80 jours un merveilleux roman, l\'un des meilleurs de Jules Verne, dont le succès considérable ne s\'est jamais démenti depuis sa parution, en 1873.', 'leTourDuMondeEn80Jours.jpeg', '1872-01-01', 1);

-- --------------------------------------------------------

--
-- Structure de la table `livreestregistre`
--

CREATE TABLE `livreestregistre` (
  `idlivre` int(11) NOT NULL,
  `idregistre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `livreestregistre`
--

INSERT INTO `livreestregistre` (`idlivre`, `idregistre`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 3),
(7, 3),
(8, 3),
(9, 4),
(10, 4),
(11, 4),
(12, 4),
(13, 4),
(14, 5),
(14, 13),
(15, 5),
(15, 13),
(16, 5),
(17, 5),
(18, 5),
(19, 5),
(20, 5),
(21, 2),
(22, 1),
(22, 2),
(23, 2),
(24, 2),
(25, 1),
(25, 2),
(26, 6),
(27, 6),
(28, 6),
(29, 6),
(29, 7),
(30, 7),
(31, 6),
(32, 7),
(32, 8),
(33, 9),
(34, 9),
(35, 9),
(36, 5),
(37, 5),
(38, 5),
(39, 2),
(40, 2),
(41, 4),
(42, 4),
(43, 4),
(44, 4),
(45, 10),
(46, 10),
(47, 10),
(48, 10),
(49, 10),
(50, 10),
(51, 11),
(52, 11),
(53, 11),
(54, 12),
(55, 12),
(56, 12),
(57, 1),
(58, 8),
(59, 8),
(60, 8),
(61, 4),
(62, 5),
(63, 2),
(64, 2);

-- --------------------------------------------------------

--
-- Structure de la table `registre`
--

CREATE TABLE `registre` (
  `idRegistre` int(11) NOT NULL,
  `nomRegistre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `registre`
--

INSERT INTO `registre` (`idRegistre`, `nomRegistre`) VALUES
(2, 'Action / Aventure'),
(9, 'Comique'),
(13, 'Dystopique'),
(4, 'Fantasy'),
(6, 'Lyrique'),
(1, 'Policier / Thriller'),
(3, 'Romance'),
(7, 'Satirique'),
(5, 'Science-fiction'),
(11, 'Seinen'),
(12, 'Shojo'),
(10, 'Shonen'),
(8, 'Tragique');

-- --------------------------------------------------------

--
-- Structure de la table `sitecommercial`
--

CREATE TABLE `sitecommercial` (
  `idSite` int(11) NOT NULL,
  `nomSite` varchar(20) NOT NULL,
  `urlSite` varchar(100) NOT NULL,
  `logo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sitecommercial`
--

INSERT INTO `sitecommercial` (`idSite`, `nomSite`, `urlSite`, `logo`) VALUES
(1, 'Cultura', 'https://www.cultura.com', 'images/siteco/cultura.png'),
(2, 'Fnac', 'https://www.fnac.com', 'images/siteco/fnac.png'),
(3, 'Amazon', 'https://www.amazon.fr/', 'images/siteco/amazon.png');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `nomUtilisateur` varchar(20) NOT NULL,
  `MotDePasse` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `newsletter` tinyint(1) NOT NULL,
  `dateNaissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nomUtilisateur`, `MotDePasse`, `email`, `newsletter`, `dateNaissance`) VALUES
(1, 'Bastien', '$2y$10$F3Cq4k2vwfGtklGSr5mBBe3Ig2YFVIcF8xkFOyyzS57PeqZFGQgwS', 'bastien@gmail.com', 0, '2004-04-02'), -- MDP : bastien
(2, 'Raphaël', '$2y$10$zEzV.MiZBJMQUtLFLOFT6.wSc.9tOx1XuK4y4mb6zqGr9gC1BBaUu', 'raphael@gmail.com', 0, '2004-09-23'), -- MDP : raphael
(3, 'Florian', '$2y$10$AzpHPvk9CZ75yFEDxGIwPuCGIn2oCDAkraaMoyi0G4JfXqSExnaGW', 'florian@gmail.com', 0, '2004-12-07'); -- MDP : florian

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ajoutcollection`
--
ALTER TABLE `ajoutcollection`
  ADD PRIMARY KEY (`idUtilisateur`,`idLivre`),
  ADD KEY `idLivre` (`idLivre`);

--
-- Index pour la table `ajoutevennement`
--
ALTER TABLE `ajoutevenement`
  ADD PRIMARY KEY (`idUtilisateur`,`idEvenement`),
  ADD KEY `idEvenement` (`idEvenement`);

--
-- Index pour la table `auteur`
--
ALTER TABLE `auteur`
  ADD PRIMARY KEY (`idAuteur`);

--
-- Index pour la table `ecritpar`
--
ALTER TABLE `ecritpar`
  ADD PRIMARY KEY (`idLivre`,`idAuteur`),
  ADD KEY `idAuteur` (`idAuteur`);

--
-- Index pour la table `enventesur`
--
ALTER TABLE `enventesur`
  ADD PRIMARY KEY (`idLivre`,`idSite`),
  ADD KEY `idSite` (`idSite`);

--
-- Index pour la table `evenement`
--
ALTER TABLE `evenement`
  ADD PRIMARY KEY (`idEvenement`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`idGenre`),
  ADD UNIQUE KEY `nomGenre` (`nomGenre`);

--
-- Index pour la table `genreestregistre`
--
ALTER TABLE `genreestregistre`
  ADD PRIMARY KEY (`idgenre`,`idregistre`),
  ADD KEY `idregistre` (`idregistre`);

--
-- Index pour la table `livre`
--
ALTER TABLE `livre`
  ADD PRIMARY KEY (`idLivre`),
  ADD KEY `idGenre` (`idGenre`);

--
-- Index pour la table `livreestregistre`
--
ALTER TABLE `livreestregistre`
  ADD PRIMARY KEY (`idlivre`,`idregistre`),
  ADD KEY `idregistre` (`idregistre`);

--
-- Index pour la table `registre`
--
ALTER TABLE `registre`
  ADD PRIMARY KEY (`idRegistre`),
  ADD UNIQUE KEY `nomRegistre` (`nomRegistre`);

--
-- Index pour la table `sitecommercial`
--
ALTER TABLE `sitecommercial`
  ADD PRIMARY KEY (`idSite`),
  ADD UNIQUE KEY `nomSite` (`nomSite`),
  ADD UNIQUE KEY `urlSite` (`urlSite`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `nomUtilisateur` (`nomUtilisateur`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ajoutcollection`
--
ALTER TABLE `ajoutcollection`
  ADD CONSTRAINT `ajoutcollection_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `ajoutcollection_ibfk_2` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`);

--
-- Contraintes pour la table `ajoutevennement`
--
ALTER TABLE `ajoutevenement`
  ADD CONSTRAINT `ajoutevenement_ibfk_1` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`),
  ADD CONSTRAINT `ajoutevenement_ibfk_2` FOREIGN KEY (`idEvenement`) REFERENCES `evenement` (`idEvenement`);

--
-- Contraintes pour la table `ecritpar`
--
ALTER TABLE `ecritpar`
  ADD CONSTRAINT `ecritpar_ibfk_1` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`),
  ADD CONSTRAINT `ecritpar_ibfk_2` FOREIGN KEY (`idAuteur`) REFERENCES `auteur` (`idAuteur`);

--
-- Contraintes pour la table `enventesur`
--
ALTER TABLE `enventesur`
  ADD CONSTRAINT `enventesur_ibfk_1` FOREIGN KEY (`idLivre`) REFERENCES `livre` (`idLivre`),
  ADD CONSTRAINT `enventesur_ibfk_2` FOREIGN KEY (`idSite`) REFERENCES `sitecommercial` (`idSite`);

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`idGenre`) REFERENCES `genre` (`idGenre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
