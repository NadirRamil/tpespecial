{include file="header.tpl"}

<div class="container">

    <div class="row mt-4">
        <div class="col-md-4">
            <h2>Log In</h2>
            <form class="form-alta" action="validate" method="post">
                <div class="formulario"> <input placeholder="email" type="text" name="email" id="email" required></div>
                <div class="formulario"> <input placeholder="password" type="password" name="password" id="password" required></div>
                {if $error} 
                    <div class="alert alert-danger mt-3">
                        {$error}
                    </div>
                {/if}
        
                <div class="formulario"> <button type="submit" class="btn btn-primary mt-3">Log in</button></div>
            </form>
        </div>
    </div>
   

</div>

{include file="footer.tpl"}