// Variant
// This one lets you improve the PDF sharpness by scaling up the HTML node tree to render as an image before getting pasted on the PDF.
const api_key = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjExNzM4NTI5ZTczYjYwZDRkZjM0NGYyY2QwNjY4Y2JlYTk5OTc1NjZiMzNkZWE4ZTE0ZjQyYWE0OTcxYmZmYmJkZjJmNGQwNDdiM2Y3M2Y4In0.eyJhdWQiOiIxIiwianRpIjoiMTE3Mzg1MjllNzNiNjBkNGRmMzQ0ZjJjZDA2NjhjYmVhOTk5NzU2NmIzM2RlYThlMTRmNDJhYTQ5NzFiZmZiYmRmMmY0ZDA0N2IzZjczZjgiLCJpYXQiOjE1ODgyNDUyMzQsIm5iZiI6MTU4ODI0NTIzNCwiZXhwIjo0NzQzOTE4ODM0LCJzdWIiOiI0MjAyOTIzOSIsInNjb3BlcyI6WyJ1c2VyLnJlYWQiLCJ1c2VyLndyaXRlIiwidGFzay5yZWFkIiwidGFzay53cml0ZSIsIndlYmhvb2sucmVhZCIsIndlYmhvb2sud3JpdGUiLCJwcmVzZXQucmVhZCIsInByZXNldC53cml0ZSJdfQ.dJ5-IQI4_SouZHcUFnOsEhrQSAeloubUj8PHURyXwjephazkEcUvqXPanfdEdd35E8sTH5g-zQCkP87OsE8TyYW_aJywRbZhYRwQbp9EyhlBa_cT-AL_C51gVWWvx_m825KtCMNjzey7VfztCsbXO0t1b6uBz_PBZfIAPN5dOM8JfRe3YthjhJR543pZfwM1361JKOePoe5ros3C7eNF4PDZki3ALIlw3EgSynM3RcaaxQx0gGqao7DPyJj9DLn1yGik-SQ3fI1-KsIHgc5-FF_3myGig3t_9ri0Q8WKfG64HUkQL-qWYXfOX2jgqmiNqgbEBFUPl9Znrlzo-xBl2I40nd_URal4C303IwnY0lcb9SounF9s18AxzLk693sDTHbInfTsJ4m0E3KLcnGnVnxJ8StX-uYO6gTDMEOI6zm0xN4D-yKLtGg3AgpsgOCUaW79UoO4GdjQW7DJDLiZCwpV7yadYm0FPDEvP7xWczqt6Z4tauRIINpnADD2bciYxmCoAMi8xHQdXOIe_Gn5vG9lwe3bNRa4HFS3xaWjpaNeNul3_3mamEAX69GgYNO-WOoH_Ecs0kTuqt9XMHNbTd0_SelZUp6Kh5gTEOXFPExAUnd-r7FFbGxRTRNu2bkW71iNkxaoQ7KCKQhew-_p8usw1zLzvgbqP6GicZuu7R0"
const px_cm = 37.7952755905511;
function downloadFileFinishedTask(url) {
    window.open(url);
}

function waitTask(task_id){
    $.ajax({
        url: `https://api.cloudconvert.com/v2/tasks/${task_id}/wait`,
        headers: {'Authorization': `Bearer ${api_key}`,},
        success: function (response) {
            downloadFileFinishedTask(response.data.result.files[0].url);
        }
    });
}

function sendFormToUpload(task) {
    let upload_form_data = task.result.form
    const formData = new FormData();

    for (const parameter in upload_form_data.parameters) {
        formData.append(parameter, upload_form_data.parameters[parameter]);
    }

    let content = $('#template').html().replace(/transform:/g, '-webkit-transform:')


    if($('.main-svg body').length === 0){
        content = `<body style="margin-top:0; margin-bottom:0; margin-right:0; margin-left:0">${content}</body>`
    }

    let blob = new File([content], 'result.html', {type: "text/html"})
    formData.append("file", blob)
    let request = new XMLHttpRequest();
    request.open("POST", upload_form_data.url );
    request.setRequestHeader('Authorization', `Bearer ${api_key}`);
    request.responseType = "json";
    request.send(formData);
}

function convertToFormat(format) {
    const config_convert = {
        'pdf' : {
            'operation': 'convert',
            'input': 'import-my-file',
            'output_format': 'pdf',
            'engine': 'wkhtml',
            "margin_top": 0,
            "margin_left": 0,
            "margin_bottom": 0,
            "margin_right": 0,
            "smart_shrinking": false,
            "page_width": parseInt($('.main-svg div').css('width'), 10) / px_cm,
            "page_height": parseInt($('.main-svg div').css('height'), 10) / px_cm,
            "print_media_type": false
        },
        'jpg': {
            'operation': 'convert',
            'input': 'import-my-file',
            'output_format': 'jpg',
            "engine": "wkhtml",
            "screen_width": parseInt($('.main-svg div').css('width'), 10),
            "screen_height": parseInt($('.main-svg div').css('height'), 10),
        },
        'png': {
            'operation': 'convert',
            'input': 'import-my-file',
            'output_format': 'png',
            "engine": "wkhtml",
            "screen_width": parseInt($('.main-svg div').css('width'), 10),
            "screen_height": parseInt($('.main-svg div').css('height'), 10),
        },
    }

    let tasks = {
        'import-my-file': {
            'operation': 'import/upload',
        },
        'convert-my-file': config_convert[format],
        'export-my-file': {
            'operation': 'export/url',
            'input': 'convert-my-file',
        },
    }

    $.ajax({
        url: 'https://api.cloudconvert.com/v2/jobs',
        type: 'post',
        data: JSON.stringify({tasks:tasks}),
        contentType: 'application/json; charset=utf-8',
        async: false,
        headers: {'Authorization': `Bearer ${api_key}`,},
        dataType: 'json',
        success: function (response) {
            sendFormToUpload(response.data.tasks[0])
            waitTask(response.data.tasks[2].id)
        }
    });
}
(function() {
     $(".export-pdf").click(function() {
         convertToCanvas().then(canvas => {
             const imgData = canvas.toDataURL("image/png");
             const height = parseInt($(".main-svg").height());
             const width = parseInt($(".main-svg").width());
             const pdf = new jsPDF({
                 orientation: width > height ? 'landscape' : 'portrait',
                 format: [height / 1.5, width / 1.5]
             });
             const pdfWidth = pdf.internal.pageSize.getWidth();
             const pdfHeight = pdf.internal.pageSize.getHeight();
             pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
             pdf.save("HR-Dashboard.pdf");
         });
    });
    
     $(".export-img").click(function() {
         convertToCanvas().then(canvas => {
             canvas.toBlob(function(blob) {
                 saveAs(blob, "HR-Dashboard.png");
             });
         });
    });
    
    
        $(".export-svg").click(function() {
        // Convert the DOM element to a drawing using kendo.drawing.drawDOM
        drawDom()
        .then(function(group) {
            // Render the result as a SVG document
            return kendo.drawing.exportSVG(group);
        })
        .done(function(data) {
            // Save the SVG document
            kendo.saveAs({
                dataURI: data,
                fileName: "HR-Dashboard.svg",
                proxyURL: "https://demos.telerik.com/kendo-ui/service/export"
            });
        });
    });
    
    
 
    
    
    
    const saveAsPng = () => {
        $.ajax({
            type: 'POST',
            url: '/img/png',
            data: {
                html: $('.main-svg').html()
            },
            success: (html) => {
                window.location.href = '/' + html;
            }
        })
    };

    const saveAsJpeg = () => {
        $.ajax({
            type: 'POST',
            url: '/img/jpeg',
            data: {
                html: $('.main-svg').html()
            },
            success: (html) => {
                window.location.href = '/' + html;
            }
        })
    }

    const saveAsPdf = () => {
        $.ajax({
            type: 'POST',
            url: '/img/pdf',
            data: {
                html: $('.main-svg').html(),
                width: parseInt($('.main-svg').css('width')),
                height: parseInt($('.main-svg').css('height'))
            },
            success: (html) => {
                window.location.href = '/' + html;
            }
        })
    }

    let makeScreen = () => {
        // в html2canvas передаем id контента
        html2canvas($('.main-svg').get(0), {
            scale: 2 // Дополнительные опции
        }).then(function(canvas) {
            // когда canvas сформирован отправялем его скачиваться с помощью FileSaver
            canvas.toBlob(function(blob) {
                // тут можно установить название сохраняемого файла
                saveAs(blob, "application.png");
            });
        });
    };

    $('.format-save-item').click((event) => {
        let format = $(event.target).val();

        if (format == 'png') saveAsPng();
        if (format == 'jpeg') saveAsJpeg();
        if (format == 'pdf') saveAsPdf();
    })

    $('.save-button-menu').click((event) => {
        console.log('Here');

        $('.dropdown-menu-save').toggleClass('show-block');
    });
})();

function prepareTempContainer() {
    const $tmpSvg = $("#temp-svg");
    const $mainSvg = $(".main-svg");
    let html = $mainSvg.html();
    $tmpSvg.width($mainSvg.width() + 'px');
    $tmpSvg.height($mainSvg.height() + 'px');
    $tmpSvg.html(html);
    return $tmpSvg;
}

function drawDom() {
    return kendo.drawing.drawDOM(prepareTempContainer());
}

function convertToCanvas() {
    const $container = prepareTempContainer();
    const container = $container[0];
    container.querySelectorAll('svg').forEach(svg => {
        const canvas = document.createElement('canvas');
        canvas.style.cssText = svg.style.cssText;
        const ctx = canvas.getContext('2d');
        canvg.Canvg.fromString(ctx, svg.outerHTML).start();
        insertAfter(canvas, svg);
        svg.remove();
    });
    return html2canvas(
        container,
        {
            useCORS: true,
            width: $container.width(),
            height: $container.height(),
            scale: 1,
            x: 0,
            y: 0,
            windowWidth: $container.width(),
            windowHeight: $container.height(),
            removeContainer: false
        }
    )
}

function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}




