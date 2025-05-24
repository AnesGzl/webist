<!-- Menu de rendez-vous avec sous-menu -->
<div x-data="{ rdvOpen: false }" class="relative h-full flex flex-col">
    <div class="flex-1 space-y-2">
        <!-- Rendez-vous -->
        <button @click="rdvOpen = !rdvOpen" class="flex items-center w-full p-3 text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
            <i class="fa-solid fa-calendar-check w-5 h-5"></i>
            <span class="ml-3">Rendez-vous</span>
            <i class="fa-solid fa-chevron-down ml-auto" :class="{ 'rotate-180': rdvOpen }"></i>
        </button>

        <div x-show="rdvOpen" class="pl-4 mt-1 space-y-1">
            <a href="{{ route('liste_rdv.create') }}" class="flex items-center p-3 text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                <i class="fa-solid fa-plus w-5 h-5"></i>
                <span class="ml-3">Nouveau rendez-vous</span>
            </a>
            <a href="{{ route('liste_rdv.index') }}" class="flex items-center p-3 text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                <i class="fa-solid fa-list w-5 h-5"></i>
                <span class="ml-3">Liste des rendez-vous</span>
            </a>
        </div>

        <!-- Liste des patients -->
        <a href="{{ route('patients.index') }}" class="flex items-center p-3 text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
            <i class="fa-solid fa-hospital-user w-5 h-5"></i>
            <span class="ml-3">Liste des patients</span>
        </a>

        <!-- Compte rendu médical -->
        <a href="{{ route('compt') }}" class="flex items-center p-3 text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
            <i class="fa-solid fa-notes-medical w-5 h-5"></i>
            <span class="ml-3">Compte rendu médical</span>
        </a>

        <!-- Liste des convoqués -->
        <a href="{{ route('liste_convoncu') }}" class="flex items-center p-3 text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
            <i class="fa-solid fa-user-clock w-5 h-5"></i>
            <span class="ml-3">Liste des convoqués</span>
        </a>

        <!-- Menu des exemptions -->
        <div x-data="{ exemptionOpen: false }">
            <button @click="exemptionOpen = !exemptionOpen" class="flex items-center w-full p-3 text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                <i class="fa-solid fa-user-shield w-5 h-5"></i>
                <span class="ml-3">Exemptions</span>
                <i class="fa-solid fa-chevron-down ml-auto" :class="{ 'rotate-180': exemptionOpen }"></i>
            </button>

            <div x-show="exemptionOpen" class="pl-4 mt-1 space-y-1">
                <a href="{{ route('exemptions.create') }}" class="flex items-center p-3 text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                    <i class="fa-solid fa-plus w-5 h-5"></i>
                    <span class="ml-3">Nouvelle exemption</span>
                </a>
                <a href="{{ route('exemptions.index') }}" class="flex items-center p-3 text-gray-600 dark:text-gray-300 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700">
                    <i class="fa-solid fa-list w-5 h-5"></i>
                    <span class="ml-3">Liste des exemptions</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Déconnexion en bas -->
    <form method="POST" action="{{ route('logout') }}" class="mt-auto">
        @csrf
        <button type="submit" class="w-full flex items-center p-3 text-red-600 hover:text-red-800 dark:text-red-500 dark:hover:text-red-400 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
            <i class="fa-solid fa-sign-out-alt w-5 h-5"></i>
            <span class="ml-3">Déconnexion</span>
        </button>
    </form>
</div>

