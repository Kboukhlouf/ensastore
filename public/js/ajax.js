/**
 * Created by ELITE on 17/05/2016.
 */

function ajaxFunction(){
    var ajaxRequest=null;
    try{
        // Opera 8.0+, Firefox, Safari
        ajaxRequest = new XMLHttpRequest();
    }catch (e){
        // Internet Explorer Browsers
        try{
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        }catch (e) {
            try{
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            }catch (e){
                alert("Your browser broke!");
                return false;
            }
        }
    }
    return ajaxRequest;
}

var nomCateg = null;
var idCateg = null;
var range = '0,3000';

function getData() {
    var ajaxRequest = ajaxFunction();
    try{
        range = document.getElementById('mySlider').getAttribute('value');
        nomCateg = document.getElementById('nomCateg').innerText;
        idCateg = document.getElementById('idCateg').innerText;
        if(range==null) throw 'nullException';
        if(nomCateg==null || idCateg==null) throw 'someException';
    }
    catch(err){
        
    }
    ajaxRequest.open("GET","showProducts.php?range="+range+"&idCateg="+idCateg+"&categ="+nomCateg,true);
    ajaxRequest.onreadystatechange = function(){
        if(ajaxRequest.readyState==4 && ajaxRequest.status==200){
            try{
                var domElement = document.getElementById('products');
                document.getElementById('mySlider').setAttribute('data-slider-value','['+range+']');
                if(domElement==null) throw 'error';
                else domElement.innerHTML = ajaxRequest.responseText;
            }
            catch (err){
                
            }
        }

    };
    ajaxRequest.send(null);
}

function getLatestData() {
    var ajaxRequest = ajaxFunction();
    ajaxRequest.open("GET","showLatestProducts.php",true);
    ajaxRequest.onreadystatechange = function(){
        if( ajaxRequest.readyState==4 && ajaxRequest.status==200){
            try{
                var domElement = document.getElementById('latestProducts');
                if(domElement==null) throw 'error';
                else domElement.innerHTML = ajaxRequest.responseText;
            }
            catch(err){}
        }
    };
    ajaxRequest.send(null);
}

var intervalProducts = setInterval(getData,2000);
var intervalLatestProducts = setInterval(getLatestData,5000);