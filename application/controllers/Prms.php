<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prms extends CI_Controller {
		public function __construct() {
				parent::__construct();

					}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */


  public function create_case_existing()
  {
    $this->load->model('Prms_model');
    $patient_ID = $this->input->post('patient_id');
    $physician = $this->input->post('physician_id');
    $last_case_id = $this->Prms_model->create_new_case($patient_ID, $physician);
    if($last_case_id)
    {
      $data['patient_ID'] = $patient_ID;
      $data['last_case_id'] = $last_case_id; 
      $this->load->view('prms/medical_history', $data);
    }
    else
    {
      $error = $this->db->error();
    }
  }

  public function view_id($last_case_id)
  {
    $this->load->view('prms/profiling', $last_case_id);
  }

	public function profiling()
  {
    $this->load->view('prms/patient');
  }

  public function process_profiling()
  {
    $this->load->model('Prms_model');
    $data = array(
                  'patient_ID'  => NULL,
                  'last_name'   => $this->input->post('surname'),
                  'given_name'   => $this->input->post('given_name'),
                  'middle_initial'   => $this->input->post('middle_initial'),
                  'occupation'   => $this->input->post('occupation'),
                  'date_of_birth'   => $this->input->post('date_of_birth'),
                  'contact_num'   => $this->input->post('contact_num'),
                  'street_no'   => $this->input->post('street_no'),
                  'brgy'   => $this->input->post('barangay'),
                  'city'   => $this->input->post('city'),
                  'emergency_contact_name'   => $this->input->post('emergency_contact'),
                  'emergency_contact_num'   => $this->input->post('emergency_num'),
                  'emergency_contact_address'   => $this->input->post('emergency_contact_address'),
                  'date_registered' => date('Y-m-d')
                 );

    $profiling = $this->Prms_model->profiling($data);
    $physician = 1;
    $patient_ID = $profiling;
    $last_case_id = $this->Prms_model->create_new_case($patient_ID, $physician);
    $data['patient_ID'] = $patient_ID;
    $data['last_case_id'] = $last_case_id;
    $this->load->view('prms/medical_history', $data);
  }

  public function medical_history()
  {
    $this->load->model('Prms_model');
    $patient_ID = $this->input->post('patient_ID');
    $data = array(
                        'Num' =>NULL,
                        'Patient_ID' => $patient_ID,
                        'case_id' => $this->input->post('case_id'),
                        'date' =>  date("Y-m-d"),
                        'heent_epilepsy_convulsion' =>  $this->input->post('epilepsy'),
                        'heent_severe_headache_dizzines' =>  $this->input->post('severeheadache'),
                        'heent_visual_disturbance' =>  $this->input->post('visualdisturbance'),
                        'heent_yellowish_discoloration' =>  $this->input->post('yellowdiscoloration'),
                        'heent_enlarged_thyroid' =>  $this->input->post('enlargedthyroid'),
                        'ch_severe_chest_pain' =>  $this->input->post('severechestpain'),
                        'ch_easy_fatigability' =>  $this->input->post('easyfatig'),
                        'ch_axillary_masses' =>  $this->input->post('axillarymasses'),
                        'ch_nipple_discharge' =>  $this->input->post('nippledischarge'),
                        'ch_systolic140_and_above' =>  $this->input->post('systolic'),
                        'ch_diastolic90_and_above' =>  $this->input->post('diastolic'),
                        'ch_family_history_of_CVA ' =>  $this->input->post('familyhistory'),
                        'abdomen_mass_in_abdomen' =>  $this->input->post('massinabdomen'),
                        'abdomen_gallbladder_disease' =>  $this->input->post('historyofgallbladder'),
                        'abdomen_liver_disease' =>  $this->input->post('historyofliver'),
                        'abdomen_previous_surgical_operation' =>  $this->input->post('prevsurgical'),
                        'extremities_severe_varicositles' =>  $this->input->post('severevaricosities'),
                        'extremities_deformities' =>  $this->input->post('deformities'),
                        'extremities_severe_pain_in_legs' => $this->input->post('swellingorsevereinlegs'),
                        'skin_yellowish_discoloration' =>  $this->input->post('yellowish'),
                        'history_smoking' =>  $this->input->post('smoking'),
                        'history_allergies' => $this->input->post('allergies'),
                        'history_drug_intake' => $this->input->post('drugintake'),
                        'history_drug_abuse' => $this->input->post('drugabuse'),
                        'history_STD' => $this->input->post('std'),
                        'history_anemia' => $this->input->post('anemia'),
                        'history_diabetes' => $this->input->post('diabetes'),
                        'oh_fullterm' => $this->input->post('fullterm'),
                        'oh_preterm' => $this->input->post('preterm'),
                        'oh_abortion' => $this->input->post('abortion'),
                        'oh_living_children' => $this->input->post('livingchildren'),
                        'oh_last_delivery_date' => $this->input->post('datelastdelivery'),
                        'oh_last_delivery_type' =>  $this->input->post('typeslastdelivery'),
                        'oh_age_of_gestation_weeks' => $this->input->post('agegestation'),
                        'oh_expected_date_of_confinement' => $this->input->post('dateconfinement'),
                        'oh_previous_CS' => $this->input->post('prevcs'),
                        'oh_3_consec_miscarriages' => $this->input->post('consecmiss'),
                        'oh_ectopic_pregnancy' => $this->input->post('ectopicpregnancy'),
                        'oh_post_partum_hemor' => $this->input->post('postpartum'),
                        'oh_forcep_delivery' => $this->input->post('forcepdelivery'),
                        'oh_pregnancy_induced_hypertension' => $this->input->post('pih'),
                );
    
        $medical_history_result = $this->Prms_model->medical_history($data); 
        if($medical_history_result)
        {
          $data1['patient_ID'] = $patient_ID;
          $data1['last_case_id'] = $this->input->post('case_id');
          $this->load->view('prms/physical_examination', $data1);
        }
        else
        {
          $error = $this->db->error();
        }
  }

  public function physical_examination()
  {
    $this->load->model('Prms_model');
    $data = array(
      'Num' => NULL,
      'Patient_ID' => $this->input->post('patient_id'),
      'case_id' => $this->input->post('case_id'),
      'date' => date('Y-m-d'), 
      'height' => $this->input->post('height'),
      'weight' => $this->input->post('weight'),
      'blood_pressure' => $this->input->post('blood_pressure'),
      'blood_type' => $this->input->post('blood_type'),
      'conjunctiva_pale' => $this->input->post('pale'),
      'conjunctiva_yellowish' => $this->input->post('yellowish'),
      'neck_enlarged_thyroid' => $this->input->post('enlargedthyroid'),
      'neck_enlarged_lymph_nodes  ' => $this->input->post('enlargedlympnodes'),
      'breast_mass  ' => $this->input->post('mass'),
      'breast_nipple_discharge  ' => $this->input->post('nippledischarged'),
      'breast_dimpling  ' => $this->input->post('skinorangepeel'),
      'breast_enlarged_axillary_lymph_nodes ' => $this->input->post('enlargedaxilarylympnodes'),
      'thorax_abnormal_cardiac_rate' => $this->input->post('abnormalheartsound'),
      'thorax_abnormal_respiratory_rate' => $this->input->post('abnormalbreathsounds'),
      'abdomen_pe_fundic_height' => $this->input->post('abdomenheight'),
      'abdomen_pe_fetal_heart_tone' => $this->input->post('fetalhearttone'),
      'abdomen_pe_fetal_movement' => $this->input->post('fetalmovement'),
      'lm_presenting_part' => $this->input->post('presentingpart'),
      'lm_position_of_fetal_back' => $this->input->post('positionfetalback'),
      'lm_fetal_parts' => $this->input->post('fetalparts'),
      'lm_presenting_part_status' => $this->input->post('statuspresenntingpart'),
      'lm_uterine_activity' => $this->input->post('urineactivity'),
      'perineum_scars' => $this->input->post('scars'),
      'perineum_warts_or_mass' => $this->input->post('wartsmass'),
      'perineum_laceration' => $this->input->post('laceration'),
      'perineum_severe_varicosities' => $this->input->post('severevaricosities'),
      'vagina_bartholins_cyst' => $this->input->post('bartholinscyst'),
      'vagina_warts_gland_discharge' => $this->input->post('wartsskenesgland'),
      'vagina_cystocele_or_rectocoele' => $this->input->post('crystocoele'),
      'vagina_purulant_discharge' => $this->input->post('purulentdischarged'),
      'vagina_erosion_or_foreign_body' => $this->input->post('eroslon'),
      'cervix_consistency' => $this->input->post('consistency'),
      'cervix_dilatation' => $this->input->post('dilation'),
      'cervix_palpable_presenting_part' => $this->input->post('palpablepresentingpart'),
      'cervix_status_BagOfWater' => $this->input->post('statusofbagofwater'),
      'impression' => $this->input->post('impression'),
      'plans' => $this->input->post('plans'),

      );
        $physical_examination_result = $this->Prms_model->physical_examination($data); 
        if($physical_examination_result)
        {
          $this->session->set_flashdata('new_case', 'New case is added!');
          redirect('Main/dashboard');
        }
        else
        {
          $error = $this->db->error();
        }
  }

  public function case_list()
  {
    $this->load->model('Prms_model');
    //$data['case_details'] = $this->Prms_model->get_patient_names();
    $data['case_details'] = $this->Prms_model->get_case_list();
    $this->load->view('prms/case_list', $data);
  }

  public function patient_list()
  {  
    $this->load->model('Prms_model');
    $data['dt_li'] = $this->Prms_model->patient_list();
    $this->load->view('prms/patient_list', $data);
  }

  public function patient_timeline($patient_ID)
  {
    $this->load->model('Prms_model');
    $data['patient_information'] = $this->Prms_model->get_patient_profile($patient_ID);
    $data['cases'] = $this->Prms_model->get_patient_cases($patient_ID);
    $this->load->view('prms/patient_profile', $data);
  }

  public function prenatal($patient_id, $case_id)
  {
    $data['patient_ID'] = $patient_id;
    $data['last_case_id']  = $case_id;
    $this->load->view('prms/physical_examination', $data);
  }

  public function drop_case($case_id)
  {
    $this->load->model('Prms_model');
    $result = $this->Prms_model->drop_case($case_id);
    if($result)
    {
      $this->session->set_flashdata('delete', 'Case successfully deleted. ');
      $this->load->view('prms/cases');
    }
  }

  public function case_timeline($case_id)
  {
    $this->load->model('Prms_model');
    $data['prenatal'] = $this->Prms_model->get_prenatal_case_timeline($case_id);
    $data['medicalhistory'] = $this->Prms_model->get_medical_history_case_timeline($case_id);
    $data['case_details'] = $this->Prms_model->get_case_details($case_id);
    $this->load->view('prms/case_timeline', $data);
  }

  public function pe_result($Num)
  {
    $this->load->model('Prms_model');
    $data['prenatal'] = $this->Prms_model->get_pe_result($Num);
    $this->load->view('prms/Physical_examination_result', $data);
  }

  public function medicalhistory_result($Num)
  {
    $this->load->model('Prms_model');
    $data['mh_result'] = $this->Prms_model->get_mh_result($Num);
    $this->load->view('prms/medical_history_result', $data);
  }

  public function datatable_example()
  {
    $this->load->model('Prms_model');
    $data['dt_ex'] = $this->Prms_model->dt_ex();
    $this->load->view('prms/datatables', $data);
  }

  public function print_report()
  {
    $this->load->model('Prms_model');
    $data['dt_re'] = $this->Prms_model->dt_re();
    $this->load->view('report/v_report', $data);
  }

  public function infant_list()
  {
    $this->load->model('Prms_model');
    $data['infants'] = $this->Prms_model->infant_list();
    $this->load->view('prms/infant_list', $data);
  }

  public function infant_profile($infant_id)
  {
    $this->load->model('Prms_model');
    $data['infant_info'] = $this->Prms_model->infant_profile($infant_id); 
    $this->load->view('prms/infant_profile', $data);
  }


}