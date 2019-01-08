jQuery(document).ready(function(){
  var time = new Date();
  $(".dateofbirth").attr("max",check_date(time));
  
  function check_date(date){
    var d = new Date(date);
    month_select = '' + (d.getMonth() + 1);
    date_select = '' + d.getDate();
    year_select = d.getFullYear();
    if(month_select.length < 2){
      month_select = '0' + month_select;
    }
    if (date_select.length < 2){
      date_select = '0' + date_select;
    }
    var a =year_select + "-" + month_select + "-" + date_select;
    return a;
  };
  
  // 
  $('.selectpicker').selectpicker();
  // language update 07/01
  $("#language-select").click(function(){
    $("#language").removeAttr("data-toggle");
  });
  // date start and finish
  var a,b;
  var btn_task = $("#btn-search-task");
  btn_task.click(check(a,b));
});
date_start = $("input[name='date_from']");
date_finish = $("input[name='date_to']");
  var date_start__day, date_start__month, date_start__year, date_finish__day, date_finish__month, date_finish__year;
  date_start.change(function(){
    var val = date_start.val();
    var string_date = val.split("-",);
    date_start__day = string_date[2];
    
    date_start__month = string_date[1];
    date_start__year = string_date[0];
    console.log(date_start__year);
  });
  date_finish.change(function(){
    var val_fn = date_finish.val();
    var string_datefn = val_fn.split("-",);
    date_finish__day = string_datefn[2];
    date_finish__month = string_datefn[1];
    date_finish__year = string_datefn[0];
    console.log(date_finish__year);
  });
function check(date_start,date_finish){
  if(Number(date_start__year) == Number(date_finish__year)){
    if(Number(date_start__month) <= Number(date_finish__month)){
      if(Number(date_start__day) <= Number(date_finish__day)){
        alert("a");
      // }else{
      //   alert("Start day be less than finish day");
      // }
    // }else{
    //   alert("Start month be less than finish month");
    // }
  // }else{
  //   alert("Start year not be big than finish year");
  // }
      }
    }
  }
  // 
}