<div class="form-control">
    <div class="form-group">
        <label for="taille">Taille: </label>
        <input type="text" name="taille" id="taille"> cm
    </div>
    <div class="form-group">
        <label for="poids_init">Poids initial: </label>
        <input type="text" step="0.01" name="poids_init" id="poids_init"> kg
    </div>
    <div class="form-group">
        <label for="date_poids_init">Le: </label>
        <input type="date" name="date_poids_init" id="date_poids_init">
    </div>
    <div class="form-group">
        <label for="poids_entree">Poids d'entrée: </label>
        <input type="text" step="0.01" name="poids_entree" id="poids_entree"> kg
    </div>
    <div class="form-group">
        <label for="poids_sortie">Poids de sortie: </label>
        <input type="text" step="0.01" name="poids_sortie" id="poids_sortie"> kg
    </div>
    <div class="form-group">
        <label for="nb_pesees">Nb de pesées:</label>
        <input type="text" step="1" name="nb_pesees" id="nb_pesees">
    </div>
    <div class="form-group">
        <label for="imc">IMC:</label>
        <input type="text" step="1" name="imc" id="imc">
    </div>
    <div class="form-group">
        <label for="perte_de_poids">Perte de poids:</label>
        <input type="text" step="0.01" name="perte_de_poids" id="perte_de_poids" min="0" max="100">%
    </div>
    <div class="form-group">
        <label for="m1">M1</label>
        <input type="radio" name="indice_poids" id="m1" value="m1">
        <label for="m3">M3</label>
        <input type="radio" name="indice_poids" id="m3" value="m3">
        <label for="m7">M7</label>
        <input type="radio" name="indice_poids" id="m7" value="m7">
    </div>
</div>
