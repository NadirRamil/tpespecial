{include file="header.tpl"}

<!-- tabla de recitales -->
<table class="table">
  <thead>
      <tr>
        <th scope="col">Artista</th>
        <th scope="col">Nacionalidad</th>
        {if !isset($smarty.session.USER_ID)} 
          {else}
          <th scope="col">Borrar</th>
          <th scope="col">Editar</th>
        {/if}
      </tr>
  </thead>
  <tbody>
    {foreach from=$cantante item=$artista}
        <tr>
        <th scope="row"><a href="viewartistaRecitales/{$artista->artista_id}" class="mylists"> {$artista->nombre} </a></th>
        <td>{$artista->nacionalidad}</td>
        {if !isset($smarty.session.USER_ID)} 
          {else}
          <td><a class="btn btn-outline-danger" href="deleteartista/{$artista->artista_id}">Borrar</a> </td>
          <td><a class="btn btn-outline-success" href="editArtistaForm/{$artista->artista_id}">Editar</a></td>
        {/if}
        </tr>
    {/foreach}
  </tbody>
</table>
{if !isset($smarty.session.USER_ID)}
  {else}
    {include file="addartista.tpl"}
{/if}

{include file="footer.tpl"}