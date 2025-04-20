@props(['css'])
<!DOCTYPE html>
<html lang="en" mode="dark+-">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=1024">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/logo.png">
    <title>wibist:{{$css}} </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/{{$css}}.css">

</head>
<body>
  <div class="side_bar">
    <img src="/logo.png" alt="">
       <div class="item3 ss"><a href="/infermerie/listeRendezvous"><i class="fa-solid fa-bell"></i> rendez vous</a></div>

   <div class="item4 ss"><a href="/infermerie/liste_patient"><i class="fa-solid fa-rectangle-list"></i>liste des patients </a></div>
   <div class="item5 ss"><a href="/infermerie/compt"><i class="fa-regular fa-heart"></i>compte rendu medical</a></div>
   <div class="item6 ss"><a href="/infermerie/liste_convoncu"><i class="fa-solid fa-magnifying-glass"></i>liste convoncu</a></div>
  <div class="item7 ss"><a href="/infermerie/liste_exemption"><i class="fa-regular fa-file-lines"></i>exemption et convalisence</a></div>
  <div class="item8 ss"><a href="/infermerie/fiche" ><i class="fa-regular fa-rectangle-list"></i>fiche medical</a></div>
    <div  class="item9 ss"><a  href="#hidden-div" class="clickable-div" id="toggleButton"><i class="fa-solid fa-plus"></i>convocation d'un éleve</a></div>
    <div class="item2 ss"><a href="/projet brigade/parametre"><i class="fa-solid fa-gear"></i>paramètre</a></div>

    <div class="item1 ss"><a href="/projet brigade/login.html"><i class="fa-solid fa-arrow-right-from-bracket"></i>déconnexion</a></div>

    </div>
    <nav >

        <img src="/profile.jpg" alt="">
        <div class="nom_utilisateure"><p></p></div>
        <a href=""><i class="fa-regular fa-sun"></i></a>
        <x-notification />
    </nav>
    {{$slot}}


</body>
<script src="{{ asset('js/notification.js') }}"></script>

</html>
