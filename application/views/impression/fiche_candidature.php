<html lang="fr">
<head>
    <style>
        @page {
            margin: 25px;
        }
        body {
            font-family: sans-serif;
            font-size: 11px;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .filigrane {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-40deg);
            font-size: é0px;
            font-weight: 800;
            color: rgba(0, 0, 0, 0.08);
            z-index: -1000;
        }
        .header-table {
            width: 100%;
            padding-bottom: 5px;
        }
        .header-left, .header-right {
            font-size: 9px;
            text-align: center;
            width: 38%;
            line-height: 1.3;
        }
        .header-middle {
            width: 24%;
            text-align: center;
        }
        .header-middle img {
            width: 90px;
        }
        .main-title {
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;
        }
        .main-title h1 {
            font-size: 25px;
            color: #4a0e6c;
            margin: 0;
        }
        .main-title p {
            font-size: 11px;
            margin: 2px 0;
        }
        .photo-box {
            position: absolute;
            top: 200px;
            right: 30px;
            border: 1px solid #ccc;
            width: 120px;
            height: 90px;
            text-align: center;
            font-size: 10px;
            color: #999;
            padding-top: 50px;
        }
        .section {
            margin-bottom: 12px;
            clear: both;
        }
        .section-title {
            background: #f0e6f7;
            border-left: 4px solid #6a0dad;
            padding: 5px 10px;
            font-weight: bold;
            color: #333;
            margin-bottom: 8px;
            font-size: 11px;
        }
        .inf-grid {
            margin : 10px;
        }
        .inf-row {
            margin-bottom: 5px;
            padding-left: 10px;
            width: 100%;
        }
        .inf-row.half {
            width: 48%;
        }
        .inf-label {
            display: inline-block;
            width: 35%;
            font-weight: 800;
            vertical-align: top;
            color: #111;
			margin-right: 10px;
        }
        .inf-value {
            display: inline-block;
            width: 60%;
        }
        .footer {
            font-size: 8px;
            text-align: center;
            color: #666;
            position: fixed;
            bottom: 0px;
            left: 25px;
            right: 25px;
            padding-bottom: 25px;
        }
        .footer p {
            margin: 0;
        }
        .page-break {
            page-break-after: always;
        }
        .engagement-section {
            margin-top: 20px;
            font-size: 9px;
            text-align: justify;
        }
        .signature-area {
            margin-top: 30px;
        }
        .signature-line {
            display: inline-block;
            width: 200px;
            text-align: center;
        }
    </style>
</head>
<body>

<!-- Wrapper for each copy -->
<div class="page-wrapper">
     <div class="filigrane">COPIE CANDIDAT</div>

    <table class="header-table">
        <tr>
            <td class="header-left">
                REPUBLIQUE DU CAMEROUN <br> Paix- Travail- Patrie<br> MINISTERE DES FINANCES<br> SECRETARIAT GENERAL<br> PROGRAMME SUPERIEUR DE SPECIALISATION <br> EN FINANCES PUBLIQUES
            </td>
            <td class="header-middle">
                <img src="<?= base_url() ?>resources/assets/images/logo.png" alt="Logo">
            </td>
            <td class="header-right">
                REPUBLIC OF CAMEROON<br> Peace- Work- Fatherland<br> MINISTRY OF FINANCE<br> GENERAL SECRETARIAT<br> ADVANCED PROGRAM OF SPECIALISATION<br> IN PUBLIC FINANCE
            </td>
        </tr>
    </table>

    <div class="main-title">
        <h1>MASTER EN FINANCES PUBLIQUES</h1>
        <p>FICHE D'INSCRIPTION (Promotion 13)</p>
        <p>N° de candidature : <strong><?php echo $candidat->ordre_candidature; ?></strong></p>
    </div>

    <div class="photo-box">
        Photo 4x4
    </div>
    <div class="section">
        <div class="section-title">Etat Civil</div>
        <div class="inf-grid">
            <div class="inf-row half"><span class="inf-label">Civilité:</span><span class="inf-value"><?php echo $candidat->civilite; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Nom complet:</span><span class="inf-value"><?php echo $candidat->nom . ' ' . $candidat->prenom; ?></span></div>
            <?php if (!empty($candidat->epouse)): ?>
            <div class="inf-row half"><span class="inf-label">&Eacute;pouse:</span><span class="inf-value"><?php echo $candidat->epouse; ?></span></div>
            <?php endif; ?>
            <div class="inf-row half"><span class="inf-label">Date & lieu de naissance:</span><span class="inf-value"><?php echo date('d/m/Y', strtotime($candidat->date_naissance)) . ' à ' . $candidat->lieu_de_naissce; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Nationalité:</span><span class="inf-value"><?php echo $candidat->nationalite; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Statut matrimonial:</span><span class="inf-value"><?php echo $candidat->statu_matrimonial; ?></span></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Spécialité</div>
        <div class="inf-grid">
            <div class="inf-row half"><span class="inf-label">Spécialité:</span><span class="inf-value"><?php echo $candidat->specialite; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Type de formation:</span><span class="inf-value"><?php echo $candidat->type_etude; ?></span></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Coordonnées</div>
        <div class="inf-grid">
            <div class="inf-row half">
				<span class="inf-label">Adresse:</span>
				<span class="inf-value"><?php echo $candidat->adresse_candidat; ?></span>
			</div>
            <div class="inf-row half"><span class="inf-label">Ville de résidence:</span><span class="inf-value"><?php echo $candidat->ville_residence; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Téléphone (WhatsApp):</span><span class="inf-value"><?php echo $candidat->telephone; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Téléphone (Secondaire):</span><span class="inf-value"><?php echo $candidat->telephone2 ?: '-'; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Email:</span><span class="inf-value"><?php echo $candidat->email; ?></span></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Etude Supérieure</div>
        <div class="inf-grid">
            <div class="inf-row half"><span class="inf-label">Dernier diplome:</span><span class="inf-value"><?php echo $candidat->dernier_diplome; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Spécialité/Filière:</span><span class="inf-value"><?php echo $candidat->specialite_dernier_diplome; ?></span></div>
            <!--<div class="inf-row half"><span class="inf-label">Niveau:</span><span class="inf-value"><?php echo $candidat->dernier_diplome_niveau; ?></span></div>-->
            <div class="inf-row half"><span class="inf-label">Établissement:</span><span class="inf-value"><?php echo $candidat->etablissement_obtention; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Année d'obtention:</span><span class="inf-value"><?php echo $candidat->annee_optention_diplome; ?></span></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Coordonnées Professionnelle</div>
        <div class="inf-grid">
            <div class="inf-row half"><span class="inf-label">Statut:</span><span class="inf-value"><?php echo $candidat->statut_prof; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Expérience (années):</span><span class="inf-value"><?php echo $candidat->total_annees_experience ?: 'Non spécifié'; ?></span></div>
            <?php if ($candidat->statut_prof !== 'Étudiant / en recherche d\'emploi' && $candidat->statut_prof !== 'Etudiant'): ?>
            <div class="inf-row half"><span class="inf-label">Employeur:</span><span class="inf-value"><?php echo $candidat->structure; ?></span></div>
           <!-- <div class="inf-row"><span class="inf-label">Poste occupé:</span><span class="inf-value"><?php echo $candidat->poste_actuel; ?></span></div>
            <div class="inf-row"><span class="inf-label">Lien avec les FP:</span><span class="inf-value"><?php echo $candidat->lien_finances_publiques; ?></span></div>
            <?php endif; ?>-->
        </div>
    </div>

    <div class="section engagement-section">
		<div class="section-title">Engagement</div>
        <p style="font-size : 13px">
            Je soussigné(e), <strong><?php echo $candidat->nom . ' ' . $candidat->prenom; ?></strong>, certifie sur l'honneur l'exactitude des renseignements consignés dans cette fiche et avoir pris connaissance des conditions d'admission au programme.
        </p>
    </div>

    <div class="signature-area" style="margin-top: 1px; text-align: right">
        <div style="width: 100%; text-align: right; margin-bottom: 25px;">Fait à ____________________, le ____/____/________</div>
        <div style="float: left; width: 50%; text-align: center;">
            <strong>Signature du candidat</strong>
        </div>
        <div style="float: right; width: 50%; text-align: center;">
            <strong>Cachet et visa du PSSFP</strong>
        </div>
    </div>

</div>

<div class="footer">
    <p>Plateforme PSSFP – © <?php echo date('Y'); ?> – Tous droits réservés - Généré le <?php echo date('d/m/Y à H:i'); ?></p>
    <p style="font-size:7px;">B.P: 16 578 Yaoundé – Cameroun | Tel.: +237 697 92 13 32 / 242 22 76 81 | Web: www.pfinancespubliques.org | E-Mail: inf@pfinancespubliques.org</p>
</div>

<!-- Saut de page pour la copie administration -->
<div class="page-break"></div>

<!-- Deuxième page - Copie Administration -->
<div class="page-wrapper">
    <div class="filigrane">COPIE ADMINISTRATION</div>

    <table class="header-table">
        <tr>
            <td class="header-left">
                REPUBLIQUE DU CAMEROUN <br> Paix- Travail- Patrie<br> MINISTERE DES FINANCES<br> SECRETARIAT GENERAL<br> PROGRAMME SUPERIEUR DE SPECIALISATION <br> EN FINANCES PUBLIQUES
            </td>
            <td class="header-middle">
                <img src="<?= base_url() ?>resources/assets/images/logo.png" alt="Logo">
            </td>
            <td class="header-right">
                REPUBLIC OF CAMEROON<br> Peace- Work- Fatherland<br> MINISTRY OF FINANCE<br> GENERAL SECRETARIAT<br> ADVANCED PROGRAM OF SPECIALISATION<br> IN PUBLIC FINANCE
            </td>
        </tr>
    </table>

    <div class="main-title">
        <h1>MASTER EN FINANCES PUBLIQUES</h1>
        <p>FICHE D'INSCRIPTION (Promotion 13)</p>
        <p>N° de candidature : <strong><?php echo $candidat->ordre_candidature; ?></strong></p>
    </div>

    <div class="photo-box">
        Photo 4x4
    </div>
    <div class="section">
        <div class="section-title">Etat Civil</div>
        <div class="inf-grid">
            <div class="inf-row half"><span class="inf-label">Civilité:</span><span class="inf-value"><?php echo $candidat->civilite; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Nom complet:</span><span class="inf-value"><?php echo $candidat->nom . ' ' . $candidat->prenom; ?></span></div>
            <?php if (!empty($candidat->epouse)): ?>
            <div class="inf-row half"><span class="inf-label">&Eacute;pouse:</span><span class="inf-value"><?php echo $candidat->epouse; ?></span></div>
            <?php endif; ?>
            <div class="inf-row half"><span class="inf-label">Date & lieu de naissance:</span><span class="inf-value"><?php echo date('d/m/Y', strtotime($candidat->date_naissance)) . ' à ' . $candidat->lieu_de_naissce; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Nationalité:</span><span class="inf-value"><?php echo $candidat->nationalite; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Statut matrimonial:</span><span class="inf-value"><?php echo $candidat->statu_matrimonial; ?></span></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Spécialité</div>
        <div class="inf-grid">
            <div class="inf-row half"><span class="inf-label">Spécialité:</span><span class="inf-value"><?php echo $candidat->specialite; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Type de formation:</span><span class="inf-value"><?php echo $candidat->type_etude; ?></span></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Coordonnées</div>
        <div class="inf-grid">
            <div class="inf-row half">
				<span class="inf-label">Adresse:</span>
				<span class="inf-value"><?php echo $candidat->adresse_candidat; ?></span>
			</div>
            <div class="inf-row half"><span class="inf-label">Ville de résidence:</span><span class="inf-value"><?php echo $candidat->ville_residence; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Téléphone (WhatsApp):</span><span class="inf-value"><?php echo $candidat->telephone; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Téléphone (Secondaire):</span><span class="inf-value"><?php echo $candidat->telephone2 ?: '-'; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Email:</span><span class="inf-value"><?php echo $candidat->email; ?></span></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Etude Supérieure</div>
        <div class="inf-grid">
            <div class="inf-row half"><span class="inf-label">Dernier diplome:</span><span class="inf-value"><?php echo $candidat->dernier_diplome; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Spécialité/Filière:</span><span class="inf-value"><?php echo $candidat->specialite_dernier_diplome; ?></span></div>
            <!--<div class="inf-row half"><span class="inf-label">Niveau:</span><span class="inf-value"><?php echo $candidat->dernier_diplome_niveau; ?></span></div>-->
            <div class="inf-row half"><span class="inf-label">Établissement:</span><span class="inf-value"><?php echo $candidat->etablissement_obtention; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Année d'obtention:</span><span class="inf-value"><?php echo $candidat->annee_optention_diplome; ?></span></div>
        </div>
    </div>

    <div class="section">
        <div class="section-title">Coordonnées Professionnelle</div>
        <div class="inf-grid">
            <div class="inf-row half"><span class="inf-label">Statut:</span><span class="inf-value"><?php echo $candidat->statut_prof; ?></span></div>
            <div class="inf-row half"><span class="inf-label">Expérience (années):</span><span class="inf-value"><?php echo $candidat->total_annees_experience ?: 'Non spécifié'; ?></span></div>
            <?php if ($candidat->statut_prof !== 'Étudiant / en recherche d\'emploi' && $candidat->statut_prof !== 'Etudiant'): ?>
            <div class="inf-row half"><span class="inf-label">Employeur:</span><span class="inf-value"><?php echo $candidat->structure; ?></span></div>
           <!-- <div class="inf-row"><span class="inf-label">Poste occupé:</span><span class="inf-value"><?php echo $candidat->poste_actuel; ?></span></div>
            <div class="inf-row"><span class="inf-label">Lien avec les FP:</span><span class="inf-value"><?php echo $candidat->lien_finances_publiques; ?></span></div>
            <?php endif; ?>-->
        </div>
    </div>

    <div class="section engagement-section">
		<div class="section-title">Engagement</div>
        <p style="font-size : 13px">
            Je soussigné(e), <strong><?php echo $candidat->nom . ' ' . $candidat->prenom; ?></strong>, certifie sur l'honneur l'exactitude des renseignements consignés dans cette fiche et avoir pris connaissance des conditions d'admission au programme.
        </p>
    </div>

    <div class="signature-area" style="margin-top: 1px; text-align: right">
        <div style="width: 100%; text-align: right; margin-bottom: 25px;">Fait à ____________________, le ____/____/________</div>
        <div style="float: left; width: 50%; text-align: center;">
            <strong>Signature du candidat</strong>
        </div>
        <div style="float: right; width: 50%; text-align: center;">
            <strong>Cachet et visa du PSSFP</strong>
        </div>
    </div>

</div>

<div class="footer">
    <p>Plateforme PSSFP – © <?php echo date('Y'); ?> – Tous droits réservés - Généré le <?php echo date('d/m/Y à H:i'); ?></p>
    <p style="font-size:7px;">B.P: 16 578 Yaoundé – Cameroun | Tel.: +237 697 92 13 32 / 242 22 76 81 | Web: www.pfinancespubliques.org | E-Mail: inf@pfinancespubliques.org</p>
</div>

</body>
</html>
