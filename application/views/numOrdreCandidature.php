<div class="success-container">
    <div class="success-card">
        <div class="success-header">
            <h2>Confirmation de votre candidature</h2>
            <p class="subtitle">Master Professionnel en Finances Publiques</p>
        </div>
        
        <?php if (isset($message)): ?>
            <div class="alert-message"><?= $message ?></div>
        <?php endif; ?>
        
        <div class="success-content">
            <?php 
            $succes = $this->session->flashdata('succes');
            if (isset($succes) && $succes != ''): 
                $id = $this->session->flashdata('id');
                $numordre = $this->session->flashdata('numordre');
                $phone = $this->session->flashdata('telephone');
                $email = $this->session->flashdata('email');
            ?>
                <div class="success-intro">
                    <div class="icon-circle">
                        <i class="icon-check"></i>
                    </div>
                    <h3>Votre candidature a été enregistrée avec succès</h3>
                    <p>Conservez précieusement les informations ci-dessous pour accéder à votre espace candidat et suivre l'évolution de votre dossier.</p>
                </div>
                
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Numéro de dossier</div>
                        <div class="info-value"><?= $numordre ?></div>
                        <div class="info-description">Votre identifiant unique</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Contact téléphonique</div>
                        <div class="info-value"><?= $phone ?></div>
                        <div class="info-description">Pour toute communication</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">Adresse email</div>
                        <div class="info-value"><?= $email ?></div>
                        <div class="info-description">Pour les notifications</div>
                    </div>
                </div>
                
                <div class="next-steps">
                    <h4>Prochaines étapes :</h4>
                    <ol>
                        <li>Téléchargez votre fiche de candidature</li>
                        <li>Consultez régulièrement votre email pour les mises à jour</li>
                        <li>Préparez les documents originaux pour éventuelle vérification</li>
                    </ol>
                </div>
                
                <div class="action-buttons">
                    <a href="<?= base_url() ?>index.php/impression/imprimer_fiche/<?= $id ?>" class="btn-download">
                        <i class="icon-download"></i> Télécharger ma fiche de candidature
                    </a>
                    <a href="/" class="btn-secondary">
                        <i class="icon-home"></i> Retour à l'accueil
                    </a>
                </div>
                
                <div class="support-info">
                    <p><strong>Besoin d'aide ?</strong> Contactez le service des admissions :<br>
                    <i class="icon-phone"></i> (+237) 697 921 332 - <i class="icon-mail"></i> info@pfinancespubliques.org</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    :root {
        --success-color: #28a745;
        --success-light: #e6f7eb;
        --success-dark: #218838;
        --secondary-color: #6c757d;
        --text-color: #333;
        --text-light: #6c757d;
        --border-color: #e9ecef;
        --white: #fff;
        --shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        --transition: all 0.3s ease;
    }

    .success-container {
        max-width: 800px;
        margin: 40px auto;
        padding: 0 20px;
    }

    .success-card {
        background: var(--white);
        border-radius: 12px;
        box-shadow: var(--shadow);
        overflow: hidden;
    }

    .success-header {
        background: var(--success-color);
        color: var(--white);
        padding: 25px;
        text-align: center;
        border-bottom: 4px solid var(--success-dark);
    }

    .success-header h2 {
        margin: 0 0 5px 0;
        font-size: 1.8rem;
        font-weight: 600;
        color:#fff
    }

    .subtitle {
        margin: 0;
        font-size: 1.1rem;
        opacity: 0.9;
    }

    .alert-message {
        background: #f8d7da;
        color: #721c24;
        padding: 12px 20px;
        margin: 20px;
        border-radius: 6px;
        border-left: 4px solid #f5c6cb;
        font-size: 0.95rem;
    }

    .success-content {
        padding: 30px;
    }

    .success-intro {
        text-align: center;
        margin-bottom: 30px;
        padding-bottom: 20px;
        border-bottom: 1px solid var(--border-color);
    }

    .icon-circle {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        background: var(--success-light);
        border-radius: 50%;
        margin-bottom: 15px;
    }

    .icon-circle i {
        font-size: 1.8rem;
        color: var(--success-color);
    }

    .success-intro h3 {
        color: var(--success-color);
        margin: 10px 0 15px 0;
        font-size: 1.4rem;
    }

    .success-intro p {
        color: var(--text-light);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin: 40px 0;
    }

    .info-item {
        background: var(--white);
        border-radius: 8px;
        padding: 20px;
        border: 1px solid var(--border-color);
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        transition: var(--transition);
    }

    .info-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .info-label {
        font-weight: 600;
        color: var(--success-dark);
        margin-bottom: 8px;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
    }

    .info-value {
        font-size: 1.3rem;
        color: var(--text-color);
        word-break: break-all;
        margin-bottom: 5px;
        font-weight: 500;
    }

    .info-description {
        font-size: 0.85rem;
        color: var(--text-light);
        margin-top: 5px;
    }

    .next-steps {
        background: var(--success-light);
        padding: 20px;
        border-radius: 8px;
        margin: 30px 0;
    }

    .next-steps h4 {
        color: var(--success-dark);
        margin-top: 0;
        margin-bottom: 15px;
        font-size: 1.1rem;
    }

    .next-steps ol {
        padding-left: 20px;
        margin: 0;
    }

    .next-steps li {
        margin-bottom: 8px;
        line-height: 1.5;
    }

    .action-buttons {
        display: flex;
        justify-content: center;
        gap: 15px;
        margin: 40px 0 30px 0;
        flex-wrap: wrap;
    }

    .btn-download {
        display: inline-flex;
        align-items: center;
        background: var(--success-color);
        color: var(--white);
        padding: 12px 25px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
        transition: var(--transition);
    }

    .btn-download:hover {
        background: var(--success-dark);
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
        transform: translateY(-2px);
    }

    .btn-secondary {
        display: inline-flex;
        align-items: center;
        background: var(--secondary-color);
        color: var(--white);
        padding: 12px 25px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: 500;
        transition: var(--transition);
    }

    .btn-secondary:hover {
        background: #5a6268;
        box-shadow: 0 4px 12px rgba(108, 117, 125, 0.3);
    }

    .action-buttons i {
        margin-right: 8px;
    }

    .support-info {
        text-align: center;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 1px solid var(--border-color);
    }

    .support-info p {
        color: var(--text-light);
        font-size: 0.9rem;
        line-height: 1.6;
        margin: 0;
    }

    .support-info strong {
        color: var(--text-color);
    }

    .support-info i {
        margin-right: 5px;
    }

    @media (max-width: 768px) {
        .success-header {
            padding: 20px 15px;
        }
        
        .success-header h2 {
            font-size: 1.5rem;
        }
        
        .subtitle {
            font-size: 1rem;
        }
        
        .success-content {
            padding: 20px;
        }
        
        .action-buttons {
            flex-direction: column;
            gap: 10px;
        }
        
        .btn-download, .btn-secondary {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .info-grid {
            grid-template-columns: 1fr;
        }
    }
</style>