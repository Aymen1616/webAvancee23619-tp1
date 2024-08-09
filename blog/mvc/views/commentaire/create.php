{{ include('layouts/header.php', {title:'Create Commentaire'})}}
        <form method="post">
            <div class="row">
                <div class="card mb-4">  
                    <div class="card-body">
                        <h2>New Commentaire</h2>
                        <label>Contenu
                        <textarea name="contenu" required>{{ commentaire.contenu }}</textarea>
                        </label>
                        {% if errors.contenu is defined %}
                        <span class="error">{{ errors.contenu }}</span>
                        {% endif %}
                        <input type="hidden" name="id_utilisateur" value="{{ commentaire.id_utilisateur }}">
                        <input type="hidden" name="id_article" value="{{ commentaire.id_article }}">
                        <input type="submit" class="btn btn-outline-primary" value="Save">
                    </div>
                </div>
            </div>
        </form>

{{ include('layouts/footer.php')}}
