<div class="form-control">
    <div class="form-group">
        <label>Période:</label>
        <select name="periode_mois" id="periode_mois">
            <option value="juin">Juin</option>
            <option value="decembre">Décembre</option>
        </select>
        <select name="periode_annee" id="periode_annee">
            <option value="2016">2016</option>
            <option value="2017">2017</option>
            <option value="2018">2018</option>
        </select>
    </div>
    <div class="form-group">
        <label for="nom">Nom: </label>
        <input type="text" name="nom" id="nom" required>
    </div>
    <div class="form-group">
        <label for="prenom">Prénom: </label>
        <input type="text" name="prenom" id="prenom" required>
    </div>
    <div class="form-group">
        <label for="date_de_naissance">Date de naissance: </label>
        <input type="date" name="date_de_naissance" id="date_de_naissance" required>
    </div>
    <div class="form-group">
        <label for="sexe">Sexe</label>
        <select name="sexe" id="sexe">
            <option value="femme">Femme</option>
            <option value="homme">Homme</option>
        </select>
    </div>
    <div class="form-group">
        <label for="date_d_entree">Date d'entrée: </label>
        <input type="date" name="date_d_entree" id="date_d_entree">
    </div>
    <div class="form-group">
        <label for="date_de_sortie">Date de sortie: </label>
        <input type="date" name="date_de_sortie" id="date_de_sortie">
    </div>
    <div class="form-group">
        <label for="duree">Durée: </label>
        <input type="text" name="duree" id="duree" disabled> jour(s)
        <input type="hidden" name="duree_hospit" id="duree_hospit">
    </div>
    <div class="form-group">
        <label for="onco_hemato">Onco/Hémato/Hébergé</label>
        <select name="onco_hemato" id="onco_hemato">
            <option value="onco">Oncologie</option>
            <option value="hemato">Hématologie</option>
            <option value="heberge">Hébergé</option>
        </select>
    </div>
    <input type="hidden" name="age" id="age">
</div>
