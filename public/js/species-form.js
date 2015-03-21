var list = document.querySelector('.image-list');

var sortable = Sortable.create(list, {
    handle : '.drag-handle'
});

defer(function() {

    var $list = $('.image-list');

    $list.on('change', 'input[type="file"]', function(e) {

        var file = e.originalEvent.srcElement.files[0];

        var reader = new FileReader();

        var $thumb = $(this).closest('.row').find('.thumbnail');

        reader.onloadend = function() {
            $thumb.attr('src', reader.result);
        }

        reader.readAsDataURL(file);

    });

    var $template = $('.new-image-template');

    $('.add-new-image').on('click', function(e) {

        e.preventDefault();

        var $clone = $template.clone().removeClass('new-image-template');

        $clone.find('input').removeAttr('disabled');

        $list.append($clone);

    });

    $list.on('click', '.remove-image', function(e) {

        e.preventDefault();

        var $row = $(this).closest('.row');

        if($row.hasClass('new-image')) {
            $row.remove();
        } else {
            $row.find('input[name="imagedelete[]"]').removeAttr('disabled');
            $row.hide();
        }

    });

});