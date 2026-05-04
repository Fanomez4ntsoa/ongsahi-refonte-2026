<?php  

function sahi_register_form(){  

ob_start();
?>

<div class="max-w-3xl mx-auto p-6 bg-white shadow-lg rounded-lg">

<h2 class="text-2xl font-bold mb-6 text-center">
SAHI – Inscription Bénévole
</h2>
<?php if(!empty($sahi_form_message)){ ?>

<div class="mb-4 p-4 rounded 
<?php echo $sahi_form_status === 'success' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700'; ?>">
    <?php echo $sahi_form_message; ?>
</div>

<?php } ?>
<form id="sahiForm" method="post" enctype="multipart/form-data">

<!-- STEP INDICATOR -->
<div class="flex justify-between mb-6">
<div class="step text-blue-600 font-semibold">1. Informations</div>
<div class="step">2. Axes</div>
<div class="step">3. Détails</div>
<div class="step">4. Validation</div>
</div>

<!-- STEP 1 -->
<div class="form-step">

    <h3 class="text-lg font-semibold mb-4">Informations générales</h3>

    <input name="fullname" placeholder="Nom complet"
    class="w-full border p-2 mb-3 rounded"/>

    <input type="date" name="birthdate"
    class="w-full border p-2 mb-3 rounded"/>

    <input name="nationality" placeholder="Nationalité"
    class="w-full border p-2 mb-3 rounded"/>

    <input name="passport_number"
    placeholder="Numéro de passeport"
    class="w-full border p-2 mb-3 rounded"/>

    <input type="date" name="passport_expiry"
    class="w-full border p-2 mb-3 rounded"/>

    <input name="phone"
    placeholder="Téléphone / WhatsApp"
    class="w-full border p-2 mb-3 rounded"/>

    <input name="email"
    placeholder="Email"
    class="w-full border p-2 mb-3 rounded"/>

    <textarea name="address"
    placeholder="Adresse complète"
    class="w-full border p-2 mb-3 rounded"></textarea>

    <button type="button"
    class="next bg-blue-600 text-white px-4 py-2 rounded">
    Suivant
    </button>

</div>

<!-- STEP 2 -->
<div class="form-step hidden">

    <h3 class="text-lg font-semibold mb-4">Choix des axes</h3>

    <p id="axis-error" class="text-red-600 hidden mb-3">
        Veuillez sélectionner au moins un axe.
    </p>

    <label class="block mb-2">
    <input type="checkbox" name="axes[]" value="1" class="axis-checkbox"/>
    Employabilité Internationale
    </label>

    <label class="block mb-2">
    <input type="checkbox" name="axes[]" value="2" class="axis-checkbox"/>
    Renforcement de Capacité SAHI
    </label>

    <label class="block mb-2">
    <input type="checkbox" name="axes[]" value="3" class="axis-checkbox"/>
    Bienfaisance
    </label>

    <label class="block mb-2">
    <input type="checkbox" name="axes[]" value="4" class="axis-checkbox"/>
    Fundraising
    </label>

    <div class="flex justify-between mt-4">

    <button type="button"
    class="prev bg-gray-500 text-white px-4 py-2 rounded">
    Retour
    </button>

    <button type="button"
    class="next bg-blue-600 text-white px-4 py-2 rounded">
    Suivant
    </button>

    </div>

</div>

<!-- STEP 3 EMPLOYABILITY -->
<div class="form-step hidden axis-section" data-axis="1">

    <h3 class="text-lg font-semibold mb-4">
        Employabilité Internationale
    </h3>

    <input name="country_interest"
    placeholder="Pays d'intérêt"
    class="w-full border p-2 mb-3 rounded"/>

    <input name="province_interest"
    placeholder="Province"
    class="w-full border p-2 mb-3 rounded"/>

    <input name="language_test"
    placeholder="IELTS / TEF / Aucun"
    class="w-full border p-2 mb-3 rounded"/>

    <select name="intention"
    class="w-full border p-2 mb-3 rounded">

    <option>Stage</option>
    <option>Bénévolat</option>
    <option>Emploi</option>

    </select>

    <div class="flex justify-between">

    <button type="button"
    class="prev bg-gray-500 text-white px-4 py-2 rounded">
    Retour
    </button>

    <button type="button"
    class="next bg-blue-600 text-white px-4 py-2 rounded">
    Suivant
    </button>

    </div>

</div>

<!-- RENFORCEMENT CAPACITE -->
<div class="form-step hidden axis-section" data-axis="2">

    <h3 class="text-lg font-semibold mb-4">
    Renforcement de Capacité SAHI
    </h3>

    <textarea name="skills_to_share"
    placeholder="Compétences à transmettre"
    class="w-full border p-2 mb-3 rounded"></textarea>

    <textarea name="skills_to_develop"
    placeholder="Compétences à développer"
    class="w-full border p-2 mb-3 rounded"></textarea>

    <textarea name="training_experience"
    placeholder="Expérience en formation / mentorat"
    class="w-full border p-2 mb-3 rounded"></textarea>

    <input name="weekly_availability"
    placeholder="Disponibilité hebdomadaire"
    class="w-full border p-2 mb-3 rounded"/>

    <select name="interest_area"
    class="w-full border p-2 mb-3 rounded">

    <option value="">Domaine d'intérêt</option>
    <option>Stratégie</option>
    <option>Gestion</option>
    <option>Digital</option>
    <option>Terrain</option>

    </select>

    <div class="flex justify-between">
    <button type="button" class="prev bg-gray-500 text-white px-4 py-2 rounded">Retour</button>
    <button type="button" class="next bg-blue-600 text-white px-4 py-2 rounded">Suivant</button>
    </div>

</div>

<!-- AXE BIENFAISANCE -->
<div class="form-step hidden axis-section" data-axis="3">

    <h3 class="text-lg font-semibold mb-4">
    Axe Bienfaisance
    </h3>

    <textarea name="social_experience"
    placeholder="Expérience en action sociale"
    class="w-full border p-2 mb-3 rounded"></textarea>

    <input name="intervention_zone"
    placeholder="Zone d’intervention souhaitée"
    class="w-full border p-2 mb-3 rounded"/>

    <select name="field_work_capacity"
    class="w-full border p-2 mb-3 rounded">

    <option value="">Travail terrain</option>
    <option>Oui</option>
    <option>Non</option>

    </select>

    <select name="driving_license"
    class="w-full border p-2 mb-3 rounded">

    <option value="">Permis de conduire</option>
    <option>Oui</option>
    <option>Non</option>

    </select>

    <textarea name="references_contact"
    placeholder="Références"
    class="w-full border p-2 mb-3 rounded"></textarea>

    <div class="flex justify-between">
    <button type="button" class="prev bg-gray-500 text-white px-4 py-2 rounded">Retour</button>
    <button type="button" class="next bg-blue-600 text-white px-4 py-2 rounded">Suivant</button>
    </div>

</div>

<!-- FUNDRAISING -->
<div class="form-step hidden axis-section" data-axis="4">

    <h3 class="text-lg font-semibold mb-4">
    Axe Fundraising
    </h3>

    <textarea name="fundraising_experience"
    placeholder="Expérience en levée de fonds"
    class="w-full border p-2 mb-3 rounded"></textarea>

    <textarea name="professional_network"
    placeholder="Réseau professionnel"
    class="w-full border p-2 mb-3 rounded"></textarea>

    <textarea name="fundraising_skills"
    placeholder="Compétences : pitch, grant writing..."
    class="w-full border p-2 mb-3 rounded"></textarea>

    <select name="linkedin_crm"
    class="w-full border p-2 mb-3 rounded">

    <option value="">Maîtrise LinkedIn / CRM</option>
    <option>Débutant</option>
    <option>Intermédiaire</option>
    <option>Avancé</option>

    </select>

    <textarea name="international_donors_experience"
    placeholder="Expérience avec donateurs internationaux"
    class="w-full border p-2 mb-3 rounded"></textarea>

    <div class="flex justify-between">
    <button type="button" class="prev bg-gray-500 text-white px-4 py-2 rounded">Retour</button>
    <button type="button" class="next bg-blue-600 text-white px-4 py-2 rounded">Suivant</button>
    </div>

</div>

<!-- STEP FINAL -->
<div class="form-step hidden">

<h3 class="text-lg font-semibold mb-4">
    Documents
</h3>

<label class="block mb-2">
    Photo d'identité
    <input type="file" name="photo"
    class="w-full border p-2"/>
</label>

<label class="block mb-2">
    CV PDF
    <input type="file" name="cv"
    class="w-full border p-2"/>
</label>

<label class="block mb-4">

<input type="checkbox" required/>

Je comprends que SAHI ne garantit ni visa ni permis de travail.

</label>

<div class="flex justify-between">

<button type="button"
class="prev bg-gray-500 text-white px-4 py-2 rounded">
Retour
</button>

<button 
type="submit"
name="sahi_submit"
class="bg-green-600 text-white px-4 py-2 rounded">
Envoyer
</button>

</div>

</div>

</form>

</div>

<?php

return ob_get_clean();
}
$sahi_form_message = '';
$sahi_form_status = '';
function sahi_handle_volunteer_submission(){

    if(!isset($_POST['sahi_submit'])) return;

    global $wpdb;
    global $sahi_form_message;
    global $sahi_form_status;

    $volunteer_table = $wpdb->prefix . "sahi_volunteers";
    $axes_table = $wpdb->prefix . "sahi_volunteer_axes";

    $upload_dir = wp_upload_dir();

    $photo_url = '';
    $cv_url = '';

    /* PHOTO UPLOAD */

    if(!empty($_FILES['photo']['name'])){

        $photo = $_FILES['photo'];
        $photo_upload = wp_handle_upload($photo, ['test_form'=>false]);

        if(isset($photo_upload['url'])){
        $photo_url = $photo_upload['url'];
        }

    }

    /* CV UPLOAD */

    if(!empty($_FILES['cv']['name'])){

        $cv = $_FILES['cv'];
        $cv_upload = wp_handle_upload($cv, ['test_form'=>false]);

        if(isset($cv_upload['url'])){
        $cv_url = $cv_upload['url'];
        }

    }

    /* INSERT VOLUNTEER */
    try {
        $result = $wpdb->insert($volunteer_table,[

            'fullname' => sanitize_text_field($_POST['fullname']),
            'birthdate' => sanitize_text_field($_POST['birthdate']),
            'nationality' => sanitize_text_field($_POST['nationality']),

            'passport_number' => sanitize_text_field($_POST['passport_number']),
            'passport_expiry' => sanitize_text_field($_POST['passport_expiry']),

            'photo' => $photo_url,

            'address' => sanitize_textarea_field($_POST['address']),
            'phone' => sanitize_text_field($_POST['phone']),
            'email' => sanitize_email($_POST['email']),

            'education_level' => sanitize_text_field($_POST['education_level']),
            'field_of_study' => sanitize_text_field($_POST['field_of_study']),

            'professional_experience' => sanitize_textarea_field($_POST['professional_experience']),
            'cv' => $cv_url,

            'skills' => sanitize_textarea_field($_POST['skills']),
            'languages' => sanitize_textarea_field($_POST['languages']),

            'motivation' => sanitize_textarea_field($_POST['motivation']),
            'motivation_letter' => sanitize_textarea_field($_POST['motivation_letter']),

            'availability' => sanitize_text_field($_POST['availability']),
            'mobility' => sanitize_text_field($_POST['mobility'])

        ]);
        if($result){

            $sahi_form_status = "success";
            $sahi_form_message = "Votre inscription a été envoyée avec succès.";

        }else{

            $sahi_form_status = "error";
            $sahi_form_message = "Erreur lors de l'enregistrement. Veuillez réessayer.";

        }

    }catch(Exception $e){

        $sahi_form_status = "error";
        $sahi_form_message = "Une erreur est survenue.";

    }
    

    $volunteer_id = $wpdb->insert_id;

    if(!empty($_POST['axes'])){

        foreach($_POST['axes'] as $axis){

        $wpdb->insert($axes_table,[

        'volunteer_id'=>$volunteer_id,
        'axis_id'=>intval($axis)

        ]);

        }
    
    }

    if(in_array(1,$_POST['axes'])){

        $table = $wpdb->prefix . "sahi_axis_employability";

        $wpdb->insert($table,[

        'volunteer_id'=>$volunteer_id,
        'country_interest'=>sanitize_text_field($_POST['country_interest']),
        'province_interest'=>sanitize_text_field($_POST['province_interest']),
        'language_test'=>sanitize_text_field($_POST['language_test']),
        'intention'=>sanitize_text_field($_POST['intention'])

        ]);

    }

    if(in_array(2,$_POST['axes'])){

        $table = $wpdb->prefix . "sahi_axis_capacity";

        $wpdb->insert($table,[

        'volunteer_id'=>$volunteer_id,
        'skills_to_share'=>sanitize_textarea_field($_POST['skills_to_share']),
        'skills_to_develop'=>sanitize_textarea_field($_POST['skills_to_develop']),
        'training_experience'=>sanitize_textarea_field($_POST['training_experience']),
        'weekly_availability'=>sanitize_text_field($_POST['weekly_availability'])

        ]);

    }

    if(in_array(3,$_POST['axes'])){

        $table = $wpdb->prefix . "sahi_axis_charity";

        $wpdb->insert($table,[

        'volunteer_id'=>$volunteer_id,
        'social_experience'=>sanitize_textarea_field($_POST['social_experience']),
        'intervention_zone'=>sanitize_text_field($_POST['intervention_zone']),
        'field_work_capacity'=>sanitize_text_field($_POST['field_work_capacity']),
        'driving_license'=>sanitize_text_field($_POST['driving_license'])

        ]);

    }

    if(in_array(4,$_POST['axes'])){

        $table = $wpdb->prefix . "sahi_axis_fundraising";

        $wpdb->insert($table,[

        'volunteer_id'=>$volunteer_id,
        'fundraising_experience'=>sanitize_textarea_field($_POST['fundraising_experience']),
        'professional_network'=>sanitize_textarea_field($_POST['professional_network']),
        'skills'=>sanitize_textarea_field($_POST['fundraising_skills']),
        'linkedin_crm'=>sanitize_text_field($_POST['linkedin_crm'])

        ]);

    }

}

add_shortcode('sahi_register','sahi_register_form');

if(isset($_POST['sahi_submit'])){

    add_action('init','sahi_handle_volunteer_submission');

}