TYPO3.jQuery(document).ready(function(){
        
                data_for_request = [];
                var select_number = 1;
                work_select_number = select_number;
        
                // if links already was selected
                // if (TYPO3.jQuery('[name$="\[relevantedeskriptoren_link\]"]').attr('value') != '') {
                if (exists_data == 1) {
                    max_id = 0;
                    TYPO3.jQuery('.descriptorselector').each(function() {
                        curr_numb = TYPO3.jQuery(this).attr('id');
                        curr_numb = parseInt(curr_numb.substr(14));
                        if (curr_numb > max_id)
                            max_id = curr_numb;
						arr_descriptors = TYPO3.jQuery(this).attr('descr_selected').split(',');
						SendGet(TYPO3.jQuery(this).attr('go'), TYPO3.jQuery(this).find('ul'), arr_descriptors);
						TYPO3.jQuery('div#select_number_'+work_select_number+' > .servicebar').show();        
                    });
                    select_number = max_id;
                    work_select_number = select_number;
                } 
                // if display new form
                else {
                    TYPO3.jQuery.getJSON('../fileadmin/eEducation2016/edugroupdata.php', function(data) {
                        execData(data);
                });
                };
				
				// add new select button 
                TYPO3.jQuery('.add').bind('click', function(e){
                    select_number = select_number + 1;
                    id = TYPO3.jQuery(this).parents('.descriptorselector').attr('id');
                    new_si = 'select_number_'+select_number;
                    TYPO3.jQuery(this).parents('.descriptorselector').clone(true).attr('id', new_si).insertAfter(TYPO3.jQuery(this).parents('.descriptorselector'));
                    generateValues();
                });
                
                // delete select button 
                TYPO3.jQuery('.delete').bind('click', function(e){
                    if (TYPO3.jQuery('.descriptorselector').length > 1)
                        TYPO3.jQuery(this).parents('.descriptorselector').remove();
                    generateValues()
                });
                
});

function SendGet(data_a, el, data_selected) {
	data_selected = typeof data_selected !== 'undefined' ? data_selected : [];
    id_val = TYPO3.jQuery(el).parents('.descriptorselector').attr('id');
    work_select_number = id_val.substr(14);
    if ((data_a != '') && (data_a.indexOf("desc_") != -1)) {
        // setup hidden value from selected descriptors
        TYPO3.jQuery('div#select_number_'+work_select_number+' > .servicebar').show();        
        TYPO3.jQuery('div#select_number_'+work_select_number+' > select.edugroupdata').find("option:selected").each(function() {
            TYPO3.jQuery(this).attr("selected", "selected");
        });
        TYPO3.jQuery('div#select_number_'+work_select_number+' > select.edugroupdata').find("option:not(:selected)").each(function() {
            TYPO3.jQuery(this).removeAttr("selected");
        });        
    } else if (data_a != '--') {
        // get request and update selectbox
        TYPO3.jQuery('input#relevantedeskriptoren_link').attr('value', '');
        TYPO3.jQuery('div#select_number_'+work_select_number+' > .servicebar').hide();
        data_a = data_a+'&select_number='+work_select_number;
        TYPO3.jQuery.getJSON('../fileadmin/eEducation2016/edugroupdata.php', data_a, function(data) {
            execData(data, work_select_number, data_selected);
        });
    };
	generateValues();
}

function execData(data, work_select_num, data_selected) {   
	data_selected = typeof data_selected !== 'undefined' ? data_selected : [];
// console.log(data);
    if (data.select_number > 0)
        work_select_number = data.select_number
    else
        work_select_number = data.select_num
    //alert(work_select_number);
    result = data.result;        
    if (result=='success') {
        res_data = data.data;
        bread_crumb = data.bread;
        TYPO3.jQuery('div#select_number_'+work_select_number+' > ul.breadcrumb').empty();
        // bread_string = '';
        TYPO3.jQuery.each(bread_crumb, function(key, val) {
            if (key > 0)
                val['link'] = ' >&nbsp;' + val['link'];
            TYPO3.jQuery('div#select_number_'+work_select_number+' > ul.breadcrumb').append('<li>' + val['link'] + '</li>');
        });        
//        bread_string = bread_string.substring(2);
        TYPO3.jQuery('div#select_number_'+work_select_number+' > select.edugroupdata').empty();
        TYPO3.jQuery('div#select_number_'+work_select_number+' > select.edugroupdata').append('<option value="--">' + data.select_title+ '</option');        
        if ((data.multi) == 'multi') {
            TYPO3.jQuery('div#select_number_'+work_select_number+' > select.edugroupdata').attr('multiple', 'multiple');
            TYPO3.jQuery('div#select_number_'+work_select_number+' > select.edugroupdata').attr('style', 'height: auto;');
        }
        else {
            TYPO3.jQuery('div#select_number_'+work_select_number+' > select.edugroupdata').removeAttr('multiple');
        }
        TYPO3.jQuery.each(res_data, function(key, val) {
            TYPO3.jQuery('div#select_number_'+work_select_number+' > select.edugroupdata').append(val.link);
        });
		// select selected options
		if ((data.multi) == 'multi') {
			TYPO3.jQuery(data_selected).each(function() {
				descrid = this;
				TYPO3.jQuery("div#select_number_"+work_select_number+" > select.edugroupdata option[value='desc_"+descrid+"']").prop('selected', true);
			});
		};
    };
    generateValues();
}

function onchangeSendGet(opt) {
    id_val = TYPO3.jQuery(opt).parents('.descriptorselector').attr('id');    
    work_select_number = id_val.substr(14);
    SendGet(opt.options[opt.selectedIndex].value, opt);
}

function generateValues() {
        var descriptorselector = '';
        var links = [];
        TYPO3.jQuery('.descriptorselector').each(function(i, div) {
          if (TYPO3.jQuery(div).find('select.edugroupdata').attr('multiple') == 'multiple') {
            var breadcrumb = '';
            // breadcrumb to string
            TYPO3.jQuery(div).find('ul.breadcrumb li:gt(0) span').each(function(j, li) {    
                breadcrumb +=  ' > ' + TYPO3.jQuery(li).text();
            });
            breadcrumb = breadcrumb.substring(3);
            // punkts in selectbox
            var punkts = '';
			if (TYPO3.jQuery(div).find('select.edugroupdata option:selected').length > 1 || TYPO3.jQuery(div).find('select.edugroupdata option:selected').val() != '--')
				links.push('NEW-TOPIC');
            TYPO3.jQuery(div).find('select.edugroupdata option:selected').each(function(j, opt) {    
                if (TYPO3.jQuery(opt).val() != '--') {
                    punkts +=  '- ' + TYPO3.jQuery(opt).text() + '\r\n';
                    links.push(TYPO3.jQuery(opt).attr('externallink'));
                };
            });
            if (punkts == '') 
                descriptorselector += '';
            else 
                descriptorselector += breadcrumb + ':\r\n' + punkts;
          };
        });
		// console.log(links.join(';'));
        TYPO3.jQuery('textarea[name$="\[relevantedeskriptoren\]"').val(descriptorselector);
		TYPO3.jQuery('textarea[name$="\[relevantedeskriptoren_link\]"').val(links.join(';'));
        // TYPO3.jQuery('input#relevantedeskriptoren_link').attr('value', links.join(';'));
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
    return String(string).replace(/[&<>"'\/]/g, function (s) {
      return entityMap[s];
    });
  }
  
function decodeHtml(html) {
    var txt = document.createElement("textarea");
    txt.innerHTML = html;
    return txt.value;
}
