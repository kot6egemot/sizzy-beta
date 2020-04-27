


// Variant
// This one lets you improve the PDF sharpness by scaling up the HTML node tree to render as an image before getting pasted on the PDF.





(function() {
     $(".export-pdf").click(function() {
        // Convert the DOM element to a drawing using kendo.drawing.drawDOM
        kendo.drawing.drawDOM($(".main-svg"))
        .then(function(group) {
            // Render the result as a PDF file
            return kendo.drawing.exportPDF(group, {
                paperSize: "auto",
                margin: { left: "0px", top: "0px", right: "0px", bottom: "0px" }
            });
        })
        .done(function(data) {
            // Save the PDF file
            kendo.saveAs({
                dataURI: data,
                fileName: "HR-Dashboard.pdf",
                proxyURL: "https://demos.telerik.com/kendo-ui/service/export"
            });
        });
    });
    
     $(".export-img").click(function() {
        // Convert the DOM element to a drawing using kendo.drawing.drawDOM
        kendo.drawing.drawDOM($(".main-svg"))
        .then(function(group) {
            // Render the result as a PNG image
            return kendo.drawing.exportImage(group);
        })
        .done(function(data) {
            // Save the image file
            kendo.saveAs({
                dataURI: data,
                fileName: "HR-Dashboard.png",
                proxyURL: "https://demos.telerik.com/kendo-ui/service/export"
            });
        });
    });
    
    
        $(".export-svg").click(function() {
        // Convert the DOM element to a drawing using kendo.drawing.drawDOM
        kendo.drawing.drawDOM($(".main-svg"))
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






