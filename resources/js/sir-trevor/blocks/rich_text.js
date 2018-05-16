SirTrevor.Blocks.RichText = SirTrevor.Block.extend({

    type: "rich_text",

    title: function() { return 'Text'; },

    editorHTML: '<div class="standalone-container">\n' +
    '    <div class="snow-container" id="snow-container"></div>\n' +
    '    </div>',

    icon_name: 'text',

    loadData: function(data){
        if (data) {
            this.content = data;
        }
    },

    //sneaky workaround to set data after submit because toData doesn't work
    validations: ['myCustomValidator'],

    myCustomValidator: function() {
        var dataObj = {};

        var content = this.quill.container.firstChild.innerHTML;
        if (content.length > 0) {
            dataObj.text = SirTrevor.toHTML(content, this.type);
        }

        this.setData(dataObj);
    },

    onBlockRender: function() {
        this.id = $(this.el).attr('id');
        this.quill = new Quill('#' + this.id + ' .snow-container', {
            theme: 'snow'
        });

        if (this.content) {
            this.quill.container.firstChild.innerHTML = SirTrevor.toHTML(this.content.text, this.type);
        }
    },

    quil: null,
    content: null,
    id: null
});