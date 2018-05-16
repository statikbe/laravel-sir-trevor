SirTrevor.Blocks.ImageExtended = SirTrevor.Blocks.Image.extend({

    type: "image_extended",

    title: function() { return i18n.t('blocks:image:title'); },

    droppable: true,

    uploadable: true,

    icon_name: 'image',

    loadData: function(data){
        $(this.editor).html($('<img>', { src: function () { if (data.image) { return data.image } else { return data.file.url } }})).show();
        $(this.editor).append($('<input>', {type: 'text', class: 'copyright', name: 'text', placeholder: 'Copyright', value: data.copyright}));
     },

    onBlockRender: function(){
        var onDrop = this.onDrop;
        $(this.inputs).find('button').bind('click', function(ev){ ev.preventDefault(); });
    },

    onDrop: function(transferData){
        var file = transferData.files[0],
            urlAPI = (typeof URL !== "undefined") ? URL : (typeof webkitURL !== "undefined") ? webkitURL : null;

        if (/image/.test(file.type)) {
            this.loading();

            $(this.inputs).hide();
            this.loadData({file: {url: urlAPI.createObjectURL(file)}});

            this.uploader(
                file,
                function(data) {
                    this.setData(data);
                    this.ready();
                },
                function(error){
                    this.addMessage(i18n.t('blocks:image:upload_error'));
                    this.ready();
                }
            );
        }
    }

});
