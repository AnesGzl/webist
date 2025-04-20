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
            <form method="post" action="traitement.php" class="recherch">

          <div >

             <label for="matricule" > matricule</label>


             <input type="number" id="matricule" name="matricule">




            <label for="motif">motif</label>


            <select name="motif" id="motif">
             <option value="">consultation</option>
             <option value="">urgences</option>

            </select>

                <label for="service">Service médical :</label>
<select name="service" id="service">
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
<label for="date" class="moodifier" >date</label>



<input  type="date" id="date" name="date">



</x-infermerie>
