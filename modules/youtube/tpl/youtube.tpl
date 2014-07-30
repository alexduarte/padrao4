{if $position}
<ul id="idTabVideos" class="bullet">
   {include file="$video_tpl_path" videos=$videos configs=$configs}
</ul>
{else}
<section  class="page_product_box toggle_frame tab-video">
<h3 class="toggle">{l s='Videos' mod='youtube'}<span class="icon-toggle"></span></h3>
        <div class="toggle_content">
    {include file="$video_tpl_path" videos=$videos configs=$configs}

    </div>
</section>
{/if}