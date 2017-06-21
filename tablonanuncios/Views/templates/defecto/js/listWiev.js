 $(document).ready(function () {
       
        var elem = $('#container ul');
        $('#viewcontrols a').on('click', function (e) {
            if ($(this).hasClass('gridview')) {
                elem.fadeOut(1000, function () {
                    $('#container ul').removeClass('list').addClass('grid');
                    $('#viewcontrols').removeClass('view-controls-list').addClass('view-controls-grid');
                    $('#viewcontrols .gridview').addClass('active');
                    $('#viewcontrols .listview').removeClass('active');
                    elem.fadeIn(1000);
                });
            } else if ($(this).hasClass('listview')) {
                elem.fadeOut(1000, function () {
                    $('#container ul').removeClass('grid').addClass('list');
                    $('#viewcontrols').removeClass('view-controls-grid').addClass('view-controls-list');
                    $('#viewcontrols .gridview').removeClass('active');
                    $('#viewcontrols .listview').addClass('active');
                    elem.fadeIn(1000);
                });
            }
        });
    });
    
     jQuery(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });

////$(document).on('ready', function(){
//	/*PopUpLogin*/
//	$('.btn-PopUpLogin').on('click', function(){
//		var PopUpLogin=$('.PopUpLogin');
//		if(PopUpLogin.css('display')=="none"){
//			PopUpLogin.fadeIn('fast');
//		}else{
//			PopUpLogin.fadeOut('fast');
//		}
//	});
//	/*Buscador movil*/
//	$('.btn-search-mobile').on('click', function(){
//		var search=$('.Search-mobile');
//		if(search.css('display')=="none"){
//			search.fadeIn('fast');
//		}else{
//			search.fadeOut('fast');
//		}
//	});
//	/*Menu movil*/
//	$('.show-menu-mobile').on('click', function(){
//		var menu=$('.NavBar-Nav');
//		if(menu.hasClass('NavBar-Nav-show')){
//			menu.removeClass('NavBar-Nav-show');
//		}else{
//			menu.addClass('NavBar-Nav-show');
//		}
//	});
//	/*Anuncios*/
//	$('.btn-change-post').on('click', function(){
//		var post=$('.post');
//		if(post.hasClass('post-block')){
//			post.removeClass('post-block');
//			$(this).removeClass('fa-list').addClass('fa-th-large');
//		}else{
//			post.addClass('post-block');
//			$(this).removeClass('fa-th-large').addClass('fa-list');
//		}
//	});
//	/* Menus Desplegables*/
//	$('.btn-dropdown-conatiner').on('click', function(){
//		var containerDropdown=$(this).attr('data-drop-cont');
//		$(containerDropdown).slideToggle('fast');
//	});
//	/*Input file*/
//	$(".custom-input-file input:file").change(function(){
//        $(".archivo").html($(this).val());
//    });
//    /*Mostrar respuesta de mensajes*/
//    $('.btn-res').on('click', function(){
//    	var resMsj=$(this).next('.res-msj');
//    	resMsj.slideToggle('fast');
//    });
//});
//(function($){
//    $(window).load(function(){
//        $(".menu-mobile-c").mCustomScrollbar({
//            theme:"dark-thin",
//            scrollbarPosition: "inside",
//            autoHideScrollbar: true,
//            scrollButtons:{ enable: true }
//        });
//    });
//})(jQuery);

     
   