/* function */


function log(json) {
  console.log(json);      
} 

function prettyPrintJson(json) {
  console.log(json);
  return JSON ? JSON.stringify(json, null, '  ') : 'your browser doesnt support JSON so cant pretty print';
}

function unsetData(object) {
  if(object){
    $.each(object,function(k,value){
          //console.log(value);
          if(value.data){
            var array = [];
            $.each(value.data,function(i,j){

              delete j['created_at'];
              delete j['updated_at'];

              if(j.phone){
                j.type = j.type.slug;
              }else{
                delete j['type'];  
              }
              
              object[k] = array.push(j);
            })
            object[k] = array;
          }
          
        })
    delete object['created_at'];
    delete object['updated_at'];
    return object;
  } 

  return object;
}

function _interopRequireDefault(obj) { 
	return obj && obj.__esModule ? obj : { default: obj }; 
}

function view(name){
	return window.NEXO.template_url+name;
}

function translateSingular(number, withoutSuffix, key, isFuture) {
	return withoutSuffix ? forms(key)[0] : (isFuture ? forms(key)[1] : forms(key)[2]);
}

function special(number) {
	return number % 10 === 0 || (number > 10 && number < 20);
}
function forms(key) {
	return units[key].split('_');
}

function convertTime(time,$translate){
	d = Number(time);
	var h = Math.floor(d / 3600);
	var m = Math.floor(d % 3600 / 60);
	var s = Math.floor(d % 3600 % 60);

	var hDisplay = h > 0 ? h + (h == 1 ? " "+$translate.instant('CUSTOMER.ASIGNACION.HORA')+", " : " "+$translate.instant('CUSTOMER.ASIGNACION.HORAS')+" ") : "";
	var mDisplay = m > 0 ? m + (m == 1 ? " "+$translate.instant('CUSTOMER.ASIGNACION.MINUTO')+", " : " "+$translate.instant('CUSTOMER.ASIGNACION.MINUTOS')+" ") : "";
	var sDisplay = s > 0 ? s + (s == 1 ? " "+$translate.instant('CUSTOMER.ASIGNACION.SEGUNDO')+"" : " "+$translate.instant('CUSTOMER.ASIGNACION.SEGUNDOS')+"") : "";

	return time = hDisplay + mDisplay + sDisplay; 
}


function computeTotalDistance(result) {
  var total = 0;
  var timeText= 0;
  var time= 0;
  var from=0;
  var to=0;
  var myroute = result.routes[0];
  var $arr = [];

  if(myroute.legs){
    for (var i = 0; i < myroute.legs.length; i++) {
      total += myroute.legs[i].distance.value;
      timeText +=myroute.legs[i].duration.text;
      time +=myroute.legs[i].duration.value;
      from =myroute.legs[i].start_address;
      to =myroute.legs[i].end_address;
    }
    
    total = total / 1000.

    $arr.from = from + '-'+to;
    $arr.durationText = timeText ;
    $arr.time = time;
    $arr.total =Math.round( total)+"KM" ;
  }
  

  return $arr;
}

function sum(a, b) { 
  return a + b; 
}

