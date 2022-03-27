/*jQuery Knob*/
!function(a){"object"==typeof exports?module.exports=a(require("jquery")):"function"==typeof define&&define.amd?define(["jquery"],a):a(jQuery)}(function(d){var b={},c=Math.max,a=Math.min;b.c={},b.c.d=d(document),b.c.t=function(e){return e.originalEvent.touches.length-1},b.o=function(){var e=this;this.o=null,this.$=null,this.i=null,this.g=null,this.v=null,this.cv=null,this.x=0,this.y=0,this.w=0,this.h=0,this.$c=null,this.c=null,this.t=0,this.isInit=!1,this.fgColor=null,this.pColor=null,this.dH=null,this.cH=null,this.eH=null,this.rH=null,this.scale=1,this.relative=!1,this.relativeWidth=!1,this.relativeHeight=!1,this.$div=null,this.run=function(){var f=function(k,j){var g;for(g in j){e.o[g]=j[g]}e._carve().init(),e._configure()._draw()};if(!this.$.data("kontroled")){if(this.$.data("kontroled",!0),this.extend(),this.o=d.extend({min:void 0!==this.$.data("min")?this.$.data("min"):0,max:void 0!==this.$.data("max")?this.$.data("max"):100,stopper:!0,readOnly:this.$.data("readonly")||"readonly"===this.$.attr("readonly"),cursor:this.$.data("cursor")===!0&&30||this.$.data("cursor")||0,thickness:this.$.data("thickness")&&Math.max(Math.min(this.$.data("thickness"),1),0.01)||0.35,lineCap:this.$.data("linecap")||"butt",width:this.$.data("width")||200,height:this.$.data("height")||200,displayInput:null==this.$.data("displayinput")||this.$.data("displayinput"),displayPrevious:this.$.data("displayprevious"),fgColor:this.$.data("fgcolor")||"#87CEEB",inputColor:this.$.data("inputcolor"),font:this.$.data("font")||"Arial",fontWeight:this.$.data("font-weight")||"bold",inline:!1,step:this.$.data("step")||1,rotation:this.$.data("rotation"),draw:null,change:null,cancel:null,release:null,format:function(g){return g},parse:function(g){return parseFloat(g)}},this.o),this.o.flip="anticlockwise"===this.o.rotation||"acw"===this.o.rotation,this.o.inputColor||(this.o.inputColor=this.o.fgColor),this.$.is("fieldset")?(this.v={},this.i=this.$.find("input"),this.i.each(function(j){var g=d(this);e.i[j]=g,e.v[j]=e.o.parse(g.val()),g.bind("change blur",function(){var h={};h[j]=g.val(),e.val(e._validate(h))})}),this.$.find("legend").remove()):(this.i=this.$,this.v=this.o.parse(this.$.val()),""===this.v&&(this.v=this.o.min),this.$.bind("change blur",function(){e.val(e._validate(e.o.parse(e.$.val())))})),!this.o.displayInput&&this.$.hide(),this.$c=d(document.createElement("canvas")).attr({width:this.o.width,height:this.o.height}),this.$div=d('<div style="'+(this.o.inline?"display:inline;":"")+"width:"+this.o.width+"px;height:"+this.o.height+'px;"></div>'),this.$.wrap(this.$div).before(this.$c),this.$div=this.$.parent(),"undefined"!=typeof G_vmlCanvasManager&&G_vmlCanvasManager.initElement(this.$c[0]),this.c=this.$c[0].getContext?this.$c[0].getContext("2d"):null,!this.c){throw {name:"CanvasNotSupportedException",message:"Canvas not supported. Please use excanvas on IE8.0.",toString:function(){return this.name+": "+this.message}}}return this.scale=(window.devicePixelRatio||1)/(this.c.webkitBackingStorePixelRatio||this.c.mozBackingStorePixelRatio||this.c.msBackingStorePixelRatio||this.c.oBackingStorePixelRatio||this.c.backingStorePixelRatio||1),this.relativeWidth=this.o.width%1!==0&&this.o.width.indexOf("%"),this.relativeHeight=this.o.height%1!==0&&this.o.height.indexOf("%"),this.relative=this.relativeWidth||this.relativeHeight,this._carve(),this.v instanceof Object?(this.cv={},this.copy(this.v,this.cv)):this.cv=this.v,this.$.bind("configure",f).parent().bind("configure",f),this._listen()._configure()._xy().init(),this.isInit=!0,this.$.val(this.o.format(this.v)),this._draw(),this}},this._carve=function(){if(this.relative){var g=this.relativeWidth?this.$div.parent().width()*parseInt(this.o.width)/100:this.$div.parent().width(),f=this.relativeHeight?this.$div.parent().height()*parseInt(this.o.height)/100:this.$div.parent().height();this.w=this.h=Math.min(g,f)}else{this.w=this.o.width,this.h=this.o.height}return this.$div.css({width:this.w+"px",height:this.h+"px"}),this.$c.attr({width:this.w,height:this.h}),1!==this.scale&&(this.$c[0].width=this.$c[0].width*this.scale,this.$c[0].height=this.$c[0].height*this.scale,this.$c.width(this.w),this.$c.height(this.h)),this},this._draw=function(){var f=!0;e.g=e.c,e.clear(),e.dH&&(f=e.dH()),f!==!1&&e.draw()},this._touch=function(g){var f=function(j){var h=e.xy2val(j.originalEvent.touches[e.t].pageX,j.originalEvent.touches[e.t].pageY);h!=e.cv&&(e.cH&&e.cH(h)===!1||(e.change(e._validate(h)),e._draw()))};return this.t=b.c.t(g),f(g),b.c.d.bind("touchmove.k",f).bind("touchend.k",function(){b.c.d.unbind("touchmove.k touchend.k"),e.val(e.cv)}),this},this._mouse=function(g){var f=function(j){var h=e.xy2val(j.pageX,j.pageY);h!=e.cv&&(e.cH&&e.cH(h)===!1||(e.change(e._validate(h)),e._draw()))};return f(g),b.c.d.bind("mousemove.k",f).bind("keyup.k",function(h){if(27===h.keyCode){if(b.c.d.unbind("mouseup.k mousemove.k keyup.k"),e.eH&&e.eH()===!1){return}e.cancel()}}).bind("mouseup.k",function(h){b.c.d.unbind("mousemove.k mouseup.k keyup.k"),e.val(e.cv)}),this},this._xy=function(){var f=this.$c.offset();return this.x=f.left,this.y=f.top,this},this._listen=function(){return this.o.readOnly?this.$.attr("readonly","readonly"):(this.$c.bind("mousedown",function(f){f.preventDefault(),e._xy()._mouse(f)}).bind("touchstart",function(f){f.preventDefault(),e._xy()._touch(f)}),this.listen()),this.relative&&d(window).resize(function(){e._carve().init(),e._draw()}),this},this._configure=function(){return this.o.draw&&(this.dH=this.o.draw),this.o.change&&(this.cH=this.o.change),this.o.cancel&&(this.eH=this.o.cancel),this.o.release&&(this.rH=this.o.release),this.o.displayPrevious?(this.pColor=this.h2rgba(this.o.fgColor,"0.4"),this.fgColor=this.h2rgba(this.o.fgColor,"0.6")):this.fgColor=this.o.fgColor,this},this._clear=function(){this.$c[0].width=this.$c[0].width},this._validate=function(g){var f=~~((0>g?-0.5:0.5)+g/this.o.step)*this.o.step;return Math.round(100*f)/100},this.listen=function(){},this.extend=function(){},this.init=function(){},this.change=function(f){},this.val=function(f){},this.xy2val=function(g,f){},this.draw=function(){},this.clear=function(){this._clear()},this.h2rgba=function(h,f){var g;return h=h.substring(1,7),g=[parseInt(h.substring(0,2),16),parseInt(h.substring(2,4),16),parseInt(h.substring(4,6),16)],"rgba("+g[0]+","+g[1]+","+g[2]+","+f+")"},this.copy=function(h,f){for(var g in h){f[g]=h[g]}}},b.Dial=function(){b.o.call(this),this.startAngle=null,this.xy=null,this.radius=null,this.lineWidth=null,this.cursorExt=null,this.w2=null,this.PI2=2*Math.PI,this.extend=function(){this.o=d.extend({bgColor:this.$.data("bgcolor")||"#EEEEEE",angleOffset:this.$.data("angleoffset")||0,angleArc:this.$.data("anglearc")||360,inline:!0},this.o)},this.val=function(f,e){return null==f?this.v:(f=this.o.parse(f),void (e!==!1&&f!=this.v&&this.rH&&this.rH(f)===!1||(this.cv=this.o.stopper?c(a(f,this.o.max),this.o.min):f,this.v=this.cv,this.$.val(this.o.format(this.v)),this._draw())))},this.xy2val=function(j,g){var f,h;return f=Math.atan2(j-(this.x+this.w2),-(g-this.y-this.w2))-this.angleOffset,this.o.flip&&(f=this.angleArc-f-this.PI2),this.angleArc!=this.PI2&&0>f&&f>-0.5?f=0:0>f&&(f+=this.PI2),h=f*(this.o.max-this.o.min)/this.angleArc+this.o.min,this.o.stopper&&(h=c(a(h,this.o.max),this.o.min)),h},this.listen=function(){var j,h,m,f,p=this,q=function(u){u.preventDefault();var o=u.originalEvent,e=o.detail||o.wheelDeltaX,s=o.detail||o.wheelDeltaY,i=p._validate(p.o.parse(p.$.val()))+(e>0||s>0?p.o.step:0>e||0>s?-p.o.step:0);i=c(a(i,p.o.max),p.o.min),p.val(i,!1),p.rH&&(clearTimeout(j),j=setTimeout(function(){p.rH(i),j=null},100),h||(h=setTimeout(function(){j&&p.rH(i),h=null},200)))},k=1,g={37:-p.o.step,38:p.o.step,39:p.o.step,40:-p.o.step};this.$.bind("keydown",function(n){var l=n.keyCode;if(l>=96&&105>=l&&(l=n.keyCode=l-48),m=parseInt(String.fromCharCode(l)),isNaN(m)&&(13!==l&&8!==l&&9!==l&&189!==l&&(190!==l||p.$.val().match(/\./))&&n.preventDefault(),d.inArray(l,[37,38,39,40])>-1)){n.preventDefault();var o=p.o.parse(p.$.val())+g[l]*k;p.o.stopper&&(o=c(a(o,p.o.max),p.o.min)),p.change(p._validate(o)),p._draw(),f=window.setTimeout(function(){k*=2},30)}}).bind("keyup",function(e){isNaN(m)?f&&(window.clearTimeout(f),f=null,k=1,p.val(p.$.val())):p.$.val()>p.o.max&&p.$.val(p.o.max)||p.$.val()<p.o.min&&p.$.val(p.o.min)}),this.$c.bind("mousewheel DOMMouseScroll",q),this.$.bind("mousewheel DOMMouseScroll",q)},this.init=function(){(this.v<this.o.min||this.v>this.o.max)&&(this.v=this.o.min),this.$.val(this.v),this.w2=this.w/2,this.cursorExt=this.o.cursor/100,this.xy=this.w2*this.scale,this.lineWidth=this.xy*this.o.thickness,this.lineCap=this.o.lineCap,this.radius=this.xy-this.lineWidth/2,this.o.angleOffset&&(this.o.angleOffset=isNaN(this.o.angleOffset)?0:this.o.angleOffset),this.o.angleArc&&(this.o.angleArc=isNaN(this.o.angleArc)?this.PI2:this.o.angleArc),this.angleOffset=this.o.angleOffset*Math.PI/180,this.angleArc=this.o.angleArc*Math.PI/180,this.startAngle=1.5*Math.PI+this.angleOffset,this.endAngle=1.5*Math.PI+this.angleOffset+this.angleArc;var e=c(String(Math.abs(this.o.max)).length,String(Math.abs(this.o.min)).length,2)+2;this.o.displayInput&&this.i.css({width:(this.w/2+4>>0)+"px",height:(this.w/3>>0)+"px",position:"absolute","vertical-align":"middle","margin-top":(this.w/3>>0)+"px","margin-left":"-"+(3*this.w/4+2>>0)+"px",border:0,background:"none",font:this.o.fontWeight+" "+(this.w/e>>0)+"px "+this.o.font,"text-align":"center",color:this.o.inputColor||this.o.fgColor,padding:"0px","-webkit-appearance":"none"})||this.i.css({width:"0px",visibility:"hidden"})},this.change=function(e){this.cv=e,this.$.val(this.o.format(e))},this.angle=function(e){return(e-this.o.min)*this.angleArc/(this.o.max-this.o.min)},this.arc=function(g){var e,f;return g=this.angle(g),this.o.flip?(e=this.endAngle+1e-05,f=e-g-1e-05):(e=this.startAngle-1e-05,f=e+g+1e-05),this.o.cursor&&(e=f-this.cursorExt)&&(f+=this.cursorExt),{s:e,e:f,d:this.o.flip&&!this.o.cursor}},this.draw=function(){var j,f=this.g,g=this.arc(this.cv),e=1;f.lineWidth=this.lineWidth,f.lineCap=this.lineCap,"none"!==this.o.bgColor&&(f.beginPath(),f.strokeStyle=this.o.bgColor,f.arc(this.xy,this.xy,this.radius,this.endAngle-1e-05,this.startAngle+1e-05,!0),f.stroke()),this.o.displayPrevious&&(j=this.arc(this.v),f.beginPath(),f.strokeStyle=this.pColor,f.arc(this.xy,this.xy,this.radius,j.s,j.e,j.d),f.stroke(),e=this.cv==this.v),f.beginPath(),f.strokeStyle=e?this.o.fgColor:this.fgColor,f.arc(this.xy,this.xy,this.radius,g.s,g.e,g.d),f.stroke()},this.cancel=function(){this.val(this.v)}},d.fn.dial=d.fn.knob=function(e){return this.each(function(){var f=new b.Dial;f.o=e,f.$=d(this),f.run()}).parent()}});
/* Stellar.js v0.6.2 | Copyright 2014, Mark Dalgleish | http://markdalgleish.com/projects/stellar.js | http://markdalgleish.mit-license.org */
!function(p,q,r,s){function t(a,d){this.element=a,this.options=p.extend({},v,d),this._defaults=v,this._name=u,this.init()}var u="stellar",v={scrollProperty:"scroll",positionProperty:"position",horizontalScrolling:!0,verticalScrolling:!0,horizontalOffset:0,verticalOffset:0,responsive:!1,parallaxBackgrounds:!0,parallaxElements:!0,hideDistantElements:!0,hideElement:function(b){b.hide()},showElement:function(b){b.show()}},w={scroll:{getLeft:function(b){return b.scrollLeft()},setLeft:function(c,d){c.scrollLeft(d)},getTop:function(b){return b.scrollTop()},setTop:function(c,d){c.scrollTop(d)}},position:{getLeft:function(b){return -1*parseInt(b.css("left"),10)},getTop:function(b){return -1*parseInt(b.css("top"),10)}},margin:{getLeft:function(b){return -1*parseInt(b.css("margin-left"),10)},getTop:function(b){return -1*parseInt(b.css("margin-top"),10)}},transform:{getLeft:function(c){var d=getComputedStyle(c[0])[z];return"none"!==d?-1*parseInt(d.match(/(-?[0-9]+)/g)[4],10):0},getTop:function(c){var d=getComputedStyle(c[0])[z];return"none"!==d?-1*parseInt(d.match(/(-?[0-9]+)/g)[5],10):0}}},x={position:{setLeft:function(c,d){c.css("left",d)},setTop:function(c,d){c.css("top",d)}},transform:{setPosition:function(f,g,h,i,j){f[0].style[z]="translate3d("+(g-h)+"px, "+(i-j)+"px, 0)"}}},y=function(){var a,f=/^(Moz|Webkit|Khtml|O|ms|Icab)(?=[A-Z])/,g=p("script")[0].style,h="";for(a in g){if(f.test(a)){h=a.match(f)[0];break}}return"WebkitOpacity" in g&&(h="Webkit"),"KhtmlOpacity" in g&&(h="Khtml"),function(b){return h+(h.length>0?b.charAt(0).toUpperCase()+b.slice(1):b)}}(),z=y("transform"),A=p("<div />",{style:"background:#fff"}).css("background-position-x")!==s,B=A?function(d,e,f){d.css({"background-position-x":e,"background-position-y":f})}:function(d,e,f){d.css("background-position",e+" "+f)},C=A?function(b){return[b.css("background-position-x"),b.css("background-position-y")]}:function(b){return b.css("background-position").split(" ")},D=q.requestAnimationFrame||q.webkitRequestAnimationFrame||q.mozRequestAnimationFrame||q.oRequestAnimationFrame||q.msRequestAnimationFrame||function(b){setTimeout(b,1000/60)};t.prototype={init:function(){this.options.name=u+"_"+Math.floor(1000000000*Math.random()),this._defineElements(),this._defineGetters(),this._defineSetters(),this._handleWindowLoadAndResize(),this._detectViewport(),this.refresh({firstLoad:!0}),"scroll"===this.options.scrollProperty?this._handleScrollEvent():this._startAnimationLoop()},_defineElements:function(){this.element===r.body&&(this.element=q),this.$scrollElement=p(this.element),this.$element=this.element===q?p("body"):this.$scrollElement,this.$viewportElement=this.options.viewportElement!==s?p(this.options.viewportElement):this.$scrollElement[0]===q||"scroll"===this.options.scrollProperty?this.$scrollElement:this.$scrollElement.parent()},_defineGetters:function(){var c=this,d=w[c.options.scrollProperty];this._getScrollLeft=function(){return d.getLeft(c.$scrollElement)},this._getScrollTop=function(){return d.getTop(c.$scrollElement)}},_defineSetters:function(){var a=this,g=w[a.options.scrollProperty],h=x[a.options.positionProperty],i=g.setLeft,j=g.setTop;this._setScrollLeft="function"==typeof i?function(b){i(a.$scrollElement,b)}:p.noop,this._setScrollTop="function"==typeof j?function(b){j(a.$scrollElement,b)}:p.noop,this._setPosition=h.setPosition||function(b,d,k,l,m){a.options.horizontalScrolling&&h.setLeft(b,d,k),a.options.verticalScrolling&&h.setTop(b,l,m)}},_handleWindowLoadAndResize:function(){var a=this,b=p(q);a.options.responsive&&b.bind("load."+this.name,function(){a.refresh()}),b.bind("resize."+this.name,function(){a._detectViewport(),a.options.responsive&&a.refresh()})},refresh:function(a){var b=this,g=b._getScrollLeft(),h=b._getScrollTop();a&&a.firstLoad||this._reset(),this._setScrollLeft(0),this._setScrollTop(0),this._setOffsets(),this._findParticles(),this._findBackgrounds(),a&&a.firstLoad&&/WebKit/.test(navigator.userAgent)&&p(q).load(function(){var c=b._getScrollLeft(),d=b._getScrollTop();b._setScrollLeft(c+1),b._setScrollTop(d+1),b._setScrollLeft(c),b._setScrollTop(d)}),this._setScrollLeft(g),this._setScrollTop(h)},_detectViewport:function(){var c=this.$viewportElement.offset(),d=null!==c&&c!==s;this.viewportWidth=this.$viewportElement.width(),this.viewportHeight=this.$viewportElement.height(),this.viewportOffsetTop=d?c.top:0,this.viewportOffsetLeft=d?c.left:0},_findParticles:function(){var a=this;this._getScrollLeft(),this._getScrollTop();if(this.particles!==s){for(var d=this.particles.length-1;d>=0;d--){this.particles[d].$element.data("stellar-elementIsActive",s)}}this.particles=[],this.options.parallaxElements&&this.$element.find("[data-stellar-ratio]").each(function(){var b,E,F,G,H,I,J,K,L,M=p(this),N=0,O=0,P=0,Q=0;if(M.data("stellar-elementIsActive")){if(M.data("stellar-elementIsActive")!==this){return}}else{M.data("stellar-elementIsActive",this)}a.options.showElement(M),M.data("stellar-startingLeft")?(M.css("left",M.data("stellar-startingLeft")),M.css("top",M.data("stellar-startingTop"))):(M.data("stellar-startingLeft",M.css("left")),M.data("stellar-startingTop",M.css("top"))),F=M.position().left,G=M.position().top,H="auto"===M.css("margin-left")?0:parseInt(M.css("margin-left"),10),I="auto"===M.css("margin-top")?0:parseInt(M.css("margin-top"),10),K=M.offset().left-H,L=M.offset().top-I,M.parents().each(function(){var c=p(this);return c.data("stellar-offset-parent")===!0?(N=P,O=Q,J=c,!1):(P+=c.position().left,void (Q+=c.position().top))}),b=M.data("stellar-horizontal-offset")!==s?M.data("stellar-horizontal-offset"):J!==s&&J.data("stellar-horizontal-offset")!==s?J.data("stellar-horizontal-offset"):a.horizontalOffset,E=M.data("stellar-vertical-offset")!==s?M.data("stellar-vertical-offset"):J!==s&&J.data("stellar-vertical-offset")!==s?J.data("stellar-vertical-offset"):a.verticalOffset,a.particles.push({$element:M,$offsetParent:J,isFixed:"fixed"===M.css("position"),horizontalOffset:b,verticalOffset:E,startingPositionLeft:F,startingPositionTop:G,startingOffsetLeft:K,startingOffsetTop:L,parentOffsetLeft:N,parentOffsetTop:O,stellarRatio:M.data("stellar-ratio")!==s?M.data("stellar-ratio"):1,width:M.outerWidth(!0),height:M.outerHeight(!0),isHidden:!1})})},_findBackgrounds:function(){var a,d=this,g=this._getScrollLeft(),h=this._getScrollTop();this.backgrounds=[],this.options.parallaxBackgrounds&&(a=this.$element.find("[data-stellar-background-ratio]"),this.$element.data("stellar-background-ratio")&&(a=a.add(this.$element)),a.each(function(){var c,e,f,m,n,E,F,G=p(this),H=C(G),I=0,J=0,K=0,L=0;if(G.data("stellar-backgroundIsActive")){if(G.data("stellar-backgroundIsActive")!==this){return}}else{G.data("stellar-backgroundIsActive",this)}G.data("stellar-backgroundStartingLeft")?B(G,G.data("stellar-backgroundStartingLeft"),G.data("stellar-backgroundStartingTop")):(G.data("stellar-backgroundStartingLeft",H[0]),G.data("stellar-backgroundStartingTop",H[1])),f="auto"===G.css("margin-left")?0:parseInt(G.css("margin-left"),10),m="auto"===G.css("margin-top")?0:parseInt(G.css("margin-top"),10),n=G.offset().left-f-g,E=G.offset().top-m-h,G.parents().each(function(){var i=p(this);return i.data("stellar-offset-parent")===!0?(I=K,J=L,F=i,!1):(K+=i.position().left,void (L+=i.position().top))}),c=G.data("stellar-horizontal-offset")!==s?G.data("stellar-horizontal-offset"):F!==s&&F.data("stellar-horizontal-offset")!==s?F.data("stellar-horizontal-offset"):d.horizontalOffset,e=G.data("stellar-vertical-offset")!==s?G.data("stellar-vertical-offset"):F!==s&&F.data("stellar-vertical-offset")!==s?F.data("stellar-vertical-offset"):d.verticalOffset,d.backgrounds.push({$element:G,$offsetParent:F,isFixed:"fixed"===G.css("background-attachment"),horizontalOffset:c,verticalOffset:e,startingValueLeft:H[0],startingValueTop:H[1],startingBackgroundPositionLeft:isNaN(parseInt(H[0],10))?0:parseInt(H[0],10),startingBackgroundPositionTop:isNaN(parseInt(H[1],10))?0:parseInt(H[1],10),startingPositionLeft:G.position().left,startingPositionTop:G.position().top,startingOffsetLeft:n,startingOffsetTop:E,parentOffsetLeft:I,parentOffsetTop:J,stellarRatio:G.data("stellar-background-ratio")===s?1:G.data("stellar-background-ratio")})}))},_reset:function(){var f,g,h,i,j;for(j=this.particles.length-1;j>=0;j--){f=this.particles[j],g=f.$element.data("stellar-startingLeft"),h=f.$element.data("stellar-startingTop"),this._setPosition(f.$element,g,g,h,h),this.options.showElement(f.$element),f.$element.data("stellar-startingLeft",null).data("stellar-elementIsActive",null).data("stellar-backgroundIsActive",null)}for(j=this.backgrounds.length-1;j>=0;j--){i=this.backgrounds[j],i.$element.data("stellar-backgroundStartingLeft",null).data("stellar-backgroundStartingTop",null),B(i.$element,i.startingValueLeft,i.startingValueTop)}},destroy:function(){this._reset(),this.$scrollElement.unbind("resize."+this.name).unbind("scroll."+this.name),this._animationLoop=p.noop,p(q).unbind("load."+this.name).unbind("resize."+this.name)},_setOffsets:function(){var a=this,b=p(q);b.unbind("resize.horizontal-"+this.name).unbind("resize.vertical-"+this.name),"function"==typeof this.options.horizontalOffset?(this.horizontalOffset=this.options.horizontalOffset(),b.bind("resize.horizontal-"+this.name,function(){a.horizontalOffset=a.options.horizontalOffset()})):this.horizontalOffset=this.options.horizontalOffset,"function"==typeof this.options.verticalOffset?(this.verticalOffset=this.options.verticalOffset(),b.bind("resize.vertical-"+this.name,function(){a.verticalOffset=a.options.verticalOffset()})):this.verticalOffset=this.options.verticalOffset},_repositionElements:function(){var m,E,F,G,H,I,J,K,L,M,N=this._getScrollLeft(),O=this._getScrollTop(),P=!0,Q=!0;if(this.currentScrollLeft!==N||this.currentScrollTop!==O||this.currentWidth!==this.viewportWidth||this.currentHeight!==this.viewportHeight){for(this.currentScrollLeft=N,this.currentScrollTop=O,this.currentWidth=this.viewportWidth,this.currentHeight=this.viewportHeight,M=this.particles.length-1;M>=0;M--){m=this.particles[M],E=m.isFixed?1:0,this.options.horizontalScrolling?(I=(N+m.horizontalOffset+this.viewportOffsetLeft+m.startingPositionLeft-m.startingOffsetLeft+m.parentOffsetLeft)*-(m.stellarRatio+E-1)+m.startingPositionLeft,K=I-m.startingPositionLeft+m.startingOffsetLeft):(I=m.startingPositionLeft,K=m.startingOffsetLeft),this.options.verticalScrolling?(J=(O+m.verticalOffset+this.viewportOffsetTop+m.startingPositionTop-m.startingOffsetTop+m.parentOffsetTop)*-(m.stellarRatio+E-1)+m.startingPositionTop,L=J-m.startingPositionTop+m.startingOffsetTop):(J=m.startingPositionTop,L=m.startingOffsetTop),this.options.hideDistantElements&&(Q=!this.options.horizontalScrolling||K+m.width>(m.isFixed?0:N)&&K<(m.isFixed?0:N)+this.viewportWidth+this.viewportOffsetLeft,P=!this.options.verticalScrolling||L+m.height>(m.isFixed?0:O)&&L<(m.isFixed?0:O)+this.viewportHeight+this.viewportOffsetTop),Q&&P?(m.isHidden&&(this.options.showElement(m.$element),m.isHidden=!1),this._setPosition(m.$element,I,m.startingPositionLeft,J,m.startingPositionTop)):m.isHidden||(this.options.hideElement(m.$element),m.isHidden=!0)}for(M=this.backgrounds.length-1;M>=0;M--){F=this.backgrounds[M],E=F.isFixed?0:1,G=this.options.horizontalScrolling?(N+F.horizontalOffset-this.viewportOffsetLeft-F.startingOffsetLeft+F.parentOffsetLeft-F.startingBackgroundPositionLeft)*(E-F.stellarRatio)+"px":F.startingValueLeft,H=this.options.verticalScrolling?(O+F.verticalOffset-this.viewportOffsetTop-F.startingOffsetTop+F.parentOffsetTop-F.startingBackgroundPositionTop)*(E-F.stellarRatio)+"px":F.startingValueTop,B(F.$element,G,H)}}},_handleScrollEvent:function(){var e=this,f=!1,g=function(){e._repositionElements(),f=!1},h=function(){f||(D(g),f=!0)};this.$scrollElement.bind("scroll."+this.name,h),h()},_startAnimationLoop:function(){var b=this;this._animationLoop=function(){D(b._animationLoop),b._repositionElements()},this._animationLoop()}},p.fn[u]=function(a){var d=arguments;return a===s||"object"==typeof a?this.each(function(){p.data(this,"plugin_"+u)||p.data(this,"plugin_"+u,new t(this,a))}):"string"==typeof a&&"_"!==a[0]&&"init"!==a?this.each(function(){var b=p.data(this,"plugin_"+u);b instanceof t&&"function"==typeof b[a]&&b[a].apply(b,Array.prototype.slice.call(d,1)),"destroy"===a&&p.data(this,"plugin_"+u,null)}):void 0},p[u]=function(){var a=p(q);return a.stellar.apply(a,Array.prototype.slice.call(arguments,0))},p[u].scrollProperty=w,p[u].positionProperty=x,q.Stellar=t}(jQuery,this,document);!function(b){var c=b(window),a=c.height();c.resize(function(){a=c.height()}),b.fn.parallax=function(j,f,k){function m(){var h=c.scrollTop();d.each(function(){var l=b(this),n=l.offset().top,i=e(l);h>n+i||n>h+a||d.css("backgroundPosition",j+" "+Math.round((g-h)*f)+"px")})}var e,g,d=b(this);d.each(function(){g=d.offset().top}),e=k?function(h){return h.outerHeight(!0)}:function(h){return h.height()},(arguments.length<1||null===j)&&(j="50%"),(arguments.length<2||null===f)&&(f=0.1),(arguments.length<3||null===k)&&(k=!0),c.bind("scroll",m).resize(m),m()}}(jQuery);window.Modernizr=function(I,K,M){function J(b){Z.cssText=b}function L(c,d){return J(ac.join(c+";")+(d||""))}function N(c,d){return typeof c===d}function P(c,d){return !!~(""+c).indexOf(d)}function R(c,f){for(var g in c){var h=c[g];if(!P(h,"-")&&Z[h]!==M){return f=="pfx"?h:!0}}return !1}function T(c,g,h){for(var i in c){var j=g[c[i]];if(j!==M){return h===!1?c[i]:N(j,"function")?j.bind(h||g):j}}return !1}function V(f,g,h){var i=f.charAt(0).toUpperCase()+f.slice(1),j=(f+" "+ae.join(i+" ")+i).split(" ");return N(g,"string")||N(g,"undefined")?R(j,g):(j=(f+" "+af.join(i+" ")+i).split(" "),T(j,g,h))}var O="2.8.3",Q={},S=!0,U=K.documentElement,W="modernizr",Y=K.createElement(W),Z=Y.style,aa,ab={}.toString,ac=" -webkit- -moz- -o- -ms- ".split(" "),ad="Webkit Moz O ms",ae=ad.split(" "),af=ad.toLowerCase().split(" "),ag={},ah={},ai={},aj=[],ak=aj.slice,al,am=function(b,g,h,o){var p,q,r,s,t=K.createElement("div"),u=K.body,v=u||K.createElement("body");if(parseInt(h,10)){while(h--){r=K.createElement("div"),r.id=o?o[h]:W+(h+1),t.appendChild(r)}}return p=["&#173;",'<style id="s',W,'">',b,"</style>"].join(""),t.id=W,(u?t:v).innerHTML+=p,v.appendChild(t),u||(v.style.background="",v.style.overflow="hidden",s=U.style.overflow,U.style.overflow="hidden",U.appendChild(v)),q=g(t,b),u?t.parentNode.removeChild(t):(v.parentNode.removeChild(v),U.style.overflow=s),!!q},an=function(a){var e=I.matchMedia||I.msMatchMedia;if(e){return e(a)&&e(a).matches||!1}var f;return am("@media "+a+" { #"+W+" { position: absolute; } }",function(c){f=(I.getComputedStyle?getComputedStyle(c,null):c.currentStyle)["position"]=="absolute"}),f},ao={}.hasOwnProperty,ap;!N(ao,"undefined")&&!N(ao.call,"undefined")?ap=function(c,d){return ao.call(c,d)}:ap=function(c,d){return d in c&&N(c.constructor.prototype[d],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(a){var f=this;if(typeof f!="function"){throw new TypeError}var g=ak.call(arguments,1),h=function(){if(this instanceof h){var b=function(){};b.prototype=f.prototype;var c=new b,d=f.apply(c,g.concat(ak.call(arguments)));return Object(d)===d?d:c}return f.apply(a,g.concat(ak.call(arguments)))};return h}),ag.touch=function(){var a;return"ontouchstart" in I||I.DocumentTouch&&K instanceof DocumentTouch?a=!0:am(["@media (",ac.join("touch-enabled),("),W,")","{#modernizr{top:9px;position:absolute}}"].join(""),function(b){a=b.offsetTop===9}),a},ag.csstransitions=function(){return V("transition")};for(var X in ag){ap(ag,X)&&(al=X.toLowerCase(),Q[al]=ag[X](),aj.push((Q[al]?"":"no-")+al))}return Q.addTest=function(c,e){if(typeof c=="object"){for(var f in c){ap(c,f)&&Q.addTest(f,c[f])}}else{c=c.toLowerCase();if(Q[c]!==M){return Q}e=typeof e=="function"?e():e,typeof S!="undefined"&&S&&(U.className+=" "+(e?"":"no-")+c),Q[c]=e}return Q},J(""),Y=aa=null,function(t,u){function E(e,f){var g=e.createElement("p"),h=e.getElementsByTagName("head")[0]||e.documentElement;return g.innerHTML="x<style>"+f+"</style>",h.insertBefore(g.lastChild,h.firstChild)}function F(){var b=au.elements;return typeof b=="string"?b.split(" "):b}function G(c){var d=C[c[A]];return d||(d={},B++,c[A]=B,C[B]=d),d}function H(b,e,f){e||(e=u);if(D){return e.createElement(b)}f||(f=G(e));var h;return f.cache[b]?h=f.cache[b].cloneNode():y.test(b)?h=(f.cache[b]=f.createElem(b)).cloneNode():h=f.createElem(b),h.canHaveChildren&&!x.test(b)&&!h.tagUrn?f.frag.appendChild(h):h}function aq(b,h){b||(b=u);if(D){return b.createDocumentFragment()}h=h||G(b);var i=h.frag.cloneNode(),j=0,k=F(),l=k.length;for(;j<l;j++){i.createElement(k[j])}return i}function ar(c,d){d.cache||(d.cache={},d.createElem=c.createElement,d.createFrag=c.createDocumentFragment,d.frag=d.createFrag()),c.createElement=function(a){return au.shivMethods?H(a,c,d):d.createElem(a)},c.createDocumentFragment=Function("h,f","return function(){var n=f.cloneNode(),c=n.createElement;h.shivMethods&&("+F().join().replace(/[\w\-]+/g,function(b){return d.createElem(b),d.frag.createElement(b),'c("'+b+'")'})+");return n}")(au,d.frag)}function at(b){b||(b=u);var d=G(b);return au.shivCSS&&!z&&!d.hasCSS&&(d.hasCSS=!!E(b,"article,aside,dialog,figcaption,figure,footer,header,hgroup,main,nav,section{display:block}mark{background:#FF0;color:#000}template{display:none}")),D||ar(b,d),b}var v="3.7.0",w=t.html5||{},x=/^<|^(?:button|map|select|textarea|object|iframe|option|optgroup)$/i,y=/^(?:a|b|code|div|fieldset|h1|h2|h3|h4|h5|h6|i|label|li|ol|p|q|span|strong|style|table|tbody|td|th|tr|ul)$/i,z,A="_html5shiv",B=0,C={},D;(function(){try{var b=u.createElement("a");b.innerHTML="<xyz></xyz>",z="hidden" in b,D=b.childNodes.length==1||function(){u.createElement("a");var c=u.createDocumentFragment();return typeof c.cloneNode=="undefined"||typeof c.createDocumentFragment=="undefined"||typeof c.createElement=="undefined"}()}catch(d){z=!0,D=!0}})();var au={elements:w.elements||"abbr article aside audio bdi canvas data datalist details dialog figcaption figure footer header hgroup main mark meter nav output progress section summary template time video",version:v,shivCSS:w.shivCSS!==!1,supportsUnknownElements:D,shivMethods:w.shivMethods!==!1,type:"default",shivDocument:at,createElement:H,createDocumentFragment:aq};t.html5=au,at(u)}(this,K),Q._version=O,Q._prefixes=ac,Q._domPrefixes=af,Q._cssomPrefixes=ae,Q.mq=an,Q.testProp=function(b){return R([b])},Q.testAllProps=V,Q.testStyles=am,U.className=U.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(S?" js "+aj.join(" "):""),Q}(this,this.document),function(C,E,G){function H(b){return"[object Function]"==S.call(b)}function I(b){return"string"==typeof b}function J(){}function K(b){return !b||"loaded"==b||"complete"==b||"uninitialized"==b}function L(){var b=T.shift();U=1,b?b.t?Q(function(){("c"==b.t?F.injectCss:F.injectJs)(b.s,0,b.a,b.x,b.e,1)},0):(b(),L()):U=0}function M(b,g,h,m,n,p,q){function s(a){if(!v&&K(t.readyState)&&(x.r=v=1,!U&&L(),t.onload=t.onreadystatechange=null,a)){"img"!=b&&Q(function(){X.removeChild(t)},50);for(var c in ac[g]){ac[g].hasOwnProperty(c)&&ac[g][c].onload()}}}var q=q||F.errorTimeout,t=E.createElement(b),v=0,w=0,x={t:h,s:g,e:n,a:p,x:q};1===ac[g]&&(w=1,ac[g]=[]),"object"==b?t.data=g:(t.src=g,t.type=b),t.width=t.height="0",t.onerror=t.onload=t.onreadystatechange=function(){s.call(this,w)},T.splice(m,0,x),"img"!=b&&(w||2===ac[g]?(X.insertBefore(t,W?null:R),Q(s,q)):ac[g].push(t))}function N(e,g,h,i,j){return U=0,g=g||"j",I(e)?M("c"==g?Z:Y,e,g,this.i++,h,i,j):(T.splice(this.i++,0,e),1==T.length&&L()),this}function O(){var b=F;return b.loader={load:N,i:0},b}var P=E.documentElement,Q=C.setTimeout,R=E.getElementsByTagName("script")[0],S={}.toString,T=[],U=0,V="MozAppearance" in P.style,W=V&&!!E.createRange().compareNode,X=W?P:R.parentNode,P=C.opera&&"[object Opera]"==S.call(C.opera),P=!!E.attachEvent&&!P,Y=V?"object":P?"script":"img",Z=P?"script":Y,aa=Array.isArray||function(b){return"[object Array]"==S.call(b)},ab=[],ac={},ad={timeout:function(c,d){return d.length&&(c.timeout=d[0]),c}},D,F;F=function(c){function d(h){var h=h.split("!"),i=ab.length,j=h.pop(),l=h.length,j={url:j,origUrl:j,prefixes:h},o,p,q;for(p=0;p<l;p++){q=h[p].split("="),(o=ad[q.shift()])&&(j=o(j,q))}for(p=0;p<i;p++){j=ab[p](j)}return j}function e(b,l,o,p,q){var r=d(b),s=r.autoCallback;r.url.split(".").pop().split("?").shift(),r.bypass||(l&&(l=H(l)?l:l[b]||l[p]||l[b.split("/").pop().split("?")[0]]),r.instead?r.instead(b,l,o,p,q):(ac[r.url]?r.noexec=!0:ac[r.url]=1,o.load(r.url,r.forceCSS||!r.forceJS&&"css"==r.url.split(".").pop().split("?").shift()?"c":G,r.noexec,r.attrs,r.timeout),(H(l)||H(s))&&o.load(function(){O(),l&&l(r.origUrl,q,p),s&&s(r.origUrl,q,p),ac[r.url]=2})))}function f(g,o){function p(b,h){if(b){if(I(b)){h||(s=function(){var i=[].slice.call(arguments);t.apply(this,i),u()}),e(b,s,o,0,q)}else{if(Object(b)===b){for(w in v=function(){var a=0,i;for(i in b){b.hasOwnProperty(i)&&a++}return a}(),b){b.hasOwnProperty(w)&&(!h&&!--v&&(H(s)?s=function(){var i=[].slice.call(arguments);t.apply(this,i),u()}:s[w]=function(i){return function(){var a=[].slice.call(arguments);i&&i.apply(this,a),u()}}(t[w])),e(b[w],s,o,w,q))}}}}else{!h&&u()}}var q=!!g.test,r=g.load||g.both,s=g.callback||J,t=s,u=g.complete||J,v,w;p(q?g.yep:g.nope,!!r),r&&p(r)}var k,m,n=this.yepnope.loader;if(I(c)){e(c,0,n,0)}else{if(aa(c)){for(k=0;k<c.length;k++){m=c[k],I(m)?e(m,0,n,0):aa(m)?F(m):Object(m)===m&&f(m,n)}}else{Object(c)===c&&f(c,n)}}},F.addPrefix=function(c,d){ad[c]=d},F.addFilter=function(b){ab.push(b)},F.errorTimeout=10000,null==E.readyState&&E.addEventListener&&(E.readyState="loading",E.addEventListener("DOMContentLoaded",D=function(){E.removeEventListener("DOMContentLoaded",D,0),E.readyState="complete"},0)),C.yepnope=O(),C.yepnope.executeStack=L,C.yepnope.injectJs=function(b,f,g,h,m,n){var p=E.createElement("script"),q,r,h=h||F.errorTimeout;p.src=b;for(r in g){p.setAttribute(r,g[r])}f=n?L:f||J,p.onreadystatechange=p.onload=function(){!q&&K(p.readyState)&&(q=1,f(),p.onload=p.onreadystatechange=null)},Q(function(){q||(q=1,f(1))},h),m?p.onload():R.parentNode.insertBefore(p,R)},C.yepnope.injectCss=function(b,f,h,k,l,m){var k=E.createElement("link"),n,f=m?L:f||J;k.href=b,k.rel="stylesheet",k.type="text/css";for(n in h){k.setAttribute(n,h[n])}l||(R.parentNode.insertBefore(k,R),Q(f,0))}}(this,document),Modernizr.load=function(){yepnope.apply(window,[].slice.call(arguments,0))};