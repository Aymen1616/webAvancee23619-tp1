{{ include('layouts/header.php', {title:'Ajouter un commentaire'})}}
<div class="container d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="card border-light bg-light mb-4">  
            <div class="card-body">
                <h2>Ajouter un commentaire</h2>
                <form action="{{ base }}/commentaire/create" method="post">
                    <input type="hidden" name="id_article" value="{{ id_article }}">
                    <input type="hidden" name="id_utilisateur" value="{{ id_utilisateur }}">
                    <div class="form-group">
                        <label for="contenu">Contenu</label>
                        <textarea class="form-control" id="contenu" name="contenu" rows="3">{{ commentaire.contenu }}</textarea>
                        {% if errors.contenu is defined %}
                            <div class="error">{{ errors.contenu }}</div>
                        {% endif %}
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{ include('layouts/footer.php')}}
