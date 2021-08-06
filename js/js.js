/* 
 * back to top button
 * coppied from http://jsfiddle.net/gilbitron/Lt2wH/
 * edited by Diego Mousine
 */
 $( document ).ready(function() {
	if ($('#back-to-top').length) {
		var scrollTrigger = 100, // px
			backToTop = function () {
				var scrollTop = $(window).scrollTop();
				if (scrollTop > scrollTrigger) {
					$('#back-to-top').removeClass('w3-hide');
					$('#back-to-top').addClass('w3-animate-opacity');
				} else {
					$('#back-to-top').addClass('w3-hide');
				}
			};
		backToTop();
		$(window).on('scroll', function () {
			backToTop();
		});
		$('#back-to-top-btn').on('click', function (e) {
			e.preventDefault();
			$('html,body').animate({
				scrollTop: 0
			}, 700);
		});
	}
});
/* end back to top button */

var att_count = 2;
var i = 0;

function loadModule(mod, id) {
    $("#d_overlay").show();
    $(".item_sidebar").removeClass("w3-blue");
    $("#" + id).addClass("w3-blue");
    $("#d_canvas").html('');
    $("#m_overlay").addClass('w3-hide');
    $.get(mod, function (e) {
        if (e)
            $("#d_overlay").hide();
    }).done(function (result) {
        $("#d_menu").html(result);
		$('#m_sidebar').addClass('w3-hide');
    }).fail(function () {
        $("#d_menu").html('');
        $("#d_canvas").html('<div class="w3-panel w3-red w3-center"><p>Não encontrei o módulo solicitado</p></div>');
        $("#d_overlay").hide();
    });
}

function toggleTab(tab, id) {
    $("#d_overlay").show();
    $.get(tab, function (e) {
        if (e)
            $("#d_overlay").hide();
    }).done(function (result) {
        $("#d_canvas").html(result);
        $(".item_tab").removeClass("w3-white");
        $("#" + id).addClass("w3-white");
    }).fail(function () {
        $("#d_canvas").html('<div class="w3-panel w3-red w3-center"><p>Não encontrei o conteúdo solicitado</p></div>');
        $("#d_overlay").hide();
    });
}

function loadModal(uri) {
    $("#d_overlay").show();
    $("#main_modal_content").html('Carregando...');
    $("#console").hide();
    $.get(uri, function (e) {
        if (e)
            $("#d_overlay").hide();
    }).done(function (result) {
        $("#main_modal_content").html(result);
        $("#main_modal").show();
    }).fail(function () {
        $("#main_modal_content").html('<div class="w3-panel w3-red w3-center"><p>Não encontrei o conteúdo solicitado</p></div>');
		$("#main_modal").show();
        $("#d_overlay").hide();
    });
}

function loadOptions(ctrl) {
    $("#d_overlay").show();
    $.get(ctrl, function (e) {
        if (e)
            $("#d_overlay").hide();
    }).done(function (r) {
        i++;
        $(".slide").hide();
        $(".slide").eq(i).html(r).show();
        if (i)
            $(".btn_back").show();
    });
}

function backBtn() {
    i--;
    $(".slide").hide();
    $(".slide").eq(i).show();
    if (!i)
        $(".btn_back").hide();
}

function add_file_input() {
    $("#attachments").append('<p>' +
            '<input type="file" placeholder="Selecione um arquivo" id="arquivo' + att_count + '" name="arquivo' + att_count + '" accept=".jpeg, .jpg, .png, .pdf"/>' +
            '</p>');
    att_count++;
}

function decimal_filter(id) {
    var v = parseInt($("#" + id).val().replace(/[^0-9]+/g, ""), 10).toString();
    if (isNaN(v))
        v = '0';
    if (v.length < 3)
        v = ('000' + v).slice(-3);
    $("#" + id).val(decFormat(v));
}

function decFormat(n) {
    return [n.slice(0, -2), n.slice(-2)].join();
}

function dateFormat(d) {
    n = d.split('-');
    return [n[2], n[1], n[0]].join('/');
}

function nextSlide() {
    i++;
    $(".slide").hide();
    $(".slide").eq(i).html(r).show();
}

function get(c, e, d) {
    $("#d_overlay").show();
    $.get(c + "/get", {element: e, data: d}, function (r) {
        if (r)
            $("#d_overlay").hide();
    }).done(function (result) {
        r = $.parseJSON(result);
        if (r.status) {
            switch (e) {
                case 'valor':
                    $("#" + e).val(decFormat(r.msg.opts.price.replace(/[^0-9]+/g, "")));
                    break;

                default:
                    $("#" + e).html('<option selected disabled >Selecione uma opção</option>');
                    r.msg.opts.forEach(function (i) {
                        $("#" + e).append('<option value="' + i.id + '" title="' + i.nome + '">' + i.nome + '</option>');
                    });
                    break;
            }
        }
    });
}

function shift_bars() {
	$("#m_overlay").toggleClass('w3-hide');
	$('#m_sidebar').toggleClass('w3-hide');
}

/*
 * toggle objects when miss click
 */
window.onclick = function() {
	if (!event.target.matches('.dbtn')) { 
		$('.dctt').removeClass('w3-show');
	}
};
