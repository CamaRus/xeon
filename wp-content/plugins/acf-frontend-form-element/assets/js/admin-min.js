!function(e){var t=e('<div class="dynamic-values"></div>');function a(t,a){var n=e("#tmpl-acf-field").html(),i=e(n),o=i.data("id"),d=acf.uniqid("field_"),c=acf.duplicate({target:i,search:o,replace:d,append:function(e,t){$list.append(t)}});c.find(".li-field-type").text(t.text);var l=acf.getFieldObject(c),f="text";t&&(f=t.id,l.prop("label",t.text),l.prop("name",t.id)),l.changeType(f),c.find(".field-type").val(f),l.prop("key",d),l.prop("ID",0),c.attr("data-key",d),c.attr("data-id",d),1==a&&l.open(),l.updateParent(),acf.doAction("add_field_object",l),acf.doAction("append_field_object",l)}function n(e){var t=acf.getFieldObjects({list:e});t.length?(e.removeClass("-empty"),t.map((function(e,t){e.prop("menu_order",t)}))):e.addClass("-empty")}e.each(acffdv,(function(a,n){var i=e('<div class="group-options"><span class="group-name">'+n.label+"</span></div>");e(i).appendTo(t);var o=e('<select class="dynamic-value-select"><option value="" selected><span class="field-name">-- Select One --</span></option></select>');e.each(n.options,(function(t,a){var n=e('<option class="field-option '+t+'-option" value="['+t+']"><span class="field-name">'+a+"</span></option>");e(n).appendTo(o)})),e(o).appendTo(i)})),e(document).ready((function(){e(document).on("click",".post-type-admin_form .page-title-action",(function(t){t.preventDefault(),e(".frontend-admin-edit-button.render-form").trigger("click")})),e("body").on("change","#acff-post-admin_form_types",(function(t){var a=e(this).parents("form").find("#acff-post-frontend_admin_title");""==a.val()&&a.val(e(this).find("option[value="+e(this).val()+"]").text())})),e(".select2").select2({closeOnSelect:!1}),e(document).find(".acf-field[data-form-tab]:not([data-form-tab=fields])").addClass("frontend-admin-hidden");var a;e(document).on("click",(function(t){""!=t.target.id&&""!=e(t.target).parents(".acf-field").id&&e(".dynamic-values").remove()})),e(document).on("change",".dynamic-values select",(function(t){t.stopPropagation();var n=e(this),i=n.val(),o=n.parents(".acf-field").first().find(".wp-editor-area");o.length>0?(tinymce.editors[o.attr("id")].editorCommands.execCommand("mceInsertContent",!1,i),e(".dynamic-values").remove(),a=!1):function(e,t){var a=e;if(a){var n=a.scrollTop,i=0,o=a.selectionStart||"0"==a.selectionStart?"ff":!!document.selection&&"ie";if("ie"==o){a.focus();var d=document.selection.createRange();d.moveStart("character",-a.value.length),i=d.text.length}else"ff"==o&&(i=a.selectionStart);var c=a.value.substring(0,i),l=a.value.substring(i,a.value.length);if(a.value=c+t+l,i+=t.length,"ie"==o){a.focus();var f=document.selection.createRange();f.moveStart("character",-a.value.length),f.moveStart("character",i),f.moveEnd("character",0),f.select()}else"ff"==o&&(a.selectionStart=i,a.selectionEnd=i,a.focus());a.scrollTop=n}}(n.parents(".dynamic-values").siblings("input[type=text]").get(0),i);n.removeProp("selected").closest("select").val("")})),e(document).on("input click",".acf-field[data-dynamic_values] input",(function(a){a.stopPropagation();var n=e(this);e(".dynamic-values").remove(),t.find(".all_fields-option").addClass("acf-hidden"),n.after(t)})),e(document).on("click",".acf-field[data-dynamic_values] .dynamic-value-options",(function(n){n.stopPropagation();var i=e(this);e(".dynamic-values").remove(),1!=a?(a=!0,t.find(".all_fields-option").removeClass("acf-hidden"),i.after(t)):a=!1})),e(document).on("change",".field-type",(function(t){var a=e(this).parents(".acf-field-settings"),n=a.find("input.field-label");""==n.val()&&n.val(e(this).find('option[value="'+e(this).val()+'"]').text()).trigger("blur");var i=a.find("input.field-name");""==i.val()&&i.val(e(this).val())})),e(document).on("change",".acf-field-admin-form-tabs input[type=radio]",(function(t){e(document).find(".acf-field[data-form-tab]").addClass("frontend-admin-hidden"),e(document).find(".acf-field[data-form-tab="+e(this).val()+"]").removeClass("frontend-admin-hidden")}))})),e(document).on("click",".add-fields",(function(t){$list=e("#acf-field-group-fields").find(".acf-field-list"),a(!1,!0),n($list)})),e(document).on("click","button.bulk-add-fields",(function(t){t.preventDefault();var i=e("#bulk_add_fields").select2("data");e("#bulk_add_fields").val("").trigger("change"),$list=e("#acf-field-group-fields").find(".acf-field-list");var o=e.Deferred().resolve();e.each(i,(function(e,t){o=o.then((function(){return a(t,!1)}))})),o.then((function(){n($list)}))})),e(document).on("click",".copy-shortcode",(function(t){var a="["+e(this).data("prefix")+' form="'+e(this).data("form")+'"]';navigator.clipboard.writeText(a);var n=e(this).html();e(this).addClass("copied-text").html(n.replace(acf.__("Copy Code"),acf.__("Code Copied"))),setTimeout((function(){e("body").find(".copied-text").removeClass("copied-text").html(n.replace(acf.__("Code Copied"),acf.__("Copy Code")))}),1e3)}))}(jQuery);