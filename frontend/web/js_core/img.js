/**
 * Скрипт для работы с изображениями
 */
(function() {
    /**
     * Получение категорий изображений
     * 
     * @return object
     */
    const getImgCategory = () => {
        let categories = {};

        $.ajax({
            type: 'GET',
            url: '/img/category',
            async: false,
            success: (html) => {
                categories = html;
            }
        });

        return categories;
    };

    /**
     * Отображение контейнера с определеной категорией
     * 
     * @param object category
     */
  const renderImageContainer = (category) => {
        $('.category-container').append(`
        <li class="accordion__item accordion__item--is-open js-accordion__item" data-id-category="${category.id}">
        <button class="accordion__header js-tab-focus pl-0 pr-0" type="button">
            <span class="accordion__header-title">${category.title}</span>
            <em aria-hidden="true" class="accordion__header-icon"><i></i></em>
        </button>
        <div class="accordion__panel js-accordion__panel">
            <div class="accordion__panel-content p-0">
                <div class="text-component margin-bottom-md">
                    <div class="row d-flex justify-content-around p-0 inner-container block-${category.title}">
                    </div>
                </div>
            </div>
            <button class="btn btn-succrss show-more else">Показать еще</button>
            </div>
        </li>
        `);
    };


    /**
     * Отображение изображения
     * 
     * @param {object} image
     * @param {string} container
     */
    const renderImage = (image, container) => {
        if ($(container).last().children().length == 2) {
            let parent = $(container).parent();
            parent.append(`
                <div class="row d-flex justify-content-around p-0 inner-container ${container.slice(1)}">
                </div>
            `)
        }
        $(container).last().append(`
            <div class="content-block" data-id="${image.id}" data-show-order=${image.show_order} style="cursor: pointer;" data-list="${image.hasList}">
                <img src="${image.src}">
            </div>
        `)
    };

    /**
     * Получение изображений
     * 
     * @param object imgCategory
     * 
     * @return void
     */
  const getImg = (category) => {
        let imgs = {};
        let pivot = $(".block-" + category.title);

        pivot = $(pivot[pivot.length - 1]).attr('data-id');

        $.ajax({
            type: 'POST',
            url: '/img/index',
            async: false,
            data: {
                id_category: category.id,
                pivot: pivot
            },
            success: (html) => {
                imgs = html;
            }
        });

        return imgs;
    };

    const renderHtml = (html) => {
        $('.main-svg').empty();
        $('.main-svg').append(html);
        if (draggable) draggable.target = ""

        let imgWidth = parseInt($('.main-svg').css('width'));
        let canvasWidth = parseInt($('.container .h-100').css('width'));

        console.log("Img width: " + imgWidth);
        console.log("Canvas width: " + canvasWidth);

        if (imgWidth > canvasWidth) {
            let scale = Math.round(canvasWidth * 90 / imgWidth);
            $('.scale').val(scale);
            $('.main-svg').css('transform', `scale(${scale / 100})`);
        } else {
            $('.scale').val(70);
            $('.main-svg').css('transform', `scale(0.7)`);
        }

        $('[data-set="true"]').click((event) => {
            let clickCounter = +$(event.target).attr('clickCounter');
            if (clickCounter == 1) return;

            editableHandler(event);
        });
        $('[data-set="true"]').click(getToolsPanel);
        $('.draggable').css('cursor', 'move');

        $('[data-type="text"]').css('line-height', 'normal');
        $('[data-type="text"]').attr('clickCounter', 0);

        $('[data-type="text"]').click((event) => {
            let clickCounter = +$(event.target).attr('clickCounter');

            if (clickCounter == 1) {
                draggable.draggable = false;
                draggable.snappable = false;
                $(event.target).css('cursor', 'text');
            } else {
                clickCounter++;
                $(event.target).attr('clickCounter', clickCounter);
            }
        });

        /*
        $('[data-type="text"]').dblclick((event) => {
            if ($(event.target).attr('data-dblclick')) return;
            draggable.draggable = false;
            draggable.snappable = false;
            $('.draggable').css('cursor', 'text');
            $(event.target).attr('data-dblclick', 'true');
        });
        */

        $('[data-type="text"]').blur((event) => {
            let clickCounter = +$(event.target).attr('clickCounter');

            if (clickCounter == 1) {
                draggable.draggable = true;
                draggable.snappable = true;
                $(event.target).css('cursor', 'move');
                $(event.target).attr('clickCounter', 0);
            }
        });

        $('.main-svg').contextmenu((event) => {
            $('.contextmenu').css('display', 'inline-block');
            $('.contextmenu').css('left', event.pageX);
            $('.contextmenu').css('top', event.pageY);
            return false;
        });

        $(window).click((event) => {
            $('.contextmenu').hide();
        })
    }

    const main = () => {
        let categories = getImgCategory();

        categories.forEach(category => {
            renderImageContainer(category);

            let imgs = getImg(category);
            imgs.forEach(img => {
                renderImage(img, '.block-' + category.title);
            })
        });

        $('.show-more').click((event) => {
            let container = $(event.target).parent();
            let imgs = container.find('.content-block');
            let id_category = container.attr('data-id-category');
            let pivot = imgs.get(imgs.length - 1);

            $.ajax({
                type: 'POST',
                url: '/img/index',
                data: {
                    id_category: id_category,
                    pivot: $(pivot).attr('data-show-order')
                },
                success: (html) => {
                    let item = $(container.find('.inner-container').get(0));
                    let classesName = item.attr('class').split(' ');
                    let category = '.' + classesName[classesName.length - 1];

                    html.forEach(image => {
                        renderImage(image, category);
                    });

                    $('.content-block').click((event) => {
                        if (!event) return;

                        let element = $(event.target);

                        while (element.prop('tagName') != 'DIV') {
                            element = element.parent();
                        }

                        if (element.attr('data-list') == '1') {
                            $.ajax({
                                type: 'GET',
                                url: 'img/list',
                                data: {
                                    id: element.attr('data-id')
                                },
                                success: (html) => {
                                    $('.category-section').hide();
                                    $('.html-list-container').empty();
                                    $('.html-list-section').show();

                                    $('.html-list-container').append(`
                                        <img src="${element.find('img').attr('src')}" class="node" data-node="${element.attr('data-id')}" style="maring-top: 10px; cursor: pointer;">
                                    `);

                                    html.forEach(img => {
                                        $('.html-list-container').append(`
                                            <img src="${img.src}" class="node" data-node="${img.node}" style="maring-top: 10px; cursor: pointer;">
                                        `)
                                    });

                                    $('.node').click((event) => {
                                        $.ajax({
                                            type: 'GET',
                                            url: 'img/html',
                                            data: {
                                                id: $(event.target).attr('data-node')
                                            },
                                            success: (html) => {
                                                renderHtml(html);
                                            }
                                        })
                                    })
                                }
                            });
                        }

                        $.ajax({
                            type: 'GET',
                            url: 'img/html',
                            data: {
                                id: element.attr('data-id')
                            },
                            success: (html) => {
                                renderHtml(html);

                                if (element.attr('data-list') == '0') {
                                    $('aside').removeClass('sidebar--is-visible');
                                }
                            }
                        })
                    });
                }
            })

        });
    };

    main();
    // File#: _1_accordion
    // Usage: codyhouse.co/license
    (function() {
        var Accordion = function(element) {
            this.element = element;
            this.items = Util.getChildrenByClassName(this.element, 'js-accordion__item');
            this.showClass = 'accordion__item--is-open';
            this.animateHeight = (this.element.getAttribute('data-animation') == 'on');
            this.multiItems = !(this.element.getAttribute('data-multi-items') == 'off');
            this.initAccordion();
        };

        Accordion.prototype.initAccordion = function() {
            //set initial aria attributes
            for (var i = 0; i < this.items.length; i++) {
                var button = this.items[i].getElementsByTagName('button')[0],
                    content = this.items[i].getElementsByClassName('js-accordion__panel')[0],
                    isOpen = Util.hasClass(this.items[i], this.showClass) ? 'true' : 'false';
                Util.setAttributes(button, { 'aria-expanded': isOpen, 'aria-controls': 'accordion-content-' + i, 'id': 'accordion-header-' + i });
                Util.addClass(button, 'js-accordion__trigger');
                Util.setAttributes(content, { 'aria-labelledby': 'accordion-header-' + i, 'id': 'accordion-content-' + i });
            }

            //listen for Accordion events
            this.initAccordionEvents();
        };

        Accordion.prototype.initAccordionEvents = function() {
            var self = this;

            this.element.addEventListener('click', function(event) {
                var trigger = event.target.closest('.js-accordion__trigger');
                //check index to make sure the click didn't happen inside a children accordion
                if (trigger && Util.getIndexInArray(self.items, trigger.parentElement) >= 0) self.triggerAccordion(trigger);
            });
        };

        Accordion.prototype.triggerAccordion = function(trigger) {
            var self = this;
            var bool = (trigger.getAttribute('aria-expanded') === 'true');

            this.animateAccordion(trigger, bool);
        };

        Accordion.prototype.animateAccordion = function(trigger, bool) {
            var self = this;
            var item = trigger.closest('.js-accordion__item'),
                content = item.getElementsByClassName('js-accordion__panel')[0],
                ariaValue = bool ? 'false' : 'true';

            if (!bool) Util.addClass(item, this.showClass);
            trigger.setAttribute('aria-expanded', ariaValue);

            if (this.animateHeight) {
                //store initial and final height - animate accordion content height
                var initHeight = bool ? content.offsetHeight : 0,
                    finalHeight = bool ? 0 : content.offsetHeight;
            }

            if (window.requestAnimationFrame && this.animateHeight) {
                Util.setHeight(initHeight, finalHeight, content, 200, function() {
                    self.resetContentVisibility(item, content, bool);
                });
            } else {
                self.resetContentVisibility(item, content, bool);
            }

            if (!this.multiItems && !bool) this.closeSiblings(item);

        };

        Accordion.prototype.resetContentVisibility = function(item, content, bool) {
            Util.toggleClass(item, this.showClass, !bool);
            content.removeAttribute("style");
            if (bool && !this.multiItems) { // accordion item has been closed -> check if there's one open to move inside viewport 
                this.moveContent();
            }
        };

        Accordion.prototype.closeSiblings = function(item) {
            //if only one accordion can be open -> search if there's another one open
            var index = Util.getIndexInArray(this.items, item);
            for (var i = 0; i < this.items.length; i++) {
                if (Util.hasClass(this.items[i], this.showClass) && i != index) {
                    this.animateAccordion(this.items[i].getElementsByClassName('js-accordion__trigger')[0], true);
                    return false;
                }
            }
        };

        Accordion.prototype.moveContent = function() { // make sure title of the accordion just opened is inside the viewport
            var openAccordion = this.element.getElementsByClassName(this.showClass);
            if (openAccordion.length == 0) return;
            var boundingRect = openAccordion[0].getBoundingClientRect();
            if (boundingRect.top < 0 || boundingRect.top > window.innerHeight) {
                var windowScrollTop = window.scrollY || document.documentElement.scrollTop;
                window.scrollTo(0, boundingRect.top + windowScrollTop);
            }
        };

        //initialize the Accordion objects
        var accordions = document.getElementsByClassName('js-accordion');
        if (accordions.length > 0) {
            for (var i = 0; i < accordions.length; i++) {
                (function(i) { new Accordion(accordions[i]); })(i);
            }
        }
    }());
})();