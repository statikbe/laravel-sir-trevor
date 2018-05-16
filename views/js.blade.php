<script type="text/javascript">
    (function(){
        var sirtrevor = new SirTrevor.Editor({
            el: document.querySelector('.{!! $config['class'] !!}'),
            blockTypes: {!! $config['blocktypes'] !!}
        });

        SirTrevor.setDefaults({
            iconUrl: '{!! $config['icons_path'] !!}',
            uploadUrl: '{!! $config['upload_url'] !!}'
        });
    })();
</script>
