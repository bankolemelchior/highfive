-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 31 jan. 2023 à 10:59
-- Version du serveur : 5.7.33
-- Version de PHP : 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_highfive`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `article_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','Published','Delete') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `user_id` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `article_image`, `status`, `user_id`, `create_at`) VALUES
(23, 'C&#039;est quoi un frameworks : cas de Laravel', 'c&#039;est quoi un frameworks<br />\r\nUn framework est un ensemble de bibliothèques et de conventions qui sert de base à une application ou un système. Il fournit une structure générale pour organiser et gérer le code, ainsi que des fonctionnalités prédéfinies pour certaines tâches courantes. En utilisant un framework, les développeurs peuvent éviter de réinventer la roue en codant des fonctionnalités déjà existantes, et se concentrer plutôt sur les parties uniques de leur application.<br />\r\n<br />\r\n    Il existe différents types de frameworks, notamment les frameworks de développement d&#039;application (par exemple, Ruby on Rails pour Ruby, Django pour Python, Laravel pour PHP), les frameworks de développement de jeux (par exemple, Unity, Unreal Engine), les frameworks de développement de sites web (par exemple, Bootstrap, Foundation), et les frameworks de développement d&#039;IA (par exemple, TensorFlow, PyTorch).<br />\r\n<br />\r\n   Laravel est un framework de développement d&#039;application open-source pour le langage de programmation PHP. Il a été créé en 2011 par Taylor Otwell et est devenu l&#039;un des frameworks PHP les plus populaires et les plus utilisés pour les développeurs. Laravel se concentre sur la simplicité, la lisibilité et l&#039;élégance de son code, tout en offrant des fonctionnalités avancées pour les développeurs.<br />\r\n<br />\r\nL&#039;un des principaux avantages de Laravel est sa facilité d&#039;utilisation. Il utilise un système de routage simple pour diriger les utilisateurs vers les bonnes pages et fonctionnalités de l&#039;application. Il utilise également un système de modèles-vues-contrôleurs (MVC) pour organiser le code de l&#039;application, ce qui permet aux développeurs de séparer les différentes parties de l&#039;application en fonction de leur fonctionnalité.<br />\r\n<br />\r\nLaravel propose également des fonctionnalités avancées pour les développeurs, telles que la gestion des formulaires, la validation de données, la gestion de la sécurité et de l&#039;authentification, la gestion des bases de données, les migrations de bases de données, la gestion des sessions et des cookies, et bien plus encore.<br />\r\n<br />\r\nLaravel offre également une grande flexibilité pour les développeurs en leur permettant d&#039;utiliser des outils tels que Composer pour gérer les dépendances de leur application, ainsi que des outils tels que Tinker pour interagir avec la base de données de l&#039;application. Il inclut également des outils pour aider les développeurs à déboguer et à surveiller leur application, tels que le débogueur intégré et les journaux d&#039;erreur.<br />\r\n<br />\r\nEn outre, Laravel est une communauté très active et de nombreuses ressources sont disponibles pour les développeurs, y compris des tutoriels, des forums de discussion, des packages et des plugins pour étendre les fonctionnalités de l&#039;application.<br />\r\n<br />\r\nEn somme, Laravel est un framework de développement d&#039;application puissant et flexible pour PHP. Il offre une grande facilité d&#039;utilisation, des fonctionnalités avancées pour les développeurs, une grande flexibilité pour les développeurs, et une communauté active pour soutenir les développeurs. Il est donc un choix idéal pour les développeurs qui cherchent à créer des applications PHP de haute qualité.', 'pic_63d89f94aeb3d9.09908073.jpg', 'Published', 27, '2023-01-31 03:56:52'),
(24, 'Le sport et le mental - Le code et le sport', 'Le sport et le mental sont étroitement liés. L&#039;activité physique a des effets bénéfiques sur la santé mentale, tels que la réduction de l&#039;anxiété et de la dépression. Les exercices physiques ont également été montrés pour améliorer la mémoire, la concentration et la capacité de résolution de problèmes.<br />\r\n<br />\r\nLe sport est important pour les programmeurs car cela peut les aider à améliorer leur santé mentale et physique, ainsi qu&#039;à augmenter leur productivité et leur créativité.<br />\r\n<br />\r\nTout d&#039;abord, le sport peut aider les programmeurs à gérer le stress. Le travail de programmation peut être stressant, en particulier lorsque les délais sont serrés et que les bugs sont fréquents. L&#039;exercice physique peut aider à réduire les niveaux de cortisol, l&#039;hormone du stress, et à améliorer la capacité de notre corps à gérer le stress.<br />\r\n<br />\r\nEnsuite, le sport peut aider les programmeurs à améliorer leur santé mentale. La programmation peut être mentalement exigeante, et il est donc important de prendre des pauses régulières pour se détendre et se défaire de la tension. L&#039;exercice physique peut aider à améliorer l&#039;humeur et à réduire les symptômes de la dépression.<br />\r\n<br />\r\nDe plus, le sport peut aider les programmeurs à améliorer leur productivité. L&#039;exercice physique peut augmenter la circulation sanguine et l&#039;oxygénation du cerveau, ce qui peut aider à améliorer la mémoire, la concentration et la capacité de résolution de problèmes. Cela peut aider les programmeurs à être plus efficaces dans leur travail.<br />\r\n<br />\r\nEnfin, le sport peut aider les programmeurs à être plus créatifs. Les activités physiques comme la randonnée, le vélo ou le yoga peuvent aider à clarifier les pensées et à trouver des solutions à des problèmes. Cela peut aider les programmeurs à trouver des idées et des solutions créatives pour résoudre les défis de programmation.<br />\r\n<br />\r\nEn somme, le sport est important pour les programmeurs car il peut les aider à améliorer leur santé mentale et physique, ainsi qu&#039;à augmenter leur productivité et leur créativité. Il est donc important pour les programmeurs de consacrer du temps à l&#039;activité physique pour maintenir une bonne santé mentale et physique.', 'pic_63d8a02f33fee3.06183828.jpg', 'Published', 27, '2023-01-31 03:59:27'),
(25, 'La nomenclature BEM', 'La nomenclature BEM (Block, Element, Modifier) est un système de nommage utilisé pour organiser les classes CSS dans un projet web. Il a été développé pour aider les développeurs à créer des styles CSS plus maintenables et plus faciles à comprendre.<br />\r\n<br />\r\nAvec BEM, chaque classe CSS est divisée en trois parties distinctes : le block, l&#039;élément et le modificateur.<br />\r\n<br />\r\nUn block est un élément de base de la page web, comme un bouton ou un formulaire. Il est représenté par un nom unique, qui est généralement défini en fonction de sa fonctionnalité. Par exemple, le block &quot;bouton&quot; aurait un nom de classe de &quot;bouton&quot;.<br />\r\n<br />\r\nUn élément est un sous-élément d&#039;un block, comme un titre ou un contenu. Il est représenté par un nom unique qui est lié au block parent. Par exemple, l&#039;élément &quot;titre&quot; dans le block &quot;bouton&quot; aurait un nom de classe de &quot;bouton__titre&quot;.<br />\r\n<br />\r\nUn modificateur est un état ou une variation d&#039;un block ou d&#039;un élément. Il est représenté par un nom unique qui est lié au block ou à l&#039;élément parent. Par exemple, un modificateur &quot;actif&quot; pour le block &quot;bouton&quot; aurait un nom de classe de &quot;bouton--actif&quot;.<br />\r\n<br />\r\nEn utilisant cette nomenclature, les développeurs peuvent créer des styles CSS qui sont faciles à comprendre et à maintenir. Les classes CSS sont organisées de manière logique, ce qui permet aux développeurs de comprendre rapidement comment les différents éléments de la page sont liés les uns aux autres. En outre, la nomenclature BEM permet aux développeurs de créer des styles réutilisables qui peuvent être facilement appliqués à d&#039;autres projets.<br />\r\n<br />\r\nIl est important de noter que la nomenclature BEM n&#039;est qu&#039;un système de nommage parmi d&#039;autres et qu&#039;il n&#039;est pas nécessaire d&#039;utiliser BEM pour tous les projets web. Cependant, pour les projets de grande envergure, utiliser BEM peut aider à maintenir un code CSS plus clair et plus facile à comprendre pour les développeurs.<br />\r\n<br />\r\nVoici un exemple de code HTML et CSS utilisant la nomenclature BEM :<br />\r\n<br />\r\nhtml:<br />\r\n<br />\r\n&lt;div class=&quot;card&quot;&gt;<br />\r\n  &lt;h2 class=&quot;card__title&quot;&gt;Titre du card&lt;/h2&gt;<br />\r\n  &lt;p class=&quot;card__content&quot;&gt;Contenu du card&lt;/p&gt;<br />\r\n  &lt;button class=&quot;card__button card__button--primary&quot;&gt;Envoyer&lt;/button&gt;<br />\r\n&lt;/div&gt;<br />\r\n<br />\r\n<br />\r\nCss:<br />\r\n<br />\r\n.card {<br />\r\n  padding: 20px;<br />\r\n  background-color: white;<br />\r\n}<br />\r\n<br />\r\n.card__title {<br />\r\n  font-size: 24px;<br />\r\n  font-weight: bold;<br />\r\n}<br />\r\n<br />\r\n.card__content {<br />\r\n  font-size: 18px;<br />\r\n}<br />\r\n<br />\r\n.card__button {<br />\r\n  padding: 10px 20px;<br />\r\n  border-radius: 5px;<br />\r\n  font-size: 16px;<br />\r\n}<br />\r\n<br />\r\n.card__button--primary {<br />\r\n  background-color: blue;<br />\r\n  color: white;<br />\r\n}<br />\r\n<br />\r\nEn résumé, la nomenclature BEM est un système de nommage utilisé pour organiser les classes CSS dans un projet web. Il permet aux développeurs de créer des styles réutilisables et faciles à comprendre pour les éléments de la page web. BEM est un outil pratique pour les projets de grande envergure, mais il n&#039;est pas nécessaire pour tous les projets web.', 'pic_63d8a142608522.22171236.jpg', 'Published', 27, '2023-01-31 04:04:02'),
(26, 'Le développeur fullstack', 'Le développement full stack fait référence à la capacité d&#039;un développeur à maîtriser les différentes couches d&#039;une application web, allant de la base de données à l&#039;interface utilisateur. Les développeurs full stack sont capables de gérer tous les aspects d&#039;un projet web, de la conception de l&#039;architecture logicielle à la mise en place de fonctionnalités en passant par la mise en place de tests automatisés.<br />\r\n<br />\r\nPour devenir un développeur full stack, il est nécessaire de maîtriser les différents langages de programmation utilisés dans les différentes couches d&#039;une application web. Cela comprend généralement des compétences en HTML, CSS et JavaScript pour la couche de présentation, ainsi que des compétences en Java, Python ou Ruby pour la couche de serveur. Il est également important de maîtriser les bases de données relationnelles et non relationnelles, ainsi que les outils de développement tels que Git, les méthodologies Agile et les outils de déploiement.<br />\r\n<br />\r\nEn tant que développeur full stack, vous devrez également être capable de travailler avec différents frameworks et bibliothèques. Cela peut inclure des frameworks de développement de front-end tels que React ou Angular, ainsi que des frameworks de développement de back-end tels que Express ou Ruby on Rails. Vous devrez également être capable de travailler avec des outils tels que Node.js et des bibliothèques telles que jQuery pour améliorer les fonctionnalités de l&#039;application web.<br />\r\n<br />\r\nLe développement full stack est de plus en plus populaire car il permet aux développeurs de créer des applications web complètes et de qualité supérieure en un temps record. Les développeurs full stack peuvent également facilement évoluer et échanger les différentes couches de l&#039;application, ce qui améliore la flexibilité et la capacité d&#039;adaptation de l&#039;application.<br />\r\n<br />\r\nEn outre, les développeurs full stack sont très recherchés sur le marché de l&#039;emploi en raison de leur capacité à gérer tous les aspects d&#039;un projet web. Les entreprises peuvent ainsi économiser de l&#039;argent en embauchant un développeur full stack plutôt que plusieurs développeurs spécialisés dans des domaines différents.<br />\r\n<br />\r\nIl est important de noter que devenir un développeur full stack peut être un défi, car il est nécessaire de maîtriser un grand nombre de compétences et de technologies différentes.', 'pic_63d8a9d9a5b776.12940082.jpg', 'Published', 40, '2023-01-31 04:40:41'),
(27, 'Le vélo: santé, écologie et économie', 'Le vélo est un moyen de transport pratique et économique, mais aussi un excellent exercice pour améliorer la santé physique et mentale. Les avantages de la pratique régulière du vélo sont nombreux et variés.<br />\r\n<br />\r\nTout d&#039;abord, le vélo est un excellent exercice cardiovasculaire qui renforce les muscles des jambes et du cœur. Cela peut aider à améliorer la condition physique générale et à réduire le risque de maladies cardiaques. De plus, le vélo peut brûler des calories et aider à perdre du poids, ce qui peut être bénéfique pour la santé en général.<br />\r\n<br />\r\nEn outre, la pratique du vélo peut aider à réduire le stress et à améliorer l&#039;humeur. Le fait de se déplacer à l&#039;extérieur et de prendre l&#039;air peut aider à se détendre et à se sentir plus détendu. De plus, le mouvement régulier peut augmenter la production d&#039;endorphines, les hormones du bien-être, ce qui peut aider à améliorer l&#039;humeur.<br />\r\n<br />\r\nLe vélo peut également être utilisé comme moyen de transport alternatif pour se rendre au travail ou faire des courses, ce qui peut économiser de l&#039;argent sur les coûts d&#039;essence et d&#039;entretien de la voiture. De plus, le vélo est un moyen de transport écologique et peut contribuer à la réduction des émissions de gaz à effet de serre.<br />\r\n<br />\r\nEnfin, la pratique régulière du vélo peut améliorer la santé mentale en augmentant la confiance en soi et en renforçant la détermination. Le fait de se fixer des objectifs et de les atteindre peut être très gratifiant et peut aider à améliorer la confiance en soi. De plus, le fait de se déplacer régulièrement peut aider à réduire l&#039;anxiété et à améliorer l&#039;humeur.<br />\r\n<br />\r\nEn conclusion, la pratique régulière du vélo peut avoir de nombreux avantages pour la santé physique et mentale. Il peut être utilisé comme moyen de transport alternatif, ce qui peut économiser de l&#039;argent et aider à protéger l&#039;environnement. De plus, la pratique du vélo peut aider à améliorer la condition physique, à réduire le stress et à améliorer l&#039;humeur. Il est donc important de considérer le vélo comme un moyen de maintenir une bonne santé et de mener une vie plus saine.', 'pic_63d8ac8cdd11c7.51348959.jpg', 'Published', 40, '2023-01-31 04:52:12'),
(28, 'A propos de l&#039;auteur du blog', '&quot;Bienvenue sur le blog des étudiants de l&#039;Université de Highfive University! Je suis Melchior BANKOLE, développeur fullstack et étudiant à Highfive University. A travers ce blog je partage une passion pour le codage et offre une plateforme pour les étudiants de Highfive University pour partager leurs expériences, leurs idées et leurs conseils dans le domaine du codage. Il s&#039;agit d&#039;un endroit pour connecter les étudiants les uns aux autres, pour discuter de sujets pertinents pour les étudiants et pour fournir des informations utiles sur les ressources et les opportunités disponibles à Highfive. Rejoignez notre communauté en ligne aujourd&#039;hui et faisons de notre université une expérience encore plus enrichissante pour tous!&quot;', 'pic_63d8b21bf17d84.01143949.jpg', 'Pending', 39, '2023-01-31 05:15:55'),
(29, 'Pagnifik day à Highfive', 'La Highfive University n&#039;est pas restée en marge de ce évenement. Ceci demontre qu&#039;au dela des cours, l&#039;université partage avec ses étudiants des moments de bonne joie et de bonne vibe.', 'pic_63d8ccdd37d798.07289028.jpg', 'Published', 43, '2023-01-31 07:10:05'),
(30, 'Portrait de Brunice', 'Incroyablement talentueuse, elle a une grande intelligence et une grande curiosité pour la technologie, ce qui l&#039;a poussée à se spécialiser le développement web. Elle est passionnée par son métier et aime apprendre de nouvelles choses, ce qui lui permet de rester à jour avec les dernières tendances et technologies web.<br />\r\n<br />\r\n  Elle est passionnée par son travail et aime le faire de manière professionnelle, ce qui lui permet de produire des résultats de qualité supérieure. Elle est capable de résoudre des problèmes complexes avec une grande efficacité, et est toujours à la recherche de nouveaux défis et de nouvelles opportunités pour s&#039;améliorer. Elle est également très dévouée à son travail et est capable de consacrer beaucoup de temps et d&#039;efforts pour atteindre ses objectifs.<br />\r\n<br />\r\n    En dehors de son travail, elle aime également se divertir et passer du temps avec ses amis et sa famille. Elle est très sportive et aime pratiquer la course à pied et le vélo. Elle est également très intéressée par la culture et aime voyager pour découvrir de nouveaux endroits et de nouvelles cultures.<br />\r\n<br />\r\n   C&#039;est une chance de l&#039;avoir comme dans son entourage.', 'pic_63d8ce0091b744.53964179.jpg', 'Published', 43, '2023-01-31 07:14:56');

-- --------------------------------------------------------

--
-- Structure de la table `articles_categories`
--

CREATE TABLE `articles_categories` (
  `article_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles_categories`
--

INSERT INTO `articles_categories` (`article_id`, `categorie_id`) VALUES
(23, 1),
(24, 2),
(25, 1),
(26, 1),
(27, 2),
(28, 3),
(29, 5),
(30, 3);

-- --------------------------------------------------------

--
-- Structure de la table `articles_comments`
--

CREATE TABLE `articles_comments` (
  `article_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `categorie_title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `categorie_title`, `description`) VALUES
(1, 'Dev-astuce', 'Être plus productif'),
(2, 'Dev-Santé', 'Prendre soin de sa santé'),
(3, 'Portrait', 'Présentation du personnage dans le domaine du dev'),
(5, 'Evenement', 'Cette categorie aborde les évenements et activités organisés HIGHFIVE.');

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `article_id` int(11) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `article_id`, `create_at`) VALUES
(125, 'Très jolie', 39, 29, '2023-01-31 08:48:00'),
(126, 'ddf', 39, 29, '2023-01-31 08:49:47'),
(129, 'yyut', 39, 29, '2023-01-31 08:57:59');

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

CREATE TABLE `galerie` (
  `id` int(11) NOT NULL,
  `image_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `galerie`
--

INSERT INTO `galerie` (`id`, `image_name`, `alt`) VALUES
(1, 'pic_63d8ceb747c333.72395653.jpg', 'Ils ont beaucoup d&#039;énergie ces mecs'),
(2, 'pic_63d8cf0200a785.93444319.jpg', 'Augustin, Marcos et Eric'),
(3, 'pic_63d8cf43437ec3.89606262.jpg', 'Warrios Vs Elite codeur'),
(4, 'pic_63d8cf56011c66.49323239.jpg', 'Vs'),
(5, 'pic_63d8cf9875b429.31341999.jpg', 'Melchior, Kola en background'),
(6, 'pic_63d8cfb914b5c2.99710200.jpg', 'Melchior'),
(7, 'pic_63d8d023eaa827.40224579.jpg', 'Photo d&#039;ensemble devant le bâtiment de VIPP Interstis'),
(8, 'pic_63d8d07d426734.12142119.jpg', 'à l&#039;interieur de Highfive'),
(9, 'pic_63d8d0c9db9634.34494933.jpg', 'Estelle, Pagnifik day'),
(10, 'pic_63d8d14f5505d6.01461099.jpg', 'Pagnifik day, photo d&#039;ensemble'),
(11, 'pic_63d8d1749040e9.30205091.jpg', 'Josué &amp; Larissa'),
(12, 'pic_63d8d1ae3fad71.64748790.jpg', 'Josué et la &#039;girl team&#039;'),
(13, 'pic_63d8d1e1d26ce6.63064836.jpg', 'La bande de Tiburce'),
(14, 'pic_63d8d202337099.42638355.jpg', 'Amir et sa bande'),
(15, 'pic_63d8d22635da66.25177891.jpg', 'Tiburce et la &#039;girl team&#039;'),
(16, 'pic_63d8d2839046e5.27021573.jpg', 'Après BA'),
(17, 'pic_63d8d2bde7b092.45675506.jpg', 'En salle de body pump'),
(18, 'pic_63d8d30ee7bfa4.36988747.jpg', 'Pagnifik day, les drapés'),
(19, 'pic_63d8d356985538.46633830.jpg', 'Pagnifik day, les gourous'),
(20, 'pic_63d8d3cfa55ca8.74395935.jpg', 'Après le vélo');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Default.jpg',
  `role` enum('Author','Admin','Suscriber') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Suscriber',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_picture`, `role`, `created_at`) VALUES
(27, 'OMOTOSHO', 'OMOTOSHO@gmail.com', '$2y$10$4rc.BCGj2rPBgiWgK5HueeoqK6BMi2KPstyH5Q4upMS79VVWmW2JK', 'pic_63bbfb02a35460.74494491.jpg', 'Admin', '2023-01-09 10:31:14'),
(32, 'BOMB', 'BOMB@gmail.com', '$2y$10$LK0gMICR07sIv9zjRMAuz.kVmqZldkwfmmtF40gx9ugIGX0Y8OHAK', 'pic_63ceecbb0ac864.42719548.png', 'Suscriber', '2023-01-23 19:23:23'),
(33, 'OMOTHO', 'fsf@sfsf.com', '$2y$10$K3dsjlAavzo.kQv/SnkVE.fgJVHxjBl68ZfUG301LK2UUhiCR.cqW', 'pic_63ceee553def40.21650785.jpg', 'Suscriber', '2023-01-23 19:30:13'),
(34, 'tokpe', 'tokpe@gmail.com', '$2y$10$uoc046077HiS6/Y6FHBhMeYz5w2mUVhrZvCrV3SKLzu0c4loOknQe', 'default.jpg', 'Suscriber', '2023-01-30 22:42:44'),
(39, 'Melchrist', 'melchrist@gmail.com', '$2y$10$bOF6NGhljctw1O1XBIlKOOME2/N6g8SLeUH/WJixNY.dJM3IBsiga', 'pic_63d8a5fe083154.28604867.jpg', 'Admin', '2023-01-31 04:24:14'),
(40, 'Motosho', 'motosho@gmail.com', '$2y$10$2g0lFfBcKs4rmqc9cEmzMefMvpLrWqeCWJDl3QfN486Isvqi0a9a.', 'pic_63d8a6dc8cfe23.07059539.jpg', 'Author', '2023-01-31 04:27:56'),
(43, 'Carolinie', 'carolinie@gmail.com', '$2y$10$73FHnf1aLtFJookP2vN.OO1SLW//PBWokak9JS30xzWN6gZ/tyq3C', 'pic_63d8c912efed87.82528462.jpg', 'Author', '2023-01-31 06:53:54'),
(45, 'Ivey', 'ivey@gmail.com', '$2y$10$0v1ir.iBJqxb0wxjkl8Ea.hLDKi4fnuDv2/XfKLe9QLXbB6Q9/WU6', 'pic_63d8c9b334ccd3.31022471.jpg', 'Suscriber', '2023-01-31 06:56:35');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `articles_categories`
--
ALTER TABLE `articles_categories`
  ADD PRIMARY KEY (`article_id`,`categorie_id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Index pour la table `articles_comments`
--
ALTER TABLE `articles_comments`
  ADD KEY `article_id` (`article_id`),
  ADD KEY `comment_id` (`comment_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `article_id` (`article_id`);

--
-- Index pour la table `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT pour la table `galerie`
--
ALTER TABLE `galerie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `articles_categories`
--
ALTER TABLE `articles_categories`
  ADD CONSTRAINT `articles_categories_ibfk_2` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `articles_categories_ibfk_3` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `articles_comments`
--
ALTER TABLE `articles_comments`
  ADD CONSTRAINT `articles_comments_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `articles_comments_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
