var crop = {
    init: function() {
        crop.foto();



    },
    foto: function() {

        $(function() {

            $('#cropbox').Jcrop({
                aspectRatio: 1,
                onSelect: crop.updateCoords






            });

        });

    },
    updateCoords: function(c)
    {
        $('#x').val(c.x);
        $('#y').val(c.y);
        $('#w').val(c.w);
        $('#h').val(c.h);
    },
    checkCoords: function()
    {
        if (parseInt($('#w').val()))
            return true;
        alert('Please select a crop region then press submit.');
        return false;
    }
};
crop.init();


