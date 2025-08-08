ALTER TABLE `candidats` 
ADD COLUMN `specialite_dernier_diplome` VARCHAR(128) NULL AFTER `diplome_requis`,
ADD COLUMN `etablissement_obtention` VARCHAR(128) NULL AFTER `specialite_dernier_diplome`,
ADD COLUMN `niveau_connaissance_fp` VARCHAR(50) NULL AFTER `howDidYouKnewUs`,
ADD COLUMN `motivation_pssfp` VARCHAR(255) NULL AFTER `niveau_connaissance_fp`,
ADD COLUMN `utilite_formation` VARCHAR(255) NULL AFTER `motivation_pssfp`,
ADD COLUMN `domaines_interet_fp` VARCHAR(255) NULL AFTER `utilite_formation`;

ALTER TABLE `candidats` MODIFY COLUMN `a_depose` TINYINT(1) DEFAULT 0;

-- Script SQL pour mettre à jour la structure de la base de données epole_candi_p12_2024
-- Ajout des champs manquants pour correspondre aux formulaires mis à jour
-- Date: 03-08-2025

-- 1. Ajout des nouveaux champs liés au diplôme
ALTER TABLE `candidats`
    ADD COLUMN `dernier_diplome_intitule` VARCHAR(255) NULL COMMENT 'Intitulé exact du dernier diplôme' AFTER `dernier_diplome`,
    ADD COLUMN `dernier_diplome_specialite` VARCHAR(255) NULL COMMENT 'Spécialité/Filière du diplôme' AFTER `dernier_diplome_intitule`,
    ADD COLUMN `dernier_diplome_domaine` VARCHAR(100) NULL COMMENT 'Domaine principal du diplôme' AFTER `dernier_diplome_specialite`,
    ADD COLUMN `dernier_diplome_autre_domaine` VARCHAR(255) NULL COMMENT 'Précision si domaine = Autre' AFTER `dernier_diplome_domaine`,
    ADD COLUMN `dernier_diplome_etablissement` VARCHAR(255) NULL COMMENT 'Établissement d\'obtention du diplôme' AFTER `dernier_diplome_autre_domaine`,
    ADD COLUMN `dernier_diplome_pays` INT NULL COMMENT 'ID du pays de l\'établissement' AFTER `dernier_diplome_etablissement`,
    ADD COLUMN `dernier_diplome_annee` INT NULL COMMENT 'Année d\'obtention du diplôme' AFTER `dernier_diplome_pays`,
    ADD COLUMN `dernier_diplome_niveau` VARCHAR(50) NULL COMMENT 'Niveau académique (BAC+3, BAC+4, etc.)' AFTER `dernier_diplome_annee`,
    ADD COLUMN `dernier_diplome_mention` VARCHAR(50) NULL COMMENT 'Mention obtenue' AFTER `dernier_diplome_niveau`;

-- 2. Ajout des nouveaux champs professionnels
ALTER TABLE `candidats`
    ADD COLUMN `autre_statut_prof` VARCHAR(255) NULL COMMENT 'Précision si statut = Autre' AFTER `statut_prof`,
    ADD COLUMN `poste_actuel` VARCHAR(255) NULL COMMENT 'Poste occupé actuellement' AFTER `email_structure`,
    ADD COLUMN `date_debut_poste` VARCHAR(20) NULL COMMENT 'Date de début du poste actuel' AFTER `poste_actuel`,
    ADD COLUMN `lien_finances_publiques` VARCHAR(50) NULL COMMENT 'Lien du poste avec les finances publiques' AFTER `date_debut_poste`,
    ADD COLUMN `explication_lien_partiel` TEXT NULL COMMENT 'Explication si lien partiel' AFTER `lien_finances_publiques`,
    ADD COLUMN `total_annees_experience` DECIMAL(5,1) NULL COMMENT 'Nombre total d\'années d\'expérience' AFTER `explication_lien_partiel`;

-- 3. Ajout du champ pour le détail de la source d'information
ALTER TABLE `candidats`
    ADD COLUMN `howDidYouKnewUs_autre` VARCHAR(255) NULL COMMENT 'Précision si source = Autre' AFTER `howDidYouKnewUs`;

-- 4. Suppression des champs qui ne sont plus utilisés dans le formulaire
ALTER TABLE `candidats`
    DROP COLUMN `specialite_requise`,
    DROP COLUMN `diplome_requis`,
    DROP COLUMN `annee_optention_diplome`,
    DROP COLUMN `diplome_obtenu_a`,
    DROP COLUMN `dernier_diplome`,
    DROP COLUMN `nombre_annee_etude_sup`;

-- 5. Création d'index pour améliorer les performances
CREATE INDEX idx_candidats_diplome_pays ON candidats(dernier_diplome_pays);
CREATE INDEX idx_candidats_specialite ON candidats(id_specialite);
CREATE INDEX idx_candidats_pays ON candidats(id_pays);
CREATE INDEX idx_candidats_email ON candidats(email);

-- 6. Mise à jour des vues pour inclure les nouveaux champs
DROP VIEW IF EXISTS `candidature2024`;
CREATE VIEW `candidature2024` AS
SELECT
    c.*,
    s.nom AS specialite,
    p.nom AS pays
FROM
    candidats c
    JOIN pays p ON c.id_pays = p.id
    JOIN specialite s ON c.id_specialite = s.id
WHERE
    c.a_depose = 1;

DROP VIEW IF EXISTS `candidatureFull2023`;
CREATE VIEW `candidatureFull2023` AS
SELECT
    c.*,
    p.nom AS pays,
    s.nom AS specialite
FROM
    candidats c
    JOIN specialite s ON c.id_specialite = s.id
    JOIN pays p ON c.id_pays = p.id;


--
-- Structure de la table `regions`
--

CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id`, `nom`) VALUES
(1, 'Adamaoua'),
(2, 'Centre'),
(3, 'Est'),
(4, 'Extrême-Nord'),
(5, 'Littoral'),
(6, 'Nord'),
(7, 'Nord-Ouest'),
(8, 'Ouest'),
(9, 'Sud'),
(10, 'Sud-Ouest');

-- --------------------------------------------------------

--
-- Structure de la table `departements`
--

CREATE TABLE `departements` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `region_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `departements`
--

INSERT INTO `departements` (`id`, `nom`, `region_id`) VALUES
-- Adamaoua
(1, 'Djérem', 1),
(2, 'Faro-et-Déo', 1),
(3, 'Mayo-Banyo', 1),
(4, 'Mbéré', 1),
(5, 'Vina', 1),
-- Centre
(6, 'Haute-Sanaga', 2),
(7, 'Lekié', 2),
(8, 'Mbam-et-Inoubou', 2),
(9, 'Mbam-et-Kim', 2),
(10, 'Méfou-et-Afamba', 2),
(11, 'Méfou-et-Akono', 2),
(12, 'Mfoundi', 2),
(13, 'Nyong-et-Kéllé', 2),
(14, 'Nyong-et-Mfoumou', 2),
(15, 'Nyong-et-So''o', 2),
-- Est
(16, 'Boumba-et-Ngoko', 3),
(17, 'Haut-Nyong', 3),
(18, 'Kadey', 3),
(19, 'Lom-et-Djérem', 3),
-- Extrême-Nord
(20, 'Diamaré', 4),
(21, 'Logone-et-Chari', 4),
(22, 'Mayo-Danay', 4),
(23, 'Mayo-Kani', 4),
(24, 'Mayo-Sava', 4),
(25, 'Mayo-Tsanaga', 4),
-- Littoral
(26, 'Moungo', 5),
(27, 'Nkam', 5),
(28, 'Sanaga-Maritime', 5),
(29, 'Wouri', 5),
-- Nord
(30, 'Bénoué', 6),
(31, 'Faro', 6),
(32, 'Mayo-Louti', 6),
(33, 'Mayo-Rey', 6),
-- Nord-Ouest
(34, 'Boyo', 7),
(35, 'Bui', 7),
(36, 'Donga-Mantung', 7),
(37, 'Menchum', 7),
(38, 'Mezam', 7),
(39, 'Momo', 7),
(40, 'Ngo-Ketunjia', 7),
-- Ouest
(41, 'Bamboutos', 8),
(42, 'Haut-Nkam', 8),
(43, 'Hauts-Plateaux', 8),
(44, 'Koung-Khi', 8),
(45, 'Ménoua', 8),
(46, 'Mifi', 8),
(47, 'Ndé', 8),
(48, 'Noun', 8),
-- Sud
(49, 'Dja-et-Lobo', 9),
(50, 'Mvila', 9),
(51, 'Océan', 9),
(52, 'Vallée-du-Ntem', 9),
-- Sud-Ouest
(53, 'Fako', 10),
(54, 'Koupé-Manengouba', 10),
(55, 'Lebialem', 10),
(56, 'Manyu', 10),
(57, 'Meme', 10),
(58, 'Ndian', 10);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `departements`
--
ALTER TABLE `departements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `region_id` (`region_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `departements`
--
ALTER TABLE `departements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `departements`
--
ALTER TABLE `departements`
  ADD CONSTRAINT `departements_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`);
COMMIT;
ALTER TABLE candidats ADD COLUMN nombre_annee_etude_sup INT;
ALTER TABLE candidats ADD COLUMN dernier_diplome VARCHAR(255);
ALTER TABLE candidats ADD COLUMN specialite_requise VARCHAR(255);
ALTER TABLE candidats ADD COLUMN annee_optention_diplome VARCHAR(255);
ALTER TABLE candidats ADD COLUMN diplome_obtenu_a VARCHAR(255);

