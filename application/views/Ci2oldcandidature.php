<script>
    function changesoustitre() {
        document.getElementById('label_sous').innerHTML = document.getElementById('nom').value;
    }
    function maskepouse() {
        sel = document.getElementById('civilite'); civilite = sel.options[sel.selectedIndex].value; console.log(civilite); document.getElementById('epouse').style.display = (civilite === "Monsieur") ? "none" : "block";
    }
</script>

<div class="panel"
    style="margin-bottom:-30px; background: rgba( 255, 255, 255, 0.15 ); box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 ); backdrop-filter: blur( 8px ); -webkit-backdrop-filter: blur( 8px ); border-radius: 10px; border: 1px solid rgba( 255, 255, 255, 0.18 ); ">
    <div class="panel-heading" style="background: #683884; ">
        <center style="color: white">
            <h3 class="panel-title" style="color:#fff">Formulaire de Candidature : <span>MASTER EN FINANCES
                    PUBLIQUES:</span> </h3>
        </center>
    </div>
</div>
<div>
    <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper" style="max-width: 95%;">
           <!-- <img src="<?= base_url() ?>resources/assets/images/logform.png" style="margin-bottom:40px;width : 10%">-->
            
            <form id="myForm" method="post" class="bs-example form-horizontal" action="<?php echo $action; ?>">
                <?php //echo validation_errors(); ?><!-- <div class="formbold-mb-3"><label for="upload" class="formbold-form-label"> importer  une photo</label><input type="file" name="upload" id="upload"  class="formbold-form-input formbold-form-file" /> </div>              -->
                <div>
                    <div><!--groupe1-->
                        <legend>I - Formation</legend>
                        <div class="formbold-mb-3"> <span style="color: red"></span> <label for="specialite"
                                class="formbold-form-label">Spécialité *:</label> <select class="formbold-form-input"
                                name="specialite" id="specialite" required>
                                <option value="" selected="selected">------------- Choisir la Spécialité ------------
                                </option> <?php foreach ($specialites as $specialite) {
                                    if ($specialite->id == $this->form_data->specialite) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    }
                                    echo "<option value='" . $specialite->id . "' " . $selected . ">" . $specialite->nom . "</option>";
                                } ?>
                            </select> </div>
                    </div>
                    <div class="form-group "> <span style="color: red;"></span> <label for="specialite"
                            class="col-lg-5 control-label" style="margin: 10px" >Type d'étude <span style="color : red; margin: 10px">*</span> :</label>
                        <div class="col-lg-7"> <Input type='Radio' Name='type_etude' required value="Presentiel" <?php if (isset($this->form_data->type_etude) && $this->form_data->type_etude === 'Présentiel')
                            echo 'checked = "checked"'; ?>>&nbsp;&nbsp;Présentiel&nbsp;&nbsp;&nbsp; <Input
                                type='Radio' Name='type_etude' required value="Distanciel" <?php if (isset($this->form_data->type_etude) && $this->form_data->type_etude === 'Distanciel')
                                    echo 'checked = "checked"'; ?>>&nbsp;&nbsp;Distanciel&nbsp;&nbsp;&nbsp; </div>
                    </div>
                </div>
                <div>
                    <div><!--groupe2-->
                        <legend>II - Identité et Informations personnelles du candidat</legend>
                        <div class="formbold-mb-3"> <span style="color: red"></span> <label for="langue1"
                                class="formbold-form-label">Première Langue <span style="color : red">*</span> :</label>
                            <select class="formbold-form-input" name="langue" id="langue1" required>
                                <option value="" selected="selected">------------- Choisir la premiere langue
                                    ------------</option>
                                <option value="Français" <?php if ($this->form_data->langue === "Français")
                                    echo "selected"; ?>>Français</option>
                                <option value="Anglais" <?php if ($this->form_data->langue === "Anglais")
                                    echo "selected"; ?>>Anglais</option>
                            </select> </div>
                        <div class="formbold-mb-3"> <span style="color: red"></span> <label for="civilite"
                                class="formbold-form-label">Civilité <span style="color : red">*</span> :</label>
                            <select class="formbold-form-input" name="civilite" onchange="maskepouse();" id="civilite"
                                required>
                                <option value="" selected="selected">------------- Choisir Civilité ------------
                                </option>
                                <option value="Madame" <?php if ($this->form_data->civilite === "Madame")
                                    echo "selected"; ?>> Madame</option>
                                <option value="Madémoiselle" <?php if ($this->form_data->civilite === "Madémoiselle")
                                    echo "selected"; ?>>Mademoiselle</option>
                                <option value="Monsieur" <?php if ($this->form_data->civilite === "Monsieur")
                                    echo "selected"; ?>>Monsieur</option>
                            </select> </div>
                        <div class="formbold-input-wrapp formbold-mb-3"> <span style="color: red"></span> <label
                                for="nom" class="formbold-form-label"> Nom <span style="color : red">*</span> : </label>
                            <div> <input value="<?php echo set_value('nom', $this->form_data->nom); ?>"
                                    onchange="changesoustitre();" name="nom" placeholder="Nom"
                                    class="formbold-form-input" id="nom" type="text" required /></div>
                        </div>
                        <div class="formbold-input-wrapp formbold-mb-3"> <span style="color: red"></span> <label
                                for="prenom" class="formbold-form-label"> Prénom <span style="color : red">*</span> :
                            </label>
                            <div> <input value="<?php echo set_value('prenom', $this->form_data->prenom); ?>"
                                    onchange="changesoustitre();" name="prenom" placeholder="Prènom"
                                    class="formbold-form-input" id="prenom" type="text" required /> <input
                                    value="<?php echo set_value('epouse', $this->form_data->epouse); ?>" name="epouse"
                                    placeholder="Epouse .........." class="formbold-form-input" id="epouse" type="text">
                            </div>
                        </div>
                        <div class="formbold-mb-2" style="display : flex"> <label for="datenaiss_jj"
                                class="formbold-form-label" style="font-size: 80%;"> Né(e) le <br> (jj/mm/aaaa) <span
                                    style="color : red">*</span> : </label> <select class="formbold-form-input"
                                name="datenaiss_jj" id="datenaiss_jj" required>
                                <option value="" selected="selected"> ---- Jour ---- </option> <?php $i = 1;
                                for ($i = 1; $i < 32; $i++) {
                                    if ($i == $this->form_data->datenaiss_jj) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    } ?>
                                    <option value="<?php echo $i; ?>" <?php echo $selected; ?>> <?php echo $i; ?> </option>
                                <?php } ?>
                            </select> <span style="color: red"> </span>
                            <select class="formbold-form-input" name="datenaiss_mm" id="datenaiss_mm" required value="">
                                <option value="" selected="selected"> ---- Mois ---- </option> <?php $i = 1;
                                for ($i = 1; $i < 13; $i++) {
                                    if ($i == $this->form_data->datenaiss_mm) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    } ?>
                                    <option value="<?php echo $i; ?>" <?php echo $selected; ?>> <?php echo $i; ?> </option>
                                <?php } ?>
                            </select> <span style="color: red"> </span>
                            <select class="formbold-form-input" name="datenaiss_yy" id="datenaiss_yy" required>
                                <option value="" selected="selected"> ---- Année ---- </option> <?php $x = date(Y);
                                $i = 0;
                                for ($i = $x - 65; $i < $x - 15; $i++) {
                                    if ($i == $this->form_data->datenaiss_yy) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    } ?>
                                    <option value="<?php echo $i; ?>" <?php echo $selected; ?>> <?php echo $i; ?> </option>
                                <?php } ?>
                            </select> <span style="color: red"> </span>
                        </div>
                        <div class="formbold-input-wrapp formbold-mb-3"> <span style="color: red"></span> <label
                                for="lieu_de_naissce" class="formbold-form-label"> Lieu de Naissance<span
                                    style="color : red">*</span> : <span style="color : red">*</span> : </label>
                            <div> <input
                                    value="<?php echo set_value('lieu_de_naissce', $this->form_data->lieu_de_naissce); ?>"
                                    name="lieu_de_naissce" placeholder="Ex. Mengueme-SY" class="formbold-form-input"
                                    id="lieu_de_naissce" type="text" required /></div>
                        </div>
                        <div class="formbold-input-wrapp formbold-mb-3"> <span style="color: red"></span> <label
                                for="region_dorigine" class="formbold-form-label"> Région et département d'origine<span
                                    style="color : red">*</span> : </label>
                            <div> <input
                                    value="<?php echo set_value('region_dorigine', $this->form_data->region_dorigine); ?>"
                                    name="region_dorigine" placeholder="Ex. Centre" class="formbold-form-input"
                                    id="region_dorigine" type="text" required> <input
                                    value="<?php echo set_value('dept_dorigine', $this->form_data->dept_dorigine); ?>"
                                    name="dept_dorigine" placeholder="Ex. Nyong et Mfoumou" class="formbold-form-input"
                                    id="dept_dorigine" type="text" required></div>
                        </div>
                        <div class="formbold-input-wrapp formbold-mb-3"> <span style="color: red"></span> <label
                                for="nationalite" class="formbold-form-label"> Nationalité <span
                                    style="color : red">*</span> : </label>
                            <div> <input value="<?php echo set_value('nationalite', $this->form_data->nationalite); ?>"
                                    name="nationalite" placeholder="Ex. Camerounaise" class="formbold-form-input"
                                    id="nationalite" type="text" required /></div>
                        </div>
                        <div class="formbold-mb-3"> <span style="color: red"></span> <label for="statutmatrimonial"
                                class="formbold-form-label"> Statut matrimonial <span style="color : red">*</span>
                                :</label> <select class="formbold-form-input" name="statu_matrimonial"
                                onchange="maskepouse();" id="civilite" required>
                                <option value="" selected="selected">------------- Choisir ------------</option>
                                <option value="Célibataire" <?php if ($this->form_data->statu_matrimonial === "Célibataire")
                                    echo "selected"; ?>>
                                    Célibataire </option>
                                <option value="Marié(e)" <?php if ($this->form_data->statu_matrimonial === "Marié(e)")
                                    echo "selected"; ?>>Marié(e)</option>
                                <option value="Veuf(ve)" <?php if ($this->form_data->statu_matrimonial === "Veuf(ve)")
                                    echo "selected"; ?>>Veuf(ve)</option>
                            </select> </div>
                        <div class="formbold-input-wrapp formbold-mb-3"> <span style="color: red"></span> <label
                                for="nombre_enfant" class="formbold-form-label"> Nombre d'Enfants en charge <span
                                    style="color : red">*</span> : </label>
                            <div> <input
                                    value="<?php echo set_value('nombre_enfant', $this->form_data->nombre_enfant); ?>"
                                    name="nombre_enfant" placeholder="nombre d'enfants" class="formbold-form-input"
                                    id="nombre_enfant" type="text" required></div>
                        </div>
                    </div>
                </div>
                <div><br>
                    <hr>
                    <div><!--groupe3-->
                        <legend>III- Contacts du candidat</legend>
                        <div class="formbold-mb-3"> <span style="color: red"></span>
                            <div class="formbold-input-wrapp formbold-mb-3"> <span style="color: red"></span> <label
                            for="paysorigine" class="formbold-form-label"> Pays de résidence : </label>
                                <div> <select name="paysorigine" class="formbold-form-input" id="paysorigine"
                                        required>
                                        <option value="" selected="selected">------------- Choisir pays
                                            d'origine------------</option><?php foreach ($pays as $pay) {
                                                if ($pay->id == $this->form_data->paysorigine) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                                echo "<option value='" . $pay->id . "' " . $selected . ">" . $pay->nom . "</option>";
                                            } ?>
                                    </select> </div>
                            </div>
                            <div class="formbold-input-wrapp formbold-mb-3"> <span style="color: red"></span> <label
                                    for="pays" class="formbold-form-label"> Pays de résidence : </label>
                                <div> <select name="pays_residence" class="formbold-form-input" id="pays"
                                        required>
                                        <option value="" selected="selected">------------- Choisir pays de résidence
                                            ------------</option><?php foreach ($pays as $pay) {
                                                if ($pay->id == $this->form_data->pays_residence) {
                                                    $selected = 'selected';
                                                } else {
                                                    $selected = '';
                                                }
                                                echo "<option value='" . $pay->id . "' " . $selected . ">" . $pay->nom . "</option>";
                                            } ?>
                                    </select></div>
                            </div>
                            <div class="formbold-input-wrapp formbold-mb-3"> <span style="color: red"></span> <label
                                    class="formbold-form-label" for="adressecandidat">Adresse du candidat <span
                                        style="color : red">*</span> :</label>
                                <div> <input
                                        value="<?php echo set_value('adresse_candidat', $this->form_data->adresse_candidat); ?>"
                                        name="adresse_candidat" placeholder="Ex. BP: 007 Yaoundé" required
                                        class="formbold-form-input" id="adressecandidat" type="text"></div>
                            </div>


                            <div class="formbold-input-wrapp formbold-mb-3"> <span style="color: red"></span> <label
                                    for="villeresidence" class="formbold-form-label"> Ville de résidence <span
                                        style="color : red">*</span> : </label>
                                <div> <input
                                        value="<?php echo set_value('ville_residence', $this->form_data->ville_residence); ?>"
                                        name="ville_residence" placeholder="Ex. Maroua" required
                                        class="formbold-form-input" id="villeresidence" type="text" /></div>
                            </div><span
                                style="color: red;float: right;display: inline"><?php echo form_error('telephone'); ?></span>
                            <div class="formbold-input-wrapp formbold-mb-3"> <label for="telephone1"
                                    class="formbold-form-label"> Téléphone (Whatsapp) <span style="color : red">*</span>
                                    : </label>
                                <div> <input value="<?php echo set_value('telephone', $this->form_data->telephone); ?>"
                                        name="telephone" placeholder="N° de téléphone Whatsapp" required
                                        class="formbold-form-input" id="telephone1" type="text" pattern="[0-9]*"> </div>
                                <span style="font-size: 10px; margin-top: -60px; color: #D893A1;">Indicateur Pays + N°
                                    de téléphone Whatsapp. Exemple: 2376700000007</span>
                            </div> <span
                                style="color: red;float: right;display: inline"><?php echo form_error('telephone2'); ?></span>
                            <div class="formbold-input-wrapp formbold-mb-3"> <label for="telephone2"
                                    class="formbold-form-label"> Autre Téléphone <span style="color : red">*</span> :
                                </label>
                                <div> <input
                                        value="<?php echo set_value('telephone2', $this->form_data->telephone2); ?>"
                                        name="telephone2" placeholder="Autre N° de téléphone"
                                        class="formbold-form-input" id="telephone2" type="text" pattern="[0-9]*"> </div>
                                <span style="font-size: 10px; margin-top: -60px; color: #D893A1;">Indicateur Pays + N°
                                    de téléphone Whatsapp. Exemple: 2376700000007</span>
                            </div> <span
                                style="color: red;float: right;display: inline"><?php echo form_error('email'); ?></span>
                            <div class="formbold-input-wrapp formbold-mb-3"> <label for="email"
                                    class="formbold-form-label"> Email Personnel <span style="color : red">*</span> :
                                </label>
                                <div> <input value="<?php echo set_value('email', $this->form_data->email); ?>"
                                        name="email" placeholder="Ex. exemple@site.com" required
                                        class="formbold-form-input" id="email" type="email"></div>
                            </div>
                            <span
                                style="color: red;float: right;display: inline"><?php echo form_error('emailverif'); ?></span>
                            <div class="formbold-input-wrapp formbold-mb-3"> <label for="email"
                                    class="formbold-form-label">Confirmez votre email Personnel <span
                                        style="color : red">*</span> : </label>
                                <div> <input
                                        value="<?php echo set_value('emailverif', $this->form_data->emailverif); ?>"
                                        name="emailverif" placeholder="Ex. exemple@site.com" required
                                        class="formbold-form-input" id="emailverif" type="email"></div> <span
                                    style="font-size: 10px; margin-top: -60px; color: #D893A1;">saisissez a nouveau
                                    votre Email</span>
                            </div><br>
                        </div>
                    </div>
                </div>
                <div>
                    <div><!--groupe4-->
                        <legend>IV - Cursus Académique</legend>
                        <div class="formbold-mb-3"> <span style="color: red"></span>
                            <div class="formbold-input-wrapp formbold-mb-3"> <span style="color: red"></span> <label
                                    for="dernier_diplome" class="formbold-form-label"> Dernier diplome obtenu : </label>
                                <div> <input
                                        value="<?php echo set_value('dernier_diplome', $this->form_data->dernier_diplome); ?>"
                                        name="dernier_diplome" class="formbold-form-input" required id="dernier_diplome"
                                        type="text" placeholder="Ex. DEA " list="list_dernierdiplome" />
                                    <datalistid="list_dernierdiplome">
                                        <option value="Licence">
                                        <option value="DEA / Master">
                                        <option value="Doctorat"> </datalist>
                                </div>
                            </div>
                            <div class="formbold-input-wrapp formbold-mb-3"> <span style="color: red"></span> <label
                                    for="adresse_structure" class="formbold-form-label"> Adresse dee votre Employeur :
                                </label>
                                <div> <input
                                        value="<?php echo set_value('adresse_structure', $this->form_data->adresse_structure); ?>"
                                        placeholder="Ex. BP: 000 Douala" name="adresse_structure"
                                        class="formbold-form-input" id="adressAdministration" type="text" /></div>
                            </div>
                            <div class="formbold-input-wrapp formbold-mb-3"> <span style="color: red"></span> <label
                                    for="diplome_requis" class="formbold-form-label"> Diplome requis : </label>
                                <div> <input input
                                        value="<?php echo set_value('diplome_requis', $this->form_data->diplome_requis); ?>"
                                        name="diplome_requis" class="formbold-form-input" required id="dernier_diplome"
                                        type="text" placeholder="Ex. Licence" /></div>
                            </div>
                            <div class="formbold-input-wrapp formbold-mb-3"> <span style="color: red"></span> <label
                                    for="specialite_requise" class="formbold-form-label"> Spécialité du diplome requis :
                                </label>
                                <div> <input
                                        value="<?php echo set_value('specialite_requise', $this->form_data->specialite_requise); ?>"
                                        name="specialite_requise" class="formbold-form-input" required
                                        id="specialite_requiss" type="text" placeholder="Ex. Economie" /></div>
                            </div>

                            <label for="annee_optention_diplome" class="formbold-form-label"
                                for="anneedernierdiplome">Année d'obtention du diplôme réquis:</label>
                            <select class="formbold-form-input" name="annee_optention_diplome"
                                id="annee_optention_diplome" required>
                                <option value="" selected="selected">------------- Choisir une réponse ------------
                                </option> <?php $x = date('Y');
                                $i = 0;
                                for ($i = $x; $i >= $x - 30; $i--) {
                                    if ($i == $this->form_data->annee_optention_diplome) {
                                        $selected = 'selected';
                                    } else {
                                        $selected = '';
                                    } ?>
                                    <option value="<?php echo $i; ?>" <?php echo $selected; ?>> <?php echo $i; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div>
                    <div><!--groupe5-->
                        <legend>V - Vos Coordonnées Professionnel</legend>
                        <div class="formbold-mb-3"> <span style="color: red"></span> <label
                                class="formbold-form-label">Votre statut actuel *:</label> <select
                                class="formbold-form-input" name="statut_prof" id="statut">
                                <option value="" selected="selected">------------- Choisir une réponse ------------
                                </option>
                                <option value="Fonctionnaire" <?php if ($this->form_data->statut_prof === "Fonctionnaire")
                                    echo "selected"; ?>>Fonctionnaire </option>
                                <option value="Travailleur privé" <?php if ($this->form_data->statut_prof === "Travailleur_Privé")
                                    echo "selected"; ?>>
                                    Travailleur Privé</option>
                                <option value="Indépendant" <?php if ($this->form_data->statut_prof === "Indépendant")
                                    echo "selected"; ?>>Indépendant</option>
                                <option value="Etudiant" <?php if ($this->form_data->statut_prof === "Etudiant")
                                    echo "selected"; ?>>Etudiant</option>
                            </select>
                            <div class="formbold-input-wrapp formbold-mb-3"> <span style="color: red"></span> <label
                                    for="structure" class="formbold-form-label"> Employeur : </label>
                                <div> <input value="<?php echo set_value('structure', $this->form_data->structure); ?>"
                                        placeholder="Ex. MINFI, FEICOM, DGTCFM ou AUTRE" name="structure"
                                        class="formbold-form-input" id="structure" type="text" /></div>
                            </div>
                            <div class="formbold-input-wrapp formbold-mb-3"> <span style="color: red"></span> <label
                                    for="adresse_structure" class="formbold-form-label"> Adresse dee votre Employeur :
                                </label>
                                <div> <input
                                        value="<?php echo set_value('adresse_structure', $this->form_data->adresse_structure); ?>"
                                        placeholder="Ex. BP: 000 Douala" name="adresse_structure"
                                        class="formbold-form-input" id="adressAdministration" type="text" /></div>
                            </div>
                            <div class="formbold-input-wrapp formbold-mb-3"> <span style="color: red"></span> <label
                                    for="teladmi" class="formbold-form-label"> Employeur : </label>
                                <div> <input input
                                        value="<?php echo set_value('structure', $this->form_data->structure); ?>"
                                        placeholder="Ex. MINFI, FEICOM, DGTCFM ou AUTRE" name="structure"
                                        class="formbold-form-input" id="structure" type="text" /></div>
                            </div>
                            <div class="formbold-input-wrapp formbold-mb-3"> <span style="color: red"></span> <label
                                    for="structure" class="formbold-form-label"> Téléphone de l'employeur : </label>
                                <div> <input
                                        value="<?php echo set_value('email_structure', $this->form_data->email_structure); ?>"
                                        name="email_structure" placeholder="Email Administration"
                                        class="formbold-form-input" id="email_structure" type="text" /></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div>
                    <div><!--groupe6-->
                        <legend>VI - Votre Avis Nous intéresse</legend>
                        <div class="formbold-mb-3"> <span style="color: red"></span> <label
                                class="formbold-form-label">Comment avez-vous connu le PSSFP *:</label> <select
                                class="formbold-form-input" name="howDidYouKnewUs" id="occupation">
                                <option value="" selected="selected">------------- Choisir une réponse ------------
                                </option>
                                <option value="Cameroun Tribune" <?php if ($this->form_data->howDidYouKnewUs === "Cameroun Tribune")
                                    echo "selected"; ?>>Cameroun Tribune </option>
                                <option value="Banderoles et affiches publicitaires" <?php if ($this->form_data->howDidYouKnewUs === "Banderoles et affiches publicitaires")
                                    echo "selected"; ?>> Banderoles et affiches publicitaires</option>
                                <option value="Internet et réseaux sociaux" <?php if ($this->form_data->howDidYouKnewUs === "Internet et réseaux sociaux")
                                    echo "selected"; ?>> Internet et réseaux sociaux</option>
                                <option value="Média Radio et TV" <?php if ($this->form_data->howDidYouKnewUs === "Média Radio et TV")
                                    echo "selected"; ?>>Média Radio et TV</option>
                                <option value="Campagne de sensibilisation des équipes du PSSFP sur le terrain" <?php if ($this->form_data->howDidYouKnewUs === "Campagne de sensibilisation des équipes du PSSFP sur le terrain")
                                    echo "selected"; ?>>Campagne de sensibilisation des équipes
                                    du PSSFP sur le terrain</option>
                            </select> </div>
                    </div>
                </div>
                <div>
                    <div><!--groupe7-->
                        <legend>VII - Engagement</legend>
                        <div class="formbold-checkbox-wrapper"> <label for="">
                                <div class="panel-body" style="text-align: justify; font-size: 80%;"> Je sousigné(e) :
                                    <h5 class="" id="label_sous"> <?php if (isset($this->form_data->nom_prenom))
                                        echo $this->form_data->nom_prenom; ?> </h5>, certifie sous l'honneur, l'exactidude
                                    des renseignements consignés dans cette fiche de candidature et avoir eu
                                    connaissance des conditions exigées pour être retenu comme candidat au programme de
                                    Master Professionnel en Finances Publiques.</div>
                            </label>
                            <div style="text-align: justify; display: flex;"> <span style="color: red"> </span> <input
                                    type="checkbox" name="engagement" required style="margin-right : 2%" /> <label
                                    for=""> J'ai lu et j'accepte <a href="#">les termes, conditions, and
                                        policies</a></label> </div>
                        </div>
                    </div>
                </div>
                <div><button name="<?php if (isset($submitname))
                    echo $submitname; ?>" id="subenregistrer" class="formbold-btn"
                        style="background:#44c767; margin-right : 10px">Soummetre</button><button type="reset" class="formbold-btn"
                        style="background:#e4685D; ">Reinitialiser</button> </div>

            </form>
        </div>
    </div>
</div>
<hr>







<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .formbold-form-input{
        min-height: 40px;
    }

    body {
        font-family: 'Inter', sans-serif;
    }

    .formbold-mb-3 {
        margin-bottom: 15px;
    }

    .formbold-relative {
        position: relative;
    }

    .formbold-opacity-0 {
        opacity: 0;
    }

    .formbold-stroke-current {
        stroke: #ffffff;
        z-index: 999;
    }

    #supportCheckbox:checked~div span {
        opacity: 1;
    }

    #supportCheckbox:checked~div {
        background: #6a64f1;
        border-color: #6a64f1;
    }

    .formbold-main-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 48px;
    }

    .formbold-form-wrapper {
        margin: 0 auto;
        max-width: 570px;
        width: 100%;
        background: white;
        padding: 40px;
    }

    .formbold-img {
        display: block;
        margin: 0 auto 45px;
    }

    .formbold-input-wrapp>div {
        display: flex;
        gap: 20px;
    }

    .formbold-input-flex {
        display: flex;
        gap: 20px;
        margin-bottom: 15px;
    }

    .formbold-input-flex>div {
        width: 50%;
    }

    .formbold-form-input {
        width: 100%;
        border-radius: 5px;
        border: 1px solid #dde3ec;
        background: #ffffff;
        font-weight: 500;
        font-size: 16px;
        color: #536387;
        outline: none;
        resize: none;
    }

    .formbold-form-input::placeholder,
    select.formbold-form-input,
    .formbold-form-input[type='date']::-webkit-datetime-edit-text,
    .formbold-form-input[type='date']::-webkit-datetime-edit-month-field,
    .formbold-form-input[type='date']::-webkit-datetime-edit-day-field,
    .formbold-form-input[type='date']::-webkit-datetime-edit-year-field {
        color: rgba(83, 99, 135, 0.5);
    }

    .formbold-form-input:focus {
        border-color: #6a64f1;
        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }

    .formbold-form-label {
        color: #536387;
        font-size: 14px;
        line-height: 24px;
        display: block;
        margin-bottom: 20px;
    }

    .formbold-checkbox-label {
        display: flex;
        cursor: pointer;
        user-select: none;
        font-size: 16px;
        line-height: 24px;
        color: #536387;
    }

    .formbold-checkbox-label a {
        margin-left: 5px;
        color: #6a64f1;
    }

    .formbold-input-checkbox {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border-width: 0;
    }

    .formbold-checkbox-inner {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 20px;
        height: 20px;
        margin-right: 16px;
        margin-top: 2px;
        border: 0.7px solid #dde3ec;
        border-radius: 3px;
    }

    .formbold-form-file {
        padding: 12px;
        font-size: 14px;
        line-height: 24px;
        color: rgba(83, 99, 135, 0.5);
    }

    .formbold-form-file::-webkit-file-upload-button {
        display: none;
    }

    .formbold-form-file:before {
        content: 'Upload';
        display: inline-block;
        background: #EEEEEE;
        border: 0.5px solid #E7E7E7;
        border-radius: 3px;
        padding: 3px 12px;
        outline: none;
        white-space: nowrap;
        -webkit-user-select: none;
        cursor: pointer;
        color: #637381;
        font-weight: 500;
        font-size: 12px;
        line-height: 16px;
        margin-right: 10px;
    }

    .formbold-btn {
        font-size: 16px;
        border-radius: 5px;
        padding: 14px 25px;
        border: none;
        font-weight: 500;
        background-color: #6a64f1;
        color: white;
        cursor: pointer;
        margin-top: 25px;
    }

    .formbold-btn:hover {
        box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }

    .formbold-w-45 {
        width: 45%;
    }
</style>