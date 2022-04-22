-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 09 mai 2021 à 23:59
-- Version du serveur :  10.4.18-MariaDB
-- Version de PHP : 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `titre` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingrédients` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `recette` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dates` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `type`, `ingrédients`, `recette`, `img`, `dates`) VALUES
(1, 'Meringues', 'dessert', '2 blancs d’œuf.\r\n140g de sucre en poudre.\r\n140g de sucre glace.	\r\n2 sachet de sucre vanillé.\r\n1 pincée de sel.\r\n', 'Ajoutez le sel dans les blancs puis montez-les en neiges. Une fois monter en neige, versez peu à peu le sucre vanillé Tout en continuant de fouetter. Versez ensuite peu à peu le sucre en poudre et le sucre glace sans jamais cesser de fouetter.\r\nEn vous aidant de 2 cuillères à café, formez de petites boules de tailles identique et surmontées d’une pointe sur une plaque de cuisson en prenant soin de les espacer de 2 ou 3 cm entre elles.\r\nFaire cuire dans le four à une température de 200°C pendant 2min puis baissez la température à 100 °C pendant une quinzaine de minutes. Pour vérifier la cuisson, il faut planter le couteau dans une craquelure des meringues et il faut que la pâte au centre soit légèrement collante.\r\n', 'meringues', '2021-05-01'),
(2, 'Congolais', 'dessert', '300g de sucre en poudre.\r\n5 blancs d’œuf.\r\n250g de noix de coco râpée.\r\n', 'Mélanger le sucre et les blancs puis faire chauffer le mélange à feu doux.\r\nLorsqu’il est bien chaud, incorporer la noix de coco.\r\nFaire des tas réguliers sur une plaque de cuisson.\r\nFaire cuire au four pendant environ 40 minutes à 120°C puis 5 minutes à 150°C.', 'congolais', '2021-05-01'),
(3, 'Cookies', 'dessert', '150g de sucre roux.\r\n50g de sucre en poudre.\r\n320g de farine.\r\n125g de beurre.\r\n½ Cuillère à café de bicarbonate de soude.\r\n½ Cuillère à café de sel.\r\n1 sachet de sucre vanillé.\r\n2 œufs.\r\n1 paquet de pépite de chocolat ou raisins secs.\r\n75g de flocons d’avoine.\r\n', 'Mélanger le sucre roux, le sucre en poudre, le sucre vanillé, la farine, le bicarbonate et le sel.\r\nAjouter les œufs puis le beurre fondu.\r\nAjouter ensuite les flocons d’avoines, puis le chocolat ou les raisins secs.\r\nDisposer sur une plaque des petits disques légèrement espacés.\r\nCuire environ 10min à 200°C.\r\nLorsque l’on sort les cookies du four, on doit avoir l’impression qu’ils ne sont pas cuits.\r\nIls vont ensuite durcir d’eux même hors du four.\r\n', 'cookies', '2021-05-01'),
(4, 'Financier', 'dessert', '2 sachet de sucre vanillé.\r\n300g de sucre en poudre.\r\n100g de poudre d’amande.\r\n100g de farine.\r\n6 blancs d’œuf.\r\n150g de beurre.\r\n1 pincée de sel.\r\n', 'Mélanger le sucre vanillé, le sucre en poudre, la poudre d’amande et la farine.\r\nAjouter les 6 blancs d’œuf au mélange.\r\nFaire fondre le beurre au micro-onde dans un bol.\r\nAjouter le beurre fondu ainsi que la pincée de sel au mélange.\r\nEnfourner pendant 20 minutes à 200°C.\r\n', 'financiers', '2021-05-01'),
(5, 'Helenettes', 'dessert', '2 jaunes d’œufs.\r\n100g de sucre en poudre.\r\n100g de farine.	\r\n80g de beurre.\r\n100g de poudre d’amande.\r\n', 'Préchauffer le four à 200°C\r\nFaire fondre le beurre et le laisser refroidir\r\nMélanger les jaunes d’œufs et le sucre.\r\nAjouter le beurre fondu\r\nAjouter la farine ainsi que la poudre d’amande\r\nFaire des petites boules avec les mains et les disposer sur une plaque recouverte de papier cuisson\r\nFaire cuire environ 12-15min jusqu’à ce que le bord soit légèrement dorée.\r\n', 'helenettes', '2021-05-01'),
(6, 'Bricks au thons', 'entree', 'Poivre\r\n3 cuillères d\'huile d\'olive\r\n1 citron\r\n30g de percils haché\r\n280g de thon au naturel\r\n10 feuilles de bricks\r\n80g d\'oignons coupés\r\n3 oeufs', 'Faire cuire les œufs dans l\'eau bouillante pour qu\'ils deviennent durs (9 minutes).\r\nÉcailler les œufs, les écraser avec une fourchette et les mélanger avec le persil et les oignons.\r\nAjouter le thon émietté et le jus du citron pressé.\r\nPoivrer à votre convenance en n\'hésitant pas à goûter la farce.\r\nMettre un peu de farce au centre de chaque feuille de brick puis replier les quatre côtés de la feuille sur le dessus pour former un rectangle.', 'bricks_thon', '2021-05-09'),
(7, 'Lasagnes', 'plat', 'Poivre\r\nSel\r\n125g de parmesan\r\n3 pincée de muscade rapée\r\nBasilic\r\nThym\r\n15cl d\'eau\r\n800g de purée de tomates\r\n1 carotte\r\n2 gousses d\'ail\r\n3 oignons jaunes\r\n1 paquet de lasagne\r\n600g de bœuf haché\r\n2 feuilles de laurier\r\n70g de fromage râpé\r\n1 litre de lait\r\n100g de farine\r\n125g de beurre doux', 'Faire revenir gousses hachées d\'ail et les oignons émincés dans un peu d\'huile d\'olive.\r\nAjouter la carotte et la branche de céleri hachée puis la viande et faire revenir le tout.\r\nAu bout de quelques minutes, ajouter le vin rouge. Laisser cuire jusqu\'à évaporation.\r\nAjouter la purée de tomates, l\'eau et les herbes. Saler, poivrer, puis laisser mijoter à feu doux 45 minutes.\r\nPréparer la béchamel : faire fondre le beurre.\r\nHors du feu, ajouter la farine d\'un coup.\r\nRemettre sur le feu et remuer avec un fouet jusqu\'à l\'obtention d\'un mélange bien lisse.\r\nAjouter le lait peu à peu.\r\nRemuer sans cesse, jusqu\'à ce que le mélange s\'épaississe.\r\nEnsuite, parfumer avec la muscade, saler, poivrer. Laisser cuire environ 5 minutes, à feu très doux, en remuant. Réserver.\r\nPréchauffer le four à 200°C (thermostat 6-7). Huiler le plat à lasagnes. Poser une fine couche de béchamel puis des feuilles de lasagnes, de la bolognaise, de la béchamel et du parmesan. Répéter l\'opération 3 fois de suite.\r\nSur la dernière couche de lasagnes, ne mettre que de la béchamel et recouvrir de fromage râpé. Parsemer quelques noisettes de beurre.\r\nEnfourner pour environ 25 minutes de cuisson', 'lasagnes', '2021-05-09');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_article` int(11) NOT NULL,
  `auteur` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `texte` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dates` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

CREATE TABLE `personnes` (
  `prenom` varchar(45) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `mdp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`prenom`, `nom`, `tel`, `email`, `mdp`) VALUES
('Fabien', 'Lapert', '', 'fablap76710@gmail.com', 'NSATAQZAVB');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `personnes`
--
ALTER TABLE `personnes`
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
