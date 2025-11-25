-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 25 nov. 2025 à 16:42
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tom_troc`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `author` varchar(50) NOT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_exchangeable` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `user_id`, `title`, `author`, `cover_image`, `description`, `is_exchangeable`, `created_at`, `updated_at`) VALUES
(1, 1, 'The Two Towers', 'J.R.R. Tolkien', 'the-two-towers-tolkien-1.webp', NULL, 1, '2025-10-28 17:26:28', '2025-11-13 17:44:14'),
(2, 2, 'Company of One', 'Paul Jarvis', 'company-of-one-jarvis-2.webp', NULL, 1, '2025-10-28 17:26:28', '2025-11-13 17:45:55'),
(3, 3, 'Narnia', 'C.S. Lewis', 'narnia-lewis-3.webp', NULL, 1, '2025-10-28 17:26:28', '2025-11-13 17:46:58'),
(4, 4, 'The Subtle Art of Not Giving a F*ck', 'Mark Manson', 'the-subtle-art-of-not-giving-a-f-ck-manson-4.webp', NULL, 1, '2025-10-28 17:26:28', '2025-11-13 17:47:48'),
(5, 5, 'A Book Full of Hope', 'Rupi Kaur', 'a-book-full-of-hope-kaur-5.webp', NULL, 1, '2025-10-28 17:26:28', '2025-11-13 17:48:49'),
(6, 6, 'Thinking, Fast & Slow', 'Daniel Kahneman', 'thinking-fast-slow-kahneman-6.webp', NULL, 1, '2025-10-28 17:26:28', '2025-11-13 17:49:47'),
(7, 7, 'Psalms', 'Alabaster', 'psalms-alabaster-7.webp', NULL, 1, '2025-10-28 17:26:28', '2025-11-13 17:50:54'),
(8, 8, 'Innovation', 'Matt Ridley', 'innovation-ridley-8.webp', NULL, 1, '2025-10-28 17:26:28', '2025-11-13 17:51:39'),
(9, 12, 'Hygge', 'Meik Wiking', 'hygge-wiking-12.webp', NULL, 1, '2025-10-28 17:26:28', '2025-11-13 17:55:01'),
(10, 9, 'Minimalist Graphics', 'Julia Schonlau', 'minimalist-graphics-schonlau-9.webp', NULL, 1, '2025-10-28 17:26:28', '2025-11-13 17:52:33'),
(11, 10, 'Milwaukee Mission', 'Elder Cooper Low', 'milwaukee-mission-low-10.webp', NULL, 1, '2025-10-28 17:26:28', '2025-11-13 17:53:26'),
(12, 11, 'Delight!', 'Justin Rossow', 'delight-rossow-11.webp', NULL, 1, '2025-10-28 17:26:28', '2025-11-13 17:54:15'),
(13, 12, 'Milk & honey', 'Rupi Kaur', 'milk-honey-kaur-12.webp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras consequat, quam vel euismod tempus, sem tortor molestie nunc, vel vulputate neque justo at purus. Morbi consequat tincidunt luctus.\r\n\r\nProin auctor ac tellus a ornare. Vestibulum tristique lacinia malesuada. Aenean sollicitudin maximus tincidunt. Donec sed dolor mattis, fermentum purus ut, tincidunt ipsum. Duis consectetur fermentum ante, nec consectetur tellus consequat aliquet. Nulla at orci a lectus sollicitudin vestibulum.\r\n\r\nSuspendisse iaculis imperdiet ipsum, ut facilisis nunc pulvinar quis. Vivamus quis sollicitudin nisi, nec ultrices ipsum. Cras dignissim tincidunt magna. Etiam ut erat non mi pulvinar sollicitudin. Cras id mattis lorem. Nunc sed sodales velit. Duis facilisis justo felis, et mollis nisl blandit eget porttitor.', 1, '2025-10-28 17:26:28', '2025-11-13 17:54:56'),
(14, 13, 'Wabi Sabi', 'Beth Kempton', 'wabi-sabi-kempton-13.webp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras consequat, quam vel euismod tempus, sem tortor molestie nunc, vel vulputate neque justo at purus. Morbi consequat tincidunt luctus.\r\n\r\nProin auctor ac tellus a ornare. Vestibulum tristique lacinia malesuada. Aenean sollicitudin maximus tincidunt. Donec sed dolor mattis, fermentum purus ut, tincidunt ipsum. Duis consectetur fermentum ante, nec consectetur tellus consequat aliquet. Nulla at orci a lectus sollicitudin vestibulum.\r\n\r\nSuspendisse iaculis imperdiet ipsum, ut facilisis nunc pulvinar quis. Vivamus quis sollicitudin nisi, nec ultrices ipsum. Cras dignissim tincidunt magna. Etiam ut erat non mi pulvinar sollicitudin. Cras id mattis lorem. Nunc sed sodales velit. Duis facilisis justo felis, et mollis nisl blandit eget porttitor.', 1, '2025-10-28 17:26:28', '2025-11-13 17:56:16'),
(15, 14, 'The Kinfolk Table', 'Nathan Williams', 'the-kinfolk-table-williams-14.webp', 'J\'ai récemment plongé dans les pages de \'The Kinfolk Table\' et j\'ai été enchanté par cette œuvre captivante. Ce livre va bien au-delà d\'une simple collection de recettes ; il célèbre l\'art de partager des moments authentiques autour de la table.\r\n\r\nLes photographies magnifiques et le ton chaleureux captivent dès le départ, transportant le lecteur dans un voyage à travers des recettes et des histoires qui mettent en avant la beauté de la simplicité et de la convivialité.\r\n\r\nChaque page est une invitation à ralentir, à savourer et à créer des souvenirs durables avec les êtres chers.\r\n\r\n\'The Kinfolk Table\' incarne parfaitement l\'esprit de la cuisine et de la camaraderie, et il est certain que ce livre trouvera une place spéciale dans le cœur de tout amoureux de la cuisine et des rencontres inspirantes.', 1, '2025-11-06 15:01:03', '2025-11-13 17:57:00'),
(16, 15, 'Esther', 'Alabaster', 'esther-alabaster-15.webp', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras consequat, quam vel euismod tempus, sem tortor molestie nunc, vel vulputate neque justo at purus. Morbi consequat tincidunt luctus.\r\n\r\nProin auctor ac tellus a ornare. Vestibulum tristique lacinia malesuada. Aenean sollicitudin maximus tincidunt. Donec sed dolor mattis, fermentum purus ut, tincidunt ipsum. Duis consectetur fermentum ante, nec consectetur tellus consequat aliquet. Nulla at orci a lectus sollicitudin vestibulum.\r\n\r\nSuspendisse iaculis imperdiet ipsum, ut facilisis nunc pulvinar quis. Vivamus quis sollicitudin nisi, nec ultrices ipsum. Cras dignissim tincidunt magna. Etiam ut erat non mi pulvinar sollicitudin. Cras id mattis lorem. Nunc sed sodales velit. Duis facilisis justo felis, et mollis nisl blandit eget porttitor.', 1, '2025-10-28 17:26:28', '2025-11-13 17:57:56'),
(17, 16, 'Le Hobbit', 'J.R.R. Tolkien', 'le-hobbit-tolkien-16.webp', 'Le Hobbit (The Hobbit) ou Bilbo le Hobbit est un roman de fantasy de l’écrivain britannique J. R. R. Tolkien. Il narre les aventures du hobbit Bilbo, entraîné malgré lui par le magicien Gandalf et une compagnie de treize nains dans leur voyage vers la Montagne Solitaire, avec pour but de se réapproprier le trésor volé et gardé par le dragon Smaug.\r\n\r\nRédigé de manière intermittente de la fin des années 1920 au début des années 1930, Le Hobbit n’a d’autre but à l’origine que de divertir les jeunes enfants de Tolkien. Le manuscrit inachevé circule parmi les proches de l’écrivain et arrive finalement chez l’éditeur londonien George Allen & Unwin, qui demande à Tolkien d’achever le récit et de l’illustrer.\r\n\r\nLe Hobbit paraît le 21 septembre 1937 au Royaume-Uni. C’est la première œuvre publiée qui explore l’univers de la Terre du Milieu, sur lequel Tolkien travaille depuis une vingtaine d’années. Elle rencontre un franc succès critique et commercial, qui incite Allen & Unwin à réclamer une suite à son auteur. Cette suite devient le roman le plus connu de Tolkien : Le Seigneur des anneaux, une œuvre beaucoup plus complexe et sombre. Le souci de cohérence entre les deux ouvrages pousse l’écrivain à procéder à des révisions du texte du Hobbit, concernant en particulier le rôle de Gollum.', 1, '2025-11-11 12:27:30', '2025-11-14 21:40:16'),
(18, 16, 'The Dark Knight Returns', 'Frank Miller', 'the-dark-knight-returns-miller-16.webp', 'The Dark Knight Returns est une mini-série de bande dessinée américaine en quatre tomes, écrite et dessinée par Frank Miller et publiée en 1986 par l\'éditeur DC Comics.\r\n\r\nLorsque la série est rassemblée en un seul volume plus tard dans l\'année, le titre de l\'histoire du premier tome est appliqué à la série entière, soit « The Dark Knight Returns ».\r\n\r\nL\'histoire se déroule dans une continuité alternative de l\'univers DC (sur la Terre-31 du Multivers DC d\'avant Flashpoint), dans laquelle Bruce Wayne (alias le justicier Batman), âgé de 55 ans, sort de sa retraite pour combattre le crime et faire face aux forces de police de Gotham City et du gouvernement américain. L’histoire introduit le personnage de Carrie Kelley en tant que nouveau Robin, ainsi que le gang des rues Les Mutants.\r\n\r\nL\'histoire présente également le retour d\'ennemis iconiques de Batman, tels Double-Face et le Joker, et culmine avec une confrontation de Batman contre le super-héros Superman, qui travaille alors pour le compte du gouvernement américain.', 1, '2025-11-11 12:51:19', '2025-11-14 21:40:19'),
(19, 16, 'Watchmen', 'Alan Moore', 'watchmen-moore-16.webp', 'Watchmen (initialement publié en France sous le titre Les Gardiens) est une série de comic book américano-britannique, assimilable au roman graphique, créée par le scénariste Alan Moore, le dessinateur Dave Gibbons et le coloriste John Higgins.\r\n\r\nLa série met en scène des super-héros entièrement originaux dans un univers parallèle à celui de l\'univers traditionnel de DC Comics. L\'histoire repose sur une uchronie introduite par le Dr Manhattan, un être presque omniscient et omnipotent, issu d\'un accident nucléaire en 1960. Alors que les autres justiciers masqués de la série sont des hommes ordinaires souvent dépassés par leur propre statut et dont la légitimité est fortement remise en cause, le Dr Manhattan représente l\'arme absolue et permet aux États-Unis de remporter la guerre du Viêt Nam, permettant à Richard Nixon d\'être réélu sans discontinuité depuis 1968 jusqu\'au début du récit, en 1985. Alors que la guerre froide atteint son paroxysme et que l\'ombre d\'une guerre nucléaire menace, le Comédien, un ancien super-héros, est mystérieusement assassiné. Dernier justicier encore actif, Rorschach décide de mener l\'enquête dans cet univers oppressant et dystopique.\r\n\r\nPubliée mensuellement par DC Comics de 1986 à 1987, Watchmen est immédiatement un succès commercial et critique. La série obtient de nombreuses récompenses, notamment en 1988 où elle devient le premier roman graphique à remporter le Prix Hugo.', 1, '2025-11-13 17:21:59', '2025-11-14 21:40:22'),
(20, 16, 'Berserk - Tome 1', 'Kentarō Miura', 'berserk-tome-1-miura-16.webp', 'Berserk (ベルセルク, Beruseruku) est une série japonaise de mangas écrite et dessinée par Kentarō Miura. Le manga est prépublié depuis 1989 dans les magazines Monthly Animal House puis Young Animal de l\'éditeur Hakusensha, et 43 volumes sont sortis en août 2025. La version française est éditée par Glénat et 42 tomes sont sortis à la date de juillet 2024. Après la mort de Miura en mai 2021, la série reprend la publication en juin 2022 sous la supervision de son ami d\'enfance Kōji Mori et du groupe d\'assistants et d\'apprentis de Miura du Studio Gaga.\r\n\r\nSitué dans un monde de dark fantasy inspiré de l’Europe médiévale, l\'histoire est centrée sur les personnages de Guts, un mercenaire solitaire, et de Griffith, le chef d\'un groupe de mercenaires appelé la « Troupe du Faucon ». Le manga est adapté en série d\'animation de 25 épisodes entre octobre 1997 et mars 1998 par le studio OLM. Une trilogie de films d\'animation produite par Studio 4°C est sortie entre 2012 et 2013. Une nouvelle adaptation animée par les studios GEMBA et Millepensee est diffusée entre juillet 2016 et juin 2017.\r\n\r\nEn mai 2021, le tirage de la série s\'élève à plus de 55 millions d\'exemplaires en circulation, versions numériques comprises, ce qui classe l\'œuvre parmi les mangas les plus vendus. En 2002, Berserk reçoit le prix de l\'excellence lors du 6e Prix culturel Osamu-Tezuka.', 1, '2025-11-13 17:25:32', '2025-11-19 14:05:35');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `author_id`, `receiver_id`, `content`, `created_at`, `is_read`) VALUES
(1, 6, 16, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2025-08-15 18:47:36', 0),
(2, 14, 16, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2025-08-20 18:47:36', 0),
(3, 16, 13, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2025-08-21 15:44:09', 0),
(4, 13, 16, 'Lorem ipsum dolor sit amet, consectetur .adipiscing elit, sed do eiusmod tempor', '2025-08-21 15:48:09', 0);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nickname`, `email`, `password`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Lotrfanclub67', 'lotrfanclub67@mail.com', '$2y$10$ZpvJtCoAQul2yxln2rPrCu7MqegxG03Ap8isQz5w47oEYFyJjwI2C', NULL, '2025-10-28 17:03:52', '2025-11-04 13:44:11'),
(2, 'Victoirefabr912', 'victoirefabr912@mail.com', '$2y$10$lUhpLYXTxAMoUJW3vkUuIe1NlaPYw/a0jeQDIzOtCiJqzmaCIaW3O', NULL, '2025-10-28 17:03:52', '2025-11-04 13:44:02'),
(3, 'AnnikaBrahms', 'annikabrahms@mail.com', '$2y$10$4zZKXbC14Kyo9BJgVyR/oeavYR3nS/jzaOVXqLsJMD0Ns9emxxD5C', NULL, '2025-10-28 17:03:52', '2025-11-04 13:43:54'),
(4, 'Verogo33', 'verogo33@mail.com', '$2y$10$DPtlQI360LISeMz2suomruFCPJXgCG9mDTVP3E4hRahzPEtByAwCa', NULL, '2025-10-28 17:03:52', '2025-11-04 13:43:46'),
(5, 'ML95', 'ml95@mail.com', '$2y$10$KCQpqdIW.LK93vP3wb57U.7ii1/KhVq0aBY/uwe9XEvDQ9q5o4Nnm', NULL, '2025-10-28 17:03:52', '2025-11-04 13:43:36'),
(6, 'Sas634', 'sas634@mail.com', '$2y$10$zv.EN6Sn18sif5eZgO.qjeGnywanPLHYWlJF.w0yO6JRb3u.9tOAG', 'avatar6.webp', '2025-10-28 17:03:52', '2025-11-10 10:01:18'),
(7, 'Lolobzh', 'lolobzh@mail.com', '$2y$10$S54p1QSxMikf0bHmBvJH0.gpojA67pBlvI3y56.jO9vo4hwSTEYte', NULL, '2025-10-28 17:03:52', '2025-11-04 13:43:12'),
(8, 'Lou&Ben50', 'louetben50@mail.com', '$2y$10$tpDz.n7WnQmmhlJgWX5cn.pLZpT729gyXUjSuTHXlXsIg4xadgwL6', NULL, '2025-10-28 17:03:52', '2025-11-04 13:43:04'),
(9, 'Hamzalecture', 'hamza@mail.com', '$2y$10$7gWED3cPOlH2Dy6x1ihj/up8VDzqejLq.UbvrjUEXHoefRl392Kt2', NULL, '2025-10-28 17:03:52', '2025-11-04 13:42:53'),
(10, 'Christiane75014', 'christiane75014@mail.com', '$2y$10$iaH9YPQ7mYkqyX6WBMqDW.qNH43xdYdH75K1smo.sWZWg137n7i52', NULL, '2025-10-28 17:03:52', '2025-11-04 13:42:44'),
(11, 'Juju1432', 'juju1432@mail.com', '$2y$10$xu3jvuQfSMTxLV86MQIfBeGmYKAj5wDV6tKUblZX9P063dB5D0eZm', NULL, '2025-10-28 17:03:52', '2025-11-04 13:42:36'),
(12, 'Hugo1990_12', 'hugo1990_12@mail.com', '$2y$10$KOXrSmKP28D5z0Co7RFMr.t7aMsBebgdl3C1XF8T4NgxeFjjdIvA6', NULL, '2025-10-28 17:03:52', '2025-11-04 13:42:17'),
(13, 'Alexlecture', 'alex@mail.com', '$2y$10$tyWTp9BnxPKzl4aEMumkXOzOk/V7gDl4Cd3YPMpwfqD47orochIH.', 'avatar13.webp', '2025-10-28 17:03:52', '2025-11-10 10:01:07'),
(14, 'Nathalire', 'nathalie@mail.com', '$2y$10$qQsqUr6tNncL7190AQtISOs9R2NTd9wIqy/jdRMtcwWg2Y.mNFQOm', 'avatar14.webp', '2025-10-28 17:03:52', '2025-11-10 10:00:57'),
(15, 'CamilleClubLit', 'camille@mail.com', '$2y$10$d51SUnKhBR44.iFoHxmxu.oiGXSmAY2Bq9AZHxUQdko.zwbL9gQZ2', NULL, '2025-10-28 17:03:52', '2025-11-04 13:41:41'),
(16, 'Davread', 'dave@mail.com', '$2y$10$IJn.Bcr2fOu/eHZIyW1z9OYJNZdlvL5nM0Tsa4Lr4Z0VXw2xYR.9W', 'avatar16.webp', '2025-11-05 15:17:59', '2025-11-07 18:36:45');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_book_user_id` (`user_id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_message_author_id` (`author_id`),
  ADD KEY `fk_message_receiver_id` (`receiver_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_book_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_message_author_id` FOREIGN KEY (`author_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `fk_message_receiver_id` FOREIGN KEY (`receiver_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
