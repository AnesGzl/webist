<x-infermerie css='liste_convoncu'>
    <div class="container mx-auto">
        <div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">
            <div class="p-6">
                <h1 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">Liste des convoqués</h1>


   <div class="mb-6">
    <div class="relative">
        <input
            type="text"
            id="search"
            name="search"
            placeholder="Rechercher un étudiant par matricule, nom ou prénom..."
            value="{{ request('search') }}"
            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-blue-500 focus:border-transparent dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300"
        >
        <div class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>
        <div id="results-container" class="mt-2 absolute w-full z-50"></div>
    </div>
</div>
<script>
// Remplacez le script existant par celui-ci
let searchTimeout = null;

document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');

    // Fonction pour effectuer la recherche
    function performSearch() {
        const searchTerm = searchInput.value.trim();
        const resultsContainer = document.getElementById('results-container');

        // Ne rien faire si la recherche est vide
        if (searchTerm.length === 0) {
            resultsContainer.innerHTML = '';
            return;
        }

        // Afficher un indicateur de chargement
        resultsContainer.innerHTML = '<div class="text-center py-2 bg-white dark:bg-gray-800 shadow-lg rounded-lg">Recherche en cours...</div>';

        // Construire l'URL pour la recherche
        // Utiliser directement l'URL actuelle plutôt que route() pour éviter les problèmes
        const url = new URL(window.location.href);
        url.searchParams.set('search', searchTerm);

        // Récupérer le jeton CSRF
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Exécuter la requête AJAX avec le jeton CSRF
        fetch(url.toString(), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken  // Ajouter le jeton CSRF
            }
        })
        .then(response => {
            // Vérifier que la réponse est OK
            if (!response.ok) {
                throw new Error('Réponse réseau non OK: ' + response.status);
            }
            return response.json();
        })
        .then(data => {
            // Vérifier que data est un tableau ou un objet avec une propriété data
            let etudiants = data;
            if (!Array.isArray(data)) {
                if (data.data && Array.isArray(data.data)) {
                    etudiants = data.data;
                } else {
                    console.error('Format de données inattendu:', data);
                    throw new Error('Format de données inattendu');
                }
            }

            // Générer le HTML des résultats
            if (etudiants.length === 0) {
                resultsContainer.innerHTML = '<div class="text-center py-2 bg-white dark:bg-gray-800 shadow-lg rounded-lg">Aucun résultat trouvé</div>';
            } else {
                let html = '<div class="bg-white dark:bg-gray-800 shadow-lg rounded-lg overflow-hidden">';
                html += '<table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">';
                html += '<thead class="bg-gray-50 dark:bg-gray-700">';
                html += '<tr>';
                html += '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Matricule</th>';
                html += '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nom</th>';
                html += '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Prénom</th>';
                html += '<th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Section</th>';
                html += '</tr>';
                html += '</thead>';
                html += '<tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">';

                etudiants.forEach(etudiant => {
                    // S'assurer que les propriétés existent avant de les utiliser
                    const matricule = etudiant.matricule || '';
                    const nom = etudiant.nom || '';
                    const prenom = etudiant.prenom || '';
                    const section = etudiant.section || '';
                    const id = etudiant.id || '';

                    // Construire l'URL de redirection de manière sécurisée - Utiliser une URL absolue complète
                    const baseUrl = window.location.origin;
                    const ficheUrl = `${baseUrl}/fiche/${id}`;

                    html += `<tr class="hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer" onclick="window.location='${ficheUrl}'">`;
                    html += `<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">${matricule}</td>`;
                    html += `<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">${nom}</td>`;
                    html += `<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">${prenom}</td>`;
                    html += `<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">${section}</td>`;
                    html += `</tr>`;
                });

                html += '</tbody>';
                html += '</table>';
                html += '</div>';

                resultsContainer.innerHTML = html;
            }
        })
        .catch(error => {
            resultsContainer.innerHTML = '<div class="text-red-500 py-2 bg-white dark:bg-gray-800 shadow-lg rounded-lg">Erreur lors de la recherche.</div>';
            console.error('Erreur de recherche:', error);
        });
    }

    // Événement de saisie avec délai d'une seconde
    searchInput.addEventListener('input', function() {
        // Effacer le timeout précédent
        if (searchTimeout) {
            clearTimeout(searchTimeout);
        }

        // Configurer un nouveau timeout
        searchTimeout = setTimeout(performSearch, 1000);
    });

    // Cacher les résultats quand on clique ailleurs
    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !document.getElementById('results-container').contains(e.target)) {
            document.getElementById('results-container').innerHTML = '';
        }
    });

    // Empêcher la soumission du formulaire parent si présent
    const parentForm = searchInput.closest('form');
    if (parentForm) {
        parentForm.addEventListener('submit', function(e) {
            e.preventDefault();
        });
    }

    // Effectuer une recherche initiale si une valeur est déjà présente
    if (searchInput.value.trim().length > 0) {
        performSearch();
    }
});
</script>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Matricule</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Nom</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Prénom</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Section</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-800">
                            @forelse($convoncus as $convoncu)
                                <tr onclick="window.location='{{ route('fiche.show', $convoncu->id) }}'"
                                    class="hover:bg-gray-50 dark:hover:bg-gray-700 cursor-pointer">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                        {{ $convoncu->matricule }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                        {{ $convoncu->nom }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                        {{ $convoncu->prenom }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">
                                        {{ $convoncu->section }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500 dark:text-gray-400">
                                        Aucun étudiant convoqué trouvé
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($convoncus->hasPages())
                    <div class="mt-4">
                        {{ $convoncus->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-infermerie>
