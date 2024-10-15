-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 15 oct. 2024 à 18:17
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bts_express`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnements`
--

CREATE TABLE `abonnements` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `duree_jours` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `abonnements`
--

INSERT INTO `abonnements` (`id`, `nom`, `prix`, `duree_jours`, `description`) VALUES
(4, 'PACK DECOUVERTE', 1.90, 30, 'Accès aux trois premiers chapitres de chaque module 1, 2, et 3 (soit un total de 9 chapitres). Ce pack inclut également l\'accès aux exercices et études de cas associés à ces chapitres, afin de renforcer les compétences apprises.\r\n\r\nPendant ce mois, si tu choisis de passer au forfait Premium, le Pack Découverte te sera offert, te permettant de continuer à progresser sans perdre les avantages déjà acquis.\r\n\r\n\r\n\r\n\r\n\r\n\r\n'),
(5, 'PACK STARTER 1 MOIS', 5.90, 30, 'les études de cas corrigées en profondeur, pour un apprentissage pratique et efficace.\r\n\r\nRejoins notre groupe Discord, accessible 24h/24, 7j/7, avec des salons de discussion spécialement dédiés aux étudiants du BTS SAM, organisés par matière et par région. De plus, bénéficie du soutien d\'un professeur privé via messages privés sur Discord, disponible pendant 1 mois pour répondre à toutes tes questions.\r\n\r\nNOUVEAU : contacte ton professeur directement via WhatsApp pour encore plus de flexibilité !\r\n\r\nÀ venir : reçois les sujets d\'examens le jour même de leur sortie. Si tu passes au forfait Starter durant ce mois, le Pack Découverte te sera offert gratuitement.\r\n\r\n\r\n\r\n\r\n\r\n\r\n'),
(6, 'PACK PREMIUM 1 AN', 7.90, 365, 'Accès à tous les cours et résumés pour une maîtrise complète des matières. Bénéficie également d\'un accès à tous les exercices avec leurs corrections détaillées, ainsi qu\'à toutes les études de cas avec des explications approfondies, pour consolider tes connaissances pratiques.\r\n\r\nRejoins notre groupe Discord, ouvert 24h/24, 7j/7, avec des salons de discussion dédiés aux étudiants du BTS SAM, organisés par matière et par région. De plus, un professeur privé est à ta disposition via messages privés sur Discord pendant 1 mois, pour répondre à toutes tes questions.\r\n\r\nNOUVEAU : tu peux désormais contacter ton professeur via WhatsApp pour plus de facilité !\r\n\r\nÀ venir : reçois les sujets d\'examens dès leur sortie.');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin@gmail.com', '$2y$10$rmBnmFdpbtw4DatgAogaf.uAJp.EYQs8koJ.I7ThwspQw7SVYo3ce');

-- --------------------------------------------------------

--
-- Structure de la table `case_studies`
--

CREATE TABLE `case_studies` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `study` text DEFAULT NULL,
  `solution` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `case_studies`
--

INSERT INTO `case_studies` (`id`, `course_id`, `study`, `solution`, `name`, `content`) VALUES
(1, 8, 'etude de cas', 'solution', NULL, NULL),
(2, 9, 'U5', 'U5', NULL, NULL),
(3, 10, 'nck', 'nck', NULL, NULL),
(4, 11, 'nck2', 'nck2', NULL, NULL),
(5, 12, 'nck2', 'nck2', NULL, NULL),
(6, 13, 'Étude de cas : La stratégie omnicanale de Biotrendy\r\nContexte\r\nBiotrendy est une entreprise fictive spécialisée dans la vente de vêtements et d’accessoires de mode écoresponsables et durables. Fondée en 2020, la marque s’appuie sur des matériaux biologiques et recyclés pour ses produits, tels que le coton biologique, le polyester recyclé et le cuir végétal. Biotrendy collabore avec des fournisseurs et des fabricants locaux pour minimiser son empreinte carbone et soutenir les économies locales.\r\n\r\nLa gamme de produits de Biotrendy comprend des vêtements pour femmes, hommes et enfants, ainsi que des accessoires tels que sacs, chaussures et bijoux. Les designs de Biotrendy sont à la fois tendance et intemporels, reflétant l’engagement de l’entreprise à créer des pièces durables qui résistent à l’épreuve du temps.\r\n\r\nBiotrendy possède actuellement trois magasins physiques dans des villes majeures et opère également un site web de commerce électronique. La marque compte plus de 50 000 abonnés sur ses réseaux sociaux et a récemment lancé une application mobile pour faciliter l’accès à ses produits et offrir des avantages exclusifs aux clients fidèles.\r\n\r\nFace à une concurrence croissante sur le marché de la mode écoresponsable et à l’évolution rapide des comportements d’achat des consommateurs, Biotrendy a décidé de développer une stratégie omnicanale pour améliorer l’expérience client et renforcer sa présence en ligne et en magasin. L’objectif est de créer une expérience fluide et cohérente sur tous les points de contact et d’adapter les offres et les communications aux besoins spécifiques de chaque client.\r\n\r\nPour soutenir sa stratégie omnicanale, Biotrendy prévoit d’investir dans des technologies innovantes, telles que des plateformes CRM, des chatbots et des outils d’analyse avancée, et de renforcer la collaboration entre les équipes en ligne et hors ligne pour assurer une coordination efficace et un partage d’informations en temps réel.\r\n\r\n \r\n\r\nQuestions\r\nQuestion 1 : Analyse SWOT\r\n\r\nRéalisez une analyse SWOT (forces, faiblesses, opportunités, menaces) de Biotrendy en tenant compte de son positionnement sur le marché de la mode écoresponsable et de sa volonté de développer une stratégie omnicanale.\r\n\r\nQuestion 2 : Cibles et segmentation\r\n\r\nIdentifiez les segments de clientèle cibles de Biotrendy et expliquez comment l’entreprise peut adapter sa stratégie omnicanale pour répondre aux besoins et aux attentes spécifiques de ces segments.\r\n\r\nQuestion 3 : Proposition de valeur et canaux de communication\r\n\r\nDécrivez la proposition de valeur de Biotrendy et proposez une stratégie de communication adaptée aux différents canaux (site web, réseaux sociaux, magasins physiques, email) pour mettre en avant cette proposition de valeur et attirer de nouveaux clients.\r\n\r\nQuestion 4 :Gestion de la relation client\r\n\r\nEnvisagez que Biotrendy mette en place un système CRM pour gérer ses données clients et ses interactions.\r\nQuels seraient les avantages d’un tel système pour l’entreprise et ses clients ?\r\nDonnez des exemples concrets de la manière dont Biotrendy pourrait utiliser les données collectées pour améliorer l’expérience client et renforcer la fidélisation.\r\n\r\nQuestion 5 : Mesure de la performance\r\n\r\nQuels indicateurs clés de performance (KPI) Biotrendy devrait-elle suivre pour évaluer l’efficacité de sa stratégie omnicanale ?\r\nProposez au moins cinq KPI pertinents et expliquez pourquoi ils sont importants pour mesurer le succès de l’entreprise.\r\n\r\n ', 'Etude de cas : correction\r\nQuestion 1 : Analyse SWOT\r\nForces :\r\n\r\nPositionnement unique en tant que marque de mode écoresponsable et durable\r\nCollaboration avec des fournisseurs et fabricants locaux pour soutenir l’économie locale et réduire l’empreinte carbone\r\nGamme de produits variée et designs à la fois tendance et intemporels\r\nPrésence en ligne et en magasin\r\nFaiblesses :\r\n\r\nTaille de l’entreprise et ressources limitées par rapport à la concurrence\r\nNécessité d’investir dans des technologies et des compétences pour mettre en œuvre une stratégie omnicanale réussie\r\nRisque de dilution de l’identité de la marque en voulant s’adresser à différents segments de clientèle\r\nOpportunités :\r\n\r\nCroissance du marché de la mode écoresponsable et prise de conscience croissante des consommateurs\r\nPotentiel d’amélioration de l’expérience client grâce à une approche omnicanale\r\nPossibilité d’élargir la présence en ligne et hors ligne pour toucher un public plus large\r\nMenaces :\r\n\r\nConcurrence croissante sur le marché de la mode écoresponsable\r\nÉvolution rapide des comportements d’achat des consommateurs et des technologies\r\nDifficultés potentielles pour maintenir la qualité et l’éthique des produits en élargissant la gamme et en augmentant la production\r\n \r\n\r\nQuestion 2 : Cibles et segmentation\r\nLes segments de clientèle cibles de Biotrendy pourraient être :\r\n\r\nJeunes adultes soucieux de l’environnement (18-35 ans) à la recherche de vêtements et d’accessoires tendance et durables.\r\nFamilles écoresponsables cherchant des vêtements de qualité et durables pour leurs enfants.\r\nConsommateurs soucieux de l’éthique, intéressés par le soutien aux économies locales et à la production responsable.\r\nPour adapter sa stratégie omnicanale à ces segments, Biotrendy pourrait :\r\n\r\nPersonnaliser les communications et les offres en fonction des préférences et des besoins spécifiques de chaque segment (par exemple, promotions ciblées, recommandations de produits, contenu éditorial).\r\nAdapter la présentation et la navigation sur le site web et l’application mobile pour faciliter la recherche de produits et d’informations pertinentes pour chaque segment.\r\nOffrir des avantages exclusifs et des récompenses de fidélité adaptés aux intérêts et aux attentes de chaque segment (par exemple, réductions sur les produits préférés, invitations à des événements spéciaux, dons à des organisations environnementales).\r\n \r\n\r\nQuestion 3 : Proposition de valeur et canaux de communication\r\nLa proposition de valeur de Biotrendy repose sur trois piliers :\r\n\r\nProduits de mode écoresponsables et durables fabriqués à partir de matériaux biologiques et recyclés.\r\nSoutien aux économies locales et réduction de l’empreinte carbone grâce à la collaboration avec des fournisseurs et des fabricants locaux.\r\nDesigns tendance et intemporels, adaptés à un mode de vie durable et respectueux de l’environnement.\r\nPour communiquer cette proposition de valeur et attirer de nouveaux clients, Biotrendy pourrait adopter la stratégie suivante pour chaque canal :\r\n\r\nSite web :\r\n\r\nMettre en avant les valeurs de la marque et les matériaux écoresponsables utilisés pour les produits sur la page d’accueil.\r\nCréer une section dédiée aux initiatives durables et éthiques de l’entreprise, incluant des témoignages de fournisseurs et de partenaires locaux.\r\nAfficher des certifications et labels écologiques pour renforcer la crédibilité et la transparence.\r\n\r\nRéseaux sociaux :\r\n\r\nPartager régulièrement du contenu mettant en valeur les produits, les pratiques durables et l’engagement envers l’économie locale.\r\nCollaborer avec des influenceurs partageant les mêmes valeurs pour élargir la portée de la marque et attirer de nouveaux clients.\r\nEngager la conversation avec les abonnés en partageant des conseils et des astuces sur la mode durable et en encourageant les clients à partager leurs propres expériences avec les produits Biotrendy.\r\n\r\nMagasins physiques :\r\n\r\nConcevoir l’espace de vente pour refléter les valeurs de la marque (par exemple, matériaux durables, éclairage écoénergétique, plantes et éléments naturels).\r\nFormer le personnel de vente pour qu’il puisse informer les clients sur les initiatives durables et éthiques de l’entreprise et répondre à leurs questions.\r\nOrganiser des événements spéciaux pour promouvoir les nouvelles collections et renforcer la relation avec la clientèle locale (par exemple, ateliers de mode durable, rencontres avec les créateurs et les fournisseurs locaux).\r\nEmail :\r\n\r\nEnvoyer des newsletters personnalisées mettant en avant les produits et les offres adaptés aux intérêts et aux préférences de chaque abonné.\r\nCommuniquer sur les actualités de l’entreprise et les initiatives durables pour renforcer l’engagement des clients envers la marque.\r\nInviter les clients à donner leur avis sur les produits et à partager leurs expériences sur les réseaux sociaux pour générer du bouche-à-oreille positif.\r\n \r\n\r\nQuestion 4 : Gestion de la relation client\r\nLes avantages d’un système CRM pour Biotrendy et ses clients pourraient être :\r\n\r\nCentralisation des données clients et des interactions sur tous les canaux pour améliorer la connaissance des clients et anticiper leurs besoins.\r\nPersonnalisation des offres, des recommandations et des communications en fonction des préférences et du comportement d’achat de chaque client.\r\nSuivi et résolution plus efficace des problèmes et des réclamations grâce à un accès rapide et complet aux informations sur les clients et leurs historiques.\r\nExemples d’utilisation des données collectées pour améliorer l’expérience client et renforcer la fidélisation :\r\n\r\nEnvoi d’offres promotionnelles ciblées sur les produits préférés ou complémentaires à des achats précédents.\r\nRelance des clients ayant abandonné leur panier en ligne avec des incitations à finaliser leur achat (par exemple, offre de livraison gratuite).\r\nInvitation des clients fidèles à rejoindre un programme de fidélité offrant des récompenses exclusives et des avantages personnalisés.\r\n \r\n\r\nQuestion 5 : Mesure de la performance\r\nLes KPI que Biotrendy devrait suivre pour évaluer l’efficacité de sa stratégie omnicanale pourraient être :\r\n\r\nTaux de conversion : Mesure la proportion de visiteurs qui effectuent un achat sur le site web ou en magasin. Un taux de conversion élevé indique que la stratégie omnicanale est efficace pour convertir les visiteurs en clients.\r\nTaux de rétention des clients : Indique la proportion de clients qui reviennent et effectuent des achats répétés. Un taux de rétention élevé suggère que l’expérience omnicanale encourage la fidélisation des clients.\r\nValeur vie client (CLV) : Estime la valeur totale qu’un client apporte à l’entreprise tout au long de sa relation. Une CLV croissante signifie que la stratégie omnicanale génère des clients plus rentables sur le long terme.\r\nTaux de satisfaction client (CSAT) : Mesure la satisfaction des clients en fonction de leurs interactions avec l’entreprise sur différents canaux. Un CSAT élevé indique que les clients apprécient l’expérience omnicanale offerte par Biotrendy.\r\nRetour sur investissement (ROI) : Calcule le bénéfice généré par la stratégie omnicanale par rapport au coût total de sa mise en œuvre. Un ROI positif démontre que l’investissement dans la stratégie omnicanale est rentable pour l’entreprise.\r\n \r\n\r\nConclusion de l’étude de cas\r\nL’étude de cas de Biotrendy met en évidence l’importance d’adopter une approche omnicanale pour améliorer l’expérience client et renforcer la présence en ligne et en magasin dans le marché concurrentiel de la mode écoresponsable.\r\n\r\nEn développant une stratégie adaptée à ses segments de clientèle cibles, en communiquant efficacement sa proposition de valeur sur différents canaux et en utilisant les technologies CRM pour gérer les données et les interactions, Biotrendy peut créer une expérience fluide et cohérente pour ses clients et les fidéliser sur le long terme.\r\n\r\nLe suivi des KPI pertinents permettra à l’entreprise d’évaluer l’efficacité de sa stratégie omnicanale et d’ajuster ses actions en conséquence pour optimiser les résultats et la rentabilité.', NULL, NULL),
(7, 14, 'nck2', 'nck2', NULL, NULL),
(8, 15, 'nck2', 'nck2', NULL, NULL),
(9, 23, 'etude de cas', 'coorection etc', 'etc correction', 'contenu coorrectetc'),
(10, 24, 'etude de cas', 'coorection etc', 'etc correction', 'contenu coorrectetc'),
(11, 25, 'etude de cas', 'coorection etc', 'etc correction', 'contenu coorrectetc'),
(12, 26, '1', '1', '1', '1'),
(13, 27, '1', '1', '1', '1'),
(14, 28, 'Étude de cas – Gestion de la relation client digitale pour une entreprise de cosmétiques', 'Etude de cas 1 : correction', 'Contexte \r\n\r\n“BeautyCare” est une entreprise spécialisée dans la vente de produits cosmétiques naturels et biologiques. L’entreprise a récemment lancé sa boutique en ligne et souhaite améliorer sa gestion de la relation client digitale pour accroître ses ', 'Correction de l’étude de cas – Gestion de la relation client digitale pour “BeautyCare”, une entreprise de cosmétiques\r\nPrincipaux enjeux pour améliorer la relation client digitale de BeautyCare:\r\na. Réduction du temps de réponse aux demandes des clients par e-mail.\r\n\r\nb. Amélioration de l’engagement et de la visibilité sur les réseaux sociaux.\r\n\r\nc. Personnalisation et cohérence dans la gestion des interactions sur les réseaux sociaux.\r\n\r\nd. Mise en place d’un chat en direct pour offrir une assistance en temps réel aux clients.\r\n\r\n \r\n\r\nSolutions pour résoudre ces enjeux en utilisant différents canaux de communication digitale :\r\na. E-mail : Automatiser les réponses aux questions fréquentes et mettre en place un système de suivi pour s’assurer que les demandes des clients sont traitées rapidement. Éventuellement, embaucher plus d’agents pour le service client afin de mieux gérer le volume de demandes.\r\n\r\nb. Réseaux sociaux : Créer un calendrier de contenu varié et engageant, incluant des promotions, des conseils beauté, des témoignages de clients et des événements. Encourager les clients à interagir en posant des questions et en organisant des concours.\r\n\r\nc. Gestion des interactions : Former les agents du service client aux bonnes pratiques de communication sur les réseaux sociaux et mettre en place des lignes directrices pour assurer la cohérence dans les réponses et la personnalisation des interactions.\r\n\r\nd. Chat en direct : Implémenter un chat en direct sur le site web de BeautyCare pour permettre aux clients d’obtenir de l’aide rapidement. Former les agents du service client à utiliser le chat en direct et à gérer plusieurs conversations simultanément.\r\n\r\n \r\n\r\nMise en place des bonnes pratiques pour gérer efficacement les interactions avec les clients sur chaque canal de communication digitale :\r\na. E-mail : Répondre rapidement aux e-mails, utiliser un ton professionnel et empathique, personnaliser les réponses en fonction des besoins des clients et effectuer un suivi pour s’assurer que les problèmes sont résolus.\r\n\r\nb. Réseaux sociaux : Répondre rapidement aux commentaires et aux messages directs, adopter un ton amical et engageant, et aborder les problèmes en privé lorsque cela est approprié.\r\n\r\nc. Chat en direct : Répondre rapidement aux demandes, fournir des informations précises et claires, et encourager les clients à poser des questions supplémentaires si nécessaire.\r\n\r\n \r\n\r\nIndicateurs de performance clés (KPI) à suivre pour évaluer l’efficacité de la stratégie de relation client digitale de BeautyCare :\r\na. Temps de réponse moyen aux e-mails et aux messages sur les réseaux sociaux.\r\n\r\nb. Taux de résolution des problèmes à la première interaction.\r\n\r\nc. Taux de satisfaction des clients.\r\n\r\nd. Nombre de mentions, partages, likes et commentaires sur les publications des réseaux sociaux.\r\n\r\ne. Taux de conversion des visiteurs du site web en clients grâce au chat en direct.\r\n\r\nEn suivant ces recommandations, BeautyCare devrait être en mesure d’améliorer sa relation client digitale, d’augmenter la satisfaction des clients et de renforcer sa présence en ligne.'),
(15, 29, 'Étude de cas – Gestion de la relation client digitale pour une entreprise de cosmétiques', 'Etude de cas 1 : correction', 'Contexte \r\n\r\n“BeautyCare” est une entreprise spécialisée dans la vente de produits cosmétiques naturels et biologiques. L’entreprise a récemment lancé sa boutique en ligne et souhaite améliorer sa gestion de la relation client digitale pour accroître ses ', 'Correction de l’étude de cas – Gestion de la relation client digitale pour “BeautyCare”, une entreprise de cosmétiques\r\nPrincipaux enjeux pour améliorer la relation client digitale de BeautyCare:\r\na. Réduction du temps de réponse aux demandes des clients par e-mail.\r\n\r\nb. Amélioration de l’engagement et de la visibilité sur les réseaux sociaux.\r\n\r\nc. Personnalisation et cohérence dans la gestion des interactions sur les réseaux sociaux.\r\n\r\nd. Mise en place d’un chat en direct pour offrir une assistance en temps réel aux clients.\r\n\r\n \r\n\r\nSolutions pour résoudre ces enjeux en utilisant différents canaux de communication digitale :\r\na. E-mail : Automatiser les réponses aux questions fréquentes et mettre en place un système de suivi pour s’assurer que les demandes des clients sont traitées rapidement. Éventuellement, embaucher plus d’agents pour le service client afin de mieux gérer le volume de demandes.\r\n\r\nb. Réseaux sociaux : Créer un calendrier de contenu varié et engageant, incluant des promotions, des conseils beauté, des témoignages de clients et des événements. Encourager les clients à interagir en posant des questions et en organisant des concours.\r\n\r\nc. Gestion des interactions : Former les agents du service client aux bonnes pratiques de communication sur les réseaux sociaux et mettre en place des lignes directrices pour assurer la cohérence dans les réponses et la personnalisation des interactions.\r\n\r\nd. Chat en direct : Implémenter un chat en direct sur le site web de BeautyCare pour permettre aux clients d’obtenir de l’aide rapidement. Former les agents du service client à utiliser le chat en direct et à gérer plusieurs conversations simultanément.\r\n\r\n \r\n\r\nMise en place des bonnes pratiques pour gérer efficacement les interactions avec les clients sur chaque canal de communication digitale :\r\na. E-mail : Répondre rapidement aux e-mails, utiliser un ton professionnel et empathique, personnaliser les réponses en fonction des besoins des clients et effectuer un suivi pour s’assurer que les problèmes sont résolus.\r\n\r\nb. Réseaux sociaux : Répondre rapidement aux commentaires et aux messages directs, adopter un ton amical et engageant, et aborder les problèmes en privé lorsque cela est approprié.\r\n\r\nc. Chat en direct : Répondre rapidement aux demandes, fournir des informations précises et claires, et encourager les clients à poser des questions supplémentaires si nécessaire.\r\n\r\n \r\n\r\nIndicateurs de performance clés (KPI) à suivre pour évaluer l’efficacité de la stratégie de relation client digitale de BeautyCare :\r\na. Temps de réponse moyen aux e-mails et aux messages sur les réseaux sociaux.\r\n\r\nb. Taux de résolution des problèmes à la première interaction.\r\n\r\nc. Taux de satisfaction des clients.\r\n\r\nd. Nombre de mentions, partages, likes et commentaires sur les publications des réseaux sociaux.\r\n\r\ne. Taux de conversion des visiteurs du site web en clients grâce au chat en direct.\r\n\r\nEn suivant ces recommandations, BeautyCare devrait être en mesure d’améliorer sa relation client digitale, d’augmenter la satisfaction des clients et de renforcer sa présence en ligne.'),
(16, 30, 'Étude de cas : La stratégie omnicanale de Biotrendy', 'Etude de cas : correction', 'Contexte\r\nBiotrendy est une entreprise fictive spécialisée dans la vente de vêtements et d’accessoires de mode écoresponsables et durables. Fondée en 2020, la marque s’appuie sur des matériaux biologiques et recyclés pour ses produits, tels que le coton b', 'Question 1 : Analyse SWOT\r\nForces :\r\n\r\nPositionnement unique en tant que marque de mode écoresponsable et durable\r\nCollaboration avec des fournisseurs et fabricants locaux pour soutenir l’économie locale et réduire l’empreinte carbone\r\nGamme de produits variée et designs à la fois tendance et intemporels\r\nPrésence en ligne et en magasin\r\nFaiblesses :\r\n\r\nTaille de l’entreprise et ressources limitées par rapport à la concurrence\r\nNécessité d’investir dans des technologies et des compétences pour mettre en œuvre une stratégie omnicanale réussie\r\nRisque de dilution de l’identité de la marque en voulant s’adresser à différents segments de clientèle\r\nOpportunités :\r\n\r\nCroissance du marché de la mode écoresponsable et prise de conscience croissante des consommateurs\r\nPotentiel d’amélioration de l’expérience client grâce à une approche omnicanale\r\nPossibilité d’élargir la présence en ligne et hors ligne pour toucher un public plus large\r\nMenaces :\r\n\r\nConcurrence croissante sur le marché de la mode écoresponsable\r\nÉvolution rapide des comportements d’achat des consommateurs et des technologies\r\nDifficultés potentielles pour maintenir la qualité et l’éthique des produits en élargissant la gamme et en augmentant la production\r\n \r\n\r\nQuestion 2 : Cibles et segmentation\r\nLes segments de clientèle cibles de Biotrendy pourraient être :\r\n\r\nJeunes adultes soucieux de l’environnement (18-35 ans) à la recherche de vêtements et d’accessoires tendance et durables.\r\nFamilles écoresponsables cherchant des vêtements de qualité et durables pour leurs enfants.\r\nConsommateurs soucieux de l’éthique, intéressés par le soutien aux économies locales et à la production responsable.\r\nPour adapter sa stratégie omnicanale à ces segments, Biotrendy pourrait :\r\n\r\nPersonnaliser les communications et les offres en fonction des préférences et des besoins spécifiques de chaque segment (par exemple, promotions ciblées, recommandations de produits, contenu éditorial).\r\nAdapter la présentation et la navigation sur le site web et l’application mobile pour faciliter la recherche de produits et d’informations pertinentes pour chaque segment.\r\nOffrir des avantages exclusifs et des récompenses de fidélité adaptés aux intérêts et aux attentes de chaque segment (par exemple, réductions sur les produits préférés, invitations à des événements spéciaux, dons à des organisations environnementales).\r\n \r\n\r\nQuestion 3 : Proposition de valeur et canaux de communication\r\nLa proposition de valeur de Biotrendy repose sur trois piliers :\r\n\r\nProduits de mode écoresponsables et durables fabriqués à partir de matériaux biologiques et recyclés.\r\nSoutien aux économies locales et réduction de l’empreinte carbone grâce à la collaboration avec des fournisseurs et des fabricants locaux.\r\nDesigns tendance et intemporels, adaptés à un mode de vie durable et respectueux de l’environnement.\r\nPour communiquer cette proposition de valeur et attirer de nouveaux clients, Biotrendy pourrait adopter la stratégie suivante pour chaque canal :\r\n\r\nSite web :\r\n\r\nMettre en avant les valeurs de la marque et les matériaux écoresponsables utilisés pour les produits sur la page d’accueil.\r\nCréer une section dédiée aux initiatives durables et éthiques de l’entreprise, incluant des témoignages de fournisseurs et de partenaires locaux.\r\nAfficher des certifications et labels écologiques pour renforcer la crédibilité et la transparence.\r\n\r\nRéseaux sociaux :\r\n\r\nPartager régulièrement du contenu mettant en valeur les produits, les pratiques durables et l’engagement envers l’économie locale.\r\nCollaborer avec des influenceurs partageant les mêmes valeurs pour élargir la portée de la marque et attirer de nouveaux clients.\r\nEngager la conversation avec les abonnés en partageant des conseils et des astuces sur la mode durable et en encourageant les clients à partager leurs propres expériences avec les produits Biotrendy.\r\n\r\nMagasins physiques :\r\n\r\nConcevoir l’espace de vente pour refléter les valeurs de la marque (par exemple, matériaux durables, éclairage écoénergétique, plantes et éléments naturels).\r\nFormer le personnel de vente pour qu’il puisse informer les clients sur les initiatives durables et éthiques de l’entreprise et répondre à leurs questions.\r\nOrganiser des événements spéciaux pour promouvoir les nouvelles collections et renforcer la relation avec la clientèle locale (par exemple, ateliers de mode durable, rencontres avec les créateurs et les fournisseurs locaux).\r\nEmail :\r\n\r\nEnvoyer des newsletters personnalisées mettant en avant les produits et les offres adaptés aux intérêts et aux préférences de chaque abonné.\r\nCommuniquer sur les actualités de l’entreprise et les initiatives durables pour renforcer l’engagement des clients envers la marque.\r\nInviter les clients à donner leur avis sur les produits et à partager leurs expériences sur les réseaux sociaux pour générer du bouche-à-oreille positif.\r\n \r\n\r\nQuestion 4 : Gestion de la relation client\r\nLes avantages d’un système CRM pour Biotrendy et ses clients pourraient être :\r\n\r\nCentralisation des données clients et des interactions sur tous les canaux pour améliorer la connaissance des clients et anticiper leurs besoins.\r\nPersonnalisation des offres, des recommandations et des communications en fonction des préférences et du comportement d’achat de chaque client.\r\nSuivi et résolution plus efficace des problèmes et des réclamations grâce à un accès rapide et complet aux informations sur les clients et leurs historiques.\r\nExemples d’utilisation des données collectées pour améliorer l’expérience client et renforcer la fidélisation :\r\n\r\nEnvoi d’offres promotionnelles ciblées sur les produits préférés ou complémentaires à des achats précédents.\r\nRelance des clients ayant abandonné leur panier en ligne avec des incitations à finaliser leur achat (par exemple, offre de livraison gratuite).\r\nInvitation des clients fidèles à rejoindre un programme de fidélité offrant des récompenses exclusives et des avantages personnalisés.\r\n \r\n\r\nQuestion 5 : Mesure de la performance\r\nLes KPI que Biotrendy devrait suivre pour évaluer l’efficacité de sa stratégie omnicanale pourraient être :\r\n\r\nTaux de conversion : Mesure la proportion de visiteurs qui effectuent un achat sur le site web ou en magasin. Un taux de conversion élevé indique que la stratégie omnicanale est efficace pour convertir les visiteurs en clients.\r\nTaux de rétention des clients : Indique la proportion de clients qui reviennent et effectuent des achats répétés. Un taux de rétention élevé suggère que l’expérience omnicanale encourage la fidélisation des clients.\r\nValeur vie client (CLV) : Estime la valeur totale qu’un client apporte à l’entreprise tout au long de sa relation. Une CLV croissante signifie que la stratégie omnicanale génère des clients plus rentables sur le long terme.\r\nTaux de satisfaction client (CSAT) : Mesure la satisfaction des clients en fonction de leurs interactions avec l’entreprise sur différents canaux. Un CSAT élevé indique que les clients apprécient l’expérience omnicanale offerte par Biotrendy.\r\nRetour sur investissement (ROI) : Calcule le bénéfice généré par la stratégie omnicanale par rapport au coût total de sa mise en œuvre. Un ROI positif démontre que l’investissement dans la stratégie omnicanale est rentable pour l’entreprise.\r\n \r\n\r\nConclusion de l’étude de cas\r\nL’étude de cas de Biotrendy met en évidence l’importance d’adopter une approche omnicanale pour améliorer l’expérience client et renforcer la présence en ligne et en magasin dans le marché concurrentiel de la mode écoresponsable.\r\n\r\nEn développant une stratégie adaptée à ses segments de clientèle cibles, en communiquant efficacement sa proposition de valeur sur différents canaux et en utilisant les technologies CRM pour gérer les données et les interactions, Biotrendy peut créer une expérience fluide et cohérente pour ses clients et les fidéliser sur le long terme.\r\n\r\nLe suivi des KPI pertinents permettra à l’entreprise d’évaluer l’efficacité de sa stratégie omnicanale et d’ajuster ses actions en conséquence pour optimiser les résultats et la rentabilité.'),
(17, 31, 'Étude de cas : La stratégie omnicanale de Biotrendy', 'Etude de cas : correction', 'Contexte\r\nBiotrendy est une entreprise fictive spécialisée dans la vente de vêtements et d’accessoires de mode écoresponsables et durables. Fondée en 2020, la marque s’appuie sur des matériaux biologiques et recyclés pour ses produits, tels que le coton b', 'Question 1 : Analyse SWOT\r\nForces :\r\n\r\nPositionnement unique en tant que marque de mode écoresponsable et durable\r\nCollaboration avec des fournisseurs et fabricants locaux pour soutenir l’économie locale et réduire l’empreinte carbone\r\nGamme de produits variée et designs à la fois tendance et intemporels\r\nPrésence en ligne et en magasin\r\nFaiblesses :\r\n\r\nTaille de l’entreprise et ressources limitées par rapport à la concurrence\r\nNécessité d’investir dans des technologies et des compétences pour mettre en œuvre une stratégie omnicanale réussie\r\nRisque de dilution de l’identité de la marque en voulant s’adresser à différents segments de clientèle\r\nOpportunités :\r\n\r\nCroissance du marché de la mode écoresponsable et prise de conscience croissante des consommateurs\r\nPotentiel d’amélioration de l’expérience client grâce à une approche omnicanale\r\nPossibilité d’élargir la présence en ligne et hors ligne pour toucher un public plus large\r\nMenaces :\r\n\r\nConcurrence croissante sur le marché de la mode écoresponsable\r\nÉvolution rapide des comportements d’achat des consommateurs et des technologies\r\nDifficultés potentielles pour maintenir la qualité et l’éthique des produits en élargissant la gamme et en augmentant la production\r\n \r\n\r\nQuestion 2 : Cibles et segmentation\r\nLes segments de clientèle cibles de Biotrendy pourraient être :\r\n\r\nJeunes adultes soucieux de l’environnement (18-35 ans) à la recherche de vêtements et d’accessoires tendance et durables.\r\nFamilles écoresponsables cherchant des vêtements de qualité et durables pour leurs enfants.\r\nConsommateurs soucieux de l’éthique, intéressés par le soutien aux économies locales et à la production responsable.\r\nPour adapter sa stratégie omnicanale à ces segments, Biotrendy pourrait :\r\n\r\nPersonnaliser les communications et les offres en fonction des préférences et des besoins spécifiques de chaque segment (par exemple, promotions ciblées, recommandations de produits, contenu éditorial).\r\nAdapter la présentation et la navigation sur le site web et l’application mobile pour faciliter la recherche de produits et d’informations pertinentes pour chaque segment.\r\nOffrir des avantages exclusifs et des récompenses de fidélité adaptés aux intérêts et aux attentes de chaque segment (par exemple, réductions sur les produits préférés, invitations à des événements spéciaux, dons à des organisations environnementales).\r\n \r\n\r\nQuestion 3 : Proposition de valeur et canaux de communication\r\nLa proposition de valeur de Biotrendy repose sur trois piliers :\r\n\r\nProduits de mode écoresponsables et durables fabriqués à partir de matériaux biologiques et recyclés.\r\nSoutien aux économies locales et réduction de l’empreinte carbone grâce à la collaboration avec des fournisseurs et des fabricants locaux.\r\nDesigns tendance et intemporels, adaptés à un mode de vie durable et respectueux de l’environnement.\r\nPour communiquer cette proposition de valeur et attirer de nouveaux clients, Biotrendy pourrait adopter la stratégie suivante pour chaque canal :\r\n\r\nSite web :\r\n\r\nMettre en avant les valeurs de la marque et les matériaux écoresponsables utilisés pour les produits sur la page d’accueil.\r\nCréer une section dédiée aux initiatives durables et éthiques de l’entreprise, incluant des témoignages de fournisseurs et de partenaires locaux.\r\nAfficher des certifications et labels écologiques pour renforcer la crédibilité et la transparence.\r\n\r\nRéseaux sociaux :\r\n\r\nPartager régulièrement du contenu mettant en valeur les produits, les pratiques durables et l’engagement envers l’économie locale.\r\nCollaborer avec des influenceurs partageant les mêmes valeurs pour élargir la portée de la marque et attirer de nouveaux clients.\r\nEngager la conversation avec les abonnés en partageant des conseils et des astuces sur la mode durable et en encourageant les clients à partager leurs propres expériences avec les produits Biotrendy.\r\n\r\nMagasins physiques :\r\n\r\nConcevoir l’espace de vente pour refléter les valeurs de la marque (par exemple, matériaux durables, éclairage écoénergétique, plantes et éléments naturels).\r\nFormer le personnel de vente pour qu’il puisse informer les clients sur les initiatives durables et éthiques de l’entreprise et répondre à leurs questions.\r\nOrganiser des événements spéciaux pour promouvoir les nouvelles collections et renforcer la relation avec la clientèle locale (par exemple, ateliers de mode durable, rencontres avec les créateurs et les fournisseurs locaux).\r\nEmail :\r\n\r\nEnvoyer des newsletters personnalisées mettant en avant les produits et les offres adaptés aux intérêts et aux préférences de chaque abonné.\r\nCommuniquer sur les actualités de l’entreprise et les initiatives durables pour renforcer l’engagement des clients envers la marque.\r\nInviter les clients à donner leur avis sur les produits et à partager leurs expériences sur les réseaux sociaux pour générer du bouche-à-oreille positif.\r\n \r\n\r\nQuestion 4 : Gestion de la relation client\r\nLes avantages d’un système CRM pour Biotrendy et ses clients pourraient être :\r\n\r\nCentralisation des données clients et des interactions sur tous les canaux pour améliorer la connaissance des clients et anticiper leurs besoins.\r\nPersonnalisation des offres, des recommandations et des communications en fonction des préférences et du comportement d’achat de chaque client.\r\nSuivi et résolution plus efficace des problèmes et des réclamations grâce à un accès rapide et complet aux informations sur les clients et leurs historiques.\r\nExemples d’utilisation des données collectées pour améliorer l’expérience client et renforcer la fidélisation :\r\n\r\nEnvoi d’offres promotionnelles ciblées sur les produits préférés ou complémentaires à des achats précédents.\r\nRelance des clients ayant abandonné leur panier en ligne avec des incitations à finaliser leur achat (par exemple, offre de livraison gratuite).\r\nInvitation des clients fidèles à rejoindre un programme de fidélité offrant des récompenses exclusives et des avantages personnalisés.\r\n \r\n\r\nQuestion 5 : Mesure de la performance\r\nLes KPI que Biotrendy devrait suivre pour évaluer l’efficacité de sa stratégie omnicanale pourraient être :\r\n\r\nTaux de conversion : Mesure la proportion de visiteurs qui effectuent un achat sur le site web ou en magasin. Un taux de conversion élevé indique que la stratégie omnicanale est efficace pour convertir les visiteurs en clients.\r\nTaux de rétention des clients : Indique la proportion de clients qui reviennent et effectuent des achats répétés. Un taux de rétention élevé suggère que l’expérience omnicanale encourage la fidélisation des clients.\r\nValeur vie client (CLV) : Estime la valeur totale qu’un client apporte à l’entreprise tout au long de sa relation. Une CLV croissante signifie que la stratégie omnicanale génère des clients plus rentables sur le long terme.\r\nTaux de satisfaction client (CSAT) : Mesure la satisfaction des clients en fonction de leurs interactions avec l’entreprise sur différents canaux. Un CSAT élevé indique que les clients apprécient l’expérience omnicanale offerte par Biotrendy.\r\nRetour sur investissement (ROI) : Calcule le bénéfice généré par la stratégie omnicanale par rapport au coût total de sa mise en œuvre. Un ROI positif démontre que l’investissement dans la stratégie omnicanale est rentable pour l’entreprise.\r\n \r\n\r\nConclusion de l’étude de cas\r\nL’étude de cas de Biotrendy met en évidence l’importance d’adopter une approche omnicanale pour améliorer l’expérience client et renforcer la présence en ligne et en magasin dans le marché concurrentiel de la mode écoresponsable.\r\n\r\nEn développant une stratégie adaptée à ses segments de clientèle cibles, en communiquant efficacement sa proposition de valeur sur différents canaux et en utilisant les technologies CRM pour gérer les données et les interactions, Biotrendy peut créer une expérience fluide et cohérente pour ses clients et les fidéliser sur le long terme.\r\n\r\nLe suivi des KPI pertinents permettra à l’entreprise d’évaluer l’efficacité de sa stratégie omnicanale et d’ajuster ses actions en conséquence pour optimiser les résultats et la rentabilité.'),
(18, 32, '010', '012', '011', '013'),
(19, 33, '010', '012', '011', '013'),
(20, 34, '1', '1', '1', '1'),
(21, 35, '1', '1', '1', '1'),
(22, 36, '1', '1', '1', '1'),
(23, 37, '1', '1', '1', '1'),
(24, 38, '1', '1', '1', '1'),
(25, 39, 'Prospection et ciblage pour une startup de vêtements écologiques', 'Contexte\r\nEcoFashion est une startup française spécialisée dans la vente de vêtements écologiques et éthiques en ligne. L’entreprise, fondée en 2022 par trois entrepreneurs passionnés de mode et d’écologie, propose une large gamme de produits pour hommes, femmes et enfants, conçus à partir de matériaux durables et respectueux de l’environnement tels que le coton biologique, le lin et le Tencel.\r\n\r\nEcoFashion travaille en étroite collaboration avec des fabricants locaux et des artisans pour garantir une production éthique, tout en soutenant l’économie locale. En plus de la mode durable, l’entreprise s’engage également à réduire son empreinte carbone en adoptant des pratiques telles que l’emballage éco-responsable et en compensant les émissions de CO2 générées par les livraisons.\r\n\r\nL’entreprise souhaite développer sa clientèle et augmenter sa visibilité sur le marché français, en mettant en place une stratégie de prospection et de ciblage efficace. L’objectif est d’attirer et fidéliser une clientèle soucieuse de l’environnement et de la mode durable, tout en se démarquant de la concurrence. Pour ce faire, EcoFashion mise sur une communication transparente, un service client personnalisé et la promotion d’initiatives éco-responsables.\r\n\r\nActuellement, la majorité des ventes d’EcoFashion proviennent de son site web et de quelques partenariats avec des boutiques physiques spécialisées. L’entreprise souhaite élargir sa présence en ligne et développer des partenariats stratégiques pour accroître sa notoriété et toucher de nouveaux clients.\r\n\r\nQuestions\r\nQuels sont les segments de marché pertinents pour EcoFashion ? Décrivez les caractéristiques de chaque segment et expliquez pourquoi ils sont importants pour l’entreprise.\r\nEn vous basant sur les segments de marché identifiés, créez un persona pour chacun d’eux. Incluez des informations telles que l’âge, la profession, les centres d’intérêt, les besoins et les attentes de chaque persona.\r\nQuels canaux de prospection seraient les plus adaptés pour atteindre les différents segments de marché et personas identifiés ? Justifiez vos choix.\r\nEcoFashion souhaite mettre en place une stratégie de prospection multicanal. Proposez un plan de prospection détaillé, incluant les objectifs, les messages clés et les actions à mettre en œuvre pour chaque segment de marché et persona.\r\nComment EcoFashion peut-elle mesurer l’efficacité de sa stratégie de prospection et de ciblage ? Proposez des indicateurs clés de performance (KPI) et des méthodes pour suivre et évaluer les résultats de la prospection.\r\n \r\n\r\n \r\n\r\nFélicitations, tu viens de terminer le chapitre 1 du bloc E4 😉\r\n\r\nOn s’arrête ou “on est pas fatigué” ?\r\n\r\nLe prochain chapitre t’attend en cliquant ici.', 'Correction Étude de cas : Prospection et ciblage pour une startup de vêtements écologiques', 'Réponses pour chaque question\r\nQuels sont les segments de marché pertinents pour EcoFashion ? Décrivez les caractéristiques de chaque segment et expliquez pourquoi ils sont importants pour l’entreprise.\r\nSegment 1 : Éco-militants (18-35 ans) – Recherchent des vêtements durables et éthiques, sensibles aux causes environnementales et sociales, actifs sur les réseaux sociaux.\r\nSegment 2 : Professionnels soucieux de l’environnement (25-55 ans) – Recherchent des vêtements éco-responsables pour le travail et les occasions spéciales, prêts à dépenser plus pour la qualité et la durabilité.\r\nSegment 3 : Parents éco-conscients (25-45 ans) – Recherchent des vêtements écologiques et éthiques pour leurs enfants, sensibles à la qualité, la durabilité et la sécurité des produits.\r\nPersonas pour chaque segment de marché :\r\nPersona 1 : Emma, 28 ans, militante écologiste, suit les tendances de la mode durable et partage ses découvertes sur les réseaux sociaux, privilégie les achats en ligne.\r\nPersona 2 : Pierre, 40 ans, cadre dans une entreprise, recherche des vêtements éco-responsables pour le travail et les occasions spéciales, accorde de l’importance à la qualité, la durabilité et l’éthique.\r\nPersona 3 : Julie, 33 ans, mère de deux enfants, cherche des vêtements écologiques et éthiques pour sa famille, privilégie les marques engagées et les conseils personnalisés.\r\nCanaux de prospection adaptés :\r\nÉco-militants : Réseaux sociaux (Instagram, Facebook, Twitter), collaborations avec des influenceurs éco-responsables, partenariats avec des ONG et associations environnementales.\r\nProfessionnels soucieux de l’environnement : LinkedIn, publicités ciblées sur des sites web professionnels, e-mailing personnalisé, événements et salons professionnels.\r\nParents éco-conscients : Blogging, partenariats avec des influenceurs parentaux, publicités ciblées sur des sites web pour parents, e-mailing personnalisé, ateliers et conférences sur la mode durable pour enfants.\r\nPlan de prospection détaillé :\r\nÉco-militants : organiser des campagnes de sensibilisation sur les réseaux sociaux, collaborer avec des influenceurs et des ONG, proposer des promotions spéciales et des événements pour les abonnés engagés.\r\nProfessionnels soucieux de l’environnement : publier des articles de blog sur la mode éco-responsable au travail, organiser des webinaires et des événements en ligne, offrir des remises exclusives pour les professionnels.\r\nParents éco-conscients : créer du contenu éducatif sur le blog et les réseaux sociaux, organiser des ateliers et des conférences en ligne, proposer des offres spéciales pour les familles et les groupes d’amis.\r\nMesure de l’efficacité de la stratégie de prospection :\r\nTaux de conversion : mesure le pourcentage de prospects qui deviennent des clients après une interaction avec les campagnes de prospection.\r\nRetour sur investissement (ROI) : évalue le bénéfice généré par rapport au coût des actions de prospection.\r\nTaux d’engagement sur les réseaux sociaux : mesure l’interaction des abonnés avec le contenu publié par EcoFashion (likes, commentaires, partages).\r\nTaux de clics (CTR) : évalue le pourcentage de personnes qui cliquent sur les publicités en ligne ou les liens dans les e-mails promotionnels.\r\nTaux de fidélisation : mesure le pourcentage de clients qui effectuent des achats répétés auprès d’EcoFashion.\r\n \r\n\r\nConclusion\r\nPour réussir sur le marché de la mode durable, EcoFashion doit mettre en place une stratégie de prospection et de ciblage adaptée à ses segments de marché et aux personas identifiés. En utilisant des canaux de communication variés et en proposant du contenu pertinent pour chaque segment, l’entreprise pourra attirer et fidéliser une clientèle soucieuse de l’environnement et de la mode éthique.\r\n\r\nLa mesure de l’efficacité de la stratégie de prospection à l’aide d’indicateurs clés de performance (KPI) permettra à EcoFashion d’ajuster et d’améliorer ses actions en fonction des résultats obtenus. En adoptant une approche proactive et en écoutant les besoins et les attentes de ses clients, EcoFashion pourra se démarquer de la concurrence et renforcer sa position sur le marché de la mode durable.');
INSERT INTO `case_studies` (`id`, `course_id`, `study`, `solution`, `name`, `content`) VALUES
(26, 40, 'Prospection et ciblage pour une startup de vêtements écologiques', 'Contexte\r\nEcoFashion est une startup française spécialisée dans la vente de vêtements écologiques et éthiques en ligne. L’entreprise, fondée en 2022 par trois entrepreneurs passionnés de mode et d’écologie, propose une large gamme de produits pour hommes, femmes et enfants, conçus à partir de matériaux durables et respectueux de l’environnement tels que le coton biologique, le lin et le Tencel.\r\n\r\nEcoFashion travaille en étroite collaboration avec des fabricants locaux et des artisans pour garantir une production éthique, tout en soutenant l’économie locale. En plus de la mode durable, l’entreprise s’engage également à réduire son empreinte carbone en adoptant des pratiques telles que l’emballage éco-responsable et en compensant les émissions de CO2 générées par les livraisons.\r\n\r\nL’entreprise souhaite développer sa clientèle et augmenter sa visibilité sur le marché français, en mettant en place une stratégie de prospection et de ciblage efficace. L’objectif est d’attirer et fidéliser une clientèle soucieuse de l’environnement et de la mode durable, tout en se démarquant de la concurrence. Pour ce faire, EcoFashion mise sur une communication transparente, un service client personnalisé et la promotion d’initiatives éco-responsables.\r\n\r\nActuellement, la majorité des ventes d’EcoFashion proviennent de son site web et de quelques partenariats avec des boutiques physiques spécialisées. L’entreprise souhaite élargir sa présence en ligne et développer des partenariats stratégiques pour accroître sa notoriété et toucher de nouveaux clients.\r\n\r\nQuestions\r\nQuels sont les segments de marché pertinents pour EcoFashion ? Décrivez les caractéristiques de chaque segment et expliquez pourquoi ils sont importants pour l’entreprise.\r\nEn vous basant sur les segments de marché identifiés, créez un persona pour chacun d’eux. Incluez des informations telles que l’âge, la profession, les centres d’intérêt, les besoins et les attentes de chaque persona.\r\nQuels canaux de prospection seraient les plus adaptés pour atteindre les différents segments de marché et personas identifiés ? Justifiez vos choix.\r\nEcoFashion souhaite mettre en place une stratégie de prospection multicanal. Proposez un plan de prospection détaillé, incluant les objectifs, les messages clés et les actions à mettre en œuvre pour chaque segment de marché et persona.\r\nComment EcoFashion peut-elle mesurer l’efficacité de sa stratégie de prospection et de ciblage ? Proposez des indicateurs clés de performance (KPI) et des méthodes pour suivre et évaluer les résultats de la prospection.\r\n \r\n\r\n \r\n\r\nFélicitations, tu viens de terminer le chapitre 1 du bloc E4 😉\r\n\r\nOn s’arrête ou “on est pas fatigué” ?\r\n\r\nLe prochain chapitre t’attend en cliquant ici.', 'Correction Étude de cas : Prospection et ciblage pour une startup de vêtements écologiques', 'Réponses pour chaque question\r\nQuels sont les segments de marché pertinents pour EcoFashion ? Décrivez les caractéristiques de chaque segment et expliquez pourquoi ils sont importants pour l’entreprise.\r\nSegment 1 : Éco-militants (18-35 ans) – Recherchent des vêtements durables et éthiques, sensibles aux causes environnementales et sociales, actifs sur les réseaux sociaux.\r\nSegment 2 : Professionnels soucieux de l’environnement (25-55 ans) – Recherchent des vêtements éco-responsables pour le travail et les occasions spéciales, prêts à dépenser plus pour la qualité et la durabilité.\r\nSegment 3 : Parents éco-conscients (25-45 ans) – Recherchent des vêtements écologiques et éthiques pour leurs enfants, sensibles à la qualité, la durabilité et la sécurité des produits.\r\nPersonas pour chaque segment de marché :\r\nPersona 1 : Emma, 28 ans, militante écologiste, suit les tendances de la mode durable et partage ses découvertes sur les réseaux sociaux, privilégie les achats en ligne.\r\nPersona 2 : Pierre, 40 ans, cadre dans une entreprise, recherche des vêtements éco-responsables pour le travail et les occasions spéciales, accorde de l’importance à la qualité, la durabilité et l’éthique.\r\nPersona 3 : Julie, 33 ans, mère de deux enfants, cherche des vêtements écologiques et éthiques pour sa famille, privilégie les marques engagées et les conseils personnalisés.\r\nCanaux de prospection adaptés :\r\nÉco-militants : Réseaux sociaux (Instagram, Facebook, Twitter), collaborations avec des influenceurs éco-responsables, partenariats avec des ONG et associations environnementales.\r\nProfessionnels soucieux de l’environnement : LinkedIn, publicités ciblées sur des sites web professionnels, e-mailing personnalisé, événements et salons professionnels.\r\nParents éco-conscients : Blogging, partenariats avec des influenceurs parentaux, publicités ciblées sur des sites web pour parents, e-mailing personnalisé, ateliers et conférences sur la mode durable pour enfants.\r\nPlan de prospection détaillé :\r\nÉco-militants : organiser des campagnes de sensibilisation sur les réseaux sociaux, collaborer avec des influenceurs et des ONG, proposer des promotions spéciales et des événements pour les abonnés engagés.\r\nProfessionnels soucieux de l’environnement : publier des articles de blog sur la mode éco-responsable au travail, organiser des webinaires et des événements en ligne, offrir des remises exclusives pour les professionnels.\r\nParents éco-conscients : créer du contenu éducatif sur le blog et les réseaux sociaux, organiser des ateliers et des conférences en ligne, proposer des offres spéciales pour les familles et les groupes d’amis.\r\nMesure de l’efficacité de la stratégie de prospection :\r\nTaux de conversion : mesure le pourcentage de prospects qui deviennent des clients après une interaction avec les campagnes de prospection.\r\nRetour sur investissement (ROI) : évalue le bénéfice généré par rapport au coût des actions de prospection.\r\nTaux d’engagement sur les réseaux sociaux : mesure l’interaction des abonnés avec le contenu publié par EcoFashion (likes, commentaires, partages).\r\nTaux de clics (CTR) : évalue le pourcentage de personnes qui cliquent sur les publicités en ligne ou les liens dans les e-mails promotionnels.\r\nTaux de fidélisation : mesure le pourcentage de clients qui effectuent des achats répétés auprès d’EcoFashion.\r\n \r\n\r\nConclusion\r\nPour réussir sur le marché de la mode durable, EcoFashion doit mettre en place une stratégie de prospection et de ciblage adaptée à ses segments de marché et aux personas identifiés. En utilisant des canaux de communication variés et en proposant du contenu pertinent pour chaque segment, l’entreprise pourra attirer et fidéliser une clientèle soucieuse de l’environnement et de la mode éthique.\r\n\r\nLa mesure de l’efficacité de la stratégie de prospection à l’aide d’indicateurs clés de performance (KPI) permettra à EcoFashion d’ajuster et d’améliorer ses actions en fonction des résultats obtenus. En adoptant une approche proactive et en écoutant les besoins et les attentes de ses clients, EcoFashion pourra se démarquer de la concurrence et renforcer sa position sur le marché de la mode durable.'),
(27, 41, 'nom etude de cas', 'contenu etude de cas', 'nom solution etude de cas', 'contenu solution etude de cas'),
(28, 42, 'nom etude de cas', 'contenu etude de cas', 'nom solution etude de cas', 'contenu solution etude de cas'),
(29, 43, 'nom etude de cas', 'contenu etude de cas', 'nom solution etude de cas', 'contenu solution etude de cas');

-- --------------------------------------------------------

--
-- Structure de la table `case_study_corrections`
--

CREATE TABLE `case_study_corrections` (
  `id` int(11) NOT NULL,
  `case_study_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `category`, `status`) VALUES
(13, 'BTS SAM', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `abonnement_id` int(11) NOT NULL,
  `date_commande` datetime NOT NULL DEFAULT current_timestamp(),
  `prix` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commission`
--

CREATE TABLE `commission` (
  `id` int(11) NOT NULL,
  `scat_id` int(11) NOT NULL,
  `com` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commission`
--

INSERT INTO `commission` (`id`, `scat_id`, `com`) VALUES
(20, 20, 0),
(21, 21, 0),
(22, 22, 0),
(23, 23, 0),
(24, 24, 0),
(30, 30, 0);

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE `cours` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `Description` varchar(4000) NOT NULL,
  `section_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id`, `subject_id`, `name`, `Description`, `section_id`) VALUES
(4, 15, 'Miyazaki', 'ncnvu v ', NULL),
(5, 21, 'Miyazaki', 'kniobdbf', NULL),
(8, 20, 'Marie Thérèse EWOMBE BISSOUn', 'ioh_', NULL),
(9, 23, 'Bloc u5', 'bLOC U5', NULL),
(10, 22, 'nck', 'nck', NULL),
(11, 22, 'nck2', 'nck2', NULL),
(12, 22, 'nck2', 'nck2', NULL),
(13, 26, 'Maitriser la relation omnicanale', 'Dans le chapitre 1 du BTS NDRC U5, nous plongeons dans l’univers captivant de la relation client omnicanale, une approche stratégique qui révolutionne la manière dont les entreprises interagissent avec leurs clients.\r\n\r\nTu découvriras les principes fondamentaux de la relation client omnicanale, qui met l’accent sur la cohérence et la fluidité des interactions à travers tous les canaux de communication, qu’ils soient physiques ou numériques.\r\n\r\nCe chapitre te guidera à travers les avantages de cette approche pour les entreprises, notamment en termes de personnalisation de l’expérience client, de fidélisation et de création de valeur à long terme.\r\n\r\nPrépare-toi à plonger dans un nouveau paradigme de la relation client, où l’intégration harmonieuse des canaux et des données te permettra de construire des relations durables et fructueuses avec tes clients', NULL),
(14, 22, 'nck2', 'nck2', NULL),
(15, 22, 'nck2', 'nck2', NULL),
(16, 22, 'nck2', 'nck2', NULL),
(17, 21, 'Cours 1', 'ceci est le cours 1', NULL),
(18, 21, 'Cours 1', 'ceci est le cours 1', NULL),
(19, 21, 'Cours 1', 'description cours 1', NULL),
(20, 21, 'Cours 1', 'description cours 1', NULL),
(21, 21, 'Cours 1', 'description cours 1', NULL),
(22, 21, 'Cours 1', 'description cours 1', NULL),
(23, 21, 'Cours 1', 'description cours 1', NULL),
(24, 21, 'Cours 1', 'description cours 1', NULL),
(25, 21, 'Cours 1', 'description cours 1', NULL),
(26, 21, 'Nom du Cours 1', '1', NULL),
(27, 21, 'Nom du Cours 1', '1', NULL),
(28, 26, 'Animer la relation digitale', 'Dans le chapitre 11 du BTS NDRC U5, nous explorons le développement de la stratégie digitale de l’entreprise, un processus essentiel pour s’adapter aux évolutions du marché et maximiser les opportunités offertes par le numérique.\r\n\r\nTu découvriras les principes fondamentaux de la stratégie digitale, en mettant l’accent sur l’alignement des objectifs commerciaux avec les possibilités offertes par les technologies numériques.\r\n\r\nCe chapitre te fournira les compétences nécessaires pour élaborer une stratégie digitale efficace, en identifiant les canaux et les outils appropriés pour atteindre les clients, en proposant des solutions innovantes et en assurant une intégration cohérente avec les autres aspects de l’entreprise.\r\n\r\nPrépare-toi à devenir un architecte de la stratégie digitale, capable de guider ton entreprise vers la réussite dans un environnement numérique en constante évolution.', NULL),
(29, 26, 'Animer la relation digitale', 'Dans le chapitre 11 du BTS NDRC U5, nous explorons le développement de la stratégie digitale de l’entreprise, un processus essentiel pour s’adapter aux évolutions du marché et maximiser les opportunités offertes par le numérique.\r\n\r\nTu découvriras les principes fondamentaux de la stratégie digitale, en mettant l’accent sur l’alignement des objectifs commerciaux avec les possibilités offertes par les technologies numériques.\r\n\r\nCe chapitre te fournira les compétences nécessaires pour élaborer une stratégie digitale efficace, en identifiant les canaux et les outils appropriés pour atteindre les clients, en proposant des solutions innovantes et en assurant une intégration cohérente avec les autres aspects de l’entreprise.\r\n\r\nPrépare-toi à devenir un architecte de la stratégie digitale, capable de guider ton entreprise vers la réussite dans un environnement numérique en constante évolution.', NULL),
(30, 27, 'Animer la relation digitale', 'Partie 1 : Maitriser la relation omnicanale', NULL),
(31, 27, 'Animer la relation digitale', 'Partie 1 : Maitriser la relation omnicanale', NULL),
(32, 40, '01', '02', NULL),
(33, 40, '01', '02', NULL),
(34, 40, 'Tensai', '1', NULL),
(35, 40, 'Tensai', '1', NULL),
(36, 40, 'Tensai', '1', NULL),
(37, 40, 'Tensai', '1', 1),
(38, 41, '1', '1', 3),
(40, 46, 'Analyser la politique commerciale de l\'entreprise', 'Découvre les rouages de la politique commerciale d’une entreprise dans ce premier chapitre, une aventure captivante qui te dévoilera comment les stratégies et décisions commerciales façonnent le succès sur le marché.\r\n\r\nPlonge au cœur des enjeux actuels et futurs du commerce, et saisis l’opportunité de devenir un acteur clé dans la dynamique commerciale de demain.', 4),
(41, 46, 'nom de mon cours', 'description de mon cours', 4),
(42, 46, 'nom de mon cours', 'description de mon cours', 4),
(43, 46, 'nom de mon cours', 'description de mon cours', 4);

-- --------------------------------------------------------

--
-- Structure de la table `course_access`
--

CREATE TABLE `course_access` (
  `access_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `access_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `course_parts`
--

CREATE TABLE `course_parts` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `summary` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `course_parts`
--

INSERT INTO `course_parts` (`id`, `course_id`, `title`, `content`, `summary`) VALUES
(1, 8, 'banlaCHAP1', 'cevzchap1contenu', NULL),
(2, 8, 'chap2', 'chap2contenu', NULL),
(3, 9, 'U5', 'U5', NULL),
(4, 10, 'nck', 'nck', NULL),
(5, 11, 'nck2', 'nck2', NULL),
(6, 12, 'nck2', 'nck2', NULL),
(7, 13, 'Chapitre 1\r\nIntroduction à la relation client omnicanale', 'IMPORTANT\r\nPressé(e) ou en mode révision ? Passe directement au résumé en bas de page.\r\nNous avons mis un résumé en bas de page dans tous nos cours !\r\n\r\nNotre objectif : révision de chaque chapitre en 9 minutes chrono 🙂\r\n\r\n \r\n\r\nI. Introduction à la relation client omnicanale\r\nLa relation client omnicanale est une approche qui consiste à offrir une expérience client homogène et cohérente à travers tous les canaux de communication utilisés par l’entreprise.\r\n\r\nLes clients doivent pouvoir passer d’un canal à l’autre sans rencontrer de frictions ni de problèmes, tout en bénéficiant d’un niveau de service et d’assistance cohérent sur chaque canal.\r\n\r\nExemple\r\n\r\nUn client peut utiliser le site Web, l’application mobile, les réseaux sociaux et le service client par téléphone pour interagir avec une entreprise. La relation client omnicanale implique que l’expérience client soit cohérente sur tous les canaux de communication.\r\n\r\n \r\n\r\nII. Les bénéfices de la relation client omnicanale\r\nLa mise en place d’une stratégie de relation client omnicanale offre plusieurs bénéfices aux entreprises.\r\nTout d’abord, cela permet de renforcer la satisfaction et la fidélité des clients, qui peuvent ainsi interagir avec l’entreprise sur les canaux qui leur conviennent le mieux.\r\n\r\nEnsuite, cela permet d’optimiser la gestion des interactions clients, en offrant des processus et des outils cohérents pour tous les canaux de communication. Enfin, cela permet de mieux comprendre les besoins et les préférences des clients grâce à une collecte de données plus complète.\r\n\r\nExemple\r\n\r\nUne entreprise de commerce électronique qui utilise une stratégie de relation client omnicanale peut offrir une expérience client cohérente sur tous les canaux de communication, augmentant ainsi la satisfaction et la fidélité des clients.\r\n\r\n \r\n\r\nIII. Les enjeux de la relation client omnicanale\r\nLa mise en place d’une stratégie de relation client omnicanale peut également soulever des enjeux pour les entreprises.\r\nTout d’abord, cela nécessite une mise à niveau technologique pour gérer les différents canaux de communication.\r\n\r\nEnsuite, cela demande une collaboration étroite entre les différents départements de l’entreprise pour offrir une expérience client homogène et cohérente. Enfin, cela requiert une collecte et une analyse des données client en temps réel, afin de s’adapter rapidement aux besoins et aux préférences des clients.\r\n\r\nExemple\r\n\r\nUne entreprise de vente au détail qui adopte une stratégie de relation client omnicanale doit investir dans une technologie adaptée pour gérer les différents canaux de communication.\r\n\r\n \r\n\r\nIV. Les éléments clés de la relation client omnicanale\r\nPlusieurs éléments clés doivent être pris en compte pour mettre en place une stratégie de relation client omnicanale efficace.\r\nTout d’abord, les entreprises doivent être présentes sur plusieurs canaux de communication pertinents pour leur public cible, en fonction des habitudes et des préférences des clients.\r\n\r\nEnsuite, les entreprises doivent avoir une connaissance approfondie de leurs clients, notamment en collectant et en analysant des données client en temps réel. Enfin, les entreprises doivent favoriser la collaboration entre les différents départements pour offrir une expérience client homogène et cohérente.\r\n\r\nExemple\r\n\r\nUn détaillant en ligne doit offrir une expérience cohérente sur plusieurs canaux de communication, tels que le site Web, les applications mobiles, les réseaux sociaux et les points de vente physiques.\r\n\r\n \r\n\r\nV. La mesure de la performance en relation client omnicanale\r\nLa mesure de la performance en relation client omnicanale doit se faire sur plusieurs indicateurs clés, tels que la satisfaction client, le taux de conversion, le taux de rétention des clients, ou encore le coût d’acquisition et de gestion des clients.\r\n\r\nCes indicateurs doivent être mesurés à l’échelle de chaque canal de communication, mais également sur l’ensemble de la stratégie de relation client omnicanale.\r\n\r\nExemple\r\n\r\nUn site de commerce électronique peut mesurer la satisfaction client, le taux de conversion et le taux de rétention des clients sur chaque canal de communication.\r\n\r\n \r\n\r\nEn résumé\r\nLa mise en place d’une stratégie de relation client omnicanale est un enjeu majeur pour les entreprises souhaitant offrir une expérience client homogène et cohérente sur tous les canaux de communication.\r\n\r\nPour y parvenir, les entreprises doivent être présentes sur plusieurs canaux de communication, collecter et analyser des données client en temps réel, et favoriser la collaboration entre les différents départements de l’entreprise pour offrir une expérience client sans faille.\r\n\r\nLa mesure de la performance en relation client omnicanale doit être effectuée régulièrement afin de pouvoir identifier les points d’amélioration et de mesurer l’impact de la stratégie mise en place.\r\n\r\nEn somme, la relation client omnicanale est un concept clé pour les entreprises qui souhaitent offrir une expérience client homogène et cohérente à travers tous les canaux de communication.\r\n\r\n \r\n\r\nBRAVO 😉\r\nTu viens de terminer la première partie de ce chapitre !\r\nClic sur bouton ci-dessous “Terminer” pour valider tes connaissances.\r\nTu pourras revenir sur ce cours et les autres à tout moment.', NULL),
(8, 14, 'nck2', 'nck2', NULL),
(9, 15, 'nck2', 'nck2', NULL),
(10, 17, 'Chapitr 1', 'Contenu du chapitre 1', 'résumé 1'),
(11, 17, 'Chapitre 2', 'Contenu Chapitre 2', 'Résumé 2'),
(12, 18, 'Chapitr 1', 'Contenu du chapitre 1', 'résumé 1'),
(13, 18, 'Chapitre 2', 'Contenu Chapitre 2', 'Résumé 2'),
(14, 19, 'chap 1', 'contenu chap 1', 'résumé chap 1'),
(15, 20, 'chap 1', 'contenu chap 1', 'résumé chap 1'),
(16, 21, 'chap 1', 'contenu chap 1', 'résumé chap 1'),
(17, 22, 'chap 1', 'contenu chap 1', 'résumé chap 1'),
(18, 23, 'chap 1', 'contenu chap 1', 'résumé chap 1'),
(19, 24, 'chap 1', 'contenu chap 1', 'résumé chap 1'),
(20, 25, 'chap 1', 'contenu chap 1', 'résumé chap 1'),
(21, 26, '1', '1', '1'),
(22, 27, '1', '1', '1'),
(23, 28, 'Partie 1 Introduction à la relation client digitale\r\n', 'I. Introduction\r\n \r\n\r\nA. Contexte\r\nLa digitalisation s’est imposée ces dernières années comme une tendance majeure dans l’évolution des entreprises et de leurs relations avec leurs clients.\r\n\r\nCe phénomène impacte de nombreux secteurs d’activité, et le BTS NDRC (Négociation et Digitalisation de la Relation Client) en est un exemple concret.\r\n\r\nCette première partie de notre module sur la relation client digitale sera consacrée à l’analyse des enjeux de cette transformation numérique.\r\n\r\n \r\n\r\nB. Objectifs\r\nComprendre les défis et opportunités liés à la digitalisation de la relation client\r\nSaisir l’importance de la digitalisation pour les entreprises et leurs clients\r\nIdentifier les domaines d’application de la relation client digitale\r\nII. Les enjeux de la digitalisation de la relation client\r\n \r\n\r\nA. Enjeux stratégiques\r\n \r\n\r\n1. Amélioration de l’expérience client\r\nLa digitalisation permet d’offrir une expérience client plus riche et personnalisée, en facilitant l’accès aux informations, la réactivité et la prise en charge des demandes.\r\n\r\n2. Diversification des canaux de communication\r\nLa digitalisation permet d’intégrer de nouveaux canaux de communication (e-mail, chat, réseaux sociaux, etc.) pour interagir avec les clients et améliorer leur satisfaction.\r\n\r\n3. Réduction des coûts et optimisation des processus\r\nLa digitalisation permet de réduire les coûts de gestion de la relation client en automatisant certaines tâches et en optimisant les processus internes.\r\n\r\n \r\n\r\nB. Enjeux concurrentiels\r\n \r\n\r\n1. Se différencier de la concurrence\r\nLa digitalisation permet aux entreprises de se différencier en proposant des services innovants et en offrant une expérience client unique.\r\n\r\n2. Fidéliser les clients\r\nLa digitalisation favorise la fidélisation des clients en leur offrant une expérience personnalisée et en répondant rapidement à leurs besoins et attentes.\r\n\r\n3. Acquérir de nouveaux clients\r\nLa digitalisation permet d’atteindre de nouveaux clients grâce à une présence accrue sur les canaux numériques et à la mise en place de stratégies de marketing digital.\r\n\r\n \r\n\r\nC. Enjeux humains\r\n \r\n\r\n1. Formation des équipes\r\nLa digitalisation de la relation client nécessite une formation des équipes aux nouveaux outils et aux bonnes pratiques de communication digitale.\r\n\r\n2. Adaptation des compétences\r\nLes collaborateurs doivent développer de nouvelles compétences pour s’adapter aux évolutions technologiques et aux nouveaux modes de travail.\r\n\r\n3. Culture d’entreprise\r\nLa digitalisation implique une évolution de la culture d’entreprise pour intégrer les enjeux numériques et favoriser la collaboration entre les différents services.\r\n\r\n \r\n\r\nIII. Conclusion\r\nLa digitalisation de la relation client est un enjeu majeur pour les entreprises, qui doivent s’adapter aux nouvelles attentes des clients et faire face à la concurrence.\r\n\r\nCette transformation numérique permet d’améliorer l’expérience client, de diversifier les canaux de communication et d’optimiser les processus internes.\r\n\r\nElle implique également des défis humains, tels que la formation des équipes et l’adaptation des compétences.\r\n\r\n \r\n\r\n=> Exercices de mise en application : 1, 2, 3, 4 et 5', '   '),
(24, 29, 'Partie 1 Introduction à la relation client digitale\r\n', 'I. Introduction\r\n \r\n\r\nA. Contexte\r\nLa digitalisation s’est imposée ces dernières années comme une tendance majeure dans l’évolution des entreprises et de leurs relations avec leurs clients.\r\n\r\nCe phénomène impacte de nombreux secteurs d’activité, et le BTS NDRC (Négociation et Digitalisation de la Relation Client) en est un exemple concret.\r\n\r\nCette première partie de notre module sur la relation client digitale sera consacrée à l’analyse des enjeux de cette transformation numérique.\r\n\r\n \r\n\r\nB. Objectifs\r\nComprendre les défis et opportunités liés à la digitalisation de la relation client\r\nSaisir l’importance de la digitalisation pour les entreprises et leurs clients\r\nIdentifier les domaines d’application de la relation client digitale\r\nII. Les enjeux de la digitalisation de la relation client\r\n \r\n\r\nA. Enjeux stratégiques\r\n \r\n\r\n1. Amélioration de l’expérience client\r\nLa digitalisation permet d’offrir une expérience client plus riche et personnalisée, en facilitant l’accès aux informations, la réactivité et la prise en charge des demandes.\r\n\r\n2. Diversification des canaux de communication\r\nLa digitalisation permet d’intégrer de nouveaux canaux de communication (e-mail, chat, réseaux sociaux, etc.) pour interagir avec les clients et améliorer leur satisfaction.\r\n\r\n3. Réduction des coûts et optimisation des processus\r\nLa digitalisation permet de réduire les coûts de gestion de la relation client en automatisant certaines tâches et en optimisant les processus internes.\r\n\r\n \r\n\r\nB. Enjeux concurrentiels\r\n \r\n\r\n1. Se différencier de la concurrence\r\nLa digitalisation permet aux entreprises de se différencier en proposant des services innovants et en offrant une expérience client unique.\r\n\r\n2. Fidéliser les clients\r\nLa digitalisation favorise la fidélisation des clients en leur offrant une expérience personnalisée et en répondant rapidement à leurs besoins et attentes.\r\n\r\n3. Acquérir de nouveaux clients\r\nLa digitalisation permet d’atteindre de nouveaux clients grâce à une présence accrue sur les canaux numériques et à la mise en place de stratégies de marketing digital.\r\n\r\n \r\n\r\nC. Enjeux humains\r\n \r\n\r\n1. Formation des équipes\r\nLa digitalisation de la relation client nécessite une formation des équipes aux nouveaux outils et aux bonnes pratiques de communication digitale.\r\n\r\n2. Adaptation des compétences\r\nLes collaborateurs doivent développer de nouvelles compétences pour s’adapter aux évolutions technologiques et aux nouveaux modes de travail.\r\n\r\n3. Culture d’entreprise\r\nLa digitalisation implique une évolution de la culture d’entreprise pour intégrer les enjeux numériques et favoriser la collaboration entre les différents services.\r\n\r\n \r\n\r\nIII. Conclusion\r\nLa digitalisation de la relation client est un enjeu majeur pour les entreprises, qui doivent s’adapter aux nouvelles attentes des clients et faire face à la concurrence.\r\n\r\nCette transformation numérique permet d’améliorer l’expérience client, de diversifier les canaux de communication et d’optimiser les processus internes.\r\n\r\nElle implique également des défis humains, tels que la formation des équipes et l’adaptation des compétences.\r\n\r\n \r\n\r\n=> Exercices de mise en application : 1, 2, 3, 4 et 5', '   '),
(25, 30, 'Partie 1 Concepts clés de la relation client omnicanale', 'Partie 1 Concepts clés de la relation client omnicanale\r\n \r\n\r\nIMPORTANT\r\nPressé(e) ou en mode révision ? Passe directement au résumé en bas de page.\r\nNous avons mis un résumé en bas de page dans tous nos cours !\r\n\r\nNotre objectif : révision de chaque chapitre en 9 minutes chrono 🙂\r\n\r\n \r\n\r\nI. Introduction à la relation client omnicanale\r\nLa relation client omnicanale est une approche qui consiste à offrir une expérience client homogène et cohérente à travers tous les canaux de communication utilisés par l’entreprise.\r\n\r\nLes clients doivent pouvoir passer d’un canal à l’autre sans rencontrer de frictions ni de problèmes, tout en bénéficiant d’un niveau de service et d’assistance cohérent sur chaque canal.\r\n\r\nExemple\r\n\r\nUn client peut utiliser le site Web, l’application mobile, les réseaux sociaux et le service client par téléphone pour interagir avec une entreprise. La relation client omnicanale implique que l’expérience client soit cohérente sur tous les canaux de communication.\r\n\r\n \r\n\r\nII. Les bénéfices de la relation client omnicanale\r\nLa mise en place d’une stratégie de relation client omnicanale offre plusieurs bénéfices aux entreprises.\r\nTout d’abord, cela permet de renforcer la satisfaction et la fidélité des clients, qui peuvent ainsi interagir avec l’entreprise sur les canaux qui leur conviennent le mieux.\r\n\r\nEnsuite, cela permet d’optimiser la gestion des interactions clients, en offrant des processus et des outils cohérents pour tous les canaux de communication. Enfin, cela permet de mieux comprendre les besoins et les préférences des clients grâce à une collecte de données plus complète.\r\n\r\nExemple\r\n\r\nUne entreprise de commerce électronique qui utilise une stratégie de relation client omnicanale peut offrir une expérience client cohérente sur tous les canaux de communication, augmentant ainsi la satisfaction et la fidélité des clients.\r\n\r\n \r\n\r\nIII. Les enjeux de la relation client omnicanale\r\nLa mise en place d’une stratégie de relation client omnicanale peut également soulever des enjeux pour les entreprises.\r\nTout d’abord, cela nécessite une mise à niveau technologique pour gérer les différents canaux de communication.\r\n\r\nEnsuite, cela demande une collaboration étroite entre les différents départements de l’entreprise pour offrir une expérience client homogène et cohérente. Enfin, cela requiert une collecte et une analyse des données client en temps réel, afin de s’adapter rapidement aux besoins et aux préférences des clients.\r\n\r\nExemple\r\n\r\nUne entreprise de vente au détail qui adopte une stratégie de relation client omnicanale doit investir dans une technologie adaptée pour gérer les différents canaux de communication.\r\n\r\n \r\n\r\nIV. Les éléments clés de la relation client omnicanale\r\nPlusieurs éléments clés doivent être pris en compte pour mettre en place une stratégie de relation client omnicanale efficace.\r\nTout d’abord, les entreprises doivent être présentes sur plusieurs canaux de communication pertinents pour leur public cible, en fonction des habitudes et des préférences des clients.\r\n\r\nEnsuite, les entreprises doivent avoir une connaissance approfondie de leurs clients, notamment en collectant et en analysant des données client en temps réel. Enfin, les entreprises doivent favoriser la collaboration entre les différents départements pour offrir une expérience client homogène et cohérente.\r\n\r\nExemple\r\n\r\nUn détaillant en ligne doit offrir une expérience cohérente sur plusieurs canaux de communication, tels que le site Web, les applications mobiles, les réseaux sociaux et les points de vente physiques.\r\n\r\n \r\n\r\nV. La mesure de la performance en relation client omnicanale\r\nLa mesure de la performance en relation client omnicanale doit se faire sur plusieurs indicateurs clés, tels que la satisfaction client, le taux de conversion, le taux de rétention des clients, ou encore le coût d’acquisition et de gestion des clients.\r\n\r\nCes indicateurs doivent être mesurés à l’échelle de chaque canal de communication, mais également sur l’ensemble de la stratégie de relation client omnicanale.\r\n\r\nExemple\r\n\r\nUn site de commerce électronique peut mesurer la satisfaction client, le taux de conversion et le taux de rétention des clients sur chaque canal de communication.\r\n\r\n ', 'En résumé\r\nLa mise en place d’une stratégie de relation client omnicanale est un enjeu majeur pour les entreprises souhaitant offrir une expérience client homogène et cohérente sur tous les canaux de communication.\r\n\r\nPour y parvenir, les entreprises doivent être présentes sur plusieurs canaux de communication, collecter et analyser des données client en temps réel, et favoriser la collaboration entre les différents départements de l’entreprise pour offrir une expérience client sans faille.\r\n\r\nLa mesure de la performance en relation client omnicanale doit être effectuée régulièrement afin de pouvoir identifier les points d’amélioration et de mesurer l’impact de la stratégie mise en place.\r\n\r\nEn somme, la relation client omnicanale est un concept clé pour les entreprises qui souhaitent offrir une expérience client homogène et cohérente à travers tous les canaux de communication.'),
(26, 31, 'Partie 1 Concepts clés de la relation client omnicanale', 'Partie 1 Concepts clés de la relation client omnicanale\r\n \r\n\r\nIMPORTANT\r\nPressé(e) ou en mode révision ? Passe directement au résumé en bas de page.\r\nNous avons mis un résumé en bas de page dans tous nos cours !\r\n\r\nNotre objectif : révision de chaque chapitre en 9 minutes chrono 🙂\r\n\r\n \r\n\r\nI. Introduction à la relation client omnicanale\r\nLa relation client omnicanale est une approche qui consiste à offrir une expérience client homogène et cohérente à travers tous les canaux de communication utilisés par l’entreprise.\r\n\r\nLes clients doivent pouvoir passer d’un canal à l’autre sans rencontrer de frictions ni de problèmes, tout en bénéficiant d’un niveau de service et d’assistance cohérent sur chaque canal.\r\n\r\nExemple\r\n\r\nUn client peut utiliser le site Web, l’application mobile, les réseaux sociaux et le service client par téléphone pour interagir avec une entreprise. La relation client omnicanale implique que l’expérience client soit cohérente sur tous les canaux de communication.\r\n\r\n \r\n\r\nII. Les bénéfices de la relation client omnicanale\r\nLa mise en place d’une stratégie de relation client omnicanale offre plusieurs bénéfices aux entreprises.\r\nTout d’abord, cela permet de renforcer la satisfaction et la fidélité des clients, qui peuvent ainsi interagir avec l’entreprise sur les canaux qui leur conviennent le mieux.\r\n\r\nEnsuite, cela permet d’optimiser la gestion des interactions clients, en offrant des processus et des outils cohérents pour tous les canaux de communication. Enfin, cela permet de mieux comprendre les besoins et les préférences des clients grâce à une collecte de données plus complète.\r\n\r\nExemple\r\n\r\nUne entreprise de commerce électronique qui utilise une stratégie de relation client omnicanale peut offrir une expérience client cohérente sur tous les canaux de communication, augmentant ainsi la satisfaction et la fidélité des clients.\r\n\r\n \r\n\r\nIII. Les enjeux de la relation client omnicanale\r\nLa mise en place d’une stratégie de relation client omnicanale peut également soulever des enjeux pour les entreprises.\r\nTout d’abord, cela nécessite une mise à niveau technologique pour gérer les différents canaux de communication.\r\n\r\nEnsuite, cela demande une collaboration étroite entre les différents départements de l’entreprise pour offrir une expérience client homogène et cohérente. Enfin, cela requiert une collecte et une analyse des données client en temps réel, afin de s’adapter rapidement aux besoins et aux préférences des clients.\r\n\r\nExemple\r\n\r\nUne entreprise de vente au détail qui adopte une stratégie de relation client omnicanale doit investir dans une technologie adaptée pour gérer les différents canaux de communication.\r\n\r\n \r\n\r\nIV. Les éléments clés de la relation client omnicanale\r\nPlusieurs éléments clés doivent être pris en compte pour mettre en place une stratégie de relation client omnicanale efficace.\r\nTout d’abord, les entreprises doivent être présentes sur plusieurs canaux de communication pertinents pour leur public cible, en fonction des habitudes et des préférences des clients.\r\n\r\nEnsuite, les entreprises doivent avoir une connaissance approfondie de leurs clients, notamment en collectant et en analysant des données client en temps réel. Enfin, les entreprises doivent favoriser la collaboration entre les différents départements pour offrir une expérience client homogène et cohérente.\r\n\r\nExemple\r\n\r\nUn détaillant en ligne doit offrir une expérience cohérente sur plusieurs canaux de communication, tels que le site Web, les applications mobiles, les réseaux sociaux et les points de vente physiques.\r\n\r\n \r\n\r\nV. La mesure de la performance en relation client omnicanale\r\nLa mesure de la performance en relation client omnicanale doit se faire sur plusieurs indicateurs clés, tels que la satisfaction client, le taux de conversion, le taux de rétention des clients, ou encore le coût d’acquisition et de gestion des clients.\r\n\r\nCes indicateurs doivent être mesurés à l’échelle de chaque canal de communication, mais également sur l’ensemble de la stratégie de relation client omnicanale.\r\n\r\nExemple\r\n\r\nUn site de commerce électronique peut mesurer la satisfaction client, le taux de conversion et le taux de rétention des clients sur chaque canal de communication.\r\n\r\n ', 'En résumé\r\nLa mise en place d’une stratégie de relation client omnicanale est un enjeu majeur pour les entreprises souhaitant offrir une expérience client homogène et cohérente sur tous les canaux de communication.\r\n\r\nPour y parvenir, les entreprises doivent être présentes sur plusieurs canaux de communication, collecter et analyser des données client en temps réel, et favoriser la collaboration entre les différents départements de l’entreprise pour offrir une expérience client sans faille.\r\n\r\nLa mesure de la performance en relation client omnicanale doit être effectuée régulièrement afin de pouvoir identifier les points d’amélioration et de mesurer l’impact de la stratégie mise en place.\r\n\r\nEn somme, la relation client omnicanale est un concept clé pour les entreprises qui souhaitent offrir une expérience client homogène et cohérente à travers tous les canaux de communication.'),
(27, 32, '03', '04', '05'),
(28, 33, '03', '04', '05'),
(29, 34, '1', '1', '1'),
(30, 34, '1', '1', '1'),
(31, 35, '1', '1', '1'),
(32, 36, '1', '1', '1'),
(33, 37, '1', '1', '1'),
(34, 38, '1', '1', '1'),
(35, 39, 'Partie 1 Présentation du programme de formation', 'Bienvenue !\r\nC’est parti pour le bloc E4 de ton BTS NDRC !\r\nNotre objectif : révision de chaque chapitre en 9 minutes chrono 🙂\r\n\r\nLe BTS NDRC est une formation en deux ans qui permet aux étudiants d’acquérir des compétences professionnelles dans le domaine de la négociation commerciale.\r\n\r\nCe programme est organisé autour de différentes matières qui couvrent l’ensemble des aspects liés à la relation client : la vente, la gestion de la relation client, la communication, la gestion commerciale et bien sûr, le ciblage et la prospection de la clientèle.\r\n\r\nEn ce qui concerne le ciblage et la prospection, les étudiants apprennent à identifier les clients potentiels, à évaluer leur potentiel commercial et à développer une stratégie de prospection adaptée. Ils apprennent également à utiliser les outils et les techniques de prospection, à gérer les objections et à suivre les prospects jusqu’à la conclusion de la vente.\r\n\r\n ', 'RAVO 😉\r\nTu viens de terminer la première partie de ce chapitre !\r\nClic sur bouton ci-dessous “Terminer” pour valider tes connaissances.\r\nTu pourras revenir sur ce cours et les autres à tout moment.'),
(36, 39, 'Partie 2 Importance du ciblage et de la prospection', 'Le ciblage et la prospection sont des étapes clés dans le processus de vente. Le ciblage permet d’identifier les clients qui correspondent le mieux au profil de l’entreprise, pour leur proposer une offre adaptée à leurs besoins.\r\n\r\nCela permet de limiter les efforts et les coûts engagés dans la recherche de nouveaux clients.\r\n\r\nLa prospection, quant à elle, permet de développer la base de clients en identifiant des opportunités de vente et en engageant de nouveaux prospects. Cela permet d’augmenter le chiffre d’affaires et la part de marché de l’entreprise.\r\n\r\nEn somme, le ciblage et la prospection sont des étapes essentielles pour assurer la croissance de l’entreprise et la fidélisation de la clientèle.\r\n\r\n ', 'BRAVO 😉\r\nTu viens de terminer la 2e partie de ce chapitre !\r\nClic sur bouton ci-dessous “Terminer” pour valider tes connaissances.'),
(37, 39, 'Partie 3 Objectifs et enjeux pour l’entreprise', 'Les objectifs de l’entreprise en matière de ciblage et de prospection sont multiples. Il s’agit tout d’abord de trouver de nouveaux clients potentiels pour développer son activité et son chiffre d’affaires. En identifiant les clients les plus prometteurs et en leur proposant des offres adaptées à leurs besoins, l’entreprise peut maximiser ses chances de réussite.\r\n\r\nLes enjeux sont également importants, car une mauvaise stratégie de ciblage ou de prospection peut entraîner des coûts élevés et une perte de temps, sans résultats concrets. L’entreprise doit donc mettre en place une stratégie efficace, en adéquation avec ses besoins et ses objectifs commerciaux.', 'BRAVO 😉\r\nTu viens de terminer la 3e partie de ce chapitre !\r\nClic sur bouton ci-dessous “Terminer” pour valider tes connaissances.'),
(38, 39, 'Partie 4 Rôle du commercial dans la prospection', 'Le rôle du commercial dans la prospection est crucial. Tout d’abord, le commercial doit être capable de trouver de nouveaux clients potentiels en utilisant différents canaux de communication, tels que le téléphone, l’email ou les réseaux sociaux. Il doit ensuite être en mesure d’identifier les besoins des prospects et de leur proposer une offre adaptée.\r\n\r\nLe commercial doit également être capable de gérer les objections et de convaincre les prospects de l’intérêt de l’offre. Pour cela, il doit être en mesure de communiquer de manière claire et persuasive, en utilisant les techniques de vente appropriées. Enfin, le commercial doit suivre les prospects jusqu’à la conclusion de la vente, en les relançant si nécessaire et en restant à l’écoute de leurs besoins et de leurs attentes.\r\n\r\nLe rôle du commercial dans la prospection ne se limite pas à la recherche de nouveaux clients, il doit également être en mesure de fidéliser la clientèle existante. Pour cela, il doit développer une relation de confiance avec les clients, en leur offrant un service de qualité et en répondant à leurs besoins.\r\n\r\nEn somme, le commercial doit être un véritable expert de la prospection, capable d’identifier les clients les plus prometteurs et de les convaincre de l’intérêt de l’offre. Il doit également être en mesure de fidéliser la clientèle existante en développant une relation de confiance et en offrant un service de qualité.\r\n\r\n ', 'BRAVO BRAVO 😉 😉\r\nTu viens de terminer ce chapitre !\r\nEntraine-toi dès à présent aux exercices pour mettre en pratique tes connaissances.\r\nTu as le choix du nombre d’exercices et tu pourras ensuite accéder à la correction.\r\n\r\n\r\nRésumé du chapitre : \r\nEn conclusion, le ciblage et la prospection de la clientèle sont des étapes cruciales dans le processus de vente. Ils permettent aux entreprises d’identifier les clients potentiels, de développer leur base de clients et d’augmenter leur chiffre d’affaires. Les objectifs et les enjeux sont multiples, et nécessitent la mise en place d’une stratégie efficace, adaptée aux besoins et aux objectifs de l’entreprise.\r\n\r\nLe rôle du commercial dans la prospection est également essentiel. Il doit être en mesure de trouver de nouveaux clients, de gérer les objections, de convaincre les prospects et de fidéliser la clientèle existante. Pour cela, il doit être un véritable expert de la prospection, en utilisant les outils et les techniques appropriées pour maximiser les chances de réussite.\r\n\r\nEn somme, le ciblage et la prospection de la clientèle sont des compétences clés pour les professionnels de la vente. Le BTS NDRC permet aux étudiants d’acquérir ces compétences et de se préparer à une carrière réussie dans le domaine de la négociation commerciale.'),
(39, 40, 'Partie 1 Présentation du programme de formation', 'Bienvenue !\r\nC’est parti pour le bloc E4 de ton BTS NDRC !\r\nNotre objectif : révision de chaque chapitre en 9 minutes chrono 🙂\r\n\r\nLe BTS NDRC est une formation en deux ans qui permet aux étudiants d’acquérir des compétences professionnelles dans le domaine de la négociation commerciale.\r\n\r\nCe programme est organisé autour de différentes matières qui couvrent l’ensemble des aspects liés à la relation client : la vente, la gestion de la relation client, la communication, la gestion commerciale et bien sûr, le ciblage et la prospection de la clientèle.\r\n\r\nEn ce qui concerne le ciblage et la prospection, les étudiants apprennent à identifier les clients potentiels, à évaluer leur potentiel commercial et à développer une stratégie de prospection adaptée. Ils apprennent également à utiliser les outils et les techniques de prospection, à gérer les objections et à suivre les prospects jusqu’à la conclusion de la vente.\r\n\r\n ', 'RAVO 😉\r\nTu viens de terminer la première partie de ce chapitre !\r\nClic sur bouton ci-dessous “Terminer” pour valider tes connaissances.\r\nTu pourras revenir sur ce cours et les autres à tout moment.'),
(40, 40, 'Partie 2 Importance du ciblage et de la prospection', 'Le ciblage et la prospection sont des étapes clés dans le processus de vente. Le ciblage permet d’identifier les clients qui correspondent le mieux au profil de l’entreprise, pour leur proposer une offre adaptée à leurs besoins.\r\n\r\nCela permet de limiter les efforts et les coûts engagés dans la recherche de nouveaux clients.\r\n\r\nLa prospection, quant à elle, permet de développer la base de clients en identifiant des opportunités de vente et en engageant de nouveaux prospects. Cela permet d’augmenter le chiffre d’affaires et la part de marché de l’entreprise.\r\n\r\nEn somme, le ciblage et la prospection sont des étapes essentielles pour assurer la croissance de l’entreprise et la fidélisation de la clientèle.\r\n\r\n ', 'BRAVO 😉\r\nTu viens de terminer la 2e partie de ce chapitre !\r\nClic sur bouton ci-dessous “Terminer” pour valider tes connaissances.'),
(41, 40, 'Partie 3 Objectifs et enjeux pour l’entreprise', 'Les objectifs de l’entreprise en matière de ciblage et de prospection sont multiples. Il s’agit tout d’abord de trouver de nouveaux clients potentiels pour développer son activité et son chiffre d’affaires. En identifiant les clients les plus prometteurs et en leur proposant des offres adaptées à leurs besoins, l’entreprise peut maximiser ses chances de réussite.\r\n\r\nLes enjeux sont également importants, car une mauvaise stratégie de ciblage ou de prospection peut entraîner des coûts élevés et une perte de temps, sans résultats concrets. L’entreprise doit donc mettre en place une stratégie efficace, en adéquation avec ses besoins et ses objectifs commerciaux.', 'BRAVO 😉\r\nTu viens de terminer la 3e partie de ce chapitre !\r\nClic sur bouton ci-dessous “Terminer” pour valider tes connaissances.'),
(42, 40, 'Partie 4 Rôle du commercial dans la prospection', 'Le rôle du commercial dans la prospection est crucial. Tout d’abord, le commercial doit être capable de trouver de nouveaux clients potentiels en utilisant différents canaux de communication, tels que le téléphone, l’email ou les réseaux sociaux. Il doit ensuite être en mesure d’identifier les besoins des prospects et de leur proposer une offre adaptée.\r\n\r\nLe commercial doit également être capable de gérer les objections et de convaincre les prospects de l’intérêt de l’offre. Pour cela, il doit être en mesure de communiquer de manière claire et persuasive, en utilisant les techniques de vente appropriées. Enfin, le commercial doit suivre les prospects jusqu’à la conclusion de la vente, en les relançant si nécessaire et en restant à l’écoute de leurs besoins et de leurs attentes.\r\n\r\nLe rôle du commercial dans la prospection ne se limite pas à la recherche de nouveaux clients, il doit également être en mesure de fidéliser la clientèle existante. Pour cela, il doit développer une relation de confiance avec les clients, en leur offrant un service de qualité et en répondant à leurs besoins.\r\n\r\nEn somme, le commercial doit être un véritable expert de la prospection, capable d’identifier les clients les plus prometteurs et de les convaincre de l’intérêt de l’offre. Il doit également être en mesure de fidéliser la clientèle existante en développant une relation de confiance et en offrant un service de qualité.\r\n\r\n ', 'BRAVO BRAVO 😉 😉\r\nTu viens de terminer ce chapitre !\r\nEntraine-toi dès à présent aux exercices pour mettre en pratique tes connaissances.\r\nTu as le choix du nombre d’exercices et tu pourras ensuite accéder à la correction.\r\n\r\n\r\nRésumé du chapitre : \r\nEn conclusion, le ciblage et la prospection de la clientèle sont des étapes cruciales dans le processus de vente. Ils permettent aux entreprises d’identifier les clients potentiels, de développer leur base de clients et d’augmenter leur chiffre d’affaires. Les objectifs et les enjeux sont multiples, et nécessitent la mise en place d’une stratégie efficace, adaptée aux besoins et aux objectifs de l’entreprise.\r\n\r\nLe rôle du commercial dans la prospection est également essentiel. Il doit être en mesure de trouver de nouveaux clients, de gérer les objections, de convaincre les prospects et de fidéliser la clientèle existante. Pour cela, il doit être un véritable expert de la prospection, en utilisant les outils et les techniques appropriées pour maximiser les chances de réussite.\r\n\r\nEn somme, le ciblage et la prospection de la clientèle sont des compétences clés pour les professionnels de la vente. Le BTS NDRC permet aux étudiants d’acquérir ces compétences et de se préparer à une carrière réussie dans le domaine de la négociation commerciale.'),
(43, 41, 'Titre de mon chapitre', 'contenu de mon chapitre', 'résumé de mon chapitre'),
(44, 42, 'Titre de mon chapitre', 'contenu de mon chapitre', 'résumé de mon chapitre'),
(45, 43, 'Titre de mon chapitre', 'contenu de mon chapitre', 'résumé de mon chapitre');

-- --------------------------------------------------------

--
-- Structure de la table `exercises`
--

CREATE TABLE `exercises` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `answer` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `exercises`
--

INSERT INTO `exercises` (`id`, `course_id`, `question`, `name`, `content`, `answer`) VALUES
(1, 8, 'BBCCEXO', NULL, NULL, NULL),
(2, 9, 'U5', NULL, NULL, NULL),
(3, 10, 'nck', NULL, NULL, NULL),
(4, 11, 'nck2', NULL, NULL, NULL),
(5, 12, 'nck2', NULL, NULL, NULL),
(6, 13, 'Exercice 1 : Analyse des concepts clés de la relation client omnicanale\r\nContexte\r\n\r\nShopÉcolo, une entreprise spécialisée dans la vente de produits écologiques et durables, tels que des articles ménagers, des vêtements et des accessoires, des cosmétiques et des produits alimentaires.\r\n\r\nShopÉcolo est engagée dans la promotion d’un mode de vie respectueux de l’environnement et souhaite offrir une expérience client omnicanale à ses clients.\r\n\r\nConsignes\r\n\r\nDans le contexte de ShopÉcolo, identifiez et expliquez les concepts clés de la relation client omnicanale, tels que le parcours client, les points de contact, la cohérence de la communication et la personnalisation de l’expérience client.', NULL, NULL, NULL),
(7, 14, 'nck2', NULL, NULL, NULL),
(8, 15, 'nck2', NULL, NULL, NULL),
(9, 17, NULL, 'Exo 1', 'Contenu exo', NULL),
(10, 18, NULL, 'Exo 1', 'Contenu exo', NULL),
(11, 19, NULL, 'exo 1', 'contenu exo 1', NULL),
(12, 20, NULL, 'exo 1', 'contenu exo 1', NULL),
(13, 21, NULL, 'exo 1', 'contenu exo 1', NULL),
(14, 22, NULL, 'exo 1', 'contenu exo 1', NULL),
(15, 23, NULL, 'exo 1', 'contenu exo 1', NULL),
(16, 24, NULL, 'exo 1', 'contenu exo 1', NULL),
(17, 25, NULL, 'exo 1', 'contenu exo 1', NULL),
(18, 26, NULL, '11', '1', NULL),
(19, 27, NULL, '11', '1', NULL),
(20, 28, NULL, 'Exercice 1 : Identifier les enjeux de la digitalisation', 'Instructions\r\n\r\nLisez les situations ci-dessous et identifiez l’enjeu principal de la digitalisation de la relation client pour chaque cas.\r\n\r\nChoisissez parmi les enjeux suivants : amélioration de l’expérience client, réduction des coûts, accroissement de la portée, optimisation de l’efficacité opérationnelle ou personnalisation des interactions.\r\n\r\nUne entreprise met en place un chatbot pour répondre automatiquement aux questions courantes des clients.\r\nUn commerce en ligne propose des recommandations de produits basées sur l’historique d’achat de chaque client.\r\nUne entreprise utilise des outils de communication en ligne pour interagir avec des clients situés dans d’autres pays.\r\nUne entreprise décide d’automatiser certaines tâches de son service client pour gagner du temps et se concentrer sur des problèmes plus complexes.', NULL),
(21, 29, 'Exercice 1 : correction', 'Exercice 1 : Identifier les enjeux de la digitalisation', 'Instructions\r\n\r\nLisez les situations ci-dessous et identifiez l’enjeu principal de la digitalisation de la relation client pour chaque cas.\r\n\r\nChoisissez parmi les enjeux suivants : amélioration de l’expérience client, réduction des coûts, accroissement de la portée, optimisation de l’efficacité opérationnelle ou personnalisation des interactions.\r\n\r\nUne entreprise met en place un chatbot pour répondre automatiquement aux questions courantes des clients.\r\nUn commerce en ligne propose des recommandations de produits basées sur l’historique d’achat de chaque client.\r\nUne entreprise utilise des outils de communication en ligne pour interagir avec des clients situés dans d’autres pays.\r\nUne entreprise décide d’automatiser certaines tâches de son service client pour gagner du temps et se concentrer sur des problèmes plus complexes.', 'Correction\r\n\r\nExercice 1 : Identifier les enjeux de la digitalisation\r\n\r\nAmélioration de l’expérience client (le chatbot permet de répondre rapidement aux questions courantes)\r\nPersonnalisation des interactions (les recommandations de produits sont basées sur l’historique d’achat de chaque client)\r\nAccroissement de la portée (les outils de communication en ligne permettent d’atteindre des clients internationaux)\r\nOptimisation de l’efficacité opérationnelle (l’automatisation des tâches permet de gagner du temps et de se concentrer sur des problèmes plus complexes)'),
(22, 30, 'Exercice 1 : correction', 'Exercice 1 : Analyse des concepts clés de la relation client omnicanale', 'Contexte\r\n\r\nShopÉcolo, une entreprise spécialisée dans la vente de produits écologiques et durables, tels que des articles ménagers, des vêtements et des accessoires, des cosmétiques et des produits alimentaires.\r\n\r\nShopÉcolo est engagée dans la promotion d’un mode de vie respectueux de l’environnement et souhaite offrir une expérience client omnicanale à ses clients.\r\n\r\nConsignes\r\n\r\nDans le contexte de ShopÉcolo, identifiez et expliquez les concepts clés de la relation client omnicanale, tels que le parcours client, les points de contact, la cohérence de la communication et la personnalisation de l’expérience client.', 'Exercice 1 : Analyse des concepts clés de la relation client omnicanale (correction)\r\n\r\nDans le contexte de ShopÉcolo, les concepts clés de la relation client omnicanale incluent :\r\n\r\nLe parcours client : Il représente l’ensemble des étapes suivies par un client dans son interaction avec l’entreprise, depuis la découverte des produits jusqu’à l’achat et le service après-vente.\r\nLes points de contact : Ce sont les différents canaux par lesquels un client peut interagir avec l’entreprise (site web, réseaux sociaux, magasins physiques, etc.).\r\nLa cohérence de la communication : Il est essentiel de fournir un message cohérent et unifié sur tous les canaux pour offrir une expérience fluide et harmonieuse au client.\r\nLa personnalisation de l’expérience client : Adapter les interactions et les offres aux besoins et aux préférences individuelles de chaque client permet d’améliorer leur satisfaction et leur fidélité.'),
(23, 31, 'Exercice 1 : correction', 'Exercice 1 : Analyse des concepts clés de la relation client omnicanale', 'Contexte\r\n\r\nShopÉcolo, une entreprise spécialisée dans la vente de produits écologiques et durables, tels que des articles ménagers, des vêtements et des accessoires, des cosmétiques et des produits alimentaires.\r\n\r\nShopÉcolo est engagée dans la promotion d’un mode de vie respectueux de l’environnement et souhaite offrir une expérience client omnicanale à ses clients.\r\n\r\nConsignes\r\n\r\nDans le contexte de ShopÉcolo, identifiez et expliquez les concepts clés de la relation client omnicanale, tels que le parcours client, les points de contact, la cohérence de la communication et la personnalisation de l’expérience client.', 'Exercice 1 : Analyse des concepts clés de la relation client omnicanale (correction)\r\n\r\nDans le contexte de ShopÉcolo, les concepts clés de la relation client omnicanale incluent :\r\n\r\nLe parcours client : Il représente l’ensemble des étapes suivies par un client dans son interaction avec l’entreprise, depuis la découverte des produits jusqu’à l’achat et le service après-vente.\r\nLes points de contact : Ce sont les différents canaux par lesquels un client peut interagir avec l’entreprise (site web, réseaux sociaux, magasins physiques, etc.).\r\nLa cohérence de la communication : Il est essentiel de fournir un message cohérent et unifié sur tous les canaux pour offrir une expérience fluide et harmonieuse au client.\r\nLa personnalisation de l’expérience client : Adapter les interactions et les offres aux besoins et aux préférences individuelles de chaque client permet d’améliorer leur satisfaction et leur fidélité.'),
(24, 32, '08', '06', '07', '09'),
(25, 33, '08', '06', '07', '09'),
(26, 34, '1', '1', '1', '1'),
(27, 35, '1', '1', '1', '1'),
(28, 36, '1', '1', '1', '1'),
(29, 37, '1', '1', '1', '1'),
(30, 38, '1', '1', '1', '1'),
(31, 39, 'Exercice 1 : Identification des segments de marché', 'Exercice 1 : Identification des segments de marché', 'C’est parti pour la pratique ! 🙂\r\n\r\nEntraine-toi en réalisant les exercices.\r\n\r\n \r\n\r\nExercice 1 : Identification des segments de marché\r\nObjectif : Apprendre à identifier les différents segments de marché pour mieux cibler les clients potentiels.\r\n\r\nConsigne : Étudiez le marché d’un secteur d’activité de votre choix et identifiez au moins trois segments de marché distincts. Décrivez les caractéristiques de chaque segment et expliquez pourquoi ils sont pertinents pour la prospection.\r\n\r\n \r\n\r\n \r\n\r\nEn cas de doute ou blocage, tu peux nous contacter via notre Discord ou WhatsApp.\r\n\r\nN’oublie pas que tu as également accès à la correction de chaque exercice.', 'Réponses\r\n\r\nSegment 1 : Jeunes adultes (18-25 ans) – Recherchent des chaussures tendance et abordables, sensibles aux promotions et aux influenceurs sur les réseaux sociaux.\r\nSegment 2 : Professionnels (25-45 ans) – Recherchent des chaussures confortables et élégantes pour le travail, prêts à dépenser plus pour la qualité et la durabilité.\r\nSegment 3 : Seniors (45 ans et plus) – Recherchent des chaussures confortables et adaptées à leurs besoins spécifiques (soutien, semelles orthopédiques, etc.), privilégient le service client et les conseils personnalisés.'),
(32, 39, 'Exercice 2 : Création de personas', 'Exercice 2 : Création de personas', 'Objectif : Développer des personas représentatifs des clients cibles pour mieux comprendre leurs besoins et attentes.\r\n\r\nConsigne : En vous basant sur les segments de marché identifiés dans l’exercice 1, créez un persona pour chacun d’eux. Incluez des informations telles que l’âge, la profession, les centres d’intérêt, les besoins et les attentes de chaque persona.', 'Réponses\r\n\r\nPersona 1 : Léa, 22 ans, étudiante en marketing, suit les tendances de la mode et achète souvent des chaussures en ligne, surtout pendant les soldes.\r\nPersona 2 : David, 35 ans, cadre dans une entreprise, recherche des chaussures de qualité pour le travail et les occasions spéciales, accorde de l’importance à la durabilité et au confort.\r\nPersona 3 : Michelle, 60 ans, retraitée, cherche des chaussures adaptées à ses problèmes de dos et de pieds, privilégie les boutiques en ligne offrant un service client personnalisé et une politique de retour facile.'),
(33, 39, ' Exercice 3 : Analyse des concurrents', 'Exercice 3 : Analyse des concurrents', 'Objectif : Évaluer les pratiques de prospection de la concurrence afin de mettre en place une stratégie adaptée.\r\n\r\nConsigne : Choisissez deux entreprises concurrentes dans le secteur d’activité étudié et analysez leurs stratégies de prospection et de ciblage. Identifiez les points forts et les points faibles de chaque entreprise et déduisez-en des opportunités pour votre propre stratégie de prospection.', '\r\nRéponses\r\n\r\nConcurrent 1 : Zalando\r\n\r\nPoints forts : large choix, nombreuses promotions, site web intuitif.\r\n\r\nPoints faibles : service client peu personnalisé, peu d’expertise sur les besoins spécifiques des seniors.\r\n\r\nConcurrent 2 : Sarenza\r\n\r\nPoints forts : offre de marques de qualité, conseils d’experts sur le choix des chaussures.\r\n\r\nPoints faibles : prix plus élevés, moins d’attractivité pour les jeunes adultes sensibles aux promotions.\r\n\r\n\r\n'),
(34, 39, 'Exercice 4 : Plan de prospection', 'Exercice 4 : Plan de prospection', 'Objectif : Élaborer un plan de prospection en fonction des objectifs et enjeux de l’entreprise.\r\n\r\nConsigne : En vous appuyant sur les connaissances acquises lors des exercices précédents, établissez un plan de prospection détaillé pour votre entreprise. Identifiez les canaux de prospection, les messages clés et les objectifs à atteindre pour chaque segment de marché et persona.', 'Réponses\r\nCanal de prospection : Réseaux sociaux pour les jeunes adultes, publicités ciblées sur les sites professionnels pour les professionnels, e-mailing personnalisé pour les seniors.\r\nMessages clés : Promotions et tendances pour les jeunes adultes, qualité et durabilité pour les professionnels, confort et service client pour les seniors.\r\nObjectifs : Augmenter la notoriété de la marque auprès des jeunes adultes, fidéliser les professionnels avec des offres exclusives, proposer des services adaptés aux besoins des seniors (conseils, retours facilités, etc.).'),
(35, 39, ' Exercice 5 : Simulation de prospection', 'Exercice 5 : Simulation de prospection', 'Objectif : Mettre en pratique les compétences acquises en matière de prospection et de ciblage en réalisant une simulation de prospection.\r\n\r\nConsigne : Formez des binômes et organisez une simulation de prospection téléphonique. L’un des participants jouera le rôle du commercial et l’autre celui du client potentiel, représenté par l’un des personas créés précédemment. L’objectif est de présenter l’entreprise et de susciter l’intérêt du client potentiel pour obtenir un rendez-vous.\r\n\r\n\r\nBravo, tu as réalisé le dernier exercice de ce chapitre ! 🙂\r\n\r\nEnvie d’être “Chaud patate” pour le BTS, tu peux réaliser l’étude de cas de ce chapitre.\r\n\r\nSinon passe au chapitre suivant 😉', 'Réponses\r\nPour réussir cette simulation de prospection téléphonique, voici quelques étapes clés que vous pouvez suivre :\r\n\r\nPréparez votre appel : avant de commencer, prenez le temps de vous préparer en vous informant sur l’entreprise et en réfléchissant à la manière de présenter votre offre en fonction des besoins de votre client potentiel.\r\nAccrochez l’attention du client potentiel : lorsque vous appelez, commencez par vous présenter et expliquer brièvement l’objet de votre appel. Essayez de susciter l’intérêt du client potentiel en évoquant les avantages de votre offre.\r\nÉcoutez attentivement le client potentiel : laissez votre interlocuteur s’exprimer et identifiez ses besoins. Posez des questions ouvertes pour comprendre ses attentes et ses préoccupations.\r\nPrésentez votre offre : après avoir écouté attentivement votre interlocuteur, présentez votre offre en soulignant les avantages qui répondent aux besoins du client potentiel.\r\nConcluez l’appel : si le client potentiel est intéressé, proposez-lui un rendez-vous pour approfondir la discussion. Si le client potentiel n’est pas intéressé, remerciez-le pour son temps et prenez note de ses commentaires pour améliorer votre approche pour une prochaine fois.\r\nÉvaluez votre performance : après l’appel, prenez le temps de réfléchir sur ce qui a fonctionné et ce qui peut être amélioré. Demandez également à votre partenaire de jeu de vous donner son avis sur votre prestation et sur ce qui peut être amélioré.\r\nEn suivant ces étapes, vous devriez être en mesure de réaliser une simulation de prospection téléphonique efficace et professionnelle.'),
(36, 40, 'Exercice 1 : Identification des segments de marché', 'Exercice 1 : Identification des segments de marché', 'C’est parti pour la pratique ! 🙂\r\n\r\nEntraine-toi en réalisant les exercices.\r\n\r\n \r\n\r\nExercice 1 : Identification des segments de marché\r\nObjectif : Apprendre à identifier les différents segments de marché pour mieux cibler les clients potentiels.\r\n\r\nConsigne : Étudiez le marché d’un secteur d’activité de votre choix et identifiez au moins trois segments de marché distincts. Décrivez les caractéristiques de chaque segment et expliquez pourquoi ils sont pertinents pour la prospection.\r\n\r\n \r\n\r\n \r\n\r\nEn cas de doute ou blocage, tu peux nous contacter via notre Discord ou WhatsApp.\r\n\r\nN’oublie pas que tu as également accès à la correction de chaque exercice.', 'Réponses\r\n\r\nSegment 1 : Jeunes adultes (18-25 ans) – Recherchent des chaussures tendance et abordables, sensibles aux promotions et aux influenceurs sur les réseaux sociaux.\r\nSegment 2 : Professionnels (25-45 ans) – Recherchent des chaussures confortables et élégantes pour le travail, prêts à dépenser plus pour la qualité et la durabilité.\r\nSegment 3 : Seniors (45 ans et plus) – Recherchent des chaussures confortables et adaptées à leurs besoins spécifiques (soutien, semelles orthopédiques, etc.), privilégient le service client et les conseils personnalisés.'),
(37, 40, 'Exercice 2 : Création de personas', 'Exercice 2 : Création de personas', 'Objectif : Développer des personas représentatifs des clients cibles pour mieux comprendre leurs besoins et attentes.\r\n\r\nConsigne : En vous basant sur les segments de marché identifiés dans l’exercice 1, créez un persona pour chacun d’eux. Incluez des informations telles que l’âge, la profession, les centres d’intérêt, les besoins et les attentes de chaque persona.', 'Réponses\r\n\r\nPersona 1 : Léa, 22 ans, étudiante en marketing, suit les tendances de la mode et achète souvent des chaussures en ligne, surtout pendant les soldes.\r\nPersona 2 : David, 35 ans, cadre dans une entreprise, recherche des chaussures de qualité pour le travail et les occasions spéciales, accorde de l’importance à la durabilité et au confort.\r\nPersona 3 : Michelle, 60 ans, retraitée, cherche des chaussures adaptées à ses problèmes de dos et de pieds, privilégie les boutiques en ligne offrant un service client personnalisé et une politique de retour facile.'),
(38, 40, ' Exercice 3 : Analyse des concurrents', 'Exercice 3 : Analyse des concurrents', 'Objectif : Évaluer les pratiques de prospection de la concurrence afin de mettre en place une stratégie adaptée.\r\n\r\nConsigne : Choisissez deux entreprises concurrentes dans le secteur d’activité étudié et analysez leurs stratégies de prospection et de ciblage. Identifiez les points forts et les points faibles de chaque entreprise et déduisez-en des opportunités pour votre propre stratégie de prospection.', '\r\nRéponses\r\n\r\nConcurrent 1 : Zalando\r\n\r\nPoints forts : large choix, nombreuses promotions, site web intuitif.\r\n\r\nPoints faibles : service client peu personnalisé, peu d’expertise sur les besoins spécifiques des seniors.\r\n\r\nConcurrent 2 : Sarenza\r\n\r\nPoints forts : offre de marques de qualité, conseils d’experts sur le choix des chaussures.\r\n\r\nPoints faibles : prix plus élevés, moins d’attractivité pour les jeunes adultes sensibles aux promotions.\r\n\r\n\r\n'),
(39, 40, 'Exercice 4 : Plan de prospection', 'Exercice 4 : Plan de prospection', 'Objectif : Élaborer un plan de prospection en fonction des objectifs et enjeux de l’entreprise.\r\n\r\nConsigne : En vous appuyant sur les connaissances acquises lors des exercices précédents, établissez un plan de prospection détaillé pour votre entreprise. Identifiez les canaux de prospection, les messages clés et les objectifs à atteindre pour chaque segment de marché et persona.', 'Réponses\r\nCanal de prospection : Réseaux sociaux pour les jeunes adultes, publicités ciblées sur les sites professionnels pour les professionnels, e-mailing personnalisé pour les seniors.\r\nMessages clés : Promotions et tendances pour les jeunes adultes, qualité et durabilité pour les professionnels, confort et service client pour les seniors.\r\nObjectifs : Augmenter la notoriété de la marque auprès des jeunes adultes, fidéliser les professionnels avec des offres exclusives, proposer des services adaptés aux besoins des seniors (conseils, retours facilités, etc.).'),
(40, 40, ' Exercice 5 : Simulation de prospection', 'Exercice 5 : Simulation de prospection', 'Objectif : Mettre en pratique les compétences acquises en matière de prospection et de ciblage en réalisant une simulation de prospection.\r\n\r\nConsigne : Formez des binômes et organisez une simulation de prospection téléphonique. L’un des participants jouera le rôle du commercial et l’autre celui du client potentiel, représenté par l’un des personas créés précédemment. L’objectif est de présenter l’entreprise et de susciter l’intérêt du client potentiel pour obtenir un rendez-vous.\r\n\r\n\r\nBravo, tu as réalisé le dernier exercice de ce chapitre ! 🙂\r\n\r\nEnvie d’être “Chaud patate” pour le BTS, tu peux réaliser l’étude de cas de ce chapitre.\r\n\r\nSinon passe au chapitre suivant 😉', 'Réponses\r\nPour réussir cette simulation de prospection téléphonique, voici quelques étapes clés que vous pouvez suivre :\r\n\r\nPréparez votre appel : avant de commencer, prenez le temps de vous préparer en vous informant sur l’entreprise et en réfléchissant à la manière de présenter votre offre en fonction des besoins de votre client potentiel.\r\nAccrochez l’attention du client potentiel : lorsque vous appelez, commencez par vous présenter et expliquer brièvement l’objet de votre appel. Essayez de susciter l’intérêt du client potentiel en évoquant les avantages de votre offre.\r\nÉcoutez attentivement le client potentiel : laissez votre interlocuteur s’exprimer et identifiez ses besoins. Posez des questions ouvertes pour comprendre ses attentes et ses préoccupations.\r\nPrésentez votre offre : après avoir écouté attentivement votre interlocuteur, présentez votre offre en soulignant les avantages qui répondent aux besoins du client potentiel.\r\nConcluez l’appel : si le client potentiel est intéressé, proposez-lui un rendez-vous pour approfondir la discussion. Si le client potentiel n’est pas intéressé, remerciez-le pour son temps et prenez note de ses commentaires pour améliorer votre approche pour une prochaine fois.\r\nÉvaluez votre performance : après l’appel, prenez le temps de réfléchir sur ce qui a fonctionné et ce qui peut être amélioré. Demandez également à votre partenaire de jeu de vous donner son avis sur votre prestation et sur ce qui peut être amélioré.\r\nEn suivant ces étapes, vous devriez être en mesure de réaliser une simulation de prospection téléphonique efficace et professionnelle.'),
(41, 41, 'nom correction exercice', 'nom de mon exercice', 'contenu de mon exercice', 'contenu correction exercice'),
(42, 42, 'nom correction exercice', 'nom de mon exercice', 'contenu de mon exercice', 'contenu correction exercice'),
(43, 43, 'nom correction exercice', 'nom de mon exercice', 'contenu de mon exercice', 'contenu correction exercice');

-- --------------------------------------------------------

--
-- Structure de la table `exercise_corrections`
--

CREATE TABLE `exercise_corrections` (
  `id` int(11) NOT NULL,
  `exercise_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `presentation_formation` text DEFAULT NULL,
  `condition_admission` text DEFAULT NULL,
  `programmes` text DEFAULT NULL,
  `methode_pedagogique` text DEFAULT NULL,
  `débouché` text DEFAULT NULL,
  `témoignage_étudiant` text DEFAULT NULL,
  `modalités_évaluation` text DEFAULT NULL,
  `info_pratique` text DEFAULT NULL,
  `object_stage` text DEFAULT NULL,
  `durée` text DEFAULT NULL,
  `recherche` text DEFAULT NULL,
  `convention` text DEFAULT NULL,
  `mission` text DEFAULT NULL,
  `suivi` text DEFAULT NULL,
  `importance` text DEFAULT NULL,
  `date_publication` timestamp NOT NULL DEFAULT current_timestamp(),
  `categorie_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `information`
--

INSERT INTO `information` (`id`, `presentation_formation`, `condition_admission`, `programmes`, `methode_pedagogique`, `débouché`, `témoignage_étudiant`, `modalités_évaluation`, `info_pratique`, `object_stage`, `durée`, `recherche`, `convention`, `mission`, `suivi`, `importance`, `date_publication`, `categorie_id`) VALUES
(1, 'Le BTS Support à l’Action Managériale (SAM) est conçu pour former des professionnels capables d’assister les managers dans la gestion des activités au sein de l’entreprise, avec une maîtrise des outils numériques. Ce diplôme répond à la demande croissante des organisations pour des collaborateurs qualifiés dans la gestion administrative, la coordination de projets et la communication interne et externe.\r\n\r\nLes étudiants apprennent à gérer l\'organisation des activités d’un manager, à coordonner des projets, et à utiliser des outils digitaux pour faciliter la gestion administrative et l\'efficacité organisationnelle.\r\n\r\nLe programme aborde des thématiques variées telles que la gestion des ressources humaines, la communication professionnelle, la gestion de projet, et les outils de bureautique avancés. Cette formation vise à doter les étudiants de compétences polyvalentes leur permettant de répondre efficacement aux exigences des managers et de s\'adapter aux nouvelles méthodes de travail collaboratif et digital.\r\n\r\nLe BTS SAM prépare à des postes clés au sein des services administratifs, RH, ou de gestion de projets dans des secteurs variés, allant des grandes entreprises aux PME, en passant par les institutions publiques et les organisations internationales.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Les conditions d\'admission au BTS Support à l’Action Managériale (SAM) sont conçues pour sélectionner des candidats motivés et capables de réussir dans un domaine aussi exigeant que celui de l’assistance managériale.\r\n\r\nLes postulants doivent généralement être titulaires d’un baccalauréat, qu’il soit général, technologique, ou professionnel. Il est également possible pour les candidats ayant une expérience professionnelle pertinente ou d’autres qualifications d’intégrer la formation, en fonction des critères de l’établissement.\r\n\r\nLes candidatures sont évaluées en fonction des dossiers académiques, qui doivent refléter de bonnes performances dans les matières liées à la gestion, à la communication, et à l’administration. Certains établissements peuvent également organiser des entretiens ou des tests pour évaluer les motivations et les compétences des candidats de manière plus approfondie.\r\n\r\nIl est essentiel pour les candidats de démontrer leur intérêt pour la gestion d’activités managériales, leur capacité à travailler en équipe, et leur aisance avec les outils numériques. La préparation d’un dossier de candidature soigné, accompagné d’une lettre de motivation bien rédigée, renforce les chances d’admission dans ce programme très compétitif.', 'Le programme du BTS Support à l\'Action Managériale (SAM) est conçu pour offrir une formation complète et polyvalente, couvrant tous les aspects du support à la gestion administrative et managériale dans des environnements professionnels divers. Les matières enseignées incluent la gestion administrative, qui constitue le cœur du programme, en mettant l\'accent sur l\'acquisition de compétences organisationnelles, de coordination et de gestion des priorités.\r\n\r\nLes étudiants se forment également à la communication professionnelle, en apprenant à rédiger des documents de qualité, à organiser des réunions, et à gérer des événements internes ou externes à l\'entreprise. La gestion de projet est un autre élément clé du programme, enseignant aux étudiants comment planifier, suivre et évaluer des projets, tout en tenant compte des délais et des ressources disponibles.\r\n\r\nLe programme inclut aussi des aspects juridiques et économiques, permettant aux étudiants de comprendre les règles et régulations qui encadrent les entreprises et de gérer des situations contractuelles. La formation aborde également les nouvelles technologies et les outils numériques, aidant les étudiants à s’adapter aux environnements de travail modernes et à maîtriser des logiciels de gestion spécifiques.\r\n\r\nEnfin, des stages en entreprise permettent aux étudiants de mettre en pratique leurs connaissances, d\'acquérir de l\'expérience dans le soutien aux managers, et de développer des compétences concrètes. Ce mélange équilibré entre théorie et pratique prépare les diplômés à s’intégrer facilement dans le monde du travail et à exceller dans les fonctions d\'assistant de direction ou de gestion administrative.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Les méthodes pédagogiques employées dans le BTS Support à l\'Action Managériale (SAM) sont variées afin de répondre aux différents styles d\'apprentissage et de favoriser l\'acquisition des compétences. L\'approche combine cours magistraux pour les bases théoriques, travaux dirigés pour des exercices pratiques, et études de cas pour analyser des situations professionnelles réelles et concrètes.\r\n\r\nLes projets de groupe sont encouragés, car ils développent les compétences de travail en équipe, la communication, et la gestion de projet, des qualités essentielles dans le milieu professionnel. Les étudiants apprennent ainsi à collaborer efficacement et à gérer des responsabilités collectives.\r\n\r\nLes stages en entreprise sont une composante clé de cette formation, permettant aux étudiants de s\'immerger dans un environnement professionnel et d\'appliquer les théories apprises en classe. Ces stages offrent une occasion précieuse d’acquérir de l’expérience, de mieux comprendre le fonctionnement des entreprises, et de renforcer les compétences pratiques.\r\n\r\nEn outre, l\'utilisation d’outils numériques et de logiciels spécifiques à la gestion administrative est intégrée dans les cours, ce qui permet aux étudiants de se familiariser avec les technologies qu\'ils utiliseront dans leur future carrière. Cette méthode pédagogique vise à renforcer leur capacité d’adaptation, leur autonomie, et leur polyvalence, des atouts majeurs pour réussir dans les fonctions de support managérial.', 'Le BTS Support à l\'Action Managériale (SAM) ouvre la voie à une large gamme de débouchés professionnels dans des secteurs divers, répondant à la demande croissante pour des compétences en gestion administrative et en assistance managériale. Les diplômés peuvent prétendre à des postes tels qu\'assistant de direction, assistant de manager, coordinateur de projets, ou encore responsable administratif, au sein d\'entreprises de toutes tailles, allant des petites structures aux grandes multinationales.\r\n\r\nLes compétences développées permettent également de travailler dans des domaines variés comme la gestion de projet, la communication interne et externe, ainsi que la coordination d\'équipes, offrant ainsi des perspectives de carrière riches et diversifiées. La maîtrise des outils bureautiques et des logiciels de gestion administrative est particulièrement valorisée, ouvrant des opportunités dans des environnements variés tels que les services administratifs, les ressources humaines, ou encore le secteur public.\r\n\r\nPour ceux qui souhaitent poursuivre leurs études, le BTS SAM permet d’accéder à des licences professionnelles, des bachelors, et même à certains masters spécialisés dans des domaines comme le management, la gestion, ou les ressources humaines, offrant ainsi de nombreuses possibilités d’évolution et de spécialisation.', 'Les témoignages d\'anciens étudiants du BTS Support à l\'Action Managériale (SAM) fournissent un aperçu précieux et authentique de l\'impact réel de la formation. Ces récits personnels démontrent comment les compétences et connaissances acquises ont été mises en œuvre dans différents contextes professionnels.\r\n\r\nPar exemple, un ancien étudiant pourrait partager son parcours vers un poste d\'assistant de direction dans une entreprise dynamique, en mettant en avant l\'importance des compétences organisationnelles et de communication développées durant sa formation. Un autre étudiant pourrait évoquer son expérience en tant que gestionnaire de projet, ayant utilisé les techniques apprises pour mener à bien des projets complexes, démontrant ainsi l\'application pratique des concepts de gestion administrative.\r\n\r\nCes témoignages incluent souvent des conseils pour les futurs étudiants, des réflexions sur les éléments les plus bénéfiques du programme, ainsi que des récits sur la façon dont le BTS SAM a facilité leur intégration professionnelle et leur avancement dans leur carrière.\r\n\r\nCes histoires enrichissent la présentation du programme, offrant des exemples concrets et inspirants susceptibles de motiver les candidats potentiels à envisager cette voie avec enthousiasme.', 'L\'évaluation des étudiants en BTS Support à l\'Action Managériale (SAM) est conçue pour être exhaustive et représentative des compétences nécessaires dans le milieu professionnel. Elle se compose d\'examens écrits qui vérifient la maîtrise des connaissances théoriques en gestion administrative, en communication, et en techniques de management.\r\n\r\nLes projets individuels et de groupe sont également des éléments clés de l\'évaluation, permettant de juger la capacité des étudiants à appliquer leurs connaissances dans des situations concrètes, tout en favorisant l\'innovation et la créativité.\r\n\r\nLes stages en entreprise, qui constituent un aspect fondamental du programme, sont soumis à une évaluation rigoureuse. Les étudiants doivent rédiger un rapport de stage et effectuer une soutenance orale, ce qui permet d\'évaluer leur aptitude à intégrer et à appliquer leurs compétences dans un environnement professionnel réel.\r\n\r\nCes différentes modalités d\'évaluation visent à mesurer non seulement le savoir académique, mais aussi le savoir-faire et le savoir-être des étudiants, les préparant ainsi efficacement à une insertion professionnelle réussie.', 'La section des informations pratiques est cruciale pour orienter les futurs étudiants dans le processus d\'admission et les préparer à leur formation en BTS Support à l\'Action Managériale (SAM). Cette section doit comprendre les modalités d\'inscription, telles que les documents requis et les délais à respecter pour candidater.\r\n\r\nIl est également essentiel d\'indiquer les dates importantes, comme le début des cours, les périodes d\'examen et les dates des stages. De plus, fournir des informations sur les coûts de formation, les options de financement disponibles, ainsi que les bourses potentielles peut s\'avérer très utile pour les étudiants et leurs familles.\r\n\r\nLes coordonnées pour obtenir des informations supplémentaires, que ce soit par téléphone, par email ou lors de rendez-vous, permettent aux candidats de poser des questions spécifiques et d\'obtenir des conseils personnalisés. Enfin, il est important d\'inclure des détails sur les installations, telles que l\'accès au campus, les services aux étudiants et les ressources pédagogiques, afin d\'offrir une vue d\'ensemble complète de l\'expérience étudiante.', 'es stages en entreprise constituent une composante essentielle du BTS Support à l\'Action Managériale (SAM). Ils ont pour objectif de vous fournir une expérience professionnelle concrète, vous permettant ainsi d\'appliquer et d\'enrichir les connaissances acquises en cours dans un environnement de travail réel.\r\n\r\nCes expériences sont cruciales pour comprendre le fonctionnement des organisations, développer des compétences professionnelles spécifiques à votre domaine d\'études, et faciliter votre insertion professionnelle à l\'issue de votre formation. Grâce à ces stages, vous aurez l\'opportunité de découvrir les différents aspects du management, de la gestion administrative, et de l\'organisation des équipes, tout en consolidant votre expertise et votre réseau professionnel.', 'Le cursus du BTS Support à l\'Action Managériale (SAM) prévoit deux périodes de stage obligatoires, d\'une durée totale minimale de 14 à 16 semaines réparties sur les deux années de formation. Ces stages peuvent être réalisés dans différents types d\'entreprises, allant des start-ups aux grandes entreprises, dans des secteurs variés correspondant aux métiers du management, de l\'administration, et de la gestion.\r\n\r\nCette diversité d\'environnements permet aux étudiants d\'acquérir une expérience riche et variée, leur offrant ainsi la possibilité de découvrir les multiples facettes du soutien à l\'action managériale, tout en développant des compétences pratiques essentielles à leur future carrière.', '\r\nLa recherche de stage dans le cadre du BTS Support à l\'Action Managériale (SAM) est une démarche personnelle et active. Il est fortement conseillé de commencer vos recherches bien à l’avance afin de trouver des entreprises qui correspondent à vos aspirations professionnelles.\r\n\r\nPour cela, n\'hésitez pas à utiliser tous les moyens à votre disposition : explorez les plateformes de recherche de stage, engagez-vous sur des réseaux sociaux professionnels, mobilisez vos contacts personnels et professionnels, parcourez les forums d’emploi, ainsi que les ressources de votre établissement d’enseignement.\r\n\r\nUne approche proactive augmentera vos chances de trouver un stage qui enrichira votre parcours et vous préparera efficacement à votre future carrière.', 'out stage dans le cadre du BTS Support à l\'Action Managériale (SAM) doit faire l’objet d’une convention entre l’entreprise d’accueil, l’étudiant et l’établissement d’enseignement. Ce document officiel est essentiel car il précise les objectifs du stage, les missions confiées à l’étudiant, ainsi que les modalités de suivi et d’évaluation.\r\n\r\nLa convention définit également les droits et devoirs de chaque partie impliquée, incluant les aspects relatifs à la rémunération et à l\'assurance. Ainsi, elle garantit une compréhension claire des attentes et des responsabilités, facilitant une expérience de stage enrichissante et conforme aux exigences du programme.', 'Les missions confiées lors des stages en BTS Support à l\'Action Managériale (SAM) doivent être en adéquation avec les objectifs de formation du diplôme. Elles peuvent inclure des activités telles que :\r\n\r\nGestion de l\'administration : assister dans la planification et l\'organisation des activités administratives de l\'entreprise.\r\nGestion de projet : participer à la création, à la mise en œuvre et au suivi de projets.\r\nCommunication interne et externe : contribuer à la rédaction de documents, à la gestion de la correspondance et à l\'organisation d\'événements.\r\nSoutien à la relation client : aider dans la gestion des demandes et la fidélisation des clients.\r\nCes missions représentent une opportunité précieuse pour développer des compétences clés en communication, gestion de projet, négociation, et utilisation des outils numériques. Elles préparent également les étudiants à être opérationnels dans un environnement professionnel dynamique et en constante évolution.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'Durant votre stage en BTS Support à l\'Action Managériale (SAM), vous bénéficierez d\'un suivi attentif de la part de deux encadrants : un tuteur en entreprise, qui vous guidera dans vos missions quotidiennes, et un enseignant référent de votre établissement, qui s\'assurera que votre expérience est en adéquation avec les objectifs pédagogiques du cursus.\r\n\r\nÀ l\'issue de chaque période de stage, vous serez amené à réaliser un rapport de stage ou un projet tutoré. Ce travail aura pour but de synthétiser les compétences acquises et les expériences vécues au cours de votre immersion professionnelle. Il sera ensuite évalué et fera l’objet d’une soutenance devant un jury, contribuant ainsi à votre note finale. Cette étape est cruciale pour démontrer votre capacité à intégrer et à mettre en pratique vos acquis théoriques dans un environnement professionnel réel.', 'Les stages en BTS Support à l\'Action Managériale (SAM) ne sont pas seulement une exigence académique, mais également un véritable tremplin vers l’emploi. Ces expériences professionnelles enrichissent votre CV, vous permettent de développer un réseau professionnel solide et peuvent parfois aboutir à des offres d’emploi à la clé.\r\n\r\nEn vous engageant pleinement dans ces stages, vous aurez l\'opportunité d\'acquérir des compétences pratiques et de mettre en œuvre les connaissances théoriques acquises au cours de votre formation. Les stages constituent une étape clé de votre parcours professionnel, vous préparant à intégrer efficacement le marché du travail. N\'hésitez pas à saisir chaque occasion pour maximiser votre expérience et renforcer votre profil.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', '2024-07-05 02:10:46', 13);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `expire_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `expire_at`) VALUES
('atm77zkh@gmail.com', '22e5c64902a8b1ad140fbd97dd02873368553a36cb93ef731239bda9e2baa1acec94c6e94282ad0fa60ffde9925af802ff64', '2024-06-28 17:19:20');

-- --------------------------------------------------------

--
-- Structure de la table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `subcat_id` int(11) DEFAULT NULL,
  `section_name` varchar(255) NOT NULL,
  `section_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `sections`
--

INSERT INTO `sections` (`id`, `subcat_id`, `section_name`, `section_description`) VALUES
(4, 46, 'Fondamentaux de la communication', 'Section 1 '),
(5, 46, 'Rédaction de documents professionnels', 'Section 2 '),
(6, 46, 'Techniques de présentation', 'Section 3 '),
(7, 46, ' Communication interpersonnelle', 'Section 4 ');

-- --------------------------------------------------------

--
-- Structure de la table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `subcat` varchar(255) NOT NULL,
  `description_matiere` varchar(3000) NOT NULL,
  `type_matiere` varchar(200) NOT NULL DEFAULT 'Les Matiéres',
  `coefficients` int(1) NOT NULL DEFAULT 1,
  `Date_publication` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `subcategories`
--

INSERT INTO `subcategories` (`id`, `cat_id`, `subcat`, `description_matiere`, `type_matiere`, `coefficients`, `Date_publication`, `status`) VALUES
(46, 13, 'Module 4 : Gestion administrative', '\r\nCe module enseigne aux étudiants les principes et les pratiques de la gestion administrative dans une entreprise. Les cours abordent des sujets tels que l\'organisation des services, la gestion des documents, et la planification des activités. Les étudiants apprennent à gérer des tâches administratives courantes, à organiser des réunions et à coordonner des projets.', 'Technique', 5, '2024-07-04 05:33:58', 0),
(47, 13, 'Module 5 : Gestion de projet\r\n', 'Dans ce module, les étudiants découvrent les étapes et les outils nécessaires à la gestion efficace d\'un projet. Ils apprennent à définir des objectifs, à planifier les ressources, à établir des budgets et à suivre l\'avancement des projets. Ce module met l\'accent sur le travail d\'équipe et la résolution de problèmes pour garantir le succès des projets.', 'Technique', 4, '2024-07-04 05:35:13', 0),
(48, 13, 'Module 6 : Droit du travail et relations professionnelles\r\n', 'Ce module traite des aspects juridiques liés aux relations professionnelles et au droit du travail. Les étudiants apprennent les droits et obligations des employeurs et des employés, ainsi que les procédures à suivre en cas de conflit. Ce module vise à doter les étudiants des connaissances nécessaires pour naviguer dans le cadre légal qui régit les relations de travail.', 'Technique', 3, '2024-07-04 05:35:55', 0),
(49, 13, 'Module 1 : Communication professionnelle', '\r\nCe module se concentre sur les différentes formes de communication utilisées dans le milieu professionnel. Les étudiants apprennent à rédiger des documents professionnels tels que des courriers, des rapports et des comptes rendus, tout en développant leurs compétences en communication orale lors de présentations et de réunions. L’objectif est de maîtriser les techniques de communication efficaces pour interagir avec des collègues, des clients et des partenaires.', 'Générale', 3, '2024-07-04 05:36:33', 0),
(50, 13, 'Module 2 : Économie et management', '\r\nDans ce module, les étudiants explorent les bases de l\'économie et du management. Les cours couvrent des concepts tels que le fonctionnement des marchés, la création de valeur, la stratégie d’entreprise et les différents types d\'organisations. Les étudiants apprennent à analyser les environnements économique et concurrentiel pour prendre des décisions managériales éclairées.', 'Générale', 3, '2024-07-04 05:37:15', 0),
(51, 13, 'Module 3 : Outils numériques pour l’entreprise', '\r\nCe module se concentre sur l’utilisation des outils numériques dans le contexte professionnel. Les étudiants apprennent à utiliser des logiciels de bureautique, de gestion de projet et de collaboration en ligne pour optimiser leur efficacité au travail. L\'accent est mis sur la maîtrise des outils numériques pour faciliter la gestion des tâches et des communications au sein d\'une équipe.', 'Générale', 3, '2024-07-04 05:38:48', 0);

-- --------------------------------------------------------

--
-- Structure de la table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `subscription_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('trial','monthly','annual') NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `niveau` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `subscriptions`
--

INSERT INTO `subscriptions` (`subscription_id`, `user_id`, `type`, `start_date`, `end_date`, `niveau`) VALUES
(14, 40, 'annual', '2024-10-15', '2028-10-25', 3);

-- --------------------------------------------------------

--
-- Structure de la table `user_abonnements`
--

CREATE TABLE `user_abonnements` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `abonnement_id` int(11) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(255) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `mobile` bigint(20) DEFAULT NULL,
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT current_timestamp(),
  `user_activation_key` varchar(255) NOT NULL DEFAULT '',
  `user_status` int(11) DEFAULT 1,
  `display_name` varchar(250) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `wp_users`
--

INSERT INTO `wp_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `mobile`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(40, 'vinsmoke sanji', '12dea96fec20593566ab75692c9949596833adc9', 'Vinsmoke', 'user@gmail.com', NULL, '', '2024-06-12 20:57:46', '', 1, 'Vins '),
(42, 'admin2', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'vinsmoke ', 'admin@gmail.com', 0, '', '2024-07-01 06:48:58', '', 0, 'diop');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `abonnements`
--
ALTER TABLE `abonnements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `case_studies`
--
ALTER TABLE `case_studies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Index pour la table `case_study_corrections`
--
ALTER TABLE `case_study_corrections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `case_study_id` (`case_study_id`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `abonnement_id` (`abonnement_id`);

--
-- Index pour la table `commission`
--
ALTER TABLE `commission`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Index pour la table `course_access`
--
ALTER TABLE `course_access`
  ADD PRIMARY KEY (`access_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Index pour la table `course_parts`
--
ALTER TABLE `course_parts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Index pour la table `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Index pour la table `exercise_corrections`
--
ALTER TABLE `exercise_corrections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exercise_id` (`exercise_id`);

--
-- Index pour la table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorie_id` (`categorie_id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`token`);

--
-- Index pour la table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subcat_id` (`subcat_id`);

--
-- Index pour la table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`subscription_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `user_abonnements`
--
ALTER TABLE `user_abonnements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `abonnement_id` (`abonnement_id`);

--
-- Index pour la table `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `abonnements`
--
ALTER TABLE `abonnements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `case_studies`
--
ALTER TABLE `case_studies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pour la table `case_study_corrections`
--
ALTER TABLE `case_study_corrections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `commission`
--
ALTER TABLE `commission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `course_access`
--
ALTER TABLE `course_access`
  MODIFY `access_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `course_parts`
--
ALTER TABLE `course_parts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT pour la table `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `exercise_corrections`
--
ALTER TABLE `exercise_corrections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT pour la table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `subscription_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `user_abonnements`
--
ALTER TABLE `user_abonnements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `case_study_corrections`
--
ALTER TABLE `case_study_corrections`
  ADD CONSTRAINT `case_study_corrections_ibfk_1` FOREIGN KEY (`case_study_id`) REFERENCES `case_studies` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
