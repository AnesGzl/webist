<x-infermerie css='fiche'>

        <div class="pro">
            <img src="/profile.jpg" alt="photo">
            <div class="info-container">
                <div class="nom aa">
                    <label>Nom:</label>
                    <p>{{ $eleve->nom }}</p>
                </div>
                <div class="prénom aa">
                    <label>Prénom:</label>
                    <p>{{ $eleve->prenom }}</p>
                </div>
                <div class="matricule aa">
                    <label>Matricule:</label>
                    <p>{{ $eleve->matricule }}</p>
                </div>
                <div class="section aa">
                    <label>Section:</label>
                    <p>{{ $eleve->section }}</p>
                </div>
            </div>
        </div>

        <div class="evo">
            <form method="POST" action="{{ route('fiche.update', $convoncu->id) }}">
                @csrf
                @method('PUT')

                <div class="evaluation-section">
                    <h1>Évaluation psychologique</h1>
                    <label for="psy">Psychologue</label>
                    <textarea name="psy" id="psy" placeholder="Entrez votre diagnostic...">{{ optional($convoncu)->psy }}</textarea>

                    <label for="medGen">Médecin générale</label>
                    <textarea name="medGen" id="medGen" placeholder="Entrez votre diagnostic...">{{ optional($convoncu)->medGen }}</textarea>
                </div>

                <div class="evaluation-section">
                    <h1>Évaluation médicale</h1>
                    <label for="chirDent">Chirurgie dentaire</label>
                    <textarea name="chirDent" id="chirDent" placeholder="Entrez votre diagnostic...">{{ optional($convoncu)->chirDent }}</textarea>

                    <label for="avisSpe">Avis spécialisé</label>
                    <textarea name="avisSpe" id="avisSpe" placeholder="Entrez votre diagnostic...">{{ optional($convoncu)->avisSpe }}</textarea>
                </div>

                <input type="submit" value="Enregistrer">
            </form>
        </div>

</x-infermerie>
