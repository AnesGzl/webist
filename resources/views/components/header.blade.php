<!-- Header principal -->
<div class="flex items-center justify-between h-full px-6">
    <!-- Profil utilisateur avec contrôles -->
    <div class="flex items-center space-x-4">
        <!-- Avatar et nom -->
        <div class="flex items-center space-x-3">
            <img src="/profile.jpg" alt="Profile" class="h-8 w-8 rounded-full">
            <span class="text-gray-700">{{ auth()->user()->name ?? 'Utilisateur' }}</span>
        </div>

        <!-- Switch thème -->
        <button
            x-data="{ dark: localStorage.getItem('theme') === 'dark' }"
            @click="dark = !dark;
                    localStorage.setItem('theme', dark ? 'dark' : 'light');
                    document.documentElement.setAttribute('data-theme', dark ? 'dark' : 'light')"
            class="text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-200 rounded-lg text-sm p-2.5"
        >
            <i class="fas fa-sun text-xl" :class="{ 'hidden': dark }"></i>
            <i class="fas fa-moon text-xl" :class="{ 'hidden': !dark }"></i>
        </button>

        <!-- Notifications -->
        <div x-data="{ open: false }" class="relative">
            <button @click="open = !open" class="relative p-2 text-gray-500 hover:text-gray-600 dark:text-gray-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
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
                 class="absolute right-0 mt-2 w-80 bg-white dark:bg-gray-800 rounded-lg shadow-lg border dark:border-gray-700">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Notifications</h3>
                    <div class="space-y-4 max-h-96 overflow-y-auto">
                        <!-- Items des notifications -->
                        <div class="flex p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900 dark:text-gray-100">
                                    Nouveau rendez-vous
                                </p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    Un nouveau rendez-vous a été créé
                                </p>
                                <span class="text-xs text-gray-500">Il y a 5 minutes</span>
                            </div>
                        </div>
                        <!-- Autres notifications... -->
                    </div>
                    <!-- Footer -->
                    <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <a href="#" class="block text-sm text-center text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300">
                            Voir toutes les notifications
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Espace réservé pour d'autres éléments de menu à droite si nécessaire -->
    <div class="flex items-center space-x-4">
    </div>
</div>
