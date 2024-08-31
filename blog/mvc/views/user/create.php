{{ include('layouts/header.php', {title:'Ajout d\'utilisateur'})}}
<div class="container d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="card border-light bg-light mb-4">  
            <div class="card-body">
                <form method="post">
                    <h2 class="mb-4">Registration</h2>
                    <div class="form-group">
                        <label for="nom">Name</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{ user.nom }}">
                        {% if errors.nom is defined %}
                            <div class="error">{{ errors.nom }}</div>
                        {% endif %}
                    </div>
                    <div class="form-group">
                        <label for="mot_de_passe">Password</label>
                        <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe">
                        {% if errors.mot_de_passe is defined %}
                            <div class="error">{{ errors.mot_de_passe }}</div>
                        {% endif %}
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ user.email }}">
                        {% if errors.email is defined %}
                            <div class="error">{{ errors.email }}</div>
                        {% endif %}
                    </div>
                    <div class="form-group">
                        <label for="privilege_id">Privilege</label>
                        <select class="form-control" id="privilege_id" name="privilege_id">
                            <option value="">Select privilege</option>
                            {% for privilege in privileges %}
                                <option value="{{ privilege.id }}" {% if privilege.id == user.privilege_id %} selected {% endif %}>{{ privilege.privilege }}</option>
                            {% endfor %}
                        </select>
                        {% if errors.privilege_id is defined %}
                            <div class="error">{{ errors.privilege_id }}</div>
                        {% endif %}
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary btn-block" value="Save">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{ include('layouts/footer.php')}}
