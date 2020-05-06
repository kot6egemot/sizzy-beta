/**
 * Скрипт для редактирования изображения
 */
let draggable;

/**
 * Атрибут редактируемого элемента
 */
const CURRENT_EDIT = 'currentEditable';

/**
 * Атрибут для получения текущего редактируемого элемента
 */
const CURRENT_EDIT_ELEMENT = `[${CURRENT_EDIT}="true"]`;

const EMPTY = '';

//Function to convert hex format to a rgb color
function rgb2hex(rgb) {
    rgb = rgb.match(/^rgba?[\s+]?\([\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?,[\s+]?(\d+)[\s+]?/i);
    return (rgb && rgb.length === 4) ? "#" +
        ("0" + parseInt(rgb[1], 10).toString(16)).slice(-2) +
        ("0" + parseInt(rgb[2], 10).toString(16)).slice(-2) +
        ("0" + parseInt(rgb[3], 10).toString(16)).slice(-2) : '';
}

const updatePalette = (hex) => {
    if (hex.match('rgb')) {
        hex = rgb2hex(hex);
    }

    $('.pcr-result').val(hex);
    pickr.setColor(hex);
};

const updateCurrentFont = () => {
    $('.current-font').html($(CURRENT_EDIT_ELEMENT).css('font-family').split(',')[0])
};


const updateCurrentFontSize = () => {
    $('.current-font-size').val($(CURRENT_EDIT_ELEMENT).css('font-size').replace('px', ''));
};

const divToBr = () => {
    let content = $(CURRENT_EDIT_ELEMENT).html();

    if (!content) return;

    while (content.match('div')) {
        content = content.replace('<div>', '<br>');
        content = content.replace('</div>', '');
    }
    $(CURRENT_EDIT_ELEMENT).html(content);
}

const textRect = () => {
    $('[data-direction="w"]').hide();
    $('[data-direction="e"]').hide();
    $('[data-direction="s"]').hide();
    $('[data-direction="n"]').hide();
}

const defaultRect = () => {
    $('[data-direction="w"]').show();
    $('[data-direction="e"]').show();
    $('[data-direction="s"]').show();
    $('[data-direction="n"]').show();
}

/**
 * Обновление панели инструментов
 * @param {object} event
 */
const updateTools = (event) => {
    const attrs = {
        'data-style-italic': '#style',
        'data-style-underline': '#underline',
        'data-style-weight': '#weight'
    };
    let currentEditable = $(CURRENT_EDIT_ELEMENT);

    for (attr in attrs) {
        if (currentEditable.attr(attr)) {
            $(attrs[attr]).addClass('active-style-button');
        } else {
            $(attrs[attr]).removeClass('active-style-button');
        }
    }

    if (currentEditable.prop('tagName') == 'svg') {
        if (currentEditable.find('[data-edit-item="true"]').attr('stroke')) {
            $('.pcr-button').css('color', currentEditable.find('[data-edit-item="true"]').attr('stroke'));
            updatePalette(currentEditable.find('[data-edit-item="true"]').attr('stroke'));
        } else {
            $('.pcr-button').css('color', currentEditable.find('[data-edit-item="true"]').attr('fill'));
            updatePalette(currentEditable.find('[data-edit-item="true"]').attr('fill'));
        }
    } else {
        $('.pcr-button').css('color', currentEditable.css('color'));
        updatePalette(currentEditable.css('color'));
    }

    if ($(CURRENT_EDIT_ELEMENT).attr('data-type') == 'background-color') {
        let color = rgb2hex(currentEditable.parent().css('background'));
        $('.pcr-button').css('color', color);
        updatePalette(color);
        return;
    }

    let fontSize = currentEditable.css('font-size').replace('px', '');
    $('.quantity').attr('value', fontSize);
};

const initalTransform = {
    rotate: "0deg",
    scaleX: 1,
    scaleY: 1
};

const frame = new Scene.Frame({
    width: "250px",
    height: "200px",
    left: "0px",
    top: "0px",
    transform: initalTransform
});

function setTransform(target) {
    target.style.transform = frame.toCSS().match(new RegExp(/transform:(.+);/))[1];
    target.style.left = frame.get('left');
    target.style.top = frame.get('top');
    target.style.width = frame.get('width');
    target.style.height = frame.get('height');
    //target.style.cssText = frame.toCSS();
}

function setLabel(clientX, clientY, text) {
//     labelElement.style.cssText = `
// display: block; transform: translate(${clientX}px, ${clientY - 10}px) translate(-100%, -100%);`;
//     labelElement.innerHTML = text;
}

let pickable = true;
function setPickable(bool) {
    setTimeout(() => {
        pickable = bool;
    }, 20);
}

/**
 * События начала редактирования текста
 */
const editableHandler = (event) => {
    event.stopPropagation();
    if (!pickable) return;

    let target = $(event.target);
    let svg = ['path', 'g', 'svg', 'rect', 'Polygon'];

    for (let i = 0; i < svg.length; i++) {
        if (target.prop('tagName') == svg[i]) {
            while (target.prop('tagName') != 'svg') {
                target = target.parent();
            }
            continue;
        }
    }

    console.log(target.prop('tagName'));

    frame.set('transform', 'rotate', $(target[0]).data('rotate') + 'deg' || 0);

    if (draggable) draggable.destroy();

    draggable = new Moveable($('.canvas-wrap')[0], {
        draggable: true,
        throttleDrag: 0,
        resizable: true,
        throttleResize: 0,
        scalable: true,
        throttleScale: 0,
        keepRatio: false,
        snappable: true,
        snapThreshold: 5,
        snapCenter: true,
        verticalGuidelines: [100, 200, 300],
        horizontalGuidelines: [0, 100, 200],
        elementGuidelines: document.querySelectorAll('[data-set="true"]'),
        rotatable: true,
        throttleRotate: 0,
        rotationPosition: "top",
        scrollable: true,
        scrollContainer: $('.main-svg-container').get(0),
        scrollThreshold: 0,
    }).on("pinch", ({ clientX, clientY }) => {
        setTimeout(() => {
            setLabel(clientX, clientY, `X: ${frame.get("left")}
            <br/>Y: ${frame.get("top")}
            <br/>W: ${frame.get("width")}
            <br/>H: ${frame.get("height")}
            <br/>S: ${frame.get("transform", "scaleX").toFixed(2)}, ${frame.get("transform", "scaleY").toFixed(2)}
            <br/>R: ${parseFloat(frame.get("transform", "rotate")).toFixed(1)}deg
            `);
        });

    }).on("drag", ({ target, left, top, clientX, clientY, isPinch }) => {
        pickable = false;
        frame.set("left", `${left}px`);
        frame.set("top", `${top}px`);

        const deg = $(target).data('rotate') || 0;
        frame.set("transform", "rotate", `${deg}deg`);

        setTransform(target);
        !isPinch && setLabel(clientX, clientY, `X: ${left}px<br/>Y: ${top}px`);

    }).on("scale", ({ target, delta, clientX, clientY, isPinch }) => {
        pickable = false;
        const scaleX = frame.get("transform", "scaleX") * delta[0];
        const scaleY = frame.get("transform", "scaleY") * delta[1];
        frame.set("transform", "scaleX", scaleX);
        frame.set("transform", "scaleY", scaleY);
        setTransform(target);
        !isPinch && setLabel(clientX, clientY, `S: ${scaleX.toFixed(2)}, ${scaleY.toFixed(2)}`);

    }).on("rotateStart", ({ target, beforeDelta, clientX, clientY, isPinch }) => {
        pickable = false;
        const currentDeg = $(target).data('rotate') || 0;
        frame.set("transform", "rotate", `${currentDeg}deg`);
    }).on("rotate", ({ target, beforeDelta, clientX, clientY, isPinch }) => {
        pickable = false;
        const deg = parseFloat(frame.get("transform", "rotate")) + beforeDelta;

        // const rotateDeg = $(target).data('rotate', deg) || 0;
        frame.set("transform", "rotate", `${deg}deg`);
        $(target).data('rotate', deg);

        setTransform(target);
        !isPinch && setLabel(clientX, clientY, `R: ${deg.toFixed(1)}`);

    }).on("resize", ({ target, width, height, clientX, clientY, isPinch }) => {
        pickable = false;
        frame.set("width", `${width}px`);
        frame.set("height", `${height}px`);
        setTransform(target);
        !isPinch &&  setLabel(clientX, clientY, `W: ${width}px<br/>H: ${height}px`);

    }).on("warp", ({ target, multiply, delta, clientX, clientY }) => {
        pickable = false;
        frame.set("transform", "matrix3d", multiply(frame.get("transform", "matrix3d"), delta));
        setTransform(target);
        setLabel(clientX, clientY, `X: ${clientX}px<br/>Y: ${clientY}px`);
    }).on("dragEnd", () => {
        setPickable(true);
    }).on("scaleEnd", () => {
        setPickable(true);
    }).on("rotateEnd", () => {
        setPickable(true);
    }).on("resizeEnd", () => {
        setPickable(true);
    }).on("warpEnd", () => {
        setPickable(true);
    });

    frame.set('left', target.css('left'));
    frame.set('top', target.css('top'));
    frame.set('width', target.css('width'));
    frame.set('height', target.css('height'));

    draggable.scrollable = true;

    if ($(CURRENT_EDIT_ELEMENT).attr('data-type') == 'text') {
        divToBr();
    }

    //Убираем атрибут редактирования с прошлого редактируемого элемента
    $(CURRENT_EDIT_ELEMENT).attr(CURRENT_EDIT, 'false');
    //Указываем, что данный элемент редактируется
    target.attr(CURRENT_EDIT, 'true');
    draggable.target = $(CURRENT_EDIT_ELEMENT).get(0);

    updateTools();

    draggable.draggable = true;
    draggable.resizable = true;
    draggable.snappable = true;
    draggable.keepRatio = false;

    if ($(CURRENT_EDIT_ELEMENT).attr('data-type') == 'img') {
        draggable.keepRatio = true;
    }

    if ($(CURRENT_EDIT_ELEMENT).attr('data-type') == 'text') {
        updateCurrentFont();
        updateCurrentFontSize();
        textRect();
    } else {
        defaultRect();
    }

    if ($(CURRENT_EDIT_ELEMENT).attr('data-type') == 'background-color') {
        draggable.draggable = false;
        draggable.resizable = false;
    }

    $(CURRENT_EDIT_ELEMENT).keyup((event) => {
        draggable.updateRect();
    });

    console.log('Update editable element', draggable, CURRENT_EDIT_ELEMENT);
};

/**
 * Получение выделенного текста
 */
const getSelection = () => {
    return window.getSelection().toString();
};

/**
 * Обернуть текст в span
 * TODO: доработать
 */
const wrapText = () => {
    if (getSelection() == EMPTY) return false;


    let range = window.getSelection().getRangeAt(0);
    let selectionContents = range.extractContents();
    let span = document.createElement('span');
    span.appendChild(selectionContents);

    //Убираем атрибут редактирования с прошлого редактируемого элемента
    $(CURRENT_EDIT_ELEMENT).attr(CURRENT_EDIT, 'false');
    //Указываем, что данный элемент редактируется
    $(span).attr(CURRENT_EDIT, 'true');

    range.insertNode(span);
};

const toggleCss = (attrPointer, cssProperty, cssValueOn, cssValueOff, item = null) => {
    let editableElement = $(CURRENT_EDIT_ELEMENT);

    if (editableElement.attr(attrPointer)) {
        editableElement.css(cssProperty, cssValueOff);
        // updateOwnStyle($(editableElement), cssProperty, cssValueOff);
        editableElement.removeAttr(attrPointer);
        $(item).removeClass('active-style-button');
        return;
    }

    editableElement.attr(attrPointer, 'true');
    editableElement.css(cssProperty, cssValueOn);
    // updateOwnStyle($(editableElement), cssProperty, cssValueOn);
    $(item).addClass('active-style-button');
}

/**
 * Добавления к тексту жирного
 * @param {object} event
 */
const editWeightText = (event) => {
    wrapText();
    toggleCss('data-style-weight', 'font-weight', 'bold', 'normal', '#weight');
}

/**
 * Курсив для текста
 * @param {object} event
 */
const editItalicText = (event) => {
    toggleCss('data-style-italic', 'font-style', 'italic', 'normal', '#style');
    draggable.updateRect();
    draggable.updateTarget();
}

const editUnderlineText = (event) => {
    toggleCss('data-style-underline', 'text-decoration', 'underline', 'none', '#underline');
    draggable.updateRect();
    draggable.updateTarget();
}

const editSizeText = (event) => {
    $(CURRENT_EDIT_ELEMENT).css('font-size', $('.quantity').val() + 'px');
    if (!draggable) return;
    draggable.updateRect();
    draggable.updateTarget();
}

/**
 * Изменение цвета
 *
 * @param {object} event
 */
const editColor = (event) => {
    if ($(CURRENT_EDIT_ELEMENT).prop('tagName') == 'svg') {
        $(CURRENT_EDIT_ELEMENT).find('[data-edit-item="true"]').attr('stroke', $('.pcr-result').val());
        $(CURRENT_EDIT_ELEMENT).find('[data-edit-item="true"]').attr('fill', $('.pcr-result').val());
        return;
    }
    if ($(CURRENT_EDIT_ELEMENT).attr('data-type') == 'background-color') {
        $(CURRENT_EDIT_ELEMENT).css('background', $('.pcr-result').val());
        return;
    }
    $(CURRENT_EDIT_ELEMENT).css('color', $('.pcr-result').val());
};

/**
 * Масштаба
 * @param {object} event
 */
const scaleCanvas = (event) => {
    let scale = +$('.scale').val();
    $('.main-svg').css('transform', `scale(${scale / 100})`);
}

/**
 *
 *
 * @param {object} event
 */
const getToolsPanel = (event) => {
    let type = $(CURRENT_EDIT_ELEMENT).attr('data-type');
    $('.tools-panel-default').hide();
    $('.tools-panel-text').show();
    $('.tool-item').hide();

    console.log("Type tools panel: " + type);

    if (type == 'text') {
        console.log('In text');
        $('.font-tool').show();
        $('.color-tool').show();
        $('.size-tool').show();
        $('.style-tool').show();
        $('.delete-tool').show();
        $('.rotate-input').show();
        return;
    }
    if (type == 'element') {
        console.log('In element');
        $('.color-tool').show();
        $('.delete-tool').show();
        $('.rotate-input').show();
        return;
    }
    if (type == 'img') {
        console.log('In img');
        $('.file-tool').show();
        $('.delete-tool').show();
        $('.rotate-input').show();
        return;
    }
    if (type == 'background-color') {
        $('.color-tool').show();
        $('.rotate-input').show();
        return;
    }

    draggable.target = '';
    $('.tools-panel-text').hide();
    $('.tool-item').hide();
    $('.tools-panel-default').show();
}

const removeNode = (event) => {
    $(CURRENT_EDIT_ELEMENT).remove();
}

const addTextNode = (event) => {
    let width = (parseInt($('.main-svg').css('width')) / 2) + 'px';
    let height = (parseInt($('.main-svg').css('height')) / 2) + 'px';
    const defaultText = 'Ваш текст';

    console.log(width);
    console.log(height);

    $('.main-svg').prepend(`
    <div style="
            position: absolute;
            margin-left: ${width};
            margin-top: ${height};
            z-index: 10;
            font-size: 25px;
            color: #000;
        "
         contenteditable="true" 
         class="draggable" 
         data-set="true" 
         data-type="text"
         >
         
         ${defaultText}
         
    </div>
    `);

    $('[data-set="true"]').click(editableHandler);
    $('[data-set="true"]').click(getToolsPanel);

    $('[data-type="text"]').dblclick((event) => {
        $(event.target).removeClass('draggable');
    });

    $('[data-type="text"]').blur((event) => {
        $(event.target).addClass('draggable');
    });

    $('aside').removeClass('sidebar--is-visible');
}

const addImgNode = () => {
    let width = (parseInt($('.main-svg').css('width')) / 2) + 'px';
    let height = (parseInt($('.main-svg').css('height')) / 2) + 'px';
    const defaultSrc = 'https://picsum.photos/320/240';

    $('.main-svg').prepend(`
    <img style="
            position: absolute;
            margin-left: ${width};
            margin-top: ${height};
            z-index: 10;
            font-size: 25px;
            color: #000;
        "
         src="${defaultSrc}"
         class="draggable" 
         data-set="true" 
         data-type="img"
         >
    `);

    $('[data-set="true"]').click(editableHandler);
    $('[data-set="true"]').click(getToolsPanel);
}

/**
 * Загрузка файлов
 */
$('[type="file"]').change((event) => {
    let img = $('[type="file"]')[0].files[0];
    let reader = new FileReader();
    reader.readAsDataURL(img);

    reader.onloadend = () => {
        $(CURRENT_EDIT_ELEMENT).attr('src', reader.result);
    }
});

$('#weight').click(editWeightText);
$('#style').click(editItalicText);
$('#underline').click(editUnderlineText);
$('.quantity').keyup(editSizeText);
$('.size-tool').click(editSizeText);
$('.pcr-save').click(editColor);
$('.scale').keyup(scaleCanvas);
$('.pcr-picker').mousemove(editColor);
$('.delete-button').click(removeNode);

$('.size-tool-button').click((event) => {
    let isPlus = $(event.target).hasClass('plus');
    let currentScale = +$('.scale').val();
    let imgWidth = parseInt($('.main-svg').css('width'));
    let imgHeight = parseInt($('.canvas1').css('height'));
    let canvasWidth = parseInt($('.container .h-100').css('width'));
    /*  let topMenuHeight = parseInt($('.top-menu').css('height'));
      let bottomMenuHeight = parseInt($('.menu-bottom').css('height'));
      let canvasHeight = parseInt($('.container .h-100').css('height'));
      let mainHeight = canvasHeight - bottomMenuHeight - topMenuHeight;
      console.log('topMenuHeight');*/


    if (currentScale < 200) {

        if (isPlus) {
            currentScale += 10;
        } else if (currentScale > 10) {
            currentScale -= 10;
        }
    } else {
        if (isPlus) {
            currentScale += 0;
        } else if (currentScale > 10) {
            currentScale -= 10;
        }
    }

    /*   if (isPlus) {
          currentScale += 10;
      } else if (currentScale > 10) {
          currentScale -= 10;
      }
  */





    $('.scale').val(currentScale);
    $('.main-svg').css('transform', `scale(${currentScale / 100})`);
    updateView();
    if (!draggable) return;
    draggable.updateRect();
    draggable.updateTarget();
});

function updateView() {
    const mainSVG = document.querySelector('.canvas-wrap .main-svg');
    const newWidth = mainSVG.getBoundingClientRect().width;
    const newHeight = mainSVG.getBoundingClientRect().height;

    $('.canvas-wrap').css({
        width: `${newWidth}px`,
        height: `${newHeight}px`,
    })
}

$('.pcr-swatches').click((event) => {
    if (event.target.tagName != 'BUTTON') return;

    let color = $(event.target).css('color');

    if ($(CURRENT_EDIT_ELEMENT).prop('tagName') == 'svg') {
        $(CURRENT_EDIT_ELEMENT).find('[data-edit-item="true"]').attr('stroke', color);
        return;
    }
    if ($(CURRENT_EDIT_ELEMENT).attr('data-type') == 'background-color') {
        $(CURRENT_EDIT_ELEMENT).css('background', $('.pcr-result').val());
        return;
    }
    $(CURRENT_EDIT_ELEMENT).css('color', color);
});

$('.add-item').click((event) => {
    if ($(event.target).attr('value') == 'text') {
        addTextNode();
    }
    if ($(event.target).attr('value') == 'img') {
        addImgNode();
    }
})

$('.main-svg').click((event) => {
    let element = $(event.target);

    if (element.attr('data-set')) return;
    $('.tools-panel-text').hide();
    $('.tool-item').hide();
    $('.tools-panel-default').show();
    $('.font-section').hide();
    $('.category-section').show();
    $('.fonts-list').empty();


    draggable.target = '';
})

$('.rotate-input').keyup((event) => {
    let rotate = $('.rotate-input').val();
    $(CURRENT_EDIT_ELEMENT).css('transform', `rotate(${rotate}deg)`);
    draggable.updateRect();
})

$(window).click((event) => {

    if ($(event.target).hasClass('window-menu')) return;

    if ($(event.target).hasClass('no-main-svg')) {
        $('.tools-panel-text').hide();
        $('.tools-panel-default').show();
        if (draggable) draggable.target = '';
    }

    $('.dropdown-menu-save').removeClass('show-block');

});

$('#style-block').click((event) => {
    $('.style-block-container').toggleClass('hide');
});

$('#style-text').click((event) => {
    $('.style-text-container').toggleClass('hide');
});

$('.main-svg-container').scroll((event) => {
    if (!draggable) return;

    draggable.updateRect();
    draggable.updateTarget();

    console.log('Here');
});

function onSetTextAlign(value){
    let editableElement = $(CURRENT_EDIT_ELEMENT);
    editableElement.css('text-align', value)
}