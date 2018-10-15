<div class="form-control">
    <div class="form-group">
        <label>Consultation diet:</label>
        <label for="consultation_diet_oui">oui</label>
        <input type="radio" name="consultation_diet" id="consultation_diet_oui" value="oui" required>
        <label for="consultation_diet_non">non</label>
        <input type="radio" name="consultation_diet" id="consultation_diet_non" value="non">
    </div>
    <div class="form-group">
        <label for="debut">Début</label>
        <input type="radio" name="moment_consultation_diet" id="debut" value="debut">
        <label for="milieu">Milieu</label>
        <input type="radio" name="moment_consultation_diet" id="milieu" value="milieu">
        <label for="fin">Fin</label>
        <input type="radio" name="moment_consultation_diet" id="fin" value="fin">
    </div>
    <div class="form-group">
        <label for="nb_consultation_diet">Nombre de consultation diet:</label>
        <input type="text" name="nb_consultation_diet" id="nb_consultation_diet">
    </div>
    <div class="form-group">
        <label>Conseils diététiques:</label>
        <label for="conseil_diététiques_oui">oui</label>
        <input type="radio" name="conseil_diététiques" id="conseil_diététiques_oui" value="oui">
        <label for="complement_nutritionnel_oral_non">non</label>
        <input type="radio" name="conseil_diététiques" id="conseil_diététiques_non" value="non">
    </div>
    <div class="form-group">
        <label>CNO:</label>
        <label for="complement_nutritionnel_oral_oui">oui</label>
        <input type="radio" name="complement_nutritionnel_oral" id="complement_nutritionnel_oral_oui" value="oui" required>
        <label for="complement_nutritionnel_oral_non">non</label>
        <input type="radio" name="complement_nutritionnel_oral" id="complement_nutritionnel_oral_non" value="non">
        <label for="nombre_conseils_dietetic">Nbre:</label>
        <input type="text" name="nombre_conseils_dietetic" id="nombre_conseils_dietetic">
    </div>
    <div class="form-group">
        <label>Indication nutrition artificielle:</label>
        <label for="indication_nutition_artificielle_oui">oui</label>
        <input type="radio" name="indication_nutition_artificielle" id="indication_nutition_artificielle_oui" value="oui" required>
        <label for="indication_nutition_artificielle_non">non</label>
	<input type="radio" name="indication_nutition_artificielle" id="indication_nutition_artificielle_non" value="non">
        <label for="indication_nutition_artificielle_nsp">NSP</label>
        <input type="radio" name="indication_nutition_artificielle" id="indication_nutition_artificielle_nsp" value="nsp">
    </div>
    <div class="form-group">
        <label>Acceptation nutrition artificielle:</label>
        <label for="acceptation_nutition_artificielle_oui">oui</label>
        <input type="radio" name="acceptation_nutition_artificielle" id="acceptation_nutition_artificielle_oui" value="oui">
        <label for="acceptation_nutition_artificielle_oui">non</label>
        <input type="radio" name="acceptation_nutition_artificielle" id="indication_nutition_artificielle_non" value="non">
    </div>
    <div class="form-group">
        <label>Type:</label>
        <label for="type_nutrition_enteral">entérale</label>
        <input type="checkbox" name="type_nutrition" id="type_nutrition_enteral" value="enterale">
        <label for="type_nutrition_parenterale">parentérale</label>
        <input type="checkbox" name="type_nutrition" id="type_nutrition_parenterale" value="parenteral">
    </div>
    <div class="form-group" id="ent">
        <label for="nutrition_enteral_sng">SNG</label>
        <input type="radio" name="nutrition_enteral" id="nutrition_enteral_sng" value="sng">
        <label for="nutrition_enteral_gpe">GPE</label>
        <input type="radio" name="nutrition_enteral" id="nutrition_enteral_gpe" value="gpe">
    </div>
    <div class="form-group" id="olimel">
        <label for="nutrition_parenteral_n7">N7</label>
        <input type="radio" name="nutrition_enteral" id="nutrition_parenteral_n7" value="n7">
        <label for="nutrition_parenteral_n9">N9</label>
        <input type="radio" name="nutrition_enteral" id="nutrition_parenteral_n9" value="n9">
        <label for="nutrition_parenteral_vitamines">Avec vitamines:</label>
        <input type="checkbox" name="nutrition_parenteral_vitamines" id="nutrition_parenteral_vitamines">
    </div>
    <div class="form-group">
        <label>Périkabiven:</label>
        <label for="perikabiven_oui">oui</label>
        <input type="radio" name="perikabiven" id="perikabiven_oui" value="oui">
        <label for="perikabiven_non">non</label>
        <input type="radio" name="perikabiven" id="perikabiven_non" value="non">
    </div>
    <div class="form-group">
        <label>Adaptation progressive des doses:</label>
        <label for="adapatation_progressive_des_doses_oui">oui</label>
        <input type="radio" name="adapatation_progressive_des_doses" id="adapatation_progressive_des_doses_oui" value="oui">
        <label for="adapatation_progressive_des_doses_non">non</label>
        <input type="radio" name="adapatation_progressive_des_doses" id="adapatation_progressive_des_doses_non" value="non">
    </div>
    <div class="form-group">
        <label for="remarques">Cause refus (si non), ou autres remarques:</label><br>
        <textarea name="remarques" id="remarques" style="width: 100%"></textarea>
    </div>
</div>
