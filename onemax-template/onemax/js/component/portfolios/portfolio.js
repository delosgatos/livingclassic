/********modules.js********/
function ssc_init(){"use strict";if(document.body){var a=document.body,b=document.documentElement,c=window.innerHeight,d=a.scrollHeight;if(ssc_root=document.compatMode.indexOf("CSS")>=0?b:a,ssc_activeElement=a,ssc_initdone=!0,top!=self)ssc_frame=!0;else if(d>c&&(a.offsetHeight<=c||b.offsetHeight<=c)&&(ssc_root.style.height="auto",ssc_root.offsetHeight<=c)){var e=document.createElement("div");e.style.clear="both",a.appendChild(e)}ssc_fixedback||(a.style.backgroundAttachment="scroll",b.style.backgroundAttachment="scroll"),ssc_keyboardsupport&&ssc_addEvent("keydown",ssc_keydown)}}function ssc_scrollArray(a,b,c,d){if(d||(d=1e3),ssc_directionCheck(b,c),ssc_que.push({x:b,y:c,lastX:b<0?.99:-.99,lastY:c<0?.99:-.99,start:+new Date}),!ssc_pending){var e=function(){for(var f=+new Date,g=0,h=0,i=0;i<ssc_que.length;i++){var j=ssc_que[i],k=f-j.start,l=k>=ssc_animtime,m=l?1:k/ssc_animtime;ssc_pulseAlgorithm&&(m=ssc_pulse(m));var n=j.x*m-j.lastX>>0,o=j.y*m-j.lastY>>0;g+=n,h+=o,j.lastX+=n,j.lastY+=o,l&&(ssc_que.splice(i,1),i--)}if(b){var p=a.scrollLeft;a.scrollLeft+=g,g&&a.scrollLeft===p&&(b=0)}if(c){var q=a.scrollTop;a.scrollTop+=h,h&&a.scrollTop===q&&(c=0)}b||c||(ssc_que=[]),ssc_que.length?setTimeout(e,d/ssc_framerate+1):ssc_pending=!1};setTimeout(e,0),ssc_pending=!0}}function ssc_wheel(a){ssc_initdone||ssc_init();var b=a.target,c=ssc_overflowingAncestor(b);if(!c||a.defaultPrevented||ssc_isNodeName(ssc_activeElement,"embed")||ssc_isNodeName(b,"embed")&&/\.pdf/i.test(b.src))return!0;var d=a.wheelDeltaX||0,e=a.wheelDeltaY||0;d||e||(e=a.wheelDelta||0),Math.abs(d)>1.2&&(d*=ssc_stepsize/120),Math.abs(e)>1.2&&(e*=ssc_stepsize/120),ssc_scrollArray(c,-d,-e),a.preventDefault()}function ssc_keydown(a){var b=a.target,c=a.ctrlKey||a.altKey||a.metaKey;if(/input|textarea|embed/i.test(b.nodeName)||b.isContentEditable||a.defaultPrevented||c)return!0;if(ssc_isNodeName(b,"button")&&a.keyCode===ssc_key.spacebar)return!0;var d,e=0,f=0,g=ssc_overflowingAncestor(ssc_activeElement),h=g.clientHeight;switch(g==document.body&&(h=window.innerHeight),a.keyCode){case ssc_key.up:f=-ssc_arrowscroll;break;case ssc_key.down:f=ssc_arrowscroll;break;case ssc_key.spacebar:d=a.shiftKey?1:-1,f=-d*h*.9;break;case ssc_key.pageup:f=.9*-h;break;case ssc_key.pagedown:f=.9*h;break;case ssc_key.home:f=-g.scrollTop;break;case ssc_key.end:var i=g.scrollHeight-g.scrollTop-h;f=i>0?i+10:0;break;case ssc_key.left:e=-ssc_arrowscroll;break;case ssc_key.right:e=ssc_arrowscroll;break;default:return!0}ssc_scrollArray(g,e,f),a.preventDefault()}function ssc_mousedown(a){ssc_activeElement=a.target}function ssc_setCache(a,b){for(var c=a.length;c--;)ssc_cache[ssc_uniqueID(a[c])]=b;return b}function ssc_overflowingAncestor(a){var b=[],c=ssc_root.scrollHeight;do{var d=ssc_cache[ssc_uniqueID(a)];if(d)return ssc_setCache(b,d);if(b.push(a),c===a.scrollHeight){if(!ssc_frame||ssc_root.clientHeight+10<c)return ssc_setCache(b,document.body)}else if(a.clientHeight+10<a.scrollHeight&&(overflow=getComputedStyle(a,"").getPropertyValue("overflow"),"scroll"===overflow||"auto"===overflow))return ssc_setCache(b,a)}while(a=a.parentNode)}function ssc_addEvent(a,b,c){window.addEventListener(a,b,c||!1)}function ssc_removeEvent(a,b,c){window.removeEventListener(a,b,c||!1)}function ssc_isNodeName(a,b){return a.nodeName.toLowerCase()===b.toLowerCase()}function ssc_directionCheck(a,b){a=a>0?1:-1,b=b>0?1:-1,ssc_direction.x===a&&ssc_direction.y===b||(ssc_direction.x=a,ssc_direction.y=b,ssc_que=[])}function ssc_pulse_(a){var b,c,d;return a*=ssc_pulseScale,a<1?b=a-(1-Math.exp(-a)):(c=Math.exp(-1),a-=1,d=1-Math.exp(-a),b=c+d*(1-c)),b*ssc_pulseNormalize}function ssc_pulse(a){return a>=1?1:a<=0?0:(1==ssc_pulseNormalize&&(ssc_pulseNormalize/=ssc_pulse_(1)),ssc_pulse_(a))}!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a(jQuery)}(function(a){a.fn.tweet=function(b){function e(a,b){if("string"==typeof a){var c=a;for(var d in b){var e=b[d];c=c.replace(new RegExp("{"+d+"}","g"),null===e?"":e)}return c}return a(b)}function f(b,c){return function(){var d=[];return this.each(function(){d.push(this.replace(b,c))}),a(d)}}function g(a){return a.replace(/</g,"&lt;").replace(/>/g,"^&gt;")}function h(a,b){return a.replace(d,function(a){for(var c=/^[a-z]+:/i.test(a)?a:"http://"+a,d=a,e=0;e<b.length;++e){var f=b[e];if(f.url==c&&f.expanded_url){c=f.expanded_url,d=f.display_url;break}}return'<a href="'+g(c)+'">'+g(d)+"</a>"})}function i(a){return Date.parse(a.replace(/^([a-z]{3})( [a-z]{3} \d\d?)(.*)( \d{4})$/i,"$1,$2$4$3"))}function j(a){var b=arguments.length>1?arguments[1]:new Date,c=parseInt((b.getTime()-a)/1e3,10),d="";return d=c<1?"just now":c<60?c+" seconds ago":c<120?"about a minute ago":c<2700?"about "+parseInt(c/60,10).toString()+" minutes ago":c<7200?"about an hour ago":c<86400?"about "+parseInt(c/3600,10).toString()+" hours ago":c<172800?"about a day ago":"about "+parseInt(c/86400,10).toString()+" days ago"}function k(a){return a.match(/^(@([A-Za-z0-9-_]+)) .*/i)?c.auto_join_text_reply:a.match(d)?c.auto_join_text_url:a.match(/^((\w+ed)|just) .*/im)?c.auto_join_text_ed:a.match(/^(\w*ing) .*/i)?c.auto_join_text_ing:c.auto_join_text_default}function l(){var d=(c.modpath,null===c.fetch?c.count:c.fetch),e={include_entities:1};if(c.list)return{host:c.twitter_api_url,url:"/1.1/lists/statuses.json",parameters:a.extend({},e,{list_id:c.list_id,slug:c.list,owner_screen_name:c.username,page:c.page,count:d,include_rts:c.retweets?1:0})};if(c.favorites)return{host:c.twitter_api_url,url:"/1.1/favorites/list.json",parameters:a.extend({},e,{list_id:c.list_id,screen_name:c.username,page:c.page,count:d})};if(null===c.query&&1===c.username.length)return{host:c.twitter_api_url,url:"/1.1/statuses/user_timeline.json",parameters:a.extend({},e,{screen_name:c.username,page:c.page,count:d,include_rts:c.retweets?1:0})};var f=c.query||"from:"+c.username.join(" OR from:");return{host:c.twitter_search_url,url:"/search.json",parameters:a.extend({},e,{page:c.page,q:f,rpp:d})}}function m(a,b){return b?"user"in a?a.user.profile_image_url_https:m(a,!1).replace(/^http:\/\/[a-z0-9]{1,3}\.twimg\.com\//,"https://s3.amazonaws.com/twitter_production/"):a.profile_image_url||a.user.profile_image_url}function n(b){var d={};return d.item=b,d.source=b.source,d.name=b.from_user_name||b.user.name,d.screen_name=b.from_user||b.user.screen_name,d.avatar_size=c.avatar_size,d.avatar_url=m(b,"https:"===document.location.protocol),d.retweet="undefined"!=typeof b.retweeted_status,d.tweet_time=i(b.created_at),d.join_text="auto"==c.join_text?k(b.text):c.join_text,d.tweet_id=b.id_str,d.twitter_base="http://"+c.twitter_url+"/",d.user_url=d.twitter_base+d.screen_name,d.tweet_url=d.user_url+"/status/"+d.tweet_id,d.reply_url=d.twitter_base+"intent/tweet?in_reply_to="+d.tweet_id,d.retweet_url=d.twitter_base+"intent/retweet?tweet_id="+d.tweet_id,d.favorite_url=d.twitter_base+"intent/favorite?tweet_id="+d.tweet_id,d.retweeted_screen_name=d.retweet&&b.retweeted_status.user.screen_name,d.tweet_relative_time=j(d.tweet_time),d.entities=b.entities?(b.entities.urls||[]).concat(b.entities.media||[]):[],d.tweet_raw_text=d.retweet?"RT @"+d.retweeted_screen_name+" "+b.retweeted_status.text:b.text,d.tweet_text=a([h(d.tweet_raw_text,d.entities)]).linkUser().linkHash()[0],d.tweet_text_fancy=a([d.tweet_text]).makeHeart()[0],d.user=e('<a class="tweet_user" href="{user_url}">{screen_name}</a>',d),d.join=c.join_text?e(' <span class="tweet_join">{join_text}</span> ',d):" ",d.avatar=d.avatar_size?e('<a class="tweet_avatar" href="{user_url}"><img src="{avatar_url}" height="{avatar_size}" width="{avatar_size}" alt="{screen_name}\'s avatar" title="{screen_name}\'s avatar" border="0"/></a>',d):"",d.time=e('<span class="tweet_time"><a href="{tweet_url}" title="view tweet on twitter">{tweet_relative_time}</a></span>',d),d.text=e('<span class="tweet_text">{tweet_text_fancy}</span>',d),d.reply_action=e('<a class="tweet_action tweet_reply" href="{reply_url}">reply</a>',d),d.retweet_action=e('<a class="tweet_action tweet_retweet" href="{retweet_url}">retweet</a>',d),d.favorite_action=e('<a class="tweet_action tweet_favorite" href="{favorite_url}">favorite</a>',d),d}var c=a.extend({modpath:"twitter",username:null,list_id:null,list:null,favorites:!1,query:null,avatar_size:null,count:3,fetch:null,page:1,retweets:!0,intro_text:null,outro_text:null,join_text:null,auto_join_text_default:"i said,",auto_join_text_ed:"i",auto_join_text_ing:"i am",auto_join_text_reply:"i replied to",auto_join_text_url:"i was looking at",loading_text:null,refresh_interval:null,twitter_url:"twitter.com",twitter_api_url:"api.twitter.com",twitter_search_url:"search.twitter.com",template:"{avatar}{join}{text}{time}",comparator:function(a,b){return b.tweet_time-a.tweet_time},filter:function(a){return!0}},b),d=/\b((?:[a-z][\w-]+:(?:\/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'".,<>?芦禄""'']))/gi;return a.extend({tweet:{t:e}}),a.fn.extend({linkUser:f(/(^|[\W])@(\w+)/gi,'$1<span class="at">@</span><a href="http://'+c.twitter_url+'/$2">$2</a>'),linkHash:f(/(?:^| )[\#]+([\w\u00c0-\u00d6\u00d8-\u00f6\u00f8-\u00ff\u0600-\u06ff]+)/gi,' <a href="http://'+c.twitter_search_url+"/search?q=&tag=$1&lang=all"+(c.username&&1==c.username.length&&!c.list?"&from="+c.username.join("%2BOR%2B"):"")+'" class="tweet_hashtag">#$1</a>'),makeHeart:f(/(&lt;)+[3]/gi,"<tt class='heart'>&#x2665;</tt>")}),this.each(function(b,d){var f=a('<ul class="tweet_list">'),g='<p class="tweet_intro">'+c.intro_text+"</p>",h='<p class="tweet_outro">'+c.outro_text+"</p>",i=a('<p class="loading">'+c.loading_text+"</p>");c.username&&"string"==typeof c.username&&(c.username=[c.username]),a(d).unbind("tweet:load").bind("tweet:load",function(){c.loading_text&&a(d).empty().append(i),a.ajax({dataType:"json",type:"post",async:!1,url:c.modpath||"/twitter/",data:{request:l()},success:function(b,i){b.message&&console.log(b.message);var j=b.response;a(d).empty().append(f),c.intro_text&&f.before(g),f.empty(),void 0!==j.statuses?resp=j.statuses:void 0!==j.results?resp=j.results:resp=j;var k=a.map(resp,n);k=a.grep(k,c.filter).sort(c.comparator).slice(0,c.count),f.append(a.map(k,function(a){return"<li>"+e(c.template,a)+"</li>"}).join("")).children("li:first").addClass("tweet_first").end().children("li:odd").addClass("tweet_even").end().children("li:even").addClass("tweet_odd"),c.outro_text&&f.after(h),a(d).trigger("loaded").trigger(k?"empty":"full"),c.refresh_interval&&window.setTimeout(function(){a(d).trigger("tweet:load")},1e3*c.refresh_interval)}})}).trigger("tweet:load")})}}),function(){var a=[].indexOf||function(a){for(var b=0,c=this.length;b<c;b++)if(b in this&&this[b]===a)return b;return-1},b=[].slice;!function(a,b){return"function"==typeof define&&define.amd?define("waypoints",["jquery"],function(c){return b(c,a)}):b(a.jQuery,a)}(this,function(c,d){var e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t;return e=c(d),l=a.call(d,"ontouchstart")>=0,h={horizontal:{},vertical:{}},i=1,k={},j="waypoints-context-id",o="resize.waypoints",p="scroll.waypoints",q=1,r="waypoints-waypoint-ids",s="waypoint",t="waypoints",f=function(){function a(a){var b=this;this.$element=a,this.element=a[0],this.didResize=!1,this.didScroll=!1,this.id="context"+i++,this.oldScroll={x:a.scrollLeft(),y:a.scrollTop()},this.waypoints={horizontal:{},vertical:{}},a.data(j,this.id),k[this.id]=this,a.bind(p,function(){var a;if(!b.didScroll&&!l)return b.didScroll=!0,a=function(){return b.doScroll(),b.didScroll=!1},d.setTimeout(a,c[t].settings.scrollThrottle)}),a.bind(o,function(){var a;if(!b.didResize)return b.didResize=!0,a=function(){return c[t]("refresh"),b.didResize=!1},d.setTimeout(a,c[t].settings.resizeThrottle)})}return a.prototype.doScroll=function(){var a,b=this;return a={horizontal:{newScroll:this.$element.scrollLeft(),oldScroll:this.oldScroll.x,forward:"right",backward:"left"},vertical:{newScroll:this.$element.scrollTop(),oldScroll:this.oldScroll.y,forward:"down",backward:"up"}},!l||a.vertical.oldScroll&&a.vertical.newScroll||c[t]("refresh"),c.each(a,function(a,d){var e,f,g;return g=[],f=d.newScroll>d.oldScroll,e=f?d.forward:d.backward,c.each(b.waypoints[a],function(a,b){var c,e;return d.oldScroll<(c=b.offset)&&c<=d.newScroll?g.push(b):d.newScroll<(e=b.offset)&&e<=d.oldScroll?g.push(b):void 0}),g.sort(function(a,b){return a.offset-b.offset}),f||g.reverse(),c.each(g,function(a,b){if(b.options.continuous||a===g.length-1)return b.trigger([e])})}),this.oldScroll={x:a.horizontal.newScroll,y:a.vertical.newScroll}},a.prototype.refresh=function(){var a,b,d,e=this;return d=c.isWindow(this.element),b=this.$element.offset(),this.doScroll(),a={horizontal:{contextOffset:d?0:b.left,contextScroll:d?0:this.oldScroll.x,contextDimension:this.$element.width(),oldScroll:this.oldScroll.x,forward:"right",backward:"left",offsetProp:"left"},vertical:{contextOffset:d?0:b.top,contextScroll:d?0:this.oldScroll.y,contextDimension:d?c[t]("viewportHeight"):this.$element.height(),oldScroll:this.oldScroll.y,forward:"down",backward:"up",offsetProp:"top"}},c.each(a,function(a,b){return c.each(e.waypoints[a],function(a,d){var e,f,g,h,i;if(e=d.options.offset,g=d.offset,f=c.isWindow(d.element)?0:d.$element.offset()[b.offsetProp],c.isFunction(e)?e=e.apply(d.element):"string"==typeof e&&(e=parseFloat(e),d.options.offset.indexOf("%")>-1&&(e=Math.ceil(b.contextDimension*e/100))),d.offset=f-b.contextOffset+b.contextScroll-e,(!d.options.onlyOnScroll||null==g)&&d.enabled)return null!==g&&g<(h=b.oldScroll)&&h<=d.offset?d.trigger([b.backward]):null!==g&&g>(i=b.oldScroll)&&i>=d.offset?d.trigger([b.forward]):null===g&&b.oldScroll>=d.offset?d.trigger([b.forward]):void 0})})},a.prototype.checkEmpty=function(){if(c.isEmptyObject(this.waypoints.horizontal)&&c.isEmptyObject(this.waypoints.vertical))return this.$element.unbind([o,p].join(" ")),delete k[this.id]},a}(),g=function(){function a(a,b,d){var e,f;d=c.extend({},c.fn[s].defaults,d),"bottom-in-view"===d.offset&&(d.offset=function(){var a;return a=c[t]("viewportHeight"),c.isWindow(b.element)||(a=b.$element.height()),a-c(this).outerHeight()}),this.$element=a,this.element=a[0],this.axis=d.horizontal?"horizontal":"vertical",this.callback=d.handler,this.context=b,this.enabled=d.enabled,this.id="waypoints"+q++,this.offset=null,this.options=d,b.waypoints[this.axis][this.id]=this,h[this.axis][this.id]=this,e=null!=(f=a.data(r))?f:[],e.push(this.id),a.data(r,e)}return a.prototype.trigger=function(a){if(this.enabled)return null!=this.callback&&this.callback.apply(this.element,a),this.options.triggerOnce?this.destroy():void 0},a.prototype.disable=function(){return this.enabled=!1},a.prototype.enable=function(){return this.context.refresh(),this.enabled=!0},a.prototype.destroy=function(){return delete h[this.axis][this.id],delete this.context.waypoints[this.axis][this.id],this.context.checkEmpty()},a.getWaypointsByElement=function(a){var b,d;return(d=c(a).data(r))?(b=c.extend({},h.horizontal,h.vertical),c.map(d,function(a){return b[a]})):[]},a}(),n={init:function(a,b){var d;return null==b&&(b={}),null==(d=b.handler)&&(b.handler=a),this.each(function(){var a,d,e,h;return a=c(this),e=null!=(h=b.context)?h:c.fn[s].defaults.context,c.isWindow(e)||(e=a.closest(e)),e=c(e),d=k[e.data(j)],d||(d=new f(e)),new g(a,d,b)}),c[t]("refresh"),this},disable:function(){return n._invoke(this,"disable")},enable:function(){return n._invoke(this,"enable")},destroy:function(){return n._invoke(this,"destroy")},prev:function(a,b){return n._traverse.call(this,a,b,function(a,b,c){if(b>0)return a.push(c[b-1])})},next:function(a,b){return n._traverse.call(this,a,b,function(a,b,c){if(b<c.length-1)return a.push(c[b+1])})},_traverse:function(a,b,e){var f,g;return null==a&&(a="vertical"),null==b&&(b=d),g=m.aggregate(b),f=[],this.each(function(){var b;return b=c.inArray(this,g[a]),e(f,b,g[a])}),this.pushStack(f)},_invoke:function(a,b){return a.each(function(){var a;return a=g.getWaypointsByElement(this),c.each(a,function(a,c){return c[b](),!0})}),this}},c.fn[s]=function(){var a,d;return d=arguments[0],a=2<=arguments.length?b.call(arguments,1):[],n[d]?n[d].apply(this,a):c.isFunction(d)?n.init.apply(this,arguments):c.isPlainObject(d)?n.init.apply(this,[null,d]):d?c.error("The "+d+" method does not exist in jQuery Waypoints."):c.error("jQuery Waypoints needs a callback function or handler option.")},c.fn[s].defaults={context:d,continuous:!0,enabled:!0,horizontal:!1,offset:0,triggerOnce:!1},m={refresh:function(){return c.each(k,function(a,b){return b.refresh()})},viewportHeight:function(){var a;return null!=(a=d.innerHeight)?a:e.height()},aggregate:function(a){var b,d,e;return b=h,a&&(b=null!=(e=k[c(a).data(j)])?e.waypoints:void 0),b?(d={horizontal:[],vertical:[]},c.each(d,function(a,e){return c.each(b[a],function(a,b){return e.push(b)}),e.sort(function(a,b){return a.offset-b.offset}),d[a]=c.map(e,function(a){return a.element}),d[a]=c.unique(d[a])}),d):[]},above:function(a){return null==a&&(a=d),m._filter(a,"vertical",function(a,b){return b.offset<=a.oldScroll.y})},below:function(a){return null==a&&(a=d),m._filter(a,"vertical",function(a,b){return b.offset>a.oldScroll.y})},left:function(a){return null==a&&(a=d),m._filter(a,"horizontal",function(a,b){return b.offset<=a.oldScroll.x})},right:function(a){return null==a&&(a=d),m._filter(a,"horizontal",function(a,b){return b.offset>a.oldScroll.x})},enable:function(){return m._invoke("enable")},disable:function(){return m._invoke("disable")},destroy:function(){return m._invoke("destroy")},extendFn:function(a,b){return n[a]=b},_invoke:function(a){var b;return b=c.extend({},h.vertical,h.horizontal),c.each(b,function(b,c){return c[a](),!0})},_filter:function(a,b,d){var e,f;return(e=k[c(a).data(j)])?(f=[],c.each(e.waypoints[b],function(a,b){if(d(e,b))return f.push(b)}),f.sort(function(a,b){return a.offset-b.offset}),c.map(f,function(a){return a.element})):[]}},c[t]=function(){var a,c;return c=arguments[0],a=2<=arguments.length?b.call(arguments,1):[],m[c]?m[c].apply(null,a):m.aggregate.call(null,c)},c[t].settings={resizeThrottle:100,scrollThrottle:30},e.load(function(){return c[t]("refresh")})})}.call(this),function(a){jQuery.easyPieChart=function(a,b){var c,d,e,f,g,h,i,j,k=this;return this.el=a,this.$el=jQuery(a),this.$el.data("easyPieChart",this),this.init=function(){var a,c;return k.options=jQuery.extend({},jQuery.easyPieChart.defaultOptions,b),a=parseInt(k.$el.data("percent"),10),k.percentage=0,k.canvas=jQuery("<canvas width='"+k.options.size+"' height='"+k.options.size+"'></canvas>").get(0),k.$el.append(k.canvas),"undefined"!=typeof G_vmlCanvasManager&&null!==G_vmlCanvasManager&&G_vmlCanvasManager.initElement(k.canvas),k.ctx=k.canvas.getContext("2d"),window.devicePixelRatio>1&&(c=window.devicePixelRatio,jQuery(k.canvas).css({width:k.options.size,height:k.options.size}),k.canvas.width*=c,k.canvas.height*=c,k.ctx.scale(c,c)),k.ctx.translate(k.options.size/2,k.options.size/2),k.ctx.rotate(k.options.rotate*Math.PI/180),k.$el.addClass("easyPieChart"),k.$el.css({width:k.options.size,height:k.options.size,lineHeight:""+k.options.size+"px"}),k.update(a),k},this.update=function(a){return a=parseFloat(a)||0,k.options.animate===!1?e(a):d(k.percentage,a),k},i=function(){var a,b,d;for(k.ctx.fillStyle=k.options.scaleColor,k.ctx.lineWidth=1,d=[],a=b=0;b<=24;a=++b)d.push(c(a));return d},c=function(a){var b;b=a%6===0?0:.017*k.options.size,k.ctx.save(),k.ctx.rotate(a*Math.PI/12),k.ctx.fillRect(k.options.size/2-b,0,.05*-k.options.size+b,1),k.ctx.restore()},j=function(){var a;a=k.options.size/2-k.options.lineWidth/2,k.options.scaleColor!==!1&&(a-=.08*k.options.size),k.ctx.beginPath(),k.ctx.arc(0,0,a,0,2*Math.PI,!0),k.ctx.closePath(),k.ctx.strokeStyle=k.options.trackColor,k.ctx.lineWidth=k.options.lineWidth,k.ctx.stroke()},h=function(){k.options.scaleColor!==!1&&i(),k.options.trackColor!==!1&&j()},e=function(a){var b;h(),k.ctx.strokeStyle=jQuery.isFunction(k.options.barColor)?k.options.barColor(a):k.options.barColor,k.ctx.lineCap=k.options.lineCap,k.ctx.lineWidth=k.options.lineWidth,b=k.options.size/2-k.options.lineWidth/2,k.options.scaleColor!==!1&&(b-=.08*k.options.size),k.ctx.save(),k.ctx.rotate(-Math.PI/2),k.ctx.beginPath(),k.ctx.arc(0,0,b,0,2*Math.PI*a/100,!1),k.ctx.stroke(),k.ctx.restore()},g=function(){return window.requestAnimationFrame||window.webkitRequestAnimationFrame||window.mozRequestAnimationFrame||function(a){return window.setTimeout(a,1e3/60)}}(),d=function(a,b){var c,d;k.options.onStart.call(k),k.percentage=b,Date.now||(Date.now=function(){return+new Date}),d=Date.now(),c=function(){var i,j;if(j=Date.now()-d,j<k.options.animate&&g(c),k.ctx.clearRect(-k.options.size/2,-k.options.size/2,k.options.size,k.options.size),h.call(k),i=[f(j,a,b-a,k.options.animate)],k.options.onStep.call(k,i),e.call(k,i),j>=k.options.animate)return k.options.onStop.call(k,i,b)},g(c)},f=function(a,b,c,d){var e,f;return e=function(a){return Math.pow(a,2)},f=function(a){return a<1?e(a):2-e(a/2*-2+2)},a/=d/2,c/2*f(a)+b},this.init()},jQuery.easyPieChart.defaultOptions={barColor:"#ef1e25",trackColor:"#f2f2f2",scaleColor:"#dfe0e0",lineCap:"round",rotate:0,size:110,lineWidth:3,animate:!1,onStart:jQuery.noop,onStop:jQuery.noop,onStep:jQuery.noop},jQuery.fn.easyPieChart=function(a){return jQuery.each(this,function(b,c){var d,e;if(d=jQuery(c),!d.data("easyPieChart"))return e=jQuery.extend({},a,d.data()),d.data("easyPieChart",new jQuery.easyPieChart(c,e))})}}(jQuery);var ssc_framerate=150,ssc_animtime=500,ssc_stepsize=150,ssc_pulseAlgorithm=!0,ssc_pulseScale=6,ssc_pulseNormalize=1,ssc_keyboardsupport=!0,ssc_arrowscroll=50,ssc_frame=!1,ssc_direction={x:0,y:0},ssc_initdone=!1,ssc_fixedback=!0,ssc_root=document.documentElement,ssc_activeElement,ssc_key={left:37,up:38,right:39,down:40,spacebar:32,pageup:33,pagedown:34,end:35,home:36},ssc_que=[],ssc_pending=!1,ssc_cache={};setInterval(function(){ssc_cache={}},1e4);var ssc_uniqueID=function(){var a=0;return function(b){return b.ssc_uniqueID||(b.ssc_uniqueID=a++)}}(),ischrome=/chrome/.test(navigator.userAgent.toLowerCase());ischrome&&(ssc_addEvent("mousedown",ssc_mousedown),ssc_addEvent("mousewheel",ssc_wheel),ssc_addEvent("load",ssc_init)),window.Modernizr=function(a,b,c){function d(a){q.cssText=a}function f(a,b){return typeof a===b}function g(a,b){return!!~(""+a).indexOf(b)}function h(a,b){for(var d in a){var e=a[d];if(!g(e,"-")&&q[e]!==c)return"pfx"!=b||e}return!1}function i(a,b,d){for(var e in a){var g=b[a[e]];if(g!==c)return d===!1?a[e]:f(g,"function")?g.bind(d||b):g}return!1}function j(a,b,c){var d=a.charAt(0).toUpperCase()+a.slice(1),e=(a+" "+v.join(d+" ")+d).split(" ");return f(b,"string")||f(b,"undefined")?h(e,b):(e=(a+" "+w.join(d+" ")+d).split(" "),i(e,b,c))}var r,C,F,k="2.7.2",l={},m=!0,n=b.documentElement,o="modernizr",p=b.createElement(o),q=p.style,t=({}.toString," -webkit- -moz- -o- -ms- ".split(" ")),u="Webkit Moz O ms",v=u.split(" "),w=u.toLowerCase().split(" "),x={},A=[],B=A.slice,D=function(a,c,d,e){var f,g,h,i,j=b.createElement("div"),k=b.body,l=k||b.createElement("body");if(parseInt(d,10))for(;d--;)h=b.createElement("div"),h.id=e?e[d]:o+(d+1),j.appendChild(h);return f=["&#173;",'<style id="s',o,'">',a,"</style>"].join(""),j.id=o,(k?j:l).innerHTML+=f,l.appendChild(j),k||(l.style.background="",l.style.overflow="hidden",i=n.style.overflow,n.style.overflow="hidden",n.appendChild(l)),g=c(j,a),k?j.parentNode.removeChild(j):(l.parentNode.removeChild(l),n.style.overflow=i),!!g},E={}.hasOwnProperty;F=f(E,"undefined")||f(E.call,"undefined")?function(a,b){return b in a&&f(a.constructor.prototype[b],"undefined")}:function(a,b){return E.call(a,b)},Function.prototype.bind||(Function.prototype.bind=function(a){var b=this;if("function"!=typeof b)throw new TypeError;var c=B.call(arguments,1),d=function(){if(this instanceof d){var e=function(){};e.prototype=b.prototype;var f=new e,g=b.apply(f,c.concat(B.call(arguments)));return Object(g)===g?g:f}return b.apply(a,c.concat(B.call(arguments)))};return d}),x.touch=function(){var c;return"ontouchstart"in a||a.DocumentTouch&&b instanceof DocumentTouch?c=!0:D(["@media (",t.join("touch-enabled),("),o,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(a){c=9===a.offsetTop}),c},x.csstransitions=function(){return j("transition")};for(var G in x)F(x,G)&&(C=G.toLowerCase(),l[C]=x[G](),A.push((l[C]?"":"no-")+C));return l.addTest=function(a,b){if("object"==typeof a)for(var d in a)F(a,d)&&l.addTest(d,a[d]);else{if(a=a.toLowerCase(),l[a]!==c)return l;b="function"==typeof b?b():b,"undefined"!=typeof m&&m&&(n.className+=" "+(b?"":"no-")+a),l[a]=b}return l},d(""),p=r=null,l._version=k,l._prefixes=t,l._domPrefixes=w,l._cssomPrefixes=v,l.testProp=function(a){return h([a])},l.testAllProps=j,l.testStyles=D,n.className=n.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(m?" js "+A.join(" "):""),l}(this,this.document),function(a){var b=function(b,c){var d=a.extend({},a.fn.nivoSlider.defaults,c),e={currentSlide:0,currentImage:"",totalSlides:0,running:!1,paused:!1,stop:!1,controlNavEl:!1},f=a(b);f.data("nivo:vars",e).addClass("nivoSlider");var g=f.children();g.each(function(){var b=a(this),c="";b.is("img")||(b.is("a")&&(b.addClass("nivo-imageLink"),c=b),b=b.find("img:first"));var d=0===d?b.attr("width"):b.width(),f=0===f?b.attr("height"):b.height();""!==c&&c.css("display","none"),b.css("display","none"),e.totalSlides++}),d.randomStart&&(d.startSlide=Math.floor(Math.random()*e.totalSlides)),d.startSlide>0&&(d.startSlide>=e.totalSlides&&(d.startSlide=e.totalSlides-1),e.currentSlide=d.startSlide),a(g[e.currentSlide]).is("img")?e.currentImage=a(g[e.currentSlide]):e.currentImage=a(g[e.currentSlide]).find("img:first"),a(g[e.currentSlide]).is("a")&&a(g[e.currentSlide]).css("display","block");var h=a("<img/>").addClass("nivo-main-image");h.attr("src",e.currentImage.attr("src")).show(),f.append(h),a(window).resize(function(){f.children("img").width(f.width()),h.attr("src",e.currentImage.attr("src")),h.stop().height("auto"),a(".nivo-slice").remove(),a(".nivo-box").remove()}),f.append(a('<div class="nivo-caption"></div>'));var i=function(b){var c=a(".nivo-caption",f);if(""!=e.currentImage.attr("title")&&void 0!=e.currentImage.attr("title")){var d=e.currentImage.attr("title");"#"==d.substr(0,1)&&(d=a(d).html()),"block"==c.css("display")?setTimeout(function(){c.html(d)},b.animSpeed):(c.html(d),c.stop().fadeIn(b.animSpeed))}else c.stop().fadeOut(b.animSpeed)};i(d);var j=0;if(!d.manualAdvance&&g.length>1&&(j=setInterval(function(){o(f,g,d,!1)},d.pauseTime)),d.directionNav&&(f.append('<div class="nivo-directionNav"><a class="nivo-prevNav">'+d.prevText+'</a><a class="nivo-nextNav">'+d.nextText+"</a></div>"),a(f).on("click","a.nivo-prevNav",function(){return!e.running&&(clearInterval(j),j="",e.currentSlide-=2,void o(f,g,d,"prev"))}),a(f).on("click","a.nivo-nextNav",function(){return!e.running&&(clearInterval(j),j="",void o(f,g,d,"next"))})),d.controlNav){e.controlNavEl=a('<div class="nivo-controlNav"></div>'),f.after(e.controlNavEl);for(var k=0;k<g.length;k++)if(d.controlNavThumbs){e.controlNavEl.addClass("nivo-thumbs-enabled");var l=g.eq(k);l.is("img")||(l=l.find("img:first")),l.attr("data-thumb")&&e.controlNavEl.append('<a class="nivo-control" rel="'+k+'"><img src="'+l.attr("data-thumb")+'" alt="" /></a>')}else e.controlNavEl.append('<a class="nivo-control" rel="'+k+'">'+(k+1)+"</a>");a("a:eq("+e.currentSlide+")",e.controlNavEl).addClass("active"),a("a",e.controlNavEl).bind("click",function(){return!e.running&&(!a(this).hasClass("active")&&(clearInterval(j),j="",h.attr("src",e.currentImage.attr("src")),e.currentSlide=a(this).attr("rel")-1,void o(f,g,d,"control")))})}d.pauseOnHover&&f.hover(function(){e.paused=!0,clearInterval(j),j=""},function(){e.paused=!1,""!==j||d.manualAdvance||(j=setInterval(function(){o(f,g,d,!1)},d.pauseTime))}),f.bind("nivo:animFinished",function(){h.attr("src",e.currentImage.attr("src")),e.running=!1,a(g).each(function(){a(this).is("a")&&a(this).css("display","none")}),a(g[e.currentSlide]).is("a")&&a(g[e.currentSlide]).css("display","block"),""!==j||e.paused||d.manualAdvance||(j=setInterval(function(){o(f,g,d,!1)},d.pauseTime)),d.afterChange.call(this)});var m=function(b,c,d){a(d.currentImage).parent().is("a")&&a(d.currentImage).parent().css("display","block"),a('img[src="'+d.currentImage.attr("src")+'"]',b).not(".nivo-main-image,.nivo-control img").width(b.width()).css("visibility","hidden").show();for(var e=a('img[src="'+d.currentImage.attr("src")+'"]',b).not(".nivo-main-image,.nivo-control img").parent().is("a")?a('img[src="'+d.currentImage.attr("src")+'"]',b).not(".nivo-main-image,.nivo-control img").parent().height():a('img[src="'+d.currentImage.attr("src")+'"]',b).not(".nivo-main-image,.nivo-control img").height(),f=0;f<c.slices;f++){var g=Math.round(b.width()/c.slices);f===c.slices-1?b.append(a('<div class="nivo-slice" name="'+f+'"><img src="'+d.currentImage.attr("src")+'" style="position:absolute; width:'+b.width()+"px; height:auto; display:block !important; top:0; left:-"+(g+f*g-g)+'px;" /></div>').css({left:g*f+"px",width:b.width()-g*f+"px",height:e+"px",opacity:"0",overflow:"hidden"})):b.append(a('<div class="nivo-slice" name="'+f+'"><img src="'+d.currentImage.attr("src")+'" style="position:absolute; width:'+b.width()+"px; height:auto; display:block !important; top:0; left:-"+(g+f*g-g)+'px;" /></div>').css({left:g*f+"px",width:g+"px",height:e+"px",opacity:"0",overflow:"hidden"}))}a(".nivo-slice",b).height(e),h.stop().animate({height:a(d.currentImage).height()},c.animSpeed)},n=function(b,c,d){a(d.currentImage).parent().is("a")&&a(d.currentImage).parent().css("display","block"),a('img[src="'+d.currentImage.attr("src")+'"]',b).not(".nivo-main-image,.nivo-control img").width(b.width()).css("visibility","hidden").show();for(var e=Math.round(b.width()/c.boxCols),f=Math.round(a('img[src="'+d.currentImage.attr("src")+'"]',b).not(".nivo-main-image,.nivo-control img").height()/c.boxRows),g=0;g<c.boxRows;g++)for(var i=0;i<c.boxCols;i++)i===c.boxCols-1?(b.append(a('<div class="nivo-box" name="'+i+'" rel="'+g+'"><img src="'+d.currentImage.attr("src")+'" style="position:absolute; width:'+b.width()+"px; height:auto; display:block; top:-"+f*g+"px; left:-"+e*i+'px;" /></div>').css({opacity:0,left:e*i+"px",top:f*g+"px",width:b.width()-e*i+"px"})),a('.nivo-box[name="'+i+'"]',b).height(a('.nivo-box[name="'+i+'"] img',b).height()+"px")):(b.append(a('<div class="nivo-box" name="'+i+'" rel="'+g+'"><img src="'+d.currentImage.attr("src")+'" style="position:absolute; width:'+b.width()+"px; height:auto; display:block; top:-"+f*g+"px; left:-"+e*i+'px;" /></div>').css({opacity:0,left:e*i+"px",top:f*g+"px",width:e+"px"})),a('.nivo-box[name="'+i+'"]',b).height(a('.nivo-box[name="'+i+'"] img',b).height()+"px"));h.stop().animate({height:a(d.currentImage).height()},c.animSpeed)},o=function(b,c,d,e){var f=b.data("nivo:vars");if(f&&f.currentSlide===f.totalSlides-1&&d.lastSlide.call(this),(!f||f.stop)&&!e)return!1;d.beforeChange.call(this),e?("prev"===e&&h.attr("src",f.currentImage.attr("src")),"next"===e&&h.attr("src",f.currentImage.attr("src"))):h.attr("src",f.currentImage.attr("src")),f.currentSlide++,f.currentSlide===f.totalSlides&&(f.currentSlide=0,d.slideshowEnd.call(this)),f.currentSlide<0&&(f.currentSlide=f.totalSlides-1),a(c[f.currentSlide]).is("img")?f.currentImage=a(c[f.currentSlide]):f.currentImage=a(c[f.currentSlide]).find("img:first"),d.controlNav&&(a("a",f.controlNavEl).removeClass("active"),a("a:eq("+f.currentSlide+")",f.controlNavEl).addClass("active")),i(d),a(".nivo-slice",b).remove(),a(".nivo-box",b).remove();var g=d.effect,j="";"random"===d.effect&&(j=new Array("sliceDownRight","sliceDownLeft","sliceUpRight","sliceUpLeft","sliceUpDown","sliceUpDownLeft","fold","fade","boxRandom","boxRain","boxRainReverse","boxRainGrow","boxRainGrowReverse"),g=j[Math.floor(Math.random()*(j.length+1))],void 0===g&&(g="fade")),d.effect.indexOf(",")!==-1&&(j=d.effect.split(","),g=j[Math.floor(Math.random()*j.length)],void 0===g&&(g="fade")),f.currentImage.attr("data-transition")&&(g=f.currentImage.attr("data-transition")),
f.running=!0;var k=0,l=0,o="",q="",r="",s="";if("sliceDown"===g||"sliceDownRight"===g||"sliceDownLeft"===g)m(b,d,f),k=0,l=0,o=a(".nivo-slice",b),"sliceDownLeft"===g&&(o=a(".nivo-slice",b)._reverse()),o.each(function(){var c=a(this);c.css({top:"0px"}),l===d.slices-1?setTimeout(function(){c.animate({opacity:"1.0"},d.animSpeed,"",function(){b.trigger("nivo:animFinished")})},100+k):setTimeout(function(){c.animate({opacity:"1.0"},d.animSpeed)},100+k),k+=50,l++});else if("sliceUp"===g||"sliceUpRight"===g||"sliceUpLeft"===g)m(b,d,f),k=0,l=0,o=a(".nivo-slice",b),"sliceUpLeft"===g&&(o=a(".nivo-slice",b)._reverse()),o.each(function(){var c=a(this);c.css({bottom:"0px"}),l===d.slices-1?setTimeout(function(){c.animate({opacity:"1.0"},d.animSpeed,"",function(){b.trigger("nivo:animFinished")})},100+k):setTimeout(function(){c.animate({opacity:"1.0"},d.animSpeed)},100+k),k+=50,l++});else if("sliceUpDown"===g||"sliceUpDownRight"===g||"sliceUpDownLeft"===g){m(b,d,f),k=0,l=0;var t=0;o=a(".nivo-slice",b),"sliceUpDownLeft"===g&&(o=a(".nivo-slice",b)._reverse()),o.each(function(){var c=a(this);0===l?(c.css("top","0px"),l++):(c.css("bottom","0px"),l=0),t===d.slices-1?setTimeout(function(){c.animate({opacity:"1.0"},d.animSpeed,"",function(){b.trigger("nivo:animFinished")})},100+k):setTimeout(function(){c.animate({opacity:"1.0"},d.animSpeed)},100+k),k+=50,t++})}else if("fold"===g)m(b,d,f),k=0,l=0,a(".nivo-slice",b).each(function(){var c=a(this),e=c.width();c.css({top:"0px",width:"0px"}),l===d.slices-1?setTimeout(function(){c.animate({width:e,opacity:"1.0"},d.animSpeed,"",function(){b.trigger("nivo:animFinished")})},100+k):setTimeout(function(){c.animate({width:e,opacity:"1.0"},d.animSpeed)},100+k),k+=50,l++});else if("fade"===g)m(b,d,f),q=a(".nivo-slice:first",b),q.css({width:b.width()+"px"}),q.animate({opacity:"1.0"},2*d.animSpeed,"",function(){b.trigger("nivo:animFinished")});else if("slideInRight"===g)m(b,d,f),q=a(".nivo-slice:first",b),q.css({width:"0px",opacity:"1"}),q.animate({width:b.width()+"px"},2*d.animSpeed,"",function(){b.trigger("nivo:animFinished")});else if("slideInLeft"===g)m(b,d,f),q=a(".nivo-slice:first",b),q.css({width:"0px",opacity:"1",left:"",right:"0px"}),q.animate({width:b.width()+"px"},2*d.animSpeed,"",function(){q.css({left:"0px",right:""}),b.trigger("nivo:animFinished")});else if("boxRandom"===g)n(b,d,f),r=d.boxCols*d.boxRows,l=0,k=0,s=p(a(".nivo-box",b)),s.each(function(){var c=a(this);l===r-1?setTimeout(function(){c.animate({opacity:"1"},d.animSpeed,"",function(){b.trigger("nivo:animFinished")})},100+k):setTimeout(function(){c.animate({opacity:"1"},d.animSpeed)},100+k),k+=20,l++});else if("boxRain"===g||"boxRainReverse"===g||"boxRainGrow"===g||"boxRainGrowReverse"===g){n(b,d,f),r=d.boxCols*d.boxRows,l=0,k=0;var u=0,v=0,w=[];w[u]=[],s=a(".nivo-box",b),"boxRainReverse"!==g&&"boxRainGrowReverse"!==g||(s=a(".nivo-box",b)._reverse()),s.each(function(){w[u][v]=a(this),v++,v===d.boxCols&&(u++,v=0,w[u]=[])});for(var x=0;x<2*d.boxCols;x++){for(var y=x,z=0;z<d.boxRows;z++)y>=0&&y<d.boxCols&&(!function(c,e,f,h,i){var j=a(w[c][e]),k=j.width(),l=j.height();"boxRainGrow"!==g&&"boxRainGrowReverse"!==g||j.width(0).height(0),h===i-1?setTimeout(function(){j.animate({opacity:"1",width:k,height:l},d.animSpeed/1.3,"",function(){b.trigger("nivo:animFinished")})},100+f):setTimeout(function(){j.animate({opacity:"1",width:k,height:l},d.animSpeed/1.3)},100+f)}(z,y,k,l,r),l++),y--;k+=100}}},p=function(a){for(var b,c,d=a.length;d;b=parseInt(Math.random()*d,10),c=a[--d],a[d]=a[b],a[b]=c);return a},q=function(a){this.console&&"undefined"!=typeof console.log&&console.log(a)};return this.stop=function(){a(b).data("nivo:vars").stop||(a(b).data("nivo:vars").stop=!0,q("Stop Slider"))},this.start=function(){a(b).data("nivo:vars").stop&&(a(b).data("nivo:vars").stop=!1,q("Start Slider"))},d.afterLoad.call(this),this};a.fn.nivoSlider=function(c){return this.each(function(d,e){var f=a(this);if(f.data("nivoslider"))return f.data("nivoslider");var g=new b(this,c);f.data("nivoslider",g)})},a.fn.nivoSlider.defaults={effect:"random",slices:15,boxCols:8,boxRows:4,animSpeed:500,pauseTime:3e3,startSlide:0,directionNav:!0,controlNav:!0,controlNavThumbs:!1,pauseOnHover:!0,manualAdvance:!1,prevText:"Prev",nextText:"Next",randomStart:!1,beforeChange:function(){},afterChange:function(){},slideshowEnd:function(){},lastSlide:function(){},afterLoad:function(){}},a.fn._reverse=[].reverse}(jQuery),function(a){a.fn.selectbox=function(){a(this).each(function(){function c(){var c=b.find("option"),d=c.filter(":selected"),e=c.filter(":first").text();d.length&&(e=d.text());var f="";for(i=0;i<c.length;i++){var g="",h=' class="disabled"';c.eq(i).is(":selected")&&(g=' class="selected sel"'),c.eq(i).is(":disabled")&&(g=h),f+="<li"+g+">"+c.eq(i).text()+"</li>"}var j=a('<span class="selectbox" style="display:inline-block;position:relative"><div class="select" style="float:left;position:relative;z-index:10000"><div class="text">'+e+'</div><b class="trigger"><i class="arrow"></i></b></div><div class="dropdown" style="position:absolute;z-index:9999;overflow:auto;overflow-x:hidden;list-style:none"><ul>'+f+"</ul></div></span>");b.before(j).css({position:"absolute",top:-9999});var k=j.find("div.select"),l=j.find("div.text"),m=j.find("div.dropdown"),n=m.find("li"),o=j.outerHeight();"auto"==m.css("left")&&m.css({left:0}),"auto"==m.css("top")&&m.css({top:o});var p=n.outerHeight(),q=m.css("top");m.hide(),k.click(function(){var b=j.offset().top,c=a(window).height()-o-(b-a(window).scrollTop());return c<0||c<6*p?(m.height("auto").css({top:"auto",bottom:q}),m.outerHeight()>b-a(window).scrollTop()-20&&m.height(Math.floor((b-a(window).scrollTop()-20)/p)*p)):c>6*p&&(m.height("auto").css({bottom:"auto",top:q}),m.outerHeight()>c-20&&m.height(Math.floor((c-20)/p)*p)),a("span.selectbox").css({zIndex:1}).removeClass("focused"),j.css({zIndex:2}),m.is(":hidden")?(a("div.dropdown:visible").hide(),m.show()):m.hide(),!1}),n.hover(function(){a(this).siblings().removeClass("selected")});var r=n.filter(".selected").text();n.filter(":not(.disabled)").click(function(){var d=a(this).text();r!=d&&(a(this).addClass("selected sel").siblings().removeClass("selected sel"),c.removeAttr("selected").eq(a(this).index()).attr("selected",!0),r=d,l.text(d),b.change()),m.hide()}),m.mouseout(function(){m.find("li.sel").addClass("selected")}),b.focus(function(){a("span.selectbox").removeClass("focused"),j.addClass("focused")}).keyup(function(){l.text(c.filter(":selected").text()),n.removeClass("selected sel").eq(c.filter(":selected").index()).addClass("selected sel")}),a(document).on("click",function(b){a(b.target).parents().hasClass("selectbox")||(m.hide().find("li.sel").addClass("selected"),j.removeClass("focused"))})}var b=a(this);b.prev("span.selectbox").length<1&&(c(),b.on("refresh",function(){b.prev().remove(),c()}))})}}(jQuery),!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):window.jQuery||window.Zepto)}(function(a){var b,c,d,e,f,g,h="Close",i="BeforeClose",j="AfterClose",k="BeforeAppend",l="MarkupParse",m="Open",n="Change",o="mfp",p="."+o,q="mfp-ready",r="mfp-removing",s="mfp-prevent-close",t=function(){},u=!!window.jQuery,v=a(window),w=function(a,c){b.ev.on(o+a+p,c)},x=function(b,c,d,e){var f=document.createElement("div");return f.className="mfp-"+b,d&&(f.innerHTML=d),e?c&&c.appendChild(f):(f=a(f),c&&f.appendTo(c)),f},y=function(c,d){b.ev.triggerHandler(o+c,d),b.st.callbacks&&(c=c.charAt(0).toLowerCase()+c.slice(1),b.st.callbacks[c]&&b.st.callbacks[c].apply(b,a.isArray(d)?d:[d]))},z=function(c){return c===g&&b.currTemplate.closeBtn||(b.currTemplate.closeBtn=a(b.st.closeMarkup.replace("%title%",b.st.tClose)),g=c),b.currTemplate.closeBtn},A=function(){a.magnificPopup.instance||(b=new t,b.init(),a.magnificPopup.instance=b)},B=function(){var a=document.createElement("p").style,b=["ms","O","Moz","Webkit"];if(void 0!==a.transition)return!0;for(;b.length;)if(b.pop()+"Transition"in a)return!0;return!1};t.prototype={constructor:t,init:function(){var c=navigator.appVersion;b.isIE7=-1!==c.indexOf("MSIE 7."),b.isIE8=-1!==c.indexOf("MSIE 8."),b.isLowIE=b.isIE7||b.isIE8,b.isAndroid=/android/gi.test(c),b.isIOS=/iphone|ipad|ipod/gi.test(c),b.supportsTransition=B(),b.probablyMobile=b.isAndroid||b.isIOS||/(Opera Mini)|Kindle|webOS|BlackBerry|(Opera Mobi)|(Windows Phone)|IEMobile/i.test(navigator.userAgent),d=a(document),b.popupsCache={}},open:function(c){var e;if(c.isObj===!1){b.items=c.items.toArray(),b.index=0;var g,h=c.items;for(e=0;e<h.length;e++)if(g=h[e],g.parsed&&(g=g.el[0]),g===c.el[0]){b.index=e;break}}else b.items=a.isArray(c.items)?c.items:[c.items],b.index=c.index||0;if(b.isOpen)return void b.updateItemHTML();b.types=[],f="",b.ev=c.mainEl&&c.mainEl.length?c.mainEl.eq(0):d,c.key?(b.popupsCache[c.key]||(b.popupsCache[c.key]={}),b.currTemplate=b.popupsCache[c.key]):b.currTemplate={},b.st=a.extend(!0,{},a.magnificPopup.defaults,c),b.fixedContentPos="auto"===b.st.fixedContentPos?!b.probablyMobile:b.st.fixedContentPos,b.st.modal&&(b.st.closeOnContentClick=!1,b.st.closeOnBgClick=!1,b.st.showCloseBtn=!1,b.st.enableEscapeKey=!1),b.bgOverlay||(b.bgOverlay=x("bg").on("click"+p,function(){b.close()}),b.wrap=x("wrap").attr("tabindex",-1).on("click"+p,function(a){b._checkIfClose(a.target)&&b.close()}),b.container=x("container",b.wrap)),b.contentContainer=x("content"),b.st.preloader&&(b.preloader=x("preloader",b.container,b.st.tLoading));var i=a.magnificPopup.modules;for(e=0;e<i.length;e++){var j=i[e];j=j.charAt(0).toUpperCase()+j.slice(1),b["init"+j].call(b)}y("BeforeOpen"),b.st.showCloseBtn&&(b.st.closeBtnInside?(w(l,function(a,b,c,d){c.close_replaceWith=z(d.type)}),f+=" mfp-close-btn-in"):b.wrap.append(z())),b.st.alignTop&&(f+=" mfp-align-top"),b.wrap.css(b.fixedContentPos?{overflow:b.st.overflowY,overflowX:"hidden",overflowY:b.st.overflowY}:{top:v.scrollTop(),position:"absolute"}),(b.st.fixedBgPos===!1||"auto"===b.st.fixedBgPos&&!b.fixedContentPos)&&b.bgOverlay.css({height:d.height(),position:"absolute"}),b.st.enableEscapeKey&&d.on("keyup"+p,function(a){27===a.keyCode&&b.close()}),v.on("resize"+p,function(){b.updateSize()}),b.st.closeOnContentClick||(f+=" mfp-auto-cursor"),f&&b.wrap.addClass(f);var k=b.wH=v.height(),n={};if(b.fixedContentPos&&b._hasScrollBar(k)){var o=b._getScrollbarSize();o&&(n.marginRight=o)}b.fixedContentPos&&(b.isIE7?a("body, html").css("overflow","hidden"):n.overflow="hidden");var r=b.st.mainClass;return b.isIE7&&(r+=" mfp-ie7"),r&&b._addClassToMFP(r),b.updateItemHTML(),y("BuildControls"),a("html").css(n),b.bgOverlay.add(b.wrap).prependTo(b.st.prependTo||a(document.body)),b._lastFocusedEl=document.activeElement,setTimeout(function(){b.content?(b._addClassToMFP(q),b._setFocus()):b.bgOverlay.addClass(q),d.on("focusin"+p,b._onFocusIn)},16),b.isOpen=!0,b.updateSize(k),y(m),c},close:function(){b.isOpen&&(y(i),b.isOpen=!1,b.st.removalDelay&&!b.isLowIE&&b.supportsTransition?(b._addClassToMFP(r),setTimeout(function(){b._close()},b.st.removalDelay)):b._close())},_close:function(){y(h);var c=r+" "+q+" ";if(b.bgOverlay.detach(),b.wrap.detach(),b.container.empty(),b.st.mainClass&&(c+=b.st.mainClass+" "),b._removeClassFromMFP(c),b.fixedContentPos){var e={marginRight:""};b.isIE7?a("body, html").css("overflow",""):e.overflow="",a("html").css(e)}d.off("keyup"+p+" focusin"+p),b.ev.off(p),b.wrap.attr("class","mfp-wrap").removeAttr("style"),b.bgOverlay.attr("class","mfp-bg"),b.container.attr("class","mfp-container"),!b.st.showCloseBtn||b.st.closeBtnInside&&b.currTemplate[b.currItem.type]!==!0||b.currTemplate.closeBtn&&b.currTemplate.closeBtn.detach(),b._lastFocusedEl&&a(b._lastFocusedEl).focus(),b.currItem=null,b.content=null,b.currTemplate=null,b.prevHeight=0,y(j)},updateSize:function(a){if(b.isIOS){var c=document.documentElement.clientWidth/window.innerWidth,d=window.innerHeight*c;b.wrap.css("height",d),b.wH=d}else b.wH=a||v.height();b.fixedContentPos||b.wrap.css("height",b.wH),y("Resize")},updateItemHTML:function(){var c=b.items[b.index];b.contentContainer.detach(),b.content&&b.content.detach(),c.parsed||(c=b.parseEl(b.index));var d=c.type;if(y("BeforeChange",[b.currItem?b.currItem.type:"",d]),b.currItem=c,!b.currTemplate[d]){var f=!!b.st[d]&&b.st[d].markup;y("FirstMarkupParse",f),b.currTemplate[d]=!f||a(f)}e&&e!==c.type&&b.container.removeClass("mfp-"+e+"-holder");var g=b["get"+d.charAt(0).toUpperCase()+d.slice(1)](c,b.currTemplate[d]);b.appendContent(g,d),c.preloaded=!0,y(n,c),e=c.type,b.container.prepend(b.contentContainer),y("AfterChange")},appendContent:function(a,c){b.content=a,a?b.st.showCloseBtn&&b.st.closeBtnInside&&b.currTemplate[c]===!0?b.content.find(".mfp-close").length||b.content.append(z()):b.content=a:b.content="",y(k),b.container.addClass("mfp-"+c+"-holder"),b.contentContainer.append(b.content)},parseEl:function(c){var d,e=b.items[c];if(e.tagName?e={el:a(e)}:(d=e.type,e={data:e,src:e.src}),e.el){for(var f=b.types,g=0;g<f.length;g++)if(e.el.hasClass("mfp-"+f[g])){d=f[g];break}e.src=e.el.attr("data-mfp-src"),e.src||(e.src=e.el.attr("href"))}return e.type=d||b.st.type||"inline",e.index=c,e.parsed=!0,b.items[c]=e,y("ElementParse",e),b.items[c]},addGroup:function(a,c){var d=function(d){d.mfpEl=this,b._openClick(d,a,c)};c||(c={});var e="click.magnificPopup";c.mainEl=a,c.items?(c.isObj=!0,a.off(e).on(e,d)):(c.isObj=!1,c.delegate?a.off(e).on(e,c.delegate,d):(c.items=a,a.off(e).on(e,d)))},_openClick:function(c,d,e){var f=void 0!==e.midClick?e.midClick:a.magnificPopup.defaults.midClick;if(f||2!==c.which&&!c.ctrlKey&&!c.metaKey){var g=void 0!==e.disableOn?e.disableOn:a.magnificPopup.defaults.disableOn;if(g)if(a.isFunction(g)){if(!g.call(b))return!0}else if(v.width()<g)return!0;c.type&&(c.preventDefault(),b.isOpen&&c.stopPropagation()),e.el=a(c.mfpEl),e.delegate&&(e.items=d.find(e.delegate)),b.open(e)}},updateStatus:function(a,d){if(b.preloader){c!==a&&b.container.removeClass("mfp-s-"+c),d||"loading"!==a||(d=b.st.tLoading);var e={status:a,text:d};y("UpdateStatus",e),a=e.status,d=e.text,b.preloader.html(d),b.preloader.find("a").on("click",function(a){a.stopImmediatePropagation()}),b.container.addClass("mfp-s-"+a),c=a}},_checkIfClose:function(c){if(!a(c).hasClass(s)){var d=b.st.closeOnContentClick,e=b.st.closeOnBgClick;if(d&&e)return!0;if(!b.content||a(c).hasClass("mfp-close")||b.preloader&&c===b.preloader[0])return!0;if(c===b.content[0]||a.contains(b.content[0],c)){if(d)return!0}else if(e&&a.contains(document,c))return!0;return!1}},_addClassToMFP:function(a){b.bgOverlay.addClass(a),b.wrap.addClass(a)},_removeClassFromMFP:function(a){this.bgOverlay.removeClass(a),b.wrap.removeClass(a)},_hasScrollBar:function(a){return(b.isIE7?d.height():document.body.scrollHeight)>(a||v.height())},_setFocus:function(){(b.st.focus?b.content.find(b.st.focus).eq(0):b.wrap).focus()},_onFocusIn:function(c){return c.target===b.wrap[0]||a.contains(b.wrap[0],c.target)?void 0:(b._setFocus(),!1)},_parseMarkup:function(b,c,d){var e;d.data&&(c=a.extend(d.data,c)),y(l,[b,c,d]),a.each(c,function(a,c){if(void 0===c||c===!1)return!0;if(e=a.split("_"),e.length>1){var d=b.find(p+"-"+e[0]);if(d.length>0){var f=e[1];"replaceWith"===f?d[0]!==c[0]&&d.replaceWith(c):"img"===f?d.is("img")?d.attr("src",c):d.replaceWith('<img src="'+c+'" class="'+d.attr("class")+'" />'):d.attr(e[1],c)}}else b.find(p+"-"+a).html(c)})},_getScrollbarSize:function(){if(void 0===b.scrollbarSize){var a=document.createElement("div");a.style.cssText="width: 99px; height: 99px; overflow: scroll; position: absolute; top: -9999px;",document.body.appendChild(a),b.scrollbarSize=a.offsetWidth-a.clientWidth,document.body.removeChild(a)}return b.scrollbarSize}},a.magnificPopup={instance:null,proto:t.prototype,modules:[],open:function(b,c){return A(),b=b?a.extend(!0,{},b):{},b.isObj=!0,b.index=c||0,this.instance.open(b)},close:function(){return a.magnificPopup.instance&&a.magnificPopup.instance.close()},registerModule:function(b,c){c.options&&(a.magnificPopup.defaults[b]=c.options),a.extend(this.proto,c.proto),this.modules.push(b)},defaults:{disableOn:0,key:null,midClick:!1,mainClass:"",preloader:!0,focus:"",closeOnContentClick:!1,closeOnBgClick:!0,closeBtnInside:!0,showCloseBtn:!0,enableEscapeKey:!0,modal:!1,alignTop:!1,removalDelay:0,prependTo:null,fixedContentPos:"auto",fixedBgPos:"auto",overflowY:"auto",closeMarkup:'<button title="%title%" type="button" class="mfp-close">&times;</button>',tClose:"Close (Esc)",tLoading:"Loading..."}},a.fn.magnificPopup=function(c){A();var d=a(this);if("string"==typeof c)if("open"===c){var e,f=u?d.data("magnificPopup"):d[0].magnificPopup,g=parseInt(arguments[1],10)||0;f.items?e=f.items[g]:(e=d,f.delegate&&(e=e.find(f.delegate)),e=e.eq(g)),b._openClick({mfpEl:e},d,f)}else b.isOpen&&b[c].apply(b,Array.prototype.slice.call(arguments,1));else c=a.extend(!0,{},c),u?d.data("magnificPopup",c):d[0].magnificPopup=c,b.addGroup(d,c);return d};var C,D,E,F="inline",G=function(){E&&(D.after(E.addClass(C)).detach(),E=null)};a.magnificPopup.registerModule(F,{options:{hiddenClass:"hide",markup:"",tNotFound:"Content not found"},proto:{initInline:function(){b.types.push(F),w(h+"."+F,function(){G()})},getInline:function(c,d){if(G(),c.src){var e=b.st.inline,f=a(c.src);if(f.length){var g=f[0].parentNode;g&&g.tagName&&(D||(C=e.hiddenClass,D=x(C),C="mfp-"+C),E=f.after(D).detach().removeClass(C)),b.updateStatus("ready")}else b.updateStatus("error",e.tNotFound),f=a("<div>");return c.inlineElement=f,f}return b.updateStatus("ready"),b._parseMarkup(d,{},c),d}}});var H,I="ajax",J=function(){H&&a(document.body).removeClass(H)},K=function(){J(),b.req&&b.req.abort()};a.magnificPopup.registerModule(I,{options:{settings:null,cursor:"mfp-ajax-cur",tError:'<a href="%url%">The content</a> could not be loaded.'},proto:{initAjax:function(){b.types.push(I),H=b.st.ajax.cursor,w(h+"."+I,K),w("BeforeChange."+I,K)},getAjax:function(c){H&&a(document.body).addClass(H),b.updateStatus("loading");var d=a.extend({url:c.src,success:function(d,e,f){var g={data:d,xhr:f};y("ParseAjax",g),b.appendContent(a(g.data),I),c.finished=!0,J(),b._setFocus(),setTimeout(function(){b.wrap.addClass(q)},16),b.updateStatus("ready"),y("AjaxContentAdded")},error:function(){J(),c.finished=c.loadError=!0,b.updateStatus("error",b.st.ajax.tError.replace("%url%",c.src))}},b.st.ajax.settings);return b.req=a.ajax(d),""}}});var L,M=function(c){if(c.data&&void 0!==c.data.title)return c.data.title;var d=b.st.image.titleSrc;if(d){if(a.isFunction(d))return d.call(b,c);if(c.el)return c.el.attr(d)||""}return""};a.magnificPopup.registerModule("image",{options:{markup:'<div class="mfp-figure"><div class="mfp-close"></div><figure><div class="mfp-img"></div><figcaption><div class="mfp-bottom-bar"><div class="mfp-title"></div><div class="mfp-counter"></div></div></figcaption></figure></div>',cursor:"mfp-zoom-out-cur",titleSrc:"title",verticalFit:!0,tError:'<a href="%url%">The image</a> could not be loaded.'},proto:{initImage:function(){var c=b.st.image,d=".image";b.types.push("image"),w(m+d,function(){"image"===b.currItem.type&&c.cursor&&a(document.body).addClass(c.cursor)}),w(h+d,function(){c.cursor&&a(document.body).removeClass(c.cursor),v.off("resize"+p)}),w("Resize"+d,b.resizeImage),b.isLowIE&&w("AfterChange",b.resizeImage)},resizeImage:function(){var a=b.currItem;if(a&&a.img&&b.st.image.verticalFit){var c=0;b.isLowIE&&(c=parseInt(a.img.css("padding-top"),10)+parseInt(a.img.css("padding-bottom"),10)),a.img.css("max-height",b.wH-c)}},_onImageHasSize:function(a){a.img&&(a.hasSize=!0,L&&clearInterval(L),a.isCheckingImgSize=!1,y("ImageHasSize",a),a.imgHidden&&(b.content&&b.content.removeClass("mfp-loading"),a.imgHidden=!1))},findImageSize:function(a){var c=0,d=a.img[0],e=function(f){L&&clearInterval(L),L=setInterval(function(){return d.naturalWidth>0?void b._onImageHasSize(a):(c>200&&clearInterval(L),c++,void(3===c?e(10):40===c?e(50):100===c&&e(500)))},f)};e(1)},getImage:function(c,d){var e=0,f=function(){c&&(c.img[0].complete?(c.img.off(".mfploader"),c===b.currItem&&(b._onImageHasSize(c),b.updateStatus("ready")),c.hasSize=!0,c.loaded=!0,y("ImageLoadComplete")):(e++,200>e?setTimeout(f,100):g()))},g=function(){c&&(c.img.off(".mfploader"),c===b.currItem&&(b._onImageHasSize(c),b.updateStatus("error",h.tError.replace("%url%",c.src))),c.hasSize=!0,c.loaded=!0,c.loadError=!0)},h=b.st.image,i=d.find(".mfp-img");if(i.length){var j=document.createElement("img");j.className="mfp-img",c.el&&c.el.find("img").length&&(j.alt=c.el.find("img").attr("alt")),c.img=a(j).on("load.mfploader",f).on("error.mfploader",g),j.src=c.src,i.is("img")&&(c.img=c.img.clone()),j=c.img[0],j.naturalWidth>0?c.hasSize=!0:j.width||(c.hasSize=!1)}return b._parseMarkup(d,{title:M(c),img_replaceWith:c.img},c),b.resizeImage(),c.hasSize?(L&&clearInterval(L),c.loadError?(d.addClass("mfp-loading"),b.updateStatus("error",h.tError.replace("%url%",c.src))):(d.removeClass("mfp-loading"),b.updateStatus("ready")),d):(b.updateStatus("loading"),c.loading=!0,c.hasSize||(c.imgHidden=!0,d.addClass("mfp-loading"),b.findImageSize(c)),d)}}});var N,O=function(){return void 0===N&&(N=void 0!==document.createElement("p").style.MozTransform),N};a.magnificPopup.registerModule("zoom",{options:{enabled:!1,easing:"ease-in-out",duration:300,opener:function(a){return a.is("img")?a:a.find("img")}},proto:{initZoom:function(){var a,c=b.st.zoom,d=".zoom";if(c.enabled&&b.supportsTransition){var e,f,g=c.duration,j=function(a){var b=a.clone().removeAttr("style").removeAttr("class").addClass("mfp-animated-image"),d="all "+c.duration/1e3+"s "+c.easing,e={position:"fixed",zIndex:9999,left:0,top:0,"-webkit-backface-visibility":"hidden"},f="transition";return e["-webkit-"+f]=e["-moz-"+f]=e["-o-"+f]=e[f]=d,b.css(e),b},k=function(){b.content.css("visibility","visible")};w("BuildControls"+d,function(){if(b._allowZoom()){if(clearTimeout(e),b.content.css("visibility","hidden"),a=b._getItemToZoom(),!a)return void k();f=j(a),f.css(b._getOffset()),b.wrap.append(f),e=setTimeout(function(){f.css(b._getOffset(!0)),e=setTimeout(function(){k(),setTimeout(function(){f.remove(),a=f=null,y("ZoomAnimationEnded")},16)},g)},16)}}),w(i+d,function(){if(b._allowZoom()){if(clearTimeout(e),b.st.removalDelay=g,!a){if(a=b._getItemToZoom(),!a)return;f=j(a)}f.css(b._getOffset(!0)),b.wrap.append(f),b.content.css("visibility","hidden"),setTimeout(function(){f.css(b._getOffset())},16)}}),w(h+d,function(){b._allowZoom()&&(k(),f&&f.remove(),a=null)})}},_allowZoom:function(){return"image"===b.currItem.type},_getItemToZoom:function(){return!!b.currItem.hasSize&&b.currItem.img},_getOffset:function(c){var d;d=c?b.currItem.img:b.st.zoom.opener(b.currItem.el||b.currItem);var e=d.offset(),f=parseInt(d.css("padding-top"),10),g=parseInt(d.css("padding-bottom"),10);e.top-=a(window).scrollTop()-f;var h={width:d.width(),height:(u?d.innerHeight():d[0].offsetHeight)-g-f};return O()?h["-moz-transform"]=h.transform="translate("+e.left+"px,"+e.top+"px)":(h.left=e.left,h.top=e.top),h}}});var P="iframe",Q="//about:blank",R=function(a){if(b.currTemplate[P]){var c=b.currTemplate[P].find("iframe");c.length&&(a||(c[0].src=Q),b.isIE8&&c.css("display",a?"block":"none"))}};a.magnificPopup.registerModule(P,{options:{markup:'<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" src="//about:blank" frameborder="0" allowfullscreen></iframe></div>',srcAction:"iframe_src",patterns:{youtube:{index:"youtube.com",id:"v=",src:"//www.youtube.com/embed/%id%?autoplay=1"},vimeo:{index:"vimeo.com/",id:"/",src:"//player.vimeo.com/video/%id%?autoplay=1"},gmaps:{index:"//maps.google.",src:"%id%&output=embed"}}},proto:{initIframe:function(){b.types.push(P),w("BeforeChange",function(a,b,c){b!==c&&(b===P?R():c===P&&R(!0))}),w(h+"."+P,function(){R()})},getIframe:function(c,d){var e=c.src,f=b.st.iframe;a.each(f.patterns,function(){return e.indexOf(this.index)>-1?(this.id&&(e="string"==typeof this.id?e.substr(e.lastIndexOf(this.id)+this.id.length,e.length):this.id.call(this,e)),e=this.src.replace("%id%",e),!1):void 0});var g={};return f.srcAction&&(g[f.srcAction]=e),b._parseMarkup(d,g,c),b.updateStatus("ready"),d}}});var S=function(a){var c=b.items.length;return a>c-1?a-c:0>a?c+a:a},T=function(a,b,c){return a.replace(/%curr%/gi,b+1).replace(/%total%/gi,c)};a.magnificPopup.registerModule("gallery",{options:{enabled:!1,arrowMarkup:'<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>',preload:[0,2],navigateByImgClick:!0,arrows:!0,tPrev:"Previous",tNext:"Next",tCounter:"%curr% of %total%"},proto:{initGallery:function(){var c=b.st.gallery,e=".mfp-gallery",g=Boolean(a.fn.mfpFastClick);return b.direction=!0,!(!c||!c.enabled)&&(f+=" mfp-gallery",w(m+e,function(){c.navigateByImgClick&&b.wrap.on("click"+e,".mfp-img",function(){return b.items.length>1?(b.next(),!1):void 0}),d.on("keydown"+e,function(a){37===a.keyCode?b.prev():39===a.keyCode&&b.next()})}),w("UpdateStatus"+e,function(a,c){c.text&&(c.text=T(c.text,b.currItem.index,b.items.length))}),w(l+e,function(a,d,e,f){var g=b.items.length;e.counter=g>1?T(c.tCounter,f.index,g):""}),w("BuildControls"+e,function(){if(b.items.length>1&&c.arrows&&!b.arrowLeft){var d=c.arrowMarkup,e=b.arrowLeft=a(d.replace(/%title%/gi,c.tPrev).replace(/%dir%/gi,"left")).addClass(s),f=b.arrowRight=a(d.replace(/%title%/gi,c.tNext).replace(/%dir%/gi,"right")).addClass(s),h=g?"mfpFastClick":"click";e[h](function(){b.prev()}),f[h](function(){b.next()}),b.isIE7&&(x("b",e[0],!1,!0),x("a",e[0],!1,!0),x("b",f[0],!1,!0),x("a",f[0],!1,!0)),b.container.append(e.add(f))}}),w(n+e,function(){b._preloadTimeout&&clearTimeout(b._preloadTimeout),b._preloadTimeout=setTimeout(function(){b.preloadNearbyImages(),b._preloadTimeout=null},16)}),void w(h+e,function(){d.off(e),b.wrap.off("click"+e),b.arrowLeft&&g&&b.arrowLeft.add(b.arrowRight).destroyMfpFastClick(),b.arrowRight=b.arrowLeft=null}))},next:function(){b.direction=!0,b.index=S(b.index+1),b.updateItemHTML()},prev:function(){b.direction=!1,b.index=S(b.index-1),b.updateItemHTML()},goTo:function(a){b.direction=a>=b.index,b.index=a,b.updateItemHTML()},preloadNearbyImages:function(){var a,c=b.st.gallery.preload,d=Math.min(c[0],b.items.length),e=Math.min(c[1],b.items.length);for(a=1;a<=(b.direction?e:d);a++)b._preloadItem(b.index+a);for(a=1;a<=(b.direction?d:e);a++)b._preloadItem(b.index-a)},_preloadItem:function(c){if(c=S(c),!b.items[c].preloaded){var d=b.items[c];d.parsed||(d=b.parseEl(c)),y("LazyLoad",d),"image"===d.type&&(d.img=a('<img class="mfp-img" />').on("load.mfploader",function(){d.hasSize=!0}).on("error.mfploader",function(){d.hasSize=!0,d.loadError=!0,y("LazyLoadError",d)}).attr("src",d.src)),d.preloaded=!0}}}});var U="retina";a.magnificPopup.registerModule(U,{options:{replaceSrc:function(a){return a.src.replace(/\.\w+$/,function(a){return"@2x"+a})},ratio:1},proto:{initRetina:function(){if(window.devicePixelRatio>1){var a=b.st.retina,c=a.ratio;c=isNaN(c)?c():c,c>1&&(w("ImageHasSize."+U,function(a,b){b.img.css({"max-width":b.img[0].naturalWidth/c,width:"100%"})}),w("ElementParse."+U,function(b,d){d.src=a.replaceSrc(d,c)}))}}}}),function(){var b=1e3,c="ontouchstart"in window,d=function(){v.off("touchmove"+f+" touchend"+f)},e="mfpFastClick",f="."+e;a.fn.mfpFastClick=function(e){return a(this).each(function(){var g,h=a(this);if(c){var i,j,k,l,m,n;h.on("touchstart"+f,function(a){l=!1,n=1,m=a.originalEvent?a.originalEvent.touches[0]:a.touches[0],j=m.clientX,k=m.clientY,v.on("touchmove"+f,function(a){m=a.originalEvent?a.originalEvent.touches:a.touches,n=m.length,m=m[0],(Math.abs(m.clientX-j)>10||Math.abs(m.clientY-k)>10)&&(l=!0,d())}).on("touchend"+f,function(a){d(),l||n>1||(g=!0,a.preventDefault(),clearTimeout(i),i=setTimeout(function(){g=!1},b),e())})})}h.on("click"+f,function(){g||e()})})},a.fn.destroyMfpFastClick=function(){a(this).off("touchstart"+f+" click"+f),c&&v.off("touchmove"+f+" touchend"+f)}}(),A()}),function(a){"use strict";!function(a){a.fn.visible=function(b,c,d){var e=a(this).eq(0),f=e.get(0),g=a(window),h=g.scrollTop(),i=h+g.height(),j=g.scrollLeft(),k=j+g.width(),l=e.offset().top,m=l+e.height(),n=e.offset().left,o=n+e.width(),p=b===!0?m:l,q=b===!0?l:m,r=b===!0?o:n,s=b===!0?n:o,t=c!==!0||f.offsetWidth*f.offsetHeight,d=d?d:"both";return"both"===d?!!t&&q<=i&&p>=h&&s<=k&&r>=j:"vertical"===d?!!t&&q<=i&&p>=h:"horizontal"===d?!!t&&s<=k&&r>=j:void 0},a.fn.fireAnimations=function(b){function c(){a(window).width()>=960?a(".animate").each(function(b,c){var c=a(c),d=a(this).attr("data-anim-type"),e=a(this).attr("data-anim-delay");c.visible(!0)&&setTimeout(function(){c.addClass(d)},e)}):a(".animate").each(function(b,c){a(this).removeClass("animate")})}a(document).ready(function(){a("html").removeClass("no-js").addClass("js")}),a(window).scroll(function(){c(),a(window).scrollTop()+a(window).height()==a(document).height()&&c()})},a(".animate").fireAnimations()}(jQuery);var b="flash strobe shake bounce tada wave spin pullback wobble pulse pulsate heartbeat panic explode",c=new Array;c=b.split(" ");c.length;a(window).resize(function(){a(".animate").fireAnimations()})}(jQuery);

/********theme.js********/
"use strict";function enableSelectBoxes(){jQuery("div.selectBox").each(function(){jQuery(this).children("span.selected").html(jQuery(this).children("div.selectOptions").children("span.selectOption:first").html()),jQuery(this).attr("value",jQuery(this).children("div.selectOptions").children("span.selectOption:first").attr("value")),jQuery(this).children("span.selected, span.selectArrow").on("click",function(){"none"==jQuery(this).parent().children("div.selectOptions").css("display")?(jQuery(this).parent().children("div.selectOptions").css("display","block"),jQuery(this).parents(".selectBox").addClass("act")):(jQuery(this).parent().children("div.selectOptions").css("display","none"),jQuery(this).parents(".selectBox").removeClass("act"))}),jQuery(this).find("span.selectOption").on("click",function(){jQuery(this).parent().css("display","none"),jQuery(this).closest("div.selectBox").attr("value",jQuery(this).attr("value")),jQuery(this).parent().siblings("span.selected").html(jQuery(this).html()),jQuery(this).parents(".selectBox").removeClass("act")}),jQuery("div.selectOptions").mouseleave(function(){jQuery("div.selectOptions").css("display","none"),jQuery(".selectBox").removeClass("act")})})}function fw_block(){if(jQuery("div").hasClass("right-sidebar")||jQuery("div").hasClass("left-sidebar"));else{var a=jQuery(".fw_block"),b=a.parent().width(),c=a.parents(".wrapper").width(),d=c-b;a.css("margin-left","-"+d/2+"px").css("width",c+"px").children().css("padding-left",d/2+"px").css("padding-right",d/2+"px"),jQuery(".wall_wrap .fw_wrapinner").css("padding-left","0px").css("padding-right","0px")}}function fltr_tooltip(){jQuery(".filter_navigation .optionset li").each(function(){var a=jQuery(this).find("a").data("catname");if("all"==a)var b=jQuery("div.element").length;else var b=jQuery("div."+a).length;jQuery(this).find("a").attr("data-title",b)})}function megamenu(){}function jobsFilter(){function c(c,d,e){if(c.find("li").each(function(){var a=$(this);"select"==a.attr("class")&&e.push(a.attr(d))}),a.find(".li_item").removeClass("job_show"),$(".jobs_view_all").css("display","none"),b.type.length)for(var f=0;f<=b.type.length;f++)if(b.profile.length)for(var g=0;g<=b.profile.length;g++)a.find(".li_item").each(function(){var a=$(this);a.attr("data-type")==b.type[f]&&a.attr("data-function")==b.profile[g]&&a.addClass("job_show")});else a.find(".li_item").each(function(){var a=$(this);a.attr("data-type")==b.type[f]&&a.addClass("job_show")});else if(b.profile.length)for(var h=0;h<=b.profile.length;h++)a.find(".li_item").each(function(){var a=$(this);a.attr("data-function")==b.profile[h]&&a.addClass("job_show")});else a.find(".li_item").addClass("job_show")}var a=$(".job_list_offers"),b={type:[],profile:[]};c($("#filter_job_type"),"data-type",b.type),c($("#filter_job_function"),"data-function",b.profile)}var fixed_menu=!0;jQuery(document).ready(function(a){var b=setTimeout(function(){jQuery("body").animate({opacity:"1"},500),clearTimeout(b)},500);if(jQuery(".fixed-menu").size()&&1==fixed_menu&&(jQuery(".fixed-menu").append(jQuery(".header_parent_wrap").html()),jQuery(window).scroll(function(){if(jQuery(".first-module").hasClass("module_slider"))var a=jQuery(window).height()-jQuery(".main_header").height();else if(jQuery(".main_header").hasClass("type2")||jQuery(".main_header").hasClass("type3"))var a=jQuery(".header_parent_wrap").offset().top+jQuery(".header_parent_wrap").height();else var a=jQuery(".header_parent_wrap").offset().top;jQuery(window).scrollTop()>a?jQuery(".fixed-menu").addClass("fixed_show"):jQuery(".fixed-menu").removeClass("fixed_show")})),jQuery("header").append('<a href="javascript:void(0)" class="menu_toggler"></a><div class="mobile_menu_wrapper"><ul class="mobile_menu container"/></div>'),jQuery(".mobile_menu").html(jQuery("header").find(".menu").html()),jQuery(".mobile_menu_wrapper").hide(),jQuery(".menu_toggler").on("click",function(){jQuery(".mobile_menu_wrapper").slideToggle(300),jQuery(this).toggleClass("close_toggler")}),jQuery(".mobile_menu a").each(function(){jQuery(this).addClass("mob_link")}),jQuery(".megamenu_wrap").size()>0&&jQuery(".megamenu_wrap a").each(function(){jQuery(this).removeClass("mob_link")}),jQuery(".mobile_menu li").find("a").on("click",function(){jQuery(this).parent().toggleClass("showsub")}),jQuery(".top_menu_toggler").on("click",function(){jQuery(this).toggleClass("close_toggler").parents(".header_parent_wrap").toggleClass("close_toggler_wrap")}),(jQuery(".language_select").size()>0||jQuery(".shop_ordering").size()>0)&&enableSelectBoxes(),jQuery(".top_search").size()>0){var c=a("#top_search"),d=c.find("input.ct-search-input"),e=a(".tagline_items"),f=a("html,body"),g=function(){return c.data("open",!0).addClass("ct-search-open"),e.hide(),d.focus(),!1},h=function(){c.data("open",!1).removeClass("ct-search-open"),e.css({display:"inline-block"})};d.on("click",function(a){a.stopPropagation(),c.data("open",!0)}),c.on("click",function(a){if(a.stopPropagation(),c.data("open")){if(""===d.val())return h(),!1}else g(),f.off("click").on("click",function(a){h()})})}if(jQuery(".nivoSlider").size()>0&&jQuery(".nivoSlider").each(function(){jQuery(this).nivoSlider({directionNav:!1,controlNav:!0,effect:"fade",pauseOnHover:!1,pauseTime:3500,slices:1})}),jQuery(".tweet_module").size()>0,jQuery(".shortcode_counter").size()>0&&(jQuery(window).width()>760?jQuery(".shortcode_counter").each(function(){if(jQuery(this).offset().top<jQuery(window).height()){if(!jQuery(this).hasClass("done")){var a=jQuery(this).find(".stat_count").attr("data-count");jQuery(this).find(".stat_temp").stop().animate({width:a},{duration:3e3,step:function(a){var b=Math.floor(a);jQuery(this).parents(".counter_wrapper").find(".stat_count").html(b)}}),jQuery(this).addClass("done"),jQuery(this).find(".stat_count")}}else jQuery(this).waypoint(function(){if(!jQuery(this).hasClass("done")){var a=jQuery(this).find(".stat_count").attr("data-count");jQuery(this).find(".stat_temp").stop().animate({width:a},{duration:3e3,step:function(a){var b=Math.floor(a);jQuery(this).parents(".counter_wrapper").find(".stat_count").html(b)}}),jQuery(this).addClass("done"),jQuery(this).find(".stat_count")}},{offset:"bottom-in-view"})}):jQuery(".shortcode_counter").each(function(){var a=jQuery(this).find(".stat_count").attr("data-count");jQuery(this).find(".stat_temp").animate({width:a},{duration:3e3,step:function(a){var b=Math.floor(a);jQuery(this).parents(".counter_wrapper").find(".stat_count").html(b)}}),jQuery(this).find(".stat_count")},{offset:"bottom-in-view"})),jQuery(".shortcode_skills").size()>0&&(jQuery(window).width()>760?jQuery(".skills_start").waypoint(function(){jQuery(".skill_div").each(function(){var a=jQuery(this).attr("data-percent");jQuery(this).stop().animate({width:a+"%"},1500)})},{offset:"bottom-in-view"}):jQuery(".skill_div").each(function(){var a=jQuery(this).attr("data-percent");jQuery(this).stop().animate({width:a+"%"},1e3)})),jQuery(".shortcode_diagram").size()>0&&(jQuery(".chart").each(function(){jQuery(this).css({"font-size":jQuery(this).parents(".diagram_list").attr("data-fontsize"),"line-height":jQuery(this).parents(".diagram_list").attr("data-size")}),jQuery(this).find("span").css("font-size",jQuery(this).parents(".diagram_list").attr("data-fontsize"))}),jQuery(window).width()>760?jQuery(".diagram_li").waypoint(function(){jQuery(".chart").each(function(){jQuery(this).easyPieChart({barColor:jQuery(this).parents("ul.diagram_list").attr("data-color"),trackColor:"transparent",scaleColor:!1,lineCap:"square",lineWidth:parseInt(jQuery(this).parents("ul.diagram_list").attr("data-width"),10),size:parseInt(jQuery(this).parents("ul.diagram_list").attr("data-size"),10),animate:1500})})},{offset:"bottom-in-view"}):jQuery(".chart").each(function(){jQuery(this).easyPieChart({barColor:jQuery(this).parents("ul.diagram_list").attr("data-color"),trackColor:"transparent",scaleColor:!1,lineCap:"square",lineWidth:parseInt(jQuery(this).parents("ul.diagram_list").attr("data-width"),10),size:parseInt(jQuery(this).parents("ul.diagram_list").attr("data-size"),10),animate:1500})})),(jQuery(".module_accordion").size()>0||jQuery(".module_toggle").size()>0)&&(jQuery(".shortcode_accordion_item_title").on("click",function(){jQuery(this).hasClass("state-active")||(jQuery(this).parents(".shortcode_accordion_shortcode").find(".shortcode_accordion_item_body").slideUp("fast"),jQuery(this).next().slideToggle("fast"),jQuery(this).parents(".shortcode_accordion_shortcode").find(".state-active").removeClass("state-active"),jQuery(this).addClass("state-active"))}),jQuery(".shortcode_toggles_item_title").on("click",function(){jQuery(this).next().slideToggle("fast"),jQuery(this).toggleClass("state-active")}),jQuery(".shortcode_accordion_item_title.expanded_yes, .shortcode_toggles_item_title.expanded_yes").each(function(a){jQuery(this).next().slideDown("fast"),jQuery(this).addClass("state-active")}),jQuery(".shortcode_accordion_item_title.expanded_yes, .shortcode_toggles_item_title.expanded_yes").each(function(a){jQuery(this).next().slideDown("fast"),jQuery(this).addClass("state-active")})),jQuery(".module_table_info").size()>0&&(jQuery(".table_info_details").on("click",function(){jQuery(this).parents("div.table_info_title").next().slideToggle("fast"),jQuery(this).parents("div.table_info_title").toggleClass("current-section")}),jQuery(".table_info_title.expanded_yes").each(function(a){jQuery(this).next().slideDown("fast"),jQuery(this).addClass("current-section")})),jQuery(".shortcode_messagebox").size()>0&&jQuery(".shortcode_messagebox").find(".box_close").on("click",function(){jQuery(this).parents(".module_messageboxes").fadeOut(400)}),jQuery(".shortcode_tabs").size()>0&&(jQuery(".shortcode_tabs").each(function(a){var b=1;jQuery(this).find(".shortcode_tab_item_title").each(function(a){jQuery(this).addClass("it"+b),jQuery(this).attr("whatopen","body"+b),jQuery(this).addClass("head"+b),jQuery(this).parents(".shortcode_tabs").find(".all_heads_cont").append(this),b++});var b=1;jQuery(this).find(".shortcode_tab_item_body").each(function(a){jQuery(this).addClass("body"+b),jQuery(this).addClass("it"+b),jQuery(this).parents(".shortcode_tabs").find(".all_body_cont").append(this),b++}),jQuery(this).find(".expand_yes").addClass("active");var c=jQuery(this).find(".expand_yes").attr("whatopen");jQuery(this).find("."+c).fadeIn(),jQuery(this).find("."+c).addClass("active")}),jQuery(document).on("click",".shortcode_tab_item_title",function(){jQuery(this).parents(".shortcode_tabs").find(".shortcode_tab_item_body").removeClass("active"),jQuery(this).parents(".shortcode_tabs").find(".shortcode_tab_item_title").removeClass("active");var a=jQuery(this).attr("whatopen");jQuery(this).parents("div.shortcode_tabs").find(".shortcode_tab_item_body").hide(),jQuery(this).parents(".shortcode_tabs").find("."+a).fadeIn(),jQuery(this).parents(".shortcode_tabs").find("."+a).addClass("active"),jQuery(this).addClass("active")})),jQuery(".client-list").size()>0&&jQuery(".section-clients").each(function(){var b=a(this).find(".client-list"),c=a('<div class="quotes-wrapper"/>');c.insertBefore(b),c.append('<div class="quotes"/>'),b.children().each(function(){a(this).find(".quote").appendTo(c.find(".quotes"))}).on("mouseenter touchend",function(b){var d=b.type;if(!Modernizr.touch&&"mouseenter"==d||Modernizr.touch&&"touchend"==d){var e=a(this).index(),f=c.find(".quote").eq(e);0!=parseInt(f.css("top"))&&(f.animate({opacity:0,top:100},200).animate({opacity:1,top:0},250),f.siblings().animate({opacity:0,top:-70},200),a(this).addClass("hover").siblings().removeClass("hover"))}}),b.children().first().addClass("hover"),c.find(".quote").first().css({opacity:1,top:0})}),jQuery(".photozoom").size()>0&&jQuery(".photozoom").each(function(){jQuery(this).parents(".photo_gallery").hasClass("photo_gallery")?jQuery(".photo_gallery").each(function(){jQuery(this).magnificPopup({delegate:"a.photozoom",type:"image",gallery:{enabled:!0},iframe:{markup:'<div class="mfp-iframe-scaler"><div class="mfp-close"></div><iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe><div class="mfp-counter"></div></div>'}})}):jQuery(this).magnificPopup({type:"image"})}),jQuery(".block_plus").size()>0)if(jQuery(window).width()>740)var i=setTimeout(function(){jQuery(".block_plus").each(function(){for(var a=jQuery(this).find(".item"),b=0,c=0;c<a.length;++c)b<jQuery(a[c]).innerHeight()&&(b=jQuery(a[c]).innerHeight());for(var c=0;c<a.length;++c)jQuery(a[c]).css({height:b+"px"})}),clearTimeout(i)},100);else jQuery(".block_plus").each(function(){for(var b=a(this).find(".item"),c=0;c<b.length;++c)jQuery(b[c]).css({height:"auto"})});if(jQuery(".contact_form").size()>0&&jQuery("#ajax-contact-form").on("submit",function(){var b=a(this).serialize();return a.ajax({type:"POST",url:"contact_form/contact_process.php",data:b,success:function(a){if("OK"==a){var b='<div class="notification_ok">Your message has been sent. Thank you!</div>';jQuery("#fields").hide()}else var b=a;jQuery("#note").html(b)}}),!1}),jQuery(".fw_block").wrapInner('<div class="fw_wrapinner"></div>'),fw_block(),megamenu(),jQuery(".global_count_wrapper").size()>0&&jQuery(".global_count_wrapper").append('<div class="mouse_icon"></div>'),jQuery(".cart_wrap").size()>0&&(jQuery(".view_cart_btn").addClass("has_items"),jQuery(".remove_products").on("click",function(){jQuery(".view_cart_btn").removeClass("has_items"),jQuery(".cart_wrap").hide(),jQuery(".cart_submenu, .widget_cart").append('<p class="empty">No products in the cart.</p>')})),jQuery(".filter_navigation").size()>0&&fltr_tooltip(),jQuery(".first-module").hasClass("module_slider")&&jQuery(".first-module.module_slider").parents(".fw_block").addClass("mt_80 mb60"),jQuery(".login_popup").size()>0&&(jQuery(".login_popup").on("show.bs.modal",function(a){jQuery("html").addClass("no_scroll")}),jQuery(".login_popup").on("hide.bs.modal",function(a){jQuery("html").removeClass("no_scroll")})),jQuery(".jobs_filters").size()>0){var j={fakeselect:a(".fakeselect"),fakeoptions:a(".fakeoptions")};j.fakeselect.off("click"),j.fakeselect.on("click",function(){var b=a(this),c=a(".fakeoptions[data-select="+b.attr("data-select")+"]");return c.fadeToggle(200),j.fakeoptions.not(c).fadeOut(200),a(".job_list_offers").removeClass("opacity"),"jobs_filters_type"!=b.attr("data-select")&&"jobs_filters_function"!=b.attr("data-select")||(a(".jobs_filters > li > span").removeClass("active"),b.addClass("active"),(a("#filter_job_type").is(":visible")||a("#filter_job_function").is(":visible"))&&a(".job_list_offers").addClass("opacity")),!1}),a(document).on("click",function(){j.fakeoptions.fadeOut(200),a(".job_list_offers").removeClass("opacity"),a(".jobs_filters > li > span").removeClass("active")}),j.fakeoptions.find("li").on("click",function(){var b=a(this),c=b.parent().attr("data-select");if("jobs_filters_type"==c||"jobs_filters_function"==c){b.toggleClass("select"),jobsFilter();var d=setTimeout(function(){a(".jobs_filters > li > span").removeClass("active"),a(".job_list_offers").removeClass("opacity"),j.fakeoptions.fadeOut(200),clearTimeout(d)},100);return!1}if("archives"==page){b.toggleClass("select"),archivesFilter();var e=setTimeout(function(){j.fakeoptions.fadeOut(200),clearTimeout(e)},600);return!1}a(".fakeselect[data-select="+c+"]").html(b.html()).removeClass("init"),a("select[data-select="+c+"] option").attr("value",b.html()),j.fakeoptions.fadeOut(200)}),a(".jobs_nb_results .nb_results").html(a(".job_list_offers").find(".li_item").length);var k=a(".jobs_view_all"),l=a(".job_list_offers");k.on("click",function(){var b=a(this);b.hasClass("close")?(l.find(".li_item").slice(4,l.find(".li_item").length).removeClass("job_show"),b.removeClass("close")):(b.addClass("close"),l.find(".li_item").addClass("job_show"))})}}),jQuery(window).resize(function(){fw_block(),megamenu()}),jQuery(window).load(function(){if(jQuery(window).width()>1025&&jQuery(".paralax").size()>0){var a=jQuery(window);jQuery(".paralax").each(function(){var b=jQuery(this);jQuery(window).scroll(function(){var c=(b.offset().top-a.scrollTop())/2,d="50% "+c+"px";b.css({"background-position":d})})})}});

/********jquery.isotope.min.js********/
!
function(a, b, c) {
    "use strict";
    var l, d = a.document,
    e = a.Modernizr,
    f = function(a) {
        return a.charAt(0).toUpperCase() + a.slice(1)
    },
    g = "Moz Webkit O Ms".split(" "),
    h = function(a) {
        var c, b = d.documentElement.style;
        if ("string" == typeof b[a]) return a;
        a = f(a);
        for (var e = 0,
        h = g.length; e < h; e++) if (c = g[e] + a, "string" == typeof b[c]) return c
    },
    i = h("transform"),
    j = h("transitionProperty"),
    k = {
        csstransforms: function() {
            return !! i
        },
        csstransforms3d: function() {
            var a = !!h("perspective");
            if (a) {
                var c = " -o- -moz- -ms- -webkit- -khtml- ".split(" "),
                d = "@media (" + c.join("transform-3d),(") + "modernizr)",
                e = b("<style>" + d + "{#modernizr{height:3px}}</style>").appendTo("head"),
                f = b('<div id="modernizr" />').appendTo("html");
                a = 3 === f.height(),
                f.remove(),
                e.remove()
            }
            return a
        },
        csstransitions: function() {
            return !! j
        }
    };
    if (e) for (l in k) e.hasOwnProperty(l) || e.addTest(l, k[l]);
    else {
        e = a.Modernizr = {
            _version: "1.6ish: miniModernizr for Isotope"
        };
        var n, m = " ";
        for (l in k) n = k[l](),
        e[l] = n,
        m += " " + (n ? "": "no-") + l;
        b("html").addClass(m)
    }
    if (e.csstransforms) {
        var o = e.csstransforms3d ? {
            translate: function(a) {
                return "translate3d(" + a[0] + "px, " + a[1] + "px, 0) "
            },
            scale: function(a) {
                return "scale3d(" + a + ", " + a + ", 1) "
            }
        }: {
            translate: function(a) {
                return "translate(" + a[0] + "px, " + a[1] + "px) "
            },
            scale: function(a) {
                return "scale(" + a + ") "
            }
        },
        p = function(a, c, d) {
            var g, j, e = b.data(a, "isoTransform") || {},
            f = {},
            h = {};
            f[c] = d,
            b.extend(e, f);
            for (g in e) j = e[g],
            h[g] = o[g](j);
            var k = h.translate || "",
            l = h.scale || "",
            m = k + l;
            b.data(a, "isoTransform", e),
            a.style[i] = m
        };
        b.cssNumber.scale = !0,
        b.cssHooks.scale = {
            set: function(a, b) {
                p(a, "scale", b)
            },
            get: function(a, c) {
                var d = b.data(a, "isoTransform");
                return d && d.scale ? d.scale: 1
            }
        },
        b.fx.step.scale = function(a) {
            b.cssHooks.scale.set(a.elem, a.now + a.unit)
        },
        b.cssNumber.translate = !0,
        b.cssHooks.translate = {
            set: function(a, b) {
                p(a, "translate", b)
            },
            get: function(a, c) {
                var d = b.data(a, "isoTransform");
                return d && d.translate ? d.translate: [0, 0]
            }
        }
    }
    var q, r;
    e.csstransitions && (q = {
        WebkitTransitionProperty: "webkitTransitionEnd",
        MozTransitionProperty: "transitionend",
        OTransitionProperty: "oTransitionEnd otransitionend",
        transitionProperty: "transitionend"
    } [j], r = h("transitionDuration"));
    var u, s = b.event,
    t = b.event.handle ? "handle": "dispatch";
    s.special.smartresize = {
        setup: function() {
            b(this).bind("resize", s.special.smartresize.handler)
        },
        teardown: function() {
            b(this).unbind("resize", s.special.smartresize.handler)
        },
        handler: function(a, b) {
            var c = this,
            d = arguments;
            a.type = "smartresize",
            u && clearTimeout(u),
            u = setTimeout(function() {
                s[t].apply(c, d)
            },
            "execAsap" === b ? 0 : 100)
        }
    },
    b.fn.smartresize = function(a) {
        return a ? this.bind("smartresize", a) : this.trigger("smartresize", ["execAsap"])
    },
    b.Isotope = function(a, c, d) {
        this.element = b(c),
        this._create(a),
        this._init(d)
    };
    var v = ["width", "height"],
    w = b(a);
    b.Isotope.settings = {
        resizable: !0,
        layoutMode: "masonry",
        containerClass: "isotope",
        itemClass: "isotope-item",
        hiddenClass: "isotope-hidden",
        hiddenStyle: {
            opacity: 0,
            scale: .001
        },
        visibleStyle: {
            opacity: 1,
            scale: 1
        },
        containerStyle: {
            position: "relative",
            overflow: "hidden"
        },
        animationEngine: "best-available",
        animationOptions: {
            queue: !1,
            duration: 800
        },
        sortBy: "original-order",
        sortAscending: !0,
        resizesContainer: !0,
        transformsEnabled: !0,
        itemPositionDataEnabled: !1
    },
    b.Isotope.prototype = {
        _create: function(a) {
            this.options = b.extend({},
            b.Isotope.settings, a),
            this.styleQueue = [],
            this.elemCount = 0;
            var c = this.element[0].style;
            this.originalStyle = {};
            var d = v.slice(0);
            for (var e in this.options.containerStyle) d.push(e);
            for (var f = 0,
            g = d.length; f < g; f++) e = d[f],
            this.originalStyle[e] = c[e] || "";
            this.element.css(this.options.containerStyle),
            this._updateAnimationEngine(),
            this._updateUsingTransforms();
            var h = {
                "original-order": function(a, b) {
                    return b.elemCount++,
                    b.elemCount
                },
                random: function() {
                    return Math.random()
                }
            };
            this.options.getSortData = b.extend(this.options.getSortData, h),
            this.reloadItems(),
            this.offset = {
                left: parseInt(this.element.css("padding-left") || 0, 10),
                top: parseInt(this.element.css("padding-top") || 0, 10)
            };
            var i = this;
            setTimeout(function() {
                i.element.addClass(i.options.containerClass)
            },
            0),
            this.options.resizable && w.bind("smartresize.isotope",
            function() {
                i.resize()
            }),
            this.element.delegate("." + this.options.hiddenClass, "click",
            function() {
                return ! 1
            })
        },
        _getAtoms: function(a) {
            var b = this.options.itemSelector,
            c = b ? a.filter(b).add(a.find(b)) : a,
            d = {
                position: "absolute"
            };
            return c = c.filter(function(a, b) {
                return 1 === b.nodeType
            }),
            this.usingTransforms && (d.left = 0, d.top = 0),
            c.css(d).addClass(this.options.itemClass),
            this.updateSortData(c, !0),
            c
        },
        _init: function(a) {
            this.$filteredAtoms = this._filter(this.$allAtoms),
            this._sort(),
            this.reLayout(a)
        },
        option: function(a) {
            if (b.isPlainObject(a)) {
                this.options = b.extend(!0, this.options, a);
                var c;
                for (var d in a) c = "_update" + f(d),
                this[c] && this[c]()
            }
        },
        _updateAnimationEngine: function() {
            var b, a = this.options.animationEngine.toLowerCase().replace(/[ _\-]/g, "");
            switch (a) {
            case "css":
            case "none":
                b = !1;
                break;
            case "jquery":
                b = !0;
                break;
            default:
                b = !e.csstransitions
            }
            this.isUsingJQueryAnimation = b,
            this._updateUsingTransforms()
        },
        _updateTransformsEnabled: function() {
            this._updateUsingTransforms()
        },
        _updateUsingTransforms: function() {
            var a = this.usingTransforms = this.options.transformsEnabled && e.csstransforms && e.csstransitions && !this.isUsingJQueryAnimation;
            a || (delete this.options.hiddenStyle.scale, delete this.options.visibleStyle.scale),
            this.getPositionStyles = a ? this._translate: this._positionAbs
        },
        _filter: function(a) {
            var b = "" === this.options.filter ? "*": this.options.filter;
            if (!b) return a;
            var c = this.options.hiddenClass,
            d = "." + c,
            e = a.filter(d),
            f = e;
            if ("*" !== b) {
                f = e.filter(b);
                var g = a.not(d).not(b).addClass(c);
                this.styleQueue.push({
                    $el: g,
                    style: this.options.hiddenStyle
                })
            }
            return this.styleQueue.push({
                $el: f,
                style: this.options.visibleStyle
            }),
            f.removeClass(c),
            a.filter(b)
        },
        updateSortData: function(a, c) {
            var f, g, d = this,
            e = this.options.getSortData;
            a.each(function() {
                f = b(this),
                g = {};
                for (var a in e) c || "original-order" !== a ? g[a] = e[a](f, d) : g[a] = b.data(this, "isotope-sort-data")[a];
                b.data(this, "isotope-sort-data", g)
            })
        },
        _sort: function() {
            var a = this.options.sortBy,
            b = this._getSorter,
            c = this.options.sortAscending ? 1 : -1,
            d = function(d, e) {
                var f = b(d, a),
                g = b(e, a);
                return f === g && "original-order" !== a && (f = b(d, "original-order"), g = b(e, "original-order")),
                (f > g ? 1 : f < g ? -1 : 0) * c
            };
            this.$filteredAtoms.sort(d)
        },
        _getSorter: function(a, c) {
            return b.data(a, "isotope-sort-data")[c]
        },
        _translate: function(a, b) {
            return {
                translate: [a, b]
            }
        },
        _positionAbs: function(a, b) {
            return {
                left: a,
                top: b
            }
        },
        _pushPosition: function(a, b, c) {
            b = Math.round(b + this.offset.left),
            c = Math.round(c + this.offset.top);
            var d = this.getPositionStyles(b, c);
            this.styleQueue.push({
                $el: a,
                style: d
            }),
            this.options.itemPositionDataEnabled && a.data("isotope-item-position", {
                x: b,
                y: c
            })
        },
        layout: function(a, b) {
            var c = this.options.layoutMode;
            if (this["_" + c + "Layout"](a), this.options.resizesContainer) {
                var d = this["_" + c + "GetContainerSize"]();
                this.styleQueue.push({
                    $el: this.element,
                    style: d
                })
            }
            this._processStyleQueue(a, b),
            this.isLaidOut = !0
        },
        _processStyleQueue: function(a, c) {
            var h, i, j, k, d = this.isLaidOut && this.isUsingJQueryAnimation ? "animate": "css",
            f = this.options.animationOptions,
            g = this.options.onLayout;
            if (i = function(a, b) {
                b.$el[d](b.style, f)
            },
            this._isInserting && this.isUsingJQueryAnimation) i = function(a, b) {
                h = b.$el.hasClass("no-transition") ? "css": d,
                b.$el[h](b.style, f)
            };
            else if (c || g || f.complete) {
                var l = !1,
                m = [c, g, f.complete],
                n = this;
                if (j = !0, k = function() {
                    if (!l) {
                        for (var b, c = 0,
                        d = m.length; c < d; c++) b = m[c],
                        "function" == typeof b && b.call(n.element, a, n);
                        l = !0
                    }
                },
                this.isUsingJQueryAnimation && "animate" === d) f.complete = k,
                j = !1;
                else if (e.csstransitions) {
                    for (var t, o = 0,
                    p = this.styleQueue[0], s = p && p.$el; ! s || !s.length;) {
                        if (t = this.styleQueue[o++], !t) return;
                        s = t.$el
                    }
                    var u = parseFloat(getComputedStyle(s[0])[r]);
                    u > 0 && (i = function(a, b) {
                        b.$el[d](b.style, f).one(q, k)
                    },
                    j = !1)
                }
            }
            b.each(this.styleQueue, i),
            j && k(),
            this.styleQueue = []
        },
        resize: function() {
            this["_" + this.options.layoutMode + "ResizeChanged"]() && this.reLayout()
        },
        reLayout: function(a) {
            this["_" + this.options.layoutMode + "Reset"](),
            this.layout(this.$filteredAtoms, a)
        },
        addItems: function(a, b) {
            var c = this._getAtoms(a);
            this.$allAtoms = this.$allAtoms.add(c),
            b && b(c)
        },
        insert: function(a, b) {
            this.element.append(a);
            var c = this;
            this.addItems(a,
            function(a) {
                var d = c._filter(a);
                c._addHideAppended(d),
                c._sort(),
                c.reLayout(),
                c._revealAppended(d, b)
            })
        },
        appended: function(a, b) {
            var c = this;
            this.addItems(a,
            function(a) {
                c._addHideAppended(a),
                c.layout(a),
                c._revealAppended(a, b)
            })
        },
        _addHideAppended: function(a) {
            this.$filteredAtoms = this.$filteredAtoms.add(a),
            a.addClass("no-transition"),
            this._isInserting = !0,
            this.styleQueue.push({
                $el: a,
                style: this.options.hiddenStyle
            })
        },
        _revealAppended: function(a, b) {
            var c = this;
            setTimeout(function() {
                a.removeClass("no-transition"),
                c.styleQueue.push({
                    $el: a,
                    style: c.options.visibleStyle
                }),
                c._isInserting = !1,
                c._processStyleQueue(a, b)
            },
            10)
        },
        reloadItems: function() {
            this.$allAtoms = this._getAtoms(this.element.children())
        },
        remove: function(a, b) {
            this.$allAtoms = this.$allAtoms.not(a),
            this.$filteredAtoms = this.$filteredAtoms.not(a);
            var c = this,
            d = function() {
                a.remove(),
                b && b.call(c.element)
            };
            a.filter(":not(." + this.options.hiddenClass + ")").length ? (this.styleQueue.push({
                $el: a,
                style: this.options.hiddenStyle
            }), this._sort(), this.reLayout(d)) : d()
        },
        shuffle: function(a) {
            this.updateSortData(this.$allAtoms),
            this.options.sortBy = "random",
            this._sort(),
            this.reLayout(a)
        },
        destroy: function() {
            var a = this.usingTransforms,
            b = this.options;
            this.$allAtoms.removeClass(b.hiddenClass + " " + b.itemClass).each(function() {
                var b = this.style;
                b.position = "",
                b.top = "",
                b.left = "",
                b.opacity = "",
                a && (b[i] = "")
            });
            var c = this.element[0].style;
            for (var d in this.originalStyle) c[d] = this.originalStyle[d];
            this.element.unbind(".isotope").undelegate("." + b.hiddenClass, "click").removeClass(b.containerClass).removeData("isotope"),
            w.unbind(".isotope")
        },
        _getSegments: function(a) {
            var h, b = this.options.layoutMode,
            c = a ? "rowHeight": "columnWidth",
            d = a ? "height": "width",
            e = a ? "rows": "cols",
            g = this.element[d](),
            i = this.options[b] && this.options[b][c] || this.$filteredAtoms["outer" + f(d)](!0) || g;
            h = Math.floor(g / i),
            h = Math.max(h, 1),
            this[b][e] = h,
            this[b][c] = i
        },
        _checkIfSegmentsChanged: function(a) {
            var b = this.options.layoutMode,
            c = a ? "rows": "cols",
            d = this[b][c];
            return this._getSegments(a),
            this[b][c] !== d
        },
        _masonryReset: function() {
            this.masonry = {},
            this._getSegments();
            var a = this.masonry.cols;
            for (this.masonry.colYs = []; a--;) this.masonry.colYs.push(0)
        },
        _masonryLayout: function(a) {
            var c = this,
            d = c.masonry;
            a.each(function() {
                var a = b(this),
                e = Math.ceil(a.outerWidth(!0) / d.columnWidth);
                if (e = Math.min(e, d.cols), 1 === e) c._masonryPlaceBrick(a, d.colYs);
                else {
                    var h, i, f = d.cols + 1 - e,
                    g = [];
                    for (i = 0; i < f; i++) h = d.colYs.slice(i, i + e),
                    g[i] = Math.max.apply(Math, h);
                    c._masonryPlaceBrick(a, g)
                }
            })
        },
        _masonryPlaceBrick: function(a, b) {
            for (var c = Math.min.apply(Math, b), d = 0, e = 0, f = b.length; e < f; e++) if (b[e] === c) {
                d = e;
                break
            }
            var g = this.masonry.columnWidth * d,
            h = c;
            this._pushPosition(a, g, h);
            var i = c + a.outerHeight(!0),
            j = this.masonry.cols + 1 - f;
            for (e = 0; e < j; e++) this.masonry.colYs[d + e] = i
        },
        _masonryGetContainerSize: function() {
            var a = Math.max.apply(Math, this.masonry.colYs);
            return {
                height: a
            }
        },
        _masonryResizeChanged: function() {
            return this._checkIfSegmentsChanged()
        },
        _fitRowsReset: function() {
            this.fitRows = {
                x: 0,
                y: 0,
                height: 0
            }
        },
        _fitRowsLayout: function(a) {
            var c = this,
            d = this.element.width(),
            e = this.fitRows;
            a.each(function() {
                var a = b(this),
                f = a.outerWidth(!0),
                g = a.outerHeight(!0);
                0 !== e.x && f + e.x > d && (e.x = 0, e.y = e.height),
                c._pushPosition(a, e.x, e.y),
                e.height = Math.max(e.y + g, e.height),
                e.x += f
            })
        },
        _fitRowsGetContainerSize: function() {
            return {
                height: this.fitRows.height
            }
        },
        _fitRowsResizeChanged: function() {
            return ! 0
        },
        _cellsByRowReset: function() {
            this.cellsByRow = {
                index: 0
            },
            this._getSegments(),
            this._getSegments(!0)
        },
        _cellsByRowLayout: function(a) {
            var c = this,
            d = this.cellsByRow;
            a.each(function() {
                var a = b(this),
                e = d.index % d.cols,
                f = Math.floor(d.index / d.cols),
                g = (e + .5) * d.columnWidth - a.outerWidth(!0) / 2,
                h = (f + .5) * d.rowHeight - a.outerHeight(!0) / 2;
                c._pushPosition(a, g, h),
                d.index++
            })
        },
        _cellsByRowGetContainerSize: function() {
            return {
                height: Math.ceil(this.$filteredAtoms.length / this.cellsByRow.cols) * this.cellsByRow.rowHeight + this.offset.top
            }
        },
        _cellsByRowResizeChanged: function() {
            return this._checkIfSegmentsChanged()
        },
        _straightDownReset: function() {
            this.straightDown = {
                y: 0
            }
        },
        _straightDownLayout: function(a) {
            var c = this;
            a.each(function(a) {
                var d = b(this);
                c._pushPosition(d, 0, c.straightDown.y),
                c.straightDown.y += d.outerHeight(!0)
            })
        },
        _straightDownGetContainerSize: function() {
            return {
                height: this.straightDown.y
            }
        },
        _straightDownResizeChanged: function() {
            return ! 0
        },
        _masonryHorizontalReset: function() {
            this.masonryHorizontal = {},
            this._getSegments(!0);
            var a = this.masonryHorizontal.rows;
            for (this.masonryHorizontal.rowXs = []; a--;) this.masonryHorizontal.rowXs.push(0)
        },
        _masonryHorizontalLayout: function(a) {
            var c = this,
            d = c.masonryHorizontal;
            a.each(function() {
                var a = b(this),
                e = Math.ceil(a.outerHeight(!0) / d.rowHeight);
                if (e = Math.min(e, d.rows), 1 === e) c._masonryHorizontalPlaceBrick(a, d.rowXs);
                else {
                    var h, i, f = d.rows + 1 - e,
                    g = [];
                    for (i = 0; i < f; i++) h = d.rowXs.slice(i, i + e),
                    g[i] = Math.max.apply(Math, h);
                    c._masonryHorizontalPlaceBrick(a, g)
                }
            })
        },
        _masonryHorizontalPlaceBrick: function(a, b) {
            for (var c = Math.min.apply(Math, b), d = 0, e = 0, f = b.length; e < f; e++) if (b[e] === c) {
                d = e;
                break
            }
            var g = c,
            h = this.masonryHorizontal.rowHeight * d;
            this._pushPosition(a, g, h);
            var i = c + a.outerWidth(!0),
            j = this.masonryHorizontal.rows + 1 - f;
            for (e = 0; e < j; e++) this.masonryHorizontal.rowXs[d + e] = i
        },
        _masonryHorizontalGetContainerSize: function() {
            var a = Math.max.apply(Math, this.masonryHorizontal.rowXs);
            return {
                width: a
            }
        },
        _masonryHorizontalResizeChanged: function() {
            return this._checkIfSegmentsChanged(!0)
        },
        _fitColumnsReset: function() {
            this.fitColumns = {
                x: 0,
                y: 0,
                width: 0
            }
        },
        _fitColumnsLayout: function(a) {
            var c = this,
            d = this.element.height(),
            e = this.fitColumns;
            a.each(function() {
                var a = b(this),
                f = a.outerWidth(!0),
                g = a.outerHeight(!0);
                0 !== e.y && g + e.y > d && (e.x = e.width, e.y = 0),
                c._pushPosition(a, e.x, e.y),
                e.width = Math.max(e.x + f, e.width),
                e.y += g
            })
        },
        _fitColumnsGetContainerSize: function() {
            return {
                width: this.fitColumns.width
            }
        },
        _fitColumnsResizeChanged: function() {
            return ! 0
        },
        _cellsByColumnReset: function() {
            this.cellsByColumn = {
                index: 0
            },
            this._getSegments(),
            this._getSegments(!0)
        },
        _cellsByColumnLayout: function(a) {
            var c = this,
            d = this.cellsByColumn;
            a.each(function() {
                var a = b(this),
                e = Math.floor(d.index / d.rows),
                f = d.index % d.rows,
                g = (e + .5) * d.columnWidth - a.outerWidth(!0) / 2,
                h = (f + .5) * d.rowHeight - a.outerHeight(!0) / 2;
                c._pushPosition(a, g, h),
                d.index++
            })
        },
        _cellsByColumnGetContainerSize: function() {
            return {
                width: Math.ceil(this.$filteredAtoms.length / this.cellsByColumn.rows) * this.cellsByColumn.columnWidth
            }
        },
        _cellsByColumnResizeChanged: function() {
            return this._checkIfSegmentsChanged(!0)
        },
        _straightAcrossReset: function() {
            this.straightAcross = {
                x: 0
            }
        },
        _straightAcrossLayout: function(a) {
            var c = this;
            a.each(function(a) {
                var d = b(this);
                c._pushPosition(d, c.straightAcross.x, 0),
                c.straightAcross.x += d.outerWidth(!0)
            })
        },
        _straightAcrossGetContainerSize: function() {
            return {
                width: this.straightAcross.x
            }
        },
        _straightAcrossResizeChanged: function() {
            return ! 0
        }
    },
    b.fn.imagesLoaded = function(a) {
        function c() {
            a.call(e, f)
        }
        function d(a) {
            var e = a.target;
            e.src !== h && b.inArray(e, i) === -1 && (i.push(e), --g <= 0 && (setTimeout(c), f.unbind(".imagesLoaded", d)))
        }
        var e = this,
        f = e.find("img").add(e.filter("img")),
        g = f.length,
        h = "data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///ywAAAAAAQABAAACAUwAOw==",
        i = [];
        return g || c(),
        f.bind("load.imagesLoaded error.imagesLoaded", d).each(function() {
            var a = this.src;
            this.src = h,
            this.src = a
        }),
        e
    };
    var x = function(b) {
        a.console && a.console.error(b)
    };
    b.fn.isotope = function(a, c) {
        if ("string" == typeof a) {
            var d = Array.prototype.slice.call(arguments, 1);
            this.each(function() {
                var c = b.data(this, "isotope");
                return c ? b.isFunction(c[a]) && "_" !== a.charAt(0) ? void c[a].apply(c, d) : void x("no such method '" + a + "' for isotope instance") : void x("cannot call methods on isotope prior to initialization; attempted to call method '" + a + "'")
            })
        } else this.each(function() {
            var d = b.data(this, "isotope");
            d ? (d.option(a), d._init(c)) : b.data(this, "isotope", new b.Isotope(a, this, c))
        });
        return this
    }
} (window, jQuery);
/********sorting.js********/
jQuery(function(){"use strict";var a=jQuery(".sorting_block");a.isotope({itemSelector:".element"});var b=jQuery(".optionset"),c=b.find("a");c.on("click",function(){var b=jQuery(this);if(b.parent("li").hasClass("selected"))return!1;var c=b.parents(".optionset");c.find(".selected").removeClass("selected"),c.find(".fltr_before").removeClass("fltr_before"),c.find(".fltr_after").removeClass("fltr_after"),b.parent("li").addClass("selected"),b.parent("li").next("li").addClass("fltr_after"),b.parent("li").prev("li").addClass("fltr_before");var d={},e=c.attr("data-option-key"),f=b.attr("data-option-value");if(f="false"!==f&&f,d[e]=f,"layoutMode"===e&&"function"==typeof changeLayoutMode)changeLayoutMode(b,d);else{a.isotope(d);var g=setTimeout(function(){jQuery(".sorting_block").isotope("reLayout"),clearTimeout(g)},500)}return!1}),jQuery(".sorting_block").find("img").load(function(){a.isotope("reLayout")})}),jQuery(window).load(function(){"use strict";jQuery(".sorting_block").isotope("reLayout");var a=setTimeout(function(){jQuery(".sorting_block").isotope("reLayout"),clearTimeout(a)},500)}),jQuery(window).resize(function(){"use strict";jQuery(".sorting_block").isotope("reLayout")}),jQuery.fn.portfolio_addon=function(a){"use strict";var d=(jQuery(this),a.items.length),e=a.load_count,f="",g="",h=jQuery(".image-grid");jQuery(".load_more_works").on("click",function(){f="",g="";var b=h.find(".added").size();if(d-b>e)var c=e;else var c=d-b;if(b+c==d&&jQuery(this).fadeOut(),b<1)var i=1;else var i=b+1;if(c>0){if(0==a.type)for(var j=i-1;j<i+c-1;j++)g=g+'<div class="'+a.items[j].sortcategory+' element added"><div class="item"><div class="item_wrapper"><div class="img_block wrapped_img"><img src="'+a.items[j].src+'" alt=""><span class="block_fade"></span><div class="post_hover_info"><div class="featured_items_title"><h5>'+a.items[j].title+'</h5></div><div class="featured_meta">'+a.items[j].itemcategory+'</div><a href="'+a.items[j].zoom+'" class="photozoom featured_ico_link view_link"><i class="icon-expand"></i></a><a href="'+a.items[j].url+'" class="featured_ico_link view_link"><i class="icon-link"></i></a></div></div></div></div></div>';else if(1==a.type)for(var j=i-1;j<i+c-1;j++)g=g+'<div class="col-sm-12 '+a.items[j].sortcategory+' element added"><div class="portfolio_item item"><div class="row"><div class="col-sm-6 pb7"><div class="img_block wrapped_img"><img alt="" src="'+a.items[j].src+'" /><span class="block_fade"></span><div class="post_hover_info"><a href="'+a.items[j].zoom+'" class="photozoom featured_ico_link view_link"><i class="icon-expand"></i></a><a href="'+a.items[j].url+'" class="featured_ico_link view_link"><i class="icon-link"></i></a></div> </div></div><div class="col-sm-6"><h2 class="portf_title"><a href="'+a.items[j].url+'">'+a.items[j].title+'</a></h2><div class="listing_meta"><span>'+a.items[j].itemdate+"</span><span>"+a.items[j].itemcategory+"</span><span>"+a.items[j].itemauthor+"</span><span>"+a.items[j].itemtime+"</span></div><p>"+a.items[j].itemdescr+' <a class="read_more" href="'+a.items[j].url+'">Details</a></p></div></div></div></div>';else for(var j=i-1;j<i+c-1;j++)g=g+'<div class="'+a.items[j].columnclass+" "+a.items[j].sortcategory+' element added"><div class="item"><div class="item_wrapper"><div class="img_block wrapped_img"><img src="'+a.items[j].src+'" alt=""><span class="block_fade"></span><div class="post_hover_info"><div class="featured_items_title"><h5><a href="'+a.items[j].url+'">'+a.items[j].title+'</a></h5></div><div class="featured_meta">'+a.items[j].itemcategory+'</div><a href="'+a.items[j].zoom+'" class="photozoom featured_ico_link view_link"><i class="icon-expand"></i></a><a href="'+a.items[j].url+'" class="featured_ico_link view_link"><i class="icon-link"></i></a></div></div></div></div></div>';f=jQuery(g),h.isotope("insert",f,function(){h.isotope("reLayout")})}jQuery(".filter_navigation").size()>0&&fltr_tooltip(),jQuery(".sorting_block").hasClass("column1")&&(jQuery(".load_more_works").parent().hide(),jQuery(".sorting_block").addClass("after_line"))})};
(function($) {
//    $('#portfolio').isotope({
//   // options
//   itemSelector: '.grid-item',
//   layoutMode: 'fitRows'
// });
})(jQuery);
//Animations v1.0, Copyright 2014, Joe Mottershaw, https://github.com/joemottershaw/
//==================================================================================
//Visible, Sam Sehnert, samatdf, TeamDF, https://github.com/teamdf/jquery-visible/
//================================================================================
(function($) {
 "use strict";
 
	(function($){
		$.fn.visible = function(partial,hidden,direction) {
			var $t				= $(this).eq(0),
				t				= $t.get(0),
				$w				= $(window),
				viewTop			= $w.scrollTop(),
				viewBottom		= viewTop + $w.height(),
				viewLeft		= $w.scrollLeft(),
				viewRight		= viewLeft + $w.width(),
				_top			= $t.offset().top,
				_bottom			= _top + $t.height(),
				_left			= $t.offset().left,
				_right			= _left + $t.width(),
				compareTop		= partial === true ? _bottom : _top,
				compareBottom	= partial === true ? _top : _bottom,
				compareLeft		= partial === true ? _right : _left,
				compareRight	= partial === true ? _left : _right,
				clientSize		= hidden === true ? t.offsetWidth * t.offsetHeight : true,
				direction		= (direction) ? direction : 'both';

			if(direction === 'both')
				return !!clientSize && ((compareBottom <= viewBottom) && (compareTop >= viewTop)) && ((compareRight <= viewRight) && (compareLeft >= viewLeft));
			else if(direction === 'vertical')
				return !!clientSize && ((compareBottom <= viewBottom) && (compareTop >= viewTop));
			else if(direction === 'horizontal')
				return !!clientSize && ((compareRight <= viewRight) && (compareLeft >= viewLeft));
		};

		$.fn.fireAnimations = function(options) {
			function animate() {
				if ($(window).width() >= 960) {
					$('.animate').each(function(i, elem) {
						var	elem = $(elem),
							type = $(this).attr('data-anim-type'),
							delay = $(this).attr('data-anim-delay');

						if (elem.visible(true)) {
							setTimeout(function() {
								elem.addClass(type);
							}, delay);
						} 
					});
				} else {
					$('.animate').each(function(i, elem) {
						$(this).removeClass('animate');
					});
				}
			}

			$(document).ready(function() {
				$('html').removeClass('no-js').addClass('js');

				animate();
			});

			$(window).scroll(function() {
				animate();

				if ($(window).scrollTop() + $(window).height() == $(document).height()) {
					animate();
				}
			});
		};

		$('.animate').fireAnimations();

	})(jQuery);

    var triggerClasses = 'flash strobe shake bounce tada wave spin pullback wobble pulse pulsate heartbeat panic explode';

    var classesArray = new Array;
    classesArray = triggerClasses.split(' ');

    var classAmount = classesArray.length;



})(jQuery);