Je suis le tableau de bord d'un utilisateur qui n'a aucun rôle
<!-- Formulaire de déconnexion -->
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
