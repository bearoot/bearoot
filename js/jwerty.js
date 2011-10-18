(function(global,exports){var $d=global.document,$=(global.jQuery||global.Zepto||global.ender||$d),$$,$b,ke='keydown';function realTypeOf(v,s){return(v===null)?s==='null':(v===undefined)?s==='undefined':(v.is&&v instanceof $)?s==='element':Object.prototype.toString.call(v).toLowerCase().indexOf(s)>7;}
if($===$d){$$=function(selector,context){return selector?$.querySelector(selector,context||$):$;};$b=function(e,fn){e.addEventListener(ke,fn,false);};$f=function(e,jwertyEv){var ret=document.createEvent('Event'),i;ret.initEvent(ke,true,true);for(i in jwertyEv)ret[i]=jwertyEv[i];return(e||$).dispatchEvent(ret);}}else{$$=function(selector,context,fn){return $(selector||$d,context);};$b=function(e,fn){$(e).bind(ke+'.jwerty',fn);};$f=function(e,ob){$(e||$d).trigger($.Event(ke,ob));};}
var _modProps={16:'shiftKey',17:'ctrlKey',18:'altKey',91:'metaKey'};var _keys={mods:{'â‡§':16,shift:16,'âŒƒ':17,ctrl:17,'âŒ¥':18,alt:18,option:18,'âŒ˜':91,meta:91,cmd:91,'super':91,win:91},keys:{'âŒ«':8,backspace:8,'â‡¥':9,'â‡†':9,tab:9,'â†©':13,'return':13,enter:13,'âŒ…':13,'pause':19,'pause-break':19,'â‡ª':20,caps:20,'caps-lock':20,'âŽ‹':27,escape:27,esc:27,space:32,'â†–':33,pgup:33,'page-up':33,'â†˜':34,pgdown:34,'page-down':34,'â‡Ÿ':35,end:35,'â‡ž':36,home:36,ins:45,insert:45,del:45,'delete':45,'â†':37,left:37,'arrow-left':37,'â†‘':38,up:38,'arrow-up':38,'â†’':39,right:39,'arrow-right':39,'â†“':40,down:40,'arrow-down':40,'*':106,star:106,asterisk:106,multiply:106,'+':107,'plus':107,'-':109,subtract:109,'=':187,'equals':187,',':188,comma:188,'.':190,period:190,'full-stop':190,'/':191,slash:191,'forward-slash':191,'`':192,tick:192,'back-quote':192,'[':219,'open-bracket':219,'\\':220,'back-slash':220,']':221,'close-bracket':221,'\'':222,quote:222,apostraphe:222}};i=95,n=0;while(++i<106){_keys.keys['num-'+n]=i;++n;}
i=47,n=0;while(++i<58){_keys.keys[n]=i;++n;}
i=111,n=1;while(++i<136){_keys.keys['f'+n]=i;++n;}
var i=64;while(++i<91){_keys.keys[String.fromCharCode(i).toLowerCase()]=i;}
function JwertyCode(jwertyCode){var i,c,n,z,keyCombo,optionals,jwertyCodeFragment,rangeMatches,rangeI;if(jwertyCode instanceof JwertyCode)return jwertyCode;if(!realTypeOf(jwertyCode,'array')){jwertyCode=(String(jwertyCode)).replace(/\s/g,'').toLowerCase().match(/(?:\+,|[^,])+/g);}
for(i=0,c=jwertyCode.length;i<c;++i){if(!realTypeOf(jwertyCode[i],'array')){jwertyCode[i]=String(jwertyCode[i]).match(/(?:\+\/|[^\/])+/g);}
optionals=[],n=jwertyCode[i].length;while(n--){var jwertyCodeFragment=jwertyCode[i][n];keyCombo={jwertyCombo:String(jwertyCodeFragment),shiftKey:false,ctrlKey:false,altKey:false,metaKey:false}
if(!realTypeOf(jwertyCodeFragment,'array')){jwertyCodeFragment=String(jwertyCodeFragment).toLowerCase().match(/(?:(?:[^\+])+|\+\+|^\+$)/g);}
z=jwertyCodeFragment.length;while(z--){if(jwertyCodeFragment[z]==='++')jwertyCodeFragment[z]='+';if(jwertyCodeFragment[z]in _keys.mods){keyCombo[_modProps[_keys.mods[jwertyCodeFragment[z]]]]=true;}else if(jwertyCodeFragment[z]in _keys.keys){keyCombo.keyCode=_keys.keys[jwertyCodeFragment[z]];}else{rangeMatches=jwertyCodeFragment[z].match(/^\[([^-]+\-?[^-]*)-([^-]+\-?[^-]*)\]$/);}}
if(realTypeOf(keyCombo.keyCode,'undefined')){if(rangeMatches&&(rangeMatches[1]in _keys.keys)&&(rangeMatches[2]in _keys.keys)){rangeMatches[2]=_keys.keys[rangeMatches[2]];rangeMatches[1]=_keys.keys[rangeMatches[1]];for(rangeI=rangeMatches[1];rangeI<rangeMatches[2];++rangeI){optionals.push({altKey:keyCombo.altKey,shiftKey:keyCombo.shiftKey,metaKey:keyCombo.metaKey,ctrlKey:keyCombo.ctrlKey,keyCode:rangeI,jwertyCombo:String(jwertyCodeFragment)});}
keyCombo.keyCode=rangeI;}else{keyCombo.keyCode=0;}}
optionals.push(keyCombo);}
this[i]=optionals;}
this.length=i;return this;}
var jwerty=exports.jwerty={event:function(jwertyCode,callbackFunction,callbackContext){if(realTypeOf(callbackFunction,'boolean')){var bool=callbackFunction;callbackFunction=function(){return bool;}}
jwertyCode=new JwertyCode(jwertyCode);var i=0,c=jwertyCode.length-1,returnValue,jwertyCodeIs;return function(event){if((jwertyCodeIs=jwerty.is(jwertyCode,event,i))){if(i<c){++i;return;}else{returnValue=callbackFunction.call(callbackContext||this,event,jwertyCodeIs);if(returnValue===false)event.preventDefault();i=0;return;}}
i=jwerty.is(jwertyCode,event)?1:0;}},is:function(jwertyCode,event,i){jwertyCode=new JwertyCode(jwertyCode);i=i||0;jwertyCode=jwertyCode[i];event=event.originalEvent||event;var key,n=jwertyCode.length,returnValue=false;while(n--){returnValue=jwertyCode[n].jwertyCombo;for(var p in jwertyCode[n]){if(p!=='jwertyCombo'&&event[p]!==jwertyCode[n][p])returnValue=false;}
if(returnValue!==false)return returnValue;}
return returnValue;},key:function(jwertyCode,callbackFunction,callbackContext,selector,selectorContext){var realSelector=realTypeOf(callbackContext,'element')||realTypeOf(callbackContext,'string')?callbackContext:selector,realcallbackContext=realSelector===callbackContext?global:callbackContext,realSelectorContext=realSelector===callbackContext?selector:selectorContext;$b(realTypeOf(realSelector,'element')?realSelector:$$(realSelector,realSelectorContext),jwerty.event(jwertyCode,callbackFunction,realcallbackContext));},fire:function(jwertyCode,selector,selectorContext,i){jwertyCode=new JwertyCode(jwertyCode);var realI=realTypeOf(selectorContext,'number')?selectorContext:i;$f(realTypeOf(selector,'element')?selector:$$(selector,selectorContext),jwertyCode[realI||0][0]);},KEYS:_keys};}(this,(typeof module!=='undefined'&&module.exports?module.exports:this)));