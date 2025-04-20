<x-infermerie css='liste_exemption'>
    <form action="">
      <div class="ordree" id="hidden-div">
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
      </div>
    </form>


      <div class="parent">
            <form method="post" action="traitement.php" class="recherch">

          <div >

            <label for="matricule">matricule</label>


            <input type="number" id="matricule" name="matricule">


            <label for="date">date</label>



            <input  type="date" id="date" name="date">

            <label for="motif">motif</label>


            <select name="motif" id="motif">
             <option value="">un arret de travail</option>
             <option value="">une exemption d'effortphysique</option>
              <option value="" >une exemption de rasage de barbe</option>
              <option value="" >une exemption du porte de rangers</option>
              <option value="" >une prolongation de son arret de travail</option>
              <option value="" >une reprise de travail</option>
            </select>


            <button type="submit">envoyer</button>
          </div>
        </form>
        <div class="espace"> </div>
        <div class="tableau">
            <table>
              <tr >
                <th>matricule</th>
                <th>nom</th>
                <th>prénom</th>
                <th>motif</th>
                <th>date</th>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>

            </div>
      </div>
</x-infermerie>
