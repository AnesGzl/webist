<!-- Header principal -->
<div class="flex items-center justify-end h-full px-6 bg-white dark:bg-gray-800">
    <!-- Profil utilisateur avec contrôles -->
    <div class="flex items-center space-x-6">
        <!-- Notifications -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="relative p-2 rounded-lg text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200 transition-colors duration-200">
                <span class="absolute -top-1 -right-1 flex h-4 w-4">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-red-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-red-500 text-xs text-white justify-center items-center">3</span>
                </span>
                <i class="fa-regular fa-bell text-xl"></i>
            </button>

            <!-- Menu dropdown des notifications -->
            <div x-show="open"
                 @click.away="open = false"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-75"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-95"
                 class="absolute right-0 mt-2 w-80 rounded-lg bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 shadow-lg">
                <div class="p-4">
                    <h3 class="text-lg font-semibold mb-4 text-gray-900 dark:text-gray-100">Notifications</h3>
                    <div class="space-y-4 max-h-96 overflow-y-auto">
                        <!-- Items des notifications -->
                        <div class="flex p-3 rounded-lg bg-gray-50 dark:bg-gray-700">
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Nouveau rendez-vous
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    Un nouveau rendez-vous a été créé
                                </p>
                                <span class="text-xs text-gray-500 dark:text-gray-500">Il y a 5 minutes</span>
                            </div>
                        </div>

                        <!-- Exemple d'autres notifications -->
                        <div class="flex p-3 rounded-lg bg-gray-50 dark:bg-gray-700">
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Message reçu
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    Vous avez reçu un nouveau message
                                </p>
                                <span class="text-xs text-gray-500 dark:text-gray-500">Il y a 10 minutes</span>
                            </div>
                        </div>

                        <div class="flex p-3 rounded-lg bg-gray-50 dark:bg-gray-700">
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Rappel
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400">
                                    N'oubliez pas votre réunion à 14h
                                </p>
                                <span class="text-xs text-gray-500 dark:text-gray-500">Il y a 1 heure</span>
                            </div>
                        </div>
                    </div>
                    <!-- Footer -->
                    <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="#" class="block text-sm text-center text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition-colors duration-200">
                            Voir toutes les notifications
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Switch thème -->
        <button id="theme-toggle" 
                class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
            <i class="fas fa-sun text-xl dark:hidden"></i>
            <i class="fas fa-moon text-xl hidden dark:block"></i>
        </button>

        <!-- Bouton paramètres -->
        <button class="text-gray-600 hover:text-gray-800 dark:text-gray-400 dark:hover:text-gray-200 transition-colors duration-200">
            <i class="fas fa-cog text-xl"></i>
        </button>

        <!-- Avatar et nom -->
        <div class="flex items-center space-x-2">
            <img src="/profile.jpg" alt="Profile" class="h-8 w-8 rounded-full">
            <span class="text-gray-700 dark:text-gray-200">{{ auth()->user()->name ?? 'Utilisateur' }}</span>
        </div>
    </div>
</div>

<script>
    // Script pour le changement de thème
    const themeToggleBtn = document.getElementById('theme-toggle');
    const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
    const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');

    themeToggleBtn.addEventListener('click', () => {
        document.body.classList.toggle('dark');

        // Gérer l'affichage des icônes
        if (document.body.classList.contains('dark')) {
            themeToggleLightIcon.classList.remove('hidden');
            themeToggleDarkIcon.classList.add('hidden');
        } else {
            themeToggleLightIcon.classList.add('hidden');
            themeToggleDarkIcon.classList.remove('hidden');
        }
    });
</script>
