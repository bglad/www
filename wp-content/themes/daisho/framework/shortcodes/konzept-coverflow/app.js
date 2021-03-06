/*

  (Early beta) jQuery UI CoverFlow 2.2 App for jQueryUI 1.8.9 / core 1.6.2
  Copyright Addy Osmani 2011.
  
  With contributions from Paul Bakhaus, Nicolas Bonnicci
  
*/
jQuery(function () {

    var coverflowApp = coverflowApp || {};

    coverflowApp = {

        defaultItem: 6,
        //default set item to be centered on
        defaultDuration: 1200,
        //animation duration
        html: jQuery('#demo-frame div.wrapper').html(),
        imageCaption: jQuery('.demo #imageCaption'),
        sliderCtrl: jQuery('.demo #slider'),
        coverflowCtrl: jQuery('.demo #coverflow'),
        coverflowImages: jQuery('.demo #coverflow').find('img'),
        coverflowItems: jQuery('.demo .coverflowItem'),
        sliderVertical: jQuery(".demo #slider-vertical"),


        origSliderHeight: '',
        sliderHeight: '',
        sliderMargin: '',
        difference: '',
        proportion: '',
        handleHeight: '',

        listContent: "",


        artist: "",
        album: "",
        sortable: jQuery('#sortable'),
        scrollPane: jQuery('#scroll-pane'),

        setDefault: function () {
            this.defaultItem -= 1;
            jQuery('.coverflowItem').eq(this.defaultItem).addClass('ui-selected');
        },

        setCaption: function (caption) {
            this.imageCaption.html(caption);
        },

        init_coverflow: function (elem) {

            this.setDefault();
            this.coverflowCtrl.coverflow({
                item: coverflowApp.defaultItem,
                duration: 1200,
                select: function (event, sky) {
                    coverflowApp.skipTo(sky.value);
                }
            });
			
            //
            this.coverflowImages.each(function (index, value) {
                var current = jQuery(this);
                try {
                    //coverflowApp.listContent += "<li class='ui-state-default coverflowItem' data-itemlink='" + (index) + "'>" + current.data('artist') + " - " + current.data('album') + "</li>";
                    coverflowApp.listContent += "<li class='ui-state-default coverflowItem' data-itemlink='" + (index) + "'>" + current.data('artist') + "</li>";
                } catch (e) {}
            });

            //Skip all controls to the current default item
            this.coverflowItems = this.getItems();
            this.sortable.html(this.listContent);
            this.skipTo(this.defaultItem);


            //
            this.init_slider(this.sliderCtrl, 'horizontal');
            //this.init_slider(jQuery("#slider-vertical"), 'vertical');
            //change the main div to overflow-hidden as we can use the slider now
            this.scrollPane.css('overflow', 'hidden');

            //calculate the height that the scrollbar handle should be
            this.difference = this.sortable.height() - this.scrollPane.height(); //eg it's 200px longer 
            this.proportion = this.difference / this.sortable.height(); //eg 200px/500px
            this.handleHeight = Math.round((1 - this.proportion) * this.scrollPane.height()); //set the proportional height
            ///
            this.setScrollPositions(this.defaultItem);

            //
            this.origSliderHeight = this.sliderVertical.height();
            this.sliderHeight = this.origSliderHeight - this.handleHeight;
            this.sliderMargin = (this.origSliderHeight - this.sliderHeight) * 0.5;

            //
            this.init_mousewheel();
            this.init_keyboard();
            this.sortable.selectable({
                stop: function () {
                    var result = jQuery("#select-result").empty();
                    jQuery(".ui-selected", this).each(function () {
                        var index = jQuery("#sortable li").index(this);
                        coverflowApp.skipTo(index);
                    });
                }
            });


        },

        init_slider: function (elem, direction) {
            if (direction == 'horizontal') {
                elem.slider({
                    min: 0,
                    max: jQuery('#coverflow > *').length - 1,
                    value: coverflowApp.defaultItem,
                    slide: function (event, ui) {

                        var current = jQuery('.coverflowItem');
                        coverflowApp.coverflowCtrl.coverflow('select', ui.value, true);
                        current.removeClass('ui-selected');
                        current.eq(ui.value).addClass('ui-selected');
                        coverflowApp.setCaption(current.eq(ui.value).html());
                    }
                })
            } else {
                if (direction == 'vertical') {
                    elem.slider({
                        orientation: direction,
                        range: "max",
                        min: 0,
                        max: 100,
                        value: 0,
                        slide: function (event, ui) {
                            //console.log('aaa');
                            var topValue = -((100 - ui.value) * coverflowApp.difference / 100);
                            coverflowApp.sortable.css({
                                top: topValue
                            });
                        }
                    })
                }
            }
        },

        getItems: function () {
            var refreshedItems = jQuery('.demo .coverflowItem');
            return refreshedItems;
        },

        skipTo: function (itemNumber) {

            var items = jQuery('.coverflowItem');
            this.sliderCtrl.slider("option", "value", itemNumber);
            this.coverflowCtrl.coverflow('select', itemNumber, true);
            items.removeClass('ui-selected');
            items.eq(itemNumber).addClass('ui-selected');
            this.setCaption(items.eq(itemNumber*2).html()); //Usunąć *2 po znalezieniu problemu

        },

        init_mousewheel: function () {
            jQuery('#coverflow').mousewheel(function (event, delta) {

                var speed = 1,
                    sliderVal = coverflowApp.sliderCtrl.slider("value"),
                    coverflowItem = 0,
                    cflowlength = jQuery('#coverflow > img').length - 1,
                    leftValue = 0;
					//console.log(cflowlength);

                //check the deltas to find out if the user has scrolled up or down 
                if (delta > 0 && sliderVal > 0) {
                    sliderVal -= 1;
                } else {
                    if (delta < 0 && sliderVal < cflowlength) {
                        sliderVal += 1;
                    }
                }

                leftValue = -((100 - sliderVal) * coverflowApp.difference / 100); //calculate the content top from the slider position
                if (leftValue > 0) leftValue = 0; //stop the content scrolling down too much
                if (Math.abs(leftValue) > coverflowApp.difference) leftValue = (-1) * coverflowApp.difference; //stop the content scrolling up beyond point desired
                coverflowItem = Math.floor(sliderVal);
                coverflowApp.skipTo(coverflowItem);
				
				event.preventDefault();

            });
        },

        init_keyboard: function () {
            jQuery(document).keydown(function (e) {
                var current = coverflowApp.sliderCtrl.slider('value');
                if (e.keyCode == 37) {
                    if (current > 0) {
                        current--;
                        coverflowApp.skipTo(current);
                    }
                } else {
                    if (e.keyCode == 39) {
                        if (current < jQuery('#coverflow > img').length - 1) {
                            current++;
                            coverflowApp.skipTo(current);
                        }
                    }
                }


            })
        },

        generateList: function () {
            this.coverflowImages.each(function (index, value) {
                var t = jQuery(this);
                try {
                    //listContent += "<li class='ui-state-default coverflowItem' data-itemlink='" + (index) + "'>" + t.data('artist') + " - " + t.data('album') + "</li>";
                    listContent += "<li class='ui-state-default coverflowItem' data-itemlink='" + (index) + "'>" + t.data('artist') + "</li>";
                } catch (e) {}
            })
        },


        setScrollPositions: function () {
            jQuery('#slider-vertical').slider('value', this.item * 5);
            this.sortable.css('top', -this.item * 5 + -35);
        },

        handleScrollpane: function () {
            this.scrollPane.css('overflow', 'hidden');

            //calculate the height that the scrollbar handle should be
            difference = this.sortable.height() - this.scrollPane.height(); //eg it's 200px longer 
            proportion = difference / this.sortable.height(); //eg 200px/500px
            handleHeight = Math.round((1 - proportion) * this.scrollPane.height()); //set the proportional height
        }
    };


    coverflowApp.init_coverflow();



});