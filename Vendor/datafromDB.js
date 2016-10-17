$(document).ready(function(){
        
                data_for_request = [];
                var select_number = 1;
                work_select_number = select_number;
        
                // some change template
                // $('#relevantedeskriptoren_link').parent().parent().children('div').eq(0).attr('class', 'span12 columns');
                // $('#relevantedeskriptoren_link').parent().parent().children('div').eq(1).attr('style', 'display: none;');
                $('#relevantedeskriptoren').parent().parent().attr('style', 'display: none;');
                $('#htmlforpostrequest').parent().parent().attr('style', 'display: none;');
                var st = $(".descriptorselector").prev();
                $(".descriptorselector").appendTo(st);
//                var st = $("ul.breadcrumb").prev();
//                $("ul.breadcrumb").appendTo(st);
//                $(".edugroupdata").appendTo(st);


                // if links already was selected (for example if form has errors)
                if ($('#relevantedeskriptoren_link').attr('value') != '') {
                    console.log($('#htmlforpostrequest').val());
                    decoded_html = decodeHtml($('#htmlforpostrequest').val());
                    // console.log(decoded_html);
                    $('#select_number_1').replaceWith(decoded_html);
                    // get maximum id
                    max_id = 0;
                    $('.descriptorselector').each(function() {
                        curr_numb = $(this).attr('id');
                        curr_numb = parseInt(curr_numb.substr(14));
                        if (curr_numb > max_id)
                            max_id = curr_numb;
                    });
                    select_number = max_id;
                    work_select_number = select_number;
                    //$('#select_number_1').replaceWith($('#html_for_post_request').attr('value'));
//                    arr_selectboxes = $('#relevantedeskriptoren_link').attr('value').split('NEW-TOPIC;');
                }
                // if display new form
                else {
                    $.getJSON('fileadmin/eEducation2016/edugroupdata.php', function(data) {
                        execData(data);
                });
                };

                // add new select button 
                $('.add').bind('click', function(e){
                    select_number = select_number + 1;
                    id = $(this).parents('.descriptorselector').attr('id');
                    new_si = 'select_number_'+select_number;
                    $(this).parents('.descriptorselector').clone(true).attr('id', new_si).insertAfter($(this).parents('.descriptorselector'));
                    getHiddenValues();
                });
                
                // delete select button 
                $('.delete').bind('click', function(e){
                    if ($('.descriptorselector').length > 1)
                        $(this).parents('.descriptorselector').remove();
                    getHiddenValues()
                });
                
});

function SendGet(data_a, el) {
    id_val = $(el).parents('.descriptorselector').attr('id');
    work_select_number = id_val.substr(14);
    if ((data_a != '') && (data_a.indexOf("desc_") != -1)) {
        // setup hidden value from selected descriptors
        $('div#select_number_'+work_select_number+' > .servicebar').show();        
        $('div#select_number_'+work_select_number+' > select.edugroupdata').find("option:selected").each(function() {
            $(this).attr("selected", "selected");
        });
        $('div#select_number_'+work_select_number+' > select.edugroupdata').find("option:not(:selected)").each(function() {
            $(this).removeAttr("selected");
        });        
        getHiddenValues();
/*        
        links_arr = $('div#select_number_'+work_select_number+' > select.edugroupdata').find("option:selected").map(function() { return $(this).attr('externallink'); }).get();
        links = links_arr.join(';');
        $('input#relevantedeskriptoren_link').attr('value', links);
        titles_arr = $('div#select_number_'+work_select_number+' > select.edugroupdata').find("option:selected").map(function() { return $(this).text(); }).get();
        titles = bread_string + ';;;' + titles_arr.join(';;;');
        $('textarea#relevantedeskriptoren').val(titles); /**/
    } else if (data_a != '--') {
        // get request and update selectbox
        $('input#relevantedeskriptoren_link').attr('value', '');
        $('div#select_number_'+work_select_number+' > .servicebar').hide();
        data_a = data_a+'&select_number='+work_select_number;
        $.getJSON('fileadmin/eEducation2016/edugroupdata.php', data_a, function(data) {
            execData(data, work_select_number);
        });
    }
}

function execData(data, work_select_num) {   
    if (data.select_number > 0)
        work_select_number = data.select_number
    else
        work_select_number = data.select_num
    //alert(work_select_number);
    result = data.result;        
    if (result=='success') {
        res_data = data.data;
        bread_crumb = data.bread;
        $('div#select_number_'+work_select_number+' > ul.breadcrumb').empty();
        bread_string = '';
        $.each(bread_crumb, function(key, val) {
            if (key > 0)
                bread_string = bread_string + ' > ' + val['title'];
            $('div#select_number_'+work_select_number+' > ul.breadcrumb').append('<li>' + val['link'] + '</li>');
        });        
        bread_string = bread_string.substring(2);
        $('div#select_number_'+work_select_number+' > select.edugroupdata').empty();
        //$('span#header_select').text('Select ' + data.header_title);
        $('div#select_number_'+work_select_number+' > select.edugroupdata').append('<option value="--">' + data.select_title+ '</option');        
        if ((data.multi) == 'multi') {
            $('div#select_number_'+work_select_number+' > select.edugroupdata').attr('multiple', 'multiple');
            $('div#select_number_'+work_select_number+' > select.edugroupdata').attr('style', 'height: auto;');
            //$('div#select_number_'+work_select_number+' > select.edugroupdata').next('.servicebar').show();
        }
        else {
            $('div#select_number_'+work_select_number+' > select.edugroupdata').removeAttr('multiple');
        }
        $.each(res_data, function(key, val) {
            $('div#select_number_'+work_select_number+' > select.edugroupdata').append(val.link);
        });
    };
    getHiddenValues();
}

function onchangeSendGet(opt) {
    id_val = $(opt).parents('.descriptorselector').attr('id');    
    work_select_number = id_val.substr(14);
    SendGet(opt.options[opt.selectedIndex].value, opt);
}

function getHiddenValues() {
        var descriptorselector = '';
        var links = [];
        var html_all_selectors = '';
        $('.descriptorselector').each(function(i, div) {
          if ($(div).find('select.edugroupdata').attr('multiple') == 'multiple') {
            var breadcrumb = '';
            // vreadcrumb to string
            $(div).find('ul.breadcrumb li:gt(0)').each(function(j, li) {    
                breadcrumb +=  ' > ' + $(li).text();
            });
            breadcrumb = breadcrumb.substring(3);
            // punkts in selectbox
            var punkts = '';
            links.push('NEW-TOPIC');
            $(div).find('select.edugroupdata option:selected').each(function(j, opt) {    
                if ($(opt).val() != '--') {
                    punkts +=  '- ' + $(opt).text() + '\r\n';
                    links.push($(opt).attr('externallink'));
                };
            });
            if (punkts == '') 
                descriptorselector += '';
            else 
                descriptorselector += breadcrumb + ':\r\n' + punkts;
          };
        });
//        alert(descriptorselector);
        if (descriptorselector != '') {
            $('.descriptorselector').each(function(i, div) {
                html_all_selectors += div.outerHTML;   
            });
            //html_all_selectors = html_all_selectors.replace(/[\r\n\t]/g, '');
            html_all_selectors = escapeHtml(html_all_selectors);
            // console.log(html_all_selectors);
            $('input#htmlforpostrequest').attr('value', html_all_selectors);
        };
        $('input#relevantedeskriptoren_link').attr('value', links.join(';'));
		// console.log(descriptorselector);
        $('textarea#relevantedeskriptoren').val(descriptorselector);
		// console.log($('textarea#relevantedeskriptoren').val());
}

var entityMap = {
    "&": "&amp;",
    "<": "&lt;",
    ">": "&gt;",
    '"': '&quot;',
    "'": '&#39;',
    "/": '&#x2F;'
  };

function escapeHtml(string) {	
	string = string.replace(/onclick=/gi, 'ooonnncccllliiiccckkk==='); // change 'onclick' - something is doing with it after powermail validation
	string = string.replace(/onchange=/gi, 'ooonnnccchhhaaannngggeee==='); // change 'onchange' - something is doing with it after powermail validation 
	string = string.replace(/style=/gi, 'ssstttyyyllleee==='); // change 'style' - something is doing with it after powermail validation 
    return String(string).replace(/[&<>"'\/]/g, function (s) {		
		return entityMap[s];
    });
  }
  
function decodeHtml(html) {
	html = html.replace(/ooonnncccllliiiccckkk===/gi, 'onclick=');
	html = html.replace(/ooonnnccchhhaaannngggeee===/gi, 'onchange=');
	html = html.replace(/ssstttyyyllleee===/gi, 'style=');
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
}
