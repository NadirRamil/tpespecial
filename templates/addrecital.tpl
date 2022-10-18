<div class="col-md-4">
    <h2>{$titulo}</h2>
    <form class ="form-alta" action="addrecital" method="POST">
        <div class="formulario"><input placeholder="Fecha" type="date" name="fecha" id="fecha" required></div>
        <div class="formulario"><input placeholder="Lugar" type="text" name="lugar" id="lugar" required></div>
        <div class="formulario"><select name="artista_id" id="">
            {foreach from=$artistas item=$artista}
                <option class="option" value="{$artista->artista_id}">{$artista->nombre}</option>
            {/foreach}
            </select>
        </div>
        <div class="formulario"><button class="btn btn-primary"> Agregar </button></div>
    </form>
</div>
