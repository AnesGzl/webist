<x-infermerie css='liste_rendezvous'>
    <form action=""><div class="ordree" id="hidden-div">
      <a href="#"><i class="fa-solid fa-x"></i></a>
      <div class="contenu"><p>À: <div class="ordree01"><input type="text" name="" id=""></div></p><hr>
    <p>Objet: <div class="ordree02"><input type="text" name="" id=""></div></p>
    <hr>
    <div class="ordree03">
      <button>convocation par le psychologue</button>
      <button>vaccin</button>
      <button>presence secours</button>
      <button>consultation</button>
    </div>
    </div>
      <div class="envoi">
       <button type="submit"> <i class="fa-solid fa-paper-plane"></i></button><input type="text" class="envoi_input">
      </div>
    </div></form>


    <div class="parent">
        <form method="POST" action="{{ route('liste_rdv.store') }}" class="recherch">
            @csrf

            <div>
                <label for="matricule">Matricule</label>
                <input type="number" id="matricule" name="matricule" required minlength="5" maxlength="5">

                <label for="motif">Motif</label>
                <select name="motif" id="motif" required>
                    <option value="consultation">Consultation</option>
                    <option value="urgences">Urgences</option>
                </select>

                <label for="service">Service médical</label>
                <select name="service" id="service" required>
                    <option value="medecine_generale">Médecine Générale</option>
                    <option value="cardiologie">Cardiologie</option>
                    <option value="pneumologie">Pneumologie</option>
                    <option value="gastroenterologie">Gastro-entérologie</option>
                    <option value="chirurgie_generale">Chirurgie Générale</option>
                    <option value="orthopedie">Orthopédie</option>
                    <option value="neurologie">Neurologie</option>
                    <option value="dermatologie">Dermatologie</option>
                    <option value="gynecologie">Gynécologie</option>
                    <option value="urologie">Urologie</option>
                    <option value="ophtalmologie">Ophtalmologie</option>
                    <option value="orl">ORL (Oto-Rhino-Laryngologie)</option>
                    <option value="psychiatrie">Psychiatrie</option>
                    <option value="radiologie">Radiologie</option>
                    <option value="anesthesie">Anesthésie</option>
                    <option value="reanimation">Réanimation</option>
                </select>

                <label for="date">Date</label>
                <input type="date" id="date" name="date" required>

                <button type="submit">Envoyer</button>
            </div>
        </form>
    </div>


        <div class="espace"> </div>
        <div class="tableau">
            <table>
              <tr >
                <th>matricule</th>
                <th>nom</th>
                <th>prénom</th>
                <th>motif</th>
                <th>service</th>
                <th>date</th>
              </tr>

      </div>
</x-infermerie>
