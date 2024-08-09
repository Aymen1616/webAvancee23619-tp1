{{ include('layouts/header.php', {title:'Edit Commentaire'})}}
        <form method="post">
            <h2>Modifier le commentaire</h2>
            <div class="row">
                <div class="card border-info  mb-4">
                    <div class="card-body">
                        <label>Contenu
                            <textarea name="contenu" required>{{ commentaire.contenu }}     
                            </textarea>
                        </label>
                        {% if errors.contenu is defined %}
                        <span class="error">{{ errors.contenu }}</span>
                        {% endif %}
                        <input type="hidden" name="id_utilisateur" value="{{ commentaire.id_utilisateur }}">
                        <input type="hidden" name="id_article" value="{{ commentaire.id_article }}">
                        <input type="submit" class="btn btn-outline-primary" value="Save">
                    </div>
                </div>  
        </form>
{{ include('layouts/footer.php')}}
