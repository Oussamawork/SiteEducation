$(document).ready(function() {
    var moduleId;
    /* $('input#module_id').on('change', function(){   //ila tbedlat lvalue dialha bhal ila wrkna aala chi haja f dik select aandha value bhal America
        moduleId = $(this).val(); 
       }); */

    $('select[name="studyarea"]').on('change', function(){   //ila tbedlat lvalue dialha bhal ila wrkna aala chi haja f dik select aandha value bhal America
        var studyareaId = $(this).val();     // kanchedo lvalue dial dik select li werekna aaliha 
        console.log(moduleId);
        if(studyareaId) {  // kant2ekdo rah dik value kaina
            $.ajax({
                url: '/admin/modules/get/update/'+studyareaId,     //lien li anmchiw lih ola route 
                type:"GET",
                dataType:"json",

                success:function(data) {    //mora makanjibo resultat 
                    
                    $('select[name="module"]').empty();   // kankhwiw module mora makataamer lmera lwla 

                    $.each(data, function(key, value){      //kanbdaw naamro fiha :D select d module zaama
                        $('select[name="module"]').append('<option  selected value="'+ value['id'] +'">' + value['title'] + '</option>');
                    });
                },

            });
        } else { // ila makantch value kankheliw select tania dial module khawiya 
            $('select[name="module"]').empty();
        }
    });
    /* $('input#module_id' ).trigger( "change" );*/
    /* $('select[name="studyarea"]' ).trigger( "change" ); */
});