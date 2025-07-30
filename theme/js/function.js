//var base_url='http://192.168.1.43/sethia-handicrafts-erp/';
var base_url='https://sethiahandicrafts.in/';

//var base_url='http://localhost/sethia-handicrafts-erp/';
var loading_img=base_url+'images/loading.gif';


function get_details2(inputid,outputid,url)
{
 //alert(outputid);
  $('#'+outputid).html('');
  var id=$('#'+inputid).val();
  //alert(id);
  $.ajax({
           type: "POST",
           url: url+id,
           success: function(data)
           {
           
               $('#msg'+outputid).html("Please Wait !!!");
               $('#'+outputid).html(data);
               $('#msg'+outputid).html("");              
           }
        });

}




//-- show model
//
function show_page_model(title,page)
{
  //alert(base_url+page);
  $('#modal-title').html(title); 
  //alert(page);
  $('#modal-body').html('<img src='+loading_img+'>');
  $('#modal-body').load(page); 
}

function show_page_model_fill(title,page)
{
  //alert(base_url+page);
  $('#modal-fill-title').html(title); 
  //alert(page);
  $('#modal-fill-body').html('<img src='+loading_img+'>');
  $('#modal-fill-body').load(page); 
}

function show_page_model_big(title,page)
{
  //alert(base_url+page);
  $('#modal-title1').html(title); 
  //alert(page);
  $('#modal-body1').html('<img src='+loading_img+'>');
  $('#modal-body1').load(page); 
}


function form_submit(x) 
{
      var form = $("#"+x);
        $('#msg'+x).html("Please Wait !");
        $.ajax({
           type: "POST",
           url: $("#"+x).attr("action"),
           data: form.serialize(),
           success: function(result)
           {
              $('#msg'+x).html(result);  
              setTimeout(function(){
                    $('#msg'+x).slideUp('slow').fadeOut(function() {
                        window.location.reload();
                    });
              }, 1000); 
           }
        }); 
        //form.show(); 
 } 

 function load_div(url,div)
 {
  $('#'+div).html('<img src='+loading_img+'>');
  $('#'+div).load(url); 
 }

 function form_submit_refresh(x,div,url) 
{
      var form = $("#"+x);
        $('#msg'+x).html("Please Wait !");
        $.ajax({
           type: "POST",
           url: $("#"+x).attr("action"),
           data: form.serialize(),
           success: function(result)
           {
              $('#msg'+x).html(result); 
              setTimeout(function(){
                    $('#msg'+x).slideUp('slow').fadeOut(function() {
                        load_div(url,div);
                    });
              }, 1000);  
              
           }
        }); 
        //form.show(); 
 } 
 function noform_submit(x,url)
 {
        var pid = $("#pid"+x).val;
        var sid = $("#sid"+x).val;
        var mtype = $("#mtype"+x).val;
        var finish = $("#finish"+x).val;

        $('#msg'+x).html("Please Wait !");
        $.ajax({
           type: "POST",
           url: url,
           data: {pid:pid,sid:sid,mtype:mtype,finish:finish},
           success: function(result)
           {
              $('#msg'+x).html(result);  
           }
        }); 
 }

 function form_submit_result(x)
 {
        var form = $("#"+x);
        $('#msg'+x).html("Please Wait !");
        $.ajax({
            type: "POST",
            url: $("#"+x).attr("action"),
            data: form.serialize(),
           success: function(result)
           {
              $('#msg'+x).html(result);  
           }
        }); 
 }


 function form_submit_alert(x) 
 {  
        var r = confirm("Are you sure you want to process  ??");
  
        if (r == true) 
        {
        var form = $("#"+x);
          $('#msg'+x).html("Please Wait !");
          // form.hide();
          $.ajax({
              type: "POST",
              url: $("#"+x).attr("action"),
              data: form.serialize(),
              success: function(result)
              {
                $('#msg'+x).html(result);  
                setTimeout(function(){
                      $('#msg'+x).slideUp('slow').fadeOut(function() {
                          window.location.reload();
                      });
                }, 1000); 
              }
          }); 
          //form.show(); 
        }         
  } 
 

 //-- action, query , id
function deleteme(h,i,j)
{
  var r = confirm("Are you sure you want to delete  ??");
  
  if (r == true) 
  {
     $.ajax({
           type: "GET",
           url: base_url+'index.php?action='+h+'&query='+i+'&id='+j,
           success: function(data)
           {
            //alert(data);
               //alert(base_url+'index.php?action='+h+'&query='+i+'&id='+j);
               $('#'+j).toggle(750); 
            
           }
       }); 
  } 
}


function get_details(inputid,url,outputid)
{
  
  var data = $('#'+inputid).val();
  
    $.ajax({
        type:'POST',
        url:url+'&id='+data,
        success:function(result){
          
            $('#'+outputid).html(result);
        }
    });
}


function get_details3(inputid,outputid,url)
{
  var data = $('#'+inputid).val();  
  $.ajax({
      type:'GET',
      url:url+data,
      success:function(result){
        var final_result = parseInt(result);
          $('#'+outputid).val(final_result);
      }
  });
}


function show_txtbox(id)
{
  $('#'+id).show();
}

function hide_txtbox(id)
{
  $('#'+id).hide();
}


function show_bycheck(checkbox,txtbox)
{
  if($('#'+checkbox).prop('checked') == true)
    {$('#'+txtbox).show();}
 else
    {$('#'+txtbox).hide();}
 
}

function discount_calc(id)
{
  var per=$('#discount'+id).val();
  var amt=$('#amount'+id).val();
  var total = parseFloat(per)*parseFloat(amt)/100;
  var total = total.toFixed(2);
  $('#discount_amt'+id).val(total);
  $('#discount_amt_val'+id).html(total);
}

function htmlget(id,filename)
      {
          var html = $("#"+id).html();
          //alert(html);
          var final_html = "<hr><form name='pdf' id='htmlpdf' target='_blank' action='"+base_url+"library/test.php' method='post'><input type='hidden' id='myhtml' name='html'><select name='page'><option disabled='disbaled' selected='selected'>--Page--</option><option>letter</option><option>A2</option><option>A3</option><option>A4</option></select><select name='orientation'><option disabled='disbaled' selected='selected'>--Type--</option><option value='landscape'>Landscape</option><option value='portrait'>Portrait</option></select><input type='hidden' name='filename' value='"+filename+"'><input type='submit' name='submit' value='Generate PDF'></form>";
          $("#editor").html(final_html);
          $("#myhtml").val(html);
          

      }


function get_mtype(id)      
{
  var mtype = $('#mtype'+id).val();
    $.ajax({
        type:'GET',
        url:base_url+'index.php?action=sales&query=getmtype&mtype='+mtype,
        success:function(result){
            $('#material'+id).html(result);
        }
    });
}

function get_ftype(id)      
{
  var mtype = $('#material'+id).val();
    $.ajax({
        type:'GET',
        url:base_url+'index.php?action=sales&query=getftype&mtype='+mtype,
        success:function(result){
            $('#finish'+id).html(result);
        }
    });
}

function get_subcat(idresult,value,fn)
{
    $.ajax({
        type:'GET',
        url:base_url+'index.php?action='+fn+'&query=get_subcat&id='+value,
        success:function(result){
            $('#'+idresult).html(result);
        }
    });
}


//----------- mm to other units
function mm_to_inch(mm)
{
    var inch = mm*0.0393701;
    return inch;
}



function mm_to_foot(mmid,cftid)
{
  
    var l = $('#length'+mmid).val();
    var w = $('#width'+mmid).val();
    var h = $('#height'+mmid).val();
    var qty =$('#qty'+mmid).val();
    
    //mm to cft 
    var lmm = l*0.00328084;
    var wmm = w*0.00328084;
    var hmm = h*0.00328084;
    var cft = parseFloat(lmm)*parseFloat(wmm)*parseFloat(hmm);
    var withqty = qty*cft;

    var finalcft = withqty.toFixed(4);
    $('#'+cftid).val(finalcft);
  
}


calculate_cbm(text_class)
{
  var l = $('#length'+text_class).val();
  alert(l);
  var w = $('#width'+text_class).val();
  var h = $('#height'+text_class).val();
  var total = parseFloat(l)*parseFloat(w)*parseFloat(h);
  //-- change this to cft

  $('#total'+text_class).val(total);
}

function populate_dropdown(id,url)
{
  
    $.ajax({
        type:'GET',
        url:url,
        success:function(result){
            $('#'+id).append(result);
        }
    });
}