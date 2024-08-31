{{ include('layouts/header.php', {title:'Login'})}}
<div class=" d-flex justify-content-center align-items-center">
    <div class="row">
        <div class="card border-light bg-light mb-4">  
            <div class="card-body">
                <form method="post">
                    <h2 class="mb-4">Login</h2>
                    {% if errors.message is defined %}
                        <div class="error">{{ errors.message }}</div>
                    {% endif %}
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ user.email }}">
                        {% if errors.email is defined %}
                            <div class="error">{{ errors.email }}</div>
                        {% endif %}
                    </div>
                    <div class="form-group">
                        <label for="mot_de_passe">Password</label>
                        <input type="password" class="form-control" id="mot_de_passe" name="mot_de_passe" value="{{ user.mot_de_passe }}">
                        {% if errors.mot_de_passe is defined %}
                            <div class="error">{{ errors.mot_de_passe }}</div>
                        {% endif %}
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{ include('layouts/footer.php')}}
