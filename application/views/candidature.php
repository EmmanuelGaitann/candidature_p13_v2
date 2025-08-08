<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize functions when DOM is loaded
        changesoustitre();
        maskepouse();
        
        // Add event listeners for better UX
        document.getElementById('nom').addEventListener('input', changesoustitre);
        document.getElementById('prenom').addEventListener('input', changesoustitre);
        document.getElementById('civilite').addEventListener('change', maskepouse);
        document.getElementById('statu_matrimonial').addEventListener('change', maskepouse);
        
        // Add email confirmation validation
        document.getElementById('emailverif').addEventListener('input', function() {
            const email = document.getElementById('email').value;
            const emailVerif = this.value;
            if (email !== emailVerif) {
                this.setCustomValidity("Les emails ne correspondent pas");
            } else {
                this.setCustomValidity("");
            }
        });
    });

    function changesoustitre() {
        const nom = document.getElementById('nom').value;
        const prenom = document.getElementById('prenom').value;
        document.getElementById('label_sous').textContent = `${nom} ${prenom}`;
    }

    function maskepouse() {
        const civilite = document.getElementById('civilite').value;
        const statuMatrimonial = document.getElementById('statu_matrimonial').value;
        const epouseField = document.getElementById('epouse');
        
        // Show epouse field only for married women
        epouseField.style.display = (civilite !== "Monsieur" && statuMatrimonial === "Marié(e)") ? "block" : "none";
    }
</script>

<div class="form-header">
    <div class="panel-heading" style="background: linear-gradient(135deg, #510AA1, #A735BA)">
        <h2 class="panel-title">Formulaire de Candidature : <span>MASTER EN FINANCES PUBLIQUES</span></h2>
    </div>
</div>

<div class="form-container">
    <div class="form-wrapper">
        <form id="myForm" method="post" class="form-horizontal" action="<?php echo $action; ?>">
            <!-- Section 1: Formation -->
            <fieldset class="form-section">
                <legend><span class="section-number">I</span> Formation</legend>
                
                <div class="form-group">
                    <label for="specialite" class="form-label">Spécialité <span class="required">*</span></label>
                    <select class="form-input" name="specialite" id="specialite" required>
                        <option value="">-- Choisir la Spécialité --</option>
                        <?php foreach ($specialites as $specialite): ?>
                            <option value="<?= $specialite->id ?>" <?= ($specialite->id == $this->form_data->specialite) ? 'selected' : '' ?>>
                                <?= $specialite->nom ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group radio-group">
                    <label class="form-label">Type d'étude <span class="required">*</span></label>
                    <div class="radio-options">
                        <label>
                            <input type="radio" name="type_etude" value="Presentiel" required 
                                <?= (isset($this->form_data->type_etude) && $this->form_data->type_etude === 'Présentiel') ? 'checked' : '' ?>>
                            Présentiel
                        </label>
                        <label>
                            <input type="radio" name="type_etude" value="Distanciel" required 
                                <?= (isset($this->form_data->type_etude) && $this->form_data->type_etude === 'Distanciel') ? 'checked' : '' ?>>
                            Distanciel
                        </label>
                    </div>
                </div>
            </fieldset>

            <!-- Section 2: Identité -->
            <fieldset class="form-section">
                <legend><span class="section-number">II</span> Identité et Informations personnelles</legend>
                
                <div class="form-group">
                    <label for="langue1" class="form-label">Première Langue <span class="required">*</span></label>
                    <select class="form-input" name="langue" id="langue1" required>
                        <option value="">-- Choisir la première langue --</option>
                        <option value="Français" <?= ($this->form_data->langue === "Français") ? "selected" : "" ?>>Français</option>
                        <option value="Anglais" <?= ($this->form_data->langue === "Anglais") ? "selected" : "" ?>>Anglais</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="civilite" class="form-label">Civilité <span class="required">*</span></label>
                    <select class="form-input" name="civilite" id="civilite" required>
                        <option value="">-- Choisir Civilité --</option>
                        <option value="Madame" <?= ($this->form_data->civilite === "Madame") ? "selected" : "" ?>>Madame</option>
                        <option value="Madémoiselle" <?= ($this->form_data->civilite === "Madémoiselle") ? "selected" : "" ?>>Mademoiselle</option>
                        <option value="Monsieur" <?= ($this->form_data->civilite === "Monsieur") ? "selected" : "" ?>>Monsieur</option>
                    </select>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="nom" class="form-label">Nom <em> (surname)</em><span class="required">*</span></label>
                        <input value="<?= set_value('nom', $this->form_data->nom) ?>" 
                            name="nom" placeholder="Nom" class="form-input" id="nom" type="text" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="prenom" class="form-label">Prénom <span class="required">*</span></label>
                        <input value="<?= set_value('prenom', $this->form_data->prenom) ?>" 
                            name="prenom" placeholder="Prénom" class="form-input" id="prenom" type="text" required>
                    </div>
                </div>
                
                <div class="form-group" id="epouse" style="display: none;">
                    <label for="epouse" class="form-label">Nom d'épouse</label>
                    <input value="<?= set_value('epouse', $this->form_data->epouse) ?>" 
                        name="epouse" placeholder="Epouse" class="form-input" id="epouse" type="text">
                </div>
                
                <div class="form-group">
                    <label class="form-label">Date de naissance <span class="required">*</span></label>
                    <div class="date-inputs">
                        <select class="form-input" name="datenaiss_jj" id="datenaiss_jj" required>
                            <option value="">Jour</option>
                            <?php for ($i = 1; $i < 32; $i++): ?>
                                <option value="<?= $i ?>" <?= ($i == $this->form_data->datenaiss_jj) ? 'selected' : '' ?>>
                                    <?= $i ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                        
                        <select class="form-input" name="datenaiss_mm" id="datenaiss_mm" required>
                            <option value="">Mois</option>
                            <?php for ($i = 1; $i < 13; $i++): ?>
                                <option value="<?= $i ?>" <?= ($i == $this->form_data->datenaiss_mm) ? 'selected' : '' ?>>
                                    <?= $i ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                        
                        <select class="form-input" name="datenaiss_yy" id="datenaiss_yy" required>
                            <option value="">Année</option>
                            <?php $x = date('Y'); ?>
                            <?php for ($i = $x - 65; $i < $x - 15; $i++): ?>
                                <option value="<?= $i ?>" <?= ($i == $this->form_data->datenaiss_yy) ? 'selected' : '' ?>>
                                    <?= $i ?>
                                </option>
                            <?php endfor; ?>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="lieu_de_naissce" class="form-label">Lieu de Naissance <span class="required">*</span></label>
                    <input value="<?= set_value('lieu_de_naissce', $this->form_data->lieu_de_naissce) ?>" 
                        name="lieu_de_naissce" placeholder="Ex. Mengueme-SY" class="form-input" id="lieu_de_naissce" type="text" required>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="region_dorigine" class="form-label">Région d'origine <span class="required">*</span></label>
                        <input value="<?= set_value('region_dorigine', $this->form_data->region_dorigine) ?>" 
                            name="region_dorigine" placeholder="Ex. Centre" class="form-input" id="region_dorigine" type="text" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="dept_dorigine" class="form-label">Département d'origine <span class="required">*</span></label>
                        <input value="<?= set_value('dept_dorigine', $this->form_data->dept_dorigine) ?>" 
                            name="dept_dorigine" placeholder="Ex. Nyong et Mfoumou" class="form-input" id="dept_dorigine" type="text" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="nationalite" class="form-label">Nationalité <span class="required">*</span></label>
                    <input value="<?= set_value('nationalite', $this->form_data->nationalite) ?>" 
                        name="nationalite" placeholder="Ex. Camerounaise" class="form-input" id="nationalite" type="text" required>
                </div>
                
                <div class="form-group">
                    <label for="statu_matrimonial" class="form-label">Statut matrimonial <span class="required">*</span></label>
                    <select class="form-input" name="statu_matrimonial" id="statu_matrimonial" required>
                        <option value="">-- Choisir --</option>
                        <option value="Célibataire" <?= ($this->form_data->statu_matrimonial === "Célibataire") ? "selected" : "" ?>>Célibataire</option>
                        <option value="Marié(e)" <?= ($this->form_data->statu_matrimonial === "Marié(e)") ? "selected" : "" ?>>Marié(e)</option>
                        <option value="Veuf(ve)" <?= ($this->form_data->statu_matrimonial === "Veuf(ve)") ? "selected" : "" ?>>Veuf(ve)</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="nombre_enfant" class="form-label">Nombre d'Enfants en charge <span class="required">*</span></label>
                    <input value="<?= set_value('nombre_enfant', $this->form_data->nombre_enfant) ?>" 
                        name="nombre_enfant" placeholder="Nombre d'enfants" class="form-input" id="nombre_enfant" type="number" min="0" required>
                </div>
            </fieldset>

            <!-- Section 3: Contacts -->
            <fieldset class="form-section">
                <legend><span class="section-number">III</span> Contacts du candidat</legend>
                
                <div class="form-group">
                    <label for="paysorigine" class="form-label">Pays d'origine <span class="required">*</span></label>
                    <select name="paysorigine" class="form-input" id="paysorigine" required>
                        <option value="">-- Choisir pays d'origine --</option>
                        <?php foreach ($pays as $pay): ?>
                            <option value="<?= $pay->id ?>" <?= ($pay->id == $this->form_data->paysorigine) ? 'selected' : '' ?>>
                                <?= $pay->nom ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="pays_residence" class="form-label">Pays de résidence <span class="required">*</span></label>
                    <select name="pays_residence" class="form-input" id="pays_residence" required>
                        <option value="">-- Choisir pays de résidence --</option>
                        <?php foreach ($pays as $pay): ?>
                            <option value="<?= $pay->id ?>" <?= ($pay->id == $this->form_data->pays_residence) ? 'selected' : '' ?>>
                                <?= $pay->nom ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="adresse_candidat" class="form-label">Adresse du candidat <span class="required">*</span></label>
                    <input value="<?= set_value('adresse_candidat', $this->form_data->adresse_candidat) ?>" 
                        name="adresse_candidat" placeholder="Ex. BP: 007 Yaoundé" class="form-input" id="adresse_candidat" type="text" required>
                </div>
                
                <div class="form-group">
                    <label for="ville_residence" class="form-label">Ville de résidence <span class="required">*</span></label>
                    <input value="<?= set_value('ville_residence', $this->form_data->ville_residence) ?>" 
                        name="ville_residence" placeholder="Ex. Maroua" class="form-input" id="ville_residence" type="text" required>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="telephone" class="form-label">Téléphone (Whatsapp) <span class="required">*</span></label>
                        <input value="<?= set_value('telephone', $this->form_data->telephone) ?>" 
                            name="telephone" placeholder="2376700000007" class="form-input" id="telephone" type="tel" pattern="[0-9]*" required>
                        <small class="form-hint">Indicateur Pays + N° de téléphone. Exemple: 2376700000007</small>
                    </div>
                    
                    <div class="form-group">
                        <label for="telephone2" class="form-label">Autre Téléphone</label>
                        <input value="<?= set_value('telephone2', $this->form_data->telephone2) ?>" 
                            name="telephone2" placeholder="2376700000007" class="form-input" id="telephone2" type="tel" pattern="[0-9]*">
                        <small class="form-hint">Indicateur Pays + N° de téléphone. Exemple: 2376700000007</small>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="email" class="form-label">Email Personnel <span class="required">*</span></label>
                        <input value="<?= set_value('email', $this->form_data->email) ?>" 
                            name="email" placeholder="exemple@site.com" class="form-input" id="email" type="email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="emailverif" class="form-label">Confirmez votre email <span class="required">*</span></label>
                        <input value="<?= set_value('emailverif', $this->form_data->emailverif) ?>" 
                            name="emailverif" placeholder="exemple@site.com" class="form-input" id="emailverif" type="email" required>
                        <small class="form-hint">Saisissez à nouveau votre Email</small>
                    </div>
                </div>
            </fieldset>

            <!-- Section 4: Cursus Académique -->
            <fieldset class="form-section">
                <legend><span class="section-number">IV</span> Cursus Académique</legend>
                
                <div class="form-group">
    <label for="dernier_diplome" class="form-label">Dernier diplôme obtenu <span class="required">*</span></label>
    <select class="form-input" name="dernier_diplome" id="dernier_diplome" required>
        <option value="">-- Choisir le dernier diplôme --</option>
        <option value="LICENCE" <?= (isset($this->form_data->dernier_diplome) && $this->form_data->dernier_diplome === 'LICENCE') ? 'selected' : '' ?>>LICENCE</option>
        <option value="MAITRISE" <?= (isset($this->form_data->dernier_diplome) && $this->form_data->dernier_diplome === 'MAITRISE') ? 'selected' : '' ?>>MAITRISE</option>
        <option value="DEA/MASTER" <?= (isset($this->form_data->dernier_diplome) && ($this->form_data->dernier_diplome === 'DEA/MASTER' || $this->form_data->dernier_diplome === 'DEA / Master') ? 'selected' : '' )?>>DEA/MASTER</option>
        <option value="DOCTORAT" <?= (isset($this->form_data->dernier_diplome) && $this->form_data->dernier_diplome === 'DOCTORAT' ? 'selected' : '' )?>>DOCTORAT</option>
    </select>
</div>
<div class="form-group">
    <label for="dernier_diplome" class="form-label">Domaine du diplôme obtenu <span class="required">*</span></label>
    <select class="form-input" name="specialite_dernier_diplome" id="specialite_dernier_diplome" required>
        <option value="">-- Choisir la spécialité du diplôme --</option>
        <option value="Economie" <?= (isset($this->form_data->specialite_dernier_diplome) && $this->form_data->specialite_dernier_diplome === 'LICENCE') ? 'selected' : '' ?>>Economie</option>
        <option value="Finances" <?= (isset($this->form_data->specialite_dernier_diplome) && $this->form_data->specialite_dernier_diplome === 'MAITRISE') ? 'selected' : '' ?>>Finances</option>
        <option value="Gestion" <?= (isset($this->form_data->specialite_dernier_diplome) && ($this->form_data->specialite_dernier_diplome === 'DEA/MASTER' || $this->form_data->dernier_diplome === 'DEA / Master') ? 'selected' : '' )?>>Gestion</option>
        <option value="Droit" <?= (isset($this->form_data->specialite_dernier_diplome) && $this->form_data->specialite_dernier_diplome === 'DOCTORAT' ? 'selected' : '' )?>>Droit</option>
        <option value="Autres" <?= (isset($this->form_data->specialite_dernier_diplome) && $this->form_data->specialite_dernier_diplome === 'DOCTORAT' ? 'selected' : '' )?>>Autre</option>
    </select>
</div>
<div class="form-group">
                    <label for="specialite_requise" class="form-label">Spécialité / Filière <span class="required">*</span></label>
                    <input value="<?= set_value('specialite_requise', $this->form_data->specialite_requise) ?>" 
                        name="specialite_requise" class="form-input" id="specialite_requise" type="text" placeholder="Ex. Economie" required>
                </div>
<div class="form-group">
                    <label for="etablissement_obtention" class="form-label">Etablissement d'obtention <span class="required">*</span></label>
                    <input value="<?= set_value('etablissement_obtention', $this->form_data->diplome_requis) ?>" 
                        name="etablissement_obtention" class="form-input" id="etablisssement_obtention" type="text" placeholder="Ex. Université de Yaoundé" required>
                </div>
                
                <div class="form-group">
                    <label for="diplome_requis" class="form-label">Diplôme requis <span class="required">*</span></label>
                    <input value="<?= set_value('diplome_requis', $this->form_data->diplome_requis) ?>" 
                        name="diplome_requis" class="form-input" id="diplome_requis" type="text" placeholder="Ex. Licence" required>
                </div>
                
                
                
                <div class="form-group">
                    <label for="annee_optention_diplome" class="form-label">Année d'obtention du diplôme réquis <span class="required">*</span></label>
                    <select class="form-input" name="annee_optention_diplome" id="annee_optention_diplome" required>
                        <option value="">-- Choisir une année --</option>
                        <?php $x = date('Y'); ?>
                        <?php for ($i = $x; $i >= $x - 30; $i--): ?>
                            <option value="<?= $i ?>" <?= ($i == $this->form_data->annee_optention_diplome) ? 'selected' : '' ?>>
                                <?= $i ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
            </fieldset>

            <!-- Section 5: Coordonnées Professionnelles -->
            <fieldset class="form-section">
                <legend><span class="section-number">V</span> Coordonnées Professionnelles</legend>
                
                <div class="form-group">
                    <label for="statut_prof" class="form-label">Votre statut actuel <span class="required">*</span></label>
                    <select class="form-input" name="statut_prof" id="statut_prof" required>
                        <option value="">-- Choisir une réponse --</option>
                        <option value="Fonctionnaire" <?= ($this->form_data->statut_prof === "Fonctionnaire") ? "selected" : "" ?>>Fonctionnaire</option>
                        <option value="Travailleur privé" <?= ($this->form_data->statut_prof === "Travailleur_Privé") ? "selected" : "" ?>>Travailleur Privé</option>
                        <option value="Indépendant" <?= ($this->form_data->statut_prof === "Indépendant") ? "selected" : "" ?>>Indépendant</option>
                        <option value="Etudiant" <?= ($this->form_data->statut_prof === "Etudiant") ? "selected" : "" ?>>Etudiant</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="structure" class="form-label">Employeur</label>
                    <input value="<?= set_value('structure', $this->form_data->structure) ?>" 
                        placeholder="Ex. MINFI, FEICOM, DGTCFM ou AUTRE" name="structure" 
                        class="form-input" id="structure" type="text">
                </div>
                
                <div class="form-group">
                    <label for="adresse_structure" class="form-label">Adresse de votre Employeur</label>
                    <input value="<?= set_value('adresse_structure', $this->form_data->adresse_structure) ?>" 
                        placeholder="Ex. BP: 000 Douala" name="adresse_structure" 
                        class="form-input" id="adresse_structure" type="text">
                </div>
                
                <div class="form-group">
                    <label for="email_structure" class="form-label">Email de l'employeur</label>
                    <input value="<?= set_value('email_structure', $this->form_data->email_structure) ?>" 
                        name="email_structure" placeholder="contact@employeur.com" 
                        class="form-input" id="email_structure" type="email">
                </div>
            </fieldset>

            <fieldset class="form-section">
                <legend><span class="section-number">VI</span> Votre Avis Nous intéresse</legend>
                
                <div class="form-group">
                    <label for="howDidYouKnewUs" class="form-label">Comment avez-vous connu le PSSFP <span class="required">*</span></label>
                    <select class="form-input" name="howDidYouKnewUs" id="howDidYouKnewUs" required>
                        <option value="">-- Choisir une réponse --</option>
                        <option value="Cameroun Tribune" <?= ($this->form_data->howDidYouKnewUs === "Cameroun Tribune") ? "selected" : "" ?>>Cameroun Tribune</option>
                        <option value="Banderoles et affiches publicitaires" <?= ($this->form_data->howDidYouKnewUs === "Banderoles et affiches publicitaires") ? "selected" : "" ?>>Banderoles et affiches publicitaires</option>
                        <option value="Internet et réseaux sociaux" <?= ($this->form_data->howDidYouKnewUs === "Internet et réseaux sociaux") ? "selected" : "" ?>>Internet et réseaux sociaux</option>
                        <option value="Média Radio et TV" <?= ($this->form_data->howDidYouKnewUs === "Média Radio et TV") ? "selected" : "" ?>>Média Radio et TV</option>
                        <option value="Campagne de sensibilisation des équipes du PSSFP sur le terrain" <?= ($this->form_data->howDidYouKnewUs === "Campagne de sensibilisation des équipes du PSSFP sur le terrain") ? "selected" : "" ?>>Campagne de sensibilisation des équipes du PSSFP sur le terrain</option>
                    </select>
                </div>
                <div class="form-group">
                            <label class="formbold-form-label" for="niveau_connaissance_fp">Quel est votre niveau de connaissance des finances publiques ? </label>
                            <select class="form-input" name="niveau_connaissance_fp" id="niveau_connaissance_fp" required>
                                <option value="">-- Choisir une réponse --</option>
                                <option value="Faible">Faible</option>
                                <option value="Moyen">Moyen</option>
                                <option value="Bon">Bon</option>
                                <option value="Très bon">Très bon</option>
                            </select>
                    </div>
                    <div class="form-row">
                        <div class="form-group half">
                            <label class="formbold-form-label" for="motivation_pssfp">
                                Pourquoi avoir choisi le PSSFP ?
                            </label>
                            <select class="form-input" name="motivation_pssfp" id="motivation_pssfp" required>
                                <option value="">-- Choisir une réponse --</option>
                                <option value="Renforcer mes capacités">Renforcer mes capacités</option>
                                <option value="Être plus performant">Être plus performant</option>
                                <option value="Obtenir un diplôme de master">Obtenir un diplôme de master</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group half">
                            <label class="formbold-form-label" for="utilite_formation">
                                En quoi la formation du PSSFP pourrait-elle vous être utile ?
                            </label>
                            <select class="form-input" name="utilite_formation" id="utilite_formation" required>
                                <option value="">-- Choisir une réponse --</option>
                                <option value="Améliorer mes compétences professionnelles">Améliorer mes compétences professionnelles</option>
                                <option value="Accéder à des postes plus élevés">Accéder à des postes plus élevés</option>
                                <option value="Mieux comprendre les enjeux des finances publiques">Mieux comprendre les enjeux des finances publiques</option>
                                <option value="Développer mon réseau professionnel">Développer mon réseau professionnel</option>
                                <option value="Autre">Autre</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group half">
                            <label class="formbold-form-label" for="domaines_interet_fp">
                                Quels sont les domaines des finances publiques qui vous intéressent ?
                            </label>
                            <select class="form-input" name="domaines_interet_fp" id="domaines_interet_fp" required>
                                <option value="">-- Choisir une réponse --</option>
                                <option value="Gestion budgétaire">Gestion budgétaire</option>
                                <option value="Fiscalité">Fiscalité</option>
                                <option value="Comptabilité publique">Comptabilité publique</option>
                                <option value="Audit public">Audit public</option>
                                <option value="Marchés publics">Marchés publics</option>
                                <option value="Tous ces domaines">Tous ces domaines</option>
                            </select>
                        </div>
            </fieldset>

            <!-- Section 7: Engagement -->
            <fieldset class="form-section">
                <legend><span class="section-number">VII</span> Engagement</legend>
                
                <div class="form-group">
                    <div class="engagement-text">
                        <p>Je soussigné(e) : <strong id="label_sous"><?= isset($this->form_data->nom_prenom) ? $this->form_data->nom_prenom : '' ?></strong>, certifie sous l'honneur, l'exactitude des renseignements consignés dans cette fiche de candidature et avoir eu connaissance des conditions exigées pour être retenu comme candidat au programme de Master Professionnel en Finances Publiques.</p>
                    </div>
                    
                    <div class="form-checkbox">
                        <input type="checkbox" name="engagement" id="engagement" required>
                        <label for="engagement">J'ai lu et j'accepte <a href="#">les termes, conditions, et politiques</a> <span class="required">*</span></label>
                    </div>
                </div>
            </fieldset>

            <div class="form-actions">
                <button type="submit" name="<?= isset($submitname) ? $submitname : 'submit' ?>" class="btn btn-primary">
                    Soumettre
                </button>
                <button type="reset" class="btn btn-secondary">
                    Réinitialiser
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    :root {
        --primary-color: #683884;
        --secondary-color: #44c767;
        --danger-color: #e4685d;
        --light-color: #f8f9fa;
        --dark-color: #343a40;
        --border-color: #ddd;
        --text-color: #333;
        --text-light: #6c757d;
        --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        --transition: all 0.3s ease;
    }

    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        background-color: #f5f5f5;
        color: var(--text-color);
        line-height: 1.6;
    }

    .required {
        color: var(--danger-color);
    }

    .form-header {
        margin: 20px auto;
        max-width: 800px;
    }

    .panel-heading {
        background: var(--primary-color);
        color: white;
        padding: 15px;
        border-radius: 8px 8px 0 0;
        text-align: center;
        box-shadow: var(--shadow);
    }

    .panel-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0;
        color:#fff
    }

    .panel-title span {
        font-weight: 700;
    }

    .form-container {
        max-width: 800px;
        margin: 0 auto 40px;
    }

    .form-wrapper {
        background: white;
        padding: 30px;
        border-radius: 0 0 8px 8px;
        box-shadow: var(--shadow);
    }

    .form-section {
        border: 1px solid var(--border-color);
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 25px;
        position: relative;
    }

    .form-section legend {
        width: auto;
        padding: 0 10px;
        font-size: 1.1rem;
        font-weight: 600;
        color: var(--primary-color);
        border: none;
    }

    .section-number {
        display: inline-block;
        width: 24px;
        height: 24px;
        background: var(--primary-color);
        color: white;
        border-radius: 50%;
        text-align: center;
        line-height: 24px;
        margin-right: 8px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-row {
        display: flex;
        gap: 20px;
    }

    .form-row .form-group {
        flex: 1;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        font-weight: 500;
        color: var(--text-color);
    }

    .form-input {
    height: 35px;
    line-height: 28px;
        width: 100%;
        border: 1px solid var(--border-color);
        border-radius: 4px;
        font-size: 1rem;
        transition: var(--transition);
    }

    .form-input:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 2px rgba(104, 56, 132, 0.2);
    }

    select.form-input {
    height: 35px;
    line-height: 28px;
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 1em;
    }

    .radio-group {
        display: flex;
        flex-direction: column;
    }

    .radio-options {
        display: flex;
        gap: 20px;
        margin-top: 5px;
    }

    .radio-options label {
        display: flex;
        align-items: center;
        gap: 8px;
        cursor: pointer;
    }

    .date-inputs {
        display: flex;
        gap: 10px;
    }

    .date-inputs select {
        flex: 1;
    }

    .form-hint {
        display: block;
        margin-top: 5px;
        font-size: 0.6rem;
        color: var(--text-light);
    }

    .engagement-text {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 4px;
        margin-bottom: 15px;
    }

    .form-checkbox {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .form-checkbox input {
        width: auto;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 15px;
        margin-top: 30px;
    }

    .btn {
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
    }

    .btn-primary {
        background: var(--secondary-color);
        color: white;
    }

    .btn-primary:hover {
        background: #3aab58;
        box-shadow: var(--shadow);
    }

    .btn-secondary {
        background: var(--danger-color);
        color: white;
    }

    .btn-secondary:hover {
        background: #d9534f;
        box-shadow: var(--shadow);
    }

    @media (max-width: 768px) {
        .form-row {
            flex-direction: column;
            gap: 0;
        }
        
        .radio-options {
            flex-direction: column;
            gap: 8px;
        }
        
        .date-inputs {
            flex-direction: column;
        }
        
        .form-actions {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
        }
    }
</style>