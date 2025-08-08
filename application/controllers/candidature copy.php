<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Candidature extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();

        // load library
        $this->load->library(array('table', 'form_validation'));
        $this->load->library('session');
        $this->load->library('email');
        $this->load->library('email');
        // load helper
        $this->load->helper('url');

        // load model
        $this->load->model('Model_generique', 'model', TRUE);
    }
    
    public function index() {
        //	$this->load->view('welcome_message');
        // $data = array();
        $submitname = "enregistrer";
        $data['submitname'] = $submitname;
        $data["specialites"] = $this->model->list_all("specialite")->result();
        $data["pays"] = $this->model->list_all("pays")->result();
        $data['action'] = site_url('candidature/add/');
        //redirect('candidature/add/');
        $this->template->layout('candidature', $data);
    }

    
    public function get_all_regions() {
        return $this->db->get('regions')->result();
    }

    public function get_departements() {
        $region_id = $this->input->post('region_id');

        if (!$region_id) {
            echo '<option value="">Aucune région reçue</option>';
            return;
        }

        $query = $this->db->get_where('departements', ['region_id' => $region_id]);
        $departements = $query->result();

        if (empty($departements)) {
            echo '<option value="">Aucun département trouvé</option>';
        } else {
            echo '<option value="">--Sélectionner un département--</option>';
            foreach ($departements as $dept) {
                echo '<option value="' . $dept->nom . '">' . $dept->nom . '</option>';
            }
        }
    }

    public function get_departements_by_region($region_id) {
        $this->db->where('region_id', $region_id);
        $query = $this->db->get('departements');
        return $query->result();
    }

    public function add() {
        $table = 'candidats';
        $data = array();
        $submitname = "enregistrer";
        $data['submitname'] = $submitname;
        $data["specialites"] = $this->model->list_all("specialite")->result();
        $data["pays"] = $this->model->list_all("pays")->result();
        $data['action'] = site_url('candidature/add/');

        $this->form_data = new stdclass;
	$this->form_data->type_etude='';
        $this->form_data->specialite = '';
        $this->form_data->civilite = '';
        $this->form_data->nom = '';
        $this->form_data->prenom = '';
        $this->form_data->epouse = '';
        $this->form_data->nombre_enfant = 0;
        $this->form_data->datenaiss_jj = '';
        $this->form_data->datenaiss_mm = '';
        $this->form_data->datenaiss_yy = '';
        $this->form_data->lieu_de_naissce = '';
        $this->form_data->nationalite = '';
        $this->form_data->paysorigine = '';
        $this->form_data->region_dorigine = '';
        $this->form_data->dept_dorigine = '';
        $this->form_data->sexe = '';
        $this->form_data->statu_matrimonial = '';
//        $this->form_data->nombre_enfant = '0';
        $this->form_data->langue = 'Français';
        $this->form_data->pays_residence = '';
        $this->form_data->adresse_candidat = '';
        $this->form_data->ville_residence = '';
        $this->form_data->telephone = '';
        $this->form_data->telephone2 = '';
        $this->form_data->email = '';
        $this->form_data->emailverif = '';
        $this->form_data->nombre_annee_etude_sup = '';
        $this->form_data->dernier_diplome = '';
        $this->form_data->diplome_requis = '';
        $this->form_data->specialite_requise = '';
        $this->form_data->diplome_obtenu_a = '';
        $this->form_data->annee_optention_diplome = '';
        $this->form_data->statut_prof = '';
        $this->form_data->structure = '';
        $this->form_data->adresse_structure = '';
        $this->form_data->telephone_structure = '';
        $this->form_data->email_structure = '';
        $this->form_data->howDidYouKnewUs = '';
        //$this->form_data->accepter_condition              Pas besoin d'enregistrer cette variable
        if (isset($_POST[$submitname])) {
//            $this->form_validation->set_rules('nom', 'nom prenom', 'trim|required');
//            $this->form_validation->set_rules('date_naissance', 'date naissance', 'trim|required');
//            $this->form_validation->set_rules('lieu_de_naissce', 'lieu_de_naissce', 'trim|required');
//            $this->form_validation->set_rules('statu_matrimonial', ' tatu_matrimonial', 'trim|required');
//            $this->form_validation->set_rules('adresse_candidat', 'adresse_candidat', 'trim|required');
            $this->form_validation->set_rules('telephone', 'Telephone', 'trim|required|is_unique[candidats.telephone]|is_unique[candidats.telephone2]');
            $this->form_validation->set_rules('telephone2', 'Telephone', 'trim|is_unique[candidats.telephone2]|is_unique[candidats.telephone]');
            $this->form_validation->set_rules('emailverif', 'Email', 'trim|required|is_unique[candidats.email]|matches[email]');
//            $this->form_validation->set_rules('ville_residence', 'ville_residence', 'trim|required');
//            $this->form_validation->set_rules('nombre_annee_etude_sup', 'nombre_annee_etude_sup', 'trim|required');
//            $this->form_validation->set_rules('dernier_diplome', 'dernier_diplome', 'trim|required');
//            $this->form_validation->set_rules('diplome_obtenu_a', 'diplome_obtenu_a', 'trim|required');
//            $this->form_validation->set_rules('annee_optention_diplome', 'annee_optention_diplome', 'trim|required');
//            $this->form_validation->set_rules('langue', 'langue', 'trim|required');
            $this->form_validation->set_message('is_unique', 'Valeur déjà utilisée');
            $this->form_validation->set_message('matches', 'Valeur non identique à la copie');
            if ($this->form_validation->run() == FALSE) {
                $this->form_data->specialite = $this->input->post('specialite');
		$this->form_data->type_etude= $this->input->post('type_etude');
                $this->form_data->civilite = $this->input->post('civilite');
                $this->form_data->nom = $this->input->post('nom');
                $this->form_data->prenom = $this->input->post('prenom');
                $this->form_data->epouse = $this->input->post('epouse');
                $this->form_data->nombre_enfant = $this->input->post('nombre_enfant');
                $this->form_data->datenaiss_jj = $this->input->post('datenaiss_jj');
                $this->form_data->datenaiss_mm = $this->input->post('datenaiss_mm');
                $this->form_data->datenaiss_yy = $this->input->post('datenaiss_yy');
                $this->form_data->lieu_de_naissce = $this->input->post('lieu_de_naissce');
                $this->form_data->nationalite = $this->input->post('nationalite');
                $this->form_data->paysorigine = $this->input->post('paysorigine');
                $this->form_data->region_dorigine = $this->input->post('region_dorigine');
                $this->form_data->dept_dorigine = $this->input->post('dept_dorigine');
                $this->form_data->statu_matrimonial = $this->input->post('statu_matrimonial');
                $this->form_data->nombre_enfant = $this->input->post('nombre_enfant');
                $this->form_data->langue = 'Français';
                $this->form_data->pays_residence = $this->input->post('pays_residence');
                $this->form_data->adresse_candidat = $this->input->post('adresse_candidat');
                $this->form_data->ville_residence = $this->input->post('ville_residence');
                $this->form_data->telephone = $this->input->post('telephone');
                $this->form_data->telephone2 = $this->input->post('telephone2');
                $this->form_data->email = $this->input->post('email');
                $this->form_data->emailverif = $this->input->post('emailverif');
                $this->form_data->nombre_annee_etude_sup = $this->input->post('nombre_annee_etude_sup');
                $this->form_data->dernier_diplome = $this->input->post('dernier_diplome');
                $this->form_data->specialite_requise = $this->input->post('specialite_requise');
                $this->form_data->diplome_requis = $this->input->post('diplome_requis');
                $this->form_data->diplome_obtenu_a = $this->input->post('diplome_obtenu_a');
                $this->form_data->annee_optention_diplome = $this->input->post('annee_optention_diplome');
                $this->form_data->statut_prof = $this->input->post('statut_prof');
                $this->form_data->structure = $this->input->post('structure');
                $this->form_data->adresse_structure = $this->input->post('adresse_structure');
                $this->form_data->telephone_structure = $this->input->post('telephone_structure');
                $this->form_data->email_structure = $this->input->post('email_structure');
                $this->form_data->howDidYouKnewUs = $this->input->post('howDidYouKnewUs');
                $data['message'] = 'Des erreurs ont été rencontrées lors de l\'enregistrement de votre fiche<br/> verifier vos informations et corriger les problèmes signalés';
            } else {
                $numordre = time();
                $candidat = array(
                    'civilite' => $this->input->post('civilite'),
		    'type_etude' => $this->input->post('type_etude'),	
                    'nom' => $this->input->post('nom'),
                    'prenom' => $this->input->post('prenom'),
                    'epouse' => $this->input->post('epouse'),
                    'nombre_enfant' => $this->input->post('nombre_enfant'),
                    'date_naissance' => implode('-', array($this->input->post('datenaiss_yy'), $this->input->post('datenaiss_mm'), $this->input->post('datenaiss_jj'))),
                    'lieu_de_naissce' => $this->input->post('lieu_de_naissce'),
                    'nationalite' => $this->input->post('nationalite'),
                    'paysorigine' => $this->input->post('paysorigine'),
                    'region_dorigine' => $this->input->post('region_dorigine'),
                    'dept_dorigine' => $this->input->post('dept_dorigine'),
                    'statu_matrimonial' => $this->input->post('statu_matrimonial'),
                    'adresse_candidat' => $this->input->post('adresse_candidat'),
                    'telephone' => $this->input->post('telephone'),
		    'telephone2' => $this->input->post('telephone2'),
                    'email' => $this->input->post('email'),
                    'ville_residence' => $this->input->post('ville_residence'),
                    'nombre_annee_etude_sup' => $this->input->post('nombre_annee_etude_sup'),
                    'dernier_diplome' => $this->input->post('dernier_diplome'),
                    'specialite_requise' => $this->input->post('specialite_requise'),
                    'diplome_requis' => $this->input->post('diplome_requis'),
                    'diplome_obtenu_a' => $this->input->post('diplome_obtenu_a'),
                    'annee_optention_diplome' => $this->input->post('annee_optention_diplome'),
                    'statut_prof' => $this->input->post('statut_prof'),
                    'structure' => $this->input->post('structure'),
                    'adresse_structure' => $this->input->post('adresse_structure'),
                    'email_structure' => $this->input->post('email_structure'),
                    'howDidYouKnewUs' => $this->input->post('howDidYouKnewUs'),
                    'telephone_structure' => $this->input->post('telephone_structure'),
                    'langue' => $this->input->post('langue'),
                    'id_specialite' => $this->input->post('specialite'),
                    'id_pays' => $this->input->post('pays_residence'),
                    'pays_residence' => $this->input->post('pays_residence'),
                    'ordre_candidature' => $numordre,
                    'date_enregistrement' => date("Y-m-d H:i:s"),
                    'sexe' => ($this->input->post('civilite') === "Monsieur") ? "Homme" : "Femme",
                    'accepter_condition' => true
                );
                $id=$this->model->save($table, $candidat);
                $candidat = array( 'ordre_candidature' => $id);
                $this->model->update($table, 'id', $id, $candidat);
                    
//                Creation de l'email a envoyé'
                $email_setting['charset'] = 'utf-8';
		        $email_setting['mailtype'] = 'html';
                $this->email->initialize($email_setting);
                $this->email->from('info@pfinancespubliques.org', '[PSSFP] DEPOT de CANDIDATURE 13eme PROMOTION 2025/2026');
                $this->email->to($this->input->post('email'));
                $this->email->newline = "\r\n";
            	$this->email->crlf = "\n";
                $this->email->cc('info@pfinancespubliques.org'); 
                $specialite_candidat= $this->model->get_by_id2('specialite', $this->input->post('specialite'));
                $this->email->subject('Enregistrement candidature N°'.$id);
                $email_setting['mailtype'] = 'html';
                                $this->email->initialize($email_setting);
                                $this->email->from('info@pfinancespubliques.org', '[PSSFP] DEPOT de CANDIDATURE 13eme PROMOTION 2025/2026 ');
                                $this->email->to($this->input->post('email'));
                                $this->email->newline = "\r\n";
                            	$this->email->crlf = "\n";
                                $specialite_candidat= $this->model->get_by_id2('specialite', $this->input->post('specialite'));
                                $this->email->subject('Enregistrement candidature N°'.$id);
                                $this->email->message('
                                    <h2>Confirmation de Candidature</h2>
                
                                    <p>Cher(e) ' . $this->input->post('civilite') . ' ' . $this->input->post('nom') . ' ' . $this->input->post('prenom') . ',</p>
                
                                    <p>Nous vous informons que votre candidature a bien été enregistrée avec les détails suivants :</p>
                
                                    <table>
                                        <tr><td><strong>Dossier N°</strong></td><td>: ' . $id . '</td></tr>
                                        <tr><td><strong>N° de téléphone</strong></td><td>: ' . $this->input->post('telephone') . '</td></tr>
                                        <tr><td><strong>Spécialité</strong></td><td>: ' . $specialite_candidat->nom . '</td></tr>
                                        <tr><td><strong>Type de formation</strong></td><td>: ' . $this->input->post('type_etude') . '</td></tr>
                                        <tr><td><strong>Statut</strong></td><td>: ' . $this->input->post('statut_prof') . '</td></tr>
                                        <tr><td><strong>Administration d\'origine</strong></td><td>: ' . $this->input->post('structure') . '</td></tr>
                                        <tr><td><strong>Nationalité</strong></td><td>: ' . $this->input->post('nationalite') . '</td></tr>
                                    </table>
                
                                    <h3>Actions importantes :</h3>
                                    <ul>
                                        <li><a href="' . site_url('impression/imprimer_fiche/' . $id) . '">Télécharger votre fiche de candidature</a></li>
                        		<li><a href="' . site_url('candidature/initupdate/' ) . '">Modifier les informations de votre candidature</a></li>
                                    </ul>
                
                                    <p>Pour toute modification, veuillez utiliser les identifiants suivants :</p>
                                    <ul>
                                        <li><strong>Numéro d\'ordre</strong> : ' . $id . '</li>
                                        <li><strong>N° de téléphone</strong> : ' . $this->input->post('telephone') . '</li>
                                    </ul>
                
                                    <hr>
                
                                    <footer style="color: #666; font-size: 0.9em;">
                                        <p>PSSFP: B.P: 16 578 Yaoundé – Cameroun<br>
                                        Tel.: + (237) 697 921 332<br>
                                             (237) 677 257 272<br>
                                             (237) 671 171 808</p>
                                    </footer>
                                ');

                $this->email->send();

                $this->session->set_flashdata('succes', 'Nous vous informons que votre candidature a bien été enregistrée.<br/> Vous pourrez modifier les informations liées à votre candidature quand bon vous semblera.
                    Pour la modifications .');
                $this->session->set_flashdata('id', $id);
                $this->session->set_flashdata('numordre', $id);
                $this->session->set_flashdata('telephone', $this->input->post('telephone'));
                $this->session->set_flashdata('email', $this->input->post('email'));
                redirect('candidature/viewnumordre');
            }
        }
        $this->template->layout('candidature', $data);
    }

    public function viewnumordre(){
        $data=array();
        $this->template->layout('numOrdreCandidature', $data);
    }
    
    public function initupdate() {
        $this->form_data = new stdclass;
        $this->form_data->numordre = '';
        $this->form_data->telephone = '';
        $submitname = "modifier";
        $data['submitname'] = $submitname;
        $data['action'] = site_url('candidature/verifinitupdate/');
        $this->template->layout('firstformupdate', $data);
    }

    public function verifinitupdate() {
        $table = 'candidats';
        $submitname = "modifier";
        $data['submitname'] = $submitname;
        $numordre = $this->input->post('numordre');
        $phone = $this->input->post('telephone');
        $candidature = $this->model->get_by_id($table, $numordre, 'ordre_candidature')->row();
        if ($candidature == null || $candidature->telephone !== $phone) {
            $this->form_data = new stdclass;
            $this->form_data->numordre = $this->input->post('numordre');
            $this->form_data->telephone = $this->input->post('telephone');
            $data['action'] = site_url('candidature/verifinitupdate/');
            $data['message'] = "Vérifier vos informations";
            $this->template->layout('firstformupdate', $data);
        } else {
            redirect('candidature/update/'.$numordre."/".$phone);
        }
    }
    
    public function marquerdeposer($id_candidat) {
    	$this->load->model('impression_model', '', TRUE);
    	$candidat = array(
                'a_depose' => true
        );
    	$this->model->update("candidats", 'id', $id_candidat, $candidat);
    	redirect('liste');
    }

    public function update($numordre = 0, $phone = '') {
        $table = 'candidats';
        $submitname = "modifier";
        $data['submitname'] = $submitname;
        
        $candidature = $this->model->get_by_id($table, $numordre, 'ordre_candidature')->row();

        $data["specialites"] = $this->model->list_all("specialite")->result();
        $data["pays"] = $this->model->list_all("pays")->result();
        $data['action'] = site_url('candidature/update/'.$numordre."/".$phone);

        $this->form_data = new stdclass;
	$this->form_data->type_etude= $candidature->type_etude;
        $this->form_data->specialite = $candidature->id_specialite;
        $this->form_data->civilite = $candidature->civilite;
        $this->form_data->nom = $candidature->nom;
        $this->form_data->prenom = $candidature->prenom;
        $this->form_data->epouse = $candidature->epouse;
        $this->form_data->nombre_enfant = $candidature->nombre_enfant;
        $date = explode("-", $candidature->date_naissance); //$candidature->date_naissance
        $this->form_data->datenaiss_jj = $date[2];
        $this->form_data->datenaiss_mm = $date[1];
        $this->form_data->datenaiss_yy = $date[0];
        $this->form_data->lieu_de_naissce = $candidature->lieu_de_naissce;
        $this->form_data->nationalite = $candidature->nationalite;
        $this->form_data->paysorigine = $candidature->paysorigine;
        $this->form_data->region_dorigine = $candidature->region_dorigine;
        $this->form_data->dept_dorigine = $candidature->dept_dorigine;
        $this->form_data->sexe = $candidature->sexe;
        $this->form_data->statu_matrimonial = $candidature->statu_matrimonial;
        $this->form_data->nombre_enfant = $candidature->nombre_enfant;
        $this->form_data->langue = $candidature->langue;
        $this->form_data->pays_residence = $candidature->id_pays;
        $this->form_data->adresse_candidat = $candidature->adresse_candidat;
        $this->form_data->ville_residence = $candidature->ville_residence;
        $this->form_data->telephone = $candidature->telephone;
        $this->form_data->telephone2 = $candidature->telephone;
        $this->form_data->email = $candidature->email;
        $this->form_data->emailverif = $candidature->email;
        $this->form_data->nombre_annee_etude_sup = $candidature->nombre_annee_etude_sup;
        $this->form_data->dernier_diplome = $candidature->dernier_diplome;
        $this->form_data->dernier_diplome = $candidature->dernier_diplome;
        $this->form_data->specialite_requise = $candidature->specialite_requise;
        $this->form_data->diplome_requis = $candidature->diplome_requis;
        $this->form_data->diplome_obtenu_a = $candidature->diplome_obtenu_a;
        $this->form_data->annee_optention_diplome = $candidature->annee_optention_diplome;
        $this->form_data->statut_prof = $candidature->statut_prof;
        $this->form_data->structure = $candidature->structure;
        $this->form_data->adresse_structure = $candidature->adresse_structure;
        $this->form_data->telephone_structure = $candidature->telephone_structure;
        $this->form_data->email_structure = $candidature->email_structure;
        $this->form_data->howDidYouKnewUs = $candidature->howDidYouKnewUs;
        //$this->form_data->accepter_condition              Pas besoin d'enregistrer cette variable
        if (isset($_POST[$submitname])) {
            $this->form_validation->set_rules('telephone2', 'Telephone', 'trim|is_unique[candidats.telephone2]');
            //$this->form_validation->set_rules('emailverif', 'Email', 'trim|is_unique[candidats.email]|matches[email]');
            if ($this->form_validation->run() == FALSE) {
                $this->form_data->specialite = $this->input->post('specialite');
                $this->form_data->civilite = $this->input->post('civilite');
                $this->form_data->nom = $this->input->post('nom');
                $this->form_data->prenom = $this->input->post('prenom');
                $this->form_data->epouse = $this->input->post('epouse');
                $this->form_data->nombre_enfant = $this->input->post('nombre_enfant');
                $this->form_data->datenaiss_jj = $this->input->post('datenaiss_jj');
                $this->form_data->datenaiss_mm = $this->input->post('datenaiss_mm');
                $this->form_data->datenaiss_yy = $this->input->post('datenaiss_yy');
                $this->form_data->lieu_de_naissce = $this->input->post('lieu_de_naissce');
                $this->form_data->nationalite = $this->input->post('nationalite');
                $this->form_data->paysorigine = $this->input->post('paysorigine');
                $this->form_data->region_dorigine = $this->input->post('region_dorigine');
                $this->form_data->dept_dorigine = $this->input->post('dept_dorigine');
                $this->form_data->statu_matrimonial = $this->input->post('statu_matrimonial');
                $this->form_data->nombre_enfant = $this->input->post('nombre_enfant');
                $this->form_data->langue = 'Français';
                $this->form_data->pays_residence = $this->input->post('pays_residence');
                $this->form_data->adresse_candidat = $this->input->post('adresse_candidat');
                $this->form_data->ville_residence = $this->input->post('ville_residence');
                $this->form_data->telephone = $this->input->post('telephone');
                $this->form_data->telephone2 = $this->input->post('telephone2');
                $this->form_data->email = $this->input->post('email');
                $this->form_data->emailverif = $this->input->post('emailverif');
                $this->form_data->nombre_annee_etude_sup = $this->input->post('nombre_annee_etude_sup');
                $this->form_data->dernier_diplome = $this->input->post('dernier_diplome');
                $this->form_data->specialite_requise = $this->input->post('specialite_requise');
                $this->form_data->diplome_requis = $this->input->post('diplome_requis');
                $this->form_data->diplome_obtenu_a = $this->input->post('diplome_obtenu_a');
                $this->form_data->annee_optention_diplome = $this->input->post('annee_optention_diplome');
                $this->form_data->statut_prof = $this->input->post('statut_prof');
                $this->form_data->structure = $this->input->post('structure');
                $this->form_data->adresse_structure = $this->input->post('adresse_structure');
                $this->form_data->telephone_structure = $this->input->post('telephone_structure');
                $this->form_data->email_structure = $this->input->post('email_structure');
                $this->form_data->howDidYouKnewUs = $this->input->post('howDidYouKnewUs');
                $data['message'] = 'Des erreurs ont été rencontrées lors de l\'enregistrement de votre fiche<br/> verifier vos informations et corriger les problèmes signalés';
            } else {
            $candidat = array(
                'civilite' => $this->input->post('civilite'),
		'type_etude' => $this->input->post('type_etude'),	
                'nom' => $this->input->post('nom'),
                'prenom' => $this->input->post('prenom'),
                'epouse' => $this->input->post('epouse'),
                'nombre_enfant' => $this->input->post('nombre_enfant'),
                'date_naissance' => implode('-', array($this->input->post('datenaiss_yy'), $this->input->post('datenaiss_mm'), $this->input->post('datenaiss_jj'))),
                'lieu_de_naissce' => $this->input->post('lieu_de_naissce'),
                'nationalite' => $this->input->post('nationalite'),
                'paysorigine' => $this->input->post('paysorigine'),
                'region_dorigine' => $this->input->post('region_dorigine'),
                'dept_dorigine' => $this->input->post('dept_dorigine'),
                'statu_matrimonial' => $this->input->post('statu_matrimonial'),
                'adresse_candidat' => $this->input->post('adresse_candidat'),
                'telephone2' => $this->input->post('telephone2'),
                //'email' => $this->input->post('email'),
                'ville_residence' => $this->input->post('ville_residence'),
                'nombre_annee_etude_sup' => $this->input->post('nombre_annee_etude_sup'),
                'dernier_diplome' => $this->input->post('dernier_diplome'),
                'specialite_requise' => $this->input->post('specialite_requise'),
                'diplome_requis' => $this->input->post('diplome_requis'),
                'diplome_obtenu_a' => $this->input->post('diplome_obtenu_a'),
                'annee_optention_diplome' => $this->input->post('annee_optention_diplome'),
                'statut_prof' => $this->input->post('statut_prof'),
                'structure' => $this->input->post('structure'),
                'adresse_structure' => $this->input->post('adresse_structure'),
                'email_structure' => $this->input->post('email_structure'),
                'howDidYouKnewUs' => $this->input->post('howDidYouKnewUs'),
                'telephone_structure' => $this->input->post('telephone_structure'),
                'langue' => $this->input->post('langue'),
                'id_specialite' => $this->input->post('specialite'),
                'id_pays' => $this->input->post('pays_residence'),
                'pays_residence' => $this->model->get_by_id("pays", $this->input->post('pays_residence'), "id")->row()->nom,
                //'ordre_candidature' => $numordre,
                'date_enregistrement' => date("Y-m-d H:i:s"),
                'sexe' => ($this->input->post('civilite') === "Monsieur") ? "Homme" : "Femme",
                'accepter_condition' => true
            );
            //$this->model->save($table, $candidat);
            $this->model->update($table, 'id', $candidature->id, $candidat);
                
//                Creation de l'email a envoyé'
                $email_setting['charset'] = 'utf-8';
		$email_setting['mailtype'] = 'html';
                $this->email->initialize($email_setting);
                $this->email->from('info@pfinancespubliques.org', '[PSSFP] DEPOT de CANDIDATURE 13eme PROMOTION 2025/2026 ');
                $this->email->to($this->input->post('email'));
                $this->email->newline = "\r\n";
            	$this->email->crlf = "\n";
                $specialite_candidat= $this->model->get_by_id2('specialite', $this->input->post('specialite'));
                $this->email->subject('Enregistrement candidature N°'.$candidature->id);
                $this->email->message('
                    <h2>Confirmation de Candidature</h2>

                    <p>Cher(e) ' . $this->input->post('civilite') . ' ' . $this->input->post('nom') . ' ' . $this->input->post('prenom') . ',</p>

                    <p>Nous vous informons que votre candidature a bien été enregistrée avec les détails suivants :</p>

                    <table>
                        <tr><td><strong>Dossier N°</strong></td><td>: ' . $candidature->id . '</td></tr>
                        <tr><td><strong>N° de téléphone</strong></td><td>: ' . $this->input->post('telephone') . '</td></tr>
                        <tr><td><strong>Spécialité</strong></td><td>: ' . $specialite_candidat->nom . '</td></tr>
                        <tr><td><strong>Type de formation</strong></td><td>: ' . $this->input->post('type_etude') . '</td></tr>
                        <tr><td><strong>Statut</strong></td><td>: ' . $this->input->post('statut_prof') . '</td></tr>
                        <tr><td><strong>Administration d\'origine</strong></td><td>: ' . $this->input->post('structure') . '</td></tr>
                        <tr><td><strong>Nationalité</strong></td><td>: ' . $this->input->post('nationalite') . '</td></tr>
                    </table>

                    <h3>Actions importantes :</h3>
                    <ul>
                        <li><a href="' . site_url('impression/imprimer_fiche/' . $candidature->id) . '">Télécharger votre fiche de candidature</a></li>
                        <li><a href="' . site_url('candidature/initupdate/' ) . '">Modifier les informations de votre candidature</a></li>
                    </ul>

                    <p>Pour toute modification, veuillez utiliser les identifiants suivants :</p>
                    <ul>
                        <li><strong>Numéro d\'ordre</strong> : ' . $candidature->id . '</li>
                        <li><strong>N° de téléphone</strong> : ' . $this->input->post('telephone') . '</li>
                    </ul>

                    <hr>

                    <footer style="color: #666; font-size: 0.9em;">
                        <p>PSSFP: B.P: 16 578 Yaoundé – Cameroun<br>
                        Tel.: + (237) 697 921 332<br>
                             (237) 677 257 272<br>
                             (237) 671 171 808</p>
                    </footer>
                ');

                $this->email->send();

            $this->email->send();

            $this->session->set_flashdata('succes', 'Modification de la Candidature enrégistrée avec succes, votre numéro d\'ordre a été envoyé à votre adresse mail!!');
            
                $this->session->set_flashdata('id', $candidature->ordre_candidature);
                $this->session->set_flashdata('numordre', $candidature->ordre_candidature);
                $this->session->set_flashdata('telephone', $candidature->telephone);
                $this->session->set_flashdata('email', $candidature->email);
                redirect('candidature/viewnumordre');
            }
        }
        $this->template->layout('candidature', $data);
    }
    
    public function initRecupOrdre(){
        $data=array();
        $this->template->layout('formEmailForNumOrdre', $data);
    }

}