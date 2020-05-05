function removeActiveClassImage() {
    $('.content-block').each(function () {
        $(this).removeClass('active');
    });
}

function removeActiveClassImageNodeAll() {
    $('.html-list-container').each(function () {
        $(this).find('img').each(function () {
            $(this).removeClass('active');
        })
    });
}

function removeActiveClassImageNode(elem) {
    $(elem).find('img').each(function () {
        $(this).removeClass('active');
    })
}

$(document).on("click", ".node", function () {
    removeActiveClassImageNode($(this).closest('.html-list-container'))
    $(this).addClass('active');
});

$(document).ready(function () {
    $('.content-block').click(function () {
        removeActiveClassImage();
        removeActiveClassImageNodeAll();

        $(this).addClass('active');
        setTimeout(function () {
            let nodes = $('.html-list-container img')
            if (nodes.length !== 0){
                $(nodes[0]).addClass('active');
            }
        }, 100)
    });
})
