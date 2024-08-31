{{ include('layouts/header.php', {title:'Edit Commentaire'})}}
        
<div class="container d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="card border-light bg-light mb-4">  
            <div class="card-body">
                <form method="post">
                    <h2>Modifier le commentaire</h2>
                    <div class="form-group">
                        <label for="contenu">Contenu</label>
                        <textarea class="form-control" id="contenu" name="contenu" rows="5" cols="50" required>{{ commentaire.contenu }}</textarea>
                        {% if errors.contenu is defined %}
                            <div class="error">{{ errors.contenu }}</div>
                        {% endif %}
                    </div>
                    <input type="hidden" name="id_utilisateur" value="{{ commentaire.id_utilisateur }}">
                    <input type="hidden" name="id_article" value="{{ commentaire.id_article }}">
                    <button type="submit" class="btn btn-outline-primary btn-block">Save</button>
                </form>
            </div>
        </div>  
    </div>  
</div>  
{{ include('layouts/footer.php')}}
