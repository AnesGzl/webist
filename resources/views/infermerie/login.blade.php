<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Infirmerie</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="shortcut icon" href="logo.png">
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <div class="left">
        <div class="feature"><i class="fa-solid fa-notes-medical"></i> Gestion numérique des soins et des élèves</div>
        <div class="feature"><i class="fa-solid fa-user-doctor"></i> Suivi médical centralisé des élèves</div>
        <div class="feature"><i class="fa-solid fa-shield-halved"></i> Confidentialité et sécurité des données</div>
        <div class="feature"><i class="fa-solid fa-display"></i> Interface simple et ergonomique</div>

        <div class="intro">
            <h2>Introduction des nouvelles fonctionnalités</h2>
            <p>L'application propose de nouvelles fonctionnalités pour améliorer la santé et la préparation physique des étudiants militaires.</p>
        </div>
    </div>

    <div class="right">
        <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 dark:bg-green-900/20 dark:text-green-300 transition-colors duration-200" role="alert">
                    <div class="flex items-center">
                        <div class="py-1">
                            <svg class="w-6 h-6 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div>{{ session('success') }}</div>
                    </div>
                </div>
            @endif

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="mb-4 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 dark:bg-red-900/20 dark:text-red-300 transition-colors duration-200" role="alert">
                        <div class="flex items-center">
                            <div class="py-1">
                                <svg class="w-6 h-6 mr-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>{{ $error }}</div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <img src="logo.png" alt="Logo Infirmerie">
        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <label for="username">Nom d'utilisateur</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Mot de passe</label>
            <div class="password-wrapper">
                <input type="password" name="password" id="password" required>
                <i id="togglePassword" class="fa-regular fa-eye"></i>
            </div>

            <input type="submit" value="Se connecter">
        </form>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');

        togglePassword.addEventListener('click', () => {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            togglePassword.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
