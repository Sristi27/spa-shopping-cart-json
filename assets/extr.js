console.clear();

var $lis = $("ul > li");

console.log($lis.length);

var $json='';

$("ul > li").each(

  function(i, item) {

if($json !='') $json += "\r\n \r\n <br/>,";
//image
var $img = $( $(this).find("img:nth-child(1)") );

$json +='{\"image_link\": \"' + $img.attr("src") + "\",";
if($json.indexOf("blank.gif") > 1) return;

$json +='\"image_alt\": \"' + $img.attr("alt")+ "\",";

//Id

var $id = $( $(this).find(".gallery-zoom:first") );
$json +='\"id\": \"' +  $id.attr("pro_id") + "\",";
$json +='\"pro_sku\":\"' +  $id.attr("pro_sku") + "\",";

//product link
var $link = $( $(this).find("a:nth-child(1)") );
$json += '\"product_link\":\"' + $link.attr("href")  + "\",";
$json += '\"description\":\"' + $link.attr("title") + "\",";


//$$price
	var $price_value ='';
  var $price;
	//var $price = $( $(this).find(".minimal-price-link > span:nth-child(2)") );
  //$price_value = $price.attr("defaultprice");
  
  //console.log('first att:' + !$price_value);
  
  if(!$price_value || $price_value =='') $price =  $( $(this).find(".price_collection span:first") );
  
  $price_value = $price.attr("defaultprice");
  $json +='\"price\":\"' + $price_value + "\"}";
	
  });

$("#json").html( "[" + $json + "]" ) ;
$("ul").hide();