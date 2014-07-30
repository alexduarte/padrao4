    <div class="video-wrap">
{foreach from=$videos item=video name=youtube}
    <iframe width="{$configs.dimentions.width}" height="{$configs.dimentions.height}" src="http://www.youtube.com/embed/{$video.id_youtube}{if !$configs.related && $configs.hd}?rel=0&vq=hd720{elseif !$configs.related}?rel=0{elseif $configs.hd}?vq=hd720{/if}" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
{/foreach}
</div>
<script>
  $(document).ready(function() { 
(function() {
    var iframes = document.getElementsByTagName('iframe');
     
    for (var i = 0; i < iframes.length; ++i) {
        var iframe = iframes[i];
        var players = /www.youtube.com|player.vimeo.com/;
        if(iframe.src.search(players) !== -1) {
            var videoRatio = (iframe.height / iframe.width) * 100;
             
            iframe.style.position = 'absolute';
            iframe.style.top = '0';
            iframe.style.left = '0';
            iframe.width = '100%';
            iframe.height = '100%';
             
            var div = document.createElement('div');
            div.className = 'video-wrap';
            div.style.width = '100%';
            div.style.position = 'relative';
            div.style.paddingTop = videoRatio + '%';
             
            var parentNode = iframe.parentNode;
            parentNode.insertBefore(div, iframe);
            div.appendChild(iframe);
        }
    }
})();
  });
</script>