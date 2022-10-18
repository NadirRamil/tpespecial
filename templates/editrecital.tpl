{include file="header.tpl"}
<div class="col-md-4">
    <h2>{$titulo}</h2>
    <form class ="form-alta" action="editrecital/{$recital->id_recital}" method="POST">
    <a href="home" class="btn btn-primary">Volver al inicio</a> 
        <div class="formulario"><p>Fecha: </p><input value="{$recital->fecha}" type="date" name="fecha" id="fecha" required></div>
        <div class="formulario"><p>Lugar: </p><input value="{$recital->lugar}" type="text" name="lugar" id="lugar" required></div>
        <div class="formulario"><p>Artista: </p><select name="artista_id" id="artista_id">
            {foreach from=$artista item=$artistas}
                <option class="option" value="{$artistas->artista_id}">{$artistas->nombre}</option>
            {/foreach}
            </select>
        </div>
        <div class="formulario"><button class="btn btn-primary"> Editar </button></div>
    </form>
</div>
{include file="footer.tpl"}